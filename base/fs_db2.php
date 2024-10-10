<?php

require_once dirname(__DIR__) . '/base/fs_mysql.php';

/**
 * Clase genérica de acceso a la base de datos, ya sea MySQL o PostgreSQL.
 *
 * @author Carlos García Gómez <neorazorx@gmail.com>
 */
class fs_db2
{
   private $engine;

   public function __construct()
   {
      $this->engine = new fs_mysql();
   }

   /**
    * Conecta a la base de datos.
    * @return type
    */
   public function connect()
   {
      return $this->engine->connect();
   }

   /**
    * Devuelve TRUE si se está conestado a la base de datos.
    * @return type
    */
   public function connected()
   {
      return $this->engine->connected();
   }

   /**
    * Desconecta de la base de datos.
    * @return type
    */
   public function close()
   {
      return $this->engine->close();
   }

   /**
    * Devuelve el motor de base de datos usado y la versión.
    * @return type
    */
   public function version()
   {
      return $this->engine->version();
   }

   /**
    * Devuelve la lista de errores.
    * @return type
    */
   public function get_errors()
   {
      return $this->engine->get_errors();
   }

   /**
    * Vacía la lista de errores.
    * @return type
    */
   public function clean_errors()
   {
      return $this->engine->clean_errors();
   }

   /**
    * Devuelve el nº de selects a la base de datos.
    * @return type
    */
   public function get_selects()
   {
      return $this->engine->get_selects();
   }

   /**
    * Devuelve el nº de transacciones con la base de datos.
    * @return type
    */
   public function get_transactions()
   {
      return $this->engine->get_transactions();
   }

   /**
    * Devuelve el historial SQL.
    * @return type
    */
   public function get_history()
   {
      return $this->engine->get_history();
   }

   /**
    * Devuelve un array con los nombres de las tablas de la base de datos.
    * @return type
    */
   public function list_tables()
   {
      return $this->engine->list_tables();
   }

   /**
    * Devuelve TRUE si la tabla existe, FALSE en caso contrario.
    * @param type $name
    * @param type $list
    * @return boolean
    */
   public function table_exists($name, $list = false)
   {
      $resultado = false;

      if ($list === false) {
         $list = $this->engine->list_tables();
      }

      foreach ($list as $tabla) {
         if ($tabla['name'] == $name) {
            $resultado = true;
            break;
         }
      }

      return $resultado;
   }

   /**
    * Ejecuta una sentencia SQL de tipo select, y devuelve un array con los resultados,
    * o false en caso de fallo.
    * @param type $sql
    * @return type
    */
   public function select($sql)
   {
      return $this->engine->select($sql);
   }

   /**
    * Ejecuta una sentencia SQL de tipo select, pero con paginación,
    * y devuelve un array con los resultados o false en caso de fallo.
    * Limit es el número de elementos que quieres que devuelva.
    * Offset es el número de resultado desde el que quieres que empiece.
    * @param string $sql
    * @param type $limit
    * @param type $offset
    * @return type
    */
   public function select_limit($sql, $limit = FS_ITEM_LIMIT, $offset = 0)
   {
      return $this->engine->select_limit($sql, $limit, $offset);
   }

   /**
    * Ejecuta consultas SQL sobre la base de datos (inserts, updates o deletes).
    * Para hacer selects, mejor usar select() o selec_limit().
    * Por defecto se inicia una transacción, se ejecutan las consultas, y si todo
    * sale bien, se guarda, sino se deshace.
    * Se puede evitar este modo de transacción si se pone false
    * en el parametro transaccion.
    * @param type $sql
    * @param type $transaccion
    * @return boolean
    */
   public function exec($sql, $transaccion = true)
   {
      return $this->engine->exec($sql, $transaccion);
   }

   /**
    * Devuleve el último ID asignado al hacer un INSERT en la base de datos.
    * @return type
    */
   public function lastval()
   {
      return $this->engine->lastval();
   }

