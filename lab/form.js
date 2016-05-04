$(document).ready(function(){
$("#Buton").click(function(){
if($("#tekdosyayukle").css('display')=='none'){

} else {
  $('#tekdosyayukle').hide();
}
if($("#dosyayukle").css('display')=='none'){
  $("#dosyayukle").fadeIn();
} else {
  $('#dosyayukle').hide();
}



});
$("#Adres").click(function(){
  if($("#dosyayukle").css('display')=='none'){

  } else {
    $('#dosyayukle').hide();
  } if($("#tekdosyayukle").css('display')=='none'){
    $("#tekdosyayukle").fadeIn();
  } else  {
    $('#tekdosyayukle').hide();
  }
});
  $("#Rota").click(function(){
if($("#rotaGoster").css('display')=='none'){
    $('#distanceGoster').hide();
  $("#rotaGoster").fadeIn();
}
    else {
      $('#rotaGoster').hide();
    }
  });




  $("#Distance").click(function(){
if($("#distanceGoster").css('display')=='none'){
        $('#rotaGoster').hide();
  $("#distanceGoster").fadeIn();
}
    else {
      $('#distanceGoster').hide();
    }
  });



});
