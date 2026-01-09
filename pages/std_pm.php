<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
$modal_id=$_GET['id'];
$modal=mysqli_query($con,"SELECT a.*, a.id as id_a, b.*, c.* From tbl_tq_nokk a 
INNER JOIN tbl_master_test b ON a.no_test=b.no_testmaster
INNER JOIN tbl_tq_test c ON a.id=c.id_nokk
WHERE a.no_test='$modal_id'");
while($r=mysqli_fetch_array($modal)){
    $sqlCekR=mysqli_query($con,"SELECT *,
	CONCAT_WS(' ',rfc_note,rph_note, rabr_note, rbas_note, rdry_note, rfla_note, rfwe_note, rfwi_note, rburs_note,rrepp_note,rwick_note,rabsor_note,rapper_note,rfiber_note,rpillb_note,rpillm_note,rpillr_note,rthick_note,rgrowth_note,rrecover_note,rstretch_note,rsns_note,rsnab_note,rsnam_note,rsnap_note,rwash_note,rwater_note,racid_note,ralkaline_note,rcrock_note,rphenolic_note,rcm_printing_note,rcm_dye_note,rlight_note,rlight_pers_note,rsaliva_note,rh_shrinkage_note,rfibre_note,rpilll_note,rsoil_note,rapperss_note,rbleeding_note,rchlorin_note,rdye_tf_note,rhumidity_note,rodour_note) AS rnote_g FROM tbl_tq_randomtest WHERE no_item='$r[no_item]' OR no_hanger='$r[no_hanger]'");
    $cekR=mysqli_num_rows($sqlCekR);
    $rcekR=mysqli_fetch_array($sqlCekR);
    $sqlCekD=mysqli_query($con,"SELECT *,
        CONCAT_WS(' ',dfc_note,dph_note, dabr_note, dbas_note, ddry_note, dfla_note, dfwe_note, dfwi_note, dburs_note,drepp_note,dwick_note,dabsor_note,dapper_note,dfiber_note,dpillb_note,dpillm_note,dpillr_note,dthick_note,dgrowth_note,drecover_note,dstretch_note,dsns_note,dsnab_note,dsnam_note,dsnap_note,dwash_note,dwater_note,dacid_note,dalkaline_note,dcrock_note,dphenolic_note,dcm_printing_note,dcm_dye_note,dlight_note,dlight_pers_note,dsaliva_note,dh_shrinkage_note,dfibre_note,dpilll_note,dsoil_note,dapperss_note,dbleeding_note,dchlorin_note,ddye_tf_note,dhumidity_note,dodour_note) AS dnote_g FROM tbl_tq_disptest WHERE id_nokk='$r[id_a]' ORDER BY id DESC LIMIT 1");
    $cekD=mysqli_num_rows($sqlCekD);
    $rcekD=mysqli_fetch_array($sqlCekD);
?>
         
<div class="modal-dialog modal1">
        <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Standard Pilling Martindle</h4>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="hasil_test" class="col-md-2 control-label">Hasil Test</label>
                                <div class="col-md-8">
                                    <textarea name="hasil_test" class="form-control" placeholder="" rows="10">Face :<?php if($r['pm_f1']!="" or $rcekR['rpm_f1']!=""){?>&#13;&#10;F1= <?php if($r['stat_pm']=="RANDOM"){echo $rcekR['rpm_f1'];}else if($r['stat_pm']=="DISPOSISI"){echo $rcekD['dpm_f1'];}else{echo $r['pm_f1'];}?><?php } ?>
                                    <?php if($r['pm_f2']!="" or $rcekR['rpm_f2']!=""){?>&#13;&#10;F2= <?php if($r['stat_pm']=="RANDOM"){echo $rcekR['rpm_f2'];}else if($r['stat_pm']=="DISPOSISI"){echo $rcekD['dpm_f2'];}else{echo $r['pm_f2'];}?><?php } ?>
                                    <?php if($r['pm_f3']!="" or $rcekR['rpm_f3']!=""){?>&#13;&#10;F3= <?php if($r['stat_pm']=="RANDOM"){echo $rcekR['rpm_f3'];}else if($r['stat_pm']=="DISPOSISI"){echo $rcekD['dpm_f3'];}else{echo $r['pm_f3'];}?><?php } ?>
                                    <?php if($r['pm_f4']!="" or $rcekR['rpm_f4']!=""){?>&#13;&#10;F4= <?php if($r['stat_pm']=="RANDOM"){echo $rcekR['rpm_f4'];}else if($r['stat_pm']=="DISPOSISI"){echo $rcekD['dpm_f4'];}else{echo $r['pm_f4'];}?><?php } ?>
                                    <?php if($r['pm_f5']!="" or $rcekR['rpm_f5']!=""){?>&#13;&#10;F5= <?php if($r['stat_pm']=="RANDOM"){echo $rcekR['rpm_f5'];}else if($r['stat_pm']=="DISPOSISI"){echo $rcekD['dpm_f5'];}else{echo $r['pm_f5'];}?><?php } ?>
                                    &#13;&#10;Back :<?php if($r['pm_b1']!="" or $rcekR['rpm_b1']!=""){?>&#13;&#10;B1= <?php if($r['stat_pm']=="RANDOM"){echo $rcekR['rpm_b1'];}else if($r['stat_pm']=="DISPOSISI"){echo $rcekD['dpm_b1'];}else{echo $r['pm_b1'];}?><?php } ?>
                                    <?php if($r['pm_b2']!="" or $rcekR['rpm_b2']!=""){?>&#13;&#10;B2= <?php if($r['stat_pm']=="RANDOM"){echo $rcekR['rpm_b2'];}else if($r['stat_pm']=="DISPOSISI"){echo $rcekD['dpm_b2'];}else{echo $r['pm_b2'];}?><?php } ?>
                                    <?php if($r['pm_b3']!="" or $rcekR['rpm_b3']!=""){?>&#13;&#10;B3= <?php if($r['stat_pm']=="RANDOM"){echo $rcekR['rpm_b3'];}else if($r['stat_pm']=="DISPOSISI"){echo $rcekD['dpm_b3'];}else{echo $r['pm_b3'];}?><?php } ?>
                                    <?php if($r['pm_b4']!="" or $rcekR['rpm_b4']!=""){?>&#13;&#10;B4= <?php if($r['stat_pm']=="RANDOM"){echo $rcekR['rpm_b4'];}else if($r['stat_pm']=="DISPOSISI"){echo $rcekD['dpm_b4'];}else{echo $r['pm_b4'];}?><?php } ?>
                                    <?php if($r['pm_b5']!="" or $rcekR['rpm_b5']!=""){?>&#13;&#10;B5= <?php if($r['stat_pm']=="RANDOM"){echo $rcekR['rpm_b5'];}else if($r['stat_pm']=="DISPOSISI"){echo $rcekD['dpm_b5'];}else{echo $r['pm_b5'];}?><?php } ?>
                                    </textarea>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="pm" class="col-md-2 control-label">Standard</label>
                                <div class="col-md-8">
                                    <textarea name="pm" class="form-control" placeholder="">500rev.: &ge;3-4*(3 for cotton content) &#13;&#10;2000rev.: &ge;3-4*(3 for cotton content)</textarea>
                                </div>
                        </div>
		        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-primary" <?php if($_SESSION['lvl_id']!="LEADERTQ"){echo "disabled"; } ?> >Save Changes</button> -->
                    <!--<?php if($_SESSION['lvl_id']!="ADMIN"){echo "disabled"; } ?>-->
                </div>
            </form>
        </div>
            <!-- /.modal-content -->
</div>
          <!-- /.modal-dialog -->
          <?php } ?>