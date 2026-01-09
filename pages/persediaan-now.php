<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Aftersales NOW</title>
</head>
<body>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$Order	= isset($_POST['order']) ? $_POST['order'] : '';
$ProdOrder	= isset($_POST['prodorder']) ? $_POST['prodorder'] : '';
$PO	= isset($_POST['po']) ? $_POST['po'] : '';	
$ArticleGrup	= isset($_POST['ag']) ? $_POST['ag'] : '';	
$ArticleCode	= isset($_POST['ac']) ? $_POST['ac'] : '';	
$Warna	= isset($_POST['warna']) ? $_POST['warna'] : '';	
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"> Filter Persediaan NOW</h3>
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
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input name="awal" type="text" class="form-control pull-right" id="datepicker" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="input-group date">
              <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
              <input name="akhir" type="text" class="form-control pull-right" id="datepicker1" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off"/>
            </div>
          </div>
      </div>
      <div class="form-group">
        <div class="col-sm-2">
            <input name="order" type="text" class="form-control pull-right" id="order" placeholder="No Order" value="<?php echo $Order;  ?>" />
          </div>
          <div class="col-sm-2">
            <input name="ag" type="text" class="form-control pull-right" id="ag" placeholder="Article Group" value="<?php echo $ArticleGrup;  ?>" />
          </div>
          <div class="col-sm-2">
            <input name="prodorder" type="text" class="form-control pull-right" id="prodorder" placeholder="Prod Order" value="<?php echo $ProdOrder;  ?>" />
          </div>
        <!-- /.input group -->
      </div>
      <div class="form-group">
        <div class="col-sm-2">
            <input name="ac" type="text" class="form-control pull-right" id="ac" placeholder="Article Code" value="<?php echo $ArticleCode;  ?>" />
          </div>
        <div class="col-sm-3">
            <input name="warna" type="text" class="form-control pull-right" id="warna" placeholder="Warna" value="<?php echo $Warna;  ?>" />
          </div>
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
            <h3 class="box-title">Data Persediaan NOW</h3><br>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%">
          <thead class="bg-blue">
            <tr>
              <th><div align="center">Prod. Order</div></th>
              <th><div align="center">No. Order</div></th>
              <th><div align="center">No. PO</div></th>
              <th><div align="center">Article Group</div></th>
              <th><div align="center">Article Code</div></th>
              <th><div align="center">Warna</div></th>
              <th><div align="center">Location</div></th>
              <th><div align="center">Roll</div></th>
              <th><div align="center">Kg</div></th>
              <th><div align="center">Yd/Mtr</div></th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            if($Awal!=""){ $Where =" AND VARCHAR_FORMAT( b.CREATIONDATETIME, 'YYYY-MM-DD' ) BETWEEN '$Awal' AND '$Akhir' "; }
            if($Awal!="" or $Order!="" or $ArticleGrup!="" or $ArticleCode!="" or $Warna!="" or $ProdOrder!=""){
              $sqlDB2="SELECT 
              b.LOTCODE,
              b.WHSLOCATIONWAREHOUSEZONECODE,
              b.WAREHOUSELOCATIONCODE,
              b.ITEMTYPECODE,
              b.DECOSUBCODE01,
              b.DECOSUBCODE02,
              b.DECOSUBCODE03,
              b.DECOSUBCODE04,
              b.DECOSUBCODE05,
              b.DECOSUBCODE06,
              b.DECOSUBCODE07,
              b.DECOSUBCODE08,
              b.DECOSUBCODE09,
              b.DECOSUBCODE10,
              b.PROJECTCODE,
              COUNT(b.ELEMENTSCODE) AS ROLL,
              SUM(b.BASEPRIMARYQUANTITYUNIT) AS KG, 
              b.BASEPRIMARYUNITCODE,
              SUM(b.BASESECONDARYQUANTITYUNIT) AS YD,
              b.BASESECONDARYUNITCODE,
              b.LOGICALWAREHOUSECODE,
              SALESORDER.EXTERNALREFERENCE,
              ITXVIEWORDERPARTNERLINKACTIVE.LONGDESCRIPTION AS ITEM,
              BUSINESSPARTNER.LEGALNAME1 AS LANGGANAN,
              ORDERPARTNERBRAND.LONGDESCRIPTION AS BUYER,
              ITXVIEWCOLOR.WARNA 
              FROM 
              BALANCE b 
              LEFT JOIN SALESORDER SALESORDER ON b.PROJECTCODE = SALESORDER.CODE 
              LEFT JOIN ORDERPARTNER ORDERPARTNER ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNER.CUSTOMERSUPPLIERCODE 
              LEFT JOIN BUSINESSPARTNER BUSINESSPARTNER ON ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID = BUSINESSPARTNER.NUMBERID 
              LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE AND  
              SALESORDER.ORDERPARTNERBRANDCODE = ORDERPARTNERBRAND.CODE 
              LEFT JOIN ITXVIEWORDERPARTNERLINKACTIVE ITXVIEWORDERPARTNERLINKACTIVE ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ITXVIEWORDERPARTNERLINKACTIVE.ORDPRNCUSTOMERSUPPLIERCODE AND 
              ITXVIEWORDERPARTNERLINKACTIVE.ITEMTYPEAFICODE = b.ITEMTYPECODE AND 
              ITXVIEWORDERPARTNERLINKACTIVE.SUBCODE01 = b.DECOSUBCODE01 AND 
              ITXVIEWORDERPARTNERLINKACTIVE.SUBCODE02 = b.DECOSUBCODE02 AND 
              ITXVIEWORDERPARTNERLINKACTIVE.SUBCODE03 = b.DECOSUBCODE03 AND 
              ITXVIEWORDERPARTNERLINKACTIVE.SUBCODE04 = b.DECOSUBCODE04 AND 
              ITXVIEWORDERPARTNERLINKACTIVE.SUBCODE05 = b.DECOSUBCODE05 AND 
              ITXVIEWORDERPARTNERLINKACTIVE.SUBCODE06 = b.DECOSUBCODE06 AND 
              ITXVIEWORDERPARTNERLINKACTIVE.SUBCODE07 = b.DECOSUBCODE07 AND 
              ITXVIEWORDERPARTNERLINKACTIVE.SUBCODE08 = b.DECOSUBCODE08
              LEFT JOIN ITXVIEWCOLOR ITXVIEWCOLOR ON b.ITEMTYPECODE = ITXVIEWCOLOR.ITEMTYPECODE AND 
              b.DECOSUBCODE01 = ITXVIEWCOLOR.SUBCODE01 AND 
              b.DECOSUBCODE02 = ITXVIEWCOLOR.SUBCODE02 AND 
              b.DECOSUBCODE03 = ITXVIEWCOLOR.SUBCODE03 AND 
              b.DECOSUBCODE04 = ITXVIEWCOLOR.SUBCODE04 AND 
              b.DECOSUBCODE05 = ITXVIEWCOLOR.SUBCODE05 AND 
              b.DECOSUBCODE06 = ITXVIEWCOLOR.SUBCODE06 AND 
              b.DECOSUBCODE07 = ITXVIEWCOLOR.SUBCODE07 AND 
              b.DECOSUBCODE08 = ITXVIEWCOLOR.SUBCODE08
              WHERE b.ITEMTYPECODE='KFF' AND b.LOGICALWAREHOUSECODE='M031' $Where AND b.PROJECTCODE LIKE '%$Order%' AND b.DECOSUBCODE02 LIKE '%$ArticleGrup%' AND b.DECOSUBCODE03 LIKE '%$ArticleCode%' AND ITXVIEWCOLOR.WARNA LIKE '%$Warna%' AND b.LOTCODE LIKE '%$ProdOrder%'
              GROUP BY 
              b.LOTCODE,
              b.WHSLOCATIONWAREHOUSEZONECODE,
              b.WAREHOUSELOCATIONCODE,
              b.ITEMTYPECODE,
              b.DECOSUBCODE01,
              b.DECOSUBCODE02,
              b.DECOSUBCODE03,
              b.DECOSUBCODE04,
              b.DECOSUBCODE05,
              b.DECOSUBCODE06,
              b.DECOSUBCODE07,
              b.DECOSUBCODE08,
              b.DECOSUBCODE09,
              b.DECOSUBCODE10,
              b.PROJECTCODE,
              b.BASEPRIMARYUNITCODE,
              b.BASESECONDARYUNITCODE,
              b.LOGICALWAREHOUSECODE,
              SALESORDER.EXTERNALREFERENCE,
              ITXVIEWORDERPARTNERLINKACTIVE.LONGDESCRIPTION,
              BUSINESSPARTNER.LEGALNAME1,
              ORDERPARTNERBRAND.LONGDESCRIPTION,
              ITXVIEWCOLOR.WARNA";
            }else{
              $sqlDB2="SELECT 
              b.LOTCODE,
              b.WHSLOCATIONWAREHOUSEZONECODE,
              b.WAREHOUSELOCATIONCODE,
              b.ITEMTYPECODE,
              b.DECOSUBCODE01,
              b.DECOSUBCODE02,
              b.DECOSUBCODE03,
              b.DECOSUBCODE04,
              b.DECOSUBCODE05,
              b.DECOSUBCODE06,
              b.DECOSUBCODE07,
              b.DECOSUBCODE08,
              b.DECOSUBCODE09,
              b.DECOSUBCODE10,
              b.PROJECTCODE,
              COUNT(b.ELEMENTSCODE) AS ROLL,
              SUM(b.BASEPRIMARYQUANTITYUNIT) AS KG, 
              b.BASEPRIMARYUNITCODE,
              SUM(b.BASESECONDARYQUANTITYUNIT) AS YD,
              b.BASESECONDARYUNITCODE,
              b.LOGICALWAREHOUSECODE,
              SALESORDER.EXTERNALREFERENCE,
              ITXVIEWORDERPARTNERLINKACTIVE.LONGDESCRIPTION AS ITEM,
              BUSINESSPARTNER.LEGALNAME1 AS LANGGANAN,
              ORDERPARTNERBRAND.LONGDESCRIPTION AS BUYER,
              ITXVIEWCOLOR.WARNA 
              FROM 
              BALANCE b 
              LEFT JOIN SALESORDER SALESORDER ON b.PROJECTCODE = SALESORDER.CODE 
              LEFT JOIN ORDERPARTNER ORDERPARTNER ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNER.CUSTOMERSUPPLIERCODE 
              LEFT JOIN BUSINESSPARTNER BUSINESSPARTNER ON ORDERPARTNER.ORDERBUSINESSPARTNERNUMBERID = BUSINESSPARTNER.NUMBERID 
              LEFT JOIN ORDERPARTNERBRAND ORDERPARTNERBRAND ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ORDERPARTNERBRAND.ORDPRNCUSTOMERSUPPLIERCODE AND  
              SALESORDER.ORDERPARTNERBRANDCODE = ORDERPARTNERBRAND.CODE 
              LEFT JOIN ITXVIEWORDERPARTNERLINKACTIVE ITXVIEWORDERPARTNERLINKACTIVE ON SALESORDER.ORDPRNCUSTOMERSUPPLIERCODE = ITXVIEWORDERPARTNERLINKACTIVE.ORDPRNCUSTOMERSUPPLIERCODE AND 
              ITXVIEWORDERPARTNERLINKACTIVE.ITEMTYPEAFICODE = b.ITEMTYPECODE AND 
              ITXVIEWORDERPARTNERLINKACTIVE.SUBCODE01 = b.DECOSUBCODE01 AND 
              ITXVIEWORDERPARTNERLINKACTIVE.SUBCODE02 = b.DECOSUBCODE02 AND 
              ITXVIEWORDERPARTNERLINKACTIVE.SUBCODE03 = b.DECOSUBCODE03 AND 
              ITXVIEWORDERPARTNERLINKACTIVE.SUBCODE04 = b.DECOSUBCODE04 AND 
              ITXVIEWORDERPARTNERLINKACTIVE.SUBCODE05 = b.DECOSUBCODE05 AND 
              ITXVIEWORDERPARTNERLINKACTIVE.SUBCODE06 = b.DECOSUBCODE06 AND 
              ITXVIEWORDERPARTNERLINKACTIVE.SUBCODE07 = b.DECOSUBCODE07 AND 
              ITXVIEWORDERPARTNERLINKACTIVE.SUBCODE08 = b.DECOSUBCODE08
              LEFT JOIN ITXVIEWCOLOR ITXVIEWCOLOR ON b.ITEMTYPECODE = ITXVIEWCOLOR.ITEMTYPECODE AND 
              b.DECOSUBCODE01 = ITXVIEWCOLOR.SUBCODE01 AND 
              b.DECOSUBCODE02 = ITXVIEWCOLOR.SUBCODE02 AND 
              b.DECOSUBCODE03 = ITXVIEWCOLOR.SUBCODE03 AND 
              b.DECOSUBCODE04 = ITXVIEWCOLOR.SUBCODE04 AND 
              b.DECOSUBCODE05 = ITXVIEWCOLOR.SUBCODE05 AND 
              b.DECOSUBCODE06 = ITXVIEWCOLOR.SUBCODE06 AND 
              b.DECOSUBCODE07 = ITXVIEWCOLOR.SUBCODE07 AND 
              b.DECOSUBCODE08 = ITXVIEWCOLOR.SUBCODE08
              WHERE b.ITEMTYPECODE='KFF' AND b.LOGICALWAREHOUSECODE='M031' $Where AND b.PROJECTCODE LIKE '$Order' AND b.DECOSUBCODE02 LIKE '$ArticleGrup' AND b.DECOSUBCODE03 LIKE '$ArticleCode' AND ITXVIEWCOLOR.WARNA LIKE '$Warna' AND b.LOTCODE LIKE '$ProdOrder'
              GROUP BY 
              b.LOTCODE,
              b.WHSLOCATIONWAREHOUSEZONECODE,
              b.WAREHOUSELOCATIONCODE,
              b.ITEMTYPECODE,
              b.DECOSUBCODE01,
              b.DECOSUBCODE02,
              b.DECOSUBCODE03,
              b.DECOSUBCODE04,
              b.DECOSUBCODE05,
              b.DECOSUBCODE06,
              b.DECOSUBCODE07,
              b.DECOSUBCODE08,
              b.DECOSUBCODE09,
              b.DECOSUBCODE10,
              b.PROJECTCODE,
              b.BASEPRIMARYUNITCODE,
              b.BASESECONDARYUNITCODE,
              b.LOGICALWAREHOUSECODE,
              SALESORDER.EXTERNALREFERENCE,
              ITXVIEWORDERPARTNERLINKACTIVE.LONGDESCRIPTION,
              BUSINESSPARTNER.LEGALNAME1,
              ORDERPARTNERBRAND.LONGDESCRIPTION,
              ITXVIEWCOLOR.WARNA";
            }
                $stmt=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
                while($row1=db2_fetch_assoc($stmt)){
                $artikelgrup=trim($row1['DECOSUBCODE02']);	
                $artikelcode=trim($row1['DECOSUBCODE03']);
                $sqlpoline="SELECT 
                SALESORDERLINE.EXTERNALREFERENCE
                FROM SALESORDERLINE SALESORDERLINE 
                WHERE SALESORDERLINE.SALESORDERCODE = '$row1[PROJECTCODE]' AND 
                SALESORDERLINE.ITEMTYPEAFICODE = '$row1[ITEMTYPECODE]' AND 
                SALESORDERLINE.SUBCODE01 = '$row1[DECOSUBCODE01]' AND 
                SALESORDERLINE.SUBCODE02 = '$row1[DECOSUBCODE02]' AND 
                SALESORDERLINE.SUBCODE03 = '$row1[DECOSUBCODE03]' AND 
                SALESORDERLINE.SUBCODE04 = '$row1[DECOSUBCODE04]' AND 
                SALESORDERLINE.SUBCODE05 = '$row1[DECOSUBCODE05]' AND 
                SALESORDERLINE.SUBCODE06 = '$row1[DECOSUBCODE06]' AND 
                SALESORDERLINE.SUBCODE07 = '$row1[DECOSUBCODE07]' AND 
                SALESORDERLINE.SUBCODE08 = '$row1[DECOSUBCODE08]'";	
                $stmt2=db2_exec($conn1,$sqlpoline, array('cursor'=>DB2_SCROLLABLE));
                $rowpoline=db2_fetch_assoc($stmt2);
              ?>
          <tr bgcolor="<?php echo $bgcolor; ?>">
            <td align="center"><a href="#" id='<?php echo $row1['LOTCODE']; ?>' class="detail_persediaan_kain"><?php echo $row1['LOTCODE'];?></a></td>
            <!-- <td align="center"><?php echo $row1['LOTCODE'];?></td> -->
            <td align="center"><?php echo $row1['PROJECTCODE'];?></td>
            <td align="center"><?php if($row1['EXTERNALREFERENCE']!=''){echo $row1['EXTERNALREFERENCE'];}else{echo $rowpoline['EXTERNALREFERENCE'];}?></td>
            <td align="center"><?php echo $artikelgrup;?></td>
            <td align="center"><?php echo $artikelcode;?></td>
            <td align="center"><?php echo $row1['WARNA'];?></td>
            <td align="center"><?php echo trim($row1['WHSLOCATIONWAREHOUSEZONECODE'])."-".$row1['WAREHOUSELOCATIONCODE'];?></td>
            <td align="center"><?php echo $row1['ROLL'];?></td>
            <td align="center"><?php echo number_format($row1['KG'], 2);?></td>
            <td align="center"><?php echo number_format($row1['YD'], 2);?></td>
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
<div id="StsGKEdit" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
<div id="DetailPersediaanKain" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>	
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
