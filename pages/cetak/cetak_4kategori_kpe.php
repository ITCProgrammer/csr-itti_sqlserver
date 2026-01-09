

 <?php

     if (isset($_GET['excel'])) {
         header("Content-type: application/octet-stream");
         header("Content-Disposition: attachment; filename=detail_4kategori_kpe.xls"); //ganti nama sesuai keperluan
         header("Pragma: no-cache");
         header("Expires: 0");
         $excell = '1';
     } else {
         $excell = '0';
     }
     ini_set("error_reporting", 1);
     session_start();
     include "../../koneksi.php";
     include "../../tgl_indo.php";
     //--
     $idkk = $_REQUEST['idkk'];
     $act  = $_GET['g'];
     //-
     $Awal   = $_GET['awal'];
     $Akhir  = $_GET['akhir'];
     $Dept   = $_GET['dept'];
     $Cancel = $_GET['cancel'];
     $qTgl   = mysqli_query($con, "SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
     $rTgl   = mysqli_fetch_array($qTgl);
     if ($Awal != "") {$tgl = substr($Awal, 0, 10);
         $jam                            = $Awal;} else { $tgl = $rTgl['tgl_skrg'];
         $jam                             = $rTgl['jam_skrg'];}

     function NoBonXX($tanggalawal, $tanggalakhir)
     {
         $output   = [];
         $netto_yd = [];
         return [$output, $netto_yd];
     }

     function NoBon($tanggalawal, $tanggalakhir)
     {
         $tanggalakhir = date('Y-m-d', strtotime($tanggalakhir . ' +1 day'));
         global $conn1;
         $query = "SELECT A.*, B.BASESECONDARYQUANTITY  FROM ITXVIEW_MEMOPENTINGPPC A
			  LEFT JOIN ITXVIEW_NETTO B ON (A.DEMAND = B.CODE)
			  WHERE A.CREATIONDATETIME_SALESORDER  >=  '$tanggalawal'  AND A.CREATIONDATETIME_SALESORDER  < '$tanggalakhir'";
         $stmt = db2_exec($conn1, $query, ['cursor' => DB2_SCROLLABLE]);

         $output   = [];
         $netto_yd = [];

         if (db2_num_rows($stmt) > 0) {
             while ($row = db2_fetch_assoc($stmt)) {
                 //PO”, “order”, “hanger”, “warna”, dan “masalah dominan
                 $subcode2 = str_replace(' ', '', $row['SUBCODE02']);
                 $subcode3 = str_replace(' ', '', $row['SUBCODE03']);

                 $po     = $row['NO_PO'];
                 $hanger = $subcode2 . $subcode3;
                 $warna  = $row['WARNA'];

                 $no_bon_order = preg_replace('/\s+/', '', $row['NO_ORDER']);
                 if (substr($no_bon_order, 0, 1) == 'R') {
                     $output[$po . '/' . $hanger . '/' . $warna][$no_bon_order]   = $no_bon_order;
                     $netto_yd[$po . '/' . $hanger . '/' . $warna][$no_bon_order] = number_format($row['BASESECONDARYQUANTITY'], 0);
                 }

                 // depannya R
                 /*
			 $sql_netto_yd = db2_exec($conn1, "SELECT * FROM ITXVIEW_NETTO WHERE CODE = '$row[DEMAND]'");
             $d_netto_yd = db2_fetch_assoc($sql_netto_yd);
             $netto_yd =  number_format($d_netto_yd['BASESECONDARYQUANTITY'],0);
			 */

                 $demand[] = $row['DEMAND'];

             }
         }

         return [$output, $netto_yd];

     }
     $tanggalawal  = $Awal;
     $tanggalAkhir = $Akhir;
     $no_bon       = NoBon($tanggalawal, $tanggalAkhir);

 ?>
<?php
if (! isset($_GET['excel'])) {?>
	<link href="styles_cetak.css" rel="stylesheet" type="text/css">

<script>

// set portrait orientation

jsPrintSetup.setOption('orientation', jsPrintSetup.kPortraitOrientation);

// set top margins in millimeters
jsPrintSetup.setOption('marginTop', 0);
jsPrintSetup.setOption('marginBottom', 0);
jsPrintSetup.setOption('marginLeft', 0);
jsPrintSetup.setOption('marginRight', 0);

// set page header
jsPrintSetup.setOption('headerStrLeft', '');
jsPrintSetup.setOption('headerStrCenter', '');
jsPrintSetup.setOption('headerStrRight', '');

// set empty page footer
jsPrintSetup.setOption('footerStrLeft', '');
jsPrintSetup.setOption('footerStrCenter', '');
jsPrintSetup.setOption('footerStrRight', '');

// clears user preferences always silent print value
// to enable using 'printSilent' option
jsPrintSetup.clearSilentPrint();

// Suppress print dialog (for this context only)
jsPrintSetup.setOption('printSilent', 1);

// Do Print
// When print is submitted it is executed asynchronous and
// script flow continues after print independently of completetion of print process!
jsPrintSetup.print();

window.addEventListener('load', function () {
    var rotates = document.getElementsByClassName('rotate');
    for (var i = 0; i < rotates.length; i++) {
        rotates[i].style.height = rotates[i].offsetWidth + 'px';
    }
});
// next commands

</script>
<style>
.hurufvertical {
 writing-mode:tb-rl;
    -webkit-transform:rotate(-90deg);
    -moz-transform:rotate(-90deg);
    -o-transform: rotate(-90deg);
    -ms-transform:rotate(-90deg);
    transform: rotate(180deg);
    white-space:nowrap;
    float:left;
}

input{
text-align:center;
border:hidden;
}
@media print {
  ::-webkit-input-placeholder { /* WebKit browsers */
      color: transparent;
  }
  :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
      color: transparent;
  }
  ::-moz-placeholder { /* Mozilla Firefox 19+ */
      color: transparent;
  }
  :-ms-input-placeholder { /* Internet Explorer 10+ */
      color: transparent;
  }
  .pagebreak { page-break-before:always; }
  .header {display:block}
  table thead
   {
    display: table-header-group;
   }
}
</style>
<?php }
?>


