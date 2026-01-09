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
                        <h4 class="modal-title">Standard Shringkage and Spirality</h4>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="hasil_test" class="col-md-2 control-label">Hasil Test</label>
                                <div class="col-md-8">
                                    <textarea name="hasil_test" class="form-control" placeholder="" rows="10">Shrinkage Length :<?php if($r['shrinkage_l1']!="" or $rcekR['rshrinkage_l1']!=""){?>&#13;&#10;L1= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l1'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_l1'];}else{echo $r['shrinkage_l1'];}?><?php } ?>
                                    <?php if($r['shrinkage_l2']!="" or $rcekR['rshrinkage_l2']!=""){?>&#13;&#10;L2= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l2'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_l2'];}else{echo $r['shrinkage_l2'];}?><?php } ?>
                                    <?php if($r['shrinkage_l3']!="" or $rcekR['rshrinkage_l3']!=""){?>&#13;&#10;L3= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l3'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_l3'];}else{echo $r['shrinkage_l3'];}?><?php } ?>
                                    <?php if($r['shrinkage_l4']!="" or $rcekR['rshrinkage_l4']!=""){?>&#13;&#10;L4= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l4'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_l4'];}else{echo $r['shrinkage_l4'];}?><?php } ?>
                                    <?php if($r['shrinkage_l5']!="" or $rcekR['rshrinkage_l5']!=""){?>&#13;&#10;L5= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l5'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_l5'];}else{echo $r['shrinkage_l5'];}?><?php } ?>
                                    <?php if($r['shrinkage_l6']!="" or $rcekR['rshrinkage_l6']!=""){?>&#13;&#10;L6= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l6'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_l6'];}else{echo $r['shrinkage_l6'];}?><?php } ?>
                                    &#13;&#10;Shrinkage Width :<?php if($r['shrinkage_w1']!="" or $rcekR['rshrinkage_w1']!=""){?>&#13;&#10;W1= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w1'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_w1'];}else{echo $r['shrinkage_w1'];}?><?php } ?>
                                    <?php if($r['shrinkage_w2']!="" or $rcekR['rshrinkage_w2']!=""){?>&#13;&#10;W2= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w2'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_w2'];}else{echo $r['shrinkage_w2'];}?><?php } ?>
                                    <?php if($r['shrinkage_w3']!="" or $rcekR['rshrinkage_w3']!=""){?>&#13;&#10;W3= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w3'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_w3'];}else{echo $r['shrinkage_w3'];}?><?php } ?>
                                    <?php if($r['shrinkage_w4']!="" or $rcekR['rshrinkage_w4']!=""){?>&#13;&#10;W4= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w4'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_w4'];}else{echo $r['shrinkage_w4'];}?><?php } ?>
                                    <?php if($r['shrinkage_w5']!="" or $rcekR['rshrinkage_w5']!=""){?>&#13;&#10;W5= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w5'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_w5'];}else{echo $r['shrinkage_w5'];}?><?php } ?>
                                    <?php if($r['shrinkage_w6']!="" or $rcekR['rshrinkage_w6']!=""){?>&#13;&#10;W6= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w6'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_w6'];}else{echo $r['shrinkage_w6'];}?><?php } ?>
                                    &#13;&#10;Spirality :<?php if($r['spirality1']!="" or $rcekR['rspirality1']!=""){?>&#13;&#10;S1= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rspirality1'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dspirality1'];}else{echo $r['spirality1'];}?><?php } ?>
                                    <?php if($r['spirality2']!="" or $rcekR['rspirality2']!=""){?>&#13;&#10;S2= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rspirality2'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dspirality2'];}else{echo $r['spirality2'];}?><?php } ?>
                                    <?php if($r['spirality3']!="" or $rcekR['rspirality3']!=""){?>&#13;&#10;S3= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rspirality3'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dspirality3'];}else{echo $r['spirality3'];}?><?php } ?>
                                    <?php if($r['spirality4']!="" or $rcekR['rspirality4']!=""){?>&#13;&#10;S4= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rspirality4'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dspirality4'];}else{echo $r['spirality4'];}?><?php } ?>
                                    <?php if($r['spirality5']!="" or $rcekR['rspirality5']!=""){?>&#13;&#10;S5= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rspirality5'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dspirality5'];}else{echo $r['spirality5'];}?><?php } ?>
                                    <?php if($r['spirality6']!="" or $rcekR['rspirality6']!=""){?>&#13;&#10;S6= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rspirality6'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dspirality6'];}else{echo $r['spirality6'];}?><?php } ?>
                                    &#13;&#10;Appearance :<?php if($r['apperss_ch1']!="" or $rcekR['rapperss_ch1']!=""){?>&#13;&#10;Apper1= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_ch1'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dapperss_ch1'];}else{echo $r['apperss_ch1'];}?><?php } ?>
                                    <?php if($r['apperss_ch2']!="" or $rcekR['rapperss_ch2']!=""){?>&#13;&#10;Apper2= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_ch2'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dapperss_ch2'];}else{echo $r['apperss_ch2'];}?><?php } ?>
                                    <?php if($r['apperss_ch3']!="" or $rcekR['rapperss_ch3']!=""){?>&#13;&#10;Apper3= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_ch3'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dapperss_ch3'];}else{echo $r['apperss_ch3'];}?><?php } ?>
                                    &#13;&#10;Colorchange :<?php if($r['apperss_cc1']!="" or $rcekR['rapperss_cc1']!=""){?>&#13;&#10;CC1= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_cc1'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dapperss_cc1'];}else{echo $r['apperss_cc1'];}?><?php } ?>
                                    <?php if($r['apperss_cc2']!="" or $rcekR['rapperss_cc2']!=""){?>&#13;&#10;CC2= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_cc2'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dapperss_cc2'];}else{echo $r['apperss_cc2'];}?><?php } ?>
                                    <?php if($r['apperss_cc3']!="" or $rcekR['rapperss_cc3']!=""){?>&#13;&#10;CC3= <?php if($r['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_cc3'];}else if($r['stat_fwss']=="DISPOSISI"){echo $rcekD['dapperss_cc3'];}else{echo $r['apperss_cc3'];}?><?php } ?>
                                    </textarea>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="ss" class="col-md-2 control-label">Standard</label>
                                <div class="col-md-8">
                                    <textarea name="ss" class="form-control" placeholder="" rows="4">Cotton, cvc: -8/+1% &#13;&#10;Poly, tc: -7/+1% &#13;&#10;Rib : L = -6/+1%, W = -12/+1% &#13;&#10;Skew : 5%</textarea>
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