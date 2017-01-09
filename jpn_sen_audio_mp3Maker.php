<?php
require_once('Connections/conn.php');
$colname_Recordset1 = "-1";
if (isset($_GET['category'])) {
    $colname_Recordset1 = $_GET['category'];
}
$j=$colname_Recordset1;
mysql_select_db($database_conn, $conn);
$query_Recordset1 = "SELECT * FROM jpn_sen_audio WHERE cid>0 and sum<14 and category = ".$j." order by audio asc";
//$query_Recordset1 = "SELECT * FROM jpn_sen_audio WHERE ISNULL(status) and sum<13 and category = ".$j." order by audio asc";
$Recordset1 = mysql_query($query_Recordset1, $conn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
$mp3Audio="#EXTM3U\n\n";
$mp3LRC="";
do {
    for( $i=0; $i<2; $i++){
        $mp3LRC=$mp3LRC.$row_Recordset1['eng1']." / ".$row_Recordset1['chn']."[".$row_Recordset1['ID']."]\n";
        $mp3Audio=$mp3Audio."#EXTSILENCE: 3\n\nD:\wwwroot\git_test073_helper\audioJPN2\\".$row_Recordset1['audio']."\n\n";
    }
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
$path = "C:\Users\leeke\Desktop\JPNMP3\\".date("Y-m-d H-i-s")."\\";
if (!is_dir($path)){
    mkdir($path,0777);  // ?????test,??777?????????
}
//$content = $JSON_rsNews."\n".$JSON_rsCate;  // ?????
$fileLRC = $path."mp3LRC_".$j.".lrc";
$fileM3U = $path."mp3m3u_".$j.".m3u";// ?????
//rename($path."WholeJson.js", $path."WholeJson.js.".date("Y-m-d H-i-s"));
file_put_contents($fileLRC,$mp3LRC,FILE_APPEND);  // ????????????????????
file_put_contents($fileM3U,$mp3Audio,FILE_APPEND);
//$file = $path."WholeJson_".date("Y-m-d H-i-s").".js";    // ?????
//file_put_contents($file,$content,FILE_APPEND);  // ????????????????????
//echo "1";
?>
DONE
