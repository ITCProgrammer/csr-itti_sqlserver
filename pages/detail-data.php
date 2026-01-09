<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $qryCek=mysqli_query($con,"SELECT * FROM tbl_qcf WHERE `id`='$_GET[id]'");
    $rCek=mysqli_fetch_array($qryCek);
    if (isset($_POST['save'])) {
        $qry1=mysqli_query($con,"INSERT INTO tbl_qcf_detail SET
		`id_qcf`='$_GET[id]',
		`persen`='$_POST[prsn]',
		`masalah`='$_POST[masalah]',
		`dept`='$_POST[dept]'
		");
        
    }
	if (isset($_POST['tambah'])) {
		$mslh=strtoupper($_POST['mslh']);
        $qry1=mysqli_query($con,"INSERT INTO tbl_masalah SET
		`nama`='$mslh'
		");
        
    }
	if (isset($_POST['tambah1'])) {
		$dept=strtoupper($_POST['dept1']);
        $qry1=mysqli_query($con,"INSERT INTO tbl_dept SET
		`nama`='$dept'
		");
        
    }
?>
<div class="box box-info">
  <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
    <div class="box-header with-border">
      <h3 class="box-title">Detail Data</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>

    <div class="box-body">
      <div class="form-group">
        <label for="prsn" class="col-sm-2 control-label">Persentase</label>
        <div class="col-sm-2">
          <div class="input-group">
            <input name="prsn" type="text" class="form-control" id="prsn" value="" placeholder="0" required style="text-align: right;"><span class="input-group-addon">%</span></div>
        </div>
      </div>
      <div class="form-group">
        <label for="dept" class="col-sm-2 control-label">Dept</label>
        <div class="col-sm-2">
          <select name="dept" class="form-control" id="dept" required>
            <option value="">-PILIH-</option>
			<?php 
			  $sql1=mysqli_query($con,"SELECT * FROM tbl_dept ORDER BY nama ASC");
			while($r1=mysqli_fetch_array($sql1)){	
			?>  
			<option value="<?php echo $r1['nama'];?>"><?php echo $r1['nama'];?></option>
			<?php } ?>  
          </select>
        </div>
		  <!--
		  <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal1"><span class="fa fa-plus "></span> </a>-->
      </div>
      <div class="form-group">
        <label for="masalah" class="col-sm-2 control-label">Masalah Ke-1</label>        
<div class="col-sm-6">
		  <select name="masalah" class="form-control" id="masalah" required>
            <option value="">-PILIH-</option>
			<?php 
			  $sql2=mysqli_query($con,"SELECT * FROM tbl_masalah ORDER BY nama ASC");
			while($r2=mysqli_fetch_array($sql2)){	
			?>  
			<option value="<?php echo $r2['nama'];?>"><?php echo $r2['nama'];?></option>
			<?php } ?>   
		  </select>	          
        </div>
		  <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus "></span> </a>
      </div>
	  	<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
    </div>

    <div class="box-footer">
      <div class="col-sm-2">
        <button type="submit" class="btn btn-block btn-social btn-linkedin" name="save" style="width: 60%">Add <i class="fa fa-plus-circle"></i></button>
      </div>
      <a href="InputData-<?php echo $rCek['nokk'];?>" class="btn btn-default pull-right"><span class="fa fa-arrow-circle-left "></span> Kembali</a>
    </div>
    <!-- /.box-footer -->


  </form>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">

      </div>
      <div class="box-body">
        <table id="example2" class="table table-bordered table-hover table-striped nowrap" style="width:100%">
          <thead class="bg-green">
            <tr>
              <th width="40">No</th>
              <th width="97">Persentase</th>
              <th width="139">%KGs</th>
              <th width="124">Dept</th>
              <th width="704">Masalah</th>
              <th width="64">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
  $sql=mysqli_query($con,"SELECT * FROM tbl_qcf_detail WHERE id_qcf='$_GET[id]'");
  while ($r=mysqli_fetch_array($sql)) {
      $no++;
      $bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
      ?>
            <tr bgcolor="<?php echo $bgcolor; ?>">
              <td align="center">
                <?php echo $no; ?>
              </td>
              <td align="center">
                <?php echo $r['persen']; ?>
              </td>
              <td align="center"><?php if($rCek['qty_mslh']>0){echo ($r['persen']*$rCek['qty_mslh'])/100;}; ?></td>
              <td align="center">
                <?php echo $r['dept']; ?>
              </td>
              <td align="left">
                <?php echo $r['masalah']; ?>
              </td>
              <td align="center"><a href="#" class="btn-sm btn-danger" onclick="confirm_del2('./HapusDetailM-<?php echo $r['id']; ?>');"><i class="fa fa-trash"></i> </a></td>
            </tr>
            <?php
  } ?>
          </tbody>

        </table>
        
      </div>
    </div>
  </div>
</div>
<div class="modal fade modal-3d-slit" id="myModal1">
            <div class="modal-dialog">
				<form action="" method="post" enctype="multipart/form-data" name="form4" id="form4">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Master Dept Masalah</h4>
						
                    </div>
                    <div class="modal-body">
			<div class="form-group">
				<div class="col-sm-6">
                <input type="text" class="form-control" placeholder="Dept" name="dept1" required>					
				</div><button type="submit" class="btn btn-success" name="tambah1" value="add"> <i class="fa fa-plus"></i> Add</button>	
			</div>
			<table id="example6" class="table table-bordered table-hover table-striped" width="100%">
              <thead class="bg-red">
				<tr>
				  <th width="97%" scope="col">Dept</th>
				  <th width="3%" scope="col">Aksi</th>
				</tr>
			   </thead>
			   <tbody>
			   <?php 
				   $no1=1;
				   $sqldept=mysqli_query($con,"SELECT * FROM tbl_dept ORDER BY nama ASC");
				   while($rd=mysqli_fetch_array($sqldept)){
			   ?>
				<tr>
				  <td><?php echo $rd['nama']; ?></td>
				  <td align="center"><a href="#" class="btn-sm btn-danger" onclick="confirm_del1('./HapusDataD-<?php echo $rd['id'] ?>');"><i class="fa fa-trash"></i> </a></td>
				</tr>
				   <?php $no1++; } ?>
			  </tbody>
			</table>			
			</div>
			
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                 
              </div>
             </div>
            <!-- /.box-footer -->
          </div>
					</form>
          <!-- /. box -->
	</div>	
        </div>

<div class="modal fade modal-3d-slit" id="myModal">
	<div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Jenis Masalah</h4>
        </div><div class="container"></div>
        <div class="modal-body">
		<form action="" method="post" enctype="multipart/form-data" name="form3" id="form3">	
          <div class="form-group">
				<div class="col-sm-10">
                <input type="text" class="form-control" placeholder="Masalah" name="mslh" required></div><button type="submit" class="btn btn-success" name="tambah" value="add"> <i class="fa fa-plus"></i> Add</button>
			</div>
			<table width="100%" class="table table-bordered table-hover table-striped" id="example5">
              <thead class="bg-primary">
				<tr>
				  <th width="93%" scope="col">Jenis Masalah</th>
				  <th width="7%" scope="col">Aksi</th>
				</tr>
			   </thead>
			   <tbody>
				<?php 
				   $no2=1;
				   $sqlmslh=mysqli_query($con,"SELECT * FROM tbl_masalah ORDER BY nama ASC");
				   while($rm=mysqli_fetch_array($sqlmslh)){
			   ?>   
				<tr>
				  <td><?php echo $rm['nama'];?></td>
				  <td align="center"><a href="#" class="btn-sm btn-danger" onclick="confirm_del('./HapusDataM-<?php echo $rm['id'] ?>');"><i class="fa fa-trash"></i> </a></td>
				</tr>
				   <?php $no2++; } ?>
			  </tbody>
			</table>
			</form>
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn">Close</a>
        </div>
      </div>
    </div>
</div>
<div class="modal fade modal-3d-slit" id="delData" data-backdrop="static">
	<div class="modal-dialog modal-sm">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
      </div>

      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="del_link" aria-hidden="true">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal" aria-hidden="true">Cancel</button>		 
      </div>
    </div>
  </div>
</div>
<div class="modal fade modal-3d-slit" id="delData1" data-backdrop="static">
	<div class="modal-dialog modal-sm">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
      </div>

      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="del_link1" aria-hidden="true">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal" aria-hidden="true">Cancel</button>		 
      </div>
    </div>
  </div>
</div>
<div class="modal fade modal-3d-slit" id="delData2" >
	<div class="modal-dialog modal-sm">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
      </div>

      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="del_link2" aria-hidden="true">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal" aria-hidden="true">Cancel</button>		 
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function confirm_del(delete_url) {
    $('#delData').modal('show', {
      backdrop: 'static'
    });
    document.getElementById('del_link').setAttribute('href', delete_url);
  }
	function confirm_del1(delete_url) {
    $('#delData1').modal('show', {
      backdrop: 'static'
    });
    document.getElementById('del_link1').setAttribute('href', delete_url);
  }
	function confirm_del2(delete_url) {
    $('#delData2').modal('show', {
      backdrop: 'static'
    });
    document.getElementById('del_link2').setAttribute('href', delete_url);
  }
</script>
<script type="text/javascript">
  $(function() {
    $("#tbl2").dataTable()
	$("#tbl3").dataTable()  
  });

</script>