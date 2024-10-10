<?php
require_once 'extras/fs_pdf.php';
class empresa extends fs_controller
{
    public $url;
    public $crm_contacto;
    public $ruc;
    public $num_auto;
    public $desde;
    public $hasta;
    public $resultados;
    public $message;
    public $db_empresa;

    public function __construct()
    {
        parent::__construct(__CLASS__, 'Empresa');
    }

    protected function private_core()
    {
        $this->crm_contacto = new crm_contacto();
        $this->ruc          = null;
        $this->num_auto     = null;
        $this->desde        = null;
        $this->hasta        = null;
        $this->resultados   = array();
        if (isset($_GET['cod'])) {
            $this->empresa = $this->crm_contacto->get($_GET['cod']);
            if (isset($_POST['ruc'])) {
                $this->ruc = $_POST['ruc'];
            }
            if (isset($_POST['num_auto'])) {
                $this->num_auto = $_POST['num_auto'];
            }
        }

        if (isset($_POST['securityCode']) && ($_POST['securityCode'] != "")) {
            $this->buscar();
        } elseif (isset($_POST['tipo'])) {
            $xml = $this->webServicesSriConsultaComprobXml($_POST['claveAcceso']);
            if ($_POST['tipo'] == 'ride') {
                $this->genera_ride($xml);
            } else {
            }
        }

        if (isset($_REQUEST['suscribirse'])) {
            $this->suscribirse();
        } elseif (isset($_REQUEST['contacto'])) {
            $this->enviarEmailContacto();
        }
    }

    /**
     * @author BRYAN ALEJANDRO TORRES CASTILLO
     * Almacena la lista de correos de los clientes que se suscriben al boletin de noticias
     */
    private function suscribirse()
    {
        $this->template = false;
        $result         = ['error' => false, 'mensaje' => ''];

        // Obtener el correo electrónico del formulario de suscripción
        $email = $_REQUEST['suscribirse'];

        $filename = 'base_correos.txt';

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result['error']   = true;
            $result['mensaje'] = "El correo proporcionado no es válido.";
        } else {
            // Leer el archivo y comprobar si el correo ya está en la lista
            $emails = file($filename, FILE_IGNORE_NEW_LINES);
            if (in_array($email, $emails)) {
                $result['mensaje'] = "El correo ya se encuentra en la lista.";
            } else {
                // Agregar el correo al final del archivo
                file_put_contents($filename, $email . PHP_EOL, FILE_APPEND);
                $result['mensaje'] = "¡Gracias por suscribirte a nuestro boletín!";
            }
        }

