<?php
	@session_start();
	session_unset();
	session_destroy();

	@session_start();
	require_once('../classe/classeUtilisateur.php');
	$Utilisateur = new Utilisateur(); 

	if($Utilisateur->isLogged($_POST['login'], $_POST['motDePasse']) == true){
		if($Utilisateur->isActivated($_POST['login'], $_POST['motDePasse']) == true){
			$infos = $Utilisateur->detailsUtilisateur($_POST['login'], sha1($_POST['motDePasse']));
			$_SESSION['Actuconnected'] = true;

			$_SESSION['ActuidUtilisateur'] = $infos[0]['idUtilisateur'];
			$_SESSION['Actuemail'] = $infos[0]['email'];
			$_SESSION['Actuadresse'] = $infos[0]['adresse'];
			$_SESSION['ActumotDePasse'] = $infos[0]['motDePasse'];
			$_SESSION['Actulogin'] = $infos[0]['login'];
			$_SESSION['Actunom'] = $infos[0]['nom'];
			$_SESSION['Actuprenom'] = $infos[0]['prenom'];
			$_SESSION['Actutelephone'] = $infos[0]['telephone'];
			$_SESSION['ActuidRole'] = $infos[0]['idRole'];
		
			
			if($infos[0]['idRole'] == 1){
				$_SESSION['Actuadministrateur'] = true;
				echo 1;
			}
			else if($infos[0]['idRole'] == 2){
				$_SESSION['Actusimple'] = true;
				echo 2;
			}
			

			
		}else{
			echo 40;
		}
		
	}
	else {
		echo -1;
	}
?>