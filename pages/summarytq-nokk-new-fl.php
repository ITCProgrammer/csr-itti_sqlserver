<?php
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";
$nodemand=$_GET['nodemand'];
$no_test=$_GET['no_test'];
$qry=mysqli_query($con,"SELECT a.*, a.id AS idkk, b.* From tbl_tq_first_lot a INNER JOIN tbl_master_test b ON a.no_test=b.no_testmaster WHERE IF(`nodemand_new` != '', `nodemand_new`, `nodemand`) =  '$nodemand' ORDER BY a.id DESC LIMIT 1");
$cekd=mysqli_num_rows($qry); 
$rd=mysqli_fetch_array($qry);
?>	
<?php 
$sqlCek1=mysqli_query($con,"SELECT *,
	CONCAT_WS(' ',fc_note,ph_note, abr_note, bas_note, dry_note, fla_note, fwe_note, fwi_note, burs_note,repp_note,wick_note,wick_note,absor_note,apper_note,fiber_note,pillb_note,pillm_note,pillr_note,thick_note,growth_note,recover_note,stretch_note,sns_note,snab_note,snam_note,snap_note,wash_note,water_note,acid_note,alkaline_note,crock_note,phenolic_note,cm_printing_note,cm_dye_note,light_note,light_pers_note,saliva_note,h_shrinkage_note,fibre_note,pilll_note,soil_note,apperss_note,bleeding_note,chlorin_note,dye_tf_note,humidity_note,odour_note,curling_note) AS note_g FROM tbl_tq_test_fl WHERE id_nokk='$rd[idkk]' ORDER BY id DESC LIMIT 1");
$cek1=mysqli_num_rows($sqlCek1);
$rcek1=mysqli_fetch_array($sqlCek1);
$sqlCekR=mysqli_query($con,"SELECT *,
	CONCAT_WS(' ',rfc_note,rph_note, rabr_note, rbas_note, rdry_note, rfla_note, rfwe_note, rfwi_note, rburs_note,rrepp_note,rwick_note,rabsor_note,rapper_note,rfiber_note,rpillb_note,rpillm_note,rpillr_note,rthick_note,rgrowth_note,rrecover_note,rstretch_note,rsns_note,rsnab_note,rsnam_note,rsnap_note,rwash_note,rwater_note,racid_note,ralkaline_note,rcrock_note,rphenolic_note,rcm_printing_note,rcm_dye_note,rlight_note,rlight_pers_note,rsaliva_note,rh_shrinkage_note,rfibre_note,rpilll_note,rsoil_note,rapperss_note,rbleeding_note,rchlorin_note,rdye_tf_note,rhumidity_note,rodour_note,rcurling_note) AS rnote_g FROM tbl_tq_randomtest WHERE no_item='$rd[no_item]' OR no_hanger='$rd[no_hanger]'");
$cekR=mysqli_num_rows($sqlCekR);
$rcekR=mysqli_fetch_array($sqlCekR);
$sqlCekD=mysqli_query($con,"SELECT *,
	CONCAT_WS(' ',dfc_note,dph_note, dabr_note, dbas_note, ddry_note, dfla_note, dfwe_note, dfwi_note, dburs_note,drepp_note,dwick_note,dabsor_note,dapper_note,dfiber_note,dpillb_note,dpillm_note,dpillr_note,dthick_note,dgrowth_note,drecover_note,dstretch_note,dsns_note,dsnab_note,dsnam_note,dsnap_note,dwash_note,dwater_note,dacid_note,dalkaline_note,dcrock_note,dphenolic_note,dcm_printing_note,dcm_dye_note,dlight_note,dlight_pers_note,dsaliva_note,dh_shrinkage_note,dfibre_note,dpilll_note,dsoil_note,dapperss_note,dbleeding_note,dchlorin_note,ddye_tf_note,dhumidity_note,dodour_note,dcurling_note) AS dnote_g FROM tbl_tq_disptest_fl WHERE id_nokk='$rd[idkk]' ORDER BY id DESC LIMIT 1");
$cekD=mysqli_num_rows($sqlCekD);
$rcekD=mysqli_fetch_array($sqlCekD);
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form0" id="form0">
<div class="box box-info" style="width: 98%;">
    <div class="box-header with-border">
        <h3 class="box-title">Summary Test Quality</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-minus"></i></button>
        </div>
    </div>
    <script>
				function handleChange() {
					var input = document.getElementById("no_test");
					var modifiedValue = input.value.replaceAll("/", "00000").replaceAll(" ", "77777");
					window.location = "SummaryTQNewFL-" + modifiedValue;
				}
			</script>

    <div class="box-body"> 
        <div class="col-md-6">
            <div class="form-group">
                <label for="no_test" class="col-sm-3 control-label">No Report FL</label>
                <div class="col-sm-8">
                    <input name="no_test" type="text" class="form-control" id="no_test" onchange="handleChange()" 
                    value="<?php if($cekd>0){echo $rd['no_report_fl'];}else {echo $_GET['no_test'];}?>" placeholder="No Test" required>
                </div>
            </div> 
            <div class="form-group">
                <label for="nodemand" class="col-sm-3 control-label">No Demand</label>
                <div class="col-sm-8">
                    <input name="nodemand" type="text" class="form-control" id="nodemand" placeholder="No Demand" value="<?php echo $_GET['nodemand'];?>" onchange="window.location='SummaryTQNokkNewFL-'+this.value" required>
                </div>				   
            </div>
            <?php if($rd['nodemand_new']!=''){?>
			<div class="form-group">
				<label for="nodemand_old" class="col-sm-3 control-label">No Demand Old</label>
					<div class="col-sm-5">
						<input name="nodemand_old" type="text" class="form-control" id="nodemand_old" placeholder="No Demand Old"
						value="<?php if($rd['nodemand_new']!=''){echo $rd['nodemand'];} ?>" readonly="readonly" >
					</div>
            </div>
			<?php } ?>
            <div class="form-group">
                <label for="buyer" class="col-sm-3 control-label">Buyer</label>
                <div class="col-sm-8">
                    <input name="buyer" type="text" class="form-control" id="buyer" placeholder="Buyer" value="<?php echo $rd['pelanggan'];?>" readonly="readonly">
                </div>
            </div> 
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="jenis_kain" class="col-sm-3 control-label">Jenis Kain</label>
                <div class="col-sm-8">
                    <input name="jenis_kain" type="text" class="form-control" id="jenis_kain" placeholder="Jenis Kain" value="<?php echo $rd['jenis_kain'];?>" readonly="readonly">
                </div>
            </div> 
            <div class="form-group">
                <label for="warna" class="col-sm-3 control-label">Warna</label>
                <div class="col-sm-8">
                    <input name="warna" type="text" class="form-control" id="warna" placeholder="Warna" value="<?php echo $rd['warna'];?>" readonly="readonly">
                </div>
            </div>
            <div class="form-group">
                <label for="no_report_fl" class="col-sm-3 control-label">No Report FL</label>
                <div class="col-sm-8">
                    <input name="no_report_fl" type="text" class="form-control" placeholder="No Report FL" value="<?php echo $rd['no_report_fl'];?>"  readonly="readonly">
                </div>
            </div>
            <!--
            <div class="form-group">
                <label for="masterbuyer" class="col-sm-3 control-label">Master Buyer</label>
                <div class="col-sm-8">
                    <input name="masterbuyer" type="text" class="form-control" id="masterbuyer" placeholder="Master Buyer" value="<?php echo $rd['buyer'];?>" readonly="readonly">
                </div>
            </div>-->
        </div>
    </div>	 
   <!--<div class="box-footer"> 
	<button type="submit" value="cari" class="btn btn-danger">Cari Data</button>
   </div>-->
    <!-- /.box-footer -->
</div>
</form>
<div class="row">
      <div class="col-md-6">
            <div class="box">
              <div class="box-header">
                <small class="pull-right">Date: <?php echo $rcek1['tgl_buat'];?></small>
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover table-striped" width="100%"> 
                        <thead class="bg-blue">
                            <tr>
                                <th width="24"><div align="center">Nama Test</div></th>
                                <th width="24"><div align="center">Status Test</div></th>
                                <th width="80"><div align="center">Note</div></th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                $sql = "SELECT a.*, b.*, c.* From tbl_tq_first_lot a 
                                INNER JOIN tbl_master_test b ON a.no_test=b.no_testmaster
                                INNER JOIN tbl_tq_test_fl c ON a.id=c.id_nokk
                                WHERE nodemand='$nodemand'";
                                $result=mysqli_query($con,$sql); 
                                $no="1";
                                while($row=mysqli_fetch_array($result)){ 
                                $detail=explode(",",$row['physical']);
                                $detail2=explode(",",$row['functional']);
                                $detail3=explode(",",$row['colorfastness']);
                                ?>
                            <?php if(in_array("FLAMMABILITY",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("FLAMMABILITY",$detail)){echo "FLAMMABILITY";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_fla']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_fla']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_fla']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_fla']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_fla']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_fla']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['fla_note']!=""){echo $row['fla_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("FIBER CONTENT",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("FIBER CONTENT",$detail)){echo "FIBER CONTENT";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_fib']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_fib']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_fib']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_fib']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_fib']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_fib']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['fiber_note']!=""){echo $row['fiber_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("FABRIC COUNT",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("FABRIC COUNT",$detail)){echo "FABRIC COUNT";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_fc']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_fc']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_fc']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_fc']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_fc']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_fc']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?> 
                                </td>
                                <td align="center" ><?php if($row['fc_note']!=""){echo $row['fc_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("BOW & SKEW",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("BOW & SKEW",$detail)){echo "BOW & SKEW";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_bsk']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_bsk']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_bsk']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_bsk']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_bsk']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_bsk']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?> 
                                </td>
                                <td align="center" ><?php if($row['bas_note']!=""){echo $row['bas_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("PILLING MARTINDLE",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("PILLING MARTINDLE",$detail)){echo "PILLING MARTINDLE";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_pm']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_pm']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_pm']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_pm']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span>   
                                <?php }else if($row['stat_pm']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_pm']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_pm']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_pm']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?> 
                                </td>
                                <td align="center" ><?php if($row['pillm_note']!=""){echo $row['pillm_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("PILLING LOCUS",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("PILLING LOCUS",$detail)){echo "PILLING LOCUS";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_pl']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_pl']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_pl']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_pl']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_pl']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_pl']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?> 
                                </td>
                                <td align="center" ><?php if($row['pilll_note']!=""){echo $row['pilll_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY",$detail)){echo "FABRIC WEIGHT";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_fwss2']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_fwss2']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_fwss2']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_fwss2']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span>  
                                <?php }else if($row['stat_fwss2']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_fwss2']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_fwss2']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_fwss2']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?> 
                                </td>
                                <td align="center" ><?php if($row['fwe_note']!=""){echo $row['fwe_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY",$detail)){echo "FABRIC WIDTH";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_fwss3']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_fwss3']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_fwss3']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_fwss3']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span>    
                                <?php }else if($row['stat_fwss3']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_fwss3']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_fwss3']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_fwss3']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?> 
                                </td>
                                <td align="center" ><?php if($row['fwi_note']!=""){echo $row['fwi_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY",$detail)){echo "SHRINKAGE & SPIRALITY";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_fwss']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_fwss']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_fwss']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_fwss']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span>  
                                <?php }else if($row['stat_fwss']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_fwss']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_fwss']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_fwss']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?> 
                                </td>
                                <td align="center" ><?php if($row['sns_note']!=""){echo $row['sns_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("PILLING BOX",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("PILLING BOX",$detail)){echo "PILLING BOX";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_pb']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_pb']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_pb']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_pb']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_pb']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_pb']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['pillb_note']!=""){echo $row['pillb_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("PILLING RANDOM TUMBLER",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("PILLING RANDOM TUMBLER",$detail)){echo "PILLING RANDOM TUMBLER";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_prt']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_prt']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_prt']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_prt']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_prt']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_prt']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['pillr_note']!=""){echo $row['pillr_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("ABRATION",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("ABRATION",$detail)){echo "ABRATION";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_abr']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_abr']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_abr']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_abr']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_abr']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_abr']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?> 
                                </td>
                                <td align="center" ><?php if($row['abr_note']!=""){echo $row['abr_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("SNAGGING MACE",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("SNAGGING MACE",$detail)){echo "SNAGGING MACE";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_sm']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_sm']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_sm']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_sm']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_sm']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_sm']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['snam_note']!=""){echo $row['snam_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("SNAGGING POD",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("SNAGGING POD",$detail)){echo "SNAGGING POD";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_sp']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_sp']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_sp']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_sp']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_sp']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_sp']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?> 
                                </td>
                                <td align="center" ><?php if($row['snap_note']!=""){echo $row['snap_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("BEAN BAG",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("BEAN BAG",$detail)){echo "BEAN BAG";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_sb']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_sb']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_sb']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_sb']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_sb']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_sb']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?> 
                                </td>
                                <td align="center" ><?php if($row['snab_note']!=""){echo $row['snab_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if($row['bs_instron']!=""){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("BURSTING STRENGTH",$detail)){echo "BURSTING STRENGTH (INSTRON)";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_bs2']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_bs2']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_bs2']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_bs2']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span>   
                                <?php }else if($row['stat_bs2']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_bs2']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_bs2']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_bs2']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['burs_note']!=""){echo $row['burs_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if($row['bs_mullen']!=""){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("BURSTING STRENGTH",$detail)){echo "BURSTING STRENGTH (MULLEN)";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_bs3']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_bs3']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_bs3']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_bs3']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span>    
                                <?php }else if($row['stat_bs3']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_bs3']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_bs3']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_bs3']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['burs_note']!=""){echo $row['burs_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if($row['bs_tru']!=""){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("BURSTING STRENGTH",$detail)){echo "BURSTING STRENGTH (TRU)";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_bs']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_bs']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_bs']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_bs']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span> 
                                <?php }else if($row['stat_bs']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_bs']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_bs']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_bs']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?> 
                                </td>
                                <td align="center" ><?php if($row['burs_note']!=""){echo $row['burs_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("THICKNESS",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("THICKNESS",$detail)){echo "THICKNESS";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_th']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_th']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_th']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_th']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_th']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_th']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?> 
                                </td>
                                <td align="center" ><?php if($row['thick_note']!=""){echo $row['thick_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("STRETCH & RECOVERY",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("STRETCH & RECOVERY",$detail)){echo "STRETCH & RECOVERY";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_sr']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_sr']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_sr']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_sr']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span>  
                                <?php }else if($row['stat_sr']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_sr']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_sr']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_sr']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['stretch_note']!="" or $row['recover_note']!=""){echo $row['stretch_note']." ".$row['recover_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("GROWTH",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("GROWTH",$detail)){echo "GROWTH";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_gr']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_gr']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_gr']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_gr']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_gr']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_gr']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?> 
                                </td>
                                <td align="center" ><?php if($row['growth_note']!=""){echo $row['growth_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("APPEARANCE",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("APPEARANCE",$detail)){echo "APPEARANCE";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_ap']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_ap']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_ap']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_ap']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span>  
                                <?php }else if($row['stat_ap']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_ap']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_ap']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_ap']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['apper_note']!=""){echo $row['apper_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("HEAT SHRINKAGE",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("HEAT SHRINKAGE",$detail)){echo "HEAT SHRINKAGE";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_hs']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_hs']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_hs']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_hs']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_hs']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_hs']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?> 
                                </td>
                                <td align="center" ><?php if($row['h_shrinkage_note']!=""){echo $row['h_shrinkage_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("FIBRE/FUZZ",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("FIBRE/FUZZ",$detail)){echo "FIBRE/FUZZ";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_ff']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_ff']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_ff']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_ff']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_ff']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_ff']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['fibre_note']!=""){echo $row['fibre_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("ODOUR",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("ODOUR",$detail)){echo "ODOUR";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_odour']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_odour']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_odour']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_odour']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_odour']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_odour']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['odour_note']!=""){echo $row['odour_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("CURLING",$detail)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("CURLING",$detail)){echo "CURLING";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_curling']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_curling']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_curling']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_curling']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_curling']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_curling']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['curling_note']!=""){echo $row['curling_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("WICKING",$detail2)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("WICKING",$detail2)){echo "WICKING";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_wic']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_wic']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_wic']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_wic']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span>    
                                <?php }else if($row['stat_wic']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_wic']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_wic']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_wic']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['wick_note']!=""){echo $row['wick_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("ABSORBENCY",$detail2)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("ABSORBENCY",$detail2)){echo "ABSORBENCY";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_abs']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_abs']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_abs']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_abs']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_abs']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_abs']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['absor_note']!=""){echo $row['absor_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("DRYING TIME",$detail2)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("DRYING TIME",$detail2)){echo "DRYING TIME";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_dry']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_dry']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_dry']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_dry']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span>  
                                <?php }else if($row['stat_dry']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_dry']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_dry']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_dry']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['dry_note']!=""){echo $row['dry_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("WATER REPPELENT",$detail2)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("WATER REPPELENT",$detail2)){echo "WATER REPPELENT";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_wp']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_wp']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_wp']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_wp']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_wp']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_wp']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?> 
                                </td>
                                <td align="center" ><?php if($row['repp_note']!=""){echo $row['repp_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("PH",$detail2)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("PH",$detail2)){echo "PH";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_ph']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_ph']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_ph']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_ph']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span>   
                                <?php }else if($row['stat_ph']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_ph']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_ph']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_ph']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['ph_note']!=""){echo $row['ph_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("SOIL RELEASE",$detail2)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("SOIL RELEASE",$detail2)){echo "SOIL RELEASE";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_sor']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_sor']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_sor']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_sor']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_sor']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_sor']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['soil_note']!=""){echo $row['soil_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("HUMIDITY",$detail2)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("HUMIDITY",$detail2)){echo "HUMIDITY";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_hum']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_hum']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_hum']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_hum']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_hum']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_hum']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['humidity_note']!=""){echo $row['humidity_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("WASHING",$detail3)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("WASHING",$detail3)){echo "WASHING";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_wf']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_wf']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_wf']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_wf']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span> 
                                <?php }else if($row['stat_wf']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_wf']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_wf']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_wf']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['wash_note']!=""){echo $row['wash_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("PERSPIRATION ACID",$detail3)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("PERSPIRATION ACID",$detail3)){echo "PERSPIRATION ACID";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_pac']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_pac']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_pac']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_pac']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span>  
                                <?php }else if($row['stat_pac']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_pac']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_pac']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_pac']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['acid_note']!=""){echo $row['acid_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("PERSPIRATION ALKALINE",$detail3)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("PERSPIRATION ALKALINE",$detail3)){echo "PERSPIRATION ALKALINE";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_pal']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_pal']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_pal']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_pal']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span>   
                                <?php }else if($row['stat_pal']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_pal']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_pal']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_pal']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['alkaline_note']!=""){echo $row['alkaline_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("WATER",$detail3)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("WATER",$detail3)){echo "WATER";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_wtr']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_wtr']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_wtr']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_wtr']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span>  
                                <?php }else if($row['stat_wtr']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_wtr']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_wtr']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_wtr']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['water_note']!=""){echo $row['water_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("CROCKING",$detail3)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("CROCKING",$detail3)){echo "CROCKING";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_cr']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_cr']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_cr']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_cr']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span> 
                                <?php }else if($row['stat_cr']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_cr']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_cr']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_cr']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['crock_note']!=""){echo $row['crock_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("PHENOLIC YELLOWING",$detail3)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("PHENOLIC YELLOWING",$detail3)){echo "PHENOLIC YELLOWING";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_py']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_py']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_py']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_py']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span> 
                                <?php }else if($row['stat_py']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_py']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_py']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_py']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['phenolic_note']!=""){echo $row['phenolic_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("LIGHT",$detail3)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("LIGHT",$detail3)){echo "LIGHT";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_lg']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_lg']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_lg']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_lg']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_lg']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_lg']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['light_note']!=""){echo $row['light_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("COLOR MIGRATION-OVEN TEST",$detail3)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("COLOR MIGRATION-OVEN TEST",$detail3)){echo "COLOR MIGRATION-OVEN TEST";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_cmo']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_cmo']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_cmo']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_cmo']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_cmo']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_cmo']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['cm_printing_note']!=""){echo $row['cm_printing_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("COLOR MIGRATION",$detail3)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("COLOR MIGRATION",$detail3)){echo "COLOR MIGRATION";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_cm']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_cm']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_cm']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_cm']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_cm']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_cm']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?> 
                                </td>
                                <td align="center" ><?php if($row['cm_dye_note']!=""){echo $row['cm_dye_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("LIGHT PERSPIRATION",$detail3)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("LIGHT PERSPIRATION",$detail3)){echo "LIGHT PERSPIRATION";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_lp']=="DISPOSISI"){?> <span class='label bg-yellow blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_lp']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_lp']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_lp']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span>  
                                <?php }else if($row['stat_lp']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_lp']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_lp']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_lp']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['light_pers_note']!=""){echo $row['light_pers_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("SALIVA",$detail3)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("SALIVA",$detail3)){echo "SALIVA";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_slv']=="DISPOSISI"){?> <span class='label label-bg-red blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_slv']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_slv']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_slv']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_slv']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_slv']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['saliva_note']!=""){echo $row['saliva_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("BLEEDING",$detail3)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("BLEEDING",$detail3)){echo "BLEEDING";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_bld']=="DISPOSISI"){?> <span class='label label-bg-red blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_bld']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_bld']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_bld']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_bld']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_bld']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['bleeding_note']!=""){echo $row['bleeding_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("CHLORIN & NON-CHLORIN",$detail3)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("CHLORIN & NON-CHLORIN",$detail3)){echo "CHLORIN";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_chl']=="DISPOSISI"){?> <span class='label label-bg-red blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_chl']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_chl']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_chl']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_chl']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_chl']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['chlorin_note']!=""){echo $row['chlorin_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("CHLORIN & NON-CHLORIN",$detail3)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("CHLORIN & NON-CHLORIN",$detail3)){echo "NON-CHLORIN";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_nchl']=="DISPOSISI"){?> <span class='label label-bg-red blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_nchl']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span> 
                                <?php }else if($row['stat_nchl']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_nchl']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_nchl']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_nchl']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['chlorin_note']!=""){echo $row['chlorin_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php if(in_array("DYE TRANSFER",$detail3)){?>
                            <tr>
                                <td align="left" ><a href="Testing2New-<?php echo $row['nodemand'];?>-<?php echo $row['no_test'];?>" class="btn btn-info btn-xs <?php if($_SESSION['akses']=='biasa'){ echo "disabled"; }?>"><?php if(in_array("DYE TRANSFER",$detail3)){echo "DYE TRANSFER";} ?></a></td>
                                <td align="center" >
                                <?php if($row['stat_dye']=="DISPOSISI"){?> <span class='label label-bg-red blink_me'><?php echo "DISPOSISI"; ?></span> 
                                <?php }else if($row['stat_dye']=="FAIL"){?> <span class='label bg-red blink_me'><?php echo "FAIL"; ?></span>
                                <?php }else if($row['stat_dye']=="MARGINAL PASS"){?> <span class='label bg-purple'><?php echo "MARGINAL PASS"; ?></span> 
                                <?php }else if($row['stat_dye']=="DATA"){?> <span class='label bg-blue'><?php echo "DATA"; ?></span>  
                                <?php }else if($row['stat_dye']=="PASS"){?> <span class='label bg-green'><?php echo "PASS"; ?></span>
                                <?php }else if($row['stat_dye']=="R"){?> <span class='label bg-orange'><?php echo "R"; ?></span>
                                <?php }else if($row['stat_dye']=="RANDOM"){?> <span class='label bg-maroon'><?php echo "RANDOM"; ?></span>
                                <?php }else if($row['stat_dye']=="A"){?> <span class='label bg-teal'><?php echo "A"; ?></span> <?php } ?>
                                </td>
                                <td align="center" ><?php if($row['dye_tf_note']!=""){echo $row['dye_tf_note'];}?></td>
                            </tr>
                            <?php } ?>
                            <?php
                            #47 Test 
                            if(in_array("FLAMMABILITY",$detail) AND $row['stat_fla']!=""){$Fla="True";}else{$Fla="False";}
                            if(in_array("FIBER CONTENT",$detail) AND $row['stat_fib']!=""){$Fib="True";}else{$Fib="False";}
                            if(in_array("FABRIC COUNT",$detail) AND $row['stat_fc']!=""){$Fc="True";}else{$Fc="False";}
                            if(in_array("BOW & SKEW",$detail) AND $row['stat_bsk']!=""){$Bsk="True";}else{$Bsk="False";}
                            if(in_array("PILLING MARTINDLE",$detail) AND $row['stat_pm']!=""){$Pm="True";}else{$Pm="False";}
                            if(in_array("PILLING LOCUS",$detail) AND $row['stat_pl']!=""){$Pl="True";}else{$Pl="False";}
                            if(in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY",$detail) AND $row['stat_fwss2']!=""){$Fwss2="True";}else{$Fwss2="False";}
                            if(in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY",$detail) AND $row['stat_fwss3']!=""){$Fwss3="True";}else{$Fwss3="False";}
                            if(in_array("FABRIC WEIGHT & SHRINKAGE & SPIRALITY",$detail) AND $row['stat_fwss']!=""){$Fwss="True";}else{$Fwss="False";}
                            if(in_array("PILLING BOX",$detail) AND $row['stat_pb']!=""){$Pb="True";}else{$Pb="False";}
                            if(in_array("PILLING RANDOM TUMBLER",$detail) AND $row['stat_prt']!=""){$Prt="True";}else{$Prt="False";}
                            if(in_array("ABRATION",$detail) AND $row['stat_abr']!=""){$Abr="True";}else{$Abr="False";}
                            if(in_array("SNAGGING MACE",$detail) AND $row['stat_sm']!=""){$Sm="True";}else{$Sm="False";}
                            if(in_array("SNAGGING POD",$detail) AND $row['stat_sp']!=""){$Sp="True";}else{$Sp="False";}
                            if(in_array("BEAN BAG",$detail) AND $row['stat_sb']!=""){$Sb="True";}else{$Sb="False";}
                            if(in_array("BURSTING STRENGTH",$detail) AND $row['stat_bs2']!=""){$Bs2="True";}else{$Bs2="False";}
                            if(in_array("BURSTING STRENGTH",$detail) AND $row['stat_bs3']!=""){$Bs3="True";}else{$Bs3="False";}
                            if(in_array("BURSTING STRENGTH",$detail) AND $row['stat_bs']!=""){$Bs="True";}else{$Bs="False";}
                            if(in_array("THICKNESS",$detail) AND $row['stat_th']!=""){$Th="True";}else{$Th="False";}
                            if(in_array("STRETCH & RECOVERY",$detail) AND $row['stat_sr']!=""){$Sr="True";}else{$Sr="False";}
                            if(in_array("GROWTH",$detail) AND $row['stat_gr']!=""){$Gr="True";}else{$Gr="False";}
                            if(in_array("APPEARANCE",$detail) AND $row['stat_ap']!=""){$Ap="True";}else{$Ap="False";}
                            if(in_array("HEAT SHRINKAGE",$detail) AND $row['stat_hs']!=""){$Hs="True";}else{$Hs="False";}
                            if(in_array("FIBRE/FUZZ",$detail) AND $row['stat_ff']!=""){$Ff="True";}else{$Ff="False";}
                            if(in_array("ODOUR",$detail) AND $row['stat_odour']!=""){$Odo="True";}else{$Odo="False";}
                            if(in_array("WICKING",$detail2) AND $row['stat_wic']!=""){$Wic="True";}else{$Wic="False";}
                            if(in_array("ABSORBENCY",$detail2) AND $row['stat_abs']!=""){$Abs="True";}else{$Abs="False";}
                            if(in_array("DRYING TIME",$detail2) AND $row['stat_dry']!=""){$Dry="True";}else{$Dry="False";}
                            if(in_array("WATER REPPELENT",$detail2) AND $row['stat_wp']!=""){$Wp="True";}else{$Wp="False";}
                            if(in_array("PH",$detail2) AND $row['stat_ph']!=""){$Ph="True";}else{$Ph="False";}
                            if(in_array("SOIL RELEASE",$detail2) AND $row['stat_sor']!=""){$Sor="True";}else{$Sor="False";}
                            if(in_array("HUMIDITY",$detail2) AND $row['stat_hum']!=""){$Hum="True";}else{$Hum="False";}
                            if(in_array("WASHING",$detail3) AND $row['stat_wf']!=""){$Wf="True";}else{$Wf="False";}
                            if(in_array("PERSPIRATION ACID",$detail3) AND $row['stat_pac']!=""){$Pac="True";}else{$Pac="False";}
                            if(in_array("PERSPIRATION ALKALINE",$detail3) AND $row['stat_pal']!=""){$Pal="True";}else{$Pal="False";}
                            if(in_array("WATER",$detail3) AND $row['stat_wtr']!=""){$Wtr="True";}else{$Wtr="False";}
                            if(in_array("CROCKING",$detail3) AND $row['stat_cr']!=""){$Cr="True";}else{$Cr="False";}
                            if(in_array("PHENOLIC YELLOWING",$detail3) AND $row['stat_py']!=""){$Py="True";}else{$Py="False";}
                            if(in_array("LIGHT",$detail3) AND $row['stat_lg']!=""){$Lg="True";}else{$Lg="False";}
                            if(in_array("COLOR MIGRATION-OVEN TEST",$detail3) AND $row['stat_cmo']!=""){$Cmo="True";}else{$Cmo="False";}
                            if(in_array("COLOR MIGRATION",$detail3) AND $row['stat_cm']!=""){$Cm="True";}else{$Cm="False";}
                            if(in_array("LIGHT PERSPIRATION",$detail3) AND $row['stat_lp']!=""){$Lp="True";}else{$Lp="False";}
                            if(in_array("SALIVA",$detail3) AND $row['stat_slv']!=""){$Slv="True";}else{$Slv="False";}
                            if(in_array("BLEEDING",$detail3) AND $row['stat_bld']!=""){$Bld="True";}else{$Bld="False";}
                            if(in_array("CHLORIN & NON-CHLORIN",$detail3) AND $row['stat_chl']!=""){$Chl="True";}else{$Chl="False";}
                            if(in_array("CHLORIN & NON-CHLORIN",$detail3) AND $row['stat_nchl']!=""){$Nchl="True";}else{$Nchl="False";}
                            if(in_array("DYE TRANSFER",$detail3) AND $row['stat_dye']!=""){$Dye="True";}else{$Dye="False";}
                            } ?>
                        </tbody>
                    </table>
                  </div>
	            </div>
	          </div>
      </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <div class="box-body">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form4" id="form4">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="status" class="col-sm-4 control-label">SUMMARY STATUS TEST</label>
                            <div class="col-sm-5">
                            <select name="status" class="form-control select2" id="status" style="width: 100%;" <?php if($rcek1['status']!='' AND $_SESSION['nama1']!='Janu Dwi Laksono'){echo "disabled";}?>>
                                    <option <?php if($rcek1['status']==" "){?> selected=selected <?php };?>value=" ">Pilih</option>
                                    <option <?php if($rcek1['status']=="Pass"){?> selected=selected <?php };?>value="Pass">Pass</option>
                                    <option <?php if($rcek1['status']=="Fail"){?> selected=selected <?php };?>value="Fail">Fail</option>
                                    <option <?php if($rcek1['status']=="Ganti Kain"){?> selected=selected <?php };?>value="GantiKain">Ganti Kain</option>
                                    <option <?php if($rcek1['status']=="Treatment"){?> selected=selected <?php };?>value="Treatment">Treatment</option>
                                    <option <?php if($rcek1['status']=="DisposisiKirim"){?> selected=selected <?php };?>value="DisposisiKirim">Disposisi Kirim</option>
                                    <!--
                                    <option <?php if($rcek1['status']=="Approve"){?> selected=selected <?php };?>value="Approve">Approve</option>
                                    <option <?php if($rcek1['status']=="Conditional Approve"){?> selected=selected <?php };?>value="Conditional Approve">Conditional Approve</option>
                                    <option <?php if($rcek1['status']=="Limit Approve"){?> selected=selected <?php };?>value="Limit Approve">Limit Approve</option>
                                    <option <?php if($rcek1['status']=="Reject"){?> selected=selected <?php };?>value="Reject">Reject</option>
                                    <option <?php if($rcek1['status']=="Marginal Pass"){?> selected=selected <?php };?>value="Marginal Pass">Marginal Pass</option>
                                    -->
                                </select> 
                            </div>
                        </div>
                        <div class="form-group">
                                <label for="approve" class="col-sm-4 control-label">NOTE</label>
                                <div class="col-sm-5">
                                <textarea  name="note" rows="4" cols="50" class="form-control"  >
                                    <?=$rcek1['note']?>
                                </textarea>
                                </div>				   
                        </div>
                        <div class="form-group">
                                <label for="approve" class="col-sm-4 control-label">PENANGGUNG JAWAB FIRST LOT    </label>
                                <div class="col-sm-5">
                                    <input name="xxxxx" type="text" class="form-control" value="<?=$_SESSION['nama1']?>"  required disabled>
                                    <input name="penanggung_jawab_fl" type="hidden" class="form-control" value="<?=$_SESSION['nama1']?>" >
                                </div>				   
                        </div>
       
                        <div class="form-group">
                                <label for="no_previous_report" class="col-sm-4 control-label">No Previous Report</label>
                                <div class="col-sm-5">
                                    <input name="no_previous_report" type="text" class="form-control"  placeholder="No Previous Report"  value="<?=$rcek1['no_previous_report']?>" required  >
                                </div>				   
                        </div>
                        <div class="form-group">
                                <label for="tgl_previous_report" class="col-sm-4 control-label">Tanggal Previous Report</label>
                                <div class="col-sm-5">
                                    <input onchange="updateExpiredReport()"  id="tgl_previous_report" name="tgl_previous_report" type="date" class="form-control"  placeholder="Tanggal Previous Report" value="<?=$rcek1['tgl_previous_report']?>" required >
                                </div>				   
                        </div>
                        <div class="form-group">
                                <label for="tgl_expired_report" class="col-sm-4 control-label">Tgl Expired Report</label>
                                <div class="col-sm-5">
                                    <input id="tgl_expired_report" name="tgl_expired_report" type="date" class="form-control"  placeholder="Tgl Expired Report"  value="<?=$rcek1['tgl_expired_report']?>"  readonly >
                                </div>				   
                        </div>

          
                        <script>
  function updateExpiredReport() {
    // Mendapatkan nilai input tanggal sebelumnya
    var input_tgl_previous_report = document.getElementById('tgl_previous_report').value;

    // Mengonversi input pengguna menjadi objek tanggal
    var tgl_previous_report = new Date(input_tgl_previous_report);

    // Memeriksa apakah input pengguna valid
    if (isNaN(tgl_previous_report)) {
      console.log("Input tanggal sebelumnya tidak valid.");
    } else {
      // Menambahkan 1 tahun ke tanggal sebelumnya
      var tgl_expired_report = new Date(tgl_previous_report);
      tgl_expired_report.setFullYear(tgl_previous_report.getFullYear() + 1);

      // Format output tanggal_expired_report
      var tahun = tgl_expired_report.getFullYear();
      var bulan = tgl_expired_report.getMonth() + 1;
      var tanggal = tgl_expired_report.getDate();

      // Mengonversi ke format "yyyy-mm-dd"
      var tgl_expired_report_formatted = tahun + '-' + (bulan < 10 ? '0' + bulan : bulan) + '-' + (tanggal < 10 ? '0' + tanggal : tanggal);

      // Mengubah atribut readonly menjadi false
      document.getElementById('tgl_expired_report').setAttribute('readonly', false);

      // Menampilkan hasil di dalam input field
      document.getElementById('tgl_expired_report').value = tgl_expired_report_formatted;

      // Mengembalikan atribut readonly menjadi true setelah menampilkan nilai
      document.getElementById('tgl_expired_report').setAttribute('readonly', true);
    }
  }
</script>

                        <div class="form-group">
                                <label for="tgl_target_kirim_mkt" class="col-sm-4 control-label">Tgl Target Kirim MKT</label>
                                <div class="col-sm-5">
                                    <input name="tgl_target_kirim" type="text" class="form-control"  placeholder="Tgl Target Kirim MKT" value="<?=$rcek1['tgl_target_kirim']?>" required  >
                                </div>				   
                        </div>
                        <div class="form-group">
                                <label for="tgl_target_internal" class="col-sm-4 control-label">Tgl Target Internal</label>
                                <div class="col-sm-5">
                                    <input name="tgl_target_internal" type="text" class="form-control"  placeholder="Tgl Target Internal" value="<?=$rcek1['tgl_target_internal']?>" required >
                                </div>				   
                        </div>
                      
                        <div class="form-group">					
                            <?php if($nodemand!=""){ ?>
                                <button type="submit" class="btn btn-primary pull-right" name="status_save" value="save" <?php if($_SESSION['akses']=='biasa' OR ($rcek1['status']!='' AND $_SESSION['nama1']!='Janu Dwi Laksono')){ echo "disabled"; } ?>><i class="fa fa-save"></i> Simpan Status</button>
                            <?php } ?>
                        </div>
                    </div>
                    </form>
                </div>
	        </div>
	    </div>
    </div>
</div>

<?php if($nodemand!=""){ ?>
<section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Result.
            <small class="pull-right">Date: <?php echo $rcek1['tgl_buat'];?></small>
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
			  <?php if($rcek1['flamability']!=""){?>	
              <tr>
                <th colspan="2" style="width:50%">Flamability</th>
                <td colspan="6">
				<?php if($rcek1['stat_fla']=="RANDOM"){echo $rcekR['rflamability'];}else{echo $rcek1['flamability'];}?>
				</td>
              </tr>
			  <?php } ?>
			  <!--<?php if($rcek1['fibercontent']!=""){?>	
              <tr>
                <th colspan="2">Fiber Content</th>
                <td colspan="6">
				<?php if($rcek1['stat_fib']=="RANDOM"){echo $rcekR['rfibercontent'];}else{echo $rcek1['fibercontent'];}?>
				</td>
              </tr>
			  <?php } ?>-->
			  <?php if($rcek1['fc_cott']!="" or $rcek1['fc_poly']!="" or $rcek1['fc_elastane']!=""){?>	
              <tr>
                <th colspan="2">Fiber Content</th>
                <td colspan="6">
				<?php if($rcek1['stat_fib']=="RANDOM"){if($rcekR['rfc_cott']!=""){echo $rcekR['rfc_cott']."% ".$rcekR['rfc_cott1'];}?> <?php if($rcekR['rfc_poly']!=""){echo $rcekR['rfc_poly']."% ".$rcekR['rfc_poly1'];}?> <?php if($rcekR['rfc_elastane']!=""){echo $rcekR['rfc_elastane']."% ".$rcekR['rfc_elastane1'];}
				}else {if($rcek1['fc_cott']!=""){echo $rcek1['fc_cott']."% ".$rcek1['fc_cott1'];}?> <?php if($rcek1['fc_poly']!=""){echo $rcek1['fc_poly']."% ".$rcek1['fc_poly1'];}?> <?php if($rcek1['fc_elastane']!=""){echo $rcek1['fc_elastane']."% ".$rcek1['fc_elastane1'];}}
				?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['fc_wpi']!="" or $rcek1['fc_cpi']!=""){?>	
              <tr>
                <th colspan="2">Fabric Count</th>
                <td colspan="6">
				W: <?php if($rcek1['stat_fc']=="RANDOM"){echo $rcekR['rfc_wpi'];}else{echo $rcek1['fc_wpi'];}?>
				C: <?php if($rcek1['stat_fc']=="RANDOM"){echo $rcekR['rfc_cpi'];}else{echo $rcek1['fc_cpi'];}?>
				</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['f_weight']!=""){?>	
              <tr>
                <th colspan="2">Fabric Weight</th>
                <td colspan="6">
				<?php if($rcek1['stat_fwss2']=="RANDOM"){echo $rcekR['rf_weight'];}else{echo $rcek1['f_weight'];}?>
				</td>
              </tr>
			  <?php } ?>	
			  <?php if($rcek1['f_width']!=""){?>	
              <tr>
                <th colspan="2">Fabric Width</th>
                <td colspan="6">
				<?php if($rcek1['stat_fwss3']=="RANDOM"){echo $rcekR['rf_width'];}else{echo $rcek1['f_width'];}?>
				</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['bow']!="" or $rcek1['skew']!=""){?>	
              <tr>
                <th colspan="2">Bow &amp; Skew</th>
                <td colspan="6">
				<?php if($rcek1['stat_bsk']=="RANDOM"){echo $rcekR['rbow'];}else{echo $rcek1['bow'];}?> &amp;
				<?php if($rcek1['stat_bsk']=="RANDOM"){echo $rcekR['rskew'];}else{echo $rcek1['skew'];}?>
				</td>
              </tr>
			  <?php } ?>
              <?php if($rcek1['ss_temp']!=""){?>	
              <tr>
                <th colspan="2">Suhu Shrinkage Spirality</th>
                <td colspan="6"><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rss_temp'];}else{echo $rcek1['ss_temp'];}?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['ss_washes']!=""){?>	
              <tr>
                <th colspan="2">Washes Shrinkage Spirality</th>
                <td colspan="6"><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rss_washes'];}else{echo $rcek1['ss_washes'];}?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['shrinkage_l1']!="" or $rcek1['shrinkage_l2']!="" or $rcek1['shrinkage_l3']!="" or $rcek1['shrinkage_l4']!=""){?>	
              <tr>
                <th colspan="2">Shrinkage Length</th>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l1'];}else{echo $rcek1['shrinkage_l1'];}?></td>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l2'];}else{echo $rcek1['shrinkage_l2'];}?></td>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l3'];}else{echo $rcek1['shrinkage_l3'];}?></td>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l4'];}else{echo $rcek1['shrinkage_l4'];}?></td>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l5'];}else{echo $rcek1['shrinkage_l5'];}?></td>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l6'];}else{echo $rcek1['shrinkage_l6'];}?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['shrinkage_w1']!="" or $rcek1['shrinkage_w2']!="" or $rcek1['shrinkage_w3']!="" or $rcek1['shrinkage_w4']!=""){?>	
              <tr>
                <th colspan="2">Shrinkage Width</th>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w1'];}else{echo $rcek1['shrinkage_w1'];}?></td>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w2'];}else{echo $rcek1['shrinkage_w2'];}?></td>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w3'];}else{echo $rcek1['shrinkage_w3'];}?></td>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w4'];}else{echo $rcek1['shrinkage_w4'];}?></td>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w5'];}else{echo $rcek1['shrinkage_w5'];}?></td>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w6'];}else{echo $rcek1['shrinkage_w6'];}?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['spirality1']!="" or $rcek1['spirality2']!="" or $rcek1['spirality3']!="" or $rcek1['spirality4']!=""){?>		
              <tr>
                <th colspan="2">Spirality</th>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rspirality1'];}else{echo $rcek1['spirality1'];}?></td>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rspirality2'];}else{echo $rcek1['spirality2'];}?></td>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rspirality3'];}else{echo $rcek1['spirality3'];}?></td>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rspirality4'];}else{echo $rcek1['spirality4'];}?></td>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rspirality5'];}else{echo $rcek1['spirality5'];}?></td>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rspirality6'];}else{echo $rcek1['spirality6'];}?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['apperss_ch1']!="" or $rcek1['apperss_ch2']!="" or $rcek1['apperss_ch3']!="" or $rcek1['apperss_ch4']!=""){?>	
              <tr>
			  <th>Apperance</th>
                <th>&nbsp;</th>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_ch1'];}else{echo $rcek1['apperss_ch1'];}?>
				</td>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_ch2'];}else{echo $rcek1['apperss_ch2'];}?>
				</td>
				<td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_ch3'];}else{echo $rcek1['apperss_ch3'];}?>
				</td>
                <td colspan="3"><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_ch4'];}else{echo $rcek1['apperss_ch4'];}?>
				</td>
              </tr>
			  <tr>
			  	<th>Colorchange</th>
				  <th>&nbsp;</th>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_cc1'];}else{echo $rcek1['apperss_cc1'];}?>
				</td>
                <td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_cc2'];}else{echo $rcek1['apperss_cc2'];}?>
				</td>
				<td><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_cc3'];}else{echo $rcek1['apperss_cc3'];}?>
				</td>
                <td colspan="3"><?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_cc4'];}else{echo $rcek1['apperss_cc4'];}?>
				</td>
			  </tr>
			  <?php } ?>
			  <?php if($rcek1['pm_f1']!="" or $rcek1['pm_f2']!="" or $rcek1['pm_f3']!="" or $rcek1['pm_f4']!="" or $rcek1['pm_f5']!=""){?>	
              <tr>
                <th rowspan="2">Pilling Martindle</th>
                <th>Face</th>
                <td><?php if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_f1'];}else{echo $rcek1['pm_f1'];}?></td>
                <td><?php if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_f2'];}else{echo $rcek1['pm_f2'];}?></td>
                <td><?php if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_f3'];}else{echo $rcek1['pm_f3'];}?></td>
                <td><?php if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_f4'];}else{echo $rcek1['pm_f4'];}?></td>
                <td><?php if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_f5'];}else{echo $rcek1['pm_f5'];}?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['pm_b1']!="" or $rcek1['pm_b2']!="" or $rcek1['pm_b3']!="" or $rcek1['pm_b4']!="" or $rcek1['pm_b5']!="" or $rcek1['pm_f1']!=""){?>	
              <tr>
                <th>Back</th>
                <td><?php if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_b1'];}else{echo $rcek1['pm_b1'];}?></td>
                <td><?php if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_b2'];}else{echo $rcek1['pm_b2'];}?></td>
                <td><?php if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_b3'];}else{echo $rcek1['pm_b3'];}?></td>
                <td><?php if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_b4'];}else{echo $rcek1['pm_b4'];}?></td>
                <td><?php if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_b5'];}else{echo $rcek1['pm_b5'];}?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['pl_f1']!="" or $rcek1['pl_f2']!="" or $rcek1['pl_f3']!="" or $rcek1['pl_f4']!="" or $rcek1['pl_f5']!="" or $rcek1['pl_b1']!=""){?>	
              <tr>
                <th rowspan="2">Pilling Locus</th>
                <th>Face</th>
                <td><?php if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_f1'];}else{echo $rcek1['pl_f1'];}?></td>
                <td><?php if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_f2'];}else{echo $rcek1['pl_f2'];}?></td>
                <td><?php if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_f3'];}else{echo $rcek1['pl_f3'];}?></td>
                <td><?php if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_f4'];}else{echo $rcek1['pl_f4'];}?></td>
                <td><?php if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_f5'];}else{echo $rcek1['pl_f5'];}?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['pl_b1']!="" or $rcek1['pl_b2']!="" or $rcek1['pl_b3']!="" or $rcek1['pl_b4']!="" or $rcek1['pl_b5']!="" or $rcek1['pl_f1']!=""){?>	
              <tr>
                <th>Back</th>
                <td><?php if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_b1'];}else{echo $rcek1['pl_b1'];}?></td>
                <td><?php if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_b2'];}else{echo $rcek1['pl_b2'];}?></td>
                <td><?php if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_b3'];}else{echo $rcek1['pl_b3'];}?></td>
                <td><?php if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_b4'];}else{echo $rcek1['pl_b4'];}?></td>
                <td><?php if($rcek1['stat_pl']=="RANDOM"){echo $rcekR['rpl_b5'];}else{echo $rcek1['pl_b5'];}?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>	
			  <?php if($rcek1['pb_f1']!="" or $rcek1['pb_f2']!="" or $rcek1['pb_f3']!="" or $rcek1['pb_f4']!="" or $rcek1['pb_f5']!=""){?>	
              <tr>
                <th rowspan="2">Pilling Box</th>
                <th>Face</th>
                <td><?php if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_f1'];}else{echo $rcek1['pb_f1'];}?></td>
                <td><?php if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_f2'];}else{echo $rcek1['pb_f2'];}?></td>
                <td><?php if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_f3'];}else{echo $rcek1['pb_f3'];}?></td>
                <td><?php if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_f4'];}else{echo $rcek1['pb_f4'];}?></td>
                <td><?php if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_f5'];}else{echo $rcek1['pb_f5'];}?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['pb_b1']!="" or $rcek1['pb_b2']!="" or $rcek1['pb_b3']!="" or $rcek1['pb_b4']!="" or $rcek1['pb_b5']!=""){?>	
              <tr>
                <th>Back</th>
                <td><?php if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_b1'];}else{echo $rcek1['pb_b1'];}?></td>
                <td><?php if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_b2'];}else{echo $rcek1['pb_b2'];}?></td>
                <td><?php if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_b3'];}else{echo $rcek1['pb_b3'];}?></td>
                <td><?php if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_b4'];}else{echo $rcek1['pb_b4'];}?></td>
                <td><?php if($rcek1['stat_pb']=="RANDOM"){echo $rcekR['rpb_b5'];}else{echo $rcek1['pb_b5'];}?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['prt_f1']!="" or $rcek1['prt_f2']!="" or $rcek1['prt_f3']!="" or $rcek1['prt_f4']!="" or $rcek1['prt_f5']!="" or $rcek1['prt_b1']!=""){?>	
              <tr>
                <th rowspan="2">Pilling Random Tumbler</th>
                <th>Face</th>
                <td><?php if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_f1'];}else{echo $rcek1['prt_f1'];}?></td>
                <td><?php if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_f2'];}else{echo $rcek1['prt_f2'];}?></td>
                <td><?php if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_f3'];}else{echo $rcek1['prt_f3'];}?></td>
                <td><?php if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_f4'];}else{echo $rcek1['prt_f4'];}?></td>
                <td><?php if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_f5'];}else{echo $rcek1['prt_f5'];}?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['prt_f1']!="" or $rcek1['prt_b1']!="" or $rcek1['prt_b2']!="" or $rcek1['prt_b3']!="" or $rcek1['prt_b4']!="" or $rcek1['prt_b5']!=""){?>	
              <tr>
                <th>Back</th>
                <td><?php if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_b1'];}else{echo $rcek1['prt_b1'];}?></td>
                <td><?php if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_b2'];}else{echo $rcek1['prt_b2'];}?></td>
                <td><?php if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_b3'];}else{echo $rcek1['prt_b3'];}?></td>
                <td><?php if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_b4'];}else{echo $rcek1['prt_b4'];}?></td>
                <td><?php if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_b5'];}else{echo $rcek1['prt_b5'];}?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['abration']!=""){?>	
              <tr>
                <th colspan="2">Abration</th>
                <td colspan="6">
				<?php if($rcek1['stat_abr']=="RANDOM"){echo $rcekR['rabration'];}else{echo $rcek1['abration'];}?>
				</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['sm_l1']!="" or $rcek1['sm_l2']!="" or $rcek1['sm_l3']!="" or $rcek1['sm_l4']!=""){?>	
              <tr>
                <th rowspan="2">Snagging Mace</th>
                <th>Len</th>
                <td><?php if($rcek1['stat_sm']=="RANDOM"){echo $rcekR['rsm_l1'];}else{echo $rcek1['sm_l1'];}?></td>
                <td><?php if($rcek1['stat_sm']=="RANDOM"){echo $rcekR['rsm_l2'];}else{echo $rcek1['sm_l2'];}?></td>
                <td><?php if($rcek1['stat_sm']=="RANDOM"){echo $rcekR['rsm_l3'];}else{echo $rcek1['sm_l3'];}?></td>
                <td><?php if($rcek1['stat_sm']=="RANDOM"){echo $rcekR['rsm_l4'];}else{echo $rcek1['sm_l4'];}?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['sm_w1']!="" or $rcek1['sm_w2']!="" or $rcek1['sm_w3']!="" or $rcek1['sm_w4']!=""){?>	
              <tr>
                <th>Wid</th>
                <td><?php if($rcek1['stat_sm']=="RANDOM"){echo $rcekR['rsm_w1'];}else{echo $rcek1['sm_w1'];}?></td>
                <td><?php if($rcek1['stat_sm']=="RANDOM"){echo $rcekR['rsm_w2'];}else{echo $rcek1['sm_w2'];}?></td>
                <td><?php if($rcek1['stat_sm']=="RANDOM"){echo $rcekR['rsm_w3'];}else{echo $rcek1['sm_w3'];}?></td>
                <td><?php if($rcek1['stat_sm']=="RANDOM"){echo $rcekR['rsm_w4'];}else{echo $rcek1['sm_w4'];}?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['sp_grdl1']!="" or $rcek1['sp_clsl1']!="" or $rcek1['sp_shol1']!="" or $rcek1['sp_medl1']!="" or $rcek1['sp_lonl1']!="" or $rcek1['sp_grdl2']!="" or $rcek1['sp_clsl2']!="" or $rcek1['sp_shol2']!="" or $rcek1['sp_medl2']!="" or $rcek1['sp_lonl2']!="" or $rcek1['sp_grdw1']!="" or $rcek1['sp_clsw1']!="" or $rcek1['sp_show1']!="" or $rcek1['sp_medw1']!="" or $rcek1['sp_lonw1']!="" or $rcek1['sp_grdw2']!="" or $rcek1['sp_clsw2']!="" or $rcek1['sp_show2']!="" or $rcek1['sp_medw2']!="" or $rcek1['sp_lonw2']!=""){
				if($rcek1['sp_grdl1']!="" or $rcek1['sp_clsl1']!="" or $rcek1['sp_shol1']!="" or $rcek1['sp_medl1']!="" or $rcek1['sp_lonl1']!=""){$rp1="1";}else{$rp1="0";}
				if($rcek1['sp_grdl2']!="" or $rcek1['sp_clsl2']!="" or $rcek1['sp_shol2']!="" or $rcek1['sp_medl2']!="" or $rcek1['sp_lonl2']!=""){$rp2="1";}else{$rp2="0";}
				if($rcek1['sp_grdw1']!="" or $rcek1['sp_clsw1']!="" or $rcek1['sp_show1']!="" or $rcek1['sp_medw1']!="" or $rcek1['sp_lonw1']!=""){$rp3="1";}else{$rp3="0";}
				if($rcek1['sp_grdw2']!="" or $rcek1['sp_clsw2']!="" or $rcek1['sp_show2']!="" or $rcek1['sp_medw2']!="" or $rcek1['sp_lonw2']!=""){$rp4="1";}else{$rp4="0";}
				$rowspan=$rp1+$rp2+$rp3+$rp4+1;
			  ?>	
              <tr>
                <th rowspan="<?php echo $rowspan;?>">Snagging POD</th>
                <th>Srt</th>
                <th>Grd</th>
                <th>Cls</th>
                <th>Sho</th>
                <th>Med</th>
                <th>Long</th>
                <th>&nbsp;</th>
			  </tr>
			  <?php } ?>	
			  <?php if($rcek1['sp_grdl1']!="" or $rcek1['sp_clsl1']!="" or $rcek1['sp_shol1']!="" or $rcek1['sp_medl1']!="" or $rcek1['sp_lonl1']!=""){?>	
              <tr>
                <th>L1</th>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_grdl1'];}else{echo $rcek1['sp_grdl1'];}?></td>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_clsl1'];}else{echo $rcek1['sp_clsl1'];}?></td>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_shol1'];}else{echo $rcek1['sp_shol1'];}?></td>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_medl1'];}else{echo $rcek1['sp_medl1'];}?></td>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_lonl1'];}else{echo $rcek1['sp_lonl1'];}?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>	
			  <?php if($rcek1['sp_grdl2']!="" or $rcek1['sp_clsl2']!="" or $rcek1['sp_shol2']!="" or $rcek1['sp_medl2']!="" or $rcek1['sp_lonl2']!=""){?>		
              <tr>
                <th>L2</th>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_grdl2'];}else{echo $rcek1['sp_grdl2'];}?></td>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_clsl2'];}else{echo $rcek1['sp_clsl2'];}?></td>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_shol2'];}else{echo $rcek1['sp_shol2'];}?></td>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_medl2'];}else{echo $rcek1['sp_medl2'];}?></td>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_lonl2'];}else{echo $rcek1['sp_lonl2'];}?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>	
			  <?php if($rcek1['sp_grdw1']!="" or $rcek1['sp_clsw1']!="" or $rcek1['sp_show1']!="" or $rcek1['sp_medw1']!="" or $rcek1['sp_lonw1']!=""){?>		
              <tr>
                <th>W1</th>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_grdw1'];}else{echo $rcek1['sp_grdw1'];}?></td>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_clsw1'];}else{echo $rcek1['sp_clsw1'];}?></td>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_show1'];}else{echo $rcek1['sp_show1'];}?></td>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_medw1'];}else{echo $rcek1['sp_medw1'];}?></td>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_lonw1'];}else{echo $rcek1['sp_lonw1'];}?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>	
			  <?php if($rcek1['sp_grdw2']!="" or $rcek1['sp_clsw2']!="" or $rcek1['sp_show2']!="" or $rcek1['sp_medw2']!="" or $rcek1['sp_lonw2']!=""){?>	
              <tr>
                <th>W2</th>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_grdw2'];}else{echo $rcek1['sp_grdw2'];}?></td>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_clsw2'];}else{echo $rcek1['sp_clsw2'];}?></td>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_show2'];}else{echo $rcek1['sp_show2'];}?></td>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_medw2'];}else{echo $rcek1['sp_medw2'];}?></td>
                <td><?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_lonw2'];}else{echo $rcek1['sp_lonw2'];}?></td>
                <td>&nbsp;</td>
              </tr>
              <?php } ?>
			  <?php if($rcek1['sb_l1']!="" or $rcek1['sb_l2']!="" or $rcek1['sb_l3']!="" or $rcek1['sb_l4']!=""){?>	
              <tr>
                <th rowspan="2">Bean Bag</th>
                <th>Len</th>
                <td><?php if($rcek1['stat_sb']=="RANDOM"){echo $rcekR['rsb_l1'];}else{echo $rcek1['sb_l1'];}?></td>
                <td><?php if($rcek1['stat_sb']=="RANDOM"){echo $rcekR['rsb_l2'];}else{echo $rcek1['sb_l2'];}?></td>
                <td><?php if($rcek1['stat_sb']=="RANDOM"){echo $rcekR['rsb_l3'];}else{echo $rcek1['sb_l3'];}?></td>
                <td><?php if($rcek1['stat_sb']=="RANDOM"){echo $rcekR['rsb_l4'];}else{echo $rcek1['sb_l4'];}?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['sb_w1']!="" or $rcek1['sb_w2']!="" or $rcek1['sb_w3']!="" or $rcek1['sb_w4']!=""){?>	
              <tr>
                <th>Wid</th>
                <td><?php if($rcek1['stat_sb']=="RANDOM"){echo $rcekR['rsb_w1'];}else{echo $rcek1['sb_w1'];}?></td>
                <td><?php if($rcek1['stat_sb']=="RANDOM"){echo $rcekR['rsb_w2'];}else{echo $rcek1['sb_w2'];}?></td>
                <td><?php if($rcek1['stat_sb']=="RANDOM"){echo $rcekR['rsb_w3'];}else{echo $rcek1['sb_w3'];}?></td>
                <td><?php echo $rcek1['sb_w4'];?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['bs_instron']!="" or $rcek1['bs_mullen']!="" or $rcek1['bs_tru']!=""){?>	
              <tr>
                <th colspan="2">Bursting Strength</th>
                <td><?php if($rcek1['stat_bs2']=="RANDOM"){echo $rcekR['rbs_instron'];}else{echo $rcek1['bs_instron'];}?></td>
                <td><?php if($rcek1['stat_bs3']=="RANDOM"){echo $rcekR['rbs_mullen'];}else{echo $rcek1['bs_mullen'];}?></td>
                <td colspan="4"><?php if($rcek1['stat_bs']=="RANDOM"){echo $rcekR['rbs_tru'];}else{echo $rcek1['bs_tru'];}?></td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['thick1']!="" or $rcek1['thick2']!="" or $rcek1['thick3']!="" or $rcek1['thickav']!=""){?>	
              <tr>
                <th colspan="2">Thickness</th>
                <td><?php if($rcek1['stat_th']=="RANDOM"){echo $rcekR['rthick1'];}else{echo $rcek1['thick1'];}?></td>
                <td><?php if($rcek1['stat_th']=="RANDOM"){echo $rcekR['rthick2'];}else{echo $rcek1['thick2'];}?></td>
                <td><?php if($rcek1['stat_th']=="RANDOM"){echo $rcekR['rthick3'];}else{echo $rcek1['thick3'];}?></td>
                <td><?php if($rcek1['stat_th']=="RANDOM"){echo $rcekR['rthickav'];}else{echo $rcek1['thickav'];}?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['stretch_l1']!="" or $rcek1['stretch_l2']!="" or $rcek1['stretch_l3']!="" or $rcek1['stretch_l4']!="" or $rcek1['stretch_l5']!=""){?>	
              <tr>
                <th rowspan="3">Stretch</th>
                <th>Load</th>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rload_stretch'];}else{echo $rcek1['load_stretch'];}?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <th>Len</th>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_l1'];}else{echo $rcek1['stretch_l1'];}?></td>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_l2'];}else{echo $rcek1['stretch_l2'];}?></td>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_l3'];}else{echo $rcek1['stretch_l3'];}?></td>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_l4'];}else{echo $rcek1['stretch_l4'];}?></td>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_l5'];}else{echo $rcek1['stretch_l5'];}?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th>Wid</th>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_w1'];}else{echo $rcek1['stretch_w1'];}?></td>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_w2'];}else{echo $rcek1['stretch_w2'];}?></td>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_w3'];}else{echo $rcek1['stretch_w3'];}?></td>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_w4'];}else{echo $rcek1['stretch_w4'];}?></td>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_w5'];}else{echo $rcek1['stretch_w5'];}?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['recover_l1']!="" or $rcek1['recover_l2']!="" or $rcek1['recover_l3']!="" or $rcek1['recover_l4']!="" or $rcek1['recover_l5']!=""){?>	
              <tr>
                <th rowspan="2">Recovery</th>
                <th>Len</th>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_l1'];}else{echo $rcek1['recover_l1'];}?></td>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_l11'];}else{echo $rcek1['recover_l11'];}?></td>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_l3'];}else{echo $rcek1['recover_l3'];}?></td>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_l4'];}else{echo $rcek1['recover_l4'];}?></td>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_l5'];}else{echo $rcek1['recover_l5'];}?></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th>Wid</th>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_w1'];}else{echo $rcek1['recover_w1'];}?></td>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_w11'];}else{echo $rcek1['recover_w11'];}?></td>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_w3'];}else{echo $rcek1['recover_w3'];}?></td>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_w4'];}else{echo $rcek1['recover_w4'];}?></td>
                <td><?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_w5'];}else{echo $rcek1['recover_w5'];}?></td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['growth_l1']!="" or $rcek1['growth_l2']!=""){?>	
              <tr>
                <th rowspan="2">Growth</th>
                <th>Len</th>
                <td><?php if($rcek1['stat_gr']=="RANDOM"){echo $rcekR['rgrowth_l1'];}else{echo $rcek1['growth_l1'];}?></td>
                <td><?php if($rcek1['stat_gr']=="RANDOM"){echo $rcekR['rgrowth_l2'];}else{echo $rcek1['growth_l2'];}?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <th>Wid</th>
                <td><?php if($rcek1['stat_gr']=="RANDOM"){echo $rcekR['rgrowth_w1'];}else{echo $rcek1['growth_w1'];}?></td>
                <td><?php if($rcek1['stat_gr']=="RANDOM"){echo $rcekR['rgrowth_w2'];}else{echo $rcek1['growth_w2'];}?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['rec_growth_l1']!="" or $rcek1['rec_growth_l2']!=""){?>	
              <tr>
                <th rowspan="2">Recovery Growth</th>
                <th>Len</th>
                <td><?php if($rcek1['stat_gr']=="RANDOM"){echo $rcekR['rrec_growth_l1'];}else{echo $rcek1['rec_growth_l1'];}?></td>
                <td><?php if($rcek1['stat_gr']=="RANDOM"){echo $rcekR['rrec_growth_l2'];}else{echo $rcek1['rec_growth_l2'];}?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
              <tr>
                <th>Wid</th>
                <td><?php if($rcek1['stat_gr']=="RANDOM"){echo $rcekR['rrec_growth_w1'];}else{echo $rcek1['rec_growth_w1'];}?></td>
                <td><?php if($rcek1['stat_gr']=="RANDOM"){echo $rcekR['rrec_growth_w2'];}else{echo $rcek1['rec_growth_w2'];}?></td>
                <td colspan="4">&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['apper_ch1']!="" or $rcek1['apper_ch2']!="" or $rcek1['apper_ch3']!=""){?>	
              <tr>
			  <th rowspan="7">Apperance</th>
                <th>&nbsp;</th>
                <td><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_ch1'];}else{echo $rcek1['apper_ch1'];}?>
				</td>
                <td><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_ch2'];}else{echo $rcek1['apper_ch2'];}?>
				</td>
                <td colspan="4"><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_ch3'];}else{echo $rcek1['apper_ch3'];}?>
				</td>
              </tr>
			  <tr>
			  	<th>&nbsp;</th>
                <td><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_cc1'];}else{echo $rcek1['apper_cc1'];}?>
				</td>
                <td><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_cc2'];}else{echo $rcek1['apper_cc2'];}?>
				</td>
                <td colspan="4"><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_cc3'];}else{echo $rcek1['apper_cc3'];}?>
				</td>
			  </tr>
              <tr>
                <th>&nbsp;</th>
				<td><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_st'];}else{echo $rcek1['apper_st'];}?>
				</td>
                <td><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_st2'];}else{echo $rcek1['apper_st2'];}?>
				</td>
                <td colspan="4"><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_st3'];}else{echo $rcek1['apper_st3'];}?></td>
              </tr>
              <tr>
                <th>Face</th>
                <td><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_pf1'];}else{echo $rcek1['apper_pf1'];}?></td>
                <td><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_pf2'];}else{echo $rcek1['apper_pf2'];}?></td>
                <td colspan="4"><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_pf3'];}else{echo $rcek1['apper_pf3'];}?></td>
              </tr>
              <tr>
                <th>Back</th>
                <td><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_pb1'];}else{echo $rcek1['apper_pb1'];}?></td>
                <td><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_pb2'];}else{echo $rcek1['apper_pb2'];}?></td>
                <td colspan="4"><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_pb3'];}else{echo $rcek1['apper_pb3'];}?></td>
              </tr>
			  <tr>
				<th>&nbsp;</th>
				<td><strong>Ace</strong></td>
				<td><strong>Cot</strong></td>
				<td><strong>Nyl</strong></td>
				<td><strong>Poly</strong></td>
				<td><strong>Acr</strong></td>
				<td><strong>Wool</strong></td>
			  </tr>
			  <tr>
				<th>&nbsp;</th>
				<td><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_acetate'];}else{echo $rcek1['apper_acetate'];}?></td>
				<td><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_cotton'];}else{echo $rcek1['apper_cotton'];}?></td>
				<td><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_nylon'];}else{echo $rcek1['apper_nylon'];}?></td>
				<td><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_poly'];}else{echo $rcek1['apper_poly'];}?></td>
				<td><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_acrylic'];}else{echo $rcek1['apper_acrylic'];}?></td>
				<td><?php if($rcek1['stat_ap']=="RANDOM"){echo $rcekR['rapper_wool'];}else{echo $rcek1['apper_wool'];}?></td>
			  </tr>
			  <?php } ?>
			  <?php if($rcek1['h_shrinkage_l1']!="" or $rcek1['h_shrinkage_w1']!="" or $rcek1['h_shrinkage_grd']!="" or $rcek1['h_shrinkage_app']!=""){?>	
              <tr>
                <th rowspan="5">Heat Shrinkage</th>
                <th>Suhu</th>
                <td><?php if($rcek1['stat_hs']=="RANDOM"){echo $rcekR['rh_shrinkage_temp'];}else{echo $rcek1['h_shrinkage_temp'];}?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <th>Len</th>
                <td><?php if($rcek1['stat_hs']=="RANDOM"){echo $rcekR['rh_shrinkage_l1'];}else{echo $rcek1['h_shrinkage_l1'];}?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th>Wid</th>
                <td><?php if($rcek1['stat_hs']=="RANDOM"){echo $rcekR['rh_shrinkage_w1'];}else{echo $rcek1['h_shrinkage_w1'];}?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <th>Grade</th>
                <td><?php if($rcek1['stat_hs']=="RANDOM"){echo $rcekR['rh_shrinkage_grd'];}else{echo $rcek1['h_shrinkage_grd'];}?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <tr>
                <th>Appearance</th>
                <td><?php if($rcek1['stat_hs']=="RANDOM"){echo $rcekR['rh_shrinkage_app'];}else{echo $rcek1['h_shrinkage_app'];}?></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
			  <?php } ?>
			  <?php if($rcek1['fibre_transfer']!="" or $rcek1['fibre_grade']!=""){?>	
              <tr>
                <th colspan="2">Fibre/Fuzz</th>
                <td><?php if($rcek1['stat_ff']=="RANDOM"){echo $rcekR['rfibre_transfer'];}else{echo $rcek1['fibre_transfer'];}?></td>
                <td><?php if($rcek1['stat_ff']=="RANDOM"){echo $rcekR['rfibre_grade'];}else{echo $rcek1['fibre_grade'];}?></td>
                <td>&nbsp;</td>
				<td>&nbsp;</td>
              </tr>
			  <?php } ?>
              <?php if($rcek1['odour']!=""){?>  
		    <tr>
				<th colspan="2">Odour</th>
				<td colspan="4"><?php if($rcek1['stat_odour']=="RANDOM"){echo $rcekR['rodour'];}else{echo $rcek1['odour'];}?></td>
				<td>&nbsp;</td>
          	</tr>
			<?php } ?>
            <?php if($rcek1['curling']!=""){?>  
		    <tr>
				<th colspan="2">Curling</th>
				<td colspan="4"><?php if($rcek1['stat_curling']=="RANDOM"){echo $rcekR['rcurling'];}else{echo $rcek1['curling'];}?></td>
				<td>&nbsp;</td>
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
		    <?php if($rcek1['wick_l1']!="" or $rcek1['wick_l2']!="" or $rcek1['wick_l3']!="" or $rcek1['wick_w1']!="" or $rcek1['wick_w2']!="" or $rcek1['wick_w3']!=""){?>
		    <tr>
				<th rowspan="4" style="width:50%">Wicking</th>
				<th>Length</th>
				<th>Beforewash</th>
				<td><?php if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_l1'];}else{echo $rcek1['wick_l1'];}?></td>
				<!--<td><?php if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_l2'];}else{echo $rcek1['wick_l2'];}?></td>
				<td><?php if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_l3'];}else{echo $rcek1['wick_l3'];}?></td>-->
				<td>&nbsp;</td>
				<td>&nbsp;</td>
          	</tr>
		    <tr>
				<th>&nbsp;</th>
				<th >Afterwash</th>
				<td><?php if($rcek1['stat_wic2']=="RANDOM"){echo $rcekR['rwick_l2'];}else{echo $rcek1['wick_l2'];}?></td>
				<!--<td><?php if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_w2'];}else{echo $rcek1['wick_w2'];}?></td>
				<td><?php if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_w3'];}else{echo $rcek1['wick_w3'];}?></td>-->
				<td>&nbsp;</td>
				<td>&nbsp;</td>
          	</tr>
		  	<tr>
				<th>Width</th>
				<th>Beforewash</th>
				<!--<td><?php if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_l1'];}else{echo $rcek1['wick_l1'];}?></td>-->
				<td><?php if($rcek1['stat_wic1']=="RANDOM"){echo $rcekR['rwick_w1'];}else{echo $rcek1['wick_w1'];}?></td>
				<!--<td><?php if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_l3'];}else{echo $rcek1['wick_l3'];}?></td>-->
				<td>&nbsp;</td>
				<td>&nbsp;</td>
          	</tr>
		    <tr>
				<th>&nbsp;</th>
				<th >Afterwash</th>
				<!--<td><?php if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_w1'];}else{echo $rcek1['wick_w1'];}?></td>-->
				<td><?php if($rcek1['stat_wic3']=="RANDOM"){echo $rcekR['rwick_w2'];}else{echo $rcek1['wick_w2'];}?></td>
				<!--<td><?php if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_w3'];}else{echo $rcek1['wick_w3'];}?></td>-->
				<td>&nbsp;</td>
				<td>&nbsp;</td>
          	</tr>
		    <?php } ?>
		    <?php if($rcek1['absor_f1']!="" or $rcek1['absor_f2']!="" or $rcek1['absor_f3']!="" or $rcek1['absor_b1']!="" or $rcek1['absor_b2']!="" or $rcek1['absor_b3']!=""){?>
		    <tr>
				<th rowspan="4">Absorbency</th>
				<th>Original</th>
				<th>Face</th>
				<td><?php if($rcek1['stat_abs']=="RANDOM"){echo $rcekR['rabsor_f2'];}else{echo $rcek1['absor_f2'];}?></td>
				<!--<td><?php if($rcek1['stat_abs']=="RANDOM"){echo $rcekR['rabsor_f3'];}else{echo $rcek1['absor_f3'];}?></td>-->
				<td>&nbsp;</td>
				<td>&nbsp;</td>
          	</tr>
		  	<tr>
				<th>&nbsp;</th>
				<th >Back</th>
				<td><?php if($rcek1['stat_abs']=="RANDOM"){echo $rcekR['rabsor_f1'];}else{echo $rcek1['absor_f1'];}?></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
          	</tr>
		    <tr>
				<th>Afterwash</th>
				<th>Face</th>
				<td><?php if($rcek1['stat_abs1']=="RANDOM"){echo $rcekR['rabsor_b2'];}else{echo $rcek1['absor_b2'];}?></td>
				<!--<td><?php if($rcek1['stat_abs1']=="RANDOM"){echo $rcekR['rabsor_b3'];}else{echo $rcek1['absor_b3'];}?></td>-->
				<td>&nbsp;</td>
				<td>&nbsp;</td>
          	</tr>
		  	<tr>
				<th>&nbsp;</th>
				<th >Back</th>
				<td><?php if($rcek1['stat_abs1']=="RANDOM"){echo $rcekR['rabsor_b1'];}else{echo $rcek1['absor_b1'];}?></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
          	</tr>
		    <?php } ?>
			<?php if($rcek1['dry1']!="" or $rcek1['dry2']!="" or $rcek1['dry3']!="" or $rcek1['dryaf1']!="" or $rcek1['dryaf2']!="" or $rcek1['dryaf3']!=""){?>  
		    <tr>
				<th rowspan="2">Drying Time</th>
				<th>Original</th>
				<td><?php if($rcek1['stat_dry']=="RANDOM"){echo $rcekR['rdry1'];}else{echo $rcek1['dry1'];}?></td>
				<td><?php if($rcek1['stat_dry']=="RANDOM"){echo $rcekR['rdry2'];}else{echo $rcek1['dry2'];}?></td>
				<td><?php if($rcek1['stat_dry']=="RANDOM"){echo $rcekR['rdry3'];}else{echo $rcek1['dry3'];}?></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
          	</tr>
		  	<tr>
				<th>Afterwash</th>
				<td><?php if($rcek1['stat_dry1']=="RANDOM"){echo $rcekR['rdryaf1'];}else{echo $rcek1['dryaf1'];}?></td>
				<td><?php if($rcek1['stat_dry1']=="RANDOM"){echo $rcekR['rdryaf2'];}else{echo $rcek1['dryaf2'];}?></td>
				<td><?php if($rcek1['stat_dry1']=="RANDOM"){echo $rcekR['rdryaf3'];}else{echo $rcek1['dryaf3'];}?></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
          	</tr>
			<?php } ?>
			<?php if($rcek1['repp1']!="" or $rcek1['repp2']!=""){?> 
		    <tr>
				<th rowspan="2">Water Reppelent</th>
				<th>Original</th>
				<td><?php if($rcek1['stat_wp']=="RANDOM"){echo $rcekR['rrepp1'];}else{echo $rcek1['repp1'];}?></td>
				<!--<td><?php if($rcek1['stat_wp']=="RANDOM"){echo $rcekR['rrepp2'];}else{echo $rcek1['repp2'];}?></td>
				<td><?php if($rcek1['stat_wp']=="RANDOM"){echo $rcekR['rrepp3'];}else{echo $rcek1['repp3'];}?></td>
				<td><?php if($rcek1['stat_wp']=="RANDOM"){echo $rcekR['rrepp4'];}else{echo $rcek1['repp4'];}?></td>-->
				<td>&nbsp;</td>
         	</tr>
			 <tr>
				<th>Afterwash</th>
				<td><?php if($rcek1['stat_wp1']=="RANDOM"){echo $rcekR['rrepp2'];}else{echo $rcek1['repp2'];}?>
				<td>&nbsp;</td>
          	</tr>
			<?php } ?>
			<?php if($rcek1['ph']!=""){?>  
		    <tr>
				<th colspan="2">Ph</th>
				<td colspan="4"><?php if($rcek1['stat_ph']=="RANDOM"){echo $rcekR['rph'];}else{echo $rcek1['ph'];}?></td>
				<td>&nbsp;</td>
         	</tr>
			<?php } ?>
			<?php if($rcek1['soil']!=""){?>  
		    <tr>
				<th colspan="2">Soil</th>
				<td colspan="4"><?php if($rcek1['stat_sor']=="RANDOM"){echo $rcekR['rsoil'];}else{echo $rcek1['soil'];}?></td>
				<td>&nbsp;</td>
          	</tr>
			<?php } ?> 
            <?php if($rcek1['humidity']!=""){?>  
		    <tr>
				<th colspan="2">Humidity</th>
				<td colspan="4"><?php if($rcek1['stat_hum']=="RANDOM"){echo $rcekR['rhumidity'];}else{echo $rcek1['humidity'];}?></td>
				<td>&nbsp;</td>
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
		  <table class="table">
		  	<?php if($rcek1['wash_temp']!="" or $rcek1['wash_colorchange']!="" or $rcek1['wash_acetate']!="" or $rcek1['wash_cotton']!="" or $rcek1['wash_nylon']!="" or $rcek1['wash_poly']!="" or $rcek1['wash_acrylic']!="" or $rcek1['wash_wool']!="" or $rcek1['wash_staining']!=""){
      		?>	
      	<tr>
		    <th rowspan="5">Washing</th>
			<th>Suhu</th>
		    <td colspan="4"><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_temp'];}else{echo $rcek1['wash_temp'];}?>&deg;</td>
          	<td>&nbsp;</td>
      	</tr>
      	<tr>
			<th>&nbsp;</th>
			<td><strong>CC</strong></td>
		    <td colspan="2"><strong>Ace</strong></td>
			<td><strong>Cot</strong></td>
		    <td colspan="2"><strong>Nyl</strong></td>
          	<td>&nbsp;</td>
      	</tr>
		<tr>
			<th>&nbsp;</th>
			<td><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_colorchange'];}else{echo $rcek1['wash_colorchange'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_acetate'];}else{echo $rcek1['wash_acetate'];}?></td>
			<td><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_cotton'];}else{echo $rcek1['wash_cotton'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_nylon'];}else{echo $rcek1['wash_nylon'];}?></td>
          	<td>&nbsp;</td>
      	</tr>
      	<tr>
			<th>&nbsp;</th>
			<td><strong>Poly</strong></td>
		    <td colspan="2"><strong>Acr</strong></td>
			<td><strong>Wool</strong></td>
		    <td colspan="2"><strong>Sta</strong></td>
          	<td>&nbsp;</td>
      	</tr>
		<tr>
			<th>&nbsp;</th>
		    <td><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_poly'];}else{echo $rcek1['wash_poly'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_acrylic'];}else{echo $rcek1['wash_acrylic'];}?></td>
			<td><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_wool'];}else{echo $rcek1['wash_wool'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_staining'];}else{echo $rcek1['wash_staining'];}?></td>
          	<td>&nbsp;</td>
        </tr>
		<?php } ?>
		<?php if($rcek1['acid_colorchange']!="" or $rcek1['acid_acetate']!="" or $rcek1['acid_cotton']!="" or $rcek1['acid_nylon']!="" or $rcek1['acid_poly']!="" or $rcek1['acid_acrylic']!="" or $rcek1['acid_wool']!="" or $rcek1['acid_staining']!=""){?>
		<tr>
			<th rowspan="4" colspan="2">Perspiration Acid</th>
			<td><strong>CC</strong></td>
		    <td colspan="2"><strong>Ace</strong></td>
			<td><strong>Cot</strong></td>
		    <td colspan="2"><strong>Nyl</strong></td>
          	<td>&nbsp;</td>
      	</tr>
      	<tr>
		    <td ><?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_colorchange'];}else{echo $rcek1['acid_colorchange'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_acetate'];}else{echo $rcek1['acid_acetate'];}?></td>
			<td><?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_cotton'];}else{echo $rcek1['acid_cotton'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_nylon'];}else{echo $rcek1['acid_nylon'];}?></td>
          	<td>&nbsp;</td>
     	</tr>
    	<tr>
			<td><strong>Poly</strong></td>
		    <td colspan="2"><strong>Acr</strong></td>
			<td><strong>Wool</strong></td>
			<td colspan="2"><strong>Sta</strong></td>
          	<td>&nbsp;</td>
      	</tr>
		<tr>
		    <td><?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_poly'];}else{echo $rcek1['acid_poly'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_acrylic'];}else{echo $rcek1['acid_acrylic'];}?></td>
			<td><?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_wool'];}else{echo $rcek1['acid_wool'];}?></td>
			<td colspan="2"><?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_staining'];}else{echo $rcek1['acid_staining'];}?></td>
          	<td>&nbsp;</td>
		    <!--<td colspan="2"><?php echo $rcek1['acid_staining'];?></td>-->
	    </tr>
		<?php } ?>
		<?php if($rcek1['alkaline_colorchange']!="" or $rcek1['alkaline_acetate']!="" or $rcek1['alkaline_cotton']!="" or $rcek1['alkaline_nylon']!="" or $rcek1['alkaline_poly']!="" or $rcek1['alkaline_acrylic']!="" or $rcek1['alkaline_wool']!="" or $rcek1['alkaline_staining']!=""){?>
		<tr>
		    <th rowspan="4" colspan="2">Perspiration Alkaline</th>
          	<td><strong>CC</strong></td>
		    <td colspan="2"><strong>Ace</strong></td>
			<td><strong>Cot</strong></td>
		    <td colspan="2"><strong>Nyl</strong></td>
			<td>&nbsp;</td>
      	</tr>
      	<tr>
		    <td><?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_colorchange'];}else{echo $rcek1['alkaline_colorchange'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_acetate'];}else{echo $rcek1['alkaline_acetate'];}?></td>
			<td><?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_cotton'];}else{echo $rcek1['alkaline_cotton'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_nylon'];}else{echo $rcek1['alkaline_nylon'];}?></td>
          	<td>&nbsp;</td>
      	</tr>
      	<tr>
			<td><strong>Poly</strong></td>
		    <td colspan="2"><strong>Acr</strong></td>
			<td><strong>Wool</strong></td>
			<td colspan="2"><strong>Sta</strong></td>
          	<td>&nbsp;</td>
      	</tr>
		<tr>
		    <td><?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_poly'];}else{echo $rcek1['alkaline_poly'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_acrylic'];}else{echo $rcek1['alkaline_acrylic'];}?></td>
			<td><?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_wool'];}else{echo $rcek1['alkaline_wool'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_staining'];}else{echo $rcek1['alkaline_staining'];}?></td>
          	<td>&nbsp;</td>
			<!--<td colspan="2"><?php echo $rcek1['alkaline_staining'];?></td>-->
	    </tr>
		<?php } ?>
		<?php if($rcek1['water_colorchange']!="" or $rcek1['water_acetate']!="" or $rcek1['water_cotton']!="" or $rcek1['water_nylon']!="" or $rcek1['water_poly']!="" or $rcek1['water_acrylic']!="" or $rcek1['water_wool']!="" or $rcek1['water_staining']!=""){?>
		<tr>
		    <th rowspan="4" colspan="2">Water</th>
          	<td><strong>CC</strong></td>
		    <td colspan="2"><strong>Ace</strong></td>
			<td><strong>Cot</strong></td>
		    <td colspan="2"><strong>Nyl</strong></td>
			<td>&nbsp;</td>
      	</tr>
      	<tr>
		    <td><?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_colorchange'];}else{echo $rcek1['water_colorchange'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_acetate'];}else{echo $rcek1['water_acetate'];}?></td>
			<td><?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_cotton'];}else{echo $rcek1['water_cotton'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_nylon'];}else{echo $rcek1['water_nylon'];}?></td>
          	<td>&nbsp;</td>
      	</tr>
      	<tr>
			<td><strong>Poly</strong></td>
		    <td colspan="2"><strong>Acr</strong></td>
			<td><strong>Wool</strong></td>
			<td colspan="2"><strong>Sta</strong></td>
          	<td>&nbsp;</td>
      	</tr>
		<tr>
		    <td><?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_poly'];}else{echo $rcek1['water_poly'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_acrylic'];}else{echo $rcek1['water_acrylic'];}?></td>
			<td><?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_wool'];}else{echo $rcek1['water_wool'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_staining'];}else{echo $rcek1['water_staining'];}?></td>
          	<td>&nbsp;</td>
			<!--<td><?php echo $rcek1['water_staining'];?></td>-->
	    </tr>
		<?php } ?>
		<?php if($rcek1['crock_len1']!="" or $rcek1['crock_wid1']!="" or $rcek1['crock_len2']!="" or $rcek1['crock_wid2']!=""){?>
		<tr>
		    <th rowspan="3">Crocking</th>
			<th>Srt</th>
			<th>Dry</th>
			<th>Wet</th>
        </tr>
        <tr>
		    <th>Len</th>
		    <td><?php if($rcek1['stat_cr']=="RANDOM"){echo $rcekR['rcrock_len1'];}else{echo $rcek1['crock_len1'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_cr']=="RANDOM"){echo $rcekR['rcrock_len2'];}else{echo $rcek1['crock_len2'];}?></td>
	    </tr>
		<tr>
		    <th >Wid</th>
		    <td><?php if($rcek1['stat_cr']=="RANDOM"){echo $rcekR['rcrock_wid1'];}else{echo $rcek1['crock_wid1'];}?></td>
		    <td colspan="3"><?php if($rcek1['stat_cr']=="RANDOM"){echo $rcekR['rcrock_wid2'];}else{echo $rcek1['crock_wid2'];}?></td>
	    </tr>
		<?php } ?>
		<?php if($rcek1['phenolic_colorchange']!=""){?>
		<tr>
		    <th>Phenolic Yellowing</th>
			<th><strong>CC</strong></th>
		    <td colspan="4"><?php if($rcek1['stat_py']=="RANDOM"){echo $rcekR['rphenolic_colorchange'];}else{echo $rcek1['phenolic_colorchange'];}?></td>
	    </tr>
		<?php } ?>
		<?php if($rcek1['light_rating1']!="" or $rcek1['light_rating2']!=""){?>
		<tr>
		    <th>Light</th>
			<th>&nbsp;</th>
			<td><?php if($rcek1['stat_lg']=="RANDOM"){echo $rcekR['rlight_rating1'];}else{echo $rcek1['light_rating1'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_lg']=="RANDOM"){echo $rcekR['rlight_rating2'];}else{echo $rcek1['light_rating2'];}?></td>
	    </tr>
		<?php } ?>
		<?php if($rcek1['cm_printing_colorchange']!="" or $rcek1['cm_printing_staining']!=""){?>
		<tr>
		    <th>Color Migration Oven</th>
			<th>&nbsp;</th>
			<td colspan="3"><?php if($rcek1['stat_cmo']=="RANDOM"){echo $rcekR['rcm_printing_colorchange'];}else{echo $rcek1['cm_printing_colorchange'];}?></td>
		    <td><?php if($rcek1['stat_cmo']=="RANDOM"){echo $rcekR['rcm_printing_staining'];}else{echo $rcek1['cm_printing_staining'];}?></td>
	    </tr>
		<?php } ?>
		<?php if($rcek1['cm_dye_temp']!="" or $rcek1['cm_dye_colorchange']!="" or $rcek1['cm_dye_stainingface']!="" or $rcek1['cm_dye_stainingback']!=""){?>
		<tr>
		    <th rowspan="3">Color Migration</th>
			<th>Suhu</th>
		    <td colspan="4"><?php if($rcek1['stat_cm']=="RANDOM"){echo $rcekR['rcm_dye_temp'];}else{echo $rcek1['cm_dye_temp'];}?>&deg;</td>
	    </tr>
		<tr>
			<th>&nbsp;</th>
			<td><strong>CC</strong></td>
			<td><strong>Sta</strong></td>
		</tr>
		<tr>
        	<th>&nbsp;</th>
			<td><?php if($rcek1['stat_cm']=="RANDOM"){echo $rcekR['rcm_dye_colorchange'];}else{echo $rcek1['cm_dye_colorchange'];}?></td>
		    <td colspan="4"><?php if($rcek1['stat_cm']=="RANDOM"){echo $rcekR['rcm_dye_stainingface'];}else{echo $rcek1['cm_dye_stainingface'];}?></td>
			<!--<td><?php echo $rcek1['cm_dye_stainingback'];?></td>-->
		</tr>
		<?php } ?>
		<?php if($rcek1['light_pers_colorchange']!=""){?>
		<tr>
		    <th>Light Perspiration</th>
			<th><strong>CC</strong></th>
		    <td colspan="4"><?php if($rcek1['stat_lp']=="RANDOM"){echo $rcekR['rlight_pers_colorchange'];}else{echo $rcek1['light_pers_colorchange'];}?></td>
	    </tr>
		<?php } ?>
		<?php if($rcek1['saliva_staining']!=""){?>
		<tr>
		    <th>Saliva</th>
			<th>&nbsp;</th>
		    <td colspan="2"><?php if($rcek1['stat_slv']=="RANDOM"){echo $rcekR['rsaliva_staining'];}else{echo $rcek1['saliva_staining'];}?></td>
	    </tr>
		<?php } ?>
		<?php if($rcek1['bleeding']!=""){?>
		<tr>
		    <th>Bleeding</th>
			<th>&nbsp;</th>
		    <td colspan="2"><?php if($rcek1['stat_bld']=="RANDOM"){echo $rcekR['rbleeding'];}else{echo $rcek1['bleeding'];}?></td>
	    </tr>
		<?php } ?>
		<?php if($rcek1['chlorin']!="" or $rcek1['nchlorin1']!="" or $rcek1['nchlorin2']!=""){?>
		<tr>
		    <th>Chlorin</th>
			<th>&nbsp;</th>
		    <td colspan="2"><?php if($rcek1['stat_chl']=="RANDOM"){echo $rcekR['rchlorin'];}else{echo $rcek1['chlorin'];}?></td>
			<td>&nbsp;</td>
	    </tr>
		<tr>
		    <th>Non-Chlorin</th>
			<th>&nbsp;</th>
		    <td colspan="2"><?php if($rcek1['stat_nchl']=="RANDOM"){echo $rcekR['rnchlorin1'];}else{echo $rcek1['nchlorin1'];}?></td>
			<td colspan="2"><?php if($rcek1['stat_nchl']=="RANDOM"){echo $rcekR['rnchlorin2'];}else{echo $rcek1['nchlorin2'];}?></td>
	    </tr>
		<?php } ?>
		<?php if($rcek1['dye_tf_cstaining']!="" or $rcek1['dye_tf_acetate']!="" or $rcek1['dye_tf_cotton']!="" or $rcek1['dye_tf_nylon']!="" or $rcek1['dye_tf_poly']!="" or $rcek1['dye_tf_acrylic']!="" or $rcek1['dye_tf_wool']!="" or $rcek1['dye_tf_sstaining']!=""){
      		?>	
      	<tr>
		    <th rowspan="4" colspan="2">Dye Transfer</th>
			<td><strong>Ace</strong></td>
		    <td colspan="2"><strong>Cot</strong></td>
			<td><strong>Nyl</strong></td>
		    <td colspan="2"><strong>Poly</strong></td>
			<td>&nbsp;</td>
      	</tr>
		<tr>
			<th>&nbsp;</th>
			<td><?php if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_acetate'];}else{echo $rcek1['dye_tf_acetate'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_cotton'];}else{echo $rcek1['dye_tf_cotton'];}?></td>
			<td><?php if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_nylon'];}else{echo $rcek1['dye_tf_nylon'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_poly'];}else{echo $rcek1['dye_tf_poly'];}?></td>
          	<td>&nbsp;</td>
      	</tr>
      	<tr>
			<th>&nbsp;</th>
			<td><strong>Acr</strong></td>
		    <td colspan="2"><strong>Wool</strong></td>
			<td><strong>C.Sta</strong></td>
		    <td colspan="2"><strong>S.Sta</strong></td>
          	<td>&nbsp;</td>
      	</tr>
		<tr>
			<th>&nbsp;</th>
		    <td><?php if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_acrylic'];}else{echo $rcek1['dye_tf_acrylic'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_wool'];}else{echo $rcek1['dye_tf_wool'];}?></td>
			<td><?php if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_cstaining'];}else{echo $rcek1['dye_tf_cstaining'];}?></td>
		    <td colspan="2"><?php if($rcek1['stat_dye']=="RANDOM"){echo $rcekR['rdye_tf_sstaining'];}else{echo $rcek1['dye_tf_sstaining'];}?></td>
          	<td>&nbsp;</td>
        </tr>
		<?php } ?>
		  </table>
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
            <?php echo trim($rcek1['note_g']);?>
          </p>
        </div>  
        <!-- /.col -->
      </div>
      <!-- /.row --><!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <!--<div class="col-xs-12">
          <a href="pages/cetak/cetak_result.php?idkk=<?php echo $rcek['id'];?>&noitem=<?php echo $rcek['no_item'];?>&nohanger=<?php echo $rcek['no_hanger'];?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
        </div>-->
  </div>
