<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("header") . ( substr("header",-1,1) != "/" ? "/" : "" ) . basename("header") );?>

	<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("cont-solutions") . ( substr("cont-solutions",-1,1) != "/" ? "/" : "" ) . basename("cont-solutions") );?>

<?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("footer") . ( substr("footer",-1,1) != "/" ? "/" : "" ) . basename("footer") );?>