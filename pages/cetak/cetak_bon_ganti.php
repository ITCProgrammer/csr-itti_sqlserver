 <?php
  ini_set("error_reporting", 1);
  session_start();
  include "../../koneksi.php";
  include "../../tgl_indo.php";
  //--
  $idkk = $_REQUEST['idkk'];
  $act = $_GET['g'];
  //-
  $Awal = $_GET['Awal'];
  $Akhir = $_GET['akhir'];
  $idnsp = $_GET['id_nsp'];
  $order = $_GET['no_order'];
  $po = $_GET['po'];
  $cek1 = $_GET['id_cek'];
  $cek2 = $_GET['id_cek1'];
  $cek3 = $_GET['id_cek2'];
  $qTgl = mysqli_query($con, "SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
  $rTgl = mysqli_fetch_array($qTgl);
  //$tgl=$rTgl['tgl_skrg'];//tambahan 
  //$jam=$rTgl['jam_skrg'];//tambahan
  if ($Awal != "") {
    $tgl = substr($Awal, 0, 10);
    $jam = $Awal;
  } else {
    $tgl = $rTgl['tgl_skrg'];
    $jam = $rTgl['jam_skrg'];
  }
  //$qry=mysqli_query("SELECT a.*,a.t_jawab,a.t_jawab1,a.t_jawab2,b.alasan,b.id_nsp,b.warna1,b.warna2,b.warna3,b.kg1,b.kg2,b.kg3,b.pjg1,b.pjg2,b.pjg3,b.satuan1,b.satuan2,b.satuan3,b.sebab,b.analisa,b.pencegahan,b.nokk1,b.nokk2,b.nokk3,b.lot1,b.lot2,b.lot3,b.qty_order,b.qty_kirim,b.qty_foc FROM tbl_aftersales a
  //INNER JOIN tbl_ganti_kain b ON a.id=b.id_nsp
  //WHERE b.no_bon='$_GET[no_bon]'");
  //$r=mysqli_fetch_array($qry);
  $qry_sql = "SELECT * FROM tbl_aftersales_now WHERE id='$idnsp' ";
  $qry1 = mysqli_query($con, $qry_sql);
  $r1 = mysqli_fetch_array($qry1);
  $qry2 = mysqli_query($con, "SELECT * FROM tbl_ganti_kain_now WHERE id_nsp='$idnsp' LIMIT 1");
  $r2 = mysqli_fetch_array($qry2);
  $qry3 = mysqli_query($con, "SELECT * FROM tbl_ganti_kain_now WHERE id='$cek1' LIMIT 1");
  $r3 = mysqli_fetch_array($qry3);

  // Simpan Note MKT & PPC (POST)
  if (isset($_POST['note_mkt_save']) && isset($_POST['id_bon'])) {
    $idBonPost = mysqli_real_escape_string($con, $_POST['id_bon']);
    // Bersihkan nomor urut seperti "1. " di awal setiap baris sebelum simpan
    $noteMktRaw = isset($_POST['note_mkt']) ? $_POST['note_mkt'] : '';
    $notePpcRaw = isset($_POST['note_ppc']) ? $_POST['note_ppc'] : '';
    $noteMktClean = preg_replace('/^\s*\d+\.\s*/m', '', $noteMktRaw);
    $notePpcClean = preg_replace('/^\s*\d+\.\s*/m', '', $notePpcRaw);
    $noteMktPost = mysqli_real_escape_string($con, $noteMktClean);
    $notePpcPost = mysqli_real_escape_string($con, $notePpcClean);
    mysqli_query($con, "UPDATE tbl_ganti_kain_now SET note_mkt='" . $noteMktPost . "', note_ppc='" . $notePpcPost . "' WHERE id='" . $idBonPost . "'");
    // Refresh data $r3 agar textarea terisi nilai terbaru
    $qry3 = mysqli_query($con, "SELECT * FROM tbl_ganti_kain_now WHERE id='".$idBonPost."' LIMIT 1");
    if ($qry3) { $r3 = mysqli_fetch_array($qry3); }
  }

  // Inisialisasi default gabungan note agar tidak undefined sebelum diset di bawah
  $noteMktCombined = '';
  $notePpcCombined = '';

  $pos = strpos($r1['langganan'], "/");
  $posbuyer = substr($r1['langganan'], $pos + 1, 10);
  $buyer = str_replace("'", "''", $posbuyer);
  $pelanggan = substr($r1['langganan'], 0, $pos);

$query = mysqli_query($conadm,"SELECT do_by, do_at
FROM tbl_log
WHERE project LIKE '%$r3[no_bon]%'
AND (do_by, id) IN (
    SELECT do_by, MAX(id)
    FROM tbl_log
    WHERE project LIKE '%$r3[no_bon]/CSR%'
    GROUP BY do_by
)
ORDER BY id DESC");
// Kumpulkan pasangan nama (do_by) dengan tanggal (do_at) dan format "nama (dd/mm/YYYY HH:MM)"
$log_pairs = [];
if ($query) {
  while ($rowLog = mysqli_fetch_assoc($query)) {
    $name = isset($rowLog['do_by']) ? trim($rowLog['do_by']) : '';
    if ($name === '') continue;
    $dtRaw = isset($rowLog['do_at']) ? $rowLog['do_at'] : '';
    $disp = $name;
    if ($dtRaw !== '') {
      $ts = strtotime($dtRaw);
      $fmt = $ts ? date('d/m', $ts) : $dtRaw;
      $disp = $name . ' (' . $fmt . ')';
    }
    $log_pairs[] = $disp;
  }
}
$log_names_with_dates = implode(', ', $log_pairs);
  ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">

 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <!-- <link href="styles_cetak.css" rel="stylesheet" type="text/css"> -->
   <title>Cetak Bon Ganti Kain</title>
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

     window.addEventListener('load', function() {
       var rotates = document.getElementsByClassName('rotate');
       for (var i = 0; i < rotates.length; i++) {
         rotates[i].style.height = rotates[i].offsetWidth + 'px';
       }
     });
     // next commands
   </script>
   <style>
     body,
     td,
     th {
       /*font-family: Courier New, Courier, monospace; */
       /* font-family: sans-serif, Roman, serif; */
       font-family: 'Times New Roman', Times, serif;
     }

     pre {
       font-family: 'Times New Roman', Times, serif;
       clear: both;
       margin: 0px auto 0px;
       padding: 0px;
       white-space: pre-wrap;
       /* Since CSS 2.1 */
       white-space: -moz-pre-wrap;
       /* Mozilla, since 1999 */
       white-space: -pre-wrap;
       /* Opera 4-6 */
       white-space: -o-pre-wrap;
       /* Opera 7 */
       word-wrap: break-word;
     }

     body {
       margin: 0px auto 0px;
       padding: 2px;
       font-size: 8px;
       color: #000;
       width: 98%;
       background-position: top;
       background-color: #fff;
     }

     .table-list {
       clear: both;
       text-align: left;
       border-collapse: collapse;
       margin: 0px 0px 10px 0px;
       background: #fff;
     }

     .table-list td {
       color: #333;
       font-size: 12px;
       border-color: #fff;
       border-collapse: collapse;
       vertical-align: center;
       padding: 3px 5px;
       border-bottom: 1px #000000 solid;
       border-left: 1px #000000 solid;
       border-right: 1px #000000 solid;
     }

     .table-list1 {
       clear: both;
       text-align: left;
       border-collapse: collapse;
       margin: 0px 0px 5px 0px;
       background: #fff;
     }

     .table-list1 td {
       color: #333;
       font-size: 11px;
       border-color: #fff;
       border-collapse: collapse;
       vertical-align: center;
       padding: 1px 3px;
       border-bottom: 1px #000000 solid;
       border-top: 1px #000000 solid;
       border-left: 1px #000000 solid;
       border-right: 1px #000000 solid;
     }

     #nocetak {
       display: none;
     }

     /* --> */

     .hurufvertical {
       writing-mode: tb-rl;
       -webkit-transform: rotate(-90deg);
       -moz-transform: rotate(-90deg);
       -o-transform: rotate(-90deg);
       -ms-transform: rotate(-90deg);
       transform: rotate(180deg);
       white-space: nowrap;
       float: left;
     }

     input {
       text-align: center;
       border: hidden;
       font-size: 9px;
       font-family: sans-serif, Roman, serif;
     }

     @media print {
       ::-webkit-input-placeholder {
         /* WebKit browsers */
         color: transparent;
       }

       :-moz-placeholder {
         /* Mozilla Firefox 4 to 18 */
         color: transparent;
       }

       ::-moz-placeholder {
         /* Mozilla Firefox 19+ */
         color: transparent;
       }

       :-ms-input-placeholder {
         /* Internet Explorer 10+ */
         color: transparent;
       }

       .pagebreak {
         page-break-before: always;
       }

       .header {
         display: block
       }

       table thead {
         display: table-header-group;
       }
       /* Sembunyikan elemen non-cetak saat print */
      /* .no-print { display: none !important; } */
     }
   </style>
 </head>
 <?php
  $nmBln = array(1 => "JANUARI", "FEBUARI", "MARET", "APRIL", "MEI", "JUNI", "JULI", "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOVEMBER", "DESEMBER");
  ?>

 <body>
   <table>
     <thead>
       <tr>
         <td>
           <table border="1" class="table-list1" style="width:6.4in">
             <tr>
               <td width="10%" align="center"><img src="Indo.jpg" width="50" height="50
		      " alt="" /></td>
               <td width="58%" align="center"><strong>
                   <font size="+1">BON GANTI /TAMBAH KAIN GREIGE</font> <br>
                   <?php echo $r3['no_bon']; ?>
                 </strong></td>
               <td width="32%" align="center">
                 <table width="100%">
                   <tbody>
                     <tr>
                       <td width="36%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">No. Form</td>
                       <td width="5%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">:</td>
                       <td width="59%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">14-10
                       </td>
                     </tr>
                     <tr>
                       <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">No Revisi</td>
                       <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">: </td>
                       <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">04</td>
                     </tr>
                     <tr>
                       <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">Tgl. Terbit</td>
                       <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">:</td>
                       <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">17 Desember 2020</td>
                     </tr>
                   </tbody>
                 </table>
               </td>
             </tr>
           </table>
         </td>
       </tr>
     </thead>
     <tr>
       <td>
         <table border="0" class="table-list1" style="width:6.4in">
           <tbody>
             <tr>
               <td width="11%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">&nbsp;</td>
               <td width="39%" align="center" valign="top" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">
                 <table width="77%">
                   <tbody>
                     <tr>
                       <td width="11%" align="right" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">&#9744;</td>
                       <td width="89%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">Internal</td>
                     </tr>
                   </tbody>
                 </table>
               </td>
               <td width="18%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;"><input name="nama5" type="text" placeholder="Tagih" size="12" style="font-size:12px;" /></td>
               <td width="13%" align="center" valign="top" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">
                 <table width="66%">
                   <tbody>
                     <tr>
                       <td width="22%" align="right" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">&#9745;</td>
                       <td width="78%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">External</td>
                     </tr>
                     <tr>
                       <td align="right" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">&#9744;</td>
                       <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">FOC</td>
                     </tr>
                   </tbody>
                 </table>
               </td>
               <td width="5%" style="border-top:0px #000000 solid;border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">&nbsp;</td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">&nbsp;</td>
             </tr>
             <tr valign="top">
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">Langganan</td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid; font-size:8.5px;">: <?php echo substr($pelanggan, 0, 25) . "/" . $buyer; ?></td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">No. Hanger</td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">: <?php echo $r1['no_hanger']; ?></td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">Style</td>
               <td style="border-top:0px #000000 solid; 	border-bottom:0px #000000 solid;	border-left:0px #000000 solid; border-right:0px #000000 solid;">:</td>
             </tr>
             <tr valign="top">
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;	border-left:0px #000000 solid; border-right:0px #000000 solid;">No. PO</td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">: <?php echo $r1['po']; ?></td>
               <td style="border-top:0px #000000 solid; 	border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">Lebar X Gramasi</td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">: <?php echo $r1['lebar'] . " X " . $r1['gramasi']; ?></td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;	border-left:0px #000000 solid; border-right:0px #000000 solid;">Lot</td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">: <?= $r1['lot'] ?></td>
             </tr>
             <tr valign="top">
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">No. Order</td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">: <?php
                                                                                                                                                          $sqldt = mysqli_query($con, "SELECT kd_ganti FROM tbl_ganti_kain_now WHERE id_nsp='$_GET[id_nsp]' ORDER BY id DESC LIMIT 1");
                                                                                                                                                          $row = mysqli_fetch_array($sqldt);
                                                                                                                                                          ?>
                 <?php
                  echo $r1['no_order']; ?> / <?php if ($r1['alasan'] == "Reject Buyer") {
                                                echo $row['kd_ganti'];
                                              } else {
                                                echo $row['kd_ganti'];
                                              }
                                              ?></td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">Delivery Kain Greige</td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">:</td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">&nbsp;</td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid;border-left:0px #000000 solid; border-right:0px #000000 solid;">&nbsp;</td>
             </tr>
             <tr valign="top">
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">Jenis Kain</td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid; font-size:8.5px;">: <?php echo $r1['no_item'] . "/" . substr($r1['jenis_kain'], 0, 65); ?></td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">Delivery Kain Jadi</td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">: <?php echo empty($r3['tgl_delivery_kain_jadi']) ? '' : date('d/m/y', strtotime($r3['tgl_delivery_kain_jadi']));?></td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"></td>
               <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">&nbsp;</td>
             </tr>
           </tbody>
         </table>
       </td>
     </tr>
     </tbody>
     <tr>
       <td>
         <table border="0" class="table-list1" style="width:6.4in" width="100%">
           <tbody>
             <tr>
              <td width="11%" rowspan="2" align="left" valign="top">Departemen Penanggung Jawab: <span style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><?php if ($r3['t_jawab'] != "") { echo "<br>" . $r3['t_jawab'] . " " . $r3['persen'] . " %"; } if ($r3['t_jawab1'] != "") { echo "<br>" . $r3['t_jawab1'] . " " . $r3['persen1'] . " %"; } if ($r3['t_jawab2'] != "") { echo "<br>" . $r3['t_jawab2'] . " " . $r3['persen2'] . " %"; } ?></span></td>
               <td width="23%" height="60" colspan="3" valign="top" style="height: 0.7in;">Masalah: <span style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><?php echo $r3['masalah']; ?></span></td>
               <td width="17%" rowspan="2" align="left" valign="top">Penyebab: <br />
                 <table width="100%">
                   <tbody>
                    <?php $dtArr = $r2['sebab']; $data = explode(",", $dtArr); ?>
                     <tr>
                      <td width="14%" align="right" valign="top" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><?php if (in_array("Man", $data)) { echo "&#9745;"; } else { echo "&#9744;"; } ?></td>
                       <td width="86%" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">Man</td>
                     </tr>
                     <tr>
                      <td align="right" valign="top" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><?php if (in_array("Methode", $data)) { echo "&#9745;"; } else { echo "&#9744;"; } ?></td>
                       <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">Methode</td>
                     </tr>
                     <tr>
                      <td align="right" valign="top" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><?php if (in_array("Machine", $data)) { echo "&#9745;"; } else { echo "&#9744;"; } ?></td>
                       <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">Machine</td>
                     </tr>
                     <tr>
                      <td align="right" valign="top" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><?php if (in_array("Material", $data)) { echo "&#9745;"; } else { echo "&#9744;"; } ?></td>
                       <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">Material</td>
                     </tr>
                     <tr>
                      <td align="right" valign="top" style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><?php if (in_array("Environment", $data)) { echo "&#9745;"; } else { echo "&#9744;"; } ?></td>
                       <td style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">Environment</td>
                     </tr>
                   </tbody>
                 </table>
               </td>
              <td colspan="5" rowspan="2" align="left" valign="top">
                Analisa dan Pencegahan:
                <?php if (!empty($log_names_with_dates)) { ?>
                  <?php echo htmlspecialchars($log_names_with_dates); ?><br>
                <?php } ?>
                <span style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;">
                  <?php echo $r3['analisa']; ?><br><?php echo $r3['pencegahan']; ?>
                </span>
              </td>
             </tr>
             <tr>
               <td colspan="3" valign="top" style="height: 0.7in;">Alasan: <span style="border-top:0px #000000 solid; border-bottom:0px #000000 solid; border-left:0px #000000 solid; border-right:0px #000000 solid;"><?php echo $r3['alasan']; ?></span></td>
             </tr>
             <tr>
               <!-- Warna 1 Begin -->
               <?php
                $cek1 = $_GET['id_cek'];
                $qr1 = mysqli_query($con, "SELECT * FROM tbl_ganti_kain_now WHERE id='$cek1'");
                $c1 = mysqli_num_rows($qr1);
                $rk1 = mysqli_fetch_array($qr1);

                ?>
               <?php if ($c1 > 0) { ?>
                 <td width="11%" colspan="3" valign="top" style="height: 0.5in; border-right:0px #000000 solid;">1. Warna = <span style="font-size: 8px;"><?php echo $rk1['warna1']; ?></span><br>
                   <?= $rk1['no_warna'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $rk1['lot1'] ?>
                   <br />
                   O: <?php if ($rk1['qty_order'] == 0) {
                        echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                      } else {
                        echo $rk1['qty_order'];
                      } ?>&nbsp;<br>
                   K: <?php if ($rk1['qty_kirim'] == 0) {
                        echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                      } else {
                        echo $rk1['qty_kirim'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $rk1['ket_ppc'] . "";
                      } ?>&nbsp;<br>
                   E: <?php if ($rk1['qty_foc'] == 0) {
                        echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;";
                      } else {
                        echo $rk1['qty_foc'];
                      } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                 </td>
                 <td width="11%" align="right" valign="top" style="height: 0.5in; border-left:0px #000000 solid; border-right:0px #000000 solid;"><?php echo $rk1['kg1']; ?> Kg<br><?php echo $rk1['pjg1'] . "<br>" . $rk1['satuan1']; ?> <?php if ($rk1['pjg1'] != "") { ?><br>(Netto)<?php } ?></td>
               <?php } else { ?>
                 <td colspan="3" valign="top" style="height: 0.5in; border-right:0px #000000 solid;">1. Warna = <span style="font-size: 8px;">&nbsp;</span><br>

                   <br />
                   O: &nbsp;&nbsp;<br>
                   K: &nbsp;&nbsp;<br>
                   E: &nbsp;&nbsp;<br>
                 </td>
                 <td width="11%" align="right" valign="top" style="height: 0.5in; border-left:0px #000000 solid; border-right:0px #000000 solid;">&nbsp;</td>
               <?php } ?>
               <!-- Warna 1 End -->
               <!-- Warna 2 Begin -->
               <?php
                $cek2 = $_GET['id_cek1'];
                $cek3 = $_GET['id_cek2'];
                $qr2 = mysqli_query($con, "SELECT * FROM tbl_ganti_kain_now WHERE id='$cek2'");
                $c2 = mysqli_num_rows($qr2);
                $rk2 = mysqli_fetch_array($qr2);
                ?>
               <?php if ($c2 > 0) { ?>
                 <td width="11%" colspan="2" valign="top" style="height: 0.5in; border-right:0px #000000 solid;">2. Warna = <span style="font-size: 8px;"><?php echo $rk2['warna1']; ?></span><br>
                   <?= $rk2['no_warna'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $rk2['lot1'] ?>

                   <br />
                   O: <?php if ($rk2['qty_order'] == 0) {
                        echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                      } else {
                        echo $rk2['qty_order'];
                      } ?>&nbsp;<br>
                   K: <?php if ($rk2['qty_kirim'] == 0) {
                        echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                      } else {
                        echo $rk2['qty_kirim'];
                      } ?>&nbsp;<br>
                   E: <?php if ($rk2['qty_foc'] == 0) {
                        echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;";
                      } else {
                        echo $rk2['qty_foc'];
                      } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                 </td>
                 <td width="11%" align="right" valign="top" style="height: 0.5in; border-left:0px #000000 solid; border-right:0px #000000 solid;"><span style="height: 0.5in;border-left:0px #000000 solid; border-right:0px #000000 solid;">
                     <?php if ($rk2['kg1'] > 0) { ?>
                       <?php echo $rk2['kg1']; ?></span>Kg<br />
                   <?php echo $rk2['pjg1']; ?> <?php echo $rk2['satuan1']; ?><br />
                   (Netto)
                 <?php } else {
                        echo "Kg";
                      } ?></td>
               <?php } else { ?>
                 <td colspan="3" valign="top" style="height: 0.5in; border-right:0px #000000 solid;">2. Warna = <span style="font-size: 8px;">&nbsp;</span><br>
                   <br />
                   O: &nbsp;&nbsp;<br>
                   K: &nbsp;&nbsp;<br>
                   E: &nbsp;&nbsp;<br>
                 </td>
                 <td width="11%" align="right" valign="top" style="height: 0.5in; border-left:0px #000000 solid; border-right:0px #000000 solid;">&nbsp;</td>
               <?php } ?>
               <!-- Warna 2 End -->
               <!-- Warna 3 Begin -->
               <?php
                $cek3 = $_GET['id_cek2'];
                $qr3 = mysqli_query($con, "SELECT * FROM tbl_ganti_kain_now WHERE id='$cek3'");
                $c3 = mysqli_num_rows($qr3);
                $rk3 = mysqli_fetch_array($qr3);
                ?>
               <?php if ($c3 > 0) { ?>
                 <td width="20%" valign="top" style="border-right:0px #000000 solid;"><span style="height: 0.5in; border-right:0px #000000 solid;">3. Warna = <span style="font-size: 8px;"><?php echo $rk3['warna1']; ?></span><br>
                     <?= $rk3['no_warna'] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $rk3['lot1'] ?>

                     <br />
                     O: <?php if ($rk3['qty_order'] == 0) {
                          echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        } else {
                          echo $rk3['qty_order'];
                        } ?>&nbsp;<br>
                     K: <?php if ($rk3['qty_kirim'] == 0) {
                          echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        } else {
                          echo $rk3['qty_kirim'];
                        } ?>&nbsp;<br>
                     E: <?php if ($rk3['qty_foc'] == 0) {
                          echo "0.00&nbsp;&nbsp;&nbsp;&nbsp;";
                        } else {
                          echo $rk3['qty_foc'];
                        } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                 </td>
                 <td width="11%" align="right" valign="top" style="border-left:0px #000000 solid;"><span style="height: 0.5in;border-left:0px #000000 solid; border-right:0px #000000 solid;">
                     <?php if ($rk3['kg1'] > 0) { ?>
                       <?php echo $rk3['kg1']; ?></span> Kg<br />
                   <?php echo $rk3['pjg1']; ?> <?php echo $rk3['satuan1']; ?><br />
                   (Netto)
                 <?php } else {
                        echo "Kg";
                      } ?></td>
               <?php } else { ?>
                 <td width="20%" valign="top" style="border-right:0px #000000 solid;"><span style="height: 0.5in; border-right:0px #000000 solid;">3. Warna = <span style="font-size: 8px;">&nbsp;</span><br>
                     <br />
                     O: &nbsp;&nbsp;<br>
                     K: &nbsp;&nbsp;<br>
                     E: &nbsp;&nbsp;<br>
                 </td>
                 <td width="11%" align="right" valign="top" style="border-left:0px #000000 solid;"><span style="height: 0.5in; border-left:0px #000000 solid; border-right:0px #000000 solid;">&nbsp;</td>
               <?php } ?>
               <!-- Warna 3 End -->
             </tr>
           </tbody>
         </table>
       </td>
     </tr>
     <tr>
       <td>
         <table style="width:6.4in" border="0" class="table-list1">
           <tr align="center">
             <td width="14%" rowspan="2">&nbsp;</td>
             <td width="17%" rowspan="2">Dibuat Oleh :</td>
             <td colspan="6">Diketahui Oleh:</td>
           </tr>
           <tr align="center">
             <td width="14%">PPC</td>
             <td width="11%">RMP</td>
             <td width="11%">MKT</td>
             <td width="13%">DMF</td>
           </tr>
           <tr>
             <td>Nama</td>
             <td align="center"><input name="nama5" type="text" placeholder="Ketik" size="12" value="<?php if ($r3['approved_csr'] === 'Approved'){ echo 'Emily Lai';} else { echo '';}?>" /></td>
             <td align="center"><input name="nama13" type="text" placeholder="Ketik" size="10" value="<?php echo $r3['personil_ppc'];?>" /></td>
             <td align="center"><input name="nama3" type="text" placeholder="Ketik" size="10" value="<?php echo $r3['personil_rmp'];?>" /></td>
             <td align="center"><input name="nama6" type="text" placeholder="Ketik" size="10"  value="<?php echo $r3['personil_mkt'];?>" /></td>
             <td align="center">Mr.Xiao Ming</td>
           </tr>
           <?php
            // Ambil jabatan sesuai nama/email yang tampil di baris "Nama"
            $jabatan_csr = '';
            if (isset($r3['approved_csr']) && $r3['approved_csr'] === 'Approved') {
              $namaCsr = 'Emily Lai';
              if ($stmt = mysqli_prepare($con, 'SELECT jabatan FROM master_email WHERE nama=? LIMIT 1')) {
                mysqli_stmt_bind_param($stmt, 's', $namaCsr);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $j);
                if (mysqli_stmt_fetch($stmt)) { $jabatan_csr = $j; }
                mysqli_stmt_close($stmt);
              }
            }

            $jabatan_ppc = '';
            if (!empty($r3['personil_ppc'])) {
              $val = trim($r3['personil_ppc']);
              if ($stmt = mysqli_prepare($con, 'SELECT jabatan FROM master_email WHERE email=? LIMIT 1')) {
                mysqli_stmt_bind_param($stmt, 's', $val);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $j);
                if (mysqli_stmt_fetch($stmt)) { $jabatan_ppc = $j; }
                mysqli_stmt_close($stmt);
              }
              if ($jabatan_ppc === '' && ($stmt = mysqli_prepare($con, 'SELECT jabatan FROM master_email WHERE nama=? LIMIT 1'))) {
                mysqli_stmt_bind_param($stmt, 's', $val);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $j);
                if (mysqli_stmt_fetch($stmt)) { $jabatan_ppc = $j; }
                mysqli_stmt_close($stmt);
              }
            }

            $jabatan_rmp = '';
            if (!empty($r3['personil_rmp'])) {
              $val = trim($r3['personil_rmp']);
              if ($stmt = mysqli_prepare($con, 'SELECT jabatan FROM master_email WHERE email=? LIMIT 1')) {
                mysqli_stmt_bind_param($stmt, 's', $val);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $j);
                if (mysqli_stmt_fetch($stmt)) { $jabatan_rmp = $j; }
                mysqli_stmt_close($stmt);
              }
              if ($jabatan_rmp === '' && ($stmt = mysqli_prepare($con, 'SELECT jabatan FROM master_email WHERE nama=? LIMIT 1'))) {
                mysqli_stmt_bind_param($stmt, 's', $val);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $j);
                if (mysqli_stmt_fetch($stmt)) { $jabatan_rmp = $j; }
                mysqli_stmt_close($stmt);
              }
            }

            $jabatan_mkt = '';
            if (!empty($r3['personil_mkt'])) {
              $val = trim($r3['personil_mkt']);
              if ($stmt = mysqli_prepare($con, 'SELECT jabatan FROM master_email WHERE email=? LIMIT 1')) {
                mysqli_stmt_bind_param($stmt, 's', $val);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $j);
                if (mysqli_stmt_fetch($stmt)) { $jabatan_mkt = $j; }
                mysqli_stmt_close($stmt);
              }
              if ($jabatan_mkt === '' && ($stmt = mysqli_prepare($con, 'SELECT jabatan FROM master_email WHERE nama=? LIMIT 1'))) {
                mysqli_stmt_bind_param($stmt, 's', $val);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_bind_result($stmt, $j);
                if (mysqli_stmt_fetch($stmt)) { $jabatan_mkt = $j; }
                mysqli_stmt_close($stmt);
              }
            }
           ?>
           <tr>
             <td>Jabatan</td>
             <td align="center"><input name="nama" type="text" placeholder="Ketik" size="12" value="<?php echo ($r3['approved_csr'] === 'Approved') ? htmlspecialchars($jabatan_csr) : ''; ?>" /></td>
             <td align="center"><input name="nama2" type="text" placeholder="Ketik" size="10" value="<?php echo htmlspecialchars($jabatan_ppc); ?>" /></td>
             <td align="center"><input name="nama4" type="text" placeholder="Ketik" size="10" value="<?php echo htmlspecialchars($jabatan_rmp); ?>" /></td>
             <td align="center"><input name="nama7" type="text" placeholder="Ketik" size="10" value="<?php echo htmlspecialchars($jabatan_mkt); ?>" /></td>
             <td align="center">DMF</td>
           </tr>
           <tr>
             <td>Tanggal</td>
             <td align="center">
               <?php if (isset($r3['tgl_approve_csr']) && !empty($r3['tgl_approve_csr'])) {
                   echo date("d F Y", strtotime($r3['tgl_approve_csr']));
               } else {
                   echo '&nbsp;';
               }
               ?>
             </td>
             <td align="center">
               <?php if (isset($r3['tgl_approve_ppc']) && !empty($r3['tgl_approve_ppc'])) {
                   echo date("d F Y", strtotime($r3['tgl_approve_ppc']));
               } else {
                   echo '&nbsp;';
               }
               ?>
             </td>
             <td align="center">
              <?php if (isset($r3['tgl_approve_rmp']) && !empty($r3['tgl_approve_rmp'])) {
                   echo date("d F Y", strtotime($r3['tgl_approve_rmp']));
               } else {
                   echo '&nbsp;';
               }  ?>
              </td>
             <td align="center">
               <?php
               if (isset($r3['tgl_approve_mkt']) && !empty($r3['tgl_approve_mkt'])) {
                   echo date("d F Y", strtotime($r3['tgl_approve_mkt']));
               } else {
                   echo '&nbsp;';
               }
               ?>
             </td>
             <!-- DMF -->
              <!-- kondisi jika data tgl_approved_dmf ada maka munculkan jika tidak ada munculkan bulan dan tahun seperti sebelumnya -->
             <td align="center">
               <?php
                 if (isset($r3['tgl_approved_dmf']) && !empty($r3['tgl_approved_dmf'])) {
                   echo date("d F Y", strtotime($r3['tgl_approved_dmf']));
                 } elseif (isset($rTgl['tgl_skrg']) && !empty($rTgl['tgl_skrg'])) {
                   echo date("F Y", strtotime($rTgl['tgl_skrg']));
                 } else {
                   echo '&nbsp;';
                 }
               ?>
             </td>
             <!-- 
             <td align="center"><?php echo date("d F Y", strtotime($rTgl['tgl_skrg'])); ?></td>
             <td align="center"><?php echo date("F Y", strtotime($rTgl['tgl_skrg'])); ?></td>
             <td align="center"><?php echo date("F Y", strtotime($rTgl['tgl_skrg'])); ?></td>
             <td align="center"><?php echo date("F Y", strtotime($rTgl['tgl_skrg'])); ?></td>
             <td align="center"><?php echo date("F Y", strtotime($rTgl['tgl_skrg'])); ?></td>
              -->
           </tr>
           <tr>
            <td valign="top" style="height: 0.6in;">TandaTangan</td>
            <!-- CSR -->
            <td align="center" style="position: relative;">
              <?php if (!empty($r3['tgl_approve_csr'])): ?>
                <span style="position:absolute;center:3px;bottom:2px;font-size:10px;">
                  &nbsp;&nbsp;&nbsp;<?php echo date('H:i', strtotime($r3['tgl_approve_csr'])); ?>
                </span>
              <?php endif; ?>
              <?php
                 // Tampilkan tanda tangan CSR sesuai isi kolom approved_csr 
                 echo $r3['approved_csr'];
               ?>
            </td>
            <!-- PPC -->
            <td align="center" style="position: relative;">
              <?php if (!empty($r3['tgl_approve_ppc'])): ?>
                <span style="position:absolute;center:3px;bottom:2px;font-size:10px;">
                  &nbsp;&nbsp;&nbsp;<?php echo date('H:i', strtotime($r3['tgl_approve_ppc'])); ?>
                </span>
              <?php endif; ?>
              <?php
               // Tampilkan tanda tangan PPC sesuai isi kolom ket_ppc (nama file .png di folder ttd)
               if (
                 isset($r3['personil_ppc']) && trim($r3['personil_ppc']) !== ''
               ) {
                 echo 'Approved';
               }
               ?>
            </td>
            <!-- RMP -->
            <td align="center" style="position: relative;">
              <?php if (!empty($r3['tgl_approve_rmp'])): ?>
                <span style="position:absolute;center:3px;bottom:2px;font-size:10px;">
                     &nbsp;&nbsp;&nbsp;<?php echo date('H:i', strtotime($r3['tgl_approve_rmp'])); ?>
                </span>
              <?php endif; ?>
              <?php echo $r3['approved_rmp']; ?>
            </td>
            <!-- MKT -->
            <td align="center" style="position: relative;">
              <?php if (!empty($r3['tgl_approve_mkt'])): ?>
                <span style="position:absolute;center:3px;bottom:2px;font-size:10px;">
                     &nbsp;&nbsp;&nbsp;<?php echo date('H:i', strtotime($r3['tgl_approve_mkt'])); ?>
                </span>
              <?php endif; ?>
              <?php echo $r3['approved_mkt'];?>
            </td>
            <!-- DMF -->
            <td align="center" style="position: relative;">
              <?php if (!empty($r3['tgl_approved_dmf'])): ?>
                <span style="position:absolute;center:3px;bottom:2px;font-size:10px;">
                     &nbsp;&nbsp;&nbsp;<?php echo date('H:i', strtotime($r3['tgl_approved_dmf'])); ?>
                </span>
              <?php endif; ?>
              <?php echo $r3['approved_dmf'];?>
            </td>
           </tr>
         </table>
       </td>
     </tr>
     <tr>
       <td>
         <!-- <table style="width:6.4in" border="0">
           <tr align="left">
             <td style="font-size: 10px;"><span style="border-top:0px #000000 solid; 
                border-bottom:0px #000000 solid;
                border-left:0px #000000 solid; 
                border-right:0px #000000 solid;"><?php echo "Lembaran Kuning Diberikan Ke Marketing Tanggal ..."; ?></td>
           </tr>
         </table> -->
       </td>
     </tr>

   </table>

   <script>
     //alert('cetak');window.print();
   </script>


   <!-- Form Note MKT (hanya tampil di layar, tidak tercetak) -->
   <?php
    // Susun gabungan Note berdasarkan data warna 1-3 ($rk1, $rk2, $rk3)
    // Urutan: 1 -> 2 -> 3, hanya menampilkan yang tidak kosong
    $noteMktCombined = '';
    $notePpcCombined = '';
    $mktVals = array();
    $ppcVals = array();
    if (isset($rk1) && is_array($rk1) && isset($rk1['note_mkt']) && trim($rk1['note_mkt']) !== '') {
      $mktVals[] = preg_replace('/^\s*\d+\.\s*/', '', trim($rk1['note_mkt']));
    }
    if (isset($rk2) && is_array($rk2) && isset($rk2['note_mkt']) && trim($rk2['note_mkt']) !== '') {
      $mktVals[] = preg_replace('/^\s*\d+\.\s*/', '', trim($rk2['note_mkt']));
    }
    if (isset($rk3) && is_array($rk3) && isset($rk3['note_mkt']) && trim($rk3['note_mkt']) !== '') {
      $mktVals[] = preg_replace('/^\s*\d+\.\s*/', '', trim($rk3['note_mkt']));
    }
    if (count($mktVals) > 0) {
      $tmp = array();
      for ($i = 0; $i < count($mktVals); $i++) {
        $tmp[] = ($i + 1) . '. ' . $mktVals[$i];
      }
      $noteMktCombined = implode("\n", $tmp);
    }
    if (isset($rk1) && is_array($rk1) && isset($rk1['note_ppc']) && trim($rk1['note_ppc']) !== '') {
      $ppcVals[] = preg_replace('/^\s*\d+\.\s*/', '', trim($rk1['note_ppc']));
    }
    if (isset($rk2) && is_array($rk2) && isset($rk2['note_ppc']) && trim($rk2['note_ppc']) !== '') {
      $ppcVals[] = preg_replace('/^\s*\d+\.\s*/', '', trim($rk2['note_ppc']));
    }
    if (isset($rk3) && is_array($rk3) && isset($rk3['note_ppc']) && trim($rk3['note_ppc']) !== '') {
      $ppcVals[] = preg_replace('/^\s*\d+\.\s*/', '', trim($rk3['note_ppc']));
    }
    if (count($ppcVals) > 0) {
      $tmp2 = array();
      for ($i = 0; $i < count($ppcVals); $i++) {
        $tmp2[] = ($i + 1) . '. ' . $ppcVals[$i];
      }
      $notePpcCombined = implode("\n", $tmp2);
    }



    // Hitung jumlah data warna yang tampil (rk1..rk3) lalu tentukan apakah tombol disembunyikan
    $presentCount = 0;
    if (isset($rk1) && is_array($rk1) && isset($rk1['id']) && trim((string)$rk1['id']) !== '') { $presentCount++; }
    if (isset($rk2) && is_array($rk2) && isset($rk2['id']) && trim((string)$rk2['id']) !== '') { $presentCount++; }
    if (isset($rk3) && is_array($rk3) && isset($rk3['id']) && trim((string)$rk3['id']) !== '') { $presentCount++; }
    $hideSaveBtn = ($presentCount > 1); 
    // sembunyikan jika data muncul lebih dari 1 (>=2)
    ?>

   <div class="no-print" style="margin:12px 0; padding:10px; border:1px solid #ddd; border-radius:4px; width: 600px;">
     <form method="post" action="">
       <div style="display:flex; gap:12px; align-items:flex-start;">
         <div style="flex:1; min-width:0;">
           <label for="note_mkt" style="display:block; font-weight:bold; margin-bottom:6px;">Note MKT</label>
           <textarea name="note_mkt" id="note_mkt" rows="4" style="width: 90%; font-size:12px; padding:6px;"><?php echo htmlspecialchars($noteMktCombined); ?></textarea>
         </div>
         <div style="flex:1; min-width:0;">
           <label for="note_ppc" style="display:block; font-weight:bold; margin-bottom:6px;">Note PPC</label>
           <textarea name="note_ppc" id="note_ppc" rows="4" style="width: 90%; font-size:12px; padding:6px;"><?php echo htmlspecialchars($notePpcCombined); ?></textarea>
         </div>
       </div>
      <input type="hidden" name="id_bon" value="<?php echo htmlspecialchars($r3['id']); ?>" />
      <?php if (!$hideSaveBtn): ?>
      <div style="margin-top:8px;">
        <button type="submit" name="note_mkt_save" value="1" style="background:#337ab7; color:#fff; border:0; padding:6px 12px; border-radius:3px; cursor:pointer;">Simpan Note</button>
      </div>
      <?php endif; ?>
     </form>
   </div>
 </body>

 </html>
