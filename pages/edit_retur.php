<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
$idnsp=$_POST['idnsp'];
if ($_POST) {
	extract($_POST);
	$id = mysqli_real_escape_string($con,$_POST['id']);
    $kg=str_replace("'","''",$_POST['kg']);
	$pjg=str_replace("'","''",$_POST['pjg']);
	$satuan=str_replace("'","''",$_POST['satuan']);
	$roll=str_replace("'","''",$_POST['roll']);
	$ket=str_replace("'","''",$_POST['ket']);
	$sjreturplg=str_replace("'","''",$_POST['sjreturplg']);
	$tgl_sjretur=$_POST['tgl_sjretur'];
	$tgltrm_sjretur=$_POST['tgltrm_sjretur'];
	$sj_itti=str_replace("'","''",$_POST['sj_itti']);
	$tgl_sjitti=$_POST['tgl_sjitti'];
	$tgl_keputusan=$_POST['tgl_keputusan'];
    $qty_tu=str_replace("'","''",$_POST['qty_tu']);
	$ket=str_replace("'","''",$_POST['ket']);
	$nodemand_akj=str_replace("'","''",$_POST['nodemand_akj']);
    $sqlupdate=mysqli_query($con,"UPDATE `tbl_detail_retur_now` SET
		`sjreturplg`='$sjreturplg',
		`tgl_sjretur`='$tgl_sjretur',
		`tgltrm_sjretur`='$tgltrm_sjretur',
		`sj_itti`='$sj_itti',
		`tgl_sjitti`='$tgl_sjitti',
		`roll`='$roll',
		`kg`='$kg',
		`pjg`='$pjg',
		`satuan`='$satuan',
		`qty_tu`='$qty_tu',
		`ket`='$ket',
		`nodemand_ncp`='$_POST[nodemand_ncp]',
		`nodemand_akj`='$nodemand_akj',
		`tgl_keputusan`='$tgl_keputusan',
		`masalah_dominan`='$_POST[masalah_dominan]',
		`masalah`='$_POST[masalah]',
		`t_jawab`='$_POST[t_jawab]',
		`t_jawab1`='$_POST[t_jawab1]',
		`t_jawab2`='$_POST[t_jawab2]',
        `tgl_update`=now()
				WHERE `id`='$id' LIMIT 1");
    echo "<script>swal({
      title: 'Data Telah diUbah',
      text: 'Klik Ok untuk melanjutkan',
      type: 'success',
      }).then((result) => {
      if (result.value) {
        window.location='TambahDetailRetur-$idnsp';
      }
    });</script>";
}
