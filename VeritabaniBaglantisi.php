<?php
		$sunucuad = "localhost";
		$kullanad = "admin";
		$sifre = "admin";
		$dbad = "proje";
		$conn = mysqli_connect($sunucuad,$kullanad,$sifre,$dbad);
		mysqli_set_charset($conn,'utf8');

		if(!$conn){
		die("Baglanti Basarisiz: ".mysqli_connect_error);
		}
?>
