<?php

/**
 * Usuario de FacturaScripts. Puede estar asociado a un agente.
 *
 * @author Carlos García Gómez <neorazorx@gmail.com>
 */
class fs_user extends \fs_db2
{

   public $nick;
   public $password;
   public $email;
   public $log_key;
   public $logged_on;
   public $cifnif;
   public $enabled;
   public $last_login;
   public $last_login_time;
   public $last_ip;
   public $last_browser;
   public $admin;
   public $webservices;

   public function __construct($a = false)
   {
      $this->db = new fs_db2();
      if ($a) {
         $this->nick       = $a['nick'];
         $this->password   = $a['password'];
         $this->email      = $a['email'];
         $this->log_key    = $a['log_key'];
         $this->cifnif     = $a['cifnif'];
         $this->last_login = null;
         if ($a['last_login']) {
            $this->last_login = Date('d-m-Y', strtotime($a['last_login']));
         }
         $this->last_login_time = null;
         if ($a['last_login_time']) {
            $this->last_login_time = $a['last_login_time'];
         }
         $this->last_ip      = $a['last_ip'];
         $this->last_browser = $a['last_browser'];
         $this->enabled      = true;
         if (isset($a['enabled'])) {
            $this->enabled = $this->str2bool($a['enabled']);
         }
         $this->admin = false;
         if (isset($a['admin'])) {
            $this->admin = $this->str2bool($a['admin']);
         }
         $this->webservices = null;
         if (isset($a['webservices'])) {
            $this->webservices = $a['webservices'];
         }
      } else {
         $this->nick            = null;
         $this->password        = null;
         $this->email           = null;
         $this->log_key         = null;
         $this->cifnif          = null;
         $this->admin           = false;
         $this->enabled         = true;
         $this->last_login      = null;
         $this->last_login_time = null;
         $this->last_ip         = null;
         $this->last_browser    = null;
         $this->webservices     = null;
      }

      $this->logged_on = false;
   }

   public function url()
   {
      if (is_null($this->nick)) {
         return 'index.php?page=admin_users';
      }

      return 'index.php?page=admin_user&snick=' . $this->nick;
   }

   public function show_last_login()
   {
      if (is_null($this->last_login)) {
         return '-';
      }

      return Date('d-m-Y', strtotime($this->last_login)) . ' ' . $this->last_login_time;
   }

   public function set_password($p = '')
   {
      $p = trim($p);
      if (mb_strlen($p) > 1 and mb_strlen($p) <= 32) {
         $this->password = sha1($p);
         return true;
      }

      $this->new_error_msg('La contraseña debe contener entre 1 y 32 caracteres.');
      return false;
   }

   /*
    * Modifica y guarda la fecha de login si tiene una diferencia de más de 5 minutos
    * con la fecha guardada, así se evita guardar en cada consulta
    */

