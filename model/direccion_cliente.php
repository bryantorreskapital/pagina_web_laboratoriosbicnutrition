<?php
class direccion_cliente extends \fs_db2
{
   public $id;
   public $codcliente;
   public $codpais;
   public $direccion;
   public $fecha;
   public $latitud;
   public $longitud;

   public function __construct($d = false)
   {
      $this->db = new fs_db2();
      if ($d) {
         $this->id         = $this->intval($d['id']);
         $this->codcliente = $d['codcliente'];
         $this->codpais    = $d['codpais'];
         $this->direccion  = $d['direccion'];
         $this->fecha      = date('d-m-Y', strtotime($d['fecha']));
         $this->latitud    = $d['domfacturacion'];
         $this->longitud   = $d['longitud'];
      } else {
         $this->id          = null;
         $this->codcliente  = null;
         $this->codpais     = null;
         $this->direccion   = null;
         $this->fecha       = date('d-m-Y');
         $this->latitud     = null;
         $this->longitud    = null;
         $this->descripcion = 'Principal';
      }
   }

   protected function install()
   {
      return '';
   }

   public function get($id)
   {
      $data = $this->db->select("SELECT * FROM dirclientes WHERE id = " . $this->var2str($id) . ";");
      if ($data) {
         return new \direccion_cliente($data[0]);
      } else {
         return false;
      }

   }

   public function getbyclient($id)
   {
      $data = $this->db->select("SELECT * FROM dirclientes WHERE codcliente = " . $this->var2str($id) . ";");
      if ($data) {
         return new \direccion_cliente($data[0]);
      } else {
         return false;
      }

   }

   public function getbyclient2($id)
   {
      $data = $this->db->select("SELECT * FROM dirclientes WHERE codcliente = " . $this->var2str($id) . ";");
      if (isset($data[1])) {
         return new \direccion_cliente($data[1]);
      } else {
         return false;
      }

   }

   public function getbydomenvio($id)
   {
      $data = $this->db->select("SELECT * FROM dirclientes WHERE codcliente = " . $this->var2str($id) . " AND domenvio = 1;");
      if ($data) {
         return new \direccion_cliente($data[0]);
      } else {
         return false;
      }

   }

   public function pertenece($cliente, $ciudad)
   {
      $data = $this->db->select("SELECT * FROM dirclientes WHERE codcliente = " . $this->var2str($cliente) . " AND ciudad = " . $this->var2str($ciudad) . ";");
      if ($data) {
         return true;
      } else {
         return false;
      }

   }

   public function exists()
   {
      if (is_null($this->id)) {
         return false;
      } else {
         return $this->db->select("SELECT * FROM dirclientes WHERE id = " . $this->var2str($this->id) . ";");
      }

   }

   public function save()
   {
      /// actualizamos la fecha de modificación
      $this->fecha = date('d-m-Y');

      if ($this->exists()) {
         $sql = "UPDATE dirclientes SET codcliente = " . $this->var2str($this->codcliente)
         . ", codpais = " . $this->var2str($this->codpais)
         . ", direccion = " . $this->var2str($this->direccion)
         . ", fecha = " . $this->var2str($this->fecha)
         . ", latitud = " . $this->var2str($this->latitud)
         . ", longitud = " . $this->var2str($this->longitud)
         . "  WHERE id = " . $this->var2str($this->id) . ";";
         return $this->db->exec($sql);
      } else {
         $sql = "INSERT INTO dirclientes (codcliente,codpais,direccion,fecha,latitud,longitud) VALUES (" . $this->var2str($this->codcliente)
         . "," . $this->var2str($this->codpais)
         . "," . $this->var2str($this->direccion)
         . "," . $this->var2str($this->fecha)
         . "," . $this->var2str($this->latitud)
         . "," . $this->var2str($this->longitud)
            . ");";
         if ($this->db->exec($sql)) {
            $this->id = $this->db->lastval();
            return true;
         } else {
            return false;
         }

      }
   }

   public function delete()
   {
      $sql = "DELETE FROM dirclientes WHERE id = " . $this->var2str($this->id) . ";";
      return $this->db->exec($sql);
   }

   public function all($offset = 0)
   {
      $dirlist = array();

      $data = $this->db->select_limit("SELECT * FROM dirclientes ORDER BY id ASC", FS_ITEM_LIMIT, $offset);
      if ($data) {
         foreach ($data as $d) {
            $dirlist[] = new \direccion_cliente($d);
         }
      }

      return $dirlist;
   }

   public function all_from_cliente($cod)
   {
      $dirlist = array();
      $sql     = "SELECT * FROM dirclientes WHERE codcliente = " . $this->var2str($cod)
         . " ORDER BY id DESC;";

      $data = $this->db->select($sql);
      if ($data) {
         foreach ($data as $d) {
            $dirlist[] = new \direccion_cliente($d);
         }
      }
      //print_r($dirlist);
      return $dirlist;
   }
   public function dir_cliente_sec_datos($codcliente_busc1, $direccion_sec1)
   {
      /// desactivamos la plantilla HTML
      $this->template = false;
      $json           = array();
      $consulta       = "SELECT * FROM dirclientes d LEFT JOIN  provincia p ON d.ciudad=p.codigo  WHERE d.codcliente=" . $codcliente_busc1 . " AND d.id=" . $direccion_sec1 . "";
      $data           = $this->db->select_limit($consulta);

      if ($data) {

         return $data[0];
      } else {

         return false;
      }

   }
}
