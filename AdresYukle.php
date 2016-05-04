<?php
ob_start();
if(isset($_FILES["dosya"]))
{
  echo "çoklu"."</br>";
  $output_dir = "upload/";
  $path =  $_FILES["dosya"]["name"];
  $ext = pathinfo($path,PATHINFO_EXTENSION);

    if ($_FILES["dosya"]["error"] > 0)
    {
      echo "Hata: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {

      if($ext == "xls"  || $ext == "xlsx"){
        move_uploaded_file($_FILES["dosya"]["tmp_name"],$output_dir. $_FILES["dosya"]["name"]);
         echo $_FILES["dosya"]["name"]. " adlı dosya veritabanına kaydedildi.";
      } else {
        echo "Yanlış Dosya Türü Girildi.";
      }

    }


if($ext == "xls"  || $ext == "xlsx"){
  echo "</br>"."string"."</br>";

include('VeritabaniBaglantisi.php');
$sql = "SELECT * FROM `adres`";
$sonuc = mysqli_query($conn,$sql) or die("Error");

// If you need to parse XLS files, include php-excel-reader
require('php-excel-reader/excel_reader2.php');

require('SpreadsheetReader.php');

$Reader = new SpreadsheetReader($_FILES["dosya"]["name"]);
$Sheets = $Reader -> Sheets();

foreach ($Sheets as $Index => $Name)
{
echo "</br>"."string2"."</br>";
    $Reader -> ChangeSheet($Index);
    foreach ($Reader as $Row)
    {
       foreach ($Row as $key => $value) {

          $deger=$Row[$key];
          echo"</br>".$Row[$key]."</br>";

          if($key==0)
          {
            $abone_mahalle=$Row[$key];
          }

            else if($key==1){
              $abone_sokak=$Row[$key];
            }
            else if($key==2){
            $abone_adres_id=$Row[$key];

            }
            else if($key==3){
            $abone_ilce=$Row[$key];

            }
            else if($key==4){
            $abone_sehir=$Row[$key];

            }

          }

              echo "asdas".$abone_mahalle.$abone_sokak.$abone_adres_id.$abone_ilce.$abone_sehir;
              session_start();
              $user=$_SESSION["user"];
          $sql = "INSERT INTO `proje`.`adres`(`ABONE_NO`,`ABONE_MAHALLE`,`ABONE_SOKAK`,`ABONE_ADRES_ID`,`ABONE_ILCE`,`ABONE_SEHIR`) VALUES('$user','$abone_mahalle','$abone_sokak','$abone_adres_id','$abone_ilce','$abone_sehir');";
        if(mysqli_query($conn,$sql))
          {
            echo "";
            header("Location:AdresGoruntule.php");

          }
          else
            echo "Kayıt Ekleme Başarısız Oldu, Hata: ".mysqli_error($conn);
       }

    }


}
  }
if (isset($_POST['ilce'])) {
  echo "tekli"."</br>";
    $mahalle=$_POST['mahalle'];
    $sokak=$_POST['sokak'];
    $no=$_POST['ABONE_ADRES_ID'];
    $ilce=$_POST['ilce'];
    $sehir=$_POST['il'];

    include('VeritabaniBaglantisi.php');
    session_start();
    $user=$_SESSION["user"];
    $sql = "INSERT INTO `proje`.`adres`(`ABONE_NO`,`ABONE_MAHALLE`,`ABONE_SOKAK`,`ABONE_ADRES_ID`,`ABONE_ILCE`,`ABONE_SEHIR`) VALUES('$user','$mahalle','$sokak','$no','$ilce','$sehir');";
            if(mysqli_query($conn,$sql))
              {
                echo "";
                header("Location:AdresGoruntule.php");
              }
              else
                echo "Kayıt Ekleme Başarısız Oldu, Hata: ".mysqli_error($conn);
  echo $ilçe.$mahalle.$sokak.$sehir.$no;

  # code...
}
ob_end_flush();
?>
