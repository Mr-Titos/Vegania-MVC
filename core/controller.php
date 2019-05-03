<?php

class Controller{
	var $vars=array();
	var $layout ='defaut';
	
	function set($id){
		$this->vars=array_merge($this->vars,$id);
	}
	
	function render($filename){
		extract($this->vars);
		ob_start();
		require(ROOT.'views/'.get_class($this).'/'.$filename.'.php');
		$content_for_layout=ob_get_clean();
		if($this->layout == false){
			echo $content_for_layout;
		}else{
			require(ROOT.'views/layout/'.$this->layout.'.php');
		}
	}
}
?>