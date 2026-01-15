<?php 
ini_set("error_reporting", 1);
set_time_limit(0);
session_start();
include "../../koneksi.php";
 
function format_sqlsrv_date($value) {
    if ($value instanceof DateTime) {
        return $value->format('Y-m-d');
    }
    return $value;
}
function format_decimal_2($value) {
if ($value === null || $value === '') {
return '0.00';
}
if (is_numeric($value)) {
return number_format((float)$value, 2, '.', '');
}
return $value;
}
if (isset($_POST['sql'])) { 
	$sql_code =  $_POST['sql'];
?>

<?php
$now = date("Ymdhis");
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=reportbonpenghubung_mkt".$now.".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>

<?php
function suratJalan($prodOrder, $po) {
    global $conn1;
  
    $sqlDB2 = "SELECT
                SALESDOCUMENTLINE.SALESDOCUMENTPROVISIONALCODE AS SJ,
                CASE
                  WHEN SALESDOCUMENT.GOODSISSUEDATE IS NULL THEN SALESDOCUMENT.PROVISIONALDOCUMENTDATE
                    ELSE SALESDOCUMENT.GOODSISSUEDATE
                  END AS TGL_KIRIM
              FROM
                SALESDOCUMENTLINE SALESDOCUMENTLINE
              LEFT JOIN ALLOCATION ALLOCATION ON SALESDOCUMENTLINE.SALESDOCUMENTPROVISIONALCODE = ALLOCATION.ORDERCODE AND SALESDOCUMENTLINE.ORDERLINE = ALLOCATION.ORDERLINE 
              LEFT JOIN SALESDOCUMENT SALESDOCUMENT ON SALESDOCUMENTLINE.SALESDOCUMENTPROVISIONALCODE = SALESDOCUMENT.PROVISIONALCODE 
              LEFT JOIN SALESORDER SALESORDER ON SALESDOCUMENTLINE.DLVSALORDERLINESALESORDERCODE = SALESORDER.CODE 
              LEFT JOIN SALESORDERLINE SALESORDERLINE ON SALESDOCUMENTLINE.DLVSALORDERLINESALESORDERCODE = SALESORDERLINE.SALESORDERCODE AND SALESDOCUMENTLINE.DLVSALESORDERLINEORDERLINE = SALESORDERLINE.ORDERLINE
              LEFT JOIN (
                SELECT
                  ALLOCATION.CODE,
                  ALLOCATION.LOTCODE,
                  COUNT(ALLOCATION.ITEMELEMENTCODE) AS ROLL,
                  SUM(ALLOCATION.USERPRIMARYQUANTITY) AS USERPRIMARYQUANTITY,
                  ALLOCATION.USERPRIMARYUOMCODE,
                  SUM(ALLOCATION.USERSECONDARYQUANTITY) AS USERSECONDARYQUANTITY,
                  ALLOCATION.USERSECONDARYUOMCODE
                FROM
                  ALLOCATION ALLOCATION
                WHERE
                  ALLOCATION.DETAILTYPE = '0'
                GROUP BY
                  ALLOCATION.CODE,
                  ALLOCATION.LOTCODE,
                  ALLOCATION.USERPRIMARYUOMCODE,
                  ALLOCATION.USERSECONDARYUOMCODE
                ) A ON ALLOCATION.CODE = A.CODE 
              WHERE
                A.LOTCODE = '$prodOrder' 
                AND (SALESORDER.EXTERNALREFERENCE LIKE '%$po%' OR SALESORDERLINE.EXTERNALREFERENCE LIKE '%$po%')
              GROUP BY
                SALESDOCUMENTLINE.SALESDOCUMENTPROVISIONALCODE,
                A.LOTCODE,
                SALESDOCUMENT.PROVISIONALDOCUMENTDATE,
                SALESDOCUMENT.GOODSISSUEDATE
              LIMIT 1";
  
    $stmt=db2_exec($conn1,$sqlDB2, array('cursor'=>DB2_SCROLLABLE));
    $row1=db2_fetch_assoc($stmt);
  
    return $row1;
}
?>

<script>
    function init() {
        setTimeout(() => {
            document.getElementById('ini-1').innerHTML = 'hahah'
        }, 5000);
        setTimeout(() => {
            document.getElementById('ini-2').innerHTML = 'hahah'
        }, 2000);
        setTimeout(() => {
            document.getElementById('ini-3').innerHTML = 'hahah'
        }, 3000);
    }

    document.addEventListener('DOMContentLoaded', init);
</script>

<table border="1" id="myTable">
    <thead class="bg-blue">
        <tr>  
            <th rowspan=2><div align="center" valign="middle">DATE</div></th>
            <th  rowspan=2><div align="center" valign="middle">STATUS</div></th>
            <th  rowspan=2><div align="center" valign="middle">CUSTOMER</div></th>
            <th  rowspan=2><div align="center" valign="middle">BUYER</div></th>
            <th  rowspan=2><div align="center" valign="middle">PO</div></th>
            <th  rowspan=2><div align="center" valign="middle">ORDER</div></th>
            <th  rowspan=2><div align="center" valign="middle">HANGER</div></th>
            <th  rowspan=2><div align="center" valign="middle">ITEM</div></th>
            <th  rowspan=2><div align="center" valign="middle">COLOR</div></th>
            <th rowspan=2><div align="center" valign="middle">LOT-LEGACY</div></th>
            <th  rowspan=2><div align="center" valign="middle">LOT</div></th>
            <th  rowspan=2><div align="center" valign="middle">DEMAND</div></th>
            <th colspan=2 ><div align="center" valign="middle">QTY-ORDER</div></th>
            <th colspan=3 ><div align="center" valign="middle">QTY-PACKING</div></th>
            <th colspan=2 ><div align="center" valign="middle">QTY FOC</div></th>
            <th colspan=2 ><div align="center" valign="middle">ESTIMASI FOC</div></th>
            <th colspan=3 ><div align="center" valign="middle">QTY-BERMASALAH</div></th>
            <th  rowspan=2><div align="center" valign="middle">ISSUE</div></th>
            <th  rowspan=2><div align="center" valign="middle">NOTES</div></th>
            <th  rowspan=2><div align="center" valign="middle">ADVICE FROM PRODUCTION/QC</div></th>
        </tr>
        <tr>  
            <th><div align="center" valign="middle">KG</div></th>
            <th><div align="center" valign="middle">YARD</div></th>
            <!-- qc packing -->
            <th><div align="center" valign="middle">ROLL</div></th>
            <th><div align="center" valign="middle">KG</div></th>
            <th><div align="center" valign="middle">YARD</div></th>
            <th><div align="center" valign="middle">KG</div></th>
            <th><div align="center" valign="middle">YARD</div></th>
            <th><div align="center" valign="middle">KG</div></th>
            <th><div align="center" valign="middle">YARD</div></th>
            <!-- qty masalah -->
            <th><div align="center" valign="middle">ROLL</div></th>
            <th><div align="center" valign="middle">KG</div></th>
            <th><div align="center" valign="middle">YARD</div></th>
        </tr>
    </thead>
    <tbody>
          <?php
              $no=1;
              $sql=sqlsrv_query($con,$sql_code);	

              while($row1=sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)){
                  $dtArr=$row1['t_jawab'];
                  $data = explode(",",$dtArr);
                  $dtArr1=$row1['persen'];
                  $data1 = explode(",",$dtArr1);
              
                  if ($row1['penghubung_dep_persen'] !='') {
                      $array_persen = array();
                      $arrayA = explode(',', $row1['penghubung_dep_persen']);
                          foreach ($arrayA as $element) {
                              $array_persen[] = $element ;
                          }
                  }
                  // $sj = suratJalan($row1['lot'], $row1['no_po']);
          ?>
        <tr bgcolor="<?php echo $bgcolor; ?>">
            <td align="center"><?php echo format_sqlsrv_date($row1['tgl_masuk']);?></td>
            <td align="center"><?php $rsts= sqlsrv_query($con,"SELECT * FROM db_qc.tbl_bonpenghubung_mail WHERE nodemand='$row1[nodemand]'");
              $dtsts = sqlsrv_fetch_array($rsts, SQLSRV_FETCH_ASSOC);
              if($dtsts['status_approve']==1){
                echo 'APPROVE OLEH : '.$dtsts['approve_mkt'];
              }else if($dtsts['status_approve']==99){
                echo 'REJECT OLEH : '.$dtsts['approve_mkt'];
              }else if($dtsts['status_approve']==2){
                echo 'CLOSED OLEH : '.$dtsts['closed_ppc'];
              } else {
                echo '';
              }?></td>
            <td align="center"><?php echo explode('/', $row1['pelanggan'])[0];?></td>
			      <td align="center"><?php echo explode('/', $row1['pelanggan'])[1];?></td>
            <td align="center"><?php echo $row1['no_po'];?></td>
            <td align="center"><?php echo $row1['no_order'];?></td>
            <td align="center"><?php echo $row1['no_hanger'];?></td>
            <td align="center"><?php echo $row1['no_item'];?></td>
            <td align="center"><?php echo $row1['warna'];?></td>
            <td align="center"><?php echo $row1['lot_legacy']; ?></td>
            <td align="center"><?php echo $row1['lot'];?></td>
            <td align="center"><?php echo $row1['nodemand'];?></td>
            <!-- qty order -->
            <td align="center"><?php echo $row1['berat_order'];?></td>
            <td align="center"><?php echo $row1['panjang_order'];?></td>
            <!-- qty -->
            <!-- qc packing -->
            <td align="center"><?php echo $row1['rol'];?></td>
            <td align="center"><?php echo $row1['netto'];?></td>
            <td align="center"><?php echo $row1['panjang'];?></td>
            <td align="center"><?php echo format_decimal_2($row1['berat_extra']);?></td>
            <td align="center"><?php echo format_decimal_2($row1['panjang_extra']);?></td>
            <!-- ESTIMASI -->
            <td align="center"><?php echo format_decimal_2($row1['estimasi']);?></td>
            <td align="center"><?php echo format_decimal_2($row1['panjang_estimasi']);?></td>
            <!-- qty bermasalah -->
            <td align="center"><?php echo $row1['penghubung_roll1'];?></td>
            <td align="center"><?php echo $row1['penghubung_roll2'];?></td>
            <td align="center"><?php echo $row1['penghubung_roll3'];?></td>
            <td align="center"><?php echo $row1['penghubung_masalah'];?></td>
            <td align="center"><?php echo $row1['penghubung_keterangan'];?></td>
            <td align="center"><?php echo $row1['advice1']; ?></td>
        </tr>

        <?php if($row1['penghubung2_roll1'] and  $row1['penghubung2_roll1'] !='') { ?>
        <tr bgcolor="<?php echo $bgcolor; ?>">
            <td align="center"><?php echo format_sqlsrv_date($row1['tgl_masuk']);?></td>
            <td align="center"><?php $rsts= sqlsrv_query($con,"SELECT * FROM db_qc.tbl_bonpenghubung_mail WHERE nodemand='$row1[nodemand]'");
                $dtsts = sqlsrv_fetch_array($rsts, SQLSRV_FETCH_ASSOC);
                if($dtsts['status_approve']==1){
                  echo 'APPROVE OLEH : '.$dtsts['approve_mkt'];
                }else if($dtsts['status_approve']==99){
                  echo 'REJECT OLEH : '.$dtsts['approve_mkt'];
                }else if($dtsts['status_approve']==2){
                  echo 'CLOSED OLEH : '.$dtsts['closed_ppc'];
                } else {
                  echo '';
                }?></td>
            <td align="center"><?php echo explode('/', $row1['pelanggan'])[0];?></td>
            <td align="center"><?php echo explode('/', $row1['pelanggan'])[1];?></td>
            <td align="center"><?php echo $row1['no_po'];?></td>
            <td align="center"><?php echo $row1['no_order'];?></td>
            <td align="center"><?php echo $row1['no_hanger'];?></td>
            <td align="center"><?php echo $row1['no_item'];?></td>
            <td align="center"><?php echo $row1['warna'];?></td>
            <td align="center"><?php echo $row1['lot_legacy']; ?></td>
            <td align="center"><?php echo $row1['lot'];?></td>
            <td align="center"><?php echo $row1['nodemand'];?></td>
            <!-- qty order -->
            <td align="center"><?php echo $row1['berat_order'];?></td>
            <td align="center"><?php echo $row1['panjang_order'];?></td>
            <!-- qc packing -->
            <td align="center"><?php echo $row1['rol'];?></td>
            <td align="center"><?php echo $row1['netto'];?></td>
            <td align="center"><?php echo $row1['panjang'];?></td>
            <!-- Tambahan -->
            <td></td>
            <td></td>
            <!-- ESTINASI -->
            <td align="center"></td>
            <td align="center"></td>
            <!-- qty bermasalah -->
            <td align="center"><?php echo $row1['penghubung_roll1'];?></td>
            <td align="center"><?php echo $row1['penghubung_roll2'];?></td>
            <td align="center"><?php echo $row1['penghubung_roll3'];?></td>

            <td align="center"><?php echo $row1['penghubung2_masalah'];?></td>
            <td align="center"><?php echo $row1['penghubung2_keterangan'];?></td>
            <td align="center"><?php echo $row1['advice2']; ?></td>	 
        </tr>
        <?php } ?>

        <?php if($row1['penghubung3_roll1'] and  $row1['penghubung3_roll1'] !='') {  ?>
		<tr bgcolor="<?php echo $bgcolor; ?>">
        <td align="center"><?php echo format_sqlsrv_date($row1['tgl_masuk']);?></td>
        <td align="center"><?php $rsts= sqlsrv_query($con,"SELECT * FROM db_qc.tbl_bonpenghubung_mail WHERE nodemand='$row1[nodemand]'");
            $dtsts = sqlsrv_fetch_array($rsts, SQLSRV_FETCH_ASSOC);
            if($dtsts['status_approve']==1){
              echo 'APPROVE OLEH : '.$dtsts['approve_mkt'];
            }else if($dtsts['status_approve']==99){
              echo 'REJECT OLEH : '.$dtsts['approve_mkt'];
            }else if($dtsts['status_approve']==2){
              echo 'CLOSED OLEH : '.$dtsts['closed_ppc'];
            } else {
              echo '';
            }?></td>
			<td align="center"><?php echo explode('/', $row1['pelanggan'])[0];?></td>
			<td align="center"><?php echo explode('/', $row1['pelanggan'])[1];?></td>
            <td align="center"><?php echo $row1['no_po'];?></td>
            <td align="center"><?php echo $row1['no_order'];?></td>
            <td align="center"><?php echo $row1['no_hanger'];?></td>
            <td align="center"><?php echo $row1['no_item'];?></td>
            <td align="center"><?php echo $row1['warna'];?></td>
            <td align="center"><?php echo $row1['lot_legacy']; ?></td>
            <td align="center"><?php echo $row1['lot'];?></td>
            <td align="center"><?php echo $row1['nodemand'];?></td>
            <!-- qty order -->
            <td align="center"><?php echo $row1['berat_order'];?></td>
            <td align="center"><?php echo $row1['panjang_order'];?></td>
          <!-- qc packing -->
            <td align="center"><?php echo $row1['rol'];?></td>
            <td align="center"><?php echo $row1['netto'];?></td>
            <td align="center"><?php echo $row1['panjang'];?></td>
            <!-- Tambahan -->
            <td></td>
            <td></td>

            <!-- ESTINASI -->
			<td align="center"></td>
			<td align="center"></td>

            <!-- qty bermasalah -->
            <td align="center"><?php echo $row1['penghubung_roll1'];?></td>
            <td align="center"><?php echo $row1['penghubung_roll2'];?></td>
            <td align="center"><?php echo $row1['penghubung_roll3'];?></td>

            <td align="center"><?php echo $row1['penghubung3_masalah'];?></td>
            <td align="center"><?php echo $row1['penghubung3_keterangan'];?></td>
            <td align="center"><?php echo $row1['advice3']; ?></td>	
        </tr>
        <?php  } ?>

        <?php
            $no++;  
        } 
        ?>
    </tbody>
</table>


































<?php }
?>