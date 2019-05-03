<?php
class Client extends Controller{
	
	
	function index(){
		
                 $pdo=new PDO("mysql:host=localhost;dbname=ebook","root","");
                $pdo->exec('SET NAMES utf8');
				$pers = Model::load("client");
                $pers->id=1 ;
                 $test=$pers->read($pdo);


	     $variables['client']=array('titre'=>'Les clients','description'=>'Les clients sont cools...,'personne'=>$test');
	    $this->set($variables);
	    $this->render('index');	
		
	}
}
?>