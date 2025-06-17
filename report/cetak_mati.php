<?php
	include "../inc/koneksi.php";
	
	if (isset ($_POST['Cetak'])){
	$id = $_POST['id_mendu'];
	}

	$tanggal = date("m/y");
	$tgl = date("d/m/y");

		// Impor library PHP QR Code
		require "../plugins/phpqrcode/qrlib.php";
		?>


<!DOCTYPE html>
<html lang="en">

<head>
<title>CETAK SURAT KEMATIAN</title>
    <style>
        @page {
            size: legal;
            margin: 0;
        }

        body {
            margin: 2cm;
        }

        table {
            width: 100%;
        }

        table td {
            padding: 5px;
        }

        @media print {
            #footer {
                display: none;
            }
        }

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
            <img src="../build/img/KAB_BANJAR.png" alt="Logo" class="logo">
            <div class="header-text">
                <h2>PEMERINTAH KABUPATEN BANJAR</h2>
                <h3>KECAMATAN MARTAPURA TIMUR<br>DESA PEKAUMAN TIMUR</h3>
            </div>
        </div>
        <p>Jl. Martapura Lama, Cindai Alus, Kec. Martapura, Kabupaten Banjar,<br> Kalimantan Selatan 70611</p>
        <p>________________________________________________________________________</p>

		<?php
		$sql_tampil = "select m.id_mendu, m.tgl_mendu, m.sebab, p.nik, p.nama, p.tempat_lh, p.tgl_lh, p.jekel, p.desa, p.rt, p.rw, p.agama, p.kawin, p.pekerjaan, p.negara from tb_mendu m inner join tb_pdd p on 
        m.id_pdd=p.id_pend
        where id_mendu ='$id'";
			
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>SURAT KETARANGAN KEMATIAN</u>
			</h4>
        <h4>No Surat :
            <?php echo $data['id_mendu']; ?>/Ket.Kematian/
            <?php echo date('d/m/Y'); ?></h4>
        </h4>
    </center>
    <p>Yang bertandatangan dibawah ini Kepala Desa Pekauman Timur, Kecamatan Martapura Timur, Kabupaten Banjar, dengan ini menerangkan bahwa :</p>
    <table>
		<tbody>
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>
					<?php echo $data['nik']; ?>
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama']; ?>
				</td>
			</tr>

            <tr>
                <td>Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>
                    <?php echo $data['tempat_lh']; ?>/
                    <?php echo date('d-m-Y', strtotime($data['tgl_lh'])); ?>
                </td>
            </tr>

			<tr>
				<td>Pekerjaan</td>
				<td>:</td>
				<td>
					<?php echo $data['pekerjaan']; ?>
				</td>
			</tr>

			<tr>
				<td>Agama</td>
				<td>:</td>
				<td>
					<?php echo $data['agama']; ?>
				</td>
			</tr>

            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>
                    <?php echo $data['desa']; ?> Rt
                    <?php echo $data['rt']; ?> / Rw
                    <?php echo $data['rw']; ?> 
                </td>
            </tr>
			</tbody>
			</table>
			<br>
			<center>
		<b> TELAH MENINGGAL DUNIA</B>
    </center>
	<br>
<table>
<tbody>
			<tr>
    <td>Tanggal Kematian</td>
    <td>:</td>
    <td>
        <?php
        $bulanIndonesia = array(
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember'
        );

        $hariIndonesia = array(
            1 => 'Senin',
            2 => 'Selasa',
            3 => 'Rabu',
            4 => 'Kamis',
            5 => 'Jumat',
            6 => 'Sabtu',
            7 => 'Minggu'
        );

        $tglMendu = $data['tgl_mendu'];
        $tanggal = date('d', strtotime($tglMendu));
        $bulan = date('n', strtotime($tglMendu));
        $tahun = date('Y', strtotime($tglMendu));
        $hari = date('N', strtotime($tglMendu));

        echo $hariIndonesia[$hari] . ', ' . $tanggal . ' ' . $bulanIndonesia[$bulan] . ' ' . $tahun;
        ?>
    </td>
</tr>
            </tr>
			<tr>
				<td>Sebab</td>
				<td>:</td>
				<td>
					<?php echo $data['sebab']; ?>
				</td>
			</tr>

			<tr>
				<td>Dimakamkan di</td>
				<td>:</td>
				<td>
				TPU Pekauman Timur
				</td>
			</tr>  

			<?php } ?>
		</tbody>
	</table>
	<p>Benar-benar telah
		<b>Meninggal Dunia</b>, pada waktu yang telah disebutkan diatas. Demikian Surat ini dibuat, agar dapat digunakan sebagaimana mestinya.</P>
	<br>
    <br>
    <br>
    <br>
    <br>
    <br>
	<p align="right">
        Pekauman Timur,
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
        <br> KEPALA DESA <span style="opacity: 0;">..................</span>
            <br>
            <img src="../report/ttd.png" alt="Gambar Kepala Desa" width="200" height="200">
        </p>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
