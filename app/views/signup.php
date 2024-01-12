<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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

    .contenr {
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
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .image-container img {
        max-width: 100%;
        height: auto;
    }

    .formulaire {
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

    .pp {
        display: none;
        color: red;
    }

    #Signup {
        width: 100%;
        color: #fff;
        z-index: 555;
        background-color: #073b3b;
        cursor: pointer;
        height: 5vh;
        max-width: 300px;
    }

    @media (min-width: 768px) {
        .contenr {
            flex-direction: row;
            height: 60vh;
        }

        .image-container {
            flex: 1;
        }

        .formulaire {
            flex: 1;
        }
    }
</style>

<body>
    <?php
    include('includ/header.php');
    ?>

    <main class="bg-light">
        <div class="contenr bg-white">
            <div class="image-container">
                <img src="https://media.istockphoto.com/id/453069475/fr/photo/base-de-connaissances-wiki-bouton.jpg?b=1&s=612x612&w=0&k=20&c=gMvgnOspl8GbknMBM9enAPk4y5-RMpbpsscJBLTLCqI="
                    alt="Image de démonstration" />
            </div>
            <form method="POST" class="formulaire">
                <input type="text" name="prenom" placeholder="Prénom" required class="input">
                <p class="pp">Entrez 3 caractères ou plus</p>
                <input type="text" name="nom" placeholder="Nom" required class="input">
                <p class="pp">Entrez 3 caractères ou plus</p>
                <input type="email" name="email" placeholder="Email" required class="input">
                <p class="pp">Veuillez entrer une adresse e-mail valide</p>
                <input type="password" name="mot_de_passe" placeholder="Mot de passe" required class="input">
                <p class="pp">Entrez 8 caractères ou plus</p>
                <select name="user_type">
                    <option value="1">Auteur</option>
                    <option value="3">Utilisateur</option>
                </select>
                <input type="submit" name="submit" value="S'inscrire" class="btn btn-secondary" id="Signup">
            </form>
        </div>
    </main>

    <?php
    include('includ/footer.php');
    ?>

    <script>
        let inputs = Array.from(document.querySelectorAll(".input"));
        let parg = document.querySelectorAll(".pp");
        let submit = document.getElementById('Signup');
        let valid = /^\w+@\w+\.(com|net|ma)$/;
        let submit_data = 0;
        inputs.forEach((item, index) => {
            item.addEventListener("input", (e) => {
                if (item.type === "text" && typeof item.value === "string" && item.value.length > 2) {
                    item.style.border = "3px solid green";
                    parg[index].style.display = "none";
                    submit_data = 1;
                    return 0;
                } else {
                    item.style.border = "2px solid red";
                    parg[index].style.display = "flex";
                    submit_data = 0;
                }
                if (item.type === "email" && typeof item.value === "string" && valid.test(item.value)) {
                    item.style.border = "3px solid green";
                    parg[index].style.display = "none";
                    submit_data = 1;
                    return 0;
                } else {
                    item.style.border = "2px solid red";
                    parg[index].style.display = "flex";
                    submit_data = 0;
                }
                if (item.type === "password" && typeof item.value === "string" && item.value.length > 7) {
                    item.style.border = "3px solid green";
                    parg[index].style.display = "none";
                    submit_data = 1;
                    return 0;
                } else {
                    item.style.border = "2px solid red";
                    parg[index].style.display = "flex";
                    submit_data = 0;
                }
            });
        });

        submit.addEventListener("click", (e) => {
            if (submit_data === 0) {
                e.preventDefault();
            }
        });
    </script>
</body>

</html>