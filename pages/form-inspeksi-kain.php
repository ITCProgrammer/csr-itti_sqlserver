<?php 
    $nokk   = $_GET['nokk'];
    $roll   = $_GET['roll'];

    if ($nokk && $roll){
        $sql_nokk   = mysql_query("SELECT  * FROM tbl_inspeksi_kain WHERE nokk = '$nokk' AND roll_no ='$roll'", $con);
        $dataNokk   = mysql_fetch_assoc($sql_nokk);
        
        $ket_inspek   = mysql_query("SELECT  * FROM tbl_inspeksi_kain WHERE nokk = '$nokk'", $con);
        $dataket_inspek   = mysql_fetch_assoc($ket_inspek);

        $sql_defect   = mysql_query("SELECT * FROM tbl_defect_inspeksi_kain a LEFT JOIN ( SELECT * FROM tbl_inspeksi_kain b) b ON a.id_inspek_kain = b.id WHERE b.nokk = '$nokk' AND b.roll_no = '$roll'", $con);
        $dataDefect   = mysql_fetch_assoc($sql_defect);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>::DIT - STOK IN:</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="bower_components/chosen/chosen.min.css" rel="stylesheet">
    <link rel="stylesheet" href="chosen/docsupport/prism.css">
    <link rel="stylesheet" href="chosen/chosen.css">
</head>

<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="dist/jquery.mask.min.js"></script>
<script type="text/javascript">
    function proses_nokk(){
        var nokk = document.getElementById("nokk").value;

        if (nokk == 0) {
            window.location.href='FormInspeksiKain';
        }else{
            window.location.href='FormInspeksiKain-'+nokk;
        }
    }

    function proses_roll() {
        var nokk    = document.getElementById("nokk").value;
        var roll_no = document.getElementById("roll_no").value;

        if (nokk == 0) {
            swal({
                title: 'Nomor KK tidak boleh kosong',   
                text: 'Klik Ok untuk input data kembali',
                type: 'error'
                });
        }else if (roll_no == ""){
            swal({
                title: 'Nomor Roll tidak boleh kosong',   
                text: 'Klik Ok untuk input data kembali',
                type: 'error'
                });
        } else {
            window.location.href='FormInspeksiKain&'+nokk+'&'+roll_no;
        }
    }

    function PrintPreview() {
        var nokk           = document.getElementById("nokk").value;
        var form_inspek    = document.getElementById("form_inspek").value;
        var userid  = '<?= $_SESSION['usrid']; ?>';

        if (nokk == 0) {
            swal({
                title: 'Nomor KK tidak boleh kosong',   
                text: 'Klik Ok untuk memilih nomor kk kembali',
                type: 'error'
                });
        }else{
            window.location.href='pages/cetak/PrintPreview-InspeksiKain.php?nokk='+nokk+'&userid='+userid+'&form='+form_inspek;
        }
    }

    function fnc_number() {
        var point   = document.getElementById("point").value;

        // SLUBB
            var slubNumber_1  = document.getElementById("slubNumber_1");
            var slubNumber_2  = document.getElementById("slubNumber_2");
            var slubNumber_3  = document.getElementById("slubNumber_3");
            var slubNumber_4  = document.getElementById("slubNumber_4");

            if (point == 1) {
                slubNumber_1.style.display = "block"; // muncul
                slubNumber_2.style.display = "none"; // tidak muncul
                slubNumber_3.style.display = "none"; // tidak muncul
                slubNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                slubNumber_1.style.display = "none"; // tidak muncul
                slubNumber_2.style.display = "block"; // muncul
                slubNumber_3.style.display = "none"; // tidak muncul
                slubNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                slubNumber_1.style.display = "none"; // tidak muncul
                slubNumber_2.style.display = "none"; // tidak muncul
                slubNumber_3.style.display = "block"; // muncul
                slubNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                slubNumber_1.style.display = "none"; // tidak muncul
                slubNumber_2.style.display = "none"; // tidak muncul
                slubNumber_3.style.display = "none"; // tidak muncul
                slubNumber_4.style.display = "block"; // muncul
            }else {
                slubNumber_1.style.display = "none"; // tidak muncul
                slubNumber_2.style.display = "none"; // tidak muncul
                slubNumber_3.style.display = "none"; // tidak muncul
                slubNumber_4.style.display = "none"; // tidak muncul
            }
        // SLUBB
        
        // BARRE DEFACT
            var barredefectNumber_1  = document.getElementById("barredefectNumber_1");
            var barredefectNumber_2  = document.getElementById("barredefectNumber_2");
            var barredefectNumber_3  = document.getElementById("barredefectNumber_3");
            var barredefectNumber_4  = document.getElementById("barredefectNumber_4");

            if (point == 1) {
                barredefectNumber_1.style.display = "block"; // muncul
                barredefectNumber_2.style.display = "none"; // tidak muncul
                barredefectNumber_3.style.display = "none"; // tidak muncul
                barredefectNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                barredefectNumber_1.style.display = "none"; // tidak muncul
                barredefectNumber_2.style.display = "block"; // muncul
                barredefectNumber_3.style.display = "none"; // tidak muncul
                barredefectNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                barredefectNumber_1.style.display = "none"; // tidak muncul
                barredefectNumber_2.style.display = "none"; // tidak muncul
                barredefectNumber_3.style.display = "block"; // muncul
                barredefectNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                barredefectNumber_1.style.display = "none"; // tidak muncul
                barredefectNumber_2.style.display = "none"; // tidak muncul
                barredefectNumber_3.style.display = "none"; // tidak muncul
                barredefectNumber_4.style.display = "block"; // muncul
            }else {
                barredefectNumber_1.style.display = "none"; // tidak muncul
                barredefectNumber_2.style.display = "none"; // tidak muncul
                barredefectNumber_3.style.display = "none"; // tidak muncul
                barredefectNumber_4.style.display = "none"; // tidak muncul
            }
        // BARRE DEFACT
        
        // UEVEN
            var unevenNumber_1  = document.getElementById("unevenNumber_1");
            var unevenNumber_2  = document.getElementById("unevenNumber_2");
            var unevenNumber_3  = document.getElementById("unevenNumber_3");
            var unevenNumber_4  = document.getElementById("unevenNumber_4");

            if (point == 1) {
                unevenNumber_1.style.display = "block"; // muncul
                unevenNumber_2.style.display = "none"; // tidak muncul
                unevenNumber_3.style.display = "none"; // tidak muncul
                unevenNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                unevenNumber_1.style.display = "none"; // tidak muncul
                unevenNumber_2.style.display = "block"; // muncul
                unevenNumber_3.style.display = "none"; // tidak muncul
                unevenNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                unevenNumber_1.style.display = "none"; // tidak muncul
                unevenNumber_2.style.display = "none"; // tidak muncul
                unevenNumber_3.style.display = "block"; // muncul
                unevenNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                unevenNumber_1.style.display = "none"; // tidak muncul
                unevenNumber_2.style.display = "none"; // tidak muncul
                unevenNumber_3.style.display = "none"; // tidak muncul
                unevenNumber_4.style.display = "block"; // muncul
            }else {
                unevenNumber_1.style.display = "none"; // tidak muncul
                unevenNumber_2.style.display = "none"; // tidak muncul
                unevenNumber_3.style.display = "none"; // tidak muncul
                unevenNumber_4.style.display = "none"; // tidak muncul
            }
        // UEVEN
        
        // YARN
            var yarnNumber_1  = document.getElementById("yarnNumber_1");
            var yarnNumber_2  = document.getElementById("yarnNumber_2");
            var yarnNumber_3  = document.getElementById("yarnNumber_3");
            var yarnNumber_4  = document.getElementById("yarnNumber_4");

            if (point == 1) {
                yarnNumber_1.style.display = "block"; // muncul
                yarnNumber_2.style.display = "none"; // tidak muncul
                yarnNumber_3.style.display = "none"; // tidak muncul
                yarnNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                yarnNumber_1.style.display = "none"; // tidak muncul
                yarnNumber_2.style.display = "block"; // muncul
                yarnNumber_3.style.display = "none"; // tidak muncul
                yarnNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                yarnNumber_1.style.display = "none"; // tidak muncul
                yarnNumber_2.style.display = "none"; // tidak muncul
                yarnNumber_3.style.display = "block"; // muncul
                yarnNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                yarnNumber_1.style.display = "none"; // tidak muncul
                yarnNumber_2.style.display = "none"; // tidak muncul
                yarnNumber_3.style.display = "none"; // tidak muncul
                yarnNumber_4.style.display = "block"; // muncul
            }else {
                yarnNumber_1.style.display = "none"; // tidak muncul
                yarnNumber_2.style.display = "none"; // tidak muncul
                yarnNumber_3.style.display = "none"; // tidak muncul
                yarnNumber_4.style.display = "none"; // tidak muncul
            }
        // YARN
       
        // NEPS
            var nepsNumber_1  = document.getElementById("nepsNumber_1");
            var nepsNumber_2  = document.getElementById("nepsNumber_2");
            var nepsNumber_3  = document.getElementById("nepsNumber_3");
            var nepsNumber_4  = document.getElementById("nepsNumber_4");

            if (point == 1) {
                nepsNumber_1.style.display = "block"; // muncul
                nepsNumber_2.style.display = "none"; // tidak muncul
                nepsNumber_3.style.display = "none"; // tidak muncul
                nepsNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                nepsNumber_1.style.display = "none"; // tidak muncul
                nepsNumber_2.style.display = "block"; // muncul
                nepsNumber_3.style.display = "none"; // tidak muncul
                nepsNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                nepsNumber_1.style.display = "none"; // tidak muncul
                nepsNumber_2.style.display = "none"; // tidak muncul
                nepsNumber_3.style.display = "block"; // muncul
                nepsNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                nepsNumber_1.style.display = "none"; // tidak muncul
                nepsNumber_2.style.display = "none"; // tidak muncul
                nepsNumber_3.style.display = "none"; // tidak muncul
                nepsNumber_4.style.display = "block"; // muncul
            }else {
                nepsNumber_1.style.display = "none"; // tidak muncul
                nepsNumber_2.style.display = "none"; // tidak muncul
                nepsNumber_3.style.display = "none"; // tidak muncul
                nepsNumber_4.style.display = "none"; // tidak muncul
            }
        // NEPS
        
        // MISC
            var miscNumber_1  = document.getElementById("miscNumber_1");
            var miscNumber_2  = document.getElementById("miscNumber_2");
            var miscNumber_3  = document.getElementById("miscNumber_3");
            var miscNumber_4  = document.getElementById("miscNumber_4");

            if (point == 1) {
                miscNumber_1.style.display = "block"; // muncul
                miscNumber_2.style.display = "none"; // tidak muncul
                miscNumber_3.style.display = "none"; // tidak muncul
                miscNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                miscNumber_1.style.display = "none"; // tidak muncul
                miscNumber_2.style.display = "block"; // muncul
                miscNumber_3.style.display = "none"; // tidak muncul
                miscNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                miscNumber_1.style.display = "none"; // tidak muncul
                miscNumber_2.style.display = "none"; // tidak muncul
                miscNumber_3.style.display = "block"; // muncul
                miscNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                miscNumber_1.style.display = "none"; // tidak muncul
                miscNumber_2.style.display = "none"; // tidak muncul
                miscNumber_3.style.display = "none"; // tidak muncul
                miscNumber_4.style.display = "block"; // muncul
            }else {
                miscNumber_1.style.display = "none"; // tidak muncul
                miscNumber_2.style.display = "none"; // tidak muncul
                miscNumber_3.style.display = "none"; // tidak muncul
                miscNumber_4.style.display = "none"; // tidak muncul
            }
        // MISC
        
        // MISSING
            var missingNumber_1  = document.getElementById("missingNumber_1");
            var missingNumber_2  = document.getElementById("missingNumber_2");
            var missingNumber_3  = document.getElementById("missingNumber_3");
            var missingNumber_4  = document.getElementById("missingNumber_4");

            if (point == 1) {
                missingNumber_1.style.display = "block"; // muncul
                missingNumber_2.style.display = "none"; // tidak muncul
                missingNumber_3.style.display = "none"; // tidak muncul
                missingNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                missingNumber_1.style.display = "none"; // tidak muncul
                missingNumber_2.style.display = "block"; // muncul
                missingNumber_3.style.display = "none"; // tidak muncul
                missingNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                missingNumber_1.style.display = "none"; // tidak muncul
                missingNumber_2.style.display = "none"; // tidak muncul
                missingNumber_3.style.display = "block"; // muncul
                missingNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                missingNumber_1.style.display = "none"; // tidak muncul
                missingNumber_2.style.display = "none"; // tidak muncul
                missingNumber_3.style.display = "none"; // tidak muncul
                missingNumber_4.style.display = "block"; // muncul
            }else {
                missingNumber_1.style.display = "none"; // tidak muncul
                missingNumber_2.style.display = "none"; // tidak muncul
                missingNumber_3.style.display = "none"; // tidak muncul
                missingNumber_4.style.display = "none"; // tidak muncul
            }
        // MISSING
        
        // HOLES
            var holesNumber_1  = document.getElementById("holesNumber_1");
            var holesNumber_2  = document.getElementById("holesNumber_2");
            var holesNumber_3  = document.getElementById("holesNumber_3");
            var holesNumber_4  = document.getElementById("holesNumber_4");

            if (point == 1) {
                holesNumber_1.style.display = "block"; // muncul
                holesNumber_2.style.display = "none"; // tidak muncul
                holesNumber_3.style.display = "none"; // tidak muncul
                holesNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                holesNumber_1.style.display = "none"; // tidak muncul
                holesNumber_2.style.display = "block"; // muncul
                holesNumber_3.style.display = "none"; // tidak muncul
                holesNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                holesNumber_1.style.display = "none"; // tidak muncul
                holesNumber_2.style.display = "none"; // tidak muncul
                holesNumber_3.style.display = "block"; // muncul
                holesNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                holesNumber_1.style.display = "none"; // tidak muncul
                holesNumber_2.style.display = "none"; // tidak muncul
                holesNumber_3.style.display = "none"; // tidak muncul
                holesNumber_4.style.display = "block"; // muncul
            }else {
                holesNumber_1.style.display = "none"; // tidak muncul
                holesNumber_2.style.display = "none"; // tidak muncul
                holesNumber_3.style.display = "none"; // tidak muncul
                holesNumber_4.style.display = "none"; // tidak muncul
            }
        // HOLES
       
        // STEAKS
            var steaksNumber_1  = document.getElementById("steaksNumber_1");
            var steaksNumber_2  = document.getElementById("steaksNumber_2");
            var steaksNumber_3  = document.getElementById("steaksNumber_3");
            var steaksNumber_4  = document.getElementById("steaksNumber_4");

            if (point == 1) {
                steaksNumber_1.style.display = "block"; // muncul
                steaksNumber_2.style.display = "none"; // tidak muncul
                steaksNumber_3.style.display = "none"; // tidak muncul
                steaksNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                steaksNumber_1.style.display = "none"; // tidak muncul
                steaksNumber_2.style.display = "block"; // muncul
                steaksNumber_3.style.display = "none"; // tidak muncul
                steaksNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                steaksNumber_1.style.display = "none"; // tidak muncul
                steaksNumber_2.style.display = "none"; // tidak muncul
                steaksNumber_3.style.display = "block"; // muncul
                steaksNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                steaksNumber_1.style.display = "none"; // tidak muncul
                steaksNumber_2.style.display = "none"; // tidak muncul
                steaksNumber_3.style.display = "none"; // tidak muncul
                steaksNumber_4.style.display = "block"; // muncul
            }else {
                steaksNumber_1.style.display = "none"; // tidak muncul
                steaksNumber_2.style.display = "none"; // tidak muncul
                steaksNumber_3.style.display = "none"; // tidak muncul
                steaksNumber_4.style.display = "none"; // tidak muncul
            }
        // STEAKS
        
        // MISKNIT
            var misknitNumber_1  = document.getElementById("misknitNumber_1");
            var misknitNumber_2  = document.getElementById("misknitNumber_2");
            var misknitNumber_3  = document.getElementById("misknitNumber_3");
            var misknitNumber_4  = document.getElementById("misknitNumber_4");

            if (point == 1) {
                misknitNumber_1.style.display = "block"; // muncul
                misknitNumber_2.style.display = "none"; // tidak muncul
                misknitNumber_3.style.display = "none"; // tidak muncul
                misknitNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                misknitNumber_1.style.display = "none"; // tidak muncul
                misknitNumber_2.style.display = "block"; // muncul
                misknitNumber_3.style.display = "none"; // tidak muncul
                misknitNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                misknitNumber_1.style.display = "none"; // tidak muncul
                misknitNumber_2.style.display = "none"; // tidak muncul
                misknitNumber_3.style.display = "block"; // muncul
                misknitNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                misknitNumber_1.style.display = "none"; // tidak muncul
                misknitNumber_2.style.display = "none"; // tidak muncul
                misknitNumber_3.style.display = "none"; // tidak muncul
                misknitNumber_4.style.display = "block"; // muncul
            }else {
                misknitNumber_1.style.display = "none"; // tidak muncul
                misknitNumber_2.style.display = "none"; // tidak muncul
                misknitNumber_3.style.display = "none"; // tidak muncul
                misknitNumber_4.style.display = "none"; // tidak muncul
            }
        // MISKNIT
        
        // KNOT
            var knotNumber_1  = document.getElementById("knotNumber_1");
            var knotNumber_2  = document.getElementById("knotNumber_2");
            var knotNumber_3  = document.getElementById("knotNumber_3");
            var knotNumber_4  = document.getElementById("knotNumber_4");

            if (point == 1) {
                knotNumber_1.style.display = "block"; // muncul
                knotNumber_2.style.display = "none"; // tidak muncul
                knotNumber_3.style.display = "none"; // tidak muncul
                knotNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                knotNumber_1.style.display = "none"; // tidak muncul
                knotNumber_2.style.display = "block"; // muncul
                knotNumber_3.style.display = "none"; // tidak muncul
                knotNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                knotNumber_1.style.display = "none"; // tidak muncul
                knotNumber_2.style.display = "none"; // tidak muncul
                knotNumber_3.style.display = "block"; // muncul
                knotNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                knotNumber_1.style.display = "none"; // tidak muncul
                knotNumber_2.style.display = "none"; // tidak muncul
                knotNumber_3.style.display = "none"; // tidak muncul
                knotNumber_4.style.display = "block"; // muncul
            }else {
                knotNumber_1.style.display = "none"; // tidak muncul
                knotNumber_2.style.display = "none"; // tidak muncul
                knotNumber_3.style.display = "none"; // tidak muncul
                knotNumber_4.style.display = "none"; // tidak muncul
            }
        // KNOT
    
        // OIL
            var oilNumber_1  = document.getElementById("oilNumber_1");
            var oilNumber_2  = document.getElementById("oilNumber_2");
            var oilNumber_3  = document.getElementById("oilNumber_3");
            var oilNumber_4  = document.getElementById("oilNumber_4");

            if (point == 1) {
                oilNumber_1.style.display = "block"; // muncul
                oilNumber_2.style.display = "none"; // tidak muncul
                oilNumber_3.style.display = "none"; // tidak muncul
                oilNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                oilNumber_1.style.display = "none"; // tidak muncul
                oilNumber_2.style.display = "block"; // muncul
                oilNumber_3.style.display = "none"; // tidak muncul
                oilNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                oilNumber_1.style.display = "none"; // tidak muncul
                oilNumber_2.style.display = "none"; // tidak muncul
                oilNumber_3.style.display = "block"; // muncul
                oilNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                oilNumber_1.style.display = "none"; // tidak muncul
                oilNumber_2.style.display = "none"; // tidak muncul
                oilNumber_3.style.display = "none"; // tidak muncul
                oilNumber_4.style.display = "block"; // muncul
            }else {
                oilNumber_1.style.display = "none"; // tidak muncul
                oilNumber_2.style.display = "none"; // tidak muncul
                oilNumber_3.style.display = "none"; // tidak muncul
                oilNumber_4.style.display = "none"; // tidak muncul
            }
        // OIL
        
        // FLY
            var flyNumber_1  = document.getElementById("flyNumber_1");
            var flyNumber_2  = document.getElementById("flyNumber_2");
            var flyNumber_3  = document.getElementById("flyNumber_3");
            var flyNumber_4  = document.getElementById("flyNumber_4");

            if (point == 1) {
                flyNumber_1.style.display = "block"; // muncul
                flyNumber_2.style.display = "none"; // tidak muncul
                flyNumber_3.style.display = "none"; // tidak muncul
                flyNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                flyNumber_1.style.display = "none"; // tidak muncul
                flyNumber_2.style.display = "block"; // muncul
                flyNumber_3.style.display = "none"; // tidak muncul
                flyNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                flyNumber_1.style.display = "none"; // tidak muncul
                flyNumber_2.style.display = "none"; // tidak muncul
                flyNumber_3.style.display = "block"; // muncul
                flyNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                flyNumber_1.style.display = "none"; // tidak muncul
                flyNumber_2.style.display = "none"; // tidak muncul
                flyNumber_3.style.display = "none"; // tidak muncul
                flyNumber_4.style.display = "block"; // muncul
            }else {
                flyNumber_1.style.display = "none"; // tidak muncul
                flyNumber_2.style.display = "none"; // tidak muncul
                flyNumber_3.style.display = "none"; // tidak muncul
                flyNumber_4.style.display = "none"; // tidak muncul
            }
        // FLY
        
        // MISC2
            var misc2Number_1  = document.getElementById("misc2Number_1");
            var misc2Number_2  = document.getElementById("misc2Number_2");
            var misc2Number_3  = document.getElementById("misc2Number_3");
            var misc2Number_4  = document.getElementById("misc2Number_4");

            if (point == 1) {
                misc2Number_1.style.display = "block"; // muncul
                misc2Number_2.style.display = "none"; // tidak muncul
                misc2Number_3.style.display = "none"; // tidak muncul
                misc2Number_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                misc2Number_1.style.display = "none"; // tidak muncul
                misc2Number_2.style.display = "block"; // muncul
                misc2Number_3.style.display = "none"; // tidak muncul
                misc2Number_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                misc2Number_1.style.display = "none"; // tidak muncul
                misc2Number_2.style.display = "none"; // tidak muncul
                misc2Number_3.style.display = "block"; // muncul
                misc2Number_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                misc2Number_1.style.display = "none"; // tidak muncul
                misc2Number_2.style.display = "none"; // tidak muncul
                misc2Number_3.style.display = "none"; // tidak muncul
                misc2Number_4.style.display = "block"; // muncul
            }else {
                misc2Number_1.style.display = "none"; // tidak muncul
                misc2Number_2.style.display = "none"; // tidak muncul
                misc2Number_3.style.display = "none"; // tidak muncul
                misc2Number_4.style.display = "none"; // tidak muncul
            }
        // MISC2
        
        // HAIRINESS
            var hairinessNumber_1  = document.getElementById("hairinessNumber_1");
            var hairinessNumber_2  = document.getElementById("hairinessNumber_2");
            var hairinessNumber_3  = document.getElementById("hairinessNumber_3");
            var hairinessNumber_4  = document.getElementById("hairinessNumber_4");

            if (point == 1) {
                hairinessNumber_1.style.display = "block"; // muncul
                hairinessNumber_2.style.display = "none"; // tidak muncul
                hairinessNumber_3.style.display = "none"; // tidak muncul
                hairinessNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                hairinessNumber_1.style.display = "none"; // tidak muncul
                hairinessNumber_2.style.display = "block"; // muncul
                hairinessNumber_3.style.display = "none"; // tidak muncul
                hairinessNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                hairinessNumber_1.style.display = "none"; // tidak muncul
                hairinessNumber_2.style.display = "none"; // tidak muncul
                hairinessNumber_3.style.display = "block"; // muncul
                hairinessNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                hairinessNumber_1.style.display = "none"; // tidak muncul
                hairinessNumber_2.style.display = "none"; // tidak muncul
                hairinessNumber_3.style.display = "none"; // tidak muncul
                hairinessNumber_4.style.display = "block"; // muncul
            }else {
                hairinessNumber_1.style.display = "none"; // tidak muncul
                hairinessNumber_2.style.display = "none"; // tidak muncul
                hairinessNumber_3.style.display = "none"; // tidak muncul
                hairinessNumber_4.style.display = "none"; // tidak muncul
            }
        // HAIRINESS
        
        // HOLES DYE
            var holes_dyeNumber_1  = document.getElementById("holes_dyeNumber_1");
            var holes_dyeNumber_2  = document.getElementById("holes_dyeNumber_2");
            var holes_dyeNumber_3  = document.getElementById("holes_dyeNumber_3");
            var holes_dyeNumber_4  = document.getElementById("holes_dyeNumber_4");

            if (point == 1) {
                holes_dyeNumber_1.style.display = "block"; // muncul
                holes_dyeNumber_2.style.display = "none"; // tidak muncul
                holes_dyeNumber_3.style.display = "none"; // tidak muncul
                holes_dyeNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                holes_dyeNumber_1.style.display = "none"; // tidak muncul
                holes_dyeNumber_2.style.display = "block"; // muncul
                holes_dyeNumber_3.style.display = "none"; // tidak muncul
                holes_dyeNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                holes_dyeNumber_1.style.display = "none"; // tidak muncul
                holes_dyeNumber_2.style.display = "none"; // tidak muncul
                holes_dyeNumber_3.style.display = "block"; // muncul
                holes_dyeNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                holes_dyeNumber_1.style.display = "none"; // tidak muncul
                holes_dyeNumber_2.style.display = "none"; // tidak muncul
                holes_dyeNumber_3.style.display = "none"; // tidak muncul
                holes_dyeNumber_4.style.display = "block"; // muncul
            }else {
                holes_dyeNumber_1.style.display = "none"; // tidak muncul
                holes_dyeNumber_2.style.display = "none"; // tidak muncul
                holes_dyeNumber_3.style.display = "none"; // tidak muncul
                holes_dyeNumber_4.style.display = "none"; // tidak muncul
            }
        // HOLES DYE
        
        // COLOR
            var colorNumber_1  = document.getElementById("colorNumber_1");
            var colorNumber_2  = document.getElementById("colorNumber_2");
            var colorNumber_3  = document.getElementById("colorNumber_3");
            var colorNumber_4  = document.getElementById("colorNumber_4");

            if (point == 1) {
                colorNumber_1.style.display = "block"; // muncul
                colorNumber_2.style.display = "none"; // tidak muncul
                colorNumber_3.style.display = "none"; // tidak muncul
                colorNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                colorNumber_1.style.display = "none"; // tidak muncul
                colorNumber_2.style.display = "block"; // muncul
                colorNumber_3.style.display = "none"; // tidak muncul
                colorNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                colorNumber_1.style.display = "none"; // tidak muncul
                colorNumber_2.style.display = "none"; // tidak muncul
                colorNumber_3.style.display = "block"; // muncul
                colorNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                colorNumber_1.style.display = "none"; // tidak muncul
                colorNumber_2.style.display = "none"; // tidak muncul
                colorNumber_3.style.display = "none"; // tidak muncul
                colorNumber_4.style.display = "block"; // muncul
            }else {
                colorNumber_1.style.display = "none"; // tidak muncul
                colorNumber_2.style.display = "none"; // tidak muncul
                colorNumber_3.style.display = "none"; // tidak muncul
                colorNumber_4.style.display = "none"; // tidak muncul
            }
        // COLOR
        
        // ABRASION
            var abrasionNumber_1  = document.getElementById("abrasionNumber_1");
            var abrasionNumber_2  = document.getElementById("abrasionNumber_2");
            var abrasionNumber_3  = document.getElementById("abrasionNumber_3");
            var abrasionNumber_4  = document.getElementById("abrasionNumber_4");

            if (point == 1) {
                abrasionNumber_1.style.display = "block"; // muncul
                abrasionNumber_2.style.display = "none"; // tidak muncul
                abrasionNumber_3.style.display = "none"; // tidak muncul
                abrasionNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                abrasionNumber_1.style.display = "none"; // tidak muncul
                abrasionNumber_2.style.display = "block"; // muncul
                abrasionNumber_3.style.display = "none"; // tidak muncul
                abrasionNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                abrasionNumber_1.style.display = "none"; // tidak muncul
                abrasionNumber_2.style.display = "none"; // tidak muncul
                abrasionNumber_3.style.display = "block"; // muncul
                abrasionNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                abrasionNumber_1.style.display = "none"; // tidak muncul
                abrasionNumber_2.style.display = "none"; // tidak muncul
                abrasionNumber_3.style.display = "none"; // tidak muncul
                abrasionNumber_4.style.display = "block"; // muncul
            }else {
                abrasionNumber_1.style.display = "none"; // tidak muncul
                abrasionNumber_2.style.display = "none"; // tidak muncul
                abrasionNumber_3.style.display = "none"; // tidak muncul
                abrasionNumber_4.style.display = "none"; // tidak muncul
            }
        // ABRASION
        
        // DYE SPOT
            var dye_spotNumber_1  = document.getElementById("dye_spotNumber_1");
            var dye_spotNumber_2  = document.getElementById("dye_spotNumber_2");
            var dye_spotNumber_3  = document.getElementById("dye_spotNumber_3");
            var dye_spotNumber_4  = document.getElementById("dye_spotNumber_4");

            if (point == 1) {
                dye_spotNumber_1.style.display = "block"; // muncul
                dye_spotNumber_2.style.display = "none"; // tidak muncul
                dye_spotNumber_3.style.display = "none"; // tidak muncul
                dye_spotNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                dye_spotNumber_1.style.display = "none"; // tidak muncul
                dye_spotNumber_2.style.display = "block"; // muncul
                dye_spotNumber_3.style.display = "none"; // tidak muncul
                dye_spotNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                dye_spotNumber_1.style.display = "none"; // tidak muncul
                dye_spotNumber_2.style.display = "none"; // tidak muncul
                dye_spotNumber_3.style.display = "block"; // muncul
                dye_spotNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                dye_spotNumber_1.style.display = "none"; // tidak muncul
                dye_spotNumber_2.style.display = "none"; // tidak muncul
                dye_spotNumber_3.style.display = "none"; // tidak muncul
                dye_spotNumber_4.style.display = "block"; // muncul
            }else {
                dye_spotNumber_1.style.display = "none"; // tidak muncul
                dye_spotNumber_2.style.display = "none"; // tidak muncul
                dye_spotNumber_3.style.display = "none"; // tidak muncul
                dye_spotNumber_4.style.display = "none"; // tidak muncul
            }
        // DYE SPOT
        
        // WRINKLES
            var wrinklesNumber_1  = document.getElementById("wrinklesNumber_1");
            var wrinklesNumber_2  = document.getElementById("wrinklesNumber_2");
            var wrinklesNumber_3  = document.getElementById("wrinklesNumber_3");
            var wrinklesNumber_4  = document.getElementById("wrinklesNumber_4");

            if (point == 1) {
                wrinklesNumber_1.style.display = "block"; // muncul
                wrinklesNumber_2.style.display = "none"; // tidak muncul
                wrinklesNumber_3.style.display = "none"; // tidak muncul
                wrinklesNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                wrinklesNumber_1.style.display = "none"; // tidak muncul
                wrinklesNumber_2.style.display = "block"; // muncul
                wrinklesNumber_3.style.display = "none"; // tidak muncul
                wrinklesNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                wrinklesNumber_1.style.display = "none"; // tidak muncul
                wrinklesNumber_2.style.display = "none"; // tidak muncul
                wrinklesNumber_3.style.display = "block"; // muncul
                wrinklesNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                wrinklesNumber_1.style.display = "none"; // tidak muncul
                wrinklesNumber_2.style.display = "none"; // tidak muncul
                wrinklesNumber_3.style.display = "none"; // tidak muncul
                wrinklesNumber_4.style.display = "block"; // muncul
            }else {
                wrinklesNumber_1.style.display = "none"; // tidak muncul
                wrinklesNumber_2.style.display = "none"; // tidak muncul
                wrinklesNumber_3.style.display = "none"; // tidak muncul
                wrinklesNumber_4.style.display = "none"; // tidak muncul
            }
        // WRINKLES
        
        // BOWING
            var bowingNumber_1  = document.getElementById("bowingNumber_1");
            var bowingNumber_2  = document.getElementById("bowingNumber_2");
            var bowingNumber_3  = document.getElementById("bowingNumber_3");
            var bowingNumber_4  = document.getElementById("bowingNumber_4");

            if (point == 1) {
                bowingNumber_1.style.display = "block"; // muncul
                bowingNumber_2.style.display = "none"; // tidak muncul
                bowingNumber_3.style.display = "none"; // tidak muncul
                bowingNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                bowingNumber_1.style.display = "none"; // tidak muncul
                bowingNumber_2.style.display = "block"; // muncul
                bowingNumber_3.style.display = "none"; // tidak muncul
                bowingNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                bowingNumber_1.style.display = "none"; // tidak muncul
                bowingNumber_2.style.display = "none"; // tidak muncul
                bowingNumber_3.style.display = "block"; // muncul
                bowingNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                bowingNumber_1.style.display = "none"; // tidak muncul
                bowingNumber_2.style.display = "none"; // tidak muncul
                bowingNumber_3.style.display = "none"; // tidak muncul
                bowingNumber_4.style.display = "block"; // muncul
            }else {
                bowingNumber_1.style.display = "none"; // tidak muncul
                bowingNumber_2.style.display = "none"; // tidak muncul
                bowingNumber_3.style.display = "none"; // tidak muncul
                bowingNumber_4.style.display = "none"; // tidak muncul
            }
        // BOWING
        
        // PIN
            var pinNumber_1  = document.getElementById("pinNumber_1");
            var pinNumber_2  = document.getElementById("pinNumber_2");
            var pinNumber_3  = document.getElementById("pinNumber_3");
            var pinNumber_4  = document.getElementById("pinNumber_4");

            if (point == 1) {
                pinNumber_1.style.display = "block"; // muncul
                pinNumber_2.style.display = "none"; // tidak muncul
                pinNumber_3.style.display = "none"; // tidak muncul
                pinNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                pinNumber_1.style.display = "none"; // tidak muncul
                pinNumber_2.style.display = "block"; // muncul
                pinNumber_3.style.display = "none"; // tidak muncul
                pinNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                pinNumber_1.style.display = "none"; // tidak muncul
                pinNumber_2.style.display = "none"; // tidak muncul
                pinNumber_3.style.display = "block"; // muncul
                pinNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                pinNumber_1.style.display = "none"; // tidak muncul
                pinNumber_2.style.display = "none"; // tidak muncul
                pinNumber_3.style.display = "none"; // tidak muncul
                pinNumber_4.style.display = "block"; // muncul
            }else {
                pinNumber_1.style.display = "none"; // tidak muncul
                pinNumber_2.style.display = "none"; // tidak muncul
                pinNumber_3.style.display = "none"; // tidak muncul
                pinNumber_4.style.display = "none"; // tidak muncul
            }
        // PIN
       
        // PICK
            var pickNumber_1  = document.getElementById("pickNumber_1");
            var pickNumber_2  = document.getElementById("pickNumber_2");
            var pickNumber_3  = document.getElementById("pickNumber_3");
            var pickNumber_4  = document.getElementById("pickNumber_4");

            if (point == 1) {
                pickNumber_1.style.display = "block"; // muncul
                pickNumber_2.style.display = "none"; // tidak muncul
                pickNumber_3.style.display = "none"; // tidak muncul
                pickNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                pickNumber_1.style.display = "none"; // tidak muncul
                pickNumber_2.style.display = "block"; // muncul
                pickNumber_3.style.display = "none"; // tidak muncul
                pickNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                pickNumber_1.style.display = "none"; // tidak muncul
                pickNumber_2.style.display = "none"; // tidak muncul
                pickNumber_3.style.display = "block"; // muncul
                pickNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                pickNumber_1.style.display = "none"; // tidak muncul
                pickNumber_2.style.display = "none"; // tidak muncul
                pickNumber_3.style.display = "none"; // tidak muncul
                pickNumber_4.style.display = "block"; // muncul
            }else {
                pickNumber_1.style.display = "none"; // tidak muncul
                pickNumber_2.style.display = "none"; // tidak muncul
                pickNumber_3.style.display = "none"; // tidak muncul
                pickNumber_4.style.display = "none"; // tidak muncul
            }
        // PICK
        
        // KNOT2
            var knot2Number_1  = document.getElementById("knot2Number_1");
            var knot2Number_2  = document.getElementById("knot2Number_2");
            var knot2Number_3  = document.getElementById("knot2Number_3");
            var knot2Number_4  = document.getElementById("knot2Number_4");

            if (point == 1) {
                knot2Number_1.style.display = "block"; // muncul
                knot2Number_2.style.display = "none"; // tidak muncul
                knot2Number_3.style.display = "none"; // tidak muncul
                knot2Number_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                knot2Number_1.style.display = "none"; // tidak muncul
                knot2Number_2.style.display = "block"; // muncul
                knot2Number_3.style.display = "none"; // tidak muncul
                knot2Number_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                knot2Number_1.style.display = "none"; // tidak muncul
                knot2Number_2.style.display = "none"; // tidak muncul
                knot2Number_3.style.display = "block"; // muncul
                knot2Number_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                knot2Number_1.style.display = "none"; // tidak muncul
                knot2Number_2.style.display = "none"; // tidak muncul
                knot2Number_3.style.display = "none"; // tidak muncul
                knot2Number_4.style.display = "block"; // muncul
            }else {
                knot2Number_1.style.display = "none"; // tidak muncul
                knot2Number_2.style.display = "none"; // tidak muncul
                knot2Number_3.style.display = "none"; // tidak muncul
                knot2Number_4.style.display = "none"; // tidak muncul
            }
        // KNOT2
        
        // MISC3
            var misc3Number_1  = document.getElementById("misc3Number_1");
            var misc3Number_2  = document.getElementById("misc3Number_2");
            var misc3Number_3  = document.getElementById("misc3Number_3");
            var misc3Number_4  = document.getElementById("misc3Number_4");

            if (point == 1) {
                misc3Number_1.style.display = "block"; // muncul
                misc3Number_2.style.display = "none"; // tidak muncul
                misc3Number_3.style.display = "none"; // tidak muncul
                misc3Number_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                misc3Number_1.style.display = "none"; // tidak muncul
                misc3Number_2.style.display = "block"; // muncul
                misc3Number_3.style.display = "none"; // tidak muncul
                misc3Number_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                misc3Number_1.style.display = "none"; // tidak muncul
                misc3Number_2.style.display = "none"; // tidak muncul
                misc3Number_3.style.display = "block"; // muncul
                misc3Number_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                misc3Number_1.style.display = "none"; // tidak muncul
                misc3Number_2.style.display = "none"; // tidak muncul
                misc3Number_3.style.display = "none"; // tidak muncul
                misc3Number_4.style.display = "block"; // muncul
            }else {
                misc3Number_1.style.display = "none"; // tidak muncul
                misc3Number_2.style.display = "none"; // tidak muncul
                misc3Number_3.style.display = "none"; // tidak muncul
                misc3Number_4.style.display = "none"; // tidak muncul
            }
        // MISC3
        
        // UEVEN
            var uevenNumber_1  = document.getElementById("uevenNumber_1");
            var uevenNumber_2  = document.getElementById("uevenNumber_2");
            var uevenNumber_3  = document.getElementById("uevenNumber_3");
            var uevenNumber_4  = document.getElementById("uevenNumber_4");

            if (point == 1) {
                uevenNumber_1.style.display = "block"; // muncul
                uevenNumber_2.style.display = "none"; // tidak muncul
                uevenNumber_3.style.display = "none"; // tidak muncul
                uevenNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                uevenNumber_1.style.display = "none"; // tidak muncul
                uevenNumber_2.style.display = "block"; // muncul
                uevenNumber_3.style.display = "none"; // tidak muncul
                uevenNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                uevenNumber_1.style.display = "none"; // tidak muncul
                uevenNumber_2.style.display = "none"; // tidak muncul
                uevenNumber_3.style.display = "block"; // muncul
                uevenNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                uevenNumber_1.style.display = "none"; // tidak muncul
                uevenNumber_2.style.display = "none"; // tidak muncul
                uevenNumber_3.style.display = "none"; // tidak muncul
                uevenNumber_4.style.display = "block"; // muncul
            }else {
                uevenNumber_1.style.display = "none"; // tidak muncul
                uevenNumber_2.style.display = "none"; // tidak muncul
                uevenNumber_3.style.display = "none"; // tidak muncul
                uevenNumber_4.style.display = "none"; // tidak muncul
            }
        // UEVEN
        
        // STAINS
            var stainsNumber_1  = document.getElementById("stainsNumber_1");
            var stainsNumber_2  = document.getElementById("stainsNumber_2");
            var stainsNumber_3  = document.getElementById("stainsNumber_3");
            var stainsNumber_4  = document.getElementById("stainsNumber_4");

            if (point == 1) {
                stainsNumber_1.style.display = "block"; // muncul
                stainsNumber_2.style.display = "none"; // tidak muncul
                stainsNumber_3.style.display = "none"; // tidak muncul
                stainsNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                stainsNumber_1.style.display = "none"; // tidak muncul
                stainsNumber_2.style.display = "block"; // muncul
                stainsNumber_3.style.display = "none"; // tidak muncul
                stainsNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                stainsNumber_1.style.display = "none"; // tidak muncul
                stainsNumber_2.style.display = "none"; // tidak muncul
                stainsNumber_3.style.display = "block"; // muncul
                stainsNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                stainsNumber_1.style.display = "none"; // tidak muncul
                stainsNumber_2.style.display = "none"; // tidak muncul
                stainsNumber_3.style.display = "none"; // tidak muncul
                stainsNumber_4.style.display = "block"; // muncul
            }else {
                stainsNumber_1.style.display = "none"; // tidak muncul
                stainsNumber_2.style.display = "none"; // tidak muncul
                stainsNumber_3.style.display = "none"; // tidak muncul
                stainsNumber_4.style.display = "none"; // tidak muncul
            }
        // STAINS
        
        // OIL GREASE
            var oil_greaseNumber_1  = document.getElementById("oil_greaseNumber_1");
            var oil_greaseNumber_2  = document.getElementById("oil_greaseNumber_2");
            var oil_greaseNumber_3  = document.getElementById("oil_greaseNumber_3");
            var oil_greaseNumber_4  = document.getElementById("oil_greaseNumber_4");

            if (point == 1) {
                oil_greaseNumber_1.style.display = "block"; // muncul
                oil_greaseNumber_2.style.display = "none"; // tidak muncul
                oil_greaseNumber_3.style.display = "none"; // tidak muncul
                oil_greaseNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                oil_greaseNumber_1.style.display = "none"; // tidak muncul
                oil_greaseNumber_2.style.display = "block"; // muncul
                oil_greaseNumber_3.style.display = "none"; // tidak muncul
                oil_greaseNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                oil_greaseNumber_1.style.display = "none"; // tidak muncul
                oil_greaseNumber_2.style.display = "none"; // tidak muncul
                oil_greaseNumber_3.style.display = "block"; // muncul
                oil_greaseNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                oil_greaseNumber_1.style.display = "none"; // tidak muncul
                oil_greaseNumber_2.style.display = "none"; // tidak muncul
                oil_greaseNumber_3.style.display = "none"; // tidak muncul
                oil_greaseNumber_4.style.display = "block"; // muncul
            }else {
                oil_greaseNumber_1.style.display = "none"; // tidak muncul
                oil_greaseNumber_2.style.display = "none"; // tidak muncul
                oil_greaseNumber_3.style.display = "none"; // tidak muncul
                oil_greaseNumber_4.style.display = "none"; // tidak muncul
            }
        // OIL GREASE
        
        // DIRT
            var dirtNumber_1  = document.getElementById("dirtNumber_1");
            var dirtNumber_2  = document.getElementById("dirtNumber_2");
            var dirtNumber_3  = document.getElementById("dirtNumber_3");
            var dirtNumber_4  = document.getElementById("dirtNumber_4");

            if (point == 1) {
                dirtNumber_1.style.display = "block"; // muncul
                dirtNumber_2.style.display = "none"; // tidak muncul
                dirtNumber_3.style.display = "none"; // tidak muncul
                dirtNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                dirtNumber_1.style.display = "none"; // tidak muncul
                dirtNumber_2.style.display = "block"; // muncul
                dirtNumber_3.style.display = "none"; // tidak muncul
                dirtNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                dirtNumber_1.style.display = "none"; // tidak muncul
                dirtNumber_2.style.display = "none"; // tidak muncul
                dirtNumber_3.style.display = "block"; // muncul
                dirtNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                dirtNumber_1.style.display = "none"; // tidak muncul
                dirtNumber_2.style.display = "none"; // tidak muncul
                dirtNumber_3.style.display = "none"; // tidak muncul
                dirtNumber_4.style.display = "block"; // muncul
            }else {
                dirtNumber_1.style.display = "none"; // tidak muncul
                dirtNumber_2.style.display = "none"; // tidak muncul
                dirtNumber_3.style.display = "none"; // tidak muncul
                dirtNumber_4.style.display = "none"; // tidak muncul
            }
        // DIRT
        
        // WATER
            var waterNumber_1  = document.getElementById("waterNumber_1");
            var waterNumber_2  = document.getElementById("waterNumber_2");
            var waterNumber_3  = document.getElementById("waterNumber_3");
            var waterNumber_4  = document.getElementById("waterNumber_4");

            if (point == 1) {
                waterNumber_1.style.display = "block"; // muncul
                waterNumber_2.style.display = "none"; // tidak muncul
                waterNumber_3.style.display = "none"; // tidak muncul
                waterNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                waterNumber_1.style.display = "none"; // tidak muncul
                waterNumber_2.style.display = "block"; // muncul
                waterNumber_3.style.display = "none"; // tidak muncul
                waterNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                waterNumber_1.style.display = "none"; // tidak muncul
                waterNumber_2.style.display = "none"; // tidak muncul
                waterNumber_3.style.display = "block"; // muncul
                waterNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                waterNumber_1.style.display = "none"; // tidak muncul
                waterNumber_2.style.display = "none"; // tidak muncul
                waterNumber_3.style.display = "none"; // tidak muncul
                waterNumber_4.style.display = "block"; // muncul
            }else {
                waterNumber_1.style.display = "none"; // tidak muncul
                waterNumber_2.style.display = "none"; // tidak muncul
                waterNumber_3.style.display = "none"; // tidak muncul
                waterNumber_4.style.display = "none"; // tidak muncul
            }
        // WATER
        
        // MISC4
            var misc4Number_1  = document.getElementById("misc4Number_1");
            var misc4Number_2  = document.getElementById("misc4Number_2");
            var misc4Number_3  = document.getElementById("misc4Number_3");
            var misc4Number_4  = document.getElementById("misc4Number_4");

            if (point == 1) {
                misc4Number_1.style.display = "block"; // muncul
                misc4Number_2.style.display = "none"; // tidak muncul
                misc4Number_3.style.display = "none"; // tidak muncul
                misc4Number_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                misc4Number_1.style.display = "none"; // tidak muncul
                misc4Number_2.style.display = "block"; // muncul
                misc4Number_3.style.display = "none"; // tidak muncul
                misc4Number_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                misc4Number_1.style.display = "none"; // tidak muncul
                misc4Number_2.style.display = "none"; // tidak muncul
                misc4Number_3.style.display = "block"; // muncul
                misc4Number_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                misc4Number_1.style.display = "none"; // tidak muncul
                misc4Number_2.style.display = "none"; // tidak muncul
                misc4Number_3.style.display = "none"; // tidak muncul
                misc4Number_4.style.display = "block"; // muncul
            }else {
                misc4Number_1.style.display = "none"; // tidak muncul
                misc4Number_2.style.display = "none"; // tidak muncul
                misc4Number_3.style.display = "none"; // tidak muncul
                misc4Number_4.style.display = "none"; // tidak muncul
            }
        // MISC4
        
        // PRINT DEFECT
            var print_defectNumber_1  = document.getElementById("print_defectNumber_1");
            var print_defectNumber_2  = document.getElementById("print_defectNumber_2");
            var print_defectNumber_3  = document.getElementById("print_defectNumber_3");
            var print_defectNumber_4  = document.getElementById("print_defectNumber_4");

            if (point == 1) {
                print_defectNumber_1.style.display = "block"; // muncul
                print_defectNumber_2.style.display = "none"; // tidak muncul
                print_defectNumber_3.style.display = "none"; // tidak muncul
                print_defectNumber_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                print_defectNumber_1.style.display = "none"; // tidak muncul
                print_defectNumber_2.style.display = "block"; // muncul
                print_defectNumber_3.style.display = "none"; // tidak muncul
                print_defectNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                print_defectNumber_1.style.display = "none"; // tidak muncul
                print_defectNumber_2.style.display = "none"; // tidak muncul
                print_defectNumber_3.style.display = "block"; // muncul
                print_defectNumber_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                print_defectNumber_1.style.display = "none"; // tidak muncul
                print_defectNumber_2.style.display = "none"; // tidak muncul
                print_defectNumber_3.style.display = "none"; // tidak muncul
                print_defectNumber_4.style.display = "block"; // muncul
            }else {
                print_defectNumber_1.style.display = "none"; // tidak muncul
                print_defectNumber_2.style.display = "none"; // tidak muncul
                print_defectNumber_3.style.display = "none"; // tidak muncul
                print_defectNumber_4.style.display = "none"; // tidak muncul
            }
        // PRINT DEFECT
        
        // MISC5
            var misc5Number_1  = document.getElementById("misc5Number_1");
            var misc5Number_2  = document.getElementById("misc5Number_2");
            var misc5Number_3  = document.getElementById("misc5Number_3");
            var misc5Number_4  = document.getElementById("misc5Number_4");

            if (point == 1) {
                misc5Number_1.style.display = "block"; // muncul
                misc5Number_2.style.display = "none"; // tidak muncul
                misc5Number_3.style.display = "none"; // tidak muncul
                misc5Number_4.style.display = "none"; // tidak muncul
            } else if (point == 2) {
                misc5Number_1.style.display = "none"; // tidak muncul
                misc5Number_2.style.display = "block"; // muncul
                misc5Number_3.style.display = "none"; // tidak muncul
                misc5Number_4.style.display = "none"; // tidak muncul
            }else if (point == 3) {
                misc5Number_1.style.display = "none"; // tidak muncul
                misc5Number_2.style.display = "none"; // tidak muncul
                misc5Number_3.style.display = "block"; // muncul
                misc5Number_4.style.display = "none"; // tidak muncul
            }else if (point == 4) {
                misc5Number_1.style.display = "none"; // tidak muncul
                misc5Number_2.style.display = "none"; // tidak muncul
                misc5Number_3.style.display = "none"; // tidak muncul
                misc5Number_4.style.display = "block"; // muncul
            }else {
                misc5Number_1.style.display = "none"; // tidak muncul
                misc5Number_2.style.display = "none"; // tidak muncul
                misc5Number_3.style.display = "none"; // tidak muncul
                misc5Number_4.style.display = "none"; // tidak muncul
            }
        // MISC5
    }

    function hitung_total_points(){
        var sb1 = document.getElementById("slub_1").value;
        var sb2 = document.getElementById("slub_2").value;
        var sb3 = document.getElementById("slub_3").value;
        var sb4 = document.getElementById("slub_4").value;

        var bd1 = document.getElementById("barredefect_1").value;
        var bd2 = document.getElementById("barredefect_2").value;
        var bd3 = document.getElementById("barredefect_3").value;
        var bd4 = document.getElementById("barredefect_4").value;

        var u1 = document.getElementById("uneven_1").value;
        var u2 = document.getElementById("uneven_2").value;
        var u3 = document.getElementById("uneven_3").value;
        var u4 = document.getElementById("uneven_4").value;

        var yc1 = document.getElementById("yarn_con_1").value;
        var yc2 = document.getElementById("yarn_con_2").value;
        var yc3 = document.getElementById("yarn_con_3").value;
        var yc4 = document.getElementById("yarn_con_4").value;

        var n1 = document.getElementById("neps_1").value;
        var n2 = document.getElementById("neps_2").value;
        var n3 = document.getElementById("neps_3").value;
        var n4 = document.getElementById("neps_4").value;

        var m1 = document.getElementById("misc_1").value;
        var m2 = document.getElementById("misc_2").value;
        var m3 = document.getElementById("misc_3").value;
        var m4 = document.getElementById("misc_4").value;

        var miss1 = document.getElementById("missing_1").value;
        var miss2 = document.getElementById("missing_2").value;
        var miss3 = document.getElementById("missing_3").value;
        var miss4 = document.getElementById("missing_4").value;

        var hol1 = document.getElementById("holes_1").value;
        var hol2 = document.getElementById("holes_2").value;
        var hol3 = document.getElementById("holes_3").value;
        var hol4 = document.getElementById("holes_4").value;

        var st1 = document.getElementById("steaks_1").value;
        var st2 = document.getElementById("steaks_2").value;
        var st3 = document.getElementById("steaks_3").value;
        var st4 = document.getElementById("steaks_4").value;

        var mk1 = document.getElementById("misknit_1").value;
        var mk2 = document.getElementById("misknit_2").value;
        var mk3 = document.getElementById("misknit_3").value;
        var mk4 = document.getElementById("misknit_4").value;

        var k1 = document.getElementById("knot_1").value;
        var k2 = document.getElementById("knot_2").value;
        var k3 = document.getElementById("knot_3").value;
        var k4 = document.getElementById("knot_4").value;

        var o1 = document.getElementById("oil_1").value;
        var o2 = document.getElementById("oil_2").value;
        var o3 = document.getElementById("oil_3").value;
        var o4 = document.getElementById("oil_4").value;

        var f1 = document.getElementById("fly_1").value;
        var f2 = document.getElementById("fly_2").value;
        var f3 = document.getElementById("fly_3").value;
        var f4 = document.getElementById("fly_4").value;

        var m21 = document.getElementById("misc2_1").value;
        var m22 = document.getElementById("misc2_2").value;
        var m23 = document.getElementById("misc2_3").value;
        var m24 = document.getElementById("misc2_4").value;

        var h1 = document.getElementById("hairiness_1").value;
        var h2 = document.getElementById("hairiness_2").value;
        var h3 = document.getElementById("hairiness_3").value;
        var h4 = document.getElementById("hairiness_4").value;

        var hd1 = document.getElementById("holes_dye_1").value;
        var hd2 = document.getElementById("holes_dye_2").value;
        var hd3 = document.getElementById("holes_dye_3").value;
        var hd4 = document.getElementById("holes_dye_4").value;

        var c1 = document.getElementById("color_1").value;
        var c2 = document.getElementById("color_2").value;
        var c3 = document.getElementById("color_3").value;
        var c4 = document.getElementById("color_4").value;

        var ab1 = document.getElementById("abrasion_1").value;
        var ab2 = document.getElementById("abrasion_2").value;
        var ab3 = document.getElementById("abrasion_3").value;
        var ab4 = document.getElementById("abrasion_4").value;

        var ds1 = document.getElementById("dye_spot_1").value;
        var ds2 = document.getElementById("dye_spot_2").value;
        var ds3 = document.getElementById("dye_spot_3").value;
        var ds4 = document.getElementById("dye_spot_4").value;

        var w1 = document.getElementById("wrinkles_1").value;
        var w2 = document.getElementById("wrinkles_2").value;
        var w3 = document.getElementById("wrinkles_3").value;
        var w4 = document.getElementById("wrinkles_4").value;

        var b1 = document.getElementById("bowing_1").value;
        var b2 = document.getElementById("bowing_2").value;
        var b3 = document.getElementById("bowing_3").value;
        var b4 = document.getElementById("bowing_4").value;

        var p1 = document.getElementById("pin_1").value;
        var p2 = document.getElementById("pin_2").value;
        var p3 = document.getElementById("pin_3").value;
        var p4 = document.getElementById("pin_4").value;

        var pc1 = document.getElementById("pick_1").value;
        var pc2 = document.getElementById("pick_2").value;
        var pc3 = document.getElementById("pick_3").value;
        var pc4 = document.getElementById("pick_4").value;

        var k21 = document.getElementById("knot2_1").value;
        var k22 = document.getElementById("knot2_2").value;
        var k23 = document.getElementById("knot2_3").value;
        var k24 = document.getElementById("knot2_4").value;

        var m31 = document.getElementById("misc3_1").value;
        var m32 = document.getElementById("misc3_2").value;
        var m33 = document.getElementById("misc3_3").value;
        var m34 = document.getElementById("misc3_4").value;

        var ue1 = document.getElementById("ueven_1").value;
        var ue2 = document.getElementById("ueven_2").value;
        var ue3 = document.getElementById("ueven_3").value;
        var ue4 = document.getElementById("ueven_4").value;

        var s1 = document.getElementById("stains_1").value; 
        var s2 = document.getElementById("stains_2").value; 
        var s3 = document.getElementById("stains_3").value; 
        var s4 = document.getElementById("stains_4").value; 

        var og1 = document.getElementById("oil_grease_1").value; 
        var og2 = document.getElementById("oil_grease_2").value; 
        var og3 = document.getElementById("oil_grease_3").value; 
        var og4 = document.getElementById("oil_grease_4").value;

        var d1 = document.getElementById("dirt_1").value; 
        var d2 = document.getElementById("dirt_2").value; 
        var d3 = document.getElementById("dirt_3").value; 
        var d4 = document.getElementById("dirt_4").value; 

        var wt1 = document.getElementById("water_1").value; 
        var wt2 = document.getElementById("water_2").value; 
        var wt3 = document.getElementById("water_3").value; 
        var wt4 = document.getElementById("water_4").value; 

        var m41 = document.getElementById("misc4_1").value; 
        var m42 = document.getElementById("misc4_2").value; 
        var m43 = document.getElementById("misc4_3").value; 
        var m44 = document.getElementById("misc4_4").value; 

        var pd1 = document.getElementById("print_defect_1").value; 
        var pd2 = document.getElementById("print_defect_2").value; 
        var pd3 = document.getElementById("print_defect_3").value; 
        var pd4 = document.getElementById("print_defect_4").value; 

        var m51 = document.getElementById("misc5_1").value; 
        var m52 = document.getElementById("misc5_2").value; 
        var m53 = document.getElementById("misc5_3").value; 
        var m54 = document.getElementById("misc5_4").value; 

        var hasil_tp = parseInt(sb1) + parseInt(sb2) + parseInt(sb3) + parseInt(sb4) + parseInt(bd1) + parseInt(bd2) + parseInt(bd3) + parseInt(bd4) + parseInt(u1) + parseInt(u2) + parseInt(u3) + parseInt(u4) + parseInt(yc1) + parseInt(yc2) + parseInt(yc3) + parseInt(yc4) + parseInt(n1) + parseInt(n2) + parseInt(n3) + parseInt(n4) + parseInt(m1) + parseInt(m2) + parseInt(m3) + parseInt(m4) + parseInt(miss1) + parseInt(miss2) + parseInt(miss3) + parseInt(miss4) + parseInt(hol1) + parseInt(hol2) + parseInt(hol3) + parseInt(hol4) + parseInt(st1) + parseInt(st2) + parseInt(st3) + parseInt(st4) + parseInt(mk1) + parseInt(mk2) + parseInt(mk3) + parseInt(mk4) + parseInt(k1) + parseInt(k2) + parseInt(k3) + parseInt(k4) + parseInt(o1) + parseInt(o2) + parseInt(o3) + parseInt(o4) + parseInt(f1) + parseInt(f2) + parseInt(f3) + parseInt(f4) + parseInt(m21) + parseInt(m22) + parseInt(m23) + parseInt(m24) + parseInt(h1) + parseInt(h2) + parseInt(h3) + parseInt(h4) + parseInt(hd1) + parseInt(hd2) + parseInt(hd3) + parseInt(hd4) + parseInt(c1) + parseInt(c2) + parseInt(c3) + parseInt(c4) + parseInt(ab1) + parseInt(ab2) + parseInt(ab3) + parseInt(ab4) + parseInt(ds1) + parseInt(ds2) + parseInt(ds3) + parseInt(ds4) + parseInt(w1) + parseInt(w2) + parseInt(w3) + parseInt(w4) + parseInt(b1) + parseInt(b2) + parseInt(b3) + parseInt(b4) + parseInt(p1) + parseInt(p2) + parseInt(p3) + parseInt(p4) + parseInt(pc1) + parseInt(pc2) + parseInt(pc3) + parseInt(pc4) + parseInt(k21) + parseInt(k22) + parseInt(k23) + parseInt(k24) + parseInt(m31) + parseInt(m32) + parseInt(m33) + parseInt(m34) + parseInt(ue1) + parseInt(ue2) + parseInt(ue3) + parseInt(ue4) + parseInt(s1) + parseInt(s2) + parseInt(s3) + parseInt(s4) + parseInt(og1) + parseInt(og2) + parseInt(og3) + parseInt(og4) + parseInt(d1) + parseInt(d2) + parseInt(d3) + parseInt(d4) + parseInt(wt1) + parseInt(wt2) + parseInt(wt3) + parseInt(wt4) + parseInt(m41) + parseInt(m42) + parseInt(m43) + parseInt(m44) + parseInt(pd1) + parseInt(pd2) + parseInt(pd3) + parseInt(pd4) + parseInt(m51) + parseInt(m52) + parseInt(m53) + parseInt(m54);

        document.getElementById("total_point").value = hasil_tp;

        hitung_extra();
    }

    function hitung_extra(){
        
        var ux = document.getElementById("u_extra_counts").value; 
        var tp = document.getElementById("total_point").value; 

        if(ux){
            var hasil_extra = (ux) * (tp);
            document.getElementById("extra_counts").value = hasil_extra;
        } else {
            swal({
                title: 'Silahkan isi U.Extra terlebih dahulu',
                text: 'Klik Ok untuk kembali',
                type: 'error'
            });
        }
    }

    // TAMBAH & KURANG
        // -----------------------YARN DEFECT-------------------
            // SLUB
            $(document).ready(function () {
                $("#tambah_slub").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#slub_1').val();
                        var x = parseInt(x) + 1;
                        $('#slub_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#slub_2').val();
                        var x = parseInt(x) + 1;
                        $('#slub_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#slub_3').val();
                        var x = parseInt(x) + 1;
                        $('#slub_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#slub_4').val();
                        var x = parseInt(x) + 1;
                        $('#slub_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_slub").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#slub_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#slub_1').val() = 0;
                        } else {
                            $('#slub_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#slub_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#slub_2').val() = 0;
                        } else {
                            $('#slub_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#slub_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#slub_3').val() = 0;
                        } else {
                            $('#slub_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#slub_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#slub_4').val() = 0;
                        } else {
                            $('#slub_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // BARRE
            $(document).ready(function () {
                $("#tambah_barredefect").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#barredefect_1').val();
                        var x = parseInt(x) + 1;
                        $('#barredefect_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#barredefect_2').val();
                        var x = parseInt(x) + 1;
                        $('#barredefect_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#barredefect_3').val();
                        var x = parseInt(x) + 1;
                        $('#barredefect_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#barredefect_4').val();
                        var x = parseInt(x) + 1;
                        $('#barredefect_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_barredefect").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#barredefect_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#barredefect_1').val() = 0;
                        } else {
                            $('#barredefect_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#barredefect_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#barredefect_2').val() = 0;
                        } else {
                            $('#barredefect_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#barredefect_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#barredefect_3').val() = 0;
                        } else {
                            $('#barredefect_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#barredefect_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#barredefect_4').val() = 0;
                        } else {
                            $('#barredefect_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // UNEVEN
            $(document).ready(function () {
                $("#tambah_uneven").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#uneven_1').val();
                        var x = parseInt(x) + 1;
                        $('#uneven_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#uneven_2').val();
                        var x = parseInt(x) + 1;
                        $('#uneven_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#uneven_3').val();
                        var x = parseInt(x) + 1;
                        $('#uneven_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#uneven_4').val();
                        var x = parseInt(x) + 1;
                        $('#uneven_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_uneven").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#uneven_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#uneven_1').val() = 0;
                        } else {
                            $('#uneven_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#uneven_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#uneven_2').val() = 0;
                        } else {
                            $('#uneven_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#uneven_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#uneven_3').val() = 0;
                        } else {
                            $('#uneven_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#uneven_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#uneven_4').val() = 0;
                        } else {
                            $('#uneven_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // YARN
            $(document).ready(function () {
                $("#tambah_yarn").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#yarn_con_1').val();
                        var x = parseInt(x) + 1;
                        $('#yarn_con_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#yarn_con_2').val();
                        var x = parseInt(x) + 1;
                        $('#yarn_con_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#yarn_con_3').val();
                        var x = parseInt(x) + 1;
                        $('#yarn_con_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#yarn_con_4').val();
                        var x = parseInt(x) + 1;
                        $('#yarn_con_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_yarn").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#yarn_con_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#yarn_con_1').val() = 0;
                        } else {
                            $('#yarn_con_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#yarn_con_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#yarn_con_2').val() = 0;
                        } else {
                            $('#yarn_con_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#yarn_co_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#yarn_co_3').val() = 0;
                        } else {
                            $('#yarn_co_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#yarn_con_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#yarn_con_4').val() = 0;
                        } else {
                            $('#yarn_con_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // NEPS
            $(document).ready(function () {
                $("#tambah_neps").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#neps_1').val();
                        var x = parseInt(x) + 1;
                        $('#neps_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#neps_2').val();
                        var x = parseInt(x) + 1;
                        $('#neps_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#neps_3').val();
                        var x = parseInt(x) + 1;
                        $('#neps_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#neps_4').val();
                        var x = parseInt(x) + 1;
                        $('#neps_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_neps").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#neps_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#neps_1').val() = 0;
                        } else {
                            $('#neps_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#neps_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#neps_2').val() = 0;
                        } else {
                            $('#neps_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#neps_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#neps_3').val() = 0;
                        } else {
                            $('#neps_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#neps_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#neps_4').val() = 0;
                        } else {
                            $('#neps_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // MISC
            $(document).ready(function () {
                $("#tambah_misc").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#misc_1').val();
                        var x = parseInt(x) + 1;
                        $('#misc_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#misc_2').val();
                        var x = parseInt(x) + 1;
                        $('#misc_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#misc_3').val();
                        var x = parseInt(x) + 1;
                        $('#misc_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#misc_4').val();
                        var x = parseInt(x) + 1;
                        $('#misc_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_misc").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#misc_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc_1').val() = 0;
                        } else {
                            $('#misc_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#misc_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc_2').val() = 0;
                        } else {
                            $('#misc_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#misc_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc_3').val() = 0;
                        } else {
                            $('#misc_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#misc_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc_4').val() = 0;
                        } else {
                            $('#misc_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // -----------------------CONSTRUCTION-------------------
            // MISSING
            $(document).ready(function () {
                $("#tambah_missing").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#missing_1').val();
                        var x = parseInt(x) + 1;
                        $('#missing_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#missing_2').val();
                        var x = parseInt(x) + 1;
                        $('#missing_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#missing_3').val();
                        var x = parseInt(x) + 1;
                        $('#missing_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#missing_4').val();
                        var x = parseInt(x) + 1;
                        $('#missing_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_missing").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#missing_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#missing_1').val() = 0;
                        } else {
                            $('#missing_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#missing_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#missing_2').val() = 0;
                        } else {
                            $('#missing_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#missing_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#missing_3').val() = 0;
                        } else {
                            $('#missing_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#missing_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#missing_4').val() = 0;
                        } else {
                            $('#missing_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // HOLES
            $(document).ready(function () {
                $("#tambah_holes").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#holes_1').val();
                        var x = parseInt(x) + 1;
                        $('#holes_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#holes_2').val();
                        var x = parseInt(x) + 1;
                        $('#holes_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#holes_3').val();
                        var x = parseInt(x) + 1;
                        $('#holes_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#holes_4').val();
                        var x = parseInt(x) + 1;
                        $('#holes_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            $(document).ready(function () {
                $("#kurang_holes").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#holes_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#holes_1').val() = 0;
                        } else {
                            $('#holes_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#holes_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#holes_2').val() = 0;
                        } else {
                            $('#holes_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#holes_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#holes_3').val() = 0;
                        } else {
                            $('#holes_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#holes_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#holes_4').val() = 0;
                        } else {
                            $('#holes_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // STEAKS
            $(document).ready(function () {
                $("#tambah_steaks").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#steaks_1').val();
                        var x = parseInt(x) + 1;
                        $('#steaks_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#steaks_2').val();
                        var x = parseInt(x) + 1;
                        $('#steaks_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#steaks_3').val();
                        var x = parseInt(x) + 1;
                        $('#steaks_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#steaks_4').val();
                        var x = parseInt(x) + 1;
                        $('#steaks_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_steaks").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#steaks_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#steaks_1').val() = 0;
                        } else {
                            $('#steaks_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#steaks_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#steaks_2').val() = 0;
                        } else {
                            $('#steaks_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#steaks_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#steaks_3').val() = 0;
                        } else {
                            $('#steaks_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#steaks_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#steaks_4').val() = 0;
                        } else {
                            $('#steaks_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // MISKNIT
            $(document).ready(function () {
                $("#tambah_misknit").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#misknit_1').val();
                        var x = parseInt(x) + 1;
                        $('#misknit_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#misknit_2').val();
                        var x = parseInt(x) + 1;
                        $('#misknit_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#misknit_3').val();
                        var x = parseInt(x) + 1;
                        $('#misknit_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#misknit_4').val();
                        var x = parseInt(x) + 1;
                        $('#misknit_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_misknit").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#misknit_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misknit_1').val() = 0;
                        } else {
                            $('#misknit_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#misknit_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misknit_2').val() = 0;
                        } else {
                            $('#misknit_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#misknit_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misknit_3').val() = 0;
                        } else {
                            $('#misknit_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#misknit_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misknit_4').val() = 0;
                        } else {
                            $('#misknit_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // KNOT
            $(document).ready(function () {
                $("#tambah_knot").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#knot_1').val();
                        var x = parseInt(x) + 1;
                        $('#knot_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#knot_2').val();
                        var x = parseInt(x) + 1;
                        $('#knot_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#knot_3').val();
                        var x = parseInt(x) + 1;
                        $('#knot_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#knot_4').val();
                        var x = parseInt(x) + 1;
                        $('#knot_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_knot").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#knot_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#knot_1').val() = 0;
                        } else {
                            $('#knot_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#knot_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#knot_2').val() = 0;
                        } else {
                            $('#knot_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#knot_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#knot_3').val() = 0;
                        } else {
                            $('#knot_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#knot_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#knot_4').val() = 0;
                        } else {
                            $('#knot_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // OIL
            $(document).ready(function () {
                $("#tambah_oil").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#oil_1').val();
                        var x = parseInt(x) + 1;
                        $('#oil_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#oil_2').val();
                        var x = parseInt(x) + 1;
                        $('#oil_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#oil_3').val();
                        var x = parseInt(x) + 1;
                        $('#oil_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#oil_4').val();
                        var x = parseInt(x) + 1;
                        $('#oil_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_oil").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#oil_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#oil_1').val() = 0;
                        } else {
                            $('#oil_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#oil_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#oil_2').val() = 0;
                        } else {
                            $('#oil_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#oil_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#oil_3').val() = 0;
                        } else {
                            $('#oil_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#oil_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#oil_4').val() = 0;
                        } else {
                            $('#oil_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // FLY
            $(document).ready(function () {
                $("#tambah_fly").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#fly_1').val();
                        var x = parseInt(x) + 1;
                        $('#fly_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#fly_2').val();
                        var x = parseInt(x) + 1;
                        $('#fly_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#fly_3').val();
                        var x = parseInt(x) + 1;
                        $('#fly_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#fly_4').val();
                        var x = parseInt(x) + 1;
                        $('#fly_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_fly").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#fly_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#fly_1').val() = 0;
                        } else {
                            $('#fly_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#fly_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#fly_2').val() = 0;
                        } else {
                            $('#fly_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#fly_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#fly_3').val() = 0;
                        } else {
                            $('#fly_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#fly_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#fly_4').val() = 0;
                        } else {
                            $('#fly_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // MISC2
            $(document).ready(function () {
                $("#tambah_misc2").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#misc2_1').val();
                        var x = parseInt(x) + 1;
                        $('#misc2_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#misc2_2').val();
                        var x = parseInt(x) + 1;
                        $('#misc2_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#misc2_3').val();
                        var x = parseInt(x) + 1;
                        $('#misc2_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#misc2_4').val();
                        var x = parseInt(x) + 1;
                        $('#misc2_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_misc2").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#misc2_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc2_1').val() = 0;
                        } else {
                            $('#misc2_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#misc2_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc2_2').val() = 0;
                        } else {
                            $('#misc2_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#misc2_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc2_3').val() = 0;
                        } else {
                            $('#misc2_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#misc2_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc2_4').val() = 0;
                        } else {
                            $('#misc2_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });


        // -----------------------DYE & FINISHING DEFECT-------------------
            // HAIRINESS
            $(document).ready(function () {
                $("#tambah_hairiness").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#hairiness_1').val();
                        var x = parseInt(x) + 1;
                        $('#hairiness_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#hairiness_2').val();
                        var x = parseInt(x) + 1;
                        $('#hairiness_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#hairiness_3').val();
                        var x = parseInt(x) + 1;
                        $('#hairiness_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#hairiness_4').val();
                        var x = parseInt(x) + 1;
                        $('#hairiness_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_hairiness").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#hairiness_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#hairiness_1').val() = 0;
                        } else {
                            $('#hairiness_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#hairiness_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#hairiness_2').val() = 0;
                        } else {
                            $('#hairiness_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#hairiness_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#hairiness_3').val() = 0;
                        } else {
                            $('#hairiness_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#hairiness_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#hairiness_4').val() = 0;
                        } else {
                            $('#hairiness_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // HOLES
            $(document).ready(function () {
                $("#tambah_holes_dye").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#holes_dye_1').val();
                        var x = parseInt(x) + 1;
                        $('#holes_dye_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#holes_dye_2').val();
                        var x = parseInt(x) + 1;
                        $('#holes_dye_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#holes_dye_3').val();
                        var x = parseInt(x) + 1;
                        $('#holes_dye_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#holes_dye_4').val();
                        var x = parseInt(x) + 1;
                        $('#holes_dye_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_holes_dye").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#holes_dye_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#holes_dye_1').val() = 0;
                        } else {
                            $('#holes_dye_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#holes_dye_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#holes_dye_2').val() = 0;
                        } else {
                            $('#holes_dye_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#holes_dye_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#holes_dye_3').val() = 0;
                        } else {
                            $('#holes_dye_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#holes_dye_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#holes_dye_4').val() = 0;
                        } else {
                            $('#holes_dye_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // COLOR
            $(document).ready(function () {
                $("#tambah_color").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#color_1').val();
                        var x = parseInt(x) + 1;
                        $('#color_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#color_2').val();
                        var x = parseInt(x) + 1;
                        $('#color_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#color_3').val();
                        var x = parseInt(x) + 1;
                        $('#color_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#color_4').val();
                        var x = parseInt(x) + 1;
                        $('#color_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_color").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#color_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#color_1').val() = 0;
                        } else {
                            $('#color_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#color_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#color_2').val() = 0;
                        } else {
                            $('#color_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#color_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#color_3').val() = 0;
                        } else {
                            $('#color_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#color_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#color_4').val() = 0;
                        } else {
                            $('#color_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // ABRASION
            $(document).ready(function () {
                $("#tambah_abrasion").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#abrasion_1').val();
                        var x = parseInt(x) + 1;
                        $('#abrasion_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#abrasion_2').val();
                        var x = parseInt(x) + 1;
                        $('#abrasion_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#abrasion_3').val();
                        var x = parseInt(x) + 1;
                        $('#abrasion_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#abrasion_4').val();
                        var x = parseInt(x) + 1;
                        $('#abrasion_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_abrasion").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#abrasion_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#abrasion_1').val() = 0;
                        } else {
                            $('#abrasion_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#abrasion_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#abrasion_2').val() = 0;
                        } else {
                            $('#abrasion_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#abrasion_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#abrasion_3').val() = 0;
                        } else {
                            $('#abrasion_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#abrasion_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#abrasion_4').val() = 0;
                        } else {
                            $('#abrasion_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // DYE SPOT
            $(document).ready(function () {
                $("#tambah_dye_spot").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#dye_spot_1').val();
                        var x = parseInt(x) + 1;
                        $('#dye_spot_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#dye_spot_2').val();
                        var x = parseInt(x) + 1;
                        $('#dye_spot_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#dye_spot_3').val();
                        var x = parseInt(x) + 1;
                        $('#dye_spot_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#dye_spot_4').val();
                        var x = parseInt(x) + 1;
                        $('#dye_spot_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_dye_spot").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#dye_spot_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#dye_spot_1').val() = 0;
                        } else {
                            $('#dye_spot_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#dye_spot_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#dye_spot_2').val() = 0;
                        } else {
                            $('#dye_spot_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#dye_spot_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#dye_spot_3').val() = 0;
                        } else {
                            $('#dye_spot_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#dye_spot_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#dye_spot_4').val() = 0;
                        } else {
                            $('#dye_spot_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // WRINKLES
            $(document).ready(function () {
                $("#tambah_wrinkles").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#wrinkles_1').val();
                        var x = parseInt(x) + 1;
                        $('#wrinkles_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#wrinkles_2').val();
                        var x = parseInt(x) + 1;
                        $('#wrinkles_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#wrinkles_3').val();
                        var x = parseInt(x) + 1;
                        $('#wrinkles_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#wrinkles_4').val();
                        var x = parseInt(x) + 1;
                        $('#wrinkles_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_wrinkles").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#wrinkles_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#wrinkles_1').val() = 0;
                        } else {
                            $('#wrinkles_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#wrinkles_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#wrinkles_2').val() = 0;
                        } else {
                            $('#wrinkles_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#wrinkles_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#wrinkles_3').val() = 0;
                        } else {
                            $('#wrinkles_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#wrinkles_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#wrinkles_4').val() = 0;
                        } else {
                            $('#wrinkles_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // BOWING
            $(document).ready(function () {
                $("#tambah_bowing").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#bowing_1').val();
                        var x = parseInt(x) + 1;
                        $('#bowing_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#bowing_2').val();
                        var x = parseInt(x) + 1;
                        $('#bowing_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#bowing_3').val();
                        var x = parseInt(x) + 1;
                        $('#bowing_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#bowing_4').val();
                        var x = parseInt(x) + 1;
                        $('#bowing_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_bowing").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#bowing_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#bowing_1').val() = 0;
                        } else {
                            $('#bowing_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#bowing_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#bowing_2').val() = 0;
                        } else {
                            $('#bowing_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#bowing_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#bowing_3').val() = 0;
                        } else {
                            $('#bowing_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#bowing_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#bowing_4').val() = 0;
                        } else {
                            $('#bowing_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // PIN
            $(document).ready(function () {
                $("#tambah_pin").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#pin_1').val();
                        var x = parseInt(x) + 1;
                        $('#pin_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#pin_2').val();
                        var x = parseInt(x) + 1;
                        $('#pin_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#pin_3').val();
                        var x = parseInt(x) + 1;
                        $('#pin_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#pin_4').val();
                        var x = parseInt(x) + 1;
                        $('#pin_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_pin").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#pin_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#pin_1').val() = 0;
                        } else {
                            $('#pin_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#pin_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#pin_2').val() = 0;
                        } else {
                            $('#pin_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#pin_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#pin_3').val() = 0;
                        } else {
                            $('#pin_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#pin_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#pin_4').val() = 0;
                        } else {
                            $('#pin_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();

                });
            });

            // PICK
            $(document).ready(function () {
                $("#tambah_pick").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#pick_1').val();
                        var x = parseInt(x) + 1;
                        $('#pick_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#pick_2').val();
                        var x = parseInt(x) + 1;
                        $('#pick_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#pick_3').val();
                        var x = parseInt(x) + 1;
                        $('#pick_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#pick_4').val();
                        var x = parseInt(x) + 1;
                        $('#pick_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_pick").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#pick_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#pick_1').val() = 0;
                        } else {
                            $('#pick_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#pick_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#pick_2').val() = 0;
                        } else {
                            $('#pick_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#pick_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#pick_3').val() = 0;
                        } else {
                            $('#pick_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#pick_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#pick_4').val() = 0;
                        } else {
                            $('#pick_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // KNOT 2
            $(document).ready(function () {
                $("#tambah_knot2").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#knot2_1').val();
                        var x = parseInt(x) + 1;
                        $('#knot2_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#knot2_2').val();
                        var x = parseInt(x) + 1;
                        $('#knot2_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#knot2_3').val();
                        var x = parseInt(x) + 1;
                        $('#knot2_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#knot2_4').val();
                        var x = parseInt(x) + 1;
                        $('#knot2_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_knot2").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#knot2_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#knot2_1').val() = 0;
                        } else {
                            $('#knot2_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#knot2_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#knot2_2').val() = 0;
                        } else {
                            $('#knot2_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#knot2_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#knot2_3').val() = 0;
                        } else {
                            $('#knot2_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#knot2_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#knot2_4').val() = 0;
                        } else {
                            $('#knot2_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // MISC 3
            $(document).ready(function () {
                $("#tambah_misc3").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#misc3_1').val();
                        var x = parseInt(x) + 1;
                        $('#misc3_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#misc3_2').val();
                        var x = parseInt(x) + 1;
                        $('#misc3_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#misc3_3').val();
                        var x = parseInt(x) + 1;
                        $('#misc3_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#misc3_4').val();
                        var x = parseInt(x) + 1;
                        $('#misc3_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_misc3").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#misc3_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc3_1').val() = 0;
                        } else {
                            $('#misc3_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#misc3_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc3_2').val() = 0;
                        } else {
                            $('#misc3_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#misc3_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc3_3').val() = 0;
                        } else {
                            $('#misc3_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#misc3_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc3_4').val() = 0;
                        } else {
                            $('#misc3_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

        // -----------------------CELANING DEFECT-------------------
        // -----------------------UEVEN SHEARING-------------------
            $(document).ready(function () {
                $("#tambah_ueven").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#ueven_1').val();
                        var x = parseInt(x) + 1;
                        $('#ueven_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#ueven_2').val();
                        var x = parseInt(x) + 1;
                        $('#ueven_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#ueven_3').val();
                        var x = parseInt(x) + 1;
                        $('#ueven_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#ueven_4').val();
                        var x = parseInt(x) + 1;
                        $('#ueven_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_ueven").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#ueven_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#ueven_1').val() = 0;
                        } else {
                            $('#ueven_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#ueven_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#ueven_2').val() = 0;
                        } else {
                            $('#ueven_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#ueven_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#ueven_3').val() = 0;
                        } else {
                            $('#ueven_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#ueven_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#ueven_4').val() = 0;
                        } else {
                            $('#ueven_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // STAINS
            $(document).ready(function () {
                $("#tambah_stains").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#stains_1').val();
                        var x = parseInt(x) + 1;
                        $('#stains_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#stains_2').val();
                        var x = parseInt(x) + 1;
                        $('#stains_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#stains_3').val();
                        var x = parseInt(x) + 1;
                        $('#stains_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#stains_4').val();
                        var x = parseInt(x) + 1;
                        $('#stains_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_stains").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#stains_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#stains_1').val() = 0;
                        } else {
                            $('#stains_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#stains_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#stains_2').val() = 0;
                        } else {
                            $('#stains_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#stains_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#stains_3').val() = 0;
                        } else {
                            $('#stains_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#stains_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#stains_4').val() = 0;
                        } else {
                            $('#stains_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // OIL GREASE
            $(document).ready(function () {
                $("#tambah_oil_grease").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#oil_grease_1').val();
                        var x = parseInt(x) + 1;
                        $('#oil_grease_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#oil_grease_2').val();
                        var x = parseInt(x) + 1;
                        $('#oil_grease_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#oil_grease_3').val();
                        var x = parseInt(x) + 1;
                        $('#oil_grease_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#oil_grease_4').val();
                        var x = parseInt(x) + 1;
                        $('#oil_grease_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_oil_grease").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#oil_grease_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#oil_grease_1').val() = 0;
                        } else {
                            $('#oil_grease_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#oil_grease_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#oil_grease_2').val() = 0;
                        } else {
                            $('#oil_grease_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#oil_grease_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#oil_grease_3').val() = 0;
                        } else {
                            $('#oil_grease_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#oil_grease_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#oil_grease_4').val() = 0;
                        } else {
                            $('#oil_grease_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // DIRT
            $(document).ready(function () {
                $("#tambah_dirt").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#dirt_1').val();
                        var x = parseInt(x) + 1;
                        $('#dirt_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#dirt_2').val();
                        var x = parseInt(x) + 1;
                        $('#dirt_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#dirt_3').val();
                        var x = parseInt(x) + 1;
                        $('#dirt_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#dirt_4').val();
                        var x = parseInt(x) + 1;
                        $('#dirt_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_dirt").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#dirt_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#dirt_1').val() = 0;
                        } else {
                            $('#dirt_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#dirt_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#dirt_2').val() = 0;
                        } else {
                            $('#dirt_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#dirt_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#dirt_3').val() = 0;
                        } else {
                            $('#dirt_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#dirt_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#dirt_4').val() = 0;
                        } else {
                            $('#dirt_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // WATER
            $(document).ready(function () {
                $("#tambah_water").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#water_1').val();
                        var x = parseInt(x) + 1;
                        $('#water_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#water_2').val();
                        var x = parseInt(x) + 1;
                        $('#water_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#water_3').val();
                        var x = parseInt(x) + 1;
                        $('#water_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#water_4').val();
                        var x = parseInt(x) + 1;
                        $('#water_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_water").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#water_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#water_1').val() = 0;
                        } else {
                            $('#water_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#water_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#water_2').val() = 0;
                        } else {
                            $('#water_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#water_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#water_3').val() = 0;
                        } else {
                            $('#water_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#water_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#water_4').val() = 0;
                        } else {
                            $('#water_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // MISC 4
            $(document).ready(function () {
                $("#tambah_misc4").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#misc4_1').val();
                        var x = parseInt(x) + 1;
                        $('#misc4_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#misc4_2').val();
                        var x = parseInt(x) + 1;
                        $('#misc4_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#misc4_3').val();
                        var x = parseInt(x) + 1;
                        $('#misc4_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#misc4_4').val();
                        var x = parseInt(x) + 1;
                        $('#misc4_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_misc4").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#misc4_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc4_1').val() = 0;
                        } else {
                            $('#misc4_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#misc4_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc4_2').val() = 0;
                        } else {
                            $('#misc4_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#misc4_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc4_3').val() = 0;
                        } else {
                            $('#misc4_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#misc4_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc4_4').val() = 0;
                        } else {
                            $('#misc4_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

        // -----------------------CONSTRUCTION-------------------
        // --------------------------PRINT-----------------------
            $(document).ready(function () {
                $("#tambah_print_defect").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#print_defect_1').val();
                        var x = parseInt(x) + 1;
                        $('#print_defect_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#print_defect_2').val();
                        var x = parseInt(x) + 1;
                        $('#print_defect_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#print_defect_3').val();
                        var x = parseInt(x) + 1;
                        $('#print_defect_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#print_defect_4').val();
                        var x = parseInt(x) + 1;
                        $('#print_defect_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_print_defect").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#print_defect_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#print_defect_1').val() = 0;
                        } else {
                            $('#print_defect_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#print_defect_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#print_defect_2').val() = 0;
                        } else {
                            $('#print_defect_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#print_defect_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#print_defect_3').val() = 0;
                        } else {
                            $('#print_defect_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#print_defect_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#print_defect_4').val() = 0;
                        } else {
                            $('#print_defect_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });

            // MISC 5
            $(document).ready(function () {
                $("#tambah_misc5").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#misc5_1').val();
                        var x = parseInt(x) + 1;
                        $('#misc5_1').val(x);
                    } else if (point == 2) {
                        var x = jQuery('#misc5_2').val();
                        var x = parseInt(x) + 1;
                        $('#misc5_2').val(x);
                    } else if (point == 3) {
                        var x = jQuery('#misc5_3').val();
                        var x = parseInt(x) + 1;
                        $('#misc5_3').val(x);
                    } else if (point == 4) {
                        var x = jQuery('#misc5_4').val();
                        var x = parseInt(x) + 1;
                        $('#misc5_4').val(x);
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
            $(document).ready(function () {
                $("#kurang_misc5").click(function () {
                    var point = document.getElementById("point").value;

                    if (point == 1) {
                        var x = jQuery('#misc5_1').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc5_1').val() = 0;
                        } else {
                            $('#misc5_1').val(x);
                        }
                    } else if (point == 2) {
                        var x = jQuery('#misc5_2').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc5_2').val() = 0;
                        } else {
                            $('#misc5_2').val(x);
                        }
                    } else if (point == 3) {
                        var x = jQuery('#misc5_3').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc5_3').val() = 0;
                        } else {
                            $('#misc5_3').val(x);
                        }
                    } else if (point == 4) {
                        var x = jQuery('#misc5_4').val();
                        var x = parseInt(x) - 1;
                        if (x < 0) {
                            $('#misc5_4').val() = 0;
                        } else {
                            $('#misc5_4').val(x);
                        }
                    } else {
                        swal({
                            title: 'Silahkan Pilih NUMBER DEFACT',
                            text: 'Klik Ok untuk memilih nomor kk kembali',
                            type: 'error'
                        });
                    }
                    hitung_total_points();
                });
            });
    // TAMBAH & KURANG

</script>
<body>
<div class="row">
    <div class="col-md-8 form-horizontal">
        <div class="box box-primary">
            <form action="ProsesInspeksiKain" method="POST">
            <div class="box-header with-border">
                <div class="panel-title pull-left">Input Data Inspeksi Kain</div>
                <div class="panel-title pull-right">
                    <button type="submit" class="btn btn-success" name="save" value="save">Simpan <i class="fa fa-save"></i></button>
                    <a href="#" onclick="PrintPreview()" class="btn btn-warning" style="color: white;">Print Preview <i class="fa fa-print"></i></a>
                </div>
            </div>
            <div class="box-body">
                <div class="form-group">
                    <input type="hidden" value="<?= $dataNokk['id'] ?>" name="id_inspek">
                    <label for="nokk" class=" col-sm-2 control-label">No KK</label>
                    <div class="col-sm-4">
                        <select name="nokk" id="nokk" class="form-control chosen-select input-sm" onchange="proses_nokk()" required>
                            <option value="0">Pilih No KK</option>							 
                            <?php 
                            $sqlKap=mysql_query("SELECT * FROM tbl_schedule WHERE NOT `status`='selesai' ORDER BY id ASC", $con);
                            while($rK=mysql_fetch_array($sqlKap)){
                            ?>
                                <option value="<?= $rK['nokk']; ?>" <?php if($nokk == $rK['nokk'] ){ echo 'SELECTED'; } ?>><?= $rK['nokk']; ?> - <?= $rK['langganan']; ?> - <?= $rK['no_order']; ?> - <?= $rK['po']; ?></option>
                            <?php } ?>	
                        </select>
                    </div>
                    <label class="col-sm-1 control-label input-sm">Form</label>
                    <select name="form_inspek" id="form_inspek" class="col-sm-2 control-label input-sm">
                        <option value="L15">Linier 15</option>
                        <option value="L20">Linier 20</option>
                        <option value="S15">Square 15</option>
                        <option value="S20">Square 20</option>
                    </select>
                    <div class="col-sm-3">
                        <input name="roll_no" id="roll_no" placeholder="Roll No" onchange= "proses_roll()" value="<?= $roll; ?>" type="text" class="form-control input-sm">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-4">
                        <input name="tgl" type="date" class="form-control input-sm" value="<?= $dataNokk['tgl'] ?>">
                    </div>
                    <label class="col-sm-3 control-label">Act. fabric weight (gr/m2)</label>
                    <div class="col-sm-3">
                        <input name="actual_fabric_weight" type="text" value="<?= $dataNokk['actual_fabric_weight']; ?>" class="form-control input-sm">
                    </div>	
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Act. width</label>
                    <div class="col-sm-2">
                        <input name="actual_width" value="<?= $dataNokk['actual_width']; ?>" type="text" class="form-control input-sm">
                    </div>	
                    <div class="col-sm-2">
                        <select class="form-control input-sm" name="satuan_width">
                            <option value="cm" <?php if($dataNokk['satuan_width'] == "cm" ){ echo 'SELECTED'; } ?>>Cm</option>
                            <option value="dm" <?php if($dataNokk['satuan_width'] == "dm" ){ echo 'SELECTED'; } ?>>Dm</option>
                            <option value="ft" <?php if($dataNokk['satuan_width'] == "ft" ){ echo 'SELECTED'; } ?>>Ft</option>
                            <option value="inch" <?php if($dataNokk['satuan_width'] == "inch" ){ echo 'SELECTED'; } ?> SELECTED>Inch</option>
                            <option value="meter" <?php if($dataNokk['satuan_width'] == "meter" ){ echo 'SELECTED'; } ?>>Meter</option>
                            <option value="mm" <?php if($dataNokk['satuan_width'] == "mm" ){ echo 'SELECTED'; } ?>>Mm</option>
                            <option value="yard" <?php if($dataNokk['satuan_width'] == "yard" ){ echo 'SELECTED'; } ?>>Yard</option>
                        </select>
                    </div>		
                    <label class="col-sm-2 control-label">Default length</label>
                    <div class="col-sm-2">
                        <input name="default_length" type="text" value="<?= $dataNokk['default_length']; ?>" class="form-control input-sm">
                    </div>
                    <div class="col-sm-2">
                        <select class="form-control input-sm" name="satuan_default_length">
                            <option value="cm" <?php if($dataNokk['satuan_default_length'] == "cm" ){ echo 'SELECTED'; } ?>>Cm</option>
                            <option value="dm" <?php if($dataNokk['satuan_default_length'] == "dm" ){ echo 'SELECTED'; } ?>>Dm</option>
                            <option value="ft" <?php if($dataNokk['satuan_default_length'] == "ft" ){ echo 'SELECTED'; } ?>>Ft</option>
                            <option value="inch" <?php if($dataNokk['satuan_default_length'] == "inch" ){ echo 'SELECTED'; } ?>>Inch</option>
                            <option value="meter" <?php if($dataNokk['satuan_default_length'] == "meter" ){ echo 'SELECTED'; } ?>>Meter</option>
                            <option value="mm" <?php if($dataNokk['satuan_default_length'] == "mm" ){ echo 'SELECTED'; } ?>>Mm</option>
                            <option value="yard" <?php if($dataNokk['satuan_default_length'] == "yard" ){ echo 'SELECTED'; } ?> SELECTED>Yard</option>
                        </select>
                    </div>	
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Total Point</label>
                    <div class="col-sm-2">
                        <input name="total_point" type="text" value="<?= $dataNokk['total_point']; ?>" id="total_point" class="form-control input-sm">
                    </div>
                    <label class="col-sm-1 control-label">Grade</label>
                    <div class="col-sm-1">
                        <input name="grade_point" type="text" value="<?= $dataNokk['grade_point']; ?>" class="form-control input-sm">
                    </div>
                    <label class="col-sm-1 control-label">u.Extra</label>
                    <div class="col-sm-2">
                        <input name="u_extra_counts" type="text" value="<?= $dataNokk['u_extra_counts']; ?>" id="u_extra_counts" class="form-control input-sm">
                    </div>
                    <label class="col-sm-1 control-label">Extra</label>
                    <div class="col-sm-2">
                        <input name="extra_counts" type="text" value="<?= $dataNokk['extra_counts']; ?>" id="extra_counts" class="form-control input-sm">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Total Counts</label>
                    <div class="col-sm-2">
                        <input name="total_counts" type="text" value="<?= $dataNokk['total_counts']; ?>" class="form-control input-sm">
                    </div>
                    <label class="col-sm-1 control-label">Grade</label>
                    <div class="col-sm-1">
                        <input name="grade_counts" type="text" value="<?= $dataNokk['grade_counts']; ?>" class="form-control input-sm">
                    </div>
                    <label class="col-sm-1 control-label">Keterangan</label>
                    <div class="col-sm-5">
                        <textarea name="keterangan" class="form-control input-sm" rows="2" cols="50"><?= $dataNokk['ket']; ?></textarea><br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-primary">
            <table id="table-inspeksi-kain" class="table table-bordered table-hover">
                <thead class="bg-blue">
                    <tr>
                        <th style="font-size: 14px;"><div align="center">No. Roll</div></th>
                        <th><div align="center">Total Point</div></th>
                        <th><div align="center">Extra</div></th>
                        <th><div align="center">Total Counts</div></th>
                        <th><div align="center">Extra</div></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $sqlDetailKK    = mysql_query("SELECT * FROM tbl_inspeksi_kain WHERE nokk='$nokk' ORDER BY id ASC",$con);
                    while($dataDetailNokk = mysql_fetch_array($sqlDetailKK)){
                ?>
                    <tr>
                        <td><?= $dataDetailNokk['roll_no'] ?></td>
                        <td><?= $dataDetailNokk['total_point'] ?></td>
                        <td><?= $dataDetailNokk['extra_point'] ?></td>
                        <td><?= $dataDetailNokk['total_counts'] ?></td>
                        <td><?= $dataDetailNokk['extra_counts'] ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <br>
        </div>
    </div>
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#yarn" data-toggle="tab">Yarn Defect</a></li>
                <li><a href="#construction" data-toggle="tab">Construction Defect</a></li>
                <li><a href="#dye_finishing" data-toggle="tab">Dye & Finishing Defect</a></li>
                <li><a href="#cleanliness" data-toggle="tab">Cleanliness Defect</a></li>
                <li><a href="#print" data-toggle="tab">Print Defect</a></li>
                <li><a href="#"> 
                        <select class="form-control input-" name="" id="point" onchange="fnc_number();">
                            <option value="-">PILIH NUMBER</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-tabs navbar-right">
                <li>
                
                </li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="yarn">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_slub">(+) SLUB</a></center></th>
                                <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_barredefect">(+) BARRE</a></center></th>
                                <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_uneven">(+) UNEVEN YARN</a></center></th>
                                <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_yarn">(+) YARN CONTAMINATION</a></center></th>
                                <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_neps">(+) NEPS/DEAD COTTON</a></center></th>
                                <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_misc">(+) MISC.</a></center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div id="slubNumber_1" style="display: none;">
                                        <input name="slubb1" class="form-control input-sm" type="Number" id="slub_1" value="<?php if($dataDefect['slub_yd1']){ echo $dataDefect['slub_yd1']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="slubNumber_2" style="display: none;">
                                        <input name="slubb2" class="form-control input-sm" type="Number" id="slub_2" value="<?php if($dataDefect['slub_yd2']){ echo $dataDefect['slub_yd2']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="slubNumber_3" style="display: none;">
                                        <input name="slubb3" class="form-control input-sm" type="Number" id="slub_3" value="<?php if($dataDefect['slub_yd3']){ echo $dataDefect['slub_yd3']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="slubNumber_4" style="display: none;">
                                        <input name="slubb4" class="form-control input-sm" type="Number" id="slub_4" value="<?php if($dataDefect['slub_yd4']){ echo $dataDefect['slub_yd4']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                </td>
                                <td>
                                    <div id="barredefectNumber_1" style="display: none;">
                                        <input name="barre_defect1" class="form-control input-sm" type="Number" id="barredefect_1" value="<?php if($dataDefect['barre_yd1']){ echo $dataDefect['barre_yd1']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="barredefectNumber_2" style="display: none;">
                                        <input name="barre_defect2" class="form-control input-sm" type="Number" id="barredefect_2" value="<?php if($dataDefect['barre_yd2']){ echo $dataDefect['barre_yd2']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="barredefectNumber_3" style="display: none;">
                                        <input name="barre_defect3" class="form-control input-sm" type="Number" id="barredefect_3" value="<?php if($dataDefect['barre_yd3']){ echo $dataDefect['barre_yd3']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="barredefectNumber_4" style="display: none;">
                                        <input name="barre_defect4" class="form-control input-sm" type="Number" id="barredefect_4" value="<?php if($dataDefect['barre_yd4']){ echo $dataDefect['barre_yd4']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                </td>
                                <td>
                                    <div id="unevenNumber_1" style="display: none;">
                                        <input name="uneven1" class="form-control input-sm" type="Number" id="uneven_1" value="<?php if($dataDefect['uneven_yarn_yd1']){ echo $dataDefect['uneven_yarn_yd1']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="unevenNumber_2" style="display: none;">
                                        <input name="uneven2" class="form-control input-sm" type="Number" id="uneven_2" value="<?php if($dataDefect['uneven_yarn_yd2']){ echo $dataDefect['uneven_yarn_yd2']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="unevenNumber_3" style="display: none;">
                                        <input name="uneven3" class="form-control input-sm" type="Number" id="uneven_3" value="<?php if($dataDefect['uneven_yarn_yd3']){ echo $dataDefect['uneven_yarn_yd3']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="unevenNumber_4" style="display: none;">
                                        <input name="uneven4" class="form-control input-sm" type="Number" id="uneven_4" value="<?php if($dataDefect['uneven_yarn_yd4']){ echo $dataDefect['uneven_yarn_yd4']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                </td>
                                <td>
                                    <div id="yarnNumber_1" style="display: none;">
                                        <input name="yarn1" class="form-control input-sm" type="Number" id="yarn_con_1" value="<?php if($dataDefect['yarn_contamination_yd1']){ echo $dataDefect['yarn_contamination_yd1']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="yarnNumber_2" style="display: none;">
                                        <input name="yarn2" class="form-control input-sm" type="Number" id="yarn_con_2" value="<?php if($dataDefect['yarn_contamination_yd2']){ echo $dataDefect['yarn_contamination_yd2']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="yarnNumber_3" style="display: none;">
                                        <input name="yarn3" class="form-control input-sm" type="Number" id="yarn_con_3" value="<?php if($dataDefect['yarn_contamination_yd3']){ echo $dataDefect['yarn_contamination_yd3']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="yarnNumber_4" style="display: none;">
                                        <input name="yarn4" class="form-control input-sm" type="Number" id="yarn_con_4" value="<?php if($dataDefect['yarn_contamination_yd4']){ echo $dataDefect['yarn_contamination_yd4']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                </td>
                                <td>
                                    <div id="nepsNumber_1" style="display: none;">
                                        <input name="neps1" class="form-control input-sm" type="Number" id="neps_1" value="<?php if($dataDefect['neps_dead_cotton_yd1']){ echo $dataDefect['neps_dead_cotton_yd1']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="nepsNumber_2" style="display: none;">
                                        <input name="neps2" class="form-control input-sm" type="Number" id="neps_2" value="<?php if($dataDefect['neps_dead_cotton_yd2']){ echo $dataDefect['neps_dead_cotton_yd2']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="nepsNumber_3" style="display: none;">
                                        <input name="neps3" class="form-control input-sm" type="Number" id="neps_3" value="<?php if($dataDefect['neps_dead_cotton_yd3']){ echo $dataDefect['neps_dead_cotton_yd3']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="nepsNumber_4" style="display: none;">
                                        <input name="neps4" class="form-control input-sm" type="Number" id="neps_4" value="<?php if($dataDefect['neps_dead_cotton_yd4']){ echo $dataDefect['neps_dead_cotton_yd4']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                </td>
                                <td>
                                    <div id="miscNumber_1" style="display: none;">
                                        <input name="misc1" class="form-control input-sm" type="Number" id="misc_1" value="<?php if($dataDefect['misc_yd1']){ echo $dataDefect['misc_yd1']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="miscNumber_2" style="display: none;">
                                        <input name="misc2" class="form-control input-sm" type="Number" id="misc_2" value="<?php if($dataDefect['misc_yd2']){ echo $dataDefect['misc_yd2']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="miscNumber_3" style="display: none;">
                                        <input name="misc3" class="form-control input-sm" type="Number" id="misc_3" value="<?php if($dataDefect['misc_yd3']){ echo $dataDefect['misc_yd3']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                    <div id="miscNumber_4" style="display: none;">
                                        <input name="misc4" class="form-control input-sm" type="Number" id="misc_4" value="<?php if($dataDefect['misc_yd4']){ echo $dataDefect['misc_yd4']; } else { echo "0"; } ?>" min="0">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_slub">(-) SLUB</a></center></th>
                                <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_barredefect">(-) BARRE</a></center></th>
                                <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_uneven">(-) UNEVEN YARN</a></center></th>
                                <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_yarn">(-) YARN CONTAMINATION</a></center></th>
                                <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_neps">(-) NEPS/DEAD COTTON</a></center></th>
                                <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_misc">(-) MISC.</a></center></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="tab-pane" id="construction">
                    <div class="post">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_missing">(+) MISSING LINE</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_holes">(+) HOLES</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_steaks">(+) STEAKS</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_misknit">(+) MISKNIT</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_knot">(+) KNOT</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_oil">(+) OIL MARK</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_fly">(+) FLY</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_misc2">(+) MISC.</a></center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div id="missingNumber_1" style="display: none;">
                                            <input name="missing1" class="form-control input-sm" type="Number" id="missing_1" value="<?php if($dataDefect['missing_line_cd1']){ echo $dataDefect['missing_line_cd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="missingNumber_2" style="display: none;">
                                            <input name="missing2" class="form-control input-sm" type="Number" id="missing_2" value="<?php if($dataDefect['missing_line_cd2']){ echo $dataDefect['missing_line_cd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="missingNumber_3" style="display: none;">
                                            <input name="missing3" class="form-control input-sm" type="Number" id="missing_3" value="<?php if($dataDefect['missing_line_cd3']){ echo $dataDefect['missing_line_cd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="missingNumber_4" style="display: none;">
                                            <input name="missing4" class="form-control input-sm" type="Number" id="missing_4" value="<?php if($dataDefect['missing_line_cd4']){ echo $dataDefect['missing_line_cd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="holesNumber_1" style="display: none;">
                                            <input name="holes1" class="form-control input-sm" type="Number" id="holes_1" value="<?php if($dataDefect['holes_cd1']){ echo $dataDefect['holes_cd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="holesNumber_2" style="display: none;">
                                            <input name="holes2" class="form-control input-sm" type="Number" id="holes_2" value="<?php if($dataDefect['holes_cd2']){ echo $dataDefect['holes_cd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="holesNumber_3" style="display: none;">
                                            <input name="holes3" class="form-control input-sm" type="Number" id="holes_3" value="<?php if($dataDefect['holes_cd3']){ echo $dataDefect['holes_cd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="holesNumber_4" style="display: none;">
                                            <input name="hole41" class="form-control input-sm" type="Number" id="holes_4" value="<?php if($dataDefect['holes_cd4']){ echo $dataDefect['holes_cd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="steaksNumber_1" style="display: none;">
                                            <input name="steaks1" class="form-control input-sm" type="Number" id="steaks_1" value="<?php if($dataDefect['steaks_cd1']){ echo $dataDefect['steaks_cd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="steaksNumber_2" style="display: none;">
                                            <input name="steaks2" class="form-control input-sm" type="Number" id="steaks_2" value="<?php if($dataDefect['steaks_cd2']){ echo $dataDefect['steaks_cd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="steaksNumber_3" style="display: none;">
                                            <input name="steaks3" class="form-control input-sm" type="Number" id="steaks_3" value="<?php if($dataDefect['steaks_cd3']){ echo $dataDefect['steaks_cd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="steaksNumber_4" style="display: none;">
                                            <input name="steaks4" class="form-control input-sm" type="Number" id="steaks_4" value="<?php if($dataDefect['steaks_cd4']){ echo $dataDefect['steaks_cd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="misknitNumber_1" style="display: none;">
                                            <input name="misknit1" class="form-control input-sm" type="Number" id="misknit_1" value="<?php if($dataDefect['misknit_cd1']){ echo $dataDefect['misknit_cd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="misknitNumber_2" style="display: none;">
                                            <input name="misknit2" class="form-control input-sm" type="Number" id="misknit_2" value="<?php if($dataDefect['misknit_cd2']){ echo $dataDefect['misknit_cd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="misknitNumber_3" style="display: none;">
                                            <input name="misknit3" class="form-control input-sm" type="Number" id="misknit_3" value="<?php if($dataDefect['misknit_cd3']){ echo $dataDefect['misknit_cd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="misknitNumber_4" style="display: none;">
                                            <input name="misknit4" class="form-control input-sm" type="Number" id="misknit_4" value="<?php if($dataDefect['misknit_cd4']){ echo $dataDefect['misknit_cd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="knotNumber_1" style="display: none;">
                                            <input name="knot1" class="form-control input-sm" type="Number" id="knot_1" value="<?php if($dataDefect['knot_cd1']){ echo $dataDefect['knot_cd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="knotNumber_2" style="display: none;">
                                            <input name="knot2" class="form-control input-sm" type="Number" id="knot_2" value="<?php if($dataDefect['knot_cd2']){ echo $dataDefect['knot_cd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="knotNumber_3" style="display: none;">
                                            <input name="knot4" class="form-control input-sm" type="Number" id="knot_3" value="<?php if($dataDefect['knot_cd3']){ echo $dataDefect['knot_cd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="knotNumber_4" style="display: none;">
                                            <input name="knot4" class="form-control input-sm" type="Number" id="knot_4" value="<?php if($dataDefect['knot_cd4']){ echo $dataDefect['knot_cd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="oilNumber_1" style="display: none;">
                                            <input name="oil1" class="form-control input-sm" type="Number" id="oil_1" value="<?php if($dataDefect['oil_mark_cd1']){ echo $dataDefect['oil_mark_cd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="oilNumber_2" style="display: none;">
                                            <input name="oil2" class="form-control input-sm" type="Number" id="oil_2" value="<?php if($dataDefect['oil_mark_cd2']){ echo $dataDefect['oil_mark_cd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="oilNumber_3" style="display: none;">
                                            <input name="oil3" class="form-control input-sm" type="Number" id="oil_3" value="<?php if($dataDefect['oil_mark_cd3']){ echo $dataDefect['oil_mark_cd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="oilNumber_4" style="display: none;">
                                            <input name="oil4" class="form-control input-sm" type="Number" id="oil_4" value="<?php if($dataDefect['oil_mark_cd4']){ echo $dataDefect['oil_mark_cd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="flyNumber_1" style="display: none;">
                                            <input name="fly1" class="form-control input-sm" type="Number" id="fly_1" value="<?php if($dataDefect['fly_cd1']){ echo $dataDefect['fly_cd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="flyNumber_2" style="display: none;">
                                            <input name="fly2" class="form-control input-sm" type="Number" id="fly_2" value="<?php if($dataDefect['fly_cd2']){ echo $dataDefect['fly_cd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="flyNumber_3" style="display: none;">
                                            <input name="fly3" class="form-control input-sm" type="Number" id="fly_3" value="<?php if($dataDefect['fly_cd3']){ echo $dataDefect['fly_cd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="flyNumber_4" style="display: none;">
                                            <input name="fly4" class="form-control input-sm" type="Number" id="fly_4" value="<?php if($dataDefect['fly_cd4']){ echo $dataDefect['fly_cd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="misc2Number_1" style="display: none;">
                                            <input name="misc21" class="form-control input-sm" type="Number" id="misc2_1" value="<?php if($dataDefect['misc_cd1']){ echo $dataDefect['misc_cd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="misc2Number_2" style="display: none;">
                                            <input name="misc22" class="form-control input-sm" type="Number" id="misc2_2" value="<?php if($dataDefect['misc_cd2']){ echo $dataDefect['misc_cd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="misc2Number_3" style="display: none;">
                                            <input name="misc23" class="form-control input-sm" type="Number" id="misc2_3" value="<?php if($dataDefect['misc_cd3']){ echo $dataDefect['misc_cd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="misc2Number_4" style="display: none;">
                                            <input name="misc24" class="form-control input-sm" type="Number" id="misc2_4" value="<?php if($dataDefect['misc_cd4']){ echo $dataDefect['misc_cd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_missing">(-) Missing Line</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_holes">(-) Holes</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_steaks">(-) Steaks</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_misknit">(-) Misknit</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_knot">(-) Knot</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_oil">(-) Oil Mark</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_fly">(-) Fly</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_misc2">(-) Misc.</a></center></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="tab-pane" id="dye_finishing">
                    <div class="post">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_hairiness">(+) HAIRINESS</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_holes_dye">(+) HOLES</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_color">(+) COLOR TONE</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_abrasion">(+) ABRASION</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_dye_spot">(+) DYE SPOT/STREAKS</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_wrinkles">(+) WRINKLES/FOLD MARK</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_bowing">(+) BOWING SKEWING</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_pin">(+) PIN HOLES</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_pick">(+) PICK</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_knot2">(+) KNOT</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_misc3">(+) MISC</a></center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div id="hairinessNumber_1" style="display: none;">
                                            <input name="hairiness1" class="form-control input-sm" type="Number" id="hairiness_1" value="<?php if($dataDefect['hairiness_dfd1']){ echo $dataDefect['hairiness_dfd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="hairinessNumber_2" style="display: none;">
                                            <input name="hairiness2" class="form-control input-sm" type="Number" id="hairiness_2" value="<?php if($dataDefect['hairiness_dfd2']){ echo $dataDefect['hairiness_dfd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="hairinessNumber_3" style="display: none;">
                                            <input name="hairiness3" class="form-control input-sm" type="Number" id="hairiness_3" value="<?php if($dataDefect['hairiness_dfd3']){ echo $dataDefect['hairiness_dfd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="hairinessNumber_4" style="display: none;">
                                            <input name="hairiness4" class="form-control input-sm" type="Number" id="hairiness_4" value="<?php if($dataDefect['hairiness_dfd4']){ echo $dataDefect['hairiness_dfd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="holes_dyeNumber_1" style="display: none;">
                                            <input name="holes_dye1" class="form-control input-sm" type="Number" id="holes_dye_1" value="<?php if($dataDefect['holes_dfd1']){ echo $dataDefect['holes_dfd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="holes_dyeNumber_2" style="display: none;">
                                            <input name="holes_dye2" class="form-control input-sm" type="Number" id="holes_dye_2" value="<?php if($dataDefect['holes_dfd2']){ echo $dataDefect['holes_dfd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="holes_dyeNumber_3" style="display: none;">
                                            <input name="holes_dye3" class="form-control input-sm" type="Number" id="holes_dye_3" value="<?php if($dataDefect['holes_dfd3']){ echo $dataDefect['holes_dfd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="holes_dyeNumber_4" style="display: none;">
                                            <input name="holes_dye4" class="form-control input-sm" type="Number" id="holes_dye_4" value="<?php if($dataDefect['holes_dfd4']){ echo $dataDefect['holes_dfd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="colorNumber_1" style="display: none;">
                                            <input name="color1" class="form-control input-sm" type="Number" id="color_1" value="<?php if($dataDefect['color_tone_dfd1']){ echo $dataDefect['color_tone_dfd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="colorNumber_2" style="display: none;">
                                            <input name="color2" class="form-control input-sm" type="Number" id="color_2" value="<?php if($dataDefect['color_tone_dfd2']){ echo $dataDefect['color_tone_dfd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="colorNumber_3" style="display: none;">
                                            <input name="color3" class="form-control input-sm" type="Number" id="color_3" value="<?php if($dataDefect['color_tone_dfd3']){ echo $dataDefect['color_tone_dfd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="colorNumber_4" style="display: none;">
                                            <input name="color4" class="form-control input-sm" type="Number" id="color_4" value="<?php if($dataDefect['color_tone_dfd4']){ echo $dataDefect['color_tone_dfd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="abrasionNumber_1" style="display: none;">
                                            <input name="abrasion1" class="form-control input-sm" type="Number" id="abrasion_1" value="<?php if($dataDefect['abrasion_dfd1']){ echo $dataDefect['abrasion_dfd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="abrasionNumber_2" style="display: none;">
                                            <input name="abrasion2" class="form-control input-sm" type="Number" id="abrasion_2" value="<?php if($dataDefect['abrasion_dfd2']){ echo $dataDefect['abrasion_dfd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="abrasionNumber_3" style="display: none;">
                                            <input name="abrasion3" class="form-control input-sm" type="Number" id="abrasion_3" value="<?php if($dataDefect['abrasion_dfd3']){ echo $dataDefect['abrasion_dfd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="abrasionNumber_4" style="display: none;">
                                            <input name="abrasion4" class="form-control input-sm" type="Number" id="abrasion_4" value="<?php if($dataDefect['abrasion_dfd4']){ echo $dataDefect['abrasion_dfd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="dye_spotNumber_1" style="display: none;">
                                            <input name="dye_spot1" class="form-control input-sm" type="Number" id="dye_spot_1" value="<?php if($dataDefect['dye_spot_dfd1']){ echo $dataDefect['dye_spot_dfd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="dye_spotNumber_2" style="display: none;">
                                            <input name="dye_spot2" class="form-control input-sm" type="Number" id="dye_spot_2" value="<?php if($dataDefect['dye_spot_dfd2']){ echo $dataDefect['dye_spot_dfd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="dye_spotNumber_3" style="display: none;">
                                            <input name="dye_spot3" class="form-control input-sm" type="Number" id="dye_spot_3" value="<?php if($dataDefect['dye_spot_dfd3']){ echo $dataDefect['dye_spot_dfd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="dye_spotNumber_4" style="display: none;">
                                            <input name="dye_spot4" class="form-control input-sm" type="Number" id="dye_spot_4" value="<?php if($dataDefect['dye_spot_dfd4']){ echo $dataDefect['dye_spot_dfd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="wrinklesNumber_1" style="display: none;">
                                            <input name="wrinkles1" class="form-control input-sm" type="Number" id="wrinkles_1" value="<?php if($dataDefect['wrinkless_fold_dfd1']){ echo $dataDefect['wrinkless_fold_dfd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="wrinklesNumber_2" style="display: none;">
                                            <input name="wrinkles2" class="form-control input-sm" type="Number" id="wrinkles_2" value="<?php if($dataDefect['wrinkless_fold_dfd2']){ echo $dataDefect['wrinkless_fold_dfd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="wrinklesNumber_3" style="display: none;">
                                            <input name="wrinkles3" class="form-control input-sm" type="Number" id="wrinkles_3" value="<?php if($dataDefect['wrinkless_fold_dfd3']){ echo $dataDefect['wrinkless_fold_dfd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="wrinklesNumber_4" style="display: none;">
                                            <input name="wrinkles4" class="form-control input-sm" type="Number" id="wrinkles_4" value="<?php if($dataDefect['wrinkless_fold_dfd4']){ echo $dataDefect['wrinkless_fold_dfd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="bowingNumber_1" style="display: none;">
                                            <input name="bowing1" class="form-control input-sm" type="Number" id="bowing_1" value="<?php if($dataDefect['bowing_skewing_dfd1']){ echo $dataDefect['bowing_skewing_dfd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="bowingNumber_2" style="display: none;">
                                            <input name="bowing2" class="form-control input-sm" type="Number" id="bowing_2" value="<?php if($dataDefect['bowing_skewing_dfd2']){ echo $dataDefect['bowing_skewing_dfd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="bowingNumber_3" style="display: none;">
                                            <input name="bowing3" class="form-control input-sm" type="Number" id="bowing_3" value="<?php if($dataDefect['bowing_skewing_dfd3']){ echo $dataDefect['bowing_skewing_dfd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="bowingNumber_4" style="display: none;">
                                            <input name="bowing4" class="form-control input-sm" type="Number" id="bowing_4" value="<?php if($dataDefect['bowing_skewing_dfd4']){ echo $dataDefect['bowing_skewing_dfd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="pinNumber_1" style="display: none;">
                                            <input name="pin1" class="form-control input-sm" type="Number" id="pin_1" value="<?php if($dataDefect['pin_holes_dfd1']){ echo $dataDefect['pin_holes_dfd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="pinNumber_2" style="display: none;">
                                            <input name="pin2" class="form-control input-sm" type="Number" id="pin_2" value="<?php if($dataDefect['pin_holes_dfd2']){ echo $dataDefect['pin_holes_dfd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="pinNumber_3" style="display: none;">
                                            <input name="pin3" class="form-control input-sm" type="Number" id="pin_3" value="<?php if($dataDefect['pin_holes_dfd3']){ echo $dataDefect['pin_holes_dfd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="pinNumber_4" style="display: none;">
                                            <input name="pin4" class="form-control input-sm" type="Number" id="pin_4" value="<?php if($dataDefect['pin_holes_dfd4']){ echo $dataDefect['pin_holes_dfd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="pickNumber_1" style="display: none;">
                                            <input name="pick1" class="form-control input-sm" type="N    umber" id="pick_1" value="<?php if($dataDefect['pick_dfd1']){ echo $dataDefect['pick_dfd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="pickNumber_2" style="display: none;">
                                            <input name="pick2" class="form-control input-sm" type="N    umber" id="pick_2" value="<?php if($dataDefect['pick_dfd2']){ echo $dataDefect['pick_dfd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="pickNumber_3" style="display: none;">
                                            <input name="pick3" class="form-control input-sm" type="N    umber" id="pick_3" value="<?php if($dataDefect['pick_dfd3']){ echo $dataDefect['pick_dfd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="pickNumber_4" style="display: none;">
                                            <input name="pick4" class="form-control input-sm" type="N    umber" id="pick_4" value="<?php if($dataDefect['pick_dfd4']){ echo $dataDefect['pick_dfd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="knot2Number_1" style="display: none;">
                                            <input name="knot21" class="form-control input-sm" type="Number" id="knot2_1" value="<?php if($dataDefect['knot_dfd1']){ echo $dataDefect['knot_dfd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="knot2Number_2" style="display: none;">
                                            <input name="knot22" class="form-control input-sm" type="Number" id="knot2_2" value="<?php if($dataDefect['knot_dfd2']){ echo $dataDefect['knot_dfd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="knot2Number_3" style="display: none;">
                                            <input name="knot23" class="form-control input-sm" type="Number" id="knot2_3" value="<?php if($dataDefect['knot_dfd3']){ echo $dataDefect['knot_dfd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="knot2Number_4" style="display: none;">
                                            <input name="knot24" class="form-control input-sm" type="Number" id="knot2_4" value="<?php if($dataDefect['knot_dfd4']){ echo $dataDefect['knot_dfd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="misc3Number_1" style="display: none;">
                                            <input name="misc31" class="form-control input-sm" type="Number" id="misc3_1" value="<?php if($dataDefect['misc_dfd1']){ echo $dataDefect['misc_dfd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="misc3Number_2" style="display: none;">
                                            <input name="misc32" class="form-control input-sm" type="Number" id="misc3_2" value="<?php if($dataDefect['misc_dfd2']){ echo $dataDefect['misc_dfd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="misc3Number_3" style="display: none;">
                                            <input name="misc33" class="form-control input-sm" type="Number" id="misc3_3" value="<?php if($dataDefect['misc_dfd3']){ echo $dataDefect['misc_dfd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="misc3Number_4" style="display: none;">
                                            <input name="misc34" class="form-control input-sm" type="Number" id="misc3_4" value="<?php if($dataDefect['misc_dfd4']){ echo $dataDefect['misc_dfd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_hairiness">(+) HAIRINESS</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_holes_dye">(+) HOLES</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_color">(+) COLOR TONE</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_abrasion">(+) ABRASION</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_dye_spot">(+) DYE SPOT/STREAKS</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_wrinkles">(+) WRINKLES/FOLD MARK</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_bowing">(+) BOWING SKEWING</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_pin">(+) PIN HOLES</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_pick">(+) PICK</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_knot2">(+) KNOT</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_misc3">(+) MISC</a></center></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="tab-pane" id="cleanliness">
                    <div class="post">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_ueven">(+) UEVEN SHEARING</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_stains">(+) STAINS</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_oil_grease">(+) OIL/GREASE SPOT</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_dirt">(+) DIRT/SOIL</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_water">(+) WATER MARK</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_misc4">(+) MISC.</a></center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div id="uevenNumber_1" style="display: none;">
                                            <input name="ueven1" class="form-control input-sm" type="Number" id="ueven_1" value="<?php if($dataDefect['ueven_shearing_cld1']){ echo $dataDefect['ueven_shearing_cld1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="uevenNumber_2" style="display: none;">
                                            <input name="ueven2" class="form-control input-sm" type="Number" id="ueven_2" value="<?php if($dataDefect['ueven_shearing_cld2']){ echo $dataDefect['ueven_shearing_cld2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="uevenNumber_3" style="display: none;">
                                            <input name="ueven3" class="form-control input-sm" type="Number" id="ueven_3" value="<?php if($dataDefect['ueven_shearing_cld3']){ echo $dataDefect['ueven_shearing_cld3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="uevenNumber_4" style="display: none;">
                                            <input name="ueven4" class="form-control input-sm" type="Number" id="ueven_4" value="<?php if($dataDefect['ueven_shearing_cld4']){ echo $dataDefect['ueven_shearing_cld4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="stainsNumber_1" style="display: none;">
                                            <input name="stains1" class="form-control input-sm" type="Number" id="stains_1" value="<?php if($dataDefect['stans_cld1']){ echo $dataDefect['stans_cld1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="stainsNumber_2" style="display: none;">
                                            <input name="stains2" class="form-control input-sm" type="Number" id="stains_2" value="<?php if($dataDefect['stans_cld2']){ echo $dataDefect['stans_cld2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="stainsNumber_3" style="display: none;">
                                            <input name="stains3" class="form-control input-sm" type="Number" id="stains_3" value="<?php if($dataDefect['stans_cld3']){ echo $dataDefect['stans_cld3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="stainsNumber_4" style="display: none;">
                                            <input name="stains4" class="form-control input-sm" type="Number" id="stains_4" value="<?php if($dataDefect['stans_cld4']){ echo $dataDefect['stans_cld4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="oil_greaseNumber_1" style="display: none;">
                                            <input name="oil_grease1" class="form-control input-sm" type="Number" id="oil_grease_1" value="<?php if($dataDefect['oil_grease_cld1']){ echo $dataDefect['oil_grease_cld1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="oil_greaseNumber_2" style="display: none;">
                                            <input name="oil_grease2" class="form-control input-sm" type="Number" id="oil_grease_2" value="<?php if($dataDefect['oil_grease_cld2']){ echo $dataDefect['oil_grease_cld2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="oil_greaseNumber_3" style="display: none;">
                                            <input name="oil_grease3" class="form-control input-sm" type="Number" id="oil_grease_3" value="<?php if($dataDefect['oil_grease_cld3']){ echo $dataDefect['oil_grease_cld3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="oil_greaseNumber_4" style="display: none;">
                                            <input name="oil_grease4" class="form-control input-sm" type="Number" id="oil_grease_4" value="<?php if($dataDefect['oil_grease_cld4']){ echo $dataDefect['oil_grease_cld4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="dirtNumber_1" style="display: none;">
                                            <input name="dirt1" class="form-control input-sm" type="Number" id="dirt_1" value="<?php if($dataDefect['dirt_cld1']){ echo $dataDefect['dirt_cld1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="dirtNumber_2" style="display: none;">
                                            <input name="dirt2" class="form-control input-sm" type="Number" id="dirt_2" value="<?php if($dataDefect['dirt_cld2']){ echo $dataDefect['dirt_cld2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="dirtNumber_3" style="display: none;">
                                            <input name="dirt3" class="form-control input-sm" type="Number" id="dirt_3" value="<?php if($dataDefect['dirt_cld3']){ echo $dataDefect['dirt_cld3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="dirtNumber_4" style="display: none;">
                                            <input name="dirt4" class="form-control input-sm" type="Number" id="dirt_4" value="<?php if($dataDefect['dirt_cld4']){ echo $dataDefect['dirt_cld4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="waterNumber_1" style="display: none;">
                                            <input name="water1" class="form-control input-sm" type="Number" id="water_1" value="<?php if($dataDefect['water_cld1']){ echo $dataDefect['water_cld1']; } else { echo "0"; } ?>" min="0">
                                        </div> 
                                        <div id="waterNumber_2" style="display: none;">
                                            <input name="water2" class="form-control input-sm" type="Number" id="water_2" value="<?php if($dataDefect['water_cld2']){ echo $dataDefect['water_cld2']; } else { echo "0"; } ?>" min="0">
                                        </div> 
                                        <div id="waterNumber_3" style="display: none;">
                                            <input name="water3" class="form-control input-sm" type="Number" id="water_3" value="<?php if($dataDefect['water_cld3']){ echo $dataDefect['water_cld3']; } else { echo "0"; } ?>" min="0">
                                        </div> 
                                        <div id="waterNumber_4" style="display: none;">
                                            <input name="water4" class="form-control input-sm" type="Number" id="water_4" value="<?php if($dataDefect['water_cld4']){ echo $dataDefect['water_cld4']; } else { echo "0"; } ?>" min="0">
                                        </div> 
                                    </td>
                                    <td>
                                        <div id="misc4Number_1" style="display: none;">
                                            <input name="misc41" class="form-control input-sm" type="Number" id="misc4_1" value="<?php if($dataDefect['misc_cld1']){ echo $dataDefect['misc_cld1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="misc4Number_2" style="display: none;">
                                            <input name="misc42" class="form-control input-sm" type="Number" id="misc4_2" value="<?php if($dataDefect['misc_cld2']){ echo $dataDefect['misc_cld2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="misc4Number_3" style="display: none;">
                                            <input name="misc43" class="form-control input-sm" type="Number" id="misc4_3" value="<?php if($dataDefect['misc_cld3']){ echo $dataDefect['misc_cld3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="misc4Number_4" style="display: none;">
                                            <input name="misc44" class="form-control input-sm" type="Number" id="misc4_4" value="<?php if($dataDefect['misc_cld4']){ echo $dataDefect['misc_cld4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_ueven">(+) UEVEN SHEARING</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_stains">(+) STAINS</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_oil_grease">(+) OIL/GREASE SPOT</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_dirt">(+) DIRT/SOIL</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_water">(+) WATER MARK</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_misc4">(+) MISC.</a></center></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="tab-pane" id="print">
                    <div class="post">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_print_defect">(+) PRINT</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="tambah_misc5">(+) MISC</a></center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div id="print_defectNumber_1" style="display: none;">
                                            <input name="print_defect1" class="form-control input-sm" type="Number" id="print_defect_1" value="<?php if($dataDefect['print_pd1']){ echo $dataDefect['print_pd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="print_defectNumber_2" style="display: none;">
                                            <input name="print_defect2" class="form-control input-sm" type="Number" id="print_defect_2" value="<?php if($dataDefect['print_pd2']){ echo $dataDefect['print_pd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="print_defectNumber_3" style="display: none;">
                                            <input name="print_defect3" class="form-control input-sm" type="Number" id="print_defect_3" value="<?php if($dataDefect['print_pd3']){ echo $dataDefect['print_pd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="print_defectNumber_4" style="display: none;">
                                            <input name="print_defect4" class="form-control input-sm" type="Number" id="print_defect_4" value="<?php if($dataDefect['print_pd4']){ echo $dataDefect['print_pd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                    <td>
                                        <div id="misc5Number_1" style="display: none;">
                                            <input name="misc51" class="form-control input-sm" type="Number" id="misc5_1" value="<?php if($dataDefect['misc_pd1']){ echo $dataDefect['misc_pd1']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="misc5Number_2" style="display: none;">
                                            <input name="misc52" class="form-control input-sm" type="Number" id="misc5_2" value="<?php if($dataDefect['misc_pd2']){ echo $dataDefect['misc_pd2']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="misc5Number_3" style="display: none;">
                                            <input name="misc53" class="form-control input-sm" type="Number" id="misc5_3" value="<?php if($dataDefect['misc_pd3']){ echo $dataDefect['misc_pd3']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                        <div id="misc5Number_4" style="display: none;">
                                            <input name="misc54" class="form-control input-sm" type="Number" id="misc5_4" value="<?php if($dataDefect['misc_pd4']){ echo $dataDefect['misc_pd4']; } else { echo "0"; } ?>" min="0">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_print_defect">(+) PRINT</a></center></th>
                                    <th><center><a href="#" class="btn btn-default btn-xs" id="kurang_misc5">(+) MISC</a></center></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="row">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nokk" class=" col-sm-12 control-label">KETERANGAN INSPEKSI</label>
                            <div class="col-sm-12">
                                <textarea name="ket_inspek" class="form-control input-sm" id="ket_inspek"><?= $dataket_inspek['ket_inspek']; ?></textarea><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<script src="chosen/chosen.jquery.js" type="text/javascript"></script>
<script src="chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>
<script>
    $(function () {
        $('#example ').DataTable()
        $('#table-inspeksi-kain').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false,
            'paging'      : true,
            'lengthMenu'  : [[5, 10, 15, -1], [5, 10, 15, "All"]],
            'pagingType'  : "simple"
        })
    })
</script>
</body>
</html>