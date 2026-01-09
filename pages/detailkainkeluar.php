<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
$id=$_GET['id'];
$ket=$_GET['ket'];
$sql1=mysqli_query($con,"SELECT
	COUNT(weight) as totrol,
	SUM(weight) as totba,
	SUM(yard_) as totya
FROM
	detail_pergerakan_stok
WHERE
	nokk = '$id'
AND (
	transtatus = '0'
) AND sisa='$ket'
 Order by no_roll ASC");
 $row1=mysqli_fetch_array($sql1);	
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Keluar Kain Jadi</h4>
            </div>
            <div class="modal-body">
                <h5>No Kartu Kerja : <strong><em><?php echo $id;?></em></strong><br>
                Total Roll : <?php echo $row1["totrol"];?> || Berat : <?php echo number_format($row1["totba"],'2','.',',');?> ||  Panjang:<?php echo number_format($row1["totya"],'2','.',',');?></h5>
                <table id="example" class="table table-bordered table-hover table-striped" border="0" width="100%">
                    <thead>
                        <tr>
                            <th align="center" width="5%">No</th>
                            <th align="center" width="13%">No Roll</th>
                            <th align="center" width="18%">Berat (KG)</th>
                            <th align="center" width="12%">Panjang</th>
                            <th align="center" width="11%">Satuan</th>
                            <th align="center" width="9%">Grade</th>
                            <th align="center" width="17%">SN</th>
                            <th align="center" width="6%">Ket</th>
                            <th align="center" width="9%">Status</th>
                        </tr>
                    </thead>
                    <tbody> 
                    <?php
                    $id=$_GET['id'];
                    $ket=$_GET['ket'];
                    $modal=mysqli_query($con,"SELECT
                        no_roll,
                        `weight`,
                        yard_,
                        satuan,
                        grade,
                        sisa,
                        SN,
                        transtatus
                    FROM
                        detail_pergerakan_stok
                    WHERE
                        nokk = '$id'
                    AND (
                        transtatus = '0'
                    ) AND sisa='$ket'
                    Order by no_roll ASC");
                    $c=1;
                    $no=1;
                    while($row=mysqli_fetch_array($modal)){
                    ?>
                        <tr bgcolor="<?php echo $bgcolor;?>">
                            <td><?php echo $no;?></td>
                            <td align="center"><?php echo $row['no_roll'];?></td>
                            <td align="right"><?php echo number_format($row['weight'],'2','.',',');?></td>
                            <td align="right"><?php echo number_format($row['yard_'],'2','.',',');?></td>
                            <td align="center"><?php echo $row['satuan'];?></td>
                            <td align="center"><?php echo $row['grade'];?></td>
                            <td align="right"><?php echo $row['SN'];?></td>
                            <td align="center"><?php if($row['sisa']=="SISA" || $row['sisa']=="FKSI"){$sisa= "SISA";}else{$sisa=$row['sisa'];}echo $sisa;?></td>
                            <td></td>
                        </tr>  
                        <?php $no++;} ?>
                    </tbody>
                </table>                   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
<script>
$(function () { 	
$(".select2").select2({
      theme: 'bootstrap4',
	  placeholder: "Select",
      allowClear: true,	
    });
$("#example").DataTable({
	});
});
</script>
