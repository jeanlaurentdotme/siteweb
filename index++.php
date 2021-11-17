<?php

$maintenance == 0;

session_start();
require_once("bdd.php");


//GET USER IP
if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	$ip = $_SERVER['HTTP_CLIENT_IP'];
}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
	$ip = $_SERVER['REMOTE_ADDR'];
}

//GESTION PAGES
$p=$_GET['p'];
if(empty($_GET['p'])){
	$p = "accueil";
}

if($maintenance == 0){
	if($p == "accueil"){
		include("pages/home.php");
	} else if($p == "offres"){
		include("pages/offres.php");
	} else {
		include("pages/404.php");
	}
} else {
	include("pages/maintenance.php");
}


?>