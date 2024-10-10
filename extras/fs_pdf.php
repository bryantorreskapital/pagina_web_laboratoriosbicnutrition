<?php
/*
 * This file is part of FacturaScripts
 * Copyright (C) 2013-2017  Carlos Garcia Gomez  neorazorx@gmail.com
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once __DIR__.'/ezpdf/Cezpdf.php';


/**
 * Permite la generación de PDFs algo más sencilla.
 */
class fs_pdf
{
   /**
    * Ruta al logotipo de la empresa.
    * @var type
    */
   public $logo;
   public $formato;
   public $observacion;
   public $pie;
   public $forma_pago;
   public $pie_e;
   public $estab;


   /**
    * Documento Cezpdf
    * @var Cezpdf
    */
   public $pdf;

   public $table_header;
   public $table_rows;

   public function __construct($paper = 'a4', $orientation = 'portrait', $font = 'Helvetica', $alm = FALSE, $est = 1)
   {
      if( !file_exists(FS_PATH.'tmp') )
      {
         mkdir(FS_PATH.'tmp');
      }
      $this->pdf = new Cezpdf($paper, $orientation);
      $this->pdf->selectFont("ezpdf/fonts/".$font.".afm");
   }

   /**
    * Vuelca el documento PDF en la salida estándar.
    * @param type $filename
    */
   public function show($filename = 'doc.pdf')
   {
      $this->pdf->ezStream( array('Content-Disposition' => $filename) );
   }

   /**
    * Guarda el documento PDF en el archivo $filename
    * @param type $filename
    * @return boolean
    */
   public function save($filename)
   {
      if($filename)
      {
         if( file_exists($filename) )
         {
            unlink($filename);
         }

         $file = fopen($filename, 'a');
         if($file)
         {
            fwrite($file, $this->pdf->ezOutput());
            fclose($file);
            return TRUE;
         }
         else
            return TRUE;
      }
      else
         return FALSE;
   }

   /**
    * Devuelve la coordenada Y actual en el documento.
    * @return type
    */
   public function get_y()
   {
      return $this->pdf->y;
   }

   /**
    * Establece la coordenada Y actual en el documento.
    * @param type $y
    */
   public function set_y($y)
   {
      $this->pdf->ezSetY($y);
   }


   /**
    * Carga la ruta del logotipo de la empresa.
    */
   private function cargar_logo($almacen = FALSE)
   {
      $this->logo = FALSE;
      $this->logo = 'http://masgas.kapitalcompany.com/images/logo.jpg';
   }
   public function new_table()
   {
      $this->table_header = array();
      $this->table_rows = array();
   }

   public function add_table_header($header)
   {
      $this->table_header = $header;
   }

   public function add_table_row($row)
   {
      $this->table_rows[] = $row;
   }

   public function save_table($options)
   {
      if( !$this->table_header )
      {
         foreach( array_keys($this->table_rows[0]) as $k )
         {
            $this->table_header[$k] = '';
         }
      }

      $this->pdf->ezTable($this->table_rows, $this->table_header, '', $options);
   }

   public function save_table_P($options)
   {

      $this->pdf->ezTable($this->table_rows, '', '', $options);
   }

   public function fix_html($txt)
   {
      $newt = str_replace('&lt;', '<', $txt);
      $newt = str_replace('&gt;', '>', $newt);
      $newt = str_replace('&quot;', '"', $newt);
      $newt = str_replace('&#39;', "'", $newt);
      return $newt;
   }

   public function get_lineas_iva($lineas)
   {
      $retorno = array();
      $lineasiva = array();

      for ($i=0; $i < count($lineas) ; $i++) 
      { 
         if( isset($lineasiva[$lineas[$i]['codimpuesto']]) )
         {
            if($lineas[$i]['recargo'] > $lineasiva[$lineas[$i]['codimpuesto']]['recargo'])
            {
               $lineasiva[$lineas[$i]['codimpuesto']]['recargo'] = $lineas[$i]['recargo'];
            }
            $lineasiva[$lineas[$i]['codimpuesto']]['neto'] += $lineas[$i]['pvptotal'];
            $lineasiva[$lineas[$i]['codimpuesto']]['totaliva'] += ($lineas[$i]['pvptotal']*$lineas[$i]['iva'])/100;
            $lineasiva[$lineas[$i]['codimpuesto']]['totalrecargo'] += ($lineas[$i]['pvptotal']*$lineas[$i]['recargo'])/100;
            $lineasiva[$lineas[$i]['codimpuesto']]['totallinea'] = $lineasiva[$lineas[$i]['codimpuesto']]['neto']
                    + $lineasiva[$lineas[$i]['codimpuesto']]['totaliva'] + $lineasiva[$lineas[$i]['codimpuesto']]['totalrecargo'];
         }
         else
         {
            $lineasiva[$lineas[$i]['codimpuesto']] = array(
                'codimpuesto' => $lineas[$i]['codimpuesto'],
                'iva' => $lineas[$i]['iva'],
                'recargo' => $lineas[$i]['recargo'],
                'neto' => $lineas[$i]['pvptotal'],
                'totaliva' => ($lineas[$i]['pvptotal']*$lineas[$i]['iva'])/100,
                'totalrecargo' => ($lineas[$i]['pvptotal']*$lineas[$i]['recargo'])/100,
                'totallinea' => 0
            );
            $lineasiva[$lineas[$i]['codimpuesto']]['totallinea'] = $lineasiva[$lineas[$i]['codimpuesto']]['neto']
                    + $lineasiva[$lineas[$i]['codimpuesto']]['totaliva'] + $lineasiva[$lineas[$i]['codimpuesto']]['totalrecargo'];
         }
      }
      foreach($lineasiva as $lin)
      {
         $retorno[] = $lin;
      }
      return $retorno;
   }

