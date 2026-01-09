<?php
ini_set("error_reporting", 1);
session_start();
include("../koneksi.php");
    $modal_id=$_GET['id'];
    $tgl1=$_GET['tgl1'];
    $tgl2=$_GET['tgl2'];
    $shift=$_GET['shift'];
    $satuan=$_GET['satuan'];
	//$modal=mysqli_query("SELECT * FROM tbl_ncp_qcf WHERE nokk='$modal_id' ");
//while($r=mysqli_fetch_array($modal)){	
?>
          <div class="modal-dialog">
            <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action="" enctype="multipart/form-data">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">BUKTI MUTASI KAIN DETAIL</h4>
              </div>
              <div class="modal-body">
				  <?php

?>
              <?php
   
   $sql1=mysqli_query($con,"SELECT *,tmp_detail_kite.yard_ as yard_, tmp_detail_kite.yard_ as roll, tmp_detail_kite.net_wight as bruto
   FROM tbl_kite left join tmp_detail_kite on tmp_detail_kite.nokkKite=tbl_kite.nokk
   WHERE tbl_kite.nokk='$_GET[id]'
   AND (
       sisa != 'TH'
       AND sisa != 'FKTH'
       AND sisa != 'BS'
       AND sisa != 'BB'
   )
   ORDER BY tbl_kite.id ASC");
     $row1=mysqli_fetch_array($sql1);
     $jumlah=mysqli_num_rows($sql1);

echo "<table>";
echo "<tr><td>Tanggal</td><td>: $_GET[tgl1] s/d $_GET[tgl2] </td></tr>";
echo "<tr><td>No. Kartu Kerja </td><td>: $row1[nokk] </td></tr>";
echo "<tr><td>No. Order </td><td>: $row1[no_order] </td></tr>";
echo "<tr><td>Pelanggan </td><td>: $row1[pelanggan]</td></tr>";
echo "<tr><td>Satuan </td><td>: $_GET[satuan]</td></tr>";
echo"</table>";
echo "<hr>";		
echo "<table id=example4 class='table table-bordered table-hover table-striped' border='0' width=100%>";
echo "<tr class='bg-blue'>";
echo "<td width=10%><div align='center'>No. Roll</div></td>";
echo "<td width=10%><div align='center'>Net Weight </div></td>";
echo "<td width=10%><div align='center'>PCS </div></td>";
echo "<td width=10%><div align='center'>Ukuran </div></td>";
echo "<td width=10%><div align='center'>Keterangan</div></td>";
echo "</tr>";
		
		
//--
if(substr($_GET['shift'],0,6)=="INSPEK"){
    $ket=" and detail_pergerakan_stok.ket='INSPEK' ";}else if(substr($_GET['shift'],0,7)=="PACKING"){$ket=" and detail_pergerakan_stok.ket='' ";}else{$ket="";}
$sql=mysqli_query($con,"SELECT * FROM detail_pergerakan_stok
INNER JOIN  tmp_detail_kite on tmp_detail_kite.id = detail_pergerakan_stok.id_detail_kj
WHERE  nokk = '$_GET[id]'  
 $ket  AND (detail_pergerakan_stok.sisa!='TH' and detail_pergerakan_stok.sisa!='FKTH' and detail_pergerakan_stok.sisa!='BS' and detail_pergerakan_stok.sisa!='BB') group by detail_pergerakan_stok.no_roll
ORDER BY detail_pergerakan_stok.no_roll ASC"); 
  
$no=1;
    while($row2=mysqli_fetch_array($sql)){	
        echo "<tr>";
		echo "<td width=10% valign=top align=center>$row2[no_roll]</td>";
	    echo "<td width=10% valign=top align=center>"; echo number_format($row2['weight'],'2','.',','); echo "</td>";
		echo "<td width=10% valign=top align=center>$row2[netto]</td>";
		echo "<td width=10% valign=top align=center>$row2[ukuran]</td>";
        echo "<td width=10% valign=top align=center>$row2[sisa]</td>";
        echo "</tr>";
        if($row2['sisa']=="SISA" ||$row2['sisa']=="EXTRA"){$netto=0; $ukuran=0;}else{$netto=$row2['weight']; $ukuran=$row2['netto'];}
        $totbruto=$totbruto+ $netto;
        $totyard=$totyard+ $ukuran;
        //$totrol=$totrol+$row['roll'];
		}
        echo "<tr>";
        echo "<td valign=top align=center>TOTAL</td>";
        echo "<td valign=top align=center>"; echo number_format($totbruto,'2','.',','); echo"</td>";
        echo "<td valign=top align=center>$totyard</td>";
        echo "<td valign=top>&nbsp;</td>";
        echo "<td valign=top>&nbsp;</td>";
        echo "</tr>";
     echo "</table>";
?>	  
		  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
          <?php //} ?>
<script>
	//Initialize Select2 Elements
    $('.select2').select2()
	$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
		//Date picker
        $('#datepicker').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd',
          todayHighlight: true,
        });
	    //Date picker
        $('#datepicker1').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd',
          todayHighlight: true,
        });
		//Date picker
        $('#datepicker2').datepicker({
          autoclose: true,
          format: 'yyyy-mm-dd',
          todayHighlight: true,
        });
		//Timepicker
    	$('#timepicker').timepicker({
      	showInputs: false,
    	});
	    $('#example4').DataTable({
	    'paging': false,
	    });
	$(function () {	
//Timepicker
    $('.timepicker').timepicker({
                minuteStep: 1,
                showInputs: true,
                showMeridian: false,
                defaultTime: false	
	  	
    })
})
		
</script>
