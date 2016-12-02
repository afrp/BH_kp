<?php
function readmore($content)
{ 
	$maxkata=10;
	$xplode = explode(" ", $content);  
	if (count($xplode)>$maxkata)
	{
		$cuplik='';
		for ($a=0;$a<$maxkata;$a++)
		{
			$cuplik.=$xplode[$a]." ";
		}
		return $cuplik;
	}
	else
	{
		echo $konten;
	}
 } 
 function rapikan($str)
 { 
 	$cont = nl2br($str); 
 	$text = substr($cont,0,100); 
 	$text = substr($cont,0,strrpos($cont, " ")); 
 	return $text; } 
 ?>

