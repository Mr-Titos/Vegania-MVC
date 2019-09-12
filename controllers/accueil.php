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
class Accueil extends Controller {
    //put your code here
    function index() {
        $variables['info'] = array(
            'titre' => "Vegania",
            'description' => "Bienvenue sur le site web de l'organisation Vegania !"
        );

        $this->set($variables);
        $this->render('index');
    }

    function banane() {
        echo "<br>test sur le controller accueil méthode banane";
    }
}
?>
