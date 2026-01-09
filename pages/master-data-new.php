<?php
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

 

?>
<?php

$Awal		= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir		= isset($_POST['akhir']) ? $_POST['akhir'] : '';

$no_order 	= isset($_POST['no_order'])?$_POST['no_order']:null;
$no_po      = isset($_POST['no_po'])?$_POST['no_po']:null;
$hanger     = isset($_POST['hanger'])?$_POST['hanger']:null;
$development = isset($_POST['development'])?$_POST['development']:null;
$warna 	  	= isset($_POST['warna'])?$_POST['warna']:null;
$pelanggan  = isset($_POST['pelanggan'])?$_POST['pelanggan']:null;
$demand 	= isset($_POST['demand'])?$_POST['demand']:null;
$prod_order = isset($_POST['prod_order'])?$_POST['prod_order']:null;

/*
$Order		= isset($_POST['no_order']) ? $_POST['no_order'] : '';
$PO			= isset($_POST['no_po']) ? $_POST['no_po'] : '';
$Langganan	= isset($_POST['langganan']) ? $_POST['langganan'] : '';
*/

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
        <h3 class="box-title">Filter Data Test Quality</h3>
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
              <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" required/>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir; ?>" required/>
              </div>
            </div>
			
			 
			
		
			
		
			<!--<div class="col-sm-2">
             <input name="no_order" type="text" class="form-control" id="no_order" placeholder="No Order" value="<?php echo $Order; ?>" />
		</div>
			 <div class="col-sm-2">
             <input name="no_po" type="text" class="form-control" id="no_po" placeholder="PO" value="<?php echo $PO; ?>" />
		</div> 
			  <div class="col-sm-2">
             <input name="langganan" type="text" class="form-control" id="langganan" placeholder="Langganan" value="<?php echo $Langganan; ?>" />
		</div>--> 
           
            <!-- /.input group -->
          </div>
		  

		  
<div class="form-group">
	<div class="col-sm-2">      
		<input name="no_order" type="text" class="form-control pull-right" placeholder="No Order" value="<?=$no_order?>" >            
	</div>
	
	<div class="col-sm-2">      
		<input name="no_po" type="text" class="form-control pull-right" placeholder="No PO" value="<?=$no_po?>" >            
	</div>

	<div class="col-sm-2">      
		<input name="hanger" type="text" class="form-control pull-right" placeholder="Hanger" value="<?=$hanger?>" >            
	</div>

	<div class="col-sm-2">
    <div class="input-group">  
      <select name="development" id="development" class="form-control select2">
        <option value="">Pilih</option>
        <?php if($_POST['development']!=""){?>
						<option <?php if($_POST['development']!=""){?> selected=selected <?php };?> value="<?php echo $development;?>"><?php echo $development; ?></option>
				<?php }?>
        <option value="Development">Development</option>
        <option value="1st Bulk">1st Bulk</option>
        <option value="Reorder">Reorder</option>
        <option value="Additional">Additional</option>
        <option value="Labdip">Labdip</option>
        <option value="Mini Bulk">Mini Bulk</option>
        <option value="Request">Request</option>
      </select>
    </div>
  </div>	
	
</div>

<div class="form-group">

	<div class="col-sm-2">      
		<input name="warna" type="text" class="form-control pull-right" placeholder="Warna" value="<?=$warna?>" >            
	</div>

	<div class="col-sm-2">      
		<input name="pelanggan" type="text" class="form-control pull-right" placeholder="Pelanggan" value="<?=$pelanggan?>" >            
	</div>

	<div class="col-sm-2">      
		<input name="demand" type="text" class="form-control pull-right" placeholder="Demand" value="<?=$demand?>" >            
	</div>
	
	<div class="col-sm-2">      
		<input name="prod_order" type="text" class="form-control pull-right" placeholder="Prod Order"  value="<?=$prod_order?>" >            
	</div>
</div>

