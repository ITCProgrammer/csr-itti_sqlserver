<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/vendor/autoload.php';
//email
$mail = new PHPMailer(true);

ini_set("error_reporting", 1);
include"koneksi.php";
$nokk=$_GET['nokk'];
$sqlCek=mysqli_query($con,"SELECT * FROM tbl_qcf WHERE sts_pbon='1' AND nokk='$nokk' ORDER BY id DESC LIMIT 1");
$cek=mysqli_num_rows($sqlCek);
$rcek=mysqli_fetch_array($sqlCek);
?>	
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Proses Bon</h3>
            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body"> 
                <!-- col --> 
            <div class="col-md-12">
                <div class="form-group">
                    <label for="bpp" class="col-sm-2 control-label">No BPP</label>
                    <div class="col-sm-2">  
                        <input name="bpp" type="text" class="form-control" id="bpp" value="<?php echo $rcek['bpp']; ?>" placeholder="No BPP" readonly>			
                    </div>
                </div>
                <div class="form-group">
                    <label for="tgl_masuk" class="col-sm-2 control-label">Tgl. Masuk</label>
                    <div class="col-sm-2">
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                            <input name="tgl_masuk" type="text" class="form-control pull-right" id="datepicker" placeholder="0000-00-00" value="<?php echo $rcek['tgl_masuk']; ?>" autocomplete="off" readonly/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sales" class="col-sm-2 control-label">Nama Sales</label>
                    <div class="col-sm-2">  
                        <input name="sales" type="text" class="form-control" id="sales" value="<?php echo $rcek['sales']; ?>" placeholder="Sales" readonly>			
                    </div>
                </div>
                <div class="form-group">
                    <label for="nokk" class="col-sm-2 control-label">No KK</label>
                    <div class="col-sm-2">  
                        <input name="nokk" type="text" class="form-control" id="nokk" value="<?php echo $rcek['nokk']; ?>" placeholder="No KK" readonly>			
                    </div>
                </div>
                <div class="form-group">
                    <label for="pelanggan" class="col-sm-2 control-label">Langganan</label>
                    <div class="col-sm-3">  
                        <input name="pelanggan" type="text" class="form-control" id="pelanggan" value="<?php echo $rcek['pelanggan']; ?>" placeholder="Langganan" readonly>			
                    </div>
                </div>
                <div class="form-group">
                    <label for="sts_aksi" class="col-sm-2 control-label">Verifikasi Proses</label>
                    <div class="col-sm-2">  
                        <select class="form-control" name="sts_aksi" required>
                            <option value="">Pilih</option>
                            <option value="Proses" <?php if($rcek['sts_aksi']=="Proses"){echo "SELECTED"; } ?>>Proses</option>
                            <option value="Hold" <?php if($rcek['sts_aksi']=="Hold"){echo "SELECTED"; } ?>>Hold</option>
                            <option value="Tidak Proses" <?php if($rcek['sts_aksi']=="Tidak Proses"){echo "SELECTED"; } ?>>Tidak Proses</option>
                            <option value="Siapkan Greig" <?php if($rcek['sts_aksi']=="Siapkan Greig"){echo "SELECTED"; } ?>>Siapkan Greig</option>
                        </select>		
                    </div>
                </div>
                <div class="form-group">
                    <label for="editor" class="col-sm-2 control-label">Editor</label>
                    <div class="col-sm-2">  
                        <input name="editor" type="text" class="form-control" id="editor" value="<?php echo $rcek['editor']; ?>" placeholder="Editor" required>			
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="button" class="btn btn-default pull-left" name="save" Onclick="window.location='SummaryOrder'">Kembali <i class="fa fa-cycle"></i></button>	   
            <input type="submit" value="Simpan" name="save" id="save" class="btn btn-primary pull-right" > 
        </div>
        <!-- /.box-footer -->
    </div>
</form>

