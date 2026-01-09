<?php 
$nodemand_qn =  isset($_POST['nodemand']) ? $_POST['nodemand'] : '';
$nodemand_fl =  isset($_POST['nodemand_fl']) ? $_POST['nodemand_fl'] : ''
?>
<form  action="" method="POST">
  <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Testing Operan QN Ke FL</h3>
     
      </div>
<div class="box-body" style="background-color:#fff">
	<div class="form-group">
		
		<label for="exampleInputEmail1">No Demand QN</label>
		<input value="<?=$nodemand_qn?>" required type="text" name="nodemand" id="input1" class="form-control">
	</div>
	<div class="form-group">
		<label for="exampleInputPassword1">No Demand FL</label>
		<input value="<?=$nodemand_fl?>" required type="text" name="nodemand_fl" id="input2" class="form-control">
	</div>
	<div class="box-footer">
		<button type="submit" class="btn btn-primary" name="syncron">Preview</button>
	</div>	
</div>

</div>
</form>
	




<script>
  // Get references to the input elements
  var input1 = document.getElementById("input1");
  var input2 = document.getElementById("input2");

  // Add an event listener to input1 for the "input" event
  input1.addEventListener("input", function () {
    // Set the value of input2 equal to input1 whenever input1 changes
    input2.value = input1.value;
  });
</script>
<?php
include "koneksi.php"; 
$array_multiple = array();
if (isset($_POST['syncron'])) { ?>
	<?php 
		
		function demand_multiple($id_nokk,$nodemand) {
			global $con ; 
			$sql = "select sort_by, nodemand 
					from tbl_tq_nokk_demand
					where id_nokk = '$id_nokk'
					order by sort_by";
			$result = mysqli_query($con,$sql);
			$array[1] = $nodemand ;
			
			while ($datas = mysqli_fetch_assoc($result) ) {					
						$array[$datas['sort_by']] = $datas['nodemand'] ; 
			}
			return $array ; 
		}
		
		function cek_demand($nodemand,$nodemandfl) {
			global $con ; 
			$sql = "select a.id, b.id_nokk as id_nokk, a.nodemand as nodemand , 
					b.nodemand as nodemand_right,
					a.no_item, a.no_hanger ,
					c.id as id_tq_test,
					max(d.id) as id_fl
					from tbl_tq_nokk a
					left join tbl_tq_nokk_demand b on (a.id = b.id_nokk)
					left join tbl_tq_test c on (a.id = c.id_nokk)
					left join tbl_tq_first_lot d on (d.nodemand = '$nodemandfl')
					where a.nodemand = '$nodemand' or b.nodemand = '$nodemand' 
					order by a.id desc , b.id desc limit 1 ";
			$result = mysqli_query($con,$sql);
			return $result ; 
		}
	
		$nodemand = $_POST['nodemand'];
		$nodemandfl = $_POST['nodemand_fl'];
		/*echo '<pre>';
			print_r($nodemandfl);
		echo '</pre>';
		*/
		$cek_demand = cek_demand($nodemand, $nodemandfl);
		$data   = mysqli_fetch_assoc($cek_demand);
		
		if ($data) {
				if ($data['id_nokk']) { // multiple exists					
					$multiple = demand_multiple($data['id_nokk'],$data['nodemand']);
					
					$array_multiple = $multiple ;
					
					
				} else {
					//echo 11 ; 
				}
		} else {
			//echo 2 ; 
		}
		
		/*
		echo '<pre>';
			print_r($data);
		echo '</pre>';
		*/
		
		
	?>
<?php }
?>
<?php ?>
<?php 
	if (count($array_multiple)>0) { ?>
	<div class="box-body" style="background-color:#fff">
	<?php 
	foreach ($array_multiple as $multiple) {
		echo '<div style="border:solid thin #ddd;float:left;margin-right:10px;padding:2px">';
		echo $multiple ;
		echo '</div>';
		echo '&nbsp;&nbsp;';
	} ?>
	</div>
	<?php }?>
<?php if ($data and $data['id_tq_test'] ) { ?>
<br><br>
<div class="col-sm-7">
	<b>1) QUALITY NEW</b><br>
	<a target = "_BLANK" href="TestingNew-<?=$nodemand_qn?>">Link QN <?=$nodemand_qn?></a>
	<iframe width=550px height=400px src = "pages/cetak/cetak_result.php?idkk=<?=$data['id']?>&noitem=<?=$data['no_item']?>&nohanger=<?=$data['no_hanger']?>">
	</iframe>