   /**
    * Inicia una transacción SQL.
    * @return type
    */
   public function begin_transaction()
   {
      return $this->engine->begin_transaction();
   }

   /**
    * Guarda los cambios de una transacción SQL.
    * @return type
    */
   public function commit()
   {
      return $this->engine->commit();
   }

   /**
    * Deshace los cambios de una transacción SQL.
    * @return type
    */
   public function rollback()
   {
      return $this->engine->rollback();
   }

   /**
    * Escapa las comillas de la cadena de texto.
    * @param type $s
    * @return type
    */
   public function escape_string($s)
   {
      return $this->engine->escape_string($s);
   }

   /**
    * Devuelve el estilo de fecha del motor de base de datos.
    * @return type
    */
   public function date_style()
   {
      return $this->engine->date_style();
   }

   /**
    * Devuelve el SQL necesario para convertir la columna a entero.
    * @param type $col
    * @return type
    */
   public function sql_to_int($col)
   {
      return $this->engine->sql_to_int($col);
   }

   /**
    * Devuelve un array con las columnas de una tabla dada.
    * @param type $table
    * @return type
    */
   public function get_columns($table)
   {
      return $this->engine->get_columns($table);
   }

   /**
    * Devuelve una array con las restricciones de una tabla dada.
    * @param type $table
    * @return type
    */
   public function get_constraints($table)
   {
      return $this->engine->get_constraints($table);
   }

   /**
    * Devuelve una array con los indices de una tabla dada.
    * @param type $table
    * @return type
    */
   public function get_indexes($table)
   {
      return $this->engine->get_indexes($table);
   }

   /**
    * Devuelve un array con los bloqueos de la base de datos.
    * @return type
    */
   public function get_locks()
   {
      return $this->engine->get_locks();
   }

   /**
    * Compara dos arrays de columnas, devuelve una sentencia sql
    * en caso de encontrar diferencias.
    * @param type $table_name
    * @param type $xml_cols
    * @param type $columnas
    * @return type
    */
   public function compare_columns($table_name, $xml_cols, $columnas)
   {
      return $this->engine->compare_columns($table_name, $xml_cols, $columnas);
   }

   /**
    * Compara dos arrays de restricciones, devuelve una sentencia sql
    * en caso de encontrar diferencias.
    * @param type $table_name
    * @param type $c_nuevas
    * @param type $c_old
    * @param type $solo_eliminar
    * @return type
    */
   public function compare_constraints($table_name, $c_nuevas, $c_old, $solo_eliminar = false)
   {
      return $this->engine->compare_constraints($table_name, $c_nuevas, $c_old, $solo_eliminar);
   }

   /**
    * Devuelve la sentencia sql necesaria para crear una tabla con la estructura proporcionada.
    * @param type $table_name
    * @param type $xml_columnas
    * @param type $xml_restricciones
    * @return type
    */
   public function generate_table($table_name, $xml_columnas, $xml_restricciones)
   {
      return $this->engine->generate_table($table_name, $xml_columnas, $xml_restricciones);
   }

   /**
    * Realiza comprobaciones extra a la tabla.
    * @param type $table_name
    * @return type
    */
   public function check_table_aux($table_name)
   {
      return $this->engine->check_table_aux($table_name);
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
         return "'" . Date($this->db->date_style(), strtotime($v)) . "'";
      } else if (preg_match('/^([0-9]{1,2})-([0-9]{1,2})-([0-9]{4}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})$/i', $v)) /// es una fecha+hora
      {
         return "'" . Date($this->db->date_style() . ' H:i:s', strtotime($v)) . "'";
      } else {
         return "'" . $this->db->escape_string($v) . "'";
      }

   }

   public function str2bool($v)
   {
      return ($v == 't' or $v == '1');
   }

   public function intval($s)
   {
      if (is_null($s)) {
         return null;
      } else {
         return intval($s);
      }

   }
}
