<?php
    //Memanggil conn.php yang telah kita buat sebelumnya
    ini_set("error_reporting", 1);
    session_start();
    include "koneksi.php";

    $nokk = $_GET['nokk'];
    // Syntax MySql untuk melihat semua record yang
    // ada di tabel animal
    
    //Execetute Query diatas
    $query = mysqli_query("SELECT * FROM tbl_schedule WHERE nokk = '$nokk' ORDER BY id ASC",$con);
    while($dt=mysqli_fetch_array($query)){
        $item0=$dt["langganan"];
        $item=$dt["no_order"];
        $item2=$dt["po"];
    }
    
    //Menampung data yang dihasilkan
    $json = array(
        'langganan'     => $item0,
        'no_order'      => $item,
        'po'            => $item2
    );
    
    //Merubah data kedalam bentuk JSON
    header('Content-Type: application/json');
    echo json_encode($json);
?>