</div>
<div class="col-sm-3" >
	<b>2) FIRST LOT</b> <br>
	
	<?php if ($data['id_fl']) {?>
	<a target = "_BLANK" href="TestingNewFL-<?=$nodemand_fl?>">Link FL <?=$nodemand_fl?></a>
		
	<?php $id_fl = $data['id_fl'];} else {
		 echo '<div style="color:red">';
		 echo 'No Demand First LOT Not Found';
		 echo '</div>';
	}
		 
	?>

</div>

<div class="col-sm-2" >
	<?php if ($data and $data['id_tq_test']  and $data['id_fl']) {  ?>
		<form action="" method="POST" id="myForm" onsubmit="return confirmSubmit();">
			
			<input value="<?=$nodemand_qn?>" required type="hidden" name="nodemand" >
			<input value="<?=$nodemand_fl?>" required type="hidden" name="nodemand_fl" >
	
			<input type="hidden" name="synkron_id_qn" value=<?=$data['id']?>>
		
			<button name="update_first_lot" type="submit" class="btn btn-info pull-right">3) Syncronize</button>
		</form>
	<?php } ?>
</div>



<?php } ?>


    <script>
        function confirmSubmit() {
            // Display a confirmation dialog
            return confirm("Are you sure you want to update to First Lot?");
        }
    </script>

<?php if (isset($_POST['update_first_lot'])) {
$synkron_id_qn = $_POST['synkron_id_qn'];
?>


<?php 
	function insert_fl ($nodemand,$tabel_sumber,$tabel_tujuan) {
	
	global $con;
	global $synkron_id_qn;
	
	$sqlCekNew = mysqli_query($con, "SELECT a.* 
			FROM $tabel_sumber a
			JOIN tbl_tq_nokk b on (a.id_nokk = b.id)
			WHERE b.id = '$synkron_id_qn' order by b.id desc limit 1 ");
	$rcekNew = mysqli_fetch_array($sqlCekNew);

	if ($rcekNew) {
	
	$sqlCekFl = mysqli_query($con, "SELECT a.id as pk, b.id as pk_test , b.id_nokk
				FROM tbl_tq_first_lot a
				LEFT JOIN $tabel_tujuan  b on (a.id = b.id_nokk)
				WHERE a.nodemand = '$nodemand' order by a.id desc limit 1");
    $rcekFl = mysqli_fetch_array($sqlCekFl);
	
    if ($rcekFl['id_nokk'] != null) {
		
		$id = $rcekFl['pk_test'];
		
        $updateSql = "UPDATE $tabel_tujuan SET ";
        foreach ($rcekNew as $key => $value) {
            if (is_string($key) && $key != 'id' && $key != 'id_nokk') { // Skip 'id' column
                $escapedValue = mysqli_real_escape_string($con, $value); // Escape the value
                $updateSql .= "$key = '$escapedValue', ";
            }
        }
        $updateSql = rtrim($updateSql, ', ') . " WHERE id = '$id'";
		   
        $return 	 =  mysqli_query($con, $updateSql);
        //$return_text =  "Data telah diperbarui di First Lot";
		return true;
    } else { 
		
		$id = $rcekFl['pk'];			
        $columns = array();
        $values = array();
        foreach ($rcekNew as $key => $value) {
            if (is_string($key)  && $key != 'id' && $key != 'id_nokk'  ) {
                $columns[] = $key;
                $escapedValue = mysqli_real_escape_string($con, $value); // Escape the value
                $values[] = "'$escapedValue'";
            }
        }

        $columnString = implode(",", $columns);
        $valueString = implode(",", $values);
			
        $insertSql = "INSERT INTO $tabel_tujuan (id_nokk,$columnString) VALUES ('$id',$valueString)";
		
        $return 	 = mysqli_query($con, $insertSql);
        //$return_text = "Data telah dimasukkan ke First Lot";
		return true;
    }
		/*
		if ($return)  {
			echo "<script>
					alert('$return_text'); 
				</script>";
		} else {
			echo "<script>
					alert('Failed'); 
				</script>";
		}
		*/
	
	} else {
    //echo "Tidak ada data ditemukan untuk No Demand  $nodemand";
	}

	}
	
	$nodemand 		= $_POST['nodemand_fl'] ;
	$tq_test 	 	= insert_fl($nodemand,'tbl_tq_test','tbl_tq_test_fl');
	$tq_marginal 	= insert_fl($nodemand,'tbl_tq_marginal','tbl_tq_marginal_fl');
	$disptest 		= insert_fl($nodemand,'tbl_tq_disptest','tbl_tq_disptest_fl');
	
	if ($tq_test or $tq_marginal or $disptest) {
		echo "<script>
					alert('The data has been successfully updated to $nodemand'); 
			 </script>";
	} else {
		echo "<script>
					alert('Data Update Failed'); 
			 </script>";
	}
	
	?>


<?php } ?>