<?php
date_default_timezone_set('Asia/Jakarta');
$today=date("Y-m-d");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Summary-Random-".$today.".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
<?php 
include "../../koneksi.php";
//--
?>
<body>
	
<strong>Periode: <?php echo $Awal; ?> s/d <?php echo $Akhir; ?></strong><br>
<table width="100%" border="1">
    <tr>
      <th rowspan="4" bgcolor="#99FF99">No.</th>
      <th rowspan="4" bgcolor="#99FF99">No Hanger</th>
      <th rowspan="4" bgcolor="#99FF99">No Item</th>
      <th rowspan="4" bgcolor="#99FF99">Description</th>
      <th colspan="2" rowspan="2" bgcolor="#99FF99">Fabric Width &amp; Weight</th>
      <th colspan="12" rowspan="2" bgcolor="#99FF99">Shrinkage</th>
      <th colspan="6" rowspan="2" bgcolor="#99FF99">Heat Shrinkage</th>
      <th colspan="2" rowspan="3" bgcolor="#99FF99">Fibre/Fuzz</th>
      <th rowspan="4" bgcolor="#99FF99">BOW</th>
      <th rowspan="4" bgcolor="#99FF99">SKEW</th>
      <th colspan="10" rowspan="2" bgcolor="#99FF99">PILLING MARTINDLE</th>
      <th colspan="2" rowspan="2" bgcolor="#99FF99">PILLING BOX</th>
      <th colspan="10" rowspan="2" bgcolor="#99FF99">PILLING RANDOM TUMBLER</th>
      <th colspan="10" rowspan="2" bgcolor="#99FF99">PILLING LOCUS</th>
      <th rowspan="4" bgcolor="#99FF99">Abration</th>
      <th colspan="8" rowspan="2" bgcolor="#99FF99">SNAGGING MACE</th>
      <th colspan="2" rowspan="2" bgcolor="#99FF99">BEAN BAG</th>
      <th colspan="3" rowspan="3" bgcolor="#99FF99">Bursting Strength</th>
      <th colspan="6" rowspan="2" bgcolor="#99FF99">Wicking</th>
      <th colspan="6" rowspan="2" bgcolor="#99FF99">Absorbency</th>
      <th colspan="6" rowspan="2" bgcolor="#99FF99">Drying Time</th>
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
      <th colspan="9" rowspan="2" bgcolor="#99FF99">Washing Fastness</th>
      <th colspan="7" rowspan="2" bgcolor="#99FF99">Perspiration Fastness Acid</th>
      <th colspan="7" rowspan="2" bgcolor="#99FF99">Perspiration Fastness Alkaline</th>
      <th colspan="7" rowspan="2" bgcolor="#99FF99">Water Fastness</th>
      <th colspan="4" rowspan="2" bgcolor="#99FF99">Crocking Fastness</th>
      <th rowspan="4" bgcolor="#99FF99">Phenolic Yellowing</th>
      <th rowspan="4" bgcolor="#99FF99">PH</th>
      <th rowspan="4" bgcolor="#99FF99">Soil Release</th>
      <th colspan="2" rowspan="2" bgcolor="#99FF99">Light Fastness</th>
      <th rowspan="4" bgcolor="#99FF99">C.Migration-Oven Test</th>
      <th colspan="3" rowspan="2" bgcolor="#99FF99">C.Migration Fastness</th>
      <th rowspan="4" bgcolor="#99FF99">Light Perspiration</th>
      <th rowspan="4" bgcolor="#99FF99">Saliva Fastness</th>
      <th rowspan="4" bgcolor="#99FF99">Bleeding</th>
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
      <th rowspan="2" bgcolor="#99FF99">Result Width</th>
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
      <th bgcolor="#99FF99">Original 1X</th>
      <th bgcolor="#99FF99">Original 2X</th>
      <th bgcolor="#99FF99">Original 3X</th>
      <th bgcolor="#99FF99">Afterwash 1X</th>
      <th bgcolor="#99FF99">Afterwash 2X</th>
      <th bgcolor="#99FF99">Afterwash 3X</th>
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
      <th rowspan="2" bgcolor="#99FF99">Suhu</th>
      <th rowspan="2" bgcolor="#99FF99">C.Change</th>
      <th rowspan="2" bgcolor="#99FF99">Acetate</th>
      <th rowspan="2" bgcolor="#99FF99">Cotton</th>
      <th rowspan="2" bgcolor="#99FF99">Nylon</th>
      <th rowspan="2" bgcolor="#99FF99">Polyester</th>
      <th rowspan="2" bgcolor="#99FF99">Acrylic</th>
      <th rowspan="2" bgcolor="#99FF99">Wool</th>
      <th rowspan="2" bgcolor="#99FF99">C.Staining</th>
      <th rowspan="2" bgcolor="#99FF99">C.Change</th>
      <th rowspan="2" bgcolor="#99FF99">Acetate</th>
      <th rowspan="2" bgcolor="#99FF99">Cotton</th>
      <th rowspan="2" bgcolor="#99FF99">Nylon</th>
      <th rowspan="2" bgcolor="#99FF99">Polyester</th>
      <th rowspan="2" bgcolor="#99FF99">Acrylic</th>
      <th rowspan="2" bgcolor="#99FF99">Wool</th>
      <th rowspan="2" bgcolor="#99FF99">C.Change</th>
      <th rowspan="2" bgcolor="#99FF99">Acetate</th>
      <th rowspan="2" bgcolor="#99FF99">Cotton</th>
      <th rowspan="2" bgcolor="#99FF99">Nylon</th>
      <th rowspan="2" bgcolor="#99FF99">Polyester</th>
      <th rowspan="2" bgcolor="#99FF99">Acrylic</th>
      <th rowspan="2" bgcolor="#99FF99">Wool</th>
      <th rowspan="2" bgcolor="#99FF99">C.Change</th>
      <th rowspan="2" bgcolor="#99FF99">Acetate</th>
      <th rowspan="2" bgcolor="#99FF99">Cotton</th>
      <th rowspan="2" bgcolor="#99FF99">Nylon</th>
      <th rowspan="2" bgcolor="#99FF99">Polyester</th>
      <th rowspan="2" bgcolor="#99FF99">Acrylic</th>
      <th rowspan="2" bgcolor="#99FF99">Wool</th>
      <th colspan="2" bgcolor="#99FF99">Length</th>
      <th colspan="2" bgcolor="#99FF99">Width</th>
      <th rowspan="2" bgcolor="#99FF99">C.Change(rating 1)</th>
      <th rowspan="2" bgcolor="#99FF99">C.Change(rating 2)</th>
      <th rowspan="2" bgcolor="#99FF99">Suhu</th>
      <th rowspan="2" bgcolor="#99FF99">C.Change</th>
      <th rowspan="2" bgcolor="#99FF99">C.Staining</th>
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
      <th bgcolor="#99FF99">Transfer</th>
      <th bgcolor="#99FF99">Grade</th>
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
      <th bgcolor="#99FF99">Dry</th>
      <th bgcolor="#99FF99">Wet</th>
      <th bgcolor="#99FF99">Dry</th>
      <th bgcolor="#99FF99">Wet</th>
    </tr>
	<?php 
	$no=1;
	$query=mysqli_query($con,"SELECT * FROM tbl_tq_randomtest GROUP BY no_item, no_hanger ");
	while($r=mysqli_fetch_array($query)){
        $q1=mysqli_query($con,"SELECT * FROM tbl_tq_nokk WHERE no_item='$r[no_item]' OR no_hanger='$r[no_hanger]'");
        $r1=mysqli_fetch_array($q1);
	?>
    <tr>
      <td><?php echo $no;?></td>
      <td><?php echo $r['no_hanger'];?></td>
      <td><?php echo $r['no_item'];?></td>
      <td><?php echo $r1['jenis_kain'];?></td>
      <td><?php echo $r['rf_width'];?></td>
      <td><?php echo $r['rf_weight'];?></td>
      <td><?php echo $r['rshrinkage_l1'];?></td>
      <td><?php echo $r['rshrinkage_w1'];?></td>
      <td><?php echo $r['rspirality1'];?></td>
      <td><?php echo $r['rshrinkage_l2'];?></td>
      <td><?php echo $r['rshrinkage_w2'];?></td>
      <td><?php echo $r['rspirality2'];?></td>
      <td><?php echo $r['rshrinkage_l3'];?></td>
      <td><?php echo $r['rshrinkage_w3'];?></td>
      <td><?php echo $r['rspirality3'];?></td>
      <td><?php echo $r['rshrinkage_l4'];?></td>
      <td><?php echo $r['rshrinkage_w4'];?></td>
      <td><?php echo $r['rspirality4'];?></td>
      <td><?php echo $r['rshrinkage_l5'];?></td>
      <td><?php echo $r['rshrinkage_w5'];?></td>
      <td><?php echo $r['rspirality5'];?></td>
      <td><?php echo $r['rshrinkage_l6'];?></td>
      <td><?php echo $r['rshrinkage_w6'];?></td>
      <td><?php echo $r['rspirality6'];?></td>
      <td><?php echo $r['rfibre_transfer'];?></td>
      <td><?php echo $r['rfibre_grade'];?></td>
      <td><?php echo $r['rbow'];?></td>
      <td><?php echo $r['rskew'];?></td>
      <td><?php echo $r['rpm_f1'];?></td>
      <td><?php echo $r['rpm_b1'];?></td>
      <td><?php echo $r['rpm_f2'];?></td>
      <td><?php echo $r['rpm_b2'];?></td>
      <td><?php echo $r['rpm_f3'];?></td>
      <td><?php echo $r['rpm_b3'];?></td>
      <td><?php echo $r['rpm_f4'];?></td>
      <td><?php echo $r['rpm_b4'];?></td>
      <td><?php echo $r['rpm_f5'];?></td>
      <td><?php echo $r['rpm_b5'];?></td>
      <td><?php echo $r['rpb_f1'];?></td>
      <td><?php echo $r['rpb_b1'];?></td>
      <td><?php echo $r['rprt_f1'];?></td>
      <td><?php echo $r['rprt_b1'];?></td>
      <td><?php echo $r['rprt_f2'];?></td>
      <td><?php echo $r['rprt_b2'];?></td>
      <td><?php echo $r['rprt_f3'];?></td>
      <td><?php echo $r['rprt_b3'];?></td>
      <td><?php echo $r['rprt_f4'];?></td>
      <td><?php echo $r['rprt_b4'];?></td>
      <td><?php echo $r['rprt_f5'];?></td>
      <td><?php echo $r['rprt_b5'];?></td>
      <td><?php echo $r['rpl_f1'];?></td>
      <td><?php echo $r['rpl_b1'];?></td>
      <td><?php echo $r['rpl_f2'];?></td>
      <td><?php echo $r['rpl_b2'];?></td>
      <td><?php echo $r['rpl_f3'];?></td>
      <td><?php echo $r['rpl_b3'];?></td>
      <td><?php echo $r['rpl_f4'];?></td>
      <td><?php echo $r['rpl_b4'];?></td>
      <td><?php echo $r['rpl_f5'];?></td>
      <td><?php echo $r['rpl_b5'];?></td>
      <td><?php echo $r['rabration'];?></td>
      <td><?php echo $r['rsm_l1'];?></td>
      <td><?php echo $r['rsm_w1'];?></td>
      <td><?php echo $r['rsm_l2'];?></td>
      <td><?php echo $r['rsm_w2'];?></td>
      <td><?php echo $r['rsm_l3'];?></td>
      <td><?php echo $r['rsm_w3'];?></td>
      <td><?php echo $r['rsm_l4'];?></td>
      <td><?php echo $r['rsm_w4'];?></td>
      <td><?php echo $r['rsb_l1'];?></td>
      <td><?php echo $r['rsb_w1'];?></td>
      <td><?php echo $r['rbs_instron'];?></td>
      <td><?php echo $r['rbs_mullen'];?></td>
      <td><?php echo $r['rbs_tru'];?></td>
      <td><?php echo $r['rwick_l1'];?></td>
      <td><?php echo $r['rwick_w1'];?></td>
      <td><?php echo $r['rwick_l2'];?></td>
      <td><?php echo $r['rwick_w2'];?></td>
      <td><?php echo $r['rwick_l3'];?></td>
      <td><?php echo $r['rwick_w3'];?></td>
      <td><?php echo $r['rabsor_f1'];?></td>
      <td><?php echo $r['rabsor_b1'];?></td>
      <td><?php echo $r['rabsor_f2'];?></td>
      <td><?php echo $r['rabsor_b2'];?></td>
      <td><?php echo $r['rabsor_f3'];?></td>
      <td><?php echo $r['rabsor_b3'];?></td>
      <td><?php echo $r['rdry1'];?></td>
      <td><?php echo $r['rdry2'];?></td>
      <td><?php echo $r['rdry3'];?></td>
      <td><?php echo $r['rdryaf1'];?></td>
      <td><?php echo $r['rdryaf2'];?></td>
      <td><?php echo $r['rdryaf3'];?></td>
      <td><?php echo $r['rrepp1'];?></td>
      <td><?php echo $r['rrepp2'];?></td>
      <td><?php echo $r['rrepp3'];?></td>
      <td><?php echo $r['rrepp4'];?></td>
      <td><?php echo $r['rstretch_l1'];?></td>
      <td><?php echo $r['rstretch_w1'];?></td>
      <td><?php echo $r['rrecover_l1'];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r['rrecover_w1'];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r['rstretch_l2'];?></td>
      <td><?php echo $r['rstretch_w2'];?></td>
      <td><?php echo $r['rrecover_l2'];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r['rrecover_w2'];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r['rstretch_l3'];?></td>
      <td><?php echo $r['rstretch_w3'];?></td>
      <td><?php echo $r['rrecover_l3'];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r['rrecover_w3'];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r['rstretch_l4'];?></td>
      <td><?php echo $r['rstretch_w4'];?></td>
      <td><?php echo $r['rrecover_l4'];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r['rrecover_w4'];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r['rstretch_l5'];?></td>
      <td><?php echo $r['rstretch_w5'];?></td>
      <td><?php echo $r['rrecover_l5'];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r['rrecover_w5'];?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><?php echo $r['rapper_ch1'];?></td>
      <td><?php echo $r['rapper_st'];?></td>
      <td><?php echo $r['rapper_pf1'];?></td>
      <td><?php echo $r['rapper_pb1'];?></td>
      <td><?php echo $r['rapper_ch2'];?></td>
      <td><?php echo $r['rapper_pf2'];?></td>
      <td><?php echo $r['rapper_pb2'];?></td>
      <td><?php echo $r['rapper_ch3'];?></td>
      <td><?php echo $r['rapper_pf3'];?></td>
      <td><?php echo $r['rapper_pb3'];?></td>
      <td><?php echo $r['rthick1'];?></td>
      <td><?php echo $r['rthick2'];?></td>
      <td><?php echo $r['rthick3'];?></td>
      <td><?php echo $r['rthickav'];?></td>
      <td><?php echo $r['rfc_cott'];?></td>
      <td><?php echo $r['rfc_poly'];?></td>
      <td><?php echo $r['rfc_elastane'];?></td>
      <td>&nbsp;</td>
      <td><?php echo $r['rflamability'];?></td>
      <td><?php echo $r['rfc_cpi'];?></td>
      <td><?php echo $r['rfc_wpi'];?></td>
      <td><?php echo $r['rsp_grdl1'];?></td>
      <td><?php echo $r['rsp_clsl1'];?></td>
      <td><?php echo $r['rsp_shol1'];?></td>
      <td><?php echo $r['rsp_medl1'];?></td>
      <td><?php echo $r['rsp_lonl1'];?></td>
      <td><?php echo $r['rsp_grdw1'];?></td>
      <td><?php echo $r['rsp_clsw1'];?></td>
      <td><?php echo $r['rsp_show1'];?></td>
      <td><?php echo $r['rsp_medw1'];?></td>
      <td><?php echo $r['rsp_lonw1'];?></td>
      <td><?php echo $r['rsp_grdl2'];?></td>
      <td><?php echo $r['rsp_clsl2'];?></td>
      <td><?php echo $r['rsp_shol2'];?></td>
      <td><?php echo $r['rsp_medl2'];?></td>
      <td><?php echo $r['rsp_lonl2'];?></td>
      <td><?php echo $r['rsp_grdw2'];?></td>
      <td><?php echo $r['rsp_clsw2'];?></td>
      <td><?php echo $r['rsp_show2'];?></td>
      <td><?php echo $r['rsp_medw2'];?></td>
      <td><?php echo $r['rsp_lonw2'];?></td>
      <td><?php echo $r['rwash_temp'];?></td>
      <td><?php echo $r['rwash_colorchange'];?></td>
      <td><?php echo $r['rwash_acetate'];?></td>
      <td><?php echo $r['rwash_cotton'];?></td>
      <td><?php echo $r['rwash_nylon'];?></td>
      <td><?php echo $r['rwash_poly'];?></td>
      <td><?php echo $r['rwash_acrylic'];?></td>
      <td><?php echo $r['rwash_wool'];?></td>
      <td><?php echo $r['rwash_staining'];?></td>
      <td><?php echo $r['racid_colorchange'];?></td>
      <td><?php echo $r['racid_acetate'];?></td>
      <td><?php echo $r['racid_cotton'];?></td>
      <td><?php echo $r['racid_nylon'];?></td>
      <td><?php echo $r['racid_poly'];?></td>
      <td><?php echo $r['racid_acrylic'];?></td>
      <td><?php echo $r['racid_wool'];?></td>
      <td><?php echo $r['ralkaline_colorchange'];?></td>
      <td><?php echo $r['ralkaline_acetate'];?></td>
      <td><?php echo $r['ralkaline_cotton'];?></td>
      <td><?php echo $r['ralkaline_nylon'];?></td>
      <td><?php echo $r['ralkaline_poly'];?></td>
      <td><?php echo $r['ralkaline_acrylic'];?></td>
      <td><?php echo $r['ralkaline_wool'];?></td>
      <td><?php echo $r['rwater_colorchange'];?></td>
      <td><?php echo $r['rwater_acetate'];?></td>
      <td><?php echo $r['rwater_cotton'];?></td>
      <td><?php echo $r['rwater_nylon'];?></td>
      <td><?php echo $r['rwater_poly'];?></td>
      <td><?php echo $r['rwater_acrylic'];?></td>
      <td><?php echo $r['rwater_wool'];?></td>
      <td><?php echo $r['rcrock_len1'];?></td>
      <td><?php echo $r['rcrock_len2'];?></td>
      <td><?php echo $r['rcrock_wid1'];?></td>
      <td><?php echo $r['rcrock_wid2'];?></td>
      <td><?php echo $r['rphenolic_colorchange'];?></td>
      <td><?php echo $r['rph'];?></td>
      <td><?php echo $r['rsoil'];?></td>
      <td><?php echo $r['rlight_rating1'];?></td>
      <td><?php echo $r['rlight_rating2'];?></td>
      <td><?php echo $r['rcm_printing_colorchange'];?></td>
      <td><?php echo $r['rcm_dye_temp'];?></td>
      <td><?php echo $r['rcm_dye_colorchange'];?></td>
      <td><?php echo $r['rcm_dye_stainingface'];?></td>
      <td><?php echo $r['rlight_pers_colorchange'];?></td>
      <td><?php echo $r['rsaliva_staining'];?></td>
      <td><?php echo $r['rbleeding'];?></td>
      <td>&nbsp;</td>
  </tr>
    <?php $no++;} ?>
</table>
</body>