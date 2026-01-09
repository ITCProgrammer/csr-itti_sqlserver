<?PHP
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";

?>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Aftersales NOW</title>
</head>

<body>
  <?php
  $Order = isset($_POST['order']) ? $_POST['order'] : '';
  $PO = isset($_POST['po']) ? $_POST['po'] : '';
  $ArticleGrup = isset($_POST['ag']) ? $_POST['ag'] : '';
  $Pelanggan = isset($_POST['pelanggan']) ? $_POST['pelanggan'] : '';
  $ArticleCode = isset($_POST['ac']) ? $_POST['ac'] : '';
  $Warna = isset($_POST['warna']) ? $_POST['warna'] : '';
  $Prodorder = isset($_POST['prodorder']) ? $_POST['prodorder'] : '';
  $tgl_awal = isset($_POST['tgl_awal']) ? $_POST['tgl_awal'] : '';
  $tgl_akhir = isset($_POST['tgl_akhir']) ? $_POST['tgl_akhir'] : '';
  ?>
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"> Filter Data Pengiriman NOW</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
      <div class="box-body">
        <div class="form-group">
          <div class="col-sm-2">
            <input name="tgl_awal" type="date" class="form-control pull-right" placeholder="Tgl Awal Pengiriman"
              value="<?php echo $tgl_awal; ?>" />
          </div>
          <div class="col-sm-2">
            <input name="tgl_akhir" type="date" class="form-control pull-right" placeholder="Tgl Akhir Pengiriman"
              value="<?php echo $tgl_akhir; ?>" />
          </div>

          <!-- /.input group -->
        </div>


        <div class="form-group">
          <div class="col-sm-2">
            <input name="po" type="text" class="form-control pull-right" id="po" placeholder="No PO"
              value="<?php echo $PO; ?>" />
          </div>
          <div class="col-sm-2">
            <input name="order" type="text" class="form-control pull-right" id="order" placeholder="No Order"
              value="<?php echo $Order; ?>" />
          </div>
          <div class="col-sm-2">
            <input name="ag" type="text" class="form-control pull-right" id="ag" placeholder="Article Group"
              value="<?php echo $ArticleGrup; ?>" />
          </div>
          <div class="col-sm-2">
            <input name="pelanggan" type="text" class="form-control pull-right" id="pelanggan" placeholder="Pelanggan"
              value="<?php echo $Pelanggan; ?>" />
          </div>
          <!-- /.input group -->
        </div>
        <div class="form-group">
          <div class="col-sm-2">
            <input name="ac" type="text" class="form-control pull-right" id="ac" placeholder="Article Code"
              value="<?php echo $ArticleCode; ?>" />
          </div>

          <div class="col-sm-3">
            <input name="warna" type="text" class="form-control pull-right" id="warna" placeholder="Warna"
              value="<?php echo $Warna; ?>" />
          </div>
          <div class="col-sm-2">
            <input name="prodorder" type="text" class="form-control pull-right" id="prodorder" placeholder="Prod. Order"
              value="<?php echo $Prodorder; ?>" />
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <div class="col-sm-2">
          <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="save"
            style="width: 60%">Search <i class="fa fa-search"></i></button>
        </div>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>

  <?php if (isset($_POST['save'])) { ?>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Data Pengiriman NOW</h3><br>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
              <thead class="bg-blue">
                <tr>
                  <th>
                    <div align="center">Tgl Kirim</div>
                  </th>
                  <th>
                    <div align="center">No SJ</div>
                  </th>
                  <th>
                    <div align="center">No PO</div>
                  </th>
                  <th>
                    <div align="center">No Order</div>
                  </th>
                  <th>
                    <div align="center">Hanger</div>
                  </th>
                  <th>
                    <div align="center">Roll</div>
                  </th>
                  <th>
                    <div align="center">KG</div>
                  </th>
                  <th>
                    <div align="center">Yd/Mtr</div>
                  </th>
                  <th>
                    <div align="center">Production Order</div>
                  </th>
                  <th>
                    <div align="center">Warna</div>
                  </th>
                  <th>
                    <div align="center">Note</div>
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;

                if ($tgl_awal != '') {
                  $tgl_awal = $_POST['tgl_awal'];
                } else {
                  $tgl_awal = '';
                }
                ;

                if ($tgl_akhir != '') {
                  $tgl_akhir = $_POST['tgl_akhir'];
                } else {
                  $tgl_akhir = '';
                }

                // Filter untuk tanggal
                if (!empty($tgl_akhir) && !empty($tgl_awal)) {
                  $where_date = "AND i.GOODSISSUEDATE BETWEEN '$tgl_awal' AND '$tgl_akhir'";
                } else if (!empty($tgl_awal) && empty($tgl_akhir)) {
                  $where_date = "AND i.GOODSISSUEDATE = '$tgl_awal'";
                } else '';
                // Filter Untuk PO
                if (!empty($PO)) {
                  $where_po = "AND i.PO_NUMBER LIKE '%$PO%'";
                } else '';
                // Filter Untuk NO ORDER
                if (!empty($Order)) {
                  $where_order = "AND i.DLVSALORDERLINESALESORDERCODE = '$Order'";
                } else
                  '';
                // Filter Untuk Aticle
                if (!empty($ArticleGrup)) {
                  $where_articleGroup = "AND i.SUBCODE02 = '$ArticleGrup'";
                } else
                  '';
                // Filter Untuk Aticle
                if (!empty($ArticleCode)) {
                  $where_articleCode = "AND i.SUBCODE03 = '$ArticleCode'";
                } else
                  '';
                // Filter Untuk Pelanggan
                if (!empty($Pelanggan)) {
                  $where_pelanggan = "AND i.LEGALNAME1 LIKE '%$Pelanggan%'";
                } else
                  '';
                // Filter Untuk Warna
                if (!empty($Warna)) {
                  $where_warna = "AND i2.WARNA LIKE '%$Warna%'";
                } else
                  '';
                // Filter Untuk Prod Order
                if (!empty($Prodorder)) {
                  $where_Prodorder = "AND iasp.LOTCODE LIKE '%$Prodorder%'";
                } else
                  '';

                $sqlDB2 = "SELECT
                            DISTINCT 
                            LISTAGG(DISTINCT TRIM(i.SUBCODE05), ', ') AS NO_WARNA,
                            i.PROVISIONALCODE,
                            TRIM(i.PRICEUNITOFMEASURECODE) AS PRICEUNITOFMEASURECODE,
                            i.DEFINITIVECOUNTERCODE,
                            i.DEFINITIVEDOCUMENTDATE,
                            i.ORDERPARTNERBRANDCODE,
                            TRIM(i.SUBCODE02) AS SUBCODE02,
                            TRIM(i.SUBCODE03) AS SUBCODE03,
                            TRIM(i.SUBCODE05) AS SUBCODE05,
                            i.PO_NUMBER AS PO_NUMBER,
                            i.ITEMDESCRIPTION AS JENIS_KAIN,
                            LISTAGG(DISTINCT TRIM(iasp.WAREHOUSELOCATIONCODE), ', ') AS LOKASI,
                            i.GOODSISSUEDATE,
                            i.ORDPRNCUSTOMERSUPPLIERCODE,
                            CASE 
                                WHEN i.PAYMENTMETHODCODE <> 'FOC' THEN ''
                                ELSE i.PAYMENTMETHODCODE
                            END AS PAYMENTMETHODCODE,
                            i.ITEMTYPEAFICODE,
                            i.DLVSALORDERLINESALESORDERCODE AS DLVSALORDERLINESALESORDERCODE,
                            i.DLVSALESORDERLINEORDERLINE AS DLVSALESORDERLINEORDERLINE,
                            LISTAGG(DISTINCT TRIM(iasp.LOTCODE), ', ' ) AS LOTCODE,
                            LISTAGG(DISTINCT ''''|| TRIM(iasp.LOTCODE) ||'''', ', ' ) AS LOTCODE2,
                            i2.WARNA AS WARNA,
                            i.LEGALNAME1,
                            i.CODE AS CODE
                        FROM
                            ITXVIEW_SURATJALAN_PPC_FOR_POSELESAI i
                        LEFT JOIN ITXVIEW_ALLOCATION_SURATJALAN_PPC iasp ON
                            iasp.CODE = i.CODE
                        LEFT JOIN ITXVIEWCOLOR i2 ON
                            i2.ITEMTYPECODE = i.ITEMTYPEAFICODE
                            AND i2.SUBCODE01 = i.SUBCODE01
                            AND i2.SUBCODE02 = i.SUBCODE02
                            AND i2.SUBCODE03 = i.SUBCODE03
                            AND i2.SUBCODE04 = i.SUBCODE04
                            AND i2.SUBCODE05 = i.SUBCODE05
                            AND i2.SUBCODE06 = i.SUBCODE06
                            AND i2.SUBCODE07 = i.SUBCODE07
                            AND i2.SUBCODE08 = i.SUBCODE08
                            AND i2.SUBCODE09 = i.SUBCODE09
                            AND i2.SUBCODE10 = i.SUBCODE10
                        WHERE
                            NOT (SUBSTR(i.DLVSALORDERLINESALESORDERCODE, 1,3) = 'CAP' AND (i.ITEMTYPEAFICODE = 'KFF' OR i.ITEMTYPEAFICODE = 'KGF' OR i.ITEMTYPEAFICODE = 'CAP'))
                            AND i.DOCUMENTTYPETYPE = 05 
                            AND NOT i.CODE IS NULL 
                            AND i.PROGRESSSTATUS_SALDOC = 2
                            $where_date 
                            $where_po
                            $where_order
                            $where_warna
                            $where_articleGroup
                            $where_articleCode
                            $where_pelanggan
                            $where_Prodorder
                        GROUP BY
                            i.SUBCODE02,
	                          i.SUBCODE03,
	                          i.SUBCODE05,
                            i.PROVISIONALCODE,
                            i.PRICEUNITOFMEASURECODE,
                            i.DEFINITIVEDOCUMENTDATE,
                            i.ORDERPARTNERBRANDCODE,
                            i.PO_NUMBER,
                            i.PROJECTCODE,
                            i.GOODSISSUEDATE,
                            i.ORDPRNCUSTOMERSUPPLIERCODE,
                            i.PAYMENTMETHODCODE,
                            i.PO_NUMBER,
                            i.ITEMTYPEAFICODE,
                            i.DLVSALORDERLINESALESORDERCODE,
                            i.DLVSALESORDERLINEORDERLINE,
                            i.ITEMDESCRIPTION,
                            i.DEFINITIVECOUNTERCODE,
                            i2.WARNA,
                            i.LEGALNAME1,
                            i.CODE
                            ORDER BY
                            i.PROVISIONALCODE ASC";
                      
                $stmt = db2_exec($conn1, $sqlDB2, array('cursor' => DB2_SCROLLABLE));
                while ($row1 = db2_fetch_assoc($stmt)) {
                  $q_ket_foc = db2_exec($conn1, "SELECT 
                                                      COUNT(QUALITYREASONCODE) AS ROLL,
                                                      SUM(FOC_KG) AS KG,
                                                      SUM(FOC_YARDMETER) AS YARD_MTR,
                                                      KET_YARDMETER,
                                                      ALLOCATIONCODE
                                                  FROM
                                                      ITXVIEW_SURATJALAN_EXIM2A
                                                  WHERE 
                                                      QUALITYREASONCODE = 'FOC'
                                                      AND PROVISIONALCODE = '$row1[PROVISIONALCODE]'
                                                      AND ALLOCATIONCODE = '$row1[CODE]'
                                                  GROUP BY 
                                                      KET_YARDMETER,
                                                      ALLOCATIONCODE");
                  $d_ket_foc = db2_fetch_assoc($q_ket_foc); ?>
                  <?php if ($d_ket_foc['ROLL'] > 0 and $d_ket_foc['KG'] > 0 and $d_ket_foc['YARD_MTR'] > 0): ?>
                  <tr bgcolor="<?php echo $bgcolor; ?>">
                    <td align="center"><?php echo $row1['GOODSISSUEDATE']; ?></td>
                    <td align="center"><a href="#" id='<?php echo $row1['PROVISIONALCODE']; ?>'
                        nowarna='<?php echo $row1['SUBCODE05']; ?>'
                        project='<?php echo $row1['DLVSALORDERLINESALESORDERCODE']; ?>'
                        lotcode='<?php echo $row1['LOTCODE']; ?>' 
                        foc='<?= trim($row1['NOTE'] ?: '') ?>'
                        class="detail_kirim_kain">
                        <?php echo $row1['PROVISIONALCODE']; ?></a></td>
                    <td align="center"><?php echo $row1['PO_NUMBER']; ?></td>
                    <td align="center"><?php echo $row1['DLVSALORDERLINESALESORDERCODE']; ?></td>
                    <td align="center"><?php echo $row1['SUBCODE02'].$row1['SUBCODE03']; ?></td>
                    <td align="center"><?php echo $d_ket_foc['ROLL']; ?></td>
                    <td align="center"><?php echo str_replace(",", "", number_format($d_ket_foc['KG'], 2)) ?></td>
                    <td align="center"><?php echo str_replace(",", "", number_format($d_ket_foc['YARD_MTR'], 2)) ?></td>
                    <td align="center"><?php echo $row1['LOTCODE']; ?></td>
                    <td align="center"><?php echo $row1['WARNA']; ?></td>
                    <td>FOC</td>
                  </tr>

                  <!-- Perhitungan roll baru -->
                  <?php
                    if (in_array($row1['DEFINITIVECOUNTERCODE'], array('CESDEF', 'DREDEF', 'DSEDEF', 'EXDPROV', 'EXPPROV', 'GSEPROV', 'CESPROV', 'DREPROV', 'EXDDEF', 'EXPDEF', 'GSEDEF', 'PSEPROV'))) {
                      $q_roll = db2_exec($conn1, "SELECT
                                                COUNT(ise.COUNTROLL) AS ROLL,
                                                SUM(ise.QTY_KG) AS QTY_SJ_KG,
                                                SUM(ise.QTY_YARDMETER) AS QTY_SJ_YARD,
                                                inpe.PROJECT,
                                                ise.ADDRESSEE,
                                                ise.BRAND_NM,
                                                ise.ALLOCATIONCODE
                                            FROM
                                                ITXVIEW_SURATJALAN_EXIM2A ise 
                                            LEFT JOIN ITXVIEW_NO_PROJECTS_EXIM inpe ON inpe.PROVISIONALCODE = ise.PROVISIONALCODE 
                                            WHERE 
                                                ise.PROVISIONALCODE = '$row1[PROVISIONALCODE]'
                                                AND ise.ALLOCATIONCODE = '$row1[CODE]'
                                                -- AND (ise.QUALITYREASONCODE <> 'FOC' OR ise.QUALITYREASONCODE IS NULL)
                                            GROUP BY 
                                                inpe.PROJECT,ise.ADDRESSEE,ise.BRAND_NM,ise.ALLOCATIONCODE
                                                ");
                      $d_roll = db2_fetch_assoc($q_roll);
                      $q_rollfoc = db2_exec($conn1, "SELECT
                                                        COUNT(ise.COUNTROLL) AS ROLL,
                                                        SUM(ise.QTY_KG) AS QTY_SJ_KG,
                                                        SUM(ise.QTY_YARDMETER) AS QTY_SJ_YARD,
                                                        inpe.PROJECT,
                                                        ise.ADDRESSEE,
                                                        ise.BRAND_NM,
                                                        ise.ALLOCATIONCODE
                                                    FROM
                                                        ITXVIEW_SURATJALAN_EXIM2A ise 
                                                    LEFT JOIN ITXVIEW_NO_PROJECTS_EXIM inpe ON inpe.PROVISIONALCODE = ise.PROVISIONALCODE 
                                                    WHERE 
                                                        ise.PROVISIONALCODE = '$row1[PROVISIONALCODE]'
                                                        AND ise.ALLOCATIONCODE = '$row1[CODE]'
                                                        AND ise.QUALITYREASONCODE = 'FOC' 
                                                    GROUP BY 
                                                        inpe.PROJECT,ise.ADDRESSEE,ise.BRAND_NM,ise.ALLOCATIONCODE
                                                        ");
                      $d_rollfoc = db2_fetch_assoc($q_rollfoc);
                      $roll = $d_roll['ROLL'] - $d_rollfoc['ROLL']; // MENGHITUNG JIKA FOC SEBAGIAN, MAKA ROLL UNTUK FOC TIDAK PERLU DIPISAH DARI KESELURUHAN
                    } else {
                      $q_roll = db2_exec($conn1, "SELECT COUNT(CODE) AS ROLL,
                                                          SUM(BASEPRIMARYQUANTITY) AS QTY_SJ_KG,
                                                          SUM(BASESECONDARYQUANTITY) AS QTY_SJ_YARD,
                                                          LISTAGG(TRIM(LOTCODE), ', ') AS LOTCODE
                                                  FROM 
                                                      ITXVIEWALLOCATION0 
                                                  WHERE 
                                                      CODE = '$row1[CODE]' AND LOTCODE IN ($row1[LOTCODE2])");
                      $d_roll = db2_fetch_assoc($q_roll);
                      $roll = $d_roll['ROLL'];
                    }
                    ?>
                    <!-- Kondisi pertama -->
                    <?php if ($roll > 0): ?>
                    <tr bgcolor="<?php echo $bgcolor; ?>">
                    <td align="center"><?php echo $row1['GOODSISSUEDATE']; ?></td>
                    <td align="center"><a href="#" id='<?php echo $row1['PROVISIONALCODE']; ?>'
                        nowarna='<?php echo $row1['SUBCODE05']; ?>'
                        project='<?php echo $row1['DLVSALORDERLINESALESORDERCODE']; ?>'
                        lotcode='<?php echo $row1['LOTCODE']; ?>' 
                        foc='<?= trim($row1['NOTE'] ?: '') ?>'
                        class="detail_kirim_kain">
                        <?php echo $row1['PROVISIONALCODE']; ?></a></td>
                    <td align="center"><?php echo $row1['PO_NUMBER']; ?></td>
                    <td align="center"><?php echo $row1['DLVSALORDERLINESALESORDERCODE']; ?></td>
                    <td align="center"><?php echo $row1['SUBCODE02'].$row1['SUBCODE03']; ?></td>
                    <td align="center"><?php echo $roll; ?></td>
                    <td align="center"><?php echo str_replace(",", "", number_format($d_roll['QTY_SJ_KG'], 2)) ?></td>
                    <td align="center"><?php
                          if ($row1['PRICEUNITOFMEASURECODE'] == 'm') {
                            echo str_replace(",", "", round(number_format($d_roll['QTY_SJ_YARD'], 2) * 0.9144, 2));
                          } else {
                            echo str_replace(",", "", number_format($d_roll['QTY_SJ_YARD'], 2));
                          }
                          ?></td>
                    <td align="center"><?php echo $row1['LOTCODE']; ?></td>
                    <td align="center"><?php echo $row1['WARNA']; ?></td>
                    <td><?php echo $row1['PAYMENTMETHODCODE']; ?></td>
                  </tr>
                    <?php endif; ?>
                    <!-- Kondisi lagi -->
                    <?php else: ?>
                      <tr bgcolor="<?php echo $bgcolor; ?>">
                        <td align="center"><?php echo $row1['GOODSISSUEDATE']; ?></td>
                        <td align="center"><a href="#" id='<?php echo $row1['PROVISIONALCODE']; ?>'
                            nowarna='<?php echo $row1['SUBCODE05']; ?>' project='<?php echo $row1['DLVSALORDERLINESALESORDERCODE']; ?>'
                            lotcode='<?php echo $row1['LOTCODE']; ?>' foc='<?= trim($row1['NOTE'] ?: '') ?>' class="detail_kirim_kain">
                            <?php echo $row1['PROVISIONALCODE']; ?></a></td>
                        <td align="center"><?php echo $row1['PO_NUMBER']; ?></td>
                        <td align="center"><?php echo $row1['DLVSALORDERLINESALESORDERCODE']; ?></td>
                        <td align="center"><?php echo $row1['SUBCODE02'].$row1['SUBCODE03']; ?></td>
                        <td align="center"><?php
                          if (in_array($row1['DEFINITIVECOUNTERCODE'], array('CESDEF', 'DREDEF', 'DSEDEF', 'EXDPROV', 'EXPPROV', 'GSEPROV', 'CESPROV', 'DREPROV', 'EXDDEF', 'EXPDEF', 'GSEDEF', 'PSEPROV'))) {
                            $q_roll = db2_exec($conn1, "SELECT
                                                            COUNT(ise.COUNTROLL) AS ROLL,
                                                            SUM(ise.QTY_KG) AS QTY_SJ_KG,
                                                            SUM(ise.QTY_YARDMETER) AS QTY_SJ_YARD,
                                                            inpe.PROJECT,
                                                            ise.ADDRESSEE,
                                                            ise.BRAND_NM,
                                                            ise.ALLOCATIONCODE
                                                        FROM
                                                            ITXVIEW_SURATJALAN_EXIM2A ise 
                                                        LEFT JOIN ITXVIEW_NO_PROJECTS_EXIM inpe ON inpe.PROVISIONALCODE = ise.PROVISIONALCODE 
                                                        WHERE 
                                                            ise.PROVISIONALCODE = '$row1[PROVISIONALCODE]'
                                                            AND ise.ALLOCATIONCODE = '$row1[CODE]'
                                                        GROUP BY 
                                                            inpe.PROJECT,ise.ADDRESSEE,ise.BRAND_NM,ise.ALLOCATIONCODE");
                            $d_roll = db2_fetch_assoc($q_roll);
                            echo $d_roll['ROLL']; // MENGHITUNG JIKA FOC SEBAGIAN, MAKA ROLL UNTUK FOC TIDAK PERLU DIPISAH DARI KESELURUHAN
                          } else {
                            $q_roll = db2_exec($conn1, "SELECT COUNT(CODE) AS ROLL,
                                                                SUM(BASEPRIMARYQUANTITY) AS QTY_SJ_KG,
                                                                SUM(BASESECONDARYQUANTITY) AS QTY_SJ_YARD,
                                                                LISTAGG(TRIM(LOTCODE), ', ') AS LOTCODE
                                                        FROM 
                                                            ITXVIEWALLOCATION0 
                                                        WHERE 
                                                            CODE = '$row1[CODE]' AND LOTCODE IN ($row1[LOTCODE2])");
                            $d_roll = db2_fetch_assoc($q_roll);
                            echo $d_roll['ROLL'];
                          }
                          ?></td>
                        <td align="center"><?php echo str_replace(",", "", number_format($d_roll['QTY_SJ_KG'], 2)) ?></td>
                        <td align="center"><?php
                        if ($row1['PRICEUNITOFMEASURECODE'] == 'm') {
                          echo str_replace(",", "", round(number_format($d_roll['QTY_SJ_YARD'], 2) * 0.9144, 2));
                        } else {
                          echo str_replace(",", "", number_format($d_roll['QTY_SJ_YARD'], 2));
                        }
                        ?></td>
                        <td align="center"><?php echo $row1['LOTCODE']; ?></td>
                        <td align="center"><?php echo $row1['WARNA']; ?></td>
                        <td><?php echo $row1['PAYMENTMETHODCODE']; ?></td>
                      </tr>
                  <?php endif; ?>

                  <?php $no++;
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <div class="modal fade" id="modal_del" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content" style="margin-top:100px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" style="text-align:center;">Are you sure to delete all data ?</h4>
        </div>

        <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
          <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
          <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <div id="StsGKEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true"></div>
  <div id="DetailKirimKain" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true"></div>
  <script type="text/javascript">
    function confirm_delete(delete_url) {
      $('#modal_del').modal('show', { backdrop: 'static' });
      document.getElementById('delete_link').setAttribute('href', delete_url);
    }
  </script>
  <script>
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
    });

  </script>
</body>

</html>