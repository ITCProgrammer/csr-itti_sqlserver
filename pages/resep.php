<?php
ini_set("error_reporting", 1);
include"koneksi.php";
$Cdye=mysqli_connect("10.0.0.10","dit","4dm1n");
$dbdye=mysqli_select_db("db_dying",$Cdye)or die("Gagal Koneksi");
//$host1="10.0.0.4";
//$username1="timdit";
//$password1="4dm1n";
//$db_name1="TM";
 set_time_limit(600);
//	$conn1=mssql_connect($host1,$username1,$password1) or die ("Sorry our web is under maintenance. Please visit us later");
//	$db=mssql_select_db($db_name1) or die ("Under maintenance");
include "../koneksiLAB.php";
//db_connect($db_name);
    $id=$_GET['id'];	
	$qcek=mysqli_query($Cdye,"SELECT * FROM tbl_schedule WHERE id='$id'");
	$rCek=mysqli_fetch_array($qcek);	
?>
          <div class="modal-dialog modal-lg">
            <div class="modal-content">

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Data Resep</h4>
              </div>
              <div class="modal-body">
               <?php
if($rCek['no_resep']!=''){$ket.=" AND ID_NO='$rCek[no_resep]' ";}else{$ket.="";}
$sqlc="select convert(char(10),CreateTime,103) as TglBonResep,convert(char(10),CreateTime,108) as JamBonResep,ID_NO,COLOR_NAME,PROGRAM_NAME,PRODUCT_LOT,VOLUME,PROGRAM_CODE,YARN as NoKK,TOTAL_WT,USER25 from ticket_title where YARN='$rCek[nokk]' ".$ket." order by createtime Desc";
				 //--lot
$qryc=sqlsrv_query($conn,$sqlc);

$countdata=sqlsrv_num_rows($qryc);
$row=sqlsrv_fetch_assoc($qryc);
if ($countdata > 0)
{ 						
echo "<table width=100%>";
echo "<tr><td colspan='2' align=left >Printout : $row[TglBonResep] $row[JamBonResep] </td><td colspan='2' align=right > Type : $row[ID_NO]</td></tr></table>";
echo"<hr>";
echo "<table>";
echo "<tr><td width=150>Color Name </td><td width=250>: $row[COLOR_NAME]</td><td width=150>Program Code </td><td>: $row[PROGRAM_CODE] </td></tr>";
echo "<tr><td>Program Name </td><td>: $row[PROGRAM_NAME]</td><td width=150>Nomor KK</td><td>: $idkk</td></tr>";
echo "<tr><td>Lots </td><td>: $row[PRODUCT_LOT]</td><td>Total Wt (Kg)</td><td>: $row[TOTAL_WT]</td></tr>";
echo "<tr><td>Volume (Litres) </td><td>: $row[VOLUME]</td><td>Carry Over </td><td>: $row[USER25] </td></tr>";
//echo "<tr><td></td><td>: $row[PROGRAM_NAME] </td></tr>";
echo"</table>";
echo "<hr>";	

	$sqlstep="select distinct(STEP_NO),RECIPE_CODE from Ticket_detail where ID_No='$row[ID_NO]' order by Step_NO asc";
	$qrystep=sqlsrv_query($conn,$sqlstep);
	
	while ($rowst=sqlsrv_fetch_assoc($qrystep)){
		
	 echo "Step $rowst[STEP_NO] Recipe Code: $rowst[RECIPE_CODE]<br>";
	 
	 	$sqlisi="select ID_NO,STEP_NO,RECIPE_CODE,PRODUCT_CODE,CONC,CONCUNIT,TARGET_WT,REMARK from Ticket_detail 
where ID_No='$row[ID_NO]' and STEP_NO='$rowst[STEP_NO]' order by Step_NO Desc";
		$qryisi=sqlsrv_query($conn,$sqlisi);
		  	
			echo " <table width='80%' border='0'>";
			while ($rowisi=sqlsrv_fetch_assoc($qryisi)){
			  echo "  <tr>";
			  echo "   <td class='normal333' width=60><div align='left'>$rowisi[PRODUCT_CODE]</div></td>";
			 
			 		$sqlp=sqlsrv_query($conn,"Select ProductName from Product where ProductCode='$rowisi[PRODUCT_CODE]'");
					$qryp=sqlsrv_fetch_assoc($sqlp);
					
			  echo "   <td class='normal333' width=300><div align='left'>$qryp[ProductName] </div></td>";
			  
			  		if ($rowisi['CONCUNIT']==0){
						$unit1="%";
						$unit2="g";
						$berat=$rowisi['TARGET_WT'];
					}else{
						$unit1="g/L";
						$unit2="Kg";
						//---hitung  berat
						$berat=$rowisi['TARGET_WT']/1000;
						$berat="".number_format($berat,3)."";
					}	
			  echo "   <td class='normal333' width=100><div align='right'>$rowisi[CONC] $unit1</div></td>";
			   
			   echo "   <td class='normal333' width=100><div align='right'>$berat $unit2</div></td>";
				  echo "<td class='normal333' width=100><div align='left'>$rowisi[REMARK]</div></td>";
				  
				echo "</tr>";
			}
			echo "</table>";
			
		echo "<hr>";
		
//--
	}//end detail
	//echo "<hr size='2' style='outline-style:double' />";
	//echo "<hr>";
}?>   
                  			    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>                
              </div>
            
            </div>
            <!-- /.modal-content -->
  </div>
          <!-- /.modal-dialog -->
         
