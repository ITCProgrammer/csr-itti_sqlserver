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
            if($_GET['gshift']=="ALL"){		
                $WGshiftA=" AND b.g_shift='A' ";	
            }else{	
                $WGshiftA=" AND b.g_shift='A' ";	
            }
            $sqlsa=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_sa,
            sum( a.qty ) AS bruto_sa,
            sum( a.yard ) AS panjang_sa
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift ");
            $rowsa=mysqli_fetch_array($sqlsa);
            ?>
            <tr>
                <th colspan="2" align="left">Akumulasi Inspeksi Shift A</th>
                <th align="center"><?php echo $rowsa['roll_sa'];?></th>
                <th align="center"><?php echo $rowsa['bruto_sa'];?></th>
                <th align="center"><?php echo $rowsa['panjang_sa'];?></th>
                <th align="center">&nbsp;</th>
            </tr>
            <?php 
            //12 A
            $sql12a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_12a,
            sum( a.qty ) AS bruto_12a,
            sum( a.yard ) AS panjang_12a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='12' and a.personil='eva'");
            $row12a=mysqli_fetch_array($sql12a);
            //13 A
            $sql13a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_13a,
            sum( a.qty ) AS bruto_13a,
            sum( a.yard ) AS panjang_13a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='13' and a.personil='Wiwin Widya Ningsih'");
            $row13a=mysqli_fetch_array($sql13a);
            //14 A
            $sql14a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_14a,
            sum( a.qty ) AS bruto_14a,
            sum( a.yard ) AS panjang_14a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='14' and a.personil='Eprian Sigit'");
            $row14a=mysqli_fetch_array($sql14a);
            //19 A
            $sql19a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_19a,
            sum( a.qty ) AS bruto_19a,
            sum( a.yard ) AS panjang_19a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='19' and a.personil='Arista W'");
            $row19a=mysqli_fetch_array($sql19a);
            //20 A
            $sql20a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_20a,
            sum( a.qty ) AS bruto_20a,
            sum( a.yard ) AS panjang_20a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='20' and a.personil='Aditia Nugroho'");
            $row20a=mysqli_fetch_array($sql20a);
            //21 A
            $sql21a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_21a,
            sum( a.qty ) AS bruto_21a,
            sum( a.yard ) AS panjang_21a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='21' and a.personil='Anang Kustiana'");
            $row21a=mysqli_fetch_array($sql21a);
            //22 A
            $sql22a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_22a,
            sum( a.qty ) AS bruto_22a,
            sum( a.yard ) AS panjang_22a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='22' and a.personil='Agus Suparman'");
            $row22a=mysqli_fetch_array($sql22a);
            //Qty Asst. SPV
            $t_roll_asa=$row12a['roll_12a']+$row13a['roll_13a']+$row14a['roll_14a']+$row19a['roll_19a']+$row20a['roll_20a']+$row21a['roll_21a']+$row22a['roll_22a'];
            $t_bruto_asa=$row12a['bruto_12a']+$row13a['bruto_13a']+$row14a['bruto_14a']+$row19a['bruto_19a']+$row20a['bruto_20a']+$row21a['bruto_21a']+$row22a['bruto_22a'];
            $t_panjang_asa=$row12a['panjang_12a']+$row13a['panjang_13a']+$row14a['panjang_14a']+$row19a['panjang_19a']+$row20a['panjang_20a']+$row21a['panjang_21a']+$row22a['panjang_22a'];
            ?>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <th colspan="2" align="left">Asst. Supervisor</th>
                <th colspan="4" align="center" bgcolor="#FFFF00">Yusuf DK</th>
            </tr>
            <tr>
                <th colspan="2" align="left">Akumulasi Hasil Inspeksi</th>
                <th align="center"><?php echo $t_roll_asa;?></th>
                <th align="center"><?php echo $t_bruto_asa;?></th>
                <th align="center"><?php echo $t_panjang_asa;?></th>
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
            <tr>
                <td align="right">12</td>
                <td align="left">Eva</td>
                <td align="center"><?php echo $row12a['roll_12a'];?></td>
                <td align="center"><?php echo $row12a['bruto_12a'];?></td>
                <td align="center"><?php echo $row12a['panjang_12a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">13</td>
                <td align="left">Wiwin</td>
                <td align="center"><?php echo $row13a['roll_13a'];?></td>
                <td align="center"><?php echo $row13a['bruto_13a'];?></td>
                <td align="center"><?php echo $row13a['panjang_13a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">14</td>
                <td align="left">Sigit</td>
                <td align="center"><?php echo $row14a['roll_14a'];?></td>
                <td align="center"><?php echo $row14a['bruto_14a'];?></td>
                <td align="center"><?php echo $row14a['panjang_14a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">19</td>
                <td align="left">Arista</td>
                <td align="center"><?php echo $row19a['roll_19a'];?></td>
                <td align="center"><?php echo $row19a['bruto_19a'];?></td>
                <td align="center"><?php echo $row19a['panjang_19a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">20</td>
                <td align="left">Aditia</td>
                <td align="center"><?php echo $row20a['roll_20a'];?></td>
                <td align="center"><?php echo $row20a['bruto_20a'];?></td>
                <td align="center"><?php echo $row20a['panjang_20a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">21</td>
                <td align="left">Anang K</td>
                <td align="center"><?php echo $row21a['roll_21a'];?></td>
                <td align="center"><?php echo $row21a['bruto_21a'];?></td>
                <td align="center"><?php echo $row21a['panjang_21a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">22</td>
                <td align="left">Agus S</td>
                <td align="center"><?php echo $row22a['roll_22a'];?></td>
                <td align="center"><?php echo $row22a['bruto_22a'];?></td>
                <td align="center"><?php echo $row22a['panjang_22a'];?></td>
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
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <?php 
            //5 A
            $sql5a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_5a,
            sum( a.qty ) AS bruto_5a,
            sum( a.yard ) AS panjang_5a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='05' and a.personil='Dimas body Prakoso'");
            $row5a=mysqli_fetch_array($sql5a);
            //6 A
            $sql6a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_6a,
            sum( a.qty ) AS bruto_6a,
            sum( a.yard ) AS panjang_6a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='06' and a.personil='Handri'");
            $row6a=mysqli_fetch_array($sql6a);
            //7 A
            $sql7a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_7a,
            sum( a.qty ) AS bruto_7a,
            sum( a.yard ) AS panjang_7a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='07' and a.personil='Nur Rohman'");
            $row7a=mysqli_fetch_array($sql7a);
            //8 A
            $sql8a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_8a,
            sum( a.qty ) AS bruto_8a,
            sum( a.yard ) AS panjang_8a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='08' and a.personil='Ika'");
            $row8a=mysqli_fetch_array($sql8a);
            //9 A
            $sql9a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_9a,
            sum( a.qty ) AS bruto_9a,
            sum( a.yard ) AS panjang_9a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='09' and a.personil='Fitri Fauziyah'");
            $row9a=mysqli_fetch_array($sql9a);
            //10 A
            $sql10a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_10a,
            sum( a.qty ) AS bruto_10a,
            sum( a.yard ) AS panjang_10a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='10' and a.personil='Wildan Nur Fathudin'");
            $row10a=mysqli_fetch_array($sql10a);
            //11 A
            $sql11a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_11a,
            sum( a.qty ) AS bruto_11a,
            sum( a.yard ) AS panjang_11a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='11' and a.personil='Muhammad Soleh'");
            $row11a=mysqli_fetch_array($sql11a);
            //Qty Asst. SPV
            $t_roll_asa2=$row5a['roll_5a']+$row6a['roll_6a']+$row7a['roll_7a']+$row8a['roll_8a']+$row9a['roll_9a']+$row10a['roll_10a']+$row11a['roll_11a'];
            $t_bruto_asa2=$row5a['bruto_5a']+$row6a['bruto_6a']+$row7a['bruto_7a']+$row8a['bruto_8a']+$row9a['bruto_9a']+$row10a['bruto_10a']+$row11a['bruto_11a'];
            $t_panjang_asa2=$row5a['panjang_5a']+$row6a['panjang_6a']+$row7a['panjang_7a']+$row8a['panjang_8a']+$row9a['panjang_9a']+$row10a['panjang_10a']+$row11a['panjang_11a'];
            ?>
            <tr>
                <td colspan="2" align="left">Leader</td>
                <td colspan="4" align="center" bgcolor="#FFE699">Yusron</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $t_roll_asa2;?></td>
                <td align="center"><?php echo $t_bruto_asa2;?></td>
                <td align="center"><?php echo $t_panjang_asa2;?></td>
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
            <tr>
                <td align="right">5</td>
                <td align="left">Dimas Body</td>
                <td align="center"><?php echo $row5a['roll_5a'];?></td>
                <td align="center"><?php echo $row5a['bruto_5a'];?></td>
                <td align="center"><?php echo $row5a['panjang_5a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">6</td>
                <td align="left">Handri</td>
                <td align="center"><?php echo $row6a['roll_6a'];?></td>
                <td align="center"><?php echo $row6a['bruto_6a'];?></td>
                <td align="center"><?php echo $row6a['panjang_6a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">7</td>
                <td align="left">Nurohman</td>
                <td align="center"><?php echo $row7a['roll_7a'];?></td>
                <td align="center"><?php echo $row7a['bruto_7a'];?></td>
                <td align="center"><?php echo $row7a['panjang_7a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">8</td>
                <td align="left">Ika</td>
                <td align="center"><?php echo $row8a['roll_8a'];?></td>
                <td align="center"><?php echo $row8a['bruto_8a'];?></td>
                <td align="center"><?php echo $row8a['panjang_8a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">9</td>
                <td align="left">Fitri Fauziah</td>
                <td align="center"><?php echo $row9a['roll_9a'];?></td>
                <td align="center"><?php echo $row9a['bruto_9a'];?></td>
                <td align="center"><?php echo $row9a['panjang_9a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">10</td>
                <td align="left">Wildan</td>
                <td align="center"><?php echo $row10a['roll_10a'];?></td>
                <td align="center"><?php echo $row10a['bruto_10a'];?></td>
                <td align="center"><?php echo $row10a['panjang_10a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">11</td>
                <td align="left">M. Sholeh</td>
                <td align="center"><?php echo $row11a['roll_11a'];?></td>
                <td align="center"><?php echo $row11a['bruto_11a'];?></td>
                <td align="center"><?php echo $row11a['panjang_11a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Leader</td>
                <td colspan="4" align="center" bgcolor="#B4C6E7">M. Tegar</td>
            </tr>
            <?php 
            //2 A
            $sql2a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_2a,
            sum( a.qty ) AS bruto_2a,
            sum( a.yard ) AS panjang_2a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='02' and a.personil='Alan Susandi'");
            $row2a=mysqli_fetch_array($sql2a);
            //3 A
            $sql3a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_3a,
            sum( a.qty ) AS bruto_3a,
            sum( a.yard ) AS panjang_3a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='03' and a.personil='Asraf'");
            $row3a=mysqli_fetch_array($sql3a);
            //4 A
            $sql4a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_4a,
            sum( a.qty ) AS bruto_4a,
            sum( a.yard ) AS panjang_4a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='04' and a.personil='David'");
            $row4a=mysqli_fetch_array($sql4a);
            //15 A
            $sql15a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_15a,
            sum( a.qty ) AS bruto_15a,
            sum( a.yard ) AS panjang_15a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='15' and a.personil='Muhamad Septian'");
            $row15a=mysqli_fetch_array($sql15a);
            //16 A
            $sql16a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_16a,
            sum( a.qty ) AS bruto_16a,
            sum( a.yard ) AS panjang_16a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='16' and a.personil='Nahya Septi Wiharti'");
            $row16a=mysqli_fetch_array($sql16a);
            //17 A
            $sql17a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_17a,
            sum( a.qty ) AS bruto_17a,
            sum( a.yard ) AS panjang_17a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='17' and a.personil='Armando'");
            $row17a=mysqli_fetch_array($sql17a);
            //18 A
            $sql18a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_18a,
            sum( a.qty ) AS bruto_18a,
            sum( a.yard ) AS panjang_18a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='18' and a.personil='Ashari'");
            $row18a=mysqli_fetch_array($sql18a);
            //22 A
            //$sql22a=mysqli_query($con,"SELECT
            //sum( a.jml_rol) as roll_22a,
            //sum( a.qty ) AS bruto_22a,
            //sum( a.yard ) AS panjang_22a
            //from db_qc.tbl_inspection a left join 
            //db_qc.tbl_schedule b on a.id_schedule = b.id
            //where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            //AND '$stop_date' and a.`status`='selesai' and b.g_shift ='A' and b.no_mesin='22' and a.personil='Deo'");
            //$row22a=mysqli_fetch_array($sql22a);
            //23 A
            //$sql23a=mysqli_query($con,"SELECT
            //sum( a.jml_rol) as roll_23a,
            //sum( a.qty ) AS bruto_23a,
            //sum( a.yard ) AS panjang_23a
            //from db_qc.tbl_inspection a left join 
            //db_qc.tbl_schedule b on a.id_schedule = b.id
            //where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            //AND '$stop_date' and a.`status`='selesai' and b.g_shift ='A' and b.no_mesin='23' and a.personil='Heni'");
            //$row23a=mysqli_fetch_array($sql23a);
            //24 A
            // $sql24a=mysqli_query($con,"SELECT
            // sum( a.jml_rol) as roll_24a,
            // sum( a.qty ) AS bruto_24a,
            // sum( a.yard ) AS panjang_24a
            // from db_qc.tbl_inspection a left join 
            // db_qc.tbl_schedule b on a.id_schedule = b.id
            // where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            // AND '$stop_date' and a.`status`='selesai' and b.g_shift ='A' and b.no_mesin='24' and a.personil='Rofik'");
            // $row24=mysqli_fetch_array($sql24a);
            //25 A
            // $sql25a=mysqli_query($con,"SELECT
            // sum( a.jml_rol) as roll_25a,
            // sum( a.qty ) AS bruto_25a,
            // sum( a.yard ) AS panjang_25a
            // from db_qc.tbl_inspection a left join 
            // db_qc.tbl_schedule b on a.id_schedule = b.id
            // where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            // AND '$stop_date' and a.`status`='selesai' and b.g_shift ='A' and b.no_mesin='25' and a.personil='Fitri Fauziah'");
            // $row25a=mysqli_fetch_array($sql25a);
            //Qty Asst. SPV
            $t_roll_asa3=$row15a['roll_15a'];
            $t_bruto_asa3=$row15a['bruto_15a'];
            $t_panjang_asa3=$row15a['panjang_15a'];
            ?>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $t_roll_asa3;?></td>
                <td align="center"><?php echo $t_bruto_asa3;?></td>
                <td align="center"><?php echo $t_panjang_asa3;?></td>
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
            <tr>
                <td align="right">2</td>
                <td align="left">Alan Susandi</td>
                <td align="center"><?php echo $row2a['roll_2a'];?></td>
                <td align="center"><?php echo $row2a['bruto_2a'];?></td>
                <td align="center"><?php echo $row2a['panjang_2a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">3</td>
                <td align="left">Asraf</td>
                <td align="center"><?php echo $row3a['roll_3a'];?></td>
                <td align="center"><?php echo $row3a['bruto_3a'];?></td>
                <td align="center"><?php echo $row3a['panjang_3a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">4</td>
                <td align="left">David</td>
                <td align="center"><?php echo $row4a['roll_4a'];?></td>
                <td align="center"><?php echo $row4a['bruto_4a'];?></td>
                <td align="center"><?php echo $row4a['panjang_4a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">15</td>
                <td align="left">Septian</td>
                <td align="center"><?php echo $row15a['roll_15a'];?></td>
                <td align="center"><?php echo $row15a['bruto_15a'];?></td>
                <td align="center"><?php echo $row15a['panjang_15a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">16</td>
                <td align="left">Nahya</td>
                <td align="center"><?php echo $row16a['roll_16a'];?></td>
                <td align="center"><?php echo $row16a['bruto_16a'];?></td>
                <td align="center"><?php echo $row16a['panjang_16a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">17</td>
                <td align="left">Armando</td>
                <td align="center"><?php echo $row17a['roll_17a'];?></td>
                <td align="center"><?php echo $row17a['bruto_17a'];?></td>
                <td align="center"><?php echo $row17a['panjang_17a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">18</td>
                <td align="left">Ashari</td>
                <td align="center"><?php echo $row18a['roll_18a'];?></td>
                <td align="center"><?php echo $row18a['bruto_18a'];?></td>
                <td align="center"><?php echo $row18a['panjang_18a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Leader</td>
                <td colspan="4" align="center" bgcolor="#B4C6E7">Andriana</td>
            </tr>
            <?php 
            //23 A
            $sql23a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_23a,
            sum( a.qty ) AS bruto_23a,
            sum( a.yard ) AS panjang_23a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='23' and a.personil='sulis'");
            $row23a=mysqli_fetch_array($sql23a);
            //24 A
            $sql24a=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_24a,
            sum( a.qty ) AS bruto_24a,
            sum( a.yard ) AS panjang_24a
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftA $Wshift and b.no_mesin='24' and a.personil='Deo'");
            $row24a=mysqli_fetch_array($sql24a);
            //23 A
            //$sql23a=mysqli_query($con,"SELECT
            //sum( a.jml_rol) as roll_23a,
            //sum( a.qty ) AS bruto_23a,
            //sum( a.yard ) AS panjang_23a
            //from db_qc.tbl_inspection a left join 
            //db_qc.tbl_schedule b on a.id_schedule = b.id
            //where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            //AND '$stop_date' and a.`status`='selesai' and b.g_shift ='A' and b.no_mesin='23' and a.personil='Heni'");
            //$row23a=mysqli_fetch_array($sql23a);
            //24 A
            // $sql24a=mysqli_query($con,"SELECT
            // sum( a.jml_rol) as roll_24a,
            // sum( a.qty ) AS bruto_24a,
            // sum( a.yard ) AS panjang_24a
            // from db_qc.tbl_inspection a left join 
            // db_qc.tbl_schedule b on a.id_schedule = b.id
            // where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            // AND '$stop_date' and a.`status`='selesai' and b.g_shift ='A' and b.no_mesin='24' and a.personil='Rofik'");
            // $row24=mysqli_fetch_array($sql24a);
            //25 A
            // $sql25a=mysqli_query($con,"SELECT
            // sum( a.jml_rol) as roll_25a,
            // sum( a.qty ) AS bruto_25a,
            // sum( a.yard ) AS panjang_25a
            // from db_qc.tbl_inspection a left join 
            // db_qc.tbl_schedule b on a.id_schedule = b.id
            // where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            // AND '$stop_date' and a.`status`='selesai' and b.g_shift ='A' and b.no_mesin='25' and a.personil='Fitri Fauziah'");
            // $row25a=mysqli_fetch_array($sql25a);
            //Qty Asst. SPV
            $t_roll_asa4=$row23a['roll_23a']+$row24a['roll_24a'];
            $t_bruto_asa4=$row23a['bruto_23a']+$row24a['bruto_24a'];
            $t_panjang_asa4=$row23a['panjang_23a']+$row24a['panjang_24a'];
            ?>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $t_roll_asa4;?></td>
                <td align="center"><?php echo $t_bruto_asa4;?></td>
                <td align="center"><?php echo $t_panjang_asa4;?></td>
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
            <tr>
                <td align="right">23</td>
                <td align="left">Sulis</td>
                <td align="center"><?php echo $row23a['roll_23a'];?></td>
                <td align="center"><?php echo $row23a['bruto_23a'];?></td>
                <td align="center"><?php echo $row23a['panjang_23a'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">24</td>
                <td align="left">Deo</td>
                <td align="center"><?php echo $row24a['roll_24a'];?></td>
                <td align="center"><?php echo $row24a['bruto_24a'];?></td>
                <td align="center"><?php echo $row24a['panjang_24a'];?></td>
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
            if($_GET['gshift']=="ALL"){		
                $WGshiftB=" AND b.g_shift='B' ";
            }else{	
                $WGshiftB=" AND b.g_shift='B' ";
            }
            $sqlsb=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_sb,
            sum( a.qty ) AS bruto_sb,
            sum( a.yard ) AS panjang_sb
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift ");
            $rowsb=mysqli_fetch_array($sqlsb);
            ?>
            <tr>
                <th colspan="2" align="left">Akumulasi Inspeksi Shift B</th>
                <th align="center"><?php echo $rowsb['roll_sb'];?></th>
                <th align="center"><?php echo $rowsb['bruto_sb'];?></th>
                <th align="center"><?php echo $rowsb['panjang_sb'];?></th>
                <th align="center">&nbsp;</th>
            </tr>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <th colspan="2" align="left">Asst. Supervisor</th>
                <th colspan="4" align="center" bgcolor="#FFFF00">Heru H</th>
            </tr>
            <?php 
            //12 B
            $sql12b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_12b,
            sum( a.qty ) AS bruto_12b,
            sum( a.yard ) AS panjang_12b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='12' and a.personil='Annajatul'");
            $row12b=mysqli_fetch_array($sql12b);
            //13 B
            $sql13b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_13b,
            sum( a.qty ) AS bruto_13b,
            sum( a.yard ) AS panjang_13b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='13' and a.personil='Afriliana'");
            $row13b=mysqli_fetch_array($sql13b);
            //14 B
            $sql14b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_14b,
            sum( a.qty ) AS bruto_14b,
            sum( a.yard ) AS panjang_14b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='14' and a.personil='Majid'");
            $row14b=mysqli_fetch_array($sql14b);
            //19 B
            $sql19b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_19b,
            sum( a.qty ) AS bruto_19b,
            sum( a.yard ) AS panjang_19b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='19' and a.personil='Rizal Nurhali'");
            $row19b=mysqli_fetch_array($sql19b);
            //20 B
            $sql20b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_20b,
            sum( a.qty ) AS bruto_20b,
            sum( a.yard ) AS panjang_20b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='20' and a.personil='Firmansyah'");
            $row20b=mysqli_fetch_array($sql20b);
            //21 B
            $sql21b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_21b,
            sum( a.qty ) AS bruto_21b,
            sum( a.yard ) AS panjang_21b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='21' and a.personil='Abdul Muhi'");
            $row21b=mysqli_fetch_array($sql21b);
            //22 B
            $sql22b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_22b,
            sum( a.qty ) AS bruto_22b,
            sum( a.yard ) AS panjang_22b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='22' and a.personil='Nur Ali'");
            $row22b=mysqli_fetch_array($sql22b);
            //Qty Asst. SPV
            $t_roll_asb=$row12b['roll_12b']+$row13b['roll_13b']+$row14b['roll_14b']+$row19b['roll_19b']+$row20b['roll_20b']+$row21b['roll_21b']+$row22b['roll_22b'];
            $t_bruto_asb=$row12b['bruto_12b']+$row13b['bruto_13b']+$row14b['bruto_14b']+$row19b['bruto_19b']+$row20b['bruto_20b']+$row21b['bruto_21b']+$row22b['bruto_22b'];
            $t_panjang_asb=$row12b['panjang_12b']+$row13b['panjang_13b']+$row14b['panjang_14b']+$row19b['panjang_19b']+$row20b['panjang_20b']+$row21b['panjang_21b']+$row22b['panjang_22b'];
            ?>
            <tr>
                <th colspan="2" align="left">Akumulasi Hasil Inspeksi</th>
                <th align="center"><?php echo $t_roll_asb;?></th>
                <th align="center"><?php echo $t_bruto_asb;?></th>
                <th align="center"><?php echo $t_panjang_asb;?></th>
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
            <tr>
                <td align="right">12</td>
                <td align="left">Annajatul</td>
                <td align="center"><?php echo $row12b['roll_12b'];?></td>
                <td align="center"><?php echo $row12b['bruto_12b'];?></td>
                <td align="center"><?php echo $row12b['panjang_12b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">13</td>
                <td align="left">Afriliana</td>
                <td align="center"><?php echo $row13b['roll_13b'];?></td>
                <td align="center"><?php echo $row13b['bruto_13b'];?></td>
                <td align="center"><?php echo $row13b['panjang_13b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">14</td>
                <td align="left">Majid</td>
                <td align="center"><?php echo $row14b['roll_14b'];?></td>
                <td align="center"><?php echo $row14b['bruto_14b'];?></td>
                <td align="center"><?php echo $row14b['panjang_14b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">19</td>
                <td align="left">Rizal Nurhali</td>
                <td align="center"><?php echo $row19b['roll_19b'];?></td>
                <td align="center"><?php echo $row19b['bruto_19b'];?></td>
                <td align="center"><?php echo $row19b['panjang_19b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">20</td>
                <td align="left">Firmansyah</td>
                <td align="center"><?php echo $row20b['roll_20b'];?></td>
                <td align="center"><?php echo $row20b['bruto_20b'];?></td>
                <td align="center"><?php echo $row20b['panjang_20b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">21</td>
                <td align="left">Abdul Muhi</td>
                <td align="center"><?php echo $row21b['roll_21b'];?></td>
                <td align="center"><?php echo $row21b['bruto_21b'];?></td>
                <td align="center"><?php echo $row21b['panjang_21b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">22</td>
                <td align="left">Nur Ali</td>
                <td align="center"><?php echo $row22b['roll_22b'];?></td>
                <td align="center"><?php echo $row22b['bruto_22b'];?></td>
                <td align="center"><?php echo $row22b['panjang_22b'];?></td>
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
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <?php 
            //5 B
            $sql5b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_5b,
            sum( a.qty ) AS bruto_5b,
            sum( a.yard ) AS panjang_5b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='05' and a.personil='Rifky Baihaqi'");
            $row5b=mysqli_fetch_array($sql5b);
            //6 B
            $sql6b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_6b,
            sum( a.qty ) AS bruto_6b,
            sum( a.yard ) AS panjang_6b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='06' and a.personil='M. Zaenal Arifin'");
            $row6b=mysqli_fetch_array($sql6b);
            //7 B
            $sql7b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_7b,
            sum( a.qty ) AS bruto_7b,
            sum( a.yard ) AS panjang_7b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='07' and a.personil='Yosep'");
            $row7b=mysqli_fetch_array($sql7b);
            //8 B
            $sql8b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_8b,
            sum( a.qty ) AS bruto_8b,
            sum( a.yard ) AS panjang_8b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='08' and a.personil='Sri Rejeki'");
            $row8b=mysqli_fetch_array($sql8b);
            //9 B
            $sql9b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_9b,
            sum( a.qty ) AS bruto_9b,
            sum( a.yard ) AS panjang_9b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='09' and a.personil='Rasyid'");
            $row9b=mysqli_fetch_array($sql9b);
            //10 B
            $sql10b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_10b,
            sum( a.qty ) AS bruto_10b,
            sum( a.yard ) AS panjang_10b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='10' and a.personil='Lisa'");
            $row10b=mysqli_fetch_array($sql10b);
            //11 B
            $sql11b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_11b,
            sum( a.qty ) AS bruto_11b,
            sum( a.yard ) AS panjang_11b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='11' and a.personil='Fahrozi'");
            $row11b=mysqli_fetch_array($sql11b);
            //Qty Asst. SPV
            $t_roll_asb2=$row5b['roll_5b']+$row6b['roll_6b']+$row7b['roll_7b']+$row8b['roll_8b']+$row9b['roll_9b']+$row10b['roll_10b']+$row11b['roll_11b'];
            $t_bruto_asb2=$row5b['bruto_5b']+$row6b['bruto_6b']+$row7b['bruto_7b']+$row8b['bruto_8b']+$row9b['bruto_9b']+$row10b['bruto_10b']+$row11b['bruto_11b'];
            $t_panjang_asb2=$row5b['panjang_5b']+$row6b['panjang_6b']+$row7b['panjang_7b']+$row8b['panjang_8b']+$row9b['panjang_9b']+$row10b['panjang_10b']+$row11b['panjang_11b'];
            ?>
            <tr>
                <td colspan="2" align="left">Leader</td>
                <td colspan="4" align="center" bgcolor="#FFE699">Nandar</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $t_roll_asb2;?></td>
                <td align="center"><?php echo $t_bruto_asb2;?></td>
                <td align="center"><?php echo $t_panjang_asb2;?></td>
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
            <tr>
                <td align="right">5</td>
                <td align="left">Rifky Baihaqi</td>
                <td align="center"><?php echo $row5b['roll_5b'];?></td>
                <td align="center"><?php echo $row5b['bruto_5b'];?></td>
                <td align="center"><?php echo $row5b['panjang_5b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">6</td>
                <td align="left">Zainal Ipin</td>
                <td align="center"><?php echo $row6b['roll_6b'];?></td>
                <td align="center"><?php echo $row6b['bruto_6b'];?></td>
                <td align="center"><?php echo $row6b['panjang_6b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">7</td>
                <td align="left">Yosep</td>
                <td align="center"><?php echo $row7b['roll_7b'];?></td>
                <td align="center"><?php echo $row7b['bruto_7b'];?></td>
                <td align="center"><?php echo $row7b['panjang_7b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">8</td>
                <td align="left">Sri Rejeki</td>
                <td align="center"><?php echo $row8b['roll_8b'];?></td>
                <td align="center"><?php echo $row8b['bruto_8b'];?></td>
                <td align="center"><?php echo $row8b['panjang_8b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">9</td>
                <td align="left">Rasyid</td>
                <td align="center"><?php echo $row9b['roll_9b'];?></td>
                <td align="center"><?php echo $row9b['bruto_9b'];?></td>
                <td align="center"><?php echo $row9b['panjang_9b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">10</td>
                <td align="left">Lisa</td>
                <td align="center"><?php echo $row10b['roll_10b'];?></td>
                <td align="center"><?php echo $row10b['bruto_10b'];?></td>
                <td align="center"><?php echo $row10b['panjang_10b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>    
                <td align="right">11</td>
                <td align="left">Fahrozi</td>
                <td align="center"><?php echo $row11b['roll_11b'];?></td>
                <td align="center"><?php echo $row11b['bruto_11b'];?></td>
                <td align="center"><?php echo $row11b['panjang_11b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Leader</td>
                <td colspan="4" align="center" bgcolor="#B4C6E7">Junaedi</td>
            </tr>
            <?php 
            //2 B
            $sql2b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_2b,
            sum( a.qty ) AS bruto_2b,
            sum( a.yard ) AS panjang_2b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='02' and a.personil='Ilham'");
            $row2b=mysqli_fetch_array($sql2b);
            //3 B
            $sql3b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_3b,
            sum( a.qty ) AS bruto_3b,
            sum( a.yard ) AS panjang_3b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='03' and a.personil='Gian Ihsan'");
            $row3b=mysqli_fetch_array($sql3b);
            //4 B
            $sql4b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_4b,
            sum( a.qty ) AS bruto_4b,
            sum( a.yard ) AS panjang_4b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='04' and a.personil='Paradito'");
            $row4b=mysqli_fetch_array($sql4b);
            //15 B
            $sql15b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_15b,
            sum( a.qty ) AS bruto_15b,
            sum( a.yard ) AS panjang_15b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='15' and a.personil='Ilham Faris'");
            $row15b=mysqli_fetch_array($sql15b);
            //16 B
            $sql16b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_16b,
            sum( a.qty ) AS bruto_16b,
            sum( a.yard ) AS panjang_16b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='16' and a.personil='Cindo'");
            $row16b=mysqli_fetch_array($sql16b);
            //17 B
            $sql17b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_17b,
            sum( a.qty ) AS bruto_17b,
            sum( a.yard ) AS panjang_17b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='17' and a.personil='Muhammad Gifani'");
            $row17b=mysqli_fetch_array($sql17b);
            //18 B
            $sql18b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_18b,
            sum( a.qty ) AS bruto_18b,
            sum( a.yard ) AS panjang_18b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='18' and a.personil='Aldi Moh Yusron'");
            $row18b=mysqli_fetch_array($sql18b);
            //22 B
            // $sql22b=mysqli_query($con,"SELECT
            // sum( a.jml_rol) as roll_22b,
            // sum( a.qty ) AS bruto_22b,
            // sum( a.yard ) AS panjang_22b
            // from db_qc.tbl_inspection a left join 
            // db_qc.tbl_schedule b on a.id_schedule = b.id
            // where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            // AND '$stop_date' and a.`status`='selesai' and b.g_shift ='B' and b.no_mesin='22' and a.personil=''");
            // $row22b=mysqli_fetch_array($sql22b);
            //23 B
            // $sql23b=mysqli_query($con,"SELECT
            // sum( a.jml_rol) as roll_23b,
            // sum( a.qty ) AS bruto_23b,
            // sum( a.yard ) AS panjang_23b
            // from db_qc.tbl_inspection a left join 
            // db_qc.tbl_schedule b on a.id_schedule = b.id
            // where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            // AND '$stop_date' and a.`status`='selesai' and b.g_shift ='B' and b.no_mesin='23' and a.personil='Aditya'");
            // $row23b=mysqli_fetch_array($sql23b);
            //24 B
            // $sql24b=mysqli_query($con,"SELECT
            // sum( a.jml_rol) as roll_24b,
            // sum( a.qty ) AS bruto_24b,
            // sum( a.yard ) AS panjang_24b
            // from db_qc.tbl_inspection a left join 
            // db_qc.tbl_schedule b on a.id_schedule = b.id
            // where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            // AND '$stop_date' and a.`status`='selesai' and b.g_shift ='B' and b.no_mesin='24' and a.personil=''");
            // $row24b=mysqli_fetch_array($sql24b);
            //25 B
            // $sql25b=mysqli_query($con,"SELECT
            // sum( a.jml_rol) as roll_25b,
            // sum( a.qty ) AS bruto_25b,
            // sum( a.yard ) AS panjang_25b
            // from db_qc.tbl_inspection a left join 
            // db_qc.tbl_schedule b on a.id_schedule = b.id
            // where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            // AND '$stop_date' and a.`status`='selesai' and b.g_shift ='B' and b.no_mesin='25' and a.personil=''");
            // $row25b=mysqli_fetch_array($sql25b);
            //Qty Asst. SPV
            $t_roll_asb3=$row15b['roll_15b'];
            $t_bruto_asb3=$row15b['bruto_15b'];
            $t_panjang_asb3=$row15b['panjang_15b'];
            ?>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $t_roll_asb3;?></td>
                <td align="center"><?php echo $t_bruto_asb3;?></td>
                <td align="center"><?php echo $t_panjang_asb3;?></td>
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
            <tr>
                <td align="right">2</td>
                <td align="left">TC / Ilham</td>
                <td align="center"><?php echo $row2b['roll_2b'];?></td>
                <td align="center"><?php echo $row2b['bruto_2b'];?></td>
                <td align="center"><?php echo $row2b['panjang_2b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">3</td>
                <td align="left">Gian</td>
                <td align="center"><?php echo $row3b['roll_3b'];?></td>
                <td align="center"><?php echo $row3b['bruto_3b'];?></td>
                <td align="center"><?php echo $row3b['panjang_3b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">4</td>
                <td align="left">Paradito</td>
                <td align="center"><?php echo $row4b['roll_4b'];?></td>
                <td align="center"><?php echo $row4b['bruto_4b'];?></td>
                <td align="center"><?php echo $row4b['panjang_4b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">15</td>
                <td align="left">Ilham Fariz</td>
                <td align="center"><?php echo $row15b['roll_15b'];?></td>
                <td align="center"><?php echo $row15b['bruto_15b'];?></td>
                <td align="center"><?php echo $row15b['panjang_15b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">16</td>
                <td align="left">Cindo</td>
                <td align="center"><?php echo $row16b['roll_16b'];?></td>
                <td align="center"><?php echo $row16b['bruto_16b'];?></td>
                <td align="center"><?php echo $row16b['panjang_16b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">17</td>
                <td align="left">Givani</td>
                <td align="center"><?php echo $row17b['roll_17b'];?></td>
                <td align="center"><?php echo $row17b['bruto_17b'];?></td>
                <td align="center"><?php echo $row17b['panjang_17b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">18</td>
                <td align="left">Aldi</td>
                <td align="center"><?php echo $row18b['roll_18b'];?></td>
                <td align="center"><?php echo $row18b['bruto_18b'];?></td>
                <td align="center"><?php echo $row18b['panjang_18b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Leader</td>
                <td colspan="4" align="center" bgcolor="#B4C6E7">Aris S</td>
            </tr>
            <?php 
            //23 B
            $sql23b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_23b,
            sum( a.qty ) AS bruto_23b,
            sum( a.yard ) AS panjang_23b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='23' and a.personil='Rian Handika'");
            $row23b=mysqli_fetch_array($sql23b);
            //24 B
            $sql24b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_24b,
            sum( a.qty ) AS bruto_24b,
            sum( a.yard ) AS panjang_24b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftB $Wshift and b.no_mesin='24' and a.personil='Aditya'");
            $row24b=mysqli_fetch_array($sql24b);
            //29 B
            $sql29b=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_29b,
            sum( a.qty ) AS bruto_29b,
            sum( a.yard ) AS panjang_29b
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' and b.g_shift ='B' and b.no_mesin='29' and a.personil='Rangga'");
            $row29b=mysqli_fetch_array($sql29b);
            //24 B
            // $sql24b=mysqli_query($con,"SELECT
            // sum( a.jml_rol) as roll_24b,
            // sum( a.qty ) AS bruto_24b,
            // sum( a.yard ) AS panjang_24b
            // from db_qc.tbl_inspection a left join 
            // db_qc.tbl_schedule b on a.id_schedule = b.id
            // where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            // AND '$stop_date' and a.`status`='selesai' and b.g_shift ='B' and b.no_mesin='24' and a.personil=''");
            // $row24b=mysqli_fetch_array($sql24b);
            //25 B
            // $sql25b=mysqli_query($con,"SELECT
            // sum( a.jml_rol) as roll_25b,
            // sum( a.qty ) AS bruto_25b,
            // sum( a.yard ) AS panjang_25b
            // from db_qc.tbl_inspection a left join 
            // db_qc.tbl_schedule b on a.id_schedule = b.id
            // where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            // AND '$stop_date' and a.`status`='selesai' and b.g_shift ='B' and b.no_mesin='25' and a.personil=''");
            // $row25b=mysqli_fetch_array($sql25b);
            //Qty Asst. SPV
            $t_roll_asb4=$row23b['roll_23b']+$row24b['roll_24b'];
            $t_bruto_asb4=$row23b['bruto_23b']+$row24b['bruto_24b'];
            $t_panjang_asb4=$row23b['panjang_23b']+$row24b['panjang_24b'];
            ?>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $t_roll_asb4;?></td>
                <td align="center"><?php echo $t_bruto_asb4;?></td>
                <td align="center"><?php echo $t_panjang_asb4;?></td>
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
            <tr>
                <td align="right">23</td>
                <td align="left">Rian H</td>
                <td align="center"><?php echo $row23b['roll_23b'];?></td>
                <td align="center"><?php echo $row23b['bruto_23b'];?></td>
                <td align="center"><?php echo $row23b['panjang_23b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">24</td>
                <td align="left">Aditya</td>
                <td align="center"><?php echo $row24b['roll_24b'];?></td>
                <td align="center"><?php echo $row24b['bruto_24b'];?></td>
                <td align="center"><?php echo $row24b['panjang_24b'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">29</td>
                <td align="left">Rangga</td>
                <td align="center"><?php echo $row29b['roll_29b'];?></td>
                <td align="center"><?php echo $row29b['bruto_29b'];?></td>
                <td align="center"><?php echo $row29b['panjang_29b'];?></td>
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
        <!-- SHIFT C-->
        <td><table width="100%" border="1">
            <tr>
                <th colspan="2" align="left">Supervisor</th>
                <th colspan="4" align="center" bgcolor="#92D050">Heryanto</th>
            </tr>
            <?php
            if($_GET['gshift']=="ALL"){		
                $WGshiftC=" AND b.g_shift='C' ";	
            }else{	
                $WGshiftC=" AND b.g_shift='C' ";
            } 
            $sqlsc=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_sc,
            sum( a.qty ) AS bruto_sc,
            sum( a.yard ) AS panjang_sc
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift ");
            $rowsc=mysqli_fetch_array($sqlsc);
            ?>
            <tr>
                <th colspan="2" align="left">Akumulasi Inspeksi Shift C</th>
                <th align="center"><?php echo $rowsc['roll_sc'];?></th>
                <th align="center"><?php echo $rowsc['bruto_sc'];?></th>
                <th align="center"><?php echo $rowsc['panjang_sc'];?></th>
                <th align="center">&nbsp;</th>
            </tr>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <th colspan="2" align="left">Asst. Supervisor</th>
                <th colspan="4" align="center" bgcolor="#FFFF00">Purnomo</th>
            </tr>
            <?php 
            //12 C
            $sql12c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_12c,
            sum( a.qty ) AS bruto_12c,
            sum( a.yard ) AS panjang_12c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='12' and a.personil='Anggun Angraeni'");
            $row12c=mysqli_fetch_array($sql12c);
            //13 C
            $sql13c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_13c,
            sum( a.qty ) AS bruto_13c,
            sum( a.yard ) AS panjang_13c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='13' and a.personil='Assmy Tanjung'");
            $row13c=mysqli_fetch_array($sql13c);
            //14 C
            $sql14c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_14c,
            sum( a.qty ) AS bruto_14c,
            sum( a.yard ) AS panjang_14c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='14' and a.personil='Fuad Abdillah'");
            $row14c=mysqli_fetch_array($sql14c);
            //19 C
            $sql19c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_19c,
            sum( a.qty ) AS bruto_19c,
            sum( a.yard ) AS panjang_19c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='19' and a.personil='Abdul Wahid Syarifudin'");
            $row19c=mysqli_fetch_array($sql19c);
            //20 C
            $sql20c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_20c,
            sum( a.qty ) AS bruto_20c,
            sum( a.yard ) AS panjang_20c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='20' and a.personil='Nurul Lintang Rafli'");
            $row20c=mysqli_fetch_array($sql20c);
            //21 C
            $sql21c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_21c,
            sum( a.qty ) AS bruto_21c,
            sum( a.yard ) AS panjang_21c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='21' and a.personil='Galih'");
            $row21c=mysqli_fetch_array($sql21c);
            //22 C
            $sql22c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_22c,
            sum( a.qty ) AS bruto_22c,
            sum( a.yard ) AS panjang_22c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='22' and a.personil='Hary Heryana'");
            $row22c=mysqli_fetch_array($sql22c);
            //Qty Asst. SPV
            $t_roll_asc=$row12c['roll_12c']+$row13c['roll_13c']+$row14c['roll_14c']+$row19c['roll_19c']+$row20c['roll_20c']+$row21c['roll_21c']+$row22c['roll_22c'];
            $t_bruto_asc=$row12c['bruto_12c']+$row13c['bruto_13c']+$row14c['bruto_14c']+$row19c['bruto_19c']+$row20c['bruto_20c']+$row21c['bruto_21c']+$row22c['bruto_22c'];
            $t_panjang_asc=$row12c['panjang_12c']+$row13c['panjang_13c']+$row14c['panjang_14c']+$row19c['panjang_19c']+$row20c['panjang_20c']+$row21c['panjang_21c']+$row22c['panjang_22c'];
            ?>
            <tr>
                <th colspan="2" align="left">Akumulasi Hasil Inspeksi</th>
                <td align="center"><?php echo $t_roll_asc;?></td>
                <td align="center"><?php echo $t_bruto_asc;?></td>
                <td align="center"><?php echo $t_panjang_asc;?></td>
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
            // $sql=mysqli_query($con,"SELECT pelanggan, netto, panjang FROM tbl_lap_inspeksi WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$_GET[awal]' AND '$_GET[akhir]'
            // AND dept='PACKING' AND pelanggan LIKE '%ADIDAS%'");
            ?>
            <tr>
                <td align="right">12</td>
                <td align="left">Anggun</td>
                <td align="center"><?php echo $row12c['roll_12c'];?></td>
                <td align="center"><?php echo $row12c['bruto_12c'];?></td>
                <td align="center"><?php echo $row12c['panjang_12c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">13</td>
                <td align="left">Asmi</td>
                <td align="center"><?php echo $row13c['roll_13c'];?></td>
                <td align="center"><?php echo $row13c['bruto_13c'];?></td>
                <td align="center"><?php echo $row13c['panjang_13c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">14</td>
                <td align="left">Fuad</td>
                <td align="center"><?php echo $row14c['roll_14c'];?></td>
                <td align="center"><?php echo $row14c['bruto_14c'];?></td>
                <td align="center"><?php echo $row14c['panjang_14c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">19</td>
                <td align="left">Abdul Wahid</td>
                <td align="center"><?php echo $row19c['roll_19c'];?></td>
                <td align="center"><?php echo $row19c['bruto_19c'];?></td>
                <td align="center"><?php echo $row19c['panjang_19c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">20</td>
                <td align="left">Lintang</td>
                <td align="center"><?php echo $row20c['roll_20c'];?></td>
                <td align="center"><?php echo $row20c['bruto_20c'];?></td>
                <td align="center"><?php echo $row20c['panjang_20c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">21</td>
                <td align="left">Galih A</td>
                <td align="center"><?php echo $row21c['roll_21c'];?></td>
                <td align="center"><?php echo $row21c['bruto_21c'];?></td>
                <td align="center"><?php echo $row21c['panjang_21c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">22</td>
                <td align="left">Hary Haryana</td>
                <td align="center"><?php echo $row22c['roll_22c'];?></td>
                <td align="center"><?php echo $row22c['bruto_22c'];?></td>
                <td align="center"><?php echo $row22c['panjang_22c'];?></td>
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
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Leader</td>
                <td colspan="4" align="center" bgcolor="#FFE699">A.Safei</td>
            </tr>
            <?php 
            //5 C
            $sql5c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_5c,
            sum( a.qty ) AS bruto_5c,
            sum( a.yard ) AS panjang_5c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='05' and a.personil='andika'");
            $row5c=mysqli_fetch_array($sql5c);
            //6 C
            $sql6c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_6c,
            sum( a.qty ) AS bruto_6c,
            sum( a.yard ) AS panjang_6c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='06' and a.personil='Ahmad Jalaludin'");
            $row6c=mysqli_fetch_array($sql6c);
            //7 C
            $sql7c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_7c,
            sum( a.qty ) AS bruto_7c,
            sum( a.yard ) AS panjang_7c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='07' and a.personil='Rizky Agung'");
            $row7c=mysqli_fetch_array($sql7c);
            //8 C
            $sql8c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_8c,
            sum( a.qty ) AS bruto_8c,
            sum( a.yard ) AS panjang_8c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='08' and a.personil='Figo'");
            $row8c=mysqli_fetch_array($sql8c);
            //9 C
            $sql9c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_9c,
            sum( a.qty ) AS bruto_9c,
            sum( a.yard ) AS panjang_9c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='09' and a.personil='Prasetyan Nur Wijayanto'");
            $row9c=mysqli_fetch_array($sql9c);
            //10 C
            $sql10c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_10c,
            sum( a.qty ) AS bruto_10c,
            sum( a.yard ) AS panjang_10c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='10' and a.personil='Siti Syawaliyah'");
            $row10c=mysqli_fetch_array($sql10c);
            //11 C
            $sql11c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_11c,
            sum( a.qty ) AS bruto_11c,
            sum( a.yard ) AS panjang_11c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='11' and a.personil='Heni'");
            $row11c=mysqli_fetch_array($sql11c);
            //Qty Asst. SPV
            $t_roll_asc2=$row5c['roll_5c']+$row6c['roll_6c']+$row7c['roll_7c']+$row8c['roll_8c']+$row9c['roll_9c']+$row10c['roll_10c']+$row11c['roll_11c'];
            $t_bruto_asc2=$row5c['bruto_5c']+$row6c['bruto_6c']+$row7c['bruto_7c']+$row8c['bruto_8c']+$row9c['bruto_9c']+$row10c['bruto_10c']+$row11c['bruto_11c'];
            $t_panjang_asc2=$row5c['panjang_5c']+$row6c['panjang_6c']+$row7c['panjang_7c']+$row8c['panjang_8c']+$row9c['panjang_9c']+$row10c['panjang_10c']+$row11c['panjang_11c'];
            ?>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $t_roll_asc2;?></td>
                <td align="center"><?php echo $t_bruto_asc2;?></td>
                <td align="center"><?php echo $t_panjang_asc2;?></td>
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
            <tr>
                <td align="right">5</td>
                <td align="left">Andika</td>
                <td align="center"><?php echo $row5c['roll_5c'];?></td>
                <td align="center"><?php echo $row5c['bruto_5c'];?></td>
                <td align="center"><?php echo $row5c['panjang_5c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">6</td>
                <td align="left">Jalaludin</td>
                <td align="center"><?php echo $row6c['roll_6c'];?></td>
                <td align="center"><?php echo $row6c['bruto_6c'];?></td>
                <td align="center"><?php echo $row6c['panjang_6c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">7</td>
                <td align="left">Rizky Agung</td>
                <td align="center"><?php echo $row7c['roll_7c'];?></td>
                <td align="center"><?php echo $row7c['bruto_7c'];?></td>
                <td align="center"><?php echo $row7c['panjang_7c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">8</td>
                <td align="left">Figo</td>
                <td align="center"><?php echo $row8c['roll_8c'];?></td>
                <td align="center"><?php echo $row8c['bruto_8c'];?></td>
                <td align="center"><?php echo $row8c['panjang_8c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">9</td>
                <td align="left">Prasetyan</td>
                <td align="center"><?php echo $row9c['roll_9c'];?></td>
                <td align="center"><?php echo $row9c['bruto_9c'];?></td>
                <td align="center"><?php echo $row9c['panjang_9c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">10</td>
                <td align="left">Siti Syawaliyah</td>
                <td align="center"><?php echo $row10c['roll_10c'];?></td>
                <td align="center"><?php echo $row10c['bruto_10c'];?></td>
                <td align="center"><?php echo $row10c['panjang_10c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">11</td>
                <td align="left">Heni</td>
                <td align="center"><?php echo $row11c['roll_11c'];?></td>
                <td align="center"><?php echo $row11c['bruto_11c'];?></td>
                <td align="center"><?php echo $row11c['panjang_11c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Leader</td>
                <td colspan="4" align="center" bgcolor="#B4C6E7">Zakaria Dodi</td>
            </tr>
            <?php 
            //2 C
            $sql2c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_2c,
            sum( a.qty ) AS bruto_2c,
            sum( a.yard ) AS panjang_2c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='02' and a.personil='Jonathan'");
            $row2c=mysqli_fetch_array($sql2c);
            //3 C
            $sql3c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_3c,
            sum( a.qty ) AS bruto_3c,
            sum( a.yard ) AS panjang_3c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='03' and a.personil='Nanda Dio'");
            $row3c=mysqli_fetch_array($sql3c);
            //4 C
            $sql4c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_4c,
            sum( a.qty ) AS bruto_4c,
            sum( a.yard ) AS panjang_4c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='04' and a.personil='M Iqbal'");
            $row4c=mysqli_fetch_array($sql4c);
            //15 C
            $sql15c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_15c,
            sum( a.qty ) AS bruto_15c,
            sum( a.yard ) AS panjang_15c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='15' and a.personil='M. Husni'");
            $row15c=mysqli_fetch_array($sql15c);
            //16 C
            $sql16c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_16c,
            sum( a.qty ) AS bruto_16c,
            sum( a.yard ) AS panjang_16c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='16' and a.personil='Ika Rosita'");
            $row16c=mysqli_fetch_array($sql16c);
            //17 C
            $sql17c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_17c,
            sum( a.qty ) AS bruto_17c,
            sum( a.yard ) AS panjang_17c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='17' and a.personil='Faradila'");
            $row17c=mysqli_fetch_array($sql17c);
            //18 C
            $sql18c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_18c,
            sum( a.qty ) AS bruto_18c,
            sum( a.yard ) AS panjang_18c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='18' and a.personil='Alazis'");
            $row18c=mysqli_fetch_array($sql18c);
            //22 C
            // $sql22c=mysqli_query($con,"SELECT
            // sum( a.jml_rol) as roll_22c,
            // sum( a.qty ) AS bruto_22c,
            // sum( a.yard ) AS panjang_22c
            // from db_qc.tbl_inspection a left join 
            // db_qc.tbl_schedule b on a.id_schedule = b.id
            // where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            // AND '$stop_date' and a.`status`='selesai' and b.g_shift ='C' and b.no_mesin='22' and a.personil='M Rizky'");
            // $row22c=mysqli_fetch_array($sql22c);
            //23 C
            // $sql23c=mysqli_query($con,"SELECT
            // sum( a.jml_rol) as roll_23c,
            // sum( a.qty ) AS bruto_23c,
            // sum( a.yard ) AS panjang_23c
            // from db_qc.tbl_inspection a left join 
            // db_qc.tbl_schedule b on a.id_schedule = b.id
            // where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            // AND '$stop_date' and a.`status`='selesai' and b.g_shift ='C' and b.no_mesin='23' and a.personil='Oktaria'");
            // $row23c=mysqli_fetch_array($sql23c);
            //24 C
            // $sql24c=mysqli_query($con,"SELECT
            // sum( a.jml_rol) as roll_24c,
            // sum( a.qty ) AS bruto_24c,
            // sum( a.yard ) AS panjang_24c
            // from db_qc.tbl_inspection a left join 
            // db_qc.tbl_schedule b on a.id_schedule = b.id
            // where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            // AND '$stop_date' and a.`status`='selesai' and b.g_shift ='C' and b.no_mesin='24' and a.personil='Figo'");
            // $row24c=mysqli_fetch_array($sql24c);
            //25 C
            // $sql25c=mysqli_query($con,"SELECT
            // sum( a.jml_rol) as roll_25c,
            // sum( a.qty ) AS bruto_25c,
            // sum( a.yard ) AS panjang_25c
            // from db_qc.tbl_inspection a left join 
            // db_qc.tbl_schedule b on a.id_schedule = b.id
            // where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            // AND '$stop_date' and a.`status`='selesai' and b.g_shift ='C' and b.no_mesin='25' and a.personil='Fitri Fauziah'");
            // $row25c=mysqli_fetch_array($sql25c);
            //Qty Asst. SPV
            $t_roll_asc3=$row15c['roll_15c'];
            $t_bruto_asc3=$row15c['bruto_15c'];
            $t_panjang_asc3=$row15c['panjang_15c'];
            ?>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $t_roll_asc3;?></td>
                <td align="center"><?php echo $t_bruto_asc3;?></td>
                <td align="center"><?php echo $t_panjang_asc3;?></td>
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
            <tr>
                <td align="right">2</td>
                <td align="left">TC / Jonathan</td>
                <td align="center"><?php echo $row2c['roll_2c'];?></td>
                <td align="center"><?php echo $row2c['bruto_2c'];?></td>
                <td align="center"><?php echo $row2c['panjang_2c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">3</td>
                <td align="left">Nanda Dio</td>
                <td align="center"><?php echo $row3c['roll_3c'];?></td>
                <td align="center"><?php echo $row3c['bruto_3c'];?></td>
                <td align="center"><?php echo $row3c['panjang_3c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">4</td>
                <td align="left">M. Iqbal</td>
                <td align="center"><?php echo $row4c['roll_4c'];?></td>
                <td align="center"><?php echo $row4c['bruto_4c'];?></td>
                <td align="center"><?php echo $row4c['panjang_4c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">15</td>
                <td align="left">M. Husni</td>
                <td align="center"><?php echo $row15c['roll_15c'];?></td>
                <td align="center"><?php echo $row15c['bruto_15c'];?></td>
                <td align="center"><?php echo $row15c['panjang_15c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">16</td>
                <td align="left">TC / Ika Rosita</td>
                <td align="center"><?php echo $row16c['roll_16c'];?></td>
                <td align="center"><?php echo $row16c['bruto_16c'];?></td>
                <td align="center"><?php echo $row16c['panjang_16c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">17</td>
                <td align="left">TC / Faradila</td>
                <td align="center"><?php echo $row17c['roll_17c'];?></td>
                <td align="center"><?php echo $row17c['bruto_17c'];?></td>
                <td align="center"><?php echo $row17c['panjang_17c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">18</td>
                <td align="left">Alazis</td>
                <td align="center"><?php echo $row18c['roll_18c'];?></td>
                <td align="center"><?php echo $row18c['bruto_18c'];?></td>
                <td align="center"><?php echo $row18c['panjang_18c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right" colspan="6">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" align="left">Leader</td>
                <td colspan="4" align="center" bgcolor="#B4C6E7">Kharis M</td>
            </tr>
            <?php 
            //23 C
            $sql23c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_23c,
            sum( a.qty ) AS bruto_23c,
            sum( a.yard ) AS panjang_23c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='23' and a.personil='Rengga'");
            $row23c=mysqli_fetch_array($sql23c);
            //24 C
            $sql24c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_24c,
            sum( a.qty ) AS bruto_24c,
            sum( a.yard ) AS panjang_24c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' $WGshiftC $Wshift and b.no_mesin='24' and a.personil='Maruf Hafiz Pane'");
            $row24c=mysqli_fetch_array($sql24c);
            //29 C
            $sql29c=mysqli_query($con,"SELECT
            sum( a.jml_rol) as roll_29c,
            sum( a.qty ) AS bruto_29c,
            sum( a.yard ) AS panjang_29c
            from db_qc.tbl_inspection a left join 
            db_qc.tbl_schedule b on a.id_schedule = b.id
            where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            AND '$stop_date' and a.`status`='selesai' and b.g_shift ='C' and b.no_mesin='29' and a.personil='Deni'");
            $row29c=mysqli_fetch_array($sql29c);
            //24 C
            // $sql24c=mysqli_query($con,"SELECT
            // sum( a.jml_rol) as roll_24c,
            // sum( a.qty ) AS bruto_24c,
            // sum( a.yard ) AS panjang_24c
            // from db_qc.tbl_inspection a left join 
            // db_qc.tbl_schedule b on a.id_schedule = b.id
            // where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            // AND '$stop_date' and a.`status`='selesai' and b.g_shift ='C' and b.no_mesin='24' and a.personil='Figo'");
            // $row24c=mysqli_fetch_array($sql24c);
            //25 C
            // $sql25c=mysqli_query($con,"SELECT
            // sum( a.jml_rol) as roll_25c,
            // sum( a.qty ) AS bruto_25c,
            // sum( a.yard ) AS panjang_25c
            // from db_qc.tbl_inspection a left join 
            // db_qc.tbl_schedule b on a.id_schedule = b.id
            // where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
            // AND '$stop_date' and a.`status`='selesai' and b.g_shift ='C' and b.no_mesin='25' and a.personil='Fitri Fauziah'");
            // $row25c=mysqli_fetch_array($sql25c);
            //Qty Asst. SPV
            $t_roll_asc4=$row23c['roll_23c']+$row24c['roll_24c'];
            $t_bruto_asc4=$row23c['bruto_23c']+$row24c['bruto_24c'];
            $t_panjang_asc4=$row23c['panjang_23c']+$row24c['panjang_24c'];
            ?>
            <tr>
                <td colspan="2" align="left">Akumulasi Hasil Inspeksi</td>
                <td align="center"><?php echo $t_roll_asc4;?></td>
                <td align="center"><?php echo $t_bruto_asc4;?></td>
                <td align="center"><?php echo $t_panjang_asc4;?></td>
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
            <tr>
                <td align="right">23</td>
                <td align="left">Rengga</td>
                <td align="center"><?php echo $row23c['roll_23c'];?></td>
                <td align="center"><?php echo $row23c['bruto_23c'];?></td>
                <td align="center"><?php echo $row23c['panjang_23c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">24</td>
                <td align="left">Maaruf</td>
                <td align="center"><?php echo $row24c['roll_24c'];?></td>
                <td align="center"><?php echo $row24c['bruto_24c'];?></td>
                <td align="center"><?php echo $row24c['panjang_24c'];?></td>
                <td align="center">&nbsp;</td>
            </tr>
            <tr>
                <td align="right">29</td>
                <td align="left">Deni</td>
                <td align="center"><?php echo $row29c['roll_29c'];?></td>
                <td align="center"><?php echo $row29c['bruto_29c'];?></td>
                <td align="center"><?php echo $row29c['panjang_29c'];?></td>
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
        <th width="5%"><div align="center">No MC</div></th>
        <th width="23%"><div align="center">Inspector</div></th>
        <th width="10%"><div align="center">Roll</div></th>
        <th width="23%"><div align="center">Qty Bruto</div></th>
        <th width="23%"><div align="center">Panjang</div></th>
    </tr>
    <?php
    $sqlunion=mysqli_query($con,"SELECT
    a.personil as inspektor,
    b.no_mesin,
    sum( a.jml_rol) as roll,
    sum( a.qty ) AS bruto,
    sum( a.yard ) AS panjang,
    b.g_shift
    from db_qc.tbl_inspection a left join 
    db_qc.tbl_schedule b on a.id_schedule = b.id
    where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
    AND '$stop_date' and a.`status`='selesai' and b.g_shift ='A'
    and not ((a.personil = 'eva' and b.no_mesin ='12') or (a.personil = 'Wiwin Widya Ningsih' and b.no_mesin = '13') or (a.personil = 'Eprian Sigit' and b.no_mesin ='14') or 
     (a.personil = 'Arista W' and b.no_mesin ='19') or (a.personil = 'Aditia Nugroho' and b.no_mesin ='20') or (a.personil = 'Anang Kustiana' and b.no_mesin ='21') or
     (a.personil = 'Agus Suparman' and b.no_mesin ='22') or (a.personil = 'Dimas body Prakoso' and b.no_mesin ='05') or (a.personil = 'Handri' and b.no_mesin ='06') or 
     (a.personil = 'Nur Rohman' and b.no_mesin ='07') or (a.personil = 'Ika' and b.no_mesin ='08') or (a.personil = 'Fitri Fauziyah' and b.no_mesin ='09') or 
     (a.personil = 'Wildan Nur Fathudin' and b.no_mesin ='10') or (a.personil = 'Muhammad Soleh' and b.no_mesin ='11') or (a.personil = 'Muhamad Septian' and b.no_mesin ='15') or 
     (a.personil = 'Alan Susandi' and b.no_mesin ='02') or (a.personil = 'Asraf' and b.no_mesin ='03') or (a.personil = 'David' and b.no_mesin ='04') or 
     (a.personil = 'Nahya Septi Wiharti' and b.no_mesin ='16') or (a.personil = 'Armando' and b.no_mesin ='17') or (a.personil = 'Ashari' and b.no_mesin ='18') or 
     (a.personil = 'sulis' and b.no_mesin ='23') or (a.personil = 'Deo' and b.no_mesin ='24'))
    group by inspektor, b.no_mesin
    union
    SELECT
    a.personil as inspektor,
    b.no_mesin,
    sum( a.jml_rol) as roll,
    sum( a.qty ) AS bruto,
    sum( a.yard ) AS panjang,
    b.g_shift
    from db_qc.tbl_inspection a left join 
    db_qc.tbl_schedule b on a.id_schedule = b.id
    where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
    AND '$stop_date' and a.`status`='selesai' and b.g_shift ='B'
    and not ((a.personil = 'Annajatul' and b.no_mesin ='12') or (a.personil = 'Afriliana' and b.no_mesin = '13') or (a.personil = 'Majid' and b.no_mesin ='14') or 
     (a.personil = 'Rizal Nurhali' and b.no_mesin ='19') or (a.personil = 'Firmansyah' and b.no_mesin ='20') or (a.personil = 'Abdul Muhi' and b.no_mesin ='21') or
     (a.personil = 'Nur Ali' and b.no_mesin ='22') or (a.personil = 'Rifky Baihaqi' and b.no_mesin ='05') or (a.personil = 'M. Zaenal Arifin' and b.no_mesin ='06') or 
     (a.personil = 'Yosep' and b.no_mesin ='07') or (a.personil = 'Sri Rejeki' and b.no_mesin ='08') or (a.personil = 'Rasyid' and b.no_mesin ='09') or 
     (a.personil = 'Lisa' and b.no_mesin ='10') or (a.personil = 'Fahrozi' and b.no_mesin ='11') or (a.personil = 'Ilham Faris' and b.no_mesin ='15') or 
     (a.personil = 'Ilham' and b.no_mesin ='02') or (a.personil = 'Gian Ihsan' and b.no_mesin ='03') or (a.personil = 'Paradito' and b.no_mesin ='04') or 
     (a.personil = 'Cindo' and b.no_mesin ='16') or (a.personil = 'Muhammad Gifani' and b.no_mesin ='17') or (a.personil = 'Aldi Moh Yusron' and b.no_mesin ='18') or 
     (a.personil = 'Rian Handika' and b.no_mesin ='23') or (a.personil = 'Aditya' and b.no_mesin ='24')  or (a.personil = 'Rangga' and b.no_mesin ='29  '))
    group by inspektor, b.no_mesin
    union 
    SELECT
    a.personil as inspektor,
    b.no_mesin,
    sum( a.jml_rol) as roll,
    sum( a.qty ) AS bruto,
    sum( a.yard ) AS panjang,
    b.g_shift
    from db_qc.tbl_inspection a left join 
    db_qc.tbl_schedule b on a.id_schedule = b.id
    where DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
    AND '$stop_date' and a.`status`='selesai' and b.g_shift ='C'
    and not ((a.personil = 'Anggun Angraeni' and b.no_mesin ='12') or (a.personil = 'Assmy Tanjung' and b.no_mesin = '13') or (a.personil = 'Fuad Abdillah' and b.no_mesin ='14') or 
     (a.personil = 'Abdul Wahid Syarifudin' and b.no_mesin ='19') or (a.personil = 'Nurul Lintang Rafli' and b.no_mesin ='20') or (a.personil = 'Galih' and b.no_mesin ='21') or
     (a.personil = 'Hary Heryana' and b.no_mesin ='22') or (a.personil = 'andika' and b.no_mesin ='05') or (a.personil = 'Ahmad Jalaludin' and b.no_mesin ='06') or 
     (a.personil = 'Rizky Agung' and b.no_mesin ='07') or (a.personil = 'Figo' and b.no_mesin ='08') or (a.personil = 'Prasetyan Nur Wijayanto' and b.no_mesin ='09') or 
     (a.personil = 'Siti Syawaliyah' and b.no_mesin ='10') or (a.personil = 'Heni' and b.no_mesin ='11') or (a.personil = 'M. Husni' and b.no_mesin ='15') or 
     (a.personil = 'Jonathan' and b.no_mesin ='02') or (a.personil = 'Nanda Dio' and b.no_mesin ='03') or (a.personil = 'M Iqbal' and b.no_mesin ='04') or 
     (a.personil = 'Ika Rosita' and b.no_mesin ='16') or (a.personil = 'Faradila' and b.no_mesin ='17') or (a.personil = 'Alazis' and b.no_mesin ='18') or 
     (a.personil = 'Rengga' and b.no_mesin ='23') or (a.personil = 'Maruf Hafiz Pane' and b.no_mesin ='24') or (a.personil = 'Deni' and b.no_mesin ='29'))
    group by inspektor, b.no_mesin");
    while($rowu=mysqli_fetch_array($sqlunion)){
    ?>
    <tr>
        <td align="center"><?php echo $rowu['no_mesin'];?></td>
        <td align="center"><?php echo $rowu['inspektor'];?></td>
        <td align="center"><?php echo $rowu['roll'];?></td>
        <td align="center"><?php echo $rowu['bruto'];?></td>
        <td align="center"><?php echo $rowu['panjang'];?></td>
    </tr>
    <?php } ?>
</table>