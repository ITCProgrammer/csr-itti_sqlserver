<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="180" />
<title>Status Test Quality</title>
</head>
<body>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
<div class="box-header">
  <!--<a href="FormKK" class="btn btn-success <?php if($_SESSION['levelPpc']=="biasa"){ echo "disabled";} ?>"><i class="fa fa-plus-circle"></i> Tambah</a>-->
  <?php 
        $delay = date('Y-m-d');
        $sqldt=mysqli_query($con,"SELECT count(*) as cnt 
        FROM db_qc.tbl_tq_first_lot a
        LEFT JOIN db_qc.tbl_tq_test_fl b ON a.id=b.id_nokk
        WHERE (`status`='' or `status` IS NULL) and DATE_FORMAT( tgl_masuk, '%Y-%m-%d' ) between date_sub(now(),INTERVAL 30 DAY) and now()
        ORDER BY tgl_target ASC");
        $row = mysqli_fetch_array($sqldt);
      ?>
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
         <h4><i class="icon fa fa-info"></i> Informasi</h4>

        <p>Terdapat <?php echo $row['cnt'];?> test Delay.</p>
      </div>
      <div class="box-body">
      <div class="pull-right">
        <a href="pages/cetak/excel_delay_tq_fl.php" class="btn btn-success" target="_blank">Excel Delay</a> 
      </div>
      <table id="example1" class="table table-bordered table-hover table-striped" width="100%"> 
          <thead class="bg-blue">
            <tr>
              <th width="24"><div align="center">#</div></th>
              <th width="24"><div align="center">No. Report FL</div></th>
              <th width="90"><div align="center">No. Demand</div></th>
              <th width="90"><div align="center">No. Demand Lama</div></th>
              <th width="90"><div align="center">No. KK</div></th>
              <th width="90"><div align="center">No. KK Legacy</div></th>
              <th width="50"><div align="center">Tgl Masuk</div></th>
              <th width="50"><div align="center">Tgl Target</div></th>
			        <th width="130"><div align="center">Pelanggan</div></th>
              <th width="50"><div align="center">No. PO</div></th>
              <th width="100"><div align="center">No. Order</div></th>
              <th width="100"><div align="center">No. Item</div></th>
              <th width="100"><div align="center">Jenis Kain</div></th>
              <th width="50"><div align="center">No. Prod Order/ Lot</div></th>
              <th width="50"><div align="center">No. Prod Order/ Lot Lama</div></th>
              <th width="50"><div align="center">Lot Legacy</div></th>
              <th width="100"><div align="center">Warna</div></th>
            </tr>
          </thead>
          <tbody>
            <?php
	    include('koneksi.php');
      $sqldt=mysqli_query($con,"SELECT a.*, a.id AS idkk, b.* 
      FROM tbl_tq_first_lot a
      LEFT JOIN tbl_tq_test_fl b ON a.id=b.id_nokk
      WHERE (`status`='' or `status` IS NULL) and DATE_FORMAT( tgl_masuk, '%Y-%m-%d' ) between date_sub(now(),INTERVAL 30 DAY) and now()
      ORDER BY tgl_target ASC");
      $no="1";
      while($rowd=mysqli_fetch_array($sqldt)){
      $tgltarget = new DateTime($rowd['tgl_target']);
      $now=new DateTime();
      $target = $now->diff($tgltarget);
      $delay = $tgltarget->diff($now);
      //$nokk = $rowd['nokk'];

      $modifiedData = str_replace('/', '00000',$rowd['no_report_fl'] );
      $modifiedUrl = str_replace(' ', '77777', $modifiedData);
      $no_report_fl= $modifiedUrl; 

      $target_selisih = $rowd['tgl_target'];
      $now_selisih = date('Y-m-d');

      $diff         = abs(strtotime($now_selisih) - strtotime($target_selisih));
      $selisih_hari = floor($diff / (60 * 60 * 24));

      IF ($target_selisih > $now_selisih ) {
          
          $ket = $selisih_hari.' Hari lagi';
          
          switch ($selisih_hari) {
            case 1:
              $colour = 'red';
              break;
            case 2:
              $colour = 'yellow';
              break;
            case 3:
              $colour = 'green';
              break;
            default:
             $colour = '';
          }

        } else if ( $target_selisih < $now_selisih ){
          $colour = 'red';
          $ket = 'Delay '.$selisih_hari.' Hari';
        } else  {
          $colour = 'yellow';
          $ket = 'Hari ini terakhir';
        }

     
        

      
		 ?>
         <tr>
                  <td align="center" ><?php echo $no;?></td>
                  <td align="center" >
                    
                  <a href="SummaryTQNewFL-<?php echo $no_report_fl;?>"><?php echo $rowd['no_report_fl'];?></a>
                  </td>
                  <td align="center" ><?php if($rowd['nodemand_new']!=''){echo $rowd['nodemand_new'];}else if($rowd['nodemand_new']==''){echo $rowd['nodemand'];} ?></td>
                  <td align="center" ><?php if($rowd['nodemand_new']!=''){echo $rowd['nodemand'];} ?></td>
                  <td align="center" ><?php echo $rowd['nokk']; ?></td>
                  <td align="center" ><?php echo $rowd['kk_legacy']; ?></td>
                  <td align="center" ><?php echo $rowd['tgl_masuk'];?></td>
                  <td align="center" ><?php echo $rowd['tgl_target'];?><br>

                  <!--
                  <?php if($tgltarget>$now){ ?>
                  <span class='badge bg-blue'><?php echo $target->d+1; echo " Hari lagi";?></span>
                  <?php }elseif($delay->d>0){ ?>
                  <span class='badge bg-red blink_me'><?php echo "Delay "; echo $delay->d; echo " Hari";?></span> 
                  <?php }elseif($delay->d==0){?>
                  <span class='badge bg-yellow blink_me'><?php echo "Hari ini Terakhir";?></span>
                  <?php } ?>
                  -->

                  <span class='badge bg-<?=$colour?>'> 
                    <?=$ket ?>
                </span>


                  </td>
                  <td align="left" ><font size="-1"><?php echo $rowd['pelanggan'];?></font></td>
                  <td align="center" ><?php echo $rowd['no_po'];?></td>
                  <td align="center" ><?php echo $rowd['no_order'];?></td>
                  <td align="center" ><?php echo $rowd['no_item'];?></td>
                  <td align="center" >
                  <a href="#" id='<?php echo $rowd['idkk']; ?>' class="update_jeniskain"><?php echo $rowd['jenis_kain'];?></a>
                  </td>
                  <td align="center" ><?php echo $rowd['lot'];?></td>
                  <td align="center" ><?php if($rowd['lot_new']!=''){echo $rowd['lot_new'];} ?></td>
                  <td align="center" ><?php echo $rowd['lot_legacy'];?></td>
                  <td align="center" ><?php echo $rowd['warna'];?></td>
                </tr>
                <?php $no++;
  } ?>
              </tbody>
            </table>
            </div>
	  </div>
	</div>
</div>
	</div>
<div id="UpdateJenisKain" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div id="PosisiKKTQ" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
</body>
</html>