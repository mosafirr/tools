<?php
$rip = $_SERVER['REMOTE_ADDR'];
$sd  = time();
$count = 1;

$file1 = "ip.txt";
$lines = file($file1);
$line2 = "";

foreach ($lines as $line_num => $line)
{
 //echo $line."";
 $fp = strpos($line,'****');
 $nam = substr($line,0,$fp);
 $sp = strpos($line,'++++');
 $val = substr($line,$fp+4,$sp-($fp+4));
 $diff = $sd-$val;
 if($diff < 600 && $nam != $rip) // be6e 180 - 3 min
 {
  $count = $count+1;
  $line2 = $line2.$line;
  //echo $line2;
 }
}

$my = $rip."****".$sd."++++\n";
$open1 = fopen($file1, "w");
fwrite($open1,"$line2");
fwrite($open1,"$my");
fclose($open1);

echo "<table width=250 height=30 bgcolor=#fdfdfd style=\"border: 1px green solid;\"><tr><td align=left valign=top>";
echo "</td><td align=center>";
echo "<span style=\"font-family: verdana,arial,helvetica; font-size: 11px; font-weight: bold; color: #0AF2F2;\">";
echo "Total users online: <font color=red>$count</font></span><br>";
echo "</td></tr></table>";
?>
