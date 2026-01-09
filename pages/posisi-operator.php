<?php
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Posisi Operator Mesin Inspeksi</title>
  </head>

  <body>
    <?php 	$mesin=mysqli_query("SELECT * FROM tbl_mesin WHERE ket='Inspection' ORDER BY no_mesin",$con); ?>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
		  <a href="#" data-toggle="modal" data-target="#DataPosisi" class="btn btn-warning <?php if($_SESSION['akses']=="biasa"){ echo "disabled";} ?>"><i class="fa fa-plus-circle"></i> Add</a>
          </div>
          <div class="box-body">
            <table width="100%" id="example2" class="table table-bordered table-hover table-striped">
              <thead class="btn-success">
                <tr>
                  <th width="8%"><div align="center">No Mesin</div></th>
                  <th width="31%"><div align="center">A</div></th>
                  <th width="41%"><div align="center">B</div></th>
                  <th width="20%"><div align="center">C</div></th>
                </tr>
              </thead>
              <tbody>
                <?php
  $col=0;
  $no=1;
  while ($rMesin=mysqli_fetch_array($mesin)) {
      $bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite'; 
	  $shifta=mysqli_query($con,"SELECT id,nama FROM tbl_posisi_operator WHERE no_mesin='$rMesin[no_mesin]' and shift='A' LIMIT 1");
	  $shiftb=mysqli_query($con,"SELECT id,nama FROM tbl_posisi_operator WHERE no_mesin='$rMesin[no_mesin]' and shift='B' LIMIT 1");
	  $shiftc=mysqli_query($con,"SELECT id,nama FROM tbl_posisi_operator WHERE no_mesin='$rMesin[no_mesin]' and shift='C' LIMIT 1");
	  $rSA=mysqli_fetch_array($shifta);
	  $rSB=mysqli_fetch_array($shiftb);
	  $rSC=mysqli_fetch_array($shiftc);
				  ?>
                <tr align="center" bgcolor="<?php echo $bgcolor; ?>">
                  <td align="center"><?php echo $rMesin['no_mesin']; ?></td>
                  <td align="center"><a href="#" id='<?php echo $rSA['id'];?>' class="posisi_edit <?php if($_SESSION['lvl_id10']=="3"){echo "disabled"; } ?>"><?php echo $rSA['nama']; ?></a></td>
                  <td align="center"><a href="#" id='<?php echo $rSB['id'];?>' class="posisi_edit <?php if($_SESSION['lvl_id10']=="3"){echo "disabled"; } ?>"><?php echo $rSB['nama']; ?></td>
                  <td align="center"><a href="#" id='<?php echo $rSC['id'];?>' class="posisi_edit <?php if($_SESSION['lvl_id10']=="3"){echo "disabled"; } ?>"><?php echo $rSC['nama']; ?></a></td>
                </tr>
                <?php
  $no++;
  } ?>
              </tbody>
              <tfoot class="btn-success">
                <tr>
                  <th><div align="center">No Mesin</div></th>
                  <th><div align="center">A</div></th>
                  <th><div align="center">B</div></th>
                  <th><div align="center">C</div></th>
                </tr>
              </tfoot>
            </table>
			</div>  
		  </div>
		</div> 
	  </div>
	  
	  <div class="callout callout-warning">
        - Mesin 05, 06, 07 dan 08 : Team Adidas<br>
		- Mesin 09, dan 11 : Team Lululemon<br>
		- Mesin 02, 03, 04, 10, 12, 12A dan 14 : Inspek Dll  
      </div>
	  
		  <div class="modal fade modal-super-scaled" id="DataPosisi">
          <div class="modal-dialog">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="SimpanPosisiO" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Posisi Operator Mesin</h4>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                  <label for="nama" class="col-md-2 control-label">No Mesin</label>
                  <div class="col-md-10">
                  <select name="no_mc" class="form-control select2" style="width: 100%;" id="no_mc" required>
							  	<option value="">Pilih</option>							 
							  <?php 
							  $sqlKap=mysqli_query("SELECT no_mesin FROM tbl_mesin  WHERE ket='Inspection' ORDER BY no_mesin ASC",$con);
							  while($rK=mysqli_fetch_array($sqlKap)){
							  ?>
								  <option value="<?php echo $rK['no_mesin']; ?>"><?php echo $rK['no_mesin']; ?></option>
							 <?php } ?>	

					  </select>
                  </div>
                  </div>
				  <div class="form-group">
                  <label for="nama" class="col-md-2 control-label">Operator</label>
                  <div class="col-md-10">
		<select name="nama" class="form-control select2" style="width: 100%;">
		<option value="">Pilih</option>
		<?php $sqlPr=mysqli_query($con,"SELECT nama FROM user_login WHERE level='INSPEKSI' AND dept='QC' AND akses='biasa'");
		while($rP=mysqli_fetch_array($sqlPr)){ ?>
		<option value="<?php echo $rP['nama'];?>" <?php if($Nama==$rP['nama']){ echo "SELECTED";}?>><?php echo $rP['nama'];?></option>	
			<?php } ?>
		</select>
		</div>
		</div>
		<div class="form-group">
                  <label for="nama" class="col-md-2 control-label">Shift</label>
                  <div class="col-md-10">
		<select name="shift" class="form-control select2" style="width: 100%;">
		<option value="">Pilih</option>
		<option value="A">A</option>
		<option value="B">B</option>
		<option value="C">C</option>	
		</select>
		</div>
		</div>		  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" >Save</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
</div>
          <!-- Modal Popup untuk delete-->
	
  
		  <div id="PosisiOEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          </div>
  </body>

</html>
	  <script>
	  function confirm_del(delete_url) {
                $('#delNews').modal('show', {
                  backdrop: 'static'
                });
                document.getElementById('del_link').setAttribute('href', delete_url);
              }
	  </script>
