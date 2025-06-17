<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

		<div class="form-group row">
    <label class="col-sm-2 col-form-label">NIK</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required>
    </div>
</div>

<script>
    // Mendapatkan elemen input NIK
    var inputNIK = document.getElementById("nik");

    // Event listener ketika nilai input berubah
    inputNIK.addEventListener("input", function() {
        // Menghapus karakter non-angka menggunakan ekspresi reguler
        this.value = this.value.replace(/[^0-9]/g, "");
    });
</script>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penduduk" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TTL</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="tempat_lh" name="tempat_lh" placeholder="Tempat Lahir" required>
				</div>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" placeholder="Tanggal Lahir" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control">
						<option>- Pilih -</option>
						<option>LK</option>
						<option>PR</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="desa" name="desa" placeholder="Alamat" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">RT/RW</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="rt" name="rt" placeholder="RT" required>
				</div>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="rw" name="rw" placeholder="RW" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kewarganegaraan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="negara" name="negara" placeholder="Kewarganegaraan" required>
				</div>
			</div>

			<div class="form-group row">
    <label class="col-sm-2 col-form-label">Agama</label>
    <div class="col-sm-6">
        <select class="form-control" id="agama" name="agama" required>
            <option value="">- Pilih Agama -</option>
            <option value="Islam">Islam</option>
            <option value="Kristen Katholik">Kristen Katholik</option>
            <option value="Kristen Protestan">Kristen Protestan</option>
            <option value="Hindu">Hindu</option>
            <option value="Buddha">Buddha</option>
            <option value="Konghucu">Konghucu</option>
            <option value="Lainnya">Lainnya</option>
        </select>
    </div>
</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Perkawinan</label>
				<div class="col-sm-3">
					<select name="kawin" id="kawin" class="form-control">
						<option>- Pilih -</option>
						<option>Sudah</option>
						<option>Belum</option>
						<option>Cerai Mati</option>
						<option>Cerai Hidup</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required>
				</div>
			</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keluarga</label>
				<div class="col-sm-6">
					<select name="id_kk" id="id_kk" class="form-control select2bs4" required>
						<option selected="selected">- Pilih KK -</option>
						<?php
                        // ambil data dari database
                        $query = "select * from tb_kk";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
						<option value="<?php echo $row['id_kk'] ?>">
							<?php echo $row['nomor_kartu_keluarga'] ?>
							-
							<?php echo $row['kepala'] ?>
						</option>
						<?php
                        }
                        ?>
					</select>
				</div>


				</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-lahir" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php
if (isset($_POST['Simpan'])) {
	// Mulai proses simpan data ke tb_lahir
	$sql_simpan_lahir = "INSERT INTO tb_lahir (nama, tgl_lh, jekel, id_kk) VALUES (
		'" . $_POST['nama'] . "',
		'" . $_POST['tgl_lh'] . "',
		'" . $_POST['jekel'] . "',
		'" . $_POST['id_kk'] . "'
	)";
	$query_simpan_lahir = mysqli_query($koneksi, $sql_simpan_lahir);

	// Mulai proses simpan data ke tb_pdd
	$sql_simpan_pdd = "INSERT INTO tb_pdd (nik, nama, tempat_lh, tgl_lh, jekel, desa, rt, rw, agama, kawin, pekerjaan, negara) VALUES (
		'" . $_POST['nik'] . "',
		'" . $_POST['nama'] . "',
		'" . $_POST['tempat_lh'] . "',
		'" . $_POST['tgl_lh'] . "',
		'" . $_POST['jekel'] . "',
		'" . $_POST['desa'] . "',
		'" . $_POST['rt'] . "',
		'" . $_POST['rw'] . "',
		'" . $_POST['agama'] . "',
		'" . $_POST['kawin'] . "',
		'" . $_POST['pekerjaan'] . "',
		'" . $_POST['negara'] . "'
	)";
	$query_simpan_pdd = mysqli_query($koneksi, $sql_simpan_pdd);

	// Tutup koneksi database
	mysqli_close($koneksi);

	if ($query_simpan_lahir && $query_simpan_pdd) {
		echo "<script>
			Swal.fire({
				title: 'Tambah Data Berhasil',
				text: '',
				icon: 'success',
				confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'index.php?page=data-lahir';
				}
			})</script>";
	} else {
		echo "<script>
			Swal.fire({
				title: 'Tambah Data Gagal',
				text: '',
				icon: 'error',
				confirmButtonText: 'OK'
			}).then((result) => {
				if (result.value) {
					window.location = 'index.php?page=add-lahir';
				}
			})</script>";
	}
}
?>