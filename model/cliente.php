<?php

class cliente extends \fs_db2
{
   public $codcliente;
   public $nombre;
   public $razonsocial;
   public $tipoidfiscal;
   public $cifnif;
   public $telefono1;
   public $email;
   public $debaja;
   public $bloqueado;
   public $observaciones;
   public $direccion;

   public function __construct($c = false)
   {
      $this->db = new fs_db2();
      if ($c) {
         $this->codcliente    = $c['codcliente'];
         $this->nombre        = $c['nombre'];
         $this->razonsocial   = $c['razonsocial'];
         $this->tipoidfiscal  = $c['tipoidfiscal'];
         $this->cifnif        = $c['cifnif'];
         $this->telefono1     = $c['telefono1'];
         $this->email         = $c['email'];
         $this->debaja        = $this->str2bool($c['debaja']);
         $this->bloqueado     = $this->str2bool($c['bloqueado']);
         $this->observaciones = $this->no_html($c['observaciones']);
         $this->direccion     = $this->no_html($c['direccion']);
      } else {
         $this->codcliente    = null;
         $this->nombre        = '';
         $this->razonsocial   = '';
         $this->tipoidfiscal  = 'CEDULA';
         $this->cifnif        = '';
         $this->telefono1     = '';
         $this->email         = '';
         $this->debaja        = false;
         $this->bloqueado     = false;
         $this->observaciones = null;
         $this->direccion     = null;
      }
   }

   protected function install()
   {
      $this->clean_cache();
      return "INSERT INTO " . $this->table_name . " (codcliente,nombre,razonsocial,tipoidfiscal,cifnif,telefono1,email,direccion) VALUES ('000001','CONSUMIDOR FINAL','CONSUMIDOR FINAL','CEDULA','9999999999','0999999999','empresa@empresa.com','QUITO')";
   }

   public function observaciones_resume()
   {
      if ($this->observaciones == '') {
         return '-';
      } else if (strlen($this->observaciones) < 60) {
         return $this->observaciones;
      } else {
         return substr($this->observaciones, 0, 50) . '...';
      }

   }

   public function url()
   {
      if (is_null($this->codcliente)) {
         return "index.php?page=ventas_clientes";
      } else {
         return "index.php?page=ventas_cliente&cod=" . $this->codcliente;
      }
   }

   /**
    * Devuelve el cliente que tenga ese codcliente.
    * @param type $cod
    * @return \cliente|boolean
    */
   public function get($cod)
   {
      $sql = "SELECT * FROM " . $this->table_name . " WHERE codcliente = " . $this->var2str($cod) . ";";
      $cli = $this->db->select($sql);
      if ($cli) {
         return new \cliente($cli[0]);
      } else {
         return false;
      }
   }

   /**
    * Devuelve el primer cliente que tenga $cifnif como cifnif.
    * Si el cifnif está en blanco y se proporciona una razón social,
    * se devuelve el primer cliente que tenga esa razón social.
    * @param type $cifnif
    * @param type $razon
    * @return boolean|\cliente
    */
   public function get_by_cifnif($cifnif)
   {
      $cifnif = mb_strtolower($cifnif, 'UTF8');
      $sql    = "SELECT * FROM " . $this->table_name . " WHERE lower(cifnif) = " . $this->var2str($cifnif) . ";";

      $data = $this->db->select($sql);
      if ($data) {
         return new \cliente($data[0]);
      } else {
         return false;
      }
   }

   public function exists()
   {
      if (is_null($this->codcliente)) {
         return false;
      } else {
         return $this->db->select("SELECT * FROM " . $this->table_name . " WHERE codcliente = " . $this->var2str($this->codcliente) . ";");
      }
   }

   /**
    * Devuelve un código que se usará como clave primaria/identificador único para este cliente.
    * @return string
    */
   public function get_new_codigo()
   {
      $cod = $this->db->select("SELECT MAX(" . $this->db->sql_to_int('codcliente') . ") as cod FROM " . $this->table_name . ";");
      if ($cod) {
         return sprintf('%06s', (1 + intval($cod[0]['cod'])));
      } else {
         return '000001';
      }
   }

