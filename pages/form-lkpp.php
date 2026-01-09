<?php
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
?>
<?php
//$cekDetail=$_GET['cek'];
//$cekDetail= isset($_POST['cek']) ? $_POST['cek'] : '';
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$Order	= isset($_POST['order']) ? $_POST['order'] : '';
$PO	= isset($_POST['po']) ? $_POST['po'] : '';
$Hanger	= isset($_POST['hanger']) ? $_POST['hanger'] : '';
$Langganan	= isset($_POST['langganan']) ? $_POST['langganan'] : '';	
$sts_red = isset($_POST['sts_red']) ? $_POST['sts_red'] : '';
$nm=isset($_POST['nm_prshn']) ? $_POST['nm_prshn'] : '';
$al=isset($_POST['alamat']) ? $_POST['alamat'] : '';
$jnk=isset($_POST['jenis_kunjungan']) ? $_POST['jenis_kunjungan'] : '';	
$pjb=isset($_POST['pejabat']) ? $_POST['pejabat'] : '';	
$ptgs=isset($_POST['petugas']) ? $_POST['petugas'] : '';	
$tglk=isset($_POST['tgl_kunjungan']) ? $_POST['tgl_kunjungan'] : '';	
$tglk2=isset($_POST['tgl_kunjungan2']) ? $_POST['tgl_kunjungan2'] : '';	
$tjk=isset($_POST['tujuan_kunjungan']) ? $_POST['tujuan_kunjungan'] : '';	
$sts_korelasi = isset($_POST['sts_korelasi']) ? $_POST['sts_korelasi'] : '';

