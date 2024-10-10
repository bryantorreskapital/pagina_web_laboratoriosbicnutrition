<?php

date_default_timezone_set('America/Guayaquil');


require_once 'base/fs_core_log.php';
require_once 'base/fs_db2.php';
require_once 'base/fs_functions.php';
require_once FS_PATH . 'extras/phpmailer/class.phpmailer.php';
require_all_models();
/**
 * La clase principal de la que deben heredar todos los controladores
 * (las páginas) de FacturaScripts.
 *
 * @author Carlos García Gómez <neorazorx@gmail.com>
 */
class fs_controller
{
   /**
    * Este objeto permite acceso directo a la base de datos.
    * @var fs_db2
    */
   protected $db;

   /**
    * Este objeto contiene los mensajes, errores y consejos volcados por controladores,
    * modelos y base de datos.
    * @var fs_core_log
    */
   private $core_log;

   /**
    * Nombre del controlador (lo utilizamos en lugar de __CLASS__ porque __CLASS__
    * en las funciones de la clase padre es el nombre de la clase padre).
    * @var string
    */
   protected $class_name;

   /**
    * El elemento del menú de esta página
    * @var fs_page
    */
   public $page;

   /**
    * El usuario que ha hecho login
    * @var fs_user
    */
   public $user;

   /**
    * La empresa
    * @var empresa
    */
   public $empresa;
   public $familia;
   public $fabricante;
   public $almacen;
   public $simbolo_divisa;
   public $coddivisa;

   /**
    * Indica que archivo HTML hay que cargar
    * @var string|false
    */
   public $template;

   /**
    * Esta variable contiene el texto enviado como parámetro query por cualquier formulario,
    * es decir, se corresponde con $_REQUEST['query']
    * @var string
    */
   public $query;
   public $title;
   public $name;

   public $latitude;
   public $longitude;
   public $user_bd;
   public $pasw_bd;
   /**
    * @param string $name sustituir por __CLASS__
    * @param string $title es el título de la página, y el texto que aparecerá en el menú
    */
   public function __construct($name = __CLASS__, $title = 'home')
   {
      $tiempo               = explode(' ', microtime());
      $this->uptime         = $tiempo[1] + $tiempo[0];
      $this->simbolo_divisa = '$';
      $this->coddivisa      = 'USD';
      $this->class_name     = $name;
      $this->core_log       = new fs_core_log($name);
      $this->db             = new fs_db2();
      $this->title          = $title;
      $this->name           = $name;
      $this->user_bd        = FS_DB_USER;
      $this->pasw_bd        = FS_DB_PASS;
      if ($this->db->connect()) {
         session_start();
         if (filter_input(INPUT_COOKIE, 'latitude') and filter_input(INPUT_COOKIE, 'longitude')) {
            $this->latitude  = filter_input(INPUT_COOKIE, 'latitude');
            $this->longitude = filter_input(INPUT_COOKIE, 'longitude');
         }
         $this->user = new fs_user();
         if (filter_input(INPUT_GET, 'logout')) {
            if ($name == __CLASS__) {
               $this->template = 'index';
            } else {
               $this->template = $name;
               $this->pre_private_core();
               $this->private_core();
            }
            $this->log_out(true);
         } elseif ($name == '') {
            $this->template = 'index';
         } else if (isset($_GET['page']) && $_GET['page'] == 'about') {
            $this->template = 'about';
         } else if (isset($_GET['page']) && $_GET['page'] == 'contact') {
            $this->template = 'contact';
         } else {
            $this->log_in();
            if (isset($_POST['recuperar'])) {
               $this->recuperar();
            }
            if ($name == __CLASS__) {
               $this->template = 'index';
            } else {
               $this->template = $name;
               $this->pre_private_core();
               $this->private_core();
            }
         }
      } else {
         echo '¡Imposible conectar con la base de datos <b>' . FS_DB_NAME . '</b>!';
      }
   }

