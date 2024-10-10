<?php

/**
 * Clase para conectar a MySQL.
 *
 * @author Carlos García Gómez <neorazorx@gmail.com>
 */
class fs_mysql
{
   /**
    * El enlace con la base de datos.
    * @var type
    */
   protected static $link;

   /**
    * Nº de selects ejecutados.
    * @var type
    */
   protected static $t_selects;

   /**
    * Nº de transacciones ejecutadas.
    * @var type
    */
   protected static $t_transactions;

   /**
    * Historial de consultas SQL.
    * @var type
    */
   protected static $history;

   /**
    * Lista de errores.
    * @var type
    */
   protected static $errors;

   public function __construct()
   {
      ini_set('memory_limit', '2024M');
      ini_set('post_max_size', '1024M');
      ini_set('upload_max_filesize', '1024M');
      ini_set('max_input_vars', 50000);
      if (!isset(self::$link)) {
         self::$t_selects      = 0;
         self::$t_transactions = 0;
         self::$history        = array();
         self::$errors         = array();
      }
   }

   /**
    * Inicia una transacción SQL.
    * @return boolean
    */
   public function begin_transaction()
   {
      /**
       * Ejecutamos START TRANSACTION en lugar de begin_transaction()
       * para mayor compatibilidad.
       */
      return self::$link ? self::$link->query("START TRANSACTION;") : false;
   }

   /**
    * Devuelve el número de selects ejecutados
    * @return type
    */
   public function get_selects()
   {
      return self::$t_selects;
   }

   /**
    * Devuele le número de transacciones realizadas
    * @return type
    */
   public function get_transactions()
   {
      return self::$t_transactions;
   }

   public function get_history()
   {
      return self::$history;
   }

   /**
    * Devuelve la lista de errores.
    * @return type
    */
   public function get_errors()
   {
      return self::$errors;
   }

   /**
    * Vacía la lista de errores.
    */
   public function clean_errors()
   {
      self::$errors = array();
   }

   /**
    * Conecta a la base de datos.
    * @return boolean
    */
   public function connect()
   {
      $connected = false;
      if (self::$link) {
         $connected = true;
      } else if (class_exists('mysqli')) {
         self::$link = @new mysqli(FS_DB_HOST, FS_DB_USER, FS_DB_PASS, FS_DB_NAME, intval(FS_DB_PORT));

         if (self::$link->connect_error) {
            self::$errors[] = self::$link->connect_error;
            self::$link     = null;
         } else {
            self::$link->set_charset('utf8');
            $connected = true;
            /// desactivamos las claves ajenas
            $this->exec("SET foreign_key_checks = 0;");
         }
      } else {
         self::$errors[] = 'No tienes instalada la extensión de PHP para MySQL.';
      }

      return $connected;
   }

   /**
    * Devuelve TRUE si se está conectado a la base de datos.
    * @return boolean
    */
   public function connected()
   {
      if (self::$link) {
         return true;
      } else {
         return false;
      }

   }

   /**
    * Desconecta de la base de datos.
    * @return boolean
    */
   public function close()
   {
      if (self::$link) {
         $retorno    = self::$link->close();
         self::$link = null;
         return $retorno;
      } else {
         return true;
      }

   }

   /**
    * Devuelve un array con los nombres de las tablas de la base de datos.
    * @return type
    */
   public function list_tables()
   {
      $this->cache = new fs_cache();
      $tables      = array();
      $error       = true;
      $aux1        = $this->cache->get_array2('show_tables', $error);

      if (!$aux1) {
         $aux = $this->select("SHOW TABLES;");
         if ($aux) {
            foreach ($aux as $a) {
               if (isset($a['Tables_in_' . FS_DB_NAME])) {
                  $tables[] = array('name' => $a['Tables_in_' . FS_DB_NAME]);
               }
            }
         }
         $this->cache->set('show_tables', $tables, 3600);
      } else {
         $tables = $aux1;
      }

      return $tables;
   }

   /**
    * Devuelve un array con las columnas de una tabla dada.
    * @param type $table
    * @return type
    */
   public function get_columns($table)
   {
      $columnas = array();

      $aux = $this->select("SHOW COLUMNS FROM `" . $table . "`;");
      if ($aux) {
         foreach ($aux as $a) {
            $columnas[] = array(
               'column_name'    => $a['Field'],
               'data_type'      => $a['Type'],
               'column_default' => $a['Default'],
               'is_nullable'    => $a['Null'],
               'extra'          => $a['Extra'],
               'key'            => $a['Key'],
            );
         }
      }

      return $columnas;
   }

