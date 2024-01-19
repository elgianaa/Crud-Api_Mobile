<?php
require_once('../config/koneksi_db.php');
$data = json_decode(file_get_contents("php://input"));

if (isset($data->id) && $data->id != null) {
    $id = $data->id;

    $sql = $conn->prepare("DELETE FROM pakaian WHERE id=?");
    $sql->bind_param('i', $id);

    // Eksekusi statement dan periksa hasilnya
    $result = $sql->execute();

    if ($result) {
        echo json_encode(array('RESPONSE' => 'SUCCESS'));
    } else {
        echo json_encode(array('RESPONSE' => 'FAILED', 'MESSAGE' => mysqli_error($conn)));
    }

    $sql->close();
} else {
    echo json_encode(array('RESPONSE' => 'FAILED', 'MESSAGE' => 'ID not provided or empty.'));
}
