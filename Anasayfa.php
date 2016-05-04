<!DOCTYPE html>
<html dir="ltr">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1,user-scalable=no" />
  <title>Proje</title>
  <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="lab/form.js"></script>
  <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="https://js.arcgis.com/3.15/dijit/themes/claro/claro.css">
  <link rel="stylesheet" href="https://js.arcgis.com/3.15/esri/css/esri.css">

  <style>
    html,
    body,
    #map {
      height: 100%;
      width: 100%;
      margin: 0;
      padding: 0;
    }

    #search {
      display: block;
      position: absolute;
      z-index: 2;
      top: 20px;
      left: 74px;
    }

    #locate {
      position: absolute;
      top: 95px;
      left: 20px;
      z-index: 50;
    }
    #upload{

      position: absolute;
      top: 22px;
      left: 375px;
      z-index: 50;


    }
    #tekupload{

      position: absolute;
      top: 160px;
      left: 21px;
      z-index: 50;


    }
    #km{
      position: absolute;
      top: 400px;
      left: 20px;
      z-index: 50;

    }
    #up{
      position: absolute;
      top: 450px;
      left: 20px;
      z-index: 50;

    }
    #eye{
      position: absolute;
      top: 500px;
      left: 20px;
      z-index: 50;

    }
    #dosyayukle{
      position: absolute;
      top: 50px;
      left: 300px;
      z-index: 50;
    }
    #rotaGoster{
      overflow:scroll;
      color: #000000;
      height:150px;
      position: absolute;
      top: 350px;
      left: 80px;
      z-index: 50;
    }
    #distanceGoster{
      overflow:scroll;
      color: #000000;
      height:150px;
      position: absolute;
      top: 350px;
      left: 80px;
      z-index: 50;
      display: block;
      margin: 20px auto;
      background: #eee;
      border-radius: 10px;
      padding: 15px
    }
    #tekdosyayukle{
      position: absolute;
      top: 50px;
      left: 300px;
      z-index: 50;
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
     form {
       position: absolute;
       display: block;
       margin: 20px auto;
       background: #eee;
       border-radius: 10px;
       padding: 15px }

  </style>
  <script src="http://js.arcgis.com/3.15/"></script>
  <script>
    require([

      "esri/map",
      "esri/dijit/Search",
      "esri/dijit/LocateButton",
      "dojo/domReady!"


    ], function(Map, Search, LocateButton) {
      var map = new Map("map", {
        basemap: "streets",
        center: [35.29789, 39.11354], // lon, lat
        zoom: 6
      });

      var s = new Search({
        enableButtonMode: true, //this enables the search widget to display as a single button
        enableLabel: false,
        enableInfoWindow: true,
        showInfoWindowOnSelect: false,
            highlightLocation: true,
        map: map
      }, "search");
      s.startup();

      geoLocate = new LocateButton({
             map: map,
           }, "locate");

      geoLocate.startup();


    });
  </script>
