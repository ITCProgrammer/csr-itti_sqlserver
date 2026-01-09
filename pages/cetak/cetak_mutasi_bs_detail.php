<?php
//$lReg_username=$_SESSION['labReg_username'];
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$idkk = $_REQUEST['idkk'];
$act = $_GET['g'];
//-
$Awal = $_GET['Awal'];
$Akhir = $_GET['Akhir'];
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
<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="styles_cetak.css" rel="stylesheet" type="text/css">
  <title>Cetak Mutasi BS</title>
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
</head>

<body>
  <table width="100%">
    <thead>
      <tr>
        <td>
          <table width="100%" border="1" class="table-list1">
            <tr>
              <td width="9%" align="center"><img src="indo.jpg" width="40" height="40" /></td>
              <td align="center" valign="middle"><strong>
                  <font size="+1">BUKTI MUTASI BARANG LIMBAH</font>
                </strong></td>
              <td align="center" valign="middle">
                <table width="100%" border="0">
                  <tbody>
                    <tr>
                      <td>No. Form</td>
                      <td>:13-01</td>
                    </tr>
                    <tr>
                      <td>No. Revisi</td>
                      <td>: 00</td>
                    </tr>
                    <tr>
                      <td>Tgl. Terbit</td>
                      <td>: 23-jan-18</td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </table>
          <?php
          $dt = mysqli_query($con, " SELECT * FROM mutasi_bs_krah WHERE id='$_GET[idm]'");
          $r = mysqli_fetch_array($dt);
          ?>
          <table width="100%" border="0">
            <tbody>
              <tr>
                <td width="23%">
                  <font size="-1">No.</font>
                </td>
                <td width="32%">
                  <font size="-1">:
                    <?php echo $r['no_mutasi']; ?>
                  </font>
                </td>
                <td align="left">
                  <font size="-1">Tanggal</font>
                </td>
                <td align="left">
                  <font size="-1">:
                    <?php echo date('d F Y', strtotime($r['tgl_buat'])); ?>
                  </font>
                </td>
              </tr>
              <tr>
                <td>
                  <font size="-1">Departemen</font>
                </td>
                <td>
                  <font size="-1">:
                    <?php echo $r['dept']; ?>
                  </font>
                </td>
                <td align="left">
                  <font size="-1">Jam Penyerahan:</font>
                </td>
                <td align="left">
                  <font size="-1">:
                    <?php echo $r['jam_penyerahan']; ?> wib
                  </font>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <font size="-1">Barang Limbah Yang Dimutasi : </font>
                </td>
                <td width="18%" align="left">&nbsp;</td>
                <td width="27%" align="left">&nbsp;</td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </thead>
    <tr>
      <td>
        <table width="100%" border="1" class="table-list1">
          <tr>
            <td width="5%" align="center" valign="top">
              <font size="+2"><strong>NO.</strong></font>
            </td>
            <td width="73%" align="center" valign="top">
              <font size="+2"><strong>Jenis Limbah</strong></font>
            </td>
            <td width="22%" align="center" valign="top">
              <font size="+2"><strong>Quantity (Kg/Pcs)</strong></font>
            </td>
          </tr>
          <?php
          $data = mysqli_query($con, "SELECT md.*,m.no_mutasi,m.jns_limbah FROM mutasi_bs_krah_detail md
   INNER JOIN mutasi_bs_krah m ON md.id_mutasi=m.id 
   WHERE m.id='$_GET[idm]' 
   ORDER BY md.id ASC");
          $no = 1;
          while ($rowd = mysqli_fetch_array($data)) {
            ?>
            <tr>
              <td align="center" valign="top">
                <?php echo $no; ?>
              </td>
              <td align="center" valign="top"><strong>
                  <?php echo $rowd['jns_limbah']; ?>
                </strong></td>
              <td align="center" valign="top">
                <?php echo $rowd['qty'] . " " . $rowd['satuan']; ?>
              </td>
            </tr>
            <?php $no++;
            $Tqty += $rowd['qty'];
          } ?>
          <?php for ($i = $no; $i <= 46; $i++) { ?>
            <tr>
              <td align="center" valign="top">
                <?php echo $i; ?>
              </td>
              <td align="center" valign="top">&nbsp;</td>
              <td align="center" valign="top">&nbsp;</td>
            </tr>
      </tr>
    <?php } ?>
  </table>
  </td>
  </tr>
  <tr>
    <td>
      <table width="100%" border="0">
        <tbody>
          <tr>
            <td width="39%">
              <font size="+2">TOTAL</font>
            </td>
            <td width="61%" align="right">
              <font size="+4"> <strong>
                  <?php echo number_format($Tqty, 2, '.', ''); ?> KG
                </strong></font>
            </td>
          </tr>
        </tbody>
      </table>
    </td>
  </tr>
  <tr>
    <td>
      <table width="100%" border="1" class="table-list1">

        <tr>
          <td width="16%" scope="col">&nbsp;</td>
          <td width="29%" scope="col">
            <div align="center">Diserah Oleh;</div>
          </td>
          <td width="29%" scope="col">
            <div align="center">Diterima Oleh;</div>
          </td>
        </tr>
        <tr>
          <td>Nama</td>
          <td align="center">
            <font size="-1"><strong>
                <?php echo $r['serah']; ?>
              </strong></font>
          </td>
          <td align="center">
            <font size="-1"><strong>
                <?php echo $r['terima']; ?>
              </strong></font>
          </td>
        </tr>
        <tr>
          <td>Jabatan</td>
          <td align="center">Leader</td>
          <td align="center">Staff</td>
        </tr>
        <tr>
          <td>Tanggal</td>
          <td align="center">
            <?php echo tanggal_indo($tgl, false); ?>
          </td>
          <td align="center">
            <?php echo tanggal_indo($tgl, false); ?>
          </td>
        </tr>
        <tr>
          <td valign="top" style="height: 0.5in;">Tanda Tangan</td>
          <td align="center"><!--<img src="ttd/bayu.png" width="50" height="50" alt=""/>--></td>
          <td align="center"><!--<img src="ttd/putri.png" width="50" height="50" alt=""/>--></td>
        </tr>

      </table>
    </td>
  </tr>

  </table>
  <!--<table width="99%" border="0">
  <tbody>
    <tr>
      <td width="73%" rowspan="4"><div style="font-size: 11px; font-family:sans-serif, Roman, serif;">
        <?Php $dtKet = mysqli_query($con, "SELECT
	sum( IF ( ket_status = 'Tolak Basah', 1, 0 ) ) AS tolak_basah,
	sum( IF ( ket_status = 'Gagal Proses', 1, 0 ) ) AS gagal_proses,
	sum( IF ( ket_status = 'Perbaikan', 1, 0 ) ) AS perbaikan,
	sum( IF ( ket_status = 'Greige' OR ket_status = 'Salesmen Sample' OR ket_status = 'Development Sample' OR ket_status = 'Cuci Misty' OR ket_status = 'Cuci YD', 1, 0 ) ) AS greige,
sum( IF ( ket_status = 'Tolak Basah',bruto, 0 ) ) AS tolak_basah_kg,
sum( IF ( ket_status = 'Gagal Proses', bruto, 0 ) ) AS gagal_proses_kg,
sum( IF ( ket_status = 'Perbaikan', bruto, 0 ) ) AS perbaikan_kg,
sum( IF ( ket_status = 'Greige' OR ket_status = 'Salesmen Sample' OR ket_status = 'Development Sample' OR ket_status = 'Cuci Misty' OR ket_status = 'Cuci YD', bruto, 0 ) ) AS greige_kg
FROM
	tbl_schedule 
WHERE
	NOT STATUS = 'selesai'");
        $rKet = mysqli_fetch_array($dtKet); ?>
        Perbaikan: <?php echo $rKet['perbaikan']; ?> Lot &nbsp; <?php echo $rKet['perbaikan_kg']; ?> Kg<br />
        Gagal Proses : <?php echo $rKet['gagal_proses']; ?> Lot &nbsp; <?php echo $rKet['gagal_proses_kg']; ?> Kg<br />
    Greige : <?php echo $rKet['greige']; ?> Lot &nbsp; <?php echo $rKet['greige_kg']; ?> Kg<br />  
      Tolak Basah : <?php echo $rKet['tolak_basah']; ?> Lot &nbsp; <?php echo $rKet['tolak_basah_kg']; ?> Kg </div></td>
      <td width="20%">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><pre></pre></td>
    </tr>
  </tbody>
</table>-->
  <script>
    //alert('cetak');window.print();
  </script>
</body>

</html>