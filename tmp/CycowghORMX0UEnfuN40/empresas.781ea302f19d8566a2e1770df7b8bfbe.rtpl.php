<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>
    
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">Empresas Registradas</h1>
        </div>
    </div>

    <!-- Empresas Start -->

    <div class="row px-xl-5 pb-3">
        <?php $loop_var1=$fsc->crm_contacto->all(); $counter1=-1; if($loop_var1) foreach( $loop_var1 as $key1 => $value1 ){ $counter1++; ?>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" src="<?php echo $value1->urllogo_app;?>" alt="">
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="index.php?page=empresas&cod=<?php echo $value1->codcontacto;?>&mostrar=search-facturas-tab" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>&nbsp;&nbsp;<?php echo $value1->nomcomer_app;?></a>
                    </div>
                </div>
            </div>
        <?php }else{ ?>
        <center><img src="images/sinresultados.png" width="400px" height="400px"></center>
        <?php } ?>
    </div>

    <!-- Empresas End -->


<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>