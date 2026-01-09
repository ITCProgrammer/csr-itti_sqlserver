<?php
include "koneksi.php";
// ini_set("error_reporting", 1);

$id_operator = trim($_POST['operator']) ?? '';
$id_jobdesk = trim($_POST['jobdesk']) ?? '';
$tanggal_input = trim($_POST['tanggal_input']) ?? '';
$roll_dikerjakan = trim($_POST['roll_dikerjakan']) ?? '';
$kg_dikerjakan = trim($_POST['kg_dikerjakan']) ?? '';
$yard_dikerjakan = trim($_POST['yard_dikerjakan']) ?? '';


if($_POST['simpan'] == "simpan") {

    $sql = mysqli_query($con, "INSERT INTO tbl_lap_personil (id_operator, id_jobdesk, roll, kg, yard, tanggal_input) 
                                                        VALUES('$id_operator', '$id_jobdesk', '$roll_dikerjakan', '$kg_dikerjakan', '$yard_dikerjakan', '$tanggal_input');");
    if($sql) {
        ?>

        <script>
            swal({
                title: 'Data has been saved!',
                text: 'Klik Ok untuk input data kembali',
                type: 'success',
            }).then((result) => {
                if (result.value) {
                    window.location.href = 'LapPersonil';
                }
            });
        </script>

        <?php
    }

}

?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Input Data</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                        class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="operator" class="col-sm-3 control-label">Operator</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <select class="form-control select2" name="operator" id="operator" required>
                                <option value="">Pilih</option>
                                <?php
                                $qryo = mysqli_query($con, "SELECT id, nama FROM tbl_operator_lap_personil ORDER BY nama ASC");
                                while($ro = mysqli_fetch_array($qryo)) {
                                    ?>
                                    <option value="<?php echo $ro['id']; ?>">
                                        <?php echo $ro['nama']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <span class="input-group-btn"><button type="button" class="btn btn-default"
                                    data-toggle="modal" data-target="#DataOperator"> ...</button></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="jobdesk" class="col-sm-3 control-label">Jobdesk</label>
                    <div class="col-sm-4">
                        <div class="input-group">
                            <select class="form-control select2" name="jobdesk" id="jobdesk" required>
                                <option value="">Pilih</option>
                                <?php
                                $qryo2 = mysqli_query($con, "SELECT id, nama FROM tbl_jobdesk ORDER BY nama ASC");
                                while($ro2 = mysqli_fetch_array($qryo2)) {
                                    ?>
                                    <option value="<?php echo $ro2['id']; ?>">
                                        <?php echo $ro2['nama']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#DataJobdesk"> ...</button>
                            </span>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="tanggal_input" class="col-sm-3 control-label">Tanggal Input</label>
                    <div class="col-sm-4">
                        <div class="input-group date">
                            <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                            <input name="tanggal_input" type="date" class="form-control pull-right"
                                placeholder="Tanggal Input" autocomplete="off" required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="roll_dikerjakan" class="col-sm-3 control-label">Roll Dikerjakan</label>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="roll_dikerjakan" type="text" class="form-control" id="roll_dikerjakan" value=""
                                placeholder="0" required>
                            <span class="input-group-addon">Roll</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="kg_dikerjakan" type="text" class="form-control" id="kg_dikerjakan" value=""
                                placeholder="0" required>
                            <span class="input-group-addon">Kg</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input name="yard_dikerjakan" type="text" class="form-control" id="yard_dikerjakan" value=""
                                placeholder="0" required>
                            <span class="input-group-addon">Yard</span>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right" name="simpan" value="simpan"><i
                    class="fa fa-save"></i> Simpan</button>
            <button type="button" class="btn btn-warning pull-left" name="lihat" value="lihat"
                onClick="window.location.href='LihatLapPersonil'"><i class="fa fa-search"></i> Lihat
                Data</button>
        </div>
    </div>
</form>

<div class="modal fade" id="DataOperator">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action=""
                enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Operator</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="operator" class="col-md-3 control-label">Nama Operator</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="buat_operator" name="operator" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" value="Simpan" name="simpan_operator" id="simpan_operator"
                        class="btn btn-primary pull-right">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="DataJobdesk">
    <div class="modal-dialog ">
        <div class="modal-content">
            <form class="form-horizontal" name="modal_popup" data-toggle="validator" method="post" action=""
                enctype="multipart/form-data">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Jobdesk</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="jobdesk" class="col-md-3 control-label">Nama Jobdesk</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="buat_jobdesk" name="jobdesk" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" value="Simpan" name="simpan_jobdesk" id="simpan_jobdesk"
                        class="btn btn-primary pull-right">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php
if($_POST['simpan_operator'] == "Simpan") {
    $nama = strtoupper(trim($_POST['operator']));
    $sqlDataCek = mysqli_query($con, "SELECT * FROM tbl_operator_lap_personil WHERE nama = '$nama'");
    $sqlDataCekCount = mysqli_num_rows($sqlDataCek);

    if($sqlDataCekCount > 0) {
        ?>
        <script>
            swal({
                title: 'Data Sudah Ada',
                text: 'Klik Ok untuk input data kembali',
                type: 'warning',
            }).then((result) => {
                if (result.value) {
                    window.location.href = 'LapPersonil';
                }
            });
        </script>
        <?php
    } else {
        $sqlData1 = mysqli_query($con, "INSERT INTO tbl_operator_lap_personil (nama) VALUES('$nama');");
        if($sqlData1) {
            ?>
            <script>
                swal({
                    title: 'Data Telah Tersimpan',
                    text: 'Klik Ok untuk input data kembali',
                    type: 'success',
                }).then((result) => {
                    if (result.value) {
                        window.location.href = 'LapPersonil';
                    }
                });
            </script>
            <?php
        }
    }
}

if($_POST['simpan_jobdesk'] == "Simpan") {
    $nama2 = trim($_POST['jobdesk']);
    $sqlDataCek2 = mysqli_query($con, "SELECT * FROM tbl_jobdesk WHERE nama = '$nama2'");
    $sqlDataCekCount2 = mysqli_num_rows($sqlDataCek2);

    if($sqlDataCekCount2 > 0) {
        ?>
        <script>
            swal({
                title: 'Data Sudah Ada',
                text: 'Klik Ok untuk input data kembali',
                type: 'warning',
            }).then((result) => {
                if (result.value) {
                    window.location.href = 'LapPersonil';
                }
            });
        </script>
        <?php
    } else {
        $sqlData2 = mysqli_query($con, "INSERT INTO tbl_jobdesk (nama) VALUES('$nama2');");
        if($sqlData2) {
            ?>
            <script>
                swal({
                    title: 'Data Telah Tersimpan',
                    text: 'Klik Ok untuk input data kembali',
                    type: 'success',
                }).then((result) => {
                    if (result.value) {
                        window.location.href = 'LapPersonil';
                    }
                });
            </script>
            <?php
        }
    }
}
?>