<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pdd WHERE id_pend='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>

<div class="card card-success">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Ubah Data</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No Sistem</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="id_pend" name="id_pend" value="<?php echo $data_cek['id_pend']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
    <label class="col-sm-2 col-form-label">NIK</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="nik" name="nik" value="<?php echo htmlspecialchars($data_cek['nik']); ?>" placeholder="NIK" required>
    </div>
</div>

<script>
    // Mendapatkan elemen input NIK
    var inputNIK = document.getElementById("nik");

    // Event listener untuk memvalidasi input NIK
    inputNIK.addEventListener("input", function() {
        // Menghapus karakter selain angka dari nilai input
        this.value = this.value.replace(/[^0-9]/g, "");
    });
</script>



			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_cek['nama']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">TTL</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="tempat_lh" name="tempat_lh" value="<?php echo $data_cek['tempat_lh']; ?>"
					/>
				</div>
				<div class="col-sm-3">
					<input type="date" class="form-control" id="tgl_lh" name="tgl_lh" value="<?php echo $data_cek['tgl_lh']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-3">
					<select name="jekel" id="jekel" class="form-control">
						<option value="">-- Pilih jekel --</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['jekel'] == "LK") echo "<option value='LK' selected>LK</option>";
                else echo "<option value='LK'>LK</option>";

                if ($data_cek['jekel'] == "PR") echo "<option value='PR' selected>PR</option>";
                else echo "<option value='PR'>PR</option>";
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="desa" name="desa" value="<?php echo $data_cek['desa']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">RT/RW</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="rt" name="rt" value="<?php echo $data_cek['rt']; ?>"
					/>
				</div>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="rw" name="rw" value="<?php echo $data_cek['rw']; ?>"
					/>
				</div>
			</div>

			<div class="form-group row">
    <label class="col-sm-2 col-form-label">Agama</label>
    <div class="col-sm-6">
        <select class="form-control" id="agama" name="agama" required>
            <option value="">- Pilih Agama -</option>
            <option value="Islam"<?php if ($data_cek['agama'] == "Islam") echo " selected"; ?>>Islam</option>
            <option value="Kristen Katholik"<?php if ($data_cek['agama'] == "Kristen Katholik") echo " selected"; ?>>Kristen Katholik</option>
            <option value="Kristen Protestan"<?php if ($data_cek['agama'] == "Kristen Protestan") echo " selected"; ?>>Kristen Protestan</option>
            <option value="Hindu"<?php if ($data_cek['agama'] == "Hindu") echo " selected"; ?>>Hindu</option>
            <option value="Buddha"<?php if ($data_cek['agama'] == "Buddha") echo " selected"; ?>>Buddha</option>
            <option value="Konghucu"<?php if ($data_cek['agama'] == "Konghucu") echo " selected"; ?>>Konghucu</option>
            <option value="Lainnya"<?php if ($data_cek['agama'] == "Lainnya") echo " selected"; ?>>Lainnya</option>
        </select>
    </div>
</div>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Status Perkawinan</label>
				<div class="col-sm-3">
					<select name="kawin" id="kawin" class="form-control">
						<option value="">-- Pilih Status --</option>
						<?php
                //menhecek data yg dipilih sebelumnya
                if ($data_cek['kawin'] == "Sudah") echo "<option value='Sudah' selected>Sudah</option>";
                else echo "<option value='Sudah'>Sudah</option>";

                if ($data_cek['kawin'] == "Belum") echo "<option value='Belum' selected>Belum</option>";
				else echo "<option value='Belum'>Belum</option>";
				
				if ($data_cek['kawin'] == "Cerai Mati") echo "<option value='Cerai Mati' selected>Cerai Mati</option>";
                else echo "<option value='Cerai Mati'>Cerai Mati</option>";

                if ($data_cek['kawin'] == "Cerai Hidup") echo "<option value='Cerai Hidup' selected>Cerai Hidup</option>";
                else echo "<option value='Cerai Hidup'>Cerai Hidup</option>";
            ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="<?php echo $data_cek['pekerjaan']; ?>"
					/>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
			<a href="?page=data-pend" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_pdd SET 
		nik='".$_POST['nik']."',
		nama='".$_POST['nama']."',
		tempat_lh='".$_POST['tempat_lh']."',
		tgl_lh='".$_POST['tgl_lh']."',
		jekel='".$_POST['jekel']."',
		desa='".$_POST['desa']."',
		rt='".$_POST['rt']."',
		rw='".$_POST['rw']."',
		agama='".$_POST['agama']."',
		kawin='".$_POST['kawin']."',
		pekerjaan='".$_POST['pekerjaan']."'
		WHERE id_pend='".$_POST['id_pend']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pend';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data-pend';
        }
      })</script>";
    }}
