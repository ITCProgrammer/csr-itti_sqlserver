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
?>
<table width="100%" border="0">
    <tr>
        <td align="center" colspan="5"><strong><font size="+5">LAPORAN PACKING <?php echo date("j F Y", strtotime($_GET['awal']));?></font></strong></td>
    </tr>
    <tr>
        <td><table width="100%" border="1">
            <tr>
                <th colspan="3" align="center" bgcolor="#729FCF">ADIDAS</th>
            </tr>
            <tr>
                <th align="center" bgcolor="#FFFF00">FACTORY</th>
                <th align="center" bgcolor="#FFFF00">KGS</th>
                <th align="center" bgcolor="#FFFF00">YDS</th>
            </tr>
            <?php 
            $sql=mysqli_query($con,"SELECT pelanggan, netto, panjang FROM tbl_lap_inspeksi WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$_GET[awal]' AND '$_GET[akhir]'
            AND dept='PACKING' AND pelanggan LIKE '%ADIDAS%'");
            while($radi=mysqli_fetch_array($sql)){
            ?>
            <tr>
                <td align="left"><?php echo $radi['pelanggan'];?></td>
                <td align="right"><?php echo $radi['netto'];?></td>
                <td align="right"><?php echo $radi['panjang'];?></td>
            </tr>
            <?php 
            $tn_adi= $tn_adi+$radi['netto'];
            $tp_adi= $tp_adi+$radi['panjang'];
            } ?>
            <tr>
                <td align="center" bgcolor="#81D41A"><strong>TOTAL</strong></td>
                <td align="right" bgcolor="#81D41A"><strong><?php echo $tn_adi;?></strong></td>
                <td align="right" bgcolor="#81D41A"><strong><?php echo $tp_adi;?></strong></td>
            </tr>
        </table></td>
        <td>&nbsp;</td>
        <td><table width="100%" border="1">
            <tr>
                <th colspan="3" align="center" bgcolor="#729FCF">LULULEMON</th>
            </tr>
            <tr>
                <th align="center" bgcolor="#FFFF00">FACTORY</th>
                <th align="center" bgcolor="#FFFF00">KGS</th>
                <th align="center" bgcolor="#FFFF00">YDS</th>
            </tr>
            <?php 
            $sqllulu=mysqli_query($con,"SELECT pelanggan, netto, panjang FROM tbl_lap_inspeksi WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$_GET[awal]' AND '$_GET[akhir]'
            AND dept='PACKING' AND pelanggan LIKE '%LULU%'");
            while($rlulu=mysqli_fetch_array($sqllulu)){
            ?>
            <tr>
                <td align="left"><?php echo $rlulu['pelanggan'];?></td>
                <td align="right"><?php echo $rlulu['netto'];?></td>
                <td align="right"><?php echo $rlulu['panjang'];?></td>
            </tr>
            <?php 
            $tn_lulu= $tn_lulu+$rlulu['netto'];
            $tp_lulu= $tp_lulu+$rlulu['panjang'];
            } ?>
            <tr>
                <td align="center" bgcolor="#81D41A"><strong>TOTAL</strong></td>
                <td align="right" bgcolor="#81D41A"><strong><?php echo $tn_lulu;?></strong></td>
                <td align="right" bgcolor="#81D41A"><strong><?php echo $tp_lulu;?></strong></td>
            </tr>
        </table></td>
        <td>&nbsp;</td>
        <td><table width="100%" border="1">
            <tr>
                <th colspan="3" align="center" bgcolor="#729FCF">OTHER</th>
            </tr>
            <tr>
                <th align="center" bgcolor="#FFFF00">FACTORY</th>
                <th align="center" bgcolor="#FFFF00">KGS</th>
                <th align="center" bgcolor="#FFFF00">YDS</th>
            </tr>
            <?php 
            $sqldll=mysqli_query($con,"SELECT pelanggan, netto, panjang FROM tbl_lap_inspeksi WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$_GET[awal]' AND '$_GET[akhir]'
            AND dept='PACKING' AND pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%'");
            while($rdll=mysqli_fetch_array($sqldll)){
            ?>
            <tr>
                <td align="left"><?php echo $rdll['pelanggan'];?></td>
                <td align="right"><?php echo $rdll['netto'];?></td>
                <td align="right"><?php echo $rdll['panjang'];?></td>
            </tr>
            <?php 
            $tn_dll= $tn_dll+$rdll['netto'];
            $tp_dll= $tp_dll+$rdll['panjang'];
            } ?>
            <tr>
                <td align="center" bgcolor="#81D41A"><strong>TOTAL</strong></td>
                <td align="right" bgcolor="#81D41A"><strong><?php echo $tn_dll;?></strong></td>
                <td align="right" bgcolor="#81D41A"><strong><?php echo $tp_dll;?></strong></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>
<table width="100%" border="1">
    <tr>
        <th width="5%" rowspan="2"><div align="center">SHIFT</div></th>
        <th width="23%" colspan="3"><div align="center">LULULEMON</div></th>
        <th width="23%" colspan="3"><div align="center">ADIDAS</div></th>
        <th width="23%" colspan="3"><div align="center">DLL</div></th>
        <th width="23%" colspan="3"><div align="center">TOTAL</div></th>
    </tr>
    <tr>
        <th width="7%"><div align="center">ROLL</div></th>
        <th width="7%"><div align="center">KG</div></th>
        <th width="7%"><div align="center">YARD</div></th>
        <th width="7%"><div align="center">ROLL</div></th>
        <th width="7%"><div align="center">KG</div></th>
        <th width="7%"><div align="center">YARD</div></th>
        <th width="7%"><div align="center">ROLL</div></th>
        <th width="7%"><div align="center">KG</div></th>
        <th width="7%"><div align="center">YARD</div></th>
        <th width="7%"><div align="center">ROLL</div></th>
        <th width="7%"><div align="center">KG</div></th>
        <th width="7%"><div align="center">YARD</div></th>
    </tr>
    <?php
    $t_roll=0;
    $t_kg=0;
    $t_yard=0;
    $total_rlulu=$total_kglulu=$total_ylulu=$total_radi=$total_kgadi=$total_yadi=$total_rdll=$total_kgdll=$total_ydll=0;
    $persen_kglulu=$persen_ylulu=$persen_kgadi=$persen_yadi+$persen_kgdll+$persen_ydll=0;
    $qry=mysqli_query($con,"SELECT a.inspektor, a.roll AS roll_lulu, a.kg AS kg_lulu, a.yard AS yard_lulu, b.roll AS roll_adidas, b.kg AS kg_adidas, b.yard AS yard_adidas, c.roll AS roll_dll, c.kg AS kg_dll, c.yard AS yard_dll FROM 
    (SELECT inspektor, COUNT(*) AS roll, SUM(netto) AS kg, SUM(panjang) AS yard FROM tbl_lap_inspeksi WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$_GET[awal]' AND '$_GET[akhir]' 
    AND `dept`='PACKING' AND pelanggan LIKE '%LULU%' GROUP BY inspektor) A 
    LEFT JOIN
    (SELECT inspektor, COUNT(*) AS roll, SUM(netto) AS kg, SUM(panjang) AS yard FROM tbl_lap_inspeksi WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$_GET[awal]' AND '$_GET[akhir]' 
    AND `dept`='PACKING' AND pelanggan LIKE '%ADIDAS%' GROUP BY inspektor) B
    ON a.inspektor=b.inspektor
    LEFT JOIN
    (SELECT inspektor, COUNT(*) AS roll, SUM(netto) AS kg, SUM(panjang) AS yard FROM tbl_lap_inspeksi WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$_GET[awal]' AND '$_GET[akhir]' 
    AND `dept`='PACKING' AND pelanggan NOT LIKE '%ADIDAS%' AND pelanggan NOT LIKE '%LULU%' GROUP BY inspektor) C
    ON b.inspektor=c.inspektor");
    while($row=mysqli_fetch_array($qry)){
    ?>
    <tr>
        <td align="center"><?php echo $row['inspektor']; ?></td>
        <td align="center"><?php echo $row['roll_lulu']; ?></td>
        <td align="center"><?php echo $row['kg_lulu']; ?></td>
        <td align="center"><?php echo $row['yard_lulu']; ?></td>
        <td align="center"><?php echo $row['roll_adidas']; ?></td>
        <td align="center"><?php echo $row['kg_adidas']; ?></td>
        <td align="center"><?php echo $row['yard_adidas']; ?></td>
        <td align="center"><?php echo $row['roll_dll']; ?></td>
        <td align="center"><?php echo $row['kg_dll']; ?></td>
        <td align="center"><?php echo $row['yard_dll']; ?></td>
        <td align="center"><?php echo $row['roll_lulu']+$row['roll_adidas']+$row['roll_dll']; ?></td>
        <td align="center"><?php echo $row['kg_lulu']+$row['kg_adidas']+$row['kg_dll']; ?></td>
        <td align="center"><?php echo $row['yard_lulu']+$row['yard_adidas']+$row['yard_dll']; ?></td>
    </tr>
    <?php 
          $total_rlulu=$total_rlulu+$row['roll_lulu'];
          $total_kglulu=$total_kglulu+$row['kg_lulu'];
          $total_ylulu=$total_ylulu+$row['yard_lulu'];
          $total_radi=$total_radi+$row['roll_adidas'];
          $total_kgadi=$total_kgadi+$row['kg_adidas'];
          $total_yadi=$total_yadi+$row['yard_adidas'];
          $total_rdll=$total_rdll+$row['roll_dll'];
          $total_kgdll=$total_kgdll+$row['kg_dll'];
          $total_ydll=$total_ydll+$row['yard_dll'];
          } 
          $t_roll=$total_rlulu+$total_radi+$total_rdll;
          $t_kg=$total_kglulu+$total_kgadi+$total_kgdll;
          $t_yard=$total_ylulu+$total_yadi+$total_ydll;

          $persen_kglulu=number_format(($total_kglulu/($total_kglulu+$total_kgadi+$total_kgdll))*100,2);
          $persen_ylulu=number_format(($total_ylulu/($total_ylulu+$total_yadi+$total_ydll))*100,2);
          $persen_kgadi=number_format(($total_kgadi/($total_kglulu+$total_kgadi+$total_kgdll))*100,2);
          $persen_yadi=number_format(($total_yadi/($total_ylulu+$total_yadi+$total_ydll))*100,2);
          $persen_kgdll=number_format(($total_kgdll/($total_kglulu+$total_kgadi+$total_kgdll))*100,2);
          $persen_ydll=number_format(($total_ydll/($total_ylulu+$total_yadi+$total_ydll))*100,2);
    ?>
    <tr>
        <td align="center">TOTAL</td>
        <td align="center"><?php echo $total_rlulu; ?></td>
        <td align="center"><?php echo $total_kglulu; ?></td>
        <td align="center"><?php echo $total_ylulu; ?></td>
        <td align="center"><?php echo $total_radi; ?></td>
        <td align="center"><?php echo $total_kgadi; ?></td>
        <td align="center"><?php echo $total_yadi; ?></td>
        <td align="center"><?php echo $total_rdll; ?></td>
        <td align="center"><?php echo $total_kgdll; ?></td>
        <td align="center"><?php echo $total_ydll; ?></td>
        <td align="center"><?php echo $t_roll; ?></td>
        <td align="center"><?php echo $t_kg; ?></td>
        <td align="center"><?php echo $t_yard; ?></td>
    </tr> 
    <tr>
        <td align="center">%</td>
        <td align="center">&nbsp;</td>
        <td align="center"><?php echo $persen_kglulu; ?></td>
        <td align="center"><?php echo $persen_ylulu; ?></td>
        <td align="center">&nbsp;</td>
        <td align="center"><?php echo $persen_kgadi; ?></td>
        <td align="center"><?php echo $persen_yadi; ?></td>
        <td align="center">&nbsp;</td>
        <td align="center"><?php echo $persen_kgdll; ?></td>
        <td align="center"><?php echo $persen_ydll; ?></td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
    </tr> 
</table>