<?php
	include "../inc/koneksi.php";
	
	if (isset ($_POST['Cetak'])){
	$id = $_POST['id_pend'];
	}

	$tanggal = date("m/y");
	$tgl = date("d/m/y");

	// Impor library PHP QR Code
	require "../plugins/phpqrcode/qrlib.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>CETAK SURAT PINDAH</title>
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

        /* CSS untuk menempatkan align left dan align right di baris yang sama */
        .align-container {
            display: flex;
            justify-content: space-between;
        }

        .align-container p {
            margin: 0;
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
		$sql_tampil = "select m.id_pindah, m.id_pdd, m.tgl_pindah, m.alasan, m.pindah_ke, p.nik, p.nama, p.tempat_lh, p.tgl_lh, p.jekel, p.desa, p.rt, p.rw, p.agama, p.kawin, p.pekerjaan, p.negara from tb_pindah m inner join tb_pdd p on 
        m.id_pdd=p.id_pend
        where id_pend ='$id'";
			
			$query_tampil = mysqli_query($koneksi, $sql_tampil);
			$no=1;
			while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
		?>
	</center>

	<center>
		<h4>
			<u>SURAT KETARANGAN PINDAH PENDUDUK</u>
		</h4>
		<h4>No Surat :
			<?php echo $data['id_pindah']; ?>/Ket.Pindah/
            <?php echo date('d/m/Y'); ?></h4>
		</h4>
	</center>
	<p>Yang bertandatangan dibawah ini Kepala Desa Pekauman Timur,
		 Kecamatan Martapura Timur, Kabupaten Banjar, dengan ini menerangkan bahwa :</p>
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
					<?php
// Array mapping English month names to Indonesian month names
$monthNames = array(
    'January'   => 'Januari',
    'February'  => 'Februari',
    'March'     => 'Maret',
    'April'     => 'April',
    'May'       => 'Mei',
    'June'      => 'Juni',
    'July'      => 'Juli',
    'August'    => 'Agustus',
    'September' => 'September',
    'October'   => 'Oktober',
    'November'  => 'November',
    'December'  => 'Desember'
);

$date = $data['tgl_lh'];
$formattedDate = date('d', strtotime($date)).' '.$monthNames[date('F', strtotime($date))].' '.date('Y', strtotime($date));
echo $formattedDate;
?>
				</td>
			</tr>

			<tr>
    <td>Jenis Kelamin</td>
    <td>:</td>
    <td>
        <?php
        $jekel = $data['jekel'];
        if ($jekel === 'LK') {
            echo 'Laki-Laki';
        } elseif ($jekel === 'PR') {
            echo 'Perempuan';
        } else {
            echo $jekel;
        }
        ?>
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
				<td>Kewarganegaraan</td>
				<td>:</td>
				<td>
					<?php echo $data['negara']; ?>
				</td>
			</tr>

			<tr>
				<td>Status Perkawinan</td>
				<td>:</td>
				<td>
					<?php echo $data['kawin']; ?>
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
                <td>Alamat Asal</td>
                <td>:</td>
                <td>
                    <?php echo $data['desa']; ?> Rt
                    <?php echo $data['rt']; ?> / Rw
                    <?php echo $data['rw']; ?>
                </td>
            </tr>

			<tr>
				<td>Pindah Ke</td>
				<td>:</td>
				<td>
					<?php echo $data['pindah_ke']; ?>
				</td>
			</tr>

			<tr>
				<td>Alasan</td>
				<td>:</td>
				<td>
					<?php echo $data['alasan']; ?>
				</td>
			</tr>

			<?php } ?>
		</tbody>
	</table>
	<p>Telah benar-benar Pindah dari Desa Pekauman Timur, Kecamatan Martapura Timur, Kabupaten Banjar.
		Demikian Surat ini dibuat, agar dapat digunakan sebagai mana mestinya.</P>
	<br>
	<br>
	<br>
    <br>
    <br>
    <br>
    <br>
	<div class="align-container">
    <p align="left" style="padding-left: 3em;">
        Pemohon
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>. . . . . . . . . . . . . . . . . .
    </p>

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
