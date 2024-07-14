<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

date_default_timezone_set('Asia/Jakarta');

require "../../koneksi.php";
if (!file_exists('../../firebase_config.php')) {
    echo "Error: firebase_config.php file not found";
    exit;
}

require '../../firebase_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_taneman = $_POST['id'];
    echo "Received ID: " . $id_taneman . "<br>"; // Debugging
    $status = 0;

    $sql = "UPDATE history SET status = '$status' WHERE id_taneman = '$id_taneman'";
    if (mysqli_query($connect, $sql)) {
        $reference = $database->getReference('history')->orderByChild('id_taneman')->equalTo($id_taneman)->getSnapshot();

        if ($reference->numChildren() > 0) {
            $key = array_key_first($reference->getValue());
            $database->getReference('history/'. $key)->update(['status' => $status]);
        }

        echo "Status updated to 0";
    } else {
        echo "Error updating status";
    }
}
?>
