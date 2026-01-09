<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Summary-Random-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
include "../../koneksi.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg, DATE_FORMAT(now(),'%Y-%m-%d')+ INTERVAL 1 DAY as tgl_besok");
$rTgl=mysqli_fetch_array($qTgl);
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
?>
<body>
    <table width="100%" border="1">
        <tr>
            <th rowspan="3" colspan="8" align="center"><?php echo date("j Y", strtotime($Awal));?></th>
            <th rowspan="2" colspan="10" align="center">SNAG POD (FACE)</th>
            <th rowspan="2" colspan="2"align="center">SNAG POD (BACK)</th>
            <th rowspan="5" align="center">SNAG MACE</th>
            <th rowspan="2" colspan="3" align="center">BS</th>
            <th rowspan="2" colspan="2" align="center">PILLING MARTINDALE</th>
            <th rowspan="2" colspan="2" align="center">ELONGATION</th>
            <th rowspan="2" colspan="2" align="center">RECOVERY</th>
            <th rowspan="2" colspan="2" align="center">PILLING MARTINDALE</th>
            <th rowspan="3" colspan="2" align="center">WICKING</th>
            <th rowspan="3" align="center">ABSORBENCY</th>
            <th rowspan="3" align="center">EVAPORATION RATE</th>
        </tr>
        <tr>
            <th colspan="5" align="center">LENGTH</th>
            <th colspan="5" align="center">WIDTH</th>
            <th align="center">LENGTH</th>
            <th align="center">WIDTH</th>
            <th align="center">N</th>
            <th align="center">KPA</th>
            <th align="center">PSI</th>
            <th align="center">500</th>
            <th align="center">2000</th>
            <th align="center">L</th>
            <th align="center">W</th>
            <th align="center">L</th>
            <th align="center">W</th>
        </tr>
        <tr>
            <th rowspan="2" align="center">ITEM</th>
            <th rowspan="2" align="center">HANGER</th>
            <th rowspan="2" align="center">BUYER</th>
            <th rowspan="2" align="center">WIDTH</th>
            <th rowspan="2" align="center">GSM</th>
            <th rowspan="2" align="center">PILLING</th>
            <th rowspan="2" align="center">PILL BOX</th>
            <th colspan="12" align="center">SNAGPOD</th>
            <th colspan="3" align="center">BS</th>
            <th colspan="2" align="center">PILL MARTINDALE</th>
            <th colspan="2" align="center">ELONGATION</th>
            <th colspan="2" align="center">RECOVERY</th>
            <th align="center">L</th>
            <th align="center">W</th>
            <th align="center">PHX-AP0604</th>
            <th align="center">PHX-AP0607</th>
        </tr>
        <tr>
            <th align="center">Grade</th>
            <th align="center">Class</th>
            <th align="center">Snag < 2mm</th>
            <th align="center">Snag 2-5mm</th>
            <th align="center">Snag > 5mm</th>
            <th align="center">Grade</th>
            <th align="center">Class</th>
            <th align="center">Snag < 2mm</th>
            <th align="center">Snag 2-5mm</th>
            <th align="center">Snag > 5mm</th>
            <th align="center">Grade</th>
            <th align="center">Grade</th>
            <th align="center">NEWTON</th>
            <th align="center">KPA</th>
            <th align="center">NEWTON</th>
            <th align="center">PSI</th>
            <th align="center">500 REV</th>
            <th align="center">2000 REV</th>
            <th align="center">L</th>
            <th align="center">W</th>
            <th align="center">L</th>
            <th align="center">W</th>
            <th align="center" colspan="2">After 5 Wash</th>
            <th align="center">After 5 Wash</th>
            <th align="center">After 5 Wash</th>
        </tr>
        <?php 
        
        ?>
        <tr>
            <td></td>
        </tr>
    </table>
</body>