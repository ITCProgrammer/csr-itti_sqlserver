<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$idkk = $_REQUEST['idkk'];
$act = $_GET['g'];
//-
$Tahun = $_GET['tahun'];
$Bulan = $_GET['bulan'];
$Dept = $_GET['dept'];
$Kategori = $_GET['kategori'];
$Cancel = $_GET['cancel'];
$qTgl = mysqli_query($con, "SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl = mysqli_fetch_array($qTgl);
if($Awal != "") {
	$tgl = substr($Awal, 0, 10);
	$jam = $Awal;
} else {
	$tgl = $rTgl['tgl_skrg'];
	$jam = $rTgl['jam_skrg'];
}
?>
<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="styles_cetak.css" rel="stylesheet" type="text/css">
	<title>Cetak Harian NCP</title>
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
			writing-mode: tb-rl;
			-webkit-transform: rotate(-90deg);
			-moz-transform: rotate(-90deg);
			-o-transform: rotate(-90deg);
			-ms-transform: rotate(-90deg);
			transform: rotate(180deg);
			white-space: nowrap;
			float: left;
		}

		input {
			text-align: center;
			border: hidden;
		}

		@media print {
			::-webkit-input-placeholder {
				/* WebKit browsers */
				color: transparent;
			}

			:-moz-placeholder {
				/* Mozilla Firefox 4 to 18 */
				color: transparent;
			}

			::-moz-placeholder {
				/* Mozilla Firefox 19+ */
				color: transparent;
			}

			:-ms-input-placeholder {
				/* Internet Explorer 10+ */
				color: transparent;
			}

			.pagebreak {
				page-break-before: always;
			}

			.header {
				display: block
			}

			table thead {
				display: table-header-group;
			}
		}
	</style>
</head>

<?php
if($Dept == "ALL") {
	$Wdept = " ";
} else {
	$Wdept = " dept='$Dept' AND ";
}
if($Kategori == "ALL") {
	$Wkategori = " ";
} else if($Kategori == "hitung") {
	$Wkategori = " ncp_hitung='ya' AND ";
} else if($Kategori == "gerobak") {
	$Wkategori = " kain_gerobak='ya' AND ";
} else if($Kategori == "tidakhitung") {
	$Wkategori = " ncp_hitung='tidak' AND ";
}
if($Cancel != "1") {
	$sts = " AND NOT `status`='Cancel' ";
} else {
	$sts = "  ";
}

