<?php
	include "../inc/koneksi.php";
	
	if (isset ($_POST['Cetak'])){
	$id = $_POST['lahir'];
	}

	$tanggal = date("m/y");
	$tgl = date("d/m/y");
	// Impor library PHP QR Code
require "../plugins/phpqrcode/qrlib.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>CETAK SURAT KELAHIRAN</title>
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
			$sql_tampil = "select * from tb_lahir where id_lahir='$id'";
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</center>
	<center>
		<h4>
			<u>SURAT KETARANGAN KELAHIRAN</u>
		</h4>
		<h4>No Surat :
			<?php echo $data['id_lahir']; ?>/Ket.Kelahiran/
			<?php echo date('d/m/Y'); ?></h4>
		</h4>
	</center>
	<p>Yang bertandatangan dibawah ini Kepala Desa Pekauman Timur, Kecamatan Martapura Timur,</p>
     <p>Kabupaten Banjar, dengan ini menerangkan bahwa :</p>
	<table>
		<tbody>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>
					<?php echo $data['nama']; ?>
				</td>
			</tr>
			<tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
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
            </tr>
			<tr>
			<tr>
    <td>Tanggal Lahir</td>
    <td>:</td>
    <td>
        <?php
        // Array nama bulan dalam Bahasa Indonesia
        $bulanIndonesia = array(
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'Mei', 6 => 'Juni',
            7 => 'Juli', 8 => 'Agustus', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
        );
        
        $tgl_lh = $data['tgl_lh'];
        $tanggal = date('d', strtotime($tgl_lh));
        $bulan = $bulanIndonesia[date('n', strtotime($tgl_lh))];
        $tahun = date('Y', strtotime($tgl_lh));
        
        echo $tanggal . ' ' . $bulan . ' ' . $tahun;
        ?>
    </td>
</tr>


			<?php } ?>
		</tbody>
	</table>
	<p>Telah benar-benar Lahir di Desa Pekauman Timur, Kecamatan Martapura Timur, Kabupaten Banjar</P>
	<p>Demikian Surat ini dibuat, agar dapat digunakan sebagaimana mestinya.</P>
	<br>
	<br>
	<br>
    <br>
	<br>
	<br>
    <br>
	<br>
	<br>
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
