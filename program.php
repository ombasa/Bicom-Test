<?php
/* Emir Ombasic - 31.03.2012 */

//a little bit of params, just for fun :
define("SEP", "|");//SEParator
define("SPC", " ");//space char
define("D_SEP", "+");//decoration SEParator
define("D_SPC", "-");//decoration space

//read the arguments from the console 
$handle = @fopen($argv[1], "r");

//check if file exists
if ($handle) {

	$M = array();
	$m = 1; //current row index
	//loop trough lines
    while (($buffer = fgets($handle, 4096)) !== false) 
	{
		for($i=0;$i<strlen($buffer);$i++)
		{
			//get rid of new lines char :
			$buffer = str_replace("\n","",$buffer);
			if($i%2==0)
			{
				$M[$m][$i+1] = $buffer[$i];
				if($buffer[$i] != SPC) 
				{
					//close left and right sides
					$M[$m][$i] = SEP;
					$M[$m][($i+2)] = SEP;
					
					//put something above, for the rainy days http://www.youtube.com/watch?v=UV7VsG0xin4
					$M[$m-1][$i+1] = "-";
					$M[$m+1][$i+1] = "-";
					
					//but something under
					$M[$m+1][$i] = D_SEP;
					$M[$m+1][$i+2] = D_SEP;
					
					//close left and right sides in decoration
					$M[$m-1][$i] = D_SEP;
					$M[$m-1][$i+2] = D_SEP;
				}
				else
				{
					//same fashion as previous, just putting in some chars to fill in the space :
					if(!isset($M[$m][$i])) $M[$m][$i] = SPC;
					if(!isset($M[$m][($i+2)])) $M[$m][($i+2)] = SPC;
					
					if(!isset($M[$m-1][$i])) $M[$m-1][$i] = SPC;
					if(!isset($M[$m-1][$i+1])) $M[$m-1][$i+1] = SPC;
					if(!isset($M[$m-1][$i+2])) $M[$m-1][$i+2] = SPC;
					
					if(!isset($M[$m+1][$i])) $M[$m+1][$i] = SPC;
					if(!isset($M[$m+1][$i+1])) $M[$m+1][$i+1] = SPC;
					if(!isset($M[$m+1][$i+2])) $M[$m+1][$i+2] = SPC;
				}
			}
		}
		$m+= 2;
    }
	//astalavista babe :
    fclose($handle);
	
	//print out the matrix
	for($cn = 0;$cn<count($M); $cn++)
	{
		$line = $M[$cn];
		$line_str = "";
		for($i=0;$i<count($line);$i++)
		{
			if($line[$i] == SPC && $i%2 != 0) $line_str .= "*";
			else $line_str .= $line[$i];
		}

		$line_str = str_replace(D_SPC,D_SPC.D_SPC.D_SPC,$line_str);
		$line_str = str_replace("*",SPC.SPC.SPC,$line_str);
		
		//addidional spaces around letters :
		$line_str = preg_replace('/([A-Za-z])/', ' ${1} ', $line_str);
		echo $line_str."\n";
	}
}
?>