   private function pre_private_core()
   {
      $this->query = '';
      if (filter_input(INPUT_POST, 'query')) {
         $this->query = filter_input(INPUT_POST, 'query');
      } else if (filter_input(INPUT_GET, 'query')) {
         $this->query = filter_input(INPUT_GET, 'query');
      }
   }

   /**
    * Cierra la conexión con la base de datos.
    */
   public function close()
   {
      $this->db->close();
   }

   /**
    * Devuelve la URL de esta página (index.php?page=LO-QUE-SEA)
    * @return string
    */
   public function url()
   {
      return 'index.php?page=' . $this->name;
   }

   /**
    * Función que se ejecuta si el usuario no ha hecho login
    */
   protected function public_core()
   {

   }

   /**
    * Esta es la función principal que se ejecuta cuando el usuario ha hecho login
    */
   protected function private_core()
   {

   }

   /**
    * Redirecciona a la página predeterminada para el usuario
    */
   public function select_default_page()
   {
      if ($this->db->connected()) {
         $page = 'home';
         header('Location: index.php?page=' . $page);
      }
   }

   /**
    * Devuelve la fecha actual
    * @return string la fecha en formato día-mes-año
    */
   public function today()
   {
      return date('d-m-Y');
   }

   /**
    * Devuelve la hora actual
    * @return string la hora en formato hora:minutos:segundos
    */
   public function hour()
   {
      return Date('H:i:s');
   }

   /**
    * Devuelve un string aleatorio de longitud $length
    * @param integer $length la longitud del string
    * @return string la cadena aleatoria
    */
   public function random_string($length = 30)
   {
      return mb_substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
   }

   /**
    * He detectado que algunos navegadores, en algunos casos, envían varias veces la
    * misma petición del formulario. En consecuencia se crean varios modelos (asientos,
    * albaranes, etc...) con los mismos datos, es decir, duplicados.
    * Para solucionarlo añado al formulario un campo petition_id con una cadena
    * de texto aleatoria. Al llamar a esta función se comprueba si esa cadena
    * ya ha sido almacenada, de ser así devuelve TRUE, así no hay que gabar los datos,
    * si no, se almacena el ID y se devuelve FALSE.
    * @param string $id el identificador de la petición
    * @return boolean TRUE si la petición está duplicada
    */
   protected function duplicated_petition($id)
   {
      $ids = $this->cache->get_array('petition_ids');
      if (in_array($id, $ids)) {
         return true;
      } else {
         $ids[] = $id;
         $this->cache->set('petition_ids', $ids, 300);
         return false;
      }
   }

   /**
    * Devuelve un string con el precio en el formato predefinido y con la
    * divisa seleccionada (o la predeterminada).
    * @param float $precio
    * @param string $coddivisa
    * @param string $simbolo
    * @param integer $dec nº de decimales
    * @return string
    */
   public function show_precio($precio = 0, $coddivisa = false, $dec = FS_NF0, $simbolo = true)
   {
      if ($this->coddivisa != -1) {
         if (FS_POS_DIVISA == 'right') {
            if ($simbolo) {
               return number_format($precio, $dec, FS_NF1, FS_NF2) . ' ' . $this->simbolo_divisa;
            }

            return number_format($precio, $dec, FS_NF1, FS_NF2) . ' ' . $this->coddivisa;
         }

         if ($simbolo) {
            return $this->simbolo_divisa . number_format($precio, $dec, FS_NF1, FS_NF2);
         }
         return $this->coddivisa . ' ' . number_format($precio, $dec, FS_NF1, FS_NF2);
      } else {
         return ' ' . number_format($precio, $dec, FS_NF1, FS_NF2);
      }

   }

   /**
    * Devuelve un string con el número en el formato de número predeterminado.
    * @param float $num
    * @param integer $decimales
    * @param boolean $js
    * @return string
    */
   public function show_numero($num = 0, $decimales = FS_NF0, $js = false)
   {
      if ($js) {
         return number_format($num, $decimales, '.', '');
      }

      return number_format($num, $decimales, FS_NF1, FS_NF2);
   }

