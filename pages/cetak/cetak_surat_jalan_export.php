<style>
input{
text-align:center;
border:hidden;
}
body,td,th {
  /*font-family: Courier New, Courier, monospace; */ 
  font-family:sans-serif, Roman, serif;
}
body{
	margin:0px auto 0px;
	padding:1px;
	font-size:10px;
	color:#333;
	width:98%;
	background-position:top;
	background-color:#fff;
}
.table-list {
	clear: both;
	text-align: left;
	border-collapse: collapse;
	margin: 0px 0px 2px 0px;
	background:#fff;	
}
.table-list td {
	color: #333;
	font-size:12px;
	border-color: #fff;
	border-collapse: collapse;
	vertical-align: center;
	padding: 0px 1px;
	border-bottom:0px #000000 solid;
	border-top:0px #000000 solid;
	border-left:0px #000000 solid;
	border-right:0px #000000 solid;

	
}
.table-list1 {
	clear: both;
	text-align: left;
	border-collapse: collapse;
	margin: 0px 0px 2px 0px;
	background:#fff;	
}
.table-list1 td {
	color: #333;
	font-size:12px;
	border-color: #fff;
	border-collapse: collapse;
	vertical-align: center;
	padding: 0px 1px;
	border-bottom:1px #000000 solid;
	border-top:1px #000000 solid;
	border-left:1px #000000 solid;
	border-right:1px #000000 solid;
	
	
}
#nocetak {
	display:none;
	}

</style>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SURAT JALAN</title>
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
<link rel="icon" type="image/png" href="ITTI_Logo index.ico">
</head>

<body>
<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
	?> 
