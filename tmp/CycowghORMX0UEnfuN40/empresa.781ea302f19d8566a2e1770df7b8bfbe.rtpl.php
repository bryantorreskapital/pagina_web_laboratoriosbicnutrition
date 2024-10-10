<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>
	
	<!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">EMPRESA <?php echo $fsc->empresa->nomcomer_app;?></h1>
            <p class="mb-2">
            	<i class="fa fa-address-book me-3"></i>
            	<?php echo $fsc->tabla_empresa['direccion'];?>
            </p>
            <p class="mb-2">
            	<i class="fa fa-phone-square me-3"></i>
            	<?php echo $fsc->tabla_empresa['telefono'];?>
            </p>
            <p class="mb-2">
            	<i class="fa fa-envelope me-3"></i>
            	<?php echo $fsc->tabla_empresa['email'];?>
            </p>
        </div>
    </div>

    <div id="modalDetalle" class="modal fade bd-example-modal-lg"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	 	<div class="modal-dialog modal-lg" >
	    	<div class="modal-content">
	    	
	    	</div>
	  	</div>
	</div>

    <div class="container-fluid">
    	<div class="d-flex align-items-start">
		  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		    <a href="index.php?page=empresas&cod=<?php echo $fsc->empresa->codcontacto;?>&mostrar=search-facturas-tab" class="nav-link <?php if( $fsc->mostrar=='search-facturas-tab' ){ ?> active <?php } ?>" id="search-facturas-tab">Facturas</a>
		    <a href="index.php?page=empresas&cod=<?php echo $fsc->empresa->codcontacto;?>&mostrar=search-cotizaciones-tab" class="nav-link <?php if( $fsc->mostrar=='search-cotizaciones-tab' ){ ?> active <?php } ?>" id="search-facturas-tab">Cotizaciones</a>
		    <a href="index.php?page=empresas&cod=<?php echo $fsc->empresa->codcontacto;?>&mostrar=search-pedidos-tab" class="nav-link <?php if( $fsc->mostrar=='search-pedidos-tab' ){ ?> active <?php } ?>" id="search-facturas-tab">Pedidos</a>


		  </div>
		  <div class="tab-content" id="v-pills-tabContent">
		    <div class="tab-pane fade <?php if( $fsc->mostrar=='search-facturas-tab' ){ ?> show active <?php } ?>" id="search-facturas" role="tabpanel" aria-labelledby="search-facturas-tab" data-wow-delay="0.15">
		    	<h1 class="display-6 animated slideInDown">Consulta de facturas</h1>
		    	<form class="form-inline" action="index.php?page=empresas&cod=000264&mostrar=search-facturas-tab&action=search-facturas" method="post">
		    		<input type="hidden" name="codcontacto" value="<?php echo $fsc->empresa->codcontacto;?>">
		    		<div class="row g-3">
		    			<div class="col-md-2">
				    		<label for="desde" class="visually-hidden">Desde</label>
				    		<input type="date" class="form-control" name="desde" id="desde" value="<?php echo $fsc->desde;?>" placeholder="Desde">
					  	</div>
					  	<div class="col-md-2">
					    	<label for="hasta" class="visually-hidden">Hasta</label>
					    	<input type="date" class="form-control" name="hasta" id="hasta" value="<?php echo $fsc->hasta;?>" placeholder="Hasta">
					  	</div>
					  	<div class="col-md-2">
				    		<label for="nro_factura" class="visually-hidden">Nro. Factura</label>
				    		<input type="text" class="form-control" name="nro_factura" id="nro_factura" value="<?php echo $fsc->nro_factura;?>" placeholder="Nro. Factura">
					  	</div>
					  	<div class="col-lg-3">
					    	<label for="cliente" class="visually-hidden">Cliente</label>
					    	<input type="text" class="form-control" name="cliente" id="cliente" value="<?php echo $fsc->cliente;?>" placeholder="Cliente">
					  	</div>	
					  	<div class="col-md-2">
				    		<label for="anio" class="visually-hidden">Año</label>
				    		<input type="text" class="form-control" name="anio" id="anio" value="<?php echo $fsc->anio;?>" placeholder="Año Fabricación">
					  	</div>
						<div class="col-md-2">
				    		<label for="placa" class="visually-hidden">Placa</label>
				    		<input type="text" class="form-control" name="placa" id="placa" value="<?php echo $fsc->placa;?>" placeholder="Placa">
					  	</div>
					  	<div class="col-md-3">
					    	<label for="aseguradora" class="visually-hidden">Aseguradora</label>
					    	<input type="text" class="form-control" name="aseguradora" id="aseguradora" value="<?php echo $fsc->aseguradora;?>" placeholder="Aseguradora">
					  	</div>
					  	<div class="col-md-2">
					    	<label for="siniestro" class="visually-hidden">Siniestro</label>
					    	<input type="text" class="form-control" name="siniestro" id="siniestro" value="<?php echo $fsc->siniestro;?>" placeholder="Siniestro">
					  	</div>
					  	<div class="col-auto">
					    	<button type="submit" class="btn btn-primary mb-3">
					    		<i class="fa fa-search"></i>
					    		Consultar
							</button>
					  	</div>
		    		</div>
				</form>
				<hr>

				<div id="table_facturas_detalle" style="display: none;">
					<div class="border rounded p-4">
		                <div class="row g-4">
		                    <div class="col-12">
		                        <div class="h-100">
		                            <div class="d-flex">
		                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary" onclick="regresarAdminFacturas()">
		                                    <i class="fa fa-arrow-left text-white"></i>
		                                </div>
		                                <div class="ps-3">
		                                    <h4>Detalle Factura</h4>
		                                    <table class="table">
		                                    	<tbody>
		                                    		<tr>
		                                    			<th>Código</th>
		                                    			<th>Nro. Factura</th>
		                                    			<th>Cliente</th>
		                                    			<th>Marca de vehículo</th>
		                                    			<th>Modelo de vechiculo</th>
		                                    			<th>Año de fabricación</th>
		                                    			<th>Placa</th>
		                                    			<th>Aseguradora</th>
		                                    			<th>Siniestro</th>
		                                    			<th>Total</th>
		                                    		</tr>
		                                    		<tr>
			                                    		<td id="df_codigo"></td>
			                                    		<td id="df_nro_factura"></td>
			                                    		<td id="df_cliente"></td>
			                                    		<td id="df_marca_vehiculo"></td>
			                                    		<td id="df_modelo_vehiculo"></td>
			                                    		<td id="df_anio_fabricacion"></td>
			                                    		<td id="df_placa"></td>
			                                    		<td id="df_aseguradora"></td>
			                                    		<td id="df_siniestro"></td>
			                                    		<td id="df_total"></td>
		                                    		</tr>
		                                    	</tbody>
		                                    </table>

		                                    <table class="table">
		                                    	<thead>
		                                    		<tr>
		                                    			<th>Articulo</th>
		                                    			<th>Cantidad</th>
		                                    			<th>Precio</th>
		                                    			<th>Dto</th>
		                                    			<th>Neto</th>
		                                    			<th>IVA</th>
		                                    			<th>Total</th>
		                                    		</tr>
		                                    	</thead>
		                                    	<tbody id="table_facturas_detalle_items">
		                                    		
		                                    	</tbody>
		                                    </table>
		                                </div>
		                                
		                            </div>
		                            <div class="border-bottom mt-4 d-block d-lg-none"></div>
		                        </div>
		                    </div>
		                </div>
		            </div>				
	        	</div>

				<div class="table-responsive" id="table_facturas">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Fecha</th>
								<th>Nro. Factura</th>
								<th>Cliente</th>
								<th>Marca de vechiculo</th>
								<th>Modelo de vechiculo</th>
								<th>Año de fabricación</th>
								<th>Placa</th>
								<th>Aseguradora</th>
								<th>Siniestro</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php $loop_var1=$fsc->resultados; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
								<tr>
									<td><?php echo $value1['idfactura'];?></td>
									<td><?php echo $value1['fecha'];?></td>
									<td><?php echo $value1['numero_documento_sri'];?></td>
									<td><?php echo $value1['nombrecliente'];?></td>
									<td><?php echo $value1['fm_marca_vehiculo'];?></td>
									<td><?php echo $value1['fm_modelo_vehiculo'];?></td>
									<td><?php echo $value1['anio_fabricacion'];?></td>
									<td><?php echo $value1['placa'];?></td>
									<td><?php echo $value1['aseguradora'];?></td>
									<td><?php echo $value1['siniestro'];?></td>
									<td>
										<button class="btn btn-primary btn-xs" onclick="verDetalleFactura('<?php echo $value1['idfactura'];?>')">
											<i class="fa fa-eye"></i>
										</button>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<nav aria-label="Page navigation">
					  <ul class="pagination">
					    <li class="page-item"><a class="page-link" href="<?php if( $fsc->offset >= FS_ITEM_LIMIT ){ ?><?php echo $fsc->url;?>&offset=<?php echo $fsc->offset-FS_ITEM_LIMIT;?><?php }else{ ?>#<?php } ?>">Anterior</a></li>

						    <?php $loop_var1=$fsc->paginas(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
						    <li<?php if( $value1['actual'] ){ ?> class="page-item active"<?php } ?>>
				               <a href="<?php echo $value1['url'];?>" class="page-link"><?php echo $value1['num'];?></a>
				            </li>
				            <?php } ?>
					    <li class="page-item"><a class="page-link" href='<?php if( $fsc->offset+FS_ITEM_LIMIT < $fsc->total_registros() ){ ?><?php echo $fsc->url;?>&offset=<?php echo $fsc->offset+FS_ITEM_LIMIT;?><?php }else{ ?>#<?php } ?>'>Siguiente</a></li>

					  </ul>
					</nav>
				</div>
		    </div>
		    <div class="tab-pane fade <?php if( $fsc->mostrar=='search-cotizaciones-tab' ){ ?> show active <?php } ?>" id="search-cotizaciones" role="tabpanel" aria-labelledby="search-cotizaciones-tab" data-wow-delay="0.15">
		    	<h1 class="display-6 animated slideInDown">Consulta de cotizaciones</h1>

		    	<form class="form-inline" action="index.php?page=empresas&cod=000264&mostrar=search-cotizaciones-tab&action=search-cotizaciones" method="post">
		    		<input type="hidden" name="codcontacto" value="<?php echo $fsc->empresa->codcontacto;?>">
		    		<div class="row g-3">
		    			<div class="col-md-2">
				    		<label for="desde" class="visually-hidden">Desde</label>
				    		<input type="date" class="form-control" name="desde" id="desde" value="<?php echo $fsc->desde;?>" placeholder="Desde">
					  	</div>
					  	<div class="col-md-2">
					    	<label for="hasta" class="visually-hidden">Hasta</label>
					    	<input type="date" class="form-control" name="hasta" id="hasta" value="<?php echo $fsc->hasta;?>" placeholder="Hasta">
					  	</div>
					  	<div class="col-md-2">
				    		<label for="codigo" class="visually-hidden">Código</label>
				    		<input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $fsc->codigo;?>" placeholder="Código">
					  	</div>
					  	<div class="col-lg-3">
					    	<label for="cliente" class="visually-hidden">Cliente</label>
					    	<input type="text" class="form-control" name="cliente" id="cliente" value="<?php echo $fsc->cliente;?>" placeholder="Cliente">
					  	</div>	
					  	<div class="col-md-2">
				    		<label for="anio" class="visually-hidden">Año</label>
				    		<input type="text" class="form-control" name="anio" id="anio" value="<?php echo $fsc->anio;?>" placeholder="Año Fabricación">
					  	</div>
						<div class="col-md-2">
				    		<label for="placa" class="visually-hidden">Placa</label>
				    		<input type="text" class="form-control" name="placa" id="placa" value="<?php echo $fsc->placa;?>" placeholder="Placa">
					  	</div>
					  	<div class="col-md-3">
					    	<label for="aseguradora" class="visually-hidden">Aseguradora</label>
					    	<input type="text" class="form-control" name="aseguradora" id="aseguradora" value="<?php echo $fsc->aseguradora;?>" placeholder="Aseguradora">
					  	</div>
					  	<div class="col-md-2">
					    	<label for="siniestro" class="visually-hidden">Siniestro</label>
					    	<input type="text" class="form-control" name="siniestro" id="siniestro" value="<?php echo $fsc->siniestro;?>" placeholder="Siniestro">
					  	</div>
					  	<div class="col-auto">
					    	<button type="submit" class="btn btn-primary mb-3">
					    		<i class="fa fa-search"></i>
					    		Consultar
							</button>
					  	</div>
		    		</div>
				</form>
				<hr>

				<div id="table_cotizaciones_detalle" style="display: none;">
					<div class="border rounded p-4">
		                <div class="row g-4">
		                    <div class="col-12">
		                        <div class="h-100">
		                            <div class="d-flex">
		                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary" onclick="regresarAdminCotizaciones()">
		                                    <i class="fa fa-arrow-left text-white"></i>
		                                </div>
		                                <div class="ps-3">
		                                    <h4>Detalle Cotización</h4>
		                                    <table class="table">
		                                    	<tbody>
		                                    		<tr>
		                                    			<th>Código</th>
		                                    			<th>Cliente</th>
		                                    			<th>Marca de vehículo</th>
		                                    			<th>Modelo de vehiculo</th>
		                                    			<th>Año de fabricación</th>
		                                    			<th>Placa</th>
		                                    			<th>Aseguradora</th>
		                                    			<th>Siniestro</th>
		                                    			<!--th>Total</th-->
		                                    			<th></th>
		                                    		</tr>
		                                    		<tr>
			                                    		<td id="dc_codigo"></td>
			                                    		<td id="dc_cliente"></td>
			                                    		<td id="dc_marca_vehiculo"></td>
			                                    		<td id="dc_modelo_vehiculo"></td>
			                                    		<td id="dc_anio_fabricacion"></td>
			                                    		<td id="dc_placa"></td>
			                                    		<td id="dc_aseguradora"></td>
			                                    		<td id="dc_siniestro"></td>
			                                    		<!--td id="dc_total"></td-->
			                                    		<td id="btn_fotos"></td>
		                                    		</tr>
		                                    		<tr>
		                                    			<th>Taller</th>
		                                    			<th>Ciudad</th>
		                                    			<th>Telefono</th>
		                                    			<th>Contacto TRC</th>
		                                    		</tr>
		                                    		<tr>
			                                    		<td id="dc_taller"></td>
			                                    		<td id="dc_ciudad"></td>
			                                    		<td id="dc_telefono"></td>
			                                    		<td id="dc_contacto"></td>
		                                    		</tr>
		                                    	</tbody>
		                                    </table>

		                                    <table class="table">
		                                    	<thead>
		                                    		<tr>
		                                    			<th>Articulo</th>
		                                    			<th>Cantidad</th>
		                                    			<th>Observación</th>
		                                    			<th>Fecha Entrega</th>
		                                    			<th>Estado</th>
		                                    			<th></th>
		                                    			<!--th>Precio</th>
		                                    			<th>Dto</th>
		                                    			<th>Neto</th>
		                                    			<th>IVA</th>
		                                    			<th>Total</th-->
		                                    		</tr>
		                                    	</thead>
		                                    	<tbody id="table_cotizaciones_detalle_items">
		                                    		
		                                    	</tbody>
		                                    </table>
		                                </div>
		                                
		                            </div>
		                            <div class="border-bottom mt-4 d-block d-lg-none"></div>
		                        </div>
		                    </div>
		                </div>
		            </div>				
	        	</div>

				<div class="table-responsive" id="table_cotizaciones">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Fecha</th>
								<th>Código</th>
								<th>Cliente</th>
								<th>Marca de vechiculo</th>
								<th>Modelo de vechiculo</th>
								<th>Año de fabricación</th>
								<th>Placa</th>
								<th>Aseguradora</th>
								<th>Siniestro</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php $loop_var1=$fsc->resultados; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
								<tr>
									<td><?php echo $value1['idpresupuesto'];?></td>
									<td><?php echo $value1['fecha'];?></td>
									<td><?php echo $value1['codigo'];?></td>
									<td><?php echo $value1['nombrecliente'];?></td>
									<td><?php echo $value1['fm_marca_vehiculo'];?></td>
									<td><?php echo $value1['fm_modelo_vehiculo'];?></td>
									<td><?php echo $value1['anio_fabricacion'];?></td>
									<td><?php echo $value1['placa'];?></td>
									<td><?php echo $value1['aseguradora'];?></td>
									<td><?php echo $value1['siniestro'];?></td>
									<td>
										<button class="btn btn-primary btn-xs" onclick="verDetalleCotizacion('<?php echo $value1['idpresupuesto'];?>')">
											<i class="fa fa-eye"></i>
										</button>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<nav aria-label="Page navigation">
					  <ul class="pagination">
					    <li class="page-item"><a class="page-link" href="<?php if( $fsc->offset >= FS_ITEM_LIMIT ){ ?><?php echo $fsc->url;?>&offset=<?php echo $fsc->offset-FS_ITEM_LIMIT;?><?php }else{ ?>#<?php } ?>">Anterior</a></li>

						    <?php $loop_var1=$fsc->paginas(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
						    <li<?php if( $value1['actual'] ){ ?> class="page-item active"<?php } ?>>
				               <a href="<?php echo $value1['url'];?>" class="page-link"><?php echo $value1['num'];?></a>
				            </li>
				            <?php } ?>
					    <li class="page-item"><a class="page-link" href='<?php if( $fsc->offset+FS_ITEM_LIMIT < $fsc->total_registros() ){ ?><?php echo $fsc->url;?>&offset=<?php echo $fsc->offset+FS_ITEM_LIMIT;?><?php }else{ ?>#<?php } ?>'>Siguiente</a></li>

					  </ul>
					</nav>
				</div>
				
		    </div>
		    <div class="tab-pane fade <?php if( $fsc->mostrar=='search-pedidos-tab' ){ ?> show active <?php } ?>" id="search-pedidos" role="tabpanel" aria-labelledby="search-pedidos-tab" data-wow-delay="0.15">
		    	<h1 class="display-6 animated slideInDown">Consulta de pedidos</h1>

		    	<form class="form-inline" action="index.php?page=empresas&cod=<?php echo $fsc->empresa->codcontacto;?>&mostrar=search-pedidos-tab&action=search-pedidos" method="post">
		    		<input type="hidden" name="codcontacto" value="<?php echo $fsc->empresa->codcontacto;?>">
		    		<div class="row g-3">
		    			<div class="col-md-2">
				    		<label for="desde" class="visually-hidden">Desde</label>
				    		<input type="date" class="form-control" name="desde" id="desde" value="<?php echo $fsc->desde;?>" placeholder="Desde">
					  	</div>
					  	<div class="col-md-2">
					    	<label for="hasta" class="visually-hidden">Hasta</label>
					    	<input type="date" class="form-control" name="hasta" id="hasta" value="<?php echo $fsc->hasta;?>" placeholder="Hasta">
					  	</div>
					  	<div class="col-md-2">
				    		<label for="codigo" class="visually-hidden">Código</label>
				    		<input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $fsc->codigo;?>" placeholder="Código">
					  	</div>
					  	<div class="col-lg-3">
					    	<label for="cliente" class="visually-hidden">Cliente</label>
					    	<input type="text" class="form-control" name="cliente" id="cliente" value="<?php echo $fsc->cliente;?>" placeholder="Cliente">
					  	</div>	
					  	<div class="col-md-2">
				    		<label for="anio" class="visually-hidden">Año</label>
				    		<input type="text" class="form-control" name="anio" id="anio" value="<?php echo $fsc->anio;?>" placeholder="Año Fabricación">
					  	</div>
						<div class="col-md-2">
				    		<label for="placa" class="visually-hidden">Placa</label>
				    		<input type="text" class="form-control" name="placa" id="placa" value="<?php echo $fsc->placa;?>" placeholder="Placa">
					  	</div>
					  	<div class="col-md-3">
					    	<label for="aseguradora" class="visually-hidden">Aseguradora</label>
					    	<input type="text" class="form-control" name="aseguradora" id="aseguradora" value="<?php echo $fsc->aseguradora;?>" placeholder="Aseguradora">
					  	</div>
					  	<div class="col-md-2">
					    	<label for="siniestro" class="visually-hidden">Siniestro</label>
					    	<input type="text" class="form-control" name="siniestro" id="siniestro" value="<?php echo $fsc->siniestro;?>" placeholder="Siniestro">
					  	</div>
					  	<div class="col-auto">
					    	<button type="submit" class="btn btn-primary mb-3">
					    		<i class="fa fa-search"></i>
					    		Consultar
							</button>
					  	</div>
		    		</div>
				</form>
				<hr>

				<div id="table_pedidos_detalle" style="display: none;">
					<div class="border rounded p-4">
		                <div class="row g-4">
		                    <div class="col-12">
		                        <div class="h-100">
		                            <div class="d-flex">
		                                <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary" onclick="regresarAdminPedidos()">
		                                    <i class="fa fa-arrow-left text-white"></i>
		                                </div>
		                                <div class="ps-3">
		                                    <h4>Detalle Pedido</h4>
		                                    <table class="table">
		                                    	<tbody>
		                                    		<tr>
		                                    			<th>Código</th>
		                                    			<th>Cliente</th>
		                                    			<th>Marca de vehículo</th>
		                                    			<th>Modelo de vechiculo</th>
		                                    			<th>Año de fabricación</th>
		                                    			<th>Placa</th>
		                                    			<th>Aseguradora</th>
		                                    			<th>Siniestro</th>
		                                    			<th>Total</th>
		                                    		</tr>
		                                    		<tr>
			                                    		<td id="dp_codigo"></td>
			                                    		<td id="dp_cliente"></td>
			                                    		<td id="dp_marca_vehiculo"></td>
			                                    		<td id="dp_modelo_vehiculo"></td>
			                                    		<td id="dp_anio_fabricacion"></td>
			                                    		<td id="dp_placa"></td>
			                                    		<td id="dp_aseguradora"></td>
			                                    		<td id="dp_siniestro"></td>
			                                    		<td id="dp_total"></td>
		                                    		</tr>
		                                    	</tbody>
		                                    </table>

		                                    <table class="table">
		                                    	<thead>
		                                    		<tr>
		                                    			<th>Articulo</th>
		                                    			<th>Cantidad</th>
		                                    			<th>Precio</th>
		                                    			<th>Dto</th>
		                                    			<th>Neto</th>
		                                    			<th>IVA</th>
		                                    			<th>Total</th>
		                                    		</tr>
		                                    	</thead>
		                                    	<tbody id="table_pedidos_detalle_items">
		                                    		
		                                    	</tbody>
		                                    </table>
		                                </div>
		                                
		                            </div>
		                            <div class="border-bottom mt-4 d-block d-lg-none"></div>
		                        </div>
		                    </div>
		                </div>
		            </div>				
	        	</div>

				<div class="table-responsive" id="table_pedidos">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Fecha</th>
								<th>Código</th>
								<th>Cliente</th>
								<th>Marca de vechiculo</th>
								<th>Modelo de vechiculo</th>
								<th>Año de fabricación</th>
								<th>Placa</th>
								<th>Aseguradora</th>
								<th>Siniestro</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php $loop_var1=$fsc->resultados; $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
								<tr>
									<td><?php echo $value1['idpedido'];?></td>
									<td><?php echo $value1['fecha'];?></td>
									<td><?php echo $value1['codigo'];?></td>
									<td><?php echo $value1['nombrecliente'];?></td>
									<td><?php echo $value1['fm_marca_vehiculo'];?></td>
									<td><?php echo $value1['fm_modelo_vehiculo'];?></td>
									<td><?php echo $value1['anio_fabricacion'];?></td>
									<td><?php echo $value1['placa'];?></td>
									<td><?php echo $value1['aseguradora'];?></td>
									<td><?php echo $value1['siniestro'];?></td>
									<td>
										<button class="btn btn-primary btn-xs" onclick="verDetallePedidos('<?php echo $value1['idpedido'];?>')">
											<i class="fa fa-eye"></i>
										</button>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<nav aria-label="Page navigation">
					  <ul class="pagination">
					    <li class="page-item"><a class="page-link" href="<?php if( $fsc->offset >= FS_ITEM_LIMIT ){ ?><?php echo $fsc->url;?>&offset=<?php echo $fsc->offset-FS_ITEM_LIMIT;?><?php }else{ ?>#<?php } ?>">Anterior</a></li>

						    <?php $loop_var1=$fsc->paginas(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
						    <li<?php if( $value1['actual'] ){ ?> class="page-item active"<?php } ?>>
				               <a href="<?php echo $value1['url'];?>" class="page-link"><?php echo $value1['num'];?></a>
				            </li>
				            <?php } ?>
					    <li class="page-item"><a class="page-link" href='<?php if( $fsc->offset+FS_ITEM_LIMIT < $fsc->total_registros() ){ ?><?php echo $fsc->url;?>&offset=<?php echo $fsc->offset+FS_ITEM_LIMIT;?><?php }else{ ?>#<?php } ?>'>Siguiente</a></li>

					  </ul>
					</nav>
				</div>
				
		    </div>
		  </div>
		</div>
    </div>
    
    <div class="modal fade" id="modal_imagenes">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
				  <h4 class="modal-title">Imagenes Asociadas</h4>
				</div>
				<div class="modal-body">
				    <div id="images"></div>
				</div>
				<div class="modal-footer">
			      	<button type="button" class="btn btn-danger" onclick="$('#modal_imagenes').modal('hide')">
			        	Cerrar
			      	</button>
			    </div>
			</div>
		</div>
	</div>
    
    <script type="text/javascript">

    	function verDetallePedidos(idpedido) {
		  	$('#table_pedidos, #table_pedidos_detalle').toggle('slow');
		  	$.ajax({
			    type: "POST",
			    url: "<?php echo $fsc->url();?>",
			    data: {
			      get_pedido: idpedido,
			      cod: "<?php echo $fsc->empresa->codcontacto;?>"
			    },
			    success: function(response) {
			      	if (response) {
				        $('#dp_codigo').html(response.cabecera.codigo);
				        $('#dp_cliente').html(response.cabecera.nombrecliente);
				        $('#dp_marca_vehiculo').html(response.cabecera.marca_vehiculo);
				        $('#dp_anio_fabricacion').html(response.cabecera.anio_fabricacion);
				        $('#dp_placa').html(response.cabecera.placa);
				        $('#dp_aseguradora').html(response.cabecera.aseguradora);
				        $('#dp_siniestro').html(response.cabecera.siniestro);
				        $('#dp_total').html('$' + response.cabecera.total);

				        const html = response.detalle.map(item => `
				          <tr>
				            <td>${item.descripcion}</td>
				            <td>${item.cantidad}</td>
				            <td>$${item.pvpunitario}</td>
				            <td>${item.dtopor}%</td>
				            <td>$${item.pvptotal}</td>
				            <td>${item.iva}%</td>
				            <td>$ ${item.total}</td>
				          </tr>
				        `).join('');

				        $('#table_pedidos_detalle_items').html(html);
				    }
			    }
		  	});
		}	

		function verDetalleCotizacion(idpresupuesto) {
		  	$('#table_cotizaciones, #table_cotizaciones_detalle').toggle('slow');
		  	$.ajax({
			    type: "POST",
			    url: "<?php echo $fsc->url();?>",
			    data: {
			      get_cotizacion: idpresupuesto,
			      cod: "<?php echo $fsc->empresa->codcontacto;?>"
			    },
			    success: function(response) {
			      	if (response) {
				        $('#dc_codigo').html(response.cabecera.codigo);
				        $('#dc_cliente').html(response.cabecera.nombrecliente);
				        $('#dc_marca_vehiculo').html(response.cabecera.marca_vehiculo);
				        $('#dc_modelo_vehiculo').html(response.cabecera.modelo_vehiculo);
				        $('#dc_anio_fabricacion').html(response.cabecera.anio_fabricacion);
				        $('#dc_placa').html(response.cabecera.placa);
				        $('#dc_aseguradora').html(response.cabecera.aseguradora);
				        $('#dc_siniestro').html(response.cabecera.siniestro);
				        $('#dc_total').html('$' + response.cabecera.total);
				        $('#btn_fotos').html('<button class="btn btn-sm btn-primary" onclick="ver_fotos('+idpresupuesto+')"><i class="fa fa-picture-o"></i></button>');
				        $('#dc_taller').html(response.cabecera.taller);
				        $('#dc_ciudad').html(response.cabecera.ciudad);
				        $('#dc_telefono').html(response.cabecera.telefono);
				        $('#dc_contacto').html(response.cabecera.contacto);
				        /*const html = response.detalle.map(item => `
				          <tr>
				            <td>${item.descripcion}</td>
				            <td>${item.observacion_linea}</td>
				            <td>${item.cantidad}</td>
				            <td>$${item.pvpunitario}</td>
				            <td>${item.dtopor}%</td>
				            <td>$${item.pvptotal}</td>
				            <td>${item.iva}%</td>
				            <td>$ ${item.total}</td>
				          </tr>
				        `).join('');*/

				        const html = response.detalle.map(item => `
				          <tr>
				            <td>${item.descripcion}</td>
				            <td>${item.cantidad}</td>
				            <td>${item.observacion_linea}</td>
				            <td>${item.fecha_entrega}</td>
				            <td>${item.status}</td>
				            <td><i class="fa fa-eercast" style="color: ${item.color};"></i></td>
				          </tr>
				        `).join('');

				        $('#table_cotizaciones_detalle_items').html(html);
				    }
			    }
		  	});
		}	

		function verDetalleFactura(idfactura) {
		  	$('#table_facturas, #table_facturas_detalle').toggle('slow');
		  	$.ajax({
			    type: "POST",
			    url: "<?php echo $fsc->url();?>",
			    data: {
			      get_factura: idfactura,
			      cod: "<?php echo $fsc->empresa->codcontacto;?>"
			    },
			    success: function(response) {
			      	if (response) {
				        $('#df_codigo').html(response.cabecera.codigo);
				        $('#df_nro_factura').html(response.cabecera.numero_documento_sri);
				        $('#df_cliente').html(response.cabecera.nombrecliente);
				        $('#df_marca_vehiculo').html(response.cabecera.marca_vehiculo);
				        $('#df_anio_fabricacion').html(response.cabecera.anio_fabricacion);
				        $('#df_placa').html(response.cabecera.placa);
				        $('#df_aseguradora').html(response.cabecera.aseguradora);
				        $('#df_siniestro').html(response.cabecera.siniestro);
				        $('#df_total').html('$' + response.cabecera.total);

				        const html = response.detalle.map(item => `
				          <tr>
				            <td>${item.descripcion}</td>
				            <td>${item.cantidad}</td>
				            <td>$${item.pvpunitario}</td>
				            <td>${item.dtopor}%</td>
				            <td>$${item.pvptotal}</td>
				            <td>${item.iva}%</td>
				            <td>$ ${item.total}</td>
				          </tr>
				        `).join('');

				        $('#table_facturas_detalle_items').html(html);
				    }
			    }
		  	});
		}	

		function regresarAdminCotizaciones() {
    		$('#table_cotizaciones').show('slow');
    		$('#table_cotizaciones_detalle').hide('slow');
    	}

    	function regresarAdminFacturas() {
    		$('#table_facturas').show('slow');
    		$('#table_facturas_detalle').hide('slow');
    	}

    	function regresarAdminPedidos() {
    		$('#table_pedidos').show('slow');
    		$('#table_pedidos_detalle').hide('slow');
    	}

    	/*$(document).ready(function() {

    	});*/

    	function ver_fotos(iddoc) {
    		$("#images").html('')
    		$.ajax({
			    type: "POST",
			    url: "<?php echo $fsc->url();?>",
			    data: {
			      get_fotos: iddoc,
			      cod: "<?php echo $fsc->empresa->codcontacto;?>",
			      tipo: 'idpresupuesto'
			    },
			    success: function(response) {
			    	img = '';
			    	$.each(response, function(i, item) {
			    		img += `<a href="${item.ruta}" target="_blank"><img src="${item.ruta}" height="250px" width="250px"></a>|`;
			    	});
			    	$("#images").html(img);
    				$("#modal_imagenes").modal("show");
			    }
			});
    	}
    </script>
<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>