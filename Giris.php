<?php

			if(isset($_POST['buton2'])){

	$ad=$_POST['Ad'];
	$soyad=$_POST['soyad'];
	$kul_Tur=$_POST['Kul_Tur'];
	$eposta=$_POST['Email'];
	$password=md5($_POST['Şifre']);





	$deger=0;
		 include('VeritabaniBaglantisi.php');

		$sql = "SELECT * FROM `kullanicilar`";
		$sonuc = mysqli_query($conn,$sql) or die("Error");

			if(mysqli_num_rows($sonuc)>0)
		{

			while($satir = mysqli_fetch_assoc($sonuc))
		{
			if($eposta==$satir['EMAIL'])
			$deger=1;

			}

		}
		if($deger==1){
		$message = "Kayıt Olumsuz";
	echo "<script type='text/javascript'>";
	echo "alert('$message');
	 window.location.href='/Kayitol.php';
	 </script>";
	}
		else{
			$sql = "INSERT INTO `proje`.`kullanicilar` (`AD`, `SOYAD`, `EMAIL`, `SIFRE`, `KULLANICI_TURU`) VALUES ('$ad', '$soyad', '$eposta', '$password', '$kul_Tur');";
if(mysqli_query($conn,$sql))
{


	echo "<script type='text/javascript'>";

	echo "if (window.confirm('Kayıt başarılı bir şekilde eklendi. Giriş yapmak için tamam tuşuna basınız.'))
{

}
else
{
	window.location.href='/Kayitol.php';
}

	 </script>";
}
else
{
	$message_access = "Kayıt Ekleme Başarısız Oldu, Hata: ".mysqli_error($conn);
echo "<script type='text/javascript'>";
echo "alert('$message_access');
</script> ";
}
		}
	}


//------------------------------------------------------------------------------------

if(isset($_POST['giris'])){
   include('VeritabaniBaglantisi.php');
    ob_start();
session_start();

$kadi = $_POST['eposta'];
$sifre=md5($_POST['sifre']);
// echo $kadi;


$sql = "SELECT * FROM `kullanicilar` WHERE `kullanicilar`.`EMAIL` = '$kadi'";

$tut=mysqli_query($conn,$sql) or die("Hatalı Email veya Şifre Girdiniz !");
$satir=mysqli_fetch_assoc($tut);
$pass=$satir["SIFRE"];
$kulTur=$satir["KULLANICI_TURU"];
if($kulTur != "admin"){
if($pass == $sifre)  {
    $_SESSION["login"] = "true";
    $_SESSION["user"] = $kadi;
    $_SESSION["pass"] = $sifre;
    header("Location:Anasayfa.php");
}
else {
    if($kadi=="" or $sifre=="") {
      echo "<center>Lutfen kullanici adi ya da sifreyi bos birakmayiniz..! <a href=javascript:history.back(-1)>Geri Don</a></center>";
    }
    else {
				$message_access = "Hata: Kullanici Adi/Sifre Yanlis.";
				echo "<script type='text/javascript'>";
				echo "alert('$message_access');
				</script>";
    }
}
}
else {
  $_SESSION["login"] = "true";
  $_SESSION["user"] = $kadi;
  $_SESSION["pass"] = $sifre;
  header("Location:AdminPanel.php");
}
ob_end_flush();
}

    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Başlıksız Belge</title>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationCheckbox.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationCheckbox.css" rel="stylesheet" type="text/css" />

<style type="text/css">
body {



 padding:0;
 font-family:Arial, Helvetica, sans-serif;
 font-size:11px;
 color:#000;
}
#tablo{
	margin-top:240px;

	margin-right:370px;

}

#container{

  z-index: 50;
  float: right;
  }

#image{

margin-top: 200px;
float: left;
margin-right: 30px;

}
#girisyapbuton{

	margin-left: 230px;


}
#p1{



		margin-left: 178px;
margin-top: 10px;


}
</style>

</head>
<body>




<form action="Giris.php" method="post">

	<div id='container'>
		<div id="image">

		<img src="images/icon3.png">

		</div>


<table width="285" border="0" id="tablo">
    <tr>


<td>
	<span style="float:left;margin-top:10px">

	<label for="seçim"><strong><font color="CA2F2F" size="3px" face="verdana"><b>  Giriş Yap</b></font></strong></label>
</span>
		<div id="p1">

			veya &nbsp
			<a href="Kayitol.php">yeni bir üyelik oluştur</a>


		</div>

</td>

		</tr>

  <tr>
    <td height="53"><span id="sprytextfield1">
    <input name="eposta" type="text" size="39" placeholder="Email"/>
    <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span><span class="textfieldInvalidFormatMsg">Geçersiz format.</span></span>
    </td>
  </tr>
  <tr>
    <td height="50"><span id="sprytextfield2">
      <label for="şifre"></label>
      <input type="password" name="sifre" size="39" id="şifre" placeholder="Password" />
      <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span></span>
    </td>
  </tr>
  <tr>
    <td >


  <div id="girisyapbuton">
      <button style="background:#48912A" type="submit" name="giris"><font color="#FFFFFF" size="2	px">Giriş Yap</font></button>
		</div>
     </td>
  </tr>


</table>

</div>

</form>



<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "email");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprycheckbox1 = new Spry.Widget.ValidationCheckbox("sprycheckbox1");
</script>
</body>
</html>
