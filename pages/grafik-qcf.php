<?php
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Line News</title>
  </head>

  <body>
    <?php 	$gambar=mysqli_query($con,"SELECT * FROM tbl_gambar"); ?>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
		  <a href="#" data-toggle="modal" data-target="#DataGrafik" class="btn btn-success <?php if($_SESSION['akses']=="biasa"){ echo "disabled";} ?>"><i class="fa fa-plus-circle"></i> Add</a>
          </div>
          <div class="box-body">
            <table width="100%" id="example2" class="table table-bordered table-hover table-striped">
              <thead class="btn-primary">
                <tr>
                  <th width="2%">No</th>
                  <th width="63%">Desc</th>
                  <th width="11%">Gambar</th>
                  <th width="5%">Tampil</th>
                  <th width="11%">Tgl Update</th>
                  <th width="8%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
  $col=0;
  $no=1;
  while ($rGbr=mysqli_fetch_array($gambar)) {
      $bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite'; ?>
                <tr align="center" bgcolor="<?php echo $bgcolor; ?>">
                  <td align="center">
                    <?php echo $no; ?>
                  </td>
                  <td align="left">
                    <?php echo $rGbr['desc']; ?>
                  </td>
                  <td align="center"><img src="dist/img/gambar/<?php echo $rGbr['gambar']; ?>" width="80" height="60" alt=""/></td>
                  <td align="center"><span class="label <?php if($rGbr['tampil']=="ya"){echo"label-success";}else{echo"label-warning";}?>"><?php echo ucwords($rGbr['tampil']); ?></span></td>
                  <td align="center">
                    <?php echo $rGbr['tgl_update']; ?>
                  </td>
                  <td align="center"><div class="btn-group"><a href="#" id='<?php echo $rGbr['id'] ?>' class="btn btn-xs btn-info news_edit <?php if($_SESSION['akses']=="biasa"){ echo "disabled";} ?>"><i class="fa fa-edit"></i> </a><a href="#" onclick="confirm_del('HapusGrafikQCF-<?php echo $rGbr['id'] ?>');" class="btn btn-xs btn-danger <?php if($_SESSION['akses']=="biasa"){ echo "disabled";} ?>"><i class="fa fa-trash"></i> </a></div></th>
                </tr>
                <?php
  $no++;
  } ?>
              </tbody>
              <tfoot class="btn-primary">
                <tr>
                  <th width="2%">No</th>
                  <th width="63%">Desc</th>
                  <th width="11%">&nbsp;</th>
                  <th width="5%">&nbsp;</th>
                  <th width="11%">Tgl Update</th>
                  <th width="8%">Action</th>
                </tr>
              </tfoot>
            </table>
		  <div class="modal fade modal-super-scaled" id="DataGrafik">
          <div class="modal-dialog" style="width: 90%;">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="SimpanGrafikQCF" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Grafik</h4>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                  <label for="nama" class="col-md-2 control-label">Desc</label>
                  <div class="col-md-10">
                  <textarea name="nama" rows="3" class="form-control" id="nama"></textarea>
                  <span class="help-block with-errors"></span>
                  </div>
                  </div> 
				  <div class="form-group">
                  <label for="file" class="col-md-2 control-label">Gambar</label>
				  <div class="col-md-10">	  
                  <input type="file" id="file" name="file">
				  <span class="help-block with-errors"></span>
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
	<div class="modal fade" id="delNews" tabindex="-1">
	  <div class="modal-dialog modal-sm">
		<div class="modal-content" style="margin-top:100px;">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
		  </div>

		  <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
			<a href="#" class="btn btn-danger" id="del_link">Delete</a>
			<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
		  </div>
		</div>
	  </div>
	</div> 
  
		  <div id="NewsEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

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
