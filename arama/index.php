<?
include "../ust.php";
include "../sol.php";

?>
<style type="text/css">
<!--
.style1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FF0000;
}
.style13 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
-->
</style>


	<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="65%" align="center">
<tr>
  <td colspan="2" align="center"><span class="style1">Arama </span></td>
</tr>
<tr><form action="arama.php" method="POST"><td><b>Aranacak Kelime:</b></td><td>
<input type="text" name="kelime" size="20"></td></tr>
<tr>
  <td><span class="style1">Arama Yeri : </span></td>
  <td><select size="1" name="yer">
                        <option selected="selected">Se�</option>
                        <option>Sitelerde</option>
                        <option>Hackerlarda</option>
                        <option>Haberlerde</option>
                        </select></td></tr>
<tr><td>&nbsp;</td><td>
<input type="submit" value="Ara" onclick="javascript:this.form.submit();this.disabled=true;this.value='Bekleyiniz...';" style="font-family: Tahoma; font-size: 10pt; "></td></tr></form>
<tr><td colspan="2"><p>&nbsp;</p>
  <p><font color="red" size="1">&Ouml;</font><span class="style13"><font size="1"><font color="red">emli A�&#305;kLama:</font><br />
    Aramak istedi�iniz kelimeyi yaz�n�z, bo� Arama yapamazs�n�z, 4(D�rt) Karakterden K���k arama yapamazs�n�z, URL aramalar�nda 13 karakterden k���k arama yapamazs�n�z ve ba��na http:// koyunuz.!!<br />
    <br />
    Aramak istedi�iniz yeride se�tikten sonra aramaya ba�layabilirsiniz </font></span></p></td>
</tr>
</table>

<? include "../alt.php"; 

?>