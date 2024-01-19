<?php
require_once('../config/koneksi_db.php');
$data = json_decode(file_get_contents("php://input"));

if (isset($data->id) && $data->id != null) {
    $id   = $data->id;
    $nama = $data->nama;
    $harga = $data->harga;
    $tipe = $data->tipe;
    $stok = $data->stok;

    try {
        $sql = $conn->prepare("UPDATE pakaian SET nama=?, tipe=?, harga=?, stok=? WHERE id=?");

        // Bind parameter
        $sql->bind_param('ssddi', $nama, $tipe, $harga, $stok, $id);

        // Eksekusi statement
        $result = $sql->execute();

        if ($result) {
            echo json_encode(array('RESPONSE' => 'SUCCESS'));
        } else {
            echo json_encode(array('RESPONSE' => 'FAILED', 'MESSAGE' => mysqli_error($conn)));
        }

        $sql->close();
    } catch (Exception $e) {
        echo json_encode(array('RESPONSE' => 'FAILED', 'MESSAGE' => $e->getMessage()));
    }
} else {
    echo json_encode(array('RESPONSE' => 'FAILED', 'MESSAGE' => 'ID not provided or empty.'));
}
