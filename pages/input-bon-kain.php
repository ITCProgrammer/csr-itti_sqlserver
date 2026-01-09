<?php
	$qryCek=mysql_query("SELECT * FROM tbl_aftersales WHERE `id`='$_GET[id]'");
	$rCek=mysql_fetch_array($qryCek);
	 ?>
<?php
function no_urut($x){
date_default_timezone_set("Asia/Jakarta");
if($x=="Reject Buyer"){$fk="RB";}else if($x=="Kurang Qty"){$fk="GK";}	
$format = $fk.date("y/m/");
$sql=mysql_query("SELECT no_bon FROM tbl_ganti_kain WHERE substr(no_bon,1,10) like '".$format."%' ORDER BY no_bon DESC LIMIT 1 ") or die (mysql_error());
$d=mysql_num_rows($sql);
if($d>0){
$r=mysql_fetch_array($sql);
$d=$r['no_bon'];
$str=substr($d,8,3);
$Urut = (int)$str;
}else{
$Urut = 0;
}
$Urut = $Urut + 1;
$Nol="";
$nilai=3-strlen($Urut);
for ($i=1;$i<=$nilai;$i++){
$Nol= $Nol."0";
}
$nipbr =$format.$Nol.$Urut;
return $nipbr;
}

date_default_timezone_set("Asia/Jakarta");
//Baca Tanggal Hari ini
$today = date("Y-m-d");
//Cari nokk terakhir pada hari ini
$sql = "SELECT max(kd_ganti) FROM tbl_ganti_kain WHERE id_nsp='$_GET[id]'";
$query = mysql_query($sql) or die (mysql_error());

$gno = mysql_fetch_array($query);

if($gno){
  $nilai = substr($gno[0], 1);
  $kode = (int) $nilai;

  //tambahkan sebanyak + 1
  $kode = $kode + 1;
  if($_POST[alasan]=="Reject Buyer"){
  	$auto_kode = "GR".str_pad($kode, 1,  STR_PAD_LEFT);
	}else if($_POST[alasan]=="Kurang Qty"){
	$auto_kode = "G".str_pad($kode, 1,  STR_PAD_LEFT);
	}
} else {
  $auto_kode = "G1";
}

