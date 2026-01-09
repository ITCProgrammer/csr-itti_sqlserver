<?php

// Pastikan koneksi database sudah dilakukan
include "../../koneksi.php";// Sesuaikan dengan file koneksi database Anda

// Sertakan autoload PHPMailer
require '../../vendor/autoload.php';
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

function write_log($message)
{
    $logfile = 'log.txt'; // Tentukan nama file log
    $current_time = date("Y-m-d H:i:s"); // Menambahkan waktu saat log ditulis
    $message = $current_time . " - " . $message . "\n";
    file_put_contents($logfile, $message, FILE_APPEND); // Menulis log ke file
}

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';

$no_order = $_GET['no_order'];
$po = $_GET['po'];
$id_nsp = $_GET['id_nsp'];
$id_cek = $_GET['id_cek'];
$id_cek1 = $_GET['id_cek1'];
$id_cek2 = $_GET['id_cek2'];
$step = $_GET['step'];
// Memeriksa dan menyetel nilai untuk id_cek1 dan id_cek2
$id_cek1_value = isset($id_cek1) && $id_cek1 !== '' ? $id_cek1 : "NULL";  // Jika kosong atau tidak ada, gunakan NULL
$id_cek2_value = isset($id_cek2) && $id_cek2 !== '' ? $id_cek2 : "NULL";  // Jika kosong atau tidak ada, gunakan NULL

