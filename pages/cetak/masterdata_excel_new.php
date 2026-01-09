<?php
$atnow = date("his");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=masterdata-" . substr($_GET['awal'], 0, 10) . $atnow . ".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");


//disini script laporan anda
?>
<?php
include "../../koneksi.php";
ini_set("error_reporting", 1);
//--
$idkk = $_REQUEST['idkk'];
$act = $_GET['g'];
//-
$qTgl = mysqli_query($con, "SELECT DATE_FORMAT(now(),'%Y-%m-%d') as tgl_skrg, DATE_FORMAT(now(),'%Y-%m-%d')+ INTERVAL 1 DAY as tgl_besok");
$rTgl = mysqli_fetch_array($qTgl);
$Awal = $_GET['awal'];
$Akhir = $_GET['akhir'];

$no_order = isset($_GET['no_order']) ? $_GET['no_order'] : null;
$no_po = isset($_GET['no_po']) ? $_GET['no_po'] : null;
$hanger = isset($_GET['hanger']) ? $_GET['hanger'] : null;
$development = isset($_GET['development']) ? $_GET['development'] : null;
$warna = isset($_GET['warna']) ? $_GET['warna'] : null;
$pelanggan = isset($_GET['pelanggan']) ? $_GET['pelanggan'] : null;
$demand = isset($_GET['demand']) ? $_GET['demand'] : null;
$prod_order = isset($_GET['prod_order']) ? $_GET['prod_order'] : null;





?>