$qryg=mysql_query("SELECT kd_ganti FROM tbl_ganti_kain WHERE id_nsp='$_GET[id]' AND tgl_buat LIKE '$today%' LIMIT 1");
$cekg=mysql_num_rows($qryg);
$rg=mysql_fetch_array($qryg);
	if(isset($_POST[save])){
		$bon=no_urut($_POST[alasan]);
		//if($_POST[analisa]=="Reject Buyer"){$order=$rCek[no_order]." GR1";}else if($_POST[analisa]=="Kurang Qty"){$fk= $rCek[no_order]." G1";}
		$order=$rCek[no_order];
		if($cekg>0){
			$kdganti=$rg['kd_ganti'];
		}else{
		$kdganti=$auto_kode;}
		$pos=strpos($rCek[langganan], "/");
		$posbuyer=substr($rCek[langganan],$pos+1,50);
		$buyer=str_replace("'","''",$posbuyer);
		$analisa=str_replace("'","''",$_POST[analisa]);	
		$pencegahan=str_replace("'","''",$_POST[pencegahan]);	
		$alasan=str_replace("'","''",$_POST[alasan]);
		$pwar1= strpos($_POST[warna1], ',');
		$pwar2= strpos($_POST[warna2], ',');
		$pwar3= strpos($_POST[warna3], ',');
		$potW1=substr($_POST[warna1],0,$pwar1);
		$potW2=substr($_POST[warna2],0,$pwar2);
		$potW3=substr($_POST[warna3],0,$pwar3);
		//$potKK1=substr($_POST[warna1],$pwar1+1,15);
		//$potKK2=substr($_POST[warna2],$pwar2+1,15);
		//$potKK3=substr($_POST[warna3],$pwar3+1,15);
		$kk1=str_replace("'","''",$_POST[nokk1]);
		$kk2=str_replace("'","''",$_POST[nokk2]);
		$kk3=str_replace("'","''",$_POST[nokk3]);
		$warna1=str_replace("'","''",$potW1);
		$warna2=str_replace("'","''",$potW2);		
		$warna3=str_replace("'","''",$potW3);
		$kg1=str_replace("'","''",$_POST[kg1]);
		$kg2=str_replace("'","''",$_POST[kg2]);		
		$kg3=str_replace("'","''",$_POST[kg3]);
		$pjg1=str_replace("'","''",$_POST[pjg1]);
		$pjg2=str_replace("'","''",$_POST[pjg2]);		
		$pjg3=str_replace("'","''",$_POST[pjg3]);
		$satuan1=str_replace("'","''",$_POST[satuan1]);
		$satuan2=str_replace("'","''",$_POST[satuan2]);		
		$satuan3=str_replace("'","''",$_POST[satuan3]);
		//$plot1= strpos($_POST[warna1], ',');
		//$plot2= strpos($_POST[warna2], ',');
		//$plot3= strpos($_POST[warna3], ',');
		$potL1=substr($_POST[warna1],$pwar1+1,20);
		$potL2=substr($_POST[warna2],$pwar2+1,20);
		$potL3=substr($_POST[warna3],$pwar3+1,20);
		$lot1=str_replace("'","''",$potL1);
		$lot2=str_replace("'","''",$potL2);
		$lot3=str_replace("'","''",$potL3);
		$langganan=str_replace("'","''",$rCek[langganan]);
		$masalah=str_replace("'","''",$rCek[masalah]);
		$no_po=str_replace("'","''",$rCek[po]);
		$no_item=str_replace("'","''",$rCek[no_item]);
		$no_hanger=str_replace("'","''",$rCek[no_hanger]);
		$jenis_kain=str_replace("'","''",$rCek[jenis_kain]);
		$lebar=str_replace("'","''",$rCek[lebar]);
		$gramasi=str_replace("'","''",$rCek[gramasi]);
		$warna=str_replace("'","''",$rCek[warna]);
		$no_warna=str_replace("'","''",$rCek[no_warna]);
		$qty_order=str_replace("'","''",$rCek[qty_order]);
		$qty_kirim=str_replace("'","''",$rCek[qty_kirim]);
		$qty_foc=str_replace("'","''",$rCek[qty_foc]);
		$qty_claim=str_replace("'","''",$rCek[qty_claim]);
		$t_jawab=str_replace("'","''",$rCek[t_jawab]);
		$t_jawab1=str_replace("'","''",$rCek[t_jawab1]);
		$t_jawab2=str_replace("'","''",$rCek[t_jawab2]);
		$persen=str_replace("'","''",$rCek[persen]);
		$persen1=str_replace("'","''",$rCek[persen1]);
		$persen2=str_replace("'","''",$rCek[persen2]);
		$styl=str_replace("'","''",$rCek[styl]);
		$satuan_o=str_replace("'","''",$rCek[satuan_o]);
		$satuan_k=str_replace("'","''",$rCek[satuan_k]);
		$satuan_f=str_replace("'","''",$rCek[satuan_f]);
		$satuan_c=str_replace("'","''",$rCek[satuan_c]);
		$qry1=mysql_query("INSERT INTO tbl_ganti_kain SET
		`id_nsp`='$_GET[id]',
		`buyer`='$buyer',
		`kd_ganti`='$kdganti',
		`no_bon`='$bon',
		`no_order`='$order',
		`alasan`='$alasan',
		`analisa`='$analisa',
		`pencegahan`='$pencegahan',
		`nokk1`='$kk1',
		`nokk2`='$kk2',
		`nokk3`='$kk3',
		`warna1`='$warna1',
		`warna2`='$warna2',
		`warna3`='$warna3',
		`kg1`='$kg1',
		`kg2`='$kg2',
		`kg3`='$kg3',
		`pjg1`='$pjg1',
		`pjg2`='$pjg2',
		`pjg3`='$pjg3',
		`satuan1`='$satuan1',
		`satuan2`='$satuan2',
		`satuan3`='$satuan3',
		`lot1`='$lot1',
		`lot2`='$lot2',
		`lot3`='$lot3',
		`langganan`='$langganan',
		`masalah`='$masalah',
		`no_po`='$no_po',
		`no_item`='$no_item',
		`no_hanger`='$no_hanger',
		`jenis_kain`='$jenis_kain',
		`lebar`='$lebar',
		`gramasi`='$gramasi',
		`warna`='$warna',
		`no_warna`='$no_warna',
		`qty_order`='$qty_order',
		`qty_foc`='$qty_foc',
		`qty_kirim`='$qty_kirim',
		`qty_claim`='$qty_claim',
		`t_jawab`='$t_jawab',
		`t_jawab1`='$t_jawab1',
		`t_jawab2`='$t_jawab2',
		`persen`='$persen',
		`persen1`='$persen1',
		`persen2`='$persen2',
		`styl`='$styl',
		`satuan_o`='$satuan_o',
		`satuan_k`='$satuan_k',
		`satuan_f`='$satuan_f',
		`satuan_c`='$satuan_c',
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
      window.open('pages/cetak/cetak_bon_ganti.php?no_bon=$bon','_blank');
      window.location.href='TambahBon-$_GET[id]';
	 
  }
});</script>";
		}
	}