        header('Content-Type: application/json');
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit();
    }

    private function enviarEmailContacto()
    {
        $this->template = false;
        $result         = array('error' => false, 'mensaje' => '');

        $html = '<html>
            <head>
              <meta charset="utf-8">
              <style type="text/css">
                @import url("https://fonts.googleapis.com/css?family=Lato:300");
                body{
                  font-family: "Lato", sans-serif;
                  font-size: 14px;
                }
              </style>
            </head>
            <body>
              <table height="100%" width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse; height: 100%; margin: 0; padding: 0; width: 100%; background-color: #F3F3F3;">
                <tr><td align="center" style="height: 100%; margin: 0; padding: 100px 10px; width: 100%; border-top: 0;">

                  <table height="100%" width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border: 0; max-width: 600px!important; background-color: #ffffff;">
                    <tr><td style="text-align:center; padding: 10px 25px;">';
        $html .= '<b>NOMBRE: ' . $_POST['name'] . '</b> <br>';
        $html .= '<b>TELÉFONO: ' . $_POST['mobile'] . '</b> <br>';
        $html .= '<b>E-MAIL: ' . $_POST['mail'] . '</b> <br>';
        $html .= '<b>ASUNTO: ' . $_POST['subject'] . '</b> <br>';
        $html .= '<b>MENSAJE: ' . $_POST['message'] . '</b> <br>';
        $html .= '<hr style="border: 1px solid #e8e8e8;"></td></tr>

                  </table>
                  <p style="font-size:13px;">&copy; ' . Date('Y') . ' kapitalcompany.com. Todos los derechos reservados</p>
                </td></tr>
              </table>
            </body>
            </html>';

        $parameters = array(
            'from'    => ' (Formulario Contácto Página Web) ' . '<postmaster@facturacion.kapitalcompany.com>',
            //'to'      => 'contacto@kapitalcompany.com',
            'to'      => 'torresbryan17@hotmail.com',
            'subject' => $_POST['subject'],
            "html"    => $html,
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/facturacion.kapitalcompany.com/messages');
        curl_setopt($ch, CURLOPT_USERPWD, 'api:key-a3fbeb5f2b165b7b891b5bbc275671c3');

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $response = curl_exec($ch);

        if (!$response) {
            $result['error']   = true;
            $result['mensaje'] = curl_error($ch);
        } else {
            $result['mensaje'] = '¡Mensaje enviado correctamente!';
        }

        header('Content-Type: application/json');
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
        exit();
    }

    private function db_empresa($sql)
    {
        $resultado  = false;
        $db_empresa = @new mysqli($this->empresa->serv_app, FS_DB_USER, FS_DB_PASS, $this->empresa->nombbdd, intval(FS_DB_PORT));
        if ($db_empresa->connect_error) {
            $db_empresa = null;
            $this->new_error_msg($db_empresa->connect_error);
        } else {
            $db_empresa->set_charset('utf8');
            $connected = true;
            $filas     = $db_empresa->query($sql);
            if ($filas) {
                $resultado = array();
                while ($row = $filas->fetch_array(MYSQLI_ASSOC)) {
                    $resultado[] = $row;
                }
                $filas->free();
            }
        }
        return $resultado;
    }

    public function buscar()
    {
        if (strcasecmp($_SESSION['captcha'], $_POST['securityCode']) != 0) {
            $this->message = "¡Ha introducido un código de seguridad incorrecto! Inténtelo de nuevo.";
        } else {
            if (isset($_POST['ruc']) && $_POST['ruc'] != '' || isset($_POST['num_auto']) && $_POST['num_auto'] != '' || (isset($_POST['desde']) && $_POST['desde'] != '' && isset($_POST['hasta']) && $_POST['hasta'] != '')) {
                $sql = "SELECT * FROM facturascli WHERE estado_sri = 'AUTORIZADO' AND anulada = '0' AND codigorect IS NULL AND idfacturanotdeb IS NULL";
                if (isset($_POST['ruc']) && $_POST['ruc'] != '') {
                    $ruc = $_POST['ruc'];
                    $sql .= " AND cifnif = '" . $ruc . "'";
                }
                if (isset($_POST['num_auto']) && $_POST['num_auto'] != '') {
                    $num_auto = $_POST['num_auto'];
                    $sql .= " AND autoriza_numero_sri = '" . $num_auto . "'";
                }
                if (isset($_POST['desde']) && $_POST['desde'] != '') {
                    $desde = $_POST['desde'];
                    $sql .= " AND fecha_autorizacion_sri >= '" . $desde . "'";
                }
                if (isset($_POST['hasta']) && $_POST['hasta'] != '') {
                    $hasta = $_POST['hasta'];
                    $sql .= " AND fecha_autorizacion_sri <= '" . $hasta . "'";
                }
                $sql .= ' ORDER BY fecha_autorizacion_sri DESC';
                $data = $this->db_empresa($sql);
                if ($data) {
                    $this->resultados = $data;
                }
            }
        }
    }

    public function webServicesSriConsultaComprobXml($claveAcceso = '')
    {
        //Si recibimos por parametro la clave de acceso retornamos el xml
        if (!empty($claveAcceso)) {
            $ambiente    = substr($claveAcceso, 23, 1);
            $comprobante = '';
            $wsdl        = false;
            if ($ambiente == 2) {
                $wsdl = "https://cel.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantesOffline?wsdl";
            } elseif ($ambiente == 1) {
                $wsdl = "https://celcer.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantesOffline?wsdl";
            }
            if ($wsdl) {
                try {
                    $client    = new \SoapClient($wsdl, array("trace" => true, "cache_wsdl" => WSDL_CACHE_MEMORY));
                    $resultAut = $client->autorizacionComprobante(array("claveAccesoComprobante" => $claveAcceso));
                    $resultAut = $client->autorizacionComprobante(array("claveAccesoComprobante" => '1904202201170928471300120010030000108860100101111'));
                    if (isset($resultAut->RespuestaAutorizacionComprobante->autorizaciones->autorizacion->estado)) {
                        $repuestaWsdl     = $resultAut->RespuestaAutorizacionComprobante->autorizaciones->autorizacion;
                        $estadoAutorizado = trim($repuestaWsdl->estado);
                        if ($estadoAutorizado = "AUTORIZADO") {
                            $comprobante = $repuestaWsdl->comprobante;
                        }
                    } else {
                        echo '<script>alert("El documento electronico no se encuentra en el SRI");window.close();</script>';
                        exit();
                    }
                } catch (Exception $e) {
                    echo 'Excepción capturada: ', $e->getMessage(), "\n";
                    exit();
                }
            }
            if (strlen($comprobante) > 0) {
                if ($_POST['tipo'] == 'ride') {
                    return simplexml_load_string($comprobante);
                } else {
                    header('Content-Type: application/xml');
                    header('Content-Disposition: attachment; filename="' . $claveAcceso . '.xml"');
                    echo $comprobante;
                    exit();
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function genera_ride($xml)
    {
        $pdf_doc = new \fs_pdf();
        $pdf_doc->pdf->addInfo('Author', 'PORTAL KP');
        $pdf_doc->pdf->addInfo('Title', $xml->infoTributaria->claveAcceso);
        $pdf_doc->pdf->addInfo('Subject', $xml->infoTributaria->claveAcceso);

        $pdf_doc->generar_ride_cabecera_factura_venta_desdexml($lppag, $xml, $this->empresa->urllogo_app);
        $this->generar_pdf_datos_empresa_factura_venta_desdexml($xml, $pdf_doc);
        $this->generar_pdf_datos_cliente_factura_venta_desdexml($xml, $pdf_doc);
        $this->generar_pdf_lineas_factura_venta_desdexml($xml, $pdf_doc);

        /// pié de página para la factura
        //$pdf_doc->pdf->addText(10, 10, 8, $pdf_doc->center_text($pdf_doc->fix_html('PUEB'), 180) );
        //exit();
        $pdf_doc->show($xml->infoTributaria->claveAcceso . '.pdf');
    }

    public function generar_pdf_datos_empresa_factura_venta_desdexml($xml, $pdf_doc)
    {
        $pdf_doc->new_table();
        $pdf_doc->add_table_row(
            array(
                'campo1' => "<b>" . (string) $xml->infoTributaria->razonSocial . "</b> ",
            )
        );
        $pdf_doc->add_table_row(
            array(
                'campo1' => "\n" . "<b>Dirección Matríz:</b>\n" . (string) $xml->infoTributaria->dirMatriz,
            )
        );
        $pdf_doc->add_table_row(
            array(
                'campo1' => "\n" . "<b>OBLIGADO A LLEVAR CONTABILIDAD:</b> " . (string) $xml->infoFactura->obligadoContabilidad,
            )
        );
        $paso = true;

        if ($paso) {
            $pdf_doc->add_table_row(
                array(
                    'campo1' => "",
                )
            );
        }
        $pdf_doc->save_table(
            array(
                'cols'         => array(
                    'campo1' => array('justification' => 'left'),
                ),
                'showLines'    => 0,
                'width'        => 250,
                'shaded'       => 0,
                'xPos'         => 'left',
                'xOrientation' => 'right',
                'showLines'    => 1,
                'showHeadings' => 0,
                'fontSize'     => 8,
            )
        );
        $pdf_doc->pdf->ezText("\n", 3);
        //exit();
    }

    public function generar_pdf_datos_cliente_factura_venta_desdexml($xml, $pdf_doc)
    {
        $pdf_doc->new_table();
        $pdf_doc->add_table_row(
            array(
                'campo1' => "<b>Razón Social / Nombres y Apellidos:</b> " . (string) $xml->infoFactura->razonSocialComprador,
            )
        );

        $pdf_doc->add_table_row(
            array(
                'campo1' => "<b>Identificación:</b> " . (string) $xml->infoFactura->identificacionComprador,

            )
        );

        $pdf_doc->add_table_row(
            array(
                'campo1' => "<b>Fecha de Emisión:</b> " . (string) $xml->infoFactura->fechaEmision,
            )
        );

        $pdf_doc->add_table_row(
            array(
                'campo1' => "<b>Dirección:</b> " . $pdf_doc->fix_html((string) $xml->infoFactura->direccionComprador),
            )
        );

        $pdf_doc->save_table(
            array(
                'cols'         => array(
                    'campo1' => array('justification' => 'left'),
                ),
                'showLines'    => 0,
                'width'        => 550,
                'shaded'       => 0,
                'xPos'         => 'left',
                'xOrientation' => 'right',
                'showLines'    => 1,
                'showHeadings' => 0,
                'fontSize'     => 8,
            )
        );
        $pdf_doc->pdf->ezText("\n", 5);
    }

    public function generar_pdf_lineas_factura_venta_desdexml($xml, $pdf_doc)
    {
        // DETALLE DE LA RETENCION
        $pdf_doc->new_table();
        $pdf_doc->add_table_row(
            array(
                'campo1' => "<b>Cod. Principal</b>",
                'campo2' => "<b>Cod. Auxiliar</b>",
                'campo3' => "<b>Cantidad</b>",
                'campo4' => "<b>Descripción</b>",
                'campo5' => "<b>Precio Unitario</b>",
                'campo6' => "<b>Descuento</b>",
                'campo7' => "<b>Precio Total</b>",
            )
        );
        foreach ($xml->detalles->detalle as $detalle) {
            $pdf_doc->add_table_row(
                array(
                    'campo1' => $detalle->codigoPrincipal,
                    'campo2' => $detalle->codigoAuxiliar,
                    'campo3' => $detalle->cantidad,
                    'campo4' => $detalle->descripcion,
                    'campo5' => '$' . $detalle->precioUnitario,
                    'campo6' => '$' . $detalle->descuento,
                    'campo7' => '$' . $detalle->precioTotalSinImpuesto,
                )
            );
        }

        $pdf_doc->save_table(
            array(
                'cols'         => array(
                    'campo1' => array('justification' => 'center'),
                    'campo2' => array('justification' => 'center'),
                    'campo3' => array('justification' => 'center'),
                    'campo4' => array('justification' => 'center'),
                    'campo5' => array('justification' => 'center'),
                    'campo6' => array('justification' => 'center'),
                    'campo7' => array('justification' => 'center'),
                ),
                'width'        => 550,
                'shaded'       => 0,
                'xPos'         => 'left',
                'xOrientation' => 'right',
                'showLines'    => 2,
                'showHeadings' => 0,
                'fontSize'     => 8,
            )
        );
        $pdf_doc->pdf->ezText("\n", 3);
        $pdf_doc->new_table();
        $subtotal12 = 0;
        $subtotal0  = 0;
        $totaliva   = 0;
        $impuestos  = $xml->infoFactura->totalConImpuestos;
        if (count($impuestos) > 0) {
            foreach ($impuestos->totalImpuesto as $impuesto) {
                if ($impuesto->codigo == 2) {
                    if ($impuesto->tarifa == 12) {
                        $subtotal12 += floatval($impuesto->baseImponible);
                    } elseif ($impuesto->tarifa == 0) {
                        $subtotal0 += floatval($impuesto->baseImponible);
                    }
                    $totaliva += floatval($impuesto->valor);
                }
            }
        }
        $pdf_doc->add_table_row(
            array(
                'campo' => "<b>SUBTOTAL 12%</b>",
                'valor' => "$" . $subtotal12,
            )
        );

        $pdf_doc->add_table_row(
            array(
                'campo' => "<b>SUBTOTAL 0%</b>",
                'valor' => "$" . $subtotal0,
            )
        );

        $pdf_doc->add_table_row(
            array(
                'campo' => "<b>SUBTOTAL SIN IMPUESTOS</b>",
                'valor' => "$" . $subtotal12,
            )
        );

        $pdf_doc->add_table_row(
            array(
                'campo' => "<b>TOTAL DESCUENTO</b>",
                'valor' => "$" . floatval((float) $xml->infoFactura->totalDescuento),
            )
        );

        $pdf_doc->add_table_row(
            array(
                'campo' => "<b>IVA 12%</b>",
                'valor' => "$" . $totaliva,
            )
        );

        $pdf_doc->add_table_row(
            array(
                'campo' => "<b>VALOR TOTAL</b>",
                'valor' => '<b>' . "$" . floatval((float) $xml->infoFactura->importeTotal) . '</b>',
            )
        );

        $pdf_doc->save_table(
            array(
                'cols'         => array(
                    'campo' => array('justification' => 'left'),
                    'valor' => array('justification' => 'right'),
                ),
                'width'        => 200,
                'shaded'       => 0,
                'xPos'         => 'right',
                'xOrientation' => 'left',
                'showLines'    => 2,
                'showHeadings' => 0,
                'fontSize'     => 8,
            )
        );

        $pdf_doc->set_y($pdf_doc->get_y() + 80);
        $pdf_doc->new_table();
        $pdf_doc->add_table_row(
            array(
                'campo' => "<b>INFORMACIÓN ADICIONAL</b>",
            )
        );

        $pdf_doc->add_table_row(
            array(
                'campo' => (string) $xml->infoAdicional->campoAdicional[5],
            )
        );

        $pdf_doc->save_table(
            array(
                'cols'         => array(
                    'campo' => array('justification' => 'center'),
                ),
                'width'        => 340,
                'shaded'       => 0,
                'xPos'         => 'left',
                'xOrientation' => 'right',
                'showLines'    => 2,
                'showHeadings' => 0,
                'fontSize'     => 8,
            )
        );

        $pdf_doc->pdf->ezText("\n", 3);
        $pdf_doc->new_table();
        $pdf_doc->add_table_row(
            array(
                'campo' => "<b>FORMA DE PAGO</b>",
                'valor' => "<b>VALOR</b>",
            )
        );

        $pagos = $xml->infoFactura->pagos;
        if (count($pagos) > 0) {
            foreach ($pagos->pago as $pago) {
                $pdf_doc->add_table_row(
                    array(
                        'campo' => 'OTROS SIN UTILIZACION DEL SISTEMA FINANCIERO',
                        'valor' => '<b>$' . floatval($pago->total) . '</b>',
                    )
                );
            }
        }
        $pdf_doc->save_table(
            array(
                'cols'         => array(
                    'campo' => array('justification' => 'center'),
                    'valor' => array('justification' => 'right'),
                ),
                'width'        => 340,
                'shaded'       => 0,
                'xPos'         => 'left',
                'xOrientation' => 'right',
                'showLines'    => 2,
                'showHeadings' => 0,
                'fontSize'     => 8,
            )
        );
        //exit();
    }
}
