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
                        <h4 class="modal-title">Data Beda Roll</h4>
                </div>
                <div class="modal-body">
                    <h5><strong>No Demand : <?php echo $_GET['id'];?></strong></h5>
                    <table id="example9" class="table table-bordered table-hover table-striped" width="100%">
                        <thead>
                            <tr>
                                <th width="5%"><div align="center">No</div></th>
                                <th width="15%"><div align="center">Element Inspect</div></th>
                                <th width="5%"><div align="center">Red</div></th>
                                <th width="5%"><div align="center">Green</div></th>
                                <th width="5%"><div align="center">Blue</div></th>
                                <th width="5%"><div align="center">Yellow</div></th>
                                <th width="5%"><div align="center">Beda Roll</div></th>
                                <th width="5%"><div align="center">Ujung Roll</div></th>
                                <th width="5%"><div align="center">OK</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                            	$sqldtl=mysqli_query($con,"SELECT * FROM tbl_detail_beda_roll WHERE nodemand='$modal_id' ORDER BY element ASC");
                            while($row1=mysqli_fetch_array($sqldtl)){
                            ?>
                            <tr>
                                <td align="center" width="5%"><?php echo $no;?></td>
                                <td align="center" width="15%"><?php echo $row1['element'];?></td>
                                <td align="center" width="5%"><input type="checkbox" <?php if($row1['red']=='1'){echo "checked";}?>/></td>
                                <td align="center" width="5%"><input type="checkbox" <?php if($row1['green']=='1'){echo "checked";}?>/></td>
                                <td align="center" width="5%"><input type="checkbox" <?php if($row1['blue']=='1'){echo "checked";}?>/></td>
                                <td align="center" width="5%"><input type="checkbox" <?php if($row1['yellow']=='1'){echo "checked";}?>/></td>
                                <td align="center" width="5%"><input type="checkbox" <?php if($row1['beda_roll']=='1'){echo "checked";}?>/></td>
                                <td align="center" width="5%"><input type="checkbox" <?php if($row1['ujung_beda']=='1'){echo "checked";}?>/></td>
                                <td align="center" width="5%"><input type="checkbox" <?php if($row1['ok']=='1'){echo "checked";}?>/></td>
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