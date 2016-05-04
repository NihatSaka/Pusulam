<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <title>Rota</title>
<style type="text/css">
#map-canvas {
  height: 500px ;
  margin: 0;
  padding: 0;
}
.scrollit {
overflow:scroll;
height:100px;
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
</head>
<body>
<?php
//header(content="text/HTML,charset=utf-8");
session_start();
$user=$_SESSION["user"];
echo"<div id='user'><div id='geri'><a href='Anasayfa.php'><img src='images/geri.png' width='20px' height='20px' /></a></div><div id='logout'><a href='Giris.php'><img src='images/logout.png' width='20px' height='20px' /></a></div><label style='background:#000000'><font color='#FFFFFF' size='2px'>$user</font></label></div>";

include('VeritabaniBaglantisi.php');

$phpArray = array();
$sayac=0;

$tut=$_POST['deger'];
$dizi=explode(" ",$tut);

$i=1;
$sabit=$dizi[$i];
$sabit=$sabit-1;

$tut=$_POST['gizli'];
$diziRota=explode("#",$tut);
$rota=$diziRota[$sabit];

$sql = "SELECT * FROM `ROTALAR` WHERE `ROTALAR`.`ID`='$rota'";
$sonuc = mysqli_query($conn,$sql) or die("Error");

$i=1;
  if(mysqli_num_rows($sonuc)>0)
{
  $satir = mysqli_fetch_assoc($sonuc);
    $rotalar=$satir['ROTA'];
  }
  $ara=explode(",",$rotalar);

foreach ($ara as $key) {
//echo $key."<br>";
$sql = "SELECT * FROM `adres` WHERE `adres`.`URUN_ID`='$key'";
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

  $phpArray[$sayac]=$str;

  $sayac=$sayac+1;
}
}
}
?>
<!-- Load the Google Maps aPI -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOA6nn_iMQwuMpVSNdS5of_C9HVtAcH30&sensor=false"></script>

<!-- All of the script for multiple requests -->
<script type="text/javascript">

// Initialise some variables
var directionsService = new google.maps.DirectionsService();
var num, map, data;
var requestArray = [], renderArray = [];
var jsArray = <?php echo json_encode($phpArray); ?>;

// A JSON Array containing some people/routes and the destinations/stops

var jsonArray = {
//  "Person 1": ["Torquay", "Teignmouth", "Dawlish", "Exeter"]
   Person: []
}
for(var i=0;i<jsArray.length;i++){
  jsonArray.Person.push(jsArray[i]);
  //window.alert(jsArray[i]);
}
// 16 Standard Colours for navigation polylines
var colourArray = ['navy', 'grey', 'fuchsia', 'black', 'white', 'lime', 'maroon', 'purple', 'aqua', 'red', 'green', 'silver', 'olive', 'blue', 'yellow', 'teal'];

// Let's make an array of requests which will become individual polylines on the map.
function generateRequests(){

   requestArray = [];

   for (var route in jsonArray){
       // This now deals with one of the people / routes

       // Somewhere to store the wayoints
       var waypts = [];

       // 'start' and 'finish' will be the routes origin and destination
       var start, finish

       // lastpoint is used to ensure that duplicate waypoints are stripped
       var lastpoint

       data = jsonArray[route]

       limit = data.length
       for (var waypoint = 0; waypoint < limit; waypoint++) {
           if (data[waypoint] === lastpoint){
               // Duplicate of of the last waypoint - don't bother
               continue;
           }

           // Prepare the lastpoint for the next loop
           lastpoint = data[waypoint]

           // Add this to waypoint to the array for making the request
           waypts.push({
               location: data[waypoint],
               stopover: true
           });
       }

       // Grab the first waypoint for the 'start' location
       start = (waypts.shift()).location;
       // Grab the last waypoint for use as a 'finish' location
       finish = waypts.pop();
       if(finish === undefined){
           // Unless there was no finish location for some reason?
           finish = start;
       } else {
           finish = finish.location;
       }

       // Let's create the Google Maps request object
       var request = {
           origin: start,
           destination: finish,
           waypoints: waypts,
           travelMode: google.maps.TravelMode.DRIVING
       };

       // and save it in our requestArray
       requestArray.push({"route": route, "request": request});
   }

   processRequests();
}

function processRequests(){

   // Counter to track request submission and process one at a time;
   var i = 0;

   // Used to submit the request 'i'
   function submitRequest(){
       directionsService.route(requestArray[i].request, directionResults);
   }

   // Used as callback for the above request for current 'i'
   function directionResults(result, status) {
       if (status == google.maps.DirectionsStatus.OK) {

           // Create a unique DirectionsRenderer 'i'
           renderArray[i] = new google.maps.DirectionsRenderer();
           renderArray[i].setMap(map);

           // Some unique options from the colorArray so we can see the routes
           renderArray[i].setOptions({
               preserveViewport: true,
               suppressInfoWindows: true,
               polylineOptions: {
                   strokeWeight: 4,
                   strokeOpacity: 0.8,
                   strokeColor: colourArray[i]
               },
               markerOptions:{
                  /* icon:{
                       label: labels["A"],
                      // path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
                       scale: 3,
                       strokeColor: colourArray[i]
                   }, */
                    clickable:true,
                   anchorPoint: "(2134123,1235123)",
                   draggable:false,
            //       labelContent: "A",
                //   labelAnchor: new google.maps.Point(3, 30),
               labelClass: "labels", // the CSS class for the label
            //       labelInBackground: false


               //     icon :'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld= (425b) '+array[i]+'|FE6256|000000'
               }

           });

           // Use this new renderer with the result
           renderArray[i].setDirections(result);
           // and start the next request
           nextRequest();
       }

   }

   function nextRequest(){
       // Increase the counter
       i++;
       // Make sure we are still waiting for a request
       if(i >= requestArray.length){
           // No more to do
           return;
       }
       // Submit another request
       submitRequest();
   }

   // This request is just to kick start the whole process
   submitRequest();
}

// Called Onload
function init() {

   // Some basic map setup (from the API docs)
   var mapOptions = {
      center: new google.maps.LatLng( 39.11354, 35.29789),
      zoom: 6,
      mapTypeControl: false,
      streetViewControl: false,
      mapTypeId: google.maps.MapTypeId.ROADMAP
  };

   map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

   // Start the request making
   generateRequests()
}

// Get the ball rolling and trigger our init() on 'load'
google.maps.event.addDomListener(window, 'load', init);
</script>
<div id="map-canvas"></div>
<?php
//print_r($phpArray);
echo"<div class='scrollit'>";

$satir=1;
foreach ($phpArray as $value) {
  $adres=explode(",",$value);
  switch ($satir) {
     case '1':
       echo "A ";
       break;
     case '2':
       echo "B ";
       break;
     case '3':
       echo "C ";
       break;
     case '4':
       echo "D ";
       break;
     case '5':
       echo "E ";
       break;
     case '6':
       echo "F ";
       break;
     case '7':
       echo "G ";
       break;
     case '8':
       echo "H ";
       break;
     case '9':
       echo "I ";
       break;
     case '10':
       echo "J ";
       break;
     default:
   }
  $satir=$satir+1;
  for ($i=0;$i<count($adres);$i=$i+1) {
    echo $adres[$i];
}
  echo"<br>";
}
echo"</div>";
?>
</body>
</html>
