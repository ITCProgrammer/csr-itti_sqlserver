<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Top5-NoWarna-Lap-Fin-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
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
<?php 
      $sqlball=mysqli_query($con,"SELECT
      count(a.nokk) as jml_kk_all 
      from 
      db_qc.tbl_lap_inspeksi a
      where (a.proses !='Oven' or a.proses !='Fin 1X') and a.dept ='QCF'
      AND DATE_FORMAT( a.tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir'");
      $rball=mysqli_fetch_array($sqlball);
      ?>
<strong>Periode: <?php echo $Awal; ?> s/d <?php echo $Akhir; ?></strong><br>
<table width="100%" border="1">
    <tr>
        <th bgcolor="#12C9F0"><div align="center">No</div></th>
        <th bgcolor="#12C9F0"><div align="center">No Warna</div></th>
        <th bgcolor="#12C9F0"><div align="center">Warna</div></th>
        <th bgcolor="#12C9F0"><div align="center">A</div></th>
        <th bgcolor="#12C9F0"><div align="center">B</div></th>
        <th bgcolor="#12C9F0"><div align="center">C</div></th>
        <th bgcolor="#12C9F0"><div align="center">D</div></th>
        <th bgcolor="#12C9F0"><div align="center">NULL</div></th>
        <th bgcolor="#12C9F0"><div align="center">%</div></th>
    </tr>
    <?php 
          $no=1;
          $sqlw=mysqli_query($con,"SELECT 
          no_warna,
          warna,
          count(a.nokk) as jml_kk
          from 
          db_qc.tbl_lap_inspeksi a
          where (a.proses !='Oven' or a.proses !='Fin 1X') and a.dept ='QCF'
          AND DATE_FORMAT( a.tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
          group by 
          no_warna,
          warna
          order by jml_kk desc limit 5");
          while($rw=mysqli_fetch_array($sqlw)){
          //GROUP A
          $sqlwa=mysqli_query($con,"SELECT
          no_warna,
          warna,
          count(a.nokk) as jml_kk_a
          from 
          db_qc.tbl_lap_inspeksi a
          where (a.proses !='Oven' or a.proses !='Fin 1X') and a.dept ='QCF'
          AND DATE_FORMAT( a.tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
          and a.`grouping` = 'A' and a.no_warna ='$rw[no_warna]' and a.warna ='$rw[warna]'");
          $rwa=mysqli_fetch_array($sqlwa);
          //GROUP B
          $sqlwb=mysqli_query($con,"SELECT
          no_warna,
          warna,
          count(a.nokk) as jml_kk_b
          from 
          db_qc.tbl_lap_inspeksi a
          where (a.proses !='Oven' or a.proses !='Fin 1X') and a.dept ='QCF'
          AND DATE_FORMAT( a.tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
          and a.`grouping` = 'B' and a.no_warna ='$rw[no_warna]' and a.warna ='$rw[warna]'");
          $rwb=mysqli_fetch_array($sqlwb);
          //GROUP C
          $sqlwc=mysqli_query($con,"SELECT
          no_warna,
          warna,
          count(a.nokk) as jml_kk_c
          from 
          db_qc.tbl_lap_inspeksi a
          where (a.proses !='Oven' or a.proses !='Fin 1X') and a.dept ='QCF'
          AND DATE_FORMAT( a.tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
          and a.`grouping` = 'C' and a.no_warna ='$rw[no_warna]' and a.warna ='$rw[warna]'");
          $rwc=mysqli_fetch_array($sqlwc);
          //GROUP D
          $sqlwd=mysqli_query($con,"SELECT
          no_warna,
          warna,
          count(a.nokk) as jml_kk_d
          from 
          db_qc.tbl_lap_inspeksi a
          where (a.proses !='Oven' or a.proses !='Fin 1X') and a.dept ='QCF'
          AND DATE_FORMAT( a.tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
          and a.`grouping` = 'D' and a.no_warna ='$rw[no_warna]' and a.warna ='$rw[warna]'");
          $rwd=mysqli_fetch_array($sqlwd);
          //NULL
          $sqlwn=mysqli_query($con,"SELECT
          no_warna,
          warna,
          count(a.nokk) as jml_kk_null
          from 
          db_qc.tbl_lap_inspeksi a
          where (a.proses !='Oven' or a.proses !='Fin 1X') and a.dept ='QCF'
          AND DATE_FORMAT( a.tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' 
          and (a.`grouping` = '' or a.`grouping` is null ) and a.no_warna ='$rw[no_warna]' and a.warna ='$rw[warna]'");
          $rwn=mysqli_fetch_array($sqlwn);
          ?>
          <tr valign="top">
            <td align="center"><?php echo $no;?></td>
            <td align="center"><?php echo $rw['no_warna'];?></td>
            <td align="center"><?php echo $rw['warna'];?></td>
            <td align="center"><?php echo $rwa['jml_kk_a'];?></td>
            <td align="center"><?php echo $rwb['jml_kk_b'];?></td>
            <td align="center"><?php echo $rwc['jml_kk_c'];?></td>
            <td align="center"><?php echo $rwd['jml_kk_d'];?></td>
            <td align="center"><?php echo $rwn['jml_kk_null'];?></td>
            <td align="center"><?php echo number_format(($rw['jml_kk']/$rball['jml_kk_all'])*100,2)." %";?></td>
          </tr>
          <?php 
          $no++;}
          ?>
</table>
</body>