   /**
    * Devuelve una array con las restricciones de una tabla dada:
    * clave primaria, claves ajenas, etc.
    * @param type $table
    * @return type
    */
   public function get_constraints($table)
   {
      $constraints = array();

      $aux = $this->select("SELECT * FROM information_schema.table_constraints
         WHERE table_schema = schema() AND table_name = '" . $table . "';");
      if ($aux) {
         foreach ($aux as $a) {
            $constraints[] = array(
               'restriccion' => $a['CONSTRAINT_NAME'],
               'tipo'        => $a['CONSTRAINT_TYPE'],
            );
         }
      }

      return $constraints;
   }

   /**
    * Devuelve una array con los indices de una tabla dada.
    * @param type $table
    * @return type
    */
   public function get_indexes($table)
   {
      $indices = array();

      $aux = $this->select("SHOW INDEXES FROM " . $table . ";");
      if ($aux) {
         foreach ($aux as $a) {
            $indices[] = array('name' => $a['Key_name']);
         }
      }

      return $indices;
   }

   /**
    * Devuelve un array con los datos de bloqueos en la base de datos.
    * @return type
    */
   public function get_locks()
   {
      return array();
   }

   /**
    * Devuelve el motor de base de datos y la versión.
    * @return boolean
    */
   public function version()
   {
      if (self::$link) {
         return 'MYSQL ' . self::$link->server_version;
      } else {
         return false;
      }

   }

   /**
    * Ejecuta una sentencia SQL de tipo select, y devuelve un array con los resultados,
    * o false en caso de fallo.
    * @param type $sql
    * @return type
    */
   public function select($sql)
   {
      $resultado = false;

      if (self::$link) {
         self::$history[] = $sql;

         $filas = self::$link->query($sql);
         if ($filas) {
            $resultado = array();
            while ($row = $filas->fetch_array(MYSQLI_ASSOC)) {
               $resultado[] = $row;
            }
            $filas->free();
         } else {
            self::$errors[] = self::$link->error;
         }

         self::$t_selects++;
      }

      return $resultado;
   }

   /**
    * Ejecuta una sentencia SQL de tipo select, pero con paginación,
    * y devuelve un array con los resultados,
    * o false en caso de fallo.
    * Limit es el número de elementos que quieres que devuelve.
    * Offset es el número de resultado desde el que quieres que empiece.
    * @param type $sql
    * @param type $limit
    * @param type $offset
    * @return type
    */
   public function select_limit($sql, $limit = FS_ITEM_LIMIT, $offset = 0)
   {
      $resultado = false;

      if (self::$link) {
         $sql .= ' LIMIT ' . $limit . ' OFFSET ' . $offset . ';';
         self::$history[] = $sql;

         $filas = self::$link->query($sql);
         if ($filas) {
            $resultado = array();
            while ($row = $filas->fetch_array(MYSQLI_ASSOC)) {
               $resultado[] = $row;
            }
            $filas->free();
         } else {
            self::$errors[] = self::$link->error;
         }

         self::$t_selects++;
      }

      return $resultado;
   }

   public function var2str($v)
   {
      if (is_null($v)) {
         return 'NULL';
      } else if (is_bool($v)) {
         if ($v) {
            return 'TRUE';
         } else {
            return 'FALSE';
         }

      } else if (preg_match('/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4})$/i', $v)) /// es una fecha
      {
         return "'" . Date($this->date_style(), strtotime($v)) . "'";
      } else if (preg_match('/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})$/i', $v)) /// es una fecha+hora
      {
         return "'" . Date($this->date_style() . ' H:i:s', strtotime($v)) . "'";
      } else {
         return "'" . $this->escape_string($v) . "'";
      }

   }

   /**
    * Ejecuta consultas SQL sobre la base de datos (inserts, updates y deletes).
    * Para selects, mejor usar las funciones select() o select_limit().
    * Por defecto se inicia una transacción, se ejecutan las consultas, y si todo
    * sale bien, se guarda, sino se deshace.
    * Se puede evitar este modo de transacción si se pone false
    * en el parametro transaccion.
    * @param type $sql
    * @return boolean
    */
   public function exec($sql, $transaccion = true, $auditoria = true)
   {
      $resultado    = false;
      $previousData = [];

      if (self::$link) {
         self::$history[] = $sql;
         self::$t_transactions++;
         if ($auditoria) {
            $previousData = self::previousData($sql);
         }

         /// desactivamos el autocommit
         //self::$link->autocommit(FALSE);

         $i = 0;
         if (self::$link->multi_query($sql)) {
            do {$i++;} while (self::$link->more_results() and self::$link->next_result());
         }

         if (self::$link->errno) {
            self::$errors[] = 'Error al ejecutar la consulta ' . $i . ': ' . self::$link->error .
            '. La secuencia ocupa la posición ' . count(self::$history);
         } else {
            $resultado = true;
         }
      }

      return $resultado;
   }

   private function previousData($sql = '')
   {
      if (strlen($sql) > 0) {
         $indextipo = strpos($sql, ' ');
         // $indextipo;
         //exit();
         $tipo = strtoupper(substr($sql, 0, $indextipo));
         if ($tipo == "UPDATE") {
            $indexcomp  = strpos($sql, 'SET');
            $tabla      = substr($sql, $indextipo, ($indexcomp - 7));
            $indexwhere = strpos($sql, 'WHERE');
            $sqlselect  = 'SELECT * FROM ' . $tabla . ' ' . substr($sql, $indexwhere);
            $data       = $this->select($sqlselect);
            return $data;
         } elseif ($tipo == "DELETE") {
            //$indexcomp = strpos($sql, 'FROM');
            //$tabla = substr($sql, $indextipo+4, ($indexcomp));
            //$start = strpos($sql, 'FROM') + 5;
            //$length = strpos($sql, 'WHERE') - $start -1;
            //$tabla = substr($sql, $start, $length);
            $indexcomp  = strpos($sql, 'WHERE');
            $tabla      = substr($sql, ($indextipo + 5), ($indexcomp - 11));
            $indexwhere = strpos($sql, 'WHERE');
            $sqlselect  = 'SELECT * FROM ' . $tabla . ' ' . substr($sql, $indexwhere);
            $data       = $this->select($sqlselect);
            return $data;
         }
         return false;
      } else {
         return false;
      }

   }


   /**
    * Guarda los cambios de una transacción SQL.
    */
   public function commit()
   {
      if (self::$link) {
         self::$link->commit();
      }
   }

   /**
    * Deshace los cambios de una transacción SQL.
    * @return boolean
    */
   public function rollback()
   {
      return self::$link ? self::$link->rollback() : false;
   }

   /**
    * Devuleve el último ID asignado al hacer un INSERT en la base de datos.
    * @return boolean
    */
   public function lastval()
   {
      $aux = $this->select('SELECT LAST_INSERT_ID() as num;');
      if ($aux) {
         return $aux[0]['num'];
      } else {
         return false;
      }

   }

   /**
    * Escapa las comillas de la cadena de texto.
    * @param type $s
    * @return type
    */
   public function escape_string($s)
   {
      if (self::$link) {
         return self::$link->escape_string($s);
      } else {
         return $s;
      }

   }

   /**
    * Devuelve el estilo de fecha del motor de base de datos.
    * @return string
    */
   public function date_style()
   {
      return 'Y-m-d';
   }

   /**
    * Devuelve el SQL necesario para convertir la columna a entero.
    * @param type $col
    * @return type
    */
   public function sql_to_int($col)
   {
      return 'CAST(' . $col . ' as UNSIGNED)';
   }

   /**
    * Compara dos arrays de columnas, devuelve una sentencia SQL
    * en caso de encontrar diferencias.
    * @param type $table_name
    * @param type $xml_cols
    * @param type $columnas
    * @return string
    */
   public function compare_columns($table_name, $xml_cols, $columnas)
   {
      $consulta = '';

      foreach ($xml_cols as $col) {
         $encontrada = false;
         if ($columnas) {
            if (strtolower($col['tipo']) == 'integer') {
               /**
                * Desde la pestaña avanzado el panel de control se puede cambiar
                * el tipo de entero a usar en las columnas.
                */
               $col['tipo'] = 'INTEGER';
            }

            foreach ($columnas as $col2) {
               if ($col2['column_name'] == $col['nombre']) {
                  if (!$this->compare_data_types($col2['data_type'], $col['tipo'])) {
                     $consulta .= 'ALTER TABLE ' . $table_name . ' MODIFY `' . $col['nombre'] . '` ' . $col['tipo'] . ';';
                  }

                  if ($col2['is_nullable'] != $col['nulo']) {
                     if ($col['nulo'] == 'YES') {
                        $consulta .= 'ALTER TABLE ' . $table_name . ' MODIFY `' . $col['nombre'] . '` ' . $col['tipo'] . ' NULL;';
                     } else {
                        $consulta .= 'ALTER TABLE ' . $table_name . ' MODIFY `' . $col['nombre'] . '` ' . $col['tipo'] . ' NOT NULL;';
                     }

                  }

                  if (!$this->compare_defaults($col2['column_default'], $col['defecto'])) {
                     if (is_null($col['defecto'])) {
                        $consulta .= 'ALTER TABLE ' . $table_name . ' ALTER `' . $col['nombre'] . '` DROP DEFAULT;';
                     } else {
                        if (strtolower(substr($col['defecto'], 0, 9)) == "nextval('") /// nextval es para postgresql
                        {
                           if ($col2['extra'] != 'auto_increment') {
                              $consulta .= 'ALTER TABLE ' . $table_name . ' MODIFY `' . $col2['column_name'] . '` ' . $col2['data_type'];

                              if ($col2['is_nullable'] == 'YES') {
                                 $consulta .= ' NULL AUTO_INCREMENT;';
                              } else {
                                 $consulta .= ' NOT NULL AUTO_INCREMENT;';
                              }

                           }
                        } else {
                           $consulta .= 'ALTER TABLE ' . $table_name . ' ALTER `' . $col['nombre'] . '` SET DEFAULT ' . $col['defecto'] . ";";
                        }

                     }
                  }

                  $encontrada = true;
                  break;
               }
            }
         }
         if (!$encontrada) {
            $consulta .= 'ALTER TABLE ' . $table_name . ' ADD `' . $col['nombre'] . '` ';

            if ($col['tipo'] == 'serial') {
               $consulta .= '`' . $col['nombre'] . '` ' . FS_DB_INTEGER . ' NOT NULL AUTO_INCREMENT;';
            } else {
               $consulta .= $col['tipo'];

               if ($col['nulo'] == 'NO') {
                  $consulta .= " NOT NULL";
               } else {
                  $consulta .= " NULL";
               }

               if ($col['defecto']) {
                  $consulta .= " DEFAULT " . $col['defecto'] . ";";
               } else if ($col['nulo'] == 'YES') {
                  $consulta .= " DEFAULT NULL;";
               } else {
                  $consulta .= ';';
               }

            }
         }
      }

      /// eliminamos código problemático de postgresql
      $consulta = str_replace('::character varying', '', $consulta);
      $consulta = str_replace('without time zone', '', $consulta);
      $consulta = str_replace('now()', "'00:00'", $consulta);
      $consulta = str_replace('CURRENT_TIMESTAMP', "'" . date('Y-m-d') . " 00:00:00'", $consulta);
      $consulta = str_replace('CURRENT_DATE', date("'Y-m-d'"), $consulta);

      return $consulta;
   }

   /**
    * Compara los tipos de datos de una columna. Devuelve TRUE si son iguales.
    * @param type $v1
    * @param type $v2
    * @return boolean
    */
   private function compare_data_types($v1, $v2)
   {
      if (strtolower($v2) == 'serial') {
         return true;
      } else if ($v1 == 'tinyint(1)' and $v2 == 'boolean') {
         return true;
      } else if (substr($v1, 0, 4) == 'int(' and $v2 == 'INTEGER') {
         return true;
      } else if (substr($v1, 0, 6) == 'double' and $v2 == 'double precision') {
         return true;
      } else if (substr($v1, 0, 4) == 'time' and substr($v2, 0, 4) == 'time') {
         return true;
      } else if (substr($v1, 0, 8) == 'varchar(' and substr($v2, 0, 18) == 'character varying(') {
         /// comprobamos las longitudes
         if (substr($v1, 8, -1) == substr($v2, 18, -1)) {
            return true;
         } else {
            return false;
         }
      } else if (substr($v1, 0, 5) == 'char(' and substr($v2, 0, 18) == 'character varying(') {
         /// comprobamos las longitudes
         if (substr($v1, 5, -1) == substr($v2, 18, -1)) {
            return true;
         } else {
            return false;
         }
      } else if ($v1 == $v2) {
         return true;
      } else {
         return false;
      }
   }

   /**
    * Compara los tipos por defecto. Devuelve TRUE si son equivalentes.
    * @param type $v1
    * @param type $v2
    * @return type
    */
   private function compare_defaults($v1, $v2)
   {
      if ($v1 == $v2) {
         return true;
      } else if (in_array($v1, array('0', 'false', 'FALSE'))) {
         return in_array($v2, array('0', 'false', 'FALSE'));
      } else if (in_array($v1, array('1', 'true', 'true'))) {
         return in_array($v2, array('1', 'true', 'true'));
      } else if ($v1 == '00:00:00' and $v2 == 'now()') {
         return true;
      } else if ($v1 == date('Y-m-d') . ' 00:00:00' and $v2 == 'CURRENT_TIMESTAMP') {
         return true;
      } else if ($v1 == 'CURRENT_DATE' and $v2 == date("'Y-m-d'")) {
         return true;
      } else if (substr($v2, 0, 8) == 'nextval(') {
         return true;
      } else {
         $v1 = str_replace('::character varying', '', $v1);
         $v2 = str_replace('::character varying', '', $v2);
         $v1 = str_replace("'", '', $v1);
         $v2 = str_replace("'", '', $v2);

         if ($v1 == $v2) {
            return true;
         } else {
            return false;
         }
      }
   }

   /**
    * Compara dos arrays de restricciones, devuelve un array de sentencias SQL
    * en caso de encontrar diferencias.
    * @param type $table_name
    * @param type $c_nuevas
    * @param type $c_old
    * @param type $solo_eliminar
    * @return string
    */
   public function compare_constraints($table_name, $c_nuevas, $c_old, $solo_eliminar = false)
   {
      $consulta = '';

      if ($c_old) {
         /**
          * comprobamos una a una las viejas, si hay que eliminar una,
          * tendremos que eliminar todas para evitar problemas.
          */
         $eliminar = false;
         foreach ($c_old as $col) {
            $encontrado = false;
            if ($c_nuevas) {
               foreach ($c_nuevas as $col2) {
                  if ($col['restriccion'] == 'PRIMARY' or $col['restriccion'] == $col2['nombre']) {
                     $encontrado = true;
                     break;
                  }
               }
            }

            if (!$encontrado) {
               $eliminar = true;
               break;
            }
         }

         /// eliminamos todas las restricciones
         if ($eliminar) {
            /// eliminamos antes las claves ajenas y luego los unique, evita problemas
            foreach ($c_old as $col) {
               if ($col['tipo'] == 'FOREIGN KEY') {
                  $consulta .= 'ALTER TABLE ' . $table_name . ' DROP FOREIGN KEY ' . $col['restriccion'] . ';';
               }
            }

            foreach ($c_old as $col) {
               if ($col['tipo'] == 'UNIQUE') {
                  $consulta .= 'ALTER TABLE ' . $table_name . ' DROP INDEX ' . $col['restriccion'] . ';';
               }
            }

            $c_old = array();
         }
      }

      if ($c_nuevas and !$solo_eliminar) {
         /// comprobamos una a una las nuevas
         foreach ($c_nuevas as $col) {
            $encontrado = false;
            if ($c_old) {
               foreach ($c_old as $col2) {
                  if ($col['nombre'] == $col2['restriccion']) {
                     $encontrado = true;
                     break;
                  }
               }
            }

            if (!$encontrado) {
               /// añadimos la restriccion
               if (substr($col['consulta'], 0, 11) == 'FOREIGN KEY' and FS_FOREIGN_KEYS) {
                  $consulta .= 'ALTER TABLE ' . $table_name . ' ADD CONSTRAINT ' . $col['nombre'] . ' ' . $col['consulta'] . ';';
               } else if (substr($col['consulta'], 0, 6) == 'UNIQUE') {
                  $consulta .= 'ALTER TABLE ' . $table_name . ' ADD CONSTRAINT ' . $col['nombre'] . ' ' . $col['consulta'] . ';';
               }
            }
         }
      }

      /// eliminamos código problemático de postgresql
      $consulta = str_replace('::character varying', '', $consulta);
      $consulta = str_replace('without time zone', '', $consulta);
      $consulta = str_replace('now()', "'00:00'", $consulta);
      $consulta = str_replace('CURRENT_TIMESTAMP', "'" . date('Y-m-d') . " 00:00:00'", $consulta);
      $consulta = str_replace('CURRENT_DATE', date("'Y-m-d'"), $consulta);

      return $consulta;
   }

   /**
    * Devuelve la sentencia SQL necesaria para crear una tabla con la estructura proporcionada.
    * @param type $table_name
    * @param type $xml_columnas
    * @param type $xml_restricciones
    * @return type
    */
   public function generate_table($table_name, $xml_columnas, $xml_restricciones)
   {
      $consulta = "CREATE TABLE " . $table_name . " ( ";

      $i = false;
      foreach ($xml_columnas as $col) {
         /// añade la coma al final
         if ($i) {
            $consulta .= ", ";
         } else {
            $i = true;
         }

         if ($col['tipo'] == 'serial') {
            $consulta .= '`' . $col['nombre'] . '` ' . FS_DB_INTEGER . ' NOT NULL AUTO_INCREMENT';
         } else {
            if (strtolower($col['tipo']) == 'integer') {
               /**
                * Desde la pestaña avanzado el panel de control se puede cambiar
                * el tipo de entero a usar en las columnas.
                */
               $col['tipo'] = FS_DB_INTEGER;
            }

            $consulta .= '`' . $col['nombre'] . '` ' . $col['tipo'];

            if ($col['nulo'] == 'NO') {
               $consulta .= " NOT NULL";
            } else {
               /// es muy importante especificar que la columna permite NULL
               $consulta .= " NULL";
            }

            if ($col['defecto']) {
               $consulta .= " DEFAULT " . $col['defecto'];
            }
         }
      }

      /// eliminamos código problemático de postgresql
      $consulta = str_replace('::character varying', '', $consulta);
      $consulta = str_replace('without time zone', '', $consulta);
      $consulta = str_replace('now()', "'00:00'", $consulta);
      $consulta = str_replace('CURRENT_TIMESTAMP', "'" . date('Y-m-d') . " 00:00:00'", $consulta);
      $consulta = str_replace('CURRENT_DATE', date("'Y-m-d'"), $consulta);

      return $consulta . ' ' . $this->generate_table_constraints($xml_restricciones) . ' ) '
         . 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;';
   }

   /**
    * Genera el SQL para establecer las restricciones proporcionadas.
    * @param type $xml_restricciones
    * @return type
    */
   private function generate_table_constraints($xml_restricciones)
   {
      $consulta = '';

      if ($xml_restricciones) {
         foreach ($xml_restricciones as $res) {
            if (strstr(strtolower($res['consulta']), 'primary key')) {
               $consulta .= ', ' . $res['consulta'];
            } else if (FS_FOREIGN_KEYS or substr($res['consulta'], 0, 11) != 'FOREIGN KEY') {
               $consulta .= ', CONSTRAINT ' . $res['nombre'] . ' ' . $res['consulta'];
            }
         }
      }

      /// eliminamos código problemático de postgresql
      $consulta = str_replace('::character varying', '', $consulta);
      $consulta = str_replace('without time zone', '', $consulta);
      $consulta = str_replace('now()', "'00:00'", $consulta);
      $consulta = str_replace('CURRENT_TIMESTAMP', "'" . date('Y-m-d') . " 00:00:00'", $consulta);
      $consulta = str_replace('CURRENT_DATE', date("'Y-m-d'"), $consulta);

      return $consulta;
   }

   /**
    * Realiza comprobaciones extra a la tabla.
    * @param type $table_name
    * @return type
    */
   public function check_table_aux($table_name)
   {
      $retorno = true;

      /// ¿La tabla no usa InnoDB?
      $data = $this->select("SHOW TABLE STATUS FROM `" . FS_DB_NAME . "` LIKE '" . $table_name . "';");
      if ($data) {
         if ($data[0]['Engine'] != 'InnoDB') {
            if (!$this->exec("ALTER TABLE " . $table_name . " ENGINE=InnoDB;")) {
               self::$errors[] = 'Imposible convertir la tabla ' . $table_name . ' a InnoDB.'
                  . ' Imprescindible para el sistema.';
               $retorno = false;
            }
         }
      }

      return $retorno;
   }
}
