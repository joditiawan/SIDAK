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
        <select name="no_kk" id="no_kk" class="form-control" required>
            <option value="">- Pilih NIK-</option>
            <?php
            // ambil data NIK, nama, desa, rt, rw dari tabel tb_pdd
            $query_pdd = "SELECT nik, nama, desa, rt, rw FROM tb_pdd where status='Ada'";
            $hasil_pdd = mysqli_query($koneksi, $query_pdd);
            while ($row_pdd = mysqli_fetch_array($hasil_pdd)) {
                $nik = $row_pdd['nik'];
                $nama = $row_pdd['nama'];
                // Periksa apakah nik sudah ada dalam tabel tb_kk
                $query_kk = "SELECT COUNT(*) as count FROM tb_kk WHERE no_kk='$nik'";
                $hasil_kk = mysqli_query($koneksi, $query_kk);
                $row_kk = mysqli_fetch_assoc($hasil_kk);
                $count = $row_kk['count'];

                // Jika nik tidak ada dalam tb_kk, tampilkan opsi pada select No KK
                if ($count == 0) {
                    ?>
                    <option value="<?php echo $nik; ?>" data-nama="<?php echo $row_pdd['nama']; ?>" data-desa="<?php echo $row_pdd['desa']; ?>" data-rt="<?php echo $row_pdd['rt']; ?>" data-rw="<?php echo $row_pdd['rw']; ?>">
                        <?php echo $nik; ?> - 
                        <?php echo $nama; ?>
                    </option>
                    <?php
                }
            }
            ?>
        </select>
    </div>
</div>

<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor Kartu Keluarga</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nomor_kartu_keluarga" name="nomor_kartu_keluarga" placeholder="NO KK" required>
				</div>
			</div>


<div class="form-group row">
    <label class="col-sm-2 col-form-label">Kepala Keluarga</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="kepala" name="kepala" placeholder="Kepala Keluarga" required readonly>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">Desa</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" id="desa" name="desa" placeholder="Desa" required readonly>
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-2 col-form-label">RT/RW</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" id="rt" name="rt" placeholder="RT" required readonly>
    </div>
    <div class="col-sm-3">
        <input type="text" class="form-control" id="rw" name="rw" placeholder="RW" required readonly>
    </div>
</div>

<script>
    // Mendapatkan elemen select No KK
    var selectNoKK = document.getElementById("no_kk");
    // Mendapatkan elemen input Kepala Keluarga
    var inputKepala = document.getElementById("kepala");
    // Mendapatkan elemen input Desa
    var inputDesa = document.getElementById("desa");
    // Mendapatkan elemen input RT
    var inputRT = document.getElementById("rt");
    // Mendapatkan elemen input RW
    var inputRW = document.getElementById("rw");

    // Event listener ketika opsi No KK dipilih
    selectNoKK.addEventListener("change", function() {
        // Mendapatkan atribut terkait dengan opsi yang dipilih
        var selectedOption = selectNoKK.options[selectNoKK.selectedIndex];
        var namaKepala = selectedOption.getAttribute("data-nama");
        var desa = selectedOption.getAttribute("data-desa");
        var rt = selectedOption.getAttribute("data-rt");
        var rw = selectedOption.getAttribute("data-rw");
        // Mengisi nilai Kepala Keluarga, Desa, RT, dan RW dengan nilai yang sesuai
        inputKepala.value = namaKepala;
        inputDesa.value = desa;
        inputRT.value = rt;
        inputRW.value = rw;
    });
</script>


			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kecamatan</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="kec" name="kec" placeholder="Kecamatan" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kabupaten</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="kab" name="kab" placeholder="Kabupaten" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Provinsi</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="prov" name="prov" placeholder="Provinsi" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data-kartu" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_kk (no_kk, nomor_kartu_keluarga, kepala, desa, rt, rw, kec, kab, prov) VALUES (
            '".$_POST['no_kk']."',
            '".$_POST['nomor_kartu_keluarga']."',
            '".$_POST['kepala']."',
            '".$_POST['desa']."',
            '".$_POST['rt']."',
            '".$_POST['rw']."',
            '".$_POST['kec']."',
            '".$_POST['kab']."',
            '".$_POST['prov']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data-kartu';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add-kartu';
          }
      })</script>";
    }}
     //selesai proses simpan data
