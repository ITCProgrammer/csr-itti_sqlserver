<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Lap-Packing-Harian-".date($_GET['awal']).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
$coninvqc=mysqli_connect("10.0.0.10","dit","4dm1n","invqc");
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
?> 
<strong>LAPORAN STOCK PAPER TUBE DIBANDINGKAN LAPORAN PACKING</strong><br>
<strong>Periode: <?php echo $Awal; ?> s/d <?php echo $Akhir; ?></strong><br> 
<table width="100%" border="1">
    <tr>
        <td><table width="100%" border="1">
            <tr>
                <th colspan="2" align="center">STOCK PAPER TUBE</th>
            </tr>
            <tr>
                <th><div align="center">INCH</div></th>
                <th><div align="center">QTY(PCS)</div></th>
            </tr>
            <?php
            $qry=mysqli_query($coninvqc,"SELECT * FROM tbl_barang WHERE nama='PAPER TUBE' ORDER BY id ASC");
            while($row=mysqli_fetch_array($qry)){
            ?>
            <tr>
                <td align="center"><?php echo substr($row['jenis'],-2); ?></td>
                <td align="center"><?php echo $row['jumlah']; ?></td>
            </tr>
            <?php } ?>
        </table></td>
        <td><table width="100%" border="1">
            <tr>
                <th colspan="2" align="center">LAPORAN PACKING</th>
            </tr>
            <tr>
                <th><div align="center">LEBAR KAIN</div></th>
                <th><div align="center">ROLL PACKING (PCS)</div></th>
            </tr>
            <?php $qry_packing=mysqli_query($con,"SELECT lebar, SUM(jml_netto) AS jumlah_netto FROM tbl_lap_inspeksi WHERE `tgl_update` BETWEEN '$Awal' AND '$Akhir' AND lebar!='' AND `dept`='PACKING' GROUP BY lebar ORDER BY lebar ASC"); 
            while($row1=mysqli_fetch_array($qry_packing)){
            ?>
            <tr>
                <td align="center"><?php echo $row1['lebar']; ?></td>
                <td align="center"><?php echo $row1['jumlah_netto']; ?></td>
            </tr>
            <?php } ?>
        </table></td>
    </tr>
</table>