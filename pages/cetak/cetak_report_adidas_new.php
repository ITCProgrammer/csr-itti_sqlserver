<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
$idkk=$_GET['idkk'];
$noitem=$_GET['noitem'];
$nohanger=$_GET['nohanger'];
//--
//$idkk=$_REQUEST['idkk'];
//$noitem=$_REQUEST['noitem'];
//$nohanger=$_REQUEST['nohanger'];
$act=$_GET['g'];
$now=date("Y-m-d");
$data=mysqli_query($con,"SELECT a.*,
	CONCAT_WS(' ',a.fc_note,a.ph_note, a.abr_note, a.bas_note, a.fla_note, a.fwe_note, a.fwi_note, a.burs_note,a.repp_note,a.apper_note,a.fiber_note,a.pillb_note,a.pillm_note,a.pillr_note,a.thick_note,a.growth_note,a.recover_note,a.stretch_note,a.sns_note,
	a.snab_note,a.snam_note,a.snap_note,a.wash_note,a.water_note,a.acid_note,a.alkaline_note,a.crock_note,a.phenolic_note,a.cm_printing_note,
	a.cm_dye_note,a.light_note,a.light_pers_note,a.saliva_note,a.h_shrinkage_note,a.fibre_note,a.pilll_note,a.soil_note,a.apperss_note,a.bleeding_note,a.chlorin_note,a.dye_tf_note,a.odour_note,a.apperss_pf1,a.apperss_pb1,a.apperss_pf2,a.apperss_pb2,a.apperss_pf3,a.apperss_pb3) AS note_g ,
	b.spirality_status
	FROM tbl_tq_test a
	LEFT JOIN tbl_tq_test_2 b on (a.id_nokk = b.id_nokk)
	WHERE a.id_nokk='$idkk' ORDER BY a.id DESC LIMIT 1");
$rcek1=mysqli_fetch_array($data);

//echo '<pre>';
	//print_r($rcek1);
//echo '</pre>';

$databs=mysqli_query($con,"SELECT *,
	CONCAT_WS(' ',bas_note) AS note_bs,ss_cmt,apperss_note FROM tbl_tq_test WHERE id_nokk='$idkk' ORDER BY id DESC LIMIT 1");
$rcekbs=mysqli_fetch_array($databs);
$sqlCekR=mysqli_query($con,"SELECT *,
	CONCAT_WS(' ',rfc_note,rph_note, rabr_note, rbas_note, rfla_note, rfwe_note, rfwi_note, rburs_note,rrepp_note,rapper_note,rfiber_note,rpillb_note,rpillm_note,rpillr_note,rthick_note,rgrowth_note,rrecover_note,rstretch_note,rsns_note,rsnab_note,rsnam_note,rsnap_note,rwash_note,rwater_note,racid_note,ralkaline_note,rcrock_note,rphenolic_note,rcm_printing_note,rcm_dye_note,rlight_note,rlight_pers_note,rsaliva_note,rh_shrinkage_note,rfibre_note,rpilll_note,rsoil_note,rapperss_note,rbleeding_note,rchlorin_note,rdye_tf_note,rodour_note) AS rnote_g FROM tbl_tq_randomtest WHERE no_item='$noitem' OR no_hanger='$nohanger'");
$rcekR=mysqli_fetch_array($sqlCekR);
$sqlCekD=mysqli_query($con,"SELECT *,
	CONCAT_WS(' ',dfc_note,dph_note, dabr_note, dbas_note, dfla_note, dfwe_note, dfwi_note, dburs_note,drepp_note,dapper_note,dfiber_note,dpillb_note,dpillm_note,dpillr_note,dthick_note,dgrowth_note,drecover_note,dstretch_note,dsns_note,dsnab_note,dsnam_note,dsnap_note,dwash_note,dwater_note,dacid_note,dalkaline_note,dcrock_note,dphenolic_note,dcm_printing_note,dcm_dye_note,dlight_note,dlight_pers_note,dsaliva_note,dh_shrinkage_note,dfibre_note,dpilll_note,dsoil_note,dapperss_note,dbleeding_note,dchlorin_note,ddye_tf_note,dodour_note) AS dnote_g FROM tbl_tq_disptest WHERE id_nokk='$idkk' ORDER BY id DESC LIMIT 1");
$rcekD=mysqli_fetch_array($sqlCekD);
$data1=mysqli_query($con,"SELECT nodemand,nokk FROM tbl_tq_nokk WHERE id='$idkk'");
$rd=mysqli_fetch_array($data1);
$data2=mysqli_query($con,"SELECT a.*,b.hangtag FROM tbl_tq_nokk a LEFT JOIN tbl_master_hangtag b ON a.no_item = b.no_item WHERE a.id='$idkk'");
$rd2=mysqli_fetch_array($data2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Print Report Adidas</title>
<style>
.hurufvertical {
 writing-mode:tb-rl;
    -webkit-transform:rotate(-90deg);
    -moz-transform:rotate(-90deg);
    -o-transform: rotate(-90deg);
    -ms-transform:rotate(-90deg);
    transform: rotate(180deg);
    white-space:nowrap;
    float:left;
}	

input{
text-align:center;
border:hidden;
}
@media print {
  ::-webkit-input-placeholder { /* WebKit browsers */
      color: transparent;
  }
  :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
      color: transparent;
  }
  ::-moz-placeholder { /* Mozilla Firefox 19+ */
      color: transparent;
  }
  :-ms-input-placeholder { /* Internet Explorer 10+ */
      color: transparent;
  }
  .pagebreak { page-break-before:always; }
  .header {display:block}
  table thead 
   {
    display: table-header-group;
   }
}	
</style>
</head>

<body>
<table width="100%">
    <thead>
            <td><table width="100%" border="0" class="table-list1">  
                <tr>
                    <td align="center" colspan="8" valign="middle" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;"><strong><font size="-2" >FABRIC TEST REPORT</font> <br> 
                    FW-12-QCF-04/07</strong></td>
                </tr>
                <tr>
                    <td align="right" colspan="8" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;"><img src="adidas.jpg" width="130" height="30"/></td>
                </tr>
                <tr>
                    <td align="left" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">Test Report No. ITC<?php echo $rd2['no_test'];?></td>
                    <td align="left" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">Submission No. -</td>
                    <td align="right" style="border-top:0px #000000 solid; 
                                border-bottom:0px #000000 solid;
                                border-left:0px #000000 solid; 
                                border-right:0px #000000 solid;">Version : Apr. 2023</td>
                </tr>
                </table>
                <table width="100%" border="1" class="table-list1">
                <tr>
                    <td align="left" colspan="10"><strong><font size="-2" >MATERIAL SPESIFICATION:</font></strong></td>
                </tr>
                <tr>
                    <td align="left" style="font-size: 8px;">Testing Type:</td>
                    <td align="left" style="font-size: 8px;">New Development Testing (<?php if($rd2['development']=="Development"){echo "&#10003";}?>)</td>
                    <td colspan="4" align="left" style="font-size: 8px;">1st Bulk Testing (<?php if($rd2['development']=="1st Bulk"){echo "&#10003";}?>)</td>
                    <td colspan="4" align="left" style="font-size: 8px;">Reorder Testing (<?php if($rd2['development']=="Reorder"){echo "&#10003";}?>)</td>
                </tr>
                <tr>
                    <td align="left" style="font-size: 8px;">Material Supplier</td>
                    <td align="left" style="font-size: 8px;">Indo Taichen Textile Industry</td>
                    <td align="left" style="font-size: 8px;">Season :</td>
                    <td colspan="3" align="left" style="font-size: 8px;"><?php echo $rd2['season'];?></td>
                    <td align="left" style="font-size: 8px;">Color Code/Name :</td>
                    <td align="left" style="font-size: 8px;"><?php echo $rd2['warna'];?></td>
                    <td align="left" style="font-size: 8px;">Color No: </td>
                    <td align="left" style="font-size: 8px;"><?php echo $rd2['no_warna'];?></td>
                </tr>
                <tr>
                    <td align="left" style="font-size: 8px;">adidas No.:</td>
                    <td align="left" style="font-size: 8px;"><?php echo $rd2['no_item'];?></td>
                    <td align="left" style="font-size: 8px;">Weight:</td>
                    <td align="left" style="font-size: 8px;"><?php echo $rd2['gramasi'];?>g/m<sup>2</sup></td>
                    <td align="left" style="font-size: 8px;"> Width:</td>
                    <td align="left" style="font-size: 8px;"><?php echo $rd2['lebar'];?> 
                    <select name="inch" style="border:none;font-size: 8px;-webkit-appearance: none;">
                        <option value="inch">inch</option>
                        <option value="cm">cm</option>
                    </select></td>
                    <?php
                    $sql = "SELECT * From tbl_tq_nokk WHERE id='$idkk'";
                    $result=mysqli_query($con,$sql);
                    while($row=mysqli_fetch_array($result)){ 
                    $detail=explode(",",$row['jenis_kain']);?>
                    <td align="left" style="font-size: 8px;">AOP CCN: </td>
                    <td colspan="3" align="left" style="font-size: 8px;"><?php if($detail[2]!=""){echo $detail[2];}else{echo "";}?></td>
                </tr>
                <tr>
                    <td align="left" style="font-size: 8px;">Garment Factory:</td>
                    <td align="left" style="font-size: 8px;"><?php echo $rd2['pelanggan'];?></td>
                    <td align="left" style="font-size: 8px;">PO Number:</td>
                    <td colspan="3" align="left" style="font-size: 8px;"><?php echo $rd2['no_po'];?></td>
                    <td align="left" style="font-size: 8px;">Order:</td>
                    <td align="left" style="font-size: 8px;"><?php echo $rd2['no_order'];?></td>
                    <td align="left" style="font-size: 8px;">Lot: </td>
                    <td align="left" style="font-size: 8px;"><?php if($rd2['lot_new']!=''){echo $rd2['lot_new'];}else{echo $rd2['lot'];}?></td>
                </tr>
                <tr>
                    <td align="left" style="font-size: 8px;">Supplier Ref.:</td>
                    <td align="left" style="font-size: 8px;">134001</td>
                    <td align="left" style="font-size: 8px;">Construction/Finish:</td>
                    <td colspan="3" align="left" style="font-size: 8px;"><?php if($detail[1]!=""){echo $detail[1];}else{echo "";}?></td>
                    <td align="left" style="font-size: 8px;"><strong>Hangtag: </strong></td>
                    <td colspan="3" align="left" style="font-size: 8px;"><?php echo $rd2['hangtag'];?></td>
                </tr>
                <tr>
                    <td align="left" style="font-size: 8px;"><strong>Fabric Type / Composition: </strong></td>
                    <td align="left" style="font-size: 8px;"><?php if($detail[0]!=""){echo $detail[0];}else{echo "";}?></td>
                    <td colspan="8" align="left" style="font-size: 8px;"><strong>Remarks: </strong></td>
                </tr>
                <?php } ?>
            </table></td>
        
    </thead>
    <tr>
        <td colspan="9" align="center" style="font-size: 11px;"><strong>Fabric Physical Tests</strong></td>
    </tr>
    <tr>
        <td><table width="100%" border="1" class="table-list1">
            <tr>
            <thead>	  
                <tr>
                    <td width="4%" rowspan="4" style="font-size: 8px;"><div align="center"><strong>Method ID</strong></div></td>
                    <td width="4%" rowspan="4" style="font-size: 8px;"><div align="left"><strong>Fabric<br>Tech.<br>K: Knit<br>W: Woven</strong></div></td>
                    <td width="4%" rowspan="4" style="font-size: 8px;"><div align="left"><strong>Composition<br>N: Natural<br>S: Synthetic</strong></div></td>
                    <td width="11%" rowspan="4" style="font-size: 8px;"><div align="center"><strong>Test Standard Name</strong></div></td>
                    <td width="13%" rowspan="4" style="font-size: 8px;"><div align="center"><strong>Minimum Requirements<br>Underlined requirements are mandatory<br>on material level!</strong></div></td>
                    <td width="4%" rowspan="4" style="font-size: 8px;"><div align="center"><strong>Test Result</strong></div></td>
                    <td width="4%" rowspan="4" style="font-size: 8px;"><div align="center"><strong>Test Details</strong></div></td>
                    <td width="2%" rowspan="4" style="font-size: 8px;"><div align="center"><strong>A</strong></div></td>
                    <td width="2%" rowspan="4" style="font-size: 8px;"><div align="center"><strong>R</strong></div></td>
                </tr>
            </thead>
            </tr>
        <!--Dimensional Change & Spirality & Appearance-->
        <tr>
            <td align="left" rowspan="4" style="font-size: 8px;" valign="top"><strong>PHX-AP0701</strong></td>
            <td align="center" rowspan="4" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" rowspan="4" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" rowspan="4" style="font-size: 8px;" valign="top"><strong>Dimensional Change<br><br>Spirality<br>Appearance Change After Laundering</strong><br>30&deg;C (<?php if($rcek1['ss_temp']=='30'){echo "&#10003;"; }?>) ref.only<br>40&deg;C (<?php if($rcek1['ss_temp']=='40'){echo "&#10003;"; }?>)<br>60&deg;C (<?php if($rcek1['ss_temp']=='60'){echo "&#10003;"; }?>)<br>Please Place &#10003; Againts Appropriate Test<br>Temperature<br><br><br>Drying method:<br>(<?php if($rcek1['ss_linedry']=='1'){echo "&#10003;"; }?>) line dry<br>(<?php if($rcek1['ss_tumbledry']=='1'){echo "&#10003;"; }?>) tumble dry</td>
            <td align="left" style="font-size: 8px;">See Test Method<br>X1 Wash<br>Spirality<br>Appearance: No Obvious Change<br>Pilling (Face/Back)<br>colour change of &ge; 4-5</td>
            <td align="center" style="font-size: 8px;" >
			<?php if($rcekR['rapperss_pf1']=="4-5" ){ $ketRF1="PASS";}else{$ketRF1="FAIL";}
				  if($rcekD['dapperss_pf1']=="4-5" ){ $ketDF1="PASS";}else{$ketDF1="FAIL";}
				  if($rcek1['apperss_pf1']=="4-5"){ $ketF1="PASS";}else{$ketF1="FAIL";}
				  if(($rcekR['rapperss_pb1']=="4-5" or $rcekR['rapperss_pb1']=="4")){ $ketRB1="PASS";}else{$ketRB1="FAIL";}
				  if(($rcekD['dapperss_pb1']=="4-5" or $rcekD['dapperss_pb1']=="4")){ $ketDB1="PASS";}else{$ketDB1="FAIL";}
				  if(($rcek1['apperss_pb1']=="4-5" or $rcek1['apperss_pb1']=="4")){ $ketB1="PASS";}else{$ketB1="FAIL";}
				  if($rcekR['rapperss_pb1']!=""){$ketR1=$ketRF1."/".$ketRB1;}else{ $ketR1=="";}
				  if($rcekD['dapperss_pb1']!=""){$ketD1=$ketDF1."/".$ketDB1;}else{ $ketD1=="";}
				  if($rcek1['apperss_pb1']!=""){$ket1=$ketF1."/".$ketB1;}else{ $ket1=="";}
			?>	
            <?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l1'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_l1'];}else{echo $rcek1['shrinkage_l1'];}?><br>
            <?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w1'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_w1'];}else{echo $rcek1['shrinkage_w1'];}?><br>
            
			 <?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rspirality1'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dspirality1'];}else{echo $rcek1['spirality1'];}?>
            
			<?php  if($rcek1['spirality_status']=="DISPOSISI"){echo $rcekD['dspirality1'];}else{echo $rcek1['spirality1'];}?><br>
           
			<?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_ch1'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dapperss_ch1'];}else{echo $rcek1['apperss_ch1'];}?><br>
			<?php if($rcek1['stat_fwss']=="RANDOM"){echo $ketR1; }else if($rcek1['stat_fwss']=="DISPOSISI"){echo $ketD1;}else{echo $ket1; }?><br>	
            <?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_cc1'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dapperss_cc1'];}else{echo $rcek1['apperss_cc1'];}?>
            </td>
            <td align="left" style="font-size: 8px; ">(%) Length<br>(%) Width<br>(%) Spirality<br>pass/fail<br>pass/fail<br>(grade)</td>
            <td align="center" rowspan="4" style="font-size: 8px;">
				<?php //if($rcek1['stat_fwss']=="A" OR $rcek1['stat_fwss']=="PASS" OR $rcek1['stat_fwss']=="FAIL" OR $rcek1['stat_fwss']=="RANDOM" OR $rcek1['stat_fwss']=="DISPOSISI"){echo "A";}?>
				<?php 
				if ($rcek1['stat_fwss']=="A" or $rcek1['stat_fwss']=="DISPOSISI" ) {
					$stat_fwss = "A";
				} else {
					$stat_fwss = "R";
				};
				
				if ($rcek1['stat_fwss2']=="A" or $rcek1['stat_fwss2']=="DISPOSISI" ) {
					$stat_fwss2 = "A";
				} else {
					$stat_fwss2 = "R";
				};
				
				
				
				if ($rcek1['stat_fwss3']=="A" or $rcek1['stat_fwss3']=="DISPOSISI" ) {
					$stat_fwss3 = "A";
				} else {
					$stat_fwss3 = "R";
				};
				
				if ($rcek1['spirality_status']=="A" or $rcek1['spirality_status']=="DISPOSISI" ) {
					$stat_spirality_status = "A";
				} else {
					$stat_spirality_status = "R";
				};
				
				
				// spirality_status
				// stat_fwss
				if($stat_fwss=="A" AND $stat_spirality_status=="A"){echo "A";}
				
				?>		
			</td>
            <td align="center" rowspan="4" style="font-size: 8px;">
			
				<?php //if($rcek1['stat_fwss']!="A" OR $rcek1['stat_fwss2']!="A" OR $rcek1['stat_fwss3']!="A" OR $rcek1['spirality_status']!="A"){echo "R";}
				
                if(($ketR1 != '' || $ketR1 != null) || ($ketD1 != '' || $ketD1 != null) || ($ket1 != '' || $ket1 != null)) {
                
                if($stat_fwss !="A" OR $stat_spirality_status !="A"){
					
					echo "R";
					}

                }
				?>		

				
			</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 8px;">See Test Method<br>(<?php if($rcek1['ss_washes3']=='3'){echo "&#10003;"; }?>)X3 Washes<br>Spirality<br>Appearance: No Obvious Change<br>Pilling (Face/Back)<br>colour change of &ge; 4-5</td>
            <td align="center" style="font-size: 8px; ">
			<?php if($rcekR['rapperss_pf2']=="4-5" ){ $ketRF2="PASS";}else{$ketRF2="FAIL";}
				  if($rcekD['dapperss_pf2']=="4-5" ){ $ketDF2="PASS";}else{$ketDF2="FAIL";}
				  if($rcek1['apperss_pf2']=="4-5"){ $ketF2="PASS";}else{$ketF2="FAIL";}
				  if(($rcekR['rapperss_pb2']=="4-5" or $rcekR['rapperss_pb2']=="4")){ $ketRB2="PASS";}else{$ketRB2="FAIL";}
				  if(($rcekD['dapperss_pb2']=="4-5" or $rcekD['dapperss_pb2']=="4")){ $ketDB2="PASS";}else{$ketDB2="FAIL";}
				  if(($rcek1['apperss_pb2']=="4-5" or $rcek1['apperss_pb2']=="4")){ $ketB2="PASS";}else{$ketB2="FAIL";}
				  if($rcekR['rapperss_pb2']!=""){$ketR2=$ketRF2."/".$ketRB2;}else{ $ketR2=="";}
				  if($rcekD['dapperss_pb2']!=""){$ketD2=$ketDF2."/".$ketDB2;}else{ $ketD2=="";}
				  if($rcek1['apperss_pb2']!=""){$ket2=$ketF2."/".$ketB2;}else{ $ket2=="";}
			?>	
            <?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l2'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_l2'];}else{echo $rcek1['shrinkage_l2'];}?><br>
            <?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w2'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_w2'];}else{echo $rcek1['shrinkage_w2'];}?><br>
            <?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rspirality2'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dspirality2'];}else{echo $rcek1['spirality2'];}?>
            <?php if($rcek1['spirality_status']=="DISPOSISI"){echo $rcekD['dspirality2'];}else{echo $rcek1['spirality2'];}?><br>
            
			<?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_ch2'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dapperss_ch2'];}else{echo $rcek1['apperss_ch2'];}?><br>
			<?php if($rcek1['stat_fwss']=="RANDOM"){echo $ketR2;}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $ketD2;}else{echo $ket2;}?><br>	
            <?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_cc2'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dapperss_cc2'];}else{echo $rcek1['apperss_cc2'];}?>
            </td>
            <td align="left"  style="font-size: 8px;">(%) Length<br>(%) Width<br>(%) Spirality<br>pass/fail<br>pass/fail<br>(grade)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 8px;">See Test Method<br>(<?php if($rcek1['ss_washes10']=='10'){echo "&#10003;"; }?>)X10 Washes<br>Spirality<br>Appearance: No Obvious Change<br>Pilling (Face/Back)<br>colour change of &ge; 4-5</td>
            <td align="center" style="font-size: 8px;">
			<?php if($rcekR['rapperss_pf3']=="4-5" ){ $ketRF3="PASS";}else{$ketRF3="FAIL";}
				  if($rcekD['dapperss_pf3']=="4-5" ){ $ketDF3="PASS";}else{$ketDF3="FAIL";}
				  if($rcek1['apperss_pf3']=="4-5"){ $ketF3="PASS";}else{$ketF3="FAIL";}
				  if(($rcekR['rapperss_pb3']=="4-5" or $rcekR['rapperss_pb3']=="4")){ $ketRB3="PASS";}else{$ketRB3="FAIL";}
				  if(($rcekD['dapperss_pb3']=="4-5" or $rcekD['dapperss_pb3']=="4")){ $ketDB3="PASS";}else{$ketDB3="FAIL";}
				  if(($rcek1['apperss_pb3']=="4-5" or $rcek1['apperss_pb3']=="4")){ $ketB3="PASS";}else{$ketB3="FAIL";}	
				  if($rcekR['rapperss_pb3']!=""){$ketR3=$ketRF3."/".$ketRB3;}else{ $ketR3=="";}
				  if($rcekD['dapperss_pb3']!=""){$ketD3=$ketDF3."/".$ketDB3;}else{ $ketD3=="";}
				  if($rcek1['apperss_pb3']!=""){$ket3=$ketF3."/".$ketB3;}else{ $ket3=="";}	
			?>	
            <?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l3'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_l3'];}else{echo $rcek1['shrinkage_l3'];}?><br>
            <?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w3'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_w3'];}else{echo $rcek1['shrinkage_w3'];}?><br>
            
			<?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rspirality3'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dspirality3'];}else{echo $rcek1['spirality3'];}?>
			<?php if($rcek1['spirality_status']=="DISPOSISI"){echo $rcekD['dspirality3'];}else{echo $rcek1['spirality3'];}?><br>
            <?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_ch3'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dapperss_ch3'];}else{echo $rcek1['apperss_ch3'];}?><br>
			<?php if($rcek1['apperss_pb3']!="" or $rcekR['rapperss_pb3']!="" or $rcekD['dapperss_pb3']!=""){$gris3="/";}else{ $gris3="";} if($rcek1['stat_fwss']=="RANDOM"){echo $ketR3;}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $ketD3;}else{echo $ket3;}?><br>	
            <?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_cc3'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dapperss_cc3'];}else{echo $rcek1['apperss_cc3'];}?>
            </td>
            <td align="left"  style="font-size: 8px;">(%) Length<br>(%) Width<br>(%) Spirality<br>pass/fail<br>pass/fail<br>(grade)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 8px;">See Test Method<br>(<?php if($rcek1['ss_washes15']=='15'){echo "&#10003;"; }?>)X15 Washes<br>Spirality<br>Appearance: No Obvious Change<br>Pilling (Face/Back)<br>colour change of &ge; 4-5</td>
            <td align="center" style="font-size: 8px;">
			<?php if($rcekR['rapperss_pf4']=="4-5" ){ $ketRF4="PASS";}else{$ketRF4="FAIL";}
				  if($rcekD['dapperss_pf4']=="4-5" ){ $ketDF4="PASS";}else{$ketDF4="FAIL";}
				  if($rcek1['apperss_pf4']=="4-5"){ $ketF4="PASS";}else{$ketF4="FAIL";}
				  if(($rcekR['rapperss_pb4']=="4-5" or $rcekR['rapperss_pb4']=="4")){ $ketRB4="PASS";}else{$ketRB4="FAIL";}
				  if(($rcekD['dapperss_pb4']=="4-5" or $rcekD['dapperss_pb4']=="4")){ $ketDB4="PASS";}else{$ketDB4="FAIL";}
				  if(($rcek1['apperss_pb4']=="4-5" or $rcek1['apperss_pb4']=="4")){ $ketB4="PASS";}else{$ketB4="FAIL";}	
				  if($rcekR['rapperss_pb4']!=""){$ketR4=$ketRF4."/".$ketRB4;}else{ $ketR4=="";}
				  if($rcekD['dapperss_pb4']!=""){$ketD4=$ketDF4."/".$ketDB4;}else{ $ketD4=="";}
				  if($rcek1['apperss_pb4']!=""){$ket4=$ketF4."/".$ketB4;}else{ $ket4=="";}
			?>	
            <?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_l4'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_l4'];}else{echo $rcek1['shrinkage_l4'];}?><br>
            <?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rshrinkage_w4'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_w4'];}else{echo $rcek1['shrinkage_w4'];}?><br>
            <?php //if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rspirality4'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dspirality4'];}else{echo $rcek1['spirality4'];}?>
			<?php if($rcek1['spirality_status']=="DISPOSISI"){echo $rcekD['dspirality4'];}else{echo $rcek1['spirality4'];}?><br>
            
            <?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_ch4'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dapperss_ch4'];}else{echo $rcek1['apperss_ch4'];}?><br>
			<?php if($rcek1['stat_fwss']=="RANDOM"){echo $ketR4;}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $ketD4;}else{echo $ket4;}?><br>	
            <?php if($rcek1['stat_fwss']=="RANDOM"){echo $rcekR['rapperss_cc4'];}else if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dapperss_cc4'];}else{echo $rcek1['apperss_cc4'];}?>
            </td>
            <td align="left"  style="font-size: 8px;">(%) Length<br>(%) Width<br>(%) Spirality<br>pass/fail<br>pass/fail<br>(grade)</td>
        </tr>
        <!--Flammability-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0401</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Flammability</strong></td>
            <td align="left" style="font-size: 8px;" >Class 1, as normal flammability</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_fla']=="RANDOM"){echo $rcekR['rflamability'];}else if($rcek1['stat_fla']=="DISPOSISI"){echo $rcekD['dflamability'];}else{echo $rcek1['flamability'];}?>
            </td>
            <td align="left" style="font-size: 8px;" ></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_fla']=="A" OR $rcek1['stat_fla']=="PASS" OR $rcek1['stat_fla']=="FAIL" OR $rcek1['stat_fla']=="RANDOM" OR $rcek1['stat_fla']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_fla']=="R"){echo "R";}?></td>
        </tr>
        <!--Heat Shrinkage-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0405</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>S</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Heat Shrinkage</strong><br>*Heat Process: 170&deg;C +/-2&deg;C/15sec./2bar(<?php if($rcek1['h_shrinkage_temp']=='170'){echo "&#10003;"; }?>)<br>Bonding :180&deg;C +/-2&deg;C/ 15sec./2bar(<?php if($rcek1['h_shrinkage_temp']=='180'){echo "&#10003;"; }?>)<br>Molding/P4P :200&deg;C +/-2&deg;C/ 15sec./2bar(<?php if($rcek1['h_shrinkage_temp']=='200'){echo "&#10003;"; }?>)<br>Please Place &#10003; Againts Approproate Test<br>Temperature</td>
            <td align="left" style="font-size: 8px;" >Shrinkage: &plusmn;2%<br><br>Color Change > 4-5<br>Appearance Afterwards: No Changes</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_hs']=="RANDOM"){echo $rcekR['rh_shrinkage_l1'];}else if($rcek1['stat_hs']=="DISPOSISI"){echo $rcekD['dh_shrinkage_l1'];}else{echo $rcek1['h_shrinkage_l1'];}?><br>
            <?php if($rcek1['stat_hs']=="RANDOM"){echo $rcekR['rh_shrinkage_w1'];}else if($rcek1['stat_hs']=="DISPOSISI"){echo $rcekD['dh_shrinkage_w1'];}else{echo $rcek1['h_shrinkage_w1'];}?><br>
            <?php if($rcek1['stat_hs']=="RANDOM"){echo $rcekR['rh_shrinkage_grd'];}else if($rcek1['stat_hs']=="DISPOSISI"){echo $rcekD['dh_shrinkage_grd'];}else{echo $rcek1['h_shrinkage_grd'];}?><br>
            <?php if($rcek1['stat_hs']=="RANDOM"){echo $rcekR['rh_shrinkage_app'];}else if($rcek1['stat_hs']=="DISPOSISI"){echo $rcekD['dh_shrinkage_app'];}else{echo $rcek1['h_shrinkage_app'];}?><br>
            </td>
            <td align="left" style="font-size: 8px;" >(%) Length<br>(%) Width<br>(grade)<br>pass/fail</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_hs']=="A" OR $rcek1['stat_hs']=="PASS" OR $rcek1['stat_hs']=="FAIL" OR $rcek1['stat_hs']=="RANDOM" OR $rcek1['stat_hs']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_hs']=="R"){echo "R";}?></td>
        </tr>
        <!--Random Tumble Pilling-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0407</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>K</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Random Tumble Pilling</strong><br>*only for fleece, polarfleece, french terry</td>
            <td align="left" style="font-size: 8px;" >Knit fabrics: &ge; 3<br><br>For brushed/hairy back side: &ge; 2 evenly<br>French terry back side &ge; grade 2-3</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_f1'];}else if($rcek1['stat_prt']=="DISPOSISI"){echo $rcekD['dprt_f1'];}else{echo $rcek1['prt_f1'];}?><br><br>
            <?php if($rcek1['stat_prt']=="RANDOM"){echo $rcekR['rprt_b1'];}else if($rcek1['stat_prt']=="DISPOSISI"){echo $rcekD['dprt_b1'];}else{echo $rcek1['prt_b1'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >(grade) Face<br><br>(grade) Back</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_prt']=="A" OR $rcek1['stat_prt']=="PASS" OR $rcek1['stat_prt']=="FAIL" OR $rcek1['stat_prt']=="RANDOM" OR $rcek1['stat_prt']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_prt']=="R"){echo "R";}?></td>
        </tr>
        <!--Bursting Strength-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0409</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>K</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Bursting Strength</strong><br>*only for all knitted fabrics and knitted fabrics with<br>laser cut elements/holes<br><strong>Testing result of 2 testing area should be reported<br>Adidas Method<br>50 cm<sup>2</sup> &  7.3 cm<sup>2</sup></strong></td>
            <td align="left" style="font-size: 8px;" >Natural(>50%):<br>220 g/m<sup>2</sup> or lower &ge; 130 kPa<br>221 g/m<sup>2</sup> or above &ge; 170 kPa<br>Synthetic(>50%):<br>220 g/m<sup>2</sup> or lower &ge; 170 kPa<br>221 g/m<sup>2</sup> or above &ge; 250 kPa<br>Basketball/ Ice Hockey / Soccer/Football: &ge; 250 kPa<br>American Football/Rugby: &ge; 450 kPa <br>Wool (>0%):<br>Linear density &le; 31.2 tex (&ge;32Nm) &ge; 245 kPa <br> Linear density > 31.2 tex (< 32Nm) &ge; 323 kPa</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_bs']=="RANDOM"){echo $rcekR['rbs_tru'];}else if($rcek1['stat_bs']=="DISPOSISI"){echo $rcekD['dbs_tru'];}else{echo $rcek1['bs_tru'];}?><br><br><br><br><br><br>
            <?php if($rcek1['stat_bs']=="RANDOM"){echo $rcekR['rbs_tru2'];}else if($rcek1['stat_bs']=="DISPOSISI"){echo $rcekD['dbs_tru2'];}else{echo $rcek1['bs_tru2'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >(kPa)<br>50 cm<sup>2</sup><br><br><br><br>(kPa)<br>7.3 cm<sup>2</sup></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_bs']=="A" OR $rcek1['stat_bs']=="PASS" OR $rcek1['stat_bs']=="FAIL" OR $rcek1['stat_bs']=="RANDOM" OR $rcek1['stat_bs']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_bs']=="R"){echo "R";}?></td>
        </tr>
        <!--Fabric Weight-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0419</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Fabric Weight</strong><br>*+/-5% to ID spec</td>
            <td align="left" style="font-size: 8px;" >Tested<br><br>Difference +/-5%</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_fwss2']=="RANDOM"){echo $rcekR['rf_weight'];}else if($rcek1['stat_fwss2']=="DISPOSISI"){echo $rcekD['df_weight'];}else{echo $rcek1['f_weight'];}?><br><br>
            <input style="font-size: 8px;" name="difference" type="text" placeholder="Ketik" size="8" />
            </td>
            <td align="left" style="font-size: 8px;" >(g/m<sup>2</sup>)<br><br>(%)</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_fwss2']=="A" OR $rcek1['stat_fwss2']=="PASS" OR $rcek1['stat_fwss2']=="FAIL" OR $rcek1['stat_fwss2']=="RANDOM" OR $rcek1['stat_fwss2']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_fwss2']=="R"){echo "R";}?></td>
        </tr>
        <!--Cuttable Width-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0421</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Cuttable Width</strong></td>
            <td align="left" style="font-size: 8px;" >Not Less Than Stated in ID spec</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_fwss3']=="RANDOM"){echo $rcekR['rf_width'];}else if($rcek1['stat_fwss3']=="DISPOSISI"){echo $rcekD['df_width'];}else{echo $rcek1['f_width'];}?>
            </td>
            <td align="left" style="font-size: 8px;" > 
                    <select name="inch" style="border:none;font-size: 8px;-webkit-appearance: none;">
                        <option value="(inches)">(inches)</option>
                        <option value="(cm)">(cm)</option>
                    </select></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_fwss3']=="A" OR $rcek1['stat_fwss3']=="PASS" OR $rcek1['stat_fwss3']=="FAIL" OR $rcek1['stat_fwss3']=="RANDOM" OR $rcek1['stat_fwss3']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_fwss3']=="R"){echo "R";}?></td>
        </tr>
        <!--Elongation & Recovery-->
        <tr>
            <td align="left" rowspan="2" style="font-size: 8px;" valign="top"><strong>PHM-AP0427</strong></td>
            <td align="center" rowspan="2" style="font-size: 8px;" valign="top"><strong>K</strong></td>
            <td align="center" rowspan="2" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" rowspan="2" style="font-size: 8px;" valign="top"><strong>Elongation</strong><br><br>60N (<?php if($rcek1['load_stretch']=='60' OR $rcekR['rload_stretch']=='60'){echo "&#10003;"; }?>)<br>22N (<?php if($rcek1['load_stretch']=='22' OR $rcekR['rload_stretch']=='22'){echo "&#10003;"; }?>)<br><br>*only for elastic fabrics, trim & rib for body<br>(not applicable for swimwear)<br><br><br><strong>Recovery</strong></td>
            <td align="left" style="font-size: 8px;">Development testing: <br>For Record Only<br><br><br>Product testing: -10%/+20% to<br>elongation specification <br>from development</td>
            <td align="center" style="font-size: 8px;">
            <?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_l1'];}else if($rcek1['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_l1'];}else{echo $rcek1['stretch_l1'];}?><br><br><br><br>
            <?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rstretch_w1'];}else if($rcek1['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_w1'];}else{echo $rcek1['stretch_w1'];}?>
            </td>
            <td align="left" style="font-size: 8px;">(%) Length<br><br><br><br>(%) Width</td>
            <td align="center" rowspan="2" style="font-size: 8px;"><?php if($rcek1['stat_sr']=="A" OR $rcek1['stat_sr']=="PASS" OR $rcek1['stat_sr']=="FAIL" OR $rcek1['stat_sr']=="RANDOM" OR $rcek1['stat_sr']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" rowspan="2" style="font-size: 8px;"><?php if($rcek1['stat_sr']=="R"){echo "R";}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 8px;"><strong>Fabric:</strong>(length & width direction at 60N)<br>High EL (>8%): Warp & Weft: >90%<br>Low EL (< 8%): Warp & Weft: >85%<br><br><strong>Ribs:</strong> (width direction at 22N)<br>High EL (>8%): Warp & Weft: >90%<br>Low EL (< 8%): Warp & Weft: >85%<br></td>
            <td align="center" style="font-size: 8px;">
            <?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_l1'];}else if($rcek1['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_l1'];}else{echo $rcek1['recover_l1'];}?><br><br><br><br>
            <?php if($rcek1['stat_sr']=="RANDOM"){echo $rcekR['rrecover_w1'];}else if($rcek1['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_w1'];}else{echo $rcek1['recover_w1'];}?>
            </td>
            <td align="left"  style="font-size: 8px;">(%) Length<br><br><br><br>(%) Width</td>
        </tr>
        <!--Fibre/Fuzz-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0433</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Fibre/Fuzz Test for Fabrics & Flock Prints</strong><br>*only for brushed, raised and/or hairy surfaces</td>
            <td align="left" style="font-size: 8px;" >Fibre Transfer: Slight<br><br>Color Staining > 4</td>
            <td align="center" style="font-size: 6px;" >
            <?php if($rcek1['stat_ff']=="RANDOM"){echo $rcekR['rfibre_transfer'];}else if($rcek1['stat_ff']=="DISPOSISI"){echo $rcekD['dfibre_transfer'];}else{echo $rcek1['fibre_transfer'];}?><br><br>
            <?php if($rcek1['stat_ff']=="RANDOM"){echo $rcekR['rfibre_grade'];}else if($rcek1['stat_ff']=="DISPOSISI"){echo $rcekD['dfibre_grade'];}else{echo $rcek1['fibre_grade'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >Discreption<br><br>(grade)</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_ff']=="A" OR $rcek1['stat_ff']=="PASS" OR $rcek1['stat_ff']=="FAIL" OR $rcek1['stat_ff']=="RANDOM" OR $rcek1['stat_ff']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_ff']=="R"){echo "R";}?></td>
        </tr>
        <!--Snagging Pod-->
        <tr>
            <td align="left" rowspan="4" style="font-size: 8px;" valign="top"><strong>PHM-AP0441</strong></td>
            <td align="center" rowspan="4" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" rowspan="4" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" rowspan="4" style="font-size: 8px;" valign="top"><strong>Snagging Test (Snag Pod)<br><br>*only for fabrics containing filament yarns</strong><br>*2000 revolutions<br>Woven:<br>Mandatory to be tested on front and<br> back side but no requirement set!<br>Pass only if data are available!<br>Knit:<br>Face Side length and width direction each &ge; 3.5;<br>For >8% elastane &ge;3.0<br>Teamwear : &ge;4.0<br><br><br><br><strong>*Back Side test must not be<br>evaluated according to BS 8479<br>(no counting of snags, no grading) <br>but after backside testing, <br> the front side must be evaluated <br> for obvious defetcs.</strong></td>
            <td align="left" style="font-size: 8px;">Face Side_Length_Grade &ge;3.5 (3 for > 8% EL)<br><br>Face Side_Length_Classification<br><br>Face Side_Length_#Snags< 2mm<br><br>Face Side_Length_#Snags 2mm-5mm<br><br>Face Side_Length_#Snags>5mm</td>
            <td align="center" style="font-size: 8px;">
            <?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_grdl1'];}else if($rcek1['stat_sp']=="DISPOSISI"){echo $rcekD['dsp_grdl1'];}else{echo $rcek1['sp_grdl1'];}?><br><br>
            <?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_clsl1'];}else if($rcek1['stat_sp']=="DISPOSISI"){echo $rcekD['dsp_clsl1'];}else{echo $rcek1['sp_clsl1'];}?><br><br>
            <?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_shol1'];}else if($rcek1['stat_sp']=="DISPOSISI"){echo $rcekD['dsp_shol1'];}else{echo $rcek1['sp_shol1'];}?><br><br>
            <?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_medl1'];}else if($rcek1['stat_sp']=="DISPOSISI"){echo $rcekD['dsp_medl1'];}else{echo $rcek1['sp_medl1'];}?><br><br>
            <?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_lonl1'];}else if($rcek1['stat_sp']=="DISPOSISI"){echo $rcekD['dsp_lonl1'];}else{echo $rcek1['sp_lonl1'];}?>
            </td>
            <td align="left" style="font-size: 8px;" valign="top">(grade)</td>
            <td align="center" style="font-size: 8px;" rowspan="2"><?php if($rcek1['stat_sp']=="A" OR $rcek1['stat_sp']=="PASS" OR $rcek1['stat_sp']=="FAIL" OR $rcek1['stat_sp']=="RANDOM" OR $rcek1['stat_sp']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" rowspan="2"><?php if($rcek1['stat_sp']=="R"){echo "R";}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 8px;">Face Side_Width_Grade &ge;3.5 (3 for > 8% EL)<br><br>Face Side_Width_Classification<br><br>Face Side_Width_#Snags< 2mm<br><br>Face Side_Width_#Snags 2mm-5mm<br><br>Face Side_Width_#Snags>5mm</td>
            <td align="center" style="font-size: 8px;">
            <?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_grdw1'];}else if($rcek1['stat_sp']=="DISPOSISI"){echo $rcekD['dsp_grdw1'];}else{echo $rcek1['sp_grdw1'];}?><br><br>
            <?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_clsw1'];}else if($rcek1['stat_sp']=="DISPOSISI"){echo $rcekD['dsp_clsw1'];}else{echo $rcek1['sp_clsw1'];}?><br><br>
            <?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_show1'];}else if($rcek1['stat_sp']=="DISPOSISI"){echo $rcekD['dsp_show1'];}else{echo $rcek1['sp_show1'];}?><br><br>
            <?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_medw1'];}else if($rcek1['stat_sp']=="DISPOSISI"){echo $rcekD['dsp_medw1'];}else{echo $rcek1['sp_medw1'];}?><br><br>
            <?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_lonw1'];}else if($rcek1['stat_sp']=="DISPOSISI"){echo $rcekD['dsp_lonw1'];}else{echo $rcek1['sp_lonw1'];}?>
            </td>
            <td align="left" style="font-size: 8px;" valign="top">(grade)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 8px;">Back Side_Length_Defect on Faceside</td>
            <td align="center" style="font-size: 8px;">
            <?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_grdl2'];}else if($rcek1['stat_sp']=="DISPOSISI"){echo $rcekD['dsp_grdl2'];}else{echo $rcek1['sp_grdl2'];}?>
            </td>
            <td align="left" style="font-size: 8px;">(Y/N)</td>
            <td align="center" style="font-size: 8px;" ></td>
            <td align="center" style="font-size: 8px;" ></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 8px;">Back Side_Width_Defect on Faceside</td>
            <td align="center" style="font-size: 8px;">
            <?php if($rcek1['stat_sp']=="RANDOM"){echo $rcekR['rsp_grdw2'];}else if($rcek1['stat_sp']=="DISPOSISI"){echo $rcekD['dsp_grdw2'];}else{echo $rcek1['sp_grdw2'];}?>
            </td>
            <td align="left" style="font-size: 8px;">(Y/N)</td>
            <td align="center" style="font-size: 8px;" ></td>
            <td align="center" style="font-size: 8px;" ></td>
        </tr>
        <!--Thickness-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0442</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Textile Material Thickness Measurement<br>Method</strong></td>
            <td align="left" style="font-size: 8px;" >For Reference Only!</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_th']=="RANDOM"){echo $rcekR['rthick1'];}else if($rcek1['stat_th']=="DISPOSISI"){echo $rcekD['dthick1'];}else{echo $rcek1['thick1'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >(mm)</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_th']=="A" OR $rcek1['stat_th']=="PASS" OR $rcek1['stat_th']=="FAIL" OR $rcek1['stat_th']=="RANDOM" OR $rcek1['stat_th']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_th']=="R"){echo "R";}?></td>
        </tr>
        <!--Ball Burst-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0443</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>K</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Ball Burst Test</strong><br>*only for knitted fabrics and knitted<br> fabrics with and without laser cut elements/holes<br>Ball Burst enables testing of elastic fabrics</td>
            <td align="left" style="font-size: 8px;" >&ge; 200 N (Initial Requirement Only!)<br>Teamwear/American Football : &ge; 700N<br>Basketball/ Ice Hockey / Soccer/Football: &ge; 400N</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_bs2']=="RANDOM"){echo $rcekR['rbs_instron'];}else if($rcek1['stat_bs2']=="DISPOSISI"){echo $rcekD['dbs_instron'];}else{echo $rcek1['bs_instron'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >(N)</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_bs2']=="A" OR $rcek1['stat_bs2']=="PASS" OR $rcek1['stat_bs2']=="FAIL" OR $rcek1['stat_bs2']=="RANDOM" OR $rcek1['stat_bs2']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_bs2']=="R"){echo "R";}?></td>
        </tr>
        <!--Odour-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHX-AP0451</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Odour (new)</strong></td>
            <td align="left" style="font-size: 8px;" >No Upleasant Or Disturbing Odour</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_odour']=="RANDOM"){echo $rcekR['rodour'];}else if($rcek1['stat_odour']=="DISPOSISI"){echo $rcekD['dodour'];}else{echo $rcek1['odour'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >pass/fail</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_odour']=="A" OR $rcek1['stat_odour']=="PASS" OR $rcek1['stat_odour']=="FAIL" OR $rcek1['stat_odour']=="RANDOM" OR $rcek1['stat_odour']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_odour']=="R"){echo "R";}?></td>
        </tr>
        <!--Pilling Martindle-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0452</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Martindale Pilling<br>(new; replaces 4.07)</strong><br>*for all fabrisc except polarfleece<br>*both requirement need to pass</td>
            <td align="left" style="font-size: 8px;" >500rev.: &ge;3-4*(3 for cotton content)<br><br>2000rev.: &ge;3-4*(3 for cotton content) <?php if($rd2['no_test']=='202209262825'){?><br><br>20000rev.: &ge;3-4*(3 for cotton content) <?php }?></td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_f1'];}else if($rcek1['stat_pm']=="DISPOSISI"){echo $rcekD['dpm_f1'];}else{echo $rcek1['pm_f1'];}?><br><br>
            <?php if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_f2'];}else if($rcek1['stat_pm']=="DISPOSISI"){echo $rcekD['dpm_f2'];}else{echo $rcek1['pm_f2'];}?>
            <?php if($rd2['no_test']=='202209262825'){?><br><br>
            <?php if($rcek1['stat_pm']=="RANDOM"){echo $rcekR['rpm_f3'];}else if($rcek1['stat_pm']=="DISPOSISI"){echo $rcekD['dpm_f3'];}else{echo $rcek1['pm_f3'];}?>    
            <?php }?>
            </td>
            <td align="left" style="font-size: 8px;" >(grade)<br><br>(grade) <?php if($rd2['no_test']=='202209262825'){?><br><br>(grade)<?php }?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_pm']=="A" OR $rcek1['stat_pm']=="PASS" OR $rcek1['stat_pm']=="FAIL" OR $rcek1['stat_pm']=="RANDOM" OR $rcek1['stat_pm']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_pm']=="R"){echo "R";}?></td>
        </tr>
        <!--PH-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0453</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PH Value</strong><br></td>
            <td align="left" style="font-size: 8px;" >4.5-7.5<br>White Color 4.5 - 6.0</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_ph']=="RANDOM"){echo $rcekR['rph'];}else if($rcek1['stat_ph']=="DISPOSISI"){echo $rcekD['dph'];}else{echo $rcek1['ph'];}?>
            </td>
            <td align="left" style="font-size: 8px;" ></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_ph']=="A" OR $rcek1['stat_ph']=="PASS" OR $rcek1['stat_ph']=="FAIL" OR $rcek1['stat_ph']=="RANDOM" OR $rcek1['stat_ph']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_ph']=="R"){echo "R";}?></td>
        </tr>
        <!--Fibre Composition-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0454</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Fibre Composition</strong><br></td>
            <td align="left" style="font-size: 8px;" >Single Fiber: No Tolerance<br><br>Blends: Tolerance +/-3%<br></td>
            <td align="left" style="font-size: 8px;" >
            <?php if($rcek1['stat_fib']=="RANDOM"){if($rcekR['rfc_cott']!=""){echo $rcekR['rfc_cott']."% ".$rcekR['rfc_cott1']."<br>";}?> <?php if($rcekR['rfc_poly']!=""){echo $rcekR['rfc_poly']."% ".$rcekR['rfc_poly1']."<br>";}?> <?php if($rcekR['rfc_elastane']!=""){echo $rcekR['rfc_elastane']."% ".$rcekR['rfc_elastane1'];}}else if($rcek1['stat_fib']=="DISPOSISI"){if($rcekD['dfc_cott']!=""){echo $rcekD['dfc_cott']."% ".$rcekD['dfc_cott1']."<br>";}?> <?php if($rcekD['dfc_poly']!=""){echo $rcekD['dfc_poly']."% ".$rcekD['dfc_poly1']."<br>";}?> <?php if($rcekD['dfc_elastane']!=""){echo $rcekD['dfc_elastane']."% ".$rcekD['dfc_elastane1'];}}else{if($rcek1['fc_cott']!=""){echo $rcek1['fc_cott']."% ".$rcek1['fc_cott1']."<br>";}?> <?php if($rcek1['fc_poly']!=""){echo $rcek1['fc_poly']."% ".$rcek1['fc_poly1']."<br>";}?> <?php if($rcek1['fc_elastane']!=""){echo $rcek1['fc_elastane']."% ".$rcek1['fc_elastane1'];}}?><br><br>
            </td>
            <td align="left" style="font-size: 8px;" ><br><br></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_fib']=="A" OR $rcek1['stat_fib']=="PASS" OR $rcek1['stat_fib']=="FAIL" OR $rcek1['stat_fib']=="RANDOM" OR $rcek1['stat_fib']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_fib']=="R"){echo "R";}?></td>
        </tr>
        <!--Bow & Skew-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0460</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Bow and Skew in Woven &amp; Knitted Fabrics</strong><br></td>
            <td align="left" style="font-size: 8px;" >Woven: &le; 3%<br>Knitted: &le; 5%<br>Exceptional handling of Skew<br>Refer to the details in test method</td>
            <td align="left" style="font-size: 8px;" >Bow : 
            <?php if($rcek1['stat_bsk']=="RANDOM"){echo $rcekR['rbow'];}else if($rcek1['stat_bsk']=="DISPOSISI"){echo $rcekD['dbow'];}else{echo $rcek1['bow'];}?><br>Skew : <?php if($rcek1['stat_bsk']=="RANDOM"){echo $rcekR['rskew'];}else if($rcek1['stat_bsk']=="DISPOSISI"){echo $rcekD['dskew'];}else{echo $rcek1['skew'];}?><br>
            </td>
            <td align="left" style="font-size: 8px;" >%<br>%</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_bsk']=="A" OR $rcek1['stat_bsk']=="PASS" OR $rcek1['stat_bsk']=="FAIL" OR $rcek1['stat_bsk']=="RANDOM" OR $rcek1['stat_bsk']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_bsk']=="R"){echo "R";}?></td>
        </tr>		
		<tr>
            <td rowspan="4" align="left" valign="top" style="font-size: 8px;"><strong>PHM-AP0469</strong></td>
            <td rowspan="4" align="center" valign="top" style="font-size: 8px;"><strong>KW</strong></td>
            <td rowspan="4" align="center" valign="top" style="font-size: 8px;"><strong>NS</strong></td>
            <td rowspan="4" align="left" valign="top" style="font-size: 8px;"><strong>Sweat Conceal Method</strong><br>
      
	  
	  <?php 
	$sco_acid_original =  explode("/", $rcek1['sco_acid_original']);
	$sca_acid_original =  explode("/", $rcek1['sca_acid_original']);
	$sco_alkaline_afterwash =  explode("/", $rcek1['sco_alkaline_afterwash']);
	$sca_alkaline_afterwash =  explode("/", $rcek1['sca_alkaline_afterwash']);	

	$sco_acid_status =  $rcek1['sco_acid_status'];
	$sca_acid_status =  $rcek1['sca_acid_status'];
	$sco_alkaline_status =  $rcek1['sco_alkaline_status'];
	$sca_alkaline_status =  $rcek1['sca_alkaline_status'];
	
	$status_r = ['DISPOSISI','R','PASS','FAIL','RANDOM'];

	if ($sco_acid_status=='A' and $sca_acid_status=='A' and $sco_alkaline_status=='A' and $sca_alkaline_status=='A') {
	$status_sco_column_a = 'A';
	$status_sco_column_b = '';
	} 
	else if ( in_array($sco_acid_status,$status_r) or
	          in_array($sca_acid_status,$status_r) or
		      in_array($sco_alkaline_status,$status_r) or
		      in_array($sca_alkaline_status,$status_r)) {
	$status_sco_column_a = '';
	$status_sco_column_b = 'R';
	} else {
		$status_sco_column_a = '';
		$status_sco_column_b = '';
	}
	?>	
	</td>
	<td rowspan="4" align="left" style="font-size: 8px;" >After 3 minutes: grade ≥4</td>
	<!--Start-->
	<td align="center" style="font-size: 8px;" ><?=$sco_acid_original[2]?></td>
	<td align="left" style="font-size: 8px;" >Acid Before Wash (grade)</td>
	<td rowspan="4" align="center" style="font-size: 8px;" >
	<!--Status--> 
	<?=$status_sco_column_a?>
	</td>
	<td rowspan="4" align="center" style="font-size: 8px;" >  <?=$status_sco_column_b?></td>
	</tr>
