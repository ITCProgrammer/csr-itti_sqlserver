<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=lap_pencapaian_NCP_".substr($_GET['awal'],0,10)."_".substr($_GET['akhir'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php
//$lReg_username=$_SESSION['labReg_username'];


include "../../koneksi.php";
include "../../tgl_indo.php";
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
$Awal=$_GET['awal'];
$Akhir=$_GET['akhir'];
$Dept=$_GET['dept'];
$qTgl=mysqli_query($con,"SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg,DATE_FORMAT(now(),'%H:%i:%s') as jam_skrg");
$rTgl=mysqli_fetch_array($qTgl);
if($Awal!=""){$tgl=substr($Awal,0,10); $jam=$Awal;}else{$tgl=$rTgl['tgl_skrg']; $jam=$rTgl['jam_skrg'];}
if($Akhir!=""){$tgl1=substr($Akhir,0,10);}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles_cetak.css" rel="stylesheet" type="text/css">
<title>Lap Pencapaian</title>
<style>
.hurufvertical {
 writing-mode:tb-rl;
    -webkit-transform:rotate(-90deg);
    -moz-transform:rotate(-90deg);
    -o-transform: rotate(-90deg);
    -ms-transform:rotate(-90deg);
    transform: rotate(180deg);
    white-space:nowrap;
    float:left;
}	

input{
text-align:center;
border:hidden;
}
@media print {
  ::-webkit-input-placeholder { /* WebKit browsers */
      color: transparent;
  }
  :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
      color: transparent;
  }
  ::-moz-placeholder { /* Mozilla Firefox 19+ */
      color: transparent;
  }
  :-ms-input-placeholder { /* Internet Explorer 10+ */
      color: transparent;
  }
  .pagebreak { page-break-before:always; }
  .header {display:block}
  table thead 
   {
    display: table-header-group;
   }
}	
</style>	
</head>

