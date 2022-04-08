<?
$hacker = htmlspecialchars(trim($_GET['user']));

$s = $_GET['s'];
if ($s == ""){
header ("Location: ?s=1&user=$hacker");
}

include "../ust.php";

if ($hacker == "" || strlen($hacker) < 4) echo '<script> document.location="/arama/index.php"; </script>';
$kontrol_yap = @mysql_query("SELECT * FROM kayitlar WHERE hacker = '$hacker' AND onay = 1");
$kontrol = @mysql_num_rows($kontrol_yap);

if ($kontrol > 0){ // varsa böyle bir hacker

$limit = $site_ayar['sayfadefacesayisi'];
$ilk = $limit*($s-1);
$sayi = mysql_num_rows($kontrol_yap);
$sayfa_sayisi = ceil($sayi/$limit);

if ($s < 1 || $s > $sayfa_sayisi){
echo '<script> document.location="?s=1&user='.$hacker.'"; </script>';
}

$bilgi_al = mysql_query("SELECT * FROM kayitlar WHERE hacker = '$hacker' AND onay = 1 ORDER BY tarih DESC LIMIT $ilk,$limit");

include "../cfg/sayfala2.php";


$onay_bek_al = @mysql_query("SELECT * FROM kayitlar WHERE hacker = '$hacker' AND onay = 0");
$onaybekleyen = @mysql_num_rows($onay_bek_al);

?>
	              <strong><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif">
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="77%" align="center">
<? echo '<tr><td colspan="5" align="center"><font size="3" color="blue">'.$hacker.' için Arama Sonuçlarý Toplam (<font color="red">'.$sayi.'</font>) Tane Onaylý Deface Kaydý Var<br />
(<font color="red">'.$onaybekleyen.'</font>) Tane Onay Bekleyen Kaldý, Bu Sayfada Sadece <font color="red">Onaylý Defaceleri</font> Gösterilmektedir</font></td></tr>'; ?>                  </font>	              </strong>
	              <tr>
                    <td width="59%"><strong><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif"><br />
&nbsp;Site</font></strong></td>
                    <td width="21%"><strong><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif"><br />
                    Defacer</font></strong></td>
                    <td width="3%"><strong><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif"><br />
                    </font></strong></td>
                    <td width="10%"><strong><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif"><br />
                    </font> </strong>                      <center>
                                              <strong><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif">Tarih </font>                                              </strong>
                    </center></td>
                    <td width="7%"><strong><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif"><br />
                    </font> </strong>                      <center>
                                              <strong><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif">Mirr0r </font>                                              </strong>
                    </center></td>
                  </tr>

                  <strong><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif">
                  <?
while ($bilgiler = mysql_fetch_array($bilgi_al)){

$tarih = $bilgiler["tarih"];
$tarih = date("d/m/Y",$tarih);

if($bilgiler["tur"]) $resim = '<img src="/img/yildiz.gif">';
else $resim = "";

if ( strlen($bilgiler["url"]) > 45 ) $url = substr($bilgiler["url"], 0, 45)."...";
else $url = $bilgiler["url"];

?>
                  </font>                  </strong>
                  <tr onmouseover="this.style.backgroundColor='#EDF4FC';" onmouseout="this.style.backgroundColor='';">
                    <td width="42%"><strong><font color="#FF0000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><a class="link2" target="_blank" href="<? echo $bilgiler["url"]; ?>"><? echo $url; ?></a></font></strong></td>
                    <td width="25%"><strong><font color="#FF0000" size="2" face="Verdana, Arial, Helvetica, sans-serif">
                    <? echo $bilgiler["hacker"]; ?></font></strong></td>
		    <td width="3%"><strong><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif"><? echo $resim; ?></font></strong></td>
		    <td width="20%" align="center"><strong><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif"><? echo $tarih; ?></font></strong></td>
                    <td width="20%"><center>
                      <strong><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif"><a target="_blank" href="/deface_mirror/?id=<? echo $bilgiler["id"]; ?>">
                      <img border="0" src="/img/izle.gif" width="15" height="15"></a></font>                      </strong>
                    </center></td>
                  </tr>

                  <strong><font color="#FF0000" face="Verdana, Arial, Helvetica, sans-serif">
                  <? } // while bitir 

echo '<tr><td colspan="5" align="center"><br />';
sayfala($s,$sayi,$sayfa_sayisi,$limit,$hacker);

echo '</td></tr></table>';

include "../alt.php";

} else { // hacker yoksa

echo '<script language="JavaScript">
alert("Sonuç Bulunamadý Tekrar Arama Yapýnýz");
document.location="/arama/index.php";
</script>';

} // hacker kontrol



?>
                  </font></strong>