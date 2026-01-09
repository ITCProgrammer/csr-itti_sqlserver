 <!DOCTYPE html>
<html>
<?php
ini_set("error_reporting", 1);
session_start();
?>
<head>
<style>
/* mengatur ukuran canvas tanda tangan  */
  canvas {
    border: 1px solid #ccc;
    border-radius: 0.5rem;
    width: 100%;
    height: 400px;
  }
</style>
</head>
<?php
include "koneksi.php";
$no_demand=$_GET['no_demand'];
$sqlDB2="SELECT
        TRIM(A.CODE) AS CODE,
        TRIM(C.PRODUCTIONORDERCODE) AS PRODUCTIONORDERCODE,
        BUSINESSPARTNER.LEGALNAME1 AS LANGGANAN,
        ORDERPARTNERBRAND.LONGDESCRIPTION AS BUYER,
        CASE
			WHEN SALESORDER.EXTERNALREFERENCE IS NULL THEN SALESORDERLINE.EXTERNALREFERENCE
			ELSE SALESORDER.EXTERNALREFERENCE
        END AS PO_NUMBER,
        TRIM(SALESORDERLINE.SALESORDERCODE) AS SALESORDERCODE,
        TRIM(D.NO_ITEM) AS NO_ITEM,
        TRIM(SALESORDERLINE.SUBCODE02) AS SUBCODE02,
        TRIM(SALESORDERLINE.SUBCODE03) AS SUBCODE03,
        SALESORDERLINE.ITEMDESCRIPTION,
        E.VALUEDECIMAL AS LEBAR,
        F.VALUEDECIMAL AS GRAMASI,
        G.WARNA,
        B.QTY_BRUTO_KG,
        B.QTY_BRUTO_YARD,
        A.EXTERNALREFERENCE,
        A.INTERNALREFERENCE
        FROM
            SALESORDER SALESORDER
        LEFT JOIN SALESORDERLINE SALESORDERLINE ON
            SALESORDER.CODE = SALESORDERLINE.SALESORDERCODE
        LEFT JOIN ORDERPARTNER ORDERPARTNER ON
            SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNER.CUSTOMERSUPPLIERCODE
        LEFT JOIN BUSINESSPARTNER BUSINESSPARTNER ON
            ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID = BUSINESSPARTNER.NUMBERID
        LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND ON
            SALESORDER.ORDERPARTNERBRANDCODE = ORDERPARTNERBRAND.CODE
            AND SALESORDER.FNCORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE
        LEFT JOIN (
        	SELECT
                PRODUCTIONDEMAND.CODE,
                PRODUCTIONDEMAND.TEMPLATECODE,
                PRODUCTIONDEMAND.EXTERNALREFERENCE,
                PRODUCTIONDEMAND.INTERNALREFERENCE,
                PRODUCTIONDEMAND.PROJECTCODE,
                PRODUCTIONDEMAND.ORIGDLVSALORDLINESALORDERCODE,
                PRODUCTIONDEMAND.ORIGDLVSALORDERLINEORDERLINE
            FROM
			    PRODUCTIONDEMAND PRODUCTIONDEMAND
            WHERE
                PRODUCTIONDEMAND.ITEMTYPEAFICODE = 'KFF') A ON
                SALESORDERLINE.SALESORDERCODE = A.ORIGDLVSALORDLINESALORDERCODE
                AND SALESORDERLINE.ORDERLINE = A.ORIGDLVSALORDERLINEORDERLINE
        LEFT JOIN (
          SELECT
	              PRODUCTIONRESERVATION.ORDERCODE,
	              SUM(PRODUCTIONRESERVATION.USERPRIMARYQUANTITY) AS QTY_BRUTO_KG,
	              PRODUCTIONRESERVATION.USERPRIMARYUOMCODE AS UOM_BAGIKAIN_KG,
	              SUM(PRODUCTIONRESERVATION.USERSECONDARYQUANTITY) AS QTY_BRUTO_YARD,
	              PRODUCTIONRESERVATION.USERSECONDARYUOMCODE AS UOM_BAGIKAIN_SECOND
	          FROM
	              PRODUCTIONRESERVATION PRODUCTIONRESERVATION
	          WHERE
	              (PRODUCTIONRESERVATION.ITEMTYPEAFICODE = 'KGF' OR PRODUCTIONRESERVATION.ITEMTYPEAFICODE = 'KFF')
	          GROUP BY
	              PRODUCTIONRESERVATION.ORDERCODE,
	              PRODUCTIONRESERVATION.USERPRIMARYUOMCODE,
	              PRODUCTIONRESERVATION.USERSECONDARYUOMCODE) B ON
            A.CODE = B.ORDERCODE
        LEFT JOIN (
            SELECT
                PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
                PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE
            FROM
                PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
            WHERE
                PRODUCTIONDEMANDSTEP.OPERATIONCODE = 'CNP1'
            GROUP BY
                PRODUCTIONDEMANDSTEP.PRODUCTIONORDERCODE,
                PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE) C ON
                A.CODE = C.PRODUCTIONDEMANDCODE
        LEFT JOIN (
            SELECT
                ORDERITEMORDERPARTNERLINK.ORDPRNCUSTOMERSUPPLIERCODE,
                ORDERITEMORDERPARTNERLINK.ITEMTYPEAFICODE,
                ORDERITEMORDERPARTNERLINK.SUBCODE01,
                ORDERITEMORDERPARTNERLINK.SUBCODE02,
                ORDERITEMORDERPARTNERLINK.SUBCODE03,
                ORDERITEMORDERPARTNERLINK.SUBCODE04,
                ORDERITEMORDERPARTNERLINK.SUBCODE05,
                ORDERITEMORDERPARTNERLINK.SUBCODE06,
                ORDERITEMORDERPARTNERLINK.SUBCODE07,
                ORDERITEMORDERPARTNERLINK.SUBCODE08,
                ORDERITEMORDERPARTNERLINK.SUBCODE09,
                ORDERITEMORDERPARTNERLINK.SUBCODE10,
                ORDERITEMORDERPARTNERLINK.LONGDESCRIPTION AS NO_ITEM
            FROM
                ORDERITEMORDERPARTNERLINK ORDERITEMORDERPARTNERLINK) D ON
                SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = D.ORDPRNCUSTOMERSUPPLIERCODE
                AND SALESORDERLINE.ITEMTYPEAFICODE = D.ITEMTYPEAFICODE
                AND SALESORDERLINE.SUBCODE01 = D.SUBCODE01
                AND SALESORDERLINE.SUBCODE02 = D.SUBCODE02
                AND SALESORDERLINE.SUBCODE03 = D.SUBCODE03
                AND SALESORDERLINE.SUBCODE04 = D.SUBCODE04
                AND SALESORDERLINE.SUBCODE05 = D.SUBCODE05
                AND SALESORDERLINE.SUBCODE06 = D.SUBCODE06
                AND SALESORDERLINE.SUBCODE07 = D.SUBCODE07
                AND SALESORDERLINE.SUBCODE08 = D.SUBCODE08
                AND SALESORDERLINE.SUBCODE09 = D.SUBCODE09
                AND SALESORDERLINE.SUBCODE10 = D.SUBCODE10
        LEFT JOIN (
            SELECT
                PRODUCT.SUBCODE01,
                PRODUCT.SUBCODE02,
                PRODUCT.SUBCODE03,
                PRODUCT.SUBCODE04,
                PRODUCT.SUBCODE05,
                PRODUCT.SUBCODE06,
                PRODUCT.SUBCODE07,
                PRODUCT.SUBCODE08,
                PRODUCT.SUBCODE09,
                PRODUCT.SUBCODE10,
                ADSTORAGE.VALUEDECIMAL
            FROM
                PRODUCT PRODUCT
            LEFT JOIN ADSTORAGE ADSTORAGE ON
                PRODUCT.ABSUNIQUEID = ADSTORAGE.UNIQUEID
            WHERE
                ADSTORAGE.NAMENAME = 'Width'
            GROUP BY
                PRODUCT.SUBCODE01,
                PRODUCT.SUBCODE02,
                PRODUCT.SUBCODE03,
                PRODUCT.SUBCODE04,
                PRODUCT.SUBCODE05,
                PRODUCT.SUBCODE06,
                PRODUCT.SUBCODE07,
                PRODUCT.SUBCODE08,
                PRODUCT.SUBCODE09,
                PRODUCT.SUBCODE10,
                ADSTORAGE.VALUEDECIMAL) E ON
            SALESORDERLINE.SUBCODE01 = E.SUBCODE01
            AND SALESORDERLINE.SUBCODE02 = E.SUBCODE02
            AND SALESORDERLINE.SUBCODE03 = E.SUBCODE03
            AND SALESORDERLINE.SUBCODE04 = E.SUBCODE04
            AND SALESORDERLINE.SUBCODE05 = E.SUBCODE05
            AND SALESORDERLINE.SUBCODE06 = E.SUBCODE06
            AND SALESORDERLINE.SUBCODE07 = E.SUBCODE07
            AND SALESORDERLINE.SUBCODE08 = E.SUBCODE08
            AND SALESORDERLINE.SUBCODE09 = E.SUBCODE09
            AND SALESORDERLINE.SUBCODE10 = E.SUBCODE10
        LEFT JOIN (
            SELECT
                PRODUCT.SUBCODE01,
                PRODUCT.SUBCODE02,
                PRODUCT.SUBCODE03,
                PRODUCT.SUBCODE04,
                PRODUCT.SUBCODE05,
                PRODUCT.SUBCODE06,
                PRODUCT.SUBCODE07,
                PRODUCT.SUBCODE08,
                PRODUCT.SUBCODE09,
                PRODUCT.SUBCODE10,
                ADSTORAGE.VALUEDECIMAL
            FROM
                PRODUCT PRODUCT
            LEFT JOIN ADSTORAGE ADSTORAGE ON
                PRODUCT.ABSUNIQUEID = ADSTORAGE.UNIQUEID
            WHERE
                ADSTORAGE.NAMENAME = 'GSM'
            GROUP BY
                PRODUCT.SUBCODE01,
                PRODUCT.SUBCODE02,
                PRODUCT.SUBCODE03,
                PRODUCT.SUBCODE04,
                PRODUCT.SUBCODE05,
                PRODUCT.SUBCODE06,
                PRODUCT.SUBCODE07,
                PRODUCT.SUBCODE08,
                PRODUCT.SUBCODE09,
                PRODUCT.SUBCODE10,
                ADSTORAGE.VALUEDECIMAL) F ON
            SALESORDERLINE.SUBCODE01 = F.SUBCODE01
            AND SALESORDERLINE.SUBCODE02 = F.SUBCODE02
            AND SALESORDERLINE.SUBCODE03 = F.SUBCODE03
            AND SALESORDERLINE.SUBCODE04 = F.SUBCODE04
            AND SALESORDERLINE.SUBCODE05 = F.SUBCODE05
            AND SALESORDERLINE.SUBCODE06 = F.SUBCODE06
            AND SALESORDERLINE.SUBCODE07 = F.SUBCODE07
            AND SALESORDERLINE.SUBCODE08 = F.SUBCODE08
            AND SALESORDERLINE.SUBCODE09 = F.SUBCODE09
            AND SALESORDERLINE.SUBCODE10 = F.SUBCODE10
        LEFT JOIN (
            SELECT
                ITXVIEWCOLOR.ITEMTYPECODE,
                ITXVIEWCOLOR.SUBCODE01,
                ITXVIEWCOLOR.SUBCODE02,
                ITXVIEWCOLOR.SUBCODE03,
                ITXVIEWCOLOR.SUBCODE04,
                ITXVIEWCOLOR.SUBCODE05,
                ITXVIEWCOLOR.SUBCODE06,
                ITXVIEWCOLOR.SUBCODE07,
                ITXVIEWCOLOR.SUBCODE08,
                ITXVIEWCOLOR.SUBCODE09,
                ITXVIEWCOLOR.SUBCODE10,
                ITXVIEWCOLOR.WARNA
            FROM
                ITXVIEWCOLOR ITXVIEWCOLOR) G ON
                SALESORDERLINE.ITEMTYPEAFICODE = G.ITEMTYPECODE
                AND SALESORDERLINE.SUBCODE01 = G.SUBCODE01
                AND SALESORDERLINE.SUBCODE02 = G.SUBCODE02
                AND SALESORDERLINE.SUBCODE03 = G.SUBCODE03
                AND SALESORDERLINE.SUBCODE04 = G.SUBCODE04
                AND SALESORDERLINE.SUBCODE05 = G.SUBCODE05
                AND SALESORDERLINE.SUBCODE06 = G.SUBCODE06
                AND SALESORDERLINE.SUBCODE07 = G.SUBCODE07
                AND SALESORDERLINE.SUBCODE08 = G.SUBCODE08
                AND SALESORDERLINE.SUBCODE09 = G.SUBCODE09
                AND SALESORDERLINE.SUBCODE10 = G.SUBCODE10
        WHERE A.CODE='$no_demand'";
		$stmt=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
		$row1=db2_fetch_assoc($stmt);
