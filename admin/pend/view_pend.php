<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * from tb_pdd where id_pend ='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-user"></i> Detail Penduduk</h3>
		</h3>
		<div class="card-tools">
		</div>
	</div>
	<div class="card-body p-0">
		<table class="table">
			<tbody>
				<tr>
					<td style="width: 150px">
						<b>NIK</b>
					</td>
					<td>:
						<?php echo $data_cek['nik']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Nama</b>
					</td>
					<td>:
						<?php echo $data_cek['nama']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>TTL</b>
					</td>
					<td>:
						<?php echo $data_cek['tempat_lh']; ?>
						/
						<?php echo $data_cek['tgl_lh']; ?>
					</td>
				</tr>
				<tr>
				<tr>
    <td style="width: 150px">
        <b>Umur</b>
    </td>
    <td>:
        <?php
        $tglLahir = date_create($data_cek['tgl_lh']);
        $tglSekarang = date_create();

        $diff = date_diff($tglLahir, $tglSekarang);

        $umurTahun = $diff->y;
        $umurBulan = $diff->m;
        $umurHari = $diff->d;

        echo $umurTahun . " Tahun " . $umurBulan . " Bulan " . $umurHari . " Hari";
        ?>
    </td>
</tr>



				<tr>
					<td style="width: 150px">
						<b>Jenis Kelamin</b>
					</td>
					<td>:
					<?php
							if ($data_cek['jekel'] == 'PR') {
								echo 'Perempuan';
							} elseif ($data_cek['jekel'] == 'LK') {
								echo 'Laki-Laki';
							} else {
								echo 'Jenis Kelamin Tidak Diketahui';
							}
							?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Alamat</b>
					</td>
					<td>:
						<?php echo $data_cek['desa']; ?>, RT
						<?php echo $data_cek['rt']; ?>/ RW
						<?php echo $data_cek['rw']; ?>
					</td>
				</tr>

				<tr>
	<td style="width: 150px">
		<b>Kewarganegaraan</b>
	</td>
	<td>:
		<?php echo $data_cek['negara']; ?>
		<?php if ($data_cek['negara'] === 'Indonesia'): ?>
			<img src="build/img/R.png" alt="Indonesian Flag" width="30" height="20">
		<?php endif; ?>
	</td>
</tr>


				<tr>
					<td style="width: 150px">
						<b>Agama</b>
					</td>
					<td>:
						<?php echo $data_cek['agama']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Status Kawin</b>
					</td>
					<td>:
						<?php echo $data_cek['kawin']; ?>
					</td>
				</tr>
				<tr>
					<td style="width: 150px">
						<b>Pekerjaan</b>
					</td>
					<td>:
						<?php echo $data_cek['pekerjaan']; ?>
					</td>
				</tr>


			</tbody>
		</table>
			<div class="card-footer">
				<a href="?page=data-pend" class="btn btn-warning">Kembali</a>
			</div>
	</div>
</div>