   public function generar_pdf_cabecera_fac_elec(&$factura,&$empresa,&$almacen, &$lppag, &$numero)
   {
      /// ¿Añadimos el logo?
      if($this->logo)
      {
         if( function_exists('imagecreatefromstring') )
         {
            $lppag -= 2; /// si metemos el logo, caben menos líneas
            // $ancho=270;
            // $alto=250;
            if( substr( strtolower($this->logo), -4 ) == '.png' )
            {
               if(FS_TEAM == 1)
               {

                  $this->pdf->addPngFromFile('images/formato_facturas.png',  35, 680, 200, 130);
               }
               else
               {
                  $this->pdf->addPngFromFile($this->logo,  35, 680, 200, 130);
               }
            }
            else
            {
               if(FS_TEAM == 1)
               {
                  $this->pdf->addPngFromFile('images/formato_facturas.png',  35, 680, 200, 130);

               }
               else
               {
                  $this->pdf->addJpegFromFile($this->logo,  35, 680, 200, 130);

               }
            }
            //exit();
         }
         else
         {
            die('ERROR: no se encuentra la función imagecreatefromstring(). '
                    . 'Y por tanto no se puede usar el logotipo en los documentos.');
         }
      }
      else
      {
         $this->pdf->addJpegFromFile('images/no_logo.jpg', 35, 680, 200, 130);
      }

      $this->new_table();

      $secuencialFac = str_pad($factura[0]['numero'], 9, "0",STR_PAD_LEFT);
      $retornaNumeroDoc = $factura[0]['codalmacen']."-".$almacen[0]['puntoemision']."-".$secuencialFac;

      $this->pdf->addText(285, 793, 12, '<b>RUC</b>: '.$empresa[0]['cifnif'], 0);
      $this->pdf->addText(285, 775, 12, '<b>FACTURA</b>: '.$retornaNumeroDoc, 0);
      $this->new_table();
      for($a=0; $a<=1; $a++)
      {
         $this->add_table_row(
            array(
               'campo' => ''
            )
         );
      }
      $this->add_table_row(
         array(
            'campo' => "\n\n".'<b>NÚMERO DE AUTORIZACIÓN:</b>  '
         )
      );

      $this->add_table_row(
         array(
            'campo' => $factura[0]['autoriza_numero_sri']
         )
      );

      $this->add_table_row(
         array(
            'campo' => "\n".'FECHA Y HORA DE AUTORIZACIÓN'
         )
      );
      $this->add_table_row(
         array(

            'campo' => $factura[0]['fecha_autorizacion_sri'] . ' : ' .$factura[0]['hora_autorizacion_sri']
         )
      );


      // CONDICIONAMOS SI EL AMBIENTE ES EN DESARROLLO O PRODUCCION
     
      $ambiente = 'PRUEBAS';
      //$ambiente = 'PRODUCCIÓN';

      $this->add_table_row(
         array(
            'campo' => "\n".'<b>AMBIENTE: </b>'.$ambiente
         )
      );

      $this->add_table_row(
         array(
             'campo' => "\n".'<b>EMISIÓN:</b> NORMAL'
         )
      );

      $this->add_table_row(
         array(
             'campo' => "\n".'CLAVE DE ACCESO'
         )
      );
      $y = $this->get_y();
      $this->set_y(650);

      $this->pdf->addJpegFromFile('images/codigos_de_barras.jpg',300,590,250,50);

      $this->set_y($y);

      $this->add_table_row(
         array(
            'campo' =>  "\n\n\n\n\n\n" .'             '.$factura[0]['codigo_acceso_sri']
         )
      );
      $this->save_table(
         array(
            'cols' => array(
               'campo' => array('justification' => 'left' ),
            ),
            'showLines' => 1,
            'xPos'=>'right',
            'xOrientation'=>'left',
            'showHeadings' => 0,
            'width' => 290,
            'shaded' => 0,
            'fontSize' =>8,
            'textCol' => '(255,0,0)'
         )
      );

      $this->pdf->ez['leftMargin'] = 25;
      $this->pdf->ez['rightMargin'] = 25;
      //$this->set_y(718);
      $this->set_y(758);

      //ob_start();
   }