$alsn= isset($_POST[alasan]) ? $_POST[alasan] : '';
$W1= isset($_POST[warna1]) ? $_POST[warna1] : '';
$W2= isset($_POST[warna2]) ? $_POST[warna2] : '';
$W3= isset($_POST[warna3]) ? $_POST[warna3] : '';
$posW1=strpos($_POST[warna1], ',');
$WRN1=substr($_POST[warna1],0,$posW1);
$WN1=str_replace("'","''",$WRN1);
$posW2=strpos($_POST[warna2], ',');
$WRN2=substr($_POST[warna2],0,$posW2);
$WN2=str_replace("'","''",$WRN2);
$posW3=strpos($_POST[warna3], ',');
$WRN3=substr($_POST[warna3],0,$posW3);
$WN3=str_replace("'","''",$WRN3);
//$posKK1=substr($_POST[warna1],$posW1+1,15);
//$posKK2=substr($_POST[warna2],$posW2+1,15);
//$posKK3=substr($_POST[warna3],$posW3+1,15);
//$kker1=str_replace("'","''",$posKK1);
//$kker2=str_replace("'","''",$posKK2);
//$kker3=str_replace("'","''",$posKK3);
$yard1= isset($_POST[pjg1]) ? $_POST[pjg1] : '';
$yard2= isset($_POST[pjg2]) ? $_POST[pjg2] : '';
$yard3= isset($_POST[pjg3]) ? $_POST[pjg3] : '';
//$posL1=strpos($_POST[warna1], ',');
$posLot1=substr($_POST[warna1],$posW1+1,20);
$L1=str_replace("'","''",$posLot1);
//$L1= isset($_POST[lot1]) ? $_POST[lot1] : '';
//$posL2=strpos($_POST[warna2], ',');
$posLot2=substr($_POST[warna2],$posW2+1,20);
$L2=str_replace("'","''",$posLot2);
//$L2= isset($_POST[lot2]) ? $_POST[lot2] : '';
//$posL3=strpos($_POST[warna3], ',');
$posLot3=substr($_POST[warna3],$posW3+1,20);
$L3=str_replace("'","''",$posLot3);
$sat1= isset($_POST[satuan1]) ? $_POST[satuan1] : '';
$sat2= isset($_POST[satuan2]) ? $_POST[satuan2] : '';
$sat3= isset($_POST[satuan3]) ? $_POST[satuan3] : '';
//$L3= isset($_POST[lot3]) ? $_POST[lot3] : '';
?>	

