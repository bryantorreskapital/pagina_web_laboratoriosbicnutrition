<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>

<?php if( $fsc->cont=='modulo-comercial' ){ ?>
	<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("cont-modulo-comercial") . ( substr("cont-modulo-comercial",-1,1) != "/" ? "/" : "" ) . basename("cont-modulo-comercial") );?>
<?php }elseif( $fsc->cont=='modulo-clinicas' ){ ?>
	<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("cont-modulo-clinicas") . ( substr("cont-modulo-clinicas",-1,1) != "/" ? "/" : "" ) . basename("cont-modulo-clinicas") );?>
<?php }elseif( $fsc->cont=='modulo-produccion' ){ ?>
	<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("cont-modulo-produccion") . ( substr("cont-modulo-produccion",-1,1) != "/" ? "/" : "" ) . basename("cont-modulo-produccion") );?>
<?php }elseif( $fsc->cont=='modulo-restaurantes' ){ ?>
	<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("cont-modulo-restaurantes") . ( substr("cont-modulo-restaurantes",-1,1) != "/" ? "/" : "" ) . basename("cont-modulo-restaurantes") );?>
<?php }elseif( $fsc->cont=='modulo-transporte' ){ ?>
	<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("cont-modulo-transporte") . ( substr("cont-modulo-transporte",-1,1) != "/" ? "/" : "" ) . basename("cont-modulo-transporte") );?>
<?php }elseif( $fsc->cont=='modulo-talleres' ){ ?>
	<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("cont-modulo-talleres") . ( substr("cont-modulo-talleres",-1,1) != "/" ? "/" : "" ) . basename("cont-modulo-talleres") );?>
<?php }elseif( $fsc->cont=='modulo-veterinarias' ){ ?>
	<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("cont-modulo-veterinarias") . ( substr("cont-modulo-veterinarias",-1,1) != "/" ? "/" : "" ) . basename("cont-modulo-veterinarias") );?>
<?php }elseif( $fsc->cont=='modulo-funerarias' ){ ?>
	<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("cont-modulo-funerarias") . ( substr("cont-modulo-funerarias",-1,1) != "/" ? "/" : "" ) . basename("cont-modulo-funerarias") );?>
<?php } ?>

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>