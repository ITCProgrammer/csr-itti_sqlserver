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
$Hanger		= isset($_POST['hanger']) ? $_POST['hanger'] : '';
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
        <h3 class="box-title">Filter Rekap Bon Pengubung</h3>
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
                <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" />
              </div>
            </div>
            <div class="col-sm-2">
              <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir; ?>" />
              </div>
            </div>
			<div class="col-sm-2">
             <input name="langganan" type="text" class="form-control" id="langganan" placeholder="Langganan" value="<?php echo $Langganan; ?>" />
		</div>  
			<div class="col-sm-2">
             <input name="no_order" type="text" class="form-control" id="no_order" placeholder="No Order" value="<?php echo $Order; ?>" />
		</div>
			 <div class="col-sm-2">
             <input name="no_po" type="text" class="form-control" id="no_po" placeholder="PO" value="<?php echo $PO; ?>" />
		</div> 
			  
			  <div class="col-sm-2">
             <input name="hanger" type="text" class="form-control" id="hanger" placeholder="No Hanger" value="<?php echo $Hanger; ?>" />
		</div>
           
            <!-- /.input group -->
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
			 <button type="submit" class="btn btn-success pull-right" name="cari"><i class="fa fa-search"></i> Cari Data</button>
          </div>
          <!-- /.box-footer -->

        </div>
      </form>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Data  Bon Penghubung</h3><br>
            <?php if ($_POST['awal']!="" and $_POST['akhir']!="") {
    ?><b>Periode:
              <?php echo date('d F Y', strtotime($_POST['awal']))." s/d ".date('d F Y', strtotime($_POST['akhir'])); ?></b>
            <?php
} ?>
            
          </div>
          <div class="box-body">
            <table id="example3" class="table table-bordered table-hover table-striped display nowrap" width="100%">
              <thead class="bg-red">
                <tr>
                  <th width="41">
                    <div align="center">No</div>
                  </th>
                  <th width="97"><div align="center">Preview</div></th>
                  <th width="97">
                    <div align="center">Tanggal</div>
                  </th>
                  <th width="91"><div align="center">Bon</div></th>
                  <th width="91">
                    <div align="center">Langganan</div>
                  </th>
                  <th width="107">
                    <div align="center">Order</div>
                  </th>
                  <th width="749"><div align="center">PO</div></th>
                  <th width="749">
                    <div align="center">Jenis Kain</div>
                  </th>
                  <th width="87"><div align="center">Item</div></th>
                  <th width="87"><div align="center">No Warna</div></th>
                  <th width="87"><div align="center">Warna</div></th>
                  <th width="87"><div align="center">Lot</div></th>
                  <th width="87"><div align="center">Roll</div></th>
                  <th width="87"><div align="center">Qty</div></th>
                  <th width="87"><div align="center">Masalah</div></th>
                  <th width="87"><div align="center">Tg Jawab</div></th>
                  <th width="87"><div align="center">Extra (KGs)</div></th>
                  <th width="87"><div align="center">Estimasi (KGs)</div></th>
                  <th><div align="center">Extra (panjang)</div></th>
                  <th><div align="center">Estimasi (panjang)</div></th>
                  <th><div align="center">Qty Order (KGs)</div></th>
                  <th><div align="center">Qty Order (Panjang)</div></th>
                  <th><div align="center">%Extra (KGs)</div></th>
                  <th><div align="center">%Extra (panjang)</div></th>
                  <th><div align="center">%Estimasi (KGs)</div></th>
                  <th><div align="center">%Estimasi (panjang)</div></th>
                </tr>
              </thead>
              <tbody>
                <?php
				  if($Hanger!=""){ $where0.=" AND no_hanger='$_POST[hanger]' ";}else { $where0=""; }
				  if($Order!=""){ $where1.=" AND no_order='$_POST[no_order]' ";}else { $where1=""; }
				  if($PO!=""){ $where2.=" AND no_po LIKE '$_POST[no_po]%' ";}else { $where2=""; }
				  if($Langganan!=""){ $where3.=" AND pelanggan LIKE '$_POST[langganan]%' ";} else { $where3=""; }	  
				  if($_POST['awal']!="" and $_POST['akhir']){$where4.=" AND tgl_kirim BETWEEN '$_POST[awal]' AND '$_POST[akhir]' ";}else{ $where4=""; }
				  if($Order=="" and $PO=="" and $Langganan=="" and $_POST['awal']=="" and $_POST['akhir']=="" and $Hanger=="")
				  { $where=" WHERE c.id='' "; }else{ $where=" WHERE NOT isnull(c.id) ";}
  $sql=mysqli_query($con,"SELECT c.id,tgl_kirim,no_bon,pelanggan,no_order,no_po,jenis_kain,no_item,warna,no_warna,lot,rol_mslh,qty_mslh,b.masalah,dept,estimasi,panjang_estimasi,panjang_extra,berat_extra,berat_order,panjang_order,satuan_order FROM tbl_qcf a
INNER JOIN tbl_email_bon c ON a.bpp=c.no_bon
LEFT JOIN tbl_qcf_detail b ON a.id=b.id_qcf ".$where.$where0.$where1.$where2.$where3.$where4." ");
  while ($r=mysqli_fetch_array($sql)) {
      $no++;
      $bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
      ?>
                <tr bgcolor="<?php echo $bgcolor; ?>">
                  <td align="center">
                    <?php echo $no; ?>
                  </td>
                  <td align="center"><a href="#" class="btn btn-xs dtmail btn-warning" id=<?php echo $r['id']; ?>><i class="fa fa-paper-plane-o"></i> </span></a></td>
                  <td align="center"><?php echo $r['tgl_kirim']; ?></td>
                  <td align="center"><?php echo $r['no_bon']; ?></td>
                  <td><?php echo $r['pelanggan']; ?></td>
                  <td align="center"><?php echo $r['no_order']; ?></td>
                  <td><?php echo $r['no_po']; ?></td>
                  <td><?php echo $r['jenis_kain']; ?></td>
                  <td align="center"><?php echo $r['no_item']; ?></td>
                  <td><?php echo $r['no_warna']; ?></td>
                  <td><?php echo $r['warna']; ?></td>
                  <td align="center"><?php echo $r['lot']; ?></td>
                  <td align="center"><?php echo $r['rol_mslh']; ?></td>
                  <td align="center"><?php echo $r['qty_mslh']; ?></td>
                  <td><?php echo $r['masalah']; ?></td>
                  <td align="center"><?php echo $r['dept']; ?></td>
                  <td align="right"><?php echo $r['berat_extra']; ?></td>
                  <td align="right"><?php echo $r['estimasi']; ?></td>
                  <td align="right"><?php echo $r['panjang_extra']; ?></td>
                  <td align="right"><?php echo $r['panjang_estimasi']; ?></td>
                  <td align="right"><?php if($r['berat_order']!=$r['panjang_order']){echo $kgOrd=$r['berat_order'];}else{echo $kgOrd='0';} ?></td>
                  <td align="right"><?php echo $r['panjang_order'];?></td>
                  <td align="right"><?php if($kgOrd!="0"){echo round($r['berat_extra']/$kgOrd,4)*100;}else{ echo "0";} ?></td>
                  <td align="right"><?php if($r['panjang_extra']!=""){echo round($r['panjang_extra']/$r['panjang_order'],4)*100;} ?></td>
                  <td align="right"><?php if($kgOrd!="0"){echo round($r['estimasi']/$kgOrd,4)*100;}else{ echo "0";} ?></td>
                  <td align="right"><?php if($r['panjang_estimasi']!=""){echo round($r['panjang_estimasi']/$r['panjang_order'],4)*100;} ?></td>
                </tr>
                <?php
  $total=$total+$r['qty_order'];
  } ?>
              </tbody>
              <tfoot class="bg-red">
                <tr>
                  <th> <div align="center">No</div>
                  </th>
                  <th><div align="center">Preview</div></th>
                  <th> <div align="center">Tanggal</div>
                  </th>
                  <th><div align="center">Bon</div></th>
                  <th> <div align="center">Langganan</div>
                  </th>
                  <th> <div align="center">Order</div>
                  </th>
                  <th><div align="center">PO</div></th>
                  <th> <div align="center">Jenis Kain</div>
                  </th>
                  <th><div align="center">Item</div></th>
                  <th><div align="center">No Warna</div></th>
                  <th><div align="center">Warna</div></th>
                  <th><div align="center">Lot</div></th>
                  <th><div align="center">Roll</div></th>
                  <th><div align="center">Qty</div></th>
                  <th><div align="center">Masalah</div></th>
                  <th><div align="center">Tg Jawab</div></th>
                  <th><div align="center">Extra (KGs)</div></th>
                  <th><div align="center">Estimasi (KGs)</div></th>
                  <th><div align="center">Extra (panjang)</div></th>
                  <th><div align="center">Estimasi (panjang)</div></th>
                  <th><div align="center">Qty Order (KGs)</div></th>
                  <th><div align="center">Qty Order (panjang)</div></th>
                  <th><div align="center">%Extra (KGs)</div></th>
                  <th><div align="center">%Extra (panjang)</div></th>
                  <th><div align="center">%Estimasi (KGs)</div></th>
                  <th><div align="center">%Estimasi (panjang)</div></th>
                </tr>
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
