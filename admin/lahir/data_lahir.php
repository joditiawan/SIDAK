<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kelahiran</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add-lahir" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
					<a href="?page=cetak-tbl-lahir" class="btn btn-success">
					<i class="fa fa-print"></i> Cetak</a>

			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Tgl Lahir</th>
						<th>Jenis Kelamin</th>
						<th>No Kartu Keluarga</th>
						<th>Aksi</th>
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
						<td>
							<a href="?page=edit-lahir&kode=<?php echo $data['id_lahir']; ?>" title="Ubah"
								class="btn btn-success btn-sm">
								<i class="fa fa-edit"></i>
							</a>
							<a href="?page=del-lahir&kode=<?php echo $data['id_lahir']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
								title="Hapus" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
							</a>
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
