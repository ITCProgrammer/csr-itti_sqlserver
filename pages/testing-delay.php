<div class="box box-info">
	<div class="box-header with-border">
	<h3 class="box-title">Testing Delay</h3>
	</div>
	<div class="box-body">
		<form action="" method="POST" >
			<table style="padding:10px">
			<tr>
			<td><input name="tgl_awal" type="date" placeholder="Tgl Awal" required class="form-control" style="float:left"></td>
			<td ><input  style="margin-left:10px" name="tgl_akhir" type="date" placeholder="Tgl Akhir" required class="form-control" style="float:left"></td>
			<td><input style="margin-left:20px" value="Search"  type="submit" name="submit" class="btn btn-info"></td>
			</tr>
			</table>
		</form>
	</div>
</div>

<?php 
if (isset($_POST['submit'])) 
{ ?>
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Result Testing Delay <?=$_POST['tgl_awal'];?> - <?=$_POST['tgl_akhir'];?></h3>
	</div>
	<div class="box-body">
	  
<?php 

	$tgl_awal = $_POST['tgl_awal'];
	$tgl_akhir = $_POST['tgl_akhir'].' 23:59:59';

	include "../koneksi.php";

	$sql = "select a.* ,c.spirality_status, b.nodemand,b.no_test, b.pelanggan, b.tgl_masuk
	from tbl_tq_test a
	join tbl_tq_nokk b on (a.id_nokk = b.id) 
	left join tbl_tq_test_2  c on (a.id_nokk = c.id_nokk)
	where (tgl_masuk between  '$tgl_awal' and '$tgl_akhir' ) 
	order by b.id DESC "; // Mengambil semua kolom
	$nokk = mysqli_query($con, $sql);
	//$results = mysqli_fetch_array($nokk);
	$array_field = array();
	/*
	$array_name_status  = [
		'fc_cott'=>'stat_fc',
		'fc_poly'=>'stat_fc',
		'fc_elastane'=>'stat_fc',
		'bow'=>'stat_bsk'	
	];
	*/

	$sql_filter = "select * from TBL_TQ_TEST_FILTER";
	$filter_result = mysqli_query($con, $sql_filter);

	$array_group_jenis = array();
	$array_test = array();
	while( $filter_row=mysqli_fetch_assoc($filter_result) ){
		$array_name_status[$filter_row['field_name']] = $filter_row['field_status'];
		$array_group_jenis[$filter_row['field_status']] = $filter_row['field_jenis'];
		
		$array_test[$filter_row['test']][$filter_row['field_jenis']] = 1;
	}	
	
	$array_name_field  = [];
	$array_false = [];
	foreach ($array_name_status as  $key=>$field) {
			$array_name_field[$field][$key] = $key ;  
	}  

	$array_detail  = array();

	while( $demand_row=mysqli_fetch_assoc($nokk) ){ 
		$array_detail[$demand_row['id']] = $demand_row['nodemand'].'|'.$demand_row['no_test'].'|'.$demand_row['pelanggan'].'|'.$demand_row['tgl_masuk'];
		foreach ($demand_row as $fieldName => $fieldValue) { 
		 if (isset($fieldValue) && !empty($fieldValue)) {
			
			$array_field[$demand_row['id']][$fieldName] =$fieldValue ;  
			
				//cek field to status 
				if (array_key_exists($fieldName,$array_name_status)) { 
						$status =  $array_name_status[$fieldName];
									
						if (isset($demand_row[$status]) && !empty($demand_row[$status])) { 
							//echo $demand_row[$status];
						}  else {
							/*
							echo $fieldName;
							echo ': false'; 
							echo '&nbsp;&nbsp;';
							*/
							$x = $array_group_jenis[$status];
							$array_false[$demand_row['id']][$x] = $status;
						}					
				}
				
				//cek status to field
				if (array_key_exists($fieldName,$array_name_field)) { 
						$no = 0;
						foreach ($array_name_field[$fieldName] as $k) {
							//echo $k;
							if (isset($demand_row[$k]) && !empty($demand_row[$k])) {
								
								$no++;
							} 	
						}
						if ($no==0) {
							//echo $fieldName;
							//$x = $array_group_jenis[[$fieldName];
							$x = $array_group_jenis[$fieldName];
							$array_false[$demand_row['id']][$x] = $fieldName;
						}
						
				}
			
		 }
	} 
	//echo '&nbsp;&nbsp;';
	//echo 'test';
	//echo '<hr>';
	
	
} ?>

<?php 
	/*
	echo '<pre>';
		print_r($array_false);
	echo '</pre>';
	*/
?>

<table class="table table-bordered table-striped">
	<tr class="dark">
		<th>No</th>
		<th>Tgl Masuk</th>
		<th>Demand</th>
		<th>No Test</th>
		<th>Pelanggan</th>
		<th>Issue</th>
	</tr>
	<?php
        $array_count_group_jenis = array();	
		$number = 1;
		foreach ($array_false as $key=>$data) {
		$explode = explode("|",$array_detail[$key]) ;
		?>
	<tr>
	    <td><?=$number++?></td>
		<td><?= date("d M Y H:i", strtotime($explode[3]));?></td>
		<td><?=$explode[0]?></td>
		<td> <a target="_blank" href="/qc-final-new/TestingNewNoTes-<?=$explode[1]?>"> <?=$explode[1]?> </a></td>
		<td><?=$explode[2]?></td>
		<td><?php $n = 1; foreach ($data as $detail) { 
				if ($n>=2) { echo ' / ';}
					echo $jenis_test = $array_group_jenis[$detail];
					$n++;
				
				$array_count_group_jenis[$jenis_test][] =1;
			} ?></td>
	</tr>
	<?php } ?>
</table>	

<br> 
<a style="float:right" target="_blank" class="btn btn-success btn-sm" href="pages/cetak/testing_delay_cetak.php?tgl_awal=<?=$tgl_awal?>&tgl_akhir=<?=$tgl_akhir?>">PRINT</a>
<BR>
<?php 
/*
foreach ($array_count_group_jenis as $key=>$dat) {
	echo $key ; 
	echo ' : ';
	echo count($array_count_group_jenis[$key]);
	echo '&nbsp;&nbsp;&nbsp;&nbsp;';
}
*/
?>

<style>


.table-report {
	 border-collapse: collapse;
     width: 100%;
}
.table-report td {
    padding: 1px;
	text-align:left
	
	
}


</style> 

<i>Testing Delay <?=date("d M Y", strtotime($tgl_awal));?> - <?=date("d M Y", strtotime($tgl_akhir));?></i>
<br>
<table class="table-report">
<tr>
	<td valign="top" width="33%">
		<b><u>PHYSICAL</u></b>
		
		<table border=0>
		<?php 
		foreach ($array_test['PHYSICAL'] as $key=>$f1) {
			if (array_key_exists($key,$array_count_group_jenis)) {
				echo '<tr><td>';
					echo $key;
					echo ' : ';
					echo count($array_count_group_jenis[$key]);
				echo '</td></tr>';
				}
			}
			?>
		</table>
	
	</td>
	<td valign="top" width="33%">
			
			<b><u>FUNCTIONAL & PH</u></b>
			<table border=0>
		<?php 
		foreach ($array_test['FUNCTIONAL & PH'] as $key=>$f1) {
			if (array_key_exists($key,$array_count_group_jenis)) {
				echo '<tr><td>';
					echo $key;
					echo ' : ';
					echo count($array_count_group_jenis[$key]);
				echo '</td></tr>';
				}
			}
			?>
		</table>
		
		
	
	</td>
	<td valign="top" width="33%">
	<b><u>COLORFASTNESS</u></b>
	<table border=0>
		<?php 
		foreach ($array_test['COLORFASTNESS'] as $key=>$f1) {
			if (array_key_exists($key,$array_count_group_jenis)) {
				echo '<tr><td>';
					echo $key;
					echo ' : ';
					echo count($array_count_group_jenis[$key]);
				echo '</td></tr>';
				}
			}
			?>
		</table>
	
	</td>
</tr>
</table>






</div>

</div>

<?php } ?>