<?php

    /*Permet de se connecter avec la base de données*/

    class Connexion{



        public static function Connect(){

            $conn = NULL;

            try{

                /*On essaie d'etablir la connexion*/ 

                    $conn = new PDO("mysql:host=localhost;dbname=mglsi_news", "root", "passer");

                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                } catch(PDOException $e){

                    /*Si elle echoue, on recupere l'erreur et on l'affiche*/

                    echo 'ERROR: ' . $e->getMessage();

                    }    

                return($conn);

        }

    }

?>