$qryTotNNCP = mysqli_query($con, " SELECT count(x.no_ncp) as tot FROM
(SELECT no_ncp FROM tbl_ncp_qcf_now WHERE $Wdept $Wkategori 
no_ncp LIKE '".$Tahun."/".$Bulan."/%'  $sts GROUP BY no_ncp) x ");
$rNNCP = mysqli_fetch_array($qryTotNNCP);
$qryTotNCP = mysqli_query($con, " SELECT COUNT(no_ncp) as tot,max(revisi) as revisi FROM tbl_ncp_qcf_now WHERE $Wdept $Wkategori 
no_ncp LIKE '".$Tahun."/".$Bulan."/%'  $sts  ");
$rNCP = mysqli_fetch_array($qryTotNCP);
?>

<body>
	<table width="100%">
		<thead>
			<tr>
				<td>
					<table width="100%" border="1" class="table-list1">
						<tr>
							<td width="6%" align="center"><img src="indo.jpg" width="60" height="60" /></td>
							<td width="94%" align="center" valign="middle"><strong>
									<font size="+1">LAPORAN MASUK NCP</font>
								</strong></td>
						</tr>
					</table>
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td>Dept :
									<?php echo $_GET['dept']; ?><br />
									Kategori :
									<?php if($_GET['kategori'] == "gerobak") {
										echo "Kain diGerobak";
									} else if($_GET['kategori'] == "hitung") {
										echo "NCP diHitung";
									} else if($_GET['kategori'] == "tidakhitung") {
										echo "NCP Tidak Hitung";
									} else {
										echo "ALL";
									} ?><br />
									Periode :
									<?php echo tanggal_indo($_GET['tahun']."-".$_GET['bulan']); ?><br />
									Total No NCP:
									<?php echo $rNNCP['tot']; ?><br />
								</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</thead>
		<tr>
			<td>
				<table width="100%" border="1" class="table-list1">
					<tbody>
						<tr align="center">
							<td rowspan="2">DEPT</td>
							<?php if($rNCP['revisi'] >= "1") { ?>
								<td colspan="2">1X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "2") { ?>
								<td colspan="2">2X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "3") { ?>
								<td colspan="2">3X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "4") { ?>
								<td colspan="2">4X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "5") { ?>
								<td colspan="2">5X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "6") { ?>
								<td colspan="2">6X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "7") { ?>
								<td colspan="2">7X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "8") { ?>
								<td colspan="2">8X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "9") { ?>
								<td colspan="2">9X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "10") { ?>
								<td colspan="2">10X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "11") { ?>
								<td colspan="2">11X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "12") { ?>
								<td colspan="2">12X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "13") { ?>
								<td colspan="2">13X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "14") { ?>
								<td colspan="2">14X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "15") { ?>
								<td colspan="2">15X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "16") { ?>
								<td colspan="2">16X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "17") { ?>
								<td colspan="2">17X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "18") { ?>
								<td colspan="2">18X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "19") { ?>
								<td colspan="2">19X</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "20") { ?>
								<td colspan="2">20X</td>
							<?php } ?>
						</tr>
						<tr align="center">
							<?php if($rNCP['revisi'] >= "1") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "2") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "3") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "4") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "5") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "6") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "7") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "8") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "9") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "10") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "11") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "12") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "13") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "14") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "15") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "16") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "17") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "18") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "19") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "20") { ?>
								<td>KK</td>
								<td>%</td>
							<?php } ?>
						</tr>
						<?php
						function JmlNCP($revisi, $Aw, $Ak, $Wk, $St, $dept) {
							include "../../koneksi.php";
							$qryk1T = mysqli_query($con, "SELECT count(x.revisi) as jmlkk FROM
	(SELECT dept,no_ncp,revisi FROM tbl_ncp_qcf_now WHERE $Wk 
	no_ncp LIKE '".$Aw."/".$Ak."/%' $St 
	) x 
	WHERE x.revisi='$revisi' and x.dept='$dept'
	GROUP BY x.revisi");
							$rowk1T = mysqli_fetch_array($qryk1T);
							$jmlkk = round($rowk1T['jmlkk']);
							return $jmlkk;
						}
						$no = 1;
						$qry1 = mysqli_query($con, "SELECT dept FROM tbl_ncp_qcf_now WHERE $Wdept $Wkategori 
	no_ncp LIKE '".$Tahun."/".$Bulan."/%' $sts GROUP BY dept");
						while($row1 = mysqli_fetch_array($qry1)) {
							$k1x = JmlNCP("1", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']);
							$k2x = JmlNCP("2", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']);
							$k3x = JmlNCP("3", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']);
							$k4x = JmlNCP("4", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']);
							$k5x = JmlNCP("5", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']);
							$k6x = JmlNCP("6", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']);
							$k7x = JmlNCP("7", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']);
							$k8x = JmlNCP("8", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']);
							$k9x = JmlNCP("9", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']);
							$k10x = JmlNCP("10", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']);

							?>
							<tr valign="top">
								<td align="center">
									<?php echo $row1['dept']; ?>
								</td>
								<?php if($rNCP['revisi'] >= "1") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("1", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("1", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "2") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("2", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("2", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "3") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("3", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("3", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "4") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("4", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("4", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "5") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("5", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("5", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "6") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("6", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("6", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "7") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("7", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("7", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "8") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("8", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("8", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "9") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("9", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("9", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "10") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("10", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("10", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "11") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("11", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("11", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "12") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("12", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("12", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "13") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("13", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("13", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "14") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("14", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("14", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "15") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("15", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("15", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "16") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("16", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("16", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "17") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("17", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("17", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "18") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("18", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("18", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "19") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("19", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("19", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
								<?php if($rNCP['revisi'] >= "20") { ?>
									<td style="text-align: right">
										<?php echo JmlNCP("20", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']); ?>
									</td>
									<td style="text-align: right">
										<?php echo number_format(round(JmlNCP("20", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot'], 4) * 100, 2); ?>
									</td>
								<?php } ?>
							</tr>
							<?php $no++;
							$kk1 = $k1x + $kk1;
							$kk2 = $k2x + $kk2;
							$kk3 = $k3x + $kk3;
							$kk4 = $k4x + $kk4;
							$kk5 = $k5x + $kk5;
							$kk6 = $k6x + $kk6;
							$kk7 = $k7x + $kk7;
							$kk8 = $k8x + $kk8;
							$kk9 = $k9x + $kk9;
							$kk10 = $k10x + $kk10;
							$totKK1 = $totKK1 + number_format(round((JmlNCP("1", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot']) * 100, 2), 2);
							$totKK2 = $totKK2 + number_format(round((JmlNCP("2", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot']) * 100, 2), 2);
							$totKK3 = $totKK3 + number_format(round((JmlNCP("3", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot']) * 100, 2), 2);
							$totKK4 = $totKK4 + number_format(round((JmlNCP("4", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot']) * 100, 2), 2);
							$totKK5 = $totKK5 + number_format(round((JmlNCP("5", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot']) * 100, 2), 2);
							$totKK6 = $totKK6 + number_format(round((JmlNCP("6", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot']) * 100, 2), 2);
							$totKK7 = $totKK7 + number_format(round((JmlNCP("7", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot']) * 100, 2), 2);
							$totKK8 = $totKK8 + number_format(round((JmlNCP("8", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot']) * 100, 2), 2);
							$totKK9 = $totKK9 + number_format(round((JmlNCP("9", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot']) * 100, 2), 2);
							$totKK10 = $totKK10 + number_format(round((JmlNCP("10", $Tahun, $Bulan, $Wkategori, $sts, $row1['dept']) / $rNCP['tot']) * 100, 2), 2);

						} ?>
						<tr valign="top">
							<td align="right" style="text-align: left">TOTAL</td>
							<?php if($rNCP['revisi'] >= "1") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk1; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK1, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "2") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk2; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK2, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "3") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk3; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK3, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "4") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk4; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK4, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "5") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk5; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK5, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "6") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk6; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK6, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "7") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk7; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK7, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "8") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk8; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK8, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "9") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk9; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK9, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "10") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk10; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK10, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "11") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk11; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK11, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "12") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk12; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK12, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "13") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk13; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK13, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "14") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk14; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK14, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "15") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk15; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK15, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "16") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk16; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK16, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "17") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk17; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK17, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "18") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk18; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK18, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "19") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk19; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK19, 2); ?>
								</td>
							<?php } ?>
							<?php if($rNCP['revisi'] >= "20") { ?>
								<td align="right" style="text-align: right">
									<?php echo $kk20; ?>
								</td>
								<td align="right" style="text-align: right">
									<?php echo number_format($totKK20, 2); ?>
								</td>
							<?php } ?>
						</tr>

					</tbody>
				</table>
				<table width="200" border="1" class="table-list1">
					<tbody>
						<tr>
							<td width="57" style="text-align: center">NCP</td>
							<td width="81" style="text-align: center">TOTAL KK</td>
							<td width="40" style="text-align: center">%</td>
						</tr>
						<?php $qry1ncp = mysqli_query($con, "SELECT revisi,count(x.revisi) as jmlkk,dept,no_ncp  FROM
	(SELECT dept,no_ncp,max(revisi) as revisi FROM tbl_ncp_qcf_now WHERE $Wdept $Wkategori
	no_ncp LIKE '".$Tahun."/".$Bulan."/%' $sts
	group by no_ncp) x 
	GROUP BY x.revisi");
						$tKK = 0;
						while($row1ncp = mysqli_fetch_array($qry1ncp)) { ?>
							<tr>
								<td style="text-align: center">
									<?php echo $row1ncp['revisi']."X"; ?>
								</td>
								<td style="text-align: right">
									<?php echo $row1ncp['jmlkk']; ?>
								</td>
								<td style="text-align: right">
									<?php echo number_format((round($row1ncp['jmlkk'] / $rNNCP['tot'], 4) * 100), 2); ?>
								</td>
							</tr>
							<?php
							$tKK = $tKK + $row1ncp['jmlkk'];
						} ?>
						<tr>
							<td style="text-align: center">Total</td>
							<td style="text-align: right">
								<?php echo $tKK; ?>
							</td>
							<td style="text-align: right">&nbsp;</td>
						</tr>
					</tbody>
				</table>

			</td>
		</tr>

	</table>

	<script>
		//alert('cetak');window.print();
	</script>
</body>

</html>