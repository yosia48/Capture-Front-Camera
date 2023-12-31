<?php
// Pastikan folder "uploads" sudah ada dan memiliki izin untuk menulis
$uploadsDir = 'uploads/';

if (!file_exists($uploadsDir)) {
    mkdir($uploadsDir, 0755, true);
}

// Terima data foto dari permintaan POST
$dataURL = $_POST['photo'];

// Generate nama unik untuk file
$filename = $uploadsDir . 'foto_' . time() . '.jpg';

// Decode data URL menjadi binary dan simpan ke file
$binaryData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $dataURL));
file_put_contents($filename, $binaryData);

echo 'Foto berhasil disimpan sebagai ' . $filename;
?>
