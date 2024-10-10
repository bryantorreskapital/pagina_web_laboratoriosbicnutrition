<?php

function require_model($name)
{
   if (!isset($GLOBALS['models'])) {
      $GLOBALS['models'] = array();
   }

   if (!in_array($name, $GLOBALS['models'])) {
      /// primero buscamos en los plugins
      if (file_exists('model/' . $name)) {
         require_once 'model/' . $name;
         $GLOBALS['models'][] = $name;
      }
   }
}

/**
 * Devuelve el nombre de la clase del objeto, pero sin el namespace.
 * @param mixed $object
 * @return string
 */
function get_class_name($object = null)
{
   $name = get_class($object);

   $pos = strrpos($name, '\\');
   if ($pos !== false) {
      $name = substr($name, $pos + 1);
   }

   return $name;
}

function nombremes($mes, $ucwords = true)
{
   setlocale(LC_TIME, 'spanish');
   $nombre = strftime("%B", mktime(0, 0, 0, $mes, 1, 2000));
   $nombre = $ucwords ? ucwords($nombre) : $nombre;

   $meses_ingles = array(
      1  => "January",
      2  => "February",
      3  => "March",
      4  => "April",
      5  => "May",
      6  => "June",
      7  => "July",
      8  => "August",
      9  => "September",
      10 => "October",
      11 => "November",
      12 => "December",
   );

   $meses_espanol = array(
      1  => "Enero",
      2  => "Febrero",
      3  => "Marzo",
      4  => "Abril",
      5  => "Mayo",
      6  => "Junio",
      7  => "Julio",
      8  => "Agosto",
      9  => "Septiembre",
      10 => "Octubre",
      11 => "Noviembre",
      12 => "Diciembre",
   );

   //Si el mes esta en Ingles lo retornamos en español
   //Esto sucede con servidores configurados en ingles
   if ($meses_ingles[intval($mes)] == $nombre) {
      return $nombre = $meses_espanol[intval($mes)];
   }
   return $nombre;
}

/**
 * Redondeo bancario
 * @staticvar real $dFuzz
 * @param float $dVal
 * @param integer $iDec
 * @return float
 */
function bround($dVal, $iDec = 2)
{
   // banker's style rounding or round-half-even
   // (round down when even number is left of 5, otherwise round up)
   // $dVal is value to round
   // $iDec specifies number of decimal places to retain
   static $dFuzz = 0.00001; // to deal with floating-point precision loss

   $iSign = ($dVal != 0.0) ? intval($dVal / abs($dVal)) : 1;
   $dVal  = abs($dVal);

   // get decimal digit in question and amount to right of it as a fraction
   $dWorking      = $dVal * pow(10.0, $iDec + 1) - floor($dVal * pow(10.0, $iDec)) * 10.0;
   $iEvenOddDigit = floor($dVal * pow(10.0, $iDec)) - floor($dVal * pow(10.0, $iDec - 1)) * 10.0;

   if (abs($dWorking - 5.0) < $dFuzz) {
      $iRoundup = ($iEvenOddDigit & 1) ? 1 : 0;
   } else {
      $iRoundup = ($dWorking > 5.0) ? 1 : 0;
   }

   return $iSign * ((floor($dVal * pow(10.0, $iDec)) + $iRoundup) / pow(10.0, $iDec));
}

/**
 * Deshace las conversiones realizadas por fs_model::no_html()
 * @param string $txt
 * @return string
 */
function fs_fix_html($txt)
{
   $original = array('&lt;', '&gt;', '&quot;', '&#39;');
   $final    = array('<', '>', "'", "'");
   return trim(str_replace($original, $final, $txt));
}

function fs_get_max_file_upload()
{
   $max = intval(ini_get('post_max_size'));

   if (intval(ini_get('upload_max_filesize')) < $max) {
      $max = intval(ini_get('upload_max_filesize'));
   }

   return $max;
}

