<?PHP
session_start();
include"koneksi.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="180">	
<title>Schedule</title>
</head>

<body>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<a href="FormInspeksiKain" class="btn btn-success <?php if($_SESSION['akses']=="biasa"){ echo "disabled";} ?>"><i class="fa fa-plus-circle"></i> Tambah</a>
					<div class="box-body">
						<table id="example1" class="table table-bordered table-hover table-striped" width="100%">
							<thead class="bg-blue">
								<tr>
									<th width="115"><div align="center">Action_</div></th>
									<th width="45"><div align="center">Nokk</div></th>
									<th width="24"><div align="center">No.</div></th>
									<th width="162"><div align="center">Pelanggan</div></th>
									<th width="118"><div align="center">No. Order</div></th>
									<th width="122"><div align="center">Jenis Kain</div></th>
									<th width="86"><div align="center">Warna</div></th>
									<th width="83"><div align="center">No Warna</div></th>
									<th width="38"><div align="center">Lot</div></th>
									<th width="79"><div align="center">Keterangan</div></th>
									<th width="46"><div align="center">Rol</div></th>
									<th width="48"><div align="center">Kg</div></th>
									<th width="59"><div align="center">Proses</div></th>
									<th><div align="center">Delivery</div></th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>  
			</div>
		</div>
	</div>
</body>
</html>