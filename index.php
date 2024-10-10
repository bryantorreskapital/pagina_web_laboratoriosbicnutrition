<?php

/// Si estas leyendo esto es porque no tienes PHP instalado !!!!!!!!!!!!!!!!!!!!

function fatal_handler()
{
   $error = error_get_last();
   if ($error !== null) {
      if (substr($error["message"], 0, 19) != 'Memcache::connect()') {
         echo "<h1>Error fatal</h1>"
            . "<ul>"
            . "<li><b>Tipo:</b> " . $error["type"] . "</li>"
            . "<li><b>Archivo:</b> " . $error["file"] . "</li>"
            . "<li><b>Línea:</b> " . $error["line"] . "</li>"
            . "<li><b>Mensaje:</b> " . $error["message"] . "</li>"
            . "</ul>";
      }
   }
}
/// cargamos las constantes de configuración
require_once 'config.php';
require_once 'base/fs_controller.php';
require_once 'raintpl/rain.tpl.class.php';

/// ¿Qué controlador usar?
$pagename = '';
if (isset($_GET['page'])) {
   $pagename = $_GET['page'];
} else if (defined('FS_HOMEPAGE')) {
   $pagename = FS_HOMEPAGE;
}

$fsc_error = false;
if ($pagename != '') {
   //buscamos en controller/
   if (file_exists('controller/' . $pagename . '.php')) {
      require_once 'controller/' . $pagename . '.php';
      try
      {
         $fsc = new $pagename();
      } catch (Exception $e) {
         echo "<h1>Error fatal</h1>"
         . "<ul>"
         . "<li><b>Código:</b> " . $e->getCode() . "</li>"
         . "<li><b>Mensage:</b> " . $e->getMessage() . "</li>"
            . "</ul>";
         $fsc_error = true;
      }
   } else {
      header("HTTP/1.0 404 Not Found");
      $fsc = new fs_controller();
      $fsc->template = 404;
   }
} else {
   $fsc = new fs_controller();
}

if (!isset($_GET['page'])) {
   /// redireccionamos a la página definida por el usuario
   $fsc->select_default_page();
}

if ($fsc_error) {
   die();
} else if ($fsc->template) {
   /// configuramos rain.tpl
   raintpl::configure('base_url', null);
   raintpl::configure('tpl_dir', 'view/');
   raintpl::configure('path_replace', false);

   /// ¿Se puede escribir sobre la carpeta temporal?
   if (is_writable('tmp')) {
      raintpl::configure('cache_dir', 'tmp/' . FS_TMP_NAME);
   } else {
      echo '<center>'
         . '<h1>No se puede escribir sobre la carpeta tmp del sistema</h1>'
         . '</center>';
      die();
   }
   
   $tpl = new RainTPL();
   $tpl->assign('fsc', $fsc);

   if (isset($_POST['user'])) {
      $tpl->assign('nlogin', $_POST['user']);
   } else if (isset($_COOKIE['user'])) {
      $tpl->assign('nlogin', $_COOKIE['user']);
   } else {
      $tpl->assign('nlogin', '');
   }

   $tpl->draw($fsc->template);
}

$fsc->close();