<?php
include 'connection.php';

$nomeEvento = $dataEvento = $attendees = '';

if(isset($_POST)){
    $nomeEvento = $_POST['nome_evento'];
    $dataEvento = $_POST['data_evento'];
    $attendees = $_POST['attendees'];
    $id = $_POST['id'];

}

$sql = "UPDATE eventi 
SET `nome_evento`='$nomeEvento',
`data_evento`='$dataEvento',
`attendees`='$attendees' 
WHERE `id`= $id";

if ($conn->query($sql) === TRUE) {
    $nomeEvento = $dataEvento = $attendees = '';
    echo 'Success';
    header("Location: home.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();