function require_all_models()
{
   if (!isset($GLOBALS['models'])) {
      $GLOBALS['models'] = array();
   }
   /// ahora cargamos los del núcleo
   foreach (scandir('model') as $file_name) {
      if ($file_name != '.' && $file_name != '..' && substr($file_name, -4) == '.php' && !in_array($file_name, $GLOBALS['models'])) {
         require_once 'model/' . $file_name;
         $GLOBALS['models'][] = $file_name;
      }
   }
}

/**
 * Devuelve un string con el número en el formato de número predeterminado.
 * @param float $num
 * @param integer $decimales
 * @param boolean $js
 * @return string
 */
function show_numero($num = 0, $decimales = FS_NF0, $js = false)
{
   if ($js) {
      return number_format($num, $decimales, '.', '');
   }
   return number_format($num, $decimales, FS_NF1, FS_NF2);
}

function formato_ceros($variable, $longitud_resultado)
{
   $longitud_origen = strlen($variable);
   $caracter        = "0";
   $concatenado     = "";
   $resultado       = "";
   for ($i = 0; $i < $longitud_resultado - $longitud_origen; $i++) {
      $concatenado = $concatenado . $caracter;
   }
   $resultado = $concatenado . $variable;
   return $resultado;
}

function formatearModoFactura($elNumero)
{
   $elNumero = trim($elNumero);
   return str_pad($elNumero, 9, "0", STR_PAD_LEFT);
}

function formatearModoHe($elNumero)
{
   $cantidad      = strlen($elNumero);
   $ceros         = "0";
   $numeroFactura = "";
   for ($i = 0; $i < 13 - $cantidad; $i++) {
      $numeroFactura = $numeroFactura . $ceros;
   }
   return $numeroFactura . $elNumero;
}

/**
 * Simple array to XML conversion.
 * Warning: Ignores all attributes!
 * @param array $array
 * @param string $namespace
 */
function convert_array_to_xml($array, $namespace = '')
{
   $xml    = '';
   $cont   = 0;
   $newkey = '';
   foreach ($array as $key => $value) {
      if (is_array($value)) {
         $value = convert_array_to_xml($value);
      }
      // Evaluamos si la key tiene un secuencial de ser asi lo limpiamos.
      $evaluar_key  = substr($key, 0, 8);
      $evaluar_key2 = substr($key, 0, 9);
      if ($evaluar_key == 'detalle_') {
         $key = substr($evaluar_key, 0, 7);
         $xml .= "<$key" . rtrim(" $namespace") . ">$value</$key>";
      } elseif ($evaluar_key2 == 'impuesto_') {
         $key = substr($evaluar_key, 0, 8);
         $xml .= "<$key" . rtrim(" $namespace") . ">$value</$key>";
      } else {
         $xml .= "<$key" . rtrim(" $namespace") . ">$value</$key>";
      }
   }
   return $xml;
}

function convert_array_to_srt($array)
{
   $result = '';
   $string = '';
   if (is_array($array)) {
      foreach ($array as $value) {
         $string .= "'" . strip_tags($value) . "',";
      }
      // Eliminamos la ultima coma para evitar problemas
      $result = substr($string, 0, -1);
   }
   return $result;
}

/**
 *  @author BRYAN TORRES
 *  @param name_plugin [nombre del plugin]
 *  @return [bool] TRUE : FALSE
 */
function plugin_exists($name_plugin = '')
{
   $exists      = false;
   $name_plugin = (string) $name_plugin;
   if (!empty($name_plugin) || !is_null($name_plugin)) {
      if (is_array($GLOBALS['plugins'])) {
         if (count($GLOBALS['plugins']) > 0) {
            foreach ($GLOBALS['plugins'] as $key => $value) {
               if (in_array($name_plugin, $GLOBALS['plugins'])) {
                  $exists = true;
                  break;
               }
            }
         }
      }
   }

   return $exists;
}

function msgSys()
{
   return 'Comuniquese con el administrador del sistema.';
}

