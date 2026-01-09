<?php
if (isset($_GET['excell'])) {
  header("Content-type: application/octet-stream");
  header("Content-Disposition: attachment; filename=cetaklolosqc-" . date("His") . ".xls");//ganti nama sesuai keperluan
  header("Pragma: no-cache");
  header("Expires: 0");
} else { ?>
  <link href="styles_cetak.css" rel="stylesheet" type="text/css">
<?php }
ini_set("error_reporting", 1);
session_start();
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$idkk = $_REQUEST['idkk'];
$act = $_GET['g'];
//-
$Awal = $_GET['awal'];
$Akhir = $_GET['akhir'];
$GShift = $_GET['shft'];
$Subdept = $_GET['subdept'];
$TotalKirim = $_GET['total'];
$TotalLot = $_GET['total_lot'];
$Lolos = $_GET['lolos'];
$Langganan = $_GET['langganan'];
$qTgl = mysqli_query($con, "SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl = mysqli_fetch_array($qTgl);
if ($Awal != "") {
  $tgl = substr($Awal, 0, 10);
  $jam = $Awal;
} else {
  $tgl = $rTgl['tgl_skrg'];
  $jam = $rTgl['jam_skrg'];
}
?>



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
  }
</style>

<?php
$nmBln = array(1 => "JANUARI", "FEBUARI", "MARET", "APRIL", "MEI", "JUNI", "JULI", "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOVEMBER", "DESEMBER");
?>

