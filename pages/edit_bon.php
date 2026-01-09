<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
$idnsp = $_POST['idnsp'];
if ($_POST) {
  extract($_POST);  	
  $id = mysqli_real_escape_string($con,$_POST['id']);
  $analisa =mysqli_real_escape_string($con,$_POST['analisa']);
  $pencegahan =mysqli_real_escape_string($con,$_POST['pencegahan']);
  $kg1 =mysqli_real_escape_string($con,$_POST['kg1']);
  $kg2 =mysqli_real_escape_string($con,$_POST['kg2']);
  $kg3 =mysqli_real_escape_string($con,$_POST['kg3']);
  $pjg1 =mysqli_real_escape_string($con,$_POST['pjg1']);
  $pjg2 =mysqli_real_escape_string($con,$_POST['pjg2']);
  $pjg3 =mysqli_real_escape_string($con,$_POST['pjg3']);
  $satuan1 =mysqli_real_escape_string($con,$_POST['satuan1']);
  $satuan2 =mysqli_real_escape_string($con,$_POST['satuan2']);
  $satuan3 =mysqli_real_escape_string($con,$_POST['satuan3']);
  $tjawab =mysqli_real_escape_string($con,$_POST['t_jawab']);
  $tjawab1 =mysqli_real_escape_string($con,$_POST['t_jawab1']);
  $tjawab2 =mysqli_real_escape_string($con,$_POST['t_jawab2']);
  $persen =mysqli_real_escape_string($con,$_POST['persen']);
  $persen1 =mysqli_real_escape_string($con,$_POST['persen1']);
  $persen2 =mysqli_real_escape_string($con,$_POST['persen2']);
  $qty_email =mysqli_real_escape_string($con,$_POST['qty_email']);
  $pjg_email =mysqli_real_escape_string($con,$_POST['pjg_email']);
  $satuan_email =mysqli_real_escape_string($con,$_POST['satuan_email']);
  $masalah= mysqli_real_escape_string($con,$_POST['masalah']);
  $sub_defect= mysqli_real_escape_string($con,$_POST['sub_defect']);
  $adm_itti = mysqli_real_escape_string($con,$_POST['adm_itti']);	
  $checkbox1=$_POST['penyebab'];
  $chkp="";
    foreach($checkbox1 as $chk1)  
   		  {  
      		$chkp .= $chk1.",";  
        }
    $sqlupdate=mysqli_query($con,"UPDATE `tbl_ganti_kain_now` SET
		`analisa`='$analisa',
        `pencegahan`='$pencegahan',
        `kg1`='$kg1',
        `kg2`='$kg2',
        `kg3`='$kg3',
        `pjg1`='$pjg1',
        `pjg2`='$pjg2',
        `pjg3`='$pjg3',
        `satuan1`='$satuan1',
        `satuan2`='$satuan2',
        `satuan3`='$satuan3',
        `t_jawab`='$tjawab',
        `t_jawab1`='$tjawab1',
        `t_jawab2`='$tjawab2',
        `persen`='$persen',
        `persen1`='$persen1',
        `persen2`='$persen2',
        `qty_email`='$qty_email',
        `pjg_email`='$pjg_email',
        `satuan_email`='$satuan_email',
        `masalah`='$masalah',
        `sub_defect`='$sub_defect',
        `sebab`='$chkp'
				WHERE `id`='$id' LIMIT 1");
	if($adm_itti=="Ya"){
	$cek = mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE id='$idnsp'");
	$rc = mysqli_fetch_array($cek);
	$cek1 = mysqli_query($con,"SELECT * FROM tbl_ganti_kain_now WHERE id_nsp='$idnsp' and id='$id'");
	$rc1 = mysqli_fetch_array($cek1);	
	$jeniskain = str_replace("'","''",$rc1['jenis_kain']);	
	$masalah = str_replace("'","''",$rc1['masalah']);
	$styl = str_replace("'","''",$rc1['styl']);	
	$alasan = $rc1['alasan'];
	$bon = $rc1['no_bon'];	
		
	$cekadm1 = mysqli_query($conadm,"SELECT * FROM tbl_gantikain WHERE id_nsp='$idnsp'");
	$rcadm1 = mysqli_fetch_array($cekadm1);
	$rcRow = mysqli_num_rows($cekadm1);
	$po = str_replace("'","''", $rc['po']);
	$warna = str_replace("'","''", $rc['warna']);
	$no_warna = str_replace("'","''", $rc['no_warna']);
	if($rcRow>0){
		// Update existing data in tbl_gantikain
		$sqladmITTI = mysqli_query($conadm, "UPDATE `tbl_gantikain` SET
		`nokk`='$rc[nokk]',
		`nodemand`='$rc[nodemand]',
		`langganan`='$rc[pelanggan]',
		`no_order`='$rc[no_order]',
		`po`='$po',
		`no_hanger`='$rc[no_hanger]',
		`no_item`='$rc[no_item]',
		`satuan_o`='$rc[satuan_o]',
		`warna`='$warna',
		`no_warna`='$no_warna',
		`lot`='$rc[lot]',
		`lebar`='$rc1[lebar]',
		`gramasi`='$rc1[gramasi]',
		`sebab`='$chkp',
		`masalah`='$masalah',
		`jenis_kain`='$jeniskain',
		`styl`='$styl',
		`qty_order`='$rc1[qty_order]',
		`t_jawab`='$rc1[t_jawab]',
		`t_jawab1`='$rc1[t_jawab1]',
		`t_jawab2`='$rc1[t_jawab2]',
		`persen`='$rc1[persen]',
		`persen1`='$rc1[persen1]',
		`persen2`='$rc1[persen2]',
		`kategori`='1',
		`dept`='CSR',
		`tgl_update`=now(),
		`update_csr`='1'
		WHERE `id_nsp`='$idnsp'");
	}else{
		// Insert new data into tbl_gantikain
		$sqladmITTI=mysqli_query($conadm,"INSERT INTO `tbl_gantikain` SET
		`nokk`='$rc[nokk]',
		`nodemand`='$rc[nodemand]',
		`langganan`='$rc[pelanggan]',
		`no_order`='$rc[no_order]',
		`po`='$po',
		`no_hanger`='$rc[no_hanger]',
		`no_item`='$rc[no_item]',
		`satuan_o`='$rc[satuan_o]',
		`warna`='$warna',
		`no_warna`='$no_warna',
		`lot`='$rc[lot]',
		`lebar`='$rc1[lebar]',
		`gramasi`='$rc1[gramasi]',
		`sebab`='$chkp',
		`masalah`='$masalah',
		`jenis_kain`='$jeniskain',
		`styl`='$styl',
		`qty_order`='$rc1[qty_order]',
		`t_jawab`='$rc1[t_jawab]',
		`t_jawab1`='$rc1[t_jawab1]',
		`t_jawab2`='$rc1[t_jawab2]',
		`persen`='$rc1[persen]',
		`persen1`='$rc1[persen1]',
		`persen2`='$rc1[persen2]',
		`kategori`='1',
		`dept`='CSR',
		`tgl_buat`=now(),
		`tgl_update`=now(),
		`update_csr`='1',
		`id_nsp`='$idnsp'
		");
	}
		
		$cekadm = mysqli_query($conadm,"SELECT * FROM tbl_gantikain WHERE id_nsp='$idnsp'");
	    $rcadm = mysqli_fetch_array($cekadm);
		// Insert or update tbl_bonkain by id_nsp_gk
		$cekBon = mysqli_query($conadm, "SELECT id FROM tbl_bonkain WHERE id_nsp_gk='$id'");
		if(mysqli_num_rows($cekBon) > 0){
			$sqladmITTIBON = mysqli_query($conadm, "UPDATE `tbl_bonkain` SET
			`warna1`='$rc1[warna1]',
			`warna2`='$rc1[warna2]',
			`warna3`='$rc1[warna3]',
			`kg1`='$rc1[kg1]',
			`kg2`='$rc1[kg2]',
			`kg3`='$rc1[kg3]',
			`pjg1`='$rc1[pjg1]',
			`pjg2`='$rc1[pjg2]',
			`pjg3`='$rc1[pjg3]',
			`satuan1`='$rc1[satuan1]',
			`satuan2`='$rc1[satuan2]',
			`satuan3`='$rc1[satuan3]',
			`alasan`='$alasan',
			`tgl_update`=now(),
			`id_nsp`='$rcadm[id]'
			WHERE `id_nsp_gk`='$id'");
		}else{
			$sqladmITTIBON=mysqli_query($conadm,"INSERT INTO `tbl_bonkain` SET
			`no_bon`='$bon/CSR',
			`warna1`='$rc1[warna1]',
			`warna2`='$rc1[warna2]',
			`warna3`='$rc1[warna3]',
			`kg1`='$rc1[kg1]',
			`kg2`='$rc1[kg2]',
			`kg3`='$rc1[kg3]',
			`pjg1`='$rc1[pjg1]',
			`pjg2`='$rc1[pjg2]',
			`pjg3`='$rc1[pjg3]',
			`satuan1`='$rc1[satuan1]',
			`satuan2`='$rc1[satuan2]',
			`satuan3`='$rc1[satuan3]',
			`alasan`='$alasan',
			`tgl_buat`=now(),
			`tgl_update`=now(),
			`id_nsp`='$rcadm[id]',
			`id_nsp_gk`='$id'
			");
		}
		
	}
    echo "<script>swal({
      title: 'Data Telah diUbah',
      text: 'Klik Ok untuk melanjutkan',
      type: 'success',
      }).then((result) => {
      if (result.value) {
        window.location='TambahBon-$idnsp';
      }
    });</script>";
}