   public function generar_ride_cabecera_factura_venta_desdexml(&$lppag, &$xml, &$logo)
   {
      /// ¿Añadimos el logo?
      //$this->pdf->ezImage($logo, 5, 200, 'none', 'left');
      if( substr( strtolower($logo), -4 ) == '.png' )
      {
         $this->pdf->addPngFromFile($logo,  35, 680, 200, 130);
      }
      else
      {
         $this->pdf->addJpegFromFile($logo,  35, 680, 200, 130);
      }

      $this->new_table();
      $this->pdf->addText(285, 793, 12,"<b>CI / RUC: </b>".$xml->infoTributaria->ruc,0);
      $nro = $xml->infoTributaria->estab."-".$xml->infoTributaria->ptoEmi."-".$xml->infoTributaria->secuencial;
      $this->pdf->addText(285, 775, 12,'<b>Factura.</b>'.$nro,0);
      $this->new_table();
      for($a=0; $a<=1; $a++)
      {
         $this->add_table_row(
            array(
               'campo' => ''
            )
         );
      }
      $this->add_table_row(
         array(
            'campo' => "\n\n".'<b>NÚMERO DE AUTORIZACIÓN:</b>  '
         )
      );

      $this->add_table_row(
         array(
             'campo' => $xml->infoTributaria->claveAcceso
         )
      );

      // CONDICIONAMOS SI EL AMBIENTE ES EN DESARROLLO O PRODUCCION
      if ($xml->infoTributaria->ambiente==2) {
         $ambiente = 'PRODUCCIÓN';
      }

      $this->add_table_row(
         array(
             'campo' => "\n".'<b>AMBIENTE: </b>'.$ambiente
         )
      );

      $this->add_table_row(
         array(
             'campo' => "\n".'<b>EMISIÓN:</b> NORMAL'
         )
      );

      $this->add_table_row(
         array(
             'campo' => "\n".'<b>CLAVE DE ACCESO</b>'
         )
      );

      $y = $this->get_y();
      $this->set_y(670);

      $this->pdf->ezImage('https://barcode.tec-it.com/barcode.ashx?data='. $xml->infoTributaria->claveAcceso, 20, $width=230, 'none', 'right');

      $this->set_y($y);

      $this->add_table_row(
         array(
            'campo' =>  "\n\n\n\n\n\n"
         )
      );


      $this->save_table(
         array(
            'cols' => array(
               'campo' => array('justification' => 'left'),
            ),
            'showLines' => 1,
            'xPos'=>'right',
            'xOrientation'=>'left',
            'showHeadings' => 0,
            'width' => 290,
            'shaded' => 0,
            'fontSize' =>8,
            'textCol' => '(255,0,0)'
         )
      );
      $this->pdf->ez['leftMargin'] = 25;
      $this->pdf->ez['rightMargin'] = 25;
      $this->set_y(659);
   }

   public function center_text($word = '', $tot_width = 140)
   {
      if( strlen($word) == $tot_width )
      {
         return $word;
      }
      else if( strlen($word) < $tot_width )
      {
         return $this->center_text2($word, $tot_width);
      }
      else
      {
         $result = '';
         $nword = '';
         foreach( explode(' ', $word) as $aux )
         {
            if($nword == '')
            {
               $nword = $aux;
            }
            else if( strlen($nword) + strlen($aux) + 1 <= $tot_width )
            {
               $nword = $nword.' '.$aux;
            }
            else
            {
               if($result != '')
               {
                  $result .= "\n";
               }
               $result .= $this->center_text2($nword, $tot_width);
               $nword = $aux;
            }
         }
         if($nword != '')
         {
            if($result != '')
            {
               $result .= "\n";
            }
            $result .= $this->center_text2($nword, $tot_width);
         }
         return $result;
      }
   }

   private function calcular_tamanyo_logo()
   {
      $tamanyo = $size = getimagesize($this->logo);
      if($size[0] > 200)
      {
         $tamanyo[0] = 200;
         $tamanyo[1] = $tamanyo[1] * $tamanyo[0]/$size[0];
         $size[0] = $tamanyo[0];
         $size[1] = $tamanyo[1];
      }

      if($size[1] > 80)
      {
         $tamanyo[1] = 80;
         $tamanyo[0] = $tamanyo[0] * $tamanyo[1]/$size[1];
      }

      return $tamanyo;
   }
}