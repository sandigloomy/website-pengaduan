<?php

require_once('tcpdf/tcpdf.php');


// Buat koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pengaduan_masyarakatt";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Ambil data pengaduan dari tabel pengaduan
$sql = "SELECT * FROM pengaduan";
$result = mysqli_query($conn, $sql);

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

$pdf->SetTitle('Laporan Pengaduan Masyarakat');
// $pdf->SetHeaderData('', 0, 'Laporan Pengaduan Masyarakat', 'Dicetak pada: ' . date('j F Y, g:i a'), array(0, 64, 255), array(255, 255, 255));
$pdf->setHeaderFont(Array('helvetica', '', 14));
$pdf->setFooterFont(Array('helvetica', '', 12));
$pdf->SetFooterMargin(20);
$pdf->SetAutoPageBreak(TRUE, 20);
$pdf->SetFont('helvetica', '', 12);
$pdf->AddPage();

// Tambahkan isi laporan di sini
$html = '<table border="1" cellpadding="5" cellspacing="0">
<tr>
<th>No.</th>
<th>Tanggal Pengaduan</th>
<th>Nik Pengadu</th>
<th>Isi Pengaduan</th>
<th>Statu</th>
</tr>';
$i = 1;
while($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>';
    $html .= '<td>'.$i.'</td>';
    $html .= '<td>'.$row['tgl_pengaduan'].'</td>';
    $html .= '<td>'.$row['nik'].'</td>';
    $html .= '<td>'.$row['isi_laporan'].'</td>';
    $html .= '<td>'.$row['status'].'</td>';
    $html .= '</tr>';
    $i++;
}
$html .= '</table>';

$pdf->writeHTML($html, true, false, true, false, '');

ob_clean(); // membersihkan output buffer
$pdf->Output('laporan.pdf', 'D');
