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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $no_order = $_POST['no_order'];
    $po = $_POST['po'];
    $id_nsp = $_POST['id_nsp'];
    $id_cek = !empty($_POST['id_cek']) ? $_POST['id_cek'] : '';
    $id_cek1 = !empty($_POST['id_cek1']) ? $_POST['id_cek1'] : '';
    $id_cek2 = !empty($_POST['id_cek2']) ? $_POST['id_cek2'] : '';
    $id_nsp = !empty($_POST['id_nsp']) ? $_POST['id_nsp'] : '';
    $step = 2;

    // Memeriksa dan menyetel nilai untuk id_cek1 dan id_cek2
    $id_cek1_value = isset($id_cek1) && $id_cek1 !== '' ? $id_cek1 : "NULL";  // Jika kosong atau tidak ada, gunakan NULL
    $id_cek2_value = isset($id_cek2) && $id_cek2 !== '' ? $id_cek2 : "NULL";  // Jika kosong atau tidak ada, gunakan NULL


    var_dump($id_cek1); 
    // Ambil data staf QC dan email terkait dari database
    $row_cek = mysqli_query($con, "SELECT * FROM tbl_detail_retur_now WHERE id='$id_cek'");
    $data_cek = mysqli_fetch_assoc($row_cek);
    $row_gkj_staff = mysqli_query($con, "SELECT * FROM tbl_digital_signature WHERE id='$data_cek[gkj]'");
    $data_gkj_staff = mysqli_fetch_array($row_gkj_staff);
    $row_qc_staff = mysqli_query($con, "SELECT * FROM tbl_digital_signature WHERE id='$data_cek[qc_staff]'");
    $data_qc_staff = mysqli_fetch_array($row_qc_staff);
    $row_mng_qc = mysqli_query($con, "SELECT * FROM tbl_digital_signature WHERE id='$data_cek[qcf_manager]'");
    $data_mng_qc = mysqli_fetch_array($row_mng_qc);
    $email_qc = $data_qc_staff['email'];
    $email_gkj = $data_gkj_staff['email'];
    $email_qc_mng = $data_mng_qc['email'];

    
    //     // Status APPROVE
    $status = 1;
    $tanggal = date("Y-m-d H:i:s");
    $approve = 'APPROVE_STAFF_QC';
    $subject = 'APPROVE BON RETUR QC';
    // Insert ke database
    $sql = "INSERT INTO tbl_email_bon_retur (id_cek, id_cek1, id_cek2,  email_qc, status_email_qc, `status`, tanggal_approve_qc, id_nsp) 
            VALUES ('$id_cek', $id_cek1_value, $id_cek2_value, '$email_qc', '$status', '$approve','$tanggal', '$id_nsp')";
    if (mysqli_query($con, $sql)) {
    //    $transport = (new Swift_SmtpTransport('mail.ridinet.id', 465))  // Ganti dengan host SMTP server Anda (misal Gmail)
    //     ->setUsername('noreply@ridinet.id')   // Ganti dengan email Anda
    //     ->setPassword('^D&{rhD;oox,')     // Ganti dengan password email Anda
    //     ->setEncryption('SSL');                  // Menggunakan TLS untuk koneksi aman
    $transport = (new Swift_SmtpTransport('mail.indotaichen.com', 587))  // Ganti dengan host SMTP server Anda (misal Gmail)
    ->setUsername('dept.it@indotaichen.com')   // Ganti dengan email Anda
    ->setPassword('Xr7PzUWoyPA')     // Ganti dengan password email Anda
    ->setEncryption('TLS');                  // Menggunakan TLS untuk koneksi aman

    $mailer = new Swift_Mailer($transport);
    $message = (new Swift_Message($subject))->setFrom(['dept.it@indotaichen.com' => 'Dept IT'])  // Ganti dengan email pengirim Anda
        // ->setFrom(['noreply@ridinet.id' => 'DEPT. QCF'])  // Ganti dengan email pengirim Anda
        ->setTo([$email_gkj=> $data_gkj_staff['nama']])  // Ganti dengan email penerima
        ->setBody('<h1>Bon Retur QCF</h1>
                        <p>Dear,  ' . $data_gkj_staff['nama'] . '</p>
                        <p>Mohon di approve untuk bon retur ini. Untuk detail dapat dilihat disini <a href="localhost/qc-final-new/pages/cetak/cetak_suratretur.php?no_order=' . $no_order . '&po=' . $po . '&id_nsp=' . $id_nsp . '&id_cek=' . $id_cek . '&id_cek1=' . $id_cek1 . '&id_cek2=' . $id_cek2 . '">Detail</a></p>
                        <p><strong style="color: green">APPROVE</strong> <a href="localhost/qc-final-new/pages/cetak/approve_bon_retur_id.php?no_order=' . $no_order . '&po=' . $po . '&id_nsp=' . $id_nsp . '&id_cek=' . $id_cek . '&id_cek1=' . $id_cek1 . '&id_cek2=' . $id_cek2 . '&step=' . $step . '">Klik untuk Approve</a></p>
                        <p><strong style="color: red">REJECT</strong> <a href="localhost/qc-final-new/pages/cetak/reject_bon_retur_id.php?no_order=' . $no_order . '&po=' . $po . '&id_nsp=' . $id_nsp . '&id_cek=' . $id_cek . '&id_cek1=' . $id_cek1 . '&id_cek2=' . $id_cek2 . '&step=' . $step . '">Klik untuk Reject</a></p>
                        ', // Body dalam format HTML
                        'text/html'  // Tipe MIME untuk HTML
                );

    // Mengirim email
    try {
        $result = $mailer->send($message);
        echo 'Email sent successfully!';
    } catch (Exception $e) {
        echo 'Failed to send email: ' . $e->getMessage();
    }
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>