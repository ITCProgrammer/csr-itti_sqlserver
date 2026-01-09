<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
include "../../tgl_indo.php";
if ($_GET['id'] != "") {
	$qry = mysqli_query($con, "SELECT * FROM tbl_ncp_qcf_now WHERE id='$_GET[id]'");
} else {
	$qry = mysqli_query($con, "SELECT * FROM tbl_ncp_qcf_now WHERE no_ncp_gabungan='$_GET[no_ncp_gabungan]' ORDER BY revisi DESC ");
	//$qry=mysqli_query($con,"SELECT * FROM tbl_ncp_qcf_new WHERE no_ncp='$_GET[no_ncp]' and dept='$_GET[dept]' and nokk='$_GET[nokk]' and revisi='$_GET[revisi]' ORDER BY revisi DESC ");	
}
$d = mysqli_fetch_array($qry);

$nokk1 = $d['nodemand'];

$sqlDB2="SELECT
	p.DESCRIPTION
FROM
	PRODUCTIONDEMAND p
WHERE
	p.CODE = '$nokk1'";
$stmt=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
$rowdb2 = db2_fetch_assoc($stmt);

//RMP Benang
if (strpos($d['rmp_benang'], "Horizontal") > -1) {
	$rmpBng1 = "x";
} else {
	$rmpBng1 = "";
}
if (strpos($d['rmp_benang'], "Benang Kasar Halus") > -1) {
	$rmpBng2 = "x";
} else {
	$rmpBng2 = "";
}
if (strpos($d['rmp_benang'], "Bintik bintik Kapas") > -1) {
	$rmpBng3 = "x";
} else {
	$rmpBng3 = "";
}
if (strpos($d['rmp_benang'], "Gumpalan Kapas/Kapas Mati") > -1) {
	$rmpBng4 = "x";
} else {
	$rmpBng4 = "";
}
if (strpos($d['rmp_benang'], "Benang Lain Lot") > -1) {
	$rmpBng5 = "x";
} else {
	$rmpBng5 = "";
}
//RMP Rajut Knitting
if (strpos($d['rmp_rajut'], "Horizontal") > -1) {
	$rmpRjt1 = "x";
} else {
	$rmpRjt1 = "";
}
if ($d['salin'] != "" and $d['salinan'] != "") {
	$noncpG = $d['no_ncp'] . " " . $d['dept'] . "" . $d['revisi'] . " " . $d['salinan'] . "/" . $d['salin'];
} else {
	$noncpG = $d['no_ncp'] . " " . $d['dept'] . "" . $d['revisi'] . " " . $d['salinan'];
}
if ($d['m_proses'] != "") {
	$mPross = " / " . $d['m_proses'];
} else {
	$mPross = "";
}
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Form NCP</title>
	<link href="styles_cetak_ncp.css" rel="stylesheet" type="text/css">
</head>