<?php
    $nmBln = [1 => "JANUARI", "FEBUARI", "MARET", "APRIL", "MEI", "JUNI", "JULI", "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOVEMBER", "DESEMBER"];
?>
<div align="center">
<strong><font size="+1">DETAIL 4 KATEGORI KPE</font></strong><br />

		<font size="-1">Periode Tanggal:		                                 <?php echo date("d/m/Y", strtotime($Awal)); ?> s/d<?php echo date("d/m/Y", strtotime($Akhir)); ?></font>
</div>
<table width="100%">
  <thead>
    <tr>
      <td>

		</td>
    </tr>
	</thead>

    <tr>
      <td><table width="100%" border="1" class="table-list1">
		  <thead>
          <tr align="center">
            <td><font size="-2">NO</font></td>
			<td><font size="-2">Buyer </font></td>
			<td><font size="-2">Brand</font></td>
			<td><font size="-2">PO</font></td>
			<td><font size="-2">Hanger</font></td>
			<td><font size="-2">Lebar & Gramasi</font></td>
			<td><font size="-2">Warna</font></td>
			<td><font size="-2">Qty Order</font></td>
			<td><font size="-2">Qty Claim </font></td>
			<td><font size="-2">% Claim</font></td>
			<td><font size="-2">Masalah Dominan</font></td>
			<td><font size="-2">Solusi</font></td>
			<td><font size="-2">Qty Cutting Loss </font></td>
			<td><font size="-2">Waktu pengerjaan </font></td>
			<td><font size="-2">Incharge</font></td>
			<td><font size="-2">Note </font></td>
			<td><font size="-2">Status</font></td>
			<td><font size="-2">No Bon Order</font></td>
			<td><font size="-2">Ket Kategori</font></td>

          </tr>
		  </thead>
		  <tbody>
		<?php
            $no         = 1;
            $Awal       = $_GET['awal'];
            $Akhir      = $_GET['akhir'];
            $Order      = $_GET['order'];
            $Hanger     = $_GET['hanger'];
            $PO         = $_GET['po'];
            $Langganan  = $_GET['langganan'];
            $Demand     = $_GET['demand'];
            $Prodorder  = $_GET['prodorder'];
            $Pejabat    = $_GET['pejabat'];
            $keterangan = $_GET['kategori'];

            if ($Awal != "" && $Akhir != "") {
                $where_tanggal = "DATE_FORMAT(a.tgl_buat, '%Y-%m-%d') BETWEEN '$Awal' AND '$Akhir'";
            }
            if ($Order != "") {
                $where_no_order = "AND no_order LIKE '%$Order%'";
            }
            if ($PO != "") {
                $where_po = "AND po LIKE '%$PO%' ";
            }
            if ($Hanger != "") {
                $where_hanger = "AND no_hanger LIKE '%$Hanger%'";
            }
            if ($langganan != "") {
                $where_langganan = "AND langganan LIKE '%$Langganan%'";
            }
            if ($Demand != "") {
                $where_demand = "AND nodemand LIKE '%$Demand%'";
            }
            if ($Prodorder != "") {
                $where_kk = "AND nokk LIKE '%$Prodorder%'";
            }
            if ($Pejabat != "") {
                $where_pejabat = "AND pejabat LIKE '%$Pejabat%'";
            }
            if ($keterangan != "") {
                $where_keterangan = "AND KET_MASALAH LIKE '%$keterangan%'";
            }
            $query4Kategori = mysqli_query($con, "SELECT
														a.*,
														sum(a.qty_claim) as qty_claim_x,
														sum(a.qty_lolos) as qty_lolos_qc
													FROM
														tbl_aftersales_now a
													WHERE
																		$where_tanggal
																		$where_no_order
																		$where_po
																		$where_hanger
																		$where_langganan
																		$where_demand
																		$where_kk
																		$where_pejabat
                                                                        AND (a.bprc IS NULL OR a.bprc = '')
														GROUP BY
														a.po,
														a.no_hanger,
														a.warna,
														a.masalah_dominan,
														a.qty_order
													ORDER BY
														a.tgl_buat ASC");

            $majorTemp   = [];
            $sampleTemp  = [];
            $repeatTemp  = [];
            $generalTemp = [];
            $allTemp = [];

            while ($row = mysqli_fetch_assoc($query4Kategori)) {
                $query4x = mysqli_query($con, "SELECT
														b.pjg1
													FROM tbl_ganti_kain_now b
													WHERE b.id_nsp = '$row[id]' ");
                $rowx = mysqli_fetch_assoc($query4x);

                $row['pjg1'] = $rowx['pjg1'];
                $allTemp[] = $row;
                if ($row['pjg1'] >= 500) {
                    $majorTemp[] = $row;
                } elseif (in_array(substr($row['no_order'], 0, 3), ['SAM', 'SME'])) {
                    $sampleTemp[] = $row;
                } else {
                    $generalTemp[] = $row;
                }
        }

            $hanger_masalah_dominan = array_map(function ($value) {
                return $value['no_hanger'] . '' . $value['masalah_dominan'];
            }, $generalTemp);

            $count_hanger_masalah_dominan = array_count_values($hanger_masalah_dominan);
            $group_hanger_masalah_dominan = array_keys(array_filter($count_hanger_masalah_dominan, fn($value) => $value > 1));

            foreach ($generalTemp as $key => $value) {
                $hmd = $value['no_hanger'] . '' . $value['masalah_dominan'];
                if (in_array($hmd, $group_hanger_masalah_dominan)) {
                    $repeatTemp[] = $value;
                    unset($generalTemp[$key]);
                }
            }?>
            <?php 
            if($keterangan==""){
                foreach($allTemp as $data1 => $data)
                {
                    $po = $data['po'];
                    $hanger =$data['no_hanger'];
                    $warna = $data['warna'];
                 
                    $key_bon = $po.'/'.$hanger.'/'.$warna;
            ?>
                     <tr>
                     <td align="center"><font size="-2"><?= $no ?></font></td>
                     <td align="center"><font size="-2"><?= $data['pelanggan']?></font></td>
                     <td align="center"><font size="-2"><?= explode('/', $data['langganan'])[1]?></font></td>
                     <td align="center"><font size="-2"><?= $data['po'] ?></font></td>
                     <td align="center"><font size="-2"><?= $data['no_hanger'] ?></font></td>
                     <td align="center"><font size="-2"><?= $data['lebar'] . 'x' . $data['gramasi']?></font></td>
                     <td align="center"><font size="-2"><?= $data['warna']?></font></td>
                     <td align="center"><font size="-2"><?= $data['qty_order']?></font></td>
                     <td align="center"><font size="-2"><?= $data['qty_claim_x']?></font></td>
                     <td align="center"><font size="-2"><?php 
                        $persentase = ($data['qty_claim_x'] / $data['qty_order']) * 100;
                        echo is_float($persentase) ? round($persentase, 2) : $persentase; echo '%';
                     ?></font></td>
                    <td align="center"><font size="-2"><?= $data['masalah_dominan'] ?></font></td>
                    <td align="center"><font size="-2"><?= $data['solusi']?></font></td>
                    <td align="center"><font size="-2">
                        <?php if (array_key_exists($key_bon, $no_bon[1])) {
                        $urutan = 1;
                        foreach ($no_bon[1][$key_bon] as $dbon) {
                            echo ($urutan > 1 ? '/' : '') . $dbon;
                            $urutan++;
                        }
                    }?></font></td>
                    <td align="center"><font size="-2">
                        <?php
                        if ($data['tgl_solusi_akhir'] != '0000-00-00' && $data['tgl_solusi_akhir'] != null && $data['tgl_solusi_akhir'] != '') {
                            echo $data['tgl_solusi_akhir'];}
                        ?>
                        </font></td>
                    <td align="center"><font size="-2"><?= $data['nama_nego']?></font></td>
                    <td align="center"><font size="-2"><?= $data['ket']?></font></td>
                    <td align="center"><?php 
                    if ($data['tgl_solusi_akhir'] != '0000-00-00' && $data['tgl_solusi_akhir'] != null && $data['tgl_solusi_akhir'] != '') {
                        if ($excell == 1) {
                            echo 'closed';
                        } else {
                            echo '<img width=15px src="../../dist/img/check_mark.png">';
                        }
                    }?></td>
                    <td align="center">
                        <?php
                        if (array_key_exists($key_bon, $no_bon[0])) {
                            $urutan = 1;
                            foreach ($no_bon[0][$key_bon] as $dbon) {
                                echo ($urutan > 1 ? '/' : '') . $dbon;
                                $urutan++;
                            }
                        }?>   
                    </td>
                    <td align="center"><font size="-2">
                        <?php 
                        $found = false;
                        foreach ($generalTemp as $general) {
                            if ($general['id'] == $data['id']) {
                                echo 'GENERAL';
                                $found = true;
                                break;
                            }
                        }
                        if (!$found) {
                            foreach ($majorTemp as $major) {
                                if ($major['id'] == $data['id']) {
                                    echo 'MAJOR';
                                    $found = true;
                                    break;
                                }
                            }
                        }
                        if (!$found) {
                            foreach ($sampleTemp as $sample) {
                                if ($sample['id'] == $data['id']) {
                                    echo 'SAMPLE';
                                    $found = true;
                                    break;
                                }
                            }
                        }
                        if (!$found) {
                            echo 'REPEAT';
                        }
                        ?></font></td>
                </tr>
                <?php 
                $no++;
            } 
        }
            ?>
            <?php 
            if($keterangan=="GENERAL"){
                foreach($generalTemp as $data1 => $data)
                {
                    $po = $data['po'];
                    $hanger =$data['no_hanger'];
                    $warna = $data['warna'];
                 
                    $key_bon = $po.'/'.$hanger.'/'.$warna;
            ?>
                     <tr>
                     <td align="center"><font size="-2"><?= $no ?></font></td>
                     <td align="center"><font size="-2"><?= $data['pelanggan']?></font></td>
                     <td align="center"><font size="-2"><?= explode('/', $data['langganan'])[1]?></font></td>
                     <td align="center"><font size="-2"><?= $data['po'] ?></font></td>
                     <td align="center"><font size="-2"><?= $data['no_hanger'] ?></font></td>
                     <td align="center"><font size="-2"><?= $data['lebar'] . 'x' . $data['gramasi']?></font></td>
                     <td align="center"><font size="-2"><?= $data['warna']?></font></td>
                     <td align="center"><font size="-2"><?= $data['qty_order']?></font></td>
                     <td align="center"><font size="-2"><?= $data['qty_claim_x']?></font></td>
                     <td align="center"><font size="-2"><?php 
                        $persentase = ($data['qty_claim_x'] / $data['qty_order']) * 100;
                        echo is_float($persentase) ? round($persentase, 2) : $persentase; echo '%';
                     ?></font></td>
                    <td align="center"><font size="-2"><?= $data['masalah_dominan'] ?></font></td>
                    <td align="center"><font size="-2"><?= $data['solusi']?></font></td>
                    <td align="center"><font size="-2">
                        <?php if (array_key_exists($key_bon, $no_bon[1])) {
                        $urutan = 1;
                        foreach ($no_bon[1][$key_bon] as $dbon) {
                            echo ($urutan > 1 ? '/' : '') . $dbon;
                            $urutan++;
                        }
                    }?></font></td>
                    <td align="center"><font size="-2">
                        <?php
                        if ($data['tgl_solusi_akhir'] != '0000-00-00' && $data['tgl_solusi_akhir'] != null && $data['tgl_solusi_akhir'] != '') {
                            echo $data['tgl_solusi_akhir'];}
                        ?>
                        </font></td>
                    <td align="center"><font size="-2"><?= $data['nama_nego']?></font></td>
                    <td align="center"><font size="-2"><?= $data['ket']?></font></td>
                    <td align="center"><?php 
                    if ($data['tgl_solusi_akhir'] != '0000-00-00' && $data['tgl_solusi_akhir'] != null && $data['tgl_solusi_akhir'] != '') {
                        if ($excell == 1) {
                            echo 'closed';
                        } else {
                            echo '<img width=15px src="../../dist/img/check_mark.png">';
                        }
                    }?></td>
                    <td align="center">
                        <?php
                        if (array_key_exists($key_bon, $no_bon[0])) {
                            $urutan = 1;
                            foreach ($no_bon[0][$key_bon] as $dbon) {
                                echo ($urutan > 1 ? '/' : '') . $dbon;
                                $urutan++;
                            }
                        }?>   
                    </td>
                    <td align="center"><font size="-2"><?= 'GENERAL'?></font></td>
                </tr>
                <?php 
                $no++;
            } 
        }?>
            <?php 
            if($keterangan=="SAMPLE"){
                foreach($sampleTemp as $data1 => $data)
                {
                    $po = $data['po'];
                    $hanger =$data['no_hanger'];
                    $warna = $data['warna'];
                 
                    $key_bon = $po.'/'.$hanger.'/'.$warna;
            ?>
                     <tr>
                     <td align="center"><font size="-2"><?= $no ?></font></td>
                     <td align="center"><font size="-2"><?= $data['pelanggan']?></font></td>
                     <td align="center"><font size="-2"><?= explode('/', $data['langganan'])[1]?></font></td>
                     <td align="center"><font size="-2"><?= $data['po'] ?></font></td>
                     <td align="center"><font size="-2"><?= $data['no_hanger'] ?></font></td>
                     <td align="center"><font size="-2"><?= $data['lebar'] . 'x' . $data['gramasi']?></font></td>
                     <td align="center"><font size="-2"><?= $data['warna']?></font></td>
                     <td align="center"><font size="-2"><?= $data['qty_order']?></font></td>
                     <td align="center"><font size="-2"><?= $data['qty_claim_x']?></font></td>
                     <td align="center"><font size="-2"><?php 
                        $persentase = ($data['qty_claim_x'] / $data['qty_order']) * 100;
                        echo is_float($persentase) ? round($persentase, 2) : $persentase; echo '%';
                     ?></font></td>
                    <td align="center"><font size="-2"><?= $data['masalah_dominan'] ?></font></td>
                    <td align="center"><font size="-2"><?= $data['solusi']?></font></td>
                    <td align="center"><font size="-2">
                        <?php if (array_key_exists($key_bon, $no_bon[1])) {
                        $urutan = 1;
                        foreach ($no_bon[1][$key_bon] as $dbon) {
                            echo ($urutan > 1 ? '/' : '') . $dbon;
                            $urutan++;
                        }
                    }?></font></td>
                    <td align="center"><font size="-2">
                        <?php
                        if ($data['tgl_solusi_akhir'] != '0000-00-00' && $data['tgl_solusi_akhir'] != null && $data['tgl_solusi_akhir'] != '') {
                            echo $data['tgl_solusi_akhir'];}
                        ?>
                        </font></td>
                    <td align="center"><font size="-2"><?= $data['nama_nego']?></font></td>
                    <td align="center"><font size="-2"><?= $data['ket']?></font></td>
                    <td align="center"><?php 
                    if ($data['tgl_solusi_akhir'] != '0000-00-00' && $data['tgl_solusi_akhir'] != null && $data['tgl_solusi_akhir'] != '') {
                        if ($excell == 1) {
                            echo 'closed';
                        } else {
                            echo '<img width=15px src="../../dist/img/check_mark.png">';
                        }
                    }?></td>
                    <td align="center">
                        <?php
                        if (array_key_exists($key_bon, $no_bon[0])) {
                            $urutan = 1;
                            foreach ($no_bon[0][$key_bon] as $dbon) {
                                echo ($urutan > 1 ? '/' : '') . $dbon;
                                $urutan++;
                            }
                        }?>   
                    </td>
                    <td align="center"><font size="-2"><?= 'SAMPLE'?></font></td>
                </tr>
                <?php 
                $no++;
            } 
        }?>
            <?php 
            if($keterangan=="MAJOR"){
                foreach($majorTemp as $data1 => $data)
                {
                    $po = $data['po'];
                    $hanger =$data['no_hanger'];
                    $warna = $data['warna'];
                 
                    $key_bon = $po.'/'.$hanger.'/'.$warna;
            ?>
                     <tr>
                     <td align="center"><font size="-2"><?= $no ?></font></td>
                     <td align="center"><font size="-2"><?= $data['pelanggan']?></font></td>
                     <td align="center"><font size="-2"><?= explode('/', $data['langganan'])[1]?></font></td>
                     <td align="center"><font size="-2"><?= $data['po'] ?></font></td>
                     <td align="center"><font size="-2"><?= $data['no_hanger'] ?></font></td>
                     <td align="center"><font size="-2"><?= $data['lebar'] . 'x' . $data['gramasi']?></font></td>
                     <td align="center"><font size="-2"><?= $data['warna']?></font></td>
                     <td align="center"><font size="-2"><?= $data['qty_order']?></font></td>
                     <td align="center"><font size="-2"><?= $data['qty_claim_x']?></font></td>
                     <td align="center"><font size="-2"><?php 
                        $persentase = ($data['qty_claim_x'] / $data['qty_order']) * 100;
                        echo is_float($persentase) ? round($persentase, 2) : $persentase; echo '%';
                     ?></font></td>
                    <td align="center"><font size="-2"><?= $data['masalah_dominan'] ?></font></td>
                    <td align="center"><font size="-2"><?= $data['solusi']?></font></td>
                    <td align="center"><font size="-2">
                        <?php if (array_key_exists($key_bon, $no_bon[1])) {
                        $urutan = 1;
                        foreach ($no_bon[1][$key_bon] as $dbon) {
                            echo ($urutan > 1 ? '/' : '') . $dbon;
                            $urutan++;
                        }
                    }?></font></td>
                    <td align="center"><font size="-2">
                        <?php
                        if ($data['tgl_solusi_akhir'] != '0000-00-00' && $data['tgl_solusi_akhir'] != null && $data['tgl_solusi_akhir'] != '') {
                            echo $data['tgl_solusi_akhir'];}
                        ?>
                        </font></td>
                    <td align="center"><font size="-2"><?= $data['nama_nego']?></font></td>
                    <td align="center"><font size="-2"><?= $data['ket']?></font></td>
                    <td align="center"><?php 
                    if ($data['tgl_solusi_akhir'] != '0000-00-00' && $data['tgl_solusi_akhir'] != null && $data['tgl_solusi_akhir'] != '') {
                        if ($excell == 1) {
                            echo 'closed';
                        } else {
                            echo '<img width=15px src="../../dist/img/check_mark.png">';
                        }
                    }?></td>
                    <td align="center">
                        <?php
                        if (array_key_exists($key_bon, $no_bon[0])) {
                            $urutan = 1;
                            foreach ($no_bon[0][$key_bon] as $dbon) {
                                echo ($urutan > 1 ? '/' : '') . $dbon;
                                $urutan++;
                            }
                        }?>   
                    </td>
                    <td align="center"><font size="-2"><?= 'MAJOR'?></font></td>
                </tr>
                <?php 
                $no++;
            } 
        }?>
            <?php 
            if($keterangan=="REPEAT"){
                foreach($repeatTemp as $data1 => $data)
                {
                    $po = $data['po'];
                    $hanger =$data['no_hanger'];
                    $warna = $data['warna'];
                 
                    $key_bon = $po.'/'.$hanger.'/'.$warna;
            ?>
                     <tr>
                     <td align="center"><font size="-2"><?= $no ?></font></td>
                     <td align="center"><font size="-2"><?= $data['pelanggan']?></font></td>
                     <td align="center"><font size="-2"><?= explode('/', $data['langganan'])[1]?></font></td>
                     <td align="center"><font size="-2"><?= $data['po'] ?></font></td>
                     <td align="center"><font size="-2"><?= $data['no_hanger'] ?></font></td>
                     <td align="center"><font size="-2"><?= $data['lebar'] . 'x' . $data['gramasi']?></font></td>
                     <td align="center"><font size="-2"><?= $data['warna']?></font></td>
                     <td align="center"><font size="-2"><?= $data['qty_order']?></font></td>
                     <td align="center"><font size="-2"><?= $data['qty_claim_x']?></font></td>
                     <td align="center"><font size="-2"><?php 
                        $persentase = ($data['qty_claim_x'] / $data['qty_order']) * 100;
                        echo is_float($persentase) ? round($persentase, 2) : $persentase; echo '%';
                     ?></font></td>
                    <td align="center"><font size="-2"><?= $data['masalah_dominan'] ?></font></td>
                    <td align="center"><font size="-2"><?= $data['solusi']?></font></td>
                    <td align="center"><font size="-2">
                        <?php if (array_key_exists($key_bon, $no_bon[1])) {
                        $urutan = 1;
                        foreach ($no_bon[1][$key_bon] as $dbon) {
                            echo ($urutan > 1 ? '/' : '') . $dbon;
                            $urutan++;
                        }
                    }?></font></td>
                    <td align="center"><font size="-2">
                        <?php
                        if ($data['tgl_solusi_akhir'] != '0000-00-00' && $data['tgl_solusi_akhir'] != null && $data['tgl_solusi_akhir'] != '') {
                            echo $data['tgl_solusi_akhir'];}
                        ?>
                        </font></td>
                    <td align="center"><font size="-2"><?= $data['nama_nego']?></font></td>
                    <td align="center"><font size="-2"><?= $data['ket']?></font></td>
                    <td align="center"><?php 
                    if ($data['tgl_solusi_akhir'] != '0000-00-00' && $data['tgl_solusi_akhir'] != null && $data['tgl_solusi_akhir'] != '') {
                        if ($excell == 1) {
                            echo 'closed';
                        } else {
                            echo '<img width=15px src="../../dist/img/check_mark.png">';
                        }
                    }?></td>
                    <td align="center">
                        <?php
                        if (array_key_exists($key_bon, $no_bon[0])) {
                            $urutan = 1;
                            foreach ($no_bon[0][$key_bon] as $dbon) {
                                echo ($urutan > 1 ? '/' : '') . $dbon;
                                $urutan++;
                            }
                        }?>   
                    </td>
                    <td align="center"><font size="-2"><?php echo 'REPEAT';?></font></td>
                </tr>
                <?php 
                $no++;
            } 
        }
            ?>
      </table>
	</td>
    </tr>
	</tbody>
    <!-- <tr>
      <td><table width="100%" border="0" class="table-list1">
      <tr align="center">
        <td>&nbsp;</td>
        <td>Diserahkan Oleh :</td>
        <td>Diketahui Oleh :</td>
        <td> Diketahui Oleh :</td>
      </tr>
      <tr>
        <td>Nama</td>
        <td align="center"><input type=text name=nama placeholder="Ketik disini"></td>
        <td align="center"><input type=text name=nama1 placeholder="Ketik disini"></td>
        <td align="center"><input type=text name=nama2 placeholder="Ketik disini"></td>
      </tr>
      <tr>
        <td>Jabatan</td>
        <td align="center"><input type=text name=nama placeholder="Ketik disini"></td>
        <td align="center"><input type=text name=nama1 placeholder="Ketik disini"></td>
        <td align="center"><input type=text name=nama2 placeholder="Ketik disini"></td>
      </tr>
      <tr>
        <td>Tanggal</td>
        <td align="center">
          <?php //echo date("l, d F Y", strtotime($rTgl['tgl_skrg']));?>
        </td>
        <td align="center">
          <?php //echo date("l, d F Y", strtotime($rTgl['tgl_skrg']));?>
        </td>
        <td align="center">
          <?php //echo date("l, d F Y", strtotime($rTgl['tgl_skrg']));?>
        </td>
      </tr>
      <tr>
        <td height="60" valign="top">Tanda Tangan</td>
        <td>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
        </td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    </tr> -->

</table>


