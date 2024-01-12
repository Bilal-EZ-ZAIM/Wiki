<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="./includs/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    main {
        background-color: #eaeaea;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    .contenu {
        display: flex;
        flex-direction: column;
        max-width: 800px;
        width: 100%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .image-container {
        overflow: hidden;
        background-color: #fff;
        flex: 1;
    }

    .image-container img {
        max-width: 100%;
        max-height: 100%;
        border-radius: 5px;
    }

    .formulaire {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        line-height: 1.5;
        font-size: 18px;
        color: #073b3b;
        font-weight: bold;
        gap: 20px;
        font-family: 'Segoe UI', 'Open Sans', 'Helvetica Neue', sans-serif;
        padding: 20px;
    }

    .formulaire input {
        height: 5vh;
        width: 100%;
        max-width: 300px;
        padding: 5px;
        outline: none;
        font-size: 16px;
        border-radius: 5px;
    }

    .erreur {
        display: none;
        color: red;
    }
</style>

<body>
    <?php
    include('includ/header.php');
    ?>

    <main class="bg-light">
        <div class="contenu bg-white">
            <div class="image-container">
                <img src="https://images.pexels.com/photos/2882566/pexels-photo-2882566.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                    alt="Image de démonstration" />
            </div>
            <form method="POST" class="formulaire">
                <input type="email" name="email" placeholder="Adresse e-mail" required class="valide">
                <p class="erreur">Veuillez entrer une adresse e-mail valide</p>
                <input type="password" name="mot_de_passe" placeholder="Mot de passe" required class="valide">
                <p class="erreur">Entrez 8 caractères ou plus</p>
                <input type="submit" name="login" class="btn btn-dark" id="submit" value="login">
            </form>
        </div>
    </main>

    <?php
    include('includ/footer.php');
    ?>
    <script>
        let inputs = Array.from(document.querySelectorAll(".valide"));
        let erreurs = document.querySelectorAll(".erreur");
        let submit = document.getElementById('submit');
        let regexEmail = /^\w+@\w+\.(com|net|ma)$/;
        let soumissionDonnees = 0;

        inputs.forEach((item, index) => {
            item.addEventListener("input", (e) => {
                if (
                    item.type === "email" &&
                    typeof item.value === "string" &&
                    regexEmail.test(item.value)
                ) {
                    item.style.border = "3px solid green";
                    erreurs[index].style.display = "none";
                    soumissionDonnees = 1;
                    return 0;
                } else {
                    item.style.border = "2px solid red";
                    erreurs[index].style.display = "flex";
                    soumissionDonnees = 0;
                }
                if (
                    item.type === "password" &&
                    typeof item.value === "string" &&
                    item.value.length > 7
                ) {
                    item.style.border = "3px solid green";
                    erreurs[index].style.display = "none";
                    soumissionDonnees = 1;
                    return 0;
                } else {
                    item.style.border = "2px solid red";
                    erreurs[index].style.display = "flex";
                    soumissionDonnees = 0;
                }
            });
        });

        submit.addEventListener("click", (e) => {
            if (soumissionDonnees === 0) {
                e.preventDefault();
            }
        });
    </script>
</body>

</html>
