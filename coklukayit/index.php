<?
session_start();
include "../ust.php";

?>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style2 {color: #FF0000}
-->
</style>


      <div class="style1" id="content">
	<center>
	  <h4><span class="style2">�okLu Deface Kayd&#305;</span></h4>
	</center>
<?
if ($_GET['d'] == "" || $_GET['d'] < 1 || $_GET['d'] > 25){

echo '<form action="'.$PHP_SELF.'" method="GET" /><br /><center><b>L�tfen ekleyece�iniz deface say�s�n� giriniz:<b>&nbsp;&nbsp;<input type="text" name="d" maxlenght="2"></center><br /><br /><center><input type="submit" value="G�nder"></form><ul><li>Bir seferde 25\'ten fazla ekleyemezsiniz.</li></ul></center>';

} else {

$d = $_GET['d'];
?>
			<div>
				<form action="kaydet.php" method="POST">
                   <span class="descr">
                   <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" width="75%">
	               </span>
                   <tr>
                      <td width="30%" class="descr style2">Defacer</td>
                      <td width="70%">
				        <span class="descr">
				        <input type="text" maxlength="20" name="hacker" class="styled" size="20" />
			         </span></td>
                  </tr>
                   <span class="descr">
<? for ($i=1;$i<=$d;$i++){
echo '              <tr>
                      <td width="30%"><b>Deface URL '.$i.'</b></td>
                      <td width="70%">
				<input type="text" maxlength="100" name="site'.$i.'" class="styled" size="40" value="http://" /></td>
                    </tr>';
} // for bitimi ?>
<input type="hidden" name="d" value="<? echo $d; ?>">
<input type="hidden" name="gkodumuz" value="123456">
<input type="hidden" name="zgkod" value="123456">
<input type="hidden" name="sunucu" value="<? echo getenv('REMOTE_ADDR'); ?>">
		           </span>
                  <tr>
                      <td width="50%" class="descr style2">G�venLik Kodu</td>
                      <td width="50%" class="descr">
                      <input type="text" maxlength="6" name="kod" class="styled" size="20" />
                      &nbsp;&nbsp;&nbsp;&nbsp;<img align="top" src="kod.php" /><br />
                      <br />
                      </td>
		    </tr>
                    <tr>
                      <td width="50%">&nbsp;</td>
                      <td width="50%"><span class="descr">
                      <input type="submit" value="Kay&#305;t Et !" style="font-size: 10pt;" onclick="javascript:this.form.submit();this.disabled=true;this.value='Kaydediliyor...';">
                      </span>
              </form>
				<span class="descr">
                    </td>
                    </tr>
                    </table>
                </span></div>
                <p align="center">
                <img border="0" src="/img/warning.gif" width="50" height="50">                </p>
                <p align="center"><big><span class="style2">BiLgiLendirme ve KuLLan�m �artLar�</span></big> </p>
                <ul>
		 <li>Adreslerin hepsini doldurmak zorunda de�ilsiniz en az 1 tane yeterlidir.</li>
		 <li>Nickiniz <font color="#FF0000">20 (yirmi)</font> Karakteri Ge�emez!!!</li>
		 <li>Nickinizde <font color="#FF0000">T�RK�E karakter</font> ve <font color="#FF0000">Bo&#351;Luk</font> Kullanmay�n�z!!!</li>
		 <li>Hackledi�iniz URL <font color="#FF0000"> http://www.ornek.com </font> yada <font color="#FF0000"> http://subdomain.ornek.com </font> �eklinde Olmak Zorundad�r!!!</font></li>
		 <li>Do�ru Yaz�lmayan sitenin Mirror'u yay�nlanmaz, silinir!!!</li>
		 <li>G�venlik kodunda b�y�k harf, k���k harf hassasl��� vard�r!!!</li>
		 <li>Mirror (yans�) unu kaydetti�iniz site en ge� 4 saat i�inde g�sterime a��lacakt�r bu s�re i�inde OnHold b�l�m�nden izleme ger�ekle�ecektir. Adminler taraf�ndan onaylanan mirrorlar� Deface Ar�ivinden g�r�nt�leyebilir yada arama yapabilirsiniz!!!</li>
		 <li>Hacklenen siteler Y�netimimize yasal bir sorumluluk y�klemez, Bu sistem sadece bir yans� sitesidir!!!</li>
		</ul>
                <div align="center">
                  <? } ?><span class="style2">Y&ouml;netimi                </span></div>
</div>

      <? include "../alt.php"; 

?>