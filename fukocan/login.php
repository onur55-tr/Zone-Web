<? ob_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9" />
</head>
<body>
<?

$kadi = "fukocan";
$sifre = "4992010";

if ($_GET['islem'] == "girisyap"){

if ($_POST['kadi'] == $kadi AND $_POST['sifre'] == $sifre){

session_start();
$_SESSION["imhatimi_admin_sessionu"] = $_POST['kadi'];
$_SESSION["imhatimi_pass_sessionu"] = $_POST['sifre'];

echo '<center>';
echo '<meta http-equiv="refresh" content="3; url=index.php">';
echo '<br /><br /><h4>Ba�ar�yla giri� yapt�n�z</h4>Y�nlendiriliyorsunuz...';

} else {

echo '<center>';
echo '<br /><br />Yanl�� bilgi girdiniz<br /><br /><a href="' . $PHP_SELF . '">Tekrar denemek i�in t�klay�n</a>';

}

} else {

echo '<center>';
echo '<br /><br /><h2>ADMIN LOGIN</h2>';
echo '<table align="center">';
echo '<form action="' . $PHP_SELF . '?islem=girisyap" method="POST">';
echo '<tr><td>Kullan�c� Ad�:</td><td><input type="text" name="kadi"></td></tr>';
echo '<tr><td>�ifre:</td><td><input type="password" name="sifre"></td></tr>';
echo '<tr><td colspan="2" align="center"><input type="submit" value="Giri� Yap"></td></tr>';
echo '</form></table>';

}

?>
</center>
</body>
</html>
<? ob_end_flush(); ?>