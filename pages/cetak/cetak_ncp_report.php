<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Laporan-Baru-NCP-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");

include "../../koneksi.php";
include "../../tgl_indo.php";

$Awal = isset($_GET['awal']) ? $_GET['awal'] : '';
$Akhir = isset($_GET['akhir']) ? $_GET['akhir'] : '';
$Dept = isset($_GET['dept']) ? $_GET['dept'] : '';
$Kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
$Cancel = isset($_GET['cancel']) ? $_GET['cancel'] : '';
$jamA = isset($_GET['jam_awal']) ? $_GET['jam_awal'] : '';
$jamAr = isset($_GET['jam_akhir']) ? $_GET['jam_akhir'] : '';

if (strlen($jamA) == 5) {
  $start_date = $Awal . " " . $jamA;
} else {
  $start_date = $Awal . " 0" . $jamA;
}
if (strlen($jamAr) == 5) {
  $stop_date = $Akhir . " " . $jamAr;
} else {
  $stop_date = $Akhir . " 0" . $jamAr;
}

if ($Dept == "ALL") {
  $Wdept = " ";
} else {
  $Wdept = " AND dept='$Dept' ";
}

if ($Kategori == "ALL") {
  $Wkategori = " ";
} else if ($Kategori == "hitung") {
  $Wkategori = " AND ncp_hitung='ya' ";
} else if ($Kategori == "gerobak") {
  $Wkategori = " AND kain_gerobak='ya' ";
} else if ($Kategori == "tidakhitung") {
  $Wkategori = " AND ncp_hitung='tidak' ";
}

if ($Cancel != "1") {
  $sts = " AND NOT `status`='Cancel' ";
} else {
  $sts = "  ";
}

$queryTotalNCP = mysqli_query($con, "select
                                        sum(berat) as total_ncp_all_dept
                                      from
                                        tbl_ncp_qcf_now
                                      where
                                        DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) between '$start_date' and '$stop_date'
                                        $Wdept $Wkategori $sts ");
$rowTotalNcp = mysqli_fetch_assoc($queryTotalNCP);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>

<body>
  <?php if ($rowTotalNcp['total_ncp_all_dept'] > 0) { ?>
    <table border="0">
      <tbody>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><strong>Total NCP:</strong> <?= number_format($rowTotalNcp['total_ncp_all_dept'], 2, ",", ".") ?></td>
        </tr>
        <?php
        $queryDept = mysqli_query($con, "select
                                          dept,
                                          sum(berat) as total_berat_dept
                                        from
                                          tbl_ncp_qcf_now
                                        where
                                          DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) between '$start_date' and '$stop_date'
                                          $Wdept $Wkategori $sts
                                        group by
                                          dept
                                        order by
                                          total_berat_dept desc");

        $jumlah = mysqli_num_rows($queryDept);
        ;
        $num = 1;
        for ($i = 1; $i <= ceil($jumlah / 4); $i++) {
          ?>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <?php
            for ($j = 0; $j < 4; $j++) {
              if ($num <= $jumlah) {
                $row = mysqli_fetch_assoc($queryDept);
                ?>
                <td>&nbsp;</td>
                <td style="vertical-align: top;">
                  <table border="1">
                    <thead>
                      <tr>
                        <th colspan="3" bgcolor="green"><?= $row['dept'] ?></th>
                      </tr>
                      <tr>
                        <th bgcolor="green">Quality Issue</th>
                        <th bgcolor="green">Qty</th>
                        <th bgcolor="green">%</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $queryMasalahPerDept = mysqli_query($con, "select
                                            dept,
                                            masalah_dominan,
                                            SUM(berat) as berat
                                          from
                                            tbl_ncp_qcf_now
                                          where
                                            DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) between '$start_date' and '$stop_date'
                                            $Wkategori $sts
                                            and dept = '$row[dept]'
                                          group by
                                            masalah_dominan
                                          order by
                                            berat desc");
                      $total = 0;
                      while ($row2 = mysqli_fetch_assoc($queryMasalahPerDept)) {
                        ?>
                        <tr>
                          <td><?= $row2['masalah_dominan'] ?></td>
                          <td><?= number_format($row2['berat'], 2, ",", ".") ?></td>
                          <td></td>
                        </tr>
                        <?php
                        $total += $row2['berat'];
                      }
                      ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td><strong>TOTAL</strong></td>
                        <td><strong><?= number_format($total, 2, ",", ".") ?></strong></td>
                        <td><strong><?= number_format($total / $rowTotalNcp['total_ncp_all_dept'] * 100, 2) ?></strong></td>
                      </tr>
                    </tfoot>
                  </table>
                </td>
                <?php
                $num++;
              }
            }
            ?>
          </tr>
          <?php
        }
        ?>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="3">
            <?php
            $queryDept = mysqli_query($con, "select
                    group_concat(distinct dept) as dept
                  from
                    tbl_ncp_qcf_now
                  where
                    DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) between '$start_date' and '$stop_date'
                    $Wdept $Wkategori $sts
                  group by
                    masalah_dominan
                  order by
                    sum(berat) desc
                  limit 5");
            $deptTop5 = [];
            while ($row = mysqli_fetch_assoc($queryDept)) {
              $deptTop5[] = $row['dept'];
            }
            // Menggabungkan array menjadi string dengan implode
            $stringTop5 = implode(",", $deptTop5);

            // Memecah string menjadi array dengan explode
            $arrayTop5 = explode(",", $stringTop5);

            // Menghilangkan duplikat dengan array_unique
            $uniqueTop5 = array_unique($arrayTop5);
            ?>
            <table border="1">
              <thead>
                <tr>
                  <th colspan="<?= count($uniqueTop5) + 3 ?>" bgcolor="green">TOP 5 DEFECT</th>
                </tr>
                <tr>
                  <th bgcolor="green">DEFECT</th>
                  <?php foreach ($uniqueTop5 as $dept): ?>
                    <th bgcolor="green"><?= $dept ?></th>
                  <?php endforeach; ?>
                  <th bgcolor="green">TOTAL</th>
                  <th bgcolor="green">%</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "";
                foreach ($uniqueTop5 as $dept) {
                  $sql .= "SUM(CASE
                WHEN dept = '$dept' THEN berat ELSE 0 END
                ) AS $dept,";
                }

                $queryTop5 = mysqli_query($con, "select
                                masalah_dominan,
                                $sql
                                sum(berat) as total_berat
                              from
                                tbl_ncp_qcf_now
                              where
                                DATE_FORMAT( tgl_buat, '%Y-%m-%d %H:%i' ) between '$start_date' and '$stop_date'
                                $Wdept $Wkategori $sts
                              group by
                                masalah_dominan
                              order by
                                total_berat desc
                              limit 5");

                while ($rowTop5 = mysqli_fetch_assoc($queryTop5)) {
                  ?>
                  <tr>
                    <td><strong><?= $rowTop5['masalah_dominan'] ?></strong></td>
                    <?php foreach ($uniqueTop5 as $dept): ?>
                      <td><?= $rowTop5[$dept] > 0 ? number_format($rowTop5[$dept], 2, ",", ".") : '' ?></td>
                    <?php endforeach; ?>
                    <td><?= number_format($rowTop5['total_berat'], 2, ",", ".") ?></td>
                    <td><?= number_format($rowTop5['total_berat'] / $rowTotalNcp['total_ncp_all_dept'] * 100, 2) ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  <?php } ?>
</body>

</html>