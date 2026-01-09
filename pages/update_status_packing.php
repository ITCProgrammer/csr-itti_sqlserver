<?php
// Menghubungkan ke database
include "../koneksi.php";

// Aktifkan error reporting untuk debugging (sebaiknya matikan di production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Mendapatkan parameter id dan demand dari query string
$id = isset($_GET['id']) ? $_GET['id'] : null;
$demand = isset($_GET['demand']) ? $_GET['demand'] : null;

// Cek apakah id diterima
if ($id) {
    // Query untuk memperbarui status dan informasi lainnya
    $query = "UPDATE tbl_schedule_packing SET `status` = 'selesai', tgl_update = NOW(), ket_status = 'Input LapPackingNew' WHERE id = ?";

    // Persiapkan statement
    if ($stmt = $con->prepare($query)) {
        // Bind parameter
        $stmt->bind_param('i', $id);  // 'i' artinya integer untuk id

        // Eksekusi query
        if ($stmt->execute()) {
            // Jika update berhasil, lakukan redirect ke halaman yang sesuai
            if ($demand) {
                // Jika parameter demand ada, arahkan ke LapPackingNew-{demand}
                echo "<script>
                        window.location.href = 'LapPackingNew-" . $demand . "';
                      </script>";
            } else {
                // Jika tidak ada parameter demand, arahkan ke halaman SchedulePacking
                echo "<script>
                        window.location.href = 'SchedulePacking';
                      </script>";
            }
        } else {
            // Jika eksekusi query gagal, tampilkan error dan redirect ke SchedulePacking
            echo "<script>
                    window.location.href = 'SchedulePacking';
                  </script>";
        }

        // Tutup statement setelah eksekusi
        $stmt->close();
    } else {
        // Jika query tidak berhasil dipersiapkan, tampilkan error dan redirect ke SchedulePacking
        echo "<script>
                window.location.href = 'SchedulePacking';
              </script>";
    }
} else {
    // Jika id tidak ditemukan, redirect ke SchedulePacking
    echo "<script>
            window.location.href = 'SchedulePacking';
          </script>";
}
?>
