<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pindah</h3>
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
						<th>Tanggal</th>
						<th>Alasan</th>
						<th>Pindah Ke</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT p.id_pend, p.nik, p.nama, d.tgl_pindah, d.alasan, d.pindah_ke, d.id_pindah from 
			  tb_pindah d inner join tb_pdd p on p.id_pend=d.id_pdd");
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
							<?php echo $data['nama']; ?>
						</td>
						<td>
							<?php echo $data['tgl_pindah']; ?>
						</td>
						<td>
							<?php echo $data['alasan']; ?>
						</td>
						<td>
							<?php echo $data['pindah_ke']; ?>
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