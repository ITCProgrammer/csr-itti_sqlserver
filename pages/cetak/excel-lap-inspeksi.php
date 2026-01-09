<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Lap-Inspektor-".date($_GET['awal']).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
ini_set("error_reporting", 1);
session_start();
include "../../koneksi.php";
?>
<div align="center"> <h1>LAPORAN INSPEKTOR</h1></div>
<h3>Tanggal : <?php echo $_GET['awal']." s/d ".$_GET['akhir'];?></h3>
<table width="100%" border="1">
    <tr>
        <th rowspan="4" align="center" bgcolor="#729FCF">Nama Operator</th>
        <th rowspan="4" align="center" bgcolor="#729FCF">Penanggung Jawab</th>
        <th rowspan="4" align="center" bgcolor="#729FCF">Shift</th>
        <th colspan="52" align="center" bgcolor="#729FCF">Quantity</th>
        <th colspan="3" align="center" bgcolor="#729FCF">Quantity</th>
    </tr>
    <tr>
        <th colspan="8" align="center" bgcolor="#729FCF">Inspek</th>
        <th colspan="8" align="center" bgcolor="#729FCF">Inspek Qty Kecil</th>
        <th colspan="8" align="center" bgcolor="#729FCF">Inspek White</th>
        <th colspan="3" align="center" bgcolor="#729FCF">Inspek Oven</th>
        <th rowspan="3" align="center" bgcolor="#729FCF">Yard/Menit</th>
        <th colspan="3" align="center" bgcolor="#729FCF">Inspek Packing</th>
        <th rowspan="3" align="center" bgcolor="#729FCF">Yard/Menit</th>
        <th colspan="3" align="center" bgcolor="#729FCF">Pisah</th>
        <th rowspan="3" align="center" bgcolor="#729FCF">Yard/Menit</th>
        <th colspan="3" align="center" bgcolor="#729FCF">Perbaikan</th>
        <th rowspan="3" align="center" bgcolor="#729FCF">Yard/Menit</th>
        <th colspan="3" align="center" bgcolor="#729FCF">Perbaikan Grade</th>
        <th rowspan="3" align="center" bgcolor="#729FCF">Yard/Menit</th>
        <th colspan="3" align="center" bgcolor="#729FCF">Kragh</th>
        <th rowspan="3" align="center" bgcolor="#729FCF">Yard/Menit</th>
        <th colspan="3" align="center" bgcolor="#729FCF">Packing</th>
        <th rowspan="3" align="center" bgcolor="#729FCF">Yard/Menit</th>
        <th rowspan="3" align="center" bgcolor="#729FCF">Roll</th>
        <th rowspan="3" align="center" bgcolor="#729FCF">Kg</th>
        <th rowspan="3" align="center" bgcolor="#729FCF">Yard</th>
    </tr>
    <tr>
        <th colspan="3" align="center" bgcolor="#729FCF">Lululemon</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Yard/Menit</th>
        <th colspan="3" align="center" bgcolor="#729FCF">Adidas dan Lainnya</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Yard/Menit</th>
        <th colspan="3" align="center" bgcolor="#729FCF">Lululemon</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Yard/Menit</th>
        <th colspan="3" align="center" bgcolor="#729FCF">Adidas dan Lainnya</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Yard/Menit</th>
        <th colspan="3" align="center" bgcolor="#729FCF">Lululemon</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Yard/Menit</th>
        <th colspan="3" align="center" bgcolor="#729FCF">Adidas dan Lainnya</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Yard/Menit</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Roll</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Kg</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Yard</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Roll</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Kg</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Yard</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Roll</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Kg</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Yard</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Roll</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Kg</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Yard</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Roll</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Kg</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Yard</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Roll</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Kg</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Yard</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Roll</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Kg</th>
        <th rowspan="2" align="center" bgcolor="#729FCF">Yard</th>
    </tr>
    <tr>
        <th align="center" bgcolor="#729FCF">Roll</th>
        <th align="center" bgcolor="#729FCF">Kg</th>
        <th align="center" bgcolor="#729FCF">Yard</th>
        <th align="center" bgcolor="#729FCF">Roll</th>
        <th align="center" bgcolor="#729FCF">Kg</th>
        <th align="center" bgcolor="#729FCF">Yard</th>
        <th align="center" bgcolor="#729FCF">Roll</th>
        <th align="center" bgcolor="#729FCF">Kg</th>
        <th align="center" bgcolor="#729FCF">Yard</th>
        <th align="center" bgcolor="#729FCF">Roll</th>
        <th align="center" bgcolor="#729FCF">Kg</th>
        <th align="center" bgcolor="#729FCF">Yard</th>
        <th align="center" bgcolor="#729FCF">Roll</th>
        <th align="center" bgcolor="#729FCF">Kg</th>
        <th align="center" bgcolor="#729FCF">Yard</th>
        <th align="center" bgcolor="#729FCF">Roll</th>
        <th align="center" bgcolor="#729FCF">Kg</th>
        <th align="center" bgcolor="#729FCF">Yard</th>
    </tr>
    <?php 
    if($_GET['shift']=="ALL"){		
        $Wshift=" ";	
    }else{	
        $Wshift=" AND b.shift='$_GET[shift]' ";	
    }
    if($_GET['gshift']=="ALL"){		
        $WGshift=" ";	
    }else{	
        $WGshift=" AND b.g_shift='$_GET[gshift]' ";	
    }
    if($_GET['personil']=="ALL"){		
        $Wnama=" ";	
    }else{	
        $Wnama=" AND a.personil='$_GET[personil]'  ";	
    }
        $sql=mysqli_query($con,"SELECT a.personil,b.shift,b.t_jawab FROM tbl_inspection a LEFT JOIN tbl_schedule b 
        ON a.id_schedule=b.id WHERE a.status='selesai' AND DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' 
        AND '$_GET[akhir]' $Wnama $Wshift $WGshift GROUP BY a.personil,b.shift,b.`t_jawab`
        ORDER BY a.personil ASC");
        while($r=mysqli_fetch_array($sql)){
             //Inspect
             $sqlIns=mysqli_query($con,"SELECT
             b.g_shift,
             SUM( a.jml_rol ) AS rolIns,
             SUM( a.qty ) AS brutoIns,
             SUM( a.yard ) AS panjangIns,
             TIMESTAMPDIFF(MINUTE, b.tgl_mulai,b.tgl_stop) AS waktuIns,
             IF(a.yard>0,a.yard,b.pjng_order) AS yardIns,
             IF(b.istirahat='',0,b.istirahat) AS istirahatIns  
             FROM
               tbl_inspection a
             LEFT JOIN 
                 tbl_schedule b 
             ON 
                 a.id_schedule=b.id  
             WHERE
                 DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' AND '$_GET[akhir]' AND proses='Inspect Finish' AND a.personil='$r[personil]' AND b.shift='$r[shift]' AND b.t_jawab='$r[t_jawab]'");
             $rIns=mysqli_fetch_array($sqlIns);
             $hourdiffIns  = (int)$rIns['waktuIns']-(int)$rIns['istirahatIns'];
            //Inspect Lululemon
            $sqlInsLulu=mysqli_query($con,"SELECT
            b.g_shift,
            SUM( a.jml_rol ) AS rolInsLulu,
            SUM( a.qty ) AS brutoInsLulu,
            SUM( a.yard ) AS panjangInsLulu,
            TIMESTAMPDIFF(MINUTE, b.tgl_mulai,b.tgl_stop) AS waktuInsLulu,
            IF(a.yard>0,a.yard,b.pjng_order) AS yardInsLulu,
	        IF(b.istirahat='',0,b.istirahat) AS istirahatInsLulu  
            FROM
              tbl_inspection a
            LEFT JOIN 
                tbl_schedule b 
            ON 
                a.id_schedule=b.id  
            WHERE
                DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' AND '$_GET[akhir]' AND proses='Inspect Finish' AND a.personil='$r[personil]' AND b.shift='$r[shift]' AND b.t_jawab='Asst. SPV'");
            $rInsLulu=mysqli_fetch_array($sqlInsLulu);
            $hourdiffInsLulu  = (int)$rInsLulu['waktuInsLulu']-(int)$rInsLulu['istirahatInsLulu'];
            //Inspect Adidas
            $sqlInsAds=mysqli_query($con,"SELECT
            b.g_shift,
            SUM( a.jml_rol ) AS rolInsAds,
            SUM( a.qty ) AS brutoInsAds,
            SUM( a.yard ) AS panjangInsAds,
            TIMESTAMPDIFF(MINUTE, b.tgl_mulai,b.tgl_stop) AS waktuInsAds,
            IF(a.yard>0,a.yard,b.pjng_order) AS yardInsAds,
	        IF(b.istirahat='',0,b.istirahat) AS istirahatInsAds  
            FROM
              tbl_inspection a
            LEFT JOIN 
                tbl_schedule b 
            ON 
                a.id_schedule=b.id  
            WHERE
                DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' AND '$_GET[akhir]' AND proses='Inspect Finish' AND a.personil='$r[personil]' AND b.shift='$r[shift]' AND b.t_jawab='Leader'");
            $rInsAds=mysqli_fetch_array($sqlInsAds);
            $hourdiffInsAds  = (int)$rInsAds['waktuInsAds']-(int)$rInsAds['istirahatInsAds'];
            //Inspect Qty Kecil
            $sqlIQK=mysqli_query($con,"SELECT
            b.g_shift,
            SUM( a.jml_rol ) AS rolIQK,
            SUM( a.qty ) AS brutoIQK,
            SUM( a.yard ) AS panjangIQK,
            TIMESTAMPDIFF(MINUTE, b.tgl_mulai,b.tgl_stop) AS waktuIQK,
            IF(a.yard>0,a.yard,b.pjng_order) AS yardIQK,
	        IF(b.istirahat='',0,b.istirahat) AS istirahatIQK 
            FROM
            tbl_inspection a
            LEFT JOIN 
                tbl_schedule b 
            ON 
                a.id_schedule=b.id  
            WHERE
                DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' 
                AND '$_GET[akhir]' AND proses='Inspect Qty Kecil' AND a.personil='$r[personil]' AND b.shift='$r[shift]' AND b.t_jawab='$r[t_jawab]'");
            $rIQK=mysqli_fetch_array($sqlIQK);
            $hourdiffIQK  = (int)$rIQK['waktuIQK']-(int)$rIQK['istirahatIQK'];
            //Inspect Qty Kecil Lululemon
            $sqlIQKLulu=mysqli_query($con,"SELECT
            b.g_shift,
            SUM( a.jml_rol ) AS rolIQKLulu,
            SUM( a.qty ) AS brutoIQKLulu,
            SUM( a.yard ) AS panjangIQKLulu,
            TIMESTAMPDIFF(MINUTE, b.tgl_mulai,b.tgl_stop) AS waktuIQKLulu,
            IF(a.yard>0,a.yard,b.pjng_order) AS yardIQKLulu,
	        IF(b.istirahat='',0,b.istirahat) AS istirahatIQKLulu  
            FROM
            tbl_inspection a
            LEFT JOIN 
                tbl_schedule b 
            ON 
                a.id_schedule=b.id  
            WHERE
                DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' 
                AND '$_GET[akhir]' AND proses='Inspect Qty Kecil' AND a.personil='$r[personil]' AND b.shift='$r[shift]' AND b.t_jawab='Asst. SPV'");
            $rIQKLulu=mysqli_fetch_array($sqlIQKLulu);
            $hourdiffIQKLulu  = (int)$rIQKLulu['waktuIQKLulu']-(int)$rIQKLulu['istirahatIQKLulu'];
             //Inspect Qty Kecil Adidas
             $sqlIQKAds=mysqli_query($con,"SELECT
             b.g_shift,
             SUM( a.jml_rol ) AS rolIQKAds,
             SUM( a.qty ) AS brutoIQKAds,
             SUM( a.yard ) AS panjangIQKAds,
             TIMESTAMPDIFF(MINUTE, b.tgl_mulai,b.tgl_stop) AS waktuIQKAds,
             IF(a.yard>0,a.yard,b.pjng_order) AS yardIQKAds,
             IF(b.istirahat='',0,b.istirahat) AS istirahatIQKAds  
             FROM
             tbl_inspection a
             LEFT JOIN 
                 tbl_schedule b 
             ON 
                 a.id_schedule=b.id  
             WHERE
                 DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' 
                 AND '$_GET[akhir]' AND proses='Inspect Qty Kecil' AND a.personil='$r[personil]' AND b.shift='$r[shift]' AND b.t_jawab='Leader'");
             $rIQKAds=mysqli_fetch_array($sqlIQKAds);
             $hourdiffIQKAds  = (int)$rIQKAds['waktuIQKAds']-(int)$rIQKAds['istirahatIQKAds'];
             //Inspect White
            $sqlW=mysqli_query($con,"SELECT
            b.g_shift,
            SUM( a.jml_rol ) AS rolW,
            SUM( a.qty ) AS brutoW,
            SUM( a.yard ) AS panjangW,
            TIMESTAMPDIFF(MINUTE, b.tgl_mulai,b.tgl_stop) AS waktuW,
            IF(a.yard>0,a.yard,b.pjng_order) AS yardW,
	        IF(b.istirahat='',0,b.istirahat) AS istirahatW
            FROM
            tbl_inspection a
            LEFT JOIN 
                tbl_schedule b 
            ON 
                a.id_schedule=b.id  
            WHERE
                DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' 
                AND '$_GET[akhir]' AND proses='Inspect White' AND a.personil='$r[personil]' AND b.shift='$r[shift]' AND b.t_jawab='$r[t_jawab]'");
            $rW=mysqli_fetch_array($sqlW);
            $hourdiffW  = (int)$rW['waktuW']-(int)$rW['istirahatW'];
            //Inspect White Lululemon
            $sqlWLulu=mysqli_query($con,"SELECT
            b.g_shift,
            SUM( a.jml_rol ) AS rolWLulu,
            SUM( a.qty ) AS brutoWLulu,
            SUM( a.yard ) AS panjangWLulu,
            TIMESTAMPDIFF(MINUTE, b.tgl_mulai,b.tgl_stop) AS waktuWLulu,
            IF(a.yard>0,a.yard,b.pjng_order) AS yardWLulu,
	        IF(b.istirahat='',0,b.istirahat) AS istirahatWLulu
            FROM
            tbl_inspection a
            LEFT JOIN 
                tbl_schedule b 
            ON 
                a.id_schedule=b.id  
            WHERE
                DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' 
                AND '$_GET[akhir]' AND proses='Inspect White' AND a.personil='$r[personil]' AND b.shift='$r[shift]' AND b.t_jawab='Asst. SPV'");
            $rWLulu=mysqli_fetch_array($sqlWLulu);
            $hourdiffWLulu  = (int)$rWLulu['waktuWLulu']-(int)$rWLulu['istirahatWLulu'];
            //Inspect White Adidas
            $sqlWAds=mysqli_query($con,"SELECT
            b.g_shift,
            SUM( a.jml_rol ) AS rolWAds,
            SUM( a.qty ) AS brutoWAds,
            SUM( a.yard ) AS panjangWAds,
            TIMESTAMPDIFF(MINUTE, b.tgl_mulai,b.tgl_stop) AS waktuWAds,
            IF(a.yard>0,a.yard,b.pjng_order) AS yardWAds,
	        IF(b.istirahat='',0,b.istirahat) AS istirahatWAds   
            FROM
            tbl_inspection a
            LEFT JOIN 
                tbl_schedule b 
            ON 
                a.id_schedule=b.id  
            WHERE
                DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' 
                AND '$_GET[akhir]' AND proses='Inspect White' AND a.personil='$r[personil]' AND b.shift='$r[shift]' AND b.t_jawab='Leader'");
            $rWAds=mysqli_fetch_array($sqlWAds);
            $hourdiffWAds  = (int)$rWAds['waktuWAds']-(int)$rWAds['istirahatWAds'];
            //Inspect Oven
            $sqlO=mysqli_query($con,"SELECT
            b.g_shift,
            SUM( a.jml_rol ) AS rolO,
            SUM( a.qty ) AS brutoO,
            SUM( a.yard ) AS panjangO,
            TIMESTAMPDIFF(MINUTE, b.tgl_mulai,b.tgl_stop) AS waktuO,
            IF(a.yard>0,a.yard,b.pjng_order) AS yardO,
	        IF(b.istirahat='',0,b.istirahat) AS istirahatO   
            FROM
            tbl_inspection a
            LEFT JOIN 
                tbl_schedule b 
            ON 
                a.id_schedule=b.id  
            WHERE
                DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' 
                AND '$_GET[akhir]' AND proses='Inspect Oven' AND a.personil='$r[personil]' AND b.shift='$r[shift]' AND b.t_jawab='$r[t_jawab]'");
            $rO=mysqli_fetch_array($sqlO);
            $hourdiffO  = (int)$rO['waktuO']-(int)$rO['istirahatO'];
            //Pisah
            $sqlP=mysqli_query($con,"SELECT
            b.g_shift,
            SUM( a.jml_rol ) AS rolP,
            SUM( a.qty ) AS brutoP,
            SUM( a.yard ) AS panjangP,
            TIMESTAMPDIFF(MINUTE, b.tgl_mulai,b.tgl_stop) AS waktuP,
            IF(a.yard>0,a.yard,b.pjng_order) AS yardP,
	        IF(b.istirahat='',0,b.istirahat) AS istirahatP 
            FROM
            tbl_inspection a
            LEFT JOIN 
                tbl_schedule b 
            ON 
                a.id_schedule=b.id  
            WHERE
                DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' 
                AND '$_GET[akhir]' AND proses='Pisah' AND a.personil='$r[personil]' AND b.shift='$r[shift]' AND b.t_jawab='$r[t_jawab]'");
            $rP=mysqli_fetch_array($sqlP);
            $hourdiffP  = (int)$rP['waktuP']-(int)$rP['istirahatP'];
            //Perbaikan
            $sqlPb=mysqli_query($con,"SELECT
            b.g_shift,
            SUM( a.jml_rol ) AS rolPb,
            SUM( a.qty ) AS brutoPb,
            SUM( a.yard ) AS panjangPb,
            TIMESTAMPDIFF(MINUTE, b.tgl_mulai,b.tgl_stop) AS waktuPb,
            IF(a.yard>0,a.yard,b.pjng_order) AS yardPb,
	        IF(b.istirahat='',0,b.istirahat) AS istirahatPb 
            FROM
            tbl_inspection a
            LEFT JOIN 
                tbl_schedule b 
            ON 
                a.id_schedule=b.id  
            WHERE
                DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' 
                AND '$_GET[akhir]' AND proses='Perbaikan' AND a.personil='$r[personil]' AND b.shift='$r[shift]' AND b.t_jawab='$r[t_jawab]'");
            $rPb=mysqli_fetch_array($sqlPb);
            $hourdiffPb  = (int)$rPb['waktuPb']-(int)$rPb['istirahatPb'];
            //Perbaikan Grade
            $sqlPG=mysqli_query($con,"SELECT
            b.g_shift,
            SUM( a.jml_rol ) AS rolPG,
            SUM( a.qty ) AS brutoPG,
            SUM( a.yard ) AS panjangPG,
            TIMESTAMPDIFF(MINUTE, b.tgl_mulai,b.tgl_stop) AS waktuPG,
            IF(a.yard>0,a.yard,b.pjng_order) AS yardPG,
	        IF(b.istirahat='',0,b.istirahat) AS istirahatPG 
            FROM
            tbl_inspection a
            LEFT JOIN 
                tbl_schedule b 
            ON 
                a.id_schedule=b.id  
            WHERE
                DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' 
                AND '$_GET[akhir]' AND proses='Perbaikan Grade' AND a.personil='$r[personil]' AND b.shift='$r[shift]' AND b.t_jawab='$r[t_jawab]'");
            $rPG=mysqli_fetch_array($sqlPG);
            $hourdiffPG  = (int)$rPG['waktuPG']-(int)$rPG['istirahatPG'];
            //Kragh
            $sqlK=mysqli_query($con,"SELECT
            b.g_shift,
            SUM( a.jml_rol ) AS rolK,
            SUM( a.qty ) AS brutoK,
            SUM( a.yard ) AS panjangK,
            TIMESTAMPDIFF(MINUTE, b.tgl_mulai,b.tgl_stop) AS waktuK,
            IF(a.yard>0,a.yard,b.pjng_order) AS yardK,
	        IF(b.istirahat='',0,b.istirahat) AS istirahatK 
            FROM
            tbl_inspection a
            LEFT JOIN 
                tbl_schedule b 
            ON 
                a.id_schedule=b.id  
            WHERE
                DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' 
                AND '$_GET[akhir]' AND proses='Kragh' AND a.personil='$r[personil]' AND b.shift='$r[shift]' AND b.t_jawab='$r[t_jawab]'");
            $rK=mysqli_fetch_array($sqlK);
            $hourdiffK  = (int)$rK['waktuK']-(int)$rK['istirahatK'];
            //Packing
            $sqlPack=mysqli_query($con,"SELECT
            b.g_shift,
            SUM( a.jml_rol ) AS rolPack,
            SUM( a.qty ) AS brutoPack,
            SUM( a.yard ) AS panjangPack,
            TIMESTAMPDIFF(MINUTE, b.tgl_mulai,b.tgl_stop) AS waktuPack,
            IF(a.yard>0,a.yard,b.pjng_order) AS yardPack,
	        IF(b.istirahat='',0,b.istirahat) AS istirahatPack 
            FROM
            tbl_inspection a
            LEFT JOIN 
                tbl_schedule b 
            ON 
                a.id_schedule=b.id  
            WHERE
                DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' 
                AND '$_GET[akhir]' AND proses='Packing' AND a.personil='$r[personil]' AND b.shift='$r[shift]' AND b.t_jawab='$r[t_jawab]'");
            $rPack=mysqli_fetch_array($sqlPack);
            $hourdiffPack  = (int)$rPack['waktuPack']-(int)$rPack['istirahatPack'];
            //Inspect Packing
            $sqlIP=mysqli_query($con,"SELECT
            b.g_shift,
            SUM( a.jml_rol ) AS rolIP,
            SUM( a.qty ) AS brutoIP,
            SUM( a.yard ) AS panjangIP,
            TIMESTAMPDIFF(MINUTE, b.tgl_mulai,b.tgl_stop) AS waktuIP,
            IF(a.yard>0,a.yard,b.pjng_order) AS yardIP,
	        IF(b.istirahat='',0,b.istirahat) AS istirahatIP 
            FROM
            tbl_inspection a
            LEFT JOIN 
                tbl_schedule b 
            ON 
                a.id_schedule=b.id  
            WHERE
                DATE_FORMAT( a.tgl_update, '%Y-%m-%d %H:%i' ) BETWEEN '$_GET[awal]' 
                AND '$_GET[akhir]' AND proses='Inspect Packing' AND a.personil='$r[personil]' AND b.shift='$r[shift]' AND b.t_jawab='$r[t_jawab]'");
            $rIP=mysqli_fetch_array($sqlIP);
            $hourdiffIP  = (int)$rIP['waktuIP']-(int)$rIP['istirahatIP'];

    ?>
    <tr>
        <td align="left"><?php echo $r['personil'];?></td>
        <td align="left"><?php echo $r['t_jawab'];?></td>
        <td align="right"><?php echo $r['shift'];?></td>
        <td align="right"><?php if($r['t_jawab']=='Asst. SPV'){echo $rIns['rolIns'];}else{echo '0';}?></td>
        <td align="right"><?php if($r['t_jawab']=='Asst. SPV'){echo $rIns['brutoIns'];}else{echo '0';}?></td>
        <td align="right"><?php if($r['t_jawab']=='Asst. SPV'){echo $rIns['panjangIns'];}else{echo '0';}?></td>
        <td align="right"><?php if($hourdiffIns!=0 AND $r['t_jawab']=='Asst. SPV'){echo round($rIns['yardIns']/$hourdiffIns,2);}else{echo '0.00';} ?></td>
        <td align="right"><?php if($r['t_jawab']=='Leader'){echo $rIns['rolIns'];}else{echo '0';}?></td>
        <td align="right"><?php if($r['t_jawab']=='Leader'){echo $rIns['brutoIns'];}else{echo '0';}?></td>
        <td align="right"><?php if($r['t_jawab']=='Leader'){echo $rIns['panjangIns'];}else{echo '0';}?></td>
        <td align="right"><?php if($hourdiffIns!=0 AND $r['t_jawab']=='Leader'){echo round($rIns['yardIns']/$hourdiffIns,2);}else{echo '0.00';} ?></td>
        <td align="right"><?php if($r['t_jawab']=='Asst. SPV'){echo $rIQK['rolIQK'];}else{echo '0';}?></td>
        <td align="right"><?php if($r['t_jawab']=='Asst. SPV'){echo $rIQK['brutoIQK'];}else{echo '0';}?></td>
        <td align="right"><?php if($r['t_jawab']=='Asst. SPV'){echo $rIQK['panjangIQK'];}else{echo '0';}?></td>
        <td align="right"><?php if($hourdiffIQK!=0 AND $r['t_jawab']=='Asst. SPV'){echo round($rIQK['yardIQK']/$hourdiffIQK,2);}else{echo '0.00';} ?></td>
        <td align="right"><?php if($r['t_jawab']=='Leader'){echo $rIQK['rolIQK'];}else{echo '0';}?></td>
        <td align="right"><?php if($r['t_jawab']=='Leader'){echo $rIQK['brutoIQK'];}else{echo '0';}?></td>
        <td align="right"><?php if($r['t_jawab']=='Leader'){echo $rIQK['panjangIQK'];}else{echo '0';}?></td>
        <td align="right"><?php if($hourdiffIQK!=0 AND $r['t_jawab']=='Leader'){echo round($rIQK['yardIQK']/$hourdiffIQK,2);}else{echo '0.00';} ?></td>
        <td align="right"><?php if($r['t_jawab']=='Asst. SPV'){echo $rW['rolW'];}else{echo '0';}?></td>
        <td align="right"><?php if($r['t_jawab']=='Asst. SPV'){echo $rW['brutoW'];}else{echo '0';}?></td>
        <td align="right"><?php if($r['t_jawab']=='Asst. SPV'){echo $rW['panjangW'];}else{echo '0';}?></td>
        <td align="right"><?php if($hourdiffW!=0 AND $r['t_jawab']=='Asst. SPV'){echo round($rW['yardW']/$hourdiffW,2);}else{echo '0.00';} ?></td>
        <td align="right"><?php if($r['t_jawab']=='Leader'){echo $rW['rolW'];}else{echo '0';}?></td>
        <td align="right"><?php if($r['t_jawab']=='Leader'){echo $rW['brutoW'];}else{echo '0';}?></td>
        <td align="right"><?php if($r['t_jawab']=='Leader'){echo $rW['panjangW'];}else{echo '0';}?></td>
        <td align="right"><?php if($hourdiffW!=0 AND $r['t_jawab']=='Leader'){echo round($rW['yardW']/$hourdiffW,2);}else{echo '0.00';} ?></td>
        <td align="right"><?php echo $rO['rolO'];?></td>
        <td align="right"><?php echo $rO['brutoO'];?></td>
        <td align="right"><?php echo $rO['panjangO'];?></td>
        <td align="right"><?php if($hourdiffO!=0){echo round($rO['yardO']/$hourdiffO,2);}else{echo '0.00';} ?></td>
        <td align="right"><?php echo $rIP['rolIP'];?></td>
        <td align="right"><?php echo $rIP['brutoIP'];?></td>
        <td align="right"><?php echo $rIP['panjangIP'];?></td>
        <td align="right"><?php if($hourdiffIP!=0){echo round($rIP['yardIP']/$hourdiffIP,2);}else{echo '0.00';} ?></td>
        <td align="right"><?php echo $rP['rolP'];?></td>
        <td align="right"><?php echo $rP['brutoP'];?></td>
        <td align="right"><?php echo $rP['panjangP'];?></td>
        <td align="right"><?php if($hourdiffP!=0){echo round($rP['yardP']/$hourdiffP,2);}else{echo '0.00';} ?></td>
        <td align="right"><?php echo $rPb['rolPb'];?></td>
        <td align="right"><?php echo $rPb['brutoPb'];?></td>
        <td align="right"><?php echo $rPb['panjangPb'];?></td>
        <td align="right"><?php if($hourdiffPb!=0){echo round($rPb['yardPb']/$hourdiffPb,2);}else{echo '0.00';} ?></td>
        <td align="right"><?php echo $rPG['rolPG'];?></td>
        <td align="right"><?php echo $rPG['brutoPG'];?></td>
        <td align="right"><?php echo $rPG['panjangPG'];?></td>
        <td align="right"><?php if($hourdiffPG!=0){echo round($rPG['yardPG']/$hourdiffPG,2);}else{echo '0.00';} ?></td>
        <td align="right"><?php echo $rK['rolK'];?></td>
        <td align="right"><?php echo $rK['brutoK'];?></td>
        <td align="right"><?php echo $rK['panjangK'];?></td>
        <td align="right"><?php if($hourdiffK!=0){echo round($rK['yardK']/$hourdiffK,2);}else{echo '0.00';} ?></td>
        <td align="right"><?php echo $rPack['rolPack'];?></td>
        <td align="right"><?php echo $rPack['brutoPack'];?></td>
        <td align="right"><?php echo $rPack['panjangPack'];?></td>
        <td align="right"><?php if($hourdiffPack!=0){echo round($rPack['yardPack']/$hourdiffPack,2);}else{echo '0.00';} ?></td>
        <td align="right"><?php echo $rIns['rolIns']+$rIQK['rolIQK']+$rW['rolW']+$rO['rolO']+$rPack['rolPack']+$rP['rolP']+$rPb['rolPb']+$rPG['rolPG']+$rK['rolK']+$rIP['rolIP'];?></td>
        <td align="right"><?php echo $rIns['brutoIns']+$rIQK['brutoIQK']+$rW['brutoW']+$rO['brutoO']+$rPack['brutoPack']+$rP['brutoP']+$rPb['brutoPb']+$rPG['brutoPG']+$rK['brutoK']+$rIP['brutoIP'];?></td>
        <td align="right"><?php echo $rIns['panjangIns']+$rIQK['panjangIQK']+$rW['panjangW']+$rO['panjangO']+$rPack['panjangPack']+$rP['panjangP']+$rPb['panjangPb']+$rPG['panjangPG']+$rK['panjangK']+$rIP['panjangIP'];?></td>
    </tr>
    <?php
    if($r['t_jawab']=='Asst. SPV'){
    $troll_InsLulu      = $troll_InsLulu+$rIns['rolIns'];
    $tbruto_InsLulu     = $tbruto_InsLulu+$rIns['brutoIns'];
    $tpanjang_InsLulu   = $tpanjang_InsLulu+$rIns['panjangIns'];
    $troll_IQKLulu      = $troll_IQKLulu+$rIQK['rolIQK'];
    $tbruto_IQKLulu     = $tbruto_IQKLulu+$rIQK['brutoIQK'];
    $tpanjang_IQKLulu   = $tpanjang_IQKLulu+$rIQK['panjangIQK'];
    $troll_WLulu        = $troll_WLulu+$rW['rolW'];
    $tbruto_WLulu       = $tbruto_WLulu+$rW['brutoW'];
    $tpanjang_WLulu     = $tpanjang_WLulu+$rW['panjangW'];
    }
    if($r['t_jawab']=='Leader'){
    $troll_InsAds       = $troll_InsAds+$rIns['rolIns'];
    $tbruto_InsAds      = $tbruto_InsAds+$rIns['brutoIns'];
    $tpanjang_InsAds    = $tpanjang_InsAds+$rIns['panjangIns'];
    $troll_IQKAds       = $troll_IQKAds+$rIQK['rolIQK'];
    $tbruto_IQKAds      = $tbruto_IQKAds+$rIQK['brutoIQK'];
    $tpanjang_IQKAds    = $tpanjang_IQKAds+$rIQK['panjangIQK'];
    $troll_WAds         = $troll_WAds+$rW['rolW'];
    $tbruto_WAds        = $tbruto_WAds+$rW['brutoW'];
    $tpanjang_WAds      = $tpanjang_WAds+$rW['panjangW'];
    }
    $troll_Ins      = $troll_Ins+$rIns['rolIns'];
    $tbruto_Ins     = $tbruto_Ins+$rIns['brutoIns'];
    $tpanjang_Ins   = $tpanjang_Ins+$rIns['panjangIns'];
    $troll_IQK      = $troll_IQK+$rIQK['rolIQK'];
    $tbruto_IQK     = $tbruto_IQK+$rIQK['brutoIQK'];
    $tpanjang_IQK   = $tpanjang_IQK+$rIQK['panjangIQK'];
    $troll_W        = $troll_W+$rW['rolW'];
    $tbruto_W       = $tbruto_W+$rW['brutoW'];
    $tpanjang_W     = $tpanjang_W+$rW['panjangW'];
    $troll_O        = $troll_O+$rO['rolO'];
    $tbruto_O       = $tbruto_O+$rO['brutoO'];
    $tpanjang_O     = $tpanjang_O+$rO['panjangO'];
    $troll_Pack     = $troll_Pack+$rPack['rolPack'];
    $tbruto_Pack    = $tbruto_Pack+$rPack['brutoPack'];
    $tpanjang_Pack  = $tpanjang_Pack+$rPack['panjangPack'];
    $troll_P        = $troll_P+$rP['rolP'];
    $tbruto_P       = $tbruto_P+$rP['brutoP'];
    $tpanjang_P     = $tpanjang_P+$rP['panjangP'];
    $troll_Pb       = $troll_Pb+$rPb['rolPb'];
    $tbruto_Pb      = $tbruto_Pb+$rPb['brutoPb'];
    $tpanjang_Pb    = $tpanjang_Pb+$rPb['panjangPb'];
    $troll_PG       = $troll_PG+$rPG['rolPG'];
    $tbruto_PG      = $tbruto_PG+$rPG['brutoPG'];
    $tpanjang_PG    = $tpanjang_PG+$rPG['panjangPG'];
    $troll_K        = $troll_K+$rK['rolK'];
    $tbruto_K       = $tbruto_K+$rK['brutoK'];
    $tpanjang_K     = $tpanjang_K+$rK['panjangK'];
    $troll_IP       = $troll_IP+$rIP['rolIP'];
    $tbruto_IP      = $tbruto_IP+$rIP['brutoIP'];
    $tpanjang_IP    = $tpanjang_IP+$rIP['panjangIP'];
    } ?>
    <tr>
        <td colspan="3" align="left"><strong>Total</strong></td>
        <td align="right"><strong><?php echo $troll_InsLulu;?></strong></td>
        <td align="right"><strong><?php echo $tbruto_InsLulu;?></strong></td>
        <td align="right"><strong><?php echo $tpanjang_InsLulu;?></strong></td>
        <td align="right">&nbsp;</td>
        <td align="right"><strong><?php echo $troll_InsAds;?></strong></td>
        <td align="right"><strong><?php echo $tbruto_InsAds;?></strong></td>
        <td align="right"><strong><?php echo $tpanjang_InsAds;?></strong></td>
        <td align="right">&nbsp;</td>
        <td align="right"><strong><?php echo $troll_IQKLulu;?></strong></td>
        <td align="right"><strong><?php echo $tbruto_IQKLulu;?></strong></td>
        <td align="right"><strong><?php echo $tpanjang_IQKLulu;?></strong></td>
        <td align="right">&nbsp;</td>
        <td align="right"><strong><?php echo $troll_IQKAds;?></strong></td>
        <td align="right"><strong><?php echo $tbruto_IQKAds;?></strong></td>
        <td align="right"><strong><?php echo $tpanjang_IQKAds;?></strong></td>
        <td align="right">&nbsp;</td>
        <td align="right"><strong><?php echo $troll_WLulu;?></strong></td>
        <td align="right"><strong><?php echo $tbruto_WLulu;?></strong></td>
        <td align="right"><strong><?php echo $tpanjang_WLulu;?></strong></td>
        <td align="right">&nbsp;</td>
        <td align="right"><strong><?php echo $troll_WAds;?></strong></td>
        <td align="right"><strong><?php echo $tbruto_WAds;?></strong></td>
        <td align="right"><strong><?php echo $tpanjang_WAds;?></strong></td>
        <td align="right">&nbsp;</td>
        <td align="right"><strong><?php echo $troll_O;?></strong></td>
        <td align="right"><strong><?php echo $tbruto_O;?></strong></td>
        <td align="right"><strong><?php echo $tpanjang_O;?></strong></td>
        <td align="right">&nbsp;</td>
        <td align="right"><strong><?php echo $troll_IP;?></strong></td>
        <td align="right"><strong><?php echo $tbruto_IP;?></strong></td>
        <td align="right"><strong><?php echo $tpanjang_IP;?></strong></td>
        <td align="right">&nbsp;</td>
        <td align="right"><strong><?php echo $troll_P;?></strong></td>
        <td align="right"><strong><?php echo $tbruto_P;?></strong></td>
        <td align="right"><strong><?php echo $tpanjang_P;?></strong></td>
        <td align="right">&nbsp;</td>
        <td align="right"><strong><?php echo $troll_Pb;?></strong></td>
        <td align="right"><strong><?php echo $tbruto_Pb;?></strong></td>
        <td align="right"><strong><?php echo $tpanjang_Pb;?></strong></td>
        <td align="right">&nbsp;</td>
        <td align="right"><strong><?php echo $troll_PG;?></strong></td>
        <td align="right"><strong><?php echo $tbruto_PG;?></strong></td>
        <td align="right"><strong><?php echo $tpanjang_PG;?></strong></td>
        <td align="right">&nbsp;</td>
        <td align="right"><strong><?php echo $troll_K;?></strong></td>
        <td align="right"><strong><?php echo $tbruto_K;?></strong></td>
        <td align="right"><strong><?php echo $tpanjang_K;?></strong></td>
        <td align="right">&nbsp;</td>
        <td align="right"><strong><?php echo $troll_Pack;?></strong></td>
        <td align="right"><strong><?php echo $tbruto_Pack;?></strong></td>
        <td align="right"><strong><?php echo $tpanjang_Pack;?></strong></td>
        <td align="right">&nbsp;</td>
        <td align="right"><strong><?php echo $troll_Ins+$troll_IQK+$troll_W+$troll_O+$troll_Pack+$troll_P+$troll_Pb+$troll_PG+$troll_K+$troll_IP;?></strong></td>
        <td align="right"><strong><?php echo $tbruto_Ins+$tbruto_IQK+$tbruto_W+$tbruto_O+$tbruto_Pack+$tbruto_P+$tbruto_Pb+$tbruto_PG+$tbruto_K+$tbruto_IP;?></strong></td>
        <td align="right"><strong><?php echo $tpanjang_Ins+$tpanjang_IQK+$tpanjang_W+$tpanjang_O+$tpanjang_Pack+$tpanjang_P+$tpanjang_Pb+$tpanjang_PG+$tpanjang_K+$tpanjang_IP;?></strong></td>
    </tr>
</table>