<div class="form-group">

	<div class="col-sm-2">      
		 <button type="submit" class="btn btn-success " name="cari"><i class="fa fa-search"></i> Cari Data</button>         
	</div>
	
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
            <h3 class="box-title">Data Test Quality</h3>
            <?php if ($_POST['awal']!="" and $_POST['akhir']!="") {
				

    ?>
            <br><b>Periode:
              <?php echo date('d F Y', strtotime($_POST['awal']))." s/d ".date('d F Y', strtotime($_POST['akhir'])); ?></b>
<a href="pages/cetak/masterdata_excel_new.php?awal=<?php echo $Awal; ?>
&akhir=<?php echo $Akhir; ?>
&no_order=<?php echo $no_order; ?>
&no_po=<?php echo $no_po; ?>
&hanger=<?php echo $hanger; ?>
&warna=<?php echo $warna; ?>
&pelanggan=<?php echo $pelanggan; ?>
&demand=<?php echo $demand; ?>
&prod_order=<?php echo $prod_order; ?>
&development=<?php echo $development; ?>
" 

target="_blank" class="btn btn-danger pull-right">Cetak</a>  
            <?php
} ?>
            
          </div>
          <div class="box-body">
            <table id="example3" class="table table-bordered table-hover table-striped display" width="100%">
              <thead class="bg-red">
                <tr>
                  <th width="41">
                    <div align="center">No</div>
                  </th>
                  <th width="41"><div align="center">NO DEMAND</div></th>
                  <th><div align="center">TGL</div></th>
                  <th><div align="center">NO.TEST</div></th>
                  <th><div align="center">NO. HANGER / ITEM</div></th>
                  <th><div align="center">LANGGANAN / BUYER</div></th>
                  <th width="41"><div align="center">ORDER</div></th>
                  <th width="41"><div align="center">DESCRIPTION</div></th>
                  <th width="41"><div align="center">PROD ORDER</div></th>
                  <th width="41"><div align="center">COLOR</div></th>
                  <th width="41"><div align="center">PROCESS</div></th>
                  <th width="41"><div align="center">ROL</div></th>
                  <th width="41"><div align="center">NETTO</div></th>
                </tr>
              </thead>
              <tbody>
                <?php
				
				
	 
				 /*
				  if($Order!=""){ $where.=" WHERE no_order='$_POST[no_order]' ";}
				  else if($PO!=""){ $where.=" WHERE no_po LIKE '$_POST[no_po]%' ";}
				  else if($Langganan!=""){ $where.=" WHERE pelanggan LIKE '$_POST[langganan]%' ";}	  
				  else {$where.=" WHERE a.tgl_masuk BETWEEN '$_POST[awal]' AND '$_POST[akhir]' ";}
				  */
  $sql = "SELECT *, a.id as idkk 
  FROM tbl_tq_nokk a 
  INNER JOIN tbl_tq_test b ON a.id=b.id_nokk 
  WHERE a.tgl_masuk BETWEEN '$_POST[awal]' AND '$_POST[akhir]' ";

  if (!empty($no_order)) {
	$sql .= " AND a.no_order = '$no_order'";
  }
  if (!empty($no_po)) {
	$sql .= " AND a.no_po = '$no_po'";
  }
  if (!empty($hanger)) {
	$sql .= " AND a.no_hanger = '$hanger'";
  }
if (!empty($development)) {
    $sql .= " AND a.development = '$development'";
    }
  if (!empty($warna)) {
	$sql .= " AND a.warna = '$warna'";
  }
  if (!empty($pelanggan)) {
	$sql .= " AND a.pelanggan like '%$pelanggan%'";
  }
  
  if (!empty($demand)) {
	$sql .= " AND a.nodemand = '$demand' ";
  }
  
  if (!empty($prod_order)) {
	$sql .= " AND a.lot = '$prod_order' ";
  }
  
  
  $results=mysqli_query($con,$sql);
  

  
  
  
  
  //penambahan no demand multiple
  $sql_demand = "SELECT *, a.id as idkk, c.nodemand as nodemand_multiple  
  FROM tbl_tq_nokk a 
  INNER JOIN tbl_tq_test b ON a.id=b.id_nokk 
  join tbl_tq_nokk_demand c on (a.id = c.id_nokk)
  WHERE a.tgl_masuk BETWEEN '$_POST[awal]' AND '$_POST[akhir]' ";
  
  $demand_results=mysqli_query($con,$sql_demand);
  
$array = [];
while( $demand_row=mysqli_fetch_array($demand_results) ){ 
$array[$demand_row['idkk']][] = $demand_row['nodemand_multiple'];
}


  while ($r=mysqli_fetch_array($results)) {
      $no++;
      $bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
	  $sqlR=mysqli_query($con,"SELECT * FROM tbl_qcf WHERE nodemand='".$r['nodemand']."'");
	  $rR=mysqli_fetch_array($sqlR);
      ?>
                <tr bgcolor="<?php echo $bgcolor; ?>">
                  <td align="center">
                    <?php echo $no;
							
					?>				
                  </td>
                  <td align="center"><?php echo $r['nodemand'];?></td>
                  <td align="center"><?php echo $r['tgl_masuk'];?></td>
                  <td align="center"><?php echo $r['no_test'];?></td>
                  <td align="center"><?php echo $r['no_item'];?></td>
                  <td><?php echo $r['pelanggan'];?></td>
                  <td align="center"><?php echo $r['no_order'];?></td>
                  <td><?php echo $r['jenis_kain'];?></td>
                  <td align="center"><?php echo $r['lot'];?></td>
                  <td align="center"><?php echo $r['warna'];?></td>
                  <td align="center"><?php echo $r['proses_fin'];?></td>
                  <td align="center"><?php echo $rR['rol']; ?></td>
                  <td align="center"><?php echo $rR['netto']; ?></td>
                </tr>
				
				
					<?php //penambahan no demand multiple 
				if (array_key_exists($r['idkk'],$array)) {
					
					foreach ($array[$r['idkk']] as $key=>$d) { 
					$no++;
					?>
				<tr bgcolor="<?php echo $bgcolor; ?>">
					  <td align="center">
						<?php echo $no; ?>
					  </td>
					  <td align="center"><?php echo $d;?></td>
					  <td align="center"><?php echo $r['tgl_masuk'];?></td>
					  <td align="center"><?php echo $r['no_test'];?></td>
					  <td align="center"><?php echo $r['no_item'];?></td>
					  <td><?php echo $r['pelanggan'];?></td>
					  <td align="center"><?php echo $r['no_order'];?></td>
					  <td><?php echo $r['jenis_kain'];?></td>
					  <td align="center"><?php echo $r['lot'];?></td>
					  <td align="center"><?php echo $r['warna'];?></td>
					  <td align="center"><?php echo $r['proses_fin'];?></td>
					  <td align="center"><?php echo $rR['rol']; ?></td>
					  <td align="center"><?php echo $rR['netto']; ?></td>
                </tr>
					
				<?php }} ?>	
					
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
  </body>

</html>