</head>
<body>
  <div id='locate'></div>

  <?php
      session_start();
      $user=$_SESSION["user"];
      echo"<div id='user'><div id='logout'><a href='Giris.php'><img src='images/logout.png' width='20px' height='20px' /></a></div><label style='background:#000000'><font color='#FFFFFF' size='2px'>$user</font></label></div>";

      include('VeritabaniBaglantisi.php');
      $sql = "SELECT * FROM `kullanicilar` WHERE `kullanicilar`.`EMAIL`='$user'";
  		$sonuc = mysqli_query($conn,$sql) or die("Error");

  		  if(mysqli_num_rows($sonuc)>0)
  		{
        $satir = mysqli_fetch_assoc($sonuc);
        $surucu=$satir['KULLANICI_TURU'];

          if($surucu=="surucu"){

?>
  <div id="search"></div>
  <div id="map"></div>

  <form id="rotaGoster" style="display:none" action="RotaGoruntule.php" method="post">
    <?php
    $sql = "SELECT * FROM `ROTALAR` WHERE `ROTALAR`.`EMAIL`='$user'";
    $sonuc = mysqli_query($conn,$sql) or die("Error");

    $i=1;
    $str="";
      if(mysqli_num_rows($sonuc)>0)
    {
      echo'<div><strong>YÜKLÜ ROTALAR</strong><br><div style="padding-left: 42px">';
      while($satir = mysqli_fetch_assoc($sonuc)){
        $deger=$satir['ID'];
        if($i==1){
        $str=$deger;
        }
        else{
        $str=$str."#".$deger;
        }
        echo  "<input type='submit' name='deger' value='Rota $i'><br>";
        $i=$i+1;
    }
    echo "<input name='gizli' type=hidden value='$str' />";

    echo"</div>";
    echo"</div>";
  }
    ?>



  </form>

  <div id="distanceGoster" style="display:none">
     <?php
     $sql = "SELECT * FROM `rotalar` WHERE `rotalar`.`EMAIL`='$user'";
     $sonuc = mysqli_query($conn,$sql) or die("Error");

     $i=1;
     $str="";
       if(mysqli_num_rows($sonuc)>0)
     {
       echo'<div><strong>ROTA UZUNLUKLARI</strong><br><br><div style="padding-left: 10px">';
       while($satir = mysqli_fetch_assoc($sonuc)){
         $uzaklık=$satir['TOPLAM_DISTANCE'];
         $deger=$satir['ID'];
         if($i==1){
         $str=$deger;
         }
         else{
         $str=$str."#".$deger;
         }
         echo  "<div>Rota $i : $uzaklık km</div><br>";
         $i=$i+1;
     }
     echo"</div>";
     echo"</div>";
   }
     ?>
   </div>
   <div id="km">
       <label id="Distance" title="Rota Uzunlukları">
       <img src="images/km1.png" width="40px" height="40px"/>
       </label>
   </div>



  <div id="up">
      <label id="Rota" title="Rotaları Göster">
      <img src="images/up.png" width="40px" height="40px"/>
      </label>
  </div>


  <?php
}
else{
?>
  <div id="search"></div>
  <div id="map"></div>

  <div id="upload">
    <label  id="Buton" title="Çoklu Adres Girişi">
        <img src="images/cokluadresico.png" width="30px" height="30px"/>
    </label>

    <input id="file-input" type="file"  style="display:none"/>
</div>



<form id="dosyayukle" style="display:none" action="AdresYukle.php" method="post" enctype="multipart/form-data">
     <input type="file" name="dosya">
     <input type="submit" value="Dosya Yükle">
</form>



<div id="tekupload">
  <label id="Adres" title="Tekli Adres Girişi">
    <img src="images/upload.png" width="30px" height="30px"/>
  </label>
</div>


<form id="tekdosyayukle" style="display:none" action="AdresYukle.php" method="post">
<div>
    <h3><center>Adres Bilgileri</center></h3>
</div>
<div>
    <span id="sprytextfield1">
    <input name="il" type="text" size="50" placeholder="Şehir"/>
    <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span><span class="textfieldInvalidFormatMsg">Geçersiz format.</span></span>
</div>
<div>
  <span id="sprytextfield2">
    <input name="ilce" type="text" size="50" placeholder="İlçe"/>
    <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span><span class="textfieldInvalidFormatMsg">Geçersiz format.</span></span>
</div>
<div>
    <span id="sprytextfield3">
    <input name="mahalle" type="text" size="50" placeholder="Mahalle"/>
    <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span><span class="textfieldInvalidFormatMsg">Geçersiz format.</span></span>
</div>
<div>
    <span id="sprytextfield4">
    <input name="sokak" type="text" size="50" placeholder="Sokak"/>
    <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span><span class="textfieldInvalidFormatMsg">Geçersiz format.</span></span>
</div>
<div>
    <span id="sprytextfield5">
    <input name="ABONE_ADRES_ID" type="text" placeholder="Adres Numarası"/>
    <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span><span class="textfieldInvalidFormatMsg">Geçersiz format.</span></span>
</div>
<div>
  <input type="submit" value="Adres Kaydet">
</div>
</form>
<?php
}
}


?>

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
</script>
</body>

</html>
