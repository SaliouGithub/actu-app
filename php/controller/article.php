<?php
@session_start();
   if(isset($_GET['supprimer'])){
    require_once("../classe/classeArticle.php");
    $Id= htmlspecialchars($_GET['supprimer']);
    $str = explode("$", $Id);
    $a=0;
    $objet = new Article();
    foreach($str as $ide){
        $a= $objet->deleteArticle($ide);
    }
    echo $a;
        // header("location: index.php");
    }
    else if(isset($_POST['ajouter'])){
        require_once('../classe/classeArticle.php');
        $Article = new Article();

        echo $Article->addArticle($_POST['titre'],$_POST['contenu'],$_POST['categorie']);
    }
    else if(isset($_POST['modifier'])){
        require_once('../classe/classeArticle.php');
        // $Article = new Article();
            $Article = new Article();
            echo $Article->updateArticle(htmlspecialchars($_POST['modifier']), htmlspecialchars($_POST['titre']), htmlspecialchars($_POST['contenu']), htmlspecialchars($_POST['categorie']));
     
    }
    else{
        if(isset($opt)){
            $opt = explode("-", $opt);
            $option = $opt[0];
            if($option == "ajouter"){
                include('php/view/article/ajouter.php');
            }else if($option == "modifier"){
                // require_once('php/classe/classeScenario.php');

                include('php/view/article/modifier.php');
            }else if($option=="supprimer"){
            //    require_once('php/classe/classeScenario.php');

                include('php/view/article/liste.php');
            }
            else if($option=="details"){
                include('php/view/article/details.php');
            }else if($option=="liste"){
                include('php/view/article/liste.php');
            }
        }
        else{
            include('php/view/article/liste.php');
        }
    }
?>