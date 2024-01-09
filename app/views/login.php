<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>articels</title>
    <link rel="stylesheet" href="./includs/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    main {
        background-color: #eaeaea;
    }

    main .contenr {
        height: 80vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    main .contenr form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        line-height: 5;
        font-size: 22px;
        color: #073b3b;
        font-weight: bold;
        gap: 30px;
        font-family: system-ui, 'Segoe UI', 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    main .contenr form input {
        height: 5vh;
        width: 300px;
        padding: 5px;
        outline: none;
        font-size: 20px;
        border-radius: 5px;
    }

    .pp {
        display: none;
    }
</style>

<body>
    <?php
    include('includ/header.php');
    ?>


    <main>
        <div class="contenr">
            <form method="POST">
                <input type="email" name="email" placeholder="email" required class="valid">
                <p class="pp">please enter email</p>
                <input type="password" name="mot_de_passe" placeholder="mot_de_passe" required class="valid">
                <p class="pp">enter 8 character ou plusieur</p>
                <input type="submit" name="login" class="btn btn-secondary" class="valid" id="submit">
            </form>
        </div>
    </main>

    <script>

        let inputs = Array.from(document.querySelectorAll(".valid"));
        let parg = document.querySelectorAll(".pp");
        let submit = document.getElementById('submit');
        let valid = /^\w+@\w+\.(com|net|ma)$/;
        let submit_data = 0;
        console.log(submit);
        inputs.forEach((item, index) => {
            item.addEventListener("input", (e) => {

                if (
                    item.type === "email" &&
                    typeof item.value === "string" &&
                    valid.test(item.value)
                ) {
                    item.style.border = "3px solid green";
                    parg[index].style.display = "none";
                    submit_data = 1;
                    return 0;
                } else {
                    item.style.border = "2px solid red";
                    parg[index].style.display = "flex";
                    submit_data = 0;
                }
                if (
                    item.type === "password" &&
                    typeof item.value === "string" &&
                    item.value.length > 7
                ) {
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

        function validitEmail() {
            if (valid.test(email.value)) {
                email.style.border = "2px solid green";
                return 1;
            } else {
                console.log("nice");
                email.style.border = "2px solid red";
            }
        }
    </script>


</body>

</html>