<div class="box box-info">
 	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1">
		<div class="box-header with-border">
			<h3 class="box-title">Formulir Ganti Kain</h3>
			<div class="box-tools pull-right">
      			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			</div>
  		</div>
  		<div class="box-body">
	  		<div class="form-group">
                <label for="alasan" class="col-sm-2 control-label">Alasan</label>
                  	<div class="col-sm-3">
                    	<select class="form-control select2" name="alasan" required>
							<option value="">Pilih</option>
							<option <?php if($_POST[alasan]=="Reject Buyer"){?> selected=selected <?php };?>value="Reject Buyer">Reject Buyer</option>	
							<option <?php if($_POST[alasan]=="Kurang Qty"){?> selected=selected <?php };?>value="Kurang Qty">Kurang Qty</option>
						</select>
                  	</div>
            </div>
	  		<div class="form-group">
                <label for="warna1" class="col-sm-2 control-label">Warna / Lot 1</label>
                  	<div class="col-sm-3">
                    	<select class="form-control select2" name="warna1" required>
							<option value="">Pilih</option>
							<?php $sqlw1=mysql_query("SELECT warna,lot FROM tbl_aftersales WHERE no_order='$rCek[no_order]' and no_hanger='$rCek[no_hanger]' ORDER BY warna");
							while ($rwarna=mysql_fetch_array($sqlw1)){ ?>
							<option value="<?php echo $rwarna[warna].",".$rwarna[lot];?>"><?php echo $rwarna[warna]." / ".$rwarna[lot];?></option>
							<?php } ?>
							<option <?php if($WN1!=""){?> selected=selected <?php };?>value="<?php echo $WN1.",".$L1;?>"><?php echo $WN1." / ".$L1;?></option>
						</select>
                  	</div>
				  	<div class="col-sm-2">
                    	<div class="input-group">
							<?php $qryw1=mysql_query("SELECT qty_claim,nokk FROM tbl_aftersales WHERE warna='$WN1' and lot='$L1' and no_order='$rCek[no_order]' and no_hanger='$rCek[no_hanger]'");
							$rowW1=mysql_fetch_array($qryw1);
							?>  
							<input name="kg1" type="text" class="form-control" id="kg1" value="<?php echo $rowW1[qty_claim]; ?>" placeholder="0.00" style="text-align: right;" readonly>
							<span class="input-group-addon">Kg</span>
							
						</div>
                  	</div>
					  <div class="col-sm-2">
                    	<div class="input-group">  
							<input name="pjg1" type="text" class="form-control" id="pjg1" value="<?php if($yard1!=""){echo $yard1;}else{echo $rcek[pjg1];} ?>" placeholder="0.00" style="text-align: right;" required>
								<span class="input-group-addon">
									<select name="satuan1" style="font-size: 12px;" id="satuan1">
										<option value="Yard" <?php if($rcek[satuan1]=="Yard"){ echo "SELECTED"; }?>>Yard</option>
										<option value="Meter" <?php if($rcek[satuan1]=="Meter"){ echo "SELECTED"; }?>>Meter</option>
										<option value="PCS" <?php if($rcek[satuan1]=="PCS"){ echo "SELECTED"; }?>>PCS</option>
										<option value="<?php echo $sat1;?>" <?php if($sat1!=""){ echo "SELECTED"; }?>><?php echo $sat1;?></option>
							  		</select>
								</span>	
						</div>
                  	</div>
					<div class="col-sm-2">
						<input name="nokk1" type="hidden" class="form-control" id="nokk1" value="<?php echo $rowW1[nokk]; ?>" placeholder="" readonly>
					</div>
            </div>
	  		<div class="form-group">
                <label for="warna2" class="col-sm-2 control-label">Warna / Lot 2</label>
                	<div class="col-sm-3">
                    	<select class="form-control select2" name="warna2">
							<option value="">Pilih</option>
							<?php $sqlw1=mysql_query("SELECT warna,lot FROM tbl_aftersales WHERE no_order='$rCek[no_order]' and no_hanger='$rCek[no_hanger]' ORDER BY warna");
							while ($rwarna=mysql_fetch_array($sqlw1)){ ?>
							<option value="<?php echo $rwarna[warna].",".$rwarna[lot];?>"><?php echo $rwarna[warna]." / ".$rwarna[lot];?></option>
							<?php } ?>
							<option <?php if($WN2!=""){?> selected=selected <?php };?>value="<?php echo $WN2.",".$L2;?>"><?php echo $WN2." / ".$L2;?></option>
						</select>
                  	</div>
				  	<div class="col-sm-2">
                    	<div class="input-group">
							<?php $qryw2=mysql_query("SELECT qty_claim,nokk FROM tbl_aftersales WHERE warna='$WN2' and lot='$L2' and no_order='$rCek[no_order]' and no_hanger='$rCek[no_hanger]'");
							$rowW2=mysql_fetch_array($qryw2);
							?>  
							<input name="kg2" type="text" class="form-control" id="kg2" value="<?php echo $rowW2[qty_claim]; ?>" placeholder="0.00" style="text-align: right;" readonly>
							<span class="input-group-addon">Kg</span>
						</div>
                  	</div>
					  <div class="col-sm-2">
                    	<div class="input-group">  
							<input name="pjg2" type="text" class="form-control" id="pjg2" value="<?php if($yard2!=""){echo $yard2;}else{echo $rcek[pjg2];} ?>" placeholder="0.00" style="text-align: right;">
								<span class="input-group-addon">
									<select name="satuan2" style="font-size: 12px;" id="satuan2">
										<option value="Yard" <?php if($rcek[satuan2]=="Yard"){ echo "SELECTED"; }?>>Yard</option>
										<option value="Meter" <?php if($rcek[satuan2]=="Meter"){ echo "SELECTED"; }?>>Meter</option>
										<option value="PCS" <?php if($rcek[satuan2]=="PCS"){ echo "SELECTED"; }?>>PCS</option>
										<option value="<?php echo $sat2;?>" <?php if($sat2!=""){ echo "SELECTED"; }?>><?php echo $sat2;?></option>
									</select>
								</span>	
						</div>
                  	</div>
					<div class="col-sm-2">
					<input name="nokk2" type="hidden" class="form-control" id="nokk2" value="<?php echo $rowW2[nokk]; ?>" placeholder="" readonly>	
					</div>
            </div>
	  		<div class="form-group">
            	<label for="warna3" class="col-sm-2 control-label">Warna / Lot 3</label>
                  	<div class="col-sm-3">
                    	<select class="form-control select2" name="warna3">
							<option value="">Pilih</option>
							<?php $sqlw1=mysql_query("SELECT warna,lot FROM tbl_aftersales WHERE no_order='$rCek[no_order]' and no_hanger='$rCek[no_hanger]' ORDER BY warna");
							while ($rwarna=mysql_fetch_array($sqlw1)){ ?>
							<option value="<?php echo $rwarna[warna].",".$rwarna[lot];?>"><?php echo $rwarna[warna]." / ".$rwarna[lot];?></option>
							<?php } ?>
							<option <?php if($WN3!=""){?> selected=selected <?php };?>value="<?php echo $WN3.",".$L3;?>"><?php echo $WN3." / ".$L3;?></option>	
						</select>
                 	</div>
				  	<div class="col-sm-2">
                    	<div class="input-group">
							<?php $qryw3=mysql_query("SELECT qty_claim FROM tbl_aftersales WHERE warna='$WN3' and lot='$L3' and no_order='$rCek[no_order]' and no_hanger='$rCek[no_hanger]'");
							$rowW3=mysql_fetch_array($qryw3);
							?>  
							<input name="kg3" type="text" class="form-control" id="kg3" value="<?php echo $rowW3[qty_claim]; ?>" placeholder="0.00" style="text-align: right;" readonly>
							<span class="input-group-addon">Kg</span>
							
						</div>
                  	</div>
					  <div class="col-sm-2">
                    	<div class="input-group">  
							<input name="pjg3" type="text" class="form-control" id="pjg3" value="<?php if($yard3!=""){echo $yard3;}else{echo $rcek[pjg3];} ?>" placeholder="0.00" style="text-align: right;">
							<span class="input-group-addon">
								<select name="satuan3" style="font-size: 12px;" id="satuan3">
									<option value="Yard" <?php if($rcek[satuan3]=="Yard"){ echo "SELECTED"; }?>>Yard</option>
								  	<option value="Meter" <?php if($rcek[satuan3]=="Meter"){ echo "SELECTED"; }?>>Meter</option>
								  	<option value="PCS" <?php if($rcek[satuan3]=="PCS"){ echo "SELECTED"; }?>>PCS</option>
									<option value="<?php echo $sat3;?>" <?php if($sat3!=""){ echo "SELECTED"; }?>><?php echo $sat3;?></option>
							  	</select>
							</span>	
						</div>
                  	</div>
					<div class="col-sm-2">
					<input name="nokk3" type="hidden" class="form-control" id="nokk3" value="<?php echo $rowW3[nokk]; ?>" placeholder="" readonly>		
					</div>
            </div>
			<!--<div class="form-group">
                <label for="nokk1" class="col-sm-2 control-label">NO KK 1</label>
                  	<div class="col-sm-2">
					  <?php 
					  	$sqlkk1=mysql_query("SELECT nokk FROM tbl_aftersales WHERE no_order='$rCek[no_order]' and no_hanger='$rCek[no_hanger]' and");
					  ?>
					  	<input name="nokk1" type="text" class="form-control" id="nokk1" value="<?php echo $rowW2[qty_claim]; ?>" placeholder="0.00" style="text-align: right;" readonly>
                  	</div>
            </div>-->
	  		<div class="form-group hidden">
                <label for="analisa" class="col-sm-2 control-label">Analisa</label>
                  	<div class="col-sm-6">
                    	<textarea name="analisa" class="form-control" id="analisa" placeholder="Analisa"></textarea>
                  	</div>
            </div>
	        <div class="form-group hidden">
                <label for="pencegahan" class="col-sm-2 control-label">Pencegahan</label>
                  	<div class="col-sm-6">
                    	<textarea name="pencegahan" class="form-control" id="pencegahan" placeholder="Pencegahan"></textarea>
                	</div>
            </div>
	  		<div class="form-group hidden">
                <label for="warna" class="col-sm-2 control-label">Warna</label>
                  	<div class="col-sm-6">
                    	<textarea name="warna" class="form-control" id="warna" placeholder=""></textarea>
                  	</div>
            </div> 
		</div>
