<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of accueil
 *
 * @author delphine_user
 */
class produits extends Controller{
    //put your code here
   function index(){
	    $pdo=new PDO("mysql:host=localhost;dbname=ebook","root","");
		$pdo->exec('SET NAMES utf8');
		$prod = Model::load('produit');
		$resultat = $prod->find($pdo,array(),"*");
		$variables['prod']=array('mesproduits'=>$resultat);
		$this->set($variables);
		$this->render('index');
    }
	
	function detail($id){
		
		
		$pdo=new PDO("mysql:host=localhost;dbname=ebook","root","");
		$pdo->exec('SET NAMES utf8');
		$prod = Model::load('produit');
		$resultat = $prod->find($pdo,array('condition'=>'IdProd='.$id),"*");
		$nom = $prod->find($pdo,array('condition'=>'IdProd='.$id),"IdProd");
		$variables['prod']=array('mesproduits'=>$resultat);
		$this->set($variables);
		$this->render('detail');
	}
	 function banane(){
        echo "<br>test sur le controller accueil méthode banane";
    }
}
?>