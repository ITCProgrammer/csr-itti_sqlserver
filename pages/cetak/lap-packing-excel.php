<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Lap-Packing-" . date($_GET['awal']) . ".xls"); //ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php
ini_set("error_reporting", 1);
include "../../koneksi.php";
?>

<div align="center">
  <h1>LAPORAN HARIAN PACKING DEPT. QCF</h1>
</div>
<!--script disini -->
<?php
if ($_GET['awal'] != "" and $_GET['akhir'] != "") {
  $tgl = $_GET['awal'];
  $tgl1 = $_GET['akhir'];
  $shift = $_GET['shift'];
} else {
  $tgl = $_GET['awal'];
  $tgl1 = $_GET['akhir'];
  $shift = $_GET['shift'];
}
?>
Tanggal :
<?php echo $tgl; ?> s/d
<?php echo $tgl1; ?><br>
Shift :
<?php echo $shift; ?><br>
Group :
<?php echo $_GET['group']; ?><br>
No MC :
<?php echo $_GET['nomc']; ?>
<table width="100%" border="1">
  <tr>
    <th rowspan="2" valign="middle" bgcolor="#006699">
      <font color="#FFFFFF"><strong>No</strong></font>
    </th>
    <th rowspan="2" valign="middle" bgcolor="#006699">
      <font color="#FFFFFF">
        <strong>No KK</strong>
      </font>
    </th>
    <th rowspan="2" valign="middle" bgcolor="#006699">
      <font color="#FFFFFF">
        <strong>No Demand</strong>
      </font>
    </th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong>
        <font color="#FFFFFF">Pelanggan</font>
      </strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong>
        <font color="#FFFFFF">No Order</font>
      </strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong>
        <font color="#FFFFFF">Jenis Kain</font>
      </strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699">
      <strong>
        <font color="#FFFFFF">Item</font>
      </strong>
    </th>
    <th rowspan="2" valign="middle" bgcolor="#006699">
      <strong>
        <font color="#FFFFFF">Hanger</font>
      </strong>
    </th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong>
        <font color="#FFFFFF">Warna</font>
      </strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong>
        <font color="#FFFFFF">Tgl Pengiriman</font>
      </strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong>
        <font color="#FFFFFF">Lot</font>
      </strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong>
        <font color="#FFFFFF">Group</font>
      </strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong>
        <font color="#FFFFFF">No MC</font>
      </strong></th>
    <th colspan="2" bgcolor="#006699"><strong>
        <font color="#FFFFFF">Qty Bruto</font>
      </strong></th>
    <th rowspan="2" bgcolor="#006699"><strong>
        <font color="#FFFFFF">Netto</font>
      </strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699">
      <font color="#FFFFFF"><strong>Yard/Meter</strong></font>
    </th>
    <th colspan="2" valign="middle" bgcolor="#006699">
      <font color="#FFFFFF"><strong>Qty BS</strong></font>
    </th>
    <th colspan="2" valign="middle" bgcolor="#006699"> <font color="#FFFFFF"><strong>Loss</strong></font> </th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong>
        <font color="#FFFFFF">Proses</font>
      </strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong>
        <font color="#FFFFFF">Status</font>
      </strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong>
        <font color="#FFFFFF">Jam Mutasi</font>
      </strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699"><strong>
        <font color="#FFFFFF">Catatan</font>
      </strong></th>
    <th rowspan="2" valign="middle" bgcolor="#006699">
      <strong>
        <font color="#FFFFFF">Kategori BS</font>
      </strong>
    </th>
    <th rowspan="2" valign="middle" bgcolor="#006699">
      <strong>
        <font color="#FFFFFF">Department Penyebab</font>
      </strong>
    </th>
    <th rowspan="2" valign="middle" bgcolor="#006699">
      <strong>
        <font color="#FFFFFF">Operator</font>
      </strong>
    </th>
    <th colspan="2" valign="middle" bgcolor="#006699">
      <strong>
        <font color="#FFFFFF">KQ</font>
      </strong>
    </th>
    <th colspan="2" valign="middle" bgcolor="#006699">
      <strong>
        <font color="#FFFFFF">BQ</font>
      </strong>
    </th>
    <th colspan="2" valign="middle" bgcolor="#006699">
      <strong>
        <font color="#FFFFFF">KF</font>
      </strong>
    </th>
    <th colspan="2" valign="middle" bgcolor="#006699">
      <strong>
        <font color="#FFFFFF">BF</font>
      </strong>
    </th>
  </tr>

  <tr>
    <th valign="middle" bgcolor="#006699">
      <strong>
        <font color="#FFFFFF">Roll</font>
      </strong>
    </th>
    <th valign="middle" bgcolor="#006699">
      <strong>
        <font color="#FFFFFF">Kg</font>
      </strong>
    </th>
    <th valign="middle" bgcolor="#006699">
      <strong>
        <font color="#FFFFFF">Roll</font>
      </strong>
    </th>
    <th valign="middle" bgcolor="#006699">
      <strong>
        <font color="#FFFFFF">Kg</font>
      </strong>
    </th>
    <th valign="middle" bgcolor="#006699"> <strong> <font color="#FFFFFF">Kg</font></strong></th>
    <th valign="middle" bgcolor="#006699"> <strong> <font color="#FFFFFF">Note</font> </strong> </th>
    
    <th valign="middle" bgcolor="#006699"> <strong> <font color="#FFFFFF">Kg</font> </strong> </th>
    <th valign="middle" bgcolor="#006699"> <strong> <font color="#FFFFFF">Note</font> </strong> </th>
    <th valign="middle" bgcolor="#006699"> <strong> <font color="#FFFFFF">Kg</font> </strong> </th>
    <th valign="middle" bgcolor="#006699"> <strong> <font color="#FFFFFF">Note</font> </strong> </th>
    <th valign="middle" bgcolor="#006699"> <strong> <font color="#FFFFFF">Kg</font> </strong> </th>
    <th valign="middle" bgcolor="#006699"> <strong> <font color="#FFFFFF">Note</font> </strong> </th>
    <th valign="middle" bgcolor="#006699"> <strong> <font color="#FFFFFF">Kg</font> </strong> </th>
    <th valign="middle" bgcolor="#006699"> <strong> <font color="#FFFFFF">Note</font> </strong> </th>
  </tr>
  <?php
  if ($shift != "ALL") {
    $shft = " AND `shift`='$shift' ";
  } else {
    $shft = " ";
  }
  if ($_GET['nomc'] != "ALL") {
    $nomc = " AND `no_mc` LIKE '%$_GET[nomc]' ";
  } else {
    $nomc = " ";
  }
  if ($_GET['group'] != "ALL") {
    $grp = " AND `inspektor` LIKE '%$_GET[group]' ";
  } else {
    $grp = " ";
  }
  $no = 1;
  $sql = mysqli_query($con, "SELECT * FROM tbl_lap_inspeksi WHERE `tgl_update` BETWEEN '$tgl' and '$tgl1' " . $shft . " " . $nomc . " " . $grp . " AND `dept`='PACKING' ORDER BY id ASC");
  while ($row = mysqli_fetch_array($sql)) {
    $bgcolor = ($c++ & 1) ? '#33CCFF' : '#FFCC99';
    ?>
    <tr bgcolor="<?php echo $bgcolor; ?>">
      <td>
        <?php echo $no; ?>
      </td>
      <td>
        <?php echo $row['nokk']; ?>
      </td>
      <td>
        <?php echo $row['nodemand']; ?>
      </td>
      <td>
        <?php echo $row['pelanggan']; ?>
      </td>
      <td>
        <?php echo $row['no_order']; ?>
      </td>
      <td>
        <?php echo $row['jenis_kain']; ?>
      </td>
      <td>
        <?php echo $row['no_item']; ?>
      </td>
      <td>
        <?php echo $row['no_hanger']; ?>
      </td>
      <td>
        <?php echo $row['warna']; ?>
      </td>
      <td>
        <?php echo $row['tgl_pengiriman']; ?>
      </td>
      <td>'
        <?php echo $row['lot']; ?>
      </td>
      <td>
        <?php echo $row['inspektor']; ?>
      </td>
      <td>
        <?php echo $row['no_mc']; ?>
      </td>
      <td>
        <?php echo $row['jml_roll'] ?>
      </td>
      <td>
        <?php echo $row['bruto']; ?>
      </td>
      <td>
        <?php echo $row['netto']; ?>
      </td>
      <td>
        <?php echo $row['panjang'] . " " . $row['satuan']; ?>
      </td>
      <td>
        <?= $row['jml_bs'] ?>
      </td>
      <td>
        <?= $row['kg_bs'] ?>
      </td>
      <td><?= $row['qty_loss'] ?></td>
      <td><?= $row['note_loss'] ?></td>
      <td>
        <?php echo $row['proses']; ?>
      </td>
      <td>
        <?php echo $row['status']; ?>
      </td>
      <td>
        <?= $row['jam_mutasi'] ?>
      </td>
      <td>
        <?php echo $row['catatan']; ?>
      </td>
      <td>
        <?php echo $row['ket_bs']; ?>
      </td>
      <td>
        <?php echo $row['ket_dept_penyebab']; ?>
      </td>
      <td>
        <?php
        $sqlop = "SELECT 
              DISTINCT(INITIALS.LONGDESCRIPTION) AS NAMA, ELEMENTSINSPECTION.OPERATORCODE FROM INITIALS INITIALS LEFT JOIN ELEMENTSINSPECTION ELEMENTSINSPECTION
              ON INITIALS.CODE = ELEMENTSINSPECTION.OPERATORCODE 
              WHERE ELEMENTSINSPECTION.DEMANDCODE ='$row[nodemand]' AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13";
        $stmt1 = db2_exec($conn1, $sqlop, array('cursor' => DB2_SCROLLABLE));

        $ops_name = [];
        while ($rowop = db2_fetch_assoc($stmt1)) {
          if ($row['operator'] == $rowop['OPERATORCODE']) {
            $ops_name[] = $rowop['NAMA'];
          }
        }
        echo implode(' & ', $ops_name);
        ?>
      </td>
      <td><?= $row['qty_kq']; ?></td>
      <td><?= $row['note_kq']; ?></td>
      <td><?= $row['qty_bq']; ?></td>
      <td><?= $row['note_bq']; ?></td>
      <td><?= $row['qty_kf']; ?></td>
      <td><?= $row['note_kf']; ?></td>
      <td><?= $row['qty_bf']; ?></td>
      <td><?= $row['note_bf']; ?></td>
    </tr>
    <?php $no++;
  }

  for ($ri = 0; $ri < 5; $ri++) {
    ?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  <?php } ?>
</table>