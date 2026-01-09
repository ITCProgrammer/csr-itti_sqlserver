<?PHP
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";

?>

<!DOCTYPE html
	PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Laporan Inspeksi</title>

</head>

<body>
	<?php
	$Awal = isset($_POST['awal']) ? $_POST['awal'] : '';
	$Akhir = isset($_POST['akhir']) ? $_POST['akhir'] : '';
	$Dept = isset($_POST['dept']) ? $_POST['dept'] : '';
	$Shift = isset($_POST['shift']) ? $_POST['shift'] : '';
	$GShift = isset($_POST['gshift']) ? $_POST['gshift'] : '';
	$Proses = isset($_POST['proses']) ? $_POST['proses'] : '';
	$jamA = isset($_POST['jam_awal']) ? $_POST['jam_awal'] : '';
	$jamAr = isset($_POST['jam_akhir']) ? $_POST['jam_akhir'] : '';
	$Buyer = isset($_POST['buyer']) ? $_POST['buyer'] : '';
	$Item = isset($_POST['no_item']) ? $_POST['no_item'] : '';
	if (strlen($jamA) == 5) {
		$start_date = $Awal . ' ' . $jamA;
	} else {
		$start_date = $Awal . ' 0' . $jamA;
	}
	if (strlen($jamAr) == 5) {
		$stop_date = $Akhir . ' ' . $jamAr;
	} else {
		$stop_date = $Akhir . ' 0' . $jamAr;
	}
	?>
	<div class="row">
		<div class="col-xs-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"> Filter Tanggal Inspeksi</h3>

				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
					<div class="box-body">
						<div class="form-group">
							<div class="col-sm-5">
								<div class="input-group date">
									<div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
									<input name="awal" type="text" class="form-control pull-right" id="datepicker"
										placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off" />
								</div>
							</div>
							<div class="col-sm-4">
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="jam_awal"
										placeholder="00:00" value="<?php echo $jamA; ?>" autocomplete="off">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
								<div>
								</div>
							</div>
							<!-- /.input group -->
						</div>

						<div class="form-group">
							<div class="col-sm-5">
								<div class="input-group date">
									<div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
									<input name="akhir" type="text" class="form-control pull-right" id="datepicker1"
										placeholder="Tanggal Akhir" value="<?php echo $Akhir; ?>" autocomplete="off" />
								</div>
							</div>
							<div class="col-sm-4">
								<div class="input-group">
									<input type="text" class="form-control timepicker" name="jam_akhir"
										placeholder="00:00" value="<?php echo $jamAr; ?>" autocomplete="off">
									<div class="input-group-addon">
										<i class="fa fa-clock-o"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-3">
								<select class="form-control select2" name="shift" id="shift" required>
									<option value="">Pilih</option>
									<option value="ALL" <?php if ($Shift == "ALL") {
										echo "SELECTED";
									} ?>>ALL</option>
									<option value="1" <?php if ($Shift == "1") {
										echo "SELECTED";
									} ?>>1</option>
									<option value="2" <?php if ($Shift == "2") {
										echo "SELECTED";
									} ?>>2</option>
									<option value="3" <?php if ($Shift == "3") {
										echo "SELECTED";
									} ?>>3</option>
									<option value="Non-Shift" <?php if ($Shift == "Non-Shift") {
										echo "SELECTED";
									} ?>>
										Non-Shift</option>
								</select>
							</div>
							<div class="col-sm-3">
								<select class="form-control select2" name="gshift" id="gshift" required>
									<option value="">Pilih</option>
									<option value="ALL" <?php if ($GShift == "ALL") {
										echo "SELECTED";
									} ?>>ALL</option>
									<option value="A" <?php if ($GShift == "A") {
										echo "SELECTED";
									} ?>>A</option>
									<option value="B" <?php if ($GShift == "B") {
										echo "SELECTED";
									} ?>>B</option>
									<option value="C" <?php if ($GShift == "C") {
										echo "SELECTED";
									} ?>>C</option>
									<option value="Non-Shift" <?php if ($GShift == "Non-Shift") {
										echo "SELECTED";
									} ?>>
										Non-Shift</option>
								</select>
							</div>
							<div class="col-sm-3">
								<input name="no_item" type="text" class="form-control" placeholder="No Item"
									value="<?php echo $Item; ?>" />
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-5">
								<select name="proses" class="form-control select2" id="proses" style="width: 100%">
									<option value="">Pilih</option>
									<?php
									$sqlKap = mysqli_query($con, "SELECT proses FROM tbl_proses ORDER BY proses ASC");
									while ($rK = mysqli_fetch_array($sqlKap)) {
										?>
										<option value="<?php echo $rK['proses']; ?>" <?php if ($Proses == $rK['proses']) {
											   echo "SELECTED";
										   } ?>>
											<?php echo $rK['proses']; ?>
										</option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-6">
								<select name="buyer" class="form-control select2" id="buyer" style="width: 100%">
									<option value="">Pilih</option>
									<?php
									$sqlBuyer = mysqli_query($con, "SELECT buyer FROM tbl_schedule  GROUP BY buyer");
									while ($rBy = mysqli_fetch_array($sqlBuyer)) {
										?>
										<option value="<?php echo $rBy['buyer']; ?>" <?php if ($Buyer == $rBy['buyer']) {
											   echo "SELECTED";
										   } ?>>
											<?php echo $rBy['buyer']; ?>
										</option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer">
						<div class="col-sm-2">
							<button type="submit" class="btn btn-social btn-linkedin btn-sm" name="save">Search <i
									class="fa fa-search"></i></button>
						</div>
					</div>
					<!-- /.box-footer -->
				</form>
			</div>
		</div>
		<div class="col-xs-8">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"> Rangkuman Inspeksi</h3>
					<?php if ($Awal != "") { ?>
						<div class="pull-right">
							<a href="pages/cetak/excel-rangkuman-inspeksi.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&dept=<?php echo $_POST['dept']; ?>&shift=<?php echo $_POST['shift']; ?>&gshift=<?php echo $_POST['gshift']; ?>&proses=<?php echo $_POST['proses']; ?>&buyer=<?php echo $_POST['buyer']; ?>&jam_awal=<?php echo $_POST['jam_awal']; ?>&jam_akhir=<?php echo $_POST['jam_akhir']; ?>"
								class="btn btn-primary <?php if ($_POST['awal'] == "") {
									echo "disabled";
								} ?>" target="_blank">Rangkuman Excel</a>
						</div>
					<?php } ?>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<table class="table table-bordered table-striped" style="width: 100%;">
					<thead class="bg-red">
						<tr>
							<th width="5%" rowspan="2">
								<div align="center">Shift</div>
							</th>
							<th width="14%" colspan="2">
								<div align="center">FIN</div>
							</th>
							<th width="14%" rowspan="2">
								<div align="center">PR</div>
							</th>
							<th width="10%" rowspan="2">
								<div align="center">Oven</div>
							</th>
							<th width="18%" rowspan="2">
								<div align="center">Pisah</div>
							</th>
							<th width="18%" rowspan="2">
								<div align="center">Perbaikan</div>
							</th>
							<th width="18%" rowspan="2">
								<div align="center">Kragh</div>
							</th>
							<th width="18%" colspan="2">
								<div align="center">ALL</div>
							</th>
							<th width="18%" rowspan="2">
								<div align="center">Inspektor</div>
							</th>
						</tr>
						<tr>
							<th width="14%">
								<div align="center">OK</div>
							</th>
							<th width="13%">
								<div align="center">X</div>
							</th>
							<th width="14%">
								<div align="center">Kg</div>
							</th>
							<th width="13%">
								<div align="center">Yard</div>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($Shift == "ALL") {
							$Wshift = " ";
						} else {
							$Wshift = " b.shift='$Shift' AND ";
						}
						if ($GShift == "ALL") {
							$WGshift = " ";
						} else {
							$WGshift = " b.g_shift='$GShift' AND ";
						}
						if ($Proses == "") {
							$WProses = " ";
						} else {
							$WProses = " b.proses='$Proses' AND ";
						}
						if ($Buyer != "") {
							$WBuyer = " AND b.buyer='$Buyer' ";
						} else {
							$WBuyer = " ";
						}
						if ($Item != "") {
							$WItem = " AND b.no_item='$Item' ";
						} else {
							$WItem = " ";
						}
						$qry1 = mysqli_query($con, "SELECT
	COUNT(DISTINCT a.personil) as inspektor,
	sum( a.qty ) AS bruto,
	sum( a.yard ) AS panjang,
  b.g_shift,
  	SUM(IF(c.status_produk = '1' AND (b.proses='Inspect Finish' OR b.proses='Inspect Packing' OR b.proses='Inspect White' OR b.proses='Inspect Qty Kecil'),a.qty,0)) AS `sts_ok`,
	SUM(IF(c.status_produk = '2' AND (b.proses='Inspect Finish' OR b.proses='Inspect Packing' OR b.proses='Inspect White' OR b.proses='Inspect Qty Kecil'),a.qty,0)) AS `sts_x`,	
	SUM(IF(c.status_produk = '3' AND (b.proses='Inspect Finish' OR b.proses='Inspect Packing' OR b.proses='Inspect White' OR b.proses='Inspect Qty Kecil'),a.qty,0)) AS `sts_pr`,
	sum(if(b.proses='Inspect Finish',a.qty,0)) as `sts_fin`,
	sum(if(b.proses='Inspect Oven',a.qty,0)) as `sts_oven`,	
	sum(if(b.proses='Pisah',a.qty,0)) as `sts_pisah`,
	sum(if(b.proses='Perbaikan' OR b.proses='Perbaikan Grade' OR b.proses='Tandai Defect' OR b.proses='Inspect Ulang (Setelah Perbaikan)',a.qty,0)) as `sts_perbaikan`,
	sum(if(b.proses='Kragh',a.qty,0)) as `sts_kragh`,
	sum(a.qty) as `sts_tot`,
	sum(a.yard) as `sts_yard`
FROM
	tbl_inspection a 
INNER JOIN tbl_schedule b ON a.id_schedule = b.id
INNER JOIN tbl_gerobak c ON c.id_schedule = b.id
WHERE
    $Wshift $WGshift $WProses
	DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
	AND '$stop_date' and a.`status`='selesai'
GROUP BY b.g_shift	");
						$totOKS = 0;
						$totXS = 0;
						$totPRS = 0;
						$totFINS = 0;
						$totOVENS = 0;
						$totPisahS = 0;
						$totPerbaikanS = 0;
						$totKraghS = 0;
						$totTOTS = 0;
						$totYardS = 0;
						$pOK = 0;
						$pX = 0;
						$pPR = 0;
						$pF = 0;
						$pO = 0;
						$pP = 0;
						$pPb = 0;
						$pKr = 0;
						$pT = 0;
						while ($row1 = mysqli_fetch_array($qry1)) {
							?>
							<tr valign="top" bgcolor="<?php echo $bgcolor; ?>">
								<td align="center">
									<?php echo $row1['g_shift']; ?>
								</td>
								<td align="right">
									<?php echo $row1['sts_ok']; ?>
								</td>
								<td align="right">
									<?php echo $row1['sts_x']; ?>
								</td>
								<td align="right">
									<?php echo $row1['sts_pr']; ?>
								</td>
								<!--<td align="right"><?php echo $row1['sts_fin']; ?></td>  -->
								<td align="right">
									<?php echo $row1['sts_oven']; ?>
								</td>
								<td align="right">
									<?php echo $row1['sts_pisah']; ?>
								</td>
								<td align="right">
									<?php echo $row1['sts_perbaikan']; ?>
								</td>
								<td align="right">
									<?php echo $row1['sts_kragh']; ?>
								</td>
								<td align="right">
									<?php echo $row1['sts_tot']; ?>
								</td>
								<td align="right">
									<?php echo $row1['sts_yard']; ?>
								</td>
								<td align="center">
									<?php echo $row1['inspektor']; ?>
								</td>
							</tr>
							<?php
							$totOKS += $row1['sts_ok'];
							$totXS += $row1['sts_x'];
							$totPRS += $row1['sts_pr'];
							$totFINS += $row1['sts_fin'];
							$totOVENS += $row1['sts_oven'];
							$totPisahS += $row1['sts_pisah'];
							$totPerbaikanS += $row1['sts_perbaikan'];
							$totKraghS += $row1['sts_kragh'];
							$totTOTS += $row1['sts_tot'];
							$totYardS += $row1['sts_yard'];

							$no++;
						}
						if ($Awal != "") {
							if ($totTOTS == 0) {
								$pOK = 0;
							} else {
								$pOK = round(($totOKS / $totTOTS) * 100, 2);
							}
							if ($totTOTS == 0) {
								$pX = 0;
							} else {
								$pX = round(($totXS / $totTOTS) * 100, 2);
							}
							if ($totTOTS == 0) {
								$pPR = 0;
							} else {
								$pPR = round(($totPRS / $totTOTS) * 100, 2);
							}
							if ($totTOTS == 0) {
								$pF = 0;
							} else {
								$pF = round(($totFINS / $totTOTS) * 100, 2);
							}
							if ($totTOTS == 0) {
								$pO = 0;
							} else {
								$pO = round(($totOVENS / $totTOTS) * 100, 2);
							}
							if ($totTOTS == 0) {
								$pP = 0;
							} else {
								$pP = round(($totPisahS / $totTOTS) * 100, 2);
							}
							if ($totTOTS == 0) {
								$pPb = 0;
							} else {
								$pPb = round(($totPerbaikanS / $totTOTS) * 100, 2);
							}
							if ($totTOTS == 0) {
								$pKr = 0;
							} else {
								$pKr = round(($totKraghS / $totTOTS) * 100, 2);
							}
							$pT = round($pF + $pO + $pP + $pPb + $pKr, 0);
						}
						?>
					</tbody>
					<tfoot>
						<tr valign="top" bgcolor="<?php echo $bgcolor; ?>">
							<td align="center">Tot</td>
							<td align="right">
								<?php echo $totOKS; ?>
							</td>
							<td align="right">
								<?php echo $totXS; ?>
							</td>
							<td align="right">
								<?php echo $totPRS; ?>
							</td>
							<!--<td align="right"><?php echo $totFINS; ?></td>-->
							<td align="right">
								<?php echo $totOVENS; ?>
							</td>
							<td align="right">
								<?php echo $totPisahS; ?>
							</td>
							<td align="right">
								<?php echo $totPerbaikanS; ?>
							</td>
							<td align="right">
								<?php echo $totKraghS; ?>
							</td>
							<td align="right">
								<?php echo $totTOTS; ?>
							</td>
							<td align="right">
								<?php echo $totYardS; ?>
							</td>
							<td align="center">&nbsp;</td>
						</tr>
						<tr valign="top" bgcolor="<?php echo $bgcolor; ?>">
							<td align="center">%</td>
							<td align="center">
								<?php echo $pOK; ?>
							</td>
							<td align="center">
								<?php echo $pX; ?>
							</td>
							<td align="center">
								<?php echo $pPR; ?>
							</td>
							<!-- <td align="center"><?php echo $pF; ?></td> -->
							<td align="center">
								<?php echo $pO; ?>
							</td>
							<td align="center">
								<?php echo $pP; ?>
							</td>
							<td align="center">
								<?php echo $pPb; ?>
							</td>
							<td align="center">
								<?php echo $pKr; ?>
							</td>
							<td align="center">
								<?php echo $pT; ?>
							</td>
							<td align="center">&nbsp;</td>
							<td align="center">&nbsp;</td>
						</tr>
						<?php
						//						$qrySI = mysqli_query($con, "SELECT SUM(bruto) AS kg, COUNT(*) AS sisa_kk FROM tbl_schedule WHERE NOT STATUS = 'selesai' AND `status`='antri mesin' AND NOT proses='Perbaikan'");
						$qrySI = mysqli_query($con, "SELECT SUM(bruto) AS kg, COUNT(*) AS sisa_kk FROM tbl_schedule WHERE NOT STATUS = 'selesai'");
						$rSI = mysqli_fetch_array($qrySI);
						$qrySPR = mysqli_query($con, "SELECT COUNT(*) AS kk_pr, SUM(a.bruto-b.qty) AS qty_pr
			FROM tbl_schedule a 
			LEFT JOIN tbl_inspection b ON a.id=b.id_schedule
			LEFT JOIN tbl_gerobak c ON a.id=c.id_schedule 
			WHERE DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
			AND '$stop_date' AND a.status='selesai' AND c.status_produk = '3'");
						$rSPR = mysqli_fetch_array($qrySPR);
						?>
						<tr valign="top" bgcolor="<?php echo $bgcolor; ?>">
							<td align="center" colspan="3">SISA SIAP INSPECT</td>
							<td align="left">
								<?php if ($_POST['awal'] != "") {
									echo $rSI['kg'];
								} else {
									echo "0";
								} ?>
							</td>
							<td align="left">
								<?php if ($_POST['awal'] != "") {
									echo $rSI['sisa_kk'] . " KK";
								} else {
									echo "0";
								} ?>
							</td>
							<td align="center" colspan="2">SISA PR</td>
							<td align="left" colspan="2">
								<?php if ($_POST['awal'] != "") {
									echo $rSPR['qty_pr'];
								} else {
									echo "0";
								} ?>
							</td>
							<td align="left" colspan="2">
								<?php if ($_POST['awal'] != "") {
									echo $rSPR['kk_pr'] . " KK";
								} else {
									echo "0";
								} ?>
							</td>
						</tr>
						<?php
						$qrySP = mysqli_query($con, "SELECT SUM(bruto) AS kg, COUNT(*) AS sisa_kk FROM tbl_schedule WHERE NOT STATUS = 'selesai' AND `status`='antri mesin' AND proses='Perbaikan'");
						$rSP = mysqli_fetch_array($qrySP);
						?>
						<tr valign="top" bgcolor="<?php echo $bgcolor; ?>">
							<td align="center" colspan="3">SISA SIAP INSPECT PERBAIKAN</td>
							<td align="left">
								<?php if ($_POST['awal'] != "") {
									echo $rSP['kg'];
								} else {
									echo "0";
								} ?>
							</td>
							<td align="left">
								<?php if ($_POST['awal'] != "") {
									echo $rSP['sisa_kk'] . " KK";
								} else {
									echo "0";
								} ?>
							</td>
							<td align="center" colspan="2"></td>
							<td align="left" colspan="2"></td>
							<td align="left" colspan="2"></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>

	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Data Inspeksi</h3><br>
					<?php if ($_POST['awal'] != "") { ?><b>Periode:
							<?php echo $start_date . " to " . $stop_date ?>
						</b>
					<?php } ?>
					<?php if ($_POST['awal'] != "") { ?>
						<div class="pull-right">
							<a href="pages/cetak/cetak_lap_inspeksi.php?&awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&jam_awal=<?php echo $jamA; ?>&jam_akhir=<?php echo $jamAr; ?>&shift=<?php echo $Shift; ?>&gshift=<?php echo $GShift; ?>&proses=<?php echo $Proses; ?>&buyer=<?php echo $Buyer; ?>"
								class="btn btn-danger " target="_blank" data-toggle="tooltip" data-html="true"
								title="Laporan Inspeksi"><i class="fa fa-print"></i> Cetak</a>
							<a href="pages/cetak/excel_lap_inspectnew.php?&awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>&jam_awal=<?php echo $jamA; ?>&jam_akhir=<?php echo $jamAr; ?>&shift=<?php echo $Shift; ?>&gshift=<?php echo $GShift; ?>&proses=<?php echo $Proses; ?>&buyer=<?php echo $Buyer; ?>"
								class="btn btn-success " target="_blank" data-toggle="tooltip" data-html="true"
								title="Laporan Inspeksi Harian New"><i class="fa fa-print"></i> Laporan Inspeksi Harian
								New</a>
						</div>
					<?php } ?>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-hover table-striped nowrap" id="example3"
						style="width:100%">
						<thead class="bg-blue">
							<tr>
								<th>
									<div align="center">No</div>
								</th>
								<th>
									<div align="center">Pelanggan</div>
								</th>
								<th>
									<div align="center">No Order</div>
								</th>
								<th>
									<div align="center">Jenis Kain</div>
								</th>
								<th>
									<div align="center">Warna</div>
								</th>
								<th>
									<div align="center">Tgl Pengiriman</div>
								</th>
								<th>
									<div align="center">Lot</div>
								</th>
								<th>
									<div align="center">No Item</div>
								</th>
								<th>
									<div align="center">Inspektor</div>
								</th>
								<th>
									<div align="center">No MC</div>
								</th>
								<th>
									<div align="center">Roll</div>
								</th>
								<th>
									<div align="center">Qty Bruto</div>
								</th>
								<th>
									<div align="center">Yard</div>
								</th>
								<th>
									<div align="center">Total Waktu</div>
								</th>
								<th>
									<div align="center">Tanggal Mulai</div>
								</th>
								<th>
									<div align="center">Tanggal Stop</div>
								</th>
								<th>
									<div align="center">Yard/Menit</div>
								</th>
								<th>
									<div align="center">Proses</div>
								</th>
								<th>
									<div align="center">Status</div>
								</th>
								<th>
									<div align="center">No Grobak</div>
								</th>
								<th>
									<div align="center">Cek Lembap FIN</div>
								</th>
								<th>
									<div align="center">Cek Lembap QCF</div>
								</th>
								<th>
									<div align="center">Catatan</div>
								</th>
								<th>
									<div align="center">Qty Loss</div>
								</th>
								<th>
									<div align="center">Note Loss</div>
								</th>
								<th>Nokk</th>
								<th>No Demand</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;

							$qry1 = mysqli_query($con, "SELECT
																	a.id as idins,
																	b.id as id_schedule,
																	a.catatan,
																	a.personil,
																	b.langganan,
																	b.buyer,
																	CONCAT(b.langganan,'/',b.buyer) as pelanggan,
																	b.po,
																	b.no_order,
																	b.jenis_kain,
																	b.warna,
																	b.lot,
																	b.no_item,
																	b.tgl_delivery,
																	b.no_mesin,
																	b.bruto,
																	b.rol,
																	a.jml_rol,
																	a.qty,
																	if(a.jml_rol>0,CONCAT(a.jml_rol,'x',a.qty),CONCAT(b.rol,'x',b.bruto)) as qty_bruto,
																	a.yard,
																	b.pjng_order,
																	b.tgl_mulai,
																	b.tgl_stop,
																	b.istirahat,
																	b.lembap_fin,
																	b.lembap_qcf,
																	b.nokk,
																	b.nodemand,
																	b.qty_loss,
																	b.note_loss,
																	a.catatan,
																	TIMESTAMPDIFF(
																	MINUTE,
																	b.tgl_mulai,b.tgl_stop) as waktu,
																	b.proses,
																	c.status_produk,
																	IF
																	( c.status_produk = '1', 'OK', IF(c.status_produk = '2', 'TK','PR')) AS sts,
																IF
																	(
																	NOT c.no_gerobak6 = '',
																	CONCAT( no_gerobak1, '+', no_gerobak2, '+', no_gerobak3, '+', no_gerobak4, '+', no_gerobak5, '+', no_gerobak6 ),
																IF
																	(
																	NOT c.no_gerobak5 = '',
																	CONCAT( no_gerobak1, '+', no_gerobak2, '+', no_gerobak3, '+', no_gerobak4, '+', no_gerobak5 ),
																IF
																	(
																	NOT c.no_gerobak4 = '',
																	CONCAT( no_gerobak1, '+', no_gerobak2, '+', no_gerobak3, '+', no_gerobak4 ),
																IF
																	(
																	NOT c.no_gerobak3 = '',
																	CONCAT( no_gerobak1, '+', no_gerobak2, '+', no_gerobak3 ),
																IF
																	(
																	NOT c.no_gerobak2 = '',
																	CONCAT( no_gerobak1, '+', no_gerobak2 ),
																IF
																	( NOT c.no_gerobak1 = '', c.no_gerobak1, '' ) 
																	) 
																	) 
																	) 
																	) 
																	) AS no_grobak 
																FROM
																	tbl_inspection a
																	INNER JOIN tbl_schedule b ON a.id_schedule = b.id
																	INNER JOIN tbl_gerobak c ON c.id_schedule = b.id
																WHERE
																	$Wshift $WGshift $WProses a.`status`='selesai' and
																	DATE_FORMAT( a.tgl_buat, '%Y-%m-%d %H:%i' ) BETWEEN '$start_date' 
																	AND '$stop_date' $WBuyer $WItem
																ORDER BY
																	a.id ASC");
							$totOk = 0;
							$totTk = 0;
							$totPr = 0;
							$totOkQ = 0;
							$totTkQ = 0;
							$totPrQ = 0;
							$totOkY = 0;
							$totTkY = 0;
							$totPrY = 0;
							$totF = 0;
							$totO = 0;
							$totPS = 0;
							$totFQ = 0;
							$totOQ = 0;
							$totPSQ = 0;
							$totFY = 0;
							$totOY = 0;
							$totPSY = 0;
							$okRol = 0;
							$okQty = 0;
							$okYrd = 0;
							$TkRol = 0;
							$TkQty = 0;
							$TkYrd = 0;
							$PrRol = 0;
							$PrQty = 0;
							$PrYrd = 0;
							$FRol = 0;
							$FQty = 0;
							$FYrd = 0;
							$ORol = 0;
							$OQty = 0;
							$OYrd = 0;
							$PSRol = 0;
							$PSQty = 0;
							$PSYrd = 0;
							while ($row1 = mysqli_fetch_array($qry1)) {
								$hourdiff = (int) $row1['waktu'] - (int) $row1['istirahat'];
								?>
								<tr valign="top" bgcolor="<?php echo $bgcolor; ?>">
									<td align="center">
										<?php echo $no; ?>
									</td>
									<td align="left">
										<?php echo $row1['pelanggan']; ?>
									</td>
									<td>
										<?php echo $row1['no_order']; ?>
									</td>
									<td>
										<?php echo $row1['jenis_kain']; ?>
									</td>
									<td align="left">
										<?php echo $row1['warna']; ?>
									</td>
									<td align="center">
										<?php echo $row1['tgl_delivery']; ?>
									</td>
									<td align="center">
										<?php echo $row1['lot']; ?>
									</td>
									<td align="center">
										<?php echo $row1['no_item']; ?>
									</td>
									<td align="center">
										<?php echo $row1['personil']; ?>
									</td>
									<td align="center">
										<?php echo $row1['no_mesin']; ?>
									</td>
									<td align="center">
										<?php if ($row1['jml_rol'] > 0) { ?>
											<a data-pk="<?php echo $row1['idins']; ?>"
												data-value="<?php echo $row1['jml_rol']; ?>" class="jml_roll_inspeksi"
												href="javascript:void(0)">
												<?php echo $row1['jml_rol']; ?>
											</a>
										<?php } else { ?>
											<a data-pk="<?php echo $row1['id_schedule']; ?>"
												data-value="<?php echo $row1['rol']; ?>" class="jml_roll_inspeksi2"
												href="javascript:void(0)">
												<?php echo $row1['rol']; ?>
											</a>
										<?php } ?>
									</td>
									<td align="center">
										<?php if ($row1['jml_rol'] > 0) { ?>
											<a data-pk="<?php echo $row1['idins']; ?>" data-value="<?php echo $row1['qty']; ?>" class="qty_inspeksi"
												href="javascript:void(0)">
												<?php echo $row1['qty']; ?>
											</a>
										<?php } else { ?>
											<a data-pk="<?php echo $row1['id_schedule']; ?>" data-value="<?php echo $row1['bruto']; ?>" class="qty_inspeksi2"
												href="javascript:void(0)">
												<?php echo $row1['bruto']; ?>
											</a>
										<?php } ?>
									</td>
									<td align="center">
										<?php if ($row1['yard'] > 0) { ?>
											<a data-pk="<?php echo $row1['idins']; ?>" data-value="<?php echo $row1['yard']; ?>" class="jml_yard_inspeksi"
												href="javascript:void(0)">
												<?php echo $row1['yard']; ?>
											</a>
										<?php } else { ?>
											<a data-pk="<?php echo $row1['id_schedule']; ?>" data-value="<?php echo $row1['pjng_order']; ?>" class="jml_yard_inspeksi2"
												href="javascript:void(0)">
												<?php echo $row1['pjng_order']; ?>
											</a>
										<?php } ?>
									</td>
									<td align="center">
										<?php echo $hourdiff; ?>
									</td>
									<td align="center">
										<?php echo $row1['tgl_mulai']; ?>
									</td>
									<td align="center">
										<?php echo $row1['tgl_stop']; ?>
									</td>
									<td align="center">
										<?php if ($hourdiff > 0) {
											echo round($row1['yard'] / $hourdiff, 2);
										} else {
											echo "0";
										} ?>
									</td>
									<td align="center">
										<?php echo $row1['proses']; ?>
									</td>
									<td align="center">
										<?php echo $row1['sts']; ?>
									</td>
									<td align="left">
										<?php echo $row1['no_grobak']; ?>
									</td>
									<td align="center">
										<?php echo $row1['lembap_fin']; ?>
									</td>
									<td align="center">
										<?php echo $row1['lembap_qcf']; ?>
									</td>
									<td>
										<?php echo $row1['catatan']; ?>
									</td>
									<td align="right"><?php echo $row1['qty_loss']; ?></td>
									<td align="left"><?php echo $row1['note_loss']; ?></td>
									<td>
										<?php echo $row1['nokk']; ?>
									</td>
									<td>
										<?php echo $row1['nodemand']; ?>
									</td>
									<td><a href="#" onclick="confirm_del('HapusIns-<?php echo $row1['idins'] ?>');" class="btn btn-xs btn-danger <?php if ($_SESSION['akses'] == "biasa" or $_SESSION['lvl_id'] != "INSPEKSI") {
										   echo "disabled";
									   } ?>"><i class="fa fa-trash"></i></a></td>
								</tr>
								<?php
								if ($row1['proses'] == "Inspect Finish" and $row1['status_produk'] == "1") {
									$okRol = (int) $row1['jml_rol'];
									$okQty = (int) $row1['qty'];
									$okYrd = (int) $row1['yard'];
								} else {
									$okRol = 0;
									$okQty = 0;
									$okYrd = 0;
								}
								if ($row1['proses'] == "Inspect Finish" and $row1['status_produk'] == "2") {
									$TkRol = (int) $row1['jml_rol'];
									$TkQty = (int) $row1['qty'];
									$TkYrd = (int) $row1['yard'];
								} else {
									$TkRol = 0;
									$TkQty = 0;
									$TkYrd = 0;
								}
								if ($row1['proses'] == "Inspect Finish" and $row1['status_produk'] == "3") {
									$PrRol = (int) $row1['jml_rol'];
									$PrQty = (int) $row1['qty'];
									$PrYrd = (int) $row1['yard'];
								} else {
									$PrRol = 0;
									$PrQty = 0;
									$PrYrd = 0;
								}
								if ($row1['proses'] == "Inspect Finish" and ($row1['status_produk'] == "1" or $row1['status_produk'] == "2")) {
									$FRol = (int) $row1['jml_rol'];
									$FQty = (int) $row1['qty'];
									$FYrd = (int) $row1['yard'];
								} else {
									$FRol = 0;
									$FQty = 0;
									$FYrd = 0;
								}
								if ($row1['proses'] == "Inspect Oven") {
									$ORol = (int) $row1['jml_rol'];
									$OQty = (int) $row1['qty'];
									$OYrd = (int) $row1['yard'];
								} else {
									$ORol = 0;
									$OQty = 0;
									$OYrd = 0;
								}
								if ($row1['proses'] == "Pisah") {
									$PSRol = (int) $row1['jml_rol'];
									$PSQty = (int) $row1['qty'];
									$PSYrd = (int) $row1['yard'];
								} else {
									$PSRol = 0;
									$PSQty = 0;
									$PSYrd = 0;
								}
								$totOk = $totOk + $okRol;
								$totTk = $totTk + $TkRol;
								$totPr = $totPr + $PrRol;
								$totOkQ = $totOkQ + $okQty;
								$totTkQ = $totTkQ + $TkQty;
								$totPrQ = $totPrQ + $PrQty;
								$totOkY = $totOkY + $okYrd;
								$totTkY = $totTkY + $TkYrd;
								$totPrY = $totPrY + $PrYrd;
								$totF = $totF + $FRol;
								$totO = $totO + $ORol;
								$totPS = $totPS + $PSRol;
								$totFQ = $totFQ + $FQty;
								$totOQ = $totOQ + $OQty;
								$totPSQ = $totPSQ + $PSQty;
								$totFY = $totFY + $FYrd;
								$totOY = $totOY + $FYrd;
								$totPSY = $totPSY + $PSYrd;
								$no++;
							} ?>
						</tbody>
						<tfoot>
							<tr valign="top" bgcolor="<?php echo $bgcolor; ?>">
								<td align="center">&nbsp;</td>
								<td align="left">&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td align="left">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="left">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr valign="top" bgcolor="<?php echo $bgcolor; ?>">
								<td align="center">&nbsp;</td>
								<td align="left"><strong>F</strong>=
									<?php echo $totF . "x" . $totFQ . " KGs"; ?>
								</td>
								<td>&nbsp;</td>
								<td align="left"><strong>OK</strong>=
									<?php echo $totOk . "x" . $totOkQ . " KGs"; ?>
								</td>
								<td align="left"><strong>PR</strong>=
									<?php echo $totPr . "x" . $totPrQ . " KGs"; ?>
								</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="left"><strong>F</strong>=
									<?php echo $totF . "x" . $totFY . " Yrds"; ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td align="left"><strong>OK</strong>=
									<?php echo $totOk . "x" . $totOkY . " Yrds"; ?>
								</td>
								<td align="left"><strong>PR</strong>=
									<?php echo $totPr . "x" . $totPrY . " Yrds"; ?>
								</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="right">&nbsp;</td>
								<td align="left">&nbsp;</td>
								<td align="left">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
							<tr valign="top" bgcolor="<?php echo $bgcolor; ?>">
								<td align="center">&nbsp;</td>
								<td align="left"><strong>O</strong>=
									<?php echo $totO . "x" . $totOQ . " KGs"; ?>
								</td>
								<td>&nbsp;</td>
								<td align="left"><strong>TK</strong>=
									<?php echo $totTk . "x" . $totTkQ . " KGs"; ?>
								</td>
								<td align="left"><strong>PS</strong>=
									<?php echo $totPS . "x" . $totPSQ . " KGs"; ?>
								</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="left"><strong>O</strong>=
									<?php echo $totO . "x" . $totOY . " Yrds"; ?>
								</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td align="left"><strong>TK</strong>=
									<?php echo $totTk . "x" . $totTkY . " Yrds"; ?>
								</td>
								<td align="left"><strong>PS</strong>=
									<?php echo $totPS . "x" . $totPSY . " Yrds"; ?>
								</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="right">&nbsp;</td>
								<td align="left">&nbsp;</td>
								<td align="left">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td align="center">&nbsp;</td>
								<td>&nbsp;</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Popup untuk delete-->
	<div class="modal fade" id="delLapIns" tabindex="-1">
		<div class="modal-dialog modal-sm">
			<div class="modal-content" style="margin-top:100px;">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
				</div>

				<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
					<a href="#" class="btn btn-danger" id="del_link">Delete</a>
					<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div id="StsEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="true"></div>
	<script>
		$(document).ready(function () {
			$('[data-toggle="tooltip"]').tooltip();
		});
		function confirm_del(delete_url) {
			$('#delLapIns').modal('show', {
				backdrop: 'static'
			});
			document.getElementById('del_link').setAttribute('href', delete_url);
		}
	</script>
</body>

</html>