<?php 
//$tglsisa=$_GET['tgl_sisa'];
include"koneksi.php";
ini_set("error_reporting", 1);
?>
<div class="row">
<div class="col-xs-12">
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Input Sisa Siap Packing</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
    </div>
    <div class="box-body">
        <div class="col-md-6">
            <div class="form-group">		  	
                <label for="tgl_sisa" class="col-sm-3 control-label">Tgl Laporan</label>
                    <div class="col-sm-4">					  
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                <input name="tgl_sisa" type="date" class="form-control pull-right" placeholder="0000-00-00" value="" required/>
                        </div>
                    </div>
            </div>
            <div class="form-group">
                <label for="sisa_packing" class="col-sm-3 control-label">Sisa Siap Packing</label>
                <div class="col-sm-4">
                    <input name="sisa_packing" type="text" class="form-control" id="sisa_packing" value="" placeholder="Sisa Siap Packing" required/>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right" name="simpan" value="simpan"><i class="fa fa-save"></i> Simpan</button> 
    </div>
</div>
</form>
</div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Data Sisa Siap Packing</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped" id="example1" style="width: 30%;">
                    <thead class="bg-red">
                        <tr>
                            <th width="10%" ><div align="center">Tgl Lap</div></th>
                            <th width="14%" ><div align="center">Sisa Siap Packing</div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql1=mysqli_query($con,"SELECT * FROM tbl_sisa_packing ORDER BY tgl_sisa ASC");
                        
                        while($row1=mysqli_fetch_array($sql1)){
                        ?>
                         <tr>
                            <td width="10%" align="center"><?php echo $row1['tgl_sisa'];?></td>
                            <td width="14%" align="center"><a data-pk="<?php echo $row1['id'] ?>" data-value="<?php echo $row1['sisa_packing'] ?>" class="sisa_packing" href="javascipt:void(0)"><?php echo $row1['sisa_packing'] ?></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
//Data sudah disimpan di database mysqli
$qry=mysqli_query($con,"SELECT * FROM `tbl_sisa_packing` WHERE `tgl_sisa`='$_POST[tgl_sisa]' ORDER BY id DESC");
$row=mysqli_fetch_array($qry);
$cek=mysqli_num_rows($qry);

if($_POST['simpan']=="simpan" AND $cek==0){
    $sql=mysqli_query($con,"INSERT INTO tbl_sisa_packing SET
    `tgl_sisa`='$_POST[tgl_sisa]',
    `sisa_packing`='$_POST[sisa_packing]'");
    if($sql){
        echo "<script>swal({
            title: 'Data has been saved!',   
            text: 'Klik Ok untuk input data kembali',
            type: 'success',
            }).then((result) => {
            if (result.value) {
                window.location.href='SisaSiapPacking';
               
            }
          });</script>";
	}
}else if($_POST['simpan']=="simpan" AND $cek>0){
    echo "<script>swal({
        title: 'Data Sudah Pernah Diinput!',   
        text: 'Klik Ok untuk input data kembali',
        type: 'info',
        }).then((result) => {
        if (result.value) {
            window.location.href='SisaSiapPacking';
        }
      });</script>";
}
?>