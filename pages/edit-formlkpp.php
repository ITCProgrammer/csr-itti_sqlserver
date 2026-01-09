<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
$id=$_GET['id'];

$sqlCek=mysqli_query($con,"SELECT * FROM tbl_lkpp WHERE id='$id' ORDER BY id DESC LIMIT 1");
$cek=mysqli_num_rows($sqlCek);
$rcek=mysqli_fetch_array($sqlCek);
?>
<?php
//$cekDetail=$_GET['cek'];
//$cekDetail= isset($_POST['cek']) ? $_POST['cek'] : '';
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$Order	= isset($_POST['order']) ? $_POST['order'] : '';
$PO	= isset($_POST['po']) ? $_POST['po'] : '';
$Hanger	= isset($_POST['hanger']) ? $_POST['hanger'] : '';	
$sts_korelasi = isset($_POST['sts_korelasi']) ? $_POST['sts_korelasi'] : '';

	if(isset($_POST['save'])){
        $lkpp=str_replace("'","''",$_POST['no_lkpp']);
        $nm_prshn=str_replace("'","''",$_POST['nm_prshn']);
        $alamat=str_replace("'","''",$_POST['alamat']);
        $jenis_kunjungan=str_replace("'","''",$_POST['jenis_kunjungan']);
        $pejabat=str_replace("'","''",$_POST['pejabat']);
        $petugas=str_replace("'","''",$_POST['petugas']);
        $tgl_kunjungan=$_POST['tgl_kunjungan'];
        $tgl_kunjungan2=$_POST['tgl_kunjungan2'];
        $tujuan_kunjungan=str_replace("'","''",$_POST['tujuan_kunjungan']);
        $ket=str_replace("'","''",$_POST['ket']);
        $checkbox=$_POST['cek'];
        $chklkpp="";
        foreach($checkbox as $chk1)  
   		  {  
      		$chklkpp .= $chk1.",";  
        }
        if($_POST['sts_korelasi']=="1"){$sts_korelasi="1";}else{ $sts_korelasi="0";}
		$qry1=mysqli_query($con,"UPDATE tbl_lkpp SET
		`id_nsp`='$chklkpp',
    `no_lkpp`='$lkpp',
		`nm_prshn`='$nm_prshn',
		`alamat`='$alamat',
		`jenis_kunjungan`='$jenis_kunjungan',
		`pejabat`='$pejabat',
		`petugas`='$petugas',
		`tgl_kunjungan`='$tgl_kunjungan',
		`tgl_kunjungan2`='$tgl_kunjungan2',
		`tujuan_kunjungan`='$tujuan_kunjungan',
    `ket`='$ket',
        `sts_korelasi`='$sts_korelasi',
		`tgl_update`=now()
        WHERE id='$id'");	
		if($qry1){	
	echo "<script>swal({
  title: 'Data Telah diSimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
      window.location.href='FormLKPP';
	 
  }
});</script>";
		}
	}
