<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kelahiran</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Tgl Lahir</th>
						<th>Jenis Kelamin</th>
						<th>No Kartu Keluarga</th>
					</tr>
				</thead>
				<tbody>
					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT l.id_lahir, l.nama, l.tgl_lh, l.jekel, k.nomor_kartu_keluarga, k.kepala from 
			  tb_lahir l inner join tb_kk k on k.id_kk=l.id_kk");
              while ($data= $sql->fetch_assoc()) {
            ?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['nama']; ?></td>
						<td><?php echo $data['tgl_lh']; ?></td>
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
						<td><?php echo $data['nomor_kartu_keluarga']; ?></td>
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
