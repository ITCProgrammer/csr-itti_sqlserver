<?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=lapncpharian_DYEING-" . substr($_GET['awal'], 0, 10) . ".xls"); //ganti nama sesuai keperluan
    header("Pragma: no-cache");
    header("Expires: 0");
    //disini script laporan anda
?>
<?php
    include "../../koneksi.php";
    include "../../tgl_indo.php";
    //--
    // $idkk = $_REQUEST['idkk'];
    // $act = $_GET['g'];
    //-
    $Awal = $_GET['awal'];
    $Akhir = $_GET['akhir'];
    $Dept = $_GET['dept'];
    $Kategori = $_GET['kategori'];
    $Cancel = $_GET['cancel'];
    $Rev2A = $_GET['chkrev'];
    $Cek_datalama = $_GET['datalama'];

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


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Cetak Harian NCP</title>
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
                            <td width="3%" align="center">&nbsp;</td>
                            <td width="3%" align="center">&nbsp;</td>
                            <td width="94%" align="center" valign="middle"><strong>
                                    <font size="+1">LAPORAN NCP BULANAN DYEING</font>
                                </strong></td>
                        </tr>
                    </table>
                    <table width="100%" border="0">
                        <tbody>
                            <tr>
                                <td width="90%">&nbsp;</td>
                                <td width="10%">Dept : <?php echo $_GET['dept']; ?><br />
                                    Kategori :
                                    <?php if ($_GET['kategori'] == "gerobak") {
                                        echo "Kain diGerobak";
                                    } else if ($_GET['kategori'] == "hitung") {
                                        echo "NCP diHitung";
                                    } else if ($_GET['kategori'] == "tidakhitung") {
                                        echo "NCP Tidak Hitung";
                                    } else {
                                        echo "ALL";
                                    } ?>
                                    <br />
                                    Periode : <?php echo tanggal_indo($_GET['awal']); ?> s/d <?php echo tanggal_indo($_GET['akhir']); ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </thead>
        <tr>
            <td>
                <table width="100%" border="1" class="table-list1">
                    <tbody>
                        <tr align="center">
                            <td>No</td>
                            <td>Tanggal</td>
                            <td>No. NCP</td>
                            <td>Langganan</td>
                            <td>Order</td>
                            <td>No Warna</td>
                            <td>Warna</td>
                            <td>Lot</td>
                            <td>Rol</td>
                            <td>Quantity</td>
                            <td>Hanger</td>
                            <td>Jenis NCP/Masalah</td>
                            <td>Rincian NCP/Masalah Utama</td>
                            <td>No Mesin</td>
                            <td>Akar Masalah</td>
                            <td>Solusi Jangka Panjang</td>
                            <td>Keterangan</td>
                            <td>K.R</td>
                            <td>R.B/R.L/R.S</td>
                            <td>Status Resep</td>
                            <td>Analisa Resep</td>
                            <td>NCP Dihitung</td>
                            <td>Status</td>
                            <td>NCP Proses / Proses</td>
                            <td>Production Order</td>
                            <td>Production Demand</td>
                            <td>Original PD Code</td>
                            <td>Suffix</td>
                            <td>Celup Dyeing</td>
                            <td>Oven</td>
                            <td>Fin</td>
                            <td>Compact</td>
                        </tr>
                        <?php
                            $no = 1;
                            if ($Dept == "ALL") {
                                $Wdept = " ";
                            } else {
                                $Wdept = " dept='$Dept' AND ";
                            }
                            if ($Kategori == "ALL") {
                                $Wkategori = " ";
                            } else if ($Kategori == "hitung") {
                                $Wkategori = " ncp_hitung='ya' AND ";
                            } else if ($Kategori == "gerobak") {
                                $Wkategori = " kain_gerobak='ya' AND ";
                            } else if ($Kategori == "tidakhitung") {
                                $Wkategori = " ncp_hitung='tidak' AND ";
                            }
                            if ($Cancel != "1") {
                                $sts = " AND NOT status='Cancel' ";
                            } else {
                                $sts = "  ";
                            }
                            if ($Rev2A == "1") {
                                $WR2A = " and revisi > 1 and status='belum ok' ";
                                //$FR2A= " , MAX(revisi) as rec ";
                                $FR2A = " ";
                                $GR2A = " ORDER BY revisi DESC ";
                                //$GR2A= " GROUP BY revisi, no_ncp ORDER BY revisi DESC";
                            } else {
                                $WR2A = " ";
                                $FR2A = " ";
                                $GR2A = " ORDER BY id ASC ";
                            }

                            if($Cek_datalama == "1"){
                                $tabel_ncp = 'tbl_ncp_qcf_new';
                            }else{
                                $tabel_ncp = 'tbl_ncp_qcf_now';
                            }

                            $qry1 = mysqli_query($con, "SELECT * $FR2A FROM $tabel_ncp WHERE $Wdept $Wkategori DATE_FORMAT( tgl_buat, '%Y-%m-%d' ) BETWEEN '$Awal' AND '$Akhir' $sts $WR2A $GR2A");
                            while ($row1 = mysqli_fetch_array($qry1)) {
                                $sql_ori_pd_code  = db2_exec($conn2, "SELECT p.CODE, SUBSTRING(a.VALUESTRING, 5) AS VALUESTRING 
                                                                        FROM
                                                                        PRODUCTIONDEMAND p
                                                                        LEFT JOIN ADSTORAGE a ON a.UNIQUEID = p.ABSUNIQUEID AND a.FIELDNAME = 'OriginalPDCode'
                                                                        WHERE p.CODE = '$row1[nodemand]'");
                                $dt_ori_pd_code    = db2_fetch_assoc($sql_ori_pd_code);

                                if(!empty($dt_ori_pd_code['VALUESTRING'])){
                                    $where_oriPDCode0    = "a.nodemand = '$dt_ori_pd_code[VALUESTRING]'";
                                }else{
                                    $where_oriPDCode0    = "a.nokk = '$row1[prod_order]'";
                                }

                                $q_analisaresep = mysqli_query($condye, "SELECT
                                                                            a.status_resep, 
                                                                            a.analisa_resep,
                                                                            b.kk_kestabilan,
                                                                            CASE
                                                                                WHEN b.resep = 'Baru' THEN 'R.B'
                                                                                WHEN b.resep = 'Lama' THEN 'R.L'
                                                                                WHEN b.resep = 'Setting' THEN 'R.S'
                                                                            END AS resep
                                                                        FROM
                                                                            tbl_hasilcelup a
                                                                            LEFT JOIN tbl_montemp c ON a.id_montemp=c.id
                                                                            LEFT JOIN tbl_schedule b ON c.id_schedule = b.id
                                                                        WHERE
                                                                            $where_oriPDCode0 
                                                                            AND (a.`status`='OK' OR a.`status` = 'Gagal Proses') 
                                                                        ORDER BY
                                                                            b.no_mesin ASC");
                                $row_analisaresep   = mysqli_fetch_assoc($q_analisaresep);
                        ?>
                        <tr valign="top">
                            <td align="center"><?php echo $no; ?></td>
                            <td align="center"><?php echo date("d/m/y", strtotime($row1['tgl_buat'])); ?></td>
                            <td align="center"><?php echo strtoupper($row1['no_ncp_gabungan']); ?></td>
                            <td><?php echo strtoupper($row1['langganan']); ?></td>
                            <td align="center"><?php echo strtoupper($row1['no_order']); ?></td>
                            <td><?php echo strtoupper($row1['no_warna']); ?></td>
                            <td><?php echo strtoupper($row1['warna']); ?></td>
                            <td align="center">
                                <?php
                                    $q_ITXVIEWKK    = db2_exec($conn2, "SELECT * FROM ITXVIEWKK WHERE PRODUCTIONDEMANDCODE = '$row1[nodemand]'");
                                    $d_ITXVIEWKK    = db2_fetch_assoc($q_ITXVIEWKK);
                                ?>
                                '<?php echo $d_ITXVIEWKK['LOT']; ?>
                            </td>
                            <td align="center"><?php echo strtoupper($row1['rol']); ?></td>
                            <td align="right"><?php echo strtoupper($row1['berat']); ?></td>
                            <td><?php echo strtoupper($row1['no_hanger']); ?></td>
                            <td align="left"><?php echo strtoupper($row1['masalah']); ?></td>
                            <td><?php echo $row1['masalah_dominan']; ?></td>
                            <td>
                                <?php
                                    if(!empty($dt_ori_pd_code['VALUESTRING'])){
                                        $where_oriPDCode    = "a.nodemand = '$dt_ori_pd_code[VALUESTRING]'";
                                    }else{
                                        $where_oriPDCode    = "a.nokk = '$row1[prod_order]'";
                                    }
                                    $nomesin_hasilcelup = mysqli_query($condye, "SELECT
                                                                                        b.no_mesin
                                                                                    FROM
                                                                                        tbl_schedule b
                                                                                        LEFT JOIN  tbl_montemp c ON c.id_schedule = b.id
                                                                                        LEFT JOIN tbl_hasilcelup a ON a.id_montemp=c.id
                                                                                    WHERE
                                                                                        $where_oriPDCode
                                                                                        AND (a.`status`='OK' OR a.`status` = 'Gagal Proses')");
                                    $r_nomesin  = mysqli_fetch_assoc($nomesin_hasilcelup);
                                    if(!empty($r_nomesin['no_mesin'])){
                                        echo $r_nomesin['no_mesin'];
                                    }
                                ?>
                            </td>
                            <td align="left"><?php echo strtoupper($row1['akar_masalah_dye']); ?></td>
                            <td align="left"><?php echo strtoupper($row1['solusi_jangka_panjang_dye']); ?></td>
                            <td align="left"><?php echo strtoupper($row1['ket_dye']); ?></td>
                            <td><?= $row_analisaresep['kk_kestabilan']; ?></td> <!-- K.R -->
                            <td><?= $row_analisaresep['resep']; ?></td> <!-- R.B/R.L/R.S -->
                            <td><?= $row_analisaresep['status_resep'] ?></td><!-- Status Resep -->
                            <td><?= $row_analisaresep['analisa_resep'] ?></td><!-- Analisa Resep-->
                            <td><?php echo $row1['ncp_hitung']; ?></td>
                            <td><?php echo $row1['status']; ?></td>
                            <td><?php echo $row1['m_proses']; ?></td>
                            <td>`<?php echo $row1['prod_order']; ?></td>
                            <td>`<?php echo $row1['nodemand']; ?></td>
                            <td>`<?= $dt_ori_pd_code['VALUESTRING']; ?></td>
                            <td><?php echo $row1['suffix_dye']; ?></td>
                            <td>
                                <?php
                                    if(!empty($dt_ori_pd_code['VALUESTRING'])){
                                        $where_oriPDCode2    = "nodemand = '$dt_ori_pd_code[VALUESTRING]'";
                                    }else{
                                        $where_oriPDCode2    = "nokk = '$row1[prod_order]'";
                                    }
                                    $cw_dyeing = mysqli_query($con, "SELECT status_warna 
                                                                        FROM `tbl_cocok_warna_dye`
                                                                        WHERE 
                                                                            $where_oriPDCode2
                                                                        AND no_mesin = '$r_nomesin[no_mesin]'");
                                    $row_cw_dyeing  = mysqli_fetch_assoc($cw_dyeing);
                                    if(!empty($row_cw_dyeing['status_warna'])){
                                        echo $row_cw_dyeing['status_warna'];
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    $cw_fin_oven = mysqli_query($con, "SELECT `status` 
                                                                        FROM
                                                                            `tbl_lap_inspeksi` 
                                                                        WHERE
                                                                            nodemand = '$dt_ori_pd_code[VALUESTRING]' 
                                                                            AND proses = 'Oven' AND dept = 'QCF'");
                                    $row_cw_fin_oven  = mysqli_fetch_assoc($cw_fin_oven);
                                    if(!empty($row_cw_fin_oven['status'])){
                                        echo $row_cw_fin_oven['status'];
                                    }else{
                                        $cw_fin_oven = mysqli_query($con, "SELECT `status` 
                                                                            FROM
                                                                                `tbl_lap_inspeksi` 
                                                                            WHERE
                                                                                nokk = '$row1[prod_order]' 
                                                                                AND proses = 'Oven' AND dept = 'QCF'");
                                        $row_cw_fin_oven  = mysqli_fetch_assoc($cw_fin_oven); 
                                        echo $row_cw_fin_oven['status'];
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    $cw_fin_fin = mysqli_query($con, "SELECT `status` 
                                                                                FROM
                                                                                    `tbl_lap_inspeksi` 
                                                                                WHERE
                                                                                    nodemand = '$dt_ori_pd_code[VALUESTRING]'
                                                                                    AND proses = 'FIN' AND dept = 'QCF'");
                                    $row_cw_fin_fin  = mysqli_fetch_assoc($cw_fin_fin);

                                    if(!empty($row_cw_fin_fin['status'])){
                                        echo $row_cw_fin_fin['status'];
                                    }else{
                                        $cw_fin_fin = mysqli_query($con, "SELECT `status` 
                                                                                FROM
                                                                                    `tbl_lap_inspeksi` 
                                                                                WHERE
                                                                                    nokk = '$row1[prod_order]'
                                                                                    AND proses = 'FIN' AND dept = 'QCF'");
                                        $row_cw_fin_fin  = mysqli_fetch_assoc($cw_fin_fin);
                                        echo $row_cw_fin_fin['status'];
                                    }
                                ?>
                            </td>
                            <td>
                                <?php
                                    $cw_fin_Comp = mysqli_query($con, "SELECT `status` 
                                                                                FROM
                                                                                    `tbl_lap_inspeksi` 
                                                                                WHERE
                                                                                    nodemand = '$dt_ori_pd_code[VALUESTRING]'
                                                                                    AND proses = 'Comp' AND dept = 'QCF'");
                                    $row_cw_fin_Comp  = mysqli_fetch_assoc($cw_fin_Comp);

                                    if(!empty($row_cw_fin_Comp['status'])){
                                        echo $row_cw_fin_Comp['status'];
                                    }else{
                                        $cw_fin_Comp = mysqli_query($con, "SELECT `status` 
                                                                                FROM
                                                                                    `tbl_lap_inspeksi` 
                                                                                WHERE
                                                                                    nokk = '$row1[prod_order]'
                                                                                    AND proses = 'Comp' AND dept = 'QCF'");
                                        $row_cw_fin_Comp  = mysqli_fetch_assoc($cw_fin_Comp);
                                        echo $row_cw_fin_Comp['status'];
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php $no++; } ?>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    <script>
        //alert('cetak');window.print();
    </script>
</body>
</html>