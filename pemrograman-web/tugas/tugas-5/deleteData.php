<?php
include 'connect.php';

if (isset($_GET['npm'])) {
    $npm = $_GET['npm'];

    $stmt = $conn->prepare("DELETE FROM identitas WHERE npm = ?");
    $stmt->bind_param("s", $npm);

    if ($stmt->execute()) {
        echo "Data berhasil dihapus!";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();

header('Location: index.php');
exit;
?>
