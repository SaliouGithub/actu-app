<?php
    if(isset($_GET['changerEtat'])){
        require_once("../classe/classeScenario.php");
        $Id= htmlspecialchars($_GET['changerEtat']);
        $etat= htmlspecialchars($_GET['etat']);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Scenario();
        foreach($str as $ide){
            $a= $objet->changeState($ide, $etat);
        }
        echo $a;
        // header("location: index.php");
    }else if(isset($_GET['supprimer'])){
        require_once("../classe/classeScenario.php");
        $Id= htmlspecialchars($_GET['supprimer']);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Scenario();
        foreach($str as $ide){
            $a= $objet->deleteScenario($ide);
        }
        echo $a;
        // header("location: index.php");
    }
    else if(isset($_POST['ajouter'])){
        require_once('../classe/classeScenario.php');
        $Scenario = new Scenario();
        if ($Scenario->libelleExist(strtoupper(htmlentities(htmlspecialchars($_POST['libelle']), ENT_SUBSTITUTE))) == false) {
            $Scenario = new Scenario(strtoupper(htmlentities(htmlspecialchars($_POST['libelle']), ENT_SUBSTITUTE)), htmlspecialchars(implode(",", $_POST['idProfile'])));
            echo $Scenario->addScenario();
        }
        else{
            echo 2;
        }
    }
    else if(isset($_POST['modifier'])){
        // require_once('../classe/classeScenario.php');
        // $Scenario = new Scenario();
        // if ($Scenario->libelleExist2(strtoupper(htmlentities(htmlspecialchars($_POST['libelle']), ENT_SUBSTITUTE)), htmlspecialchars($_POST['modifier'])) == false ) {
        //     $Scenario = new Scenario(strtoupper(htmlentities(htmlspecialchars($_POST['libelle']), ENT_SUBSTITUTE)), htmlspecialchars(implode(",", $_POST['idProfile'])));
        //     echo $Scenario->updateScenario(htmlspecialchars($_POST['modifier']));
        // }
        // else{
        //     echo 2;
        // }
    }
    else{
        if(isset($opt)){
            $opt = explode("-", $opt);
            $option = $opt[0];
            if($option == "ajouter"){
                include('php/view/tableaubord/ajouter.php');
            }else if($option == "modifier"){
                // require_once('php/classe/classeScenario.php');

                include('php/view/tableaubord/modifier.php');
            }else if($option=="supprimer"){
            //    require_once('php/classe/classeScenario.php');

                include('php/view/tableaubord/liste.php');
            }
            else if($option=="details"){
                include('php/view/tableaubord/details.php');
            }else if($option=="liste"){
                include('php/view/tableaubord/liste.php');
            }
        }
        else{
            include('php/view/tableaubord/liste.php');
        }
    }
?>