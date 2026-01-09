<?Php
if($_GET['nodemand']!=""){$nodemand=$_GET['nodemand'];}else{$nodemand=" ";}
if($_GET['tgl']!=""){$tgl=$_GET['tgl'];}else{$tgl=" ";}

//Data sudah disimpan di database mysqli
$msql=mysqli_query($con,"SELECT * FROM `tbl_lap_shading` WHERE `nodemand`='$nodemand' ");
$row=mysqli_fetch_array($msql);
$crow=mysqli_num_rows($msql);

//Data sudah disimpan di database mysqli
$msql1=mysqli_query($con,"SELECT * FROM `tbl_detail_roll_shading` WHERE `nodemand`='$nodemand' and DATE_FORMAT(tgl_buat, '%Y-%m-%d')='$tgl' ORDER BY element ASC ");
$row1=mysqli_fetch_array($msql1);
$crow1=mysqli_num_rows($msql1);

?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<div class="row">
    <div class="col-xs-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Data Detail Roll Shading | No Demand : <?php echo $_GET['nodemand'];?> Tgl Buat : <?php echo $_GET['tgl'];?></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-striped" style="width: 100%;">
                        <thead class="bg-blue">
                            <tr>
                                <th width="5%"><div align="center">No</div></th>
                                <th width="10%"><div align="center">Roll Inspect</div></th>
                                <th width="5%"><div align="center">Grade 4.5</div></th>
                                <th width="5%"><div align="center">Grade 4.0</div></th>
                                <th width="5%"><div align="center">Grade 3.5</div></th>
                                <th width="5%"><div align="center">Disposisi</div></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $msql2=mysqli_query($con,"SELECT * FROM `tbl_detail_roll_shading` WHERE `nodemand`='$nodemand' and DATE_FORMAT(tgl_buat, '%Y-%m-%d')='$tgl' ORDER BY element ASC ");
                                $no=1;
                                while($row2=mysqli_fetch_array($msql2)){
                            ?>
                            <tr bgcolor="<?php echo $bgcolor; ?>">
                                <td align="center"><?php echo $no; ?></td>
                                <td align="center"><?php echo $row2['element'];?></td>
                                <td align="center"><input type="checkbox" name="cek1[<?php echo $no; ?>]" value="1" <?php if($row2['grade_4_5']=='1'){echo "checked";}?>/></td>
                                <td align="center"><input type="checkbox" name="cek2[<?php echo $no; ?>]" value="1" <?php if($row2['grade_4']=='1'){echo "checked";}?>/></td>
                                <td align="center"><input type="checkbox" name="cek3[<?php echo $no; ?>]" value="1" <?php if($row2['grade_3_5']=='1'){echo "checked";}?>/></td>
                                <td align="center"><input type="checkbox" name="cek4[<?php echo $no; ?>]" value="1" <?php if($row2['disposisi']=='1'){echo "checked";}?>/></td>
                            </tr>
                            <?php $no++;} ?>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <?php if($_GET['nodemand']!="" and $crow1>0){?>
                    <button type="submit" class="btn btn-primary pull-right" name="ubah" value="ubah"><i class="fa fa-edit"></i> Ubah</button>
                    <?php } ?>
                    <button type="button" class="btn btn-warning pull-left" onClick="window.location.href='LihatDataShading'">Lihat Data Shading</button>
                </div>
            </div>
        </div>
</div>
</form>
<?php
include"koneksi.php";
ini_set("error_reporting", 1);
if(isset($_POST['ubah']))
{
	if($crow1>0){
        $sqlIn=mysqli_query($con,"SELECT * FROM `tbl_detail_roll_shading` WHERE `nodemand`='$nodemand' and DATE_FORMAT(tgl_buat, '%Y-%m-%d')='$tgl' ORDER BY element ASC");
        $no=1;
        while($rI = mysqli_fetch_array($sqlIn)){
            $idcek1	= $_POST['cek1'][$no];
            $idcek2	= $_POST['cek2'][$no];
            $idcek3	= $_POST['cek3'][$no];
            $idcek4	= $_POST['cek4'][$no];
            if($idcek1!=""){	
                $sqlUpdate=mysqli_query($con,"UPDATE tbl_detail_roll_shading SET
                `grade_4_5`='1',
                `grade_4`='0',
                `grade_3_5`='0',
                `disposisi`='0' WHERE element='$rI[element]' and DATE_FORMAT(tgl_buat, '%Y-%m-%d')='$tgl' ");
                }
            if($idcek2!=""){	
                $sqlUpdate=mysqli_query($con,"UPDATE tbl_detail_roll_shading SET
                `grade_4_5`='0',
                `grade_4`='1',
                `grade_3_5`='0',
                `disposisi`='0' WHERE element='$rI[element]' and DATE_FORMAT(tgl_buat, '%Y-%m-%d')='$tgl' ");
                }
            if($idcek3!=""){	
                $sqlUpdate=mysqli_query($con,"UPDATE tbl_detail_roll_shading SET
                `grade_4_5`='0',
                `grade_4`='0',
                `grade_3_5`='1',
                `disposisi`='0' WHERE element='$rI[element]' and DATE_FORMAT(tgl_buat, '%Y-%m-%d')='$tgl' ");
                }
            if($idcek4!=""){	
                    $sqlUpdate=mysqli_query($con,"UPDATE tbl_detail_roll_shading SET
                    `grade_4_5`='0',
                    `grade_4`='0',
                    `grade_3_5`='0',
                    `disposisi`='1' WHERE element='$rI[element]' and DATE_FORMAT(tgl_buat, '%Y-%m-%d')='$tgl' ");
                    }
            $no++;
        }
        //echo " <script>alert('Data has been updated!');</script>";
        echo "<script>swal({
            title: 'Data has been updated!',   
            text: 'Klik Ok untuk input data kembali',
            type: 'success',
            }).then((result) => {
            if (result.value) {
                window.location.href='EditDetailRollShading-$_GET[nodemand]-$_GET[tgl]';
               
            }
          });</script>";
		
		}
}
?>