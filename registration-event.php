<?php
include 'connection.php';

$nomeEvento = $dataEvento = $attendees = '';

if(isset($_POST)){
    $nomeEvento = $_POST['nome_evento'];
    $dataEvento = $_POST['data_evento'];
    $attendees = $_POST['attendees'];
}

$sql = "INSERT INTO eventi (nome_evento, data_evento, attendees)
        VALUES ('$nomeEvento', '$dataEvento', '$attendees')";

if ($conn->query($sql) === TRUE) {
    $nomeEvento = $dataEvento = $attendees = '';
    echo 'Success';
    header("Location: home.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();