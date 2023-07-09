<?php
    // @session_start();
    // require_once("functions.php");
    

    if(isset($_GET['supprimer'])){
        require_once("../classe/classeCategorie.php");
        $Id= htmlspecialchars($_GET['supprimer']);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Categorie();
        foreach($str as $ide){
            $a= $objet->deleteCategorie($ide);
        }
        echo $a;
        // header("location: index.php");
    }
    else if(isset($_POST['ajouter'])){
        require_once('../classe/classeCategorie.php');
        $Categorie = new Categorie();

        echo $Categorie->addCategorie($_POST['libelle']);
    }
    else if(isset($_POST['modifier'])){
        require_once('../classe/classeCategorie.php');
        $Categorie = new Categorie();

        echo $Categorie->updateCategorie($_POST['modifier'], $_POST['libelle']);
    }else{
        if(isset($opt)){
            $opt = explode("-", $opt);
            $option = $opt[0];
            if($option == "ajouter"){
                include('php/view/categorie/ajouter.php');
            }else if($option == "modifier"){
                require_once('php/classe/classeCategorie.php');

                include('php/view/categorie/modifier.php');
            }else if($option=="supprimer"){
               require_once('php/classe/classeCategorie.php');

                include('php/view/categorie/liste.php');
            }
            else if($option=="details"){
                include('php/view/categorie/details.php');
            }else if($option=="liste"){
                include('php/view/categorie/liste.php');
            }
        }
        else{
            include('php/view/categorie/liste.php');
        }
    }
?>