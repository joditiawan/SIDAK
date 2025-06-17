<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data KK</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>No Kartu Keluarga</th>
						<th>Kepala Keluarga</th>
						<th>Alamat</th>
						<th>Anggota KK</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
              $sql = $koneksi->query("select * from tb_kk");
              while ($data= $sql->fetch_assoc()) {
            ?>

					<tr>
						<td>
							<?php echo $no++; ?>
						</td>
						<td>
							<?php echo $data['nomor_kartu_keluarga']; ?>
						</td>
						<td>
							<?php echo $data['kepala']; ?>
						</td>
						<td>
							<?php echo $data['desa']; ?>
							RT
							<?php echo $data['rt']; ?>/ RW
							<?php echo $data['rw']; ?>.
						</td>
						<td>
							<a href="?page=anggota-kaur&kode=<?php echo $data['id_kk']; ?>" title="Anggota KK"
							 class="btn btn-info btn-sm">
								<i class="fa fa-users"></i>
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