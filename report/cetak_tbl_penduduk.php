
<!DOCTYPE html>
<html lang="en">

<head>
<title>CETAK SURAT PENDUDUK</title>
<style> 

/* CSS untuk mengatur tata letak logo dan judul */
        .header-container {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 100px;
            height: 100px;
        }

        .header-text {
            margin-left: 20px;
        }
		</style>
</head>

<body>
    <center>
        <div class="header-container">
            <!-- Logo -->
			<img src="build/img/KAB_BANJAR.png" alt="Logo" class="logo">
            <div class="header-text">
                <p><h2><b>PEMERINTAH KABUPATEN BANJAR</b></h2></p>
                <p><h3><b>KECAMATAN MARTAPURA TIMUR DESA PEKAUMAN TIMUR</b></h3></p>
            </div>
        </div>
        <p>Jl. Martapura Lama, Cindai Alus, Kec. Martapura, Kabupaten Banjar,<br> Kalimantan Selatan 70611</p>
        <u><p>__________________________________________________________________________________________________________________</p></u>
</center>
<center>
        <h4>
            <u><b>DATA PENDUDUK DESA PEKAUMAN TIMUR <?php echo date('Y'); ?></P></b></u>
        </h4>
        <P>No Surat: ... /Ket.Data Penduduk/
        <?php echo date('d/m/Y'); ?></P>
    </center>
    <BR>

    <table id="example1" class="table table-bordered">
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>No KK</th>
					</tr>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT p.id_pend, p.nik, p.nama, p.jekel, p.desa, p.rt, p.rw, a.id_kk, k.nomor_kartu_keluarga, k.kepala from 
			  tb_pdd p left join tb_anggota a on p.id_pend=a.id_pend 
			  left join tb_kk k on a.id_kk=k.id_kk where status='Ada'");
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
							<?php echo $data['desa']; ?>
							RT
							<?php echo $data['rt']; ?>/ RW
							<?php echo $data['rw']; ?>.
						</td>
						<td>
							<?php echo $data['nomor_kartu_keluarga']; ?>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
			</table>
            <br>
            <br>
            <br>
            <br>
            

            <p align="right" style="flex: 1;">
        <b>Pekauman Timur,
        <?php
        $bulan = date('n');
        $namaBulan = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $bulanIndonesia = $namaBulan[$bulan - 1];
        $tanggal = date('d');
        $tahun = date('Y');
        echo $tanggal . ' ' . $bulanIndonesia . ' ' . $tahun;
        ?>
        <br> KEPALA DESA</b> <span style="opacity: 0;">......................</span>
        <br>
        <img src="report/ttd.png" alt="Gambar Kepala Desa" width="200" height="200">
        </p>
            
            <script>
        window.print();
    </script>
</body>
</html>