<?php
//header(content="text/HTML,charset=utf-8");
include('VeritabaniBaglantisi.php');

$sql = "SELECT * FROM `adres`";
$sonuc = mysqli_query($conn,$sql) or die("Error");
$phpArray = array();

$str="";
$sayac=0;

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

  $phpArray[$sayac]=$str;

  $sayac=$sayac+1;
}
}
session_start();
$user=$_SESSION["user"];
echo"<div id='user'><div id='geri'><a href='Anasayfa.php'><img src='images/geri.png' width='20px' height='20px' /></a></div><div id='logout'><a href='Giris.php'><img src='images/logout.png' width='20px' height='20px' /></a></div><label style='background:#000000'><font color='#FFFFFF' size='2px'>$user</font></label></div>";

?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!--The viewport meta tag is used to improve the presentation and behavior of the samples
      on iOS devices-->
    <meta name="viewport" content="initial-scale=1, maximum-scale=1,user-scalable=no">
    <title>Find Address</title>

    <link rel="stylesheet" href="http://js.arcgis.com/3.9/js/dojo/dijit/themes/claro/claro.css">
    <link rel="stylesheet" href="http://js.arcgis.com/3.9/js/esri/css/esri.css">
    <style>
      html, body {
        height: 100%; width: 100%;
        margin: 0; padding: 0;
      }
      #map{
        height: 100%;
        width: 100%;
        margin: 0;
        padding: 0;
      }


      #leftPane{
        width:20%;
        border-top: solid 1px #343642;
        border-left: solid 1px #343642;
        border-bottom: solid 1px #343642;

        color: #343642;
        font:100% Georgia,"Times New Roman",Times,serif;
        /*letter-spacing: 0.05em;*/
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
      #geri{
        position: absolute;
        top:-1px;
      left:-23px;



      }
     </style>
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script src="http://js.arcgis.com/3.9/"></script>
    <script>
      var map, locator;

      require([
        "esri/map", "esri/tasks/locator", "esri/graphic",
        "esri/InfoTemplate", "esri/symbols/SimpleMarkerSymbol",
        "esri/symbols/Font", "esri/symbols/TextSymbol",
        "dojo/_base/array", "esri/Color",
        "dojo/number", "dojo/parser", "dojo/dom", "dijit/registry", "esri/geometry/webMercatorUtils",

        "dijit/form/Button", "dijit/form/Textarea",
        "dijit/layout/BorderContainer", "dijit/layout/ContentPane", "dojo/domReady!"
      ], function(
        Map, Locator, Graphic,
        InfoTemplate, SimpleMarkerSymbol,
        Font, TextSymbol,
        arrayUtils, Color,
        number, parser, dom, registry,webMercatorUtils
      ) {
        parser.parse();

        map = new Map("map", {
          basemap: "streets",
          center: [35.11354, 39.29789],
          zoom: 6
        });


        locator = new Locator("http://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer");
        locator.on("address-to-locations-complete", showResults);

        // listen for button click then geocode

        map.infoWindow.resize(200,125);
        myFunction();

        function myFunction() {


          var jsArray = <?php echo json_encode($phpArray); ?>;

          var index;
          for (index = 0; index < jsArray.length; ++index) {

          locate(index);

          }

        }
        function locate(deger){

           var jsArray = <?php echo json_encode($phpArray); ?>;

           var tut=jsArray[deger];
           var address = {
              "SingleLine": tut
            };
            locator.outSpatialReference = map.spatialReference;
            var options = {
            address: address,
            outFields: ["Loc_name"]
          }
        locator.addressToLocations(options);

        }

        function locate3(){

            var address = {
              "SingleLine": dom.byId("address").value
            };
            locator.outSpatialReference = map.spatialReference;
            var options = {
            address: address,
            outFields: ["Loc_name"]
          }
        locator.addressToLocations(options);
        }
        var diziX = new Array();
        var diziY = new Array();
        var i = 0;
        function showResults(evt) {

          var candidate;
          var symbol = new SimpleMarkerSymbol();
          var infoTemplate = new InfoTemplate(
            "Location",
            "Adres: ${address}<br />Koordinat Değerleri: <br /> ${lat},${lon}<br />"
          );
          symbol.setStyle(SimpleMarkerSymbol.STYLE_SQUARE);
          symbol.setColor(new Color([153,0,51,0.75]));

          var geom;
          arrayUtils.every(evt.addresses, function(candidate) {



            var x = candidate.location.x.toFixed(5);
            var y = candidate.location.y.toFixed(5);
            var normalizedVal = webMercatorUtils.xyToLngLat(y,x);


            console.log(normalizedVal);



            console.log(candidate.score);


            if (candidate.score > 80) {
              console.log(candidate.location);
              var attributes = {
                address: candidate.address,
                score: candidate.score,
                locatorName: candidate.attributes.Loc_name,
                lat : x,
                lon : y
              };

               diziX[i]=candidate.location.x.toFixed(5);
               diziY[i]=candidate.location.y.toFixed(5);


               i=i+1;

              geom = candidate.location;
              var graphic = new Graphic(geom, symbol, attributes, infoTemplate);
              //add a graphic to the map at the geocoded location
              map.graphics.add(graphic);
              //add a text symbol to the map listing the location of the matched address.
              var displayText = candidate.address;
              var font = new Font(
                "16pt",
                Font.STYLE_NORMAL,
                Font.VARIANT_NORMAL,
                Font.WEIGHT_BOLD,
                "Helvetica"
              );
              var textSymbol = new TextSymbol(
                //displayText,
                font,
                new Color("#666633")
              );
              textSymbol.setOffset(0,8);
              map.graphics.add(new Graphic(geom, textSymbol));
              return false; //break out of loop after one candidate with score greater  than 80 is found.
            }
          });
          if ( geom !== undefined ) {
            map.centerAndZoom(geom, 12);
          }
      }

      });

    </script>
  </head>
  <?php
  ?>
  <body class="claro">


      <div id="map"
           data-dojo-type="dijit/layout/ContentPane"
           data-dojo-props="region:'center'">
      </div>
    </div>
  </body>
</html>
