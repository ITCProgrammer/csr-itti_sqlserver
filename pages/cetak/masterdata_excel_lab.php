<?php
$atnow = date("his");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=masterdatalab-" . substr($_GET['awal'], 0, 10) . $atnow . ".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");


//disini script laporan anda
?>
<?php
include "../../koneksi.php";
// ini_set("error_reporting", 1);

$Awal = $_GET['awal'];
$Akhir = $_GET['akhir'];

$no_counter = isset($_GET['no_counter']) ? $_GET['no_counter'] : null;

?>

<body>
  <strong>Periode:
    <?php echo $Awal; ?> s/d
    <?php echo $Akhir; ?>
  </strong><br>
  <table width="100%" border="1">
    <thead>
      <tr>
        <th rowspan="3" bgcolor="#99FF99">No</th>
        <th rowspan="3" bgcolor="#99FF99">Suffix</th>
        <th rowspan="3" bgcolor="#99FF99">No Counter</th>
        <th rowspan="3" bgcolor="#99FF99">Jenis Testing</th>
        <th rowspan="3" bgcolor="#99FF99">Treatment</th>
        <th rowspan="3" bgcolor="#99FF99">Buyer</th>
        <th rowspan="3" bgcolor="#99FF99">No Warna</th>
        <th rowspan="3" bgcolor="#99FF99">Nama Warna</th>
        <th rowspan="3" bgcolor="#99FF99">Item</th>
        <th rowspan="3" bgcolor="#99FF99">Jenis Kain</th>
        <th rowspan="3" bgcolor="#99FF99">Personil Testing</th>
        <th rowspan="3" bgcolor="#99FF99">Permintaan Testing</th>
        <th rowspan="3" bgcolor="#99FF99">Created By</th>
        <th rowspan="3" bgcolor="#99FF99">Status</th>
        <th rowspan="3" bgcolor="#99FF99">Status QC</th>

        <th rowspan="1" colspan="9" bgcolor="#99FF99">Washing Fastness</th>
        <th rowspan="3" bgcolor="#99FF99">Note Washing</th>
        <th rowspan="1" colspan="8" bgcolor="#99FF99">Perspiration Fastness Acid</th>
        <th rowspan="3" bgcolor="#99FF99">Note Acid</th>
        <th rowspan="1" colspan="8" bgcolor="#99FF99">Perspiration Fastness Alkaline</th>
        <th rowspan="3" bgcolor="#99FF99">Note Alkaline</th>
        <th rowspan="1" colspan="8" bgcolor="#99FF99">Water Fastness</th>
        <th rowspan="3" bgcolor="#99FF99">Note Water</th>
        <th rowspan="1" colspan="8" bgcolor="#99FF99">Dye Transfer</th>
        <th rowspan="3" bgcolor="#99FF99">Note Dye Transfer</th>
        <th rowspan="1" colspan="4" bgcolor="#99FF99">Crocking Fastness</th>
        <th rowspan="3" bgcolor="#99FF99">Note Crocking</th>
        <th rowspan="3" bgcolor="#99FF99">Phenolic Yellowing</th>
        <th rowspan="3" bgcolor="#99FF99">Note Phenolic Yellowing</th>
        <th rowspan="1" colspan="2" bgcolor="#99FF99">Light Fastness</th>
        <th rowspan="3" bgcolor="#99FF99">Note Light Fastness</th>
        <th rowspan="3" bgcolor="#99FF99">C.Migration-Oven Test</th>
        <th rowspan="3" bgcolor="#99FF99">Note C.Migration-Oven</th>
        <th rowspan="1" colspan="3" bgcolor="#99FF99">C.Migration Fastness</th>
        <th rowspan="3" bgcolor="#99FF99">Note C.Migration Fastness</th>
        <th rowspan="3" bgcolor="#99FF99">Light Perspiration</th>
        <th rowspan="3" bgcolor="#99FF99">Note Light Perspiration</th>
        <th rowspan="3" bgcolor="#99FF99">Saliva Fastness</th>
        <th rowspan="3" bgcolor="#99FF99">Note Saliva Fastness</th>
        <th rowspan="1" colspan="2" bgcolor="#99FF99">Bleeding</th>
        <th rowspan="3" bgcolor="#99FF99">Note Bleeding</th>
        <th rowspan="3" bgcolor="#99FF99">Chlorin</th>
        <th rowspan="3" colspan="2" bgcolor="#99FF99">Non-Chlorin</th>
        <th rowspan="3" bgcolor="#99FF99">Note Chlorin & Non-Chlorin</th>
      </tr>

      <tr>
        <!-- Washing Fastness -->
        <th rowspan="2" bgcolor="#99FF99">Suhu</th>
        <th rowspan="2" bgcolor="#99FF99">C.Change</th>
        <th rowspan="2" bgcolor="#99FF99">Acetate</th>
        <th rowspan="2" bgcolor="#99FF99">Cotton</th>
        <th rowspan="2" bgcolor="#99FF99">Nylon</th>
        <th rowspan="2" bgcolor="#99FF99">Polyester</th>
        <th rowspan="2" bgcolor="#99FF99">Acrylic</th>
        <th rowspan="2" bgcolor="#99FF99">Wool</th>
        <th rowspan="2" bgcolor="#99FF99">C.Staining</th>

        <!-- Perspiration Fastness Acid -->
        <th rowspan="2" bgcolor="#99FF99">C.Change</th>
        <th rowspan="2" bgcolor="#99FF99">Acetate</th>
        <th rowspan="2" bgcolor="#99FF99">Cotton</th>
        <th rowspan="2" bgcolor="#99FF99">Nylon</th>
        <th rowspan="2" bgcolor="#99FF99">Polyester</th>
        <th rowspan="2" bgcolor="#99FF99">Acrylic</th>
        <th rowspan="2" bgcolor="#99FF99">Wool</th>
        <th rowspan="2" bgcolor="#99FF99">S.Staining</th>

        <!-- Perspiration Fastness Alkaline -->
        <th rowspan="2" bgcolor="#99FF99">C.Change</th>
        <th rowspan="2" bgcolor="#99FF99">Acetate</th>
        <th rowspan="2" bgcolor="#99FF99">Cotton</th>
        <th rowspan="2" bgcolor="#99FF99">Nylon</th>
        <th rowspan="2" bgcolor="#99FF99">Polyester</th>
        <th rowspan="2" bgcolor="#99FF99">Acrylic</th>
        <th rowspan="2" bgcolor="#99FF99">Wool</th>
        <th rowspan="2" bgcolor="#99FF99">S.Staining</th>

        <!-- Water Fastness -->
        <th rowspan="2" bgcolor="#99FF99">C.Change</th>
        <th rowspan="2" bgcolor="#99FF99">Acetate</th>
        <th rowspan="2" bgcolor="#99FF99">Cotton</th>
        <th rowspan="2" bgcolor="#99FF99">Nylon</th>
        <th rowspan="2" bgcolor="#99FF99">Polyester</th>
        <th rowspan="2" bgcolor="#99FF99">Acrylic</th>
        <th rowspan="2" bgcolor="#99FF99">Wool</th>
        <th rowspan="2" bgcolor="#99FF99">S.Staining</th>

        <!-- Dye Transfer -->
        <th rowspan="2" bgcolor="#99FF99">Acetate</th>
        <th rowspan="2" bgcolor="#99FF99">Cotton</th>
        <th rowspan="2" bgcolor="#99FF99">Nylon</th>
        <th rowspan="2" bgcolor="#99FF99">Polyester</th>
        <th rowspan="2" bgcolor="#99FF99">Acrylic</th>
        <th rowspan="2" bgcolor="#99FF99">Wool</th>
        <th rowspan="2" bgcolor="#99FF99">C.Staining</th>
        <th rowspan="2" bgcolor="#99FF99">S.Staining</th>

        <!-- Crocking Fastness -->
        <th colspan="2" bgcolor="#99FF99">Length</th>
        <th colspan="2" bgcolor="#99FF99">Width</th>

        <!-- Light Fastness -->
        <th rowspan="2" bgcolor="#99FF99">C.Change(rating 1)</th>
        <th rowspan="2" bgcolor="#99FF99">C.Change(rating 2)</th>

        <!-- C.Migration Fastness -->
        <th rowspan="2" bgcolor="#99FF99">Suhu</th>
        <th rowspan="2" bgcolor="#99FF99">C.Change</th>
        <th rowspan="2" bgcolor="#99FF99">C.Staining</th>

        <!-- Bleeding -->
        <th rowspan="2" bgcolor="#99FF99">Watermark</th>
        <th rowspan="2" bgcolor="#99FF99">Root</th>
      </tr>

      <tr>
        <!-- Crocking Fastness -->
        <th bgcolor="#99FF99">Dry</th>
        <th bgcolor="#99FF99">Wet</th>
        <th bgcolor="#99FF99">Dry</th>
        <th bgcolor="#99FF99">Wet</th>
      </tr>
    </thead>
    <br>
    <tbody>
      <?php
      $no = 1;
      $sql = "select
                  *
                from
                  tbl_test_qc a
                left join tbl_tq_test b
                  on
                  a.id = b.id_nokk
                left join tbl_tq_test_2 c
                  on
                  b.id_nokk = c.id_nokk
                where
                  ";
      if (!empty($Awal) && !empty($Akhir)) {
        $sql .= " a.tgl_buat between '$Awal' AND '$Akhir' ";
      }
      if (!empty($no_counter) && !empty($Awal) && !empty($Akhir)) {
        $sql .= " AND no_counter = '$no_counter'";
      } else if(!empty($no_counter)) {
        $sql .= " no_counter = '$no_counter'";
      }
      echo $sql;

      $query = mysqli_query($conlab, $sql);

      while ($r = mysqli_fetch_array($query)) {
        ?>
        <tr>
          <td>
            <?php echo $no; ?>
          </td>
          <td align="center">
            <?php echo $r['suffix']; ?>
          </td>
          <td>
            <?php echo $r['no_counter']; ?>
          </td>
          <td>
            <?php echo $r['jenis_testing']; ?>
          </td>
          <td>
            <?php echo $r['treatment']; ?>
          </td>
          <td>
            <?php echo $r['buyer']; ?>
          </td>
          <td>
            <?php echo $r['no_warna']; ?>
          </td>
          <td>
            <?php echo $r['warna']; ?>
          </td>
          <td>
            <?php echo $r['no_item']; ?>
          </td>
          <td>
            <?php echo $r['jenis_kain']; ?>
          </td>
          <td>
            <?php echo $r['nama_personil_test']; ?>
          </td>
          <td>
            <?php
            if ($r['permintaan_testing'] != "") {
              echo $r['permintaan_testing'];
            } else {
              echo 'FULL TEST';
            }
            ?>
          </td>
          <td>
            <?php echo $r['created_by']; ?>
          </td>
          <td>
            <?php echo $r['sts_laborat']; ?>,
            <?php echo $r['sts']; ?>
          </td>
          <td>
            <?php echo $r['sts_qc']; ?>
          </td>
          <td>
            <?php echo $r['wash_temp']; ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['wash_colorchange']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['wash_acetate']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['wash_cotton']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['wash_nylon']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['wash_poly']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['wash_acrylic']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['wash_wool']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['wash_staining']); ?>
          </td>
          <td>
            <?php echo $r['wash_note']; ?>
          </td><!--10-->
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['acid_colorchange']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['acid_acetate']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['acid_cotton']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['acid_nylon']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['acid_poly']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['acid_acrylic']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['acid_wool']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['acid_staining']); ?>
          </td>
          <td>
            <?php echo $r['acid_note']; ?>
          </td><!--9-->
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['alkaline_colorchange']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['alkaline_acetate']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['alkaline_cotton']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['alkaline_nylon']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['alkaline_poly']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['alkaline_acrylic']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['alkaline_wool']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['alkaline_staining']); ?>
          </td>
          <td>
            <?php echo $r['alkaline_note']; ?>
          </td><!--9-->
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['water_colorchange']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['water_acetate']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['water_cotton']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['water_nylon']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['water_poly']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['water_acrylic']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['water_wool']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['water_staining']); ?>
          </td>
          <td>
            <?php echo $r['water_note']; ?>
          </td><!--9-->
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['dye_tf_acetate']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['dye_tf_cotton']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['dye_tf_nylon']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['dye_tf_poly']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['dye_tf_acrylic']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['dye_tf_wool']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['dye_tf_cstaining']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['dye_tf_sstaining']); ?>
          </td>
          <td>
            <?php echo $r['dye_tf_note']; ?>
          </td><!--9-->
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['crock_len1']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['crock_len2']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['crock_wid1']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['crock_wid2']); ?>
          </td>
          <td>
            <?php echo $r['crock_note']; ?>
          </td><!--5-->
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['phenolic_colorchange']); ?>
          </td>
          <td>
            <?php echo $r['phenolic_note']; ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['light_rating1']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['light_rating2']); ?>
          </td>
          <td>
            <?php echo $r['light_note']; ?>
          </td><!--3-->
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['cm_printing_colorchange']); ?>
          </td>
          <td>
            <?php echo $r['cm_printing_note']; ?>
          </td><!--2-->
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['cm_dye_temp']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['cm_dye_colorchange']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['cm_dye_stainingface']); ?>
          </td>
          <td>
            <?php echo $r['cm_dye_note']; ?>
          </td><!--4-->
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['light_pers_colorchange']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['light_pers_note']); ?>
          </td><!--2-->
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['saliva_staining']); ?>
          </td>
          <td>
            <?php echo $r['saliva_note']; ?>
          </td><!--2-->
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['bleeding']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['bleeding_root']); ?>
          </td>
          <td>
            <?php echo $r['bleeding_note']; ?>
          </td><!--2-->
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['chlorin']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['nchlorin1']); ?>
          </td>
          <td>
            <?php echo preg_replace('/(\d+-\d+)/', "'$1", $r['nchlorin2']); ?>
          </td>
          <td>
            <?php echo $r['chlorin_note']; ?>
          </td>
        </tr>

        <?php $no++;
      } ?>
    </tbody>
  </table>
</body>