<?php
if($_POST['save']=="Simpan"){
    if($_POST['sts_aksi']=="Proses"){
    //email
    $mail->isSMTP();
    $mail->Host 		= 'mail.indotaichen.com'; //mail.usmanas.web.id / mail.indotaichen.com
    $mail->SMTPAuth 	= true;
    $mail->Username 	= 'qcf.adm@indotaichen.com'; //usman@usmanas.web.id / dept.it@indotaichen.com /qcf.adm@indotaichen.com
    $mail->Password 	= 'Final.1234567'; //fariz001 / D1t2017
    $mail->SMTPSecure 	= PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port 		= 465;
    
    $mail->setFrom('qcf.adm@indotaichen.com', 'adm qcf');
    $mail->addReplyTo('qcf.adm@indotaichen.com', 'adm qcf');

    // Menambahkan penerima
    $mail->addAddress('singgih.bangsawan@indotaichen.com');
    $mail->addAddress('putri.damayanti@indotaichen.com');
    //$mail->addAddress('fanny.ardiansyah@indotaichen.com');

    // Subjek email
    $mail->Subject = 'BON PENGHUBUNG LANGGANAN PT. INDO TAICHEN STATUS PROSES MKT  '.$rcek['nokk'];

    // Mengatur format email ke HTML
    $mail->isHTML(true);

    // Konten/isi email
    $mailContent ='<div class="container">

       <div class="row">
           <div class="col-12">
           <p>Dear PPC team,</p>
           <p>Mohon di tindak lanjuti untuk bon yang sudah berstatus proses oleh Dept MKT berikut </p>
           <p>&nbsp;</p>
               <table style="font-family: Helvetica,Arial,sans-serif; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6" border="1" cellspacing="0" cellpadding="0">
                   <tbody><tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                       <tr style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap colspan="4">
                           <p>BON PENGHUBUNG LANGGANAN PT. INDO TAICHEN '.$rcek['nokk'].'</p>
                           </td>
                       </tr>
                       <tr style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>NO. BPP</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p align="right">'.$rcek['bpp'].'</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>LOT</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>'.$rcek['lot'].'</p>
                           </td>
                       </tr>
                       <tr style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>CUSTOMER</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p align="right">'.$rcek['pelanggan'].'</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>UKURAN</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>'.$rcek['lebar'].'X'.$rcek['gramasi'].'</p>
                           </td>
                       </tr>
                       <tr style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>PO</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p align="right">'.$rcek['no_po'].'</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>ROLL</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>'.$rcek['rol_mslh'].'</p>
                           </td>
                       </tr>
                       <tr style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>ORDER</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p align="right">'.$rcek['no_order'].'</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>QTY</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>'.$rcek['qty_mslh'].'</p>
                           </td>
                       </tr>
                       <tr style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>JENIS KAIN</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p align="right">'.$rcek['jenis_kain'].'</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>PABRIK RAJUT</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>'.$rcek['no_ko'].'</p>
                           </td>
                       </tr>
                       <tr style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>ITEM</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p align="right">'.$rcek['no_item'].'</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>DELIVERY KAIN    JADI</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>'.$rcek['tgl_delivery'].'</p>
                           </td>
                       </tr>
                       <tr style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>WARNA</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p align="right">'.$rcek['warna'].'</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>DEPT PENANGGUNG JWB</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>'.$rcek['t_jawab'].'</p>
                           </td>
                       </tr>
                       <tr style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>NO WARNA</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p align="right">'.$rcek['no_warna'].'</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>PERSENTASE</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>'.$rcek['persen'].'</p>
                           </td>
                       </tr>
                       <tr style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>MASALAH KAIN</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" colspan="3">
                           <p>'.$rcek['masalah'].'</p>
                           </td>
                       </tr>
                       <tr style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>FOC</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" colspan="3" nowrap>
                           <p align="right">'.$rcek['berat_extra'].' KG '.$rcek['panjang_extra'].' '.$rcek['satuan'].'</p>
                           </td>
                       </tr>
                       <tr style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" nowrap>
                           <p>Estimasi</p>
                           </td>
                           <td class="content-block aligncenter" style="font-family:  Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top" colspan="3" nowrap>
                           <p align="right">'.$rcek['estimasi'].' KG '.$rcek['panjang_estimasi'].' '.$rcek['satuan'].'</p>
                           </td>
                       </tr>
                   </tbody>
               </table>
               <p>&nbsp;</p>
               <p><strong>Thanks &amp; b&rsquo;regards</strong><br>
               <strong>Tenny/aisyah</strong></p>
           </div>
       </div>
    </div>';
    $mail->Body = $mailContent;
    // Kirim email
    if(!$mail->send()){
       //echo 'Pesan tidak dapat dikirim.';
       //echo 'Mailer Error: ' . $mail->ErrorInfo;
       echo "<script>swal({
     title: 'Mailer Error:',   
     text: 'Pesan tidak dapat dikirim',
     type: 'warning',
     }).then((result) => {
     if (result.value) {
       
        window.location.href='ProsesBonMKT-$nokk'; 
     }
    });</script>";
       
    }else{
       // echo 'Pesan telah terkirim';
    }
}

    $sqlData=mysqli_query($con,"UPDATE tbl_qcf SET 
		  sts_aksi='$_POST[sts_aksi]',
          editor='$_POST[editor]'
		  WHERE nokk='$nokk'");	 	  
	  
		if($sqlData){	
            echo "<script>swal({
        title: 'Status Berhasil Berubah Menjadi Proses',   
        text: 'Klik Ok untuk kembali',
        type: 'success',
        }).then((result) => {
        if (result.value) {
                window.location.href='ProsesBonMKT-$nokk';
            
        }
        });</script>";
		}
}
?>