// Query utama untuk ambil datanya
$row_cek = mysqli_query($con, "SELECT 
                                                * 
                                                FROM 
                                                    tbl_detail_retur_now 
                                                WHERE 
                                                    id='$id_cek'");
$data_cek = mysqli_fetch_assoc($row_cek);

// Buat ambil Data GKJ
$row_gkj_staff = mysqli_query($con, "SELECT 
                                                        * 
                                                    FROM 
                                                        tbl_digital_signature 
                                                    WHERE 
                                                        id='$data_cek[gkj]'");
$data_gkj_staff = mysqli_fetch_array($row_gkj_staff);

// Buat ambil data mng QC
$row_mng_qc = mysqli_query($con, "SELECT 
                                                    * 
                                                FROM 
                                                    tbl_digital_signature 
                                                WHERE 
                                                    id='$data_cek[qcf_manager]'");
$data_mng_qc = mysqli_fetch_array($row_mng_qc);
$cek_mng_qc = mysqli_num_rows($row_mng_qc);

// Buat ambil data sales
$row_sales = mysqli_query($con, "SELECT 
                                                    * 
                                                FROM 
                                                    tbl_digital_signature 
                                                WHERE 
                                                    id='$data_cek[sales]'");
$data_sales = mysqli_fetch_array($row_sales);
$cek_sales = mysqli_num_rows($row_sales);

// Buat ambil data MKT/PPC MNG
$row_mkt_ppc_mng = mysqli_query($con, "SELECT 
                                                            * FROM 
                                                            tbl_digital_signature 
                                                                WHERE 
                                                            id='$data_cek[mkt_ppc_manager]'");
$data_mkt_ppc_mng = mysqli_fetch_array($row_mkt_ppc_mng);
$cek_mkt_ppc_mng = mysqli_num_rows($row_mkt_ppc_mng);

// Buat ambil data DMF
$row_dmf = mysqli_query($con, "SELECT 
                                * FROM 
                                    tbl_digital_signature 
                                WHERE 
                                    id='$data_cek[dmf]'");
$data_dmf = mysqli_fetch_array($row_dmf);




// Untuk step Update GKJ
if ($step == 2) {
        $step2 = 3;
        $email_gkj = $data_gkj_staff['email'];
        $email_qc_mng = $data_mng_qc['email'];
        $tanggal = date("Y-m-d H:i:s");
        $status = 1;
        $approve = 'APPROVE_GKJ';
        $subject = 'APPROVE BON RETUR QC';
        // Buat cek dulu valuenya
            if ($id_cek1_value != 'NULL') {
                $id_approve2 = "AND id_cek1 = '$id_cek1'";
            } else {
                $id_approve2 = "";
            }
            if ($id_cek2_value != 'NULL') {
                $id_approve3 = "AND id_cek2 = '$id_cek2'";
            } else {
                $id_approve3 = "";
            }
    $sql_cek1 = mysqli_query($con, "SELECT 
                                    * 
                                        FROM tbl_email_bon_retur 
                                    WHERE
                                    id_cek = '$id_cek'
                                    $id_approve2
                                    $id_approve3
                                    AND tanggal_approve_gkj IS NOT NULL");
    $data_cek2 = mysqli_fetch_array($sql_cek1);
    $cek_gkj = mysqli_num_rows($sql_cek1);
    if($cek_gkj < 1){
        $sql = "UPDATE tbl_email_bon_retur 
                SET 
                    id_cek1 = $id_cek1_value, 
                    id_cek2 = $id_cek2_value, 
                    email_gkj = '$email_gkj', 
                    status_email_gkj = '$status', 
                    `status` = '$approve',
                    tanggal_approve_gkj = '$tanggal'
                WHERE 
                    id_cek = '$id_cek'
                    $id_approve2
                    $id_approve3
                ";
        if (mysqli_query($con, $sql)) {
            $transport = (new Swift_SmtpTransport('mail.indotaichen.com', 587))  // Ganti dengan host SMTP server Anda (misal Gmail)
            ->setUsername('dept.it@indotaichen.com')   // Ganti dengan email Anda
            ->setPassword('Xr7PzUWoyPA')     // Ganti dengan password email Anda
            ->setEncryption('TLS');                  // Menggunakan TLS untuk koneksi aman

            $mailer = new Swift_Mailer($transport);
            $message1 = (new Swift_Message($subject))
                ->setFrom(['dept.it@indotaichen.com' => 'Dept IT'])  // Ganti dengan email pengirim Anda
                ->setTo([$email_qc_mng => $data_mng_qc['nama']])  // Ganti dengan email penerima
                ->setBody('<h1>Bon Retur QCF</h1>
                            <p>Dear,  ' . $data_mng_qc['nama'] . '</p>
                            <p>Mohon di approve untuk bon retur ini. Untuk detail dapat dilihat disini <a href="localhost/qc-final-new/pages/cetak/cetak_suratretur.php?no_order=' . $no_order . '&po=' . $po . '&id_nsp=' . $id_nsp . '&id_cek=' . $id_cek . '&id_cek1=' . $id_cek1 . '&id_cek2=' . $id_cek2 . '">Detail</a></p>
                            <p><strong style="color: green">APPROVE</strong> <a href="localhost/qc-final-new/pages/cetak/approve_bon_retur_id.php?no_order=' . $no_order . '&po=' . $po . '&id_nsp=' . $id_nsp . '&id_cek=' . $id_cek . '&id_cek1=' . $id_cek1 . '&id_cek2=' . $id_cek2 . '&step=' . $step2 . '">Klik untuk Approve</a></p>
                            <p><strong style="color: red">REJECT</strong> <a href="localhost/qc-final-new/pages/cetak/reject_bon_retur_id.php?no_order=' . $no_order . '&po=' . $po . '&id_nsp=' . $id_nsp . '&id_cek=' . $id_cek . '&id_cek1=' . $id_cek1 . '&id_cek2=' . $id_cek2 . '&step=' . $step2 . '">Klik untuk Reject</a></p>
                            ', // Body dalam format HTML
                    'text/html'  // Tipe MIME untuk HTML
                );
            // Mengirim email
            try {
                $result = $mailer->send($message1);
                echo '<!doctype html>
                                <html lang="en">
                                <head>
                                    <meta charset="utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1">
                                    <title>Approval Bon Retur</title>
                                    <script type="text/javascript">
                                         setTimeout(function() {
                                             window.close();
                                         }, 3500);
                                     </script>
                                </head>
                                <body>
                                    <h1>Data berhasil di-approve!</h1>
                                    <p>Email dikirimkan ke  ' . htmlspecialchars($data_mng_qc['nama']) . '.</p>
                            </body>
                        </html>';
            } catch (Exception $e) {
                echo 'Failed to send email: ' . $e->getMessage();
            }
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    } else{
        echo '<!doctype html>
                                <html lang="en">
                                <head>
                                    <meta charset="utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1">
                                    <title>Approval Bon Retur</title>
                                    <script type="text/javascript">
                                        setTimeout(function() {
                                            window.close();
                                        }, 3500);
                                    </script>
                                </head>
                                <body>
                                    <h1>Sudah Diapprove!</h1>
                                    <h3>Diapprove Pada: </h3>
                                    <h5>Tanggal '. htmlspecialchars($data_cek2['tanggal_approve_gkj']).'!</h5>
                                    <p>Silahkan konfirmasi ke ' . htmlspecialchars($data_mng_qc['nama']) . '</p>
                            </body>
                        </html>';
    }
} 

    // Update untuk manager qc
  else if ($step == 3) {
        $email_qc_mng = $data_mng_qc['email'];
        $email_dmf = $data_dmf['email'];
        $status = 1;
        $approve = 'APPROVE_QCF_MANAGER';
        $subject = 'APPROVE BON RETUR QC';
        $tanggal = date("Y-m-d H:i:s");

         if ($id_cek1_value != 'NULL') {
                $id_approve2 = "AND id_cek1 = '$id_cek1'";
            } else {
                $id_approve2 = "";
            }
            if ($id_cek2_value != 'NULL') {
                $id_approve3 = "AND id_cek2 = '$id_cek2'";
            } else {
                $id_approve3 = "";
            }
    $sql_cek2 = mysqli_query($con, "SELECT 
                                    * 
                                        FROM tbl_email_bon_retur 
                                    WHERE
                                    id_cek = '$id_cek'
                                    $id_approve2
                                    $id_approve3
                                    AND tanggal_approve_mng_qcf IS NOT NULL");
    $data_cek3 = mysqli_fetch_array($sql_cek2);
    $cek_qc = mysqli_num_rows($sql_cek2);

        if($cek_qc<1){
            // Kirim email ke DMF
            if($cek_mkt_ppc_mng < 1 && $cek_sales < 1){
                    $sql = "UPDATE tbl_email_bon_retur 
                SET 
                    id_cek1 = $id_cek1_value, 
                    id_cek2 = $id_cek2_value, 
                    email_qc_mng = '$email_qc_mng', 
                    status_email_qc_mng = '$status', 
                    `status` = '$approve',
                    tanggal_approve_mng_qcf = '$tanggal'
                WHERE id_cek = '$id_cek'
                $id_approve2
                $id_approve3
                ";
                mysqli_query($con, $sql);
            $step5 = 6;
            $transport = (new Swift_SmtpTransport('mail.indotaichen.com', 587))  // Ganti dengan host SMTP server Anda (misal Gmail)
            ->setUsername('dept.it@indotaichen.com')   // Ganti dengan email Anda
            ->setPassword('Xr7PzUWoyPA')     // Ganti dengan password email Anda
            ->setEncryption('TLS');                  // Menggunakan TLS untuk koneksi aman
            //     // Settingan untuk Dept IT
           
                

            $mailer = new Swift_Mailer($transport);
            $message = (new Swift_Message($subject))
            ->setFrom(['dept.it@indotaichen.com' => 'Dept IT'])  // Ganti dengan email pengirim Anda
                // // Buat Dept IT
                // ->setFrom(['dept.it@indotaichen.com' => 'Dept IT'])  // Ganti dengan email pengirim Anda
                ->setTo([$email_dmf => $data_dmf['nama']])  // Ganti dengan email penerima
                ->setBody('<h1>Bon Retur QCF</h1>
                        <p>Dear,  ' . $data_dmf['nama'] . '</p>
                        <p>Mohon di approve untuk bon retur ini. Untuk detail dapat dilihat disini <a href="localhost/qc-final-new/pages/cetak/cetak_suratretur.php?no_order=' . $no_order . '&po=' . $po . '&id_nsp=' . $id_nsp . '&id_cek=' . $id_cek . '&id_cek1=' . $id_cek1 . '&id_cek2=' . $id_cek2 . '">Detail</a></p>
                        <p><strong style="color: green">APPROVE</strong> <a href="localhost/qc-final-new/pages/cetak/approve_bon_retur_id.php?no_order=' . $no_order . '&po=' . $po . '&id_nsp=' . $id_nsp . '&id_cek=' . $id_cek . '&id_cek1=' . $id_cek1 . '&id_cek2=' . $id_cek2 . '&step=' . $step5 . '">Klik untuk Approve</a></p>
                        <p><strong style="color: red">REJECT</strong> <a href="localhost/qc-final-new/pages/cetak/reject_bon_retur_id.php?no_order=' . $no_order . '&po=' . $po . '&id_nsp=' . $id_nsp . '&id_cek=' . $id_cek . '&id_cek1=' . $id_cek1 . '&id_cek2=' . $id_cek2 . '&step=' . $step5 . '">Klik untuk Reject</a></p>
                        ', // Body dalam format HTML
                    'text/html'  // Tipe MIME untuk HTML
                );
            // Mengirim email
            try {
                $result = $mailer->send($message);
                echo '<!doctype html>
                                <html lang="en">
                                <head>
                                    <meta charset="utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1">
                                    <title>Approval Bon Retur</title>
                                    <script type="text/javascript">
                                        setTimeout(function() {
                                            window.close();
                                        }, 3500);
                                    </script>
                                </head>
                                <body>
                                    <h1>Data berhasil di-approve!</h1>
                                    <p>Email dikirimkan ke  ' . htmlspecialchars($data_dmf['nama']) . '.</p>
                            </body>
                        </html>';
            } catch (Exception $e) {
                echo 'Failed to send email: ' . $e->getMessage();
            }
            // Kirim ke MKT/PPC Manager
            } else if($cek_mkt_ppc_mng == 1 && $cek_sales < 1){
                $sql = "UPDATE tbl_email_bon_retur 
                    SET 
                        id_cek1 = $id_cek1_value, 
                        id_cek2 = $id_cek2_value, 
                        email_qc_mng = '$email_qc_mng', 
                        status_email_qc_mng = '$status', 
                        `status` = '$approve',
                        tanggal_approve_mng_qcf = '$tanggal'
                    WHERE id_cek = '$id_cek'
                    $id_approve2
                    $id_approve3
                    ";
                mysqli_query($con, $sql);

            $step4 = 5;
            $email_mkt_ppc_mng = $data_mkt_ppc_mng['email'];
            $transport = (new Swift_SmtpTransport('mail.indotaichen.com', 587))  // Ganti dengan host SMTP server Anda (misal Gmail)
            ->setUsername('dept.it@indotaichen.com')   // Ganti dengan email Anda
            ->setPassword('Xr7PzUWoyPA')     // Ganti dengan password email Anda
            ->setEncryption('TLS');                  // Menggunakan TLS untuk koneksi aman
            //     // Settingan untuk Dept IT
            // $transport = (new Swift_SmtpTransport('mail.indotaichen.com', 587))  // Ganti dengan host SMTP server Anda (misal Gmail)
            //     ->setUsername('dept.it@indotaichen.com')   // Ganti dengan email Anda
            //     ->setPassword('Xr7PzUWoyPA')     // Ganti dengan password email Anda
            //     ->setEncryption('TLS');                  // Menggunakan TLS untuk koneksi aman

            $mailer = new Swift_Mailer($transport);

            $message_mkt_mng = (new Swift_Message($subject))
                ->setFrom(['dept.it@indotaichen.com' => 'Dept IT'])  // Ganti dengan email pengirim Anda
                // ->setFrom(['noreply@ridinet.id' => 'DEPT. QCF'])  // Ganti dengan email pengirim Anda
                ->setTo([$email_mkt_ppc_mng => $data_mkt_ppc_mng['nama']])  // Ganti dengan email penerima
                ->setBody('<h1>Bon Retur QCF</h1>
                        <p>Dear,  ' . $data_mkt_ppc_mng['nama'] . '</p>
                        <p>Mohon di approve untuk bon retur ini. Untuk detail dapat dilihat disini <a href="localhost/qc-final-new/pages/cetak/cetak_suratretur.php?no_order=' . $no_order . '&po=' . $po . '&id_nsp=' . $id_nsp . '&id_cek=' . $id_cek . '&id_cek1=' . $id_cek1 . '&id_cek2=' . $id_cek2 . '">Detail</a></p>
                        <p><strong style="color: green">APPROVE</strong> <a href="localhost/qc-final-new/pages/cetak/approve_bon_retur_id.php?no_order=' . $no_order . '&po=' . $po . '&id_nsp=' . $id_nsp . '&id_cek=' . $id_cek . '&id_cek1=' . $id_cek1 . '&id_cek2=' . $id_cek2 . '&step=' . $step4 . '">Klik untuk Approve</a></p>
                        <p><strong style="color: red">REJECT</strong> <a href="localhost/qc-final-new/pages/cetak/reject_bon_retur_id.php?no_order=' . $no_order . '&po=' . $po . '&id_nsp=' . $id_nsp . '&id_cek=' . $id_cek . '&id_cek1=' . $id_cek1 . '&id_cek2=' . $id_cek2 . '&step=' . $step4 . '">Klik untuk Reject</a></p>
                        ', // Body dalam format HTML
                    'text/html'  // Tipe MIME untuk HTML
                );
            // Mengirim email
            try {
                $result = $mailer->send($message_mkt_mng);
                // $result = $mailer->send($message_dmf);
                echo '<!doctype html>
                            <html lang="en">
                            <head>
                                <meta charset="utf-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1">
                                <title>Approval Bon Retur</title>
                                <script type="text/javascript">
                                        setTimeout(function() {
                                            window.close();
                                        }, 3500);
                                    </script>
                            </head>
                            <body>
                                <h1>Data berhasil di-approve!</h1>
                                <p>Email dikirimkan ke ' . htmlspecialchars($data_mkt_ppc_mng['nama']) . '</p>
                            </body>
                            </html>';
            } catch (Exception $e) {
                echo 'Failed to send email: ' . $e->getMessage();
            }
   
            } else if($cek_mkt_ppc_mng == 1 && $cek_sales  == 1){
            $sql = "UPDATE tbl_email_bon_retur 
                SET 
                    id_cek1 = $id_cek1_value, 
                    id_cek2 = $id_cek2_value, 
                    email_qc_mng = '$email_qc_mng', 
                    status_email_qc_mng = '$status', 
                    `status` = '$approve',
                    tanggal_approve_mng_qcf = '$tanggal'
                WHERE id_cek = '$id_cek'
                $id_approve2
                $id_approve3
                ";
            mysqli_query($con, $sql);
                
            $step3 = 4;
            $email_sales = $data_sales['email'];
            $email_mkt_ppc_mng = $data_mkt_ppc_mng['email'];
            $transport = (new Swift_SmtpTransport('mail.indotaichen.com', 587))  // Ganti dengan host SMTP server Anda (misal Gmail)
            ->setUsername('dept.it@indotaichen.com')   // Ganti dengan email Anda
            ->setPassword('Xr7PzUWoyPA')     // Ganti dengan password email Anda
            ->setEncryption('TLS');                  // Menggunakan TLS untuk koneksi aman
            //     // Settingan untuk Dept IT
            // $transport = (new Swift_SmtpTransport('mail.indotaichen.com', 587))  // Ganti dengan host SMTP server Anda (misal Gmail)
            //     ->setUsername('dept.it@indotaichen.com')   // Ganti dengan email Anda
            //     ->setPassword('Xr7PzUWoyPA')     // Ganti dengan password email Anda
            //     ->setEncryption('TLS');                  // Menggunakan TLS untuk koneksi aman

            $mailer = new Swift_Mailer($transport);
            $message_sales = (new Swift_Message($subject))
                // // Buat Dept IT
                ->setFrom(['dept.it@indotaichen.com' => 'Dept IT'])  // Ganti dengan email pengirim Anda
                ->setTo([$email_sales => $data_sales['nama']])  // Ganti dengan email penerima
                ->setBody('<h1>Bon Retur QCF</h1>
                        <p>Dear,  ' . $data_sales['nama'] . '</p>
                        <p>Mohon di approve untuk bon retur ini. Untuk detail dapat dilihat disini <a href="localhost/qc-final-new/pages/cetak/cetak_suratretur.php?no_order=' . $no_order . '&po=' . $po . '&id_nsp=' . $id_nsp . '&id_cek=' . $id_cek . '&id_cek1=' . $id_cek1 . '&id_cek2=' . $id_cek2 . '">Detail</a></p>
                        <p><strong style="color: green">APPROVE</strong> <a href="localhost/qc-final-new/pages/cetak/approve_bon_retur_id.php?no_order=' . $no_order . '&po=' . $po . '&id_nsp=' . $id_nsp . '&id_cek=' . $id_cek . '&id_cek1=' . $id_cek1 . '&id_cek2=' . $id_cek2 . '&step=' . $step3 . '">Klik untuk Approve</a></p>
                        <p><strong style="color: red">REJECT</strong> <a href="localhost/qc-final-new/pages/cetak/reject_bon_retur_id.php?no_order=' . $no_order . '&po=' . $po . '&id_nsp=' . $id_nsp . '&id_cek=' . $id_cek . '&id_cek1=' . $id_cek1 . '&id_cek2=' . $id_cek2 . '&step=' . $step3 . '">Klik untuk Reject</a></p>
                        ', // Body dalam format HTML
                    'text/html'  // Tipe MIME untuk HTML
                );
            // Mengirim email
            try {
                $result = $mailer->send($message_sales);
                // $result = $mailer->send($message_mkt_mng);
                // $result = $mailer->send($message_dmf);
                echo '<!doctype html>
                            <html lang="en">
                            <head>
                                <meta charset="utf-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1">
                                <title>Approval Bon Retur</title>
                                <script type="text/javascript">
                                        setTimeout(function() {
                                            window.close();
                                        }, 3500);
                                    </script>
                            </head>
                            <body>
                                <h1>Data berhasil di-approve!</h1>
                                <p>Email dikirimkan ke ' . htmlspecialchars($data_sales['nama']) . '</p>
                            </body>
                            </html>';
            } catch (Exception $e) {
                echo 'Failed to send email: ' . $e->getMessage();
            }            
            }

            // echo 'Data belum di approve';
        }else{
        echo '<!doctype html>
                                <html lang="en">
                                <head>
                                    <meta charset="utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1">
                                    <title>Approval Bon Retur</title>
                                    <script type="text/javascript">
                                        setTimeout(function() {
                                            window.close();
                                        }, 3500);
                                    </script>
                                </head>
                                <body>
                                    <h1>Sudah Diapprove!</h1>
                                    <h3>Diapprove Pada: </h3>
                                    <h5>Tanggal ' . htmlspecialchars($data_cek3['tanggal_approve_mng_qcf']) . '!</h5>
                            </body>
                        </html>';
        }
    }
    // Sales Assistant 
    else if ($step == 4) {
    if ($id_cek1_value != 'NULL') {
        $id_approve2 = "AND id_cek1 = '$id_cek1'";
    } else {
        $id_approve2 = "";
    }
    if ($id_cek2_value != 'NULL') {
        $id_approve3 = "AND id_cek2 = '$id_cek2'";
    } else {
        $id_approve3 = "";
    }
    $sql_cek3 = mysqli_query($con, "SELECT 
                                    * 
                                        FROM tbl_email_bon_retur 
                                    WHERE
                                    id_cek = '$id_cek'
                                    $id_approve2
                                    $id_approve3
                                    AND tanggal_approve_sales IS NOT NULL");
    $data_cek4 = mysqli_fetch_array($sql_cek3);
    $cek_sales = mysqli_num_rows($sql_cek3);

    if($cek_sales<1){

        $status = 1;
        $approve = 'APPROVE_SALES';
        $tanggal = date("Y-m-d H:i:s");


        $sql = "UPDATE tbl_email_bon_retur 
            SET 
                id_cek1 = $id_cek1_value, 
                id_cek2 = $id_cek2_value, 
                email_sales = '$data_sales[email]', 
                status_email_sales = '$status', 
                `status` = '$approve',
                tanggal_approve_sales = '$tanggal'
            WHERE id_cek = '$id_cek'
            $id_approve2
            $id_approve3";
        if (mysqli_query($con, $sql)) {
            echo '<!doctype html>
                                <html lang="en">
                                <head>
                                    <meta charset="utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1">
                                    <title>Approval Bon Retur</title>
                                    <script type="text/javascript">
                                        setTimeout(function() {
                                            window.close();
                                        }, 3500);
                                    </script>
                                </head>
                                <body>
                                    <h1>Bon Retur Telah di Approve!</h1>
                                    <h3>Diapprove Pada: </h3>
                                    <h5>Tanggal ' .$tanggal. '!</h5>
                                    <h5>Oleh ' .$data_sales['nama']. '!</h5>
                            </body>
                        </html>';
        }
    }else{
        echo '<!doctype html>
                    <html lang="en">
                    <head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Approval Bon Retur</title>
                        <script type="text/javascript">
                            setTimeout(function() {
                                window.close();
                            }, 3500);
                        </script>
                    </head>
                    <body>
                        <h1>Sudah Diapprove!</h1>
                        <h3>Diapprove Pada: </h3>
                        <h5>Tanggal ' . htmlspecialchars($data_cek4['tanggal_approve_sales']) . '!</h5>
                </body>
            </html>';
        }

        // Untuk Manager PPC/MKT 
    }
    // Untuk Manager MKT/PPC
    else if ($step == 5) {
    if ($id_cek1_value != 'NULL') {
        $id_approve2 = "AND id_cek1 = '$id_cek1'";
    } else {
        $id_approve2 = "";
    }
    if ($id_cek2_value != 'NULL') {
        $id_approve3 = "AND id_cek2 = '$id_cek2'";
    } else {
        $id_approve3 = "";
    }
        $status = 1;
        $approve = 'APPROVE_MKT/PPC_MANAGER';
        $tanggal = date("Y-m-d H:i:s");
        $sql_cek4 = mysqli_query($con, "SELECT 
                                    * 
                                        FROM tbl_email_bon_retur 
                                    WHERE
                                    id_cek = '$id_cek'
                                    $id_approve2
                                    $id_approve3
                                    AND tanggal_approve_mng_mkt_ppc IS NOT NULL");
    $data_cek5 = mysqli_fetch_array($sql_cek4);
    $cek_mktMng = mysqli_num_rows($sql_cek4);
        if($cek_mktMng<1){
        $sql = "UPDATE tbl_email_bon_retur 
            SET 
                id_cek1 = $id_cek1_value, 
                id_cek2 = $id_cek2_value, 
                email_mkt_ppc_mng = '$data_mkt_ppc_mng[email]', 
                status_email_mkt_ppc_mng = '$status', 
                `status` = '$approve',
                tanggal_approve_mng_mkt_ppc = '$tanggal'
            WHERE id_cek = '$id_cek'
            $id_approve2
            $id_approve3";
        if (mysqli_query($con, $sql)) {
            echo '<!doctype html>
                                <html lang="en">
                                <head>
                                    <meta charset="utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1">
                                    <title>Approval Bon Retur</title>
                                    <script type="text/javascript">
                                        setTimeout(function() {
                                            window.close();
                                        }, 3500);
                                    </script>
                                </head>
                                <body>
                                    <h1>Bon Retur Telah di Approve!</h1>
                                    <h3>Diapprove Pada: </h3>
                                    <h5>Tanggal ' . $tanggal . '!</h5>
                                    <h5>Oleh ' . $data_mkt_ppc_mng['nama'] . '!</h5>
                            </body>
                        </html>';
        }
        }else{
        echo '<!doctype html>
                    <html lang="en">
                    <head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Approval Bon Retur</title>
                        <script type="text/javascript">
                            setTimeout(function() {
                                window.close();
                            }, 3500);
                        </script>
                    </head>
                    <body>
                        <h1>Sudah Diapprove!</h1>
                        <h3>Diapprove Pada: </h3>
                        <h5>Tanggal ' . htmlspecialchars($data_cek5['tanggal_approve_mng_mkt_ppc']) . '!</h5>
                </body>
            </html>';
        }


    } else if ($step == 6) {
        $status = 1;
        $approve = 'APPROVE_DMF';
        $subject = 'APPROVE BON RETUR QC';
        $tanggal = date("Y-m-d H:i:s");
        if ($id_cek1_value != 'NULL') {
        $id_approve2 = "AND id_cek1 = '$id_cek1'";
    } else {
        $id_approve2 = "";
    }
    if ($id_cek2_value != 'NULL') {
        $id_approve3 = "AND id_cek2 = '$id_cek2'";
    } else {
        $id_approve3 = "";
    }
        $sql_cek5 = mysqli_query($con, "SELECT 
                                    * 
                                        FROM tbl_email_bon_retur 
                                    WHERE
                                    id_cek = '$id_cek'
                                    $id_approve2
                                    $id_approve3
                                    AND tanggal_approve_dmf IS NOT NULL");
    $data_cek6 = mysqli_fetch_array($sql_cek5);
    $cek_dmf = mysqli_num_rows($sql_cek5);
        if($cek_dmf<1){
        $email_dmf = $data_dmf['email'];
        $sql = "UPDATE tbl_email_bon_retur 
            SET 
                id_cek1 = $id_cek1_value, 
                id_cek2 = $id_cek2_value, 
                email_dmf = '$email_dmf', 
                status_email_dmf = '$status', 
                `status` = '$approve',
                tanggal_approve_dmf = '$tanggal'
            WHERE id_cek = '$id_cek'
            $id_approve2
            $id_approve3";
        if (mysqli_query($con, $sql)) {
            echo '<!doctype html>
                                <html lang="en">
                                <head>
                                    <meta charset="utf-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1">
                                    <title>Approval Bon Retur</title>
                                    <script type="text/javascript">
                                        setTimeout(function() {
                                            window.close();
                                        }, 3500);
                                    </script>
                                </head>
                                <body>
                                    <h1>Bon Retur Telah di Approve!</h1>
                                    <h3>Diapprove Pada: </h3>
                                    <h5>Tanggal ' . $tanggal . '!</h5>
                                    <h5>Oleh ' . $data_dmf['nama'] . '!</h5>
                            </body>
                        </html>';}
        }else{
        echo '<!doctype html>
                    <html lang="en">
                    <head>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <title>Approval Bon Retur</title>
                        <script type="text/javascript">
                            setTimeout(function() {
                                window.close();
                            }, 3500);
                        </script>
                    </head>
                    <body>
                        <h1>Sudah Diapprove!</h1>
                        <h3>Diapprove Pada: </h3>
                        <h5>Tanggal ' . htmlspecialchars($data_cek6['tanggal_approve_dmf']) . '!</h5>
                </body>
            </html>';
        }
    }

// Ambil data staf QC dan email terkait dari database
// $row_cek = mysqli_query($con, "SELECT * FROM tbl_detail_retur_now WHERE id='$id_cek'");
// $data_cek = mysqli_fetch_assoc($row_cek);
// $row_gkj_staff = mysqli_query($con, "SELECT * FROM tbl_digital_signature WHERE id='$data_cek[gkj]'");
// $data_gkj_staff = mysqli_fetch_array($row_gkj_staff);
// $row_qc_staff = mysqli_query($con, "SELECT * FROM tbl_digital_signature WHERE id='$data_cek[qc_staff]'");
// $data_qc_staff = mysqli_fetch_array($row_qc_staff);
// $row_mng_qc = mysqli_query($con, "SELECT * FROM tbl_digital_signature WHERE id='$data_cek[qcf_manager]'");
// $data_mng_qc = mysqli_fetch_array($row_mng_qc);
// $email_qc = $data_qc_staff['email'];
// $email_gkj = $data_gkj_staff['email'];
// $email_qc_mng = $data_mng_qc['email'];


//     // Status APPROVE
// $status = 1;
// $approve = 'APPROVE_STAFF_QC';
// $subject = 'APPROVE BON RETUR QC';
// $body_email = 'Mohon di Approve untuk Bon Retur. Detail Retur dapat dilihat di 
//         "https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_suratretur.php?no_order=' . $no_order . '&po=' . $po . '&id_nsp=' . $id_nsp . '&id_cek=' . $id_cek . '&id_cek1=' . $id_cek1 . '&id_cek2=' . $id_cek2 . '"';

// // Insert ke database





// if($id_cek1!='0'){
//     $id_approve2 = "AND id_cek1 = '$id_cek1'";
// }else{
//     $id_approve2 ="";
// }
// if($id_cek2!='0'){
//     $id_approve3 = "AND id_cek2 = '$id_cek2'" ;
// }$id_approve3 ="";

//  // Query untuk memeriksa apakah sudah ada data yang cocok
// $qcek_approve = "SELECT * 
//                     FROM tbl_email_bon_retur
//                     WHERE 
//                     id_cek = '$id_cek' 
//                     $id_approve2
//                     $id_approve3
//                     AND status_email_qc = '1' 
//                     AND status_email_gkj is NULL 
//                     ORDER BY id DESC
//                     LIMIT 1";

//                     // Menjalankan query
//                     $query_approve1 = mysqli_query($con, $qcek_approve);

//                     // Menyimpan hasil query untuk menghitung jumlah baris
//                     $row_approve_gkj = mysqli_num_rows($query_approve1);
// if($row_approve_gkj>1){
//         $status = 1;
//         $approve = 'APPROVE_STAFF_GKJ';
//         $subject = 'APPROVE BON RETUR QC';
//         $body_email = 'Mohon di Approve untuk Bon Retur. Detail Retur dapat dilihat di 
//                 "https://online.indotaichen.com/qc-final-new/pages/cetak/cetak_suratretur.php?no_order=' . $no_order . '&po=' . $po . '&id_nsp=' . $id_nsp . '&id_cek=' . $id_cek . '&id_cek1=' . $id_cek1 . '&id_cek2=' . $id_cek2 . '"';
//     // Insert ke database
//     $sql = "UPDATE tbl_email_bon_retur
//             SET('email_gkj','status_email_gkj',`status`)
//             VALUES('$email_gkj','$status', '$approve')";
//     if (mysqli_query($con, $sql)) {
//         $transport = (new Swift_SmtpTransport('mail.ridinet.id', 465))  // Ganti dengan host SMTP server Anda (misal Gmail)
//             ->setUsername('noreply@ridinet.id')   // Ganti dengan email Anda
//             ->setPassword('^D&{rhD;oox,')     // Ganti dengan password email Anda
//             ->setEncryption('SSL');                  // Menggunakan TLS untuk koneksi aman

//         $mailer = new Swift_Mailer($transport);
//         $message = (new Swift_Message($subject))
//             ->setFrom(['noreply@ridinet.id' => 'DEPT. QCF'])  // Ganti dengan email pengirim Anda
//             ->setTo([$email_gkj])  // Ganti dengan email penerima
//             ->setBody("Test Tulis Email
//                     Bisa klik link berikut
//                    $body_email");

//         // Mengirim email
//         try {
//             $result = $mailer->send($message);
//             echo 'Email sent successfully!';
//         } catch (Exception $e) {
//             echo 'Failed to send email: ' . $e->getMessage();
//         }
//     } else {
//         echo "Error: " . mysqli_error($koneksi);
// }
?>