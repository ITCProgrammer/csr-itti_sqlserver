<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=masterdata-".substr($_GET['awal'],0,10).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
$con=mysql_connect("10.0.0.10","dit","4dm1n");
$db=mysql_select_db("db_qc",$con)or die("Gagal Koneksi");
//--
$idkk=$_REQUEST['idkk'];
$act=$_GET['g'];
//-
$qTgl=mysql_query("SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg, DATE_FORMAT(now(),'%Y-%m-%d')+ INTERVAL 1 DAY as tgl_besok");
$rTgl=mysql_fetch_array($qTgl);
$Awal=$_GET[awal];
$Akhir=$_GET[akhir];
?>
<body>
	
<strong>Periode: <?php echo $Awal; ?> s/d <?php echo $Akhir; ?></strong><br>
<table width="100%" border="1">
    <tr>
      <th rowspan="4" bgcolor="#99FF99">NO.</th>
      <th rowspan="4" bgcolor="#99FF99">Nokk</th>
      <th rowspan="4" bgcolor="#99FF99">Tgl</th>
      <th rowspan="4" bgcolor="#99FF99">No Test</th>
      <th rowspan="4" bgcolor="#99FF99">No Hanger/Item</th>
      <th rowspan="4" bgcolor="#99FF99">Langganan/Buyer</th>
      <th rowspan="4" bgcolor="#99FF99">PO</th>
      <th rowspan="4" bgcolor="#99FF99">Order</th>
      <th rowspan="4" bgcolor="#99FF99">Description</th>
      <th rowspan="4" bgcolor="#99FF99">Lot</th>
      <th rowspan="4" bgcolor="#99FF99">Color</th>
      <th rowspan="4" bgcolor="#99FF99">Proses (Fin/PB/AP/DLL)</th>
      <th colspan="4" rowspan="2" bgcolor="#99FF99">Fabric Weight</th>
      <th colspan="12" rowspan="2" bgcolor="#99FF99">Shrinkage</th>
      <th colspan="6" rowspan="2" bgcolor="#99FF99">Heat Shrinkage</th>
      <th rowspan="4" bgcolor="#99FF99">BOW</th>
      <th rowspan="4" bgcolor="#99FF99">SKEW</th>
      <th colspan="10" rowspan="2" bgcolor="#99FF99">PILLING MARTINDLE</th>
      <th colspan="2" rowspan="2" bgcolor="#99FF99">PILLING BOX</th>
      <th colspan="10" rowspan="2" bgcolor="#99FF99">PILLING RANDOM TUMBLER</th>
      <th rowspan="4" bgcolor="#99FF99">Abration</th>
      <th colspan="8" rowspan="2" bgcolor="#99FF99">SNAGGING MACE</th>
      <th colspan="2" rowspan="2" bgcolor="#99FF99">SNAGGING BOX</th>
      <th colspan="3" rowspan="3" bgcolor="#99FF99">Bursting Strength</th>
      <th colspan="6" rowspan="2" bgcolor="#99FF99">Wicking</th>
      <th colspan="6" rowspan="2" bgcolor="#99FF99">Absorbency</th>
      <th colspan="3" rowspan="2" bgcolor="#99FF99">Drying Time</th>
      <th colspan="4" rowspan="2" bgcolor="#99FF99">Water Repellent</th>
      <th colspan="30" bgcolor="#99FF99">Strech Recovery</th>
      <th colspan="4" rowspan="2" bgcolor="#99FF99">Growth</th>
      <th colspan="10" rowspan="2" bgcolor="#99FF99">Appearance</th>
      <th colspan="4" rowspan="2" bgcolor="#99FF99">Thickness</th>
      <th colspan="4" rowspan="2" bgcolor="#99FF99">Fiber Content</th>
      <th rowspan="4" bgcolor="#99FF99">Flammability</th>
      <th colspan="2" rowspan="2" bgcolor="#99FF99">Fabric Count</th>
      <th colspan="10" bgcolor="#99FF99">4.41 Snagpod (Face)</th>
      <th colspan="10" bgcolor="#99FF99">4.41 Snagpod (Back)</th>
      <th rowspan="4" bgcolor="#99FF99">Phenolic Yellowing</th>
      <th rowspan="4" bgcolor="#99FF99">PH</th>
      <th rowspan="4" bgcolor="#99FF99">Note</th>
    </tr>
    <tr>
      <th colspan="2" bgcolor="#99FF99">Strecth 1</th>
      <th colspan="4" bgcolor="#99FF99">Recovery 1</th>
      <th colspan="2" bgcolor="#99FF99">Strecth 2</th>
      <th colspan="4" bgcolor="#99FF99">Recovery 2</th>
      <th colspan="2" bgcolor="#99FF99">Strecth 3</th>
      <th colspan="4" bgcolor="#99FF99">Recovery 3</th>
      <th colspan="2" bgcolor="#99FF99">Strecth 4</th>
      <th colspan="4" bgcolor="#99FF99">Recovery 4</th>
      <th colspan="2" bgcolor="#99FF99">Strecth 5</th>
      <th colspan="4" bgcolor="#99FF99">Recovery 5</th>
      <th colspan="5" bgcolor="#99FF99">Length</th>
      <th colspan="5" bgcolor="#99FF99">Width</th>
      <th colspan="5" bgcolor="#99FF99">Length</th>
      <th colspan="5" bgcolor="#99FF99">Width</th>
    </tr>
    <tr>
      <th rowspan="2" bgcolor="#99FF99">STD Width</th>
      <th rowspan="2" bgcolor="#99FF99">Result Width</th>
      <th rowspan="2" bgcolor="#99FF99">STD Weight</th>
      <th rowspan="2" bgcolor="#99FF99">Result Weight</th>
      <th colspan="3" bgcolor="#99FF99">1.0</th>
      <th colspan="3" bgcolor="#99FF99">2.0</th>
      <th colspan="3" bgcolor="#99FF99">3.0</th>
      <th colspan="3" bgcolor="#99FF99">4.0</th>
      <th colspan="3" bgcolor="#99FF99">5.0 Dry</th>
      <th colspan="3" bgcolor="#99FF99">6.0 Wet</th>
      <th colspan="2" bgcolor="#99FF99">1X</th>
      <th colspan="2" bgcolor="#99FF99">2X</th>
      <th colspan="2" bgcolor="#99FF99">3X</th>
      <th colspan="2" bgcolor="#99FF99">4X</th>
      <th colspan="2" bgcolor="#99FF99">5X</th>
      <th colspan="2" bgcolor="#99FF99">1X</th>
      <th colspan="2" bgcolor="#99FF99">1X</th>
      <th colspan="2" bgcolor="#99FF99">2X</th>
      <th colspan="2" bgcolor="#99FF99">3X</th>
      <th colspan="2" bgcolor="#99FF99">4X</th>
      <th colspan="2" bgcolor="#99FF99">5X</th>
      <th colspan="2" bgcolor="#99FF99">1X</th>
      <th colspan="2" bgcolor="#99FF99">2X</th>
      <th colspan="2" bgcolor="#99FF99">3X</th>
      <th colspan="2" bgcolor="#99FF99">4X</th>
      <th colspan="2" bgcolor="#99FF99">1X</th>
      <th colspan="2" bgcolor="#99FF99">1X</th>
      <th colspan="2" bgcolor="#99FF99">2X</th>
      <th colspan="2" bgcolor="#99FF99">3X</th>
      <th colspan="2" bgcolor="#99FF99">1X</th>
      <th colspan="2" bgcolor="#99FF99">2X</th>
      <th colspan="2" bgcolor="#99FF99">3X</th>
      <th bgcolor="#99FF99">1X</th>
      <th bgcolor="#99FF99">2X</th>
      <th bgcolor="#99FF99">3X</th>
      <th bgcolor="#99FF99">1</th>
      <th bgcolor="#99FF99">2</th>
      <th bgcolor="#99FF99">3</th>
      <th bgcolor="#99FF99">4</th>
      <th colspan="2" bgcolor="#99FF99">&nbsp;</th>
      <th colspan="2" bgcolor="#99FF99">Length</th>
      <th colspan="2" bgcolor="#99FF99">Width</th>
      <th colspan="2" bgcolor="#99FF99">&nbsp;</th>
      <th colspan="2" bgcolor="#99FF99">Length</th>
      <th colspan="2" bgcolor="#99FF99">Width</th>
      <th colspan="2" bgcolor="#99FF99">&nbsp;</th>
      <th colspan="2" bgcolor="#99FF99">Length</th>
      <th colspan="2" bgcolor="#99FF99">Width</th>
      <th colspan="2" bgcolor="#99FF99">&nbsp;</th>
      <th colspan="2" bgcolor="#99FF99">Length</th>
      <th colspan="2" bgcolor="#99FF99">Width</th>
      <th colspan="2" bgcolor="#99FF99">&nbsp;</th>
      <th colspan="2" bgcolor="#99FF99">Length</th>
      <th colspan="2" bgcolor="#99FF99">Width</th>
      <th colspan="2" bgcolor="#99FF99">V</th>
      <th colspan="2" bgcolor="#99FF99">H</th>
      <th colspan="4" bgcolor="#99FF99">1</th>
      <th colspan="3" bgcolor="#99FF99">2</th>
      <th colspan="3" bgcolor="#99FF99">3</th>
      <th bgcolor="#99FF99">1</th>
      <th bgcolor="#99FF99">2</th>
      <th bgcolor="#99FF99">3</th>
      <th rowspan="2" bgcolor="#99FF99">Average</th>
      <th rowspan="2" bgcolor="#99FF99">Cott /Mod /Ray /Nyl</th>
      <th rowspan="2" bgcolor="#99FF99">Polyester</th>
      <th rowspan="2" bgcolor="#99FF99">Spandex</th>
      <th rowspan="2" bgcolor="#99FF99">Total</th>
      <th rowspan="2" bgcolor="#99FF99">CPI</th>
      <th rowspan="2" bgcolor="#99FF99">WPI</th>
      <th bgcolor="#99FF99">Grade</th>
      <th bgcolor="#99FF99">Class</th>
      <th bgcolor="#99FF99">Snag&lt;2mm</th>
      <th bgcolor="#99FF99">Snag 2mm-5mm</th>
      <th bgcolor="#99FF99">Snag&gt;5mm</th>
      <th bgcolor="#99FF99">Grade</th>
      <th bgcolor="#99FF99">Class</th>
      <th bgcolor="#99FF99">Snag&lt;2mm</th>
      <th bgcolor="#99FF99">Snag 2mm-5mm</th>
      <th bgcolor="#99FF99">Snag&gt;5mm</th>
      <th bgcolor="#99FF99">Grade</th>
      <th bgcolor="#99FF99">Class</th>
      <th bgcolor="#99FF99">Snag&lt;2mm</th>
      <th bgcolor="#99FF99">Snag 2mm-5mm</th>
      <th bgcolor="#99FF99">Snag&gt;5mm</th>
      <th bgcolor="#99FF99">Grade</th>
      <th bgcolor="#99FF99">Class</th>
      <th bgcolor="#99FF99">Snag&lt;2mm</th>
      <th bgcolor="#99FF99">Snag 2mm-5mm</th>
      <th bgcolor="#99FF99">Snag&gt;5mm</th>
    </tr>
    <tr>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">SP</th>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">SP</th>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">SP</th>
      <th bgcolor="#99FF99">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">SP</th>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">SP</th>
      <th bgcolor="#99FF99">Face</th>
      <th bgcolor="#99FF99">Back</th>
      <th bgcolor="#99FF99">Face</th>
      <th bgcolor="#99FF99">Back</th>
      <th bgcolor="#99FF99">Face</th>
      <th bgcolor="#99FF99">Back</th>
      <th bgcolor="#99FF99">Face</th>
      <th bgcolor="#99FF99">Back</th>
      <th bgcolor="#99FF99">Face</th>
      <th bgcolor="#99FF99">Back</th>
      <th bgcolor="#99FF99">Face</th>
      <th bgcolor="#99FF99">Back</th>
      <th bgcolor="#99FF99">Face</th>
      <th bgcolor="#99FF99">Back</th>
      <th bgcolor="#99FF99">Face</th>
      <th bgcolor="#99FF99">Back</th>
      <th bgcolor="#99FF99">Face</th>
      <th bgcolor="#99FF99">Back</th>
      <th bgcolor="#99FF99">Face</th>
      <th bgcolor="#99FF99">Back</th>
      <th bgcolor="#99FF99">Face</th>
      <th bgcolor="#99FF99">Back</th>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">Instron</th>
      <th bgcolor="#99FF99">Mullen</th>
      <th bgcolor="#99FF99">Tru Burst</th>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">Face</th>
      <th bgcolor="#99FF99">Back</th>
      <th bgcolor="#99FF99">Face</th>
      <th bgcolor="#99FF99">Back</th>
      <th bgcolor="#99FF99">Face</th>
      <th bgcolor="#99FF99">Back</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">1'</th>
      <th bgcolor="#99FF99">30'</th>
      <th bgcolor="#99FF99">1'</th>
      <th bgcolor="#99FF99">30'</th>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">1'</th>
      <th bgcolor="#99FF99">30'</th>
      <th bgcolor="#99FF99">1'</th>
      <th bgcolor="#99FF99">30'</th>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">1'</th>
      <th bgcolor="#99FF99">30'</th>
      <th bgcolor="#99FF99">1'</th>
      <th bgcolor="#99FF99">30'</th>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">1'</th>
      <th bgcolor="#99FF99">30'</th>
      <th bgcolor="#99FF99">1'</th>
      <th bgcolor="#99FF99">30'</th>
      <th bgcolor="#99FF99">L</th>
      <th bgcolor="#99FF99">W</th>
      <th bgcolor="#99FF99">1'</th>
      <th bgcolor="#99FF99">30'</th>
      <th bgcolor="#99FF99">1'</th>
      <th bgcolor="#99FF99">30'</th>
      <th bgcolor="#99FF99">1'</th>
      <th bgcolor="#99FF99">30'</th>
      <th bgcolor="#99FF99">1'</th>
      <th bgcolor="#99FF99">30'</th>
      <th bgcolor="#99FF99">C.Change</th>
      <th bgcolor="#99FF99">Staining</th>
      <th bgcolor="#99FF99">Pill 1</th>
      <th bgcolor="#99FF99">Pill 2</th>
      <th bgcolor="#99FF99">C.Change</th>
      <th bgcolor="#99FF99">Pill 1</th>
      <th bgcolor="#99FF99">Pill 2</th>
      <th bgcolor="#99FF99">C.Change</th>
      <th bgcolor="#99FF99">Pill 1</th>
      <th bgcolor="#99FF99">Pill 2</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
      <th bgcolor="#99FF99">&nbsp;</th>
    </tr>
	<?php 
	$no=1;
	$query=mysql_query("SELECT * FROM tbl_tq_nokk a 
	INNER JOIN tbl_tq_test b ON a.id=b.id_nokk 
	WHERE a.tgl_masuk BETWEEN '$Awal' AND '$Akhir' ORDER BY a.tgl_masuk ASC, a.no_test ASC ");
	while($r=mysql_fetch_array($query)){
	?>
    <tr>
      <td><?php echo $no;?></td>
      <td>'<?php echo $r[nokk];?></td>
      <td><?php echo $r[tgl_masuk];?></td>
      <td><?php echo $r[no_test];?></td>
      <td><?php echo $r[no_item];?></td>
      <td><?php echo $r[pelanggan];?></td>
      <td><?php echo $r[no_po];?></td>
      <td><?php echo $r[no_order];?></td>
      <td><?php echo $r[jenis_kain];?></td>
      <td>'<?php echo $r[lot];?></td>
      <td><?php echo $r[warna];?></td>
      <td><?php echo $r[proses_fin];?></td>
      <td><?php echo $r[lebar];?></td>
      <td><?php echo $r[f_width];?></td>
      <td><?php echo $r[gramasi];?></td>
      <td><?php echo $r[f_weight];?></td>
      <td><?php echo $r[shrinkage_l1];?></td>
      <td><?php echo $r[shrinkage_w1];?></td>
      <td><?php echo $r[spirality1];?></td>
      <td><?php echo $r[shrinkage_l2];?></td>
      <td><?php echo $r[shrinkage_w2];?></td>
      <td><?php echo $r[spirality2];?></td>
      <td><?php echo $r[shrinkage_l3];?></td>
      <td><?php echo $r[shrinkage_w3];?></td>
      <td><?php echo $r[spirality3];?></td>
      <td><?php echo $r[shrinkage_l4];?></td>
      <td><?php echo $r[shrinkage_w4];?></td>
      <td><?php echo $r[spirality4];?></td>
      <td><?php echo $r[shrinkage_l5];?></td>
      <td><?php echo $r[shrinkage_w5];?></td>
      <td><?php echo $r[spirality5];?></td>
      <td><?php echo $r[shrinkage_l6];?></td>
      <td><?php echo $r[shrinkage_w6];?></td>
      <td><?php echo $r[spirality6];?></td>
      <td><?php echo $r[bow];?></td>
      <td><?php echo $r[skew];?></td>
      <td><?php echo $r[pm_f1];?></td>
      <td><?php echo $r[pm_b1];?></td>
      <td><?php echo $r[pm_f2];?></td>
      <td><?php echo $r[pm_b2];?></td>
      <td><?php echo $r[pm_f3];?></td>
      <td><?php echo $r[pm_b3];?></td>
      <td><?php echo $r[pm_f4];?></td>
      <td><?php echo $r[pm_b4];?></td>
      <td><?php echo $r[pm_f5];?></td>
      <td><?php echo $r[pm_b5];?></td>
      <td><?php echo $r[pb_f1];?></td>
      <td><?php echo $r[pb_b1];?></td>
      <td><?php echo $r[prt_f1];?></td>
      <td><?php echo $r[prt_b1];?></td>
      <td><?php echo $r[prt_f2];?></td>
      <td><?php echo $r[prt_b2];?></td>
      <td><?php echo $r[prt_f3];?></td>
      <td><?php echo $r[prt_b3];?></td>
      <td><?php echo $r[prt_f4];?></td>
      <td><?php echo $r[prt_b4];?></td>
      <td><?php echo $r[prt_f5];?></td>
      <td><?php echo $r[prt_b5];?></td>
      <td><?php echo $r[abration];?></td>
      <td><?php echo $r[sm_l1];?></td>
      <td><?php echo $r[sm_w1];?></td>
      <td><?php echo $r[sm_l2];?></td>
      <td><?php echo $r[sm_w2];?></td>
      <td><?php echo $r[sm_l3];?></td>
      <td><?php echo $r[sm_w3];?></td>
      <td><?php echo $r[sm_l4];?></td>
      <td><?php echo $r[sm_w4];?></td>
      <td><?php echo $r[sb_l1];?></td>
      <td><?php echo $r[sb_w1];?></td>
      <td><?php echo $r[bs_instron];?></td>
      <td><?php echo $r[bs_mullen];?></td>
      <td><?php echo $r[bs_tru];?></td>
      <td><?php echo $r[wick_l1];?></td>
      <td><?php echo $r[wick_w1];?></td>
      <td><?php echo $r[wick_l2];?></td>
      <td><?php echo $r[wick_w2];?></td>
      <td><?php echo $r[wick_l3];?></td>
      <td><?php echo $r[wick_w3];?></td>
      <td><?php echo $r[absor_f1];?></td>
      <td><?php echo $r[absor_b1];?></td>
      <td><?php echo $r[absor_f2];?></td>
      <td><?php echo $r[absor_b2];?></td>
      <td><?php echo $r[absor_f3];?></td>
      <td><?php echo $r[absor_b3];?></td>
      <td><?php echo $r[dry1];?></td>
      <td><?php echo $r[dry2];?></td>
      <td><?php echo $r[dry3];?></td>
      <td><?php echo $r[repp1];?></td>
      <td><?php echo $r[repp2];?></td>
      <td><?php echo $r[repp3];?></td>
      <td><?php echo $r[repp4];?></td>
      <td><?php echo $r[stretch_l1];?></td>
      <td><?php echo $r[stretch_w1];?></td>
      <td><?php echo $r[recover_l1];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r[recover_w1];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r[stretch_l2];?></td>
      <td><?php echo $r[stretch_w2];?></td>
      <td><?php echo $r[recover_l2];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r[recover_w2];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r[stretch_l3];?></td>
      <td><?php echo $r[stretch_w3];?></td>
      <td><?php echo $r[recover_l3];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r[recover_w3];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r[stretch_l4];?></td>
      <td><?php echo $r[stretch_w4];?></td>
      <td><?php echo $r[recover_l4];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r[recover_w4];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r[stretch_l5];?></td>
      <td><?php echo $r[stretch_w5];?></td>
      <td><?php echo $r[recover_l5];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r[recover_w5];?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><?php echo $r[apper_ch1];?></td>
      <td><?php echo $r[apper_st];?></td>
      <td><?php echo $r[apper_pf1];?></td>
      <td><?php echo $r[apper_pb1];?></td>
      <td><?php echo $r[apper_ch2];?></td>
      <td><?php echo $r[apper_pf2];?></td>
      <td><?php echo $r[apper_pb2];?></td>
      <td><?php echo $r[apper_ch3];?></td>
      <td><?php echo $r[apper_pf3];?></td>
      <td><?php echo $r[apper_pb3];?></td>
      <td><?php echo $r[thick1];?></td>
      <td><?php echo $r[thick2];?></td>
      <td><?php echo $r[thick3];?></td>
      <td><?php echo $r[thickav];?></td>
      <td><?php echo $r[fc_cott];?></td>
      <td><?php echo $r[fc_poly];?></td>
      <td><?php echo $r[fc_elastane];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r[flamability];?></td>
      <td><?php echo $r[fc_cpi];?></td>
      <td><?php echo $r[fc_wpi];?></td>
      <td><?php echo $r[sp_grdl1];?></td>
      <td><?php echo $r[sp_clsl1];?></td>
      <td><?php echo $r[sp_shol1];?></td>
      <td><?php echo $r[sp_medl1];?></td>
      <td><?php echo $r[sp_lonl1];?></td>
      <td><?php echo $r[sp_grdw1];?></td>
      <td><?php echo $r[sp_clsw1];?></td>
      <td><?php echo $r[sp_show1];?></td>
      <td><?php echo $r[sp_medw1];?></td>
      <td><?php echo $r[sp_lonw1];?></td>
      <td><?php echo $r[sp_grdl2];?></td>
      <td><?php echo $r[sp_clsl2];?></td>
      <td><?php echo $r[sp_shol2];?></td>
      <td><?php echo $r[sp_medl2];?></td>
      <td><?php echo $r[sp_lonl2];?></td>
      <td><?php echo $r[sp_grdw2];?></td>
      <td><?php echo $r[sp_clsw2];?></td>
      <td><?php echo $r[sp_show2];?></td>
      <td><?php echo $r[sp_medw2];?></td>
      <td><?php echo $r[sp_lonw2];?></td>
      <td><?php echo $r[phenolic_colorchange];?></td>
      <td><?php echo $r[ph];?></td>
      <td>&nbsp;</td>
  </tr>
    <?php $no++;} ?>
</table>
</body>