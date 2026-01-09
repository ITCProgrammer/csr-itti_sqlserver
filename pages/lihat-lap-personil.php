<?PHP
ini_set("error_reporting", 1);
session_start();
include "koneksi.php";

?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan Jahit Shading</title>
</head>

<body>
    <?php
    $Awal = isset($_POST['awal']) ? $_POST['awal'] : '';
    $Akhir = isset($_POST['akhir']) ? $_POST['akhir'] : '';

    ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"> Filter Laporan Personil</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form method="post" enctype="multipart/form-data" name="form1" class="form-horizontal" id="form1">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="awal" class="col-sm-1 control-label">Tanggal Awal</label>
                            <div class="col-sm-2">
                                <div class="input-group date">
                                    <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                    <input name="awal" type="date" class="form-control pull-right"
                                        placeholder="Tanggal Awal" value="<?php echo $Awal; ?>" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="akhir" class="col-sm-1 control-label">Tanggal Akhir</label>
                            <div class="col-sm-2">
                                <div class="input-group date">
                                    <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                    <input name="akhir" type="date" class="form-control pull-right"
                                        placeholder="Tanggal Akhir" value="<?php echo $Akhir; ?>" autocomplete="off" />
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-block btn-social btn-linkedin btn-sm" name="save"
                                style="width: 60%">Search <i class="fa fa-search"></i></button>
                        </div>
                        <div class="pull-right">
                            <input type="button" class="btn btn-block btn-social btn-linkedin btn-sm" name="lihat"
                                value="Kembali" onClick="window.location.href='LapPersonil'">
                        </div>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Laporan Personil</h3><br>
                    <?php if($_POST['awal'] != "") { ?><b>Periode:
                            <?php echo $_POST['awal']." to ".$_POST['akhir']; ?>
                        </b>
                    <?php } ?>
                    <div class="pull-right">
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover table-striped nowrap" id="example3"
                        style="width:100%">
                        <thead class="bg-blue">
                            <tr>
                                <th>
                                    <div align="center">No</div>
                                </th>
                                <th>
                                    <div align="center">Tanggal Input</div>
                                </th>
                                <th>
                                    <div align="center">Jobdesk</div>
                                </th>
                                <th>
                                    <div align="center">Qty Roll</div>
                                </th>
                                <th>
                                    <div align="center">Qty Kg</div>
                                </th>
                                <th>
                                    <div align="center">Qty Yard</div>
                                </th>
                                <th>
                                    <div align="center">Operator</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;

                            $qry1 = mysqli_query($con, "select 
                                                            l.id,
                                                            l.roll,
                                                            l.kg,
                                                            l.yard,
                                                            l.tanggal_input,
                                                            o.nama as nama_operator,
                                                            j.nama as nama_jobdesk
                                                        from tbl_lap_personil l
                                                        left join tbl_operator_lap_personil o
                                                            on l.id_operator = o.id
                                                        left join tbl_jobdesk j
                                                            on l.id_jobdesk = j.id
                                                        where tanggal_input between '$Awal' and '$Akhir'");

                            while($row = mysqli_fetch_array($qry1)) {
                                ?>
                                <tr bgcolor="<?php echo $bgcolor; ?>">
                                    <td align="center">
                                        <?php echo $no; ?>
                                    </td>

                                    <td align="center">
                                        <?php echo $row['tanggal_input']; ?>
                                    </td>
                                    <td align="center">
                                        <?php echo $row['nama_jobdesk']; ?>
                                    </td>
                                    <td align="center">
                                        <?php echo $row['roll']; ?>
                                    </td>
                                    <td align="center">
                                        <?php echo $row['kg']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['yard']; ?>
                                    </td>
                                    <td align="center">
                                        <?php echo $row['nama_operator']; ?>
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

    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });

    </script>
</body>

</html>