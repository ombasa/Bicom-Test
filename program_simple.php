<?php
$handle = @fopen($argv[1], "r");
if ($handle) {
    while (($buffer = fgets($handle, 4096)) !== false) {
		$temp = "";
		$deco = "";
		for($i=0; $i<strlen($buffer); $i++)
			if($i%2 == 0){
				$temp .= $buffer[$i] == " " ? "   |": " ".$buffer[$i]." |";
				$deco .= $buffer[$i] == " " ? "   +" : "---+";
			}
		if(!isset($first_deco)){
			$first_deco = 1;
			echo "+".$deco."\n";
		}
		echo "|".$temp."\n";
		echo "+".$deco."\n";
    }
    fclose($handle);
}
?>