/********************************************************************/
/*             FUNCIONES PARA LIBRERIA PHPEXCEL                     */
/********************************************************************/
function cellColor($objPHPExcel, $cells, $color)
{
   //global $objPHPExcel;
   $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill('')
      ->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,
         'startcolor'                  => array('rgb' => $color),
      ));
}
function setCifnif($objPHPExcel, $cellini, $cellfin, $cf)
{
   $cifnif = str_split($cf);
   for ($i = $cellini, $j = 0; $i <= $cellfin; $i++, $j++) {
      $objPHPExcel->getActiveSheet()->SetCellValue($i . '10', $cifnif[$j]);
   }
}

/**
 * @param objPHPExcel (object)
 * @param value (integer)
 * @param format (string)
 * @return fecha (date)
 */
function ExcelToPhp($value, $format = 'Y-m-d')
{
   $fecha = $value;
   date_default_timezone_set('UTC');
   if (!empty($value)) {
      $fecha = date($format, PHPExcel_Shared_Date::ExcelToPHP($value));
      $date  = date_create($fecha);
      $fecha = date_format($date, $format);
   }
   return $fecha;
}
/********************************************************************/
/*            FIN FUNCIONES PARA LIBRERIA PHPEXCEL                  */
/********************************************************************/

/********************************************************************/
/*             FUNCIONES PARA DOCUMENTACION ELECTRONCIA             */
/********************************************************************/
function limpioCaracteresXML($cadena)
{
   $search  = array("&lt;", "&gt;", "                                    ", "                                ");
   $replace = array("<", ">", "", "");
   $final   = str_replace($search, $replace, $cadena);
   return $final;
}

function validarRespuesta($result)
{
   $return = true;
   foreach ($result as $value) {
      $nroComprob = $value->numeroComprobantes;
   }
   if ($nroComprob == 0) {
      $return = false;
   }

   return $return;
}

function string_sanitize($string, $force_lowercase = true, $anal = false)
{
   $strip = array("~", "`", "#", "^", "&", "(", ")", "_", "=", "+", "[", "{", "]",
      "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
      "â€”", "â€“", ",", "<", ">", "/", "?");
   $clean = trim(str_replace($strip, "", strip_tags($string)));
   $clean = preg_replace('/\s+/', "-", $clean);
   $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean;
   return ($force_lowercase) ?
   (function_exists('mb_strtolower')) ?
   mb_strtolower($clean, 'UTF-8') :
   strtolower($clean) :
   $clean;
}

function string_sanitize2($string)
{
   $strip = array("~", "`", "#", "^", "&", "(", ")", "_", "=", "+", "[", "{", "]",
      "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
      "â€”", "â€“", ",", "<", ">", "/", "?");
   $clean = trim(str_replace($strip, "", strip_tags($string)));
   $clean = preg_replace('/\s+/', " ", $clean);

   return $clean;
}

function dia_es($fecha)
{
   $fecha      = strtotime($fecha);
   $dia_actual = date('l', $fecha);
   if ($dia_actual == 'Monday') {
      $dia_actual = 'Lunes';
   } elseif ($dia_actual == 'Tuesday') {
      $dia_actual = 'Martes';
   } elseif ($dia_actual == 'Wednesday') {
      $dia_actual = 'Miercoles';
   } elseif ($dia_actual == 'Thursday') {
      $dia_actual = 'Jueves';
   } elseif ($dia_actual == 'Friday') {
      $dia_actual = 'Viernes';
   } elseif ($dia_actual == 'Saturday') {
      $dia_actual = 'Sabado';
   } elseif ($dia_actual == 'Sunday') {
      $dia_actual = 'Domingo';
   }
   return $dia_actual;
}

if (isset($_GET['email_promo'])) {
   $contenido = $_GET['email_promo'];
   if (file_exists("../base_correos.txt")) {
      $archivo = fopen("../base_correos.txt", "a");
      fwrite($archivo, PHP_EOL . $contenido);
      fclose($archivo);
   } else {
      $archivo = fopen("../base_correos.txt", "w");
      fwrite($archivo, $contenido);
      fclose($archivo);
   }
   echo 'Registro de email Correcto';
}

