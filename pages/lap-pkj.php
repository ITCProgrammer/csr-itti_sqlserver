<?PHP
ini_set("error_reporting", 1);
session_start();
include"koneksi.php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Persediaan Kain Jadi</title>
</head>
<body>
<?php
$Awal	= isset($_POST['awal']) ? $_POST['awal'] : '';
$Akhir	= isset($_POST['akhir']) ? $_POST['akhir'] : '';
$Buyer	= isset($_POST['buyer']) ? $_POST['buyer'] : '';
$Order	= isset($_POST['no_order']) ? $_POST['no_order'] : '';
$PO	= isset($_POST['no_po']) ? $_POST['no_po'] : '';
$Item	= isset($_POST['no_item']) ? $_POST['no_item'] : '';
$Warna	= isset($_POST['no_warna']) ? $_POST['no_warna'] : '';
$Lokasi	= isset($_POST['lokasi']) ? $_POST['lokasi'] : '';
$BS	    = isset($_POST['bs']) ? $_POST['bs'] : '';
$Ket	= isset($_POST['ket']) ? $_POST['ket'] : '';
$Lebar	= isset($_POST['lbr']) ? $_POST['lbr'] : '';
$Gramasi= isset($_POST['grms']) ? $_POST['grms'] : '';
?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"> Filter Laporan Persediaan Kain Jadi</h3>
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
                <input name="awal" type="date" class="form-control pull-right" placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off"/>
            </div>
            </div>
        <!-- /.input group -->
        </div>
        <div class="form-group">
            <div class="col-sm-2">
            <div class="input-group date">
                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                <input name="akhir" type="date" class="form-control pull-right" placeholder="Tanggal Akhir" value="<?php echo $Akhir;  ?>" autocomplete="off"/>
            </div>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <input name="buyer" type="text" class="form-control pull-right" id="buyer" placeholder="Buyer" value="<?php echo $Buyer;  ?>" autocomplete="off"/>
            </div>
            <div class="col-sm-2">
                <input name="no_order" type="text" class="form-control pull-right" id="no_order" placeholder="No Order" value="<?php echo $Order;  ?>" autocomplete="off"/>
            </div>
            <div class="col-sm-2">
                <input name="no_po" type="text" class="form-control pull-right" id="no_po" placeholder="No PO" value="<?php echo $PO;  ?>" autocomplete="off"/>
            </div>
            <div class="col-sm-2">
                <input name="no_item" type="text" class="form-control pull-right" id="no_item" placeholder="No Item" value="<?php echo $Item;  ?>" autocomplete="off"/>
            </div>
            <div class="col-sm-2">
                <input name="no_warna" type="text" class="form-control pull-right" id="no_warna" placeholder="No Warna" value="<?php echo $Warna;  ?>" autocomplete="off"/>
            </div>
            <!-- /.input group -->
        </div>
        <div class="form-group">
            <div class="col-sm-1">
                <input name="lbr" type="text" class="form-control pull-right" id="lbr" placeholder="Lebar" value="<?php echo $Lebar;  ?>" autocomplete="off"/>
            </div>
            <div class="col-sm-1">
                <input name="grms" type="text" class="form-control pull-right" id="grms" placeholder="Gramasi" value="<?php echo $Gramasi;  ?>" autocomplete="off"/>
            </div>
            <!-- /.input group -->
        </div>
        <?php
	        $lokasi=mysqli_query($con,"SELECT lokasi FROM tbl_lokasi ORDER BY lokasi ASC ");
	    ?>
        <div class="form-group">
            <div class="col-sm-2">
                <select class="form-control select2" name="lokasi" id="lokasi">
                    <option value="">Pilih</option>
                    <?php while($rlks=mysqli_fetch_array($lokasi)){ ?>
                    <option value="<?php echo $rlks['lokasi'];?>"><?php echo $rlks['lokasi'];?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-2">
                <select class="form-control select2" name="ket" id="ket">
                    <option value="">Pilih</option>
                    <option value="SISA" <?php if($Ket=="SISA"){echo "SELECTED";}?>>SISA</option>
                </select>
            </div>	
        </div>
        <div class="form-group">
		  <label for="bs" class="col-sm-0 control-label"></label>		  
            <div class="col-sm-2">
                <input type="checkbox" name="bs" id="bs" value="1" <?php  if($BS=="1"){ echo "checked";} ?>>  
                <label> BS</label>
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
                    <h3 class="box-title">Data Laporan Persediaan Kain Jadi <?php if ($_POST['bs'] == 1) {echo "BS";} ?></h3><br>
                    <?php if($_POST['awal']!="") { ?><b>'Periode' Kirim: <?php echo $_POST['awal']." to ".$_POST['akhir']; ?></b>
                     <?php } ?>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped" id="example8" style="width:100%">
                    <thead class="bg-blue">
                        <tr>
                            <th rowspan="3"><div align="center">No</div></th>
                            <th rowspan="3"><div align="center">Tgl</div></th>
                            <th rowspan="3"><div align="center">No Item</div></th>
                            <th rowspan="3"><div align="center">Langganan</div></th>
                            <th rowspan="3"><div align="center">PO</div></th>
                            <th rowspan="3"><div align="center">Order</div></th>
                            <th rowspan="3"><div align="center">Jenis Kain</div></th>
                            <th rowspan="3"><div align="center">No Warna</div></th>
                            <th rowspan="3"><div align="center">Warna</div></th>
                            <th rowspan="3"><div align="center">No Card</div></th>
                            <th rowspan="3"><div align="center">Lot</div></th>
                            <th rowspan="3"><div align="center">Roll</div></th>
                            <th colspan="7"><div align="center">Netto (Kg)</div></th>
                            <th rowspan="3"><div align="center">Yard/Meter</div></th>
                            <th rowspan="3"><div align="center">Unit</div></th>
                            <th rowspan="3"><div align="center">Lokasi</div></th>
                            <th rowspan="3"><div align="center">FOC</div></th>
                            <th rowspan="3"><div align="center">LBR</div></th>
                            <th rowspan="3"><div align="center">X</div></th>
                            <th rowspan="3"><div align="center">GRMS</div></th>
                            <th rowspan="3"><div align="center">OL</div></th>
                            <th rowspan="3"><div align="center">Status</div></th>
                            <th rowspan="3"><div align="center">Keterangan</div></th>
                            <th rowspan="3"><div align="center">Status Warna</div></th>
                        </tr>
                        <tr>
                            <th colspan="2"><div align="center">Grade A</div></th>
                            <th colspan="2"><div align="center">Grade B</div></th>
                            <th colspan="2"><div align="center">Grade C</div></th>
                            <th rowspan="2"><div align="center">Keterangan</div></th>
                        </tr>
                        <tr>
                            <th><div align="center">Roll</div></th>
                            <th><div align="center">KG</div></th>
                            <th><div align="center">Roll</div></th>
                            <th><div align="center">KG</div></th>
                            <th><div align="center">Roll</div></th>
                            <th><div align="center">KG</div></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $tgl_cetak1=$_POST['awal'];$tgl_cetak2=$_POST['akhir']; ?>
                    <?php
                        if($_POST['lokasi']!=''){ 
                            $where3 .= " AND b.lokasi='$_POST[lokasi]' ";
                        }else{
                            $where3 .= " "; 
                        }
                        if($_POST['ket']=='SISA'){ 
                            $where4 .= " AND (b.sisa='SISA' OR b.sisa='FKSI') ";
                        }elseif($_POST['ket']==''){
                            $where4 .= " AND (b.sisa='' OR b.sisa='KITE') ";
                        }else{
                            $where4 .= " "; 
                        }
                        if($_POST['no_order']!=''){
                            $order=trim($_POST['no_order']);
                            $where .= " AND trim(c.no_order)='$order' ";
                        }else{ 
                            $where .= " ";
                        }
                        if($_POST['no_po']!=''){
                            $no_po=trim($_POST['no_po']);
                            $where10 .= " AND trim(c.no_po)='$no_po' ";
                        }else{ 
                            $where10 .= " ";
                        }
                        if($_POST['no_item']!=''){
                            $item=trim($_POST['no_item']);
                            $where5 .= " AND trim(c.no_item)='$item' ";
                        }else{ 
                            $where5 .= " "; 
                        }
                        if($_POST['no_warna']!=''){
                            $warna=trim($_POST['no_warna']);
                            $where6 .= " AND trim(c.no_warna)='$warna' ";
                        }else{ 
                            $where6 .= " "; 
                        }
                        if($_POST['buyer']!=''){
                            $buyer=trim($_POST['buyer']);
                            $where8 .= " AND trim(c.pelanggan) LIKE '%$buyer' ";
                        }else{ 
                            $where8 .= " ";
                        }
                        if($_POST['bs']!=''){
                            $bs1=trim($_POST['bs']);
                            $where9 .= " AND ( a.fromtoid = 'QC BS') ";
                        }else{ 
                            $where9 .= " AND (a.fromtoid = 'GUDANG KAIN JADI' OR a.fromtoid = 'PACKING' OR a.fromtoid='LAIN' OR a.fromtoid='INSPEK MEJA' OR a.fromtoid ='GANTI STIKER' OR a.fromtoid ='REVISI STIKER' OR a.fromtoid = 'POTONG SISA') "; 
                        }
                        if($_POST['lbr']!='' and $_POST['grms']!=''){
                            $lebar=trim($_POST['lbr']);
                            $berat=trim($_POST['grms']);
                            $where7 .= " AND trim(c.lebar)='$lebar' AND trim(c.berat)='$berat' ";
                        }else{ 
                            $where7 .= " ";
                        }
                        if($_POST['awal']!='' and $_POST['akhir']!=''){ 
                            $where1 .= " AND DATE_FORMAT(a.tgl_update,'%Y-%m-%d') BETWEEN '$_POST[awal]' AND '$_POST[akhir]' ";
                        }else{ 
                            $where1 .= " "; 
                        }
                        if($_POST['awal']!='' or $_POST['buyer']!="" or $_POST['no_order']!="" or $_POST['no_item']!="" or $_POST['no_warna']!="" or $_POST['lokasi']!="" or $_POST['bs']!="" or $_POST['ket']!="" or $_POST['lbr']!="" or $_POST['grms']!=""){ 
                            $where2 .= " (a.typestatus = '1' OR a.typestatus = '2') AND not ISNULL(b.transtatus) AND b.transtatus='1' ";
                        }else{ 
                            $where2 .= " "; 
                        }
                        ?>
                        
                    <?php
                        if($_POST['awal']!='' or $_POST['buyer']!="" or $_POST['no_order']!="" or $_POST['no_item']!="" or $_POST['no_warna']!="" or $_POST['lokasi']!="" or $_POST['bs']!="" or $_POST['ket']!="" or $_POST['lbr']!="" or $_POST['grms']!=""){
                            $sql=mysqli_query($con,"SELECT
                            a.tgl_update,c.no_po,c.no_order,a.blok, 
                            b.sisa,b.nokk,c.jenis_kain,c.pelanggan,c.no_lot,c.no_warna,
                            c.warna,c.lebar,c.berat,c.no_item, b.id as id_detail,b.id_stok,a.catat,a.id,a.sts_stok,b.ket_stok,
                            GROUP_CONCAT(DISTINCT lokasi) as lokasi
                            FROM
                            pergerakan_stok a
                            LEFT JOIN detail_pergerakan_stok b ON a.id = b.id_stok
                            LEFT JOIN tmp_detail_kite d ON d.id=b.id_detail_kj
                            LEFT JOIN tbl_kite c ON c.id = d.id_kite
                            WHERE
                            " . $where2 . $where1 . $where9 . $where8 . $where7 . $where6 . $where5 . $where4 . $where3 . $where . $where10 . " 
                            GROUP BY
                            b.nokk,b.sisa,b.id_stok,b.ket_stok
                            ORDER BY
                            a.tgl_update,a.id");
                        }else{
                            $sql=mysqli_query($con,"SELECT
                            a.tgl_update,c.no_po,c.no_order,a.blok, 
                            b.sisa,b.nokk,c.jenis_kain,c.pelanggan,c.no_lot,c.no_warna,
                            c.warna,c.lebar,c.berat,c.no_item, b.id as id_detail,b.id_stok,a.catat,a.id,a.sts_stok,b.ket_stok,
                            GROUP_CONCAT(DISTINCT lokasi) as lokasi
                            FROM
                            pergerakan_stok a
                            LEFT JOIN detail_pergerakan_stok b ON a.id = b.id_stok
                            LEFT JOIN tmp_detail_kite d ON d.id=b.id_detail_kj
                            LEFT JOIN tbl_kite c ON c.id = d.id_kite
                            WHERE DATE_FORMAT(a.tgl_update,'%Y-%m-%d') BETWEEN '$_POST[awal]' AND '$_POST[akhir]'
                            " . $where2 . $where9 . $where8 . $where7 . $where6 . $where5 . $where4 . $where3 . $where . $where10 . " 
                            GROUP BY
                            b.nokk,b.sisa,b.id_stok,b.ket_stok
                            ORDER BY
                            a.tgl_update,a.id");
                        }
                        $c=1;
                        $i=1;
                        $no=1;
                        $n=1;
                        $cBooking="";
                        $p0="";		   
                        while($row=mysqli_fetch_array($sql)){
                            $bgcolor = ($c++ & 1) ? '#33CCFF' : '#FFCC99';
                            $mysqli =mysqli_query($con,"SELECT tempat,catatan FROM mutasi_kain WHERE nokk='$row[nokk]' AND keterangan='$row[sisa]' AND not tempat='' order by id desc LIMIT 1");
                            $myBlk = mysqli_fetch_array($mysqli);
                            $mysqliC =mysqli_query($con,"SELECT tempat,catatan FROM mutasi_kain WHERE nokk='$row[nokk]' AND keterangan='$row[sisa]' order by id desc LIMIT 1");
                            $myBlkC = mysqli_fetch_array($mysqliC);
                            $mysqliC1 =mysqli_query($con,"SELECT GROUP_CONCAT(
                            CONCAT(
                                'Untuk Order ',
                                no_order,
                                ' Qty ',
                                qty_minta,
                                ' ',
                                satuan,' Sisa '
                            )
                        ) AS catatan,a.sisa
                        FROM
                        tbl_catat_kain a
                        INNER JOIN tbl_catat_detail b ON a.id = b.id_catat
                        WHERE
                        a.id_kain = '$row[id_stok]'
                        AND a.nokk = '$row[nokk]'
                        AND a.ket = '$row[sisa]'
                        AND b.tmp_hapus='0' ");
                            $myBlkC1 = mysqli_fetch_array($mysqliC1);
                            $catat="";
                            if($myBlkC1['catatan']!=""){
                            $catat=$myBlkC1['catatan'].$myBlkC1['sisa'];}
                            else{
                                $scek=mysqli_query($con,"SELECT COUNT(*)
                        FROM
                        tbl_catat_kain a
                        INNER JOIN tbl_catat_detail b ON a.id = b.id_catat
                        WHERE
                        a.id_kain = '$row[id_stok]'
                        AND a.nokk = '$row[nokk]'
                        AND a.ket = '$row[sisa]'");
                                $ck=mysqli_num_rows($scek);
                                if($ck>0){}else{
                                $catat=$myBlkC['catatan'];}}
                        if($row['ket_stok']!="" OR $row['ket_stok']!=NULL){$stks=" and b.ket_stok='$row[ket_stok]' ";}else{ $stks="";}
                            $mysqliCek=mysqli_query($con,"SELECT
                        SUM(case when b.grade='A' or b.grade='B' or b.grade='C' or b.grade='' then b.weight else 0 end) as tot_qty,
                        SUM(if(b.grade='A' or b.grade='B' or b.grade='C' or b.grade='', 1, 0)) as tot_rol,
                        SUM(if(b.grade='A' or b.grade='', 1, 0)) as rol_a,
                        SUM(if(b.grade='B', 1, 0)) as rol_b,
                        SUM(if(b.grade='C', 1, 0)) as rol_c,
                        SUM(case when b.grade='A' or b.grade='B' or b.grade='C' or b.grade='' then b.yard_ else 0 end) as tot_yard,
                        SUM(case when b.grade='A' or b.grade='B' or b.grade='' then b.weight else 0 end) as grd_ab,
                        SUM(case when b.grade='A' or b.grade='' then b.weight else 0 end) as grd_a,
                        SUM(case when b.grade='B' then b.weight else 0 end) as grd_b,
                        SUM(case when b.grade='C' then b.weight else 0 end) as grd_c,
                        SUM(if(b.grade='A' or b.grade='B' or b.grade='', 1, 0)) as jml_ab,
                        SUM(if(b.grade = 'C', 1, 0)) as jml_grd_c,b.sisa,b.satuan,SUM(d.netto) as netto,
                        a.blok,a.tgl_update
                        FROM
                        pergerakan_stok a
                        LEFT JOIN detail_pergerakan_stok b  ON a.id = b.id_stok
                        LEFT JOIN tmp_detail_kite d ON d.id=b.id_detail_kj
                        LEFT JOIN tbl_kite c ON c.id = d.id_kite
                        WHERE
                        b.`transtatus`='1' and b.nokk='$row[nokk]' and b.sisa='$row[sisa]' and b.id_stok='$row[id_stok]' $stks
                        AND (a.fromtoid = 'GUDANG KAIN JADI' OR a.fromtoid = 'PACKING' OR a.fromtoid='LAIN' OR a.fromtoid='INSPEK MEJA' OR a.fromtoid ='GANTI STIKER' OR a.fromtoid ='REVISI STIKER' OR a.fromtoid ='POTONG SISA') AND if(b.grade='A' or b.grade='B' or b.grade='C' or b.grade='', 1, 0)>0
                        GROUP BY
                        b.sisa,b.id_stok,b.ket_stok
                        ORDER BY
                        a.id, b.ket_stok LIMIT 1 ");
                        $myro = mysqli_fetch_array($mysqliCek);
                        /*if($myro['tot_rol']>0){ */
                            $mysqli1 =mysqli_query($con,"SELECT berat,lebar,no_item,pelanggan,no_po,no_order,
                            jenis_kain,warna,no_warna,no_lot FROM tbl_kite WHERE nokk='$row[nokk]' LIMIT 1");
                            $myBlk1 = mysqli_fetch_array($mysqli1);
                            $mysqli2 =mysqli_query($con,"SELECT a.no_po,a.no_order FROM pergerakan_stok a
                        INNER JOIN detail_pergerakan_stok b ON a.id=b.id_stok
                        WHERE b.nokk='$row[nokk]' and ISNULL(b.transtatus)
                        GROUP BY b.nokk LIMIT 1");
                            $myBlk2 = mysqli_fetch_array($mysqli2);
                            if($row['sisa']=="SISA" || $row['sisa']=="FKSI"){
                                $brt_sisa=$myro['grd_a']+$myro['grd_b']+$myro['grd_c'];
                                if($brt_sisa>10 and substr($row['tgl_update'],0,10)>="2019-01-01"){$sts_sisa="Sisa Produksi";}
                                else if($brt_sisa<=10 and substr($row['tgl_update'],0,10)>="2019-01-01"){$sts_sisa="Sisa Toleransi";}
                            }else{$sts_sisa="";}	
                            $brt_sisa1=$myro['grd_a']+$myro['grd_b']+$myro['grd_c'];
                            if($myBlk1['no_po']!=""){$p0=$myBlk1['no_po'];}else{$p0=$myBlk2['no_po'];}
                            $strp0=strtoupper($p0);
                            $strp1=strtoupper($p0);
                            $cBooking=strpos($strp0,"BOOKING");
                            $cMiniBulk=strpos($strp0,"MINI BULK");
                            ?>
                        <tr bgcolor="<?php echo $bgcolor; ?>">
                            <td><?php echo $no;?></td>
                            <td><?php echo date("d-M-Y", strtotime($row['tgl_update']));?></td>
                            <td><b title="<?php echo $myBlk1['no_item'];?>"><?php echo substr($myBlk1['no_item'],0,8)."...";?></b></td>
                            <td><b title="<?php echo $myBlk1['pelanggan'];?>"><?php echo substr($myBlk1['pelanggan'],0,7)."...";?></b></td>
                            <td><b title="<?php if($myBlk1['no_po']!=""){echo $myBlk1['no_po'];}else{echo $myBlk2['no_po'];}?>"><?php if($myBlk1['no_po']!=""){echo substr($myBlk1['no_po'],0,7)."...";}else{echo substr($myBlk2['no_po'],0,7)."...";}?></b></td>
                            <td><?php if($myBlk1['no_order']!=""){echo $myBlk1['no_order'];}else{echo $myBlk2['no_order'];}?></td>
                            <td><b title="<?php echo htmlentities($myBlk1['jenis_kain'],ENT_QUOTES);?>"><?php echo htmlentities(substr($myBlk1['jenis_kain'],0,7)."...",ENT_QUOTES);?></b></td>
                            <td><b title="<?php echo $myBlk1['no_warna'];?>"><?php echo substr($myBlk1['no_warna'],0,7)."...";?></b></td>
                            <td><b title="<?php echo $myBlk1['warna'];?>"><?php echo substr($myBlk1['warna'],0,7)."...";?></b></td>
                            <td><a href="#" class="detailpersediaankain" id="<?php echo $row['nokk']; ?>" ket="<?php echo $row['sisa']; ?>"><?php echo $row['nokk']; ?></a></td>
                            <td><?php echo trim($myBlk1['no_lot']);?></td>
                            <td align="right"><?php echo $myro['tot_rol'];?></td>
                            <td align="right"><?php echo $myro['rol_a'];?></td>
                            <td align="right"><?php echo number_format($myro['grd_a'],'2','.',',');?></td>
                            <td align="right"><?php echo $myro['rol_b'];?></td>
                            <td align="right"><?php echo number_format($myro['grd_b'],'2','.',',');?></td>
                            <td align="right"><?php echo $myro['rol_c'];?></td>
                            <td align="right"><?php echo number_format($myro['grd_c'],'2','.',',');?></td>
                            <td><?php if($row['sisa']=="SISA" || $row['sisa']=="FKSI"){echo "SISA";}?></td>
                            <td align="right"><?php
                            if($myro['satuan']=="PCS"){echo number_format($myro['netto'])." ".$myro['satuan'];}else{
                            echo number_format($myro['tot_yard'],'2','.',',')." ".$myro['satuan'];} ?></td>
                            <td><?php if($myBlk['tempat']!=""){echo $myBlk['tempat'];}else if($row['blok']!=""){echo $row['blok'];}else{echo "N/A";}?></td>
                            <td><?php if($row['lokasi']!=""){echo $row['lokasi'];}else{echo "N/A";}?></td>
                            <td><?php if($myro['sisa']=="FOC"){echo "FOC";}?></td>
                            <td><?php echo $myBlk1['lebar'];?></td>
                            <td>X</td>
                            <td><?PHP echo $myBlk1['berat']; ?></td>
                            <td><?php if($row['sisa']=="KITE" || $row['sisa']=="FKSI"){echo "Fasilitas KITE";}?></td>
                            <td align="center"><?php if($row['ket_stok']!=""){echo trim($row['ket_stok']);}else if($cBooking>-1 or $cMiniBulk > -1){echo "Booking";}else if(($row['sisa']=="FKSI" or $row['sisa']=="SISA")){echo trim($sts_sisa);}else{echo trim($row['sts_stok']);}?></td>
                            <td align="center"><?php if($catat!=""){echo $catat;}?></td>
                            <td align="center">
                            <?php
                            $sqlGetSttsClr = mysqli_query($con,"SELECT * from tbl_status_warna where `id_pergerakan`='$row[id_stok]' and `id_detail`='$row[id_detail]' and `nokk`='$row[nokk]' LIMIT 1");
                            $dataSttsClr = mysqli_fetch_array($sqlGetSttsClr);
                            if ($dataSttsClr['note'] != '') {
                            echo $dataSttsClr['note'];
                            } else {
                            echo "Empty";
                            }
                            ?></td>
                            <?php  $i++; ?>
                        </tr>

                        <?php
                            if($myro['sisa']=="SISA" || $myro['sisa']=="FKSI" || $myro['sisa']=="FOC"){$brtoo=0;}else{$brtoo=number_format($row['bruto'],'2','.',',');}
                                $totbruto=$totbruto+$brtoo;
                                $totyard=$totyard+$myro['tot_yard'];
                                $totrol=$totrol+$myro['tot_rol'];
                                $totrola=$totrola+$myro['rol_a'];
                                $totrolb=$totrolb+$myro['rol_b'];
                                $totrolc=$totrolc+$myro['rol_c'];
                                $totab=$totab+$myro['grd_ab'];
                                $tota=$tota+$myro['grd_a'];
                                $totb=$totb+$myro['grd_b'];
                                $totc=$totc+$myro['grd_c'];
                                $totpcs=$totpcs +$myro['netto'];
                                $rolab=$rolab + $myro['jml_ab'];
                                $rolac=$rolac + $myro['jml_grd_c'];
                            if($myro['satuan']=='Meter')
                            {$kartot=$kartot + $myro['tot_yard']; $totrolm = $totrolm + $myro['tot_rol'];}
                            if($myro['satuan']=='Yard')
                            {$pltot=$pltot + $myro['tot_yard'];   $totroly = $totroly + $myro['tot_rol'];}
                            if($myro['satuan']=='PCS')
                            {$totrolp = $totrolp + $myro['tot_rol'];}
                            $no++;
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr bgcolor="#99FFFF">
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99"></td>
                            <td bgcolor="#CCFF99"></td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99"></td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                        </tr>
                        <tr bgcolor="#99FFFF">
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99"></td>
                            <td bgcolor="#CCFF99"></td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">PCS</td>
                            <td align="right" bgcolor="#CCFF99"><?php echo number_format($totrolp); ?></td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99"></td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                        </tr>
                        <tr bgcolor="#99FFFF">
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">Meter</td>
                            <td align="right" bgcolor="#CCFF99"><?php echo number_format($totrolm); ?></td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">Meter</td>
                            <td align="right" bgcolor="#CCFF99"><?php echo number_format($kartot,'2','.',','); ?></td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td align="right" bgcolor="#CCFF99">&nbsp;</td>
                            <td align="right" bgcolor="#CCFF99"><?php echo number_format($totpcs); ?></td>
                            <td bgcolor="#CCFF99">PCS</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                        </tr>
                        <tr bgcolor="#99FFFF">
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">Yard</td>
                            <td align="right" bgcolor="#CCFF99"><?php echo  number_format($totroly);?></td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">Yard</td>
                            <td align="right" bgcolor="#CCFF99"><?php echo  number_format($pltot,'2','.',',');?></td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                        </tr>
                        <tr bgcolor="#99FFFF">
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99"><b>Total</b></td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td align="right" bgcolor="#CCFF99"><b><?php echo $totrol;?></b></td>
                            <td align="right" bgcolor="#CCFF99"><b><?php echo $totrola;?></b></td>
                            <td align="right" bgcolor="#CCFF99"><b><?php echo number_format($tota,'2','.',',');?></b></td>
                            <td align="right" bgcolor="#CCFF99"><b><?php echo $totrolb;?></b></td>
                            <td align="right" bgcolor="#CCFF99"><b><?php echo number_format($totb,'2','.',',');?></b></td>
                            <td align="right" bgcolor="#CCFF99"><b><?php echo $totrolc;?></b></td>
                            <td align="right" bgcolor="#CCFF99"><b><?php echo number_format($totc,'2','.',',');?></b></td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td align="right" bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                            <td bgcolor="#CCFF99">&nbsp;</td>
                        </tr>
                        <tr bgcolor="#99FFFF">
                            <td colspan="30" bgcolor="#CCFF99"><b>
                            ( Roll : <?php echo  number_format($totrol);  ?> )
                            <font color="Blue">(GRADE A: <?php echo  number_format($tota,'2','.',',');  ?> Kg, Roll: <?php echo  number_format($totrola);  ?>)</font>
                            <font color="Green">(GRADE B: <?php echo  number_format($totb,'2','.',',');  ?> Kg, Roll: <?php echo  number_format($totrolb);  ?>)</font>
                            <font color="Red">(GRADE C: <?php echo  number_format($totc,'2','.',',');  ?> Kg, Roll: <?php echo  number_format($totrolc);  ?>)</font>
                            (TOTAL : <?php echo  number_format($tota+$totb+$totc,'2','.',',');  ?> Kg) </b></td>
                        </tr>
                        <b>
                        ( Roll : <?php echo  number_format($totrol);  ?> )
                        <font color="Blue">(GRADE A: <?php echo  number_format($tota,'2','.',',');  ?> Kg, Roll: <?php echo  number_format($totrola);  ?>)</font>
                        <font color="Green">(GRADE B: <?php echo  number_format($totb,'2','.',',');  ?> Kg, Roll: <?php echo  number_format($totrolb);  ?>)</font>
                        <font color="Red">(GRADE C: <?php echo  number_format($totc,'2','.',',');  ?> Kg, Roll: <?php echo  number_format($totrolc);  ?>)</font>
                        (TOTAL : <?php echo  number_format($tota+$totb+$totc,'2','.',',');  ?> Kg)</b>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="DetailPersediaanKain" class="modal fade modal-3d-slit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
</body>
</html>
