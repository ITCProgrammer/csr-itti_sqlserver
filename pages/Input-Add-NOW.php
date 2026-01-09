<?php
session_start(); 
ini_set("error_reporting",1);
if($_POST['demandno']!=""){
	$DemandNo	= isset($_POST['demandno']) ? $_POST['demandno'] : '';
}else if($_GET['demandno']!=""){
	$DemandNo	= isset($_GET['demandno']) ? $_GET['demandno'] : '';
}else{
	$DemandNo	= isset($_POST['demandno']) ? $_POST['demandno'] : '';
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Update Additional Data</title>
	</head>

	<body>
  <div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Elements Inspection</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
    <div class="box-body">	
      <div class="form-group">
        <div class="col-sm-2">
          <input name="demandno" type="text" class="form-control pull-right" id="order" placeholder="No Demand" value="<?php echo $DemandNo;  ?>" autocomplete="off"/>
        </div>
        <!-- /.input group -->
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="col-sm-2">
        <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i class="fa fa-search"></i></button>
      </div>
		<a href="InputAddNOW" class="btn btn-sm btn-info pull-right">Reset</a>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
  <form method="post" name="form2" action="UpdateAdditional">		
  <div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Additional Data</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <div class="box-body">
	  <input type="hidden" name="demandno" id="demandno" value="<?php echo $DemandNo;?>"> 
      <div class="form-group">
<!--		<label for="defect" class="col-sm-3 control-label">Defect</label>-->
		<div class="col-sm-2">
		  <select name="defect" class="form-control select2" id="defect" autocomplete="off">
			  <option value="">Pilih</option>
			  <?php $sqlData  = db2_exec($conn1, "SELECT x.* FROM DB2ADMIN.USERGENERICGROUP x
WHERE USERGENERICGROUPTYPECODE ='006'");
  while ($rdf= db2_fetch_assoc($sqlData)) { ?>
			  <option value="<?php echo $rdf['CODE'];?>"><?php echo $rdf['LONGDESCRIPTION'];?></option>
			  <?php } ?>
		  </select>	
<!--		  <input name="defect" type="text" class="form-control pull-right" id="defect" placeholder="Defect" value="" autocomplete="off"/>-->
		</div>
<!--		<label for="penanggungjawab" class="col-sm-3 control-label">Penanggung Jawab</label>-->
		<div class="col-sm-2">
		  <select name="penanggungjawab" class="form-control select2" id="penanggungjawab" autocomplete="off">
			  <option value="">Pilih</option>
			  <?php $sqlData  = db2_exec($conn1, "SELECT x.* FROM DB2ADMIN.USERGENERICGROUP x
WHERE USERGENERICGROUPTYPECODE ='DPT'");
  while ($rdf= db2_fetch_assoc($sqlData)) { ?>
			  <option value="<?php echo $rdf['CODE'];?>"><?php echo $rdf['LONGDESCRIPTION'];?></option>
			  <?php } ?>
		  </select>	
<!--		  <input name="penanggungjawab" type="text" class="form-control pull-right" id="penanggungjawab" placeholder="Penanggung Jawab" value="" autocomplete="off"/>-->
		</div>
<!--		<label for="disdefect" class="col-sm-3 control-label">Disposisi Defect</label>-->
		<div class="col-sm-2">
		<select name="disdefect" class="form-control select2" id="disdefect" autocomplete="off">
			  <option value="">Pilih</option>
			  <?php $sqlData  = db2_exec($conn1, "SELECT x.* FROM DB2ADMIN.USERGENERICGROUP x
WHERE USERGENERICGROUPTYPECODE ='DIS'");
  while ($rdf= db2_fetch_assoc($sqlData)) { ?>
			  <option value="<?php echo $rdf['CODE'];?>"><?php echo $rdf['LONGDESCRIPTION'];?></option>
			  <?php } ?>
		  </select>	
<!--		  <input name="disdefect" type="text" class="form-control pull-right" id="disdefect" placeholder="Disposisi Defect" value="" autocomplete="off"/>-->
		</div>
<!--		<label for="cuttingloss" class="col-sm-3 control-label">Cutting Loss</label>-->
		<div class="col-sm-2">
		<select name="cuttingloss" class="form-control select2" id="cuttingloss" autocomplete="off">
			  <option value="">Pilih</option>
			  <?php $sqlData  = db2_exec($conn1, "SELECT x.* FROM DB2ADMIN.USERGENERICGROUP x
WHERE USERGENERICGROUPTYPECODE ='CUT'");
  while ($rdf= db2_fetch_assoc($sqlData)) { ?>
			  <option value="<?php echo $rdf['CODE'];?>"><?php echo $rdf['LONGDESCRIPTION'];?></option>
			  <?php } ?>
		  </select>		
<!--		  <input name="cuttingloss" type="text" class="form-control pull-right" id="cuttingloss" placeholder="Cutting Loss" value="" autocomplete="off"/>-->
		</div>
		<!-- /.input group -->
	  </div>	  
	 </div>	
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="submit" class="btn btn-sm btn-success pull-right" name="cetak" value="Cetak"><i class="fa fa-save"></i> Update</button>      
    </div>
    <!-- /.box-footer -->
</div>	
		
  <div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Data Elements Inspection</h3>
							<br>
						</div>
						<div class="box-body">								
							<table id="example100" class="table table-bordered table-hover table-striped nowrap" style="width:100%"> 
								<thead class="bg-red">
									<tr>
										<th width="24">
											<div align="center"><label><input name="allbox" type="checkbox" onClick="checkAll(0);" value="check" /> Cek Semua</label></div>
										</th>
										<th width="24">
											<div align="center">No</div>
										</th>
										<th width="41">
											<div align="center">Elements</div>
										</th>
										<th width="58">
											<div align="center">Kg</div>
										</th>
										<th width="82">
											<div align="center">Ket. St</div>
										</th>
										<th width="61"><div align="center">Grade</div></th>
										<th width="61"><div align="center">Defect</div></th>
										<th width="61"><div align="center">P. Jawab</div></th>
										<th width="61"><div align="center">Disposisi</div></th>
										<th width="61"><div align="center">Cutting Loss</div></th>
										<th width="61">
											<div align="center">Operator</div>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
  $sqlData  = db2_exec($conn1, "SELECT x.* FROM DB2ADMIN.ELEMENTSINSPECTION x
WHERE LENGTH(TRIM(x.ELEMENTCODE)) > 11 AND ELEMENTITEMTYPECODE ='KFF' AND x.DEMANDCODE ='$DemandNo'");
  while ($r= db2_fetch_assoc($sqlData)) {
      $no++;
      $bgcolor = ($col++ & 1) ? 'gainsboro' : 'antiquewhite';
	 $sqlData1  = db2_exec($conn1, "SELECT * 
	 FROM ADSTORAGE WHERE
		UNIQUEID = '".$r['ABSUNIQUEID']."'
		AND NAMEENTITYNAME = 'ElementsInspection'
		AND NAMENAME = 'DisposisiDefect'
		AND FIELDNAME = 'DisposisiDefectCode'");
  	 $r1= db2_fetch_assoc($sqlData1);
	 $sqlData2  = db2_exec($conn1, "SELECT * 
	 FROM ADSTORAGE WHERE
		UNIQUEID = '".$r['ABSUNIQUEID']."'
		AND NAMEENTITYNAME = 'ElementsInspection'
		AND NAMENAME = 'Defect'
		AND FIELDNAME = 'DefectCode'");
  	 $r2= db2_fetch_assoc($sqlData2);
	 $sqlData3  = db2_exec($conn1, "SELECT * 
	 FROM ADSTORAGE WHERE
		UNIQUEID = '".$r['ABSUNIQUEID']."'
		AND NAMEENTITYNAME = 'ElementsInspection'
		AND NAMENAME = 'CuttingLoss'
		AND FIELDNAME = 'CuttingLossCode'");
  	 $r3= db2_fetch_assoc($sqlData3); 
	 $sqlData4  = db2_exec($conn1, "SELECT * 
	 FROM ADSTORAGE WHERE
		UNIQUEID = '".$r['ABSUNIQUEID']."'
		AND NAMEENTITYNAME = 'ElementsInspection'
		AND NAMENAME = 'PenanggungJawab'
		AND FIELDNAME = 'PenanggungJawabCode'");
  	 $r4= db2_fetch_assoc($sqlData4); 
      ?>
									<tr>
										<td align="center"><input type=checkbox name="cek[<?php echo $no; ?>]" value="<?php echo $r['ABSUNIQUEID']; ?>"></td>
										<td align="center">
											<?php echo $no; ?>
										</td>
										<td align="center"><?php echo $r['ELEMENTCODE'];?></td>
										<td align="center"><?php echo $r['WEIGHTNET'];?></td>
										<td align="center"><?php echo $r['QUALITYREASONCODE'];?></td>
										<td align="center"><?php echo $r['QUALITYCODE'];?></td>
									  <td align="center"><?php echo $r2['VALUESTRING'];?></td>
									  <td align="center"><?php echo $r4['VALUESTRING'];?></td>
									  <td align="center"><?php echo $r1['VALUESTRING'];?></td>
										<td align="center"><?php echo $r3['VALUESTRING'];?></td>
										<td align="center"><?php echo $r['OPERATORCODE'];?></td>
									</tr>
									<?php
  } ?>
								</tbody>
								<tfoot class="bg-red">
									<tr>
										<th width="24">
											<div align="center">#</div>
										</th>
										<th width="24">
											<div align="center">No</div>
										</th>
										<th width="41">
											<div align="center">Elements</div>
										</th>
										<th width="58">
											<div align="center">Kg</div>
										</th>
										<th width="82">
											<div align="center">Ket. St</div>
										</th>
										<th width="61"><div align="center">Grade</div></th>
										<th width="61"><div align="center">Defect</div></th>
										<th width="61"><div align="center">P. Jawab</div></th>
										<th width="61"><div align="center">Disposisi</div></th>
										<th width="61"><div align="center">Cutting Loss</div></th>
										<th width="61">
											<div align="center">Operator</div>
										</th>
									</tr>
								</tfoot>
							</table>
							<!-- Modal Popup untuk Edit-->
							<div id="DetailProduksi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  </div>
							<div id="CekButuhBenang" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							</div>
							<div id="GDBTerima" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							</div>

					  </div>
					</div>
				</div>
			</div>
  </form>
	</body>

</html>
<script type="text/javascript">
function checkAll(form1){
    for (var i=0;i<document.forms['form2'].elements.length;i++)
    {
        var e=document.forms['form2'].elements[i];
        if ((e.name !='allbox') && (e.type=='checkbox'))
        {
            e.checked=document.forms['form2'].allbox.checked;
			
        }
    }
}
</script>
