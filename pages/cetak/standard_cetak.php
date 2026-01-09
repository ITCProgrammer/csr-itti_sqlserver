 <!--24 November 2023-->
<?php 
$category_m = $_GET['category'];
$id_nokk = $_GET['id'];

include "../../koneksi.php";
$sql   = mysqli_query($con,"SELECT a.* 
from standard  a 
join   standard_report b on (a.category = b.id)
where a.sub_category  = '$category_m' and b.status_input = 1 ");
$array_standard = [];
while ($data = mysqli_fetch_assoc($sql) ) {
	 $key = $data['category'].'/'.$data['sub_category'];
	 $array_standard[$key] = $data['value'];
}



function get_data($category) {
	global $con ; 
	$sql   = mysqli_query($con,"SELECT * FROM standard_report where display = '$category' ");
	return $sql ; 	
}





$test_sql  = mysqli_query($con, "SELECT a.* ,b.*
FROM tbl_tq_test a 
left join tbl_tq_test_2 b on (a.id_nokk = b.id_nokk)
where a.id_nokk= '$id_nokk'");
$test_data 	= mysqli_fetch_assoc($test_sql);

$disp_sql  = mysqli_query($con, "SELECT * FROM tbl_tq_disptest where id_nokk= '$id_nokk'");
$disp_data 	= mysqli_fetch_assoc($disp_sql);

$marginal_sql   = mysqli_query($con, "SELECT * FROM tbl_tq_marginal where id_nokk= '$id_nokk'");
$marginal_data 	= mysqli_fetch_assoc($marginal_sql);

function get_result($status,$result_field) {
	global $test_data;
	global $disp_data ;
	global $marginal_data ; 
	
	if ($status=='DISPOSISI') {
			$field = 'd'.$result_field;
			return $disp_data[$field] ;
	} else if ($status=='MARGINAL PASS') {
			$field = 'm'.$result_field;
			return $marginal_data[$field] ;
	} else {
			return $test_data[$result_field] ;
	}
}


$tq_fl_sql  = mysqli_query($con, "SELECT * FROM TBL_TQ_NOKK where id = '$id_nokk' ");
$rcek 		= mysqli_fetch_array($tq_fl_sql);
?>


<script>
    // Fungsi untuk mengubah tampilan teks saat tombol "Ctrl + P" ditekan atau klik pada teks
    function handleCtrlP() {
        // Menyembunyikan teks dengan mengatur style display ke "none"
        document.getElementById('textToHide').style.display = 'none';

        // Mencetak halaman
        window.print();

        // Menampilkan kembali teks setelah pencetakan selesai (muncul setelah dialog cetak ditutup)
        showTextAfterPrint();
    }

    // Fungsi untuk menampilkan kembali teks setelah cetakan selesai (muncul setelah dialog cetak ditutup)
    function showTextAfterPrint() {
        // Menampilkan kembali teks dengan mengatur style display ke "block" (atau sesuai tampilan sebelumnya)
        document.getElementById('textToHide').style.display = 'block';
    }

    // Menambahkan event listener untuk menangkap ketika tombol "Ctrl + P" ditekan
    document.addEventListener('keydown', function(event) {
        if (event.ctrlKey && event.key === 'p') {
            // Mengarahkan ke fungsi handleCtrlP() saat tombol "Ctrl + P" ditekan
            handleCtrlP();
        }
    });
</script>


<style>
 @media print {
            .page-break {
                page-break-before: always;
            }
        }
		
.header_td {
	font-weight:bold
}
body, table {
	font-family: arial;
	font-size: 7px;
	color:#000
}

.table-report {
	 border-collapse: collapse;
     width: 100%;
}
.table-report td {
    border: thin  solid #414a4c;
    padding: 1px;
	text-align:center
	
	
}





</style>


<div style="padding-left:40px;padding-right:40px;	">
<!-- Teks yang dapat diklik dan mengarahkan ke Ctrl + P / pencetakan -->
<p style="color:green;border:solid thin green;padding:5px;width:10%;text-align:center;border-radius:100px" id="textToHide" onclick="handleCtrlP()"><b>PRINT/PDF</b></p>


<div style="width: 100%; border: 0px solid black;">
	<div style="display: flex; align-items: center;">
		<div style="width: 5%;">
			<img width="50px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRaMe3VM-CTQ_9WngsirowPGd1RRa5v6syvmfpBFBRiUg&s">
		</div>
		<div style="flex: 1; text-align: center;font-size:14">
			<div style="font-weight: bold;">
				INDO TAICHEN TEXTILE INDUSTRY
			</div>
			<div style="font-weight: bold;">
				INHOUSE LABTEST
			</div>
			<div style="font-size: 8px;">
				FW-12-QCF-04/07
			</div>
		</div>
	</div>
</div>



<b><u  >MATERIAL SPESIFICATION</u></b>
<br><bR><br>

<table  width=100% 	>
<tr>
<td width=65%  valign="top">
			<table >
			<tr>
			<td width=30% >GARMENT FACTORY</td>
			<td width=2%>:</td>
			<td><?=$rcek['pelanggan']?></td>
			</tr>
			<tr>
			<td valign="top">FABRIC TYPE</td>
			<td valign="top">:</td>
			<td valign="top"><?=$rcek['jenis_kain']?>
			</td>
			</tr>
			<tr>
			<td>COLOUR </td>
			<td>:</td>	
			<td><?=$rcek['warna']?></td>
			</tr>
			<tr>
			<td>COLOR NO</td>
			<td>:</td>
			<td><?=$rcek['no_warna']?></td>
			</tr>
			<tr>
			<td>CATEGORY</td>
			<td>:</td>
			<td><?=$category_m?></td>
			</tr>
		</table>
</td>
<td width=1%> &nbsp;</td>
<td valign="top" width=34%>
		<table width=100% border=0 >
			<tr>
			<td width=50%>DATE</td>
			<td width=4%>:</td>
			<td><?=date("d-m-Y");?></td>
			</tr>
			<tr>
			<td>P.O. NO.</td>
			<td>:</td>
			<td><?=$rcek['no_po']?></td>
			</tr>
			<tr>
			<td>ORDER NO.</td>
			<td>:</td>
			<td><?=$rcek['no_order']?></td>
			</tr>
			<tr>
			<td>WIDTH</td>
			<td>:</td>
			<td><?=$rcek['lebar']?></td>
			</tr>
			<tr>
			<td>WEIGHT</td>
			<td>:</td>
			<td><?=$rcek['gramasi']?></td>
			</tr>
			<tr>
			<td valign="top">DEMAND NO.</td>
			<td valign="top">:</td>
			<td valign="top"><?=$rcek['nodemand']?></td>
			</tr>
			<tr>
			<td valign="top">PROD. ORDER NO.</td>
			<td valign="top">:</td>
			<td valign="top"> <?=$rcek['lot']?> </td>
			</tr>
		</table>
	
</td>
</tr>
</table>

<br>

<table    class="table-report">
	<tr>
		<td  width=40%></td>
		<td  width=20%><b>METHOD</b></td>
		<td  width=20%><b><i>STANDARD</i></b></td>
		<td  width=10%><b>RESULT</b></td>
		<td  width=10%><b>REMARK</b></td>
	</tr>
	<tr>
		<td class="header_td" colspan=5>FABRIC PHYSICAL TEST</td>
	</tr>
	
	<?php  // 1 FABRIC PHYSICAL TEST
	$get_data = get_data(1);
	while ($data = mysqli_fetch_assoc($get_data) ) {  ?>
	<tr>
		<td style="text-align:left;<?=$data['style']?>"><?=$data['properties']?></td>	
		<td><?=$data['method']?></td>		
		<td>
		<?php 
				$key = $data['id'].'/'.$category_m;
				if (array_key_exists($key,$array_standard)) {
					echo $array_standard[$key];	
				}
		?>
		</td>
		<td><?php $status_test = $data['status_test'];
				 if (array_key_exists($status_test,$test_data)) {
					 $result_field = get_result($test_data[$status_test],$data['result_field']);
					 if ($result_field == null or $result_field=='') { echo 'N/A';} else { echo $result_field ; }  
				 }
		?></td>
		<td>
			<?php if($data['status_test']!=null and $result_field !=null) { 
					if ($test_data[$status_test]=='DISPOSISI' or $test_data[$status_test]=='A') {
						echo 'PASS';
					}else {
						echo $test_data[$status_test];
					}
			}?>
		</td>
	</tr>
	<?php } ?>
	
	<tr>
		<td colspan=5><b>FABRIC COLOR FASTNESS TEST</b></td>
	</tr>
	<tr>
		<td style="text-align:left;<?=$data['style']?>"><b>COLOR FASTNESS TO LAUNDERING</b></td>
		<td rowspan=9>ISO C6 BIS 2</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
	<?php  // 2 FABRIC COLOR FASTNESS TEST
	$get_data = get_data(2);
	$no = 1;
	while ($data = mysqli_fetch_assoc($get_data) ) {  ?>
	<tr>
		<td style="text-align:left;<?=$data['style']?>"><?=$data['properties']?></td>	
		<?php if ($no == 10 or $no == 20 )   {?>
			<td></td>
		<?php } else if ($no==30) {?>
			<td  rowspan=6></td>
		<?php }?>
		<td>
		<?php 
				$key = $data['id'].'/'.$category_m;
				if (array_key_exists($key,$array_standard)) {
					echo $array_standard[$key];	
				} 
		?>
		</td>
		<td><?php $status_test = $data['status_test'];
				 if (array_key_exists($status_test,$test_data)) {
					 $result_field = get_result($test_data[$status_test],$data['result_field']);
					 if ($result_field == null or $result_field=='') { echo 'N/A';} else { echo $result_field ; }  
				 }
		?></td>
		<td>
			<?php if($data['status_test']!=null and $result_field !=null) { 
					if ($test_data[$status_test]=='DISPOSISI' or $test_data[$status_test]=='A') {
						echo 'PASS';
					}else {
						echo $test_data[$status_test];
					}
			}?>
		</td>
	</tr>
	<?php $no++; } ?>
	
	<tr>
		<td style="text-align:left" ><b>COLOR FASTNESS TO PERSPIRATION ACID</b></td>
		<td rowspan=18> ISO-105 E04</td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
	<?php  // 3
	$get_data = get_data(3); //COLOR FASTNESS TO PERSPIRATION ACID
	$no = 1;
	while ($data = mysqli_fetch_assoc($get_data) ) {  ?>
	<tr>
		<td style="text-align:left;<?=$data['style']?>"><?=$data['properties']?></td>	
		
		<td>
		<?php 
				$key = $data['id'].'/'.$category_m;
				if (array_key_exists($key,$array_standard)) {
					echo $array_standard[$key];	
				}
		?>
		</td>
		<td><?php $status_test = $data['status_test'];
				 if (array_key_exists($status_test,$test_data)) {
					 $result_field = get_result($test_data[$status_test],$data['result_field']);
					  if ($result_field == null or $result_field=='') { echo 'N/A';} else { echo $result_field ; }  
				 }
		?></td>
		<td>
			<?php if($data['status_test']!=null and $result_field !=null) { 
					if ($test_data[$status_test]=='DISPOSISI' or $test_data[$status_test]=='A') {
						echo 'PASS';
					}else {
						echo $test_data[$status_test];
					}
			}?>
		</td>
	</tr>
	<?php $no++; } ?>
	
	<tr>
		<td style="text-align:left" ><b>COLOR FASTNESS TO PERSPIRATION ALKALINE</b></td>
		
		<td></td>
		<td></td>
		<td></td>
	</tr>
	
	<?php  // 4 COLOR FASTNESS TO PERSPIRATION ALKALINE
	$get_data = get_data(4);
	$no = 1;
	while ($data = mysqli_fetch_assoc($get_data) ) {  ?>
	<tr>
		<td style="text-align:left;<?=$data['style']?>"><?=$data['properties']?></td>	
		
		<td>
		<?php 
				$key = $data['id'].'/'.$category_m;
				if (array_key_exists($key,$array_standard)) {
					echo $array_standard[$key];	
				}
		?>
		</td>
		<td><?php $status_test = $data['status_test'];
				 if (array_key_exists($status_test,$test_data)) {
					 $result_field = get_result($test_data[$status_test],$data['result_field']);
					 if ($result_field == null or $result_field=='') { echo 'N/A';} else { echo $result_field ; }  
				 }
		?></td>
		<td>
			<?php if($data['status_test']!=null and $result_field !=null) { 
					if ($test_data[$status_test]=='DISPOSISI' or $test_data[$status_test]=='A') {
						echo 'PASS';
					}else {
						echo $test_data[$status_test];
					}
			}?>
		</td>
	</tr>
	<?php $no++; } ?>
	
	<?php  // 5 COLOR FASTNESS TO CROCKING
	$get_data = get_data(5);
	$no = 1;
	while ($data = mysqli_fetch_assoc($get_data) ) {  ?>
	<tr>
		<td style="text-align:left;<?=$data['style']?>"><?=$data['properties']?></td>	
		<?php  if ($no==1) {?>
			<td  rowspan=3>ISO 105X12</td>
		<?php }?>
		<td>
		<?php 
				$key = $data['id'].'/'.$category_m;
				if (array_key_exists($key,$array_standard)) {
					echo $array_standard[$key];	
				}
		?>
		</td>
		<td><?php $status_test = $data['status_test'];
				 if (array_key_exists($status_test,$test_data)) {
					 $result_field = get_result($test_data[$status_test],$data['result_field']);
					  if ($result_field == null or $result_field=='') { echo 'N/A';} else { echo $result_field ; }  
				 }
		?></td>
	<td>
			<?php if($data['status_test']!=null and $result_field !=null) { 
					if ($test_data[$status_test]=='DISPOSISI' or $test_data[$status_test]=='A') {
						echo 'PASS';
					}else {
						echo $test_data[$status_test];
					}
			}?>
		</td>
	</tr>
	<?php $no++; } ?>
	
	
	<?php  // 6 COLOR FASTNESS TO SUBLIMATION
	$get_data = get_data(6);
	$no = 1;
	while ($data = mysqli_fetch_assoc($get_data) ) {  ?>
	<tr>
		<td style="text-align:left;<?=$data['style']?>"><?=$data['properties']?></td>	
		<?php  if ($no==1) {?>
			<td  rowspan=3>JIS 10854</td>
		<?php }?>
		<td>
		<?php 
				$key = $data['id'].'/'.$category_m;
				if (array_key_exists($key,$array_standard)) {
					echo $array_standard[$key];	
				}
				
		?>
		</td>
		<td><?php $status_test = $data['status_test'];
				 if (array_key_exists($status_test,$test_data)) {
					 $result_field = get_result($test_data[$status_test],$data['result_field']);
					  if ($result_field == null or $result_field=='') { echo 'N/A';} else { echo $result_field ; }  
				 }
		?></td>
		<td>
			<?php if($data['status_test']!=null and $result_field !=null) { 
					if ($test_data[$status_test]=='DISPOSISI' or $test_data[$status_test]=='A') {
						echo 'PASS';
					}else {
						echo $test_data[$status_test];
					}
			}?>
		</td>
	</tr>
	<?php $no++; } ?>
	
	<?php  // 7
	$get_data = get_data(7);
	$no = 1;
	while ($data = mysqli_fetch_assoc($get_data) ) {  ?>
	<tr>
		<td style="text-align:left;<?=$data['style']?>"><?=$data['properties']?></td>	
		<?php  if ($no==1) {?>
			<td  rowspan=3>Mizuno Method</td>
		<?php }?>
		<td>
		<?php 
				$key = $data['id'].'/'.$category_m;
				if (array_key_exists($key,$array_standard)) {
					echo $array_standard[$key];	
				}
		?>
		</td>
		<td><?php $status_test = $data['status_test'];
				 if (array_key_exists($status_test,$test_data)) {
					 $result_field = get_result($test_data[$status_test],$data['result_field']);
					  if ($result_field == null or $result_field=='') { echo 'N/A';} else { echo $result_field ; }  
				 }
		?></td>
			<td>
			<?php if($data['status_test']!=null and $result_field !=null) { 
					if ($test_data[$status_test]=='DISPOSISI' or $test_data[$status_test]=='A') {
						echo 'PASS';
					}else {
						echo $test_data[$status_test];
					}
			}?>
		</td>
	</tr>
	<?php $no++; } ?>
	
	
	<?php  // 8
	$get_data = get_data(8);
	$no = 1;
	while ($data = mysqli_fetch_assoc($get_data) ) {  ?>
	<tr>
		<td style="text-align:left;<?=$data['style']?>"><?=$data['properties']?></td>	
		<td ><?=$data['method']?></td>
		<td>
		<?php 
				$key = $data['id'].'/'.$category_m;
				if (array_key_exists($key,$array_standard)) {
					echo $array_standard[$key];	
				}
		?>
		</td>
		<td><?php $status_test = $data['status_test'];
				 if (array_key_exists($status_test,$test_data)) {
					 $result_field = get_result($test_data[$status_test],$data['result_field']);
					  if ($result_field == null or $result_field=='') { echo 'N/A';} else { echo $result_field ; }  
				 }
		?></td>
		<td>
			<?php if($data['status_test']!=null and $result_field !=null) { 
					if ($test_data[$status_test]=='DISPOSISI' or $test_data[$status_test]=='A') {
						echo 'PASS';
					}else {
						echo $test_data[$status_test];
					}
			}?>
		</td>
	</tr>
	<?php $no++; } ?>
	
	<!--
</table>
<div class="page-breakXX"></div>
<div>
<table   class="table-report">
	
	
	<tr>
		<td  width=40%></td>
		<td  width=20%><b>METHOD</b></td>
		<td  width=20%><b><i>STANDARD</i></b></td>
		<td  width=10%><b>RESULT</b></td>
		<td  width=10%><b>REMARK</b></td>
	</tr>
	-->
	<tr>
		<td style="text-align:center" colspan=5 ><b>FABRIC FUNCTIONAL TEST</b></td>
		
	</tr>
	
	
	

	<?php  // 9
	$get_data = get_data(9);
	$no = 1;
	while ($data = mysqli_fetch_assoc($get_data) ) {  ?>
	<tr>
		<td style="text-align:left;<?=$data['style']?>"><?=$data['properties']?></td>	
		<?php  if ($no==1) {?>
			<td  rowspan=4>JIS L1907</td>
		<?php }?>
		<td>
		<?php 
				$key = $data['id'].'/'.$category_m;
				if (array_key_exists($key,$array_standard)) {
					echo $array_standard[$key];	
				}
		?>
		</td>
		<td><?php $status_test = $data['status_test'];
				 if (array_key_exists($status_test,$test_data)) {
					 $result_field = get_result($test_data[$status_test],$data['result_field']);
					 if ($result_field == null or $result_field=='') { echo 'N/A';} else { echo $result_field ; }  
				 }
		?></td>
		<td><?php if($data['status_test']!=null and $result_field !=null) { 
			
					echo $test_data[$status_test];
			}?></td>
	</tr>
	<?php $no++; } ?>
	
	<?php  // 10
	$get_data = get_data(10);
	$no = 1;
	while ($data = mysqli_fetch_assoc($get_data) ) {  ?>
	<tr>
		<td style="text-align:left;<?=$data['style']?>"><?=$data['properties']?></td>	
		<?php  if ($no==1) {?>
			<td  rowspan=2>ISO 176`7 method A-1</td>
		<?php }?>
		<td>
		<?php 
				$key = $data['id'].'/'.$category_m;
				if (array_key_exists($key,$array_standard)) {
					echo $array_standard[$key];	
				}
		?>
		</td>
		<td><?php $status_test = $data['status_test'];
				 if (array_key_exists($status_test,$test_data)) {
					 $result_field = get_result($test_data[$status_test],$data['result_field']);
					 if ($result_field == null or $result_field=='') { echo 'N/A';} else { echo $result_field ; }  
				 }
		?></td>
			<td>
			<?php if($data['status_test']!=null and $result_field !=null) { 
					if ($test_data[$status_test]=='DISPOSISI' or $test_data[$status_test]=='A') {
						echo 'PASS';
					}else {
						echo $test_data[$status_test];
					}
			}?>
		</td>
	</tr>
	<?php $no++; } ?>
	
	
	

</table>










<br><br><br>
<table  class="table-report" >
	<tr>
		<td width="25%"></td>
		<td width="25%">Dibuat oleh :</td>
		<td width="25%">Diperiksa oleh :</td>
		<td width="25%">Disetujui oleh :</td>
	</tr>
	<tr>
		<td style="text-align:left">Nama</td>
		<td align=center ><input autofocus type="text" style="text-align:center; border:0px; font-size:7px;display: nonexx"> </td>
		<td >Vivik Kurniawati</td>
		<td >Ely</td>
	</tr>
	<tr>
		<td  style="text-align:left">Jabatan</td>
		<td >Operator </td>
		<td >Supervisor</td>
		<td >Ass. Manager</td>
	</tr>
	<tr>
		<td  style="text-align:left">Tanggal</td>
		<td ><?=date("d-m-Y");?></td>
		<td ><?=date("d-m-Y");?></td>
		<td ><?=date("d-m-Y");?></td>
	</tr>
	<tr>
		<td width="25%" style="text-align:left">Tanda Tangan
		<br><br><br><br><br>
		</td>
		<td ></td>
		<td ></td>
		<td ></td>
	</tr>
</table>


</div>