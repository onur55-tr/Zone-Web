<?
ob_start();
include "guvenlik.php"; 
include "baglan.php";
include "../cfg/sayfala3.php";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
</head>
<body>
<center><h3>DEFACE Y�NET�M�</h3>
<?

if ($_GET['sayfa'] == "onayla"){ // onaylama sayfas�

foreach ($HTTP_POST_VARS as $ad=>$veri){
} // foreach bitim

$say1 = count($_POST['sec_normal']);
$say2 = count($_POST['sec_special']);
$say3 = count($_POST['sec_onaysiz']);

if ($say1 == 0 && $say2 == 0 && $say3 > 0){ // onaylanm��lar�n onay�n� al

for ($i=0;$i<$say3;$i++){ // onaylar� al
$id = $_POST['sec_onaysiz']["$i"];
$hackeral = @mysql_query("SELECT hacker FROM kayitlar WHERE id = '$id'");
$hacker = @mysql_result($hackeral,0,0);
$kontrol = @mysql_query("SELECT onay FROM kayitlar WHERE id = '$id'");

$onay = @mysql_result($kontrol,0,0);

if ($onay){

$sql1 = @mysql_query("UPDATE kayitlar SET onay = 0, tur = 0 WHERE id = '$id'");
$sql2 = @mysql_query("UPDATE hackerlar SET onayli = onayli - 1, onaysiz = onaysiz + 1 WHERE hacker = '$hacker'");

} // onay kontrol

} // for bitimi

echo 'Defacelerin onay� ba�ar�yla al�nd�!<br /><br /><a href="'.$PHP_SELF.'?sayfa=onayli">Onaylanm��lar�n sayfas�na d�nmek i�in t�klay�n</a>';

} elseif ($say3 == 0 && ($say1 != 0 || $say2 != 0) ){ // onaylanmam��lar�nkini onayla

for ($i=0;$i<$say1;$i++){
for ($j=0;$j<$say2;$j++){

if ($_POST['sec_normal["$i"]'] == $_POST['sec_special["$j"]']){
echo 'Ayn� kay�tta iki se�ene�i de i�aretleyemezsiniz!<br />
Unutmay�n ilk se�enek <b>Normal</b>, ikincisi <b>Special</b> deface yapar.<br /><br />
<a href="javascript:history.back(1)">Geri d�nmek i�in t�klay�n</a>';
exit;
} // if bitimi

} // ilk for bitimi
} // ikinci for bitimi

for ($i=0;$i<$say1;$i++){ // normalleri onayla
$id = $_POST['sec_normal']["$i"];
$hackeral = @mysql_query("SELECT hacker FROM kayitlar WHERE id = '$id'");
$hacker = @mysql_result($hackeral,0,0);

$kontrol = @mysql_query("SELECT onay FROM kayitlar WHERE id = '$id'");
$onay = @mysql_result($kontrol,0,0);

if (!$onay){

$sql1 = @mysql_query("UPDATE kayitlar SET onay = 1, tur = 0 WHERE id = '$id'");
$sql2 = @mysql_query("UPDATE hackerlar SET onayli = onayli + 1, onaysiz = onaysiz - 1 WHERE hacker = '$hacker'");

} // onay kontrol

} // for bitimi

for ($i=0;$i<$say2;$i++){ // specialleri onayla
$id = $_POST['sec_special']["$i"];
$hackeral = @mysql_query("SELECT hacker FROM kayitlar WHERE id = '$id'");
$hacker = @mysql_result($hackeral,0,0);

$kontrol = @mysql_query("SELECT onay FROM kayitlar WHERE id = '$id'");
$onay = @mysql_result($kontrol,0,0);

if (!$onay){

$sql1 = @mysql_query("UPDATE kayitlar SET onay = 1, tur = 1 WHERE id = '$id'");
$sql2 = @mysql_query("UPDATE hackerlar SET onayli = onayli + 1, onaysiz = onaysiz - 1 WHERE hacker = '$hacker'");

} // onay kontrol

} // for bitimi

echo 'Defaceler ba�ar�yla onayland�!<br /><br /><a href="'.$PHP_SELF.'?sayfa=onaysiz">Onaylanmam��lar�n sayfas�na d�nmek i�in t�klay�n</a>';

} else { // hi� bir sayfa de�ilse

echo 'Hi� kay�t se�mediniz!<br /><br /><a href="'.$PHP_SELF.'">Defaceler sayfas�na d�nmek i�in t�klay�n</a>';

}  // hangi sayfadan geldi�ini kontrol et


} elseif ($_GET['sayfa'] == "onayli"){ // onaylanm��lar�n sayfas�

$s = $_GET['s'];
if ($s == ""){
header ("Location: ?s=1&sayfa=onayli");
}

$limit = 20;
$ilk = $limit*($s-1);
$toplam_al = @mysql_query("SELECT * FROM kayitlar WHERE onay = 1");
$sayi = @mysql_num_rows($toplam_al);
$sayfa_sayisi = ceil($sayi/$limit);

$deface_al = @mysql_query("SELECT * FROM kayitlar WHERE onay = 1 ORDER BY tarih ASC LIMIT $ilk,$limit");
$kontrol = @mysql_num_rows($deface_al);

if ($kontrol > 0){

if ($s < 1 || $s > $sayfa_sayisi){
header ("Location: ?s=1&sayfa=onayli");
}

echo '<big>Onaylanm�� Defaceler</big><br /><br />';
echo '<table align="center" width="100%"><form action="'.$PHP_SELF.'?sayfa=onayla" method="POST"><tr>';
echo '<td width="10%"><b>Onay Al</b></td>';
echo '<td width="5%"><b>No</b></td>';
echo '<td width="27%"><b>Deface Site</b></td>';
echo '<td width="20%"><b>Hacker</b></td>';
echo '<td width="5%"><b>Mirr0r</b></td>';
echo '<td width="10%"><b>T�r</b></td>';
echo '<td width="10%"><b>Tarih</b></td>';
echo '<td width="8%"></td>';
echo '<td width="5%"></td>';
echo '</tr>';

$i=1;
while ( $deface = @mysql_fetch_array($deface_al) ){ // while

if ($deface["tur"]) $tur = "Special";
else $tur = "Normal";

$tarih = $deface["tarih"];
$tarih = date("d/m/Y",$tarih);

if ( strlen($deface["url"]) > 40 ) $url = substr($deface["url"], 0, 40)."...";
else $url = $deface["url"];

echo '<tr><td><input type="checkbox" name="sec_onaysiz[]" value="'.$deface["id"].'"></td>';
echo '<td>'.$i.'</td>';
echo '<td>'.$url.'</td>';
echo '<td>'.$deface["hacker"].'</td>';
echo '<td><a target="_blank" href="/defacements/?id='.$deface["id"].'"><img border="0" src="/img/izle.gif" /></a></td>';
echo '<td>'.$tur.'</td>';
echo '<td>'.$tarih.'</td>';
echo '<td><a href="duzenle.php?id='.$deface["id"].'">D�zenle</a></td>';
echo '<td><a href="sil.php?id='.$deface["id"].'">Sil</a></td></tr>';

$i++;
} // while bitim

echo '<tr><td colspan="3"><input type="submit" value="Onay Al"></td></tr>';
echo '<tr><td colspan="9" align="center"><br />';
sayfala($s,$sayi,$sayfa_sayisi,$limit,"onayli");

echo '</td></tr></form></table>';

} else { // E�er yoksa

echo '<b>Hi� Onayl� Deface Yok!</b>';

} // Var yok kontrol

echo '<br /><br /><a href="'.$PHP_SELF.'">Deface Y�netimi Ana sayfas� i�in t�klay�n</a>';

} elseif ($_GET['sayfa'] == "onaysiz") { // Onaylanmam��lar�n sayfas�

$s = $_GET['s'];
if ($s == ""){
header ("Location: ?s=1&sayfa=onaysiz");
}

$limit = 500;
$ilk = $limit*($s-1);
$toplam_al = @mysql_query("SELECT * FROM kayitlar WHERE onay = 0");
$sayi = @mysql_num_rows($toplam_al);
$sayfa_sayisi = ceil($sayi/$limit);

$deface_al = @mysql_query("SELECT * FROM kayitlar WHERE onay = 0 ORDER BY tarih ASC LIMIT $ilk,$limit");
$kontrol = @mysql_num_rows($deface_al);

if ($kontrol > 0){

if ($s < 1 || $s > $sayfa_sayisi){
header ("Location: ?s=1&sayfa=onaysiz");
}

echo '<big>Onaylanmam�� Defaceler</big><br /><br />';
echo '<table align="center" width="100%"><form action="'.$PHP_SELF.'?sayfa=onayla" method="POST"><tr>';
echo '<td width="10%"><b>Onayla</b></td>';
echo '<td width="5%"><b>No</b></td>';
echo '<td width="27%"><b>Deface Site</b></td>';
echo '<td width="20%"><b>Hacker</b></td>';
echo '<td width="5%"><b>Mirr0r</b></td>';
echo '<td width="10%"><b>T�r</b></td>';
echo '<td width="10%"><b>Tarih</b></td>';
echo '<td width="8%"></td>';
echo '<td width="5%"></td>';
echo '</tr>';

$i=1;
while ( $deface = mysql_fetch_array($deface_al) ){ // while

if ($deface["tur"]) $tur = "Special";
else $tur = "Normal";

$tarih = $deface["tarih"];
$tarih = date("d/m/Y",$tarih);

if ( strlen($deface["url"]) > 40 ) $url = substr($deface["url"], 0, 40)."...";
else $url = $deface["url"];

echo '<tr><td><input type="checkbox" checked name="sec_normal[]" value="'.$deface["id"].'">&nbsp;&nbsp;<input type="checkbox" name="sec_special[]" value="'.$deface["id"].'"></td>';
echo '<td>'.$i.'</td>';
echo '<td>'.$url.'</td>';
echo '<td>'.$deface["hacker"].'</td>';
echo '<td><a target="_blank" href="/defacements/?id='.$deface["id"].'"><img border="0" src="/img/izle.gif" /></a></td>';
echo '<td>'.$tur.'</td>';
echo '<td>'.$tarih.'</td>';
echo '<td><a href="duzenle.php?id='.$deface["id"].'">D�zenle</a></td>';
echo '<td><a href="sil.php?id='.$deface["id"].'">Sil</a></td></tr>';

$i++;
} // while bitim

echo '<tr><td colspan="3"><input type="submit" value="Onayla"></td></tr>';
echo '<tr><td colspan="9" align="center"><br />';
sayfala($s,$sayi,$sayfa_sayisi,$limit,"onaysiz");

echo '</td></tr></table>';

echo '</table>';

} else { // E�er yoksa

echo '<b>Hi� Onays�z Deface Yok!</b>';

} // Var yok kontrol

echo '<br /><br /><a href="'.$PHP_SELF.'">Deface Y�netimi Ana sayfas� i�in t�klay�n</a>';

} else { // hi�biri

echo '<a href="'.$PHP_SELF.'?sayfa=onayli">Onayl� Defaceler i�in t�klay�n</a><br /><br />';
echo '<a href="'.$PHP_SELF.'?sayfa=onaysiz">Onays�z Defaceler i�in t�klay�n</a><br />';

} // sayfa kontrol

?>
</center>
<? ob_end_flush(); ?>