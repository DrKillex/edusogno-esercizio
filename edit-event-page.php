<?php
require 'connection.php';

if (isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "SELECT * FROM `eventi` WHERE `id` = $id";
    $event = $conn->query($sql);
    $event = $event->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <title>Edusogno</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <main class="content">
        <?php include 'bg.php'; ?>
        <div class="form_wrapper">
            <h2 class="title">
                Modifica un evento
            </h2>
            <form action="edit-event.php" method="POST" id='reg'>
                <input type="hidden" name="id" value='<?php echo $id ?>'>
                <div class="input_wrapper">
                    <label for="nome_evento">
                        nome evento
                    </label>
                    <input type="text" name="nome_evento" placeholder="evento X" id="nome_evento" class="input_text" value="<?php echo $event['nome_evento'] ?>">
                </div>
                <div class="input_wrapper">
                    <label for="data_evento">
                        data evento
                    </label>
                    <input type="text" name="data_evento" id="data_evento" class="input_text"  value="<?php echo $event['data_evento'] ?>">
                </div>
                <div class="input_wrapper">
                    <label for="attendees">
                        Inserisci l'email dei partecipanti
                    </label>
                    <input type="text" name="attendees" placeholder="mail dei partecipanti" id="attendees" class="input_text"  value="<?php echo $event['attendees'] ?>">
                </div>
                <button type="submit" id="submitBtn" class="btn_submit">
                    Registra evento
                </button>
            </form>
        </div>
    </main>
    <script src="./assets/js/script.js"></script>
</body>

</html>