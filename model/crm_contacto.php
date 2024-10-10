<?php

class crm_contacto extends \fs_db2
{

   /// clave primaria. varchar(6)
   public $codcontacto;

   public $nif;
   public $personafisica;
   public $nombre;
   public $empresa;
   public $ruc_app;
   public $nomcomer_app;
   public $urllogo_app;
   public $serv_app;
   public $idtipo;
   public $nombbdd;
   public $horario;
   public $descripcion;
   public $cargo;
   public $email;
   public $telefono1;
   public $telefono2;
   public $direccion;
   public $codpostal;
   public $ciudad;
   public $provincia;
   public $codpais;
   public $admitemarketing;
   public $observaciones;
   public $codagente;
   public $fechaalta;
   public $ultima_comunicacion;
   public $fuente;
   public $estado;
   public $potencial;
   public $codgrupo;
   public $publico;
   public $intervalo;
   public $turnos_intervalo;
   public $intervalo_descanso;
   public $lunes;
   public $martes;
   public $miercoles;
   public $jueves;
   public $viernes;
   public $sabado;
   public $domingo;
   public $perm_cobro;

   public function __construct($d = false)
   {
      $this->db = new fs_db2();
      if ($d) {
         $this->codcontacto         = $d['codcontacto'];
         $this->nif                 = $d['nif'];
         $this->personafisica       = $this->str2bool($d['personafisica']);
         $this->nombre              = $d['nombre'];
         $this->empresa             = $d['empresa'];
         $this->ruc_app             = $d['ruc_app'];
         $this->nomcomer_app        = $d['nomcomer_app'];
         $this->urllogo_app         = $d['urllogo_app'];
         $this->serv_app            = $d['serv_app'];
         $this->idtipo              = $d['idtipo'];
         $this->nombbdd             = $d['nombbdd'];
         $this->horario             = $d['horario'];
         $this->descripcion         = $d['descripcion'];
         $this->cargo               = $d['cargo'];
         $this->email               = $d['email'];
         $this->telefono1           = $d['telefono1'];
         $this->telefono2           = $d['telefono2'];
         $this->direccion           = $d['direccion'];
         $this->codpostal           = $d['codpostal'];
         $this->ciudad              = $d['ciudad'];
         $this->provincia           = $d['provincia'];
         $this->codpais             = $d['codpais'];
         $this->admitemarketing     = $this->str2bool($d['admitemarketing']);
         $this->observaciones       = $d['observaciones'];
         $this->codagente           = $d['codagente'];
         $this->fechaalta           = date("d-m-Y", strtotime($d['fechaalta']));
         $this->ultima_comunicacion = date("d-m-Y", strtotime($d['ultima_comunicacion']));
         $this->fuente              = $d['fuente'];
         $this->estado              = $d['estado'];
         $this->potencial           = $d['potencial'];
         $this->codgrupo            = $d['codgrupo'];
         $this->publico             = $this->str2bool($d['publico']);
         $this->intervalo           = $d['intervalo'];
         $this->turnos_intervalo    = $d['turnos_intervalo'];
         $this->intervalo_descanso  = $d['intervalo_descanso'];
         $this->lunes               = $this->str2bool($d['lunes']);
         $this->martes              = $this->str2bool($d['martes']);
         $this->miercoles           = $this->str2bool($d['miercoles']);
         $this->jueves              = $this->str2bool($d['jueves']);
         $this->viernes             = $this->str2bool($d['viernes']);
         $this->sabado              = $this->str2bool($d['sabado']);
         $this->domingo             = $this->str2bool($d['domingo']);
         $this->perm_cobro          = $this->str2bool($d['perm_cobro']);
      } else {
         /// valores predeterminados
         $this->codcontacto         = null;
         $this->nif                 = null;
         $this->personafisica       = false;
         $this->nombre              = null;
         $this->empresa             = null;
         $this->ruc_app             = null;
         $this->nomcomer_app        = null;
         $this->urllogo_app         = null;
         $this->serv_app            = null;
         $this->idtipo              = null;
         $this->nombbdd             = null;
         $this->horario             = null;
         $this->descripcion         = null;
         $this->cargo               = null;
         $this->email               = null;
         $this->telefono1           = null;
         $this->telefono2           = null;
         $this->direccion           = null;
         $this->codpostal           = null;
         $this->ciudad              = null;
         $this->provincia           = null;
         $this->codpais             = null;
         $this->admitemarketing     = false;
         $this->observaciones       = null;
         $this->codagente           = null;
         $this->fechaalta           = date('d-m-Y');
         $this->ultima_comunicacion = date('d-m-Y');
         $this->fuente              = null;
         $this->estado              = null;
         $this->potencial           = null;
         $this->codgrupo            = null;
         $this->publico             = false;
         $this->intervalo           = null;
         $this->turnos_intervalo    = null;
         $this->intervalo_descanso  = null;
         $this->lunes               = false;
         $this->martes              = false;
         $this->miercoles           = false;
         $this->jueves              = false;
         $this->viernes             = false;
         $this->sabado              = false;
         $this->domingo             = false;
         $this->perm_cobro          = false;
      }
   }

   public function url()
   {
      if (is_null($this->codcontacto)) {
         return 'index.php?page=inicio';
      } else {
         return 'index.php?page=empresa&cod=' . $this->codcontacto;
      }
   }

   public function all()
   {
      $array = array();
      $sql   = "SELECT * FROM crm_contactos WHERE personafisica = 1";
      $data  = $this->db->select($sql);
      if ($data) {
         foreach ($data as $d) {
            $array[] = new \crm_contacto($d);
         }
      }

      return $array;
   }

   public function get($cod)
   {
      $data = $this->db->select("SELECT * FROM crm_contactos WHERE codcontacto = " . $this->var2str($cod) . ";");
      if ($data) {
         return new crm_contacto($data[0]);
      } else {
         return false;
      }

   }
}
