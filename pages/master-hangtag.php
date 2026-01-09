<?php
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>
<?php
$Item		= isset($_POST['item']) ? $_POST['item'] : '';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>

  </head>

  <body>
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Filter Data Master Hangtag</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
        <div class="box-body">
          <div class="form-group">
			<div class="col-sm-2">
                <input name="item" type="text" class="form-control" id="item" placeholder="No Item" value="<?php echo $Item; ?>" />
		    </div>
            <button type="submit" class="btn btn-success " name="cari"><i class="fa fa-search"></i> Cari Data</button>
            <!-- /.input group -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer">

          </div>
          <!-- /.box-footer -->

        </div>
      </form>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Data Hangtag</h3>
            <div class="pull-right">
                <a href="#" class="btn btn-success tambah_hangtag">Tambah Data</a>
            </div>
            <!--<?php if ($_POST['item']!="") { ?>
            <br><b>Periode:
              <?php echo date('d F Y', strtotime($_POST['awal']))." s/d ".date('d F Y', strtotime($_POST['akhir'])); ?></b>
			<a href="pages/cetak/masterdata_excel_new.php?awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>" target="_blank" class="btn btn-danger pull-right">Cetak</a>  
            <?php } ?>-->
            
          </div>
          <div class="box-body">
            <table id="example3" class="table table-bordered table-hover table-striped display" width="100%">
              <thead class="bg-red">
                <tr>
                  <th width="41"><div align="center">No</div></th>
                  <th><div align="center">No Item</div></th>
                  <th><div align="center">Hangtag</div></th>
                  <th><div align="center">Aksi</div></th>
                </tr>
              </thead>
              <tbody>
                <?php
				  if($Item!=""){ $where.=" WHERE no_item='$_POST[item]' ";}
                $sql=mysqli_query($con,"SELECT * FROM tbl_master_hangtag $where");
                while ($r=mysqli_fetch_array($sql)) {
                $no++;
                $bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
                ?>
                <tr bgcolor="<?php echo $bgcolor; ?>">
                  <td align="center">
                    <?php echo $no; ?>
                  </td>
                  <td align="center"><?php echo $r['no_item'];?></td>
                  <td align="center"><?php echo $r['hangtag'];?></td>
                  <td align="center"><div class="btn-group">
                  <a href="#" id='<?php echo $r['id']; ?>' class="btn btn-info btn-xs edit_hangtag"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i> </a>
                  <a href="#" class="btn btn-danger btn-xs" onclick="confirm_delete('./HapusDataHangtag-<?php echo $r['id'] ?>');"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus"></i> </a>
                  </div></td>
                </tr>
                <?php } ?>
              </tbody>
              <tfoot class="bg-red">
              </tfoot>
            </table>
            </form>
			
          </div>
        </div>
      </div>
    </div>
    <div id="DtMail" class="modal fade modal-rotate-from-bottom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    </div>
    </div>
    <div id="TambahHangtag" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
    <div id="EditHangtag" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
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

</html>
