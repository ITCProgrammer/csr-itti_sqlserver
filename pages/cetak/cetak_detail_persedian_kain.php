<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$modal_id=$_GET['awal'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Cetak KPE</title>
<script>

// set portrait orientation

jsPrintSetup.setOption('orientation', jsPrintSetup.kPortraitOrientation);

// set top margins in millimeters
jsPrintSetup.setOption('marginTop', 0);
jsPrintSetup.setOption('marginBottom', 0);
jsPrintSetup.setOption('marginLeft', 0);
jsPrintSetup.setOption('marginRight', 0);

// set page header
jsPrintSetup.setOption('headerStrLeft', '');
jsPrintSetup.setOption('headerStrCenter', '');
jsPrintSetup.setOption('headerStrRight', '');

// set empty page footer
jsPrintSetup.setOption('footerStrLeft', '');
jsPrintSetup.setOption('footerStrCenter', '');
jsPrintSetup.setOption('footerStrRight', '');

// clears user preferences always silent print value
// to enable using 'printSilent' option
jsPrintSetup.clearSilentPrint();

// Suppress print dialog (for this context only)
jsPrintSetup.setOption('printSilent', 1);

// Do Print 
// When print is submitted it is executed asynchronous and
// script flow continues after print independently of completetion of print process! 
jsPrintSetup.print();

window.addEventListener('load', function () {
    var rotates = document.getElementsByClassName('rotate');
    for (var i = 0; i < rotates.length; i++) {
        rotates[i].style.height = rotates[i].offsetWidth + 'px';
    }
});
// next commands

</script>
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
    <td align="center"><strong><font size="+1">Cetak Detail Persediaan Kain</font><br />
		<font size="-1">Prod. Order: <?php echo $modal_id;?></font>
          <br />
		<!-- <font size="-1">FW-06-QCF-01/04</font></strong></td> -->
    </tr>
  </table>

		</td>
    </tr>
	</thead>
	
    <tr>
      <td><table width="100%" border="1" class="table-list1"> 
		  <thead>
          <tr align="center">
            <td><font size="-2">NO</font></td>
            <td><font size="-2">Tanggal Balance</font></td>
            <td><font size="-2">Item Element</font></td>
            <td><font size="-2">Primary Qty</font></td>
            <td><font size="-2">UOM Primary</font></td>
            <td><font size="-2">Secondary Qty</font></td>
            <td><font size="-2">UOM Secondary</font></td>
            <td><font size="-2">Warehouse</font></td>
            <td><font size="-2">Lokasi</td>
            <td><font size="-2">Quality Reason</font></td>
            
          </tr>
		  </thead>	  
		  <tbody>
		<?php
             $no=1;
             $sqldtl="SELECT 
             BALANCE.ELEMENTSCODE,
             BALANCE.BASEPRIMARYQUANTITYUNIT,
             BALANCE.BASEPRIMARYUNITCODE,
             BALANCE.BASESECONDARYQUANTITYUNIT,
             BALANCE.BASESECONDARYUNITCODE,
             BALANCE.LOGICALWAREHOUSECODE,
             BALANCE.WAREHOUSELOCATIONCODE,
             BALANCE.WHSLOCATIONWAREHOUSEZONECODE,
             BALANCE.CREATIONDATETIME,
             BALANCE.QUALITYLEVELCODE 
             FROM BALANCE BALANCE WHERE BALANCE.LOTCODE ='$modal_id' 
             ";
             $stmt=db2_exec($conn1,$sqldtl, array('cursor'=>DB2_SCROLLABLE));
        $totalPrimaryQty = 0;
        $totalSecondaryQty = 0;
        while($r=db2_fetch_assoc($stmt)){

          $sqlre="SELECT
                                ELEMENTS.QUALITYREASONCODE 
                            FROM
                                BALANCE BALANCE
                            LEFT JOIN ELEMENTS ELEMENTS ON BALANCE.ELEMENTSCODE = ELEMENTS.CODE
                            where
                                BALANCE.LOTCODE = '$modal_id'
                                AND BALANCE.ELEMENTSCODE = '$r[ELEMENTSCODE]'";

                                $stmte=db2_exec($conn1,$sqlre, array('cursor'=>DB2_SCROLLABLE));
                                while($re=db2_fetch_assoc($stmte)){
		 ?>
          <tr valign="top">
            <td align="center"><font size="-2"><?php echo $no; ?></font></td>
            <td align="center"><font size="-2"><?php echo substr($r['CREATIONDATETIME'],0,10);?></font></td>
            <td><font size="-2"><?php echo $r['ELEMENTSCODE'];?></font></td>
            <td><font size="-2"><?php echo number_format($r['BASEPRIMARYQUANTITYUNIT'], 2);?></font></td>
            <td align="center"><font size="-2"><?php echo $r['BASEPRIMARYUNITCODE'];?></font></td>
            <td align="center" style="font-size: 8px;"><?php echo number_format($r['BASESECONDARYQUANTITYUNIT'], 2);?></td>
            <td align="center"><font size="-2"><?php echo $r['BASESECONDARYUNITCODE'];?></font></td>
            <td align="center"><font size="-2"><?php echo $r['LOGICALWAREHOUSECODE'];?></font></td>
            <td align="center" valign="middle" style="font-size: 8px;"><?php echo $r['WHSLOCATIONWAREHOUSEZONECODE']."-".$r['WAREHOUSELOCATIONCODE'];?></td>
            <td align="center"><font size="-2"><?php echo $re['QUALITYREASONCODE'];?></font></td>
           
          </tr>
          <?php $no++; $totalPrimaryQty+= $r['BASEPRIMARYQUANTITYUNIT']; $totalSecondaryQty += $r['BASESECONDARYQUANTITYUNIT']; }}?>
			</tbody>
      <tfoot>
        <tr>
          <td align="right" colspan="3">Total</td>
          <td><?= number_format($totalPrimaryQty, 2) ?></td>
          <td></td>
          <td><?= number_format($totalSecondaryQty, 2) ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tfoot>
        
      </table></td>
    </tr>
	</tbody>
  
</table>

<script>
//alert('cetak');window.print();
</script> 
</body>
</html>