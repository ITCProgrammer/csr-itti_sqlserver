<?PHP
$nomutasiP	= isset($_POST['no_mutasi']) ? $_POST['no_mutasi'] : '';
$nomutasiG	= isset($_GET['no_mutasi']) ? $_GET['no_mutasi'] : '';
$act 		= isset($_GET['act'])?$_GET['act']:'';
if($nomutasiP!=""){ 
$nomutasi=$nomutasiP;
}else{
$nomutasi=$nomutasiG;	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Serah Terima KK</title>

</head>
<body>	
<form role="form" method="post" enctype="multipart/form-data" name="form1" id="form1" action="TerimaKKSimpan/">
<input type="hidden" value="<?php echo $_SESSION['userGKJ']; ?>" name="user_terima">	
	
<div class="row"> 
     <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
			<h3 class="card-title">Data Serah Terima KK</h3>
			<div class="form-group">
				     <button class="btn btn-danger float-right" type="submit" name="save" value="Save"><i class="fa fa-save"></i> Save </button>					 
				</div>	
			</div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
<table id="example1" width="100%" class="table table-sm table-striped table-bordered" style="font-size: 14px;">
 <thead class="btn-default">
  <tr>
    <th width="2%"><div align="center">No.</div></th>
    <th width="8%"><div align="center">No Mutasi</div></th>
    <th width="7%"><div align="center">Nokk</div></th>
    <th width="20%"><div align="center">Langganan</div></th>
    <th width="14%"><div align="center">No Order</div></th>
    <th width="12%"><div align="center">PO</div></th>
    <th width="6%"><div align="center">Lot</div></th>
    <th width="5%"><div align="center">Rol</div></th>
    <th width="6%"><div align="center">Berat</div></th>
    <th width="7%"><div align="center">Panjang</div></th>
    <th width="9%"><div align="center">Status</div></th>
    <th width="4%"><div align="center"><input type="checkbox" name="allbox" value="check" onClick="checkAll(0);" /></div></th>
    </tr>
  </thead>
  <tbody>
  <?php 
$no=1;  
?>
  <tr align="center">
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $rowd['no_mutasi'];?></td>
    <td align="center"><?php echo $rowd['nokk'];?></td>
    <td align="left"><?php echo $rowd['langganan'];?></td>
    <td align="center"><?php echo $rowd['no_order'];?></td>
    <td align="center"><?php echo $rowd['no_po'];?></td>
    <td align="center"><?php echo $rowd['lot'];?></td>
    <td align="center"><?php echo $rowd['jml_roll'];?></td>
    <td align="right"><?php echo $rowd['berat'];?></td>
    <td align="right"><?php echo $rowd['panjang']." ".$rowd['satuan'];?></td>
    <td align="center"><?php if($rowd['sts']=="Belum diterima"){echo "<span class='badge badge-danger'>".$rowd['sts']."</span>";}else{ echo  "<span class='badge badge-success'>".$rowd['sts']."</span>";}?></td>
    <td align="center"><input type="checkbox" name="cek[<?php echo $no; ?>]" value="<?php echo $rowd['id']; ?>"/> </td>
    </tr>
	  <?php $no++;?>
  </tbody>
</table>
			  </div>	
				
</div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
</div>	
</form>
<!-- Modal Popup untuk Edit--> 
<div id="StsUsrEdit" class="modal fade"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<div id="LvlUsrEdit" class="modal fade"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>	
<!-- Modal Popup untuk delete-->
            <div class="modal fade" id="delSerah" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content" style="margin-top:100px;">
                  <div class="modal-header">
					<h4 class="modal-title">INFOMATION</h4>  
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    
                  </div>
					<div class="modal-body">
						<h5 class="modal-title" style="text-align:center;">Do you want to cancel this data submission ?</h5>
					</div>	
                  <div class="modal-footer justify-content-between">
                    <a href="#" class="btn btn-danger" id="delete_link">Yes</a>
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                  </div>
                </div>
              </div>
            </div>	
</body>
</html>


<script type="text/javascript">
              function confirm_delete(delete_url) {
                $('#delSerah').modal('show', {
                  backdrop: 'static'
                });
                document.getElementById('delete_link').setAttribute('href', delete_url);
              }
</script>
<script type="text/javascript">
function checkAll(form1){
    for (var i=0;i<document.forms['form1'].elements.length;i++)
    {
        var e=document.forms['form1'].elements[i];
        if ((e.name !='allbox') && (e.type=='checkbox'))
        {
            e.checked=document.forms['form1'].allbox.checked;
			
        }
    }
}
</script>