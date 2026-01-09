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
                        <h4 class="modal-title">Standard Stretch &amp; Recovery</h4>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="hasil_test" class="col-md-2 control-label">Hasil Test</label>
                                <div class="col-md-8">
                                    <textarea name="hasil_test" class="form-control" placeholder="" rows="10">Stretch :<?php if($r['load_stretch']!="" or $rcekR['rload_stretch']!=""){?>&#13;&#10;Load= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rload_stretch'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['dload_stretch'];}else{echo $r['load_stretch'];}?>N<?php } ?>
                                    &#13;&#10;Len :<?php if($r['stretch_l1']!="" or $rcekR['rstretch_l1']!=""){?>&#13;&#10;L1= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rstretch_l1'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_l1'];}else{echo $r['stretch_l1'];}?><?php } ?>
                                    <?php if($r['stretch_l2']!="" or $rcekR['rstretch_l2']!=""){?>&#13;&#10;L2= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rstretch_l2'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_l2'];}else{echo $r['stretch_l2'];}?><?php } ?>
                                    <?php if($r['stretch_l3']!="" or $rcekR['rstretch_l3']!=""){?>&#13;&#10;L3= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rstretch_l3'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_l3'];}else{echo $r['stretch_l3'];}?><?php } ?>
                                    <?php if($r['stretch_l4']!="" or $rcekR['rstretch_l4']!=""){?>&#13;&#10;L4= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rstretch_l4'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_l4'];}else{echo $r['stretch_l4'];}?><?php } ?>
                                    <?php if($r['stretch_l5']!="" or $rcekR['rstretch_l5']!=""){?>&#13;&#10;L5= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rstretch_l5'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_l5'];}else{echo $r['stretch_l5'];}?><?php } ?>
                                    &#13;&#10;Width :<?php if($r['stretch_w1']!="" or $rcekR['rstretch_w1']!=""){?>&#13;&#10;W1= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rstretch_w1'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_w1'];}else{echo $r['stretch_w1'];}?><?php } ?>
                                    <?php if($r['stretch_w2']!="" or $rcekR['rstretch_w2']!=""){?>&#13;&#10;W2= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rstretch_w2'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_w2'];}else{echo $r['stretch_w2'];}?><?php } ?>
                                    <?php if($r['stretch_w3']!="" or $rcekR['rstretch_w3']!=""){?>&#13;&#10;W3= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rstretch_w3'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_w3'];}else{echo $r['stretch_w3'];}?><?php } ?>
                                    <?php if($r['stretch_w4']!="" or $rcekR['rstretch_w4']!=""){?>&#13;&#10;W4= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rstretch_w4'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_w4'];}else{echo $r['stretch_w4'];}?><?php } ?>
                                    <?php if($r['stretch_w5']!="" or $rcekR['rstretch_w5']!=""){?>&#13;&#10;W5= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rstretch_w5'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_w5'];}else{echo $r['stretch_w5'];}?><?php } ?>
                                    
                                    &#13;&#10;Recovery :&#13;&#10;Len :<?php if($r['recover_l1']!="" or $rcekR['rrecover_l1']!=""){?>&#13;&#10;L1= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rrecover_l1'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_l1'];}else{echo $r['recover_l1'];}?><?php } ?>
                                    <?php if($r['recover_l11']!="" or $rcekR['rrecover_l11']!=""){?>&#13;&#10;L2= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rrecover_l11'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_l11'];}else{echo $r['recover_l11'];}?><?php } ?>
                                    <?php if($r['recover_l3']!="" or $rcekR['rrecover_l3']!=""){?>&#13;&#10;L3= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rrecover_l3'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_l3'];}else{echo $r['recover_l3'];}?><?php } ?>
                                    <?php if($r['recover_l4']!="" or $rcekR['rrecover_l4']!=""){?>&#13;&#10;L4= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rrecover_l4'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_l4'];}else{echo $r['recover_l4'];}?><?php } ?>
                                    <?php if($r['recover_l5']!="" or $rcekR['rrecover_l5']!=""){?>&#13;&#10;L5= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rrecover_l5'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_l5'];}else{echo $r['recover_l5'];}?><?php } ?>
                                    &#13;&#10;Width :<?php if($r['recover_w1']!="" or $rcekR['rrecover_w1']!=""){?>&#13;&#10;W1= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rrecover_w1'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_w1'];}else{echo $r['recover_w1'];}?><?php } ?>
                                    <?php if($r['recover_w11']!="" or $rcekR['rrecover_w11']!=""){?>&#13;&#10;W2= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rrecover_w11'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_w11'];}else{echo $r['recover_w11'];}?><?php } ?>
                                    <?php if($r['recover_w3']!="" or $rcekR['rrecover_w3']!=""){?>&#13;&#10;W3= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rrecover_w3'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_w3'];}else{echo $r['recover_w3'];}?><?php } ?>
                                    <?php if($r['recover_w4']!="" or $rcekR['rrecover_w4']!=""){?>&#13;&#10;W4= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rrecover_w4'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_w4'];}else{echo $r['recover_w4'];}?><?php } ?>
                                    <?php if($r['recover_w5']!="" or $rcekR['rrecover_w5']!=""){?>&#13;&#10;W5= <?php if($r['stat_sr']=="RANDOM"){echo $rcekR['rrecover_w5'];}else if($r['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_w5'];}else{echo $r['recover_w5'];}?><?php } ?>
                                    </textarea>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="sr" class="col-md-2 control-label">Standard</label>
                                <div class="col-md-8">
                                    <textarea name="sr" class="form-control" placeholder="" rows="17">Stretch: &#13;&#10;Fabric: &#13;&#10;(length & width direction at 60N) &#13;&#10;High EL (>8%) &#13;&#10;Warp: >100% X 80% / >80% X 100% &#13;&#10;Weft: > 70% X 90% / >90% X 70% &#13;&#10;Low EL (< 8%) &#13;&#10;Warp & Weft: >80% X 30% / >30% X 80% &#13;&#10;Rib as Trims: (width direction at 22N): &ge;80% &#13;&#10;Rib : (width direction at 22N):&ge;100% 
                                    &#13;&#10;&nbsp; &#13;&#10;Recovery: &#13;&#10;Fabric: &#13;&#10;(length & width direction at 60N) &#13;&#10;High EL (>8%): Warp & Weft: >90% &#13;&#10;Low EL (< 8%): Warp & Weft: >85% &#13;&#10;Ribs: (width direction at 22N) &#13;&#10;High EL (>8%): Warp & Weft: >90% &#13;&#10;Low EL (< 8%): Warp & Weft: >85%
                                    </textarea>
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