function validarCI($strCedula)
{
   if (substr($strCedula, 1, 8) == '99999999') {
      $result = true;
      echo json_encode($result);
      header('Content-Type: application/json');
      exit();
      //return true;
   }
   if (strlen($strCedula) < 10) {
      $result = false;
      echo json_encode($result);
      header('Content-Type: application/json');
      exit();
      //return false;
   }

   $suma         = 0;
   $strOriginal  = $strCedula;
   $intProvincia = substr($strCedula, 0, 2);
   $intTercero   = $strCedula[2];
   $intUltimo    = $strCedula[9];
   if (!settype($strCedula, "float")) {
      $result = false;
      echo json_encode($result);
      header('Content-Type: application/json');
      exit();
      //return false;
   }

   if ((int) $intProvincia < 1 || (int) $intProvincia > 25) {
      $result = false;
      echo json_encode($result);
      header('Content-Type: application/json');
      exit();
      //return false;
   }

   if ((int) $intTercero == 7 || (int) $intTercero == 8) {
      $result = false;
      echo json_encode($result);
      header('Content-Type: application/json');
      exit();
      //return false;
   }

   for ($indice = 0; $indice < 9; $indice++) {
      //echo $strOriginal[$indice],'</br>';
      switch ($indice) {
         case 0:
         case 2:
         case 4:
         case 6:
         case 8:
            $arrProducto[$indice] = $strOriginal[$indice] * 2;
            if ($arrProducto[$indice] >= 10) {
               $arrProducto[$indice] -= 9;
            }

            //echo $arrProducto[$indice],'</br>';
            break;
         case 1:
         case 3:
         case 5:
         case 7:
            $arrProducto[$indice] = $strOriginal[$indice] * 1;
            if ($arrProducto[$indice] >= 10) {
               $arrProducto[$indice] -= 9;
            }

            //echo $arrProducto[$indice],'</br>';
            break;
      }
   }
   foreach ($arrProducto as $indice => $producto) {
      $suma += $producto;
   }

   $residuo        = $suma % 10;
   $intVerificador = $residuo == 0 ? 0 : 10 - $residuo;
   if ($intVerificador == $intUltimo) {
      $result = true;
      echo json_encode($result);
      header('Content-Type: application/json');
      exit();
   } else {
      $result = false;
      echo json_encode($result);
      header('Content-Type: application/json');
      exit();
   }
   //return ($intVerificador == $intUltimo ? true : false);
}

function no_html($t)
{
   $newt = str_replace(
      array('<', '>', '"', "'"),
      array('&lt;', '&gt;', '&quot;', '&#39;'),
      $t
   );

   return trim($newt);
}

function floatcmp($f1, $f2, $precision = 10, $round = false)
{
   if ($round or !function_exists('bccomp')) {
      return (abs($f1 - $f2) < 6 / pow(10, $precision + 1));
   } else {
      return (bccomp((string) $f1, (string) $f2, $precision) == 0);
   }

}

function token_tramaco()
{
   $curl = curl_init();

   curl_setopt_array($curl, 
      array(
         CURLOPT_URL => FS_TRAMACO.'usuario/autenticar',
         CURLOPT_RETURNTRANSFER => true,
         CURLOPT_ENCODING => '',
         CURLOPT_MAXREDIRS => 10,
         CURLOPT_TIMEOUT => 0,
         CURLOPT_FOLLOWLOCATION => true,
         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
         CURLOPT_CUSTOMREQUEST => 'POST',
         CURLOPT_POSTFIELDS =>'{
            "login": "1792288312001",
            "password": "12345"
         }',
         CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
         ),
      )
   );
   $response = curl_exec($curl);
   curl_close($curl);
   return json_decode($response, true);
}
