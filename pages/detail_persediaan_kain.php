<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
?>
         
<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Data Detail Persediaan Kain</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">
                    <h5><strong>Prod. Order : <?php echo $_GET['id'];?></strong></h5>
                    <div class="pull-right">
                        <!-- Menambahkan tanda petik yang kurang pada tag href -->
                        <a href="pages/cetak/cetak_detail_persedian_kain.php?awal=<?php echo htmlspecialchars($modal_id); ?>" class="btn btn-danger" target="_blank">Cetak Detail</a>
			 
			<!-- <a href="pages/cetak/cetak_kpe_disposisi.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&order=<?php echo $_POST['order']; ?>&po=<?php echo $_POST['po']; ?>&hanger=<?php echo $_POST['hanger']; ?>&langganan=<?php echo $_POST['langganan']; ?>&demand=<?php echo $_POST['demand']; ?>&prodorder=<?php echo $_POST['prodorder']; ?>&pejabat=<?php echo $_POST['pejabat']; ?>" class="btn btn-danger <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Cetak KPE Disposisi</a> 
            <a href="pages/cetak/excel_kpe_disposisi.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>&order=<?php echo $_POST['order']; ?>&po=<?php echo $_POST['po']; ?>&hanger=<?php echo $_POST['hanger']; ?>&langganan=<?php echo $_POST['langganan']; ?>&demand=<?php echo $_POST['demand']; ?>&prodorder=<?php echo $_POST['prodorder']; ?>&pejabat=<?php echo $_POST['pejabat']; ?>" class="btn btn-success <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Excel KPE Disposisi</a>  -->
          </div>
          <!-- <br> -->
                    <table id="example9" class="table table-bordered table-hover table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="5%"><div align="center">No</div></th>
                                <th width="15%"><div align="center">Tgl Balance</div></th>
                                <th width="15%"><div align="center">Item Element</div></th>
                                <th width="10%"><div align="center">Primary Qty</div></th>
                                <th width="5%"><div align="center">UOM Primary</div></th>
                                <th width="10%"><div align="center">Secondary Qty</div></th>
                                <th width="5%"><div align="center">UOM Secondary</div></th>
                                <th width="15%"><div align="center">Warehouse</div></th>
                                <th width="15%"><div align="center">Lokasi</div></th>
                                <th width="15%"><div align="center">Quality Reason</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                            	$sqldtl="SELECT 
                                BALANCE.ELEMENTSCODE,
                                BALANCE.BASEPRIMARYQUANTITYUNIT,
                                BALANCE.BASEPRIMARYUNITCODE,
                                BALANCE.BASESECONDARYQUANTITYUNIT,
                                BALANCE.BASESECONDARYUNITCODE,
                                BALANCE.LOGICALWAREHOUSECODE,
                                BALANCE.WAREHOUSELOCATIONCODE,
                                BALANCE.WHSLOCATIONWAREHOUSEZONECODE,
                                BALANCE.CREATIONDATETIME
                                -- ELEMENTS.QUALITYREASONCODE  
                                FROM BALANCE BALANCE WHERE BALANCE.LOTCODE ='$modal_id'";
                                

                                $stmt=db2_exec($conn1,$sqldtl, array('cursor'=>DB2_SCROLLABLE));
                                while($r=db2_fetch_assoc($stmt)){

                                $sqlre="SELECT
                                ELEMENTS.QUALITYREASONCODE 
                            FROM
                                BALANCE BALANCE
                            LEFT JOIN ELEMENTS ELEMENTS ON BALANCE.ELEMENTSCODE = ELEMENTS.CODE
                            where
                                BALANCE.LOTCODE = '$modal_id'
                                AND BALANCE.ELEMENTSCODE = '$r[ELEMENTSCODE]'";

                                $stmte=db2_exec($conn1,$sqlre, array('cursor'=>DB2_SCROLLABLE));
                                while($re=db2_fetch_assoc($stmte)){
                                   
                              
                            ?>
                            <tr>
                                <td align="center" width="5%"><?php echo $no;?></td>
                                <td align="center" width="15%"><?php echo substr($r['CREATIONDATETIME'],0,10);?></td>
                                <td align="center" width="15%"><?php echo $r['ELEMENTSCODE'];?></td>
                                <td align="center" width="5%"><?php echo number_format($r['BASEPRIMARYQUANTITYUNIT'], 2);?></td>
                                <td align="center" width="5%"><?php echo $r['BASEPRIMARYUNITCODE'];?></td>
                                <td align="center" width="5%"><?php echo number_format($r['BASESECONDARYQUANTITYUNIT'], 2);?></td>
                                <td align="center" width="5%"><?php echo $r['BASESECONDARYUNITCODE'];?></td>
                                <td align="center" width="10%"><?php echo $r['LOGICALWAREHOUSECODE'];?></td>
                                <td align="center" width="10%"><?php echo $r['WHSLOCATIONWAREHOUSEZONECODE']."-".$r['WAREHOUSELOCATIONCODE'];?></td>
                                <td align="center" width="10%"><?php echo $re['QUALITYREASONCODE'];?></td>
                            </tr>
                            <?php $no++;  }}?>
                        </tbody>
                    </table>
		        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-primary" <?php if($_SESSION['lvl_id']!="LEADERTQ"){echo "disabled"; } ?> >Save Changes</button> -->
                    <!--<?php if($_SESSION['lvl_id']!="ADMIN"){echo "disabled"; } ?>-->
                </div>
            </form>
        </div>
            <!-- /.modal-content -->
</div>
          <!-- /.modal-dialog -->
<script>
  $(function () {
    $('#example9').DataTable({
	  'paging': true,
	})
  });
</script>