   public function update_login()
   {
      $ltime = strtotime($this->last_login . ' ' . $this->last_login_time);
      if (time() - $ltime >= 300) {
         $this->last_login      = Date('d-m-Y');
         $this->last_login_time = Date('H:i:s');

         if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $this->last_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
         } else {
            $this->last_ip = $_SERVER['REMOTE_ADDR'];
         }

         $this->last_browser = $_SERVER['HTTP_USER_AGENT'];
         $this->save();
      }
   }

   /**
    * Genera una nueva clave de login, para usar en lugar de la contraseña (via cookie),
    * esto impide que dos o más personas utilicen el mismo usuario al mismo tiempo.
    */
   public function new_logkey()
   {
      if (is_null($this->log_key) or !FS_DEMO) {
         $this->log_key = sha1(strval(rand()));
      }

      $this->logged_on       = true;
      $this->last_login      = Date('d-m-Y');
      $this->last_login_time = Date('H:i:s');

      if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
         $this->last_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
         $this->last_ip = $_SERVER['REMOTE_ADDR'];
      }

      $this->last_browser = $_SERVER['HTTP_USER_AGENT'];
   }

   public function get($n = '')
   {
      $sql = "SELECT * FROM fs_users WHERE nick = " . $this->var2str($n) . ";";
      $u = $this->db->select($sql);
      if ($u) {
         return new \fs_user($u[0]);
      }

      return false;
   }

   public function get_by_cifnif($n = '')
   {
      $sql = "SELECT * FROM fs_users WHERE cifnif = " . $this->var2str($n) . ";";
      $u = $this->db->select($sql);
      if ($u) {
         return new \fs_user($u[0]);
      }

      return false;
   }

   public function get_by_cifnif_enabled($n = '')
   {
      $sql = "SELECT * FROM fs_users WHERE cifnif = " . $this->var2str($n) . " AND enabled = '1';";
      $u = $this->db->select($sql);
      if ($u) {
         return new \fs_user($u[0]);
      }

      return false;
   }

   public function get_by_nick_cifnif($nick,$cifnif)
   {
      $sql = "SELECT * FROM fs_users WHERE nick = " . $this->var2str($nick) . " OR cifnif = " . $this->var2str($cifnif);
      $u = $this->db->select($sql);
      if ($u) {
         return new \fs_user($u[0]);
      }

      return false;
   }

   public function get_by_cifnif_webservices($cifnif,$webservices)
   {
      $sql = "SELECT * FROM fs_users WHERE cifnif = " . $this->var2str($cifnif) . " AND webservices = " . $this->var2str($webservices)." AND enabled = '0'";
      $u = $this->db->select($sql);
      if ($u) {
         return new \fs_user($u[0]);
      }

      return false;
   }

   public function get_by_cifnif_webservices_ac($cifnif,$webservices)
   {
      $sql = "SELECT * FROM fs_users WHERE cifnif = " . $this->var2str($cifnif) . " AND webservices = " . $this->var2str($webservices)." AND enabled = '1'";
      $u = $this->db->select($sql);
      if ($u) {
         return new \fs_user($u[0]);
      }

      return false;
   }

   public function exists()
   {
      if (is_null($this->nick)) {
         return false;
      }

      return $this->db->select("SELECT * FROM fs_users WHERE nick = " . $this->var2str($this->nick) . ";");
   }

   public function test()
   {
      $this->nick         = trim($this->nick);
      $this->last_browser = $this->last_browser;

      if (!preg_match("/^[A-Z0-9_\+\.\-]{3,13}$/i", $this->nick)) {
         $this->new_error_msg("Nick no válido. Debe tener entre 3 y 13 caracteres,
            valen números o letras, pero no la Ñ ni acentos.");
         return false;
      }

      return true;
   }

   public function save()
   {
      if ($this->test()) {

         if ($this->exists()) {
            $sql = "UPDATE fs_users SET password = " . $this->var2str($this->password)
            . ", email = " . $this->var2str($this->email)
            . ", log_key = " . $this->var2str($this->log_key)
            . ", cifnif = " . $this->var2str($this->cifnif)
            . ", enabled = " . $this->var2str($this->enabled)
            . ", last_login = " . $this->var2str($this->last_login)
            . ", last_ip = " . $this->var2str($this->last_ip)
            . ", last_browser = " . $this->var2str($this->last_browser)
            . ", last_login_time = " . $this->var2str($this->last_login_time)
            . ", admin = " . $this->var2str($this->admin)
            . ", webservices = " . $this->var2str($this->webservices)
            . "  WHERE nick = " . $this->var2str($this->nick) . ";";
         } else {
            $sql = "INSERT INTO fs_users (nick,password,email,log_key,cifnif,enabled,
               last_login,last_login_time,last_ip,last_browser,admin,webservices) VALUES
               (" . $this->var2str($this->nick)
            . "," . $this->var2str($this->password)
            . "," . $this->var2str($this->email)
            . "," . $this->var2str($this->log_key)
            . "," . $this->var2str($this->cifnif)
            . "," . $this->var2str($this->enabled)
            . "," . $this->var2str($this->last_login)
            . "," . $this->var2str($this->last_login_time)
            . "," . $this->var2str($this->last_ip)
            . "," . $this->var2str($this->last_browser)
            . "," . $this->var2str($this->admin)
            . "," . $this->var2str($this->webservices)
               . ");";

         }
         return $this->db->exec($sql);
      }

      return false;
   }

   public function delete()
   {
      return $this->db->exec("DELETE FROM fs_users WHERE nick = " . $this->var2str($this->nick) . ";");
   }


   /**
    * Devuelve la lista completa de usuarios de FacturaScripts.
    * @return \fs_user
    */
   public function all()
   {
      $data = $this->db->select("SELECT * FROM fs_users ORDER BY lower(nick) ASC;");
      if ($data) {
         foreach ($data as $u) {
            $userlist[] = new \fs_user($u);
         }
      }
      return $userlist;
   }

   public function all_usuario_cliente($nick)
   {
      $data = $this->db->select("SELECT * FROM fs_users WHERE nick= " . $this->var2str($nick) . ";");
      if ($data) {
         foreach ($data as $u) {
            $userlist[] = new \fs_user($u);
         }
      }
      return $userlist;
   }

   /**
    * Devuelve la lista completa de usuarios activados.
    * @return \fs_user
    */
   public function all_enabled()
   {
      $userlist = array();

      $data = $this->db->select("SELECT * FROM fs_users WHERE enabled = TRUE ORDER BY lower(nick) ASC;");
      if ($data) {
         foreach ($data as $u) {
            $userlist[] = new \fs_user($u);
         }
      }

      return $userlist;
   }

   public function is_valid_email($str)
   {
      return (false !== strpos($str, "@") && false !== strpos($str, "."));
   }

   public function industrias()
   {
      $industriaslist = array();
      $sql = "SELECT * FROM tipo_industria WHERE padre != 'NULL' ORDER BY nombre";
      $data = $this->db->select($sql);
      if ($data) {
         foreach ($data as $u) {
            $industriaslist[] = $u;
         }
      }

      return $industriaslist;
   }
}
