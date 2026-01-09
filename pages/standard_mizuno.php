<?php 
include "../koneksi.php";
$array_ms = ['MS1','MS2','MS3','MS4','MS6','S2'];
$standard_report_sql  = mysqli_query($con,"SELECT * FROM STANDARD_REPORT WHERE status_input = 1  order by display,  properties_order ");
 
$array_note = [] ;
$array_group = []; 
while ($datas = mysqli_fetch_assoc($standard_report_sql) ) { 
	$array_category[$datas['id']] = $datas['id'];
	if ($datas['properties_note']) {
		$array_note[$datas['id']] = $datas['group'];
	}
	
	$array_properties[$datas['id']] = $datas['properties'];
	$array_group[$datas['id']] = $datas['group'];
}






//$array_category = ['Dimentional Stability12','Press Dimensional Changes','Bursting Strength'];

$standard_sql  = mysqli_query($con,"SELECT * FROM STANDARD ");
$array_standard = [];
	
while ($datas = mysqli_fetch_assoc($standard_sql) ) {
	$key = $datas['category'].'/'.$datas['sub_category'];
	$array_standard[$key] = $datas['value'];
}


	
if (isset($_GET['sub']) ) {
	$sub = $_GET['sub'] ; 
} else {
	$sub = null ;
}

?>
<?php if ($sub) { ?>

<div class="row">
<div class="col-md-12">
<div class="box">
<div class="box-header">
<div class="box-body">


<A href="StandardMizuno">HIDE</a>
<form class="form-horizontal" action="" method="post" >
<div class="box box-info" style="width: 98%;">
	<div class="box-header with-border">
	<h3 class="box-title">EDIT <b><?=$sub;?></b></h3>
	
	</div>
	<div class="box-body"> 
		<div class="col-md-12">
			
			<?php foreach ($array_category as $key=>$category) { 
			
			if (array_key_exists($category,$array_note)) {
				echo '<hr>';
			}
			
			?>
			<div class="form-group">
			<label class="col-sm-3 control-label"><?=$array_properties[$category]?></label>
				<div class="col-sm-4">
				<?php 
					// $value = $category.'/'.$sub ; 
					if (array_key_exists($category.'/'.$sub,$array_standard)) {
						$value = $array_standard[$category.'/'.$sub];
					} else {
						$value = null ; 
					}
				?>
				<input value="<?=$value?>" class="form-control" type="text" name="<?=$category?>" placeholder="<?=$array_group[$key]?>" >
				</div>
			</div>  
			<?php } ?>
			<div class="form-group">
			<label  class="col-sm-3 control-label"></label>
				<div class="col-sm-4">
					<input type="submit" value="UPDATE" name="save" class="btn btn-success">
				</div>
			</div>
			
		</div>
	</div>	 
</div>

</form>



				


</div>
</div>
</div>
</div>
</div>

<?php  } else { ?>






<div class="row">
<div class="col-md-12">
<div class="box">
<div class="box-header">
<div class="box-body">
				
				
 <table class="table table-bordered table-hover table-striped" width="100%"> 
    <thead class="bg-blue">                   
	<tr>
		<td>PROPERTIES</td>
		<?php foreach ($array_ms as $ms) { ?>
			<td><?=$ms?> &nbsp; 
			<a href="StandardMizuno-<?=$ms?>" style="color:yellow">
			CHANGE
			</a>
			</td>
		<?php } ?>
	</tr>
	</thead>
	<?php 
	
	foreach ($array_category as $category) { ?>
	<tr>
		<td><?=$array_properties[$category];
			   if (array_key_exists($category,$array_note)) {
				   echo ' <b>( '.$array_note[$category].' )</b>' ; 
			   }
		?>
			
		</td>
		<?php foreach ($array_ms as $ms) { ?>		
		<td>
				<?php 
					$key_data = $category.'/'.$ms;
					if (array_key_exists($key_data,$array_standard) ) {
						echo  $array_standard[$key_data];
					} 	

					
				?>
		</td>	
		<?php } ?>
	</tr>
	
	<?php  } ?>
</table>


</div>
</div>
</div>
</div>
</div>

<?php  } ?>

















<?php if (isset($_POST['save'])) {?>
	
	<?php  
		echo '<pre>';
			print_r($_POST);
		echo '</pre>';
		
		
		foreach ($_POST as $key=>$value) {
			$updatedString = str_replace('_', ' ', $key);
			echo $updatedString ;
			echo '/';
			echo $value; 			
			echo '<br>';
			//if exists (category, sub_category)
			$standard_sql  = mysqli_query($con,"SELECT * FROM STANDARD WHERE category  = '$updatedString' and sub_category = '$sub'");
			$standard_data = mysqli_fetch_assoc($standard_sql);
//if ($updatedString !='save') {
				if ($standard_data) {	
					 mysqli_query($con,"update STANDARD set value = '$value' where category = '$updatedString' and sub_category = '$sub' ");
				} else {
					 $standard_sql = mysqli_query($con,"insert into standard (category,sub_category,value) VALUES ('$updatedString','$sub','$value')");
				}
			//}
			//echo '<br>';
			
			
		}
		echo "<script>swal({
  title: 'Data Tersimpan',   
  text: 'Klik Ok untuk input data kembali',
  type: 'success',
  }).then((result) => {
  if (result.value) {
     	
	 window.location.href='StandardMizuno';
	 
  }
});</script>";
	?>
	
<?php }?>
