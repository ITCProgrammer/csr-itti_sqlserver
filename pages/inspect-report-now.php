<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inspect Report NOW</title>
</head>
<body>
<?php
$Demand	= isset($_POST['demand']) ? $_POST['demand'] : '';
$Operator	= isset($_POST['operator']) ? $_POST['operator'] : '';
$Ispacking	= isset($_POST['ispacking']) ? $_POST['ispacking'] : '';
$IsInspectpacking	= isset($_POST['isinspectpacking']) ? $_POST['isinspectpacking'] : '';
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Inspect Report NOW</h3>
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
            <input name="demand" type="text" class="form-control pull-right" id="demand" placeholder="No Demand" value="<?php echo $Demand;  ?>" />
          </div>
          <!-- <div class="col-sm-3">
            <select class="form-control select2" name="operator" id="operator" required>
              <option value="">Pilih</option>
                <?php 
                $stmt1=db2_exec($conn1,"SELECT INITIALS.LONGDESCRIPTION, INITIALS.CODE
                FROM INITIALS INITIALS ORDER BY INITIALS.LONGDESCRIPTION ASC", array('cursor'=>DB2_SCROLLABLE));
                while($ri=db2_fetch_assoc($stmt1)){
                ?>
              <option value="<?php echo $ri['CODE'];?>" <?php if($_POST['operator']==$ri['CODE']){echo "SELECTED";}?>><?php echo $ri['LONGDESCRIPTION'];?></option>	
              <?php }?>
            </select>
          </div> -->
        </div>
        <div class="form-group">
          <div class="col-sm-3">
            <input type="checkbox" name="ispacking" id="ispacking" value="true" <?php  if($Ispacking=="true"){ echo "checked";} ?>>  
            <label> Inspection Packing</label>
          </div>	  	
        <!-- /.input group -->
      </div>
      <div class="form-group">
          <div class="col-sm-3">
            <input type="checkbox" name="isinspectpacking" id="isinspectpacking" value="true" <?php  if($IsInspectpacking=="true"){ echo "checked";} ?>>  
            <label> Inspect + Packing</label>
          </div>	  	
        <!-- /.input group -->
      </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="col-sm-2">
        <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="save" style="width: 60%">Search <i class="fa fa-search"></i></button>
      </div>
    </div>
    <!-- /.box-footer -->
  </form>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header with-border">
            <h3 class="box-title">Data <?php if($Ispacking=='true'){echo "Inspect Packing";}else if($IsInspectpacking=='true'){echo "Inspect + Packing";}else{echo "Inspect";}?></h3><br>
            <?php if($_POST['demand']!="") { ?><b>No. Demand: <?php echo $_POST['demand']; ?></b><br>
            <?php } ?>
            <!-- <?php if($_POST['operator']!="") { ?><b>Operator: <?php echo $_POST['operator']; ?></b><br>
            <?php } ?> -->
            <?php if($Ispacking=='true'){?>
            <div class="pull-right">
                <a href="pages/cetak/cetak_inspectpackingreport.php?demand=<?php echo $_POST['demand']; ?>&ispacking=<?php echo $_POST['ispacking']; ?>" class="btn btn-primary <?php if($_POST['demand']=="") { echo "disabled"; }?>" target="_blank">Cetak Inspect Packing Report</a> 
                <!-- <a href="pages/cetak/excel_inspectpackingreport.php?demand=<?php echo $_POST['demand']; ?>&ispacking=<?php echo $_POST['ispacking']; ?>" class="btn btn-success <?php if($_POST['demand']=="") { echo "disabled"; }?>" target="_blank">Excel Inspect Packing Report</a> -->
                <a href="pages/cetak/cetak_inspectpackingreportcustomer.php?demand=<?php echo $_POST['demand']; ?>&ispacking=<?php echo $_POST['ispacking']; ?>" class="btn btn-primary <?php if($_POST['demand']=="") { echo "disabled"; }?>" target="_blank">Cetak Inspect Packing Report Customer</a>  
                <!-- <a href="pages/cetak/cetak_inspectpackingreport_test.php?demand=<?php echo $_POST['demand']; ?>&ispacking=<?php echo $_POST['ispacking']; ?>" class="btn btn-primary <?php if($_POST['demand']=="") { echo "disabled"; }?>" target="_blank">TEST</a>  -->
                <!-- <a href="pages/cetak/excel_inspectpackingreportcustomer.php?demand=<?php echo $_POST['demand']; ?>&ispacking=<?php echo $_POST['ispacking']; ?>" class="btn btn-success <?php if($_POST['demand']=="") { echo "disabled"; }?>" target="_blank">Excel Inspect Packing Report Customer</a> -->
            </div>
            <?php }else if($IsInspectpacking=='true'){ ?>
              <div class="pull-right">
                <a href="pages/cetak/cetak_inspect+packingreport.php?demand=<?php echo $_POST['demand']; ?>&isinspectpacking=<?php echo $_POST['isinspectpacking']; ?>" class="btn btn-primary <?php if($_POST['demand']=="") { echo "disabled"; }?>" target="_blank">Cetak Inspect + Packing Report</a> 
                <!-- <a href="pages/cetak/excel_inspectpackingreport.php?demand=<?php echo $_POST['demand']; ?>&ispacking=<?php echo $_POST['isinspectpacking']; ?>" class="btn btn-success <?php if($_POST['demand']=="") { echo "disabled"; }?>" target="_blank">Excel Inspect Packing Report</a> -->
                <a href="pages/cetak/cetak_inspect+packingreportcustomer.php?demand=<?php echo $_POST['demand']; ?>&isinspectpacking=<?php echo $_POST['isinspectpacking']; ?>" class="btn btn-primary <?php if($_POST['demand']=="") { echo "disabled"; }?>" target="_blank">Cetak Inspect + Packing Report Customer</a>  
                <!-- <a href="pages/cetak/excel_inspectpackingreportcustomer.php?demand=<?php echo $_POST['demand']; ?>&ispacking=<?php echo $_POST['ispacking']; ?>" class="btn btn-success <?php if($_POST['demand']=="") { echo "disabled"; }?>" target="_blank">Excel Inspect Packing Report Customer</a> -->
                </div>
            <?php }else{ ?>
            <div class="pull-right">
                <a href="pages/cetak/cetak_inspectreport.php?demand=<?php echo $_POST['demand']; ?>&ispacking=<?php echo $_POST['ispacking']; ?>" class="btn btn-primary <?php if($_POST['demand']=="") { echo "disabled"; }?>" target="_blank">Cetak Inspect Report</a> 
                <!-- <a href="pages/cetak/excel_inspectreport.php?demand=<?php echo $_POST['demand']; ?>&ispacking=<?php echo $_POST['ispacking']; ?>" class="btn btn-success <?php if($_POST['demand']=="") { echo "disabled"; }?>" target="_blank">Excel Inspect Report</a> -->
                <a href="pages/cetak/cetak_inspectreportcustomer.php?demand=<?php echo $_POST['demand']; ?>&ispacking=<?php echo $_POST['ispacking']; ?>" class="btn btn-primary <?php if($_POST['demand']=="") { echo "disabled"; }?>" target="_blank">Cetak Inspect Report Customer</a>  
                <!-- <a href="pages/cetak/cetak_inspectreport_test.php?demand=<?php echo $_POST['demand']; ?>&ispacking=<?php echo $_POST['ispacking']; ?>" class="btn btn-danger <?php if($_POST['demand']=="") { echo "disabled"; }?>" target="_blank">TEST</a>  -->
                <!-- <a href="pages/cetak/excel_inspectreportcustomer.php?demand=<?php echo $_POST['demand']; ?>&ispacking=<?php echo $_POST['ispacking']; ?>" class="btn btn-success <?php if($_POST['demand']=="") { echo "disabled"; }?>" target="_blank">Excel Inspect Report Customer</a> -->
            </div>
            <?php } ?>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th><div align="center">No</div></th>
              <th><div align="center">Element</div></th>
              <th><div align="center">Index</div></th>
              <th><div align="center">Start date/time</div></th>
              <th><div align="center">End date/time</div></th>
              <th><div align="center">Operator</div></th>
              <th><div align="center">Comment</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            if($Ispacking=="true" or $IsInspectpacking=="true"){ $pack =" AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=13 "; }else{$pack = " AND LENGTH(TRIM(ELEMENTSINSPECTION.ELEMENTCODE))=11 ";}
            // if($Operator!=""){ $opt =" AND ELEMENTSINSPECTION.OPERATORCODE ='$Operator' "; }else{$opt = " ";}
            if($Demand!="" or $Operator!=""){
              $sqlDB2="SELECT ELEMENTSINSPECTION.ELEMENTCODE,
              ELEMENTSINSPECTION.INSPECTIONINDEX,
              ELEMENTSINSPECTION.DEMANDCODE,
              ELEMENTSINSPECTION.OPERATORCODE,
              INITIALS.LONGDESCRIPTION AS OPERATOR,
              ELEMENTSINSPECTION.LENGTHGROSS,
              ELEMENTSINSPECTION.WEIGHTGROSS,
              ELEMENTSINSPECTION.WEIGHTNET,
              ELEMENTSINSPECTION.WIDTHNET,
              ELEMENTSINSPECTION.QUALITYCODE,
              LEFT(ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME,19) AS STARTTIME,
              LEFT(ELEMENTSINSPECTION.INSPECTIONENDDATETIME,19) AS ENDTIME,
              ELEMENTSINSPECTION.QUALITYREASONCODE,
              QUALITYREASON.LONGDESCRIPTION AS QUALITY_REASON,
              ELEMENTSINSPECTION.TOTALPOINTS,
              ELEMENTSINSPECTION.TOTALCREDITS,
              LEFT(ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME,10) AS TGL_INSPEK 
           FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
           LEFT JOIN INITIALS INITIALS ON ELEMENTSINSPECTION.OPERATORCODE = INITIALS.CODE 
           LEFT JOIN QUALITYREASON QUALITYREASON ON ELEMENTSINSPECTION.QUALITYREASONCODE = QUALITYREASON.CODE
           WHERE ELEMENTSINSPECTION.DEMANDCODE = '$Demand' $pack ORDER BY ELEMENTSINSPECTION.ELEMENTCODE ASC";
           $stmt=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
            }else{
              $sqlDB2="SELECT ELEMENTSINSPECTION.ELEMENTCODE,
              ELEMENTSINSPECTION.INSPECTIONINDEX,
              ELEMENTSINSPECTION.DEMANDCODE,
              ELEMENTSINSPECTION.OPERATORCODE,
              INITIALS.LONGDESCRIPTION AS OPERATOR,
              ELEMENTSINSPECTION.LENGTHGROSS,
              ELEMENTSINSPECTION.WEIGHTGROSS,
              ELEMENTSINSPECTION.WEIGHTNET,
              ELEMENTSINSPECTION.WIDTHNET,
              ELEMENTSINSPECTION.QUALITYCODE,
              LEFT(ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME,19) AS STARTTIME,
              LEFT(ELEMENTSINSPECTION.INSPECTIONENDDATETIME,19) AS ENDTIME,
              ELEMENTSINSPECTION.QUALITYREASONCODE,
              QUALITYREASON.LONGDESCRIPTION AS QUALITY_REASON,
              ELEMENTSINSPECTION.TOTALPOINTS,
              ELEMENTSINSPECTION.TOTALCREDITS,
              LEFT(ELEMENTSINSPECTION.INSPECTIONSTARTDATETIME,10) AS TGL_INSPEK 
           FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
           LEFT JOIN INITIALS INITIALS ON ELEMENTSINSPECTION.OPERATORCODE = INITIALS.CODE 
           LEFT JOIN QUALITYREASON QUALITYREASON ON ELEMENTSINSPECTION.QUALITYREASONCODE = QUALITYREASON.CODE
           WHERE ELEMENTSINSPECTION.DEMANDCODE = '$Demand' $pack ORDER BY ELEMENTSINSPECTION.ELEMENTCODE ASC";
           $stmt=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
            }
              while($row1 = db2_fetch_assoc($stmt)){
                $sqlcmt="SELECT ELEMENTSINSPECTION.ELEMENTCODE,
                ELEMENTSINSPECTION.ABSUNIQUEID,
                ADSTORAGE.VALUESTRING
                FROM ELEMENTSINSPECTION ELEMENTSINSPECTION
                LEFT JOIN ADSTORAGE ADSTORAGE ON ELEMENTSINSPECTION.ABSUNIQUEID = ADSTORAGE.UNIQUEID 
                WHERE ELEMENTCODE ='$row1[ELEMENTCODE]' AND ADSTORAGE.NAMENAME ='Note'";
                $stmt2=db2_exec($conn1,$sqlcmt, array('cursor'=>DB2_SCROLLABLE));
                $rcmt = db2_fetch_assoc($stmt2);
              ?>
            <tr bgcolor="<?php echo $bgcolor; ?>">
              <td align="center"><?php echo $no; ?></td>
              <td align="center"><a href="#" class="defect_ins" id="<?php echo $row1['ELEMENTCODE'];?>"><?php echo $row1['ELEMENTCODE']; ?></a></td>
              <td align="center"><?php echo $row1['INSPECTIONINDEX'];?></td>
              <td align="center"><?php echo $row1['STARTTIME'];?></td>
              <td align="center"><?php echo $row1['ENDTIME'];?></td>
              <td align="center"><?php echo $row1['OPERATOR'];?></td>
              <td align="center"><?php echo $rcmt['VALUESTRING'];?></td>
            </tr>
          <?php	$no++;  } ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_del" tabindex="-1" >
  <div class="modal-dialog modal-sm" >
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete all data ?</h4>
      </div>

      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<div id="DefectIns" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<script type="text/javascript">
    function confirm_delete(delete_url)
    {
      $('#modal_del').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>	
<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});

	</script>
</body>
</html>
