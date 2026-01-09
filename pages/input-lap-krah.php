<?php
include"koneksi.php";
ini_set("error_reporting", 1);
if($_POST['simpan']=="Simpan")
{
		$ceksql=mysqli_query($con,"SELECT * FROM `tbl_lap_inspeksi` WHERE `nokk`='$_GET[nokk]' and `shift`='$_POST[shift]' AND tgl_update ='$_POST[tgl]' AND `dept`='KRAH' LIMIT 1");
    $cek=mysqli_num_rows($ceksql);
    $sqlkite=mysqli_query($con,"SELECT * FROM `tbl_kite` WHERE `nokk`='$_GET[nokk]' AND `user_packing`='KRAH' LIMIT 1");
	$cekkite=mysqli_num_rows($sqlkite);
	if($cek>0){
	$pelanggan=str_replace("'","''",$_POST['pelanggan']);
	$order=str_replace("'","''",$_POST['no_order']);
    $po=str_replace("'","''",$_POST['no_po']);		
	$jns=str_replace("'","''",$_POST['jenis_kain']);
	$warna=str_replace("'","''",$_POST['warna']);
	$catatan=str_replace("'","''",$_POST['catatan']);
	$sql=mysqli_query($con,"UPDATE `tbl_lap_inspeksi` SET
	`no_order`='$order',
	`no_po`='$po',
	`pelanggan`='$pelanggan',
	`jenis_kain`='$jns',
	`warna`='$warna',
	`lot`='$_POST[lot]',
	`inspektor`='$_POST[inspektor]',
	`jml_roll`='$_POST[rol]',
	`bruto`='$_POST[bruto]',
	`jml_netto`='$_POST[rol_netto]',
	`netto`='$_POST[netto]',
	`sisa`='$_POST[sisa]',
	`jml_sisa`='$_POST[pcs_sisa]',
	`rol_sisa`='$_POST[rol_sisa]',
	`no_mutasi`='$_POST[no_mutasi]',
	`tot_bs`='$_POST[totbs]',
	`proses`='$_POST[proses]',
	`status`='$_POST[status]',
	`catatan`='$catatan'
    WHERE `nokk`='$_POST[nokk]' and  `shift`='$_POST[shift]' and `tgl_update`='$_POST[tgl]' ");
    if($cekkite>0){
        $qry=mysqli_query($con,"UPDATE `tbl_kite` SET
        `tgl_delv`='$_POST[tgl_deliv]'
        WHERE `nokk`='$_POST[nokk]'
        ");
    }
	if($sql){
        //echo " <script>alert('Data has been updated!');</script>";
        echo "<script>swal({
            title: 'Data has been updated!',   
            text: 'Klik Ok untuk input data kembali',
            type: 'success',
            }).then((result) => {
            if (result.value) {
                window.location.href='LapKrah';
               
            }
          });</script>";
		}
		}
	else{
	$pelanggan=str_replace("'","''",$_POST['pelanggan']);
	$order=str_replace("'","''",$_POST['no_order']);
    $po=str_replace("'","''",$_POST['no_po']);
	$jns=str_replace("'","''",$_POST['jenis_kain']);
	$warna=str_replace("'","''",$_POST['warna']);
	$catatan=str_replace("'","''",$_POST['catatan']);
	$sql=mysqli_query($con,"INSERT INTO `tbl_lap_inspeksi` SET
	`nokk`='$_POST[nokk]',
	`no_po`='$po',
	`no_order`='$order',
	`pelanggan`='$pelanggan',
	`jenis_kain`='$jns',
	`warna`='$warna',
	`lot`='$_POST[lot]',
	`inspektor`='$_POST[inspektor]',
	`shift`='$_POST[shift]',
	`jml_roll`='$_POST[rol]',
	`bruto`='$_POST[bruto]',
	`pcs_bruto`='$_POST[pcs_bruto]',
	`jml_netto`='$_POST[rol_netto]',
	`netto`='$_POST[netto]',
	`panjang`='$_POST[pcs_netto]',
	`sisa`='$_POST[sisa]',
	`jml_sisa`='$_POST[pcs_sisa]',
	`rol_sisa`='$_POST[rol_sisa]',
	`no_mutasi`='$_POST[no_mutasi]',
	`tot_bs`='$_POST[totbs]',
	`proses`='$_POST[proses]',
	`status`='$_POST[status]',
	`catatan`='$catatan',
	`dept`='KRAH',
    `tgl_update`='$_POST[tgl]'");
    if($cekkite>0){
        $qry=mysqli_query($con,"UPDATE `tbl_kite` SET
        `tgl_delv`='$_POST[tgl_deliv]'
        WHERE `nokk`='$_POST[nokk]'
        ");
    }
	if($sql){
        //echo " <script>alert('Data has been saved!');</script>";
        echo "<script>swal({
            title: 'Data has been saved!',   
            text: 'Klik Ok untuk input data kembali',
            type: 'success',
            }).then((result) => {
            if (result.value) {
                window.location.href='LapKrah';
               
            }
          });</script>";
		}
	}
}
?>

