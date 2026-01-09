<?php 
//$lReg_username=$_SESSION['labReg_username'];
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g']; 
//-
$Awal=$_GET['Awal'];
$Akhir=$_GET['Akhir'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}

function lot($buyer){
include "../../koneksi.php"; 
if($buyer=="LAIN-LAIN"){
$byr =" AND not (  buyer = 'ADIDAS'
		OR  buyer = 'ADS'
		OR  buyer = 'lululemon'
		OR  buyer = 'LULU LEMON'
		OR  buyer = 'LULULEMON ATHLETICA'
		OR  buyer = 'LULULEMON ATHLETICA INC'
		OR  buyer = 'LLA'
		OR  buyer = 'UA'
		OR  buyer = 'UA-DOME'
		OR 	buyer = 'UNDER ARMOUR'
		OR  buyer = 'ALO YOGA'
		OR  buyer = 'ALO'
		OR  buyer = 'ATH') ";
$GRP =" ";	
}else{
$byr =" and buyer='$buyer' ";	
$GRP =" GROUP by buyer ";	
}	
$qry=mysqli_query($con,"SELECT   
	buyer,
	count(nokk) as lot_legacy,
	count(nodemand) as lot_demand,
	sum(rol) as rol,
	sum(bruto) as kgs
FROM
	tbl_schedule 
WHERE
	NOT STATUS = 'selesai' $byr
$GRP	
");
$r=mysqli_fetch_array($qry);
return round($r['lot_legacy']);	
}
function rol($buyer){
include "../../koneksi.php"; 
if($buyer=="LAIN-LAIN"){
$byr =" AND not (  buyer = 'ADIDAS'
		OR  buyer = 'ADS'
		OR  buyer = 'lululemon'
		OR  buyer = 'LULU LEMON'
		OR  buyer = 'LULULEMON ATHLETICA'
		OR  buyer = 'LULULEMON ATHLETICA INC'
		OR  buyer = 'LLA'
		OR  buyer = 'UA'
		OR  buyer = 'UA-DOME'
		OR 	buyer = 'UNDER ARMOUR'
		OR  buyer = 'ALO YOGA'
		OR  buyer = 'ALO'
		OR  buyer = 'ATH') ";
$GRP =" ";	
}else{
$byr =" and buyer='$buyer' ";	
$GRP =" GROUP by buyer ";	
}	
$qry=mysqli_query($con,"SELECT   
	buyer,
	count(nokk) as lot_legacy,
	count(nodemand) as lot_demand,
	sum(rol) as rol,
	sum(bruto) as kgs
FROM
	tbl_schedule 
WHERE
	NOT STATUS = 'selesai' $byr
$GRP	
");
$r=mysqli_fetch_array($qry);
return round($r['rol']);	
}
function kgs($buyer){
include "../../koneksi.php"; 
if($buyer=="LAIN-LAIN"){
$byr =" AND NOT (  buyer = 'ADIDAS'
		OR  buyer = 'ADS'
		OR  buyer = 'lululemon'
		OR  buyer = 'LULU LEMON'
		OR  buyer = 'LULULEMON ATHLETICA'
		OR  buyer = 'LULULEMON ATHLETICA INC'
		OR  buyer = 'LLA'
		OR  buyer = 'UA'
		OR  buyer = 'UA-DOME'
		OR 	buyer = 'UNDER ARMOUR'
		OR  buyer = 'ALO YOGA'
		OR  buyer = 'ALO'
		OR  buyer = 'ATH') ";
$GRP =" ";	
}else{
$byr =" and buyer='$buyer' ";	
$GRP =" GROUP by buyer ";	
}	
$qry=mysqli_query($con,"SELECT   
	buyer,
	count(nokk) as lot_legacy,
	count(nodemand) as lot_demand,
	sum(rol) as rol,
	sum(bruto) as kgs
FROM
	tbl_schedule 
WHERE
	NOT STATUS = 'selesai' $byr
$GRP	
");
$r=mysqli_fetch_array($qry);
return round($r['kgs'],2);	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Summary Buyer</title>
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
    <tr>
      <td><table width="100%" border="1" class="table-list1"> 
  <tr>
    <td width="9%" align="center"><img src="indo.jpg" width="40" height="40"  /></td>
    <td align="center" valign="middle"><strong><font size="+1" >SUMMARY BUYER</font></strong></td>
	</tr>
  </table>
<table width="100%" border="0">
    <tbody>
      <tr>
        <td width="78%"><font size="-1">Hari/Tanggal : <?php echo tanggal_indo ($tgl, true);?></font></td>
        <td width="22%" align="right">Jam: <?php echo date('H:i:s', strtotime($jam));?></td>
      </tr>
    </tbody>
  </table>
		</td>
    </tr>
	</thead>
    <tr>
      <td><table width="100%" border="1" class="table-list1" >
        <tbody>
          <tr align="center" >
            <td><strong style="font-size: 14px">No</strong></td>            <td><strong style="font-size: 14px">Buyer</strong></td>
            <td><strong style="font-size: 14px">Lot</strong></td>
            <td><strong style="font-size: 14px">Rolls</strong></td>
            <td><strong style="font-size: 14px">KGs</strong></td>
          </tr>
          <tr>
            <td align="center">1</td>
            <td>ADIDAS</td>
            <td align="center"><?php echo lot("ADIDAS")+lot("ADS"); ?></td>
            <td align="center"><?php echo rol("ADIDAS")+rol("ADS"); ?></td>
            <td align="center"><?php echo kgs("ADIDAS")+kgs("ADS"); ?></td>
          </tr>
          <tr>
            <td align="center">2</td>
            <td>LULULEMON</td>
            <td align="center"><?php echo lot("lululemon")+lot("LULULEMON ATHLETICA")+lot("LULULEMON ATHLETICA INC")+lot("LULU LEMON")+lot("LLA"); ?></td>
            <td align="center"><?php echo rol("lululemon")+rol("LULULEMON ATHLETICA")+rol("LULULEMON ATHLETICA INC")+rol("LULU LEMON")+rol("LLA"); ?></td>
            <td align="center"><?php echo kgs("lululemon")+kgs("LULULEMON ATHLETICA")+kgs("LULULEMON ATHLETICA INC")+kgs("LULU LEMON")+kgs("LLA"); ?></td>
          </tr>
          <tr>
            <td align="center">3</td>
            <td>UNDER ARMOR</td>
            <td align="center"><?php echo lot("UA")+lot("UA-DOME")+lot("UNDER ARMOUR"); ?></td>
            <td align="center"><?php echo rol("UA")+rol("UA-DOME")+rol("UNDER ARMOUR"); ?></td>
            <td align="center"><?php echo kgs("UA")+kgs("UA-DOME")+kgs("UNDER ARMOUR"); ?></td>
          </tr>
          <tr>
            <td align="center">4</td>
            <td>ALO YOGA</td>
            <td align="center"><?php echo lot("ALO YOGA")+lot("ALO"); ?></td>
            <td align="center"><?php echo rol("ALO YOGA")+rol("ALO"); ?></td>
            <td align="center"><?php echo kgs("ALO YOGA")+kgs("ALO"); ?></td>
          </tr>
          <tr>
            <td align="center">5</td>
            <td>ATHELETA </td>
            <td align="center"><?php echo lot("ATH"); ?></td>
            <td align="center"><?php echo rol("ATH"); ?></td>
            <td align="center"><?php echo kgs("ATH"); ?></td>
          </tr>
          <tr>
            <td align="center">6</td>
            <td>LAIN-LAIN</td>
            <td align="center"><?php echo lot("LAIN-LAIN"); ?></td>
            <td align="center"><?php echo rol("LAIN-LAIN"); ?></td>
            <td align="center"><?php echo kgs("LAIN-LAIN"); ?></td>
          </tr>
          <tr>
            <td colspan="2" align="right">TOTAL</td>
            <td align="center"><?php echo lot("ADIDAS")+lot("ADS")+lot("lululemon")+lot("LULULEMON ATHLETICA")+lot("LULULEMON ATHLETICA INC")+lot("LULU LEMON")+lot("LLA")+lot("UA")+lot("UA-DOME")+lot("UNDER ARMOUR")+lot("ALO YOGA")+lot("ALO")+lot("ATH")+lot("LAIN-LAIN");?></td>
            <td align="center"><?php echo rol("ADIDAS")+rol("ADS")+rol("lululemon")+rol("LULULEMON ATHLETICA")+rol("LULULEMON ATHLETICA INC")+rol("LULU LEMON")+rol("LLA")+rol("UA")+rol("UA-DOME")+rol("UNDER ARMOUR")+rol("ALO YOGA")+rol("ALO")+rol("ATH")+rol("LAIN-LAIN");?></td>
            <td align="center"><?php echo kgs("ADIDAS")+kgs("ADS")+kgs("lululemon")+kgs("LULULEMON ATHLETICA")+kgs("LULULEMON ATHLETICA INC")+kgs("LULU LEMON")+kgs("LLA")+kgs("UA")+kgs("UA-DOME")+kgs("UNDER ARMOUR")+kgs("ALO YOGA")+kgs("ALO")+kgs("ATH")+kgs("LAIN-LAIN");?></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  
</table> 
</body>
</html>