<body>
  <?php




  ?>
  <strong>Periode:
    <?php echo $Awal; ?> s/d
    <?php echo $Akhir; ?>
  </strong><br>
  <table width="100%" border="1">
    <tr>
      <th rowspan="4" bgcolor="#99FF99">NO.</th>
      <th rowspan="4" bgcolor="#99FF99">No Demand</th>
      <th rowspan="4" bgcolor="#99FF99">No Demand New</th>
      <th rowspan="4" bgcolor="#99FF99">Tgl</th>
      <th rowspan="4" bgcolor="#99FF99">No Test</th>
      <th rowspan="4" bgcolor="#99FF99">No Hanger/Item</th>
      <th rowspan="4" bgcolor="#99FF99">Langganan/Buyer</th>
      <th rowspan="4" bgcolor="#99FF99">PO</th>
      <th rowspan="4" bgcolor="#99FF99">Order</th>
      <th rowspan="4" bgcolor="#99FF99">Description</th>
      <th rowspan="4" bgcolor="#99FF99">Prod.Order/Lot</th>
      <th rowspan="4" bgcolor="#99FF99">Lot New</th>
      <th rowspan="4" bgcolor="#99FF99">Color</th>
      <th rowspan="4" bgcolor="#99FF99">No KK Legacy</th>
      <th rowspan="4" bgcolor="#99FF99">Lot Legacy</th>
      <th rowspan="4" bgcolor="#99FF99">Rol</th>
      <th rowspan="4" bgcolor="#99FF99">Netto</th>
      <th rowspan="4" bgcolor="#99FF99">Proses (Fin/PB/AP/DLL)</th>
      <th colspan="4" rowspan="2" bgcolor="#99FF99">Fabric Weight</th>
      <th rowspan="4" bgcolor="#99FF99">Note Fabric Weight</th>
      <th colspan="12" rowspan="2" bgcolor="#99FF99">Shrinkage</th>
      <th colspan="24" rowspan="2" bgcolor="#99FF99"> APPEARANCE </th>
      <th colspan="6" rowspan="2" bgcolor="#99FF99">Heat Shrinkage</th>
      <th rowspan="4" bgcolor="#99FF99">Note Shrinkage</th>
      <th colspan="2" rowspan="3" bgcolor="#99FF99">Fibre/Fuzz</th>
      <th rowspan="4" bgcolor="#99FF99">Note Fibre/Fuzz</th>
      <th rowspan="4" bgcolor="#99FF99">Odour</th>
      <th rowspan="4" bgcolor="#99FF99">Note Odour</th>
      <th rowspan="4" bgcolor="#99FF99">BOW</th>
      <th rowspan="4" bgcolor="#99FF99">SKEW</th>
      <th rowspan="4" bgcolor="#99FF99">Note Bow & Skew</th>
      <th colspan="10" rowspan="2" bgcolor="#99FF99">PILLING MARTINDLE</th>
      <th rowspan="4" bgcolor="#99FF99">Note Pilling Martindle</th>
      <th colspan="2" rowspan="2" bgcolor="#99FF99">PILLING BOX</th>
      <th rowspan="4" bgcolor="#99FF99">Note Pilling Box</th>
      <th colspan="10" rowspan="2" bgcolor="#99FF99">PILLING RANDOM TUMBLER</th>
      <th rowspan="4" bgcolor="#99FF99">Note Pilling Random Tumbler</th>
      <th colspan="10" rowspan="2" bgcolor="#99FF99">PILLING LOCUS</th>
      <th rowspan="4" bgcolor="#99FF99">Note Pilling Locus</th>
      <th rowspan="4" bgcolor="#99FF99">Abration</th>
      <th rowspan="4" bgcolor="#99FF99">Note Abration</th>
      <th colspan="8" rowspan="2" bgcolor="#99FF99">SNAGGING MACE</th>
      <th rowspan="4" bgcolor="#99FF99">Note Snagging Mace</th>
      <th colspan="2" rowspan="2" bgcolor="#99FF99">BEAN BAG</th>
      <th rowspan="4" bgcolor="#99FF99">Note Bean Bag</th>
      <th colspan="3" rowspan="3" bgcolor="#99FF99">Bursting Strength</th>
      <th rowspan="4" bgcolor="#99FF99">Note Bursting Strength</th>

      <th rowspan="4" bgcolor="#99FF99">Nedle Holes & Cracking</th>
      <th rowspan="4" bgcolor="#99FF99">Note Nedle Holes & Cracking</th>
      <th rowspan="2" colspan="3" bgcolor="#99FF99">Wrinkle</th>
      <th rowspan="4" bgcolor="#99FF99">Wrinkle Note</th>

      <th colspan="6" rowspan="2" bgcolor="#99FF99">Wicking</th>
      <th rowspan="4" bgcolor="#99FF99">Note Wicking</th>
      <th colspan="6" rowspan="2" bgcolor="#99FF99">Absorbency</th>
      <th rowspan="4" bgcolor="#99FF99">Note Absorbency</th>
      <th colspan="6" rowspan="2" bgcolor="#99FF99">Drying Time</th>
      <th rowspan="4" bgcolor="#99FF99">Note Drying Time</th>
      <th colspan="4" rowspan="2" bgcolor="#99FF99">Water Repellent</th>
      <th rowspan="4" bgcolor="#99FF99">Note Water Repellent</th>
      <th rowspan="4" bgcolor="#99FF99">Load Stretch</th>
      <th colspan="30" bgcolor="#99FF99">Stretch Recovery</th>
      <th rowspan="4" bgcolor="#99FF99">Note Stretch Recovery</th>
      <th colspan="4" rowspan="2" bgcolor="#99FF99">Growth</th>
      <th colspan="4" rowspan="2" bgcolor="#99FF99">Recovery Growth</th>
      <th rowspan="4" bgcolor="#99FF99">Note Growth</th>
      <th colspan="18" rowspan="2" bgcolor="#99FF99">Appearance</th>
      <th rowspan="4" bgcolor="#99FF99">Note Appearance</th>
      <th colspan="4" rowspan="2" bgcolor="#99FF99">Thickness</th>
      <th rowspan="4" bgcolor="#99FF99">Note Thickness</th>
      <th colspan="4" rowspan="2" bgcolor="#99FF99">Fiber Content</th>
      <th rowspan="4" bgcolor="#99FF99">Note Fiber Content</th>
      <th rowspan="4" bgcolor="#99FF99">Flammability</th>
      <th rowspan="4" bgcolor="#99FF99">Note Flammability</th>
      <th colspan="2" rowspan="2" bgcolor="#99FF99">Fabric Count</th>
      <th rowspan="4" bgcolor="#99FF99">Note Fabric Count</th>
      <th colspan="10" bgcolor="#99FF99">4.41 Snagpod (Face)</th>
      <th colspan="10" bgcolor="#99FF99">4.41 Snagpod (Back)</th>
      <th rowspan="4" bgcolor="#99FF99">Note Snagpod</th>
      <th colspan="9" rowspan="2" bgcolor="#99FF99">Washing Fastness</th>
      <th rowspan="4" bgcolor="#99FF99">Note Washing</th>
      <th colspan="8" rowspan="2" bgcolor="#99FF99">Perspiration Fastness Acid</th>
      <th rowspan="4" bgcolor="#99FF99">Note Acid</th>
      <th colspan="8" rowspan="2" bgcolor="#99FF99">Perspiration Fastness Alkaline</th>
      <th rowspan="4" bgcolor="#99FF99">Note Alkaline</th>
      <th colspan="8" rowspan="2" bgcolor="#99FF99">Water Fastness</th>
      <th rowspan="4" bgcolor="#99FF99">Note Water</th>
      <th colspan="8" rowspan="2" bgcolor="#99FF99">Dye Transfer</th>
      <th rowspan="4" bgcolor="#99FF99">Note Dye Transfer</th>
      <th colspan="4" rowspan="2" bgcolor="#99FF99">Crocking Fastness</th>
      <th rowspan="4" bgcolor="#99FF99">Note Crocking</th>
      <th rowspan="4" bgcolor="#99FF99">Phenolic Yellowing</th>
      <th rowspan="4" bgcolor="#99FF99">Note Phenolic Yellowing</th>
      <th rowspan="4" bgcolor="#99FF99">PH</th>
      <th rowspan="4" bgcolor="#99FF99">Note PH</th>
      <th rowspan="4" bgcolor="#99FF99">Soil Release</th>
      <th rowspan="4" bgcolor="#99FF99">Note Soil Release</th>
      <th rowspan="4" bgcolor="#99FF99">Humidity</th>
      <th rowspan="4" bgcolor="#99FF99">Note Humidity</th>
      <th colspan="2" rowspan="2" bgcolor="#99FF99">Light Fastness</th>
      <th rowspan="4" bgcolor="#99FF99">Note Light Fastness</th>
      <th rowspan="4" bgcolor="#99FF99">C.Migration-Oven Test</th>
      <th rowspan="4" bgcolor="#99FF99">Note C.Migration-Oven</th>
      <th colspan="3" rowspan="2" bgcolor="#99FF99">C.Migration Fastness</th>
      <th rowspan="4" bgcolor="#99FF99">Note C.Migration Fastness</th>
      <th rowspan="4" bgcolor="#99FF99">Light Perspiration</th>
      <th rowspan="4" bgcolor="#99FF99">Note Light Perspiration</th>
      <th rowspan="4" bgcolor="#99FF99">Saliva Fastness</th>
      <th rowspan="4" bgcolor="#99FF99">Note Saliva Fastness</th>
      <th rowspan="2" colspan="2" bgcolor="#99FF99">Bleeding</th>

      <th rowspan="4" bgcolor="#99FF99">Note Bleeding</th>
      <th rowspan="4" bgcolor="#99FF99">Chlorin</th>
      <th rowspan="4" colspan="2" bgcolor="#99FF99">Non-Chlorin</th>
      <th rowspan="4" bgcolor="#99FF99">Note Chlorin & Non-Chlorin</th>
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

      <th colspan="4" bgcolor="#99FF99">Pilling Face</th>
      <th colspan="4" bgcolor="#99FF99">Pilling Back</th>
      <th colspan="4" bgcolor="#99FF99">Pass/fail</th>
      <th colspan="4" bgcolor="#99FF99">C.change</th>
      <th colspan="4" bgcolor="#99FF99">Snagging Face</th>
      <th colspan="4" bgcolor="#99FF99">Snagging Back</th>


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
      <th colspan="1" bgcolor="#99FF99">Original</th> <!-- wrinkle -->
      <th colspan="2" bgcolor="#99FF99">Afterwash</th> <!-- wrinkle -->
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
      <th colspan="2" bgcolor="#99FF99">V</th>
      <th colspan="2" bgcolor="#99FF99">H</th>
      <th colspan="10" bgcolor="#99FF99">1</th>
      <th colspan="4" bgcolor="#99FF99">2</th>
      <th colspan="4" bgcolor="#99FF99">3</th>
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
      <th rowspan="2" bgcolor="#99FF99">S.Staining</th>
      <th rowspan="2" bgcolor="#99FF99">C.Change</th>
      <th rowspan="2" bgcolor="#99FF99">Acetate</th>
      <th rowspan="2" bgcolor="#99FF99">Cotton</th>
      <th rowspan="2" bgcolor="#99FF99">Nylon</th>
      <th rowspan="2" bgcolor="#99FF99">Polyester</th>
      <th rowspan="2" bgcolor="#99FF99">Acrylic</th>
      <th rowspan="2" bgcolor="#99FF99">Wool</th>
      <th rowspan="2" bgcolor="#99FF99">S.Staining</th>
      <th rowspan="2" bgcolor="#99FF99">C.Change</th>
      <th rowspan="2" bgcolor="#99FF99">Acetate</th>
      <th rowspan="2" bgcolor="#99FF99">Cotton</th>
      <th rowspan="2" bgcolor="#99FF99">Nylon</th>
      <th rowspan="2" bgcolor="#99FF99">Polyester</th>
      <th rowspan="2" bgcolor="#99FF99">Acrylic</th>
      <th rowspan="2" bgcolor="#99FF99">Wool</th>
      <th rowspan="2" bgcolor="#99FF99">S.Staining</th>
      <th rowspan="2" bgcolor="#99FF99">Acetate</th>
      <th rowspan="2" bgcolor="#99FF99">Cotton</th>
      <th rowspan="2" bgcolor="#99FF99">Nylon</th>
      <th rowspan="2" bgcolor="#99FF99">Polyester</th>
      <th rowspan="2" bgcolor="#99FF99">Acrylic</th>
      <th rowspan="2" bgcolor="#99FF99">Wool</th>
      <th rowspan="2" bgcolor="#99FF99">C.Staining</th>
      <th rowspan="2" bgcolor="#99FF99">S.Staining</th>
      <th colspan="2" bgcolor="#99FF99">Length</th>
      <th colspan="2" bgcolor="#99FF99">Width</th>
      <th rowspan="2" bgcolor="#99FF99">C.Change(rating 1)</th>
      <th rowspan="2" bgcolor="#99FF99">C.Change(rating 2)</th>
      <th rowspan="2" bgcolor="#99FF99">Suhu</th>
      <th rowspan="2" bgcolor="#99FF99">C.Change</th>
      <th rowspan="2" bgcolor="#99FF99">C.Staining</th>
      <th rowspan="2" bgcolor="#99FF99">Watermark</th>
      <th rowspan="2" bgcolor="#99FF99">Root</th>
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



      <th bgcolor="#99FF99">A</th>
      <th bgcolor="#99FF99">2</th>
      <th bgcolor="#99FF99">3</th>
      <th bgcolor="#99FF99">4</th>
      <th bgcolor="#99FF99">1</th>
      <th bgcolor="#99FF99">2</th>
      <th bgcolor="#99FF99">3</th>
      <th bgcolor="#99FF99">4</th>
      <th bgcolor="#99FF99">1</th>
      <th bgcolor="#99FF99">2</th>
      <th bgcolor="#99FF99">3</th>
      <th bgcolor="#99FF99">4</th>
      <th bgcolor="#99FF99">1</th>
      <th bgcolor="#99FF99">2</th>
      <th bgcolor="#99FF99">3</th>
      <th bgcolor="#99FF99">4</th>

      <th bgcolor="#99FF99">1</th>
      <th bgcolor="#99FF99">2</th>
      <th bgcolor="#99FF99">3</th>
      <th bgcolor="#99FF99">4</th>

      <th bgcolor="#99FF99">1</th>
      <th bgcolor="#99FF99">2</th>
      <th bgcolor="#99FF99">3</th>
      <th bgcolor="#99FF99">4</th>


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
      <th bgcolor="#99FF99"></th> <!-- wrinkle -->
      <th bgcolor="#99FF99"></th> <!-- wrinkle -->
      <th bgcolor="#99FF99"></th> <!-- wrinkle -->
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
      <th bgcolor="#99FF99">1'</th>
      <th bgcolor="#99FF99">30'</th>
      <th bgcolor="#99FF99">1'</th>
      <th bgcolor="#99FF99">30'</th>
      <th bgcolor="#99FF99">C.Change</th>
      <th bgcolor="#99FF99">Staining</th>
      <th bgcolor="#99FF99">Pill 1</th>
      <th bgcolor="#99FF99">Pill 2</th>
      <th bgcolor="#99FF99">Acetate</th>
      <th bgcolor="#99FF99">Cotton</th>
      <th bgcolor="#99FF99">Nylon</th>
      <th bgcolor="#99FF99">Polyester</th>
      <th bgcolor="#99FF99">Acrylic</th>
      <th bgcolor="#99FF99">Wool</th>
      <th bgcolor="#99FF99">C.Change</th>
      <th bgcolor="#99FF99">Pill 1</th>
      <th bgcolor="#99FF99">Pill 2</th>
      <th bgcolor="#99FF99">Staining</th>
      <th bgcolor="#99FF99">C.Change</th>
      <th bgcolor="#99FF99">Pill 1</th>
      <th bgcolor="#99FF99">Pill 2</th>
      <th bgcolor="#99FF99">Staining</th>
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
    $no = 1;
    $sql = "SELECT *,a.id as idkk, c.bleeding_root
	FROM tbl_tq_nokk a 
	JOIN tbl_tq_test b ON (a.id=b.id_nokk) 
	LEFT JOIN tbl_tq_test_2 c ON (a.id = c.id_nokk)
	WHERE a.tgl_masuk BETWEEN '$Awal' AND '$Akhir'  
	";





    //backup 
    // -- ORDER BY a.tgl_masuk ASC, a.no_test ASC
    
    if (!empty($no_order)) {
      $sql .= " AND a.no_order = '$no_order'";
    }
    if (!empty($no_po)) {
      $sql .= " AND a.no_po = '$no_po'";
    }
    if (!empty($hanger)) {
      $sql .= " AND a.no_hanger = '$hanger'";
    }
    if (!empty($development)) {
      $sql .= " AND a.development = '$development'";
    }
    if (!empty($warna)) {
      $sql .= " AND a.warna = '$warna'";
    }
    if (!empty($pelanggan)) {
      $sql .= " AND a.pelanggan like '%$pelanggan%'";
    }

    if (!empty($demand)) {
      $sql .= " AND a.nodemand = '$demand' ";
    }

    if (!empty($prod_order)) {
      $sql .= " AND a.lot = '$prod_order' ";
    }

    $sql .= " ORDER BY a.tgl_masuk ASC, a.no_test ASC";


    //penambahan no demand multiple
    $sql_demand = "SELECT *, a.id as idkk, c.nodemand as nodemand_multiple 
	  FROM tbl_tq_nokk a 
	  INNER JOIN tbl_tq_test b ON a.id=b.id_nokk 
	  join tbl_tq_nokk_demand c on (a.id = c.id_nokk)
	  WHERE a.tgl_masuk BETWEEN '$Awal' AND '$Akhir' ";
    $demand_results = mysqli_query($con, $sql_demand);

    $array = [];
    while ($demand_row = mysqli_fetch_array($demand_results)) {
      $array[$demand_row['idkk']][] = $demand_row['nodemand_multiple'];
    }

    $query = mysqli_query($con, $sql);


    while ($r = mysqli_fetch_array($query)) {
      $sqlR = mysqli_query($con, "SELECT * FROM tbl_qcf WHERE nodemand='" . $r['nodemand'] . "'");
      $rR = mysqli_fetch_array($sqlR);
      ?>
      <tr>
        <td>
          <?php echo $no; ?>
        </td>
        <td>'
          <?php echo $r['nodemand']; ?>
        </td>
        <td>'
          <?php echo $r['nodemand_new']; ?>
        </td>
        <td>
          <?php echo $r['tgl_masuk']; ?>
        </td>
        <td>
          <?php echo $r['no_test']; ?>
        </td>
        <td>
          <?php echo $r['no_item']; ?>
        </td>
        <td>
          <?php echo $r['pelanggan']; ?>
        </td>
        <td>
          <?php echo $r['no_po']; ?>
        </td>
        <td>
          <?php echo $r['no_order']; ?>
        </td>
        <td>
          <?php echo $r['jenis_kain']; ?>
        </td>
        <td>'
          <?php echo $r['lot']; ?>
        </td>
        <td>'
          <?php echo $r['lot_new']; ?>
        </td>
        <td>
          <?php echo $r['warna']; ?>
        </td>
        <td>'
          <?php echo $r['kk_legacy']; ?>
        </td>
        <td>'
          <?php echo $r['lot_legacy']; ?>
        </td>
        <td>
          <?php echo $rR['rol']; ?>
        </td>
        <td>
          <?php echo $rR['netto']; ?>
        </td>
        <td>
          <?php echo $r['proses_fin']; ?>
        </td>
        <td>
          <?php echo $r['lebar']; ?>
        </td>
        <td>
          <?php echo $r['f_width']; ?>
        </td>
        <td>
          <?php echo $r['gramasi']; ?>
        </td>
        <td>
          <?php echo $r['f_weight']; ?>
        </td>
        <td>
          <?php echo $r['fwe_note']; ?>
        </td> <!-- 5 -->

        <td>
          <?php echo $r['shrinkage_l1']; ?>
        </td>
        <td>
          <?php echo $r['shrinkage_w1']; ?>
        </td>
        <td>
          <?php echo $r['spirality1']; ?>
        </td>
        <td>
          <?php echo $r['shrinkage_l2']; ?>
        </td>
        <td>
          <?php echo $r['shrinkage_w2']; ?>
        </td>
        <td>
          <?php echo $r['spirality2']; ?>
        </td>
        <td>
          <?php echo $r['shrinkage_l3']; ?>
        </td>
        <td>
          <?php echo $r['shrinkage_w3']; ?>
        </td>
        <td>
          <?php echo $r['spirality3']; ?>
        </td>
        <td>
          <?php echo $r['shrinkage_l4']; ?>
        </td>
        <td>
          <?php echo $r['shrinkage_w4']; ?>
        </td>
        <td>
          <?php echo $r['spirality4']; ?>
        </td>


        <td>
          <?php if ($r['apperss_pf1'] != '') {
            echo "'" . $r['apperss_pf1'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_pf2'] != '') {
            echo "'" . $r['apperss_pf2'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_pf3'] != '') {
            echo "'" . $r['apperss_pf3'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_pf4'] != '') {
            echo "'" . $r['apperss_pf4'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_pb1'] != '') {
            echo "'" . $r['apperss_pb1'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_pb2'] != '') {
            echo "'" . $r['apperss_pb2'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_pb3'] != '') {
            echo "'" . $r['apperss_pb3'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_pb4'] != '') {
            echo "'" . $r['apperss_pb4'];
          } ?>
        </td>


        <td>
          <?php echo $r['apperss_ch1']; ?>
        </td>
        <td>
          <?php echo $r['apperss_ch2']; ?>
        </td>
        <td>
          <?php echo $r['apperss_ch3']; ?>
        </td>
        <td>
          <?php echo $r['apperss_ch4']; ?>
        </td>

        <td>
          <?php if ($r['apperss_cc1'] != '') {
            echo "'" . $r['apperss_cc1'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_cc2'] != '') {
            echo "'" . $r['apperss_cc2'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_cc3'] != '') {
            echo "'" . $r['apperss_cc3'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_ch4'] != '') {
            echo "'" . $r['apperss_ch4'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_sf1'] != '') {
            echo "'" . $r['apperss_sf1'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_sf2'] != '') {
            echo "'" . $r['apperss_sf2'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_sf3'] != '') {
            echo "'" . $r['apperss_sf3'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_sf4'] != '') {
            echo "'" . $r['apperss_sf4'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_sb1'] != '') {
            echo "'" . $r['apperss_sb1'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_sb2'] != '') {
            echo "'" . $r['apperss_sb2'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_sb3'] != '') {
            echo "'" . $r['apperss_sb3'];
          } ?>
        </td>
        <td>
          <?php if ($r['apperss_sb4'] != '') {
            echo "'" . $r['apperss_sb4'];
          } ?>
        </td>





        <td>
          <?php echo $r['shrinkage_l5']; ?>
        </td>
        <td>
          <?php echo $r['shrinkage_w5']; ?>
        </td>
        <td>
          <?php echo $r['spirality5']; ?>
        </td>
        <td>
          <?php echo $r['shrinkage_l6']; ?>
        </td>
        <td>
          <?php echo $r['shrinkage_w6']; ?>
        </td>
        <td>
          <?php echo $r['spirality6']; ?>
        </td>
        <td>
          <?php echo $r['sns_note']; ?>
        </td> <!--19-->
        <td>
          <?php echo $r['fibre_transfer']; ?>
        </td>
        <td>
          <?php echo $r['fibre_grade']; ?>
        </td>
        <td>
          <?php echo $r['fibre_note']; ?>
        </td><!--3-->
        <td>
          <?php echo $r['odour']; ?>
        </td>
        <td>
          <?php echo $r['odour_note']; ?>
        </td><!--2-->
        <td>
          <?php echo $r['bow']; ?>
        </td>
        <td>
          <?php echo $r['skew']; ?>
        </td>
        <td>
          <?php echo $r['bas_note']; ?>
        </td><!--3-->
        <td>
          <?php echo $r['pm_f1']; ?>
        </td>
        <td>
          <?php echo $r['pm_b1']; ?>
        </td>
        <td>
          <?php echo $r['pm_f2']; ?>
        </td>
        <td>
          <?php echo $r['pm_b2']; ?>
        </td>
        <td>
          <?php echo $r['pm_f3']; ?>
        </td>
        <td>
          <?php echo $r['pm_b3']; ?>
        </td>
        <td>
          <?php echo $r['pm_f4']; ?>
        </td>
        <td>
          <?php echo $r['pm_b4']; ?>
        </td>
        <td>
          <?php echo $r['pm_f5']; ?>
        </td>
        <td>
          <?php echo $r['pm_b5']; ?>
        </td>
        <td>
          <?php echo $r['pillm_note']; ?>
        </td><!--11-->
        <td>
          <?php echo $r['pb_f1']; ?>
        </td>
        <td>
          <?php echo $r['pb_b1']; ?>
        </td>
        <td>
          <?php echo $r['pillb_note']; ?>
        </td><!--3-->
        <td>
          <?php echo $r['prt_f1']; ?>
        </td>
        <td>
          <?php echo $r['prt_b1']; ?>
        </td>
        <td>
          <?php echo $r['prt_f2']; ?>
        </td>
        <td>
          <?php echo $r['prt_b2']; ?>
        </td>
        <td>
          <?php echo $r['prt_f3']; ?>
        </td>
        <td>
          <?php echo $r['prt_b3']; ?>
        </td>
        <td>
          <?php echo $r['prt_f4']; ?>
        </td>
        <td>
          <?php echo $r['prt_b4']; ?>
        </td>
        <td>
          <?php echo $r['prt_f5']; ?>
        </td>
        <td>
          <?php echo $r['prt_b5']; ?>
        </td>
        <td>
          <?php echo $r['pillr_note']; ?>
        </td><!--11-->
        <td>
          <?php echo $r['pl_f1']; ?>
        </td>
        <td>
          <?php echo $r['pl_b1']; ?>
        </td>
        <td>
          <?php echo $r['pl_f2']; ?>
        </td>
        <td>
          <?php echo $r['pl_b2']; ?>
        </td>
        <td>
          <?php echo $r['pl_f3']; ?>
        </td>
        <td>
          <?php echo $r['pl_b3']; ?>
        </td>
        <td>
          <?php echo $r['pl_f4']; ?>
        </td>
        <td>
          <?php echo $r['pl_b4']; ?>
        </td>
        <td>
          <?php echo $r['pl_f5']; ?>
        </td>
        <td>
          <?php echo $r['pl_b5']; ?>
        </td>
        <td>
          <?php echo $r['pilll_note']; ?>
        </td><!--11-->
        <td>
          <?php echo $r['abration']; ?>
        </td>
        <td>
          <?php echo $r['abr_note']; ?>
        </td><!--2-->
        <td>
          <?php echo $r['sm_l1']; ?>
        </td>
        <td>
          <?php echo $r['sm_w1']; ?>
        </td>
        <td>
          <?php echo $r['sm_l2']; ?>
        </td>
        <td>
          <?php echo $r['sm_w2']; ?>
        </td>
        <td>
          <?php echo $r['sm_l3']; ?>
        </td>
        <td>
          <?php echo $r['sm_w3']; ?>
        </td>
        <td>
          <?php echo $r['sm_l4']; ?>
        </td>
        <td>
          <?php echo $r['sm_w4']; ?>
        </td>
        <td>
          <?php echo $r['snam_note']; ?>
        </td><!--9-->
        <td>
          <?php echo $r['sb_l1']; ?>
        </td>
        <td>
          <?php echo $r['sb_w1']; ?>
        </td>
        <td>
          <?php echo $r['snab_note']; ?>
        </td><!--3-->
        <td>
          <?php echo $r['bs_instron']; ?>
        </td>
        <td>
          <?php echo $r['bs_mullen']; ?>
        </td>
        <td>
          <?php echo $r['bs_tru']; ?>
        </td>
        <td>
          <?php echo $r['burs_note']; ?>
        </td><!--4-->
        <td>
          <?php echo $r['nedle'] ?>
        </td>
        <td>
          <?php echo $r['nedle_note'] ?>
        </td>
        <td>
          <?php echo $r['wrinkle'] ?>
        </td>
        <td>
          <?php echo $r['wrinkle1'] ?>
        </td>
        <td>
          <?php echo $r['wrinkle2'] ?>
        </td>
        <td>
          <?php echo $r['wrinkle_note'] ?>
        </td>
        <td>
          <?php echo $r['wick_l1']; ?>
        </td>
        <td>
          <?php echo $r['wick_w1']; ?>
        </td>
        <td>
          <?php echo $r['wick_l2']; ?>
        </td>
        <td>
          <?php echo $r['wick_w2']; ?>
        </td>
        <td>
          <?php echo $r['wick_l3']; ?>
        </td>
        <td>
          <?php echo $r['wick_w3']; ?>
        </td>
        <td>
          <?php echo $r['wick_note']; ?>
        </td><!--7-->
        <td>
          <?php echo $r['absor_f2']; ?>
        </td>
        <td>
          <?php echo $r['absor_f1']; ?>
        </td>
        <td>
          <?php echo $r['absor_b2']; ?>
        </td>
        <td>
          <?php echo $r['absor_b1']; ?>
        </td>
        <td>
          <?php echo $r['absor_f3']; ?>
        </td>
        <td>
          <?php echo $r['absor_b3']; ?>
        </td>
        <td>
          <?php echo $r['absor_note']; ?>
        </td><!--7-->
        <td>
          <?php echo $r['dry1']; ?>
        </td>
        <td>
          <?php echo $r['dry2']; ?>
        </td>
        <td>
          <?php echo $r['dry3']; ?>
        </td>
        <td>
          <?php echo $r['dryaf1']; ?>
        </td>
        <td>
          <?php echo $r['dryaf2']; ?>
        </td>
        <td>
          <?php echo $r['dryaf3']; ?>
        </td>
        <td>
          <?php echo $r['dry_note']; ?>
        </td><!--7-->
        <td>
          <?php echo $r['repp1']; ?>
        </td>
        <td>
          <?php echo $r['repp2']; ?>
        </td>
        <td>
          <?php echo $r['repp3']; ?>
        </td>
        <td>
          <?php echo $r['repp4']; ?>
        </td>
        <td>
          <?php echo $r['repp_note']; ?>
        </td><!--5-->
        <td>
          <?php echo $r['load_stretch']; ?>
        </td>
        <td>
          <?php echo $r['stretch_l1']; ?>
        </td>
        <td>
          <?php echo $r['stretch_w1']; ?>
        </td>
        <td>
          <?php echo $r['recover_l1']; ?>
        </td>
        <td>&nbsp;</td>
        <td>
          <?php echo $r['recover_w1']; ?>
        </td>
        <td>&nbsp;</td>
        <td>
          <?php echo $r['stretch_l2']; ?>
        </td>
        <td>
          <?php echo $r['stretch_w2']; ?>
        </td>
        <td>
          <?php echo $r['recover_l2']; ?>
        </td>
        <td>&nbsp;</td>
        <td>
          <?php echo $r['recover_w2']; ?>
        </td>
        <td>&nbsp;</td>
        <td>
          <?php echo $r['stretch_l3']; ?>
        </td>
        <td>
          <?php echo $r['stretch_w3']; ?>
        </td>
        <td>
          <?php echo $r['recover_l3']; ?>
        </td>
        <td>&nbsp;</td>
        <td>
          <?php echo $r['recover_w3']; ?>
        </td>
        <td>&nbsp;</td>
        <td>
          <?php echo $r['stretch_l4']; ?>
        </td>
        <td>
          <?php echo $r['stretch_w4']; ?>
        </td>
        <td>
          <?php echo $r['recover_l4']; ?>
        </td>
        <td>&nbsp;</td>
        <td>
          <?php echo $r['recover_w4']; ?>
        </td>
        <td>&nbsp;</td>
        <td>
          <?php echo $r['stretch_l5']; ?>
        </td>
        <td>
          <?php echo $r['stretch_w5']; ?>
        </td>
        <td>
          <?php echo $r['recover_l5']; ?>
        </td>
        <td>&nbsp;</td>
        <td>
          <?php echo $r['recover_w5']; ?>
        </td>
        <td>&nbsp;</td>
        <td>
          <?php echo $r['stretch_note'] . " " . $r['recover_note']; ?>
        </td><!--32-->
        <td>
          <?php echo $r['growth_l1']; ?>
        </td>
        <td>
          <?php echo $r['growth_l2']; ?>
        </td>
        <td>
          <?php echo $r['growth_w1']; ?>
        </td>
        <td>
          <?php echo $r['growth_w2']; ?>
        </td>
        <td>
          <?php echo $r['rec_growth_l1']; ?>
        </td>
        <td>
          <?php echo $r['rec_growth_l2']; ?>
        </td>
        <td>
          <?php echo $r['rec_growth_w1']; ?>
        </td>
        <td>
          <?php echo $r['rec_growth_w2']; ?>
        </td>
        <td>
          <?php echo $r['growth_note']; ?>
        </td><!--9-->
        <td>
          <?php echo $r['apper_ch1']; ?>
        </td>
        <td>
          <?php echo $r['apper_st']; ?>
        </td>
        <td>
          <?php echo $r['apper_pf1']; ?>
        </td>
        <td>
          <?php echo $r['apper_pb1']; ?>
        </td>
        <td>
          <?php echo $r['apper_acetate']; ?>
        </td>
        <td>
          <?php echo $r['apper_cotton']; ?>
        </td>
        <td>
          <?php echo $r['apper_nylon']; ?>
        </td>
        <td>
          <?php echo $r['apper_poly']; ?>
        </td>
        <td>
          <?php echo $r['apper_acrylic']; ?>
        </td>
        <td>
          <?php echo $r['apper_wool']; ?>
        </td>
        <td>
          <?php echo $r['apper_ch2']; ?>
        </td>
        <td>
          <?php echo $r['apper_pf2']; ?>
        </td>
        <td>
          <?php echo $r['apper_pb2']; ?>
        </td>
        <td>
          <?php echo $r['apper_st2']; ?>
        </td>
        <td>
          <?php echo $r['apper_ch3']; ?>
        </td>
        <td>
          <?php echo $r['apper_pf3']; ?>
        </td>
        <td>
          <?php echo $r['apper_pb3']; ?>
        </td>
        <td>
          <?php echo $r['apper_st3']; ?>
        </td>
        <td>
          <?php echo $r['apper_note']; ?>
        </td><!--19-->
        <td>
          <?php echo $r['thick1']; ?>
        </td>
        <td>
          <?php echo $r['thick2']; ?>
        </td>
        <td>
          <?php echo $r['thick3']; ?>
        </td>
        <td>
          <?php echo $r['thickav']; ?>
        </td>
        <td>
          <?php echo $r['thick_note']; ?>
        </td><!--5-->
        <td>
          <?php echo $r['fc_cott']; ?>
        </td>
        <td>
          <?php echo $r['fc_poly']; ?>
        </td>
        <td>
          <?php echo $r['fc_elastane']; ?>
        </td>
        <td>&nbsp;</td>
        <td>
          <?php echo $r['fiber_note']; ?>
        </td><!--5-->
        <td>
          <?php echo $r['flamability']; ?>
        </td>
        <td>
          <?php echo $r['fla_note']; ?>
        </td><!--2-->
        <td>
          <?php echo $r['fc_cpi']; ?>
        </td>
        <td>
          <?php echo $r['fc_wpi']; ?>
        </td>
        <td>
          <?php echo $r['fc_note']; ?>
        </td><!--3-->
        <td>
          <?php echo $r['sp_grdl1']; ?>
        </td>
        <td>
          <?php echo $r['sp_clsl1']; ?>
        </td>
        <td>
          <?php echo $r['sp_shol1']; ?>
        </td>
        <td>
          <?php echo $r['sp_medl1']; ?>
        </td>
        <td>
          <?php echo $r['sp_lonl1']; ?>
        </td>
        <td>
          <?php echo $r['sp_grdw1']; ?>
        </td>
        <td>
          <?php echo $r['sp_clsw1']; ?>
        </td>
        <td>
          <?php echo $r['sp_show1']; ?>
        </td>
        <td>
          <?php echo $r['sp_medw1']; ?>
        </td>
        <td>
          <?php echo $r['sp_lonw1']; ?>
        </td>
        <td>
          <?php echo $r['sp_grdl2']; ?>
        </td>
        <td>
          <?php echo $r['sp_clsl2']; ?>
        </td>
        <td>
          <?php echo $r['sp_shol2']; ?>
        </td>
        <td>
          <?php echo $r['sp_medl2']; ?>
        </td>
        <td>
          <?php echo $r['sp_lonl2']; ?>
        </td>
        <td>
          <?php echo $r['sp_grdw2']; ?>
        </td>
        <td>
          <?php echo $r['sp_clsw2']; ?>
        </td>
        <td>
          <?php echo $r['sp_show2']; ?>
        </td>
        <td>
          <?php echo $r['sp_medw2']; ?>
        </td>
        <td>
          <?php echo $r['sp_lonw2']; ?>
        </td>
        <td>
          <?php echo $r['snap_note']; ?>
        </td><!--21-->
        <td>
          <?php echo $r['wash_temp']; ?>
        </td>
        <td>
          <?php echo $r['wash_colorchange']; ?>
        </td>
        <td>
          <?php echo $r['wash_acetate']; ?>
        </td>
        <td>
          <?php echo $r['wash_cotton']; ?>
        </td>
        <td>
          <?php echo $r['wash_nylon']; ?>
        </td>
        <td>
          <?php echo $r['wash_poly']; ?>
        </td>
        <td>
          <?php echo $r['wash_acrylic']; ?>
        </td>
        <td>
          <?php echo $r['wash_wool']; ?>
        </td>
        <td>
          <?php echo $r['wash_staining']; ?>
        </td>
        <td>
          <?php echo $r['wash_note']; ?>
        </td><!--10-->
        <td>
          <?php echo $r['acid_colorchange']; ?>
        </td>
        <td>
          <?php echo $r['acid_acetate']; ?>
        </td>
        <td>
          <?php echo $r['acid_cotton']; ?>
        </td>
        <td>
          <?php echo $r['acid_nylon']; ?>
        </td>
        <td>
          <?php echo $r['acid_poly']; ?>
        </td>
        <td>
          <?php echo $r['acid_acrylic']; ?>
        </td>
        <td>
          <?php echo $r['acid_wool']; ?>
        </td>
        <td>
          <?php echo $r['acid_staining']; ?>
        </td>
        <td>
          <?php echo $r['acid_note']; ?>
        </td><!--9-->
        <td>
          <?php echo $r['alkaline_colorchange']; ?>
        </td>
        <td>
          <?php echo $r['alkaline_acetate']; ?>
        </td>
        <td>
          <?php echo $r['alkaline_cotton']; ?>
        </td>
        <td>
          <?php echo $r['alkaline_nylon']; ?>
        </td>
        <td>
          <?php echo $r['alkaline_poly']; ?>
        </td>
        <td>
          <?php echo $r['alkaline_acrylic']; ?>
        </td>
        <td>
          <?php echo $r['alkaline_wool']; ?>
        </td>
        <td>
          <?php echo $r['alkaline_staining']; ?>
        </td>
        <td>
          <?php echo $r['alkaline_note']; ?>
        </td><!--9-->
        <td>
          <?php echo $r['water_colorchange']; ?>
        </td>
        <td>
          <?php echo $r['water_acetate']; ?>
        </td>
        <td>
          <?php echo $r['water_cotton']; ?>
        </td>
        <td>
          <?php echo $r['water_nylon']; ?>
        </td>
        <td>
          <?php echo $r['water_poly']; ?>
        </td>
        <td>
          <?php echo $r['water_acrylic']; ?>
        </td>
        <td>
          <?php echo $r['water_wool']; ?>
        </td>
        <td>
          <?php echo $r['water_staining']; ?>
        </td>
        <td>
          <?php echo $r['water_note']; ?>
        </td><!--9-->
        <td>
          <?php echo $r['dye_tf_acetate']; ?>
        </td>
        <td>
          <?php echo $r['dye_tf_cotton']; ?>
        </td>
        <td>
          <?php echo $r['dye_tf_nylon']; ?>
        </td>
        <td>
          <?php echo $r['dye_tf_poly']; ?>
        </td>
        <td>
          <?php echo $r['dye_tf_acrylic']; ?>
        </td>
        <td>
          <?php echo $r['dye_tf_wool']; ?>
        </td>
        <td>
          <?php echo $r['dye_tf_cstaining']; ?>
        </td>
        <td>
          <?php echo $r['dye_tf_sstaining']; ?>
        </td>
        <td>
          <?php echo $r['dye_tf_note']; ?>
        </td><!--9-->
        <td>
          <?php echo $r['crock_len1']; ?>
        </td>
        <td>
          <?php echo $r['crock_len2']; ?>
        </td>
        <td>
          <?php echo $r['crock_wid1']; ?>
        </td>
        <td>
          <?php echo $r['crock_wid2']; ?>
        </td>
        <td>
          <?php echo $r['crock_note']; ?>
        </td><!--5-->
        <td>
          <?php echo $r['phenolic_colorchange']; ?>
        </td>
        <td>
          <?php echo $r['phenolic_note']; ?>
        </td><!--2-->
        <td>
          <?php echo $r['ph']; ?>
        </td>
        <td>
          <?php echo $r['ph_note']; ?>
        </td><!--2-->
        <td>
          <?php echo $r['soil']; ?>
        </td>
        <td>
          <?php echo $r['soil_note']; ?>
        </td><!--2-->
        <td>
          <?php echo $r['humidity']; ?>
        </td>
        <td>
          <?php echo $r['humidity_note']; ?>
        </td><!--2-->
        <td>
          <?php echo $r['light_rating1']; ?>
        </td>
        <td>
          <?php echo $r['light_rating2']; ?>
        </td>
        <td>
          <?php echo $r['light_note']; ?>
        </td><!--3-->
        <td>
          <?php echo $r['cm_printing_colorchange']; ?>
        </td>
        <td>
          <?php echo $r['cm_printing_note']; ?>
        </td><!--2-->
        <td>
          <?php echo $r['cm_dye_temp']; ?>
        </td>
        <td>
          <?php echo $r['cm_dye_colorchange']; ?>
        </td>
        <td>
          <?php echo $r['cm_dye_stainingface']; ?>
        </td>
        <td>
          <?php echo $r['cm_dye_note']; ?>
        </td><!--4-->
        <td>
          <?php echo $r['light_pers_colorchange']; ?>
        </td>
        <td>
          <?php echo $r['light_pers_note']; ?>
        </td><!--2-->
        <td>
          <?php echo $r['saliva_staining']; ?>
        </td>
        <td>
          <?php echo $r['saliva_note']; ?>
        </td><!--2-->
        <td>
          <?php echo $r['bleeding']; ?>
        </td>
        <td>
          <?php echo $r['bleeding_root']; ?>
        </td>
        <td>
          <?php echo $r['bleeding_note']; ?>
        </td><!--2-->
        <td>
          <?php echo $r['chlorin']; ?>
        </td>
        <td>
          <?php echo $r['nchlorin1']; ?>
        </td>
        <td>
          <?php echo $r['nchlorin2']; ?>
        </td>
        <td>
          <?php echo $r['chlorin_note']; ?>
        </td><!--4-->
      </tr>


      <?php //penambahan no demand multiple 
        if (array_key_exists($r['idkk'], $array)) {

          foreach ($array[$r['idkk']] as $key => $d) {
            $no++;
            ?>
          <tr>
            <td>
              <?php echo $no; ?>
            </td>
            <td>'
              <?php echo $d; ?>
            </td>
            <td>'
              <?php echo $r['nodemand_new']; ?>
            </td>
            <td>
              <?php echo $r['tgl_masuk']; ?>
            </td>
            <td>
              <?php echo $r['no_test']; ?>
            </td>
            <td>
              <?php echo $r['no_item']; ?>
            </td>
            <td>
              <?php echo $r['pelanggan']; ?>
            </td>
            <td>
              <?php echo $r['no_po']; ?>
            </td>
            <td>
              <?php echo $r['no_order']; ?>
            </td>
            <td>
              <?php echo $r['jenis_kain']; ?>
            </td>
            <td>'
              <?php echo $r['lot']; ?>
            </td>
            <td>'
              <?php echo $r['lot_new']; ?>
            </td>
            <td>
              <?php echo $r['warna']; ?>
            </td>
            <td>'
              <?php echo $r['kk_legacy']; ?>
            </td>
            <td>'
              <?php echo $r['lot_legacy']; ?>
            </td>
            <td>
              <?php echo $rR['rol']; ?>
            </td>
            <td>
              <?php echo $rR['netto']; ?>
            </td>
            <td>
              <?php echo $r['proses_fin']; ?>
            </td>
            <td>
              <?php echo $r['lebar']; ?>
            </td>
            <td>
              <?php echo $r['f_width']; ?>
            </td>
            <td>
              <?php echo $r['gramasi']; ?>
            </td>
            <td>
              <?php echo $r['f_weight']; ?>
            </td>
            <td>
              <?php echo $r['fwe_note']; ?>
            </td> <!-- 5 -->

            <td>
              <?php echo $r['shrinkage_l1']; ?>
            </td>
            <td>
              <?php echo $r['shrinkage_w1']; ?>
            </td>
            <td>
              <?php echo $r['spirality1']; ?>
            </td>
            <td>
              <?php echo $r['shrinkage_l2']; ?>
            </td>
            <td>
              <?php echo $r['shrinkage_w2']; ?>
            </td>
            <td>
              <?php echo $r['spirality2']; ?>
            </td>
            <td>
              <?php echo $r['shrinkage_l3']; ?>
            </td>
            <td>
              <?php echo $r['shrinkage_w3']; ?>
            </td>
            <td>
              <?php echo $r['spirality3']; ?>
            </td>
            <td>
              <?php echo $r['shrinkage_l4']; ?>
            </td>
            <td>
              <?php echo $r['shrinkage_w4']; ?>
            </td>
            <td>
              <?php echo $r['spirality4']; ?>
            </td>



            <td>
              <?php if ($r['apperss_pf1'] != '') {
                echo "'" . $r['apperss_pf1'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_pf2'] != '') {
                echo "'" . $r['apperss_pf2'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_pf3'] != '') {
                echo "'" . $r['apperss_pf3'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_pf4'] != '') {
                echo "'" . $r['apperss_pf4'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_pb1'] != '') {
                echo "'" . $r['apperss_pb1'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_pb2'] != '') {
                echo "'" . $r['apperss_pb2'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_pb3'] != '') {
                echo "'" . $r['apperss_pb3'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_pb4'] != '') {
                echo "'" . $r['apperss_pb4'];
              } ?>
            </td>
            <td>
              <?php echo $r['apperss_ch1']; ?>
            </td>
            <td>
              <?php echo $r['apperss_ch2']; ?>
            </td>
            <td>
              <?php echo $r['apperss_ch3']; ?>
            </td>
            <td>
              <?php echo $r['apperss_ch4']; ?>
            </td>
            <td>
              <?php if ($r['apperss_cc1'] != '') {
                echo "'" . $r['apperss_cc1'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_cc2'] != '') {
                echo "'" . $r['apperss_cc2'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_cc3'] != '') {
                echo "'" . $r['apperss_cc3'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_ch4'] != '') {
                echo "'" . $r['apperss_ch4'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_sf1'] != '') {
                echo "'" . $r['apperss_sf1'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_sf2'] != '') {
                echo "'" . $r['apperss_sf2'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_sf3'] != '') {
                echo "'" . $r['apperss_sf3'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_sf4'] != '') {
                echo "'" . $r['apperss_sf4'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_sb1'] != '') {
                echo "'" . $r['apperss_sb1'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_sb2'] != '') {
                echo "'" . $r['apperss_sb2'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_sb3'] != '') {
                echo "'" . $r['apperss_sb3'];
              } ?>
            </td>
            <td>
              <?php if ($r['apperss_sb4'] != '') {
                echo "'" . $r['apperss_sb4'];
              } ?>
            </td>






            <td>
              <?php echo $r['shrinkage_l5']; ?>
            </td>
            <td>
              <?php echo $r['shrinkage_w5']; ?>
            </td>
            <td>
              <?php echo $r['spirality5']; ?>
            </td>
            <td>
              <?php echo $r['shrinkage_l6']; ?>
            </td>
            <td>
              <?php echo $r['shrinkage_w6']; ?>
            </td>
            <td>
              <?php echo $r['spirality6']; ?>
            </td>
            <td>
              <?php echo $r['sns_note']; ?>
            </td> <!--19-->
            <td>
              <?php echo $r['fibre_transfer']; ?>
            </td>
            <td>
              <?php echo $r['fibre_grade']; ?>
            </td>
            <td>
              <?php echo $r['fibre_note']; ?>
            </td><!--3-->
            <td>
              <?php echo $r['odour']; ?>
            </td>
            <td>
              <?php echo $r['odour_note']; ?>
            </td><!--2-->
            <td>
              <?php echo $r['bow']; ?>
            </td>
            <td>
              <?php echo $r['skew']; ?>
            </td>
            <td>
              <?php echo $r['bas_note']; ?>
            </td><!--3-->
            <td>
              <?php echo $r['pm_f1']; ?>
            </td>
            <td>
              <?php echo $r['pm_b1']; ?>
            </td>
            <td>
              <?php echo $r['pm_f2']; ?>
            </td>
            <td>
              <?php echo $r['pm_b2']; ?>
            </td>
            <td>
              <?php echo $r['pm_f3']; ?>
            </td>
            <td>
              <?php echo $r['pm_b3']; ?>
            </td>
            <td>
              <?php echo $r['pm_f4']; ?>
            </td>
            <td>
              <?php echo $r['pm_b4']; ?>
            </td>
            <td>
              <?php echo $r['pm_f5']; ?>
            </td>
            <td>
              <?php echo $r['pm_b5']; ?>
            </td>
            <td>
              <?php echo $r['pillm_note']; ?>
            </td><!--11-->
            <td>
              <?php echo $r['pb_f1']; ?>
            </td>
            <td>
              <?php echo $r['pb_b1']; ?>
            </td>
            <td>
              <?php echo $r['pillb_note']; ?>
            </td><!--3-->
            <td>
              <?php echo $r['prt_f1']; ?>
            </td>
            <td>
              <?php echo $r['prt_b1']; ?>
            </td>
            <td>
              <?php echo $r['prt_f2']; ?>
            </td>
            <td>
              <?php echo $r['prt_b2']; ?>
            </td>
            <td>
              <?php echo $r['prt_f3']; ?>
            </td>
            <td>
              <?php echo $r['prt_b3']; ?>
            </td>
            <td>
              <?php echo $r['prt_f4']; ?>
            </td>
            <td>
              <?php echo $r['prt_b4']; ?>
            </td>
            <td>
              <?php echo $r['prt_f5']; ?>
            </td>
            <td>
              <?php echo $r['prt_b5']; ?>
            </td>
            <td>
              <?php echo $r['pillr_note']; ?>
            </td><!--11-->
            <td>
              <?php echo $r['pl_f1']; ?>
            </td>
            <td>
              <?php echo $r['pl_b1']; ?>
            </td>
            <td>
              <?php echo $r['pl_f2']; ?>
            </td>
            <td>
              <?php echo $r['pl_b2']; ?>
            </td>
            <td>
              <?php echo $r['pl_f3']; ?>
            </td>
            <td>
              <?php echo $r['pl_b3']; ?>
            </td>
            <td>
              <?php echo $r['pl_f4']; ?>
            </td>
            <td>
              <?php echo $r['pl_b4']; ?>
            </td>
            <td>
              <?php echo $r['pl_f5']; ?>
            </td>
            <td>
              <?php echo $r['pl_b5']; ?>
            </td>
            <td>
              <?php echo $r['pilll_note']; ?>
            </td><!--11-->
            <td>
              <?php echo $r['abration']; ?>
            </td>
            <td>
              <?php echo $r['abr_note']; ?>
            </td><!--2-->
            <td>
              <?php echo $r['sm_l1']; ?>
            </td>
            <td>
              <?php echo $r['sm_w1']; ?>
            </td>
            <td>
              <?php echo $r['sm_l2']; ?>
            </td>
            <td>
              <?php echo $r['sm_w2']; ?>
            </td>
            <td>
              <?php echo $r['sm_l3']; ?>
            </td>
            <td>
              <?php echo $r['sm_w3']; ?>
            </td>
            <td>
              <?php echo $r['sm_l4']; ?>
            </td>
            <td>
              <?php echo $r['sm_w4']; ?>
            </td>
            <td>
              <?php echo $r['snam_note']; ?>
            </td><!--9-->
            <td>
              <?php echo $r['sb_l1']; ?>
            </td>
            <td>
              <?php echo $r['sb_w1']; ?>
            </td>
            <td>
              <?php echo $r['snab_note']; ?>
            </td><!--3-->
            <td>
              <?php echo $r['bs_instron']; ?>
            </td>
            <td>
              <?php echo $r['bs_mullen']; ?>
            </td>
            <td>
              <?php echo $r['bs_tru']; ?>
            </td>
            <td>
              <?php echo $r['burs_note']; ?>
            </td><!--4-->
            <td>
              <?php echo $r['nedle'] ?>
            </td>
            <td>
              <?php echo $r['nedle_note'] ?>
            </td>
            <td>
              <?php echo $r['wrinkle'] ?>
            </td>
            <td>
              <?php echo $r['wrinkle1'] ?>
            </td>
            <td>
              <?php echo $r['wrinkle2'] ?>
            </td>
            <td>
              <?php echo $r['wrinkle_note'] ?>
            </td>
            <td>
              <?php echo $r['wick_l1']; ?>
            </td>
            <td>
              <?php echo $r['wick_w1']; ?>
            </td>
            <td>
              <?php echo $r['wick_l2']; ?>
            </td>
            <td>
              <?php echo $r['wick_w2']; ?>
            </td>
            <td>
              <?php echo $r['wick_l3']; ?>
            </td>
            <td>
              <?php echo $r['wick_w3']; ?>
            </td>
            <td>
              <?php echo $r['wick_note']; ?>
            </td><!--7-->
            <td>
              <?php echo $r['absor_f2']; ?>
            </td>
            <td>
              <?php echo $r['absor_f1']; ?>
            </td>
            <td>
              <?php echo $r['absor_b2']; ?>
            </td>
            <td>
              <?php echo $r['absor_b1']; ?>
            </td>
            <td>
              <?php echo $r['absor_f3']; ?>
            </td>
            <td>
              <?php echo $r['absor_b3']; ?>
            </td>
            <td>
              <?php echo $r['absor_note']; ?>
            </td><!--7-->
            <td>
              <?php echo $r['dry1']; ?>
            </td>
            <td>
              <?php echo $r['dry2']; ?>
            </td>
            <td>
              <?php echo $r['dry3']; ?>
            </td>
            <td>
              <?php echo $r['dryaf1']; ?>
            </td>
            <td>
              <?php echo $r['dryaf2']; ?>
            </td>
            <td>
              <?php echo $r['dryaf3']; ?>
            </td>
            <td>
              <?php echo $r['dry_note']; ?>
            </td><!--7-->
            <td>
              <?php echo $r['repp1']; ?>
            </td>
            <td>
              <?php echo $r['repp2']; ?>
            </td>
            <td>
              <?php echo $r['repp3']; ?>
            </td>
            <td>
              <?php echo $r['repp4']; ?>
            </td>
            <td>
              <?php echo $r['repp_note']; ?>
            </td><!--5-->
            <td>
              <?php echo $r['load_stretch']; ?>
            </td>
            <td>
              <?php echo $r['stretch_l1']; ?>
            </td>
            <td>
              <?php echo $r['stretch_w1']; ?>
            </td>
            <td>
              <?php echo $r['recover_l1']; ?>
            </td>
            <td>&nbsp;</td>
            <td>
              <?php echo $r['recover_w1']; ?>
            </td>
            <td>&nbsp;</td>
            <td>
              <?php echo $r['stretch_l2']; ?>
            </td>
            <td>
              <?php echo $r['stretch_w2']; ?>
            </td>
            <td>
              <?php echo $r['recover_l2']; ?>
            </td>
            <td>&nbsp;</td>
            <td>
              <?php echo $r['recover_w2']; ?>
            </td>
            <td>&nbsp;</td>
            <td>
              <?php echo $r['stretch_l3']; ?>
            </td>
            <td>
              <?php echo $r['stretch_w3']; ?>
            </td>
            <td>
              <?php echo $r['recover_l3']; ?>
            </td>
            <td>&nbsp;</td>
            <td>
              <?php echo $r['recover_w3']; ?>
            </td>
            <td>&nbsp;</td>
            <td>
              <?php echo $r['stretch_l4']; ?>
            </td>
            <td>
              <?php echo $r['stretch_w4']; ?>
            </td>
            <td>
              <?php echo $r['recover_l4']; ?>
            </td>
            <td>&nbsp;</td>
            <td>
              <?php echo $r['recover_w4']; ?>
            </td>
            <td>&nbsp;</td>
            <td>
              <?php echo $r['stretch_l5']; ?>
            </td>
            <td>
              <?php echo $r['stretch_w5']; ?>
            </td>
            <td>
              <?php echo $r['recover_l5']; ?>
            </td>
            <td>&nbsp;</td>
            <td>
              <?php echo $r['recover_w5']; ?>
            </td>
            <td>&nbsp;</td>
            <td>
              <?php echo $r['stretch_note'] . " " . $r['recover_note']; ?>
            </td><!--32-->
            <td>
              <?php echo $r['growth_l1']; ?>
            </td>
            <td>
              <?php echo $r['growth_l2']; ?>
            </td>
            <td>
              <?php echo $r['growth_w1']; ?>
            </td>
            <td>
              <?php echo $r['growth_w2']; ?>
            </td>
            <td>
              <?php echo $r['rec_growth_l1']; ?>
            </td>
            <td>
              <?php echo $r['rec_growth_l2']; ?>
            </td>
            <td>
              <?php echo $r['rec_growth_w1']; ?>
            </td>
            <td>
              <?php echo $r['rec_growth_w2']; ?>
            </td>
            <td>
              <?php echo $r['growth_note']; ?>
            </td><!--9-->
            <td>
              <?php echo $r['apper_ch1']; ?>
            </td>
            <td>
              <?php echo $r['apper_st']; ?>
            </td>
            <td>
              <?php echo $r['apper_pf1']; ?>
            </td>
            <td>
              <?php echo $r['apper_pb1']; ?>
            </td>
            <td>
              <?php echo $r['apper_acetate']; ?>
            </td>
            <td>
              <?php echo $r['apper_cotton']; ?>
            </td>
            <td>
              <?php echo $r['apper_nylon']; ?>
            </td>
            <td>
              <?php echo $r['apper_poly']; ?>
            </td>
            <td>
              <?php echo $r['apper_acrylic']; ?>
            </td>
            <td>
              <?php echo $r['apper_wool']; ?>
            </td>
            <td>
              <?php echo $r['apper_ch2']; ?>
            </td>
            <td>
              <?php echo $r['apper_pf2']; ?>
            </td>
            <td>
              <?php echo $r['apper_pb2']; ?>
            </td>
            <td>
              <?php echo $r['apper_st2']; ?>
            </td>
            <td>
              <?php echo $r['apper_ch3']; ?>
            </td>
            <td>
              <?php echo $r['apper_pf3']; ?>
            </td>
            <td>
              <?php echo $r['apper_pb3']; ?>
            </td>
            <td>
              <?php echo $r['apper_st3']; ?>
            </td>
            <td>
              <?php echo $r['apper_note']; ?>
            </td><!--19-->
            <td>
              <?php echo $r['thick1']; ?>
            </td>
            <td>
              <?php echo $r['thick2']; ?>
            </td>
            <td>
              <?php echo $r['thick3']; ?>
            </td>
            <td>
              <?php echo $r['thickav']; ?>
            </td>
            <td>
              <?php echo $r['thick_note']; ?>
            </td><!--5-->
            <td>
              <?php echo $r['fc_cott']; ?>
            </td>
            <td>
              <?php echo $r['fc_poly']; ?>
            </td>
            <td>
              <?php echo $r['fc_elastane']; ?>
            </td>
            <td>&nbsp;</td>
            <td>
              <?php echo $r['fiber_note']; ?>
            </td><!--5-->
            <td>
              <?php echo $r['flamability']; ?>
            </td>
            <td>
              <?php echo $r['fla_note']; ?>
            </td><!--2-->
            <td>
              <?php echo $r['fc_cpi']; ?>
            </td>
            <td>
              <?php echo $r['fc_wpi']; ?>
            </td>
            <td>
              <?php echo $r['fc_note']; ?>
            </td><!--3-->
            <td>
              <?php echo $r['sp_grdl1']; ?>
            </td>
            <td>
              <?php echo $r['sp_clsl1']; ?>
            </td>
            <td>
              <?php echo $r['sp_shol1']; ?>
            </td>
            <td>
              <?php echo $r['sp_medl1']; ?>
            </td>
            <td>
              <?php echo $r['sp_lonl1']; ?>
            </td>
            <td>
              <?php echo $r['sp_grdw1']; ?>
            </td>
            <td>
              <?php echo $r['sp_clsw1']; ?>
            </td>
            <td>
              <?php echo $r['sp_show1']; ?>
            </td>
            <td>
              <?php echo $r['sp_medw1']; ?>
            </td>
            <td>
              <?php echo $r['sp_lonw1']; ?>
            </td>
            <td>
              <?php echo $r['sp_grdl2']; ?>
            </td>
            <td>
              <?php echo $r['sp_clsl2']; ?>
            </td>
            <td>
              <?php echo $r['sp_shol2']; ?>
            </td>
            <td>
              <?php echo $r['sp_medl2']; ?>
            </td>
            <td>
              <?php echo $r['sp_lonl2']; ?>
            </td>
            <td>
              <?php echo $r['sp_grdw2']; ?>
            </td>
            <td>
              <?php echo $r['sp_clsw2']; ?>
            </td>
            <td>
              <?php echo $r['sp_show2']; ?>
            </td>
            <td>
              <?php echo $r['sp_medw2']; ?>
            </td>
            <td>
              <?php echo $r['sp_lonw2']; ?>
            </td>
            <td>
              <?php echo $r['snap_note']; ?>
            </td><!--21-->
            <td>
              <?php echo $r['wash_temp']; ?>
            </td>
            <td>
              <?php echo $r['wash_colorchange']; ?>
            </td>
            <td>
              <?php echo $r['wash_acetate']; ?>
            </td>
            <td>
              <?php echo $r['wash_cotton']; ?>
            </td>
            <td>
              <?php echo $r['wash_nylon']; ?>
            </td>
            <td>
              <?php echo $r['wash_poly']; ?>
            </td>
            <td>
              <?php echo $r['wash_acrylic']; ?>
            </td>
            <td>
              <?php echo $r['wash_wool']; ?>
            </td>
            <td>
              <?php echo $r['wash_staining']; ?>
            </td>
            <td>
              <?php echo $r['wash_note']; ?>
            </td><!--10-->
            <td>
              <?php echo $r['acid_colorchange']; ?>
            </td>
            <td>
              <?php echo $r['acid_acetate']; ?>
            </td>
            <td>
              <?php echo $r['acid_cotton']; ?>
            </td>
            <td>
              <?php echo $r['acid_nylon']; ?>
            </td>
            <td>
              <?php echo $r['acid_poly']; ?>
            </td>
            <td>
              <?php echo $r['acid_acrylic']; ?>
            </td>
            <td>
              <?php echo $r['acid_wool']; ?>
            </td>
            <td>
              <?php echo $r['acid_staining']; ?>
            </td>
            <td>
              <?php echo $r['acid_note']; ?>
            </td><!--9-->
            <td>
              <?php echo $r['alkaline_colorchange']; ?>
            </td>
            <td>
              <?php echo $r['alkaline_acetate']; ?>
            </td>
            <td>
              <?php echo $r['alkaline_cotton']; ?>
            </td>
            <td>
              <?php echo $r['alkaline_nylon']; ?>
            </td>
            <td>
              <?php echo $r['alkaline_poly']; ?>
            </td>
            <td>
              <?php echo $r['alkaline_acrylic']; ?>
            </td>
            <td>
              <?php echo $r['alkaline_wool']; ?>
            </td>
            <td>
              <?php echo $r['alkaline_staining']; ?>
            </td>
            <td>
              <?php echo $r['alkaline_note']; ?>
            </td><!--9-->
            <td>
              <?php echo $r['water_colorchange']; ?>
            </td>
            <td>
              <?php echo $r['water_acetate']; ?>
            </td>
            <td>
              <?php echo $r['water_cotton']; ?>
            </td>
            <td>
              <?php echo $r['water_nylon']; ?>
            </td>
            <td>
              <?php echo $r['water_poly']; ?>
            </td>
            <td>
              <?php echo $r['water_acrylic']; ?>
            </td>
            <td>
              <?php echo $r['water_wool']; ?>
            </td>
            <td>
              <?php echo $r['water_staining']; ?>
            </td>
            <td>
              <?php echo $r['water_note']; ?>
            </td><!--9-->
            <td>
              <?php echo $r['dye_tf_acetate']; ?>
            </td>
            <td>
              <?php echo $r['dye_tf_cotton']; ?>
            </td>
            <td>
              <?php echo $r['dye_tf_nylon']; ?>
            </td>
            <td>
              <?php echo $r['dye_tf_poly']; ?>
            </td>
            <td>
              <?php echo $r['dye_tf_acrylic']; ?>
            </td>
            <td>
              <?php echo $r['dye_tf_wool']; ?>
            </td>
            <td>
              <?php echo $r['dye_tf_cstaining']; ?>
            </td>
            <td>
              <?php echo $r['dye_tf_sstaining']; ?>
            </td>
            <td>
              <?php echo $r['dye_tf_note']; ?>
            </td><!--9-->
            <td>
              <?php echo $r['crock_len1']; ?>
            </td>
            <td>
              <?php echo $r['crock_len2']; ?>
            </td>
            <td>
              <?php echo $r['crock_wid1']; ?>
            </td>
            <td>
              <?php echo $r['crock_wid2']; ?>
            </td>
            <td>
              <?php echo $r['crock_note']; ?>
            </td><!--5-->
            <td>
              <?php echo $r['phenolic_colorchange']; ?>
            </td>
            <td>
              <?php echo $r['phenolic_note']; ?>
            </td><!--2-->
            <td>
              <?php echo $r['ph']; ?>
            </td>
            <td>
              <?php echo $r['ph_note']; ?>
            </td><!--2-->
            <td>
              <?php echo $r['soil']; ?>
            </td>
            <td>
              <?php echo $r['soil_note']; ?>
            </td><!--2-->
            <td>
              <?php echo $r['humidity']; ?>
            </td>
            <td>
              <?php echo $r['humidity_note']; ?>
            </td><!--2-->
            <td>
              <?php echo $r['light_rating1']; ?>
            </td>
            <td>
              <?php echo $r['light_rating2']; ?>
            </td>
            <td>
              <?php echo $r['light_note']; ?>
            </td><!--3-->
            <td>
              <?php echo $r['cm_printing_colorchange']; ?>
            </td>
            <td>
              <?php echo $r['cm_printing_note']; ?>
            </td><!--2-->
            <td>
              <?php echo $r['cm_dye_temp']; ?>
            </td>
            <td>
              <?php echo $r['cm_dye_colorchange']; ?>
            </td>
            <td>
              <?php echo $r['cm_dye_stainingface']; ?>
            </td>
            <td>
              <?php echo $r['cm_dye_note']; ?>
            </td><!--4-->
            <td>
              <?php echo $r['light_pers_colorchange']; ?>
            </td>
            <td>
              <?php echo $r['light_pers_note']; ?>
            </td><!--2-->
            <td>
              <?php echo $r['saliva_staining']; ?>
            </td>
            <td>
              <?php echo $r['saliva_note']; ?>
            </td><!--2-->
            <td>
              <?php echo $r['bleeding']; ?>
            </td>
            <td>
              <?php echo $r['bleeding_root']; ?>
            </td>
            <td>
              <?php echo $r['bleeding_note']; ?>
            </td><!--2-->
            <td>
              <?php echo $r['chlorin']; ?>
            </td>
            <td>
              <?php echo $r['nchlorin1']; ?>
            </td>
            <td>
              <?php echo $r['nchlorin2']; ?>
            </td>
            <td>
              <?php echo $r['chlorin_note']; ?>
            </td><!--4-->
          </tr>

        <?php }
        } ?>



      <?php $no++;
    } ?>
  </table>
</body>