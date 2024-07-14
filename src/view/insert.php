<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('Asia/Jakarta');

require "../../koneksi.php";
if (!file_exists('../../firebase_config.php')) {
    echo json_encode(['error' => 'firebase_config.php file not found']);
    exit;
}

require '../../firebase_config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id_taneman = $_GET['id'];
    $date = date("Y-m-d H:i:s"); 
    $status = 1;

    $pinModeSql = "SELECT pinMode FROM taneman WHERE id = '$id_taneman'";
    $pinModeResult = mysqli_query($connect, $pinModeSql);
    $pinMode = mysqli_fetch_assoc($pinModeResult)['pinMode'];

    $checkSql = "SELECT * FROM history WHERE id_taneman = '$id_taneman'";
    $result = mysqli_query($connect, $checkSql);

    if (mysqli_num_rows($result) > 0) {
        $sql = "UPDATE history SET date = '$date', status = '$status' WHERE id_taneman = '$id_taneman'";
    } else {
        $sql = "INSERT INTO history (id_taneman, date, status) VALUES ('$id_taneman', '$date', '$status')";
    }

    if (mysqli_query($connect, $sql)) {
        $data = ['id_taneman' => $id_taneman, 'date' => $date, 'status' => $status, 'pinMode' => $pinMode];
        $reference = $database->getReference('history')->orderByChild('id_taneman')->equalTo($id_taneman)->getSnapshot();
    
        if ($reference->numChildren() > 0) {
            $key = array_key_first($reference->getValue());
            $database->getReference('history/' . $key)->update($data);
        } else {
            $database->getReference('history')->push($data);
        }
    
        echo json_encode(['id_taneman' => $id_taneman, 'success' => "BERHASIL DI SIRAM!!!"]);
    } else {
        echo json_encode(['error' => "TIDAK BERHASIL DI SIRAM"]);
    }
    
}
?>