<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
date_default_timezone_set("Asia/Jakarta");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Mutasi</title>
</head>
<body>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Usrnm	= isset($_POST['user_name']) ? $_POST['user_name'] : '';
$Shift	= isset($_POST['shift']) ? $_POST['shift'] : '';

?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Laporan Mutasi</h3>
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
          <select name="user_name" id="user_name" class="form-control select2"> 
            <option value="PACKING A" <?php if($_POST['user_name']=="PACKING A"){echo "SELECTED";}?>>PACKING A</option>
            <option value="PACKING B" <?php if($_POST['user_name']=="PACKING B"){echo "SELECTED";}?>>PACKING B</option>
            <option value="PACKING C" <?php if($_POST['user_name']=="PACKING C"){echo "SELECTED";}?>>PACKING C</option>
		    <option value="INSPEK MEJA A" <?php if($_POST['user_name']=="INSPEK MEJA A"){echo "SELECTED";}?>>INSPEK MEJA A</option>
            <option value="INSPEK MEJA B" <?php if($_POST['user_name']=="INSPEK MEJA B"){echo "SELECTED";}?>>INSPEK MEJA B</option>
            <option value="INSPEK MEJA C" <?php if($_POST['user_name']=="INSPEK MEJA C"){echo "SELECTED";}?>>INSPEK MEJA C</option>
          </select>
        </div>
        <div class="col-sm-3">
            <input type="checkbox" name="semua" id="semua" value="1" <?php  if($_POST['semua']=="1"){ echo "checked";} ?> onclick="nonaktif();">  
            <label> Lihat Semua</label>
        </div>				 
      </div>
      <div class="form-group">
        <div class="col-sm-2">
          <select name="shift" id="shift" class="form-control select2"> 
            <option value="3" <?php if(date("H:i:s")>="23:00:00" AND date("H:i:s")<="06:59:59"){echo "SELECTED";} ?>>3</option>
            <option value="1" <?php if(date("H:i:s")>="07:00:00" AND date("H:i:s")<="14:59:59"){echo "SELECTED";} ?>>1</option>
            <option value="2" <?php if(date("H:i:s")>="15:00:00" AND date("H:i:s")<="22:59:59"){echo "SELECTED";} ?>>2</option>
          </select>
        </div>
        <!-- /.input group -->
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
            <h3 class="box-title">Mutasi Kain</h3><br>
            <?php 
            $tgl_cetak1= $_POST['awal'];
            if($_POST['shift']=="3"){$tgl_cetak2=date("Y-m-d",strtotime ( '1 day' , strtotime ($tgl_cetak1)));}else{$tgl_cetak2= $_POST['awal'];}?>
            <b>Tanggal: <?php if($_POST['awal']!=""){echo date("d-M-Y", strtotime($tgl_cetak1))." s/d ".date("d-M-Y", strtotime($tgl_cetak2));}else{echo "";} ?></b><br>
            <b>Shift: <?php if($_POST['semua']=='1'){echo "ALL SHIFT";}else{echo $_POST['shift'];}?></b><br>
            <b>Group Shift: <?php if($_POST['semua']=='1'){echo "ALL SHIFT";}else{echo $_POST['user_name'];}?></b>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example8" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th rowspan="2"><div align="center">No MC</div></th>
              <th rowspan="2"><div align="center">Tanggal</div></th>
              <th rowspan="2"><div align="center">Langganan</div></th>
              <th rowspan="2"><div align="center">PO</div></th>
              <th rowspan="2"><div align="center">Order</div></th>
              <th rowspan="2"><div align="center">Jenis Kain</div></th>
              <th rowspan="2"><div align="center">No. Warna</div></th>
              <th rowspan="2"><div align="center">Warna</div></th>
              <th rowspan="2"><div align="center">L/Grm2</div></th>
              <th rowspan="2"><div align="center">Lot</div></th>
              <th rowspan="2"><div align="center">Jml.Roll</div></th>
              <th rowspan="2"><div align="center">Bruto(Kg)</div></th>
              <th colspan="3"><div align="center">Netto (Kg)</div></th>
              <th rowspan="2"><div align="center">Yard / Meter</div></th>
              <th rowspan="2"><div align="center">No.Kartu Kerja</div></th>
              <th rowspan="2"><div align="center">Tempat</div></th>
              <th rowspan="2"><div align="center">Item</div></th>
              <th rowspan="2"><div align="center">Keterangan</div></th>
            </tr>
            <tr>
                <th><div align="center">Grade<br /> A+B</div></th>
                <th><div align="center">Grade <br /> C</div></th>
                <th><div align="center">Keterangan<br />(Grade C)</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
            if($_POST['semua']=='1'){
                $tgl2=date("Y-m-d",strtotime( '1 day' , strtotime ($tgl_cetak1)));
                $sql=mysqli_query($con,"select pergerakan_stok.id,satuan,
            pergerakan_stok.tgl_update,
            detail_pergerakan_stok.nokk,
            detail_pergerakan_stok.ket,count(detail_pergerakan_stok.yard_) as tot_rol,sum(detail_pergerakan_stok.yard_) as tot_yard ,
            sum(detail_pergerakan_stok.weight) as tot_qty,sisa,pergerakan_stok.no_mutasi,pergerakan_stok.userid as user_packing
            from pergerakan_stok 
            LEFT JOIN detail_pergerakan_stok on pergerakan_stok.id=detail_pergerakan_stok.id_stok 
            WHERE pergerakan_stok.tgl_update
            BETWEEN '$tgl_cetak1 07:00:00'
            AND '$tgl2 07:00:00'
            AND pergerakan_stok.fromtoid='GUDANG KAIN JADI' AND detail_pergerakan_stok.id_stok !=''
            GROUP BY  pergerakan_stok.id,pergerakan_stok.no_dok,detail_pergerakan_stok.sisa
            ORDER BY pergerakan_stok.id ASC");
                
                }else{
              if($_POST['shift']=="1"){	  
              $sql=mysqli_query($con,"select pergerakan_stok.id,bruto,satuan,
            no_mc,pelanggan,pergerakan_stok.no_po,pergerakan_stok.no_order,tgl_update,
            jenis_kain,no_warna,warna,no_item,no_lot,
            lebar,berat,detail_pergerakan_stok.nokk,grade,
            detail_pergerakan_stok.ket,count(yard_) as tot_rol,sum(yard_) as tot_yard ,
            sum(weight) as tot_qty,sisa,pergerakan_stok.no_mutasi
            from pergerakan_stok 
            inner join detail_pergerakan_stok on pergerakan_stok.id=detail_pergerakan_stok.id_stok 
            inner join tbl_kite on tbl_kite.nokk=detail_pergerakan_stok.nokk
            WHERE tgl_update
            BETWEEN '$tgl_cetak1 07:00:00'
            AND '$tgl_cetak2 14:59:59'
            AND fromtoid='GUDANG KAIN JADI'
            AND tbl_kite.user_packing = '$_POST[user_name]'
            GROUP BY  pergerakan_stok.id, no_dok,sisa
            ORDER BY pergerakan_stok.id ASC");
            }else if($_POST['shift']=="2"){
                  
                  $sql=mysqli_query($con,"select pergerakan_stok.id,bruto,satuan,
            no_mc,pelanggan,pergerakan_stok.no_po,pergerakan_stok.no_order,tgl_update,
            jenis_kain,no_warna,warna,no_item,no_lot,
            lebar,berat,detail_pergerakan_stok.nokk,grade,
            detail_pergerakan_stok.ket,count(yard_) as tot_rol,sum(yard_) as tot_yard ,
            sum(weight) as tot_qty,sisa,pergerakan_stok.no_mutasi
            from pergerakan_stok 
            inner join detail_pergerakan_stok on pergerakan_stok.id=detail_pergerakan_stok.id_stok 
            inner join tbl_kite on tbl_kite.nokk=detail_pergerakan_stok.nokk
            WHERE tgl_update
            BETWEEN '$tgl_cetak1 15:00:00'
            AND '$tgl_cetak2 22:59:59'
            AND fromtoid='GUDANG KAIN JADI'
            AND tbl_kite.user_packing = '$_POST[user_name]'
            GROUP BY  pergerakan_stok.id, no_dok,sisa
            ORDER BY pergerakan_stok.id ASC");
                  
                  }else{
                $sql=mysqli_query($con,"select pergerakan_stok.id,bruto,satuan,
            no_mc,pelanggan,pergerakan_stok.no_po,pergerakan_stok.no_order,tgl_update,
            jenis_kain,no_warna,warna,no_item,no_lot,
            lebar,berat,detail_pergerakan_stok.nokk,grade,
            detail_pergerakan_stok.ket,count(yard_) as tot_rol,sum(yard_) as tot_yard ,
            sum(weight) as tot_qty,sisa,pergerakan_stok.no_mutasi
            from pergerakan_stok 
            inner join detail_pergerakan_stok on pergerakan_stok.id=detail_pergerakan_stok.id_stok 
            inner join tbl_kite on tbl_kite.nokk=detail_pergerakan_stok.nokk
            WHERE tgl_update
            BETWEEN '$tgl_cetak1 23:00:00'
            AND '$tgl_cetak2 06:59:59'
            AND fromtoid='GUDANG KAIN JADI'
            AND tbl_kite.user_packing = '$_POST[user_name]'
            GROUP BY  pergerakan_stok.id, no_dok,sisa
            ORDER BY pergerakan_stok.id ASC");	  
                }
            }
              $c=1;
              $totbruto=0;
              while($row=mysqli_fetch_array($sql))
              {
                  //$bgcolor = ($c++ & 1) ? '#33CCFF' : '#FFCC99';
                       $sql1=mysqli_query($con,"SELECT sum(detail_pergerakan_stok.weight) as grd_c
            FROM pergerakan_stok left join detail_pergerakan_stok on detail_pergerakan_stok.id_stok=pergerakan_stok.id
            WHERE pergerakan_stok.id='$row[id]' and grade='C'
            GROUP BY pergerakan_stok.id
            ORDER BY pergerakan_stok.id ASC");
                     $row1=mysqli_fetch_array($sql1);
                     
                     $sql2=mysqli_query($con,"SELECT sum(detail_pergerakan_stok.weight) as grd_a_b
            FROM pergerakan_stok inner join detail_pergerakan_stok on detail_pergerakan_stok.id_stok=pergerakan_stok.id
            WHERE pergerakan_stok.id='$row[id]' and ((grade between 'A' and 'B') or grade='')
            GROUP BY pergerakan_stok.id
            ORDER BY pergerakan_stok.id ASC");
            $row2=mysqli_fetch_array($sql2);
            $sql3=mysqli_query($con,"SELECT sum(detail_pergerakan_stok.weight) as sisa_c
            FROM pergerakan_stok inner join detail_pergerakan_stok on detail_pergerakan_stok.id_stok=pergerakan_stok.id
            WHERE pergerakan_stok.id='$row[id]' and grade='C' and (detail_pergerakan_stok.sisa='SISA' or detail_pergerakan_stok.sisa='FKSI') 
            ORDER BY pergerakan_stok.id ASC");
                $row3=mysqli_fetch_array($sql3);
                $sql4=mysqli_query($con,"SELECT sum(detail_pergerakan_stok.weight) as sisa_ab
            FROM pergerakan_stok inner join detail_pergerakan_stok on detail_pergerakan_stok.id_stok=pergerakan_stok.id
            WHERE pergerakan_stok.id='$row[id]' and ((grade between 'A' and 'B') or grade='') and (detail_pergerakan_stok.sisa='SISA' or detail_pergerakan_stok.sisa='FKSI') 
            ORDER BY pergerakan_stok.id ASC");
                $row4=mysqli_fetch_array($sql4);	
                
                $sql5=mysqli_query($con,"SELECT sum(detail_pergerakan_stok.weight) as sisa_c
            FROM pergerakan_stok inner join detail_pergerakan_stok on detail_pergerakan_stok.id_stok=pergerakan_stok.id
            WHERE pergerakan_stok.id='$row[id]' and grade='C' and (detail_pergerakan_stok.sisa='FOC' ) 
            ORDER BY pergerakan_stok.id ASC");
                $row5=mysqli_fetch_array($sql5);
                $sql6=mysqli_query($con,"SELECT sum(detail_pergerakan_stok.weight) as sisa_ab
            FROM pergerakan_stok inner join detail_pergerakan_stok on detail_pergerakan_stok.id_stok=pergerakan_stok.id
            WHERE pergerakan_stok.id='$row[id]' and ((grade between 'A' and 'B') or grade='') and (detail_pergerakan_stok.sisa='FOC') 
            ORDER BY pergerakan_stok.id ASC");
                $row6=mysqli_fetch_array($sql6);
                $stmpt=mysqli_query($con,"select mutasi_kain.id as id_kain,mutasi_kain.userid  
            from mutasi_kain 
            INNER JOIN pergerakan_stok on pergerakan_stok.id=mutasi_kain.id_stok
            where pergerakan_stok.id='$row[id]' and mutasi_kain.keterangan='$row[sisa]'
            GROUP BY mutasi_kain.id,mutasi_kain.keterangan
            ORDER BY pergerakan_stok.id ASC");
            $rtmpt=mysqli_fetch_array($stmpt);
                $skain=mysqli_query($con,"SELECT * from tbl_kite where nokk='$row[nokk]'");
            $rkain=mysqli_fetch_array($skain);
              ?>
        <tr bgcolor="<?php echo $bgcolor;?>">
            <td><?php echo $rkain['no_mc'];?></td>
            <td><?php echo date("d-M-Y H:i:s", strtotime($row['tgl_update']));?></td>
            <td><?php echo $rkain['pelanggan'];?></td>
            <td><?php echo $rkain['no_po'];?></td>
            <td><?php echo $rkain['no_order'];?></td>
            <td><?php echo $rkain['jenis_kain'];?></td>
            <td><?php echo $rkain['no_warna'];?></td>
            <td><?php echo $rkain['warna'];?></td>
            <td><?php echo $rkain['lebar']."/".$rkain['berat'];?> </td>
            <td><?php echo $rkain['no_lot'];?></td>
            <td align="right"><?php 
            echo $row['tot_rol'];
            ?></td>
            <td align="right"><?php echo number_format($rkain['bruto'],'2','.',',');?></td>
            <td align="right"><?php 
            if($row['sisa']=="SISA"||$row['sisa']=="FKSI")
            {$grab=number_format($row4['sisa_ab'],'2','.',',');}
            else if($row['sisa']=="FOC"){$grab=number_format($row6['sisa_ab'],'2','.',',');}
            else{$grab=number_format($row2['grd_a_b']-$row4['sisa_ab'],'2','.',',');}
            echo $grab;?></td>
            <td align="right"><?php 
            if($row['sisa']=="SISA"||$row['sisa']=="FKSI"){$grc=number_format($row3['sisa_c'],'2','.',',');}
            else if($row['sisa']=="FOC"){$grc=number_format($row5['sisa_c'],'2','.',',');}
            else{$grc=number_format($row1['grd_c']-$row3['sisa_c'],'2','.',',');}
            echo $grc;?></td>
            <td><?php if($row['sisa']=="SISA" || $row['sisa']=="FKSI"){echo "SISA";}else if($row['sisa']=="FOC"){echo "EXTRA FULL";}?></td>
            <td align="right"><?php echo number_format($row['tot_yard'],'2','.',',')." ".$row['satuan']; ?></td>
            <td>
            <a href="#" class="<?php if($row['satuan']=="Yard"){echo "detail_mutasi";}else if($row['satuan']=="PCS"){echo "detail_mutasi_p";}else{echo "detail_mutasi_m";} ?>" id="<?php echo $row['nokk']; ?>" tgl1="<?php echo $tgl_cetak1; ?>" tgl2="<?php echo $tgl_cetak2; ?>" shift="<?php echo $row['user_packing'];?>" satuan="<?php echo $row['satuan'];?>"><?php echo $row['nokk']; ?></a>
            <!--<a href="../index1.php?p=mutasi_detail&id=<?php echo $row['nokk'];?>&tgl1=<?php echo $tgl_cetak1; ?>&tgl2=<?php echo $tgl_cetak2; ?>&shift=<?php echo $row['user_packing'];?>"><?php echo $row['nokk'];?></a>-->
            </td>
            <td>&nbsp;</td>
            <td><?php echo $row['no_item'];?></td>
            <td align="center"><?php 
            if($row['no_mutasi']!=''){echo "Sudah Mutasi";}else{echo "<font color='#FF0000' class='blink_me'>Belum Mutasi</font>";}
            if($_POST['semua']=='1'){echo "<br>".strtolower($row['user_packing']);}else{echo " ";}?>
            </td>
        </tr>
 
        <?php
        if($row['sisa']=="SISA" || $row['sisa']=="FKSI" || $row['sisa']=="FOC"){$brtoo=0;}else{$brtoo=$rkain['bruto'];}
        $totbruto=$totbruto+$brtoo;
        $totyard=$totyard+$row['tot_yard'];
        $totrol=$totrol+$rol;
        $totab=$totab+$grab;
        $tota=$tota+$grc;
        if($row['satuan']=='PCS')
            { $totrolk = $totrolk + $row['tot_rol'];}
            if($row['satuan']=='Meter')
            {$kartot=$kartot + $row['tot_yard']; $totrolm = $totrolm + $row['tot_rol'];}
            if($row['satuan']=='Yard')
            {$pltot=$pltot + $row['tot_yard'];   $totroly = $totroly + $row['tot_rol'];}
        }
        ?>
        </tbody>
        <tr bgcolor="#99FFFF">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td></td>
            <td></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2">Krah</td>
            <td align="right"><?php echo number_format($totrolk); ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr bgcolor="#99FFFF">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2">Meter</td>
            <td align="right"><?php echo number_format($totrolm); ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Meter</td>
            <td align="right"><?php echo number_format($kartot,'2','.',','); ?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr bgcolor="#99FFFF">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2">Yard</td>
            <td align="right"><?php echo  number_format($totroly);?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Yard</td>
            <td align="right"><?php echo  number_format($pltot,'2','.',',');?></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr bgcolor="#99FFFF">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2"><b>Total</b></td>
            <td>&nbsp;</td>
            <td align="right"><b><?php echo $totrol;?></td>
            <td align="right"><b><?php echo number_format($totbruto,'2','.',',');?></b></td>
            <td align="right"><b><?php echo number_format($totab,'2','.',',');?></b></td>
            <td align="right"><b><?php echo number_format($tota,'2','.',',');?></b></td>
            <td>&nbsp;</td>
            <td align="right">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
      </table>
      </div>
    </div>
  </div>
</div>
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
<div id="DetailMutasi" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div id="DetailMutasiP" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div id="DetailMutasiM" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
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
<script>
function nonaktif(){
if(document.forms['form1']['semua'].checked == true)
{
 document.form1.user_name.setAttribute("disabled",true);
 document.form1.shift.setAttribute("disabled",true);
 }else{
 document.form1.user_name.removeAttribute("disabled");
 document.form1.shift.removeAttribute("disabled");
 }

}
</script> 
</body>
</html>
