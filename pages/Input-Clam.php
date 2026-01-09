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
  $no_demand = $_GET['no_demand'];
  $sqlDB2 = "SELECT
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
  $stmt = db2_exec($conn1, $sqlDB2, array('cursor' => DB2_SCROLLABLE));
  $row1 = db2_fetch_assoc($stmt);


  if (isset($_POST['save']) && $_POST['save'] === "save") {
    // Sanitize inputs
    $nama_cv      = isset($_POST['nama_cv']) ? mysqli_real_escape_string($con, $_POST['nama_cv']) : '';
    $ket          = isset($_POST['ket']) ? mysqli_real_escape_string($con, $_POST['ket']) : '';
    $invoice_date = isset($_POST['invoice_date']) ? trim($_POST['invoice_date']) : '';
    $total        = isset($_POST['total']) ? (float)$_POST['total'] : 0;
    $harga        = isset($_POST['harga']) ? (float)$_POST['harga'] : 0;
    $total_harga  = isset($_POST['total_harga']) ? (float)$_POST['total_harga'] : 0;
    $no_demand_p  = isset($_POST['no_demand']) ? mysqli_real_escape_string($con, $_POST['no_demand']) : '';
    $prod_order_p = isset($_POST['prod_order']) ? mysqli_real_escape_string($con, $_POST['prod_order']) : '';
    $langganan_p  = isset($_POST['langganan']) ? mysqli_real_escape_string($con, $_POST['langganan']) : '';
    $buyer_p      = isset($_POST['buyer']) ? mysqli_real_escape_string($con, $_POST['buyer']) : '';
    $no_order_p   = isset($_POST['no_order']) ? mysqli_real_escape_string($con, $_POST['no_order']) : '';
    $no_po_p      = isset($_POST['no_po']) ? mysqli_real_escape_string($con, $_POST['no_po']) : '';
    $jenis_kain_p = isset($_POST['jenis_kain']) ? mysqli_real_escape_string($con, $_POST['jenis_kain']) : '';
    $warna_p      = isset($_POST['warna']) ? mysqli_real_escape_string($con, $_POST['warna']) : '';
    $no_item_p    = isset($_POST['no_item']) ? mysqli_real_escape_string($con, $_POST['no_item']) : '';
    $no_hanger_p  = isset($_POST['no_hanger']) ? mysqli_real_escape_string($con, $_POST['no_hanger']) : '';

    // handle files (foto1, foto2)
    $foto1_name = isset($_FILES['foto1']['name']) ? $_FILES['foto1']['name'] : '';
    $foto2_name = isset($_FILES['foto2']['name']) ? $_FILES['foto2']['name'] : '';
    $tmp1 = isset($_FILES['foto1']['tmp_name']) ? $_FILES['foto1']['tmp_name'] : '';
    $tmp2 = isset($_FILES['foto2']['tmp_name']) ? $_FILES['foto2']['tmp_name'] : '';
    $dirUpload = "dist/img-disposisinow/";
    if ($foto1_name !== '' && $tmp1 !== '') { @move_uploaded_file($tmp1, $dirUpload.$foto1_name); }
    if ($foto2_name !== '' && $tmp2 !== '') { @move_uploaded_file($tmp2, $dirUpload.$foto2_name); }

        // Siapkan invoice_date untuk SQL (NULL jika kosong)
        $invoice_date_sql = ($invoice_date !== '') ? "'".mysqli_real_escape_string($con, $invoice_date)."'" : "NULL";

        // Insert bergaya input-detail-disposisi-now.php
        $qry1 = mysqli_query($con, "INSERT INTO reports_claim SET
        `no_demand`='".$no_demand_p."',
        `prod_order`='".$prod_order_p."',
        `nama_cv`='".$nama_cv."',
        `ket`='".$ket."',
        `invoice_date`=".$invoice_date_sql.",
        `total`=".$total.",
        `harga`=".$harga.",
        `total_harga`=".$total_harga.",
        `foto1`='".$foto1_name."',
        `foto2`='".$foto2_name."',
        `langganan`='".$langganan_p."',
        `buyer`='".$buyer_p."',
        `no_order`='".$no_order_p."',
        `no_po`='".$no_po_p."',
        `jenis_kain`='".$jenis_kain_p."',
        `warna`='".$warna_p."',
        `no_item`='".$no_item_p."',
        `no_hanger`='".$no_hanger_p."',
        `tgl_buat`=now(),
        `tgl_update`=now()");

        if ($qry1) {
          echo "<script>swal({
                title: 'Data Telah diSimpan',
                text: 'Klik Ok untuk input data kembali',
                type: 'success',
            });</script>";
        } else {
          error_log('Insert reports_claim gagal: '.mysqli_error($con));
          echo "<script>swal({title:'Gagal menyimpan data', text:'Periksa tabel reports_claim dan data input.', type:'error'});</script>";
        }
    }
  ?>
 <?php 
