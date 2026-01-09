<?php
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
require_once('dompdf/dompdf_config.inc.php');
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
?>
<?php
  $html ='<html>
<head>
<title>:: Cetak-KK</title>
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<style>
html{margin:2px auto 2px;}
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
<table width="50%" border="0" class="table-list1">
  <tbody>
    <tr>
      <td width="72" scope="col">Customer</td>
      <td width="3" scope="col">:</td>
      <td width="163" scope="col">&nbsp;</td>
      <td width="60" scope="col">&nbsp;</td>
      <td width="90" scope="col">Customer</td>
      <td width="7" scope="col">:</td>
      <td width="166" scope="col">&nbsp;</td>
    </tr>
    <tr>
      <td>Order</td>
      <td>:</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>Order</td>
      <td>:</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>J.Kain</td>
      <td>:</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>J.Kain</td>
      <td>:</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Warna</td>
      <td>:</td>
      <td>&nbsp;</td>
      <td>P:-</td>
      <td>Warna</td>
      <td>:</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>STD</td>
      <td>:</td>
      <td> X</td>
      <td>L:</td>
      <td>STD</td>
      <td>:</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Lot</td>
      <td>:</td>
      <td>&nbsp;</td>
      <td>Sp:</td>
      <td>Lot</td>
      <td>:</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</body>
</html>';


  $dompdf = new dompdf();
  $dompdf->load_html($html); //biar bisa terbaca htmlnya
  $dompdf->set_Paper(array(0, 0, 450, 250),'portrait'); //portrait, landscape
  $dompdf->render();
  $dompdf->stream('form-kk'.'.pdf', array("Attachment"=>0)); //untuk pemberian nama
?>
<!--<table width="200" border="0" align="right">
         <tr>
            <td style="font-size: 9px;">No. Form</td>
            <td style="font-size: 9px;">:</td>
            <td style="font-size: 9px;">FW-14-KNT-26</td>
  </tr > 
          <tr>
            <td style="font-size: 9px;">No. Revisi</td>
            <td style="font-size: 9px;">:</td>
            <td style="font-size: 9px;">01</td>
          </tr>
          <tr>
            <td style="font-size: 9px;">Tgl. Terbit</td>
            <td style="font-size: 9px;">:</td>
            <td style="font-size: 9px;">&nbsp;</td>
          </tr>
</table>
<br>
<br>
<br>
<br>
<br>-->
