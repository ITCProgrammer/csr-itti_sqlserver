<?PHP
    ini_set("error_reporting", 1);
    set_time_limit(0);
    session_start();
    include "koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bon Penghubung</title>

</head>
<body>
<?php
    $Demand = isset($_GET['demand']) ? $_GET['demand'] : '';
?>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Summary Order</h3><br>
		    <!--
            <div class="pull-right">
                <a href="pages/cetak/excel_summaryorder.php?order=<?php echo $_POST['order']; ?>&hanger=<?php echo $_POST['hanger']; ?>&po=<?php echo $_POST['po']; ?>&warna=<?php echo $_POST['warna']; ?>&item=<?php echo $_POST['item']; ?>&awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&langganan=<?php echo $_POST['langganan']; ?>&proses=<?php echo $_POST['prosesmkt']; ?>" class="btn btn-primary" target="_blank">Excel</a>
            </div>
			-->
	    </div>
      <div class="box-body">




        <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
          <thead class="bg-blue">
            <tr>
				<th rowspan=2><div align="center" valign="middle">DATE</div></th>
				<th  rowspan=2><div align="center" valign="middle">STATUS</div></th>
				<th  rowspan=2><div align="center" valign="middle">ACTION</div></th>
				<th  rowspan=2><div align="center" valign="middle">CUSTOMER</div></th>
				<th  rowspan=2><div align="center" valign="middle">BUYER</div></th>
				<th  rowspan=2><div align="center" valign="middle">PO</div></th>
				<th  rowspan=2><div align="center" valign="middle">ORDER</div></th>
				<th  rowspan=2><div align="center" valign="middle">HANGER</div></th>
				<th  rowspan=2><div align="center" valign="middle">ITEM</div></th>
				<th  rowspan=2><div align="center" valign="middle">COLOR</div></th>
			   	<th  rowspan=2><div align="center" valign="middle">LOT</div></th>
         		<th  rowspan=2><div align="center" valign="middle">DEMAND</div></th>
			   	<th  colspan=3 ><div align="center" valign="middle">QTY</div></th>
				<th  colspan=2 ><div align="center" valign="middle">QTY FOC</div></th>
				<th  colspan=2 ><div align="center" valign="middle">ESTIMASI FOC</div></th>
				<th  colspan=3 ><div align="center" valign="middle">QTY BERMASALAH 1</div></th>
				<th  rowspan=2><div align="center" valign="middle">ISSUE 1</div></th>
				<th  rowspan=2><div align="center" valign="middle">ADVICE FROM PRODUCTION/QC</div></th>
				<th  rowspan=2><div align="center" valign="middle">NOTES</div></th>
				<th  rowspan=2><div align="center" valign="middle">RESPONSIBILITY</div></th>
				<th  colspan=3 ><div align="center" valign="middle">QTY BERMASALAH 2</div></th>
				<th  rowspan=2><div align="center" valign="middle">ISSUE 2</div></th>
				<th  rowspan=2><div align="center" valign="middle">ADVICE FROM PRODUCTION/QC</div></th>
				<th  rowspan=2><div align="center" valign="middle">NOTES</div></th>
				<th  rowspan=2><div align="center" valign="middle">RESPONSIBILITY</div></th>
				<th  colspan=3 ><div align="center" valign="middle">QTY BERMASALAH 3</div></th>
				<th  rowspan=2><div align="center" valign="middle">ISSUE 3</div></th>
				<th  rowspan=2><div align="center" valign="middle">ADVICE FROM PRODUCTION/QC</div></th>
				<th  rowspan=2><div align="center" valign="middle">NOTES</div></th>
				<th  rowspan=2><div align="center" valign="middle">RESPONSIBILITY3</div></th>
				<th  rowspan=2><div align="center" valign="middle">ACTUAL DELIVERY</div></th>

         <!-- <th rowspan="2"><div align="center" valign="middle">Tanggal Surat Jalan</div></th>
         <th rowspan="2"><div align="center" valign="middle">Nomor Surat Jalan</div></th> -->

      </tr>
			<tr>
			    <th><div align="center" valign="middle">ROLL</div></th>
				<th><div align="center" valign="middle">KG</div></th>
				<th><div align="center" valign="middle">YARD</div></th>

        <!-- <th><div align="center" valign="middle">ROLL</div></th> -->
				<th><div align="center" valign="middle">KG</div></th>
				<th><div align="center" valign="middle">YARD</div></th>
        <!-- ESTIMASI -->
				<th><div align="center" valign="middle">KG</div></th>
				<th><div align="center" valign="middle">YARD</div></th>
        <!-- MASALAH -->
        		<th><div align="center" valign="middle">ROLL</div></th>
				<th><div align="center" valign="middle">KG</div></th>
				<th><div align="center" valign="middle">YARD</div></th>
        <!-- MASALAH -->
        		<th><div align="center" valign="middle">ROLL</div></th>
				<th><div align="center" valign="middle">KG</div></th>
				<th><div align="center" valign="middle">YARD</div></th>
        <!-- MASALAH -->
        		<th><div align="center" valign="middle">ROLL</div></th>
				<th><div align="center" valign="middle">KG</div></th>
				<th><div align="center" valign="middle">YARD</div></th>



            </tr>

          </thead>
          <tbody>
          <?php
              if ($Demand != "") {
                  $no     = 1;
                  $fields = [];
                  if ($Demand != "") {
                      $fields[] = "m.nodemand = '$Demand' ";
                  } else {
                      $fields[] = '';
                  }

                  $default_fields  = " AND tq.sts_pbon!='10' AND (tq.penghubung_masalah !='' or tq.penghubung_keterangan !='' or tq.penghubung_roll1 !='' or tq.penghubung_roll2 !='' or tq.penghubung_roll3 !=''  or tq.penghubung_dep !='' or tq.penghubung_dep_persen !='') ";
                  $group_by_fields = "GROUP BY tq.no_order, tq.no_po, tq.no_hanger, tq.no_item, tq.warna, tq.pelanggan, tq.tgl_masuk; ";
                  $sql_code = "SELECT 
				  					DISTINCT 
										m.*, 
										tq.* 
									FROM 
										tbl_bonpenghubung_mail m 
									LEFT JOIN 
										tbl_qcf tq ON m.nodemand = tq.nodemand";

                  if (count($fields) > 0) {
                      $sql_code .= " WHERE " . implode("AND", $fields) . $default_fields . $group_by_fields;
                  }
              } else {
                  $sql_code        = "SELECT 
				  						DISTINCT 
											m.*, 
											tq.*,
											tli.qty_loss as qty_sisa,
											tli.satuan as satuan_sisa 
										FROM tbl_bonpenghubung_mail m 
										LEFT JOIN 
											tbl_qcf tq ON m.nodemand = tq.nodemand
										LEFT JOIN 
											tbl_lap_inspeksi tli ON tq.nodemand = tli.nodemand 
											and tq.no_order = tli.no_order 
										WHERE
											tq.sts_pbon!='10'
											AND team <> '' 
											AND (tq.penghubung_masalah !='' 
													or tq.penghubung_keterangan !='' 
													or tq.penghubung_roll1 !='' 
													or tq.penghubung_roll2 !='' 
													or tq.penghubung_roll3 !=''  
													or tq.penghubung_dep !='' 
													or tq.penghubung_dep_persen !='') 
										GROUP BY tq.no_order, tq.no_po, tq.no_hanger, tq.no_item, tq.warna, tq.pelanggan, tq.tgl_masuk; ";
              }
              $sql = mysqli_query($con, $sql_code);?>
          <div style="display: flex; justify-content: end">
              &nbsp;&nbsp;&nbsp;
            </div>
            <br>
			<?php
                while ($row1 = mysqli_fetch_array($sql)) {
                    $dtArr  = $row1['t_jawab'];
                    $data   = explode(",", $dtArr);
                    $dtArr1 = $row1['persen'];
                    $data1  = explode(",", $dtArr1);
                    if ($row1['penghubung_dep_persen'] != '') {
                        $array_persen = [];
                        $arrayA       = explode(',', $row1['penghubung_dep_persen']);
                        foreach ($arrayA as $element) {
                            $array_persen[] = $element;
                        }
                }?>
						<tr bgcolor="<?php echo $bgcolor; ?>">
							<td align="center"><?php echo $row1['tgl_masuk']; ?></td>
							<td align="center"><?php if ($row1['status_approve'] == 0) {
                                                           echo "NOT YET APPROVE";
                                                       } else if ($row1['status_approve'] == 1) {
                                                           echo "APPROVE"." ".$row1['approve_mkt'];
                                                       } else if ($row1['status_approve'] == 99) {
                                                           echo "REJECT"." ".$row1['approve_mkt'];
                                                       } else {
                                                       echo "CLOSED"." ".$row1['closed_ppc'];
                                                   }?></td>
			<td>
			<?php
                if (($_SESSION['usrid'] == 'septian.saputra') || ($_SESSION['dept'] == 'MKT')) {
                        // Mengecek status_approve apakah 0 untuk menampilkan tombol approve
                    if ($row1['status_approve'] == 0) { ?>
						<button class="button btn-success" id="approveButton" data-nodemand="<?php echo $row1['nodemand']; ?>"<?php echo($row1['status_approve'] >= 1) ? 'disabled' : ''; ?>> APPROVE</button>
						<button class="button btn-danger" id="rejectButton" data-nodemand="<?php echo $row1['nodemand']; ?>"<?php echo($row1['status_approve'] >= 1) ? 'disabled' : ''; ?>> REJECT</button>
					<?php } else if ($_SESSION['dept'] == 'PPC' && $row1['status_approve'] == 1) {?>
					<button class="button btn-secondary" id="closeApproveButton" data-nodemand="<?php echo $row1['nodemand']; ?>"> CLOSED</button>
					<?php }?>
<?php
}?>
        </td>
			<td align="center"><?php echo explode('/', $row1['pelanggan'])[0]; ?></td>
			<td align="center"><?php echo explode('/', $row1['pelanggan'])[1]; ?></td>
			 <td align="center"><?php echo $row1['no_po']; ?></td>
			 <td align="center"><?php echo $row1['no_order']; ?></td>
			 <td align="center"><?php echo $row1['no_hanger']; ?></td>
			  <td align="center"><?php echo $row1['no_item']; ?></td>
			  <td align="center"><?php echo $row1['warna']; ?></td>
			  <td align="center"><?php echo $row1['lot']; ?></td>
        <td align="center"><?php echo $row1['nodemand']; ?></td>

			  <td align="center"><?php echo $row1['rol']; ?></td>
			  <td align="center"><?php echo $row1['netto']; ?></td>
			  <td align="center"><?php echo $row1['panjang']; ?></td>

        <!-- Tambahan -->
        <td align="center"><?php echo $row1['berat_extra']; ?></td>
			  <td align="center"><?php echo $row1['panjang_extra']; ?></td>
			  <!-- <td align="center"><?php echo $row1['penghubung_foc3']; ?></td> -->

        <!-- ESTIMASI -->
        <td align="center"><?php echo $row1['estimasi']; ?></td>
			  <td align="center"><?php echo $row1['panjang_estimasi']; ?></td>

        		<td align="center"><?php echo $row1['penghubung_roll1']; ?></td>
			  <td align="center"><?php echo $row1['penghubung_roll2']; ?></td>
			  <td align="center"><?php echo $row1['penghubung_roll3']; ?></td>
			  <td align="center"><?php echo $row1['penghubung_masalah']; ?></td>
			  <td align="center"><?php echo $row1['advice1']; ?></td>
			  <td align="center"><?php echo $row1['penghubung_keterangan']; ?></td>
			  <td align="center">
				<?php if ($row1['penghubung_dep'] != '') {
                            $arrayA  = explode(',', $row1['penghubung_dep']);
                            $no_depp = 1;
                            echo $row1['penghubung_dep'] . ' ';
                            foreach ($arrayA as $key => $element) {
                                if (array_key_exists($key, $array_persen ?? [])) {

                                    if ($no_depp >= 2) {
                                        echo ',';
                                    }

                                    // echo $element.' ' ;
                                    echo $array_persen[$key];

                                    echo ' ';

                                }
                                $no_depp++;
                            }
                    }?>
				</td>

        		<td align="center"><?php echo $row1['penghubung2_roll1']; ?></td>
			  <td align="center"><?php echo $row1['penghubung2_roll2']; ?></td>
			  <td align="center"><?php echo $row1['penghubung2_roll3']; ?></td>
			   <td align="center"><?php echo $row1['penghubung2_masalah']; ?></td>
			   <td align="center"><?php echo $row1['penghubung2_keterangan']; ?></td>
			   <td align="center"><?php echo $row1['advice2']; ?></td>
			   <td align="center">
				<?php if ($row1['penghubung2_dep'] != '') {
                            $arrayA  = explode(',', $row1['penghubung2_dep']);
                            $no_depp = 1;
                            echo $row1['penghubung2_dep'] . ' ';
                            foreach ($arrayA as $key => $element) {
                                if (array_key_exists($key, $array_persen ?? [])) {

                                    if ($no_depp >= 2) {
                                        echo ',';
                                    }

                                    // echo $element.' ' ;
                                    echo $array_persen[$key];

                                    echo ' ';

                                }
                                $no_depp++;
                            }
                    }?>
				</td>
        		<td align="center"><?php echo $row1['penghubung3_roll1']; ?></td>
			  <td align="center"><?php echo $row1['penghubung3_roll2']; ?></td>
			  <td align="center"><?php echo $row1['penghubung3_roll3']; ?></td>
			   <td align="center"><?php echo $row1['penghubung3_masalah']; ?></td>
			   <td align="center"><?php echo $row1['penghubung3_keterangan']; ?></td>
			   <td align="center"><?php echo $row1['advice3']; ?></td>
			   <td align="center">
				<?php if ($row1['penghubung3_dep'] != '') {
                            $arrayA  = explode(',', $row1['penghubung3_dep']);
                            $no_depp = 1;
                            echo $row1['penghubung3_dep'] . ' ';
                            foreach ($arrayA as $key => $element) {
                                if (array_key_exists($key, $array_persen ?? [])) {

                                    if ($no_depp >= 2) {
                                        echo ',';
                                    }

                                    // echo $element.' ' ;
                                    echo $array_persen[$key];

                                    echo ' ';

                                }
                                $no_depp++;
                            }
                    }?>
				</td>

        <td>                                     <?php
                                         $qDemand = db2_exec($conn1, "SELECT
	CASE
		WHEN p.DLVSALORDERLINESALESORDERCODE IS NULL THEN p.ORIGDLVSALORDLINESALORDERCODE
		ELSE p.DLVSALORDERLINESALESORDERCODE
	END AS SALESORDERCODE,
	CASE
		WHEN p.DLVSALESORDERLINEORDERLINE IS NULL THEN p.ORIGDLVSALORDERLINEORDERLINE
		ELSE p.DLVSALESORDERLINEORDERLINE
	END AS ORDERLINE
	FROM PRODUCTIONDEMAND p
	WHERE p.CODE ='$row1[nodemand]'");
                                             $rowdb2            = db2_fetch_assoc($qDemand);
                                             $q_actual_delivery = db2_exec($conn1, "SELECT
        COALESCE(s2.CONFIRMEDDELIVERYDATE, s.CONFIRMEDDUEDATE) AS ACTUAL_DELIVERY
    FROM
        SALESORDER s
    LEFT JOIN SALESORDERDELIVERY s2 ON s2.SALESORDERLINESALESORDERCODE = s.CODE AND s2.SALORDLINESALORDERCOMPANYCODE = s.COMPANYCODE AND s2.SALORDLINESALORDERCOUNTERCODE = s.COUNTERCODE
    WHERE
        s2.SALESORDERLINESALESORDERCODE = '$rowdb2[SALESORDERCODE]'
        AND s2.SALESORDERLINEORDERLINE = '$rowdb2[ORDERLINE]'");
                                         $row_actual_delivery = db2_fetch_assoc($q_actual_delivery);
                                         echo $row_actual_delivery['ACTUAL_DELIVERY']; ?></td>
          </tr>
          <?php	$no++;
          }?>
        </tbody>
      </table>





      </div>
    </div>
  </div>
</div>
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
<div id="StsAksiEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div id="StsAksiPPCEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>



<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rejectModalLabel">Reject Bon Penghubung QC</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin Reject Bon Penghubung QC ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="confirmReject">REJECT</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
		<div class="modal fade" id="closeModal" tabindex="-1" role="dialog" aria-labelledby="closeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="closeModalLabel">Tutup Bon Penghubung QC</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menutup Bon Penghubung QC ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="confirmClose">CLOSE</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </div>
        </div>
		<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="approveModalLabel">Approve Bon Penghubung QC</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin mengapprove Bon Penghubung QC ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" id="confirmApprove">APPROVE</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
                    </div>
                </div>
            </div>
        </div>
<script type="text/javascript">
    function confirm_delete(delete_url)
    {
      $('#modal_del').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>
<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});

	</script>
</body>
<script type="text/javascript">
		document.querySelectorAll("#approveButton, #rejectButton, #closeApproveButton").forEach(function(button) {
    button.addEventListener("click", function() {
        var nodemand = this.getAttribute("data-nodemand");
        var action = this.id.replace('Button', '');  // Mendapatkan action dari ID tombol (approve, reject, closeApprove)
        showModal(action, nodemand);
    });
});


function showModal(action, nodemand) {
    var modalId, confirmButtonId;

    // Tentukan modalId dan confirmButtonId berdasarkan action
    if (action === "approve") {
        modalId = "approveModal";
        confirmButtonId = "confirmApprove";
    } else if (action === "reject") {
        modalId = "rejectModal";
        confirmButtonId = "confirmReject";
    } else if(action== "closeApprove") {
        modalId = "closeModal";
        confirmButtonId = "confirmClose";
    }

    var apiUrl = "pages/approve_process_bon_penghubung.php";

    // Tampilkan modal sesuai action
    $('#' + modalId).modal('show');

    // Tambahkan event listener untuk tombol konfirmasi
    document.getElementById(confirmButtonId).addEventListener("click", function() {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", apiUrl, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log(xhr.responseText); // Menampilkan respons dari server
                alert("Bon Penghubung QC dengan nodemand " + nodemand + " berhasil " + action + "!");
                $('#' + modalId).modal('hide'); // Menutup modal setelah berhasil
                location.reload();
            } else {
                // Menampilkan error jika status bukan 200
                console.log(xhr.responseText); // Menampilkan error dari server
                alert("Terjadi kesalahan dalam proses " + action + ": " + xhr.responseText);
            }
        };
        xhr.send("nodemand=" + nodemand + "&action=" + action); // Kirim data untuk approve/reject
    });
}


// Menambahkan event listener untuk tombol close (di header modal atau di footer)
$('.close, .btn-secondary[data-dismiss="modal"]').on('click', function () {
    $('#closeModal').modal('hide'); // Menutup modal secara manual jika tombol close atau cancel diklik
});

</script>

</html>