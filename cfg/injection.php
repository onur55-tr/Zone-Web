<?

$gelme = array ('select', 'insert', 'delete', 'update', 'drop table', 'union', 'null', 'SELECT', 'INSERT', 'DELETE', 'UPDATE', 'DROP TABLE', 'UNION', 'NULL');
	for ($i = 0; $i < sizeof ($_GET); ++$i)
	{
		for ($j = 0; $j < sizeof ($gelme); ++$j)
		{
			if (preg_match ('/' . $gelme[$j] . '/', $_GET[key ($_GET)]))
			{
			    $temp = key ($_GET);
			    $_GET[$temp] = '';
			    exit("<br /><center><big><b>L�TFEN B�R DAHA B�YLE B�R �EY DENEMEY�N !</b></big></center>");
			    continue;
			}
		}
	}

?>