   public function test()
   {
      $status = false;

      if (is_null($this->codcliente)) {
         $this->codcliente = $this->get_new_codigo();
      } else {
         $this->codcliente = trim($this->codcliente);
      }

      $this->nombre        = $this->no_html($this->nombre);
      $this->razonsocial   = $this->no_html($this->razonsocial);
      $this->cifnif        = $this->no_html($this->cifnif);
      $this->observaciones = $this->no_html($this->observaciones);

      if (!preg_match("/^[A-Z0-9]{1,6}$/i", $this->codcliente)) {
         $this->new_error_msg("Código de cliente no válido: " . $this->codcliente);
      } else if (strlen($this->nombre) < 1 or strlen($this->nombre) > 300) {
         $this->new_error_msg("Nombre de cliente no válido: " . $this->nombre);
      } else if (strlen($this->razonsocial) < 1 or strlen($this->razonsocial) > 300) {
         $this->new_error_msg("Razón social del cliente no válida: " . $this->razonsocial);
      } else {
         $status = true;
      }
      return $status;
   }

   public function save($trans = true)
   {
      $cliente0 = false;
      if ($this->test()) {
         $this->clean_cache();
         if ($this->exists()) {
            $sql = "UPDATE " . $this->table_name . " SET nombre = " . $this->var2str($this->nombre)
            . ", razonsocial = " . $this->var2str($this->razonsocial)
            . ", tipoidfiscal = " . $this->var2str($this->tipoidfiscal)
            . ", cifnif = " . $this->var2str($this->cifnif)
            . ", telefono1 = " . $this->var2str($this->telefono1)
            . ", email = " . $this->var2str($this->email)
            . ", debaja = " . $this->var2str($this->debaja)
            . ", bloqueado = " . $this->var2str($this->bloqueado)
            . ", observaciones = " . $this->var2str($this->observaciones)
            . ", direccion = " . $this->var2str($this->direccion)
            . "  WHERE codcliente = " . $this->var2str($this->codcliente) . ";";
            return $this->db->exec($sql);
         } else {
            if (!$this->get_by_cifnif($this->cifnif)) {
               $sql = "INSERT INTO " . $this->table_name . " (codcliente, nombre, razonsocial, tipoidfiscal,
                 cifnif, telefono1, email, debaja, bloqueado, observaciones, direccion) VALUES
                        (" . $this->var2str($this->codcliente)
               . "," . $this->var2str($this->nombre)
               . "," . $this->var2str($this->razonsocial)
               . "," . $this->var2str($this->tipoidfiscal)
               . "," . $this->var2str($this->cifnif)
               . "," . $this->var2str($this->telefono1)
               . "," . $this->var2str($this->email)
               . "," . $this->var2str($this->debaja)
               . "," . $this->var2str($this->bloqueado)
               . "," . $this->var2str($this->observaciones)
               . "," . $this->var2str($this->direccion)
                  . ");";
            } else {
               $this->new_error_msg('El cliente ' . $this->cifnif . ' ya se encuentra registrado');
               return false;
            }
            if ($this->db->exec($sql)) {
               return true;
            } else {
               return false;
            }
         }
      } else {
         return false;
      }
   }

   public function delete()
   {
      $this->clean_cache();
      $sql = "DELETE FROM " . $this->table_name . " WHERE codcliente = " . $this->var2str($this->codcliente) . ";";
      if ($this->db->exec($sql)) {
         return true;
      } else {
         return false;
      }
   }

   private function clean_cache()
   {
      $this->cache->delete('m_cliente_all');
   }

   public function all($offset = 0)
   {
      $clientlist = array();
      $data       = $this->db->select_limit("SELECT * FROM " . $this->table_name . " ORDER BY nombre ASC", FS_ITEM_LIMIT, $offset);
      if ($data) {
         foreach ($data as $d) {
            $clientlist[] = new \cliente($d);
         }
      }
      return $clientlist;
   }

   /**
    * Devuelve un array con la lista completa de clientes.
    * @return \cliente
    */
   public function all_full()
   {
      /// si no la encontramos en la caché, leemos de la base de datos
      $data = $this->db->select("SELECT * FROM " . $this->table_name . " ORDER BY nombre ASC;");
      if ($data) {
         foreach ($data as $d) {
            $clientlist[] = new \cliente($d);
         }
      }

      return $clientlist;
   }

   public function all_without_limit()
   {
      $clientlist = array();
      $data       = $this->db->select("SELECT * FROM " . $this->table_name . " ORDER BY nombre ASC;");
      if ($data) {
         foreach ($data as $d) {
            $clientlist[] = new \cliente($d);
         }
      }
      return $clientlist;
   }