//GRAMASI
$posg=strpos($row1['GRAMASI'],".");
$valgramasi=substr($row1['GRAMASI'],0,$posg);
//LEBAR
$posl=strpos($row1['LEBAR'],".");
$vallebar=substr($row1['LEBAR'],0,$posl);
							  
if($_POST['save']=="save"){
	$keputusan=str_replace("'","''",$_POST['keputusan']);
	$file_foto = $_FILES['file_foto']['name'];
  $file_foto2 = $_FILES['file_foto2']['name'];
	// ambil data file
	$namaFile_foto = $_FILES['file_foto']['name'];
	$namaSementara_foto = $_FILES['file_foto']['tmp_name'];
  $namaFile_foto2 = $_FILES['file_foto2']['name'];
	$namaSementara_foto2 = $_FILES['file_foto2']['tmp_name'];
	// tentukan lokasi file akan dipindahkan
	$dirUpload = "dist/img-disposisinow/";
	// pindahkan file
	$terupload_foto = move_uploaded_file($namaSementara_foto, $dirUpload.$namaFile_foto);
  $terupload_foto2 = move_uploaded_file($namaSementara_foto2, $dirUpload.$namaFile_foto2);
		$qry1=mysqli_query($con,"INSERT INTO tbl_disposisi_now SET
		`no_demand`='$_POST[no_demand]',
		`prod_order`='$_POST[prod_order]',
		`langganan`='$_POST[langganan]',
		`buyer`='$_POST[buyer]',
		`no_po`='$_POST[no_po]',
		`no_order`='$_POST[no_order]',
		`no_item`='$_POST[no_item]',
		`article_group`='$_POST[article_group]',
		`article_code`='$_POST[article_code]',
		`jenis_kain`='$_POST[jenis_kain]',
		`lebar`='$_POST[lebar]',
		`gramasi`='$_POST[gramasi]',
		`warna`='$_POST[warna]',
		`qty_kg`='$_POST[qty_kg]',
		`qty_yard`='$_POST[qty_yard]',
		`ext_ref`='$_POST[ext_ref]',
		`int_ref`='$_POST[int_ref]',
		`masalah`='$_POST[masalah]',
		`keputusan`='$keputusan',
		`pejabat1`='$_POST[pejabat1]',
		`pejabat2`='$_POST[pejabat2]',
		`pejabat3`='$_POST[pejabat3]',
		`produksi`='$_POST[produksi]',
		`marketing`='$_POST[marketing]',
		`file_foto`='$file_foto',
    `file_foto2`='$file_foto2',
		`tgl_buat`=now(),
		`tgl_update`=now(),
		`no_hanger`='$_POST[no_hanger]'");	
		if($qry1){	
			echo "<script>swal({
			title: 'Data Telah diSimpan',   
			text: 'Klik Ok untuk input data kembali',
			type: 'success',
			}).then((result) => {
			if (result.value) {
				window.location.href='InputDisposisiDetail';
			}
			});</script>";
		}
	}
