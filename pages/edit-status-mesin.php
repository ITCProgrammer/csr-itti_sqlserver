<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
?>

<div class="modal-dialog modal-lg" style="width: 95%">
  <div class="modal-content">
	<form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="EditStatusMesin" enctype="multipart/form-data">  
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">No Mesin :
        <?php echo $_GET['id'];?>
      </h4>
    </div>
    <div class="modal-body">
      <table id="tbl3" class="table table-bordered table-hover display" width="100%">
        <thead class="btn-primary">
          <tr>            
            <th width="10%">No Urut</th>
			<th width="5%">No KK</th>  
            <th width="7%">Buyer</th>
            <th width="7%">Costumer</th>
            <th width="7%">PO</th>
            <th width="7%">Order</th>
            <th width="7%">Hanger</th>
            <th width="7%">Lot</th>
            <th width="7%">Warna</th>
            <th width="7%">Proses</th>
            <th width="7%">Tgl Delivery</th>
            <th width="11%">Ket</th>
            <th width="10%">Status</th>
          </tr>
        </thead>
        <tbody>			
          <?php

        $qry=mysqli_query($con," SELECT *,IF(DATEDIFF(now(),tgl_delivery) > 0,'Urgent',
IF(DATEDIFF(now(),tgl_delivery) > -4,'Potensi Delay','')) as `sts` FROM tbl_schedule a WHERE a.no_mesin='$_GET[id]' AND NOT `status` = 'selesai' AND NOT a.no_urut='1' ORDER BY a.no_urut ASC ");
   $no=1;

   $c=0;
    while ($rowd=mysqli_fetch_array($qry)) {
        $bgcolor = ($c++ & 1) ? '#33CCFF' : '#FFCC99';
        
			?>
          <tr>
            <td>
				<select name="no_urut[<?php echo $rowd['id']; ?>]" class="form-control">
				  <option value="">Pilih</option>
			  <?php 
			  $sqlKap=mysqli_query($con,"SELECT no_urut FROM tbl_urut WHERE not no_urut='1' ORDER BY no_urut ASC");
			  while($rK=mysqli_fetch_array($sqlKap)){
			  ?>
				  <option value="<?php echo $rK['no_urut']; ?>" <?php if($rK['no_urut']==$rowd['no_urut']){ echo "SELECTED";}?>><?php echo $rK['no_urut']; ?></option>
			 <?php } ?>	  
				</select></td>
            <td><?php echo $rowd['nokk']; ?><br><input type="hidden" id="personil" name="personil" value="<?php echo $_SESSION['nama10'];?>" readonly></td>            
            <td><?php echo $rowd['buyer']; ?></td>
            <td><?php echo $rowd['langganan']; ?></td>
            <td><?php echo $rowd['po']; ?></td>
            <td><?php echo $rowd['no_order']; ?></td>
            <td><?php echo $rowd['no_hanger']; ?></td>
            <td><?php echo $rowd['lot']; ?></td>
            <td><?php echo $rowd['warna']; ?></td>
            <td><?php echo $rowd['proses']; ?></td>
            <td>
              <?php echo $rowd['tgl_delivery']; ?>
            </td>
            <td bgcolor="<?php echo $bg; ?>"><?php echo $rowd['ket_status']; ?><br><span class="label <?php if($rowd['status']=="sedang jalan"){echo "label-success";}else{echo "label-warning";} ?>"><?php echo $rowd['status']; ?></span></td>
            <td bgcolor="<?php if ($rowd['sts']=="Potensi Delay") { echo " orange"; }else if ($rowd['sts']=="Urgent") { echo " red"; }?>" >
              <?php if ($rowd['sts']!="") { echo "<font color=white>$rowd[sts]</font>"; } ?>
            </td>
          </tr>
          <?php $no++;
    } ?>
        </tbody>
      </table>
    </div>
	<div class="modal-footer">
		<button class="btn btn-danger" name="ubah" type="submit">Update</button>
	</div>
	  </form>	
  </div>
</div>
</div>
<script type="text/javascript">
  $(function() {
    $("#tbl3").dataTable({'paging': false,'ordering': false,
        'info': false,'searching': false});
  });

</script>
