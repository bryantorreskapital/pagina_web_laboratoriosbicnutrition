<?php

class empresas extends fs_controller
{
    public $crm_contacto;
    public $empresa;
    public $tabla_empresa;
    public $tabla_form_builder;
    public $mostrar;
    public $familias;

    public $desde;
    public $hasta;
    public $codigo;
    public $nro_factura;
    public $cliente;
    public $placa;
    public $aseguradora;
    public $siniestro;
    public $codcontacto;
    public $cod;
    public $action;

    public $resultados;
    public $offset;
    public $url;
    public $sql_cotizaciones;
    public $sql_where;

    public $tabla_clientes;
    public $tabla_facturas;
    public $pendiente;
    public $buscar_empresa;
    public $all_empresas;
    public $banners_empresa;

    public function __construct()
    {
        parent::__construct(__CLASS__, 'Empresas');
    }

    protected function private_core()
    {
        $this->filters();
        $this->resultados = [];

        $this->url = $this->url(true) .
        "&cod=" . $this->cod . "&mostrar=" . $this->mostrar . "&action=" . $this->action .
        "&desde=" . $this->desde . "&hasta=" . $this->hasta . "&cliente=" . $this->cliente .
        "&placa=" . $this->placa . "&aseguradora=" . $this->aseguradora . "&siniestro=" . $this->siniestro . "&codcontacto=" . $this->codcontacto
        ;

        $this->crm_contacto = new crm_contacto();

        if (isset($_REQUEST['mostrar'])) {
            $this->mostrar = $_REQUEST['mostrar'];
        }

        if (isset($_REQUEST['cod'])) {
            $this->seleccionar_empresa();
        }

        // ACCIONES

        //if (isset($_REQUEST['search-empresas'])) {
        $this->search_emppresas();
        //}

        if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'search-cotizaciones') {
            $this->search_cotizaciones();
        } elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'search-facturas') {
            $this->search_facturas();
        } elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'search-pedidos') {
            $this->search_pedidos();
        }

        if (isset($_REQUEST['get_cotizacion'])) {
            $this->get_cotizacion();
        } elseif (isset($_REQUEST['get_factura'])) {
            $this->get_factura();
        } elseif (isset($_REQUEST['get_fotos'])) {
            $this->get_fotos($_REQUEST['tipo'], $_REQUEST['get_fotos']);
        } elseif (isset($_REQUEST['get_pedido'])) {
            $this->get_pedido();
        }

        if (isset($_REQUEST['save_encuesta'])) {
            $this->save_encuesta();
        }

        //print_r($this->crm_contacto->all());
        //exit();
    }

    private function search_emppresas()
    {
        //print_r($_REQUEST);

        $sql = "SELECT * FROM crm_contactos WHERE personafisica = 1";
        if (isset($_REQUEST['buscar_empresa'])) {
            $sql .= " AND (UPPER(nomcomer_app) LIKE '%" . mb_strtoupper($_REQUEST['buscar_empresa'], "utf-8") . "%' OR ruc_app LIKE '%" . $_REQUEST['buscar_empresa'] . "%') ";
        }

        $sql .= " ORDER BY nomcomer_app";

        $data = $this->db->select($sql);
        //print_r($data);
        if ($data) {
            foreach ($data as $d) {
                $this->all_empresas[] = new crm_contacto($d);
            }
        }
    }

    private function save_encuesta()
    {
        $this->template = false;

        $result = array('error' => false, 'mensaje' => '');

        $json = json_encode($_POST);

        $tabla     = 'form_encuestas';
        $name_file = 'formEncu_' . $_POST['codcliente'] . '_' . $this->tabla_empresa['cifnif'] . '_' . date('Ymd_His') . '.json';
        $fecha     = date('Y-m-d');
        $hora      = date('H:i:s');

        $response_db = $this->insert_db_empresa($tabla, array(
            'codcliente'    => $_REQUEST['codcliente'],
            'nombrecliente' => $_REQUEST['nombrecliente'],
            'json'          => $json,
            'nombrejson'    => $name_file,
            'fecha'         => $fecha,
            'hora'          => $hora,
            'codalmacen'    => $_REQUEST['codalmacen'],
            'idfactura'     => $_REQUEST['idfactura'],
        ));

        $dir_path = "tmp_form/data/" . $this->tabla_empresa['cifnif'] . "/";
        if (!file_exists($dir_path)) {
            mkdir($dir_path, 0777, true);
        }

        if (is_numeric($response_db)) {
            $file_path = $dir_path . $name_file;
            $fp        = fopen($file_path, 'w');
            fwrite($fp, $json);
            fclose($fp);
            $result['mensaje'] = '¡Encuesta guardada correctamente!';
        } else {
            @unlink($dir_path . $name_file);
            $result['error']   = true;
            $result['mensaje'] = '¡Error al guardar la encuesta!';
        }

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($result);
        exit();
    }

    public function get_content()
    {
        $form          = $this->get_info_empresa_selecionada_tabla('form_builder');
        $form_url_file = $this->get_form_builder($form['template']);
        $json          = @file_get_contents($form_url_file);
        return $json;
    }

    private function get_pedido()
    {
        $result['cabecera'] = array();
        $sql                = "SELECT * FROM facturascli WHERE idfactura = '{$_REQUEST['get_pedido']}' ";

        $cabecera = $this->select_db_empresa($sql);

        if ($cabecera) {

            $result['cabecera'] = array(
                'anio_fabricacion' => $cabecera[0]['anio_fabricacion'],
                'aseguradora'      => $cabecera[0]['aseguradora'],
                'cifnif'           => $cabecera[0]['cifnif'],
                'codcliente'       => $cabecera[0]['codcliente'],
                'codigo'           => $cabecera[0]['codigo'],
                'fecha'            => $cabecera[0]['fecha'],
                'hora'             => $cabecera[0]['hora'],
                'marca_vehiculo'   => $cabecera[0]['marca_vehiculo'],
                'modelo_vehiculo'  => $cabecera[0]['modelo_vehiculo'],
                'nombrecliente'    => $cabecera[0]['nombrecliente'],
                'observaciones'    => $cabecera[0]['observaciones'],
                'placa'            => $cabecera[0]['placa'],
                'siniestro'        => $cabecera[0]['siniestro'],
                'total'            => $cabecera[0]['total'],
            );

            $sql     = "SELECT * FROM lineasfacturascli WHERE idfactura = '{$_REQUEST['get_pedido']}' ";
            $detalle = $this->select_db_empresa($sql);

            if ($detalle) {
                if (count($detalle) > 0) {
                    foreach ($detalle as $key => $value) {
                        $result['detalle'][] = [
                            'referencia'  => $value['referencia'],
                            'descripcion' => $value['descripcion'],
                            'cantidad'    => $value['cantidad'],
                            'pvpunitario' => $value['pvpunitario'],
                            'dtopor'      => $value['dtopor'],
                            'pvptotal'    => $value['pvptotal'],
                            'iva'         => $value['iva'],
                            'total'       => round(floatval($value['pvptotal']) * (100 + floatval($value['iva'])) / 100, 2),
                        ];
                    }
                }
            }
        }

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($result);
        exit();
    }

    private function get_factura()
    {
        $result['cabecera'] = array();
        $sql                = "SELECT * FROM facturascli WHERE idfactura = '{$_REQUEST['get_factura']}' ";

        $cabecera = $this->select_db_empresa($sql);

        if ($cabecera) {

            $result['cabecera'] = array(
                'anio_fabricacion'     => $cabecera[0]['anio_fabricacion'],
                'aseguradora'          => $cabecera[0]['aseguradora'],
                'cifnif'               => $cabecera[0]['cifnif'],
                'codcliente'           => $cabecera[0]['codcliente'],
                'codigo'               => $cabecera[0]['codigo'],
                'numero_documento_sri' => $cabecera[0]['numero_documento_sri'],
                'fecha'                => $cabecera[0]['fecha'],
                'hora'                 => $cabecera[0]['hora'],
                'marca_vehiculo'       => $cabecera[0]['marca_vehiculo'],
                'modelo_vehiculo'      => $cabecera[0]['modelo_vehiculo'],
                'nombrecliente'        => $cabecera[0]['nombrecliente'],
                'observaciones'        => $cabecera[0]['observaciones'],
                'placa'                => $cabecera[0]['placa'],
                'siniestro'            => $cabecera[0]['siniestro'],
                'total'                => $cabecera[0]['total'],
            );

            $sql     = "SELECT * FROM lineasfacturascli WHERE idfactura = '{$_REQUEST['get_factura']}' ";
            $detalle = $this->select_db_empresa($sql);

            if ($detalle) {
                if (count($detalle) > 0) {
                    foreach ($detalle as $key => $value) {
                        $result['detalle'][] = [
                            'referencia'  => $value['referencia'],
                            'descripcion' => $value['descripcion'],
                            'cantidad'    => $value['cantidad'],
                            'pvpunitario' => $value['pvpunitario'],
                            'dtopor'      => $value['dtopor'],
                            'pvptotal'    => $value['pvptotal'],
                            'iva'         => $value['iva'],
                            'total'       => round(floatval($value['pvptotal']) * (100 + floatval($value['iva'])) / 100, 2),
                        ];
                    }
                }
            }
        }

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($result);
        exit();
    }

    private function get_cotizacion()
    {
        $result['cabecera'] = array();
        $sql                = "SELECT * FROM presupuestoscli WHERE idpresupuesto = '{$_REQUEST['get_cotizacion']}' ";

        $cabecera = $this->select_db_empresa($sql);

        if ($cabecera) {
            $sql_marca          = "SELECT * FROM familias WHERE codfamilia = '{$cabecera[0]['marca_vehiculo']}'";
            $marca              = $this->select_db_empresa($sql_marca);
            $sql_modelo         = "SELECT * FROM familias WHERE codfamilia = '{$cabecera[0]['modelo_vehiculo']}'";
            $modelo             = $this->select_db_empresa($sql_modelo);
            $sql_clisec         = "SELECT * FROM clientes WHERE codcliente = '{$cabecera[0]['codigo_cliente_secundario']}'";
            $clientesec         = $this->select_db_empresa($sql_clisec);
            $sql_dirclisec      = "SELECT p.* FROM dirclientes d INNER JOIN provincia p ON d.ciudad = p.codigo WHERE id = '{$cabecera[0]['direccion_sec']}'";
            $direccion_sec2     = $this->select_db_empresa($sql_dirclisec);
            $result['cabecera'] = array(
                'anio_fabricacion' => $cabecera[0]['anio_fabricacion'],
                'aseguradora'      => $cabecera[0]['aseguradora'],
                'cifnif'           => $cabecera[0]['cifnif'],
                'codcliente'       => $cabecera[0]['codcliente'],
                'codigo'           => $cabecera[0]['codigo'],
                'fecha'            => $cabecera[0]['fecha'],
                'hora'             => $cabecera[0]['hora'],
                'marca_vehiculo'   => $marca[0]['descripcion'],
                'modelo_vehiculo'  => $modelo[0]['descripcion'],
                'nombrecliente'    => $cabecera[0]['nombrecliente'],
                'observaciones'    => $cabecera[0]['observaciones'],
                'placa'            => $cabecera[0]['placa'],
                'siniestro'        => $cabecera[0]['siniestro'],
                'total'            => $cabecera[0]['total'],
                'taller'           => $clientesec[0]['nombre'],
                'ciudad'           => $direccion_sec2[0]['nombre'],
                'telefono'         => $clientesec[0]['telefono1'],
                'contacto'         => $cabecera[0]['contacto'],
            );

            $sql     = "SELECT * FROM lineaspresupuestoscli WHERE idpresupuesto = '{$_REQUEST['get_cotizacion']}' AND aprobado = 1";
            $detalle = $this->select_db_empresa($sql);

            if ($detalle) {
                if (count($detalle) > 0) {
                    foreach ($detalle as $key => $value) {
                        $status = 'Pendiente';
                        $color  = '';
                        if ($value['status'] == 1) {
                            $status = 'Preparacion Entrega Respuestos';
                            $color  = 'red';
                        } elseif ($value['status'] == 2) {
                            $status = 'Despacho';
                            $color  = 'yellow';
                        } elseif ($value['status'] == 3) {
                            $status = 'Tránsito';
                            $color  = 'yellow';
                        } elseif ($value['status'] == 4) {
                            $status = 'Entregado';
                            $color  = 'green';
                        } elseif ($value['status'] == 5) {
                            $status = 'Importación';
                            $color  = 'yellow';
                        }
                        $result['detalle'][] = [
                            'aprobado'          => intval($value['aprobado']),
                            'referencia'        => $value['referencia'],
                            'descripcion'       => $value['descripcion'],
                            'observacion_linea' => $value['observacion_linea'],
                            'cantidad'          => $value['cantidad'],
                            'pvpunitario'       => $value['pvpunitario'],
                            'dtopor'            => $value['dtopor'],
                            'pvptotal'          => $value['pvptotal'],
                            'iva'               => $value['iva'],
                            'total'             => round(floatval($value['pvptotal']) * (100 + floatval($value['iva'])) / 100, 2),
                            'status'            => $status,
                            'color'             => $color,
                            'fecha_entrega'     => $value['fecha_entrega'] != null ? $value['fecha_entrega'] : "",
                        ];
                    }
                }
            }
        }

        header('Content-type: application/json; charset=utf-8');
        echo json_encode($result);
        exit();
    }

    private function get_familia($codfamilia)
    {
        $sql = "SELECT * FROM familias WHERE codfamilia = '{$codfamilia}' ";

        $data = $this->select_db_empresa($sql);

        if ($data) {
            return $data[0];
        } else {
            return false;
        }
    }

    private function filters()
    {
        $this->desde       = null;
        $this->hasta       = null;
        $this->nro_factura = '';
        $this->codigo      = '';
        $this->cliente     = '';
        $this->anio        = '';
        $this->placa       = '';
        $this->aseguradora = '';
        $this->siniestro   = '';
        $this->codcontacto = '';
        $this->cod         = '';
        $this->mostrar     = '';
        $this->action      = '';
        $this->offset      = 0;

        if (isset($_REQUEST['buscar_empresa'])) {
            $this->buscar_empresa = $_REQUEST['buscar_empresa'];
        }

        if (isset($_REQUEST['desde'])) {
            $this->desde = $_REQUEST['desde'];
        }

        if (isset($_REQUEST['hasta'])) {
            $this->hasta = $_REQUEST['hasta'];
        }

        if (isset($_REQUEST['codigo'])) {
            $this->codigo = $_REQUEST['codigo'];
        }

        if (isset($_REQUEST['nro_factura'])) {
            $this->nro_factura = $_REQUEST['nro_factura'];
        }

        if (isset($_REQUEST['cliente'])) {
            $this->cliente = $_REQUEST['cliente'];
        }

        if (isset($_REQUEST['anio'])) {
            $this->anio = $_REQUEST['anio'];
        }

        if (isset($_REQUEST['placa'])) {
            $this->placa = $_REQUEST['placa'];
        }

        if (isset($_REQUEST['aseguradora'])) {
            $this->aseguradora = $_REQUEST['aseguradora'];
        }

        if (isset($_REQUEST['siniestro'])) {
            $this->siniestro = $_REQUEST['siniestro'];
        }

        if (isset($_REQUEST['codcontacto'])) {
            $this->codcontacto = $_REQUEST['codcontacto'];
        }

        if (isset($_REQUEST['cod'])) {
            $this->cod = $_REQUEST['cod'];
        }

        if (isset($_REQUEST['mostrar'])) {
            $this->mostrar = $_REQUEST['mostrar'];
        }

        if (isset($_REQUEST['action'])) {
            $this->action = $_REQUEST['action'];
        }

        if (isset($_REQUEST['offset'])) {
            $this->offset = intval($_REQUEST['offset']);
        }
    }

    private function select_db_empresa($sql)
    {
        $resultado  = false;
        $db_empresa = @new mysqli($this->empresa->serv_app, FS_DB_USER, FS_DB_PASS, $this->empresa->nombbdd, intval(FS_DB_PORT));
        //$db_empresa = @new mysqli('fernandoe.kapitalcompany.com', 'FernandoE', 'eLGSAoY2XBI94uur', 'fernandoe_pindu', intval(FS_DB_PORT));
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
            } else {
                //print_r($db_empresa->error);
                // Error en la consulta
                $this->new_error_msg($db_empresa->error);
            }
        }
        return $resultado;
    }

    private function insert_db_empresa($tabla, $datos)
    {
        $resultado  = false;
        $db_empresa = @new mysqli($this->empresa->serv_app, FS_DB_USER, FS_DB_PASS, $this->empresa->nombbdd, intval(FS_DB_PORT));
        if ($db_empresa->connect_error) {
            $db_empresa = null;
            $this->new_error_msg($db_empresa->connect_error);
        } else {
            $db_empresa->set_charset('utf8');
            $columnas = implode(',', array_keys($datos));
            $valores  = '';
            foreach ($datos as $key => $value) {
                $valores .= "'" . $value . "',";
            }
            $valores = trim($valores, ',');

            //$valores = implode(',', array_map('add_quotes', $datos));
            //$valores  = implode(',', array_map(array($this->db), array_values($datos)));
            $sql = "INSERT INTO $tabla ($columnas) VALUES ($valores)";

            if ($db_empresa->query($sql)) {
                $resultado = $db_empresa->insert_id;
            } else {
                $this->new_error_msg($db_empresa->error);
            }
        }
        $db_empresa->close();
        return $resultado;
    }

    public function add_quotes($value)
    {
        return "'" . $value . "'";
    }

    private function search_facturas()
    {

        $this->empresa = $this->crm_contacto->get($_REQUEST['codcontacto']);
        $sql           = "SELECT
                         (SELECT descripcion FROM familias WHERE codfamilia = f.marca_vehiculo LIMIT 1) AS fm_marca_vehiculo,
                         (SELECT descripcion FROM familias WHERE codfamilia = f.modelo_vehiculo LIMIT 1) AS fm_modelo_vehiculo,
                         f.*
                        FROM facturascli f
         WHERE 1=1 ";

        $where = "";

        if (!empty($this->desde)) {
            $where .= " AND f.fecha >= '" . $this->desde . "'";
        }

        if (!empty($this->hasta)) {
            $where .= " AND f.fecha <= '" . $this->hasta . "'";
        }

        if (!empty($this->nro_factura)) {
            $where .= " AND UPPER(f.numero_documento_sri) LIKE '%" . strtoupper($this->nro_factura) . "%'";
        }

        if (!empty($this->cliente)) {
            $where .= " AND UPPER(f.nombrecliente) LIKE '%" . strtoupper($this->cliente) . "%'";
        }

        if (!empty($this->placa)) {
            $where .= " AND f.placa = '" . $this->placa . "'";
        }

        if (!empty($this->anio)) {
            $where .= " AND f.anio_fabricacion = '" . $this->anio . "'";
        }

        if (!empty($this->aseguradora)) {
            $where .= " AND UPPER(f.aseguradora) LIKE '%" . strtoupper($this->aseguradora) . "%'";
        }

        if (!empty($this->siniestro)) {
            $where .= " AND UPPER(f.siniestro) LIKE '%" . strtoupper($this->siniestro) . "%'";
        }

        $this->sql_where = $where;

        $sql = $sql . $where;

        $sql .= " ORDER BY f.fecha ASC LIMIT {$this->offset}, " . FS_ITEM_LIMIT . ";";

        //$sql .= " LIMIT 5";

        //echo $sql;
        //exit();
        $data = $this->select_db_empresa($sql);
        //print_r($data);
        //exit();

        if ($data) {
            $this->resultados = $data;
        }
    }

    private function search_pedidos()
    {

        $this->empresa = $this->crm_contacto->get($_REQUEST['codcontacto']);
        $sql           = "SELECT
                         (SELECT descripcion FROM familias WHERE codfamilia = p.marca_vehiculo LIMIT 1) AS fm_marca_vehiculo,
                         (SELECT descripcion FROM familias WHERE codfamilia = p.modelo_vehiculo LIMIT 1) AS fm_modelo_vehiculo,
                         p.*
                        FROM pedidoscli p
         WHERE 1=1 ";

        $where = "";

        if (!empty($this->desde)) {
            $where .= " AND p.fecha >= '" . $this->desde . "'";
        }

        if (!empty($this->hasta)) {
            $where .= " AND p.fecha <= '" . $this->hasta . "'";
        }

        if (!empty($this->codigo)) {
            $where .= " AND p.codigo = '" . strtoupper($this->codigo) . "'";
        }

        if (!empty($this->cliente)) {
            $where .= " AND UPPER(p.nombrecliente) LIKE '%" . strtoupper($this->cliente) . "%'";
        }

        if (!empty($this->placa)) {
            $where .= " AND p.placa = '" . $this->placa . "'";
        }

        if (!empty($this->anio)) {
            $where .= " AND p.anio_fabricacion = '" . $this->anio . "'";
        }

        if (!empty($this->aseguradora)) {
            $where .= " AND UPPER(p.aseguradora) LIKE '%" . strtoupper($this->aseguradora) . "%'";
        }

        if (!empty($this->siniestro)) {
            $where .= " AND UPPER(p.siniestro) LIKE '%" . strtoupper($this->siniestro) . "%'";
        }

        $this->sql_where = $where;

        $sql = $sql . $where;

        $sql .= " ORDER BY p.fecha ASC LIMIT {$this->offset}, " . FS_ITEM_LIMIT . ";";

        //$sql .= " LIMIT 5";

        //echo $sql;
        //exit();
        $data = $this->select_db_empresa($sql);
        //print_r($data);
        //exit();

        if ($data) {
            $this->resultados = $data;
        }
    }

    private function search_cotizaciones()
    {

        $this->empresa = $this->crm_contacto->get($_REQUEST['codcontacto']);
        $sql           = "SELECT
                         (SELECT descripcion FROM familias WHERE codfamilia = p.marca_vehiculo LIMIT 1) AS fm_marca_vehiculo,
                         (SELECT descripcion FROM familias WHERE codfamilia = p.modelo_vehiculo LIMIT 1) AS fm_modelo_vehiculo,
                         p.*
                        FROM presupuestoscli p
         WHERE 1=1 ";

        $where = "";

        if (!empty($this->desde)) {
            $where .= " AND p.fecha >= '" . $this->desde . "'";
        }

        if (!empty($this->hasta)) {
            $where .= " AND p.fecha <= '" . $this->hasta . "'";
        }

        if (!empty($this->codigo)) {
            $where .= " AND p.codigo = '" . $this->codigo . "'";
        }

        if (!empty($this->cliente)) {
            $where .= " AND UPPER(p.nombrecliente) LIKE '%" . strtoupper($this->cliente) . "%'";
        }

        if (!empty($this->placa)) {
            $where .= " AND p.placa = '" . $this->placa . "'";
        }

        if (!empty($this->anio)) {
            $where .= " AND p.anio_fabricacion = '" . $this->anio . "'";
        }

        if (!empty($this->aseguradora)) {
            $where .= " AND UPPER(p.aseguradora) LIKE '%" . strtoupper($this->aseguradora) . "%'";
        }

        if (!empty($this->siniestro)) {
            $where .= " AND UPPER(p.siniestro) LIKE '%" . strtoupper($this->siniestro) . "%'";
        }

        $this->sql_where = $where;

        $sql = $sql . $where;

        $sql .= " ORDER BY p.fecha ASC LIMIT {$this->offset}, " . FS_ITEM_LIMIT . ";";

        //$sql .= " LIMIT 5";

        //echo $sql;
        //exit();
        $data = $this->select_db_empresa($sql);
        //print_r($data);
        //exit();

        if ($data) {
            $this->resultados = $data;
        }
    }

    private function seleccionar_empresa_bak()
    {
        $this->template = 'empresa';
        $this->empresa  = $this->crm_contacto->get($_REQUEST['cod']);

        $this->tabla_empresa = $this->get_info_empresa_selecionada($this->empresa->ruc_app);

        $this->template_form = $this->get_content();

        if (isset($_REQUEST['codcliente'])) {
            $this->tabla_clientes = $this->get_info_empresa_selecionada_tabla('clientes', " codcliente = {$_REQUEST['codcliente']}");
        }
        //$this->tabla_form_builder = ;

        //echo $this->get_domain($this->empresa->urllogo_app);
        //print_r($this->empresa);
        //print_r($this->tabla_form_builder['template']);
        //exit;
    }

    private function seleccionar_empresa()
    {
        $this->template      = 'empresa';
        $this->empresa       = $this->crm_contacto->get($_REQUEST['cod']);
        $this->pendiente     = false;
        $this->tabla_empresa = $this->get_info_empresa_selecionada($this->empresa->ruc_app);
        $this->template_form = $this->get_content();
        $pagina_web          = $this->get_all_info_empresa_selecionada_tabla('pagina_web', " mostrar IN(0,2)");

        $this->banners_empresa = array();
        if ($pagina_web) {
            foreach ($pagina_web as $key => $value) {
                $this->banners_empresa[] = $this->get_domain($this->empresa->urllogo_app) . '/' . $value['ruta'];
            }
        }

        if (isset($_REQUEST['codcliente'])) {
            $this->tabla_clientes = $this->get_info_empresa_selecionada_tabla('clientes', " codcliente = {$_REQUEST['codcliente']}");
        }
        if (isset($_REQUEST['idfactura'])) {
            $this->pendiente = $this->get_info_empresa_selecionada_tabla('form_encuestas', " idfactura = {$_REQUEST['idfactura']}");
            if (!$this->pendiente) {
                $this->tabla_facturas = $this->get_info_empresa_selecionada_tabla('facturascli', " idfactura = {$_REQUEST['idfactura']}");
            }
        }
    }

    public function get_domain($url)
    {
        $parsed_url = parse_url($url);
        return $parsed_url['scheme'] . '://' . $parsed_url['host'];
    }

    public function get_form_builder($form = '')
    {
        return $this->get_domain($this->empresa->urllogo_app) . "/tmp_form/builder/{$form}";
    }

    public function total_registros()
    {
        if (!is_null($this->sql_where)) {
            //print_r($_REQUEST['action']);
            //exit();
            if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'search-facturas') {
                $sql = "SELECT count(idfactura) AS total FROM facturascli f WHERE 1=1 " . $this->sql_where;
            } elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'search-cotizaciones') {
                $sql = "SELECT count(idpresupuesto) AS total FROM presupuestoscli p WHERE 1=1 " . $this->sql_where;
            } elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'search-pedidos') {
                $sql = "SELECT count(idpedido) AS total FROM pedidoscli p WHERE 1=1 " . $this->sql_where;
            }

            //echo $sql;
            //exit;

            $data = $this->select_db_empresa($sql);
            if ($data) {
                return intval($data[0]['total']);
            } else {
                return 0;
            }
        }
        return 0;
    }

    public function paginas($anterior = false, $siguiente = false)
    {

        $paginas = array();
        $i       = 0;
        $num     = 0;
        $actual  = 1;

        $total = $this->total_registros();
        //echo count($this->resultados);
        //exit();
        //$total = count($this->resultados);

        /// añadimos todas la página
        while ($num < $total) {
            $paginas[$i] = array(
                'url'    => $this->url . "&offset=" . ($i * FS_ITEM_LIMIT),
                'num'    => $i + 1,
                'actual' => ($num == $this->offset),
            );

            if ($num == $this->offset) {
                $actual = $i;
            }

            $i++;
            $num += FS_ITEM_LIMIT;
        }

        /// ahora descartamos
        foreach ($paginas as $j => $value) {
            $enmedio = intval($i / 2);

            /**
             * descartamos todo excepto la primera, la última, la de enmedio,
             * la actual, las 5 anteriores y las 5 siguientes
             */
            if (($j > 1 and $j < $actual - 5 and $j != $enmedio) or ($j > $actual + 5 and $j < $i - 1 and $j != $enmedio)) {
                unset($paginas[$j]);
            }
        }

        //print_r($paginas);
        //exit();
        if (count($paginas) > 1) {
            return $paginas;
        } else {
            return array();
        }
    }

    public function get_fotos($tipo, $iddoc)
    {
        //$this->template = false;
        $result = array();
        $sql    = "SELECT * FROM documentosfac WHERE {$tipo} = '{$iddoc}' ";
        $data   = $this->select_db_empresa($sql);
        if ($data) {
            if (count($data) > 0) {
                foreach ($data as $key => $value) {
                    $result[] = array(
                        'nombre' => $value['nombre'],
                        'ruta'   => $this->empresa->empresa . "/" . $value['ruta'],
                        //'ruta'   => "https://fernandoe.kapitalcompany.com/" . $value['ruta'],
                        'observacion' => $value['observacion'],
                    );
                }
            }
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($result);
        exit();
    }

    public function get_info_empresa_selecionada($ruc)
    {
        //$this->template = false;
        $result = array();
        $sql    = "SELECT * FROM empresa WHERE cifnif = '{$ruc}' ";
        $data   = $this->select_db_empresa($sql);
        if ($data) {
            if (count($data) > 0) {
                foreach ($data as $key => $value) {
                    $result[] = array(
                        'cifnif'    => $value['cifnif'],
                        'nombre'    => $value['nombre'],
                        'direccion' => $value['direccion'],
                        'email'     => $value['email'],
                        'telefono'  => $value['telefono'],
                    );
                    break;
                }
            }
        }

        return $result[0];
    }

    public function get_info_empresa_selecionada_tabla($tabla, $condicion = '')
    {
        //$this->template = false;
        $result = array();
        $sql    = "SELECT * FROM {$tabla} ";
        if (!empty($condicion)) {
            $sql .= " WHERE {$condicion} ";
        }
        //echo $sql;

        $data = $this->select_db_empresa($sql);
        //var_dump($data);
        if ($data) {
            if (count($data) > 0) {
                return $data[0];
            }
        }
        return false;
    }

    public function get_all_info_empresa_selecionada_tabla($tabla, $condicion = '')
    {
        //$this->template = false;
        $result = array();
        $sql    = "SELECT * FROM {$tabla} ";
        if (!empty($condicion)) {
            $sql .= " WHERE {$condicion} ";
        }
        //echo $sql;

        $data = $this->select_db_empresa($sql);
        //var_dump($data);
        if ($data) {
            if (count($data) > 0) {
                return $data;
            }
        }
        return false;
    }
}