<!-- /.box-footer -->
<div class="box-footer">
	<input type="submit" value="Simpan" name="save" id="save" <?php if($W1==""){echo "disabled";}?> class="btn btn-primary pull-right">
	<button type="submit" value="cari" class="btn btn-danger">Cari Data</button>
</div>	
</form>	 
</div>
<div class="row">
  	<div class="col-xs-12">
    	<div class="box">
			<div class="box-header with-border">
			</div>    
			<div class="box-body">		
				<table id="example3" class="table table-bordered table-hover table-striped nowrap" width="100%">
					<thead class="bg-green">
					<tr>
						<th width="48"><div align="center">No</div></th>
						<th width="60"><div align="center">Tgl Buat</div></th>
						<th width="301"><div align="center">Alasan</div></th>
						<th width="343"><div align="center">Analisa</div></th>
						<th width="331"><div align="center">Pencegahan</div></th>
						<th width="331"><div align="center">Warna</div></th>
						<th width="331"><div align="center">Qty</div></th>
						<th width="331"><div align="center">Aksi</div></th>
					</tr>
					</thead>
				<tbody>
					<?php 
					$sql=mysql_query(" SELECT * FROM tbl_ganti_kain WHERE id_nsp='$_GET[id]' ORDER BY tgl_buat ASC");
					while($r=mysql_fetch_array($sql)){
			
					$no++;
					$bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';	  
				
					?>
						<tr bgcolor="<?php echo $bgcolor; ?>">
							<td align="center"><a href="#" class="edit_bon" id="<?php echo $r['id'] ?>"><?php echo $no; ?></a></td>
							<td align="center"><?php echo $r[tgl_buat]; ?></td>
							<td align="center"><?php echo $r[alasan]; ?></td>
							<td align="left"><?php echo $r[analisa]; ?></td>
							<td align="left"><?php echo $r[pencegahan]; ?></td>
							<td align="left" valign="top"><?php if($r[warna1]!=""){echo "1. ".$r[warna1]."<br>";} ?><?php if($r[warna2]!=""){echo "2. ".$r[warna2]."<br>";} ?><?php if($r[warna3]!=""){echo "3. ".$r[warna3]."<br>";} ?></td>
							<td align="right"><?php if($r[kg1]>0){echo "1. ".$r[kg1]." Kg ".$r[pjg1]." ".$r[satuan1] ."<br>";} ?>
							<?php if($r[kg2]>0){echo "2. ".$r[kg2]." Kg ".$r[pjg2]." ".$r[satuan2] ."<br>";} ?>
							<?php if($r[kg3]>0){echo "3. ".$r[kg3]." Kg ".$r[pjg3]." ".$r[satuan3] ."<br>";} ?></td>
							<td align="center"><div class="btn-group"><a href="pages/cetak/cetak_bon_ganti.php?no_bon=<?php echo $r[no_bon] ?>&no=<?php echo $no; ?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; } ?>" target="_blank"><i class="fa fa-print"></i> </a>
							<a href="#" class="btn btn-danger btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; } ?>" onclick="confirm_delete('./HapusDataBON-<?php echo $r[id] ?>');"><i class="fa fa-trash"></i> </a></div></td>
						</tr>   
					<?php 
						$tpersen+=$r[persen];
						} 
					?>
				</tbody>   
				</table> 
					<div id="KodeEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					</div>
					<div id="PersenEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	
					</div> 
					<div id="EditBon" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">	
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
