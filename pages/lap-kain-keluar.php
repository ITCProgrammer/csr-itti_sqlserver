<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Harian Kain Keluar</title>
</head>
<body>
<?php
$Awal	    = isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	    = isset($_POST['akhir']) ? $_POST['akhir'] : '';
$Order	    = isset($_POST['order']) ? $_POST['order'] : '';
$PO	        = isset($_POST['po']) ? $_POST['po'] : '';
$GShift	    = isset($_POST['gshift']) ? $_POST['gshift'] : '';
$Kategori	= isset($_POST['kategori']) ? $_POST['kategori'] : '';
$ckKite     = isset($_POST['ckKite']) ? $_POST['ckKite'] : '';
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Laporan Harian Kain Keluar</h3>
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
                <input name="awal" type="date" class="form-control pull-right" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
            </div>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <div class="col-sm-2">
            <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="akhir" type="date" class="form-control pull-right" placeholder="Tanggal Akhir" value="<?php echo $Akhir; ?>" autocomplete="off"/>
            </div>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <input name="order" type="text" class="form-control pull-right" id="order" placeholder="No Order" value="<?php echo $Order;  ?>" autocomplete="off"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <input name="po" type="text" class="form-control pull-right" id="po" placeholder="No PO" value="<?php echo $PO;  ?>" autocomplete="off"/>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <select name="kategori" class="form-control select2">
                    <option value="">Pilih</option>
                	<option value="Pengiriman" <?php if($Kategori=="Pengiriman"){ echo "SELECTED";}?>>Pengiriman</option>
                	<option value="Bongkaran" <?php if($Kategori=="Bongkaran"){ echo "SELECTED";}?>>Bongkaran</option>
                    <option value="Ganti Stiker" <?php if($Kategori=="Ganti Stiker"){ echo "SELECTED";}?>>Ganti Stiker</option>
                    <option value="Revisi Stiker" <?php if($Kategori=="Revisi Stiker"){ echo "SELECTED";}?>>Revisi Stiker</option>
                </select>
            </div>			 
        </div>
        <div class="form-group">
		    <label for="ckKite" class="col-sm-0 control-label"></label>		  
                <div class="col-sm-3">
                    <input type="checkbox" name="ckKite" id="ckKite" value="1" <?php  if($ckKite=="1"){ echo "checked";} ?>>  
                    <label> Fasilitas KITE</label>
                </div>		  	
		</div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="col-sm-2">
        <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i class="fa fa-search"></i></button>
      </div>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
            <h3 class="box-title">Data Laporan Harian Kain Keluar</h3><br>
            <?php if($_POST['awal']!="") { ?><b>Periode: <?php echo $_POST['awal']." s/d ".$_POST['akhir']; ?></b><br>
            <?php } ?>
            <?php if($_POST['gshift']!="") { ?><b>Shift: <?php echo $_POST['gshift'];?></b><?php } ?>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example8" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th rowspan="3"><div align="center">Tgl</div></th>
              <th rowspan="3"><div align="center">No SJ</div></th>
              <th rowspan="3"><div align="center">Document No</div></th>
              <th rowspan="3"><div align="center">No Item</div></th>
              <th rowspan="3"><div align="center">Langganan</div></th>
              <th rowspan="3"><div align="center">PO</div></th>
              <th rowspan="3"><div align="center">Order</div></th>
              <th rowspan="3"><div align="center">Jenis Kain</div></th>
              <th rowspan="3"><div align="center">No Warna</div></th>
              <th rowspan="3"><div align="center">Warna</div></th>
              <th rowspan="3"><div align="center">No Card</div></th>
              <th rowspan="3"><div align="center">Lot</div></th>
              <th rowspan="3"><div align="center">Roll</div></th>
              <th colspan="4"><div align="center">Netto (KG)</div></th>
              <th rowspan="3"><div align="center">Yard/Meter</div></th>
              <th rowspan="3"><div align="center">Lokasi</div></th>
              <th rowspan="3"><div align="center">Extra Q</div></th>
              <th rowspan="3"><div align="center">Lebar</div></th>
              <th rowspan="3"><div align="center">X</div></th>
              <th rowspan="3"><div align="center">Gramasi</div></th>
              <th rowspan="3"><div align="center">OL</div></th>
              <th rowspan="3"><div align="center">Keterangan</div></th>
            </tr>
            <tr>
                <th colspan="3"><div align="center">Grade</div></th>
                <th rowspan="2"><div align="center">Keterangan</div></th>
            </tr>
            <tr>
                <th><div align="center">A</div></th>
                <th><div align="center">B</div></th>
                <th><div align="center">C</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
            if($Awal!="" AND $Akhir!=""){$tgl=" AND DATE_FORMAT(a.tgl_update,'%Y-%m-%d') BETWEEN '$Awal' AND '$Akhir' ";}
            if($_POST['gshift']!=""){$shift1=" AND a.shift='$_POST[gshift]' ";}else{$shift1=" ";}
            if($_POST['order']!=""){$order1=" AND c.no_order='$_POST[order]' ";}else{$order1=" ";}
            if($_POST['po']!=""){$po1=" AND c.no_po='$_POST[po]' ";}else{$po1=" ";}
            //else if($Akhir=="" and $_POST['order']=="")
            //{$tgll=" AND a.tgl_sj BETWEEN '$Awal' AND '$Akhir' ";}
            if($_POST['kategori']=="Pengiriman"){
                $tran=" AND typetrans='1'";}
                    else if($_POST['kategori']=="Bongkaran"){
                $tran=" AND typetrans='2' AND NOT (a.ket LIKE 'GANTI STIKER%' OR a.ket LIKE 'REVISI STIKER%')"  ;}
                    else if($_POST['kategori']=="Ganti Stiker"){
                $tran=" AND typetrans='2' AND a.ket LIKE 'GANTI STIKER%'"  ;}
                  else if($_POST['kategori']=="Revisi Stiker"){
                $tran=" AND typetrans='2' AND a.ket LIKE 'REVISI STIKER%'"  ;}
            else{$tran=" ";}
            if($_POST['ckKite']=="1"){$kite=" AND (b.sisa='KITE' OR b.sisa='FKSI')";}else{$kite=" ";}
            if($Awal!="" or $Akhir!="" or $GShift!="" or $Order!="" or $PO!="" or $Kategori!="" or $ckKite!=""){$where=" a.typestatus = '3' ";}else{$where=" ";}
            if($Awal!="" or $Akhir!="" or $GShift!="" or $Order!="" or $PO!="" or $Kategori!="" or $ckKite!=""){
            $sql=mysqli_query($con,"SELECT
                b.id_detail_kj,a.no_sj,a.tgl_sj,a.documentno,a.blok,a.typetrans,b.weight,b.yard_,b.no_roll,
                b.satuan,b.grade,b.sisa,b.nokk,sum(b.weight) as tot_qty,count(b.yard_) as tot_rol,sum(b.yard_) as tot_yard,
                SUM(case when b.grade='A' or b.grade='B' or b.grade='' then b.weight else 0 end) as grd_ab,
                SUM(case when b.grade='A' or b.grade='' then b.weight else 0 end) as grd_a,
                SUM(case when b.grade='B' then b.weight else 0 end) as grd_b,
                SUM(case when b.grade='C' then b.weight else 0 end) as grd_c,
                SUM(if(b.grade='A' or b.grade='B' or b.grade='', 1, 0)) as jml_ab,
                SUM(if(b.grade = 'C', 1, 0)) as jml_grd_c,a.ket,SUM(d.netto) as netto
                FROM
                pergerakan_stok a
                INNER JOIN detail_pergerakan_stok b ON a.id = b.id_stok
                LEFT JOIN tmp_detail_kite d ON b.id_detail_kj=d.id 
                LEFT JOIN tbl_kite c ON c.id=d.id_kite
                WHERE
                $where $tran $tgl $order1 $po1 $shift1 $kite
                GROUP BY
                a.id,b.nokk,b.sisa
                ORDER BY
                a.id");
            }else{
              $sql=mysqli_query($con,"SELECT
                b.id_detail_kj,a.no_sj,a.tgl_sj,a.documentno,a.blok,a.typetrans,b.weight,b.yard_,b.no_roll,
                b.satuan,b.grade,b.sisa,b.nokk,sum(b.weight) as tot_qty,count(b.yard_) as tot_rol,sum(b.yard_) as tot_yard,
                SUM(case when b.grade='A' or b.grade='B' or b.grade='' then b.weight else 0 end) as grd_ab,
                SUM(case when b.grade='A' or b.grade='' then b.weight else 0 end) as grd_a,
                SUM(case when b.grade='B' then b.weight else 0 end) as grd_b,
                SUM(case when b.grade='C' then b.weight else 0 end) as grd_c,
                SUM(if(b.grade='A' or b.grade='B' or b.grade='', 1, 0)) as jml_ab,
                SUM(if(b.grade = 'C', 1, 0)) as jml_grd_c,a.ket,SUM(d.netto) as netto
                FROM
                pergerakan_stok a
                INNER JOIN detail_pergerakan_stok b ON a.id = b.id_stok
                LEFT JOIN tmp_detail_kite d ON b.id_detail_kj=d.id 
                LEFT JOIN tbl_kite c ON c.id=d.id_kite
                WHERE DATE_FORMAT(a.tgl_update,'%Y-%m-%d') BETWEEN '$Awal' AND '$Akhir'
                GROUP BY
                a.id,b.nokk,b.sisa
                ORDER BY
                a.id");
            }   
                while($row=mysqli_fetch_array($sql)){
                    $bgcolor = ($c++ & 1) ? '#33CCFF' : '#FFCC99';
                    $qry1=mysqli_query($con,"SELECT * FROM tbl_kite WHERE nokk='$row[nokk]' LIMIT 1");
                    $rowk=mysqli_fetch_array($qry1);
                    $mysqliLK =mysqli_query($con,"SELECT GROUP_CONCAT(DISTINCT lokasi) as lokasi FROM detail_pergerakan_stok WHERE nokk='$row[nokk]' AND (transtatus='0' or transtatus='1') order by id desc");
	                $myLK = mysqli_fetch_array($mysqliLK);
              ?>
            <tr bgcolor="<?php echo $bgcolor; ?>">
                <td><?php echo date("d-M-Y", strtotime($row['tgl_sj']));?></td>
                <td><?php $qry=mysqli_query($con,"SELECT b.no_sj,a.refno,a.id_detail_kj from detail_pergerakan_stok a
                INNER JOIN pergerakan_stok c ON a.id_stok=c.id
                LEFT JOIN packing_list b ON a.refno=b.listno
                WHERE a.nokk='$row[nokk]' and a.id_detail_kj='$row[id_detail_kj]' and (ISNULL(a.transtatus) or not ISNULL(a.transtatus)) and NOT ISNULL(a.refno) and NOT ISNULL(b.no_sj) "); 
                $rsj=mysqli_fetch_array($qry);
                if($row['no_sj']==""){echo $rsj['no_sj'];}else{echo $row['no_sj']; }?></td>
                <td><?php echo $row['documentno'];?></td>
                <td><?php echo $rowk['no_item'];?></td>
                <td><?php echo $rowk['pelanggan'];?></td>
                <td><?php echo $rowk['no_po'];?></td>
                <td><?php echo $rowk['no_order'];?></td>
                <td><?php echo htmlentities($rowk['jenis_kain'],ENT_QUOTES);?></td>
                <td><?php echo $rowk['no_warna'];?></td>
                <td><?php echo $rowk['warna'];?></td>
                <td><a href="#" class="detailkeluarkain" id="<?php echo $row['nokk'];?>" ket="<?php echo $row['sisa']; ?>"><?php echo $row['nokk']; ?></a></td>
                <td><?php echo $rowk['no_lot'];?></td>
                <td align="right"><?php 
                $rol=$row['tot_rol'];
                echo $rol;
                ?></td>
                <td align="right"><?php 
                $gra=$row['grd_a'];echo number_format($gra,'2','.',',');?></td>
                <td align="right"><?php 
                $grb=$row['grd_b'];echo number_format($grb,'2','.',',');?></td>
                <td align="right"><?php 
                $grc=$row['grd_c'];
                echo number_format($grc,'2','.',',');?></td>
                <td><?php if($row['sisa']=="SISA" || $row['sisa']=="FKSI"){echo "SISA";}?></td>
                <td align="right"><?php 
                if($row['satuan']=="PCS"){echo number_format($row['netto'])." ".$row['satuan'];}else{
                echo number_format($row['tot_yard'],'2','.',',')." ".$row['satuan'];} ?></td>
                <td><?php if($myLK['lokasi']!=""){echo $myLK['lokasi'];}else{echo "N/A";}?>
                </td>
                <td><?php if($row['sisa']=="FOC"){echo "FOC";}?></td>
                <td><?php echo $rowk['lebar'];?></td>
                <td>X</td>
                <td><?PHP echo $rowk['berat']; ?></td>
                <td><?php if($row['sisa']=="KITE" || $row['sisa']=="FKSI"){echo "Fasilitas KITE";}?></td>
                <td align="center"><?php echo $row['ket']; ?><br><?php if($row['no_sj']=="" AND $rsj['no_sj']=="" AND $row['typetrans']=="1"){echo '<span style="color:#f00;text-align:center;">Tunggu No SJ</span>';}?></td>
            </tr>
            <?php
            if($row['sisa']=="SISA" || $row['sisa']=="FKSI" || $row['sisa']=="FOC"){$brtoo=0;}else{$brtoo=number_format($row['bruto'],'2','.',',');}
            $totbruto=$totbruto+$brtoo;
            $totyard=$totyard+$row['tot_yard'];
            $totrol=$totrol+$rol;
            $tota=$tota+$gra;
            $totb=$totb+$grb;
            $totc=$totc+$grc;
            if($row['satuan']=='Meter')
            {$kartot=$kartot + $row['tot_yard']; $totrolm = $totrolm + $row['tot_rol'];}
            if($row['satuan']=='Yard')
            {$pltot=$pltot + $row['tot_yard'];   $totroly = $totroly + $row['tot_rol'];}
            } ?>
        </tbody>
        <tfoot>
            <tr bgcolor="#99FFFF">
                <td>&nbsp;</td>
                <td>Meter (Roll)</td>
                <td align="right"><?php echo number_format($totrolm); ?></td>
                <td>&nbsp;</td>
                <td>Meter (Yard)</td>
                <td align="right"><?php echo number_format($kartot,'2','.',','); ?></td>
                <td>&nbsp;</td>
                <td>Yard (Roll)</td>
                <td align="right"><?php echo  number_format($totroly);?></td>
                <td>&nbsp;</td>
                <td>Yard (Yard)</td>
                <td align="right"><?php echo  number_format($pltot,'2','.',',');?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><b>Total</b></td>
                <td align="right"><b><?php echo $totrol;?></b></td>
                <td align="right"><b><?php echo number_format($tota,'2','.',',');?></b></td>
                <td align="right"><b><?php echo number_format($totb,'2','.',',');?></b></td>
                <td align="right"><b><?php echo number_format($totc,'2','.',',');?></b></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </tfoot>
      </table>
      </div>
    </div>
  </div>
</div>
<div id="DetailKainKeluar" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
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
