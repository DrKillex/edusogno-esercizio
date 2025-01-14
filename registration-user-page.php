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
                Crea il tuo account
            </h2>
            <form action="registration-user.php" method="POST" id='reg'>
                <div class="input_wrapper">
                    <label for="nome">
                        Inserisci il nome
                    </label>
                    <input type="text" name="nome" placeholder="Mario" id="nome" class="input_text">
                </div>
                <div class="input_wrapper">
                    <label for="cognome">
                        Inserisci il cognome
                    </label>
                    <input type="text" name="cognome" placeholder="Rossi" id="cognome" class="input_text">
                </div>
                <div class="input_wrapper">
                    <label for="email">
                        Inserisci l'email
                    </label>
                    <input type="email" name="email" placeholder="name@example.com" id="email" class="input_text">
                </div>
                <div class="input_wrapper">
                    <label for="password">
                        Inserisci la password
                    </label>
                    <div class="input_relative">
                        <input type="password" name="password" placeholder="Scrivila qui" id="password" class="input_text">
                        <?php include 'icon.php'; ?>
                    </div>
                </div>
                <button type="submit" id="submitBtn" class="btn_submit">
                    Registrati
                </button>
                <a href="/edusogno-esercizio/" class="form_link" title="Vai alla pagina di accesso">
                    Hai già un account? <span class="evidence">Accedi</span>
                </a>
            </form>
        </div>
    </main>
    <script src="./assets/js/script.js"></script>
</body>

</html>