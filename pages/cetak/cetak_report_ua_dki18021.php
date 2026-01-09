<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
$idkk=$_GET['idkk'];
$noitem=$_GET['noitem'];
$nohanger=$_GET['nohanger'];
$now=date("Y-m-d");
$data=mysqli_query($con,"SELECT *,
	CONCAT_WS(' ',fc_note,ph_note, abr_note, bas_note, fla_note, fwe_note, fwi_note, burs_note,repp_note,apper_note,fiber_note,pillb_note,pillm_note,pillr_note,thick_note,growth_note,recover_note,stretch_note,sns_note,snab_note,snam_note,snap_note,wash_note,water_note,acid_note,alkaline_note,crock_note,phenolic_note,cm_printing_note,cm_dye_note,light_note,light_pers_note,saliva_note,h_shrinkage_note,fibre_note,pilll_note,soil_note,apperss_note,bleeding_note,chlorin_note,dye_tf_note) AS note_g FROM tbl_tq_test WHERE id_nokk='$idkk' ORDER BY id DESC LIMIT 1");
$rcek1=mysqli_fetch_array($data);
$databs=mysqli_query($con,"SELECT *,
	CONCAT_WS(' ',bas_note) AS note_bs FROM tbl_tq_test WHERE id_nokk='$idkk' ORDER BY id DESC LIMIT 1");
$rcekbs=mysqli_fetch_array($databs);
$sqlCekR=mysqli_query($con,"SELECT *,
	CONCAT_WS(' ',rfc_note,rph_note, rabr_note, rbas_note, rfla_note, rfwe_note, rfwi_note, rburs_note,rrepp_note,rapper_note,rfiber_note,rpillb_note,rpillm_note,rpillr_note,rthick_note,rgrowth_note,rrecover_note,rstretch_note,rsns_note,rsnab_note,rsnam_note,rsnap_note,rwash_note,rwater_note,racid_note,ralkaline_note,rcrock_note,rphenolic_note,rcm_printing_note,rcm_dye_note,rlight_note,rlight_pers_note,rsaliva_note,rh_shrinkage_note,rfibre_note,rpilll_note,rsoil_note,rapperss_note,rbleeding_note,rchlorin_note,rdye_tf_note) AS rnote_g FROM tbl_tq_randomtest WHERE no_item='$noitem' OR no_hanger='$nohanger'");
$rcekR=mysqli_fetch_array($sqlCekR);
$sqlCekD=mysqli_query($con,"SELECT *,
	CONCAT_WS(' ',dfc_note,dph_note, dabr_note, dbas_note, dfla_note, dfwe_note, dfwi_note, dss_cmt, dburs_note,drepp_note,dapper_note,dfiber_note,dpillb_note,dpillm_note,dpillr_note,dthick_note,dgrowth_note,drecover_note,dstretch_note,dsns_note,dsnab_note,dsnam_note,dsnap_note,dwash_note,dwater_note,dacid_note,dalkaline_note,dcrock_note,dphenolic_note,dcm_printing_note,dcm_dye_note,dlight_note,dlight_pers_note,dsaliva_note,dh_shrinkage_note,dfibre_note,dpilll_note,dsoil_note,dapperss_note,dbleeding_note,dchlorin_note,ddye_tf_note) AS dnote_g FROM tbl_tq_disptest WHERE id_nokk='$idkk' ORDER BY id DESC LIMIT 1");
$rcekD=mysqli_fetch_array($sqlCekD);
$sqlCekM=mysqli_query($con,"SELECT *,
	CONCAT_WS(' ',mfc_note,mph_note, mabr_note, mbas_note, mdry_note, mfla_note, mfwe_note, mfwi_note, mburs_note,mrepp_note,mwick_note,mabsor_note,mapper_note,mfiber_note,mpillb_note,mpillm_note,mpillr_note,mthick_note,mgrowth_note,mrecover_note,mstretch_note,msns_note,msnab_note,msnam_note,msnap_note,mwash_note,mwater_note,macid_note,malkaline_note,mcrock_note,mphenolic_note,mcm_printing_note,mcm_dye_note,mlight_note,mlight_pers_note,msaliva_note,mh_shrinkage_note,mfibre_note,mpilll_note,msoil_note,mapperss_note,mbleeding_note,mchlorin_note,mdye_tf_note,mhumidity_note,modour_note) AS mnote_g FROM tbl_tq_marginal WHERE id_nokk='$idkk' ORDER BY id DESC LIMIT 1");
$rcekM=mysqli_fetch_array($sqlCekM);
$data1=mysqli_query($con,"SELECT nokk FROM tbl_tq_nokk WHERE id='$idkk'");
$rd=mysqli_fetch_array($data1);
$data2=mysqli_query($con,"SELECT * FROM tbl_tq_nokk WHERE id='$idkk'");
$rd2=mysqli_fetch_array($data2);
$pos=strpos($rd2['pelanggan'], "/");
$langganan=substr($rd2['pelanggan'],0,$pos);
$positem=strpos($rd2['no_item'], "(");
$uaproduct=substr($rd2['no_item'],$positem,20);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Print Report Under Armour</title>
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
   body {
        -webkit-print-color-adjust: exact !important; /* Chrome, Safari */
        color-adjust: exact !important; /*Firefox*/
        }
}

textarea { 
    border-style: none; 
    border-color: Transparent; 
    overflow: auto;        
  }
</style>
</head>
<body>
    <table width="100%">
        <!-- Page 1 Begin -->
        <tr>
            <td><table width="100%" border="0" class="table-list1"> 
                <tr>
                    <td width="10%" align="right" 
                    style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid;
                    border-bottom:0px #000000 solid;"><img src="ITTI_Logo.png" width="100" alt=""/></td>
                    <td align="left" style="border-top:0px #000000 solid; 
                    border-left:0px #000000 solid;  
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid; font-family: Arial,sans-serif;" width="60%">&nbsp;</td>
                    <td align="left" style="font-size: 28px; border-top:0px #000000 solid; 
                    border-left:0px #000000 solid; 
                    border-right:0px #000000 solid; 
                    border-bottom:0px #000000 solid; font-family: Arial,sans-serif;" width="30%"><strong>UNDER ARMOUR</strong><br><strong>TEST REPORT</strong></td>
                </tr>
                <tr>
				  <td colspan="3" align="center" style="font-size: 15px; border-top:0px #000000 solid; 
					border-left:0px #000000 solid; 
					border-right:0px #000000 solid; font-family: Arial,sans-serif;" width="100%"><strong>Technical Report : </strong> <br> 
					<?php //echo 'INDO-'.$rd2['season'].$uaproduct.$rd2['no_hanger'].'-'.$rd2['warna'].'-'.$rd2['no_rptua'];;
					echo 'INDO-'.$rd2['season'].$uaproduct.$rd2['no_hanger'].'-'.$rd2['warna'].'-SLFT'.$rd2['no_test'];
					?>
				  </td>
				</tr>
            </table></td>
        </tr>
        <tr>
            <td align="right" style="font-size: 12px;">&nbsp;</td> 
        </tr>  
        <tr>
            <td align="right" style="font-size: 12px;"><?php echo $rd2['no_rptlulu'];?><?php if($rd2['sts_rev']=="1" AND $rd2['revisi']!=""){echo "-".$rd2['revisi'];}?></td> 
        </tr>
        <tr>
            <td align="right" style="font-size: 12px;"><?php if($rd2['reject1']!=''){echo "Page 1 of 7";}else{echo "Page 1 of 6";}?></td> 
        </tr>
        <tr>
            <td align="right" style="font-size: 12px;"><?php echo date("F j, Y", strtotime($rd2['date_out']));?></td> 
        </tr>
        <?php 
        for($i=1;$i<=7;$i++)
        {
        ?>
        <tr>
            <td align="right" style="font-size: 12px;">&nbsp;</td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td align="center" style="font-size: 12px;"><img src="../../dist/img-rptua/<?php echo $rd2['cover'];?>" style="border: 4px solid #555;" height="400" alt=""/></td> 
        </tr>
        <?php 
        for($i=1;$i<=18;$i++)
        {
        ?>
        <tr>
            <td align="right" style="font-size: 12px;">&nbsp;</td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td align="center" style="font-size: 15px;"><strong>INDO TAICHEN TEXTILE INDUSTRY</strong></td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;">Jl. Gatot Subroto KM. 3 Kel. Uwung Jaya, Cibodas, Tangerang, Banten, 15138, P.O BOX 487</td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;">Phone : (021) 5520920 (Hunting), FAX : (021) 5523763, 55790329, 5520035</td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;">E-mail : qcf.labtest@indotaichen.com | Website: www.indotaichen.com</td> 
        </tr>
    </table>
    <div class="pagebreak"></div>
        <!-- Page 1 End -->
        <!-- Page 2 Begin -->        
    <table width="100%">
        <tr>
            <td align="left" style="font-size: 23px; font-family: Times New Roman;" colspan="3">&nbsp;</td> 
            <td align="left" style="font-size: 20px; font-family: Arial,sans-serif;" ><strong>UNDER ARMOUR</strong><br><strong>TEST REPORT</strong></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="50%">TO : UNDER ARMOUR</td> 
            <td align="right" style="font-size: 12px;" width="25%">LAB NO</td> 
            <td align="right" style="font-size: 12px;" width="3%">:</td> 
            <td align="left" style="font-size: 12px;" width="25%">M0011-<?php echo date('Y');?></td> 
        </tr>
        <tr>
            <?php 
            $sqlattn=mysqli_query($con,"SELECT * FROM tbl_kontak_tq_langganan WHERE langganan='$langganan'");
            $attn=mysqli_fetch_array($sqlattn);
            ?>
            <td align="left" style="font-size: 12px;" width="50%">ATTN : UNDER ARMOUR</td>
            <td align="right" style="font-size: 12px;" width="25%">DATE IN</td> 
            <td align="right" style="font-size: 12px;" width="3%">:</td> 
            <td align="left" style="font-size: 12px;" width="25%"><?php echo date("F j, Y", strtotime($rd2['date_in']));?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="50%">&nbsp;</td>
            <td align="right" style="font-size: 12px;" width="25%">DATE OUT</td> 
            <td align="right" style="font-size: 12px;" width="3%">:</td> 
            <td align="left" style="font-size: 12px;" width="25%"><?php echo date("F j, Y", strtotime($rd2['date_out']));?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="50%">&nbsp;</td>
            <td align="right" style="font-size: 12px;" width="25%">NO. OF WORKING DAYS</td> 
            <td align="right" style="font-size: 12px;" width="3%">:</td> 
            <td align="left" style="font-size: 12px;" width="25%">6</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="50%">&nbsp;</td>
            <td align="right" style="font-size: 12px;" width="25%"><?php if($rd2['reject1']!=''){echo "PAGE 2 OF 7";}else{echo "PAGE 2 OF 6";}?></td> 
            <td align="right" style="font-size: 12px;" width="3%">&nbsp;</td> 
            <td align="right" style="font-size: 12px;" width="25%">&nbsp;</td>
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;" colspan="4">&nbsp;</td> 
        </tr>
        <tr>
            <td align="right" style="font-size: 12px;" colspan="4">
                <table width="35%" style="border: 3px solid #555;">
                    <tr>
                        <td align="center" style="font-size: 12px;" colspan="2"><u>OVERALL RATING</u></td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size: 12px;">PASS</td>
                        <td align="center" style="font-size: 12px;"><u><?php if($rcek1['status']=="Pass"){echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; X &nbsp; &nbsp; &nbsp; &nbsp;";}else{echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";}?></u></td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size: 12px;">FAIL</td>
                        <td align="center" style="font-size: 12px;"><u><?php if($rcek1['status']=="Fail"){echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; X &nbsp; &nbsp; &nbsp; &nbsp;";}else{echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";}?></u></td>
                    </tr>
                    <tr>
                        <td align="center" style="font-size: 12px;">DATA</td>
                        <td align="center" style="font-size: 12px;"><u><?php if($rcek1['status']=="Data"){echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; X &nbsp; &nbsp; &nbsp; &nbsp;";}else{echo "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;";}?></u></td>
                    </tr>
                </table>
            </td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;" colspan="4">&nbsp;</td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;" colspan="4">&nbsp;</td> 
        </tr>
    </table>
    <table width="100%" border="1" class="table-list1">
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Supplier:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">/</td>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Supplier Product #:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">/</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Vendor:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">PT INDO TAICHEN TEXTILE INDUSTRY</td>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Vendor Number:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">/</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Manufacturer:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">/</td>
            <td align="left" style="font-size: 12px;" width="25%"><strong>UA Product #:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%"><?php echo $uaproduct;?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Sample / Item Description:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%"><?php echo $rd2['jenis_kain'];?></td>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Purchase Order No.:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%"><?php echo $rd2['no_po'];?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Season:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%"><?php echo $rd2['season'];?></td>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Vendor Item #:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%"><?php echo $rd2['no_hanger'];?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Trim #:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">/</td>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Style #:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%"><?php echo $rd2['style'];?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Color Code:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%"><?php echo $rd2['no_warna'];?></td>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Color Name:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%"><?php echo $rd2['warna'];?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Country of Destination:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">/</td>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Country of Origin:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">INDONESIA</td>
        </tr>
        
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Fabric Weight:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%"><?php echo $rd2['gramasi']." g/m2";?></td>
            <?php
                $sqljk0 = "SELECT jenis_kain From tbl_tq_nokk WHERE id='$idkk'";
                $resultjk0=mysqli_query($con,$sqljk0);
                while($rowjk0=mysqli_fetch_array($resultjk0)){ 
                $detailjk0=explode(",",$rowjk0['jenis_kain']);?>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Fiber/Material Composition:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%"><?php if($detailjk0[0]!=""){echo $detailjk0[0];}else{echo "";}?></td>
            <?php }?>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Sample Category:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">/</td>
            <td align="left" style="font-size: 12px;" width="25%"><strong>UA Business:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">/</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Age:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">/</td>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Sample Status:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">/</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Colorblocked or Trimmed:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">/</td>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Sample Material Type:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">KNIT FABRIC</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Fiber Count:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">/</td>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Finishes:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">Hydrophilic Finish & Upfso+</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Garment Size:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">/</td>
            <td align="left" style="font-size: 12px;" width="25%"><strong>End Use:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%"><?php echo $rd2['enduse'];?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>SKU#:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%">/</td>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Fabric Article #:</strong></td>
            <td align="left" style="font-size: 12px;" width="25%"><?php echo $rd2['lot'];?></td>
        </tr>
    </table>
    <table width="100%" border="1" class="table-list1">
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Test Type:</strong></td>
            <td align="left" style="font-size: 12px;" width="75%"><?php echo $rd2['test_type'];?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Stage:</strong></td>
            <td align="left" style="font-size: 12px;" width="75%">BULK PRODUCTION</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Type Of Submission:</strong></td>
            <td align="left" style="font-size: 12px;" width="75%">INTERNAL TEST REPORT</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Protocol/Package Requested:</strong></td>
            <td align="left" style="font-size: 12px;" width="75%">..</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Previous Report No.:</strong></td>
            <td align="left" style="font-size: 12px;" width="75%"><?php echo $rd2['prev_report'];?></td>
        </tr>
    </table>
    <table width="100%" border="1" class="table-list1">
        <tr>
            <?php
                $sqljk1 = "SELECT jenis_kain From tbl_tq_nokk WHERE id='$idkk'";
                $resultjk1=mysqli_query($con,$sqljk1);
                while($rowjk1=mysqli_fetch_array($resultjk1)){ 
                $detailjk1=explode(",",$rowjk1['jenis_kain']);?>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Submitted Fiber Content</strong></td>
            <td align="left" style="font-size: 12px;" width="75%"><?php if($detailjk1[0]!=""){echo $detailjk1[0];}else{echo "";}?></td>
            <?php }?>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Actual Fiber Content</strong></td>
            <td align="left" style="font-size: 12px;" width="75%">/</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Suggested Fiber Content</strong></td>
            <td align="left" style="font-size: 12px;" width="75%">/</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Submitted Care Instruction(s)</strong></td>
            <td align="left" style="font-size: 12px;" width="75%">MACHINE WASH COLD, DO NOT BLEACH, TUMBLE DRY LOW, DO NOT IRON, DO NOT DRY CLEAN</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Clients Expected Care Instruction</strong></td>
            <td align="left" style="font-size: 12px;" width="75%">/</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="25%"><strong>Suggested Care Instruction(s)</strong></td>
            <td align="left" style="font-size: 12px;" width="75%">/</td>
        </tr>
    </table>
    <table width="100%" border="0">
        <?php 
        for($i=1;$i<=17;$i++)
        {
        ?>
        <tr>
            <td align="right" style="font-size: 12px;">&nbsp;</td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td align="center" style="font-size: 15px;"><strong>INDO TAICHEN TEXTILE INDUSTRY</strong></td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;">Phone : (021) 5520920 (Hunting), FAX : (021) 5523763, 55790329, 5520035</td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;">E-mail : qcf.labtest@indotaichen.com | Website: www.indotaichen.com</td> 
        </tr>
    </table>
    <div class="pagebreak"></div>
    <!-- Page 2 End -->
    <!-- Page 3 Begin -->
    <table width="100%">
        <?php 
        for($i=1;$i<=8;$i++)
        {
        ?>
        <tr>
            <td align="right" style="font-size: 12px;">&nbsp;</td>
        </tr>
        <?php
        }
        ?>
    </table>
    <table width="100%" border="1" class="table-list1">
        <thead>
            <tr>
                <td align="center" style="font-size: 12px;" width="30%"><strong>TEST PROPERTY</strong></td>
                <td align="center" style="font-size: 12px;" width="10%"><strong>PASS</strong></td>
                <td align="center" style="font-size: 12px;" width="10%"><strong>FAIL</strong></td>
                <td align="center" style="font-size: 12px;" width="10%"><strong>DATA</strong></td>
                <td align="center" style="font-size: 12px;" width="15%"><strong>COMMENTS</strong></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="left" style="font-size: 12px;">45 DEGREE FLAMMABILITY</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fla']=="PASS" OR $rcek1['stat_fla']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fla']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fla']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fla']==""){echo "N/A";}else if($rcek1['stat_fla']!=""){echo $rcekD['dfla_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">CUTTABLE WIDTH: UA METHOD</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fwss3']=="PASS" OR $rcek1['stat_fwss3']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fwss3']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fwss3']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fwss3']==""){echo "N/A";}else if($rcek1['stat_fwss3']!=""){echo $rcekD['dfwi_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">FABRIC WEIGHT</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fwss2']=="PASS" OR $rcek1['stat_fwss2']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fwss2']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fwss2']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fwss2']==""){echo "N/A";}else if($rcek1['stat_fwss2']!=""){echo $rcekD['dfwe_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">DIMENSIONAL CHANGE OF FABRICS AFTER HOME LAUNDERING</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fwss']=="PASS" OR $rcek1['stat_fwss']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fwss']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fwss']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fwss']==""){echo "N/A";}else if($rcek1['stat_fwss']!=""){echo $rcekD['dss_cmt'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">SKEWNESS FROM HOME LAUNDERING</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fwss']=="PASS" OR $rcek1['stat_fwss']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fwss']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fwss']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fwss']==""){echo "N/A";}else if($rcek1['stat_fwss']!=""){echo $rcekD['dss_cmt'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">SKEW</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_bsk']=="PASS" OR $rcek1['stat_bsk']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_bsk']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_bsk']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_bsk']==""){echo "N/A";}else if($rcek1['stat_bsk']!=""){echo $rcekD['dbas_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">APPEARANCE AFTER CARE</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_ap']=="PASS" OR $rcek1['stat_ap']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_ap']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_ap']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_ap']==""){echo "N/A";}else if($rcek1['stat_ap']!=""){echo $rcekD['dapper_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">TENSION AND ELONGATION OF ELASTIC FABRICS</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_sr']=="PASS" OR $rcek1['stat_sr']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_sr']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_sr']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_sr']==""){echo "N/A";}else if($rcek1['stat_sr']!=""){echo $rcekD['dstretch_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">GROWTH OF ELASTIC FABRICS</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_gr']=="PASS" OR $rcek1['stat_gr']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_gr']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_gr']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_gr']==""){echo "N/A";}else if($rcek1['stat_gr']!=""){echo $rcekD['dgrowth_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">PILLING RESISTANCE: RANDOM TUMBLE PILLING</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_prt']=="PASS" OR $rcek1['stat_prt']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_prt']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_prt']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_prt']==""){echo "N/A";}else if($rcek1['stat_prt']!=""){echo $rcekD['dpillr_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">PILLING RESISTANCE: CIRCULAR LOCUS, KNITS</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_pl']=="PASS" OR $rcek1['stat_pl']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_pl']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_pl']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_pl']==""){echo "N/A";}else if($rcek1['stat_pl']!=""){echo $rcekD['dpilll_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">SNAGGING RESISTANCE OF FABRICS: MACE</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_sm']=="PASS" OR $rcek1['stat_sm']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_sm']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_sm']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_sm']==""){echo "N/A";}else if($rcek1['stat_sm']!=""){echo $rcekD['dsnam_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">DRIP DIFFUSION TIME</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_abs']=="PASS" OR $rcek1['stat_abs']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_abs']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_abs']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_abs']==""){echo "N/A";}else if($rcek1['stat_abs']!=""){echo $rcekD['dabsor_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">FABRIC COUNT</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fc']=="PASS" OR $rcek1['stat_fc']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fc']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fc']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_fc']==""){echo "N/A";}else if($rcek1['stat_fc']!=""){echo $rcekD['dfc_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">BURSTING STRENGTH</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_bs2']=="PASS" OR $rcek1['stat_bs2']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_bs2']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_bs2']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_bs2']==""){echo "N/A";}else if($rcek1['stat_bs2']!=""){echo $rcekD['dburs_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">PH IN TEXTILES</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_ph']=="PASS" OR $rcek1['stat_ph']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_ph']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_ph']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_ph']==""){echo "N/A";}else if($rcek1['stat_ph']!=""){echo $rcekD['dph_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">COLORFASTNESS TO LAUNDERING</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_wf']=="PASS" OR $rcek1['stat_wf']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_wf']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_wf']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_wf']==""){echo "N/A";}else if($rcek1['stat_wf']!=""){echo $rcekD['dwash_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">COLORFASTNESS TO WATER</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_wtr']=="PASS" OR $rcek1['stat_wtr']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_wtr']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_wtr']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_wtr']==""){echo "N/A";}else if($rcek1['stat_wtr']!=""){echo $rcekD['dwater_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">COLORFASTNESS TO PERSPIRATION</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_pac']=="PASS" OR $rcek1['stat_pac']=="DISPOSISI" OR $rcek1['stat_pal']=="PASS"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_pac']=="FAIL" OR $rcek1['stat_pal']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_pac']=="DATA" OR $rcek1['stat_pal']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_pac']==""){echo "N/A";}else if($rcek1['stat_pac']!="" AND $rcek1['stat_pal']!=""){echo $rcekD['dacid_note']." ".$rcekD['dalkaline_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">COLORFASTNESS TO CROCKING</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_cr']=="PASS" OR $rcek1['stat_cr']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_cr']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_cr']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_cr']==""){echo "N/A";}else if($rcek1['stat_cr']!=""){echo $rcekD['dcrock_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">COLORFASTNESS TO DYE TRANSFER IN STORAGE</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_dye']=="PASS" OR $rcek1['stat_dye']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_dye']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_dye']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_dye']==""){echo "N/A";}else if($rcek1['stat_dye']!=""){echo $rcekD['ddye_tf_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">COLORFASTNESS TO LIGHT</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_lg']=="PASS" OR $rcek1['stat_lg']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_lg']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_lg']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_lg']==""){echo "N/A";}else if($rcek1['stat_lg']!=""){echo $rcekD['dlight_note'];}else{echo "&nbsp;";}?></td>
            </tr>
			  <tr>
                <td align="left" style="font-size: 12px;">COLORFASTNESS TO PERSPIRATION AND LIGHT</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_lp']=="PASS" OR $rcek1['stat_lp']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_lp']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_lp']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_lp']==""){echo "N/A";}else if($rcek1['stat_lp']!=""){echo $rcekD['dlight_pers_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">COLORFASTNESS TO PHENOLIC YELLOWING</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_py']=="PASS" OR $rcek1['stat_py']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_py']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_py']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_py']==""){echo "N/A";}else if($rcek1['stat_py']!=""){echo $rcekD['dphenolic_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">COLORFASTNESS TO NON-CHLORINE BLEACH</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_chl']=="PASS" OR $rcek1['stat_chl']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_chl']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_chl']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_chl']==""){echo "N/A";}else if($rcek1['stat_chl']!=""){echo $rcekD['dchlorin_note'];}else{echo "&nbsp;";}?></td>
            </tr>
            <tr>
                <td align="left" style="font-size: 12px;">HEAT SHRINKAGE</td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_hs']=="PASS" OR $rcek1['stat_hs']=="DISPOSISI"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_hs']=="FAIL"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_hs']=="DATA"){echo "X";}else{echo "&nbsp;";}?></td>
                <td align="center" style="font-size: 12px;"><?php if($rcek1['stat_hs']==""){echo "N/A";}else if($rcek1['stat_hs']!=""){echo $rcekD['dh_shrinkage_note'];}else{echo "&nbsp;";}?></td>
            </tr>
        </tbody>
    </table>
    <table width="100%" border="1" class="table-list1">
        <tr>
            <td align="left" style="font-size: 12px;">Notes:</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;"><textarea style="font-size: 12px; text-align:left;" name="comments" type="text" placeholder="Ketik" size="250" rows="3" cols="120"></textarea></td>
        </tr>
    </table>
    <br><br><br><br>
    <table width="100%">
        <?php 
        for($i=1;$i<=4;$i++)
        {
        ?>
        <tr>
            <td align="right" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td align="center" style="font-size: 12px;">&nbsp;</td>
            <td align="center" style="font-size: 12px;">&nbsp;</td>
            <td align="center" style="font-size: 12px;">&nbsp;</td>
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;"><img src="../../dist/img/Vivik Kurniawati.png" height="55" alt=""/></td>
            <td align="center" style="font-size: 12px;">&nbsp;</td>
            <td align="center" style="font-size: 12px;"><img src="../../dist/img/Ferry Wibowo.png" height="55" alt=""/></td>
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;"><u>VIVIK KURNIAWATI</u></td>
            <td align="center" style="font-size: 12px;">&nbsp;</td>
            <td align="center" style="font-size: 12px;"><u>FERRY WIBOWO</u></td>
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;">SUPERVISOR QCF</td>
            <td align="center" style="font-size: 12px;">&nbsp;</td>
            <td align="center" style="font-size: 12px;">MANAGER QCF</td>
        </tr>
    </table>
    <table width="100%" border="0">
        <?php 
        for($i=1;$i<=8;$i++)
        {
        ?>
        <tr>
            <td align="right" style="font-size: 12px;">&nbsp;</td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td align="right" style="font-size: 12px;"><?php if($rd2['reject1']!=''){echo "PAGE 3 OF 7";}else{echo "PAGE 3 OF 6";}?></td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 15px;">&nbsp;</td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 15px;">&nbsp;</td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 15px;">&nbsp;</td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 15px;"><strong>INDO TAICHEN TEXTILE INDUSTRY</strong></td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;">Phone : (021) 5520920 (Hunting), FAX : (021) 5523763, 55790329, 5520035</td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;">E-mail : qcf.labtest@indotaichen.com | Website: www.indotaichen.com</td> 
        </tr>
    </table>
    <div class="pagebreak"></div>
    <!-- Page 3 End -->
    <?php if($rd2['reject1']!=''){?>
    <!-- Page 4 Begin -->
    <table width="100%">
        <?php 
        for($i=1;$i<=8;$i++)
        {
        ?>
        <tr>
            <td align="right" style="font-size: 12px;">&nbsp;</td>
        </tr>
        <?php
        }
        ?>
    </table>
    <table width="100%">
        <tr>
            <td align="center" style="font-size: 12px;">EXHIBIT #1</td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;"><img src="../../dist/img-rptua/<?php echo $rd2['reject1'];?>" height="300" alt=""/></td>
        </tr>
        <tr>
            <td align="center"><textarea style="font-size: 12px; text-align:center;" name="notereject1" type="text" placeholder="Ketik" size="250" rows="4" cols="40"></textarea></td>
        </tr>
        <tr>
            <td align="right" style="font-size: 12px;">&nbsp;</td> 
        </tr>
        <tr>
            <td align="right" style="font-size: 12px;">&nbsp;</td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;">EXHIBIT #2</td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;"><img src="../../dist/img-rptua/<?php echo $rd2['reject2'];?>" height="300" alt=""/></td>
        </tr>
        <tr>
            <td align="center"><textarea style="font-size: 12px; text-align:center;" name="notereject2" type="text" placeholder="Ketik" size="250" rows="4" cols="40"></textarea></td>
        </tr>
        <?php 
        for($i=1;$i<=6;$i++)
        {
        ?>
        <tr>
            <td align="right" style="font-size: 12px;">&nbsp;</td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td align="right" style="font-size: 12px;">PAGE 4 OF 7</td> 
        </tr>
    </table>
    <div class="pagebreak"></div>
    <?php }?>
    <!-- Page 4 End -->
    <!-- Page 5 Begin -->
    <table width="100%">
        <?php 
        for($i=1;$i<=5;$i++)
        {
        ?>
        <tr>
            <td align="right" style="font-size: 12px;">&nbsp;</td>
        </tr>
        <?php
        }
        ?>
    </table>
    <?php 
        $sqlstd=mysqli_query($con,"SELECT * FROM tbl_std_tq_ua WHERE no_item='$rd2[no_item]'");
        $rstd=mysqli_fetch_array($sqlstd);
    ?>
    <table width="100%">
        <tr>
            <td align="left" style="font-size: 12px;" width="33%">&nbsp;</td>
            <td align="center" style="font-size: 12px;" width="33%"><u>TEST RESULT</u></td>
            <td align="right" style="font-size: 12px;" width="33%">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="33%"><u>TEST PROPERTY</u></td>
            <td align="center" style="font-size: 12px;" width="33%">&nbsp;</td>
            <td align="right" style="font-size: 12px;" width="33%"><u>REQUIREMENT</u></td>
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- FLAMMABILITY BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>45 DEGREE FLAMMABILITY</u></strong> (16 CFR 1610)</td>
            <!-- <td align="left" style="font-size: 12px;" ><strong>T1 (1A) R22 DARK GREEN / T3 (1B) FLEECE DARK GREEN</strong></td> -->
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">FLAMMABILITY VALUE</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_fla']=="DISPOSISI"){echo $rcekD['dflamability'];}else if($rcek1['flamability']!=""){echo $rcek1['flamability'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['flamability']!=''){echo $rstd['flamability'];}else{}?></td>
        </tr>
        <!-- FLAMMABILITY END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- CUTTABLE WIDTH BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>CUTTABLE WIDTH: UA METHOD</u></strong> (ASTM D3774)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">(INCH)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_fwss3']=="DISPOSISI"){echo $rcekD['df_width'];}else if($rcek1['f_width']!=""){echo $rcek1['f_width'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['f_width']!=''){echo $rstd['f_width'];}else{}?></td>
        </tr>
        <!-- CUTTABLE WIDTH END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- FABRIC WEIGHT BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>FABRIC WEIGHT</u></strong> (ASTM D3776, OPTION C)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">OZ/SQ.YD</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_fwss2']=="DISPOSISI"){echo number_format((float)$rcekD['df_weight']/33.906,2);}else if($rcek1['f_weight']!=""){echo number_format((float)$rcek1['f_weight']/33.906,2);}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rd2['gramasi']!=""){echo number_format((float)$rd2['gramasi']/33.906,2);}else{echo "N/A";}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">G / SQ.M</td>
            <?php 
            $batas_bawah = $rd2['gramasi'] * 0.95;
            $batas_atas  = $rd2['gramasi'] * 1.05;
            ?>
            <td align="center" style="font-size: 11px; <?php if($rcek1['f_weight']!='' AND $rcek1['f_weight'] < $batas_bawah){echo "color:red;";}else if($rcek1['f_weight']!='' AND $rcek1['f_weight'] > $batas_atas){echo "color:red;";}?>" width="33%"><?php if($rcek1['stat_fwss2']=="DISPOSISI"){echo $rcekD['df_weight'];}else if($rcek1['f_weight']!=""){echo $rcek1['f_weight'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rd2['gramasi']!=''){echo $rd2['gramasi'];}else{}?></td>
        </tr>
        <!-- FABRIC WEIGHT END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- DIMENSIONAL CHANGE BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>DIMENSIONAL CHANGE OF FABRICS AFTER HOME LAUNDERING</u></strong> (AATCC 135)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" colspan="3">MODIFIED, TIDE, 3 WASHES, 3 DRY, NORMAL CYCLE, AT 27 DEGREE CELCIUS. (80</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" colspan="3">FAHRENHEIT TEMP), TUMBLE DRY LOW, 4 LBS LOAD, MEASURE AT 10 INCHES</td>
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">KNIT-LENGTHWISE(%)</td>
            <td align="center" style="font-size: 11px; <?php if($rcek1['shrinkage_l1']!='' AND $rcek1['shrinkage_l1'] < -5){echo "color:red;";}else if($rcek1['shrinkage_l1']!='' AND $rcek1['shrinkage_l1'] > 0){echo "color:red;";}?>" width="33%"><?php if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_l1'];}else if($rcek1['shrinkage_l1']==""){echo "N/A";}else{echo $rcek1['shrinkage_l1'];}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['shrinkage1']!=''){echo $rstd['shrinkage1'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">KNIT-WIDTHWISE(%)</td>
            <td align="center" style="font-size: 11px; <?php if($rcek1['shrinkage_w1']!='' AND $rcek1['shrinkage_w1'] < -5){echo "color:red;";}else if($rcek1['shrinkage_w1']!='' AND $rcek1['shrinkage_w1'] > 0){echo "color:red;";}?>" width="33%"><?php if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dshrinkage_w1'];}else if($rcek1['shrinkage_w1']==""){echo "N/A";}else{echo $rcek1['shrinkage_w1'];}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['shrinkage2']!=''){echo $rstd['shrinkage2'];}else{}?></td>
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- <tr>
            <td align="left" style="font-size: 11px;" width="33%" colspan="2">(+) DENOTES ELONGATION &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (-) SHRINKAGE</td>
            <td align="center" style="font-size: 12px;" width="33%">&nbsp;</td>
        </tr> -->
        <!-- DIMENSIONAL CHANGE END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- SKEWNESS BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>SKEWNESS FROM HOME LAUNDERING</u></strong> (AATCC 179)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" colspan="3">METHOD 1, OPTION 1, 3 WASHES, NORMAL CYCLE AT 27 DEGREE CELCIUS, TUMBLE DRY LOW</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">&nbsp;</td>
            <td align="center" style="font-size: 11px; <?php if($rcek1['spirality1']!='' AND $rcek1['spirality1'] < -5){echo "color:red;";}else if($rcek1['spirality1']!='' AND $rcek1['spirality1'] > 5){echo "color:red;";}?>" width="33%"><?php if($rcek1['stat_fwss']=="DISPOSISI"){echo $rcekD['dspirality1'];}else if($rcek1['spirality1']==""){echo "N/A";}else{echo $rcek1['spirality1'];}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['spirality1']!=''){echo $rstd['spirality1'];}else{}?></td>
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- <tr>
            <td align="right" style="font-size: 11px;" width="33%">( + ) INDICATED SKEWNESS TO THE LEFT</td>
            <td align="right" style="font-size: 12px;" width="33%" colspan="2">&nbsp;</td>
        </tr>
        <tr>
            <td align="right" style="font-size: 11px;" width="33%">( - ) INDICATED SKEWNESS TO THE RIGHT</td>
            <td align="right" style="font-size: 12px;" width="33%" colspan="2">&nbsp;</td>
        </tr> -->
        <!-- SKEWNESS END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- BOW & SKEW BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>SKEW</u></strong> (ASTM D3882)</td>
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">SKEW</td>
            <td align="center" style="font-size: 11px; <?php if($rcek1['skew']!='' AND $rcek1['skew'] < 0){echo "color:red;";}else if($rcek1['skew']!='' AND $rcek1['skew'] > 5){echo "color:red;";}?>" width="33%"><?php if($rcek1['stat_bsk']=="DISPOSISI"){echo $rcekD['dskew'];}else if($rcek1['skew']!=""){echo $rcek1['skew'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['skew']!=''){echo $rstd['skew'];}else{}?></td>
        </tr>
        <!-- BOW & SKEW END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- APPEARANCE AFTER CARE BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>APPEARANCE AFTER CARE</u></strong> (AATCC 135)</td>
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" colspan="3">MACHINE WASH COLD, NORMAL CYCLE, TUMBLE DRY LOW, AFTER 3 WASHES</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">ANY OBSERVED DEFECTS</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_ap']=="DISPOSISI"){echo $rcekD['dapper_cc2'];}else if($rcek1['apper_cc2']!=''){echo $rcek1['apper_cc2'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['appearance1']!=''){echo $rstd['appearance1'];}else{}?></td>
        </tr>
        <!-- APPEARANCE AFTER CARE END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- TENSION AND ELONGATION BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>ELONGATION OF ELASTIC FABRICS</u></strong> (ASTM D4964)</td>
        </tr>
		
		
		
		<!--
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">LENGTH:ELONGATION (%)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_l1'];}else if($rcek1['stretch_l1']!=''){echo $rcek1['stretch_l1'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['stretch1']!=''){echo $rstd['stretch1'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" colspan="3">AT SPESIFIC LOAD 5 LBF</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">LENGTH:RECOVERY (%)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_l1'];}else if($rcek1['recover_l1']!=''){echo $rcek1['recover_l1'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['recovery1']!=''){echo $rstd['recovery1'];}else{}?></td>
        </tr>
        <tr>
            <td align="center" style="font-size: 11px;" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">WIDTH:ELONGATION (%)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_w1'];}else if($rcek1['stretch_w1']!=''){echo $rcek1['stretch_w1'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['stretch2']!=''){echo $rstd['stretch2'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" colspan="3">AT SPESIFIC LOAD 5 LBF</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">WIDTH:RECOVERY (%)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_w1'];}else if($rcek1['recover_w1']!=''){echo $rcek1['recover_w1'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['recovery2']!=''){echo $rstd['recovery2'];}else{}?></td>
        </tr>
		-->
		
		
		
		
		
		
		
		<!--2-->
		
		
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">LENGTH:ELONGATION (%)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_l2'];}else if($rcek1['stretch_l2']!=''){echo $rcek1['stretch_l2'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['stretch3']!=''){echo $rstd['stretch3'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" colspan="3">AT SPESIFIC LOAD 10 LBF</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">LENGTH:RECOVERY (%)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_l11'];}else if($rcek1['recover_l11']!=''){echo $rcek1['recover_l11'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['recovery3']!=''){echo $rstd['recovery3'];}else{}?></td>
        </tr>
        <tr>
            <td align="center" style="font-size: 11px;" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">WIDTH:ELONGATION (%)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_w2'];}else if($rcek1['stretch_w2']!=''){echo $rcek1['stretch_w2'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['stretch4']!=''){echo $rstd['stretch4'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" colspan="3">AT SPESIFIC LOAD 10 LBF</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">WIDTH:RECOVERY (%)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_w11'];}else if($rcek1['recover_w11']!=''){echo $rcek1['recover_w11'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['recovery4']!=''){echo $rstd['recovery4'];}else{}?></td>
        </tr>
		
		
		<!--2-->
		
		
		
		
		
		<!--3-->
		
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">LENGTH:ELONGATION (%)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_l3'];}else if($rcek1['stretch_l3']!=''){echo $rcek1['stretch_l3'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['stretch5']!=''){echo $rstd['stretch5'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" colspan="3">AT SPESIFIC LOAD 15 LBF</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">LENGTH:RECOVERY (%)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_l3'];}else if($rcek1['recover_l3']!=''){echo $rcek1['recover_l3'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['recovery5']!=''){echo $rstd['recovery5'];}else{}?></td>
        </tr>
        <tr>
            <td align="center" style="font-size: 11px;" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">WIDTH:ELONGATION (%)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_sr']=="DISPOSISI"){echo $rcekD['dstretch_w3'];}else if($rcek1['stretch_w3']!=''){echo $rcek1['stretch_w3'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['stretch6']!=''){echo $rstd['stretch6'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" colspan="3">AT SPESIFIC LOAD 15 LBF</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">WIDTH:RECOVERY (%)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_sr']=="DISPOSISI"){echo $rcekD['drecover_w3'];}else if($rcek1['recover_w3']!=''){echo $rcek1['recover_w3'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['recovery6']!=''){echo $rstd['recovery6'];}else{}?></td>
        </tr>
		
		
		<!--3-->
		
		
		
		
		
		
		
		
		
		
		
         <!-- TENSION AND ELONGATION END -->
    </table>
    <table width="100%" border="0">
        <?php 
        for($i=1;$i<=5;$i++)
        {
        ?>
        <tr>
            <td align="center" style="font-size: 12px;">&nbsp;</td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td align="right" style="font-size: 12px;"><?php if($rd2['reject1']!=''){echo "PAGE 5 OF 7";}else{echo "PAGE 4 OF 6";}?></td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 15px;">&nbsp;</td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 15px;"><strong>INDO TAICHEN TEXTILE INDUSTRY</strong></td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;">Phone : (021) 5520920 (Hunting), FAX : (021) 5523763, 55790329, 5520035</td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;">E-mail : qcf.labtest@indotaichen.com | Website: www.indotaichen.com</td> 
        </tr>
    </table>
    <div class="pagebreak"></div>
    <!-- Page 5 End -->
    <!-- Page 6 Begin -->
    <table width="100%">
        <tr>
            <td align="right" style="font-size: 12px;">&nbsp;</td> 
        </tr>
    </table>
    <table width="100%">
        <tr>
            <td align="left" style="font-size: 12px;" width="33%">&nbsp;</td>
            <td align="center" style="font-size: 12px;" width="33%"><u>TEST RESULT</u></td>
            <td align="right" style="font-size: 12px;" width="33%">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="33%"><u>TEST PROPERTY</u></td>
            <td align="center" style="font-size: 12px;" width="33%">&nbsp;</td>
            <td align="right" style="font-size: 12px;" width="33%"><u>REQUIREMENT</u></td>
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- GROWTH BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>GROWTH OF ELASTIC FABRICS</u></strong> (ASTM D2594)</td>
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">LENGTH</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_gr']=="DISPOSISI"){echo $rcekD['dgrowth_l1'];}else if($rcek1['growth_l1']!=''){echo $rcek1['growth_l1'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['growth1']!=''){echo $rstd['growth1'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">&nbsp;</td>
            <td align="center" style="font-size: 11px;" width="33%">&nbsp;</td>
            <td align="right" style="font-size: 11px;" width="33%">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">WIDTH</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_gr']=="DISPOSISI"){echo $rcekD['dgrowth_w1'];}else if($rcek1['growth_w1']!=''){echo $rcek1['growth_w1'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['growth2']!=''){echo $rstd['growth2'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">FORM FIT, 1 HOUR</td>
            <td align="center" style="font-size: 11px;" width="33%">&nbsp;</td>
            <td align="right" style="font-size: 11px;" width="33%">&nbsp;</td>
        </tr>
        <!-- GROWTH END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- PILLING R. TUMBLE BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>PILLING RESISTANCE:RANDOM TUMBLE PILLING</u></strong> (ASTM D3512, 30 MINS)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">FACE</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_prt']=="DISPOSISI"){echo $rcekD['dprt_f1'];}else if($rcek1['prt_f1']!=''){echo $rcek1['prt_f1'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">MIN. GRADE <?php if($rstd['pillr_tumble1']!=''){echo $rstd['pillr_tumble1'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">BACK</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_prt']=="DISPOSISI"){echo $rcekD['dprt_b1'];}else if($rcek1['prt_b1']!=''){echo $rcek1['prt_b1'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">MIN. GRADE <?php if($rstd['pillr_tumble2']!=''){echo $rstd['pillr_tumble2'];}else{}?></td>
        </tr>
		
		 <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
		
		 <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>PILLING RESISTANCE:RANDOM TUMBLE PILLING</u></strong> (ASTM D3512, 60 MINS)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">FACE</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_prt']=="DISPOSISI"){echo $rcekD['dprt_f2'];}else if($rcek1['prt_f2']!=''){echo $rcek1['prt_f2'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">MIN. GRADE <?php if($rstd['pillr_tumble3']!=''){echo $rstd['pillr_tumble3'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">BACK</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_prt']=="DISPOSISI"){echo $rcekD['dprt_b2'];}else if($rcek1['prt_b2']!=''){echo $rcek1['prt_b2'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">MIN. GRADE <?php if($rstd['pillr_tumble4']!=''){echo $rstd['pillr_tumble4'];}else{}?></td>
        </tr>
		
		
        <!-- PILLING R. TUMBLE END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
         <!-- PILLING LOCUS BEGIN -->
         <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>PILLING RESISTANCE: CIRCULAR LOCUS, KNITS</u></strong> (GB/T 4802.1 PARAMETER E)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">FACE</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_pl']=="DISPOSISI"){echo $rcekD['dpl_f1'];}else if($rcek1['pl_f1']!=''){echo $rcek1['pl_f1'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">MIN. GRADE <?php if($rstd['pill_locus1']!=''){echo $rstd['pill_locus1'];}else{}?></td>
        </tr>
        <!-- PILLING LOCUS END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- SNAGGING BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>SNAGGING RESISTANCE OF FABRICS:MACE</u></strong> (ASTM D3939, 600 CYCLES)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">WARP/WALES</td>
            <td align="center" style="font-size: 11px;" width="33%"> <?php if($rcek1['stat_sm']=="DISPOSISI"){echo $rcekD['dsm_l3'];}else if($rcek1['sm_l3']!=""){echo $rcek1['sm_l3'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">MIN. GRADE <?php if($rstd['snag_mace1']!=''){echo $rstd['snag_mace1'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">WEFT/COURSES</td>
            <td align="center" style="font-size: 11px;" width="33%"> <?php if($rcek1['stat_sm']=="DISPOSISI"){echo $rcekD['dsm_w3'];}else if($rcek1['sm_w3']!=""){echo $rcek1['sm_w3'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">MIN. GRADE <?php if($rstd['snag_mace2']!=''){echo $rstd['snag_mace2'];}else{}?></td>
        </tr>
        <!-- SNAGGING STRENGTH END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- DRIP DIFFUSION TIME BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>DRIP DIFFUSION TIME</u></strong> (UATM 079-21)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">AS RECEIVED (SECONDS)</td>
            <td align="center" style="font-size: 11px;" width="33%">&nbsp;</td>
            <td align="right" style="font-size: 11px;" width="33%">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">FACE</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_abs']=="DISPOSISI"){echo $rcekD['dabsor_f2'];}else if($rcek1['absor_f2']!=""){echo $rcek1['absor_f2'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['absorbency1']!=''){echo $rstd['absorbency1'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">BACK</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_abs']=="DISPOSISI"){echo $rcekD['dabsor_f1'];}else if($rcek1['absor_f1']!=""){echo $rcek1['absor_f1'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['absorbency1']!=''){echo $rstd['absorbency1'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">AFTER 3 WASHES (SECONDS)</td>
            <td align="center" style="font-size: 11px;" width="33%">&nbsp;</td>
            <td align="right" style="font-size: 11px;" width="33%">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">FACE</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_abs']=="DISPOSISI"){echo $rcekD['dabsor_b2'];}else if($rcek1['absor_b2']!=""){echo $rcek1['absor_b2'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['absorbency1']!=''){echo $rstd['absorbency1'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">BACK</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_abs']=="DISPOSISI"){echo $rcekD['dabsor_b1'];}else if($rcek1['absor_b1']!=""){echo $rcek1['absor_b1'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['absorbency1']!=''){echo $rstd['absorbency1'];}else{}?></td>
        </tr>
        <!-- ABSORBENCY END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- FABRIC COUNT BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>FABRIC COUNT</u></strong> (ASTM D3887)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">WALES</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_fc']=="DISPOSISI"){echo $rcekD['dfc_wpi'];}else if($rcek1['fc_wpi']!=""){echo $rcek1['fc_wpi'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['f_count1']!=''){echo $rstd['f_count1'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">COURSES</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_fc']=="DISPOSISI"){echo $rcekD['dfc_cpi'];}else if($rcek1['fc_cpi']!=""){echo $rcek1['fc_cpi'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['f_count2']!=''){echo $rstd['f_count2'];}else{}?></td>
        </tr>
        <!-- FABRIC COUNT END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- BURSTING STRENGTH BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>BURSTING STRENGTH</u></strong> (ASTM D6797)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">(LBF)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_bs2']=="DISPOSISI"){echo $rcekD['dbs_instron'];}else if($rcek1['bs_instron']!=""){echo $rcek1['bs_instron'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['burst_str']!=''){echo $rstd['burst_str'];}else{}?></td>
        </tr>
        <!-- BURSTING STRENGTH END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- PH IN TEXTILE BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>PH IN TEXTILES</u></strong> (AATCC 81)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">PH VALUE</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_ph']=="DISPOSISI"){echo $rcekD['dph'];}else if($rcek1['ph']!=""){echo $rcek1['ph'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['ph']!=''){echo $rstd['ph'];}else{}?></td>
        </tr>
        <!-- PH IN TEXTILE END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- WASH (LAUNDERING) BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>COLORFASTNESS TO LAUNDERING:ACCELERATED</u></strong> (AATCC 61. TEST NO.2A, AATCC DETERGENT WOB)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">COLOR CHANGE</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_wf']=="DISPOSISI"){echo $rcekD['dwash_colorchange'];}else if($rcek1['wash_colorchange']!=""){echo $rcek1['wash_colorchange'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['wash1']!=''){echo $rstd['wash1'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%"><u>COLOR STAIN ON</u></td>
            <td align="center" style="font-size: 11px;" width="33%">&nbsp;</td>
            <td align="right" style="font-size: 11px;" width="33%">&nbsp;</td>
        </tr>
		<tr> <!--YA-->
            <td align="left" style="font-size: 11px;" width="33%">ACETATE</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_wf']=="DISPOSISI"){echo $rcekD['dwash_acetate'];}else if($rcek1['wash_acetate']!=""){echo $rcek1['wash_acetate'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['wash2']!=''){echo 'GRADE MIN '.$rstd['wash2'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">COTTON</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_wf']=="DISPOSISI"){echo $rcekD['dwash_cotton'];}else if($rcek1['wash_cotton']!=""){echo $rcek1['wash_cotton'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['wash3']!=''){echo $rstd['wash3'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">NYLON</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_wf']=="DISPOSISI"){echo $rcekD['dwash_nylon'];}else if($rcek1['wash_nylon']!=""){echo $rcek1['wash_nylon'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['wash4']!=''){echo $rstd['wash4'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">POLYESTER</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_wf']=="DISPOSISI"){echo $rcekD['dwash_poly'];}else if($rcek1['wash_poly']!=""){echo $rcek1['wash_poly'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['wash5']!=''){echo $rstd['wash5'];}else{}?></td>
        </tr>
		<tr> <!--YA-->
            <td align="left" style="font-size: 11px;" width="33%">ACRYLIC</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_wf']=="DISPOSISI"){echo $rcekD['dwash_acrylic'];}else if($rcek1['wash_acrylic']!=""){echo $rcek1['wash_acrylic'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['wash6']!=''){echo 'GRADE MIN '.$rstd['wash6'];}else{}?></td>
        </tr>
		<tr> <!--YA-->
            <td align="left" style="font-size: 11px;" width="33%">WOOL</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_wf']=="DISPOSISI"){echo $rcekD['dwash_wool'];}else if($rcek1['wash_wool']!=""){echo $rcek1['wash_wool'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['wash7']!=''){echo 'GRADE MIN '.$rstd['wash7'];}else{}?></td>
        </tr>
        <!-- WASH (LAUNDERING) END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- WATER BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>COLORFASTNESS TO WATER</u></strong> (AATCC 107)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">COLOR CHANGE</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_wtr']=="DISPOSISI"){echo $rcekD['dwater_colorchange'];}else if($rcek1['water_colorchange']!=""){echo $rcek1['water_colorchange'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['water1']!=''){echo $rstd['water1'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%"><u>COLOR STAIN ON</u></td>
            <td align="center" style="font-size: 11px;" width="33%">&nbsp;</td>
            <td align="right" style="font-size: 11px;" width="33%">&nbsp;</td>
        </tr>
		<tr> <!--YA-->
            <td align="left" style="font-size: 11px;" width="33%">ACETATE</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_wtr']=="DISPOSISI"){echo $rcekD['dwater_acetate'];}else if($rcek1['water_acetate']!=""){echo $rcek1['water_acetate'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['water2']!=''){echo 'GRADE MIN '.$rstd['water2'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">COTTON</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_wtr']=="DISPOSISI"){echo $rcekD['dwater_cotton'];}else if($rcek1['water_cotton']!=""){echo $rcek1['water_cotton'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['water3']!=''){echo $rstd['water3'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">NYLON</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_wtr']=="DISPOSISI"){echo $rcekD['dwater_nylon'];}else if($rcek1['water_nylon']!=""){echo $rcek1['water_nylon'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['water4']!=''){echo $rstd['water4'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">POLYESTER</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_wtr']=="DISPOSISI"){echo $rcekD['dwater_poly'];}else if($rcek1['water_poly']!=""){echo $rcek1['water_poly'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['water5']!=''){echo $rstd['water5'];}else{}?></td>
        </tr>
		<tr><!--YA-->
            <td align="left" style="font-size: 11px;" width="33%">ACRYLIC</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_wtr']=="DISPOSISI"){echo $rcekD['dwater_acrylic'];}else if($rcek1['water_acrylic']!=""){echo $rcek1['water_acrylic'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['water6']!=''){echo 'GRADE MIN '.$rstd['water6'];}else{}?></td>
        </tr>
		<tr><!--YA-->
            <td align="left" style="font-size: 11px;" width="33%">WOOL</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_wtr']=="DISPOSISI"){echo $rcekD['dwater_wool'];}else if($rcek1['water_wool']!=""){echo $rcek1['water_wool'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['water7']!=''){echo 'GRADE MIN '.$rstd['water7'];}else{}?></td>
        </tr>
        <!-- WATER END --><tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
      
    </table>
    <table width="100%" border="0">
        <?php 
        for($i=1;$i<=1;$i++)
        {
        ?>
        <tr>
            <td align="center" style="font-size: 12px;">&nbsp;</td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td align="right" style="font-size: 12px;"><?php if($rd2['reject1']!=''){echo "PAGE 6 OF 7";}else{echo "PAGE 5 OF 6";}?></td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 15px;">&nbsp;</td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 15px;"><strong>INDO TAICHEN TEXTILE INDUSTRY</strong></td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;">Phone : (021) 5520920 (Hunting), FAX : (021) 5523763, 55790329, 5520035</td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;">E-mail : qcf.labtest@indotaichen.com | Website: www.indotaichen.com</td> 
        </tr>
    </table>
    <div class="pagebreak"></div>
    <!-- Page 6 End -->
    <!-- Page 7 Begin -->
    <table width="100%">
        <tr>
            <td align="left" style="font-size: 12px;" width="33%">&nbsp;</td>
            <td align="center" style="font-size: 12px;" width="33%"><u>TEST RESULT</u></td>
            <td align="right" style="font-size: 12px;" width="33%">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" width="33%"><u>TEST PROPERTY</u></td>
            <td align="center" style="font-size: 12px;" width="33%">&nbsp;</td>
            <td align="right" style="font-size: 12px;" width="33%"><u>REQUIREMENT</u></td>
        </tr>
		 <tr>
            <td align="left" style="font-size: 12px;" colspan="3">&nbsp;</td> 
        </tr>
		  <!-- PERSPIRATION BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>COLORFASTNESS TO PERSPIRATION</u></strong> (AATCC 15)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">COLOR CHANGE</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_pac']=="DISPOSISI"){echo $rcekD['dacid_colorchange'];}else if($rcek1['acid_colorchange']!=""){echo $rcek1['acid_colorchange'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['acid1']!=''){echo $rstd['acid1'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%"><u>COLOR STAIN ON</u></td>
            <td align="center" style="font-size: 11px;" width="33%">&nbsp;</td>
            <td align="right" style="font-size: 11px;" width="33%">&nbsp;</td>
        </tr>
		<tr> <!--YA-->
            <td align="left" style="font-size: 11px;" width="33%">ACETATE</td>
			<td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_pac']=="DISPOSISI"){echo $rcekD['dacid_acetate'];}else if($rcek1['acid_acetate']!=""){echo $rcek1['acid_acetate'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['acid2']!=''){echo 'GRADE MIN '.$rstd['acid2'];}else{}?></td>
	   </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">COTTON</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_pac']=="DISPOSISI"){echo $rcekD['dacid_cotton'];}else if($rcek1['acid_cotton']!=""){echo $rcek1['acid_cotton'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['acid3']!=''){echo $rstd['acid3'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">NYLON</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_pac']=="DISPOSISI"){echo $rcekD['dacid_nylon'];}else if($rcek1['acid_nylon']!=""){echo $rcek1['acid_nylon'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['acid4']!=''){echo $rstd['acid4'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">POLYESTER</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_pac']=="DISPOSISI"){echo $rcekD['dacid_poly'];}else if($rcek1['acid_poly']!=""){echo $rcek1['acid_poly'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['acid5']!=''){echo $rstd['acid5'];}else{}?></td>
        </tr>
		<tr> <!--YA-->
            <td align="left" style="font-size: 11px;" width="33%">ACRYLIC</td>
			<td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_pac']=="DISPOSISI"){echo $rcekD['dacid_acrylic'];}else if($rcek1['acid_acrylic']!=""){echo $rcek1['acid_acrylic'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['acid6']!=''){echo 'GRADE MIN '.$rstd['acid6'];}else{}?></td>
	   </tr>
	   <tr><!--YA-->
            <td align="left" style="font-size: 11px;" width="33%">WOOL</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_pac']=="DISPOSISI"){echo $rcekD['dacid_wool'];}else if($rcek1['acid_wool']!=""){echo $rcek1['acid_wool'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['acid7']!=''){echo 'GRADE MIN '.$rstd['acid7'];}else{}?></td>
        </tr>
        <!-- PERSPIRATION END -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3">&nbsp;</td> 
        </tr>
        <!-- CROCKING BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>COLORFASTNESS TO CROCKING</u></strong> (AATCC 8)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">DRY (COLOR STAIN)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_cr']=="DISPOSISI"){echo $rcekD['dcrock_len1'];}else if($rcek1['crock_len1']!=""){echo $rcek1['crock_len1'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['crock1']!=''){echo $rstd['crock1'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">WET (COLOR STAIN)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_cr']=="DISPOSISI"){echo $rcekD['dcrock_len2'];}else if($rcek1['crock_len2']!=""){echo $rcek1['crock_len2'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['crock2']!=''){echo $rstd['crock2'];}else{}?></td>
        </tr>
        <!-- CROCKING ACID END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- DYE TRANSFER BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>COLORFASTNESS TO DYE TRANSFER IN STORAGE</u></strong> (UNDER ARMOUR SOP #8.</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3">48 HOURS AT 70 DEGREE CELCIUS)</td>
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%"><u>COLOR STAIN ON</u></td>
            <td align="center" style="font-size: 11px;" width="33%">&nbsp;</td>
            <td align="right" style="font-size: 11px;" width="33%">&nbsp;</td>
        </tr>
		
		<tr>
            <td align="left" style="font-size: 11px;" width="33%">WHITE FABRIC</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_dye']=="DISPOSISI"){echo $rcekD['ddye_tf_cstaining'];}else if($rcek1['dye_tf_cstaining']!=""){echo $rcek1['dye_tf_cstaining'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['dye_tf8']!=''){ echo 'GRADE MIN '.$rstd['dye_tf8'];}else{}?></td>
        </tr>
		
        <tr>
            <td align="left" style="font-size: 11px;" width="33%"><!--WHITE FABRIC-->ACETATE</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_dye']=="DISPOSISI"){echo $rcekD['ddye_tf_acetate'];}else if($rcek1['dye_tf_acetate']!=""){echo $rcek1['dye_tf_acetate'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['dye_tf1']!=''){echo $rstd['dye_tf1'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">COTTON</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_dye']=="DISPOSISI"){echo $rcekD['ddye_tf_cotton'];}else if($rcek1['dye_tf_cotton']!=""){echo $rcek1['dye_tf_cotton'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['dye_tf3']!=''){echo $rstd['dye_tf3'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">NYLON</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_dye']=="DISPOSISI"){echo $rcekD['ddye_tf_nylon'];}else if($rcek1['dye_tf_nylon']!=""){echo $rcek1['dye_tf_nylon'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['dye_tf4']!=''){echo $rstd['dye_tf4'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">POLYESTER</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_dye']=="DISPOSISI"){echo $rcekD['ddye_tf_poly'];}else if($rcek1['dye_tf_poly']!=""){echo $rcek1['dye_tf_poly'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['dye_tf5']!=''){echo $rstd['dye_tf5'];}else{}?></td>
        </tr>
		 <tr>
            <td align="left" style="font-size: 11px;" width="33%">ACRYLIC</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_dye']=="DISPOSISI"){echo $rcekD['ddye_tf_acrylic'];}else if($rcek1['dye_tf_acrylic']!=""){echo $rcek1['dye_tf_acrylic'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['dye_tf6']!=''){ echo 'GRADE MIN '.$rstd['dye_tf6'];}else{}?></td>
        </tr>
		 <tr>
            <td align="left" style="font-size: 11px;" width="33%">WOOL</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_dye']=="DISPOSISI"){echo $rcekD['ddye_tf_wool'];}else if($rcek1['dye_tf_wool']!=""){echo $rcek1['dye_tf_wool'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['dye_tf7']!=''){ echo 'GRADE MIN '.$rstd['dye_tf7'];}else{}?></td>
        </tr>
        <!-- DYE TRANSFER END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- LIGHT BEGIN 1 -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>COLORFASTNESS TO LIGHT</u></strong> (AATCC 16, OPTION 3, 20 AFU)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">COLOR CHANGE (20 AFU)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_lg']=="DISPOSISI"){echo $rcekD['dlight_rating1'];}else if($rcek1['light_rating1']!=""){echo $rcek1['light_rating1'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['light']!=''){echo $rstd['light'];}else{}?></td>
        </tr>
        <!-- LIGHT END -->
		<tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
		
		 <!-- LIGHT BEGIN 2 -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>COLORFASTNESS TO PERSPIRATION AND LIGHT</u></strong> (AATCC 125, 20 AFU)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">COLOR CHANGE (20 AFU)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_lg']=="DISPOSISI"){echo $rcekD['dlight_pers_colorchange'];}else if($rcek1['light_pers_colorchange']!=""){echo $rcek1['light_pers_colorchange'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['light_pers1']!=''){echo $rstd['light_pers1'];}else{}?></td>
        </tr>
        <!-- LIGHT END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- PHENOLIC YELLOWING BEGIN -->
         <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>COLORFASTNESS TO PHENOLIC YELLOWING</u></strong> (ISO 105-X18/COURTALDS)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">COLOR CHANGE</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_py']=="DISPOSISI"){echo $rcekD['dphenolic_colorchange'];}else if($rcek1['phenolic_colorchange']!=""){echo $rcek1['phenolic_colorchange'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['phenolic']!=''){echo $rstd['phenolic'];}else{}?></td>
        </tr>
        <!-- PHENOLIC YELLOWING END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- NON-CHLORINE BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>COLORFASTNESS TO NON-CHLORINE BLEACH</u></strong> (AATCC/ASTM TS-001)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">COLOR CHANGE(PEROXIDE)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_chl']=="DISPOSISI"){echo $rcekD['dnchlorin1'];}else if($rcek1['nchlorin1']!=""){echo $rcek1['nchlorin1'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['non_chlorin']!=''){echo $rstd['non_chlorin'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">COLOR CHANGE(PERBORATE)</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_chl']=="DISPOSISI"){echo $rcekD['dnchlorin2'];}else if($rcek1['nchlorin2']!=""){echo $rcek1['nchlorin2'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%">GRADE MIN <?php if($rstd['non_chlorin']!=''){echo $rstd['non_chlorin'];}else{}?></td>
        </tr>
        <!-- NON-CHLORINE END -->
        <tr>
            <td align="center" style="font-size: 12px;" colspan="3">&nbsp;</td>
        </tr>
        <!-- HEAT SHRINKAGE BEGIN -->
        <tr>
            <td align="left" style="font-size: 12px;" colspan="3"><strong><u>HEAT SHRINKAGE</u></strong> (UATM 013)</td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">LENGTH</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_hs']=="DISPOSISI"){echo $rcekD['dh_shrinkage_l1'];}else if($rcek1['h_shrinkage_l1']!=""){echo $rcek1['h_shrinkage_l1'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['heat_shrinkage1']!=''){echo $rstd['heat_shrinkage1'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">WIDTH</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_hs']=="DISPOSISI"){echo $rcekD['dh_shrinkage_w1'];}else if($rcek1['h_shrinkage_w1']!=""){echo $rcek1['h_shrinkage_w1'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['heat_shrinkage1']!=''){echo $rstd['heat_shrinkage1'];}else{}?></td>
        </tr>
        <tr>
            <td align="left" style="font-size: 11px;" width="33%">SPIRALITY</td>
            <td align="center" style="font-size: 11px;" width="33%"><?php if($rcek1['stat_hs']=="DISPOSISI"){echo $rcekD['dh_shrinkage_grd'];}else if($rcek1['h_shrinkage_grd']!=""){echo $rcek1['h_shrinkage_grd'];}else{echo "N/A";}?></td>
            <td align="right" style="font-size: 11px;" width="33%"><?php if($rstd['heat_shrinkage2']!=''){echo $rstd['heat_shrinkage2'];}else{}?></td>
        </tr>
        <!-- HEAT SHRINKAGE END -->
    </table>
    <table width="100%" border="0">
        <?php 
        for($i=1;$i<=18;$i++)
        {
        ?>
        <tr>
            <td align="right" style="font-size: 12px;">&nbsp;</td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td align="right" style="font-size: 12px;"><?php if($rd2['reject1']!=''){echo "PAGE 7 OF 7";}else{echo "PAGE 6 OF 6";}?></td> 
        </tr>
		<!--
        <tr>
            <td align="center" style="font-size: 15px;">&nbsp;</td> 
        </tr> -->
        <tr>
            <td align="center" style="font-size: 15px;"><strong>INDO TAICHEN TEXTILE INDUSTRY</strong></td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;">Phone : (021) 5520920 (Hunting), FAX : (021) 5523763, 55790329, 5520035</td> 
        </tr>
        <tr>
            <td align="center" style="font-size: 12px;">E-mail : qcf.labtest@indotaichen.com | Website: www.indotaichen.com</td> 
        </tr>
    </table>
    <!-- Page 7 End -->
</body>
</html>