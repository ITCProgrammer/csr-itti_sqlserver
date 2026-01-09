<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Summary-4Kategori-KPE-TotalKirim-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php
include "../../koneksi.php";
//--
$Awal = $_GET['awal'];
$Akhir = $_GET['akhir'];
$TotalKirim = $_GET['total'];
?>

<body>

    <strong>Periode:
        <?php echo $Awal; ?> s/d
        <?php echo $Akhir; ?>
    </strong><br>
    <table width="100%" border="1">
        <thead>
            <tr>
                <th bgcolor="#12C9F0">NO.</th>
                <th bgcolor="#12C9F0">KATEGORI</th>
                <th bgcolor="#12C9F0">JUMLAH KASUS</th>
                <th bgcolor="#12C9F0">QTY KELUHAN (KG)</th>
                <th bgcolor="#12C9F0">% DIBANDINGKAN TOTAL KELUHAN</th>
                <th bgcolor="#12C9F0">% DIBANDINGKAN TOTAL KIRIM</th>
            </tr>
        </thead>
        <?php 
        if($Awal!=""){
            $query4Kategori = mysqli_query($con, "SELECT
                                                        a.*,
                                                        sum(a.qty_claim) as qty_claim_x
                                                    FROM
                                                        tbl_aftersales_now a
                                                    WHERE
                                                        DATE_FORMAT(a.tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' AND (bprc IS NULL OR bprc = '')
                                                        GROUP BY
                                                        a.po,
                                                        a.no_hanger,
                                                        a.warna,
                                                        a.masalah_dominan,
                                                        a.qty_order
                                                    ORDER BY
                                                        a.tgl_buat ASC");

            $majorTemp = [];
            $sampleTemp = [];
            $repeatTemp = [];
            $generalTemp = [];

            while($row = mysqli_fetch_assoc($query4Kategori)) {
                $query4x = mysqli_query($con, "SELECT
                                                    b.pjg1
                                                FROM tbl_ganti_kain_now b
                                                WHERE b.id_nsp = '$row[id]' ");
                $rowx = mysqli_fetch_assoc($query4x);
                
                $row['pjg1'] = $rowx['pjg1'];

                if($row['pjg1'] >= 500) {
                    $majorTemp[] = $row;
                } elseif(in_array(substr($row['no_order'], 0, 3), ['SAM', 'SME'])) {
                    $sampleTemp[] = $row;
                } else {
                    $generalTemp[] = $row;
                }
            }

            $hanger_masalah_dominan = array_map(function($value) {
                return $value['no_hanger'].''.$value['masalah_dominan'];
            }, $generalTemp);

            $count_hanger_masalah_dominan = array_count_values($hanger_masalah_dominan);
            $group_hanger_masalah_dominan = array_keys(array_filter($count_hanger_masalah_dominan, fn($value) => $value > 1 ));

            foreach ($generalTemp as $key => $value) {
                $hmd = $value['no_hanger'].''.$value['masalah_dominan'];
                if(in_array($hmd, $group_hanger_masalah_dominan)){
                    $repeatTemp[] = $value;
                    unset($generalTemp[$key]);
                }
            }

            // JUMLAH KG
            $majorKG = 0;
            foreach ($majorTemp as $key => $value) {
                if(strtoupper($value['satuan_c']) == 'KG') {
                    $majorKG += $value['qty_claim_x'];
                }
            }

            $sampleKG = 0;
            foreach ($sampleTemp as $key => $value) {
                if(strtoupper($value['satuan_c']) == 'KG') {
                    $sampleKG += $value['qty_claim_x'];
                }
            }

            $repeatKG = 0;
            foreach ($repeatTemp as $key => $value) {
                if(strtoupper($value['satuan_c']) == 'KG') {
                    $repeatKG += $value['qty_claim_x'];
                }
            }

            $generalKG = 0;
            foreach ($generalTemp as $key => $value) {
                if(strtoupper($value['satuan_c']) == 'KG') {
                    $generalKG += $value['qty_claim_x'];
                }
            }

            // Total
            $totalJumlahKasus = count($majorTemp) + count($sampleTemp) + count($repeatTemp) + count($generalTemp);
            $totalKeluhan = $majorKG + $sampleKG + $repeatKG + $generalKG;
            $totalDibandingkanTotalKeluhan = number_format(($majorKG / $totalKeluhan) * 100, 2) + number_format(($sampleKG / $totalKeluhan) * 100, 2) + number_format(($repeatKG / $totalKeluhan) * 100, 2) + number_format(($generalKG / $totalKeluhan) * 100, 2);
        ?>
        <tbody>
            <tr valign="top">
                <td align="center">1</td>  
                <td align="left">MAJOR</td>
                <td align="right"><?= count($majorTemp) ?></td>
                <td align="right"><?= $majorKG ?></td>
                <td align="right"><?= $TotalKirim!="" ? number_format(($majorKG / $totalKeluhan) * 100, 2) . " %" : "0" ?></td>
                <td align="right"><?= $TotalKirim!="" ? number_format(($majorKG / $TotalKirim) * 100, 2) . " %" : "0" ?></td>
            </tr>
            <tr valign="top">
                <td align="center">2</td>  
                <td align="left">SAMPLE</td>
                <td align="right"><?= count($sampleTemp) ?></td>
                <td align="right"><?= $sampleKG ?></td>
                <td align="right"><?= $TotalKirim!="" ? number_format(($sampleKG / $totalKeluhan) * 100, 2) . " %" : "0" ?></td>
                <td align="right"><?= $TotalKirim!="" ? number_format(($sampleKG / $TotalKirim) * 100, 2) . " %" : "0" ?></td>
            </tr>
            <tr valign="top">
                <td align="center">3</td>  
                <td align="left">REPEAT</td>
                <td align="right"><?= count($repeatTemp) ?></td>
                <td align="right"><?= $repeatKG ?></td>
                <td align="right"><?= $TotalKirim!="" ? number_format(($repeatKG / $totalKeluhan) * 100, 2) . " %" : "0" ?></td>
                <td align="right"><?= $TotalKirim!="" ? number_format(($repeatKG / $TotalKirim) * 100, 2) . " %" : "0" ?></td>
            </tr>
            <tr valign="top">
                <td align="center">4</td>  
                <td align="left">GENERAL</td>
                <td align="right"><?= count($generalTemp) ?></td>
                <td align="right"><?= $generalKG ?></td>
                <td align="right"><?= $TotalKirim!="" ? number_format(($generalKG / $totalKeluhan) * 100, 2) . " %" : "0" ?></td>
                <td align="right"><?= $TotalKirim!="" ? number_format(($generalKG / $TotalKirim) * 100, 2) . " %" : "0" ?></td>
            </tr>
        <?php } ?>
        </tbody>
        <tfoot>
            <tr valign="top">
                <td align="right" colspan="2"><strong>TOTAL</strong></td>
                <td align="right" colspan="1"><strong><?php if($TotalKirim!=""){echo number_format($totalJumlahKasus,2);}else{echo "0";} ?></strong></td>
                <td align="right" colspan="1"><strong><?php if($TotalKirim!=""){echo number_format($totalKeluhan,2);}else{echo "0";} ?></strong></td>
                <td align="right" colspan="1"><strong><?php if($TotalKirim!=''){echo number_format($totalDibandingkanTotalKeluhan, 2)." %";}else{echo "0";} ?></strong></td>
            </tr>
            <tr valign="top">
                <td align="right" colspan="2"><strong>TOTAL KIRIM</strong></td>
                <td align="right" colspan="1"><strong><?php if($TotalKirim!=""){echo number_format($TotalKirim,2);}else{echo "0";} ?></strong></td>
            </tr>
        </tfoot>
    </table>
</body>