date_default_timezone_set("Asia/Jakarta");
$bln=array(1 => "I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII");
$romawi= $bln[date('n')];
//Baca Tanggal Hari ini
$tahun = date("Y");
$bulan = date("Y-m");
$nomor="/CSR/LKPP/".$romawi."/".$tahun;
//Cari nomor terakhir pada database
$sql = "SELECT max(no_lkpp) as maxKode FROM tbl_lkpp WHERE tgl_buat LIKE '$bulan%'";
$hasil = mysqli_query($con,$sql) or die (mysqli_error());
$data = mysqli_fetch_array($hasil);
$nolkpp= $data['maxKode'];
$noUrut=$nolkpp + 1;
$kode =  sprintf("%03s", $noUrut);
$nomorbaru = $kode.$nomor;

	if(isset($_POST['save'])){
        $lkpp=$nomorbaru;
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
		$qry1=mysqli_query($con,"INSERT INTO tbl_lkpp SET
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
		`tgl_buat`=now(),
		`tgl_update`=now()
		");	
		if($qry1){	
	echo "<script>swal({
  title: 'Data Telah diSimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
      window.open('pages/cetak/cetak_lapkunjungan.php?no_lkpp=$lkpp','_blank');
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
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="input-group date">
            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
            <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off"/>
          </div>
        </div>
        <div class="col-sm-2">
            <input name="order" type="text" class="form-control pull-right" id="order" placeholder="No Order" value="<?php echo $Order;  ?>" autocomplete="off"/>
          </div>
        <div class="col-sm-2">
            <input name="po" type="text" class="form-control pull-right" id="po" placeholder="No PO" value="<?php echo $PO;  ?>" autocomplete="off"/>
          </div>
        <div class="col-sm-2">
            <input name="hanger" type="text" class="form-control pull-right" id="hanger" placeholder="No Hanger" value="<?php echo $Hanger;  ?>" autocomplete="off"/>
          </div>
        <div class="col-sm-2">
            <input name="langganan" type="text" class="form-control pull-right" id="langganan" placeholder="Langganan" value="<?php echo $Langganan;  ?>" autocomplete="off"/>
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
                        <th><div align="center">No Demand</div></th>
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
                            // if($Awal!=""){ $Where =" WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; }
                            // if($Order!=""){ $Where =" WHERE no_order= '$Order' "; }
                            // if($Hanger!=""){ $Where =" WHERE no_hanger= '$Hanger' "; }
                            // if($PO!=""){ $Where =" WHERE po= '$PO' "; }
                            // if($Langganan!=""){ $Where =" WHERE langganan LIKE '%$Langganan%' "; }
                            // if($Order!="" AND $Hanger!="" AND $PO!="" AND $Langganan!=""){ $Where =" WHERE no_order='$Order' AND no_hanger= '$Hanger' AND po= '$PO' AND langganan LIKE '%$Langganan%' "; }
                            // if($Awal=="" and $Order=="" and $Hanger=="" and $PO=="" and $Langganan==""){ $Where =" WHERE DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; }
                            // $qry1=mysqli_query("SELECT * FROM tbl_aftersales $Where ORDER BY id ASC");
                            if($Awal!=""){ $Where =" AND DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' "; }
                            if($Awal!="" or $Order!="" or $Hanger!="" or $PO!="" or $Langganan!=""){
                              $qry1=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE no_order LIKE '%$Order%' AND po LIKE '%$PO%' AND no_hanger LIKE '%$Hanger%' AND langganan LIKE '%$Langganan%' $Where ORDER BY id ASC");
                            }else{
                              $qry1=mysqli_query($con,"SELECT * FROM tbl_aftersales_now WHERE no_order LIKE '$Order' AND po LIKE '$PO' AND no_hanger LIKE '$Hanger' AND langganan LIKE '$Langganan' $Where ORDER BY id ASC");
                            }
                            while($row1=mysqli_fetch_array($qry1)){
                        ?>
                        <tr bgcolor="<?php echo $bgcolor; ?>">
                            <td align="center"><?php echo $no; ?> <br><input type="checkbox" name="cek[]" value="<?php echo $row1['id']; ?>" 
                                <?php if (isset($_POST['cek']) && in_array($row1['id'], $_POST['cek'])): ?>
                                checked="checked"
                                <?php endif; ?>/>
                            </td>
                            <td align="center"><?php echo $row1['tgl_buat'];?></td>
                            <td><?php echo $row1['langganan'];?></td>
                            <td align="center"><?php echo $row1['nokk'];?></td>
                            <td align="center"><?php echo $row1['nodemand'];?></td>
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
                <label for="nm_prshn" class="col-sm-2 control-label">Nama Perusahaan</label>
                  	<div class="col-sm-3">
                        <input name="nm_prshn" type="text" class="form-control" id="nm_prshn" value="<?php echo $nm;?>" placeholder="Nama Perusahaan">
                  	</div>
            </div>
            <div class="form-group">
                <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-5">
                    	<textarea name="alamat" class="form-control" id="alamat" placeholder=""><?php echo $al;?></textarea>
                  	</div>
            </div>
            <div class="form-group">
                <label for="jenis_kunjungan" class="col-sm-2 control-label">Jenis Kunjungan</label>
                    <div class="col-sm-3">
                    	<select class="form-control select2" name="jenis_kunjungan" required>
							<option value="">Pilih</option>
                            <option value="<?php echo $jnk;?>"><?php echo $jnk;?></option>
							<option <?php if($_POST['jenis_kunjungan']=="Rutin"){?> selected=selected <?php };?>value="Rutin">Rutin</option>	
							<option <?php if($_POST['jenis_kunjungan']=="Calon Pelanggan Baru"){?> selected=selected <?php };?>value="Calon Pelanggan Baru">Calon Pelanggan Baru</option>
                            <option <?php if($_POST['jenis_kunjungan']=="Keluhan Pelanggan"){?> selected=selected <?php };?>value="Keluhan Pelanggan">Keluhan Pelanggan</option>
                            <option <?php if($_POST['jenis_kunjungan']=="Permintaan Pelanggan"){?> selected=selected <?php };?>value="Permintaan Pelanggan">Permintaan Pelanggan</option>
						</select>
                  	</div>
            </div>
            <div class="form-group">
                <label for="pejabat" class="col-sm-2 control-label">Pejabat yang ditemui</label>
                  	<div class="col-sm-5">
                        <input name="pejabat" type="text" class="form-control" id="pejabat" value="<?php echo $pjb;?>" placeholder="Contoh:Budi,Ani,...">
                  	</div>
            </div>
            <div class="form-group">
                <label for="petugas" class="col-sm-2 control-label">Petugas</label>
                  	<div class="col-sm-5">
                        <input name="petugas" type="text" class="form-control" id="petugas" value="<?php echo $ptgs;?>" placeholder="Contoh:Budi,Ani,...">
                  	</div>
            </div>
            <div class="form-group">
              <label for="tgl_kunjungan" class="col-sm-2 control-label">Tanggal Kunjungan</label>
              <div class="col-sm-2">					  
                <div class="input-group date">
                    <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                    <input name="tgl_kunjungan" type="text" class="form-control pull-right" id="datepicker3" placeholder="0000-00-00" value="<?php echo $tglk; ?>" />
                </div>
              </div>
              <div class="col-sm-2">				  
                <div class="input-group date">
                    <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                    <input name="tgl_kunjungan2" type="text" class="form-control pull-right" id="datepicker2" placeholder="0000-00-00" value="<?php echo $tglk2; ?>" />
                </div>
              </div>
            </div>
            <div class="form-group">
                <label for="tujuan_kunjungan" class="col-sm-2 control-label">Tujuan Kunjungan</label>
                    <div class="col-sm-5">
                    	<textarea name="tujuan_kunjungan" class="form-control" id="tujuan_kunjungan" placeholder=""><?php echo $tjk;?></textarea>
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
                  <input type="checkbox" name="sts_korelasi" id="sts_korelasi" value="1" <?php  if($sts_korelasi=="1"){ echo "checked";} ?>>  
                  <label> Korelasi</label>
                </div>		  	
		        </div>
		</div>
                    <input type="submit" value="Simpan" name="save" id="save" class="btn btn-primary pull-right"/>
                </form>
                </div>
        </div>
    </div>
</div>
<div class="row">
  	<div class="col-xs-12">
    	<div class="box">
			<div class="box-header with-border">
        <h3 class="box-title">Data LKPP</h3>
        <div class="pull-right">
                <a href="pages/cetak/cetak_rekaplkpp.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>" class="btn btn-danger <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Cetak Lap KPP</a> 
                <a href="pages/cetak/cetak_korelasilkpp.php?awal=<?php echo $_POST['awal']; ?>&akhir=<?php echo $_POST['akhir']; ?>" class="btn btn-danger <?php if($_POST['awal']=="") { echo "disabled"; }?>" target="_blank">Cetak Korelasi LKPP</a> 
            </div>
			</div>    
			<div class="box-body">
				<table id="example3" class="table table-bordered table-hover table-striped" width="100%">
					<thead class="bg-green">
					<tr>
						<th width="48"><div align="center">No</div></th>
						<th width="149"><div align="center">No LKPP</div></th>
						<th width="301"><div align="center">Nama Perusahaan</div></th>
						<th width="343"><div align="center">Alamat</div></th>
						<th width="331"><div align="center">Jenis Kunjungan</div></th>
						<th width="331"><div align="center">Pejabat</div></th>
						<th width="331"><div align="center">Petugas</div></th>
            <th width="331"><div align="center">Tgl Kunjungan</div></th>
            <th width="331"><div align="center">Tujuan Kunjungan</div></th>
            <th width="331"><div align="center">Tgl Buat</div></th>
						<th width="331"><div align="center">Aksi</div></th>
					</tr>
					</thead>
				<tbody>
					<?php 
                    $sql=mysqli_query($con,"SELECT * FROM tbl_lkpp ORDER BY id DESC");
                    
					while($r=mysqli_fetch_array($sql)){
					$no1++;
					$bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';	  
				
					?>
						<tr bgcolor="<?php echo $bgcolor; ?>">
							<td align="center"><?php echo $no1; ?>
                            </td>
							<td align="center"><a href="#" class="edit_lkpp" id="<?php echo $r['id'] ?>"><?php echo $r['no_lkpp']; ?></a></td>
							<td align="left"><?php echo $r['nm_prshn']; ?></td>
							<td align="left"><?php echo $r['alamat']; ?></td>
							<td align="left"><?php echo $r['jenis_kunjungan']; ?></td>
                            <td align="left"><?php echo $r['pejabat']; ?></td>
                            <td align="left"><?php echo $r['petugas']; ?></td>
                            <td align="left"><?php echo $r['tgl_kunjungan']; ?></td>
                            <td align="left"><?php echo $r['tujuan_kunjungan']; ?></td>
                            <td align="left"><?php echo $r['tgl_buat']; ?></td>
							<td align="center"><div class="btn-group"><a href="pages/cetak/cetak_lapkunjungan.php?no_lkpp=<?php echo $r['no_lkpp'] ?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; } ?>" target="_blank"><i class="fa fa-print"></i> </a>
							<a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; } ?>" onclick="confirm_delete('./HapusDataLKPP-<?php echo $r['id'] ?>');"><i class="fa fa-trash"></i> </a>
              <a href="EditFormLKPP-<?php echo $r['id']; ?>" class="btn btn-success btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; } ?>"><i class="fa fa-edit"></i> </a></div></td>
						</tr>   
					<?php 
						} 
					?>
				</tbody>   
				</table>
					<div id="EditLKPP" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	
					</div>
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
         <script type="text/javascript">
    function confirm_delete(delete_url)
    {
      $('#modal_del').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>