?>	
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Laporan KPE</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
    <div class="box-body">
      <div class="form-group">
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-3">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off"/>
          </div>
        </div>
        <!-- /.input group -->
      </div>
	  <div class="form-group">
        <div class="col-sm-3">
            <input name="order" type="text" class="form-control pull-right" id="order" placeholder="No Order" value="<?php echo $Order;  ?>" autocomplete="off"/>
          </div>
        <!-- /.input group -->
      </div>
	  <div class="form-group">
        <div class="col-sm-3">
            <input name="hanger" type="text" class="form-control pull-right" id="hanger" placeholder="No Hanger" value="<?php echo $Hanger;  ?>" autocomplete="off"/>
          </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-3">
            <input name="po" type="text" class="form-control pull-right" id="po" placeholder="No PO" value="<?php echo $PO;  ?>" autocomplete="off"/>
          </div>
        <!-- /.input group -->
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="col-sm-2">
        <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="submit" style="width: 60%">Search <i class="fa fa-search"></i></button>
      </div>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data KPE</h3><br>
                <?php if($_POST['awal']!="") { ?><b>Periode: <?php echo $_POST['awal']." to ".$_POST['akhir']; ?></b>
                <?php } ?>
			</div> 
                <div class="box-body">
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
                    <table class="table table-bordered table-hover table-striped nowrap" id="example1" style="width:100%">
                    <thead class="bg-blue">
                        <tr>
                        <th><div align="center">No</div></th>
                        <th><div align="center">Tgl</div></th>
                        <th><div align="center">Langganan</div></th>
                        <th><div align="center">No KK</div></th>
                        <th><div align="center">PO</div></th>
                        <th><div align="center">Order</div></th>
                        <th><div align="center">Hanger</div></th>
                        <th><div align="center">Jenis Kain</div></th>
                        <th><div align="center">Lebar &amp; Gramasi</div></th>
                        <th><div align="center">Lot</div></th>
                        <th><div align="center">Warna</div></th>
                        <th><div align="center">Qty Kirim</div></th>
                        <th><div align="center">Qty Claim</div></th>
                        <th><div>
                            <div align="center">T Jawab</div>
                        </div></th>
                        <th><div align="center">Masalah</div></th>
                        <th><div align="center">Ket</div></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no=1;
                            if($Awal!=""){ $Where =" WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; }
                            if($Order!=""){ $Where =" WHERE no_order= '$Order' "; }
                            if($Hanger!=""){ $Where =" WHERE no_hanger= '$Hanger' "; }
                            if($PO!=""){ $Where =" WHERE po= '$PO' "; }
                            if($Order!="" AND $Hanger!=""){ $Where =" WHERE no_order='$Order' AND no_hanger= '$Hanger' "; }
                            if($Awal=="" and $Order=="" and $Hanger==""){ $Where =" WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; }
                        $qry1=mysqli_query($con,"SELECT * FROM tbl_aftersales $Where ORDER BY id ASC");
                            while($row1=mysqli_fetch_array($qry1)){
                            $qry2=mysqli_query($con,"SELECT * FROM tbl_lkpp WHERE id='$id' ORDER BY id DESC LIMIT 1");
                            $row2=mysqli_fetch_array($qry2);
                            $detail=explode(",",$row2['id_nsp']);
                        ?>
                        <tr bgcolor="<?php echo $bgcolor; ?>">
                            <td align="center"><?php echo $no; ?> <br><input type="checkbox" name="cek[]" value="<?php echo $row1['id']; ?>" 
                                <?php if ($row1['id']==$detail[0] or $row1['id']==$detail[1] or $row1['id']==$detail[2] or $row1['id']==$detail[3] or $row1['id']==$detail[4] or $row1['id']==$detail[5] or $row1['id']==$detail[6] or $row1['id']==$detail[7] or $row1['id']==$detail[8] or $row1['id']==$detail[9] or $row1['id']==$detail[10]) : ?>
                                checked="checked"
                                <?php endif; ?>/>
                            </td>
                            <td align="center"><?php echo $row1['tgl_buat'];?></td>
                            <td><?php echo $row1['langganan'];?></td>
                            <td align="center"><?php echo $row1['nokk'];?></td>
                            <td align="center"><?php echo $row1['po'];?></td>
                            <td align="center"><?php echo $row1['no_order'];?></td>
                            <td align="center" valign="top"><?php echo $row1['no_hanger'];?></td>
                            <td><?php echo $row1['jenis_kain'];?></td>
                            <td align="center"><?php echo $row1['lebar']."x".$row1['gramasi'];?></td>
                            <td align="center"><?php echo $row1['lot'];?></td>
                            <td align="center"><?php echo $row1['warna'];?></td>
                            <td align="right"><?php echo $row1['qty_kirim'];?></td>
                            <td align="right"><?php echo $row1['qty_claim'];?></td>
                            <td align="center"><?php echo $row1['t_jawab'];?></td>
                            <td><?php echo $row1['masalah'];?></td>
                            <td><?php echo $row1['ket'];?></td>
                            </tr>
                        <?php	$no++;  } ?>
                    </tbody>
                    </table>
                    <div class="box-header with-border">
			<h3 class="box-title">Formulir LKPP</h3>
  		</div>
  		<div class="box-body">
            <div class="form-group">
                <label for="no_lkpp" class="col-sm-2 control-label">NO LKPP</label>
                  	<div class="col-sm-3">
                        <input name="no_lkpp" type="text" class="form-control" id="no_lkpp" value="<?php echo $rcek['no_lkpp'];?>" placeholder="No LKPP" readonly>
                  	</div>
            </div>
	  		<div class="form-group">
                <label for="nm_prshn" class="col-sm-2 control-label">Nama Perusahaan</label>
                  	<div class="col-sm-3">
                        <input name="nm_prshn" type="text" class="form-control" id="nm_prshn" value="<?php echo $rcek['nm_prshn'];?>" placeholder="Nama Perusahaan">
                  	</div>
            </div>
            <div class="form-group">
                <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-5">
                    	<textarea name="alamat" class="form-control" id="alamat" placeholder=""><?php echo $rcek['alamat'];?></textarea>
                  	</div>
            </div>
            <div class="form-group">
                <label for="jenis_kunjungan" class="col-sm-2 control-label">Jenis Kunjungan</label>
                    <div class="col-sm-3">
                    	<select class="form-control select2" name="jenis_kunjungan" required>
							<option value="">Pilih</option>
							<option <?php if($rcek['jenis_kunjungan']=="Rutin"){?> selected=selected <?php };?>value="Rutin">Rutin</option>	
							<option <?php if($rcek['jenis_kunjungan']=="Calon Pelanggan Baru"){?> selected=selected <?php };?>value="Calon Pelanggan Baru">Calon Pelanggan Baru</option>
                            <option <?php if($rcek['jenis_kunjungan']=="Keluhan Pelanggan"){?> selected=selected <?php };?>value="Keluhan Pelanggan">Keluhan Pelanggan</option>
                            <option <?php if($rcek['jenis_kunjungan']=="Permintaan Pelanggan"){?> selected=selected <?php };?>value="Permintaan Pelanggan">Permintaan Pelanggan</option>
						</select>
                  	</div>
            </div>
            <div class="form-group">
                <label for="pejabat" class="col-sm-2 control-label">Pejabat yang ditemui</label>
                  	<div class="col-sm-5">
                        <input name="pejabat" type="text" class="form-control" id="pejabat" value="<?php echo $rcek['pejabat'];?>" placeholder="Contoh:Budi,Ani,...">
                  	</div>
            </div>
            <div class="form-group">
                <label for="petugas" class="col-sm-2 control-label">Petugas</label>
                  	<div class="col-sm-5">
                        <input name="petugas" type="text" class="form-control" id="petugas" value="<?php echo $rcek['petugas'];?>" placeholder="Contoh:Budi,Ani,...">
                  	</div>
            </div>
            <div class="form-group">
              <label for="tgl_kunjungan" class="col-sm-2 control-label">Tanggal Kunjungan</label>
              <div class="col-sm-2">					  
                <div class="input-group date">
                  <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                  <input name="tgl_kunjungan" type="text" class="form-control pull-right" id="datepicker3" placeholder="0000-00-00" value="<?php echo $rcek['tgl_kunjungan'];?>"/>
                </div>
              </div>
              <div class="col-sm-2">					  
                <div class="input-group date">
                  <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                  <input name="tgl_kunjungan2" type="text" class="form-control pull-right" id="datepicker2" placeholder="0000-00-00" value="<?php echo $rcek['tgl_kunjungan2'];?>"/>
                </div>
              </div>
            </div>
            <div class="form-group">
                <label for="tujuan_kunjungan" class="col-sm-2 control-label">Tujuan Kunjungan</label>
                    <div class="col-sm-5">
                    	<textarea name="tujuan_kunjungan" class="form-control" id="tujuan_kunjungan" placeholder=""><?php echo $rcek['tujuan_kunjungan'];?></textarea>
                  	</div>
            </div>
            <div class="form-group">
                <label for="ket" class="col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-5">
                    	<textarea name="ket" class="form-control" id="ket" placeholder=""></textarea>
                  	</div>
            </div>
            <div class="form-group">
		          <label for="sts_korelasi" class="col-sm-2 control-label"></label>		  
                <div class="col-sm-4">
                  <input type="checkbox" name="sts_korelasi" id="sts_korelasi" value="1" <?php  if($rcek['sts_korelasi']=="1"){ echo "checked";} ?>>  
                  <label> Korelasi</label>
                </div>		  	
		        </div>
		</div>
                    <input type="submit" value="Ubah" name="save" id="save" class="btn btn-primary pull-right"/>
                </form>
                </div>
        </div>
    </div>
</div>