   public function show_numero2($num = 0, $decimales = FS_NF0, $miles = ',', $dec = '.')
   {
      return number_format($num, $decimales, $dec, $miles);
   }

   /**
    * Busca en la lista de plugins activos, en orden inverso de prioridad
    * (el último plugin activo tiene más prioridad que el primero)
    * y nos devuelve la ruta del archivo javascript que le solicitamos.
    * Así usamos el archivo del plugin con mayor prioridad.
    * @param string $filename
    * @return string
    */
   public function get_js_location($filename)
   {
      /// si no está en los plugins estará en el núcleo
      return FS_PATH . 'js/' . $filename . '?updated=' . date('YmdH');
   }

   public function lastDay($month, $year)
   {
      $day = date("d", mktime(0, 0, 0, $month + 1, 0, $year));
      return date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));
   }

   /**
    * Captura la ip local del cliente
    * @var iplocal
    */
   public function get_ip_local()
   {
      $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
      socket_connect($sock, "8.8.8.8", 53);
      socket_getsockname($sock, $name); // $name passed by reference
      $localAddr = $name;
      return $localAddr;
   }

   /**
    * Muestra al usuario un mensaje de error
    * @param string $msg el mensaje a mostrar
    */
   public function new_error_msg($msg = '', $tipo = 'error', $alerta = false, $guardar = true)
   {
      if ($msg && $this->class_name == $this->core_log->controller_name()) {
         /// solamente nos interesa mostrar los mensajes del controlador que inicia todo
         /// mostramos errores solo a los administradores
         if ($this->user->nick == "") {
            $this->core_log->new_error($msg);
         } else {
            if ($this->user->admin) {
               $this->core_log->new_error($msg);
            } else {
               $this->core_log->new_warning('Hubo un inconveniente. Contacte con el Administrador.');
            }
         }
      }
   }

   /**
    * Devuelve la lista de errores
    * @return array lista de errores
    */
   public function get_errors()
   {
      return $this->core_log->get_errors();
   }

   /**
    * Muestra al usuario un mensaje de error
    * @param string $msg el mensaje a mostrar
    */
   public function new_warning($msg = '', $tipo = 'error', $alerta = false, $guardar = true)
   {
      if ($msg && $this->class_name == $this->core_log->controller_name()) {
         /// solamente nos interesa mostrar los mensajes del controlador que inicia todo
         $this->core_log->new_warning($msg);
      }
   }

   /**
    * Devuelve la lista de errores
    * @return array lista de errores
    */
   public function get_warnings()
   {
      return $this->core_log->get_warnings();
   }

   /**
    * Muestra un mensaje al usuario
    * @param string $msg
    * @param boolean $save
    * @param string $tipo
    * @param boolean $alerta
    */
   public function new_message($msg = '', $save = false, $tipo = 'msg', $alerta = false)
   {
      if ($msg && $this->class_name == $this->core_log->controller_name()) {
         /// solamente nos interesa mostrar los mensajes del controlador que inicia todo
         $this->core_log->new_message($msg);
      }
   }

   /**
    * Devuelve la lista de mensajes
    * @return array lista de mensajes
    */
   public function get_messages()
   {
      return $this->core_log->get_messages();
   }

   /**
    * Muestra un consejo al usuario
    * @param string $msg el consejo a mostrar
    */
   public function new_advice($msg = '')
   {
      if ($msg and $this->class_name == $this->core_log->controller_name()) {
         /// solamente nos interesa mostrar los mensajes del controlador que inicia todo
         $this->core_log->new_advice($msg);
      }
   }

   /**
    * Devuelve la lista de consejos
    * @return array lista de consejos
    */
   public function get_advices()
   {
      return $this->core_log->get_advices();
   }

   private function log_out($rmuser = false)
   {
      $path = '/';

      if (filter_input(INPUT_SERVER, 'REQUEST_URI')) {
         $aux = parse_url(str_replace('/index.php', '', filter_input(INPUT_SERVER, 'REQUEST_URI')));
         if (isset($aux['path'])) {
            $path = $aux['path'];
            if (substr($path, -1) != '/') {
               $path .= '/';
            }
         }
      }

      /// borramos las cookies
      if (filter_input(INPUT_COOKIE, 'logkey')) {
         setcookie('logkey', '', time() - FS_COOKIES_EXPIRE);
         setcookie('logkey', '', time() - FS_COOKIES_EXPIRE, $path);
         if ($path != '/') {
            setcookie('logkey', '', time() - FS_COOKIES_EXPIRE, '/');
         }
      }

      /// ¿Eliminamos la cookie del usuario?
      if ($rmuser and filter_input(INPUT_COOKIE, 'user')) {
         setcookie('user', '', time() - FS_COOKIES_EXPIRE);
         setcookie('user', '', time() - FS_COOKIES_EXPIRE, $path);
      }
   }

   private function log_in()
   {
      if (filter_input(INPUT_COOKIE, 'user') and filter_input(INPUT_COOKIE, 'logkey')) {
         $nick   = filter_input(INPUT_COOKIE, 'user');
         $logkey = filter_input(INPUT_COOKIE, 'logkey');
         $user   = $this->user->get($nick);
         if ($user and $user->enabled) {
            if ($user->log_key == $logkey) {
               $user->logged_on = true;
               $user->update_login();
               setcookie('user', $user->nick, time() + FS_COOKIES_EXPIRE);
               setcookie('logkey', $user->log_key, time() + FS_COOKIES_EXPIRE);
               $this->user = $user;
            } else if (!is_null($user->log_key)) {
               $this->new_message('¡Cookie no válida! Alguien ha accedido a esta cuenta desde otro PC con IP: '
                  . $user->last_ip . ". Si has sido tú, ignora este mensaje.");
               $this->log_out();
            }
         } else {
            $this->new_error_msg('¡El usuario ' . $nick . ' no existe o está desactivado!');
            $this->log_out(true);
         }
      } elseif (isset($_POST['iniciar'])) {
         $nick     = filter_input(INPUT_POST, 'usuario');
         $password = filter_input(INPUT_POST, 'password');
         $user     = $this->user->get($nick);
         if ($user and $user->enabled) {
            if ($user->password == sha1($password) or $user->password == sha1(mb_strtolower($password, 'UTF8'))) {
               setcookie('user', $user->nick, time() + FS_COOKIES_EXPIRE);
               setcookie('logkey', $user->log_key, time() + FS_COOKIES_EXPIRE);
               $this->user  = $user;
               $this->admin = $user->admin;
            } else {
               $this->new_error_msg('¡Contraseña incorrecta! (' . $nick . ')', 'login', true);
            }
         } else if ($user and !$user->enabled) {
            $this->new_error_msg('El usuario ' . $user->nick . ' está desactivado, habla con tu administrador!', 'login', true);
         } else {
            $this->new_error_msg('El usuario o contraseña no coinciden!');
         }
      }
   }

   private function recuperar()
   {
      $user = $this->user->get_by_cifnif_enabled($_POST['cifnif']);
      if ($user) {
         $hash              = md5(rand(0, 1000));
         $user->webservices = $hash;
         if ($user->save()) {
            try {
               $to      = $user->email;
               $subject = "Restaurar Contraseña";
               $txt     = "Gracias por Comunicarte!" . "\r\n";
               $txt .= "Para reestablecer su contraseña presione la URL a continuación." . "\r\n";
               $txt .= "--------------------------------------" . "\r\n";
               $txt .= "Usuario: " . $user->nick . "\r\n";
               $txt .= "CI / RUC: " . $user->cifnif . "\r\n";
               $txt .= "--------------------------------------" . "\r\n";
               $txt .= "Haga clic en este enlace para reestablecer su contraseña:" . "\r\n";
               $txt .= FS_WEB."reestablish?cifnif=" . $user->cifnif . "&hash=" . $user->webservices . "\r\n";
               $headers = "From: info@melocoton.app" . "\r\n";
               if (mail($to, $subject, $txt, $headers)) {
                  $this->new_message("Se envio un mensaje a su correo electrónico, por favor verificarlo para continuar con el Reestecimiento de su contraseña!");
               } else {
                  $this->new_error_msg("Ocurrió un inconveniente y no se envió. Te recomendamos dar click en los números de teléfono que constan arriba");
               }
            } catch (Exception $exc) {
               $this->new_error_msg("Ocurrió un inconveniente y no se envió. Te recomendamos dar click en los números de teléfono que constan arriba");
            }
         }
      } else {
         $this->new_error_msg("No existe la cuenta!");
      }
   }

   private function registro()
   {
      $hash = md5(rand(0, 1000));
      $nom  = $_POST['nombre'];
      $ap   = $_POST['apellido'];
      $us   = $_POST['usuario'];
      $pa   = $_POST['pass'];
      $ci   = $_POST['cifnif'];
      $em   = $_POST['email'];
      $tel  = $_POST['telefono'];
      $dir  = $_POST['direccion'];
      $lat  = filter_input(INPUT_COOKIE, 'latitude');
      $lon  = filter_input(INPUT_COOKIE, 'longitude');
      $user = $this->user->get_by_nick_cifnif($us, $ci);
      if (!$user) {
         $user              = new fs_user();
         $user->nick        = $us;
         $user->password    = sha1($pa);
         $user->email       = $em;
         $user->cifnif      = $ci;
         $user->enabled     = 0;
         $user->webservices = $hash;
         if ($user->save()) {
            $cliente               = new cliente();
            $cliente->cifnif       = $ci;
            $cliente->codcliente   = $cliente->get_new_codigo();
            $cliente->coddivisa    = 'USD';
            $cliente->codpago      = 'CRED';
            $cliente->telefono1    = $tel;
            $cliente->email        = $em;
            $cliente->fechaalta    = $this->today();
            $cliente->nombre       = $nom . ' ' . $ap;
            $cliente->razonsocial  = $cliente->nombre;
            $cliente->regimeniva   = 'General';
            $cliente->tipoidfiscal = $tipof;
            $cliente->nick         = $us;
            if ($cliente->save()) {
               $dir             = new direccion_cliente();
               $dir->codcliente = $cliente->codcliente;
               $dir->codpais    = 'ECU';
               $dir->direccion  = $dir;
               $dir->fecha      = $this->today();
               $dir->latitud    = $lat;
               $dir->longitud   = $lon;
               if ($dir->save()) {
                  try {
                     $to      = $em;
                     $subject = "Registrarse | Verificación";
                     $txt     = "Gracias por registrarte!" . "\r\n";
                     $txt .= "Su cuenta ha sido creada, puede iniciar sesión con las siguientes credenciales después de haber activado su cuenta presionando la URL a continuación." . "\r\n";
                     $txt .= "--------------------------------------" . "\r\n";
                     $txt .= "Usuario: " . $us . "\r\n";
                     $txt .= "Password: " . $pa . "\r\n";
                     $txt .= "--------------------------------------" . "\r\n";
                     $txt .= "Haga clic en este enlace para activar su cuenta:" . "\r\n";
                     $txt .= FS_WEB."verify?cifnif=" . $ci . "&hash=" . $hash . "\r\n";
                     $headers = "From: info@melocoton.app" . "\r\n";
                     if (mail($to, $subject, $txt, $headers)) {
                        $this->new_message("Su cuenta se ha creado, por favor verifíquela haciendo clic en el enlace de activación que se ha enviado a su correo electrónico.");
                     } else {
                        $this->new_error_msg("Ocurrió un inconveniente y no se envió. Te recomendamos dar click en los números de teléfono que constan arriba");
                     }
                  } catch (Exception $exc) {
                     $this->new_error_msg("Ocurrió un inconveniente y no se envió. Te recomendamos dar click en los números de teléfono que constan arriba");
                  }
               } else {
                  $cliente->delete();
                  $user->delete();
                  $this->new_error_msg("No se pudo crear su cuenta, por favor verificarla!");
               }
            }
         }
      }
   }
}
