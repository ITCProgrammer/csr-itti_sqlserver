<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Random-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");

ini_set("error_reporting", 1);
session_start();
//$con=mysqli_connect("10.0.1.91","dit","4dm1n","db_qc");
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$idkk = $_REQUEST['idkk'];
$act = $_GET['g'];
//-
$Awal = $_GET['awal'];
$Akhir = $_GET['akhir'];
//$Dept=$_GET['dept'];
//$Cancel=$_GET['cancel'];
$qTgl = mysqli_query($con, "SELECT DATE_FORMAT(now(),'%d-%b-%y') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl = mysqli_fetch_array($qTgl);
if ($Awal != "") {
    $tgl = substr($Awal, 0, 10);
    $jam = $Awal;
} else {
    $tgl = $rTgl['tgl_skrg'];
    $jam = $rTgl['jam_skrg'];
}
?>

    <table width="100%" border="1" class="table-list1">
        <thead>
            <tr>
                <th rowspan="2" colspan="8" align="center">&nbsp;</th>
                <th colspan="10" align="center">SNAG POD (FACE)</th>
                <th colspan="2" align="center">SNAG POD (BACK)</th>
                <th rowspan="4" align="center">SNAG MACE</th>
                <th colspan="3" align="center">BS</th>
                <th colspan="2" align="center">PILLING MARTINDALE</th>
                <th colspan="2" align="center">ELONGATION</th>
                <th colspan="2" align="center">RECOVERY</th>
                <th rowspan="2" colspan="2" align="center">WICKING</th>
                <th rowspan="2" align="center">ABSORBENCY</th>
                <th rowspan="2" align="center">EVAPORATION RATE</th>
                <th rowspan="3" colspan="2" align="center">BOW &amp; SKEW</th>
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
                <th rowspan="2" align="center">DESCRIPTION</th>
                <th rowspan="2" align="center">BUYER</th>
                <th rowspan="2" align="center">WIDTH</th>
                <th rowspan="2" align="center">GSM</th>
                <th rowspan="2" align="center">PILL R. TUMBLER</th>
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
                <th align="center">Bow</th>
                <th align="center">Skew</th>
            </tr>
        </thead>
        <tbody>
            <?php
            date_default_timezone_set("Asia/Jakarta");
            $query = mysqli_query($con, "SELECT * FROM tbl_tq_randomtest WHERE DATE_FORMAT( tgl_update, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' GROUP BY no_item ");
            while ($r = mysqli_fetch_array($query)) {
                $q1 = mysqli_query($con, "SELECT * FROM tbl_tq_nokk WHERE no_item='$r[no_item]' AND no_hanger='$r[no_hanger]'");
                $r1 = mysqli_fetch_array($q1);
                $pos = strpos($r1['pelanggan'], "/");
                $posbuyer = substr($r1['pelanggan'], $pos + 1, 50);
                $buyer = str_replace("'", "''", $posbuyer);
                $today = new DateTime();
                $tgl_update = date("Y-m-d", strtotime($r['tgl_update']));
                $update = new DateTime($tgl_update);
                $selisih = $today->diff($update);
                $qtemp = mysqli_query($con, "SELECT * FROM tbl_tq_temp_random WHERE no_item='$r[no_item]' AND no_hanger='$r[no_hanger]'");
                $rtemp = mysqli_fetch_array($qtemp);
                $tgl_update_temp = date("Y-m-d", strtotime($rtemp['tgl_update']));
                $update_temp = new DateTime($tgl_update_temp);
                $selisih_temp = $today->diff($update_temp);
                $qtemp1 = mysqli_query($con, "SELECT * FROM tbl_tq_temp_random2 WHERE no_item='$r[no_item]' AND no_hanger='$r[no_hanger]'");
                $rtemp1 = mysqli_fetch_array($qtemp1);
                $tgl_update_temp1 = date("Y-m-d", strtotime($rtemp1['tgl_update']));
                $update_temp1 = new DateTime($tgl_update_temp1);
                $selisih_temp1 = $today->diff($update_temp1);

                $qrwarna = mysqli_query($con, "SELECT * FROM tbl_tq_random_warna WHERE no_item='$r[no_item]' AND no_hanger='$r[no_hanger]'");
                $rwarna = mysqli_fetch_array($qrwarna);
                //$cekwarna=mysqli_num_rows($qwarna);
                ?>
                <tr>
                    <td align="left" style="font-size: 7px;">
                        <?php echo $r['no_item']; ?>
                    </td>
                    <td align="left" style="font-size: 7px;">
                        <?php echo $r['no_hanger']; ?>
                    </td>
                    <td align="left" style="font-size: 7px;">
                        <?php echo substr($r1['jenis_kain'], 0, 30); ?>
                    </td>
                    <td align="center" style="font-size: 7px;">
                        <?php echo $buyer; ?>
                    </td>
                    <td align="center" style="font-size: 7px;">
                        <?php echo $r1['lebar']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;">
                        <?php echo $r1['gramasi']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rprtw'] != "" and ($r['rprt_f1'] != "" or $r['rprt_b1'] != "")) { ?> bgcolor="<?php echo $rwarna['rprtw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and ($r['rprt_f1'] != "" or $r['rprt_b1'] != "")) { ?> bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and ($r['rprt_f1'] != $rtemp['temp_rprt_f1'] or $r['rprt_b1'] != $rtemp['temp_rprt_b1'])) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and ($r['rprt_f1'] != $rtemp1['temp_rprt_f1'] or $r['rprt_b1'] != $rtemp1['temp_rprt_b1'])) { ?> bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and ($r['rprt_f1'] != "" or $r['rprt_b1'] != "")) { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and ($r['rprt_f1'] != "" or $r['rprt_b1'] != "")) { ?> bgcolor="" <?php }
                    } ?>>
                        <?php if ($r['rprt_f1'] != "") {
                            echo "F: " . $r['rprt_f1'];
                        } ?> &nbsp;
                        <?php if ($r['rprt_b1'] != "") {
                            echo "B: " . $r['rprt_b1'];
                        } ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rpbw'] != "" and $r['rpb_f1'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rpbw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rpb_f1'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rpb_f1'] != $rtemp['temp_rpb_f1']) { ?> bgcolor="#FF6F30"
                            <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rpb_f1'] != $rtemp1['temp_rpb_f1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rpb_f1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rpb_f1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rpb_f1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rspw'] != "" and $r['rsp_grdl1'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rspw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rsp_grdl1'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_grdl1'] != $rtemp['temp_rsp_grdl1']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_grdl1'] != $rtemp1['temp_rsp_grdl1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_grdl1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_grdl1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rsp_grdl1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rspw'] != "" and $r['rsp_clsl1'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rspw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rsp_clsl1'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_clsl1'] != $rtemp['temp_rsp_clsl1']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_clsl1'] != $rtemp1['temp_rsp_clsl1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_clsl1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_clsl1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rsp_clsl1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rspw'] != "" and $r['rsp_shol1'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rspw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rsp_shol1'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_shol1'] != $rtemp['temp_rsp_shol1']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_shol1'] != $rtemp1['temp_rsp_shol1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_shol1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_shol1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rsp_shol1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rspw'] != "" and $r['rsp_medl1'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rspw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rsp_medl1'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_medl1'] != $rtemp['temp_rsp_medl1']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_medl1'] != $rtemp1['temp_rsp_medl1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_medl1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_medl1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rsp_medl1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rspw'] != "" and $r['rsp_lonl1'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rspw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rsp_lonl1'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_lonl1'] != $rtemp['temp_rsp_lonl1']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_lonl1'] != $rtemp1['temp_rsp_lonl1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_lonl1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_lonl1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rsp_lonl1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rspw'] != "" and $r['rsp_grdw1'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rspw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rsp_grdw1'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_grdw1'] != $rtemp['temp_rsp_grdw1']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_grdw1'] != $rtemp1['temp_rsp_grdw1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_grdw1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_grdw1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rsp_grdw1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rspw'] != "" and $r['rsp_clsw1'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rspw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rsp_clsw1'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_clsw1'] != $rtemp['temp_rsp_clsw1']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_clsw1'] != $rtemp1['temp_rsp_clsw1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_clsw1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_clsw1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rsp_clsw1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rspw'] != "" and $r['rsp_show1'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rspw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rsp_show1'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_show1'] != $rtemp['temp_rsp_show1']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_show1'] != $rtemp1['temp_rsp_show1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_show1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_show1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rsp_show1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rspw'] != "" and $r['rsp_medw1'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rspw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rsp_medw1'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_medw1'] != $rtemp['temp_rsp_medw1']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_medw1'] != $rtemp1['temp_rsp_medw1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_medw1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_medw1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rsp_medw1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rspw'] != "" and $r['rsp_lonw1'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rspw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rsp_lonw1'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_lonw1'] != $rtemp['temp_rsp_lonw1']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_lonw1'] != $rtemp1['temp_rsp_lonw1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_lonw1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_lonw1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rsp_lonw1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rspw'] != "" and $r['rsp_grdl2'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rspw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rsp_grdl2'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_grdl2'] != $rtemp['temp_rsp_grdl2']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_grdl2'] != $rtemp1['temp_rsp_grdl2']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_grdl2'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_grdl2'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rsp_grdl2']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rspw'] != "" and $r['rsp_grdw2'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rspw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rsp_grdw2'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_grdw2'] != $rtemp['temp_rsp_grdw2']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_grdw2'] != $rtemp1['temp_rsp_grdw2']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rsp_grdw2'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rsp_grdw2'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rsp_grdw2']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rsmw'] != "" and ($r['rsm_l1'] != "" or $r['rsm_w1'] != "")) { ?> bgcolor="<?php echo $rwarna['rsmw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and ($rtemp['sts'] == "1" and $r['rsm_l1'] != "" or $r['rsm_w1'] != "")) { ?> bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and ($r['rsm_l1'] != $rtemp['temp_rsm_l1'] or $r['rsm_w1'] != $rtemp['temp_rsm_w1'])) { ?> bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and ($r['rsm_l1'] != "" or $r['rsm_w1'] != "")) { ?> bgcolor="" <?php }
                    } ?>>
                        <?php if ($r['rsm_l1'] != "") {
                            echo "L= " . $r['rsm_l1'];
                        } ?> &nbsp;
                        <?php if ($r['rsm_w1'] != "") {
                            echo "W= " . $r['rsm_w1'];
                        } ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rbswinstron'] != "" and $r['rbs_instron'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rbswinstron']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rbs_instron'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rbs_instron'] != $rtemp['temp_rbs_instron']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rbs_instron'] != $rtemp1['temp_rbs_instron']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rbs_instron'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rbs_instron'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rbs_instron']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rbswtru_burst'] != "" and $r['rbs_tru'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rbswtru_burst']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rbs_tru'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rbs_tru'] != $rtemp['temp_rbs_tru']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rbs_tru'] != $rtemp1['temp_rbs_tru']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rbs_tru'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rbs_tru'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rbs_tru']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rbswmullen'] != "" and $r['rbs_mullen'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rbswmullen']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rbs_mullen'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rbs_mullen'] != $rtemp['temp_rbs_mullen']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rbs_mullen'] != $rtemp1['temp_rbs_mullen']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rbs_mullen'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rbs_mullen'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rbs_mullen']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rpmw'] != "" and $r['rpm_f1'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rpmw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rpm_f1'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rpm_f1'] != $rtemp['temp_rpm_f1']) { ?> bgcolor="#FF6F30"
                            <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rpm_f1'] != $rtemp1['temp_rpm_f1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rpm_f1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rpm_f1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rpm_f1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rpmw'] != "" and $r['rpm_f2'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rpmw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rpm_f2'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rpm_f2'] != $rtemp['temp_rpm_f2']) { ?> bgcolor="#FF6F30"
                            <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rpm_f2'] != $rtemp1['temp_rpm_f2']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rpm_f2'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rpm_f2'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rpm_f2']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rstretchw'] != "" and $r['rstretch_l1'] != "") { ?> bgcolor="<?php echo $rwarna['rstretchw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rstretch_l1'] != "") { ?> bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rstretch_l1'] != $rtemp['temp_rstretch_l1']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rstretch_l1'] != $rtemp1['temp_rstretch_l1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rstretch_l1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rstretch_l1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rstretch_l1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rstretchw'] != "" and $r['rstretch_w1'] != "") { ?> bgcolor="<?php echo $rwarna['rstretchw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rstretch_w1'] != "") { ?> bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rstretch_w1'] != $rtemp['temp_rstretch_w1']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rstretch_w1'] != $rtemp1['temp_rstretch_w1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rstretch_w1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rstretch_w1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rstretch_w1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rrecoverw'] != "" and $r['rrecover_l1'] != "") { ?> bgcolor="<?php echo $rwarna['rrecoverw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rrecover_l1'] != "") { ?> bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rrecover_l1'] != $rtemp['temp_rrecover_l1']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rrecover_l1'] != $rtemp1['temp_rrecover_l1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rrecover_l1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rrecover_l1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rrecover_l1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rrecoverw'] != "" and $r['rrecover_w1'] != "") { ?> bgcolor="<?php echo $rwarna['rrecoverw']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rrecover_w1'] != "") { ?> bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rrecover_w1'] != $rtemp['temp_rrecover_w1']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rrecover_w1'] != $rtemp1['temp_rrecover_w1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rrecover_w1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rrecover_w1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rrecover_w1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rwickw_af'] != "" and $r['rwick_l2'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rwickw_af']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rwick_l2'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rwick_l2'] != $rtemp['temp_rwick_l2']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rwick_l2'] != $rtemp1['temp_rwick_l2']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rwick_l2'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rwick_l2'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rwick_l2']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rwickw_af'] != "" and $r['rwick_w2'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rwickw_af']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rwick_w2'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rwick_w2'] != $rtemp['temp_rwick_w2']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rwick_w2'] != $rtemp1['temp_rwick_w2']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rwick_w2'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rwick_w2'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rwick_w2']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rabsorw_af'] != "" and $r['rabsor_b1'] != "") { ?> bgcolor="<?php echo $rwarna['rabsorw_af']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rabsor_b1'] != "") { ?> bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rabsor_b1'] != $rtemp['temp_rabsor_b1']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rabsor_b1'] != $rtemp1['temp_rabsor_b1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rabsor_b1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rabsor_b1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rabsor_b1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rdryw_af'] != "" and $r['rdryaf1'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rdryw_af']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rdryaf1'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rdryaf1'] != $rtemp['temp_rdryaf1']) { ?>
                                    bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rdryaf1'] != $rtemp1['temp_rdryaf1']) { ?>
                                        bgcolor="#FF6F30" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rdryaf1'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rdryaf1'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rdryaf1']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rboww'] != "" and $r['rbow'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rboww']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rbow'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rbow'] != $rtemp['temp_rbow']) { ?> bgcolor="#FF6F30"
                            <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rbow'] != $rtemp1['temp_rbow']) { ?> bgcolor="#FF6F30"
                            <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rbow'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rbow'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rbow']; ?>
                    </td>
                    <td align="center" style="font-size: 7px;" <?php if ($rwarna['rskeww'] != "" and $r['rskew'] != "") { ?>
                            bgcolor="<?php echo $rwarna['rskeww']; ?>" <?php } else {
                        if (($selisih->m == 0 or $selisih_temp->m == 0) and $rtemp['sts'] == "1" and $r['tgl_update'] == $rtemp['tgl_update'] and $r['rskew'] != "") { ?>
                                bgcolor="#FFE54E" <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rskew'] != $rtemp['temp_rskew']) { ?> bgcolor="#FF6F30"
                            <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rskew'] != $rtemp1['temp_rskew']) { ?> bgcolor="#FF6F30"
                            <?php } else if (($selisih->m >= 1 or $selisih_temp->m >= 1) and $rtemp['sts'] == "1" and $r['tgl_update'] != $rtemp['tgl_update'] and $r['rskew'] != "") { ?> bgcolor="" <?php } else if (($selisih->m >= 1 or $selisih_temp1->m >= 1) and $rtemp1['sts'] == "1" and $r['tgl_update'] != $rtemp1['tgl_update'] and $r['rskew'] != "") { ?> bgcolor="" <?php }
                    } ?>>
                        <?php echo $r['rskew']; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <table width="100%">
        <tr>
            <td>
                <table width="100%" border="0" class="table-list1">
                    <tr>
                        <td bgcolor="#FFE54E" colspan="2">&nbsp;</td>
                        <td align="left" style="border-top:0px #000000 solid; 
                    border-bottom:0px #000000 solid; 
                    border-right:0px #000000 solid;">Item random baru</td>
                    </tr>
                    <tr>
                        <td bgcolor="#FF6F30" colspan="2">&nbsp;</td>
                        <td align="left" style="border-top:0px #000000 solid; 
                    border-bottom:0px #000000 solid; 
                    border-right:0px #000000 solid;">Replacement item random</td>
                    </tr>
                    <tr>
                        <td bgcolor="#722A02" colspan="2">&nbsp;</td>
                        <td align="left" style="border-top:0px #000000 solid; 
                    border-bottom:0px #000000 solid; 
                    border-right:0px #000000 solid;">Tidak random karena reject</td>
                    </tr>
                </table>
            </td>
            <td>
                <table width="100%" border="1" class="table-list1">
                    <tr>
                        <th align="center" colspan="5">Dibuat Oleh:</th>
                        <th align="center" colspan="16">Diperiksa Oleh:</th>
                        <th align="center" colspan="12">Mengetahui:</th>
                    </tr>
                    <tr>
                        <th align="center" colspan="5">OPERATOR</th>
                        <th align="center" colspan="16">LEADER</th>
                        <th align="center" colspan="6">AST. SPV</th>
                        <th align="center" colspan="6">AST. MANAGER</th>
                    </tr>
                    <tr>
                        <td colspan="5" height="60" valign="bottom" align="center">&nbsp;</td>
                        <td colspan="4" height="60" valign="bottom" align="center">EDWIN I.</td>
                        <td colspan="4" height="60" valign="bottom" align="center">T. RESTIARDI</td>
                        <td colspan="4" height="60" valign="bottom" align="center">JANU D.L</td>
                        <td colspan="4" height="60" valign="bottom" align="center">TRI S.</td>
                        <td colspan="6" height="60" valign="bottom" align="center">VIVIK K.</td>
                        <td colspan="6" height="60" valign="bottom" align="center">FERRY W.</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>