include "koneksi.php";
$sqldis=mysqli_query($con," SELECT * FROM reports_claim WHERE no_demand='$no_demand' ORDER BY tgl_buat ASC");
$cekdis=mysqli_num_rows($sqldis);
$rdis=mysqli_fetch_array($sqldis);
  ?>
 <div class="box box-info">
   <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
     <div class="box-header with-border">
       <h3 class="box-title">Input Data</h3>
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
               onchange="window.location='InputClaim-'+this.value" value="<?php echo $_GET['no_demand']; ?>" placeholder="No Demand" required>
             <input name="prod_order" type="hidden" class="form-control" id="prod_order" value="<?php echo $row1['PRODUCTIONORDERCODE']; ?>">
             <input name="langganan" type="hidden" class="form-control" id="langganan" value="<?php echo $row1['LANGGANAN']; ?>">
             <input name="buyer" type="hidden" class="form-control" id="buyer" value="<?php echo $row1['BUYER']; ?>">
             <input name="no_po" type="hidden" class="form-control" id="no_po" value="<?php echo $row1['PO_NUMBER']; ?>">
             <input name="no_order" type="hidden" class="form-control" id="no_order" value="<?php echo $row1['SALESORDERCODE']; ?>">
             <input name="no_item" type="hidden" class="form-control" id="no_item" value="<?php echo $row1['NO_ITEM']; ?>">
             <input name="article_group" type="hidden" class="form-control" id="article_group" value="<?php echo $row1['SUBCODE02']; ?>">
             <input name="article_code" type="hidden" class="form-control" id="article_code" value="<?php echo $row1['SUBCODE03']; ?>">
             <input name="jenis_kain" type="hidden" class="form-control" id="jenis_kain" value="<?php echo $row1['ITEMDESCRIPTION']; ?>">
             <input name="warna" type="hidden" class="form-control" id="warna" value="<?php echo $row1['WARNA']; ?>">
             <div><font color="red"><?php if($cekdis>0){ echo "Sudah Input Pada Tgl: ".$rdis['tgl_buat']." | ";} ?></font></div>
            </div>
         </div>
         <div class="form-group">
           <label for="nama_cv" class="col-sm-2 control-label">Nama CV</label>
           <div class="col-sm-6">
             <div class="input-group">
                        <select class="form-control select2" name="nama_cv" id="nama_cv">
                <option value="">Pilih</option>
                <?php 
                $tblNamaCv = mysqli_query($con, "SHOW TABLES LIKE 'nama_cv'");
                if ($tblNamaCv && mysqli_num_rows($tblNamaCv) > 0) {
                    $qrym = mysqli_query($con, "SELECT nama_cv FROM nama_cv ORDER BY nama_cv ASC");
                    if ($qrym) {
                        while ($rm = mysqli_fetch_assoc($qrym)) {
                ?>
                <option value="<?php echo $rm['nama_cv'];?>"><?php echo $rm['nama_cv'];?></option>	
                <?php 
                        }
                    }
                } 
                ?>
              </select>
                 <span class="input-group-btn"><button type="button" class="btn btn-default" data-toggle="modal" data-target="#DataCV"> ...</button></span>
             </div>
           </div>
         </div>
         <div class="form-group">
           <label for="ket" class="col-sm-2 control-label">Keterangan</label>
           <div class="col-sm-6">
             <textarea name="ket" rows="3" class="form-control" id="ket" placeholder="Keterangan"></textarea>
           </div>
         </div>
         <div class="form-group">
           <label for="invoice_date" class="col-sm-2 control-label">Invoice Date</label>
           <div class="col-sm-6">
             <input type="date" class="form-control" id="invoice_date" name="invoice_date" placeholder="YYYY-MM-DD">
           </div>
         </div>
         <div class="form-group">
           <label for="total" class="col-sm-2 control-label">Total</label>
           <div class="col-sm-6">
             <input type="number"  class="form-control" id="total" name="total" >
           </div>
         </div>
         <div class="form-group">
           <label for="harga" class="col-sm-2 control-label">Harga</label>
           <div class="col-sm-6">
             <input type="number"  class="form-control" id="harga" name="harga" placeholder="Rupiah">
           </div>
         </div>
         <div class="form-group">
           <label for="total_harga" class="col-sm-2 control-label">Total Harga</label>
           <div class="col-sm-6">
             <input type="number"  class="form-control" id="total_harga" name="total_harga" placeholder="Rupiah" >
           </div>
         </div>
         <div class="form-group">
           <label for="foto1" class="col-md-2 control-label">Upload Foto 1</label>
           <div class="col-sm-5">
             <input type="file" id="foto1" name="foto1">
             <span class="help-block with-errors"></span>
           </div>
         </div>
         <div class="form-group">
           <label for="foto2" class="col-md-2 control-label">Upload Foto 2</label>
           <div class="col-sm-5">
             <input type="file" id="foto2" name="foto2">
             <span class="help-block with-errors"></span>
           </div>
         </div>
       </div>
       <div class="col-md-6">
         <div class="form-group">
           <label for="text1" class="col-sm-2 control-label">Langganan</label>
           <div class="col-sm-6">
             <input name="langganan1" type="text" readonly class="form-control" id="langganan1" value="<?php if ($row1['BUYER'] != "") {
                                                                                                          echo $row1['LANGGANAN'] . "/" . $row1['BUYER'];
                                                                                                        } ?>">
           </div>
         </div>
         <div class="form-group">
           <label for="text2" class="col-sm-2 control-label">Prod. Order</label>
           <div class="col-sm-6">
             <input name="prodorder1" type="text" readonly class="form-control" id="prodorder1" value="<?php echo $row1['PRODUCTIONORDERCODE']; ?>">
           </div>
         </div>
         <div class="form-group">
           <label for="text3" class="col-sm-2 control-label">No Order</label>
           <div class="col-sm-6">
             <input name="noorder1" type="text" readonly class="form-control" id="noorder1" value="<?php echo $row1['SALESORDERCODE']; ?>">
           </div>
         </div>
         <div class="form-group">
           <label for="text4" class="col-sm-2 control-label">PO</label>
           <div class="col-sm-6">
             <input name="po1" type="text" readonly class="form-control" id="po1" value="<?php echo $row1['PO_NUMBER']; ?>">
           </div>
         </div>
         <div class="form-group">
           <label for="text5" class="col-sm-2 control-label">Jenis Kain</label>
           <div class="col-sm-6">
             <textarea name="jnskain1" readonly rows="3" class="form-control" id="jnskain1" placeholder=""><?php echo $row1['ITEMDESCRIPTION']; ?></textarea>
           </div>
         </div>
         <div class="form-group">
           <label for="text6" class="col-sm-2 control-label">Warna</label>
           <div class="col-sm-6">
             <input name="warna1" type="text" readonly class="form-control" id="warna1" value="<?php echo $row1['WARNA']; ?>">
           </div>
         </div>

         <div class="form-group">
           <label for="no_hanger" class="col-sm-2 control-label">No Item</label>
           <div class="col-sm-3">
             <input readonly name="read_no_item" type="text" class="form-control"
               value="<?php echo $row1['NO_ITEM']; ?>" placeholder="No Item">
           </div>
         </div>

         <div class="form-group">
           <label for="no_hanger" class="col-sm-2 control-label">No Hanger</label>
           <div class="col-sm-3">
             <input readonly name="no_hanger" type="text" class="form-control" id="no_hanger"
               value="<?php echo $row1['SUBCODE02'] . $row1['SUBCODE03']; ?>" placeholder="No Hanger">
           </div>
         </div>
       </div>
       <div class="box-footer">
         <?php if ($_GET['no_demand'] != "") { ?>
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
						<th><div align="center">No</div></th>
						<th><div align="center">No Demand</div></th>
						<th><div align="center">No Production Order</div></th>
						<th><div align="center">Langganan</div></th>
						<th><div align="center">Buyer</div></th>
						<th><div align="center">No PO</div></th>
						<th><div align="center">No Order</div></th>
						<th><div align="center">No Item</div></th>
						<th><div align="center">Hanger</div></th>
						<th><div align="center">Jenis Kain</div></th>
						<th><div align="center">Warna</div></th>
						<th><div align="center">Nama CV</div></th>
						<th><div align="center">Total (Pcs)</div></th>
						<th><div align="center">Harga (Pcs)</div></th>
						<th><div align="center">Total Harga</div></th>
						<th><div align="center">Keterangan</div></th>
					</tr>
					</thead>
				<tbody>
					<?php 
					include "koneksi.php";
					$no = 1;
					$no_demand_esc = mysqli_real_escape_string($con, (string)$no_demand);
					$tblReportsClaim = mysqli_query($con, "SHOW TABLES LIKE 'reports_claim'");
					if ($tblReportsClaim && mysqli_num_rows($tblReportsClaim) > 0) {
					    $sql = mysqli_query($con, "SELECT * FROM reports_claim WHERE no_demand='".$no_demand_esc."' ORDER BY tgl_buat ASC");
					    if ($sql && mysqli_num_rows($sql) > 0) {
					        while ($r = mysqli_fetch_assoc($sql)) {
					?>
					<tr>
						<td align="center"><?php echo $no++; ?></td>
						<td><?php echo htmlspecialchars($r['no_demand']); ?></td>
						<td><?php echo htmlspecialchars($r['prod_order']); ?></td>
						<td><?php echo htmlspecialchars($r['langganan']); ?></td>
						<td><?php echo isset($r['buyer']) ? htmlspecialchars($r['buyer']) : ''; ?></td>
						<td><?php echo htmlspecialchars($r['no_po']); ?></td>
						<td><?php echo htmlspecialchars($r['no_order']); ?></td>
						<td><?php echo htmlspecialchars($r['no_item']); ?></td>
						<td><?php echo htmlspecialchars($r['no_hanger']); ?></td>
						<td><?php echo htmlspecialchars($r['jenis_kain']); ?></td>
						<td><?php echo htmlspecialchars($r['warna']); ?></td>
						<td><?php echo htmlspecialchars($r['nama_cv']); ?></td>
						<td align="right"><?php echo number_format((float)$r['total'], 2); ?></td>
						<td align="right"><?php echo number_format((float)$r['harga'], 2); ?></td>
						<td align="right"><?php echo number_format((float)$r['total_harga'], 2); ?></td>
						<td><?php echo htmlspecialchars($r['ket']); ?></td>
					</tr>
					<?php 
					        }
					    } else {
					        echo '<tr><td colspan="16" align="center">Data tidak ditemukan.</td></tr>';
					        if (!$sql) {
					            error_log('Query reports_claim gagal: '.mysqli_error($con));
					        }
					    }
					} else {
					    echo '<tr><td colspan="16" align="center">Tabel reports_claim belum tersedia.</td></tr>';
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
 <div class="modal fade" id="modal_del" tabindex="-1">
   <div class="modal-dialog modal-sm">
     <div class="modal-content" style="margin-top:100px;">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
         <h4 class="modal-title" style="text-align:center;">Are you sure to delete all data ?</h4>
       </div>

       <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
         <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
         <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
       </div>
     </div>
   </div>
 </div>
 
 <div class="modal fade" id="DataCV">
   <div class="modal-dialog ">
     <div class="modal-content">
       <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span></button>
           <h4 class="modal-title">Nama CV</h4>
         </div>
         <div class="modal-body">
           <input type="hidden" id="id" name="id">
           <div class="form-group">
             <label for="nama_cv_input" class="col-md-3 control-label">Nama CV</label>
             <div class="col-md-6">
               <input type="text" class="form-control" id="nama_cv_input" name="nama_cv_input" required>
               <span class="help-block with-errors"></span>
             </div>
           </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
           <input type="submit" value="Simpan" name="simpan_cv" id="simpan_cv" class="btn btn-primary pull-right">
         </div>
       </form>
     </div>
     <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
 </div>
 <?php
  if (isset($_POST['simpan_cv']) && $_POST['simpan_cv'] == "Simpan") {
    $nama_cv = strtoupper($_POST['nama_cv_input']);
    $tblCv = mysqli_query($con, "SHOW TABLES LIKE 'nama_cv'");
    if ($tblCv && mysqli_num_rows($tblCv) > 0) {
      $sqlData1 = mysqli_query($con, "INSERT INTO nama_cv SET nama_cv='$nama_cv'");
    } else {
      $sqlData1 = true; // jika tabel tidak ada, abaikan namun tidak gagal
    }
    if ($sqlData1) {
      echo "<script>swal({
  title: 'Data Telah Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => { if (result.value) { window.location.href='InputClaim'; } });</script>";
    }
  }
  ?>
