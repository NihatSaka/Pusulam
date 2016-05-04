
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

	<title>Admin Panelim</title>
	<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
	<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
	<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
	<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
	<link href="template1.css" media="all" rel="stylesheet" />
	<style>
	body {
				background-image: url(images/bgadmin.png);
}

		#tablo{
			position: absolute;
			top: 200px;
			left: 300px;
			z-index: 50;
			color: white;
		}
		#icon{
			position: absolute;
			top: 20px;
			left: 500px;
			z-index: 50;

		}
		#surucu{
			overflow:scroll;
			color: #000000;
			height:150px;
		}
		.scrollit {
		overflow:scroll;
		color: #000000;
		height:250px;
}
		#pusulam{
			position: absolute;
			top: 5px;
			left: 482px;
			z-index: 50;
			color: white;

		}
		#filtre{
			position: absolute;
			top: 250px;
			left: 50px;
			z-index: 50;
			color: white;

		}
		#user{
			position: absolute;
			top: 20px;
		right:25px;
			z-index: 50;

		}

		#logout{
			position: absolute;
			top:-2px;
			right:-23px;
		}
	</style>
	</head>
	<body>

		<?php
		session_start();
		$user=$_SESSION["user"];
		echo"<div id='user'><div id='logout'><a href='Giris.php'><img src='images/logout.png' width='20px' height='20px' /></a></div><label style='background:#000000'><font color='#FFFFFF' size='2px'>$user</font></label></div>";

		include('VeritabaniBaglantisi.php');


		$phpArray=array();

		if(isset($_POST['Filtrele'])){

		$sutun=$_POST['yer'];
		$aranan=$_POST['FiltreDeger'];



		$sql = "SELECT * FROM `adres`  WHERE `adres`.`$sutun` like '%$aranan%'";
		$sonuc = mysqli_query($conn,$sql) or die("Error");

		//print_r($sonuc);
		//echo "<br>";
		$sayac=0;

			if(mysqli_num_rows($sonuc)>0)
		{
			while($satir = mysqli_fetch_assoc($sonuc))
		{
			$benzersizNo=$satir['URUN_ID'];
			$phpArray[$sayac]=$benzersizNo;
			$sayac=$sayac+1;

			$mahalle=$satir['ABONE_MAHALLE'];
			$phpArray[$sayac]=$mahalle;
			$sayac=$sayac+1;

			$sokak=$satir['ABONE_SOKAK'];
			$phpArray[$sayac]=$sokak;
			$sayac=$sayac+1;

			$no=$satir['ABONE_ADRES_ID'];
			$phpArray[$sayac]=$no;
			$sayac=$sayac+1;

			$ilce=$satir['ABONE_ILCE'];
			$phpArray[$sayac]=$ilce;
			$sayac=$sayac+1;

			$sehir=$satir['ABONE_SEHIR'];
			$phpArray[$sayac]=$sehir;
			$sayac=$sayac+1;

		}
		}

		}
		else{

		$sql = "SELECT * FROM `adres`";
		$sonuc = mysqli_query($conn,$sql) or die("Error");

		$sayac=0;

		  if(mysqli_num_rows($sonuc)>0)
		{
		  while($satir = mysqli_fetch_assoc($sonuc))
		{
			$benzersizNo=$satir['URUN_ID'];
			$phpArray[$sayac]=$benzersizNo;
			$sayac=$sayac+1;

		  $mahalle=$satir['ABONE_MAHALLE'];
		  $phpArray[$sayac]=$mahalle;
			$sayac=$sayac+1;

		  $sokak=$satir['ABONE_SOKAK'];
		  $phpArray[$sayac]=$sokak;
			$sayac=$sayac+1;

		  $no=$satir['ABONE_ADRES_ID'];
		  $phpArray[$sayac]=$no;
			$sayac=$sayac+1;

		  $ilce=$satir['ABONE_ILCE'];
		  $phpArray[$sayac]=$ilce;
			$sayac=$sayac+1;

		  $sehir=$satir['ABONE_SEHIR'];
		  $phpArray[$sayac]=$sehir;
			$sayac=$sayac+1;

		}
		}
		}

				$surucu="kullanici";
				$sql2 = "SELECT * FROM `kullanicilar` WHERE `kullanicilar`.`KULLANICI_TURU`='surucu'";
				$sonuc2= mysqli_query($conn,$sql2) or die("Error");

				//print_r($sonuc2);
				//echo "<br>";
				$phpArray2=array();
				$sayac=0;

				  if(mysqli_num_rows($sonuc2)>0)
				{
				  while($satir2 = mysqli_fetch_assoc($sonuc2))
				{
					$isim=$satir2['AD'];
					$phpArray2[$sayac]=$isim;
					$sayac=$sayac+1;

					$soyad=$satir2['SOYAD'];
					$phpArray2[$sayac]=$soyad;
					$sayac=$sayac+1;

					$email=$satir2['EMAIL'];
					$phpArray2[$sayac]=$email;
					$sayac=$sayac+1;

				}
				}
				//print_r($phpArray2);
		?>
		<div id="pusulam"><img src="images/pusulam.png" height="40px" width="200px"></img></div>
		<div id="icon"><img src="images/icon2.png"/></div>
		<div id="tablo" >
			<div><h2>ADRES VERİLERİ</h2></div>
			<tbody>
			<div class="scrollit">
			<table border="5" style="solid">
				<tr>
					<td><strong>NO</strong></td>
					<td><strong>MAHALLE</strong></td>
					<td><strong>CADDE</strong></td>
					<td><strong>ADRES NO</strong></td>
					<td><strong>İLÇE</strong></td>
					<td><strong>ŞEHİR</strong></td>
				</tr>

				<tr>
		<?php
		$i=1;

		foreach($phpArray as $data){
			echo"<td>".$data."</td>";
			if(($i%6)==0)
			echo"</tr><tr>";
			$i=$i+1;
		}

		echo"</tbody>";
			echo"</table>";
			echo"</div>";
			echo "<p id='SürücüBaşlık'><h3>SÜRÜCÜ LİSTESİ</h3></p>";
			echo "<div id='surucu'>";
			echo"<table border='1' style='solid'>";
			echo "<br>";

			echo "<br>";


			$j=1;
			$tut=1;
			echo '<form  action="AdminPanel.php" method="post">';
			$i=0;
			$dizi=array();

			foreach($phpArray2 as $value){
				echo"<td>".$value."</td>";
				if(($j%3)==0){
					$name="rotaDeger".$tut;
					echo "<input name='$tut' type=hidden value='$value' />";
				echo"<td><input name='$name' size='30px' type='text' placeholder='Adres Numaraları Giriniz...(1,2,3...)'/></td>";
				echo"</tr><tr>";
				$tut=$tut+1;
				$dizi[$i]=$name;
				$i=$i+1;
			}
				$j=$j+1;
			}
			$diziEleman=count($dizi);
			echo "<input name=diziSayısı type=hidden value='$diziEleman' />";
			echo "<input type='submit' name='rotaYolla' value='Rota Ata'></tr>";
			echo "</table>";
			echo "</div>";
			echo "</form>";


		if(isset($_POST['rotaYolla'])){
			$diziAl= $_POST['diziSayısı'];
			$tut=1;
			$kontrol=false;
			$kontrolEleman=true;

			for ($i=0; $i < $diziAl; $i++) {
				$strg="rotaDeger".$tut;
				$strg2=$tut;

				$rota=$_POST[$strg];
				$Email=$_POST[$strg2];



				$rotaDizisi=explode(",",$rota);
				$rotaUzunlugu=count($rotaDizisi);


				foreach ($rotaDizisi as $key ) {
					$sql = "SELECT * FROM `adres`  WHERE `adres`.`URUN_ID` = '$key'";
					$sonuc = mysqli_query($conn,$sql) or die("Error");

						if(mysqli_num_rows($sonuc)==0 and $key!="")
						$kontrolEleman=false;
				}



				if($kontrolEleman==true){
				if($rotaUzunlugu>10){
					$uyari="<script>alert('HATA: ($Email YE ATANAN ROTA)  HER BİR ROTA EN FAZLA 10 ADRESTEN OLUŞMALIDIR!')</script>";
						echo $uyari;
				}
				else {


				$sqlKontrol = "SELECT * FROM `ROTALAR`  WHERE `ROTALAR`.`EMAIL` = '$Email'";
				$sonucKontrol = mysqli_query($conn,$sqlKontrol) or die("Error");
				$sayacKontrol=0;

					if(mysqli_num_rows($sonucKontrol)>0)
				{
					while($satirKontrol = mysqli_fetch_assoc($sonucKontrol))
				{
					if($satirKontrol['ROTA']==$rota)
					$kontrol=true;
				}
			}
			if($kontrol==false){
				if ($rota!="") {





					                    $myArray = explode(',',$rota);
															$phpArray3 = array();
															foreach ($myArray as $key => $value) {

																$sql = "SELECT * FROM `adres` WHERE `adres`.`URUN_ID`='$value'";
																$sonuc = mysqli_query($conn,$sql) or die("Error");

																			$str="";
																			  if(mysqli_num_rows($sonuc)>0)
																			{
																			  while($satir = mysqli_fetch_assoc($sonuc))
																			{
																			  $mahalle=$satir['ABONE_MAHALLE'];
																			  $str=$mahalle;
																			  $sokak=$satir['ABONE_SOKAK'];
																			  $str=$str." , ".$sokak;
																			  $no=$satir['ABONE_ADRES_ID'];
																			  $str=$str." , ".$no;
																			  $ilce=$satir['ABONE_ILCE'];
																			  $str=$str." , ".$ilce;
																			  $sehir=$satir['ABONE_SEHIR'];
																			  $str=$str." , ".$sehir;

																			  $phpArray3[$sayac]=$str;

																			  $sayac=$sayac+1;
																			}
																			}






															}


															$arraylat = array();
															$arraylon = array();
															$sa = 0;
															foreach ($phpArray3 as $key => $value) {
																$Address = urlencode($phpArray3[$key]);
																  $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$Address."&sensor=true";
																  $xml = simplexml_load_file($request_url) or die("url not loading");
																  $status = $xml->status;
																  if ($status=="OK") {
																      $Lat = $xml->result->geometry->location->lat;
																      $Lon = $xml->result->geometry->location->lng;
																      $LatLng = "$Lat,$Lon";
																			$arraylat[$sa] =$Lat;
																			$arraylon[$sa] =$Lon;

																  }
															$sa+=1;
															}

															$sa2=0;
															$toplam=0;
															foreach($arraylat as $key){
															$sa3 = $sa2 + 1;

															if(!empty($arraylat[$sa3]) && !empty($arraylon[$sa3])){

															//  	$salat2  =  number_format($arraylat[$sa2],2,'.','');
															//	 $salon2  =  number_format($arraylon[$sa2],2,'.','');
															//	 $salat3  =  number_format($arraylat[$sa3],2,'.','');
															//	 $salon3  =   number_format($arraylon[$sa3],2,'.','');
															//  echo $arraylat[$sa2].'     '.$arraylon[$sa2].'       '.$arraylat[$sa3].'        '.$arraylon[$sa3].'</br>';
															$bla =  distanceGeoPoints((double)$arraylat[$sa2],(double)$arraylon[$sa2],(double)$arraylat[$sa3],(double)$arraylon[$sa3]);



															$toplam +=$bla;


															}
															$sa2+=1;

															}
                          // Her nokta için distance hesaplama


													$myfile = fopen("distancedegerleri.txt", "a") or die("Unable to open file!");

															$s = 0;
															$filearray = array();
															$r= 0;
                              $main = $Email." // ".$rota."\r\n\r\n";
                              fwrite($myfile,$main);
															foreach($arraylat as $key){
																$s2 = $s + 1;
																$t = 0;

																foreach($arraylon as $key2){


																		 $distance = distanceGeoPoints((double)$arraylat[$s],(double)$arraylon[$s],(double)$arraylat[$t],(double)$arraylon[$t]);
															        if($s!=$t){
															             $s1 = $s + 1;
																					 $t1 = $t + 1;

																				 		$sonuc = $myArray[$s]. "-".$myArray[$t]. " : ".$distance;
																						$filearray[$r] =  $sonuc. "\r\n";
															              fwrite($myfile,$filearray[$r]);
																			}



																	$t+=1;
																}

																$s+=1;
																$r+=1;
															}
															$file_end = "\r\n";
															fwrite($myfile,$file_end);

															fclose($myfile);










				$sql = "INSERT INTO `proje`.`ROTALAR`(`EMAIL`,`ROTA`,`TOPLAM_DISTANCE`) VALUES('$Email','$rota','$toplam');";
								if(mysqli_query($conn,$sql))
									{




									}
									else
										echo "Kayıt Ekleme Başarısız Oldu, Hata: ".mysqli_error($conn);
								}
			}
			else {
				$uyari="<script>alert('HATA:$Email AYNI SÜRÜCÜYE BİRDEN FAZLA AYNI ROTA YÜKLENEMEZ!')</script>";
					echo $uyari;
			}
			$kontrol=false;
			}
			}
			else {
				$uyari="<script>alert('HATA:$Email SÜRÜCÜSÜNÜN ROTASINA LİSTEDE OLMAYAN BİR ADRES EKLENDİNİZ!')</script>";
					echo $uyari;
			}
			$tut=$tut+1;
			$kontrolEleman=true;
			}
			}




			function distanceGeoPoints ($lat1, $lng1, $lat2, $lng2) {

			    $earthRadius =3958.75;

			    $dLat =  deg2rad($lat2-$lat1);
			    $dLng = deg2rad($lng2-$lng1);


			    $a =   sin($dLat/2) * sin($dLat/2) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * sin($dLng/2) * sin($dLng/2);
			    $c =   2 * atan2(sqrt($a), sqrt(1-$a));
			    $dist= $earthRadius * $c;

			    // from miles
			    $meterConversion = 1609;
			    $geopointDistance = $dist * $meterConversion;
			    $kmConversion = $geopointDistance/1000;

					//$toplam = $toplam + $kmConversion;

					if(is_float($kmConversion)){

					 return number_format($kmConversion,2,'.','').' km';



				 } else {
			   	//	 $toplam += $kmConversion;

					 return $kmConversion.' km';
				 }
			}




			?>

		</div>

<div id="filtre">
		<form  action="AdminPanel.php" method="post">
		<span id="spryselect4">
		<select name="yer" id="yer">
		<option value="ABONE_MAHALLE">MAHALLE</option>
		<option value="ABONE_SOKAK">CADDE</option>
		<option value="ABONE_ILCE">İLÇE</option>
		<option value="ABONE_SEHIR">ŞEHİR</option>
		</select>
		<br>
		<span class="selectRequiredMsg">Lütfen bir öğe seçin.</span></span>

		<span id="sprytextfield5">
    <input name="FiltreDeger" id="FiltreDeger" type="text" placeholder="Filtrele..."/>
    <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span><span class="textfieldInvalidFormatMsg">Geçersiz format.</span></span>
		<br>
		<input type="submit" name="Filtrele" value="Filtrele">
		</form>
		<form  action="AdminPanel.php" method="post">
		<input type="submit" name="düzelt" value="Filtre Kaldır">
		</form>
</div>

	<script type="text/javascript">
	var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4", {validateOn:["blur"]});
	var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
	</script>
	</body>
	</html>
