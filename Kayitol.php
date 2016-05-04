<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Başlıksız Belge</title>
<style type="text/css">
body {
  padding:0;
  font-family:Arial, Helvetica, sans-serif;
  font-size:11px;
  color:#000;
}
#tablo{

	margin-top:0px;
	margin-left:592px;
	margin-right:auto;


}
#p{
	font-size:80%;
	margin-top:305px;
	margin-left:870px;

}
#image{

float: left;
margin-right: 30px;
margin-left: 300px;
}
#container{
margin-top: 210px;
margin-right: 60px;

}
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
</head>
<body>


<form action="Giris.php" method="post">

  	<div id='container'>
  		<div id="image">

  		<img src="images/icon3.png">

  		</div>

<table id="tablo">
  <tr>


<td>
<span style="float:left;margin-top:10px">

<label for="seçim"><strong><font color="CA2F2F" size="3px" face="verdana"><b>  Üye Ol</b></font></strong></label>
</span>
  <p id="p1">
    <span style="margin-left:107px;margin-top:20px">

    veya &nbsp
    <a href="Giris.php">giriş yap</a>

      </span>
  </p>

</td>

  </tr>
<tr>
	<td height="45">
	  <span id="sprytextfield1">
	  <label for="Ad"></label>
	  <input type="text" name="Ad" id="Ad" size="30" placeholder="Ad"/>
	  <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span></span></td>
</tr>
<tr>
	<td height="45">
      <span id="sprytextfield2">
      <label for="soyad"></label>
      <input type="text" name="soyad" id="soyad" size="30" placeholder="Soyad"/>
      <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span></span>
    </td>
</tr>
<tr>
  	<td>
  	<label for="Kul_Tur"><b>Kullanıcı Türü :</b></label>
      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

  	<select name="Kul_Tur" id="Kul_Tur">
  	     <option value="kullanıcı">Kullanıcı</option>
  	     <option value="sürücü">Driver</option>
  	     </select></td>

  	<td>
  	<span id="spryselect"><span class="selectRequiredMsg">Lütfen bir öğe seçin.</span></span>
 	</td>
</tr>

<tr>
	<td height="45">
	  <span id="sprytextfield3">
      <label for="Email"></label>
      <input type="text" name="Email" id="Email" size="30" placeholder="Email"/>
      <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span><span class="textfieldInvalidFormatMsg">Geçersiz format.</span></span>
     </td>
</tr>
<tr>
	<td height="45">
      <span id="sprytextfield4">
      <label for="Şifre"></label>
      <input type="password" name="Şifre" id="Şifre" size="30" placeholder="Password"/>
      <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span></span></td>
</tr>
<tr>
	<td>
    <span style="padding-left:185px">
	<button style="background:#F00D0D" name="buton2" type="submit"><font color="#FFFFFF">Üye Ol</font></button>
	</span>
    </td>
</tr>
</table>
</div>


</form>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "email");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none");
var spryselect = new Spry.Widget.ValidationSelect("spryselect", {validateOn:["blur"]});
</script>
</body>
</html>
