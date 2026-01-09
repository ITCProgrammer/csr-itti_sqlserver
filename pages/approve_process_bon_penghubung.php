<?php
session_start();
// Pastikan sudah menghubungkan ke database
include '../koneksi.php';

// Ambil data nodemand dan action yang dikirimkan dari request
if (isset($_POST['nodemand']) && isset($_POST['action'])) {
    $nodemand = $_POST['nodemand'];
    $action = $_POST['action'];

    // Cek jika nilai nodemand ada
    if (empty($nodemand)) {
        echo "nodemand tidak valid.";
        exit; // Keluar jika nodemand kosong
    }

    // Debugging: Periksa data yang ada sebelum update
    $checkQuery = "SELECT * FROM tbl_bonpenghubung_mail WHERE nodemand = ?";
    if ($checkStmt = $con->prepare($checkQuery)) {
        $checkStmt->bind_param("i", $nodemand); // Pastikan tipe data sesuai
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();
        if ($checkResult->num_rows > 0) {
            $row = $checkResult->fetch_assoc();
            echo "Data sebelum update: " . print_r($row, true); // Debugging data sebelum update
        } else {
            echo "Data dengan nodemand $nodemand tidak ditemukan.";
            exit;
        }
        $checkStmt->close();
    } else {
        echo "Gagal menyiapkan query untuk pengecekan: " . $con->error;
        exit;
    }

    // Tentukan query update berdasarkan action (approve/reject)
    if ($action === "approve") {
        $status = '1'; 
        $approve = $_SESSION['nama1'].'-('.$_SESSION['dept'].')';
        $sql = "UPDATE tbl_bonpenghubung_mail SET status_approve = ?, approve_mkt=? WHERE nodemand = ?";
    } elseif ($action === "reject") {
        $status = '99';
        $approve = $_SESSION['nama1'].'-('.$_SESSION['dept'].')';
        $sql = "UPDATE tbl_bonpenghubung_mail SET status_approve = ?, approve_mkt=? WHERE nodemand = ?";
    } elseif ($action === "closeApprove") {
        $status = '2'; 
        $approve = $_SESSION['nama1'].'-('.$_SESSION['dept'].')';
        $sql = "UPDATE tbl_bonpenghubung_mail SET status_approve = ?, closed_ppc=? WHERE nodemand = ?";
    } else {
        echo "Action tidak valid.";
        exit;
    }

    // Update status approve/reject di database berdasarkan nodemand dan action
    if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param("isi", $status, $approve, $nodemand); // Gantilah "i" jika nodemand adalah angka
        if ($stmt->execute()) {
            // Jika action adalah approve, kirim email
            if ($action === "approve") {
                require '../vendor/autoload.php';
                // Setup PHPMailer
                $mail = new PHPMailer\PHPMailer\PHPMailer();
                // Konfigurasi server SMTP
                $mail->isSMTP();
                $mail->Host       = 'mail.indotaichen.com'; // Ganti dengan host SMTP Anda
                $mail->SMTPAuth   = true;
                $mail->Username   = 'dept.it@indotaichen.com'; // Ganti dengan email Anda
                $mail->Password   = 'Xr7PzUWoyPA';             // Ganti dengan password Anda
                $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;
                $mail->setFrom('dept.it@indotaichen.com', 'DEPT IT');
                $mail->addAddress('qcf.adm@indotaichen.com', 'ADM QCF');
                // $mail->addAddress('arif.efendi@indotaichen.com', 'Arif Efendi');
                $mail->addAddress('tobias.sulistiyo@indotaichen.com', 'TOBIAS');
                $user_email = mysqli_query($con, "SELECT * FROM email_user_penghubung WHERE dept='PPC'");
                $listmail   = [];
                while ($data_email = mysqli_fetch_array($user_email)) {
                    $langganan= mysqli_query($con, "SELECT * FROM tbl_qcf WHERE nodemand = '$nodemand' ");
                    $data_langganan = mysqli_fetch_assoc($langganan);
                    if (stripos($data_langganan['pelanggan'], $data_email['sales_detail']) !== false) {
                        $listmail[] = $data_email;
                        $mail->addAddress($data_email['email'], $data_email['user']);
                    }
                }

                $mail->Subject = 'Closed Bon Penghubung QCF';
                $mail->isHTML(true);
                $mail->Body = "<p>Dear PPC Teams,</p>
                               <p>Mohon ditindaklanjuti terkait Approval Bon Penghubung.</p>
                               <p>Bon Penghubung sebelumnya sudah di Approve oleh $_SESSION[nama1]-($_SESSION[dept])</p>
                               <p>Mohon untuk dapat CLOSED Bon Penghubung ini</p>
                               <p>&nbsp;</p>
                               <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sebelum melakukan CLOSE, Mohon untuk login terlebih dahulu <a href='online.indotaichen.com/Qc-Final-New'>Login</a></p>
                               <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Anda dapat melakukan CLOSED pada link berikut: <a href='online.indotaichen.com/Qc-Final-New/ApproveBonPenghubung-" . htmlspecialchars($nodemand) . "'>Closed Bon Penghubung</a></p>
                               <p>&nbsp;</p>";
                if ($mail->send()) {
                    echo "Update dan email berhasil dikirim!";
                } else {
                    echo "Gagal mengirim email.";
                }
            } else {
                // Jika action adalah reject, tidak ada email yang dikirim
                echo "Update status berhasil! Tidak ada email yang dikirim karena status REJECT.";
            }
        } else {
            // Menampilkan error jika eksekusi gagal
            echo "Gagal mengupdate status di database: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Gagal menyiapkan query: " . $con->error;
        exit;
    }

    // Debugging: Periksa data setelah update
    $checkStmt = $con->prepare($checkQuery);
    $checkStmt->bind_param("i", $nodemand);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();
    if ($checkResult->num_rows > 0) {
        $row = $checkResult->fetch_assoc();
        echo "Data setelah update: " . print_r($row, true); // Debugging data setelah update
    } else {
        echo "Data dengan nodemand $nodemand tidak ditemukan.";
    }
    $checkStmt->close();

    $con->close();
} else {
    echo "nodemand atau action tidak ditemukan.";
}
