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
        <?php
        include 'bg.php';
        include 'connection.php';

        if (!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cryptoPassword = md5($password);
            $admin = false;

            $sqladmin = "SELECT `email` FROM `admins`";

            $resultAdmin = $conn->query($sqladmin);

            while($row = $resultAdmin->fetch_assoc()){
                $currentEmail=$row['email'];
                echo $currentEmail;
                echo '<br>';
                if ($currentEmail === $email){
                    $admin = true;
                    break;
                }              
            };

            $sql = "SELECT * FROM `utenti` 
                    WHERE `email` = '$email'
                    AND `password` = '$cryptoPassword' ";

            $sqlEvents = "SELECT * FROM `eventi` 
                        WHERE `attendees` LIKE '%$email%'";

            if($admin === true){
                $sqlEvents = "SELECT * FROM `eventi`";
            }

            $result = $conn->query($sql);
            $resultEvents = $conn->query($sqlEvents);


            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {

                    $name = $row['nome'];
                    $surname = $row['cognome'];
                    $email = $row['email'];
        ?>
                    <div class="cards_wrapper">
                        <h2 class="title">
                            Ciao <span class="capitalize"><?= $name . ' ' . $surname; ?></span> ecco i tuoi eventi
                        </h2>
                        <div class="cards_grid">
                            <?php
                            if ($resultEvents->num_rows > 0) {
                                // output data of each row
                                while ($rowEvents = $resultEvents->fetch_assoc()) {
                                    $eventName = $rowEvents['nome_evento'];
                                    $eventDate = $rowEvents['data_evento'];
                            ?>
                                    <div class="card">
                                        <h3 class="card_title">
                                            <?= $eventName; ?>
                                        </h3>
                                        <span class="card_date">
                                            <?= $eventDate; ?>
                                        </span>
                                        <button class="btn_submit" title="Unisciti all'evento">
                                            Join
                                        </button>
                                    </div>
                                <?php
                                }
                            } else {
                                ?>
                                <div class="card_wrapper">
                                    <h3 class="card_title">
                                        Non hai eventi
                                    </h3>
                                </div>
                        </div>
                    </div>
            <?php
                            }
                        }
                    } else {
            ?>
            <div class="form_wrapper">
                <h2 class="title">
                    Qualcosa &eacute; andato storto😢
                </h2>
                <a href="/edusogno-esercizio/" class="form_link" title="Torna alla pagina di login">
                    Riprova ad effettuare <span class="evidence">l'Accesso</span>
                </a>
                <a href="/edusogno-esercizio/registration-page.php" class="form_link" title="Vai alla pagina di registrazione">
                    Non hai ancora un account? <span class="evidence">Registrati</span>
                </a>
            </div>
        <?php
                    }
                } else {
        ?>
        <div class="form_wrapper">
            <h2 class="title">
                Qualcosa &eacute; andato storto😢
            </h2>
            <a href="/edusogno-esercizio/" class="form_link" title="Torna alla pagina di login">
                Riprova ad effettuare <span class="evidence">l'Accesso</span>
            </a>
            <a href="/edusogno-esercizio/registration-page.php" class="form_link" title="Vai alla pagina di registrazione">
                Non hai ancora un account? <span class="evidence">Registrati</span>
            </a>
        </div>
    <?php
                }
    ?>
    </div>
    <form action="./email.php" method="POST" class="form_password">
        <input type="hidden" name="email" value="<?= $email ?>">
        <button class="form_link" name="send" title="Cambia la password">
            Hai dimenticato la password?
        </button>
    </form>
    <?php
    $conn->close();
    ?>
    </main>
</body>

</html>