<?Php
if($_GET['nokk']!=""){$nokk=$_GET['nokk'];}else{$nokk=" ";}

//Data sudah disimpan di database mysqli
$msql=mysqli_query($con,"SELECT * FROM `tbl_lap_inspeksi` WHERE `nokk`='$nokk' and `shift`='$_GET[shift]' AND DATE_FORMAT(tgl_update, '%Y-%m-%d') = DATE_FORMAT(now(), '%Y-%m-%d') AND `dept`='KRAH' LIMIT 1");
$row=mysqli_fetch_array($msql);
$crow=mysqli_num_rows($msql);

//Data belum disimpan di database mysqli
$sql=mysqli_query($con,"SELECT a.*,sum(b.netto)as neto,COUNT(b.netto) as rol,sum(b.brutto) as brutto,sum(b.net_wight) as kg FROM tbl_kite a 
INNER JOIN tmp_detail_kite b ON a.nokk=b.nokkkite
WHERE nokk='$nokk' AND user_packing='KRAH' and b.sisa=''
GROUP BY a.id");
$r=mysqli_fetch_array($sql);

//Data belum disimpan di database mysqli
$sqls=mysqli_query($con,"SELECT a.*,sum(b.netto)as neto,COUNT(b.netto) as rol,sum(b.brutto) as brutto,sum(b.net_wight) as kg FROM tbl_kite a 
INNER JOIN tmp_detail_kite b ON a.nokk=b.nokkkite
WHERE nokk='$nokk' AND user_packing='KRAH' and b.sisa='SISA'
GROUP BY a.id");
$rs=mysqli_fetch_array($sqls);
//Data belum disimpan di database mysqli
$sqlm=mysqli_query($con,"SELECT a.no_mutasi from pergerakan_stok a
INNER JOIN  detail_pergerakan_stok b ON a.id=b.id_stok 
WHERE b.nokk='$nokk'
GROUP BY a.id");
$rm=mysqli_fetch_array($sqlm);
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Input Data</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
    </div>
    <div class="box-body">
        <div class="col-md-6">
            <div class="form-group">
				<label for="nokk" class="col-sm-3 control-label">No Kartu Kerja</label>
                <div class="col-sm-4">
					<input name="nokk" type="text" class="form-control" id="nokk" 
					onchange="window.location='LapKrah-'+this.value" value="<?php echo $_GET['nokk'];?>" placeholder="No KK" required >
			    </div>
			</div>
            <?php if(strlen($nokk)=="15"){?>
            <div class="form-group">
				<label for="shift" class="col-sm-3 control-label">Shift</label>
                    <div class="col-sm-2">
                        <select class="form-control select2" name="shift" required>
                            <option value="">Pilih</option>
                            <option value="1" <?php if($_GET['shift']=="1"){echo "SELECTED";}?>>1</option>
                            <option value="2" <?php if($_GET['shift']=="2"){echo "SELECTED";}?>>2</option>
                            <option value="3" <?php if($_GET['shift']=="3"){echo "SELECTED";}?>>3</option>
                        </select>
                    </div>
            </div>
            <?php } ?>
            <div class="form-group">
                <label for="pelanggan" class="col-sm-3 control-label">Pelanggan</label>
                <div class="col-sm-8">
                    <input name="pelanggan" type="text" class="form-control" id="pelanggan" 
			        value="<?php if($crow>0){echo $row['pelanggan'];}else{echo $r['pelanggan'];}?>" placeholder="Pelanggan" >
                </div>
            </div>
            <div class="form-group">
                <label for="no_order" class="col-sm-3 control-label">No Order</label>
                <div class="col-sm-4">
                    <input name="no_order" type="text" class="form-control" id="no_order" value="<?php if($crow>0){echo $row['no_order'];}else{echo $r['no_order'];} ?>" placeholder="No Order" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="no_po" class="col-sm-3 control-label">PO</label>
                <div class="col-sm-5">
                    <input name="no_po" class="form-control" type="text" id="no_po" value="<?php if($crow>0){echo $row['no_po'];}else{echo $r['no_po'];} ?>" placeholder="PO" required>
                </div>
            </div>
            <div class="form-group">
                <label for="jenis_kain" class="col-sm-3 control-label">Jenis Kain</label>
                <div class="col-sm-8">
                    <textarea name="jenis_kain" class="form-control" id="jenis_kain" placeholder="Jenis Kain"><?php if($crow>0){echo $row['jenis_kain'];}else{echo stripslashes($r['jenis_kain']);}?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="warna" class="col-sm-3 control-label">Warna</label>
                <div class="col-sm-8">
                    <textarea name="warna" class="form-control" id="warna" placeholder="Warna"><?php if($crow>0){echo $row['warna'];}else{echo stripslashes($r['warna']);}?></textarea>
                </div>
            </div>
            <?php if(strlen($nokk)!="15"){?>
            <div class="form-group">
				<label for="shift" class="col-sm-3 control-label">Shift</label>
                    <div class="col-sm-2">
                        <select class="form-control select2" name="shift" required>
                            <option value="1" <?php if($row['shift']=="1"){echo "SELECTED";}?>>1</option>
                        </select>
                    </div>
            </div>
            <?php } ?>
            <div class="form-group">		  	
                <label for="tgl_deliv" class="col-sm-3 control-label">Tgl Delivery</label>
                    <div class="col-sm-4">					  
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                <input name="tgl_deliv" type="text" class="form-control pull-right" id="datepicker" placeholder="0000-00-00" value="<?php echo $r['tgl_delv']; ?>" required/>
                        </div>
                    </div>
            </div>
            <div class="form-group">		  	
                <label for="tgl" class="col-sm-3 control-label">Tgl Update</label>
                    <div class="col-sm-4">					  
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                <input name="tgl" type="text" class="form-control pull-right" id="datepicker1" placeholder="0000-00-00" value="<?php if($crow>0){echo $row['tgl_update'];} ?>" required/>
                        </div>
                    </div>
            </div>
            <div class="form-group">
				<label for="inspektor" class="col-sm-3 control-label">Group</label>
                    <?php if($crow>0){$grup=$row['inspektor'];}else{$grup=$r['user_packing'];}?>
                    <div class="col-sm-2">
                        <select class="form-control select2" name="inspektor" required>
                            <option value="">Pilih</option>
                            <option value="KRAH" <?php if($grup=="KRAH"){echo "SELECTED";}?>>KRAH</option>>
                        </select>
                    </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="lot" class="col-sm-3 control-label">Lot</label>
                <div class="col-sm-3">
                    <input name="lot" class="form-control" type="text" id="lot" value="<?php echo $r['no_lot'];?>" placeholder="Lot">
                </div>
            </div>
            <div class="form-group">
                <label for="no_mutasi" class="col-sm-3 control-label">No Mutasi</label>
                <div class="col-sm-4">
                    <input name="no_mutasi" class="form-control" type="text" id="no_mutasi" value="<?php if($crow>0){echo $row['no_mutasi'];}else{echo $rm['no_mutasi'];} ?>" placeholder="No Mutasi">
                </div>
            </div>
            <div class="form-group">
                <label for="qty_bruto" class="col-sm-3 control-label">Qty Bruto</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="rol" type="text" class="form-control" id="rol" value="" placeholder="0" required>
                        <span class="input-group-addon">Bales</span>
					</div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="bruto" type="text" class="form-control" id="bruto" value="<?php if($crow>0){echo $row['bruto'];}else{echo $r['bruto'];} ?>" placeholder="0.00" required>
                        <span class="input-group-addon">KGs</span>
					</div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="pcs_bruto" type="text" class="form-control" id="pcs_bruto" value="<?php if($crow>0){echo $row['panjang'];} ?>" placeholder="0.00" required>
                        <span class="input-group-addon">PCS</span>
					</div>
                </div>
            </div>
            <div class="form-group">
                <label for="qty_netto" class="col-sm-3 control-label">Qty Netto</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="rol_netto" type="text" class="form-control" id="rol_netto" value="<?php if($crow>0){echo $row['jml_netto'];}else{echo $r['rol'];}?>" placeholder="0" required>
                        <span class="input-group-addon">Bales</span>
					</div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="netto" type="text" class="form-control" id="netto" value="<?php if($crow>0){echo $row['netto'];}else{echo $r['kg'];} ?>" placeholder="0.00" required>
                        <span class="input-group-addon">KGs</span>
					</div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="pcs_netto" type="text" class="form-control" id="pcs_netto" value="<?php if($crow>0){echo $row['panjang'];}else{echo $r['neto'];} ?>" placeholder="0.00" required>
                        <span class="input-group-addon">PCS</span>
					</div>
                </div>
            </div>
            <div class="form-group">
                <label for="qty_sisa" class="col-sm-3 control-label">Qty Sisa</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="rol_sisa" type="text" class="form-control" id="rol_sisa" value="<?php if($crow>0){echo $row['rol_sisa'];}else if($rs['rol']!=""){echo $rs['rol'];}else{echo "0";}?>" placeholder="0" required>
                        <span class="input-group-addon">Bales</span>
					</div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="sisa" type="text" class="form-control" id="sisa" value="<?php if($crow>0){echo $row['netto'];}else if($rs['kg']!=""){echo $rs['kg'];}else{echo "0.00";} ?>" placeholder="0.00" required>
                        <span class="input-group-addon">KGs</span>
					</div>
                </div>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="pcs_sisa" type="text" class="form-control" id="pcs_sisa" value="<?php if($crow>0){echo $row['jml_sisa'];}else if($rs['neto']!=""){echo $rs['neto'];}else{echo "0";} ?>" placeholder="0.00" required>
                        <span class="input-group-addon">PCS</span>
					</div>
                </div>
            </div>
            <div class="form-group">
                <label for="totbs" class="col-sm-3 control-label">Total BS</label>
                <div class="col-sm-3">
                    <div class="input-group">
                        <input name="totbs" type="text" class="form-control" id="totbs" value="" placeholder="0">
                        <span class="input-group-addon">PCS</span>
					</div>
                </div>
            </div>
            <div class="form-group">
				<label for="proses" class="col-sm-3 control-label">Proses</label>
                    <div class="col-sm-3">
                        <select class="form-control select2" name="proses">
                            <option value="F">F</option>
                            <option value="O">O</option>
                            <option value="T">T</option>
                        </select>
                    </div>
            </div>
            <div class="form-group">
				<label for="status" class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-3">
                        <select class="form-control select2" name="status">
                            <option value="OK">OK</option>
                            <option value="BS">BS</option>
                            <option value="BW">BW</option>
                            <option value="TCW">TCW</option>
                        </select>
                    </div>
            </div>
            <div class="form-group">
                  <label for="catatan" class="col-sm-3 control-label">Catatan</label>
                  <div class="col-sm-8">
                        <textarea name="catatan" class="form-control" id="catatan" placeholder="Keterangan"><?php echo $row['catatan'];?></textarea>  
                  </div>				   
            </div>
        </div>
    </div>
    <div class="box-footer">
            <?php if($_GET['nokk']!="" and $cek==0){ ?> 	
            <button type="submit" class="btn btn-primary pull-right" name="simpan" value="Simpan"><i class="fa fa-save"></i> Simpan</button> 
            <?php } ?>
            <button type="button" class="btn btn-warning pull-left" name="lihat" value="lihat" onClick="window.location.href='LihatLapKrah'"><i class="fa fa-search"></i> Lihat Data</button> 	   
    </div>
</div>
</form>
