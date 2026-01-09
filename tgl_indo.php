<?php
function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array(
		1 => 'Senin',
		'Selasa',
		'Rabu',
		'Kamis',
		'Jumat',
		'Sabtu',
		'Minggu'
	);

	$bulan = array(
		1 => 'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$split = explode('-', $tanggal);
	$split2 = explode(" ", $split[2]);
	$tgl_indo = $split2[0] . ' ' . $bulan[(int) $split[1]] . ' ' . $split[0] . ' ' . $split2[1];

	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}
?>