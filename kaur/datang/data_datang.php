<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pendatang</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Tanggal Datang</th>
						<th>Tempat Asal</th>
						<th>Alasan</th>
						<th>Pelapor</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT d.id_datang, d.nik, d.nama_datang, d.jekel, d.tgl_datang, d.tempat_asal,d.alasan_datang, p.nama from 
			  tb_datang d inner join tb_pdd p on d.pelapor=p.id_pend");
              while ($data= $sql->fetch_assoc()) {
            	?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nik']; ?>
						</td>
						<td>
							<?php echo $data['nama_datang']; ?>
						</td>
						
						<td>
							<?php
							if ($data['jekel'] == 'PR') {
								echo 'Perempuan';
							} elseif ($data['jekel'] == 'LK') {
								echo 'Laki-Laki';
							} else {
								echo 'Jenis Kelamin Tidak Diketahui';
							}
							?>
						</td>

						<td>
   								 <?php echo date('d-m-Y', strtotime($data['tgl_datang'])); ?>
						</td>

						<td>
							<?php echo $data['tempat_asal']; ?>
						</td>
						<td>
							<?php echo $data['alasan_datang']; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->
</div>