<table width="100%">
  <!--
  <thead>

    <tr>
      <td><table width="100%" border="1" class="table-list1"> 
  
  <tr>
    <td align="center"><strong><font size="+1">LAPORAN KELUHAN PELANGGAN EKSTERNAL &quot;LOLOS QC&quot;</font><br />
    <font size="-1">Periode: <?php echo date("d/m/Y", strtotime($Awal)); ?> s/d <?php echo date("d/m/Y", strtotime($Akhir)); ?></font>
          <br />
    </strong></td>
    </tr>
  
  </table>

    </td>
    </tr>
  
  </thead>-->
  <tr>
    <td>
      <table width="100%" border="1" class="table-list1">
        <thead>

          <tr align="center">
            <td colspan="19">
              <strong>
                <font size="+1">LAPORAN KELUHAN PELANGGAN EKSTERNAL &quot;LOLOS QC&quot;</font><br />
                <font size="-1">Periode: <?php echo date("d/m/Y", strtotime($Awal)); ?> s/d
                  <?php echo date("d/m/Y", strtotime($Akhir)); ?></font>
                <br />
              </strong>
            </td>

          </tr>

          <tr align="center">
            <td>
              <font size="-2"><strong>NO</strong></font>
            </td>
            <td>
              <font size="-2"><strong>LANGGANAN</strong></font>
            </td>
            <td>
              <font size="-2"><strong>ORDER</strong></font>
            </td>
            <td>
              <font size="-2"><strong>JENIS KAIN</strong></font>
            </td>
            <td>
              <font size="-2"><strong>LEBAR &amp; GRAMASI</strong></font>
            </td>
            <td>
              <font size="-2"><strong>LOT</strong></font>
            </td>
            <td>
              <font size="-2"><strong>WARNA</strong></font>
            </td>
            <td>
              <font size="-2"><strong>QTY KIRIM</strong></font>
            </td>
            <td>
              <font size="-2"><strong>QTY KELUHAN</strong></font>
            </td>
            <td>
              <font size="-2"><strong>QTY LOLOS QC (kg)</strong></font>
            </td>
            <td>
              <font size="-2"><strong>MASALAH</strong></font>
            </td>
            <td>
              <font size="-2"><strong>MASALAH DOMINAN</strong></font>
            </td>
            <td>
              <font size="-2"><strong>TGL PROSES</strong></font>
            </td>
            <td>
              <font size="-2"><strong>SOLUSI</strong></font>
            </td>
            <td>
              <font size="-2"><strong>PENYEBAB</strong></font>
            </td>
            <td>
              <font size="-2"><strong>PERSONIL</strong></font>
            </td>
            <td>
              <font size="-2"><strong>SHIFT</strong></font>
            </td>
            <td>
              <font size="-2"><strong>KETERANGAN</strong></font>
            </td>
            <td>
              <font size="-2"><strong>&nbsp;</strong></font>
            </td>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          //$Awal=$_GET['awal'];
          //$Akhir=$_GET['akhir'];
          //$GShift=$_GET['shft'];
          if ($_GET['awal'] != "") {
            $Where = "AND DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$_GET[awal]' AND '$_GET[akhir]' AND sts_revdis='0' ";
          }
          if ($_GET['shft'] == "ALL" or $_GET['shft'] == "") {
            $shft = " ";
          } else {
            $shft = " AND shift='$_GET[shft]' OR shift2='$_GET[shft]' ";
          }
          if ($_GET['subdept'] != "") {
            $subdpt = " AND subdept='$_GET[subdept]' ";
          } else {
            $subdpt = " ";
          }
          if ($Lolos == "1") {
            $lolos = " AND sts='1' ";
          } else {
            $lolos = " ";
          }
          if ($Awal != "" or $GShift != "" or $Subdept != "" or $Lolos == "1" or $Langganan != "") {
            $qry1 = mysqli_query($con, "SELECT * FROM tbl_aftersales_now WHERE langganan LIKE '%$_GET[langganan]%' $Where $lolos $shft $subdpt ORDER BY pejabat,personil ASC");
          } else {
            $qry1 = mysqli_query($con, "SELECT * FROM tbl_aftersales_now WHERE langganan LIKE '$_GET[langganan]' $Where $lolos $shft $subdpt ORDER BY pejabat,personil ASC");
          }
          $tkirim = 0;
          $tclaim = 0;
          while ($row1 = mysqli_fetch_array($qry1)) {
            // $qryQCF=mysqli_query($con,"SELECT a.nokk, a.nodemand, a.masalah_dominan, b.tgl_fin, b.tgl_ins, b.tgl_masuk, b.ket from tbl_aftersales_now a left join tbl_qcf b on a.nodemand=b.nodemand WHERE a.nodemand='$row1[nodemand]'");
            // $rQCF=mysqli_fetch_array($qryQCF);
            $sqlFIN = "SELECT
        PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE,
        PRODUCTIONDEMANDSTEP.OPERATIONCODE,
        PRODUCTIONDEMANDSTEP.MINBEGINQUEUE AS TGL_FIN 
        FROM PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
        WHERE PRODUCTIONDEMANDSTEP.OPERATIONCODE ='FNJ1' AND PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE ='$row1[nodemand]'";
            $stmt = db2_exec($conn1, $sqlFIN, array('cursor' => DB2_SCROLLABLE));
            $rFIN = db2_fetch_assoc($stmt);

            $sqlINS = "SELECT
        PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE,
        PRODUCTIONDEMANDSTEP.OPERATIONCODE,
        PRODUCTIONDEMANDSTEP.MINBEGINQUEUE AS TGL_INS 
        FROM PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
        WHERE PRODUCTIONDEMANDSTEP.OPERATIONCODE ='INS3' AND PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE ='$row1[nodemand]'";
            $stmt1 = db2_exec($conn1, $sqlINS, array('cursor' => DB2_SCROLLABLE));
            $rINS = db2_fetch_assoc($stmt1);

            $sqlPACK = "SELECT
        PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE,
        PRODUCTIONDEMANDSTEP.OPERATIONCODE,
        PRODUCTIONDEMANDSTEP.MINBEGINQUEUE AS TGL_INS 
        FROM PRODUCTIONDEMANDSTEP PRODUCTIONDEMANDSTEP
        WHERE PRODUCTIONDEMANDSTEP.OPERATIONCODE ='CNP1' AND PRODUCTIONDEMANDSTEP.PRODUCTIONDEMANDCODE ='$row1[nodemand]'";
            $stmt2 = db2_exec($conn1, $sqlPACK, array('cursor' => DB2_SCROLLABLE));
            $rPACK = db2_fetch_assoc($stmt2);

            if ($row1['t_jawab'] != "" and $row1['t_jawab1'] != "" and $row1['t_jawab2'] != "") {
              $tjawab = $row1['t_jawab'] . "," . $row1['t_jawab1'] . ", " . $row1['t_jawab2'];
            } else if ($row1['t_jawab'] != "" and $row1['t_jawab1'] != "" and $row1['t_jawab2'] == "") {
              $tjawab = $row1['t_jawab'] . "," . $row1['t_jawab1'];
            } else if ($row1['t_jawab'] != "" and $row1['t_jawab1'] == "" and $row1['t_jawab2'] != "") {
              $tjawab = $row1['t_jawab'] . "," . $row1['t_jawab2'];
            } else if ($row1['t_jawab'] == "" and $row1['t_jawab1'] != "" and $row1['t_jawab2'] != "") {
              $tjawab = $row1['t_jawab1'] . "," . $row1['t_jawab2'];
            } else if ($row1['t_jawab'] != "" and $row1['t_jawab1'] == "" and $row1['t_jawab2'] == "") {
              $tjawab = $row1['t_jawab'];
            } else if ($row1['t_jawab'] == "" and $row1['t_jawab1'] != "" and $row1['t_jawab2'] == "") {
              $tjawab = $row1['t_jawab1'];
            } else if ($row1['t_jawab'] == "" and $row1['t_jawab1'] == "" and $row1['t_jawab2'] != "") {
              $tjawab = $row1['t_jawab2'];
            } else if ($row1['t_jawab'] == "" and $row1['t_jawab1'] == "" and $row1['t_jawab2'] == "") {
              $tjawab = "";
            }
          ?>
            <tr valign="top">
              <td align="center">
                <font size="-2"><?php echo $no; ?></font>
              </td>
              <td>
                <font size="-2">
                  <?php echo substr(strtoupper($row1['langganan']), 0, 15) . "<br>" . substr(strtoupper($row1['langganan']), 15, 15) . "<br>" . substr(strtoupper($row1['langganan']), 30, 15) . "<br>" . substr(strtoupper($row1['langganan']), 45, 15); ?>
                </font>
              </td>
              <td align="center">
                <font size="-2"><?php echo strtoupper($row1['no_order']); ?></font>
              </td>
              <td>
                <font size="-2"><?php echo substr(strtoupper($row1['jenis_kain']), 0, 30) . "..."; ?></font>
              </td>
              <td align="center">
                <font size="-2"><?php echo $row1['lebar'] . "x" . $row1['gramasi']; ?></font>
              </td>
              <td align="center">
                <font size="-2"><?php echo strtoupper($row1['lot']); ?></font>
              </td>
              <td align="center">
                <font size="-2"><?php echo strtoupper($row1['warna']); ?></font>
              </td>
              <td align="right">
                <font size="-2"><?php echo strtoupper($row1['qty_kirim']); ?></font>
              </td>
              <td align="right">
                <font size="-2"><?php echo strtoupper($row1['qty_claim']); ?></font>
              </td>
              <td valign="top">
                <font size="-2"><?php echo $row1['qty_lolos']; ?></font>
              </td>
              <td valign="top">
                <font size="-2"><?php echo $row1['masalah']; ?></font>
              </td>
              <td valign="top">
                <font size="-2">
                  <?php echo $row1['masalah_dominan']; ?> <!-- MASALAH DOMINAN -->
                </font>
              </td>
              <td valign="top">
                <font size="-2">
                  <?php if ($row1['masalah_dominan'] == "Salah Sticker" or $row1['masalah_dominan'] == "Salah Proses" or $row1['masalah_dominan'] == "Short Yard") {
                    echo $rPACK['TGL_PACK'];
                  } else if ($row1['masalah_dominan'] == "Beda Warna") {
                    echo $rFIN['TGL_FIN'];
                  } else if ($row1['masalah_dominan'] != "Beda Warna") {
                    echo $rINS['TGL_INS'];
                  } ?>
                </font>
              </td>
              <!-- <?php if (strpos($rQCF['ket'], 'AKJ') !== false) {
                      echo $rQCF['tgl_masuk'];
                    } else if ($rQCF['masalah_dominan'] == "Beda Warna") {
                      echo $rQCF['tgl_fin'];
                    } else if ($rQCF['masalah_dominan'] != "Beda Warna") {
                      echo $rQCF['tgl_ins'];
                    } ?> -->
              <td valign="top">
                <font size="-2"><?php echo $row1['solusi']; ?></font>
              </td>
              <td valign="top">
                <font size="-2"><?php echo $row1['penyebab']; ?></font>
              </td>
              <td valign="top">
                <font size="-2">
                  <?php if ($row1['pejabat'] != "") {
                    echo $row1['pejabat'];
                  } else if ($row1['personil4'] != "") {
                    echo $row1['personil'] . "," . $row1['personil2'] . "," . $row1['personil3'] . "," . $row1['personil4'];
                  } else if ($row1['personil3'] != "") {
                    echo $row1['personil'] . "," . $row1['personil2'] . "," . $row1['personil3'];
                  } else if ($row1['personil2'] != "") {
                    echo $row1['personil'] . "," . $row1['personil2'];
                  } else {
                    echo $row1['personil'];
                  } ?>
                </font>
              </td>
              <td valign="top">
                <font size="-2">
                  <?php if ($row1['shift4'] != "") {
                    echo $row1['shift'] . "," . $row1['shift2'] . "," . $row1['shift3'] . "," . $row1['shift4'];
                  } else if ($row1['shift3'] != "") {
                    echo $row1['shift'] . "," . $row1['shift2'] . "," . $row1['shift3'];
                  } else if ($row1['shift2'] != "") {
                    echo $row1['shift'] . "," . $row1['shift2'];
                  } else {
                    echo $row1['shift'];
                  } ?>
                </font>
              </td>
              <td valign="top">
                <font size="-2"><?php echo $row1['ket']; ?></font>
              </td>
              <td valign="top">
                <font size="-2"><?php if ($row1['sts_check'] == "Ceklis") {
                                  echo "&#10004";
                                } else {
                                  echo "X";
                                } ?></font>
              </td>
            </tr>
          <?php $no++;
            $tkirim = $tkirim + $row1['qty_kirim'];
            $tclaim = $tclaim + $row1['qty_claim'];
          } ?>
          <tr valign="top">
            <td colspan="7" align="right"><strong>TOTAL</strong></td>
            <td align="right"><strong><?php echo $tkirim; ?></strong></td>
            <td align="right"><strong><?php echo $tclaim; ?></strong></td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>

        </tbody>
      </table>
    </td>
  </tr>
  <!--xxx-->
  <tr>
    <td>
      <table width="100%" border="0" class="table-list1">
        <tr align="center">
          <td>&nbsp;</td>
          <td>Diserahkan Oleh :</td>
          <td>Diketahui Oleh :</td>
          <td> Diketahui Oleh :</td>
        </tr>
        <tr>
          <td>Nama</td>
          <td align="center"><input type=text name=nama placeholder="Ketik disini"></td>
          <td align="center"><input type=text name=nama1 placeholder="Ketik disini"></td>
          <td align="center"><input type=text name=nama1 placeholder="Ketik disini"></td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td align="center"><input type=text name=nama2 placeholder="Ketik disini"></td>
          <td align="center"><input type=text name=nama3 placeholder="Ketik disini"></td>
          <td align="center"><input type=text name=nama1 placeholder="Ketik disini"></td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td align="center">
            <?php echo date("l, d F Y", strtotime($rTgl['tgl_skrg'])); ?>
          </td>
          <td align="center">
            <?php echo date("l, d F Y", strtotime($rTgl['tgl_skrg'])); ?>
          </td>
          <td align="center">
            <?php echo date("l, d F Y", strtotime($rTgl['tgl_skrg'])); ?>
          </td>
        </tr>
        <tr>
          <td height="60" valign="top">Tanda Tangan</td>
          <td>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
          </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
</table>

<script>
  //alert('cetak');window.print();
</script>