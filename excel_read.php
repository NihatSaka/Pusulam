<?php

error_reporting(E_ALL);
set_time_limit(0);
include 'Classes/PHPExcel/IOFactory.php';
$inputFileName = 'rota.xlsx';//işlenecek dosya
$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
$excel_satirlar = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);//excel dosyasındaki aktif sekme kullanılıyor

$i=0;//sayac
foreach($excel_satirlar as $excel_satir){
    $i++;
    //veriler değişkene alınıyor
    $veri_1 = $excel_satir['A'];
    $veri_2 = $excel_satir['B'];
    $veri_3 = $excel_satir['C'];
    $veri_4 = $excel_satir['D'];
    $veri_5 = $excel_satir['E'];

    //bu kısımdan sonra verileri nasıl işlemek istiyorsanız ona göre kodları yazmamış gerekiyor. örneğin veri tabanına kaydetmek.
    }

echo $i;//satır sayısını kontrol için en son kaç satırın işlendiğini sayaçtan ekrana basıyoruz.

 ?>
