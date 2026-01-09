<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Cancel-NCP-QC-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
include "../../koneksi.php";
//--
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
?>
<body>
	
<table width="100%" border="1">
    <tr>
        <th colspan="17" bgcolor="#F2DD0F" align="center">LAPORAN NCP CANCEL</th>
    </tr>
    <tr>
        <th colspan="17" bgcolor="#F2DD0F" align="center">PERIODE <?php echo strtoupper($Awal); ?> S/D <?php echo strtoupper($Akhir); ?></th>
    </tr>
    <tr>
        <th align="center">No.</th>
        <th align="center">Tanggal</th>
        <th align="center">No. NCP</th>
        <th align="center">Dibuat oleh</th>
        <th align="center">Langganan</th>
        <th align="center">Buyer</th>
        <th align="center">Order</th>
        <th align="center">Hanger</th>
        <th align="center">Jenis Kain</th>
        <th align="center">Warna</th>
        <th align="center">No. Warna</th>
        <th align="center">Lot</th>
        <th align="center">Rol</th>
        <th align="center">Weight</th>
        <th align="center">Masalah</th>
        <th align="center">Di Cancel oleh</th>
        <th align="center">Catatan verifikator</th>
    </tr>
    <?php 
    $no=1;
    $qry1=mysqli_query($con,"SELECT * FROM tbl_ncp_qcf WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND `status`='Cancel' ORDER BY dibuat_oleh ASC");
    while($r=mysqli_fetch_array($qry1)){
    ?>
    <tr>
        <td><?php echo $no;?></td>
        <td><?php echo $r['tgl_buat'];?></td>
        <td><?php echo $r['no_ncp'];?></td>
        <td><?php echo $r['dibuat_oleh'];?></td>
        <td><?php echo $r['langganan'];?></td>
        <td><?php echo $r['buyer'];?></td>
        <td><?php echo $r['no_order'];?></td>
        <td><?php echo $r['no_hanger'];?></td>
        <td><?php echo $r['jenis_kain'];?></td>
        <td><?php echo $r['warna'];?></td>
        <td><?php echo $r['no_warna'];?></td>
        <td>'<?php echo $r['lot'];?></td>
        <td><?php echo $r['rol'];?></td>
        <td><?php echo $r['berat'];?></td>
        <td><?php echo $r['masalah'];?></td>
        <td align="center"><?php if($r['status']=="Cancel"){echo $r['disposisiqc'];}else {echo "-";}?></td>
        <td><?php echo $r['catat_verify'];?></td>
    </tr>
    <?php $no++;} ?>
</table>
<table width="100%" border="1">
    <tr>
        <th rowspan="2" align="center">Dibuat Oleh</th>
        <th colspan="3" align="center">Total NCP</th>
        <th colspan="4" align="center">Cancel</th>
    </tr>
    <tr>
        <th align="center">Lot</th>
        <th align="center">Roll</th>
        <th align="center">Kg</th>
        <th align="center">Lot</th>
        <th align="center">Roll</th>
        <th align="center">Kg</th>
        <th align="center">%</th>
    </tr>
    <?php
    $t_lot=0;
    $t_rol=0;
    $t_berat=0;
    $t_lotc=0;
    $t_rolc=0;
    $t_beratc=0;
    $qry2=mysqli_query($con,"SELECT DISTINCT(dibuat_oleh) FROM tbl_ncp_qcf WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' ORDER BY dibuat_oleh ASC");
    while($row=mysqli_fetch_array($qry2)){
        $qryD=mysqli_query($con,"SELECT COUNT(*) as Lot, SUM(rol) as Rol, SUM(berat) as Berat FROM tbl_ncp_qcf WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND dibuat_oleh='$row[dibuat_oleh]' AND NOT `status`='Cancel'");
        $rD=mysqli_fetch_array($qryD);
        $qryC=mysqli_query($con,"SELECT COUNT(*) as Lot_Cancel, SUM(rol) as Rol_Cancel, SUM(berat) as Berat_Cancel FROM tbl_ncp_qcf WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND dibuat_oleh='$row[dibuat_oleh]' AND `status`='Cancel'");
        $rC=mysqli_fetch_array($qryC);
    ?>
    <tr>
        <td><?php echo $row['dibuat_oleh'];?></td>
        <td><?php echo $rD['Lot'];?></td>
        <td><?php echo $rD['Rol'];?></td>
        <td><?php echo $rD['Berat'];?></td>
        <td><?php echo $rC['Lot_Cancel'];?></td>
        <td><?php echo $rC['Rol_Cancel'];?></td>
        <td><?php echo $rC['Berat_Cancel'];?></td>
        <td><?php if($rC['Lot_Cancel']==NULL OR $rC['Lot_Cancel']=="0"){echo "0.00";}else{echo number_format(($rC['Lot_Cancel']/$rD['Lot'])*100,2);}?></td>
    </tr>
    <?php 
     $t_lot= $t_lot+$rD['Lot'];
     $t_rol= $t_rol+$rD['Rol'];
     $t_berat= $t_berat+$rD['Berat'];
     $t_lotc= $t_lotc+$rC['Lot_Cancel'];
     $t_rolc= $t_rolc+$rC['Rol_Cancel'];
     $t_beratc= $t_beratc+$rC['Berat_Cancel'];
    } ?>
    <tr>
        <td>Total</td>
        <td><?php echo number_format($t_lot,2);?></td>
        <td><?php echo number_format($t_rol,2);?></td>
        <td><?php echo number_format($t_berat,2);?></td>
        <td><?php echo number_format($t_lotc,2);?></td>
        <td><?php echo number_format($t_rolc,2);?></td>
        <td><?php echo number_format($t_beratc,2);?></td>
        <td>&nbsp;</td>
    </tr> 
</table>
</body>