?>	
<?php 
include "koneksi.php";
$sqldis=mysqli_query($con," SELECT * FROM tbl_disposisi_now WHERE no_demand='$no_demand' ORDER BY tgl_buat ASC");
$cekdis=mysqli_num_rows($sqldis);
$rdis=mysqli_fetch_array($sqldis);
?>
<div class="box box-info">
 	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
		<div class="box-header with-border">
			<h3 class="box-title">Input Detail Disposisi</h3>
			<div class="box-tools pull-right">
      			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
  	</div>
  	<div class="box-body">
      <div class="col-md-6"> 
        <div class="form-group">
          <label for="no_demand" class="col-sm-2 control-label">No Demand</label>
          <div class="col-sm-6">
            <input name="no_demand" type="text" class="form-control" id="no_demand" 
            onchange="window.location='InputDisposisiDetail-'+this.value" value="<?php echo $_GET['no_demand'];?>" placeholder="No Demand" required >
            <input name="prod_order" type="hidden" class="form-control" id="prod_order" value="<?php echo $row1['PRODUCTIONORDERCODE'];?>" >
            <input name="langganan" type="hidden" class="form-control" id="langganan" value="<?php echo $row1['LANGGANAN'];?>" >
            <input name="buyer" type="hidden" class="form-control" id="buyer" value="<?php echo $row1['BUYER'];?>" >
            <input name="no_po" type="hidden" class="form-control" id="no_po" value="<?php echo $row1['PO_NUMBER'];?>" >
            <input name="no_order" type="hidden" class="form-control" id="no_order" value="<?php echo $row1['SALESORDERCODE'];?>" >
            <input name="no_item" type="hidden" class="form-control" id="no_item" value="<?php echo $row1['NO_ITEM'];?>" >
            <input name="article_group" type="hidden" class="form-control" id="article_group" value="<?php echo $row1['SUBCODE02'];?>" >
            <input name="article_code" type="hidden" class="form-control" id="article_code" value="<?php echo $row1['SUBCODE03'];?>" >
            <input name="jenis_kain" type="hidden" class="form-control" id="jenis_kain" value="<?php echo $row1['ITEMDESCRIPTION'];?>" >
            <input name="lebar" type="hidden" class="form-control" id="lebar" value="<?php echo $vallebar;?>" >
            <input name="gramasi" type="hidden" class="form-control" id="gramasi" value="<?php echo $valgramasi;?>" >
            <input name="warna" type="hidden" class="form-control" id="warna" value="<?php echo $row1['WARNA'];?>" >
            <input name="qty_kg" type="hidden" class="form-control" id="qty_kg" value="<?php echo number_format($row1['QTY_BRUTO_KG'],2);?>" >
            <input name="qty_yard" type="hidden" class="form-control" id="qty_yard" value="<?php echo number_format($row1['QTY_BRUTO_YARD'],2);?>" >
            <input name="ext_ref" type="hidden" class="form-control" id="ext_ref" value="<?php echo $row1['EXTERNAL_REFERENCE'];?>" >
            <input name="int_ref" type="hidden" class="form-control" id="int_ref" value="<?php echo $row1['INTERNAL_REFERENCE'];?>" >
            </div>  <font color="red"><?php if($cekdis>0){ echo "Sudah Input Pada Tgl: ".$rdis['tgl_buat']." | ";} ?></font>
        </div>
        <div class="form-group">
            <label for="masalah" class="col-sm-2 control-label">Masalah</label>
          <div class="col-sm-6">
            <div class="input-group">
              <select class="form-control select2" name="masalah" id="masalah">
                <option value="">Pilih</option>
                <?php 
                $qrym=mysqli_query($con,"SELECT masalah FROM tbl_masalah_aftersales_disposisi ORDER BY masalah ASC");
                while($rm=mysqli_fetch_array($qrym)){
                ?>
                <option value="<?php echo $rm['masalah'];?>"><?php echo $rm['masalah'];?></option>	
                <?php }?>
              </select>
              <?php if(@strtoupper($_SESSION['usrid']) != "INSPEKSI"){ ?>
              <span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataMasalah"> ...</button></span>
              <?php } ?>
            </div>				
          </div>
        </div>	
        <div class="form-group">
          <label for="keputusan" class="col-sm-2 control-label">Keputusan</label>
          <div class="col-sm-6">
            <textarea name="keputusan" required rows="3" class="form-control" id="keputusan" placeholder="Keputusan"></textarea>
          </div>				   
        </div>
        <div class="form-group">
          <label for="pejabat1" class="col-sm-2 control-label">Pejabat QC 1</label>
          <div class="col-sm-6">
            <div class="input-group">
              <select class="form-control select2" name="pejabat1" id="pejabat1">
                <option value="">Pilih</option>
                <?php 
                $qryp=mysqli_query($con,"SELECT nama FROM tbl_pejabat_disp_qc ORDER BY nama ASC");
                while($rp=mysqli_fetch_array($qryp)){
                ?>
                <option value="<?php echo $rp['nama'];?>"><?php echo $rp['nama'];?></option>	
                <?php }?>
              </select>
              <?php if(@strtoupper($_SESSION['usrid']) != "INSPEKSI"){ ?>
              <span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataPejabat"> ...</button></span>
              <?php } ?>
            </div>
          </div>
        </div>	  
        <div class="form-group">
          <label for="pejabat2" class="col-sm-2 control-label">Pejabat QC 2</label>
          <div class="col-sm-6">
            <div class="input-group">
              <select class="form-control select2" name="pejabat2" id="pejabat2">
                <option value="">Pilih</option>
                <?php 
                $qryp=mysqli_query($con,"SELECT nama FROM tbl_pejabat_disp_qc ORDER BY nama ASC");
                while($rp=mysqli_fetch_array($qryp)){
                ?>
                <option value="<?php echo $rp['nama'];?>"><?php echo $rp['nama'];?></option>	
                <?php }?>
              </select>
              <?php if(@strtoupper($_SESSION['usrid']) != "INSPEKSI"){ ?>
              <span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataPejabat"> ...</button></span>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="pejabat3" class="col-sm-2 control-label">Pejabat QC 3</label>
          <div class="col-sm-6">
            <div class="input-group">
              <select class="form-control select2" name="pejabat3" id="pejabat3">
                <option value="">Pilih</option>
                <?php 
                $qryp=mysqli_query($con,"SELECT nama FROM tbl_pejabat_disp_qc ORDER BY nama ASC");
                while($rp=mysqli_fetch_array($qryp)){
                ?>
                <option value="<?php echo $rp['nama'];?>"><?php echo $rp['nama'];?></option>	
                <?php }?>
              </select>
              <?php if(@strtoupper($_SESSION['usrid']) != "INSPEKSI"){ ?>
              <span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataPejabat"> ...</button></span>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="produksi" class="col-sm-2 control-label">Produksi</label>
          <div class="col-sm-6">
            <div class="input-group">
              <select class="form-control select2" name="produksi" id="produksi">
                <option value="">Pilih</option>
                <?php 
                $qrypr=mysqli_query($con,"SELECT nama FROM tbl_personil_produksi ORDER BY nama ASC");
                while($rpr=mysqli_fetch_array($qrypr)){
                ?>
                <option value="<?php echo $rpr['nama'];?>" ><?php echo $rpr['nama'];?></option>	
                <?php }?>
              </select>
              <?php if(@strtoupper($_SESSION['usrid']) != "INSPEKSI"){ ?>
              <span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataProduksi"> ...</button></span>
              <?php } ?>
            </div>
          </div>
        </div> 
        <div class="form-group">
          <label for="marketing" class="col-sm-2 control-label">Marketing</label>
          <div class="col-sm-6">
            <div class="input-group">
              <select class="form-control select2" name="marketing" id="marketing">
                <option value="">Pilih</option>
                <?php 
                $qrypm=mysqli_query($con,"SELECT nama FROM tbl_personil_mkt ORDER BY nama ASC");
                while($rpm=mysqli_fetch_array($qrypm)){
                ?>
                <option value="<?php echo $rpm['nama'];?>" ><?php echo $rpm['nama'];?></option>	
                <?php }?>
              </select>
              <?php if(@strtoupper($_SESSION['usrid']) != "INSPEKSI"){ ?>
              <span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataMKT"> ...</button></span>
              <?php } ?>
            </div>
          </div>
        </div>
			  <div class="form-group">
                <label for="file_foto" class="col-md-2 control-label">Upload Foto 1</label>
                <div class="col-sm-5">	  
                    <input type="file" id="file_foto" name="file_foto">
                    <span class="help-block with-errors"></span>
                </div>	  
            </div>
        <div class="form-group">
                <label for="file_foto2" class="col-md-2 control-label">Upload Foto 2</label>
                <div class="col-sm-5">	  
                    <input type="file" id="file_foto2" name="file_foto2">
                    <span class="help-block with-errors"></span>
                </div>	  
            </div>
      </div>
      <div class="col-md-6"> 
        <div class="form-group">
            <label for="text1" class="col-sm-2 control-label">Langganan</label>
            <div class="col-sm-6">
              <input name="langganan1" type="text" readonly class="form-control" id="langganan1" value="<?php if($row1['BUYER']!=""){echo $row1['LANGGANAN']."/".$row1['BUYER'];}?>" >
            </div>
        </div>
        <div class="form-group">
            <label for="text2" class="col-sm-2 control-label">Prod. Order</label>
            <div class="col-sm-6">
              <input name="prodorder1" type="text" readonly class="form-control" id="prodorder1" value="<?php echo $row1['PRODUCTIONORDERCODE'];?>" >
            </div>
        </div>
        <div class="form-group">
            <label for="text3" class="col-sm-2 control-label">No Order</label>
            <div class="col-sm-6">
              <input name="noorder1" type="text" readonly class="form-control" id="noorder1" value="<?php echo $row1['SALESORDERCODE'];?>" >
            </div>
        </div>
        <div class="form-group">
            <label for="text4" class="col-sm-2 control-label">PO</label>
            <div class="col-sm-6">
              <input name="po1" type="text" readonly class="form-control" id="po1" value="<?php echo $row1['PO_NUMBER'];?>" >
            </div>
        </div>
        <div class="form-group">
          <label for="text5" class="col-sm-2 control-label">Jenis Kain</label>
          <div class="col-sm-6">
            <textarea name="jnskain1" readonly rows="3" class="form-control" id="jnskain1" placeholder=""><?php echo $row1['ITEMDESCRIPTION'];?></textarea>
          </div>				   
        </div>
        <div class="form-group">
            <label for="text6" class="col-sm-2 control-label">Warna</label>
            <div class="col-sm-6">
              <input name="warna1" type="text" readonly class="form-control" id="warna1" value="<?php echo $row1['WARNA'];?>" >
            </div>
        </div>
		
		<div class="form-group">
					<label for="no_hanger" class="col-sm-2 control-label">No Item</label>
					<div class="col-sm-3">
						<input readonly name="read_no_item" type="text" class="form-control"  
						value="<?php echo $row1['NO_ITEM'];?>" placeholder="No Item"> 
					</div>		
		</div>
		
		<div class="form-group">
					<label for="no_hanger" class="col-sm-2 control-label">No Hanger</label>
					<div class="col-sm-3">
						<input readonly name="no_hanger" type="text" class="form-control" id="no_hanger" 
						value="<?php echo $row1['SUBCODE02'].$row1['SUBCODE03'];?>" placeholder="No Hanger"> 
					</div>		
		</div>
		
		
		</div>
<!-- /.box-footer -->
<!-- <div class="container">
    <div class="card">
      <div class="card-header">
        <b>Form Tanda Tangan</b>
      </div>
      <div class="card-body"> -->
        <!-- canvas tanda tangan  -->
        <!-- <canvas id="signature-pad" class="signature-pad"></canvas> -->
        <!-- tombol submit  -->
        <!-- <div style="float: left;">
          <button id="btn-submit" class="btn btn-primary">
            Submit
          </button>
        </div> -->
        <!-- <div style="float: right;"> -->
          <!-- tombol ganti warna  -->
          <!-- <button type="button" class="btn btn-success" id="change-color">
            Change Color
          </button> -->
          <!-- tombol undo  -->
          <!-- <button type="button" class="btn btn-warning" id="undo">
            <span class="fas fa-undo"></span>
              Undo
          </button> -->
          <!-- tombol hapus tanda tangan  -->
          <!-- <button type="button" class="btn btn-danger" id="clear">
            <span class="fas fa-eraser"></span>
              Clear
          </button>
        </div>
      </div>
    </div>
  </div> -->

<div class="box-footer">
	<?php if($_GET['no_demand']!=""){ ?> 	
		<button type="submit" class="btn btn-primary pull-right" name="save" value="save"><i class="fa fa-save"></i> Simpan</button> 
	<?php } ?>	   
</div>
</form>	 
</div>

<?php if($no_demand!=''){?>
<div class="row">
  	<div class="col-xs-12">
    	<div class="box">
        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form2">
			<div class="box-header with-border">
			</div>    
			<div class="box-body">		
				<table id="example3" class="table table-bordered table-hover table-striped nowrap" width="100%">
					<thead class="bg-green">
					<tr>
						<th width="48" rowspan="2"><div align="center">No</div></th>
						<th width="60" rowspan="2"><div align="center">Masalah</div></th>
						<th width="301" rowspan="2"><div align="center">Keputusan</div></th>
						<th width="343" colspan="3"><div align="center">Pejabat QC</div></th>
						<th width="331" rowspan="2"><div align="center">Produksi</div></th>
						<th width="331" rowspan="2"><div align="center">Marketing</div></th>
						<th width="331" rowspan="2"><div align="center">File Foto</div></th>
						<th width="331" rowspan="2"><div align="center">Tgl Buat</div></th>
						<th width="331" rowspan="2"><div align="center">Tgl Update</div></th>
					</tr>
					<tr>
						<th width="50" ><div align="center">Pejabat 1</div></th>
						<th width="50"><div align="center">Pejabat 2</div></th>
						<th width="50"><div align="center">Pejabat 3</div></th>
					</tr>
					</thead>
				<tbody>
					<?php 
					include "koneksi.php";
					$sql=mysqli_query($con," SELECT * FROM tbl_disposisi_now WHERE no_demand='$no_demand' ORDER BY tgl_buat ASC");
					$no=1;
					while($r=mysqli_fetch_array($sql)){
					$no++;
					$bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';	  
					?>
						<tr bgcolor="<?php echo $bgcolor; ?>">
							<td align="center"><a href="#" class="edit_disposisinow" id="<?php echo $r['id'] ?>"><?php echo $no; ?></a></td>
							<td align="center"><?php echo $r['masalah']; ?></td>
							<td align="center"><?php echo $r['keputusan']; ?></td>
							<td align="left"><?php echo $r['pejabat1']; ?></td>
							<td align="left"><?php echo $r['pejabat2']; ?></td>
							<td align="left"><?php echo $r['pejabat3']; ?></td>
							<td align="left"><?php echo $r['produksi']; ?></td>
							<td align="left"><?php echo $r['marketing']; ?></td>
							<td align="left"><?php echo $r['file_foto']; ?></td>
							<td align="left"><?php echo $r['tgl_buat']; ?></td>
							<td align="left"><?php echo $r['tgl_update']; ?></td>
						</tr>   
					<?php 
						}
					?>
				</tbody>   
				</table> 
					<div id="EditDisposisiNow" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	
					</div>
    		</div>
            </form>
		</div>
	</div>
	<?php }?>
  
<div class="modal fade" id="modal_del" tabindex="-1" >
  	<div class="modal-dialog modal-sm" >
    	<div class="modal-content" style="margin-top:100px;">
      		<div class="modal-header">
				<button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" style="text-align:center;">Are you sure to delete all data ?</h4>
      		</div>

      		<div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        		<a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        		<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      		</div>
    	</div>
  	</div>
</div>
<div class="modal fade" id="DataPejabat">
          <div class="modal-dialog ">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pejabat</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id">
                  <div class="form-group">
                  <label for="nama" class="col-md-3 control-label">Nama Pejabat</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="nama" name="nama" required>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>		    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<input type="submit" value="Simpan" name="simpan_pejabat" id="simpan_pejabat" class="btn btn-primary pull-right" >  
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>
<?php 
if($_POST['simpan_pejabat']=="Simpan"){
	$nama=strtoupper($_POST['nama']);
	$sqlData1=mysqli_query($con,"INSERT INTO tbl_pejabat_disp_qc SET 
		  nama='$nama'");
	if($sqlData1){	
	echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='InputDisposisiDetail';
	 
  }
});</script>";
		}
}
?>

