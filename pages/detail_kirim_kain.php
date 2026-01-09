<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
    $nowarna=$_GET['nowarna'];
    $project=$_GET['project'];
    $lotcode=$_GET['lotcode'];
    $foc=$_GET['foc'];
?>
         
<div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Data Detail Kirim Kain</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="<?php echo $r['id'];?>">
                    <h5><strong>No SJ : <?php echo $_GET['id'];?></strong></h5>
                    <h5><strong>No Warna : <?php echo $_GET['nowarna'];?></strong></h5>
                    <h5><strong>Project : <?php echo $_GET['project'];?></strong></h5>
                    <h5><strong>Prod. Order : <?php echo $_GET['lotcode'];?></strong></h5>
                    <div class="pull-right">
                        <!-- Menambahkan tanda petik yang kurang pada tag href -->
                        <a href="pages/cetak/cetak_detail_kirim_kain.php?awal=<?php echo htmlspecialchars($modal_id); ?>&nowarna=<?=$nowarna?>&project=<?=$project?>&lotcode=<?=$lotcode?>" class="btn btn-danger" target="_blank">Cetak Detail</a>
                    </div>
                    <table id="example9" class="table table-bordered table-hover table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="5%"><div align="center">No</div></th>
                                <th width="15%"><div align="center">Item Element</div></th>
                                <th width="10%"><div align="center">Primary Qty</div></th>
                                <th width="5%"><div align="center">UOM Primary</div></th>
                                <th width="10%"><div align="center">Secondary Qty</div></th>
                                <th width="5%"><div align="center">UOM Secondary</div></th>
                                <th width="10%"><div align="center">Lokasi</div></th>
                                <th width="10%"><div align="center">Keterangan</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sj = $_GET['id'] ;
                                $lot = $_GET['lotcode'];
                                $no=1;
                                $sqldtl = "SELECT 
                                                i.*,
                                                a.USERPRIMARYUOMCODE,
                                                a.USERSECONDARYUOMCODE,
                                                a.WHSLOCATIONWAREHOUSEZONECODE,
                                                a.LOGICALWAREHOUSECODE,
                                                a.WAREHOUSELOCATIONCODE
                                                FROM ITXVIEW_SUBDETAIL_EXIM2  i
                                            LEFT JOIN ALLOCATION a ON a.ITEMELEMENTCODE = i.ITEMELEMENTCODE 
                                                AND a.CODE = i.CODE
                                                AND a.DETAILTYPE ='0' 
                                                AND a.ORIGINTRNTRANSACTIONNUMBER IS NULL  
                                            WHERE 
                                                i.PROVISIONALCODE = '$sj' 
                                                AND i.LOTCODE = '$lot'
                                            ";
                                $stmt=db2_exec($conn1,$sqldtl, array('cursor'=>DB2_SCROLLABLE));
                            while($r=db2_fetch_assoc($stmt)){
                            ?>
                            <tr>
                                <td align="center" width="5%"><?php echo $no;?></td>
                                <td align="center" width="15%"><?php echo $r['ITEMELEMENTCODE'];?></td>
                                <td align="center" width="10%"><?php echo number_format($r['JML_KG'], 2);?></td>
                                <td align="center" width="5%"><?php echo $r['USERPRIMARYUOMCODE'];?></td>
                                <td align="center" width="10%"><?php echo number_format($r['JML_YD'], 2);?></td>
                                <td align="center" width="5%"><?php echo $r['USERSECONDARYUOMCODE'];?></td>
                                <td align="center" width="5%"><?php echo trim($r['WHSLOCATIONWAREHOUSEZONECODE'])."-".trim($r['WAREHOUSELOCATIONCODE']);?></td>
                                <td align="center" width="5%"><?php echo $r['QUALITYREASON'];?></td>
                            </tr>
                            <?php $no++;}?>
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