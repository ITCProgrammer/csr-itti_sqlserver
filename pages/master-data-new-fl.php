<?php
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>
<?php
$Awal		= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir		= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$Order		= isset($_POST['no_order']) ? $_POST['no_order'] : '';
$PO			= isset($_POST['no_po']) ? $_POST['no_po'] : '';
$Langganan	= isset($_POST['langganan']) ? $_POST['langganan'] : '';
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
                <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir; ?>" autocomplete="off"/>
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
            <h3 class="box-title">Data Test Quality</h3>
            <?php if ($_POST['awal']!="" and $_POST['akhir']!="") {
    ?>
            <br><b>Periode:
              <?php echo date('d F Y', strtotime($_POST['awal']))." s/d ".date('d F Y', strtotime($_POST['akhir'])); ?></b>
			<a href="pages/cetak/masterdata_excel_new_fl.php?awal=<?php echo $Awal; ?>&akhir=<?php echo $Akhir; ?>" target="_blank" class="btn btn-danger pull-right">Cetak</a>  
            <?php
} ?>
            
          </div>
          <div class="box-body"> 
            <table id="example3" class="table table-bordered table-hover table-striped display" width="100%">
              <thead class="bg-red" >
                <tr>
                  <th ><div align="center">No Report FL</div></th> 
                  <th ><div align="center">No Demand</div></th>
                  <th ><div align="center">Prod Order</div></th>
                  <th ><div align="center">No KK Legacy</div></th>
                  <th><div align="center">Tgl Masuk</div></th>
				  
                  <th><div align="center">Tgl Target</div></th>
                  <th><div align="center">Pelanggan</div></th>
                  <th><div align="center">No Order</div></th>  
                  <th><div align="center">No Item</div></th>
                  <th><div align="center">Jenis Kain  </div></th>  
				  
                  <th><div align="center">Season </div></th>   
                  <th><div align="center">Tgl Expired Report </div></th> 
                  <th><div align="center">Status Test </div></th> 
				  <th><div align="center">Warna</div></th> 
				  <th><div align="center">Penanggung Jawab First Lot </div></th> 
                  			
                  <th><div align="center">No Previous Report </div></th>   
                  <th><div align="center">Tgl Previous report </div></th>  
                  <th><div align="center">Note </div></th>                     
                 
                </tr>
              </thead>
              <tbody>
                <?php
				
				
					$awal = $_POST['awal'];
					$akhir = date('Y-m-d', strtotime($_POST['akhir'])) . ' 23:59:59';
         
        /*
          echo $awal ; echo '<br>';
          echo $akhir ; exit; 
				
				  // echo 1 ; exit;
				*/

				  if($Order!=""){ $where.=" WHERE no_order='$_POST[no_order]' ";}
				  else if($PO!=""){ $where.=" WHERE no_po LIKE '$_POST[no_po]%' ";}
				  else if($Langganan!=""){ $where.=" WHERE pelanggan LIKE '$_POST[langganan]%' ";}	  
				  else {$where.=" WHERE a.tgl_masuk BETWEEN '$awal' AND '$akhir' ";}
  $sql=mysqli_query($con,"SELECT a.*, b.tgl_expired_report, b.status, b.penanggung_jawab_fl, b.no_previous_report, b.tgl_previous_report, b.note FROM tbl_tq_first_lot a 
  INNER JOIN tbl_tq_test_fl b ON a.id=b.id_nokk WHERE a.tgl_masuk BETWEEN '$awal' AND '$akhir' ");
  while ($r=mysqli_fetch_array($sql)) {
      $no++;
      $bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
	  $sqlR=mysqli_query($con,"SELECT * FROM tbl_qcf WHERE nodemand='".$r['nodemand']."'");
	  $rR=mysqli_fetch_array($sqlR);
      ?>
                <tr bgcolor="<?php echo $bgcolor; ?>">
				
                  <td align="center"><?php echo $r['no_report_fl'] ;?></td>   
                  <td align="center"><?php echo $r['nodemand'];?></td>
                  <td align="center"><?php echo $r['lot'];?></td>
                  <td align="center"><?php echo $r['legacy'] ;?></td>
                  <td align="center"><?php echo $r['tgl_masuk'];?></td>
				  
                  <td align="center"><?php echo $r['tgl_target'];?></td>            
                  <td align="center"><?php  echo $r['pelanggan'];?></td>
                  <td align="center"><?php echo $r['no_order'];?></td>
                  <td align="center"><?php echo $r['no_item'];?></td>
                  <td align="center"><?php echo $r['jenis_kain'];?></td>
				  
                  <td align="center"><?php echo $r['season'];?></td>
				          <td align="center"><?php echo $r['tgl_expired_report'];?></td>
				          <td align="center"><?php echo $r['status'];?></td>
                  <td align="center"><?php echo $r['warna'];?></td>
                  <td align="center"><?php echo $r['penanggung_jawab_fl'];?></td>
                       
                  <td align="center"><?php echo $r['no_previous_report'];?></td>
                  <td align="center"><?php echo $r['tgl_previous_report'];?></td>
                  <td align="center"><?php echo $r['note'];  ;?></td>
                 
                </tr>
                <?php
  
  } ?>
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
