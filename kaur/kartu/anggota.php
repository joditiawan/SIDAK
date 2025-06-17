<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_kk WHERE id_kk='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
		$data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
		
		$karkel=$data_cek['id_kk'];
    }
?>


<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-users"></i> Anggota KK</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">


			<input type='hidden' class="form-control" id="id_kk" name="id_kk" value="<?php echo $data_cek['id_kk']; ?>"
			 readonly/>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No KK | KPl Keluarga</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="nomor_kartu_keluarga" name="nomor_kartu_keluarga" value="<?php echo $data_cek['nomor_kartu_keluarga']; ?>"
					 readonly/>
				</div>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="kepala" name="kepala" value="<?php echo $data_cek['kepala']; ?>"
					 readonly/>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" value="<?php echo $data_cek['desa']; ?>, RT <?php echo $data_cek['rt']; ?> RW <?php echo $data_cek['rw']; ?> (<?php echo $data_cek['kec']; ?> - <?php echo $data_cek['kab']; ?> - <?php echo $data_cek['prov']; ?>)"
					 readonly/>
				</div>
			</div>


			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>NIK</th>
								<th>Nama</th>
								<th>Jenis Kelamin</th>
								<th>Hub Keluarga</th>
							</tr>
						</thead>
						<tbody>

							<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT p.nik, p.nama, p.jekel, a.hubungan, a.id_anggota 
			  from tb_pdd p inner join tb_anggota a on p.id_pend=a.id_pend where status='Ada' and id_kk=$karkel");
              while ($data= $sql->fetch_assoc()) {
            ?>

							<tr>
								<td>
									<?php echo $data['nik']; ?>
								</td>
								<td>
									<?php echo $data['nama']; ?>
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
									<?php echo $data['hubungan']; ?>
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
		</div>
		<div class="card-footer">
			<a href="?page=data-kartu-kaur" title="Kembali" class="btn btn-warning">Kembali</a>
		</div>
	</form>
</div>

<?php

    if (isset ($_POST['Simpan'])){
    //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_anggota (id_kk, id_pend, hubungan) VALUES (
            '".$_POST['id_kk']."',
            '".$_POST['id_pend']."',
            '".$_POST['hubungan']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        mysqli_close($koneksi);

    if ($query_simpan) {
      echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=anggota&kode=".$_POST['id_kk']."';
          }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=anggota&kode=".$_POST['id_kk']."';
          }
      })</script>";
    }}
     //selesai proses simpan data