</section>						
       <?php } ?> 

<?php
if($_POST['status_save']=="save" and $_POST['status']==""){
  echo "<script>swal({
    title: 'Status Tidak Tersimpan',   
    text: 'Status Tidak Boleh Kosong!!,
    type: 'info',
    }).then((result) => {
    if (result.value) {
      
     window.location.href='SummaryTQNokkNewFL-$nodemand'; 
    }
  });</script>";
}else if($_POST['status_save']=="save" and $cek1>0){
	$sqlST=mysqli_query($con,"UPDATE tbl_tq_test_fl SET
	`status`='$_POST[status]',
    `approve`='$_SESSION[nama1]',
	`tgl_update`=now(),
    penanggung_jawab_fl = '$_POST[penanggung_jawab_fl]' ,
    no_previous_report = '$_POST[no_previous_report]',
    tgl_previous_report = '$_POST[tgl_previous_report]',
    tgl_expired_report = '$_POST[tgl_expired_report]',
    tgl_target_kirim = '$_POST[tgl_target_kirim]',
    tgl_target_internal = '$_POST[tgl_target_internal]',
    note = '$_POST[note]'  
    WHERE `id_nokk`='$rd[idkk]'
	");
	if($sqlST){
	echo "<script>swal({
  title: 'Status Update',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='SummaryTQNokkNewFL-$nodemand'; 
  }
});</script>";
	}
}else if($_POST['status_save']=="save"){
	$sqlST=mysqli_query($con,"INSERT tbl_tq_test_fl SET
	`id_nokk`='$rd[idkk]',
	`status`='$_POST[status]',
    `approve`='$_SESSION[nama1]',
	`tgl_buat`=now(),
	`tgl_update`=now(),
    penanggung_jawab_fl = '$_POST[penanggung_jawab_fl]',
    no_previous_report = '$_POST[no_previous_report]' ,
    tgl_previous_report = '$_POST[tgl_previous_report]',
    tgl_expired_report = '$_POST[tgl_expired_report]',
    tgl_target_kirim = '$_POST[tgl_target_kirim]',
    tgl_target_internal = '$_POST[tgl_target_internal]',
	");
	if($sqlST){
	echo "<script>swal({
  title: 'Status save',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
    
	 window.location.href='SummaryTQNokkNewFL-$nodemand'; 
  }
});</script>";
	}
}
if($nodemand!="" and $cekd==0){
    echo "<script>swal({
 title: 'No Demand Tidak Ditemukan',   
 text: 'Klik Ok untuk input data kembali',
 type: 'info',
 }).then((result) => {
 if (result.value) {
   
    window.location.href='SummaryTQNokkNewFL'; 
 }
});</script>";
}
?>