<?

function sayfala($s,$sayi,$sayfa_sayisi,$limit,$hacker){
$ileri = $s + 1;
$geri = $s - 1;

if ($sayfa_sayisi > 10){

if ($s == 1) {

$ilk = 1;
$son = 10;

for ($i=$ilk;$i<=$son;$i++){
if ($i == $s) echo '['.$i.'] ';
else echo '<a href="'.$PHP_SELF.'?s='.$i.'&user='.$hacker.'">'.$i.'</a> ';
} //for bitim

echo '<a href="'.$PHP_SELF.'?s='.$ileri.'&user='.$hacker.'">�leri&gt;&gt;</a>&nbsp;';

} elseif ($s < 6){

$ilk = 1;
$son = 10;

echo '<a href="'.$PHP_SELF.'?s='.$geri.'&user='.$hacker.'">&lt;&lt;Geri</a>&nbsp;';

for ($i=$ilk;$i<=$son;$i++){
if ($i == $s) echo '['.$i.'] ';
else echo '<a href="'.$PHP_SELF.'?s='.$i.'&user='.$hacker.'">'.$i.'</a> ';
} //for bitim

echo '<a href="'.$PHP_SELF.'?s='.$ileri.'&user='.$hacker.'">�leri&gt;&gt;</a>&nbsp;';

} elseif ($s == $sayfa_sayisi){

$ilk = $s - 10;
$son = $sayfa_sayisi;

echo '<a href="'.$PHP_SELF.'?s='.$geri.'&user='.$hacker.'">&lt;&lt;Geri</a>&nbsp;';

for ($i=$ilk;$i<=$son;$i++){
if ($i == $s) echo '['.$i.'] ';
else echo '<a href="'.$PHP_SELF.'?s='.$i.'&user='.$hacker.'">'.$i.'</a> ';
} //for bitim

} elseif ($s > $sayfa_sayisi-5){

$ilk = $sayfa_sayisi - 10;
$son = $sayfa_sayisi;

echo '<a href="'.$PHP_SELF.'?s='.$geri.'&user='.$hacker.'">&lt;&lt;Geri</a>&nbsp;';

for ($i=$ilk;$i<=$son;$i++){
if ($i == $s) echo '['.$i.'] ';
else echo '<a href="'.$PHP_SELF.'?s='.$i.'&user='.$hacker.'">'.$i.'</a> ';
} //for bitim

echo '<a href="'.$PHP_SELF.'?s='.$ileri.'&user='.$hacker.'">�leri&gt;&gt;</a>&nbsp;';

} else {

$ilk = $s - 5;
$son = $s + 5;

echo '<a href="'.$PHP_SELF.'?s='.$geri.'&user='.$hacker.'">&lt;&lt;Geri</a>&nbsp;';

for ($i=$ilk;$i<=$son;$i++){
if ($i == $s) echo '['.$i.'] ';
else echo '<a href="'.$PHP_SELF.'?s='.$i.'&user='.$hacker.'">'.$i.'</a> ';
} //for bitim

echo '<a href="'.$PHP_SELF.'?s='.$ileri.'&user='.$hacker.'">�leri&gt;&gt;</a>&nbsp;';

} // sayfa ilk son kontrol

} else { // 10 dan b�y�k de�ilse

if ($sayfa_sayisi > 1){
if ($s == 1){

for ($i=1;$i<=$sayfa_sayisi;$i++){
if ($i == $s) echo '['.$i.'] ';
else echo '<a href="'.$PHP_SELF.'?s='.$i.'&user='.$hacker.'">'.$i.'</a> ';
} //for bitim

echo '<a href="'.$PHP_SELF.'?s='.$ileri.'&user='.$hacker.'">�leri&gt;&gt;</a>&nbsp;';

} elseif ($s == $sayfa_sayisi) {

echo '<a href="'.$PHP_SELF.'?s='.$geri.'&user='.$hacker.'">&lt;&lt;Geri</a>&nbsp;';

for ($i=1;$i<=$sayfa_sayisi;$i++){
if ($i == $s) echo '['.$i.'] ';
else echo '<a href="'.$PHP_SELF.'?s='.$i.'&user='.$hacker.'">'.$i.'</a> ';
} //for bitim

} else {

echo '<a href="'.$PHP_SELF.'?s='.$geri.'&user='.$hacker.'">&lt;&lt;Geri</a>&nbsp;';

for ($i=1;$i<=$sayfa_sayisi;$i++){
if ($i == $s) echo '['.$i.'] ';
else echo '<a href="'.$PHP_SELF.'?s='.$i.'&user='.$hacker.'">'.$i.'</a> ';
} //for bitim

echo '<a href="'.$PHP_SELF.'?s='.$ileri.'&user='.$hacker.'">�leri&gt;&gt;</a>&nbsp;';

} // sayfa ilk son kontrol

} else { // tek sayfaysa

for ($i=1;$i<=$sayfa_sayisi;$i++){
if ($i == $s) echo '['.$i.'] ';
else echo '<a href="'.$PHP_SELF.'?s='.$i.'&user='.$hacker.'">'.$i.'</a> ';
} //for bitim

} // 1 sayfadan b�y�k m� kontrol�

} // 10 dan b�y�k kontrol

return $s;
return $sayi;
return $sayfa_sayisi;
return $limit;
} // sayfala fonksiyonu bitimi

?>