   public function search($query, $offset = 0)
   {
      $clilist = array();
      $buscar  = false;
      $query   = mb_strtolower($this->no_html($query), 'UTF8');
      $consulta = "SELECT * FROM " . $this->table_name . " c WHERE c.debaja = FALSE AND  ";
      if (is_numeric($query)) {
         $consulta .= "(c.codcliente LIKE '%" . $query . "%' OR c.cifnif LIKE '%" . $query . "%'"
            . " OR c.telefono1 LIKE '" . $query . "%'"
            . " OR c.observaciones LIKE '%" . $query . "%')";
      } else {
         $buscar = str_replace(' ', '%', $query);
         $consulta .= "(lower(c.nombre) LIKE '%" . $buscar . "%' OR lower(c.razonsocial) LIKE '%" . $buscar . "%'"
            . " OR lower(c.cifnif) LIKE '%" . $buscar . "%' OR lower(c.observaciones) LIKE '%" . $buscar . "%'"
            . " OR lower(c.email) LIKE '%" . $buscar . "%')";
      }
      $consulta .= " ORDER BY c.nombre ASC";
      $data = $this->db->select_limit($consulta, FS_ITEM_LIMIT, $offset);
      if ($data) {
         foreach ($data as $d) {
            //pondré una variable extra, diviendo en dos pasos
            #paso1
            $tmp = new \cliente($d);
            #paso2
            $clilist[] = $tmp;
         }
      }
      return $clilist;
   }

   public function search_cli($query, $offset = 0)
   {
      $clilist = array();
      $buscar  = false;
      $query   = mb_strtolower($this->no_html($query), 'UTF8');

      $consulta = "SELECT * FROM " . $this->table_name . " c WHERE c.debaja = FALSE AND  ";

      if (is_numeric($query)) {
         $consulta .= "(c.codcliente LIKE '%" . $query . "%' OR c.cifnif LIKE '%" . $query . "%'"
            . " OR c.telefono1 LIKE '" . $query . "%' OR c.telefono2 LIKE '" . $query . "%'"
            . " OR c.observaciones LIKE '%" . $query . "%')";
      } else {
         $buscar = str_replace(' ', '%', $query);
         $consulta .= "(lower(c.nombre) LIKE '%" . $buscar . "%' OR lower(c.razonsocial) LIKE '%" . $buscar . "%'"
            . " OR lower(c.cifnif) LIKE '%" . $buscar . "%' OR lower(c.observaciones) LIKE '%" . $buscar . "%'"
            . " OR lower(c.email) LIKE '%" . $buscar . "%')";
      }
      $consulta .= " ORDER BY c.nombre ASC";
      $data = $this->db->select_limit($consulta, FS_ITEM_LIMIT, $offset);
      if ($data) {
         foreach ($data as $d) {
            //pondré una variable extra, diviendo en dos pasos
            #paso1
            $tmp = new \cliente($d);
            #paso2
            $clilist[] = $tmp;
         }
      }
      return $clilist;
   }

   /**
    * Busca por cedruc.
    * @param type $id
    * @param type $offset
    * @return \cliente
    */
   public function search_by_ced_ruc($id)
   {
      $query    = mb_strtolower($this->no_html($dni), 'UTF8');
      $consulta = "SELECT * FROM " . $this->table_name . " WHERE debaja = FALSE "
         . "AND cifnif = '" . $query . "' ";
      $data = $this->db->select($consulta);
      if ($data) {
         return new \cliente($data[0]);
      } else {
         return false;
      }
   }

   public function get_cliente_ced($ced)
   {
      $sql  = "SELECT * FROM " . $this->table_name . " WHERE cifnif = '" . $ced . "';";
      $data = $this->db->select($sql);
      if ($data) {
         return new \cliente($data[0]);
      } else {
         return false;
      }
   }

   public function get_razonsocial($razonsocial)
   {
      $sql  = "SELECT * FROM $this->table_name WHERE razonsocial = '$razonsocial'";
      $data = $this->db->select($sql);
      if ($data) {
         return new \cliente($data[0]);
      } else {
         return array('valor' => false);
      }
   }

   public function validarCorreo($email_a)
   {
      if (filter_var($email_a, FILTER_VALIDATE_EMAIL)) {
         return true;
      } else {
         return false;
      }
   }
}
