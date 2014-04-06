<?php
function getpageurl()
{
	$url = $_SERVER["PHP_SELF"];
	$first = 1;
	foreach ($_GET as $key => $val)
	{
		if ($first == 1)
		{
			$url = $url."?";
			$first = 0;
		}
		else
			$url = $url."&";
		$url = $url.$key."=".$val;
	}
	return $url;
}
?>
