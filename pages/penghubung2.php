
<table class="newbonpenghubung">
  <tr>
    <td>Masalah Dominan</td>
    <td width=350px>
	
	
	
	
	<select class="form-control select2" name="penghubung2_masalah" id="kategori" style="width:150px">
			<?php if($cek>0){ 
				if ($rcek['penghubung2_masalah'] !='') { ?>
					<option selected value="<?=$rcek['penghubung2_masalah']?>" ><?=$rcek['penghubung2_masalah']?></option>	
				<?php }
			
			} ?>
			<option value="">Pilih</option>
			<option value="Grade B">Grade B</option>
			<option value="Grade C">Grade C</option>
			<?php 
							$qrym=mysqli_query($con,"SELECT masalah FROM tbl_masalah_aftersales ORDER BY masalah ASC");
							while($rm=mysqli_fetch_array($qrym)){
							?>
							<option value="<?php echo $rm['masalah'];?>" <?php if($rcek['masalah_dominan']==$rm['masalah']){echo "SELECTED";}?>><?php echo $rm['masalah'];?></option>	
			<?php }?>	
	</select>  / 
	<input type="text" name="penghubung2_keterangan" placeholder="Notes" style="width:150px" value="<?=$rcek['penghubung2_keterangan']?>">
	</td>
	</tr>

<tr>
	<td>Advice dari Produksi / QC</td>
	<td width=350px>
		<select class="form-control select2" name="advice2" id="advice2" style="width:150px">
			<option value="">Pilih</option>
			<?php
			$advices = [
				"CUTTING LOSS",
				"SPECIAL MARKER",
				"CLOSE MARKER",
				"PERBAIKAN GARMENT",
				"LETTER OF GUARANTEE (LG)",
			];
			foreach($advices as $advice){
				?>
				<option value="<?=$advice?>" <?= $rcek['advice2'] == $advice ? "SELECTED" : ""; ?>>
					<?= $advice ?>
				</option>
			<?php } ?>
		</select>
	</td>
</tr>

<tr>
    <td>Roll</td>
    <td>
      <input type="text" name="penghubung2_roll1" placeholder="0" style="width:50px" value="<?=$rcek['penghubung2_roll1']?>">
      <input type="text" name="penghubung2_roll2" placeholder="KG" style="width:50px" value="<?=$rcek['penghubung2_roll2']?>">
	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" name="penghubung2_roll3" placeholder="0.00" style="width:50px" value="<?=$rcek['penghubung2_roll3']?>">
    
	 <select class="form-control select2" name="penghubung2_roll4"  style="width:80px">
			<option value="">Yard</option>
	 </select>
    </td>
  </tr> 
  <tr>
    <td>Dept. Tanggung Jawab</td>
    <td>
	<!--
	<input type="text" name="penghubung_dep" placeholder="penghubung_dep">-->
	<select  style="width:250px" class="form-control select2" multiple="multiple" data-placeholder="Max 3 Depart " name="penghubung2_dep[]" id="t_jawab">
						<?php

						$a = $rcek['penghubung2_dep'] ; 

						$arrayA = explode(',', $a);

						foreach ($arrayA as $element) {
							echo $element . "\n";
						}

						?>

						<?php
						$dtArr=$rcek['t_jawab'];	
						$data = explode(",",$dtArr);
						$qCek1=mysqli_query($con,"SELECT nama FROM tbl_dept ORDER BY nama ASC");
						$i=0; 
						?>
						 
						
						<?php 
						while($dCek1=mysqli_fetch_array($qCek1)){ 
						if ( in_array($dCek1['nama'],$arrayA) ) {
							$seletectedpenghubung = 'selected';
						} else {
							$seletectedpenghubung = '';
						}
						?>
						<option  <?=$seletectedpenghubung?>
						
						value="<?php echo $dCek1['nama'];?>" <?php if($dCek1['nama']==$data[0] or $dCek1['nama']==$data[1] or $dCek1['nama']==$data[2] or $dCek1['nama']==$data[3] or $dCek1['nama']==$data[4] or $dCek1['nama']==$data[5]){echo "SELECTED";} ?>><?php echo $dCek1['nama'];?></option>
						<?php $i++;} ?>              
					</select> <?php //$rcek['penghubung_dep']?>
					
	</td>
  </tr>
  <tr>
    <td>%Dept. Tanggung Jawab</td>
    <td><input type="text" name="penghubung2_dep_persen" placeholder="Contoh: 50,30,20,...(Pemisah Koma dan Tanpa %)" value="<?=$rcek['penghubung2_dep_persen']?>"></td>
  </tr>
</table>