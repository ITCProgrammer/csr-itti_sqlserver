<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Lap-Inspect-Harian-".date($_GET['awal']).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
?>
<?php
$Awal	= isset($_GET['awal']) ? $_GET['awal'] : '';
$Akhir	= isset($_GET['akhir']) ? $_GET['akhir'] : '';
$Dept	= isset($_GET['dept']) ? $_GET['dept'] : '';
$Shift	= isset($_GET['shift']) ? $_GET['shift'] : '';
$GShift	= isset($_GET['gshift']) ? $_GET['gshift'] : '';	
$Proses	= isset($_GET['proses']) ? $_GET['proses'] : '';	
$jamA	= isset($_GET['jam_awal']) ? $_GET['jam_awal'] : '';
$jamAr	= isset($_GET['jam_akhir']) ? $_GET['jam_akhir'] : '';
if(strlen($jamA)==5){
	$start_date = $Awal.' '.$jamA;
}else{ 
	$start_date = $Awal.' 0'.$jamA;
}	
if(strlen($jamAr)==5){
	$stop_date  = $Akhir.' '.$jamAr;
}else{ 
	$stop_date  = $Akhir.' 0'.$jamAr;
}
if($_GET['shift']=="ALL"){		
    $Wshift=" ";	
}else{	
    $Wshift=" AND b.shift='$_GET[shift]' ";	
}
?>
<table width="100%" border="0">
    <tr>
        <td align="center" colspan="5"><strong><font size="+5">LAPORAN HARIAN INSPECT DEPT QCF </font></strong></td>
    </tr>
    <tr>
        <td align="left" colspan="5">Tanggal : <?php echo date("j F Y", strtotime($_GET['awal']));?></td>
    </tr>
    <?php if($_GET['shift']!='ALL'){ ?>
    <tr>
        <td align="left" colspan="5">Shift : <?php echo $_GET['shift'];?></td>
    </tr>
    <?php } ?>
    <?php if($_GET['gshift']!='ALL'){ ?>
    <tr>
        <td align="left" colspan="5">Group Shift : <?php echo $_GET['gshift'];?></td> 
    </tr>
    <?php } ?>
    <tr>
        <!-- SHIFT A-->
        <td><table width="100%" border="1">
            <tr>
                <th colspan="2" align="left">Supervisor</th>
                <th colspan="4" align="center" bgcolor="#92D050">Sopian S</th>
            </tr>
            <?php 
            $sqlsa=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' and b.g_shift ='A' and (b.t_jawab='Leader 1' or b.t_jawab='Leader 2' or b.t_jawab='Leader 3')");
            $rowsa=mysqli_fetch_array($sqlsa);
			$sqlsaLpA=mysqli_query($con,"
			SELECT
				SUM(jml_roll) as roll,
				SUM(bruto) as bruto,
				SUM(netto) as netto,
				SUM(panjang) as panjang
			FROM
				tbl_lap_inspeksi
			WHERE
				tgl_update BETWEEN '$Awal' AND '$Akhir'
				AND `inspektor` = 'PACKING A'
				AND `dept`='PACKING' ");
            $rowsaLpA=mysqli_fetch_array($sqlsaLpA);
            ?>
            <tr>
                <th colspan="2" align="left">Akumulasi Inspeksi Shift A</th>
                <td align="center"><?php echo $rowsa['roll_sa']+$rowsaLpA['roll'];?></td>
                <td align="center"><?php echo $rowsa['bruto_sa']+$rowsaLpA['bruto'];?></td>
                <td align="center"><?php echo $rowsa['panjang_sa']+$rowsaLpA['panjang'];?></td>
                <th align="center">&nbsp;</th>
            </tr>
            <?php 
            $sqlsaL1=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' and b.t_jawab='Leader 1' and b.g_shift ='A' ");
            $rowsaL1=mysqli_fetch_array($sqlsaL1);
            ?>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <th colspan="2" align="left">Leader 1</th>
                <th colspan="4" align="center" bgcolor="#FFFF00">Purnomo</th>
            </tr>
            <tr>
                <th colspan="2" align="left">Akumulasi Hasil Inspeksi</th>
                <td align="center"><?php echo $rowsaL1['roll_sa'];?></td>
                <td align="center"><?php echo $rowsaL1['bruto_sa'];?></td>
                <td align="center"><?php echo $rowsaL1['panjang_sa'];?></td>
                <th align="center">&nbsp;</th>
            </tr>
			<tr>
                <th align="center">No MC</th>
                <th align="center">Inspector</th>
                <th align="center">Roll</th>
                <th align="center">Qty Bruto</th>
                <th align="center">Panjang</th>
                <th align="center">Keterangan</th>
            </tr>
			<?php
			$sqlsaL1=mysqli_query($con,"SELECT
            b.no_mesin,
			a.personil,
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' 
			AND b.t_jawab='Leader 1' and b.g_shift ='A'			
			group by a.personil
			order by b.no_mesin ASC");
			while($rsaL1=mysqli_fetch_array($sqlsaL1)){
			?>
            <tr>
              <td align="center" class="table-list1"><?php echo $rsaL1['no_mesin'];?></td>
              <td align="center" class="table-list1"><?php echo $rsaL1['personil'];?></td>
              <td align="center" class="table-list1"><?php echo $rsaL1['roll_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rsaL1['bruto_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rsaL1['panjang_sa'];?></td>
              <td align="center">&nbsp;</td>
            </tr>
			<?php } ?>
            <tr>
                <td align="right">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <?php 
            $sqlsaL2=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' and b.t_jawab='Leader 2' and b.g_shift ='A' ");
            $rowsaL2=mysqli_fetch_array($sqlsaL2);
            ?>
            <tr>
                <td colspan="2" align="left">Leader 2</td>
                <td colspan="4" align="center" bgcolor="#FFE699">Yusron</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $rowsaL2['roll_sa'];?></td>
                <td align="center"><?php echo $rowsaL2['bruto_sa'];?></td>
                <td align="center"><?php echo $rowsaL2['panjang_sa'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="center">No MC</td>
                <td align="center">Inspector</td>
                <td align="center">Roll</td>
                <td align="center">Qty Bruto</td>
                <td align="center">Panjang</td>
                <td align="center">Keterangan</td>
            </tr>
			<?php
			$sqlsaL3=mysqli_query($con,"SELECT
            b.no_mesin,
			a.personil,
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' 
			AND b.t_jawab='Leader 2' and b.g_shift ='A'			
			group by a.personil
			order by b.no_mesin ASC");
			while($rsaL3=mysqli_fetch_array($sqlsaL3)){
			?>
            <tr>
              <td align="center" class="table-list1"><?php echo $rsaL3['no_mesin'];?></td>
              <td align="center" class="table-list1"><?php echo $rsaL3['personil'];?></td>
              <td align="center" class="table-list1"><?php echo $rsaL3['roll_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rsaL3['bruto_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rsaL3['panjang_sa'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
			<?php } ?>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Leader 3</td>
                <td colspan="4" align="center" bgcolor="#B4C6E7">Handri</td>
            </tr>
            <?php 
            $sqlsaL3=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' and b.t_jawab='Leader 3' and b.g_shift ='A' ");
            $rowsaL3=mysqli_fetch_array($sqlsaL3);
            ?>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $rowsaL3['roll_sa'];?></td>
                <td align="center"><?php echo $rowsaL3['bruto_sa'];?></td>
                <td align="center"><?php echo $rowsaL3['panjang_sa'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="center">No MC</td>
                <td align="center">Inspector</td>
                <td align="center">Roll</td>
                <td align="center">Qty Bruto</td>
                <td align="center">Panjang</td>
                <td align="center">Keterangan</td>
            </tr>
			<?php
			$sqlsaL3=mysqli_query($con,"SELECT
            b.no_mesin,
			a.personil,
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' 
			AND b.t_jawab='Leader 3' and b.g_shift ='A'			
			group by a.personil
			order by b.no_mesin ASC");
			while($rsaL3=mysqli_fetch_array($sqlsaL3)){
			?>
            <tr>
              <td align="center" class="table-list1"><?php echo $rsaL3['no_mesin'];?></td>
              <td align="center" class="table-list1"><?php echo $rsaL3['personil'];?></td>
              <td align="center" class="table-list1"><?php echo $rsaL3['roll_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rsaL3['bruto_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rsaL3['panjang_sa'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
			<?php } ?>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Leader Packing</td>
                <td colspan="4" align="center" bgcolor="#B4C6E7">Andriana</td>
            </tr>
            <?php 
            $sqlsaLp=mysqli_query($con,"
SELECT
	SUM(jml_roll) as roll,
	SUM(bruto) as bruto,
	SUM(netto) as netto,
	SUM(panjang) as panjang
FROM
	tbl_lap_inspeksi
WHERE
	tgl_update BETWEEN '$Awal' AND '$Akhir'
	AND `inspektor` = 'PACKING A'
	AND `dept`='PACKING' ");
            $rowsaLp=mysqli_fetch_array($sqlsaLp);
            ?>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $rowsaLp['roll'];?></td>
                <td align="center"><?php echo $rowsaLp['bruto'];?></td>
                <td align="center"><?php echo $rowsaLp['panjang'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="center">No MC</td>
                <td align="center">Inspector</td>
                <td align="center">Roll</td>
                <td align="center">Qty Bruto</td>
                <td align="center">Panjang</td>
                <td align="center">Keterangan</td>
            </tr>
			<?php
			$sqlsaLp=mysqli_query($con," SELECT 
			operator,no_mc 
			FROM tbl_lap_inspeksi
            WHERE tgl_update BETWEEN '$Awal' AND '$Akhir'  
			AND `inspektor`='PACKING A' 
			AND `dept`='PACKING' 
			GROUP BY operator,no_mc ");
			while($rsaLp=mysqli_fetch_array($sqlsaLp)){
			//QTY KECIL
                    $qryKecil=mysqli_query($con,"SELECT SUM(jml_roll) as roll, SUM(bruto) AS bruto, SUM(netto) AS netto, SUM(panjang) AS panjang FROM tbl_lap_inspeksi
                    WHERE tgl_update BETWEEN '$Awal' AND '$Akhir' AND `inspektor`='PACKING A' AND `dept`='PACKING' AND operator='$rsaLp[operator]' AND no_mc='$rsaLp[no_mc]' AND ket_qty='Quantity Kecil'");
                    $rowKecil=mysqli_fetch_array($qryKecil);
                    //QTY BESAR
                    $qryBesar=mysqli_query($con,"SELECT SUM(jml_roll) as roll, SUM(bruto) AS bruto, SUM(netto) AS netto, SUM(panjang) AS panjang FROM tbl_lap_inspeksi
                    WHERE tgl_update BETWEEN '$Awal' AND '$Akhir' AND `inspektor`='PACKING A' AND `dept`='PACKING' AND operator='$rsaLp[operator]' AND no_mc='$rsaLp[no_mc]' AND ket_qty='Quantity Besar'");
                    $rowBesar=mysqli_fetch_array($qryBesar);
					$sqlop="SELECT x.LONGDESCRIPTION FROM DB2ADMIN.INITIALS x
							WHERE CODE ='".$rsaLp['operator']."'"; 
                    $stmt1=db2_exec($conn1,$sqlop, array('cursor'=>DB2_SCROLLABLE));
                    $rowop = db2_fetch_assoc($stmt1);	
			?>
            <tr>
              <td align="center" class="table-list1"><?php echo $rsaLp['no_mc'];?></td>
              <td align="center" class="table-list1"><?php echo $rowop['LONGDESCRIPTION'];?></td>
              <td align="center" class="table-list1"><?php echo $rowKecil['roll']+$rowBesar['roll'];?></td>
              <td align="center" class="table-list1"><?php echo $rowKecil['bruto']+$rowBesar['bruto'];?></td>
              <td align="center" class="table-list1"><?php echo $rowKecil['panjang']+$rowBesar['panjang'];?></td>
              <td align="center">&nbsp;</td>
            </tr>
			<?php } ?>
            <tr>
                <td align="right">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
            </tr>
        </table></td>
        <td>&nbsp;</td>
        <!-- SHIFT B-->
        <td><table width="100%" border="1">
            <tr>
                <th colspan="2" align="left">Supervisor</th>
                <th colspan="4" align="center" bgcolor="#92D050">Ali Mulhakim</th>
            </tr>
            <?php 
            $sqlsb=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' and b.g_shift ='B' and (b.t_jawab='Leader 1' or b.t_jawab='Leader 2' or b.t_jawab='Leader 3')");
            $rowsb=mysqli_fetch_array($sqlsb);
			$sqlsaLpB=mysqli_query($con,"
			SELECT
				SUM(jml_roll) as roll,
				SUM(bruto) as bruto,
				SUM(netto) as netto,
				SUM(panjang) as panjang
			FROM
				tbl_lap_inspeksi
			WHERE
				tgl_update BETWEEN '$Awal' AND '$Akhir'
				AND `inspektor` = 'PACKING B'
				AND `dept`='PACKING' ");
            $rowsaLpB=mysqli_fetch_array($sqlsaLpB);
            ?>
            <tr>
                <th colspan="2" align="left">Akumulasi Inspeksi Shift B</th>
                <td align="center"><?php echo $rowsb['roll_sa']+$rowsaLpB['roll'];?></td>
                <td align="center"><?php echo $rowsb['bruto_sa']+$rowsaLpB['bruto'];?></td>
                <td align="center"><?php echo $rowsb['panjang_sa']+$rowsaLpB['panjang'];?></td>
                <th align="center">&nbsp;</th>
            </tr>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <th colspan="2" align="left">Leader 1</th>
                <th colspan="4" align="center" bgcolor="#FFFF00">Yusuf</th>
            </tr>
            <?php 
            $sqlsbL1=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' and b.t_jawab='Leader 1' and b.g_shift ='B' ");
            $rowsbL1=mysqli_fetch_array($sqlsbL1);
            ?>
            <tr>
                <th colspan="2" align="left">Akumulasi Hasil Inspeksi</th>
                <td align="center"><?php echo $rowsbL1['roll_sa'];?></td>
                <td align="center"><?php echo $rowsbL1['bruto_sa'];?></td>
                <td align="center"><?php echo $rowsbL1['panjang_sa'];?></td>
                <th align="center">&nbsp;</th>
            </tr>
            <tr>
                <th align="center">No MC</th>
                <th align="center">Inspector</th>
                <th align="center">Roll</th>
                <th align="center">Qty Bruto</th>
                <th align="center">Panjang</th>
                <th align="center">Keterangan</th>
            </tr>
			<?php
			$sqlsbL1=mysqli_query($con,"SELECT
            b.no_mesin,
			a.personil,
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' 
			AND b.t_jawab='Leader 1' and b.g_shift ='B'
			group by a.personil
			order by b.no_mesin ASC");
			while($rsbL1=mysqli_fetch_array($sqlsbL1)){
			?>	
            <tr>
              <td align="center" class="table-list1"><?php echo $rsbL1['no_mesin'];?></td>
              <td align="center" class="table-list1"><?php echo $rsbL1['personil'];?></td>
              <td align="center" class="table-list1"><?php echo $rsbL1['roll_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rsbL1['bruto_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rsbL1['panjang_sa'];?></td>
              <td align="center">&nbsp;</td>
            </tr>
			<?php } ?>
            <tr>
                <td align="right">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <?php 
            $sqlsbL2=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' and b.t_jawab='Leader 2' and b.g_shift ='B' ");
            $rowsbL2=mysqli_fetch_array($sqlsbL2);
            ?>
            <tr>
                <td colspan="2" align="left">Leader 2</td>
                <td colspan="4" align="center" bgcolor="#FFE699">Nandar</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $rowsbL2['roll_sa'];?></td>
                <td align="center"><?php echo $rowsbL2['bruto_sa'];?></td>
                <td align="center"><?php echo $rowsbL2['panjang_sa'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="center">No MC</td>
                <td align="center">Inspector</td>
                <td align="center">Roll</td>
                <td align="center">Qty Bruto</td>
                <td align="center">Panjang</td>
                <td align="center">Keterangan</td>
            </tr>
			<?php
			$sqlsbL2=mysqli_query($con,"SELECT
            b.no_mesin,
			a.personil,
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' 
			AND b.t_jawab='Leader 2' and b.g_shift ='B'
			group by a.personil
			order by b.no_mesin ASC");
			while($rsbL2=mysqli_fetch_array($sqlsbL2)){
			?>
            <tr>
              <td align="center" class="table-list1"><?php echo $rsbL2['no_mesin'];?></td>
              <td align="center" class="table-list1"><?php echo $rsbL2['personil'];?></td>
              <td align="center" class="table-list1"><?php echo $rsbL2['roll_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rsbL2['bruto_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rsbL2['panjang_sa'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
			<?php } ?>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Leader 3</td>
                <td colspan="4" align="center" bgcolor="#B4C6E7">Dodi</td>
            </tr>
            <?php 
            $sqlsbL3=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' and b.t_jawab='Leader 3' and b.g_shift ='B' ");
            $rowsbL3=mysqli_fetch_array($sqlsbL3);
            ?>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $rowsbL3['roll_sa'];?></td>
                <td align="center"><?php echo $rowsbL3['bruto_sa'];?></td>
                <td align="center"><?php echo $rowsbL3['panjang_sa'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="center">No MC</td>
                <td align="center">Inspector</td>
                <td align="center">Roll</td>
                <td align="center">Qty Bruto</td>
                <td align="center">Panjang</td>
                <td align="center">Keterangan</td>
            </tr>
			<?php
			$sqlsbL3=mysqli_query($con,"SELECT
            b.no_mesin,
			a.personil,
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' 
			AND b.t_jawab='Leader 3' and b.g_shift ='B'
			group by a.personil
			order by b.no_mesin ASC");
			while($rsbL3=mysqli_fetch_array($sqlsbL3)){
			?>
            <tr>
              <td align="center" class="table-list1"><?php echo $rsbL3['no_mesin'];?></td>
              <td align="center" class="table-list1"><?php echo $rsbL3['personil'];?></td>
              <td align="center" class="table-list1"><?php echo $rsbL3['roll_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rsbL3['bruto_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rsbL3['panjang_sa'];?></td>
              <td align="center">&nbsp;</td>
            </tr>
			<?php } ?>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Leader Packing</td>
                <td colspan="4" align="center" bgcolor="#B4C6E7">Aris S</td>
            </tr>
            <?php 
            $sqlsbLp=mysqli_query($con,"
SELECT
	SUM(jml_roll) as roll,
	SUM(bruto) as bruto,
	SUM(netto) as netto,
	SUM(panjang) as panjang
FROM
	tbl_lap_inspeksi
WHERE
	tgl_update BETWEEN '$Awal' AND '$Akhir'
	AND `inspektor` = 'PACKING B'
	AND `dept`='PACKING' ");
            $rowsbLp=mysqli_fetch_array($sqlsbLp);
            ?>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $rowsbLp['roll'];?></td>
                <td align="center"><?php echo $rowsbLp['bruto'];?></td>
                <td align="center"><?php echo $rowsbLp['panjang'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="center">No MC</td>
                <td align="center">Inspector</td>
                <td align="center">Roll</td>
                <td align="center">Qty Bruto</td>
                <td align="center">Panjang</td>
                <td align="center">Keterangan</td>
            </tr>
			<?php
			$sqlsbLp=mysqli_query($con," SELECT 
			operator,no_mc 
			FROM tbl_lap_inspeksi
            WHERE tgl_update BETWEEN '$Awal' AND '$Akhir'  
			AND `inspektor`='PACKING B' 
			AND `dept`='PACKING' 
			GROUP BY operator,no_mc ");
			while($rsbLp=mysqli_fetch_array($sqlsbLp)){
			//QTY KECIL
                    $qryKecil=mysqli_query($con,"SELECT SUM(jml_roll) as roll, SUM(bruto) AS bruto, SUM(netto) AS netto, SUM(panjang) AS panjang FROM tbl_lap_inspeksi
                    WHERE tgl_update BETWEEN '$Awal' AND '$Akhir' AND `inspektor`='PACKING B' AND `dept`='PACKING' AND operator='$rsbLp[operator]' AND no_mc='$rsbLp[no_mc]' AND ket_qty='Quantity Kecil'");
                    $rowKecil=mysqli_fetch_array($qryKecil);
                    //QTY BESAR
                    $qryBesar=mysqli_query($con,"SELECT SUM(jml_roll) as roll, SUM(bruto) AS bruto, SUM(netto) AS netto, SUM(panjang) AS panjang FROM tbl_lap_inspeksi
                    WHERE tgl_update BETWEEN '$Awal' AND '$Akhir' AND `inspektor`='PACKING B' AND `dept`='PACKING' AND operator='$rsbLp[operator]' AND no_mc='$rsbLp[no_mc]' AND ket_qty='Quantity Besar'");
                    $rowBesar=mysqli_fetch_array($qryBesar);
					$sqlop="SELECT x.LONGDESCRIPTION FROM DB2ADMIN.INITIALS x
							WHERE CODE ='".$rsbLp['operator']."'"; 
                    $stmt1=db2_exec($conn1,$sqlop, array('cursor'=>DB2_SCROLLABLE));
                    $rowop = db2_fetch_assoc($stmt1);	
			?>
            <tr>
              <td align="center" class="table-list1"><?php echo $rsbLp['no_mc'];?></td>
              <td align="center" class="table-list1"><?php echo $rowop['LONGDESCRIPTION'];?></td>
              <td align="center" class="table-list1"><?php echo $rowKecil['roll']+$rowBesar['roll'];?></td>
              <td align="center" class="table-list1"><?php echo $rowKecil['bruto']+$rowBesar['bruto'];?></td>
              <td align="center" class="table-list1"><?php echo $rowKecil['panjang']+$rowBesar['panjang'];?></td>
              <td align="center">&nbsp;</td>
            </tr>
			<?php } ?>
            <tr>
                <td align="right">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
            </tr>
        </table></td>
        <td>&nbsp;</td>
        <!-- SHIFT C-->
        <td><table width="100%" border="1">
            <tr>
                <th colspan="2" align="left">Supervisor</th>
                <th colspan="4" align="center" bgcolor="#92D050">Heryanto</th>
            </tr>
            <?php 
            $sqlsc=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' and b.g_shift ='C' and (b.t_jawab='Leader 1' or b.t_jawab='Leader 2' or b.t_jawab='Leader 3')");
            $rowsc=mysqli_fetch_array($sqlsc);
			$sqlsaLpC=mysqli_query($con,"
			SELECT
				SUM(jml_roll) as roll,
				SUM(bruto) as bruto,
				SUM(netto) as netto,
				SUM(panjang) as panjang
			FROM
				tbl_lap_inspeksi
			WHERE
				tgl_update BETWEEN '$Awal' AND '$Akhir'
				AND `inspektor` = 'PACKING C'
				AND `dept`='PACKING' ");
            $rowsaLpC=mysqli_fetch_array($sqlsaLpC);
            ?>
            <tr>
                <th colspan="2" align="left">Akumulasi Inspeksi Shift C</th>
                <td align="center"><?php echo $rowsc['roll_sa']+$rowsaLpC['roll'];?></td>
                <td align="center"><?php echo $rowsc['bruto_sa']+$rowsaLpC['bruto'];?></td>
                <td align="center"><?php echo $rowsc['panjang_sa']+$rowsaLpC['panjang'];?></td>
                <th align="center">&nbsp;</th>
            </tr>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <th colspan="2" align="left">Leader 1</th>
                <th colspan="4" align="center" bgcolor="#FFFF00">Heru</th>
            </tr>
            <?php 
            $sqlscL1=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' and b.t_jawab='Leader 1' and b.g_shift ='C' ");
            $rowscL1=mysqli_fetch_array($sqlscL1);
            ?>
            <tr>
                <th colspan="2" align="left">Akumulasi Hasil Inspeksi</th>
                <td align="center"><?php echo $rowscL1['roll_sa'];?></td>
                <td align="center"><?php echo $rowscL1['bruto_sa'];?></td>
                <td align="center"><?php echo $rowscL1['panjang_sa'];?></td>
                <th align="center">&nbsp;</th>
            </tr>
            <tr>
                <th align="center">No MC</th>
                <th align="center">Inspector</th>
                <th align="center">Roll</th>
                <th align="center">Qty Bruto</th>
                <th align="center">Panjang</th>
                <th align="center">Keterangan</th>
            </tr>
            <?php
			$sqlscL1=mysqli_query($con,"SELECT
            b.no_mesin,
			a.personil,
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' 
			AND b.t_jawab='Leader 1' and b.g_shift ='C'
			group by a.personil
			order by b.no_mesin ASC");
			while($rscL1=mysqli_fetch_array($sqlscL1)){
			?>	
            <tr>
              <td align="center" class="table-list1"><?php echo $rscL1['no_mesin'];?></td>
              <td align="center" class="table-list1"><?php echo $rscL1['personil'];?></td>
              <td align="center" class="table-list1"><?php echo $rscL1['roll_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rscL1['bruto_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rscL1['panjang_sa'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
			<?php } ?>
            <tr>
                <td align="right">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Leader 2</td>
                <td colspan="4" align="center" bgcolor="#FFE699">A.Safei</td>
            </tr>
            <?php 
            $sqlscL2=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' and b.t_jawab='Leader 2' and b.g_shift ='C' ");
            $rowscL2=mysqli_fetch_array($sqlscL2);
            ?>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $rowscL2['roll_sa'];?></td>
                <td align="center"><?php echo $rowscL2['bruto_sa'];?></td>
                <td align="center"><?php echo $rowscL2['panjang_sa'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="center">No MC</td>
                <td align="center">Inspector</td>
                <td align="center">Roll</td>
                <td align="center">Qty Bruto</td>
                <td align="center">Panjang</td>
                <td align="center">Keterangan</td>
            </tr>
			<?php
			$sqlscL2=mysqli_query($con,"SELECT
            b.no_mesin,
			a.personil,
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' 
			AND b.t_jawab='Leader 2' and b.g_shift ='C'
			group by a.personil
			order by b.no_mesin ASC");
			while($rscL2=mysqli_fetch_array($sqlscL2)){
			?>	
            <tr>
              <td align="center" class="table-list1"><?php echo $rscL2['no_mesin'];?></td>
              <td align="center" class="table-list1"><?php echo $rscL2['personil'];?></td>
              <td align="center" class="table-list1"><?php echo $rscL2['roll_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rscL2['bruto_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rscL2['panjang_sa'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
			<?php } ?>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Leader 3</td>
                <td colspan="4" align="center" bgcolor="#B4C6E7">Junaedi</td>
            </tr>
            <?php 
            $sqlscL3=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' and b.t_jawab='Leader 3' and b.g_shift ='C' ");
            $rowscL3=mysqli_fetch_array($sqlscL3);
            ?>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $rowscL3['roll_sa'];?></td>
                <td align="center"><?php echo $rowscL3['bruto_sa'];?></td>
                <td align="center"><?php echo $rowscL3['panjang_sa'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="center">No MC</td>
                <td align="center">Inspector</td>
                <td align="center">Roll</td>
                <td align="center">Qty Bruto</td>
                <td align="center">Panjang</td>
                <td align="center">Keterangan</td>
            </tr>
			<?php
			$sqlscL3=mysqli_query($con,"SELECT
            b.no_mesin,
			a.personil,
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' 
			AND b.t_jawab='Leader 3' and b.g_shift ='C'
			group by a.personil
			order by b.no_mesin ASC");
			while($rscL3=mysqli_fetch_array($sqlscL3)){
			?>
            <tr>
              <td align="center" class="table-list1"><?php echo $rscL3['no_mesin'];?></td>
              <td align="center" class="table-list1"><?php echo $rscL3['personil'];?></td>
              <td align="center" class="table-list1"><?php echo $rscL3['roll_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rscL3['bruto_sa'];?></td>
              <td align="center" class="table-list1"><?php echo $rscL3['panjang_sa'];?></td>
              <td align="center">&nbsp;</td>
            </tr>
			<?php } ?>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Leader Packing</td>
                <td colspan="4" align="center" bgcolor="#B4C6E7">Kharis M</td>
            </tr>
            <?php 
            $sqlscLp=mysqli_query($con,"
SELECT
	SUM(jml_roll) as roll,
	SUM(bruto) as bruto,
	SUM(netto) as netto,
	SUM(panjang) as panjang
FROM
	tbl_lap_inspeksi
WHERE
	tgl_update BETWEEN '$Awal' AND '$Akhir'
	AND `inspektor` = 'PACKING C'
	AND `dept`='PACKING' ");
            $rowscLp=mysqli_fetch_array($sqlscLp);
            ?>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $rowscLp['roll'];?></td>
                <td align="center"><?php echo $rowscLp['bruto'];?></td>
                <td align="center"><?php echo $rowscLp['panjang'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="center">No MC</td>
                <td align="center">Inspector</td>
                <td align="center">Roll</td>
                <td align="center">Qty Bruto</td>
                <td align="center">Panjang</td>
                <td align="center">Keterangan</td>
            </tr>
			<?php
			$sqlscLp=mysqli_query($con," SELECT 
			operator,no_mc 
			FROM tbl_lap_inspeksi
            WHERE tgl_update BETWEEN '$Awal' AND '$Akhir'  
			AND `inspektor`='PACKING C' 
			AND `dept`='PACKING' 
			GROUP BY operator,no_mc ");
			while($rscLp=mysqli_fetch_array($sqlscLp)){
			//QTY KECIL
                    $qryKecil=mysqli_query($con,"SELECT SUM(jml_roll) as roll, SUM(bruto) AS bruto, SUM(netto) AS netto, SUM(panjang) AS panjang FROM tbl_lap_inspeksi
                    WHERE tgl_update BETWEEN '$Awal' AND '$Akhir' AND `inspektor`='PACKING C' AND `dept`='PACKING' AND operator='$rscLp[operator]' AND no_mc='$rscLp[no_mc]' AND ket_qty='Quantity Kecil'");
                    $rowKecil=mysqli_fetch_array($qryKecil);
                    //QTY BESAR
                    $qryBesar=mysqli_query($con,"SELECT SUM(jml_roll) as roll, SUM(bruto) AS bruto, SUM(netto) AS netto, SUM(panjang) AS panjang FROM tbl_lap_inspeksi
                    WHERE tgl_update BETWEEN '$Awal' AND '$Akhir' AND `inspektor`='PACKING C' AND `dept`='PACKING' AND operator='$rscLp[operator]' AND no_mc='$rscLp[no_mc]' AND ket_qty='Quantity Besar'");
                    $rowBesar=mysqli_fetch_array($qryBesar);
					$sqlop="SELECT x.LONGDESCRIPTION FROM DB2ADMIN.INITIALS x
							WHERE CODE ='".$rscLp['operator']."'"; 
                    $stmt1=db2_exec($conn1,$sqlop, array('cursor'=>DB2_SCROLLABLE));
                    $rowop = db2_fetch_assoc($stmt1);	
			?>
            <tr>
              <td align="center" class="table-list1"><?php echo $rscLp['no_mc'];?></td>
              <td align="center" class="table-list1"><?php echo $rowop['LONGDESCRIPTION'];?></td>
              <td align="center" class="table-list1"><?php echo $rowKecil['roll']+$rowBesar['roll'];?></td>
              <td align="center" class="table-list1"><?php echo $rowKecil['bruto']+$rowBesar['bruto'];?></td>
              <td align="center" class="table-list1"><?php echo $rowKecil['panjang']+$rowBesar['panjang'];?></td>
              <td align="center">&nbsp;</td>
            </tr>
			<?php } ?>
            <tr>
                <td align="right">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">&nbsp;</td>
                <td align="left">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
                <td align="center">&nbsp;</td>
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
