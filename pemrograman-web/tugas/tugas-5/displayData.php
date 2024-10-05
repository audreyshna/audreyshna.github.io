<?php
include 'connect.php';

$sql = "SELECT * FROM identitas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["npm"] . "</td>
                <td>" . $row["nama"] . "</td>
                <td>" . $row["alamat"] . "</td>
                <td>" . $row["tgl_lhr"] . "</td>
                <td>" . $row["jk"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>
                    <a href='updateData.php?npm=" . $row["npm"] . "'>Update</a> |
                    <a href='#' onclick=\"openModal('".$row['npm']."')\">Delete</a>
                </td>
              </tr>";
    }
}
else {
    echo "<tr><td colspan='7'>No records found</td></tr>";
}

$conn->close();
?>

<div id="deleteModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p>Apakah Anda yakin ingin menghapus data ini?</p>
        <button id="confirmDelete" onclick="confirmDelete()">Ya</button>
        <button onclick="closeModal()">Tidak</button>
    </div>
</div>

<script>
    var modal = document.getElementById("deleteModal");
    var npmToDelete = '';

    function openModal(npm) {
        npmToDelete = npm;
        modal.style.display = "block";
    }

    function closeModal() {
        modal.style.display = "none";
    }

    function confirmDelete() {
        window.location.href = "deleteData.php?npm=" + npmToDelete;
    }
</script>

<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        width: 300px;
        text-align: center;
        margin: auto;
    }

    .close {
        float: right;
        font-size: 20px;
        cursor: pointer;
    }

    button {
        margin: 10px;
        padding: 10px 20px;
        border: none;
        background-color: #f44336;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #d32f2f;
    }
</style>
