<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
$no_po = isset($_GET['no_po']) ? $_GET['no_po'] : '';
$no_hanger = isset($_GET['no_hanger']) ? $_GET['no_hanger'] : '';
$no_warna = isset($_GET['no_warna']) ? $_GET['no_warna'] : '';
?>
<div class="modal-dialog modal-lg" style="max-width:95vw;">
    <div class="modal-content">
        <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Data</h4>
            </div>
            <div class="modal-body">
                <h5><strong>No PO : <?php echo htmlspecialchars($no_po); ?></strong></h5>
                <h5><strong>No Hanger : <?php echo htmlspecialchars($no_hanger); ?></strong></h5>
                <h5><strong>No Warna : <?php echo htmlspecialchars($no_warna); ?></strong></h5>
                <div style="position: absolute; top: 20px; right: 30px;">
                    <a href="pages/detail_bonpenghubung_full.php?no_po=<?php echo urlencode($no_po); ?>&no_hanger=<?php echo urlencode($no_hanger); ?>&no_warna=<?php echo urlencode($no_warna); ?>" 
                       target="_blank" 
                       class="btn btn-info" 
                       style="color: #fff;">
                         <i class="fa fa-print"></i> Cetak
                    </a>
                </div>
                <div style="overflow-x:auto;">
                <table id="example9" class="table table-bordered table-hover table-striped" width="100%">
                    <thead>
                        <tr style="background:#dbe6f3;">
                            <th rowspan="2" style="vertical-align:middle;text-align:center;">No</th>
                            <th rowspan="2" style="vertical-align:middle;text-align:center;">Status</th>
                            <th rowspan="2" style="vertical-align:middle;text-align:center;">Project</th>
                            <th colspan="2" style="vertical-align:middle;text-align:center;">Qty FOC</th>
                            <th colspan="2" style="vertical-align:middle;text-align:center;">Estimasi FOC</th>
                            <th rowspan="2" style="vertical-align:middle;text-align:center;">Lot-Legacy</th>
                            <th rowspan="2" style="vertical-align:middle;text-align:center;">Lot</th>
                            <th rowspan="2" style="vertical-align:middle;text-align:center;">Demand</th>
                            <th rowspan="2" style="vertical-align:middle;text-align:center;">Issue</th>
                            <th rowspan="2" style="vertical-align:middle;text-align:center;">Notes</th>
                            <th rowspan="2" style="vertical-align:middle;text-align:center;">Responsibility</th>
                            <th rowspan="2" style="vertical-align:middle;text-align:center;">Inspection Report</th>
                        </tr>
                        <tr style="background:#dbe6f3;">
                             <th style="vertical-align:middle;text-align:center;">Kg</th>
                            <th style="vertical-align:middle;text-align:center;">Yard</th>
                            <th style="vertical-align:middle;text-align:center;">Kg</th>
                            <th style="vertical-align:middle;text-align:center;">Yard</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                         $sqldtl = "SELECT
                            tq.*,
                            GROUP_CONCAT(DISTINCT b.no_ncp_gabungan SEPARATOR ', ') AS no_ncp,
                            GROUP_CONCAT(DISTINCT b.masalah_dominan SEPARATOR ', ') AS masalah_utama,
                            GROUP_CONCAT(DISTINCT b.akar_masalah SEPARATOR ', ') AS akar_masalah,
                            GROUP_CONCAT(DISTINCT b.solusi_panjang SEPARATOR ', ') AS solusi_panjang,
                            tli.qty_loss AS qty_sisa,
                            tli.satuan AS satuan_sisa,
                            c.masalah_dominan,
                            c.ket
                        FROM
                            tbl_qcf tq
                            LEFT JOIN tbl_lap_inspeksi tli ON tq.nodemand = tli.nodemand AND tq.no_order = tli.no_order
                            LEFT JOIN tbl_ncp_qcf_now b ON tq.nodemand = b.nodemand
                            LEFT JOIN tbl_aftersales_now c ON c.nodemand = tq.nodemand AND c.nokk = tq.nokk
                        WHERE
                            tq.sts_pbon != '10'
                            AND (
                                tq.penghubung_masalah != ''
                                OR tq.penghubung_keterangan != ''
                                OR tq.penghubung_roll1 != ''
                                OR tq.penghubung_roll2 != ''
                                OR tq.penghubung_roll3 != ''
                                OR tq.penghubung_dep != ''
                                OR tq.penghubung_dep_persen != ''
                            )
                            AND tq.no_po = '" . mysqli_real_escape_string($con, $no_po) . "'
                            AND tq.no_hanger = '" . mysqli_real_escape_string($con, $no_hanger) . "'
                            AND tq.no_warna = '" . mysqli_real_escape_string($con, $no_warna) . "'
                        GROUP BY
                            tq.no_order,
                            tq.no_po,
                            tq.no_hanger,
                            tq.no_item,
                            tq.warna,
                            tq.pelanggan,
                            tq.tgl_masuk,
                            tq.nodemand
                        ";
                        $stmt = mysqli_query($con, $sqldtl);
                        while($r = mysqli_fetch_array($stmt)){
                        ?>
                        <tr>
                            <td align="center"><?php echo $no;?></td>
                            <td align="center"><?php $rsts= mysqli_query($con,"SELECT * FROM tbl_bonpenghubung_mail WHERE nodemand='$r[nodemand]'");
                                $dtsts = mysqli_fetch_assoc($rsts);
                                if($dtsts['status_approve']==1){
                                echo 'APPROVE OLEH : '.$dtsts['approve_mkt'];
                                }else if($dtsts['status_approve']==99){
                                echo 'REJECT OLEH : '.$dtsts['approve_mkt'];
                                }else if($dtsts['status_approve']==2){
                                echo 'CLOSED OLEH : '.$dtsts['closed_ppc'];
                                } else {
                                echo '';
                                }?></td>
                            <td align="center"><?php echo htmlspecialchars($r['no_order']); // Project ?></td>
                            <td align="center"><?php echo $r['berat_extra'];?></td> <!-- Kg FOC -->
                            <td align="center"><?php echo $r['panjang_extra'];?></td> <!-- Yard FOC -->
                            <td align="center"><?php echo $r['estimasi'];?></td>
                            <td align="center"><?php echo $r['panjang_estimasi'];?></td>
                            <td align="center"><?php echo $r['lot_legacy']; // Lot-Legacy ?></td>
                            <td align="center"><?php echo $r['lot']; // Lot ?></td>
                            <td align="center"><?php echo $r['nodemand']; // Demand ?></td>
                            <td align="center"><?php echo $r['penghubung_masalah']; // Issue ?></td>
                            <td align="center"><?php echo $r['penghubung_keterangan']; // Notes ?></td>
                            <td align="center"><?php echo $r['penghubung_dep'].$r['penghubung_dep_persen']; // Responsibility, pastikan field ini ada di query jika diperlukan ?></td>
                            <td>
                                 <a style="color: #E95D4E; font-size:10px; font-family: Microsoft Sans Serif;" href="pages/cetak/cetak_inspectpackingreport.php?demand=<?= $r['nodemand']; ?>&ispacking=true" target="_blank">Inspect Report <i class="fa fa-link"></i></a>
                            </td>
                        </tr>
                        <?php $no++;}?>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>
<script>
  $(function () {
    $('#example9').DataTable({
      'paging': true,
    })
  });
</script>