<div class="modal fade" id="DataProduksi">
          <div class="modal-dialog ">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Personil Produksi</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id">
                  <div class="form-group">
                  <label for="nama" class="col-md-3 control-label">Nama Personil</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="nama" name="nama" required>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>		    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<input type="submit" value="Simpan" name="simpan_personil" id="simpan_personil" class="btn btn-primary pull-right" >  
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>
<?php 
if($_POST['simpan_personil']=="Simpan"){
	$nama=strtoupper($_POST['nama']);
	$sqlData1=mysqli_query($con,"INSERT INTO tbl_personil_produksi SET 
		  nama='$nama'");
	if($sqlData1){	
	echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='InputDisposisiDetail';
	 
  }
});</script>";
		}
}
?>

<div class="modal fade" id="DataMKT">
          <div class="modal-dialog ">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Personil Marketing</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id">
                  <div class="form-group">
                  <label for="nama" class="col-md-3 control-label">Nama Personil</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="nama" name="nama" required>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>		    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<input type="submit" value="Simpan" name="simpan_mkt" id="simpan_mkt" class="btn btn-primary pull-right" >  
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>
<?php 
if($_POST['simpan_mkt']=="Simpan"){
	$nama=strtoupper($_POST['nama']);
	$sqlData1=mysqli_query($con,"INSERT INTO tbl_personil_mkt SET 
		  nama='$nama'");
	if($sqlData1){	
	echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='InputDisposisiDetail';
	 
  }
});</script>";
		}
}
?>
<div class="modal fade" id="DataMasalah">
          <div class="modal-dialog ">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Masalah Dominan</h4>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="id" name="id">
                  <div class="form-group">
                  <label for="masalah_dominan" class="col-md-3 control-label">Jenis Masalah</label>
                  <div class="col-md-6">
                  <input type="text" class="form-control" id="masalah_dominan" name="masalah_dominan" required>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div>		    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				<input type="submit" value="Simpan" name="simpan_masalah" id="simpan_masalah" class="btn btn-primary pull-right" >  
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>
<?php 
if($_POST['simpan_masalah']=="Simpan"){
	$masalah=strtoupper($_POST['masalah_dominan']);
	$sqlData1=mysqli_query($con,"INSERT INTO tbl_masalah_aftersales_disposisi SET 
		  masalah='$masalah'");
	if($sqlData1){	
	echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
         window.location.href='InputDisposisiDetail';
	 
  }
});</script>";
		}
}
?>
<script>
            // script di dalam ini akan dijalankan pertama kali saat dokumen dimuat
            document.addEventListener('DOMContentLoaded', function () {
                resizeCanvas();
            })
    
            //script ini berfungsi untuk menyesuaikan tanda tangan dengan ukuran canvas
            function resizeCanvas() {
                var ratio = Math.max(window.devicePixelRatio || 1, 1);
                canvas.width = canvas.offsetWidth * ratio;
                canvas.height = canvas.offsetHeight * ratio;
                canvas.getContext("2d").scale(ratio, ratio);
            }
    
    
            var canvas = document.getElementById('signature-pad');
    
            //warna dasar signaturepad
            var signaturePad = new SignaturePad(canvas, {
                backgroundColor: 'rgb(255, 255, 255)'
            });
    
            //saat tombol clear diklik maka akan menghilangkan seluruh tanda tangan
            document.getElementById('clear').addEventListener('click', function () {
                signaturePad.clear();
            });
    
            //saat tombol undo diklik maka akan mengembalikan tanda tangan sebelumnya
            document.getElementById('undo').addEventListener('click', function () {
                var data = signaturePad.toData();
                if (data) {
                    data.pop(); // remove the last dot or line
                    signaturePad.fromData(data);
                }
            });
    
            //saat tombol change color diklik maka akan merubah warna pena
            document.getElementById('change-color').addEventListener('click', function () {
    
                //jika warna pena biru maka buat menjadi hitam dan sebaliknya
                if(signaturePad.penColor == "rgba(0, 0, 255, 1)"){
    
                    signaturePad.penColor = "rgba(0, 0, 0, 1)";
                }else{
                    signaturePad.penColor = "rgba(0, 0, 255, 1)";
                }
            })
    
            //fungsi untuk menyimpan tanda tangan dengan metode ajax
            $(document).on('click', '#btn-submit', function () {
                var signature = signaturePad.toDataURL();
    
                $.ajax({
                    url: "proses.php",
                    data: {
                        foto: signature,
                    },
                    method: "POST",
                    success: function () {
                        location.reload();
                        alert('Tanda Tangan Berhasil Disimpan');
                    }
    
                })
            })
        </script>
<script type="text/javascript">
    function confirm_delete(delete_url)
    {
      $('#modal_del').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>