<body>
<table width="100%">
  <tr>
    <td><table width="100%" border="1" class="table-list1">
        <tr>
          <td colspan="24" align="center" scope="col"><h2>Laporan Pencapaian NCP</h2></td>
        </tr>
        <tr>
          <td colspan=24 scope="col"><font size="-1">Hari/Tanggal : <?php echo tanggal_indo ($tgl, true);?> s/d <?php echo tanggal_indo ($tgl1, true);?></font></td>
        </tr>
				
        <tr>
          <td scope="col"><div align="center">No</div></td>
          <td scope="col"><div align="center">Nokk</div></td>
          <td scope="col"><div align="center">Lama Proses</div></td>
          <td scope="col"><div align="center">Status</div></td>
          <td scope="col"><div align="center">Ket Status</div></td>
          <td scope="col"><div align="center">Langganan</div></td>
          <td scope="col"><div align="center">Buyer</div></td>
          <td scope="col"><div align="center">PO</div></td>
          <td scope="col"><div align="center">No. Order</div></td>
          <td scope="col"><div align="center">Tgl Delivery</div></td>
          <td scope="col"><div align="center">Tgl Buat</div></td>
          <td scope="col"><div align="center">Tgl Terima</div></td>
          <td scope="col"><div align="center">Tgl Target</div></td>
          <td scope="col"><div align="center">Tgl Selesai</div></td>
          <td scope="col"><div align="center">Jenis Kain</div></td>
          <td scope="col"><div align="center">Lebar &amp; Gramasi</div></td>
          <td scope="col"><div align="center">Lot</div></td>
          <td scope="col"><div align="center">Warna</div></td>
          <td scope="col"><div align="center">Roll</div></td>
          <td scope="col"><div align="center">Berat</div></td>
          <td scope="col"><div align="center">Dept</div></td>
          <td scope="col"><div align="center">Masalah</div></td>
          <td scope="col"><div align="center">Tempat Kain</div></td>
          <td scope="col"><div align="center">Ket</div></td>
        </tr>        
	<?php
		$no=1;	
	$pos=0;		
	if($Dept!=""){$where1=" AND dept='$Dept' ";}else{ $where1=" ";}	
	$qry1=mysqli_query($con,"SELECT *,DATEDIFF(tgl_rencana,DATE_FORMAT(now(),'%Y-%m-%d')) as lama, DATEDIFF(DATE_FORMAT(now(),'%Y-%m-%d'),tgl_rencana) as delay,DATEDIFF(tgl_selesai,tgl_rencana) as delay_ok, 
    date_format(tgl_buat,'%Y-%m-%d') as tgl_buat_pos FROM tbl_ncp_qcf WHERE date_format(tgl_rencana,'%Y-%m-%d') between '$Awal' and '$Akhir' ".$where1." ORDER BY date_format(tgl_rencana,'%Y-%m-%d') ASC");
			while($row1=mysqli_fetch_array($qry1)){
		$sql=mysqli_query($con,"SELECT COUNT(*) jml,tgl_terima,id FROM `tbl_qcf_ncp_tolak` WHERE id_qcf_ncp='$row1[id]' ORDER BY id DESC");
		$r1=mysqli_fetch_array($sql);
        
    
    $host="10.0.0.4";
    $username="timdit";
    $password="4dm1n";
    $db_name="TM";
    $connInfo = array( "Database"=>$db_name, "UID"=>$username, "PWD"=>$password);
    $conn     = sqlsrv_connect( $host, $connInfo);
    //Posisi KK
    $sql_pos="select
    x.SONumber,x.TglSO,x.PONumber,x.DocumentNo,x.Quantity,udq.UnitName,x.PCBID,x.PCID,x.NoKK,x.LotNo,x.TglKK,x.Bruto, 
    udw.UnitName as WeightUnitName, x.ChildLevel,x.RootID,
    cust.PartnerNumber as CustomerNumber, cust.CompanyTitle as CustomerTitle, cust.PartnerName as CustomerName,
    buy.PartnerNumber as BuyerNumber, buy.CompanyTitle as BuyerTitle, buy.PartnerName as BuyerName,
    pm.ProductNumber, pm.Description as ProductDesc, pm.ColorNo, pm.Color
from
    (
    select
        so.SONumber, convert(char(10),so.SODate,103) as TglSO, so.CustomerID, so.BuyerID, so.PONumber, so.PODate,jo.DocumentNo,
        sod.ID as SODID, sod.ProductID, sod.Quantity, sod.UnitID, sod.Weight, sod.WeightUnitID, 
        soda.RefNo as DetailRefNo,
        pcb.ID as PCBID, pcb.DocumentNo as NoKK,convert(char(10),pcb.Dated,103) as TglKK, pcb.Gross as Bruto,
        pcb.Quantity as BatchQuantity, pcb.UnitID as BatchUnitID, pcb.ScheduledDate, pcb.ProductionScheduledDate,
        pcblp.DepartmentID,pcb.LotNo,pcb.PCID,pcb.ChildLevel,pcb.RootID				
    from
        SalesOrders so inner join
        JobOrders jo on jo.SOID=so.ID inner join
        SODetails sod on so.ID = sod.SOID inner join
        SODetailsAdditional soda on sod.ID = soda.SODID left join
        ProcessControlJO pcjo on sod.ID = pcjo.SODID left join
        ProcessControlBatches pcb on pcjo.PCID = pcb.PCID left join
        ProcessControlBatchesLastPosition pcblp on pcb.ID = pcblp.PCBID left join
        ProcessFlowProcessNo pfpn on pfpn.EntryType = 2 and pcb.ID = pfpn.ParentID and pfpn.MachineType = 24 left join
        ProcessFlowDetailsNote pfdn on pfpn.EntryType = pfdn.EntryType and pfpn.ID = pfdn.ParentID
    where pcb.documentno='$row1[nokk]'
        group by
            so.SONumber, so.SODate, so.CustomerID, so.BuyerID, so.PONumber, so.PODate,jo.DocumentNo,
            sod.ID, sod.ProductID, sod.Quantity, sod.UnitID, sod.Weight, sod.WeightUnitID,
            soda.RefNo,pcb.DocumentNo,pcb.Dated,
            pcb.ID, pcb.DocumentNo, pcb.Gross,
            pcb.Quantity, pcb.UnitID, pcb.ScheduledDate, pcb.ProductionScheduledDate,
            pcblp.DepartmentID,pcb.LotNo,pcb.PCID,pcb.ChildLevel,pcb.RootID
        ) x inner join
        ProductMaster pm on x.ProductID = pm.ID left join
        Departments dep on x.DepartmentID  = dep.ID left join
        Departments pdep on dep.RootID = pdep.ID left join				
        Partners cust on x.CustomerID = cust.ID left join
        Partners buy on x.BuyerID = buy.ID left join
        UnitDescription udq on x.UnitID = udq.ID left join
        UnitDescription udw on x.WeightUnitID = udw.ID left join
        UnitDescription udb on x.BatchUnitID = udb.ID
    order by
        x.SODID desc, x.PCBID";
         //--lot
    $qry_pos=sqlsrv_query($conn,$sql_pos);
    $row_pos=sqlsrv_fetch_array($qry_pos);

    $sql2="select p.Dated as Tgl,convert(char(10),p.Dated,108) as Jam,p.PCBID,p.Status,d.DepartmentName as DepIn,d2.DepartmentName as DepOut from PCCardPosition p left join 
Departments d on d.ID=p.DepartmentID left join
Departments d2 on d2.ID=p.CounterDepartmentID
where p.PCBID='$row_pos[PCBID]' AND p.Dated BETWEEN '$row1[tgl_buat]' AND '$row1[tgl_rencana]' AND status='1'
order by p.ID";
$sql2b = sqlsrv_query($conn,$sql2) or die('A error occured : ');
		 ?>
	<tr>
          <td scope="col"><?php echo $no;?></td>
          <td scope="col"><font size="-1"><?php echo $row1['nokk'];?></font></td>
          <td scope="col"><font size="-1"><?php if($row1['status']=="OK" or $row1['status']=="Cancel"){if($row1['status']=="OK" and $row1['delay_ok']>0){echo "Delay ".$row1['delay_ok']." Hari";}elseif($row1['status']=="Cancel"){}else{echo "OnTime";} }else{ if($row1['delay']>0){echo "Delay ".$row1['delay']." Hari";}else if($row1['delay']<=0 and $row1['delay']!=""){echo $row1['lama']."Hari Lagi";}else {echo "NCP belum-diterima";}}?></font></td>
          <td scope="col"><font size="-1"><?php echo $row1['status'];?></font></td>
          <td scope="col"><font size="-1"><?php if($row1['tgl_rencana']!="" and $row1['penyelesaian']=="" and $row1['status']=="Belum OK"){ echo"Sudah diterima ".$row1['dept'];}else if($row1['tgl_rencana']!="" and $row1['penyelesaian']!="" and $row1['status']=="Belum OK"){ echo "Tunggu OK dari QCF";}else{echo "Sudah OK dari QCF";}?></font></td>
          <td scope="col"><font size="-1"><?php echo $row1['langganan'];?></font></td>
          <td scope="col"><font size="-1"><?php echo $row1['buyer'];?></font></td>
          <td scope="col"><font size="-1"><?php echo $row1['po'];?></font></td>
          <td scope="col"><font size="-1"><?php echo $row1['no_order'];?></font>
            <span class="label label-danger"><?php echo $row1['no_ncp'];?></span>
            <?php if($r1['tgl_terima']=="" and $r1['jml']>0){ ?>
            <a href="#" class="btn terima_ncp_lama" id="<?php echo $r1[id]; ?>"><span class="label label-success">NCP Lama</span></a>
          <?php } ?></td>
          <td scope="col"><font size="-2"><?php echo $row1['tgl_delivery'];?></font></td>
          <td scope="col"><font size="-2"><?php echo $row1['tgl_buat'];?></font></td>
          <td scope="col"><font size="-2"><?php echo $row1['tgl_terima'];?></font></td>
          <td scope="col"><font size="-2"><?php echo $row1['tgl_rencana'];?></font></td>
          <td scope="col"><font size="-2"><?php echo $row1['tgl_selesai'];?></font></td>
          <td scope="col"><font size="-2"><?php echo $row1['jenis_kain'];?></font></td>
          <td scope="col"><font size="-2"><?php echo $row1['lebar']."x".$row1['gramasi'];?></font></td>
          <td scope="col"><font size="-2"><?php echo $row1['lot'];?></font></td>
          <td scope="col"><font size="-2"><?php echo $row1['warna'];?></font></td>
          <td scope="col"><font size="-1"><?php echo $row1['rol'];?></font></td>
          <td scope="col"><font size="-1"><?php echo $row1['berat'];?></font></td>
          <td scope="col"><font size="-2"><?php echo $row1['dept'];?></font></td>
          <td scope="col"><font size="-1"><?php echo $row1['masalah'];?></font></td>
          <td scope="col"><font size="-1"><?php echo $row1['tempat'];?></font></td>
          <td scope="col"><font size="-1"><?php
          while ($row2=sqlsrv_fetch_array($sql2b)){
            if($row2['Tgl']!=''){$dated = $row2['Tgl']->format('Y-m-d H:i:s');}
          echo date('d/m', strtotime($dated))." ".$row2['DepIn'].", ";
          }
          ?></font></td>
        </tr>
		<?php	
				$no++;  } ?>
		
		  
  
		  	  
</table></td>
  </tr>
  
</table>
</body>
</html>