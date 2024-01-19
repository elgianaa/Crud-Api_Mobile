<?php
require_once('../config/koneksi_db.php');

if (isset($_POST['nama']) && isset($_POST['tipe']) && isset($_POST['harga']) && isset($_POST['stok'])) {
    $nama = $_POST['nama'];
    $tipe = $_POST['tipe'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    try {
        $sql = $conn->prepare("INSERT INTO pakaian(nama, tipe, harga, stok) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssdi", $nama, $tipe, $harga, $stok);

        // Eksekusi statement setelah binding parameter
        $result = $sql->execute();

        if ($result) {
            echo json_encode(array('RESPONSE' => 'success'));
        } else {
            echo json_encode(array('RESPONSE' => 'failed'));
        }

        $sql->close();
    } catch (Exception $e) {
        echo json_encode(array('RESPONSE' => 'error', 'MESSAGE' => $e->getMessage()));
    }
}
