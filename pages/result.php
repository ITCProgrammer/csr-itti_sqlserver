<style>
input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
 
input[type="number"] {
    -moz-appearance: textfield;
}
</style>
<script>
	
function roundToTwo(num) {    
    return +(Math.round(num + "e+2")  + "e-2");
}
</script>
<?php
$nokk=$_GET[nokk];
$notest= isset($_POST['no_test']) ? $_POST['no_test'] : '';
$sqlCek=mysql_query("SELECT * FROM tbl_tq_nokk WHERE nokk='$nokk' and no_test='$notest' ORDER BY id DESC LIMIT 1");
$cek=mysql_num_rows($sqlCek);
$rcek=mysql_fetch_array($sqlCek);
?>	
<?php 
$sqlCek1=mysql_query("SELECT *,
	CONCAT_WS(' ',fc_note,ph_note, abr_note, bas_note, dry_note, fla_note, fwe_note, fwi_note, burs_note,repp_note,wick_note,wick_note,absor_note,apper_note,fiber_note,pillb_note,pillm_note,pillr_note,thick_note,growth_note,recover_note,stretch_note,sns_note,snab_note,snam_note,snap_note) AS note_g FROM tbl_tq_test WHERE id_nokk='$rcek[id]' ORDER BY id DESC LIMIT 1");
$cek1=mysql_num_rows($sqlCek1);
$rcek1=mysql_fetch_array($sqlCek1);
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form0" id="form0">
 <div class="box box-info" style="width: 98%;">
   <div class="box-header with-border">
    <h3 class="box-title">Testing Kartu Kerja</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body"> 
	 <div class="col-md-6">
	  <!--	 
	  <div class="form-group">
		  <label for="no_order" class="col-sm-3 control-label">No Order</label>
		  <div class="col-sm-4">
			<input name="no_order" type="text" class="form-control" id="no_order" 
			value="" placeholder="No Order">
		  </div>				   
		</div>	 
      -->
      <div class="form-group">
                  <label for="no_po" class="col-sm-3 control-label">No KK</label>
                  <div class="col-sm-5">
				  <div class="input-group">	  
				  <input name="nokk" type="text" class="form-control" id="nokk" 
                     onchange="window.location='Result-'+this.value" onBlur="window.location='Result-'+this.value" value="<?php echo $_GET[nokk];?>" placeholder="No KK" required >
				  <span class="input-group-addon"><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-arrow-circle-right"></i> </a></span>
				  </div>	  
		  </div>
                </div> 
		<?php if($nokk!=""){ ?> 
		<div class="form-group">
		  <label for="no_test" class="col-sm-3 control-label">No Test</label>
		  <div class="col-sm-2">
			<select name="no_test" id="no_test" class="form-control">
			<?php $qryNoTes=mysql_query("SELECT no_test FROM tbl_tq_nokk WHERE nokk='$nokk' ORDER BY no_test DESC");
				while($r=mysql_fetch_array($qryNoTes)){?>
				<option value="<?php echo $r[no_test];?>" <?php if($notest==$r[no_test]){echo "SELECTED";} ?>><?php echo $r[no_test];?></option>
				<?php } ?>
			</select>
		  </div>				   
		</div>
		 <div class="form-group">
                  <label for="no_order" class="col-sm-3 control-label">No Order</label>
                  <div class="col-sm-4">
                    <input name="no_order" type="text" class="form-control" id="no_order" placeholder="No Order" 
                    value="<?php if($cek>0){echo $rcek[no_order];}else{echo $r[NoOrder];} ?>" readonly="readonly">
                  </div>				   
                </div>
		 	   <div class="form-group">
                  <label for="no_po" class="col-sm-3 control-label">Pelanggan</label>
                  <div class="col-sm-8">
                    <input name="pelanggan" type="text" class="form-control" id="no_po" placeholder="Pelanggan" 
                    value="<?php if($cek>0){echo $rcek[pelanggan];}else if($r1[partnername]!=""){echo $pelanggan;}else{}?>" readonly="readonly" >
                  </div>				   
                </div>	           
		 		<div class="form-group">
                  <label for="no_hanger" class="col-sm-3 control-label">No Hanger / No Item</label>
                  <div class="col-sm-3">
                    <input name="no_hanger" type="text" class="form-control" id="no_hanger" placeholder="No Hanger" 
                    value="<?php if($cek>0){echo $rcek[no_hanger];}else{echo $r[HangerNo];}?>" readonly="readonly">  
                  </div>
				  <div class="col-sm-3">
				  <input name="no_item" type="text" class="form-control" id="no_item" placeholder="No Item" 
                    value="<?php if($rcek[no_item]!=""){echo $rcek[no_item];}else{echo $r[ProductCode];}?>" readonly="readonly">
				  </div>	
                </div>
	            <div class="form-group">
                  <label for="jns_kain" class="col-sm-3 control-label">Jenis Kain</label>
                  <div class="col-sm-8">
					  <textarea name="jns_kain" readonly="readonly" class="form-control" id="jns_kain" placeholder="Jenis Kain"><?php if($cek>0){echo $rcek[jenis_kain];}else{echo $r[ProductDesc];}?></textarea>
					  </div>
                  </div>
		 <div class="form-group">
                  <label for="warna" class="col-sm-3 control-label">Warna</label>
                  <div class="col-sm-8">
                    <textarea name="warna" readonly="readonly" class="form-control" id="warna" placeholder="Warna"><?php if($cek>0){echo $rcek[warna];}else{echo $r[Color];}?></textarea>
                  </div>				   
                </div>
		 <div class="form-group">
                  <label for="lot" class="col-sm-3 control-label">Lot</label>
                  <div class="col-sm-2">
                    <input name="lot" type="text" class="form-control" id="lot" placeholder="Lot" 
                    value="<?php if($cek>0){echo $rcek[lot];}else{echo $lotno;} ?>" readonly="readonly" >
                  </div>				   
                </div>
		 <?php } ?>
	 </div>
	
</div>	 
   <div class="box-footer"> 
	<button type="submit" value="cari" class="btn btn-danger">Cari Data</button>
   </div>
    <!-- /.box-footer -->
  




</div>
</form>

<?php if($cek1>0){ ?>
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Result.
            <small class="pull-right">Date: <?php echo $rcek1[tgl_buat];?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <strong>PHYSICAL</strong>
			<hr>			
          <div class="table-responsive">
            <table class="table">
			  <?php if($rcek1[flamability]!=""){?>	
              <tr>
                <th colspan="2" style="width:50%">Flamability</th>
                <td colspan="6"><?php echo $rcek1[flamability];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[fc_cott]!="" or $rcek1[fc_poly]!="" or $rcek1[fc_elastane]!=""){?>	
              <tr>
                <th colspan="2">Fiber Content</th>
                <td colspan="6"><?php echo $rcek1[fc_cott];?> % Cott <?php echo $rcek1[fc_poly];?> % Poly  <?php echo $rcek1[fc_elastane];?> % Ela</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[fc_wpi]!="" or $rcek1[fc_cpi]!=""){?>	
              <tr>
                <th colspan="2">Fabric Count</th>
                <td colspan="6">W: <?php echo $rcek1[fc_wpi];?> C: <?php echo $rcek1[fc_cpi];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[f_weight]!=""){?>	
              <tr>
                <th colspan="2">Fabric Weight</th>
                <td colspan="6"><?php echo $rcek1[f_weight];?></td>
              </tr>
			  <?php } ?>	
			  <?php if($rcek1[f_width]!=""){?>	
              <tr>
                <th colspan="2">Fabric Width</th>
                <td colspan="6"><?php echo $rcek1[f_width];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[bow]!="" or $rcek1[skew]!=""){?>	
              <tr>
                <th colspan="2">Bow &amp; Skew</th>
                <td colspan="6"><?php echo $rcek1[bow];?> &amp; <?php echo $rcek1[skew];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[shrinkage_l1]!="" or $rcek1[shrinkage_l2]!="" or $rcek1[shrinkage_l3]!="" or $rcek1[shrinkage_l4]!=""){?>	
              <tr>
                <th colspan="2">Shrinkage Length</th>
                <td><?php echo $rcek1[shrinkage_l1];?></td>
                <td><?php echo $rcek1[shrinkage_l2];?></td>
                <td><?php echo $rcek1[shrinkage_l3];?></td>
                <td><?php echo $rcek1[shrinkage_l4];?></td>
                <td><?php echo $rcek1[shrinkage_l5];?></td>
                <td><?php echo $rcek1[shrinkage_l6];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[shrinkage_w1]!="" or $rcek1[shrinkage_w2]!="" or $rcek1[shrinkage_w3]!="" or $rcek1[shrinkage_w4]!=""){?>	
              <tr>
                <th colspan="2">Shrinkage Width</th>
                <td><?php echo $rcek1[shrinkage_w1];?></td>
                <td><?php echo $rcek1[shrinkage_w2];?></td>
                <td><?php echo $rcek1[shrinkage_w3];?></td>
                <td><?php echo $rcek1[shrinkage_w4];?></td>
                <td><?php echo $rcek1[shrinkage_w5];?></td>
                <td><?php echo $rcek1[shrinkage_w6];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[spirality1]!="" or $rcek1[spirality2]!="" or $rcek1[spirality3]!="" or $rcek1[spirality4]!=""){?>		
              <tr>
                <th colspan="2">Spirality</th>
                <td><?php echo $rcek1[spirality1];?></td>
                <td><?php echo $rcek1[spirality2];?></td>
                <td><?php echo $rcek1[spirality3];?></td>
                <td><?php echo $rcek1[spirality4];?></td>
                <td><?php echo $rcek1[spirality5];?></td>
                <td><?php echo $rcek1[spirality6];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[pm_f1]!="" or $rcek1[pm_f2]!="" or $rcek1[pm_f3]!="" or $rcek1[pm_f4]!="" or $rcek1[pm_f5]!=""){?>	
              <tr>
                <th rowspan="2">Pilling Martindle</th>
                <th>Face</th>
                <td><?php echo $rcek1[pm_f1];?></td>
                <td><?php echo $rcek1[pm_f2];?></td>
                <td><?php echo $rcek1[pm_f3];?></td>
                <td><?php echo $rcek1[pm_f4];?></td>
                <td><?php echo $rcek1[pm_f5];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[pm_b1]!="" or $rcek1[pm_b2]!="" or $rcek1[pm_b3]!="" or $rcek1[pm_b4]!="" or $rcek1[pm_b5]!=""){?>	
              <tr>
                <th>Back</th>
                <td><?php echo $rcek1[pm_b1];?></td>
                <td><?php echo $rcek1[pm_b2];?></td>
                <td><?php echo $rcek1[pm_b3];?></td>
                <td><?php echo $rcek1[pm_b4];?></td>
                <td><?php echo $rcek1[pm_b5];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>	
			  <?php if($rcek1[pb_f1]!="" or $rcek1[pb_f2]!="" or $rcek1[pb_f3]!="" or $rcek1[pb_f4]!="" or $rcek1[pb_f5]!=""){?>	
              <tr>
                <th rowspan="2">Pilling Box</th>
                <th>Face</th>
                <td><?php echo $rcek1[pb_f1];?></td>
                <td><?php echo $rcek1[pb_f2];?></td>
                <td><?php echo $rcek1[pb_f3];?></td>
                <td><?php echo $rcek1[pb_f4];?></td>
                <td><?php echo $rcek1[pb_f5];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[pb_b1]!="" or $rcek1[pb_b2]!="" or $rcek1[pb_b3]!="" or $rcek1[pb_b4]!="" or $rcek1[pb_b5]!=""){?>	
              <tr>
                <th>Back</th>
                <td><?php echo $rcek1[pb_b1];?></td>
                <td><?php echo $rcek1[pb_b2];?></td>
                <td><?php echo $rcek1[pb_b3];?></td>
                <td><?php echo $rcek1[pb_b4];?></td>
                <td><?php echo $rcek1[pb_b5];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[prt_f1]!="" or $rcek1[prt_f2]!="" or $rcek1[prt_f3]!="" or $rcek1[prt_f4]!="" or $rcek1[prt_f5]!=""){?>	
              <tr>
                <th rowspan="2">Pilling Random Tumbler</th>
                <th>Face</th>
                <td><?php echo $rcek1[prt_f1];?></td>
                <td><?php echo $rcek1[prt_f2];?></td>
                <td><?php echo $rcek1[prt_f3];?></td>
                <td><?php echo $rcek1[prt_f4];?></td>
                <td><?php echo $rcek1[prt_f5];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[prt_b1]!="" or $rcek1[prt_b2]!="" or $rcek1[prt_b3]!="" or $rcek1[prt_b4]!="" or $rcek1[prt_b5]!=""){?>	
              <tr>
                <th>Back</th>
                <td><?php echo $rcek1[prt_b1];?></td>
                <td><?php echo $rcek1[prt_b2];?></td>
                <td><?php echo $rcek1[prt_b3];?></td>
                <td><?php echo $rcek1[prt_b4];?></td>
                <td><?php echo $rcek1[prt_b5];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[abration]!=""){?>	
              <tr>
                <th colspan="2">Abration</th>
                <td colspan="6"><?php echo $rcek1[abration];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[sm_l1]!="" or $rcek1[sm_l2]!="" or $rcek1[sm_l3]!="" or $rcek1[sm_l4]!=""){?>	
              <tr>
                <th rowspan="2">Snagging Mace</th>
                <th>Len</th>
                <td><?php echo $rcek1[sm_l1];?></td>
                <td><?php echo $rcek1[sm_l2];?></td>
                <td><?php echo $rcek1[sm_l3];?></td>
                <td><?php echo $rcek1[sm_l4];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[sm_w1]!="" or $rcek1[sm_w2]!="" or $rcek1[sm_w3]!="" or $rcek1[sm_w4]!=""){?>	
              <tr>
                <th>Wid</th>
                <td><?php echo $rcek1[sm_w1];?></td>
                <td><?php echo $rcek1[sm_w2];?></td>
                <td><?php echo $rcek1[sm_w3];?></td>
                <td><?php echo $rcek1[sm_w4];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[sp_grdl1]!="" or $rcek1[sp_clsl1]!="" or $rcek1[sp_shol1]!="" or $rcek1[sp_medl1]!="" or $rcek1[sp_lonl1]!="" or $rcek1[sp_grdl2]!="" or $rcek1[sp_clsl2]!="" or $rcek1[sp_shol2]!="" or $rcek1[sp_medl2]!="" or $rcek1[sp_lonl2]!="" or $rcek1[sp_grdw1]!="" or $rcek1[sp_clsw1]!="" or $rcek1[sp_show1]!="" or $rcek1[sp_medw1]!="" or $rcek1[sp_lonw1]!="" or $rcek1[sp_grdw2]!="" or $rcek1[sp_clsw2]!="" or $rcek1[sp_show2]!="" or $rcek1[sp_medw2]!="" or $rcek1[sp_lonw2]!=""){
				if($rcek1[sp_grdl1]!="" or $rcek1[sp_clsl1]!="" or $rcek1[sp_shol1]!="" or $rcek1[sp_medl1]!="" or $rcek1[sp_lonl1]!=""){$rp1="1";}else{$rp1="0";}
				if($rcek1[sp_grdl2]!="" or $rcek1[sp_clsl2]!="" or $rcek1[sp_shol2]!="" or $rcek1[sp_medl2]!="" or $rcek1[sp_lonl2]!=""){$rp2="1";}else{$rp2="0";}
				if($rcek1[sp_grdw1]!="" or $rcek1[sp_clsw1]!="" or $rcek1[sp_show1]!="" or $rcek1[sp_medw1]!="" or $rcek1[sp_lonw1]!=""){$rp3="1";}else{$rp3="0";}
				if($rcek1[sp_grdw2]!="" or $rcek1[sp_clsw2]!="" or $rcek1[sp_show2]!="" or $rcek1[sp_medw2]!="" or $rcek1[sp_lonw2]!=""){$rp4="1";}else{$rp4="0";}
				$rowspan=$rp1+$rp2+$rp3+$rp4+1;
				?>	
              <tr>
                <th rowspan="<?php echo $rowspan; ?>">Snagging POD</th>
                <th>Srt</th>
                <th>Grd</th>
                <th>Cls</th>
                <th>Sho</th>
                <th>Med</th>
                <th>Long</th>
                <th>&nbsp;</th>
			  </tr>
			  <?php } ?>	
			  <?php if($rcek1[sp_grdl1]!="" or $rcek1[sp_clsl1]!="" or $rcek1[sp_shol1]!="" or $rcek1[sp_medl1]!="" or $rcek1[sp_lonl1]!=""){?>	
              <tr>
                <th>L1</th>
                <td><?php echo $rcek1[sp_grdl1];?></td>
                <td><?php echo $rcek1[sp_clsl1];?></td>
                <td><?php echo $rcek1[sp_shol1];?></td>
                <td><?php echo $rcek1[sp_medl1];?></td>
                <td><?php echo $rcek1[sp_lonl1];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>	
			  <?php if($rcek1[sp_grdl2]!="" or $rcek1[sp_clsl2]!="" or $rcek1[sp_shol2]!="" or $rcek1[sp_medl2]!="" or $rcek1[sp_lonl2]!=""){?>		
              <tr>
                <th>L2</th>
                <td><?php echo $rcek1[sp_grdl2];?></td>
                <td><?php echo $rcek1[sp_clsl2];?></td>
                <td><?php echo $rcek1[sp_shol2];?></td>
                <td><?php echo $rcek1[sp_medl2];?></td>
                <td><?php echo $rcek1[sp_lonl2];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>	
			  <?php if($rcek1[sp_clsw1]!="" or $rcek1[sp_show1]!="" or $rcek1[sp_medw1]!="" or $rcek1[sp_lonw1]!=""){?>		
              <tr>
                <th>W1</th>
                <td><?php echo $rcek1[sp_grdw1];?></td>
                <td><?php echo $rcek1[sp_clsw1];?></td>
                <td><?php echo $rcek1[sp_show1];?></td>
                <td><?php echo $rcek1[sp_medw1];?></td>
                <td><?php echo $rcek1[sp_lonw1];?></td>
                <td>&nbsp;</td>
              </tr>
			   <?php } ?>	
			  <?php if($rcek1[sp_clsw2]!="" or $rcek1[sp_show2]!="" or $rcek1[sp_medw2]!="" or $rcek1[sp_lonw2]!=""){?>	
              <tr>
                <th>W2</th>
                <td><?php echo $rcek1[sp_grdw2];?></td>
                <td><?php echo $rcek1[sp_clsw2];?></td>
                <td><?php echo $rcek1[sp_show2];?></td>
                <td><?php echo $rcek1[sp_medw2];?></td>
                <td><?php echo $rcek1[sp_lonw2];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[sb_l1]!="" or $rcek1[sb_l1]!="" or $rcek1[sb_l1]!="" or $rcek1[sb_l1]!=""){?>	
              <tr>
                <th rowspan="2">Snagging Box</th>
                <th>Len</th>
                <td><?php echo $rcek1[sb_l1];?></td>
                <td><?php echo $rcek1[sb_l2];?></td>
                <td><?php echo $rcek1[sb_l3];?></td>
                <td><?php echo $rcek1[sb_l4];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[sb_w1]!="" or $rcek1[sb_w1]!="" or $rcek1[sb_w1]!="" or $rcek1[sb_w1]!=""){?>	
              <tr>
                <th>Wid</th>
                <td><?php echo $rcek1[sb_w1];?></td>
                <td><?php echo $rcek1[sb_w2];?></td>
                <td><?php echo $rcek1[sb_w3];?></td>
                <td><?php echo $rcek1[sb_w4];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[bs_instron]!="" or $rcek1[bs_mullen]!="" or $rcek1[bs_tru]!=""){?>	
              <tr>
                <th colspan="2">Bursting Strength</th>
                <td><?php echo $rcek1[bs_instron];?></td>
                <td><?php echo $rcek1[bs_mullen];?></td>
                <td colspan="4"><?php echo $rcek1[bs_tru];?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[thick1]!="" or $rcek1[thick2]!="" or $rcek1[thick3]!="" or $rcek1[thickav]!=""){?>	
              <tr>
                <th colspan="2">Thickness</th>
                <td><?php echo $rcek1[thick1];?></td>
                <td><?php echo $rcek1[thick2];?></td>
                <td><?php echo $rcek1[thick3];?></td>
                <td><?php echo $rcek1[thickav];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[stretch_l1]!="" or $rcek1[stretch_l2]!="" or $rcek1[stretch_l3]!="" or $rcek1[stretch_l4]!="" or $rcek1[stretch_l5]!=""){?>	
              <tr>
                <th rowspan="2">Stretch</th>
                <th>Len</th>
                <td><?php echo $rcek1[stretch_l1];?></td>
                <td><?php echo $rcek1[stretch_l2];?></td>
                <td><?php echo $rcek1[stretch_l3];?></td>
                <td><?php echo $rcek1[stretch_l4];?></td>
                <td><?php echo $rcek1[stretch_l5];?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th>Wid</th>
                <td><?php echo $rcek1[stretch_w1];?></td>
                <td><?php echo $rcek1[stretch_w2];?></td>
                <td><?php echo $rcek1[stretch_w3];?></td>
                <td><?php echo $rcek1[stretch_w4];?></td>
                <td><?php echo $rcek1[stretch_w5];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[recover_l1]!="" or $rcek1[recover_l2]!="" or $rcek1[recover_l3]!="" or $rcek1[recover_l4]!="" or $rcek1[recover_l5]!=""){?>	
              <tr>
                <th rowspan="2">Recovery</th>
                <th>Len</th>
                <td><?php echo $rcek1[recover_l1];?></td>
                <td><?php echo $rcek1[recover_l2];?></td>
                <td><?php echo $rcek1[recover_l3];?></td>
                <td><?php echo $rcek1[recover_l4];?></td>
                <td><?php echo $rcek1[recover_l5];?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th>Wid</th>
                <td><?php echo $rcek1[recover_w1];?></td>
                <td><?php echo $rcek1[recover_w2];?></td>
                <td><?php echo $rcek1[recover_w3];?></td>
                <td><?php echo $rcek1[recover_w4];?></td>
                <td><?php echo $rcek1[recover_w5];?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[growth_l1]!="" or $rcek1[growth_l2]!=""){?>	
              <tr>
                <th rowspan="2">Growth</th>
                <th>Len</th>
                <td><?php echo $rcek1[growth_l1];?></td>
                <td><?php echo $rcek1[growth_l2];?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <th>Wid</th>
                <td><?php echo $rcek1[growth_w1];?></td>
                <td><?php echo $rcek1[growth_w2];?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1[apper_ch1]!="" or $rcek1[apper_ch2]!="" or $rcek1[apper_ch3]!=""){?>	
              <tr>
                <th rowspan="4">Apperance</th>
                <th>&nbsp;</th>
                <td><?php echo $rcek1[apper_ch1];?></td>
                <td><?php echo $rcek1[apper_ch2];?></td>
                <td colspan="4"><?php echo $rcek1[apper_ch3];?></td>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td colspan="6"><?php echo $rcek1[apper_st];?></td>
              </tr>
              <tr>
                <th>Face</th>
                <td><?php echo $rcek1[apper_pf1];?></td>
                <td><?php echo $rcek1[apper_pf2];?></td>
                <td colspan="4"><?php echo $rcek1[apper_pf3];?></td>
              </tr>
              <tr>
                <th>Back</th>
                <td><?php echo $rcek1[apper_pb1];?></td>
                <td><?php echo $rcek1[apper_pb2];?></td>
                <td colspan="4"><?php echo $rcek1[apper_pb3];?></td>
              </tr>
			  <?php } ?>	
            </table>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <strong>FUNCTIONAL</strong>
		  <hr>
		  <table class="table">
		    <?php if($rcek1[wick_l1]!="" or $rcek1[wick_l2]!="" or $rcek1[wick_l3]!="" or $rcek1[wick_w1]!="" or $rcek1[wick_w2]!="" or $rcek1[wick_w3]!=""){?>
		    <tr>
		      <th rowspan="2" style="width:50%">Vertical Wicking</th>
		      <th>Len</th>
		      <td><?php echo $rcek1[wick_l1];?></td>
		      <td><?php echo $rcek1[wick_l2];?></td>
		      <td colspan="2"><?php echo $rcek1[wick_l3];?></td>
	        </tr>
		    <tr>
		      <th >Wid</th>
		      <td><?php echo $rcek1[wick_w1];?></td>
		      <td><?php echo $rcek1[wick_w2];?></td>
		      <td colspan="2"><?php echo $rcek1[wick_w3];?></td>
	        </tr>
		    <?php } ?>
		    <?php if($rcek1[absor_f1]!="" or $rcek1[absor_f2]!="" or $rcek1[absor_f3]!="" or $rcek1[absor_b1]!="" or $rcek1[absor_b2]!="" or $rcek1[absor_b3]!=""){?>
		    <tr>
		      <th rowspan="2">Absorbency</th>
		      <th>Face</th>
		      <td><?php echo $rcek1[absor_f1];?></td>
		      <td><?php echo $rcek1[absor_f2];?></td>
		      <td colspan="2"><?php echo $rcek1[absor_f3];?></td>
	        </tr>
		    <tr>
		      <th>Back</th>
		      <td><?php echo $rcek1[absor_b1];?></td>
		      <td><?php echo $rcek1[absor_b2];?></td>
		      <td colspan="2"><?php echo $rcek1[absor_b3];?></td>
	        </tr>
		    <?php } ?>
		    <?php if($rcek1[dry1]!="" or $rcek1[dry2]!="" or $rcek1[dry3]!=""){?>
		    <tr>
		      <th colspan="2">Drying Time</th>
		      <td><?php echo $rcek1[dry1];?></td>
		      <td><?php echo $rcek1[dry2];?></td>
		      <td colspan="2"><?php echo $rcek1[dry3];?></td>
	        </tr>
		    <?php } ?>
		    <?php if($rcek1[repp1]!="" or $rcek1[repp2]!="" or $rcek1[repp3]!="" or $rcek1[repp4]!=""){?>
		    <tr>
		      <th colspan="2">Water Reppelent</th>
		      <td><?php echo $rcek1[repp1];?></td>
		      <td><?php echo $rcek1[repp2];?></td>
		      <td><?php echo $rcek1[repp3];?></td>
		      <td><?php echo $rcek1[repp4];?></td>
	        </tr>
		    <?php } ?>
		    <?php if($rcek1[ph]!=""){?>
		    <tr>
		      <th colspan="2">Ph</th>
		      <td colspan="4"><?php echo $rcek1[ph];?></td>
	        </tr>
		    <?php } ?>
	      </table>
		  <address>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
		  <strong>COLORFASTNESS</strong>
		  <hr>
		  <address>
            
          </address> 
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
  <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-12">
          <p class="lead">Note: </p>    
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            <?php echo trim($rcek1[note_g]);?>
          </p>
        </div>  
        <!-- /.col -->
      </div>
      <!-- /.row --><!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="pages/cetak/cetak_result.php?idkk=<?php echo $rcek[id];?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        </div>
  </div>
</section>						
       <?php } ?>             
				  </div>
                </div>
            </div>
        </div>
<!-- Modal -->
<div class="modal fade modal-3d-slit" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width:90%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Data Kain Masuk</h4>

			</div>
			<div class="modal-body">
				<table id="lookup" class="table table-bordered table-hover table-striped" width="100%">
					<thead>
						<tr>
							<th width="5%">No</th>
							<th width="10%">No Order</th>
							<th width="14%">No KK</th>
							<th width="41%">Jenis Kain</th>
							<th width="22%">Lot</th>
							<th width="8%">No Hanger</th>
							<th width="8%">No Item</th>
							<th width="8%">No Test</th>
						</tr>
					</thead>
					<tbody>
						<?php
                                //Data ditampilkan ke tabel
                                $sql = mysql_query("SELECT a.* FROM tbl_tq_nokk a INNER JOIN tbl_tq_test b ON a.id=b.id_nokk ");
                                $no="1";
                                while ($r = mysql_fetch_array($sql)) {
                                    ?>
						<tr class="pilih-kk" data-kk="<?php echo $r['nokk']; ?>">
							<td align="center">
								<?php echo $no; ?>
							</td>
							<td align="center">
								<?php echo $r['no_order']; ?>
							</td>
							<td align="center">
								<?php echo $r['nokk']; ?>
							</td>
							<td>
								<?php echo $r['jenis_kain']; ?>
							</td>
							<td align="center">
								<?php echo $r['lot']; ?>
							</td>
							<td align="right">
								<?php echo $r['no_hanger']; ?>
							</td>
							<td align="center">
								<?php echo $r['no_item']; ?>
							</td>
							<td align="center">
								<?php echo $r['no_test']; ?>
							</td>
						</tr>
						<?php
                                    $no++;
                                }
                                ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>