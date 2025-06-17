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
					<input type="text" class="form-control" id="nama_datang" name="nama_datang" placeholder="Nama Pendatang" required>
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
				<label class="col-sm-2 col-form-label">Tgl Datang</label>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_datang" name="tgl_datang" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Tempat Asal</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="tempat_asal" name="tempat_asal" placeholder="Tempat Asal" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alasan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="alasan_datang" name="alasan_datang" placeholder="Alasan Datang" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pelapor</label>
				<div class="col-sm-6">
					<select name="pelapor" id="pelapor" class="form-control select2bs4" required>
						<option selected="selected">- Pilih Penduduk -</option>
						<?php
				// ambil data dari database
				$query = "select * from tb_pdd where status='Ada'";
				$hasil = mysqli_query($koneksi, $query);
				while ($row = mysqli_fetch_array($hasil)) {
				?>
						<option value="<?php echo $row['id_pend'] ?>">
							<?php echo $row['nik'] ?>
							-
							<?php echo $row['nama'] ?>
						</option>
						<?php
				}
				?>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-datang" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {
    // Mulai proses simpan data tb_datang
    $sql_simpan_datang = "INSERT INTO tb_datang (nik, nama_datang, jekel, tgl_datang, tempat_asal, alasan_datang, pelapor) VALUES (
        '".$_POST['nik']."',
        '".$_POST['nama_datang']."',
        '".$_POST['jekel']."',
        '".$_POST['tgl_datang']."',
        '".$_POST['tempat_asal']."',
		'".$_POST['alasan_datang']."',
        '".$_POST['pelapor']."'
    )";
    $query_simpan_datang = mysqli_query($koneksi, $sql_simpan_datang);

    // Mulai proses simpan data tb_pdd
    $sql_simpan_pdd = "INSERT INTO tb_pdd (nik, nama, tempat_lh, tgl_lh, jekel, desa, rt, rw, agama, kawin, pekerjaan, negara, status) VALUES (
            '".$_POST['nik']."',
            '".$_POST['nama_datang']."',
			'".$_POST['tempat_lh']."',
			'".$_POST['tgl_lh']."',
            '".$_POST['jekel']."',
            '".$_POST['desa']."',
			'".$_POST['rt']."',
			'".$_POST['rw']."',
			'".$_POST['agama']."',
			'".$_POST['kawin']."',
			'".$_POST['pekerjaan']."',
			'".$_POST['negara']."',
        'Ada'
    )";
    $query_simpan_pdd = mysqli_query($koneksi, $sql_simpan_pdd);

    // Menutup koneksi ke database
    mysqli_close($koneksi);

    if ($query_simpan_datang && $query_simpan_pdd) {
        echo "<script>
            Swal.fire({
                title: 'Tambah Data Berhasil',
                text: '',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=data-datang';
                }
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Tambah Data Gagal',
                text: '',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.value) {
                    window.location = 'index.php?page=add-datang';
                }
            });
        </script>";
    }
}