<?php
if($_GET['tgl_kirim']!=""){$tglkirim=" and tgl_update='$_GET[tgl_kirim]' ";}else{$tglkirim=" and DATE_FORMAT(tgl_update,'%y')=DATE_FORMAT(NOW(),'%y')";}
	$sqllist= mysqli_query($con,"SELECT packing_list.*,tbl_kite.pelanggan,tbl_kite.no_po as nopo,detail_pergerakan_stok.satuan,detail_pergerakan_stok.sisa from packing_list 
LEFT JOIN detail_pergerakan_stok ON packing_list.listno=detail_pergerakan_stok.refno
LEFT JOIN tmp_detail_kite ON detail_pergerakan_stok.id_detail_kj=tmp_detail_kite.id
LEFT JOIN tbl_kite ON tmp_detail_kite.id_kite=tbl_kite.id
WHERE  `packing_list`.`no_sj`='$_GET[no_sj]' $tglkirim 
GROUP BY `packing_list`.`no_sj`
"); 
	
     $dr=mysqli_fetch_array($sqllist);
   $order=trim($dr['no_order']);
   $host="10.0.0.4";
   $username="timdit";
   $password="4dm1n";
   $db_name="TM";
   $connInfo = array( "Database"=>$db_name, "UID"=>$username, "PWD"=>$password);
   $conn     = sqlsrv_connect( $host, $connInfo);
	$sqlb=sqlsrv_query($conn,"SELECT 
*
 FROM
   
(SELECT ROW_NUMBER() 
        OVER (ORDER BY processcontrolJO.SODID) AS Row, 
       description,SODelivery.ConsigneeID AS id
    FROM 
Joborders 
left join processcontrolJO on processcontrolJO.joid = Joborders.id
left join salesorders on soid= salesorders.id
left join SODelivery on  salesorders.id= SODelivery.SOID
left join processcontrol on processcontrolJO.pcid = processcontrol.id
left join processcontrolbatches on processcontrolbatches.pcid = processcontrol.id
left join productmaster on productmaster.id= processcontrol.productid
left join productpartner on productpartner.productid= processcontrol.productid
where  JobOrders.documentno = '$order' 
) AS EMP
WHERE Row = 1");
$rbuyer=sqlsrv_fetch_array($sqlb);
?>

<table width="100%" border="0" class="table-list1">
  <tr>
    <td width="7%" rowspan="3"><center><img src="logo1.jpg" alt="" width="60" height="40"/></center></td>
    <td width="67%" rowspan="3"><strong><font size="+1"><center>SURAT JALAN</center></font></strong></td>
    <td width="12%" rowspan="3"><center><img src="sgs-union-organic-hitam.jpg" alt="" width="120" height="40" /></center></td>
    <td width="14%"><strong><font size="-4">NO. FORM : 19-11</font></strong></td>
  </tr>
  <tr>
    <td><strong><font size="-43">NO.REVISI : 02</font></strong></td>
  </tr>
  <tr>
    <td height="19"><strong><font size="-4">TGL TERBIT :01-07-16</font></strong></td>
  </tr>
</table>

<table width="100%" border="0" class="table-list1">
  <tr>
    <td colspan="2" valign="top"><font size="+1"><strong>PT INDO TAICHEN<br>TEXTILE INDUSTRY</strong></font><br />Reg. No. CU 817577<br />
    <strong>PO : <font align="center" size="+1.5"><?php echo $dr['no_po']; ?></font></strong></td>
    <td width="26%" valign="top">
    <strong> <font size="+2"><center>NO.: <?php echo $dr['no_sj']; ?></center>
    </font>
    <font align="left" ><strong>Tanggal: <?php  echo date("d-F-Y", strtotime($dr['tgl_update']));?></strong></font>
    
    <br /><strong>No. Order:</strong>
    <font align="center" size="+1"></font><font align="left" size="+1"><strong><?php $pos = strpos($dr[no_order],','); if($pos===false){ echo $dr['no_order'];}?></strong></font>
    </strong><div align="center"><strong><?php echo $dr['buyer'];?></strong></div>
    </td>
    <td width="49%" valign="top"><strong>Kepada Yth.<br />
    <font align="left" size="+1"><strong><?php echo $dr['alamat'];?></strong></font></strong></td>
  </tr>
  <tr>
    <td width="7%"><strong><font size="-3">Perhatian!!!</font></strong></td>
    <td colspan="3"><strong><font size="-4">Segala sesuatu yang terjadi atas barang yang tercantum atas Surat Jalan ini setelah 10 hari terhitung dari tgl Surat Jalan adalah resiko pembeli</font></strong></td>
  </tr>
</table><table width="100%" border="0" class="table-list1">
  <tr>
    <td colspan="3"><div align="center"><strong>JUMLAH</strong></div></td>
    <td width="75%" rowspan="2" valign="top"><div align="center"><strong>NAMA BARANG</strong></div>
    <font size="+1"><strong><?php echo $dr['term'];?></strong></font></td>
    <td width="12%" rowspan="2"><div align="center"><strong>Piece/Lot</strong></div></td>
  </tr>
  <tr>
    <td width="4%"><div align="center"><strong>ROLL</strong></div></td>
    <td width="4%"><div align="center"><strong>KG</strong></div></td>
    <td width="5%"><div align="center"><strong>Y/M</strong></div></td>
  </tr>
   <tr>
   
    <td height="58">&nbsp;</td>
    <td><?php $sqlqty= mysqli_query($con,"SELECT
	sum(IF(pack = 'BALES', 1, 0)) AS BALES,
	sum(IF(pack = 'ROLLS', 1, 0)) AS ROLLS,
	sum(weight) AS berat
FROM
	detail_pergerakan_stok
WHERE
	refno = '$dr[listno]'"); 
	
     $dr1=mysqli_fetch_array($sqlqty);?></td>
    <td colspan="2"><strong><font align="left" size="+1">
      <?php if($dr1['BALES']>0 and $dr1['ROLLS']>0){echo $dr1['BALES']." BALES+".$dr1['ROLLS']." ROLLS=".number_format($dr1['berat'],'2','.',',')." KGS";}else if($dr1['BALES']>0){echo $dr1['BALES']." BALES=".number_format($dr1['berat'],'2','.',',')." KGS";}else if($dr1['ROLLS']>0){echo $dr1['ROLLS']." ROLLS=".number_format($dr1['berat'],'2','.',',')." KGS";}?></font>
    </strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="58">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><table width="100%" >
      <tr>
        <th width="32%" height="27" align="left">JENIS KAIN</th>
        <th width="2%" align="left">=</th>
        <th width="66%" align="left">KAIN CELUP</th>
      </tr>
      <tr>
        <th align="left">TUJUAN</th>
        <th align="left">=</th>
        <th align="left"><strong><font align="left" size="+1"><strong><?php echo $dr['tujuan'];?></strong></font></strong></th>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="58">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><table width="100%" border="0">
      <tr>
        <th width="32%" align="left">TGL BERANGKAT</th>
        <th width="2%" align="left">=</th>
        <th width="66%" align="left"><strong><font align="left" ><strong>
          <?php  echo date("d-F-Y", strtotime($dr['tgl_update']));?>
        </strong></font></strong></th>
      </tr>
      <tr>
        <th align="left"><font align="left" size="-1">CONTAINER/COURIER NAME</font></th>
        <th align="left">=</th>
        <th align="left"><strong><font align="left" size="-1"><strong><?php echo $dr['kendaraan'];?></strong></font></strong></th>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="58">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="left" valign="top"><strong><font align="left" size="-1"><strong>
      <?php $pos = strpos($dr['no_order'],','); if($pos===false){}else{echo $dr['no_order'];}?>
    </strong></font></strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"></div></td>
    <td><div align="right"></div></td>
    <td><div align="right"></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" class="table-list1">
  <tr>
    <td colspan="2"><div align="center"><strong>Dikeluarkan Oleh</strong></div></td>
    <td><div align="center"><strong>Pengemudi</strong></div></td>
    <td><div align="center"><strong>Disetujui Oleh</strong></div></td>
    <td><div align="center"><strong>Diterima Pada</strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><br /><br /><br /><br /><br /><br /></td>
    <td valign="top"><strong>Tanggal</strong></td>
  </tr>
  <tr>
    <td colspan="4"><div align="center"><strong>Tanda Tangan dan Nama Jelas</strong></div></td>
    <td><div align="center"><strong>Cap dan Tanda Tangan</strong></div></td>
  </tr>
</table>

</body>
</html>
<script>

</script> 