<body>
	<table width="100%" border="0">
		<tbody>
			<tr>
				<td colspan="5" align="center">
					<font size="+1"><strong>FORMULIR PRODUK TIDAK SESUAI</strong></font>
				</td>
				<td rowspan="2" align="center">
					<table width="100%" border="0">
						<tbody>
							<tr>
								<td>No. Form</td>
								<td>: 04-01</td>
							</tr>
							<tr>
								<td>No. Revisi</td>
								<td>: 08</td>
							</tr>
							<tr>
								<td>Tgl. Terbit</td>
								<td>: 16 Januari 2023</td>
							</tr>
						</tbody>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="5" align="center">
					<font size="-1"><strong>No. NCP: <?php echo $noncpG; ?></strong></font>
				</td>
			</tr>
		</tbody>
	</table>
	<table border="0" width="100%">
		<tbody>
			<tr>
				<td colspan="2" align="left">TANGGAL: <?php echo tanggal_indo($d['tgl_buat'], true); ?></td>
				<td colspan="4" align="right">&nbsp;</td>
			</tr>
			<tr>
				<td width="12%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">PELANGGAN</td>
				<td width="45%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['langganan'] . "/" . $d['buyer']; ?></td>
				<td width="11%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">ROLL</td>
				<td width="9%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['rol']; ?></td>
				<td width="10%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">WEIGHT</td>
				<td width="13%" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['berat']; ?> kg</td>
			</tr>
			<tr>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">PO</td>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['po']; ?></td>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">LOT NO.</td>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['lot']; ?> / <?php echo trim($rowdb2['DESCRIPTION']);?></td>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">BATCH NO</td>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $nokk1; ?></td>
			</tr>
			<tr>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;height:">ORDER</td>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['no_order']; ?></td>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">PO RAJUT</td>
				<td colspan="3" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['po_rajut'] . " - " . $d['supp_rajut']; ?></td>
			</tr>
			<tr>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;height: 0.3in;">JENIS KAIN</td>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['no_hanger']; ?>/<?php echo $d['jenis_kain']; ?></td>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">NO. WARNA / WARNA</td>
				<td colspan="3" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['no_warna'] . "/" . $d['warna']; ?></td>
			</tr>
			<tr>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid; height: 0.4in;">PENYEBAB UTAMA</td>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['masalah'] . $mPross; ?></td>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">TTD Peninjau Awal</td>
				<td colspan="3" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
			</tr>
			<tr>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid; height: 0.4in;">PENYEBAB TAMBAHAN</td>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['masalah_tambahan']; ?></td>
				<td valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">LOKASI KAIN</td>
				<td colspan="3" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php echo $d['tempat']; ?></td>
			</tr>
		</tbody>
	</table>

	<table border="0" width="100%">
		<tbody>
			<tr>
				<td colspan="2" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">TTD Dept.<br>
					Penanggung Jawab</td>
				<td colspan="2" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Tindakan Penyelesaian</td>
				<td width="43%" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">KETERANGAN</td>
			</tr>
			<tr>
				<td width="11%" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Penyebab</td>
				<td width="11%" align="center" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Perbaikan</td>
				<td width="8%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
				<td width="27%" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Celup Ulang</td>
				<td rowspan="6" align="left" valign="top" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;"><?php if ($d['ncp_hitung'] == "ya") {
											echo "Hitung, ";
										} ?>
					<?php if ($d['ok_celupan'] != "") {
						echo "Warna OK Celupan " . $d['ok_celupan'] . " dan ";
					} ?>
					<?php echo $d['ket']; ?> <?= 'No. Register : '.$d['reg_no']; ?></td>
			</tr>
			<tr>
				<td rowspan="5" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
				<td rowspan="5" style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
				<td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
				<td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Cutting Loss</td>
			</tr>
			<tr>
				<td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
				<td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Masuk Gudang BB/BS</td>
			</tr>
			<tr>
				<td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
				<td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Finishing Ulang / Tarik Lebar</td>
			</tr>
			<tr>
				<td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
				<td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">Test Laboratorium</td>
			</tr>
			<tr>
				<td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
				<td style="border-top:1px #000000 solid; 
	border-bottom:1px #000000 solid;
	border-left:1px #000000 solid; 
	border-right:1px #000000 solid;">&nbsp;</td>
			</tr>
		</tbody>
	</table>
	<?php
	$qryckw = mysqli_query($con, "SELECT * FROM tbl_cocok_warna_dye WHERE `dept`='QCF' AND nokk='$nokk1' ORDER BY id DESC");
	$rowckw = mysqli_fetch_array($qryckw);
	?>
	<table border="0" width="100%">
		<tbody>
			<tr>
				<td width="12%" valign="top">
					<font size="-2">Lembar Warna :</font>
				</td>
				<td width="11%" height="12" valign="top">
					<font size="-2">1. Putih/ Asli</font>
				</td>
				<td width="25%" valign="top">
					<font size="-2">: Untuk QC</font>
				</td>
				<td width="8%" rowspan="3" valign="top">
					<font size="-2">Perhatian:</font>
				</td>
				<td width="44%" valign="top">
					<font size="-2">1. Bon ini hanya berlaku / dipakai dalam pabrik saja.</font>
				</td>
			</tr>
			<tr>
				<td width="12%" valign="top">&nbsp;</td>
				<td valign="top">
					<font size="-2">2. Kuning</font>
				</td>
				<td valign="top">
					<font size="-2">: Untuk Dept. Penyebab NCP</font>
				</td>
				<td valign="top">
					<font size="-2">2. Setiap kerusakan kain harus gunting contoh.</font>
				</td>
			</tr>
			<tr>
				<td width="12%" valign="top">&nbsp;</td>
				<td valign="top">
					<font size="-2">3. Hijau</font>
				</td>
				<td valign="top">
					<font size="-2">: Terlampir Pada Kartu Kerja, Untuk Arsip QC Setelah Tinjauan Akhir</font>
				</td>
				<td valign="top">&nbsp;</td>
			</tr>
			<tr>
				<td width="12%" valign="top">
					<font size="-2">Colorist : <?php echo $rowckw['colorist_dye']; ?> </font>
				</td>
				<td valign="top">&nbsp;</td>
				<td colspan="3" valign="top">&nbsp;</td>
			</tr>
			<tr>
				<td valign="top">
					<font size="-2">Mesin : <?php echo $rowckw['no_mesin']; ?></font>
				</td>
				<td valign="top">&nbsp;</td>
				<td colspan="3" valign="top">&nbsp;</td>
			</tr>
			<tr>
				<td valign="top">
					<font size="-2">Shift: </font>
				</td>
				<td valign="top">&nbsp;</td>
				<td colspan="3" valign="top">&nbsp;</td>
			</tr>
		</tbody>
	</table>
	<br>

</body>

</html>