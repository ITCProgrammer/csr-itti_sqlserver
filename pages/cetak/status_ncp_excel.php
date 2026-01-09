<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=status-ncp-new-".date($_GET['awal']).".xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda

ini_set("error_reporting", 1);
set_time_limit(0);
session_start();
include "../../koneksi.php";

?>

<!DOCTYPE html
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Status NCP</title>
</head>

<body>
  <?php
  $Awal = isset($_GET['awal']) ? $_GET['awal'] : '';
  $Akhir = isset($_GET['akhir']) ? $_GET['akhir'] : '';
  $GShift = isset($_GET['gshift']) ? $_GET['gshift'] : '';
  $Dept = isset($_GET['dept']) ? $_GET['dept'] : '';
  $NCP = isset($_GET['no_ncp']) ? $_GET['no_ncp'] : '';
	
  $FilterByStatus = isset($_GET['filter_by_status']) ? $_GET['filter_by_status'] : '';

  $hitung = isset($_GET['hitung']) ? $_GET['hitung'] : '';
  $posisi_terakhir = isset($_GET['posisi_terakhir']) ? $_GET['posisi_terakhir'] : '';

  if ($_GET['gshift'] == "ALL") {
    $shft = " ";
  } else {
    $shft = " AND b.g_shift = '$GShift' ";
  }

  function getStatusByDemand($demand)
  {
    global $conn1;

    $sql = "SELECT DISTINCT
                PRODUCTIONORDERCODE AS NO_KK,
                DEAMAND AS DEMAND,
                PROGRESSSTATUS_DEMAND,
                TRIM(PROGRESSSTATUS) AS PROGRESSSTATUS
            FROM
                ITXVIEWKK
            WHERE
                NOT ITEMTYPEAFICODE = 'KGF'
                AND DEAMAND = '$demand'";

    $stmt = db2_exec($conn1, $sql);
    $row = db2_fetch_assoc($stmt);
    return $row;
  }

  function getCloseByKK($kk)
  {
    global $conn1;

    $sql = "SELECT 
                p.GROUPSTEPNUMBER AS GROUPSTEPNUMBER,
                TRIM(p.PROGRESSSTATUS) AS PROGRESSSTATUS
            FROM 
                PRODUCTIONDEMANDSTEP p
            WHERE p.PRODUCTIONORDERCODE = '$kk'
                AND (p.PROGRESSSTATUS = '3' OR p.PROGRESSSTATUS = '2')
            ORDER BY p.GROUPSTEPNUMBER
            DESC LIMIT 1";

    $stmt = db2_exec($conn1, $sql);
    $row = db2_fetch_assoc($stmt);
    return $row;
  }

  function totalStepAndTotalClose($kk)
  {
    global $conn1;

    $sql = "SELECT TOTAL.TOTALSTEP, CLOSE.TOTALCLOSE
    FROM
    (SELECT COUNT(*) AS TOTALSTEP FROM PRODUCTIONDEMANDSTEP WHERE PRODUCTIONORDERCODE = '$kk') TOTAL,
    (SELECT COUNT(*) AS TOTALCLOSE FROM PRODUCTIONDEMANDSTEP WHERE PRODUCTIONORDERCODE = '$kk' AND PROGRESSSTATUS = 3) CLOSE";

    $stmt = db2_exec($conn1, $sql);
    $row = db2_fetch_assoc($stmt);

    return $row;
  }

  function cnpClose($kk)
  {
    global $conn1;

    $sql = "SELECT 
                TRIM(OPERATIONCODE) AS OPERATIONCODE,
                PROGRESSSTATUS
                -- ,CASE
                --     WHEN PROGRESSSTATUS = 0 THEN 'Entered'
                --     WHEN PROGRESSSTATUS = 1 THEN 'Planned'
                --     WHEN PROGRESSSTATUS = 2 THEN 'Progress'
                --     WHEN PROGRESSSTATUS = 3 THEN 'Closed'
                -- END AS STATUS_OPERATION
            FROM 
                PRODUCTIONDEMANDSTEP v
            WHERE 
                PRODUCTIONORDERCODE = '$kk' AND PROGRESSSTATUS = 3 
            ORDER BY 
                GROUPSTEPNUMBER DESC LIMIT 1";

    $stmt = db2_exec($conn1, $sql);
    $row = db2_fetch_assoc($stmt);

    return $row;
  }

  function notCnpClose($kk, $groupstep_option)
  {
    global $conn1;

    $sql = "SELECT 
                PROGRESSSTATUS
                -- ,CASE
                --     WHEN PROGRESSSTATUS = 0 THEN 'Entered'
                --     WHEN PROGRESSSTATUS = 1 THEN 'Planned'
                --     WHEN PROGRESSSTATUS = 2 THEN 'Progress'
                --     WHEN PROGRESSSTATUS = 3 THEN 'Closed'
                -- END AS STATUS_OPERATION
            FROM 
                PRODUCTIONDEMANDSTEP
            WHERE 
                PRODUCTIONORDERCODE = '$kk' AND 
                GROUPSTEPNUMBER $groupstep_option
            ORDER BY 
                GROUPSTEPNUMBER ASC LIMIT 1";

    $stmt = db2_exec($conn1, $sql);
    $row = db2_fetch_assoc($stmt);

    return $row;
  }

  function statusTerakhir($kk, $groupstep_option)
  {
    global $conn1;

    $sql = "SELECT
                p.PROGRESSSTATUS
                -- ,CASE
                --     WHEN p.PROGRESSSTATUS = 0 THEN 'Entered'
                --     WHEN p.PROGRESSSTATUS = 1 THEN 'Planned'
                --     WHEN p.PROGRESSSTATUS = 2 THEN 'Progress'
                --     WHEN p.PROGRESSSTATUS = 3 THEN 'Closed'
                -- END AS STATUS_OPERATION
            FROM 
                PRODUCTIONDEMANDSTEP p                     
            WHERE p.PRODUCTIONORDERCODE = '$kk'
                AND (p.PROGRESSSTATUS = '0' OR p.PROGRESSSTATUS = '1' OR p.PROGRESSSTATUS ='2') 
                AND p.GROUPSTEPNUMBER $groupstep_option
            ORDER BY p.GROUPSTEPNUMBER ASC LIMIT 1";

    $stmt = db2_exec($conn1, $sql);
    $row = db2_fetch_assoc($stmt);
    return $row;
  }

  function getStatusOperationByDemand($demand)
  {
    global $conn1;
    // $demand = "00179943";
    $status = getStatusByDemand($demand);

    if ($status['PROGRESSSTATUS_DEMAND'] == 6) {
      $get = 'KK Oke';
    } else {
      // 1. Deteksi Production Order Closed Atau Belum
      if ($status['PROGRESSSTATUS'] == 6) {
        $get = 'KK Oke';
      } else {

        // mendeteksi statusnya close
        $status_close = getCloseByKK($status['NO_KK']);

        $groupstepnumber = !empty($status_close['GROUPSTEPNUMBER']) ? $status_close['GROUPSTEPNUMBER'] : 0;

        $cnpClose = cnpClose($status['NO_KK']);

        if (@$cnpClose['PROGRESSSTATUS'] == 3) { // 3 is Closed From Demands Steps 
  
          if ($cnpClose['OPERATIONCODE'] == 'PPC4') {
            if ($status['PROGRESSSTATUS'] == 6) {
              $get = 'KK Oke';
            } else {
              $get = 'KK Oke';
            }
          } else {
            // oke5
  
            if ($status_close['PROGRESSSTATUS'] == 2) {
              $groupstep_option = "= '$groupstepnumber'";
            } else { //kalau status terakhirnya bukan PPC dan status terakhirnya CLOSED
              $step = totalStepAndTotalClose($status['NO_KK']);
              $groupstep_option = ($step['TOTALSTEP'] == $step['TOTALCLOSE']) ? "= '$groupstepnumber'" : "> '$groupstepnumber'";
            }

            $notCnpClose = notCnpClose($status['NO_KK'], $groupstep_option);

            if ($notCnpClose) {
              if ($notCnpClose['PROGRESSSTATUS'] == 3) {
                $get = 'KK Oke.';
              }
              //else {
              //$get = 'Oke 5.0 => ' . $notCnpClose['STATUS_OPERATION'];
              // }
              // $get = ($cnpClose['PROGRESSSTATUS']);
            } else {
              $groupstep_option2 = "= '$groupstepnumber'";
              $cnpClose2 = notCnpClose($status['NO_KK'], $groupstep_option2);
              if ($cnpClose2['PROGRESSSTATUS'] == 3) {
                $get = 'KK Oke.';
              }
              // else {
              // $get = 'Oke 5.1 => ' . $cnpClose2['STATUS_OPERATION'];
              // }
            }

            // end oke5
          }
        } else {

          $groupstep_option3 = (@$status_close['PROGRESSSTATUS'] == 2) ? "= '$groupstepnumber'" : "> '$groupstepnumber'";

          $status_terakhir = statusTerakhir($status['NO_KK'], $groupstep_option3);
          if ($status_terakhir['PROGRESSSTATUS'] == 3) {
            $get = 'KK Oke';
          }
          // else {
          // $get = 'Oke 6.0 => ' . $status_terakhir['STATUS_OPERATION'];
          // }
        }
      }
    }

    return $get;
  }

  function getLotLegacyByDemand($demand) {
    global $conn1;

    $sql = "SELECT 
              TRIM(DESCRIPTION) AS LOTLEGACY
            FROM PRODUCTIONDEMAND
            WHERE CODE = '$demand' ";

    $stmt = db2_exec($conn1, $sql);
    $row = db2_fetch_assoc($stmt);
    return $row['LOTLEGACY'];
  }
  
  if($Awal != "" && $Akhir != "") {
  ?>
  
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Status NCP</h3>
        </div>
        <div class="box-body">
          <table class="table table-bordered table-hover table-striped nowrap" id="example3" style="width:100%" border="1">
            <thead class="bg-purple">
              <tr>
                <th width="3%">
                  <div align="center">No</div>
                </th>
                <th width="4%">
                  <div align="center">Tgl Buat</div>
                </th>
                <th width="11%">
                  <div align="center">Lama Proses</div>
                </th>
                <th width="11%">
                  <div align="center">No Demand</div>
                </th>
                <th width="11%">
                  <div align="center">Registration</div>
                </th>
                <th width="11%">
                  <div align="center">Langganan</div>
                </th>
                <th width="11%">
                  <div align="center">Status 1</div>
                </th>
                <th width="11%">
                  <div align="center">Status 2</div>
                </th>
                <th width="11%">
                  <div align="center">Status 3</div>
                </th>
                <th width="6%">
                  <div align="center">Buyer</div>
                </th>
                <th width="3%">
                  <div align="center">PO</div>
                </th>
                <th width="6%">
                  <div align="center">Order</div>
                </th>
                <th width="6%">
                  <div align="center">No NCP</div>
                </th>
                <th width="6%">
                  <div align="center">Tgl Target</div>
                </th>
                <th width="6%">
                  <div align="center">No Item</div>
                </th>
                <th width="20%">
                  <div align="center">Jenis_Kain</div>
                </th>
                <th width="7%">
                  <div align="center">Lebar &amp; Gramasi</div>
                </th>
                <th width="4%">
                  <div align="center">Lot</div>
                </th>
                <th width="7%">
                  <div align="center">Lot Salinan</div>
                </th>
                <th width="7%">
                  <div align="center">Lot Legacy</div>
                </th>
                <th width="7%">
                  <div align="center">Warna</div>
                </th>
                <th width="4%">
                  <div align="center">Rol</div>
                </th>
                <th width="6%">
                  <div align="center">Berat</div>
                </th>
                <th width="5%">
                  <div align="center">Dept</div>
                </th>
                <th width="9%">
                  <div align="center">Masalah</div>
                </th>
                <th width="9%">
                  <div align="center">Masalah Utama</div>
                </th>
                <th width="5%">
                  <div align="center">Tempat Kain</div>
                </th>
                <th width="5%">
                  <div align="center">Ket</div>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              if ($_SESSION['dept'] != "QC") {
                $where = " AND dept='$_SESSION[dept]' ";
                $whereT1 = " AND t1.dept='$_SESSION[dept]' ";
              } 
              if ($Dept != "") {
                $where1 = " AND dept='$Dept' ";
                $where1T1 = " AND t1.dept='$Dept' ";
              }
              if ($NCP != "") {
                $where2 = " AND no_ncp='$NCP' ";
                $where2T1 = " AND t1.no_ncp='$NCP' ";
              }

              if ($FilterByStatus != "") {
                $filterStatus = "";
                if (count($FilterByStatus) > 1) {
                  $filterStatus .= "status IN ('" . implode("', '", $FilterByStatus) . "') ";
                  $filterStatusT1 .= "t1.status IN ('" . implode("', '", $FilterByStatus) . "') ";
                } else {
                  $filterStatus .= "status = '" . $FilterByStatus[0] . "' ";
                  $filterStatusT1 .= "t1.status = '" . $FilterByStatus[0] . "' ";
                }
              } else {
                $filterStatus .= "status IN ('Belum OK', 'OK', 'BS', 'Cancel', 'Disposisi') ";
                $filterStatusT1 .= "t1.status IN ('Belum OK', 'OK', 'BS', 'Cancel', 'Disposisi') ";
              }

              if($hitung != "") {
                $where6 = " AND ncp_hitung = 'ya' ";
                $where6T1 = " AND t1.ncp_hitung = 'ya' ";
              }

              if($Awal != "" && $Akhir != "") {
                $where7   = " and tgl_buat between '$Awal' and '$Akhir' ";
                $where7T1 = " and t1.tgl_buat between '$Awal' and '$Akhir' ";
              }

              // print_r($filterStatus);
              if($posisi_terakhir != "") {
                $qry1 = mysqli_query($con, "SELECT
                                                t1.*,
                                                DATEDIFF(t1.tgl_rencana, CURDATE()) AS lama,
                                                DATEDIFF(CURDATE(), t1.tgl_rencana) AS delay
                                            FROM
                                                tbl_ncp_qcf_now t1
                                            JOIN (
                                                SELECT 
                                                    no_ncp, 
                                                    MAX(tgl_update) AS max_tgl_update
                                                FROM 
                                                    tbl_ncp_qcf_now
                                                WHERE
                                                    " . $filterStatus . $where . $where1 . $where2 . $where6 . $where7 . "
                                                GROUP BY 
                                                    no_ncp
                                            ) t2
                                            ON t1.no_ncp = t2.no_ncp AND t1.tgl_update = t2.max_tgl_update
                                            WHERE
                                                " . $filterStatusT1 . $whereT1 . $where1T1 . $where2T1 . $where6T1 . $where7T1 . "
                                            ORDER BY
                                                t1.id ASC, t1.no_ncp ASC, t1.tgl_update DESC;");
              } else {
                $qry1 = mysqli_query($con, "select
                                              *,
                                              DATEDIFF(tgl_rencana, DATE_FORMAT(now(), '%Y-%m-%d')) as lama,
                                              DATEDIFF(DATE_FORMAT(now(), '%Y-%m-%d'), tgl_rencana) as delay
                                            from
                                              tbl_ncp_qcf_now
                                            where
                                              " . $filterStatus . $where . $where1 . $where2 . $where6 . $where7 . "
                                            order by
                                              id asc");
              }
              while ($row1 = mysqli_fetch_array($qry1)) {
                if ($row1['nokk_salinan'] != "") {
                  $nokk1 = $row1['nokk_salinan'];
                } else {
                  $nokk1 = $row1['nokk'];
                }
                $sql = mysqli_query($con, "SELECT COUNT(*) jml,tgl_terima,id FROM `tbl_qcf_ncp_tolak_new` WHERE id_qcf_ncp='$row1[id]' ORDER BY id DESC");
                $r1 = mysqli_fetch_array($sql);
                ?>
                <tr bgcolor="<?php echo $bgcolor; ?>">
                  <td align="center">
                    <font size="-1">
                      <?php echo $no; ?>
                    </font>
                  </td>
                  <td align="center">
                    <font size="-1">
                      <?php echo $row1['tgl_buat']; ?>
                    </font><br>
                    <div class="btn-group"><a href="pages/cetak/cetak_ncp_now.php?id=<?php echo $row1['id']; ?>" class="btn btn-xs btn-danger <?php if ($_SESSION['dept'] != "QC") {
                         echo "disabled";
                       } ?>" target="_blank"><i class="fa fa-print"></i></a><a
                        href="pages/cetak/cetak_ncp_now_pdf.php?id=<?php echo $row1['id']; ?>" class="btn btn-xs btn-info <?php if ($_SESSION['dept'] != "QC") {
                             echo "disabled";
                           } ?>" target="_blank"><i class="fa fa-file-pdf-o"></i></a></div>
                  </td>
                  <td align="center">
                    <?php if ($row1['delay'] > 0) {
                      echo "<span class='label label-danger'>Delay " . $row1['delay'] . " Hari</span>";
                    } else if ($row1['delay'] <= 0 and $row1['delay'] != "") {
                      echo "<span class='label label-success'>" . $row1['lama'] . " Hari Lagi</span>";
                    } else {
                      echo "<span class='label bg-fuchsia'>NCP belum-diterima</span>";
                    } ?>
                  </td>
                  <td>
                    <a href="http://10.0.0.10/laporan/ppc_filter_steps.php?demand=<?= $row1['nodemand'] ?>"
                      class="posisi_kk" id="<?php echo $row1['nodemand']; ?>" target="_blank">
                      '<?php echo $row1['nodemand']; ?>
                    </a>
                  </td>
                  <td>
                      <?php echo $row1['reg_no']; ?>
                  </td>
                  <td>
                    <font size="-1">
                      <?php echo $row1['langganan']; ?>
                    </font>
                  </td>
                  <td>
                    <?php echo $row1['status']; ?>
                  </td>
                  <td>
                      <?php if ($row1['tgl_rencana'] != "" and $row1['penyelesaian'] == "") {
                        echo "<span class='label label-primary'>Sudah diterima " . $row1['dept'] . "</span>";
                      } else if ($row1['tgl_rencana'] != "" and $row1['penyelesaian'] != "") {
                        echo "<span class='label label-danger'>Tunggu OK dari QCF</span>";
                      } ?>
                  </td>
                  <td>
                      <!-- inistart -->
                      <?php
                      $status_operation = getStatusOperationByDemand($row1['nodemand']);
                      ?>
                      <?php if ($status_operation != null && $status_operation != "") { ?>
                        <span class='label label-danger'>
                          <?= $status_operation ?>
                        </span>
                      <?php } ?>
                      <!-- endinistart -->
                  </td>
                  <td>
                    <font size="-1">
                      <?php echo $row1['buyer']; ?>
                    </font>
                  </td>
                  <td align="center">
                    <font size="-1">
                      <?php echo $row1['po']; ?>
                    </font>
                  </td>
                  <td align="center">
                    <font size="-1">
                      <?php echo $row1['no_order']; ?>
                    </font><br>
                    <?php if ($r1['tgl_terima'] == "" and $r1['jml'] > 0) { ?><a href="#" class="btn terima_ncp_lama"
                        id="<?php echo $r1['id']; ?>"><span class="label label-success">NCP Lama</span></a>
                    <?php } ?>
                  </td>
                  <td>
                      <?php echo $row1['no_ncp_gabungan']; ?>
                  </td>
                  <td>
                    <font size="-1">
                      <?php echo $row1['tgl_rencana']; ?>
                    </font>
                  </td>
                  <td>
                    <font size="-1">
                      <?php echo $row1['no_item']; ?>
                    </font>
                  </td>
                  <td>
                    <font size="-2">
                      <?php echo $row1['jenis_kain']; ?>
                    </font>
                  </td>
                  <td align="center">
                    <font size="-1">
                      <?php echo $row1['lebar'] . "x" . $row1['gramasi']; ?>
                    </font>
                  </td>
                  <td align="center">
                    <font size="-1">
                      <?php echo $row1['lot']; ?>
                    </font>
                  </td>
                  <td align="center">
                    <font size="-1">
                      <?php echo $row1['lot_salinan']; ?>
                    </font>
                  </td>
                  <td align="center">
                    <font size="-1">
                      <?php echo getLotLegacyByDemand($row1['nodemand']); ?>
                    </font>
                  </td>
                  <td align="center">
                    <font size="-2">
                      <?php echo $row1['warna']; ?>
                    </font>
                  </td>
                  <td align="right">
                    <font size="-1">
                      <?php echo $row1['rol']; ?>
                    </font>
                  </td>
                  <td align="right">
                    <font size="-1">
                      <?php echo $row1['berat']; ?>
                    </font>
                  </td>
                  <td align="center">
                    <font size="-1">
                      <?php echo $row1['dept']; ?>
                    </font>
                  </td>
                  <td>
                    <font size="-1">
                      <?php echo $row1['masalah']; ?>
                    </font>
                  </td>
                  <td>
                    <font size="-1">
                      <?php echo $row1['masalah_dominan']; ?>
                    </font>
                  </td>
                  <td>
                    <font size="-1">
                      <?php echo $row1['tempat']; ?>
                    </font>
                  </td>
                  <td>
                    <font size="-1">
                      <?php echo $row1['ket']; ?>
                    </font>
                  </td>
                </tr>
                <?php $no++;
              } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>

</body>

</html>