<tr>
	<td align="center" style="font-size: 8px;" ><?=$sca_acid_original[2] ?></td>
	<td align="left" style="font-size: 8px;" >Acid After 5 Wash (grade)</td>
</tr>
<tr>
	<td align="center" style="font-size: 8px;" ><?= $sco_alkaline_afterwash[2]?></td>
	<td align="left" style="font-size: 8px;" >Alkaline Before Wash (grade)</td>
</tr>
<tr>
	<td align="center" style="font-size: 8px;" ><?=$sca_alkaline_afterwash[2] ?></td>
	<td align="left" style="font-size: 8px;" >Alkaline After 5 Wash (grade)</td>
</tr>	

	
<tr>
	<td colspan="9" align="center" style="font-size: 11px;">&nbsp;</td>
</tr>

	  
	  
        <tr>
            <td colspan="9" align="center" style="font-size: 11px;"><strong>Color Fastness Tests</strong></td>
        </tr>
        <!--Washing-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0501</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Washing Fastness</strong><br><br>30&deg;C(<?php if($rcek1['wash_temp']=='30'){echo "&#10003;"; }?>)<br><br>40&deg;C(<?php if($rcek1['wash_temp']=='40'){ echo "&#10003;"; }?>)<br><br>60&deg;C(<?php if($rcek1['wash_temp']=='60'){ echo "&#10003;"; }?>)<br><br>Please Place &#10003; Against Appropriate<br><br>Test Temperature<br><br>color staining = against multifibre<br>cross staining = against white fabric</td>
            <td align="left" style="font-size: 8px;" >4-5 Color Change<br><br>4 Acetate<br><br>4 Cotton<br><br>4 Nylon<br><br>4 Polyester<br><br>4 Acrylic<br><br>4 Wool<br><br>4-5 Cross Staining</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_colorchange'];}else if($rcek1['stat_wf']=="DISPOSISI"){echo $rcekD['dwash_colorchange'];}else{echo $rcek1['wash_colorchange'];}?><br><br>
            <?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_acetate'];}else if($rcek1['stat_wf']=="DISPOSISI"){echo $rcekD['dwash_acetate'];}else{echo $rcek1['wash_acetate'];}?><br><br>
            <?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_cotton'];}else if($rcek1['stat_wf']=="DISPOSISI"){echo $rcekD['dwash_cotton'];}else{echo $rcek1['wash_cotton'];}?><br><br>
            <?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_nylon'];}else if($rcek1['stat_wf']=="DISPOSISI"){echo $rcekD['dwash_nylon'];}else{echo $rcek1['wash_nylon'];}?><br><br>
            <?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_poly'];}else if($rcek1['stat_wf']=="DISPOSISI"){echo $rcekD['dwash_poly'];}else{echo $rcek1['wash_poly'];}?><br><br>
            <?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_acrylic'];}else if($rcek1['stat_wf']=="DISPOSISI"){echo $rcekD['dwash_acrylic'];}else{echo $rcek1['wash_acrylic'];}?><br><br>
            <?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_wool'];}else if($rcek1['stat_wf']=="DISPOSISI"){echo $rcekD['dwash_wool'];}else{echo $rcek1['wash_wool'];}?><br><br>
            <?php if($rcek1['stat_wf']=="RANDOM"){echo $rcekR['rwash_staining'];}else if($rcek1['stat_wf']=="DISPOSISI"){echo $rcekD['dwash_staining'];}else{echo $rcek1['wash_staining'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >(grade)<br><br>(grade)<br><br>(grade)<br><br>(grade)<br><br>(grade)<br><br>(grade)<br><br>(grade)<br><br>(grade)</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_wf']=="A" OR $rcek1['stat_wf']=="PASS" OR $rcek1['stat_wf']=="FAIL" OR $rcek1['stat_wf']=="RANDOM" OR $rcek1['stat_wf']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_wf']=="R"){echo "R";}?></td>
        </tr>
        <!--Perspiration Acid-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0502</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Perspiration Fastness</strong><br><br>Acid</td>
            <td align="left" style="font-size: 8px;" >4-5 Color Change<br><br>4 Acetate<br><br>4 Cotton<br><br>4 Nylon<br><br>4 Polyester<br><br>4 Acrylic<br><br>4 Wool</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_colorchange'];}else if($rcek1['stat_pac']=="DISPOSISI"){echo $rcekD['dacid_colorchange'];}else{echo $rcek1['acid_colorchange'];}?><br><br>
            <?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_acetate'];}else if($rcek1['stat_pac']=="DISPOSISI"){echo $rcekD['dacid_acetate'];}else{echo $rcek1['acid_acetate'];}?><br><br>
            <?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_cotton'];}else if($rcek1['stat_pac']=="DISPOSISI"){echo $rcekD['dacid_cotton'];}else{echo $rcek1['acid_cotton'];}?><br><br>
            <?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_nylon'];}else if($rcek1['stat_pac']=="DISPOSISI"){echo $rcekD['dacid_nylon'];}else{echo $rcek1['acid_nylon'];}?><br><br>
            <?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_poly'];}else if($rcek1['stat_pac']=="DISPOSISI"){echo $rcekD['dacid_poly'];}else{echo $rcek1['acid_poly'];}?><br><br>
            <?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_acrylic'];}else if($rcek1['stat_pac']=="DISPOSISI"){echo $rcekD['dacid_acrylic'];}else{echo $rcek1['acid_acrylic'];}?><br><br>
            <?php if($rcek1['stat_pac']=="RANDOM"){echo $rcekR['racid_wool'];}else if($rcek1['stat_pac']=="DISPOSISI"){echo $rcekD['dacid_wool'];}else{echo $rcek1['acid_wool'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >(grade)<br><br>(grade)<br><br>(grade)<br><br>(grade)<br><br>(grade)<br><br>(grade)<br><br>(grade)</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_pac']=="A" OR $rcek1['stat_pac']=="PASS" OR $rcek1['stat_pac']=="FAIL" OR $rcek1['stat_pac']=="RANDOM" OR $rcek1['stat_pac']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_pac']=="R"){echo "R";}?></td>
        </tr>
        <!--Perspiration Alkaline-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0502</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Perspiration Fastness</strong><br><br>Alkaline</td>
            <td align="left" style="font-size: 8px;" >4-5 Color Change<br><br>4 Acetate<br><br>4 Cotton<br><br>4 Nylon<br><br>4 Polyester<br><br>4 Acrylic<br><br>4 Wool</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_colorchange'];}else if($rcek1['stat_pal']=="DISPOSISI"){echo $rcekD['dalkaline_colorchange'];}else{echo $rcek1['alkaline_colorchange'];}?><br><br>
            <?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_acetate'];}else if($rcek1['stat_pal']=="DISPOSISI"){echo $rcekD['dalkaline_acetate'];}else{echo $rcek1['alkaline_acetate'];}?><br><br>
            <?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_cotton'];}else if($rcek1['stat_pal']=="DISPOSISI"){echo $rcekD['dalkaline_cotton'];}else{echo $rcek1['alkaline_cotton'];}?><br><br>
            <?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_nylon'];}else if($rcek1['stat_pal']=="DISPOSISI"){echo $rcekD['dalkaline_nylon'];}else{echo $rcek1['alkaline_nylon'];}?><br><br>
            <?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_poly'];}else if($rcek1['stat_pal']=="DISPOSISI"){echo $rcekD['dalkaline_poly'];}else{echo $rcek1['alkaline_poly'];}?><br><br>
            <?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_acrylic'];}else if($rcek1['stat_pal']=="DISPOSISI"){echo $rcekD['dalkaline_acrylic'];}else{echo $rcek1['alkaline_acrylic'];}?><br><br>
            <?php if($rcek1['stat_pal']=="RANDOM"){echo $rcekR['ralkaline_wool'];}else if($rcek1['stat_pal']=="DISPOSISI"){echo $rcekD['dalkaline_wool'];}else{echo $rcek1['alkaline_wool'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >(grade)<br><br>(grade)<br><br>(grade)<br><br>(grade)<br><br>(grade)<br><br>(grade)<br><br>(grade)</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_pal']=="A" OR $rcek1['stat_pal']=="PASS" OR $rcek1['stat_pal']=="FAIL" OR $rcek1['stat_pal']=="RANDOM" OR $rcek1['stat_pal']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_pal']=="R"){echo "R";}?></td>
        </tr>
        <!--Water-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0503</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Water Fastness</strong></td>
            <td align="left" style="font-size: 8px;" >4-5 Color Change<br><br>4 Acetate<br><br>4 Cotton<br><br>4 Nylon<br><br>4 Polyester<br><br>4 Acrylic<br><br>4 Wool</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_colorchange'];}else if($rcek1['stat_wtr']=="DISPOSISI"){echo $rcekD['dwater_colorchange'];}else{echo $rcek1['water_colorchange'];}?><br><br>
            <?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_acetate'];}else if($rcek1['stat_wtr']=="DISPOSISI"){echo $rcekD['dwater_acetate'];}else{echo $rcek1['water_acetate'];}?><br><br>
            <?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_cotton'];}else if($rcek1['stat_wtr']=="DISPOSISI"){echo $rcekD['dwater_cotton'];}else{echo $rcek1['water_cotton'];}?><br><br>
            <?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_nylon'];}else if($rcek1['stat_wtr']=="DISPOSISI"){echo $rcekD['dwater_nylon'];}else{echo $rcek1['water_nylon'];}?><br><br>
            <?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_poly'];}else if($rcek1['stat_wtr']=="DISPOSISI"){echo $rcekD['dwater_poly'];}else{echo $rcek1['water_poly'];}?><br><br>
            <?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_acrylic'];}else if($rcek1['stat_wtr']=="DISPOSISI"){echo $rcekD['dwater_acrylic'];}else{echo $rcek1['water_acrylic'];}?><br><br>
            <?php if($rcek1['stat_wtr']=="RANDOM"){echo $rcekR['rwater_wool'];}else if($rcek1['stat_wtr']=="DISPOSISI"){echo $rcekD['dwater_wool'];}else{echo $rcek1['water_wool'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >(grade)<br><br>(grade)<br><br>(grade)<br><br>(grade)<br><br>(grade)<br><br>(grade)<br><br>(grade)</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_wtr']=="A" OR $rcek1['stat_wtr']=="PASS" OR $rcek1['stat_wtr']=="FAIL" OR $rcek1['stat_wtr']=="RANDOM" OR $rcek1['stat_wtr']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_wtr']=="R"){echo "R";}?></td>
        </tr>
        <!--Crocking-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0504</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Crocking Fastness</strong></td>
            <td align="left" style="font-size: 8px;" >4 Dry<br><br><br><br>3 Wet</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_cr']=="RANDOM"){echo $rcekR['rcrock_len1'];}else if($rcek1['stat_cr']=="DISPOSISI"){echo $rcekD['dcrock_len1'];}else{echo $rcek1['crock_len1'];}?><br><br>
            <?php if($rcek1['stat_cr']=="RANDOM"){echo $rcekR['rcrock_wid1'];}else if($rcek1['stat_cr']=="DISPOSISI"){echo $rcekD['dcrock_wid1'];}else{echo $rcek1['crock_wid1'];}?><br><br>
            <?php if($rcek1['stat_cr']=="RANDOM"){echo $rcekR['rcrock_len2'];}else if($rcek1['stat_cr']=="DISPOSISI"){echo $rcekD['dcrock_len2'];}else{echo $rcek1['crock_len2'];}?><br><br>
            <?php if($rcek1['stat_cr']=="RANDOM"){echo $rcekR['rcrock_wid2'];}else if($rcek1['stat_cr']=="DISPOSISI"){echo $rcekD['dcrock_wid2'];}else{echo $rcek1['crock_wid2'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >(grade) Length<br><br>(grade) Width<br><br>(grade) Length<br><br>(grade) Width</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_cr']=="A" OR $rcek1['stat_cr']=="PASS" OR $rcek1['stat_cr']=="FAIL" OR $rcek1['stat_cr']=="RANDOM" OR $rcek1['stat_cr']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_cr']=="R"){echo "R";}?></td>
        </tr>
        <!--Phenolic Yellowing-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0510</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Phenolic Yellowing</strong><br>*Only for white and pale colours/ applicable for<br>synthetic/natural fibres &amp; blends</td>
            <td align="left" style="font-size: 8px;" >4-5 Color Change</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_py']=="RANDOM"){echo $rcekR['rphenolic_colorchange'];}else if($rcek1['stat_py']=="DISPOSISI"){echo $rcekD['dphenolic_colorchange'];}else{echo $rcek1['phenolic_colorchange'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >(grade)</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_py']=="A" OR $rcek1['stat_py']=="PASS" OR $rcek1['stat_py']=="FAIL" OR $rcek1['stat_py']=="RANDOM" OR $rcek1['stat_py']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_py']=="R"){echo "R";}?></td>
        </tr>
        <!--Light Fastness-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0511</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Light Fastness</strong></td>
            <td align="left" style="font-size: 8px;" >3 Color Change (rating 1)<br>&ge; 3<br><br><br>4 Color Change (rating 2)<br>Dark colours : &ge; 4 <br> Light colours : &ge; 3-4</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_lg']=="RANDOM"){echo $rcekR['rlight_rating1'];}else if($rcek1['stat_lg']=="DISPOSISI"){echo $rcekD['dlight_rating1'];}else{echo $rcek1['light_rating1'];}?><br><br><br><br>
            <?php if($rcek1['stat_lg']=="RANDOM"){echo $rcekR['rlight_rating2'];}else if($rcek1['stat_lg']=="DISPOSISI"){echo $rcekD['dlight_rating2'];}else{echo $rcek1['light_rating2'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >(grade)<br><br><br><br>(grade)</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_lg']=="A" OR $rcek1['stat_lg']=="PASS" OR $rcek1['stat_lg']=="FAIL" OR $rcek1['stat_lg']=="RANDOM" OR $rcek1['stat_lg']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_lg']=="R"){echo "R";}?></td>
        </tr>
        <!--Chlorine Test-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0513</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Chlorine Test (USA)</strong><br>*Only for USA orders, label reference</td>
            <td align="left" style="font-size: 8px;" >Safe</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_chl']=="RANDOM"){echo $rcekR['rchlorin'];}else if($rcek1['stat_chl']=="DISPOSISI"){echo $rcekD['dchlorin'];}else{echo $rcek1['chlorin'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >&nbsp;</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_chl']=="A" OR $rcek1['stat_chl']=="PASS" OR $rcek1['stat_chl']=="FAIL" OR $rcek1['stat_chl']=="RANDOM" OR $rcek1['stat_chl']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_chl']=="R"){echo "R";}?></td>
        </tr>
        <!--Color Migration Oven-->
        <!--<tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHX-AP0514</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Color Migration - Oven test<br>(For Trim Supplier)</strong></td>
            <td align="left" style="font-size: 8px;" ></td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_cmo']=="RANDOM"){echo $rcekR['rcm_printing_colorchange'];}else if($rcek1['stat_cmo']=="DISPOSISI"){echo $rcekD['dcm_printing_colorchange'];}else{echo $rcek1['cm_printing_colorchange'];}?>
            </td>
            <td align="left" style="font-size: 8px;" ></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_cmo']=="A" OR $rcek1['stat_cmo']=="PASS" OR $rcek1['stat_cmo']=="FAIL" OR $rcek1['stat_cmo']=="RANDOM" OR $rcek1['stat_cmo']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_cmo']=="R"){echo "R";}?></td>
        </tr>-->
        <!--Color Migration Fastness-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHX-AP0515</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Color Migration Fastness</strong><br><br>90&deg;C x 24h(<?php if($rcek1['cm_dye_temp']=='90'){echo "&#10003;"; }?>) Solid<br>70&deg;C x 48h(<?php if($rcek1['cm_dye_temp']=='70'){ echo "&#10003;"; }?>) Sublimation AOP<br><br>*Only test on the fabric contains<br>any synthetic fiber add paper<br>tissue insert result for ref.</td>
            <td align="left" style="font-size: 8px;" >4-5 Color Change<br><br>4 Color Staining<br><br>4 Color Staining</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_cm']=="RANDOM"){echo $rcekR['rcm_dye_colorchange'];}else if($rcek1['stat_cm']=="DISPOSISI"){echo $rcekD['dcm_dye_colorchange'];}else{echo $rcek1['cm_dye_colorchange'];}?><br><br>
            <?php if($rcek1['stat_cm']=="RANDOM"){echo $rcekR['rcm_dye_stainingface'];}else if($rcek1['stat_cm']=="DISPOSISI"){echo $rcekD['dcm_dye_stainingface'];}else{echo $rcek1['cm_dye_stainingface'];}?><br><br>
            <?php if($rcek1['stat_cm']=="RANDOM"){echo $rcekR['rcm_dye_stainingback'];}else if($rcek1['stat_cm']=="DISPOSISI"){echo $rcekD['dcm_dye_stainingback'];}else{echo $rcek1['cm_dye_stainingback'];}?>
            
            </td>
            <td align="left" style="font-size: 8px;" >(grade)<br><br>(grade)<br><br>(grade) with paper</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_cm']=="A" OR $rcek1['stat_cm']=="PASS" OR $rcek1['stat_cm']=="FAIL" OR $rcek1['stat_cm']=="RANDOM" OR $rcek1['stat_cm']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_cm']=="R"){echo "R";}?></td>
        </tr>
        <!--Light Perspiration Fastness-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHM-AP0517</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Light and Perspiration Fastness</strong><br>*Test on fabric containing cellulosic fibers</td>
            <td align="left" style="font-size: 8px;" >3-4 Color Change</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_lp']=="RANDOM"){echo $rcekR['rlight_pers_colorchange'];}else if($rcek1['stat_lp']=="DISPOSISI"){echo $rcekD['dlight_pers_colorchange'];}else{echo $rcek1['light_pers_colorchange'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >(grade)</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_lp']=="A" OR $rcek1['stat_lp']=="PASS" OR $rcek1['stat_lp']=="FAIL" OR $rcek1['stat_lp']=="RANDOM" OR $rcek1['stat_lp']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_lp']=="R"){echo "R";}?></td>
        </tr>
        <!--Saliva Fastness-->
        <tr>
            <td align="left" style="font-size: 8px;" valign="top"><strong>PHX-AP0519</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" style="font-size: 8px;" valign="top"><strong>Saliva Fastness</strong><br>*Only for infants of 36 months or younger</td>
            <td align="left" style="font-size: 8px;" >4-5 Color Staining</td>
            <td align="center" style="font-size: 8px;" >
            <?php if($rcek1['stat_slv']=="RANDOM"){echo $rcekR['rsaliva_staining'];}else if($rcek1['stat_slv']=="DISPOSISI"){echo $rcekD['dsaliva_staining'];}else{echo $rcek1['saliva_staining'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >(grade)</td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_slv']=="A" OR $rcek1['stat_slv']=="PASS" OR $rcek1['stat_slv']=="FAIL" OR $rcek1['stat_slv']=="RANDOM" OR $rcek1['stat_slv']=="DISPOSISI"){echo "A";}?></td>
            <td align="center" style="font-size: 8px;" ><?php if($rcek1['stat_slv']=="R"){echo "R";}?></td>
        </tr>
        <tr>
            <td colspan="9" align="center" style="font-size: 11px;"><strong>Fabric Functional Tests</strong></td>
        </tr>
        </table></td> 
    </tr>
    <tr>
        <td><table width="100%" border="1" class="table-list1">
            <tr>
            <thead>	  
                <tr>
                    <td width="4%" rowspan="4" style="font-size: 8px;"><div align="center"><strong>Method ID</strong></div></td>
                    <td width="4%" rowspan="4" style="font-size: 8px;"><div align="left"><strong>Fabric<br>Tech.<br>K: Knit<br>W: Woven</strong></div></td>
                    <td width="4%" rowspan="4" style="font-size: 8px;"><div align="left"><strong>Composition<br>N: Natural<br>S: Synthetic</strong></div></td>
                    <td width="11%" rowspan="4" style="font-size: 8px;"><div align="center"><strong>Test Standard Name</strong></div></td>
                    <td width="13%" rowspan="4" style="font-size: 8px;"><div align="center"><strong>Minimum Requirements<br>Underlined requirements are mandatory<br>on material level!</strong></div></td>
                    <td width="4%" rowspan="4" style="font-size: 8px;"><div align="center"><strong>Test Result</strong></div></td>
                    <td width="4%" rowspan="4" style="font-size: 8px;"><div align="center"><strong>Test Details</strong></div></td>
                    <td width="2%" rowspan="4" style="font-size: 8px;"><div align="center"><strong>A</strong></div></td>
                    <td width="2%" rowspan="4" style="font-size: 8px;"><div align="center"><strong>R</strong></div></td>
                </tr>
            </thead>
            </tr>
        <!--Water Reppelent-->
        <tr>
            <td align="left" rowspan="2" style="font-size: 8px;" valign="top"><strong>PHX-AP0601</strong></td>
            <td align="center" rowspan="2" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" rowspan="2" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" rowspan="2" style="font-size: 8px;" valign="top"><strong>Water reppelency Spray test</strong><br><br>*PHX-AP0601 is required as well for all<br>fabrics with WR &amp; DWR finish</td>
            <td align="left" style="font-size: 8px;" >&ge; 4</td>
            <!--<td align="left" style="font-size: 8px;" >&ge; 4</td>-->
            <td align="center" rowspan="2" style="font-size: 8px;" >
            <?php if($rcek1['stat_wp']=="RANDOM"){echo $rcekR['rrepp1'];}else if($rcek1['stat_wp']=="DISPOSISI"){echo $rcekD['drepp1'];}else{echo $rcek1['repp1'];}?><br><br>
            <?php if($rcek1['stat_wp1']=="RANDOM"){echo $rcekR['rrepp2'];}else if($rcek1['stat_wp1']=="DISPOSISI"){echo $rcekD['drepp2'];}else{echo $rcek1['repp2'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >(rating) Before Wash</td>
            <td align="center" rowspan="2" style="font-size: 8px;"><?php if(($rcek1['stat_wp']=="A" OR $rcek1['stat_wp']=="PASS" OR $rcek1['stat_wp']=="FAIL" OR $rcek1['stat_wp']=="RANDOM" OR $rcek1['stat_wp']=="DISPOSISI") AND ($rcek1['stat_wp1']=="A" OR $rcek1['stat_wp1']=="PASS" OR $rcek1['stat_wp1']=="FAIL" OR $rcek1['stat_wp1']=="RANDOM" OR $rcek1['stat_wp1']=="DISPOSISI")){echo "A";}?></td>
            <td align="center" rowspan="2" style="font-size: 8px;"><?php if($rcek1['stat_wp']=="R" OR $rcek1['stat_wp1']=="R"){echo "R";}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 8px;" >&ge; 3</td>
            <td align="left" style="font-size: 8px;" >(rating) After 10 Wash</td>
        </tr>
        <!--Absorbency-->
        <tr>
            <td align="left" rowspan="2" style="font-size: 8px;" valign="top"><strong>PHM-AP0604</strong></td>
            <td align="center" rowspan="2" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" rowspan="2" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" rowspan="2" style="font-size: 8px;" valign="top"><strong>Water Absorbency (drop test)</strong><br><br>*PHX-AP0604 is required as well for all<br>fabrics with hydrophilic finish</td>
            <td align="left" rowspan="2" style="font-size: 8px;" >Depends On Climacool Label<br><br>&le; 3 sec Knits / &le; 5 sec Woven<br>&le; 5 sec Seamless (Knits & Woven)</td>
            <td align="center" rowspan="2" style="font-size: 8px;" >
            <?php if($rcek1['stat_abs']=="RANDOM"){echo $rcekR['rabsor_f1'];}else if($rcek1['stat_abs']=="DISPOSISI"){echo $rcekD['dabsor_f1'];}else{echo $rcek1['absor_f1'];}?><br><br>
            <?php if($rcek1['stat_abs1']=="RANDOM"){echo $rcekR['rabsor_b1'];}else if($rcek1['stat_abs1']=="DISPOSISI"){echo $rcekD['dabsor_b1'];}else{echo $rcek1['absor_b1'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >[sec] Before Wash</td>
            <td align="center" rowspan="2" style="font-size: 8px;"><?php if(($rcek1['stat_abs']=="A" OR $rcek1['stat_abs']=="PASS" OR $rcek1['stat_abs']=="FAIL" OR $rcek1['stat_abs']=="RANDOM" OR $rcek1['stat_abs']=="DISPOSISI") AND ($rcek1['stat_abs1']=="A" OR $rcek1['stat_abs1']=="PASS" OR $rcek1['stat_abs1']=="FAIL" OR $rcek1['stat_abs1']=="RANDOM" OR $rcek1['stat_abs1']=="DISPOSISI")){echo "A";}?></td>
            <td align="center" rowspan="2" style="font-size: 8px;"><?php if($rcek1['stat_abs']=="R" OR $rcek1['stat_abs1']=="R"){echo "R";}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 8px;" >[sec] After 5 Wash</td>
        </tr>
        <!--Wicking-->
        <tr>
            <td align="left" rowspan="4" style="font-size: 8px;" valign="top"><strong>PHM-AP0616</strong></td>
            <td align="center" rowspan="2" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" rowspan="2" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" rowspan="2" style="font-size: 8px;" valign="top"><strong>Wicking Height-Vertical</strong></td>
            <td align="left" rowspan="2" style="font-size: 8px;" >Depends On Climacool Label<br><br>&ge; 100 mm Knits (incl. Seamless) [mm/10min]<br>&ge; 90 mm Woven_[mm/10min]</td>
            <td align="center" rowspan="2" style="font-size: 8px;" >
            <?php if($rcek1['stat_wic']=="RANDOM"){echo $rcekR['rwick_l1'];}else if($rcek1['stat_wic']=="DISPOSISI"){echo $rcekD['dwick_l1'];}else{echo $rcek1['wick_l1'];}?><br><br>
            <?php if($rcek1['stat_wic2']=="RANDOM"){echo $rcekR['rwick_l2'];}else if($rcek1['stat_wic2']=="DISPOSISI"){echo $rcekD['dwick_l2'];}else{echo $rcek1['wick_l2'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >[mm] Before Wash</td>
            <td align="center" rowspan="2" style="font-size: 8px;"><?php if(($rcek1['stat_wic']=="A" OR $rcek1['stat_wic']=="PASS" OR $rcek1['stat_wic']=="FAIL" OR $rcek1['stat_wic']=="RANDOM" OR $rcek1['stat_wic']=="DISPOSISI") AND ($rcek1['stat_wic2']=="A" OR $rcek1['stat_wic2']=="PASS" OR $rcek1['stat_wic2']=="FAIL" OR $rcek1['stat_wic2']=="RANDOM" OR $rcek1['stat_wic2']=="DISPOSISI")){echo "A";}?></td>
            <td align="center" rowspan="2" style="font-size: 8px;"><?php if($rcek1['stat_wic']=="R" OR $rcek1['stat_wic2']=="R"){echo "R";}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 8px;" >[mm] After 5 Wash</td>
        </tr>
        <tr>
            <td align="center" rowspan="2" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" rowspan="2" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" rowspan="2" style="font-size: 8px;" valign="top"><strong>Wicking Height-Horizontal</strong></td>
            <td align="left" rowspan="2" style="font-size: 8px;" >Depends On Climacool Label<br><br>&ge; 100 mm Knits (incl. Seamless) [mm/10min]<br>&ge; 90 mm Woven_[mm/10min]</td>
            <td align="center" rowspan="2" style="font-size: 8px;" >
            <?php if($rcek1['stat_wic1']=="RANDOM"){echo $rcekR['rwick_w1'];}else if($rcek1['stat_wic1']=="DISPOSISI"){echo $rcekD['dwick_w1'];}else{echo $rcek1['wick_w1'];}?><br><br>
            <?php if($rcek1['stat_wic3']=="RANDOM"){echo $rcekR['rwick_w2'];}else if($rcek1['stat_wic3']=="DISPOSISI"){echo $rcekD['dwick_w2'];}else{echo $rcek1['wick_w2'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >[mm] Before Wash</td>
            <td align="center" rowspan="2" style="font-size: 8px;"><?php if(($rcek1['stat_wic1']=="A" OR $rcek1['stat_wic1']=="PASS" OR $rcek1['stat_wic1']=="FAIL" OR $rcek1['stat_wic1']=="RANDOM" OR $rcek1['stat_wic1']=="DISPOSISI") AND ($rcek1['stat_wic3']=="A" OR $rcek1['stat_wic3']=="PASS" OR $rcek1['stat_wic3']=="FAIL" OR $rcek1['stat_wic3']=="RANDOM" OR $rcek1['stat_wic3']=="DISPOSISI")){echo "A";}?></td>
            <td align="center" rowspan="2" style="font-size: 8px;"><?php if($rcek1['stat_wic1']=="R" OR $rcek1['stat_wic3']=="R"){echo "R";}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 8px;" >[mm] After 5 Wash</td>
        </tr>
        <!--Evaporation Rate-->
        <tr>
            <td align="left" rowspan="2" style="font-size: 8px;" valign="top"><strong>PHM-AP0617</strong></td>
            <td align="center" rowspan="2" style="font-size: 8px;" valign="top"><strong>KW</strong></td>
            <td align="center" rowspan="2" style="font-size: 8px;" valign="top"><strong>NS</strong></td>
            <td align="left" rowspan="2" style="font-size: 8px;" valign="top"><strong>Evaporation Rate</strong><br><br>*PHM-AP0617 is to replace PHX-AP0607</td>
            <td align="left" rowspan="2" style="font-size: 8px;" >Depends On Climacool Label<br><br>&ge; 0.25</td>
            <td align="center" rowspan="2" style="font-size: 8px;" >
            <?php if($rcek1['stat_dry']=="RANDOM"){echo $rcekR['rdry1'];}else if($rcek1['stat_dry']=="DISPOSISI"){echo $rcekD['ddry1'];}else{echo $rcek1['dry1'];}?><br><br>
            <?php if($rcek1['stat_dry1']=="RANDOM"){echo $rcekR['rdryaf1'];}else if($rcek1['stat_dry1']=="DISPOSISI"){echo $rcekD['ddryaf1'];}else{echo $rcek1['dryaf1'];}?>
            </td>
            <td align="left" style="font-size: 8px;" >[g/h] Before Wash</td>
            <td align="center" rowspan="2" style="font-size: 8px;"><?php if(($rcek1['stat_dry']=="A" OR $rcek1['stat_dry']=="PASS" OR $rcek1['stat_dry']=="FAIL" OR $rcek1['stat_dry']=="RANDOM" OR $rcek1['stat_dry']=="DISPOSISI") AND ($rcek1['stat_dry1']=="A" OR $rcek1['stat_dry1']=="PASS" OR $rcek1['stat_dry1']=="FAIL" OR $rcek1['stat_dry1']=="RANDOM" OR $rcek1['stat_dry1']=="DISPOSISI")){echo "A";}?></td>
            <td align="center" rowspan="2" style="font-size: 8px;"><?php if($rcek1['stat_dry']=="R" OR $rcek1['stat_dry1']=="R"){echo "R";}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 8px;" >[g/h] After 5 Wash</td>
        </tr>
        
        <tr>
            <td align="left" style="font-size: 8px;" valign="top">Comments:</td>
            <td align="left" colspan="8" style="font-size: 10px;"><strong><?php echo $rcekbs['note_bs'];?><br><?php if($rcekbs['ss_cmt']=='1'){echo "PHX-AP0701 slight color change, no obvious pilling (face=".$rcek1['apperss_pf2'].", back=".$rcek1['apperss_pb2']."), snagging (face=".$rcek1['apperss_sf2'].", back=".$rcek1['apperss_sb2']."), overall satisfactory";}?></strong></td>
        </tr>
        <table width="100%" border="0">
        <tr>
            <td align="left" style="font-size: 8px;" colspan="9">*All tests need to follow the adidas "Quality Assurance Test Matrix" according to lab test and most updated version</td>
        </tr>
        <tr>
            <td align="right" style="font-size: 8px;" colspan="9"><strong>Prepared and checked by: <?php echo $rcek1['approve'];?></strong></td>
        </tr>
        <tr>
            <td align="right" style="font-size: 8px;" colspan="9"><strong>Report issued date: <?php echo $now;?></strong></td>
        </tr>
        </table>
    </table></td>
    </tr>
</table>
</body>
</html>