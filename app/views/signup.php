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

    main .contenr form #Signup {
        width: 200px;
        color: #fff;
        z-index: 555;
        background-color: #073b3b;
        cursor: pointer;
        height: 5vh;

    }

    main .contenr form .input {
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
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap" />
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..."
                        aria-label="Search">
                </form>

                <div class="text-end">
                    <a href="login" type="button" class="btn btn-outline-light me-2"> Login </a>
                    <a href="Signup" type="button" class="btn btn-warning">Sign-up</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="contenr">
            <form method="POST">
                <input type="text" name="prenom" placeholder="prenom" required class="input">
                <p class="pp">enter 3 character ou plusieur</p>
                <input type="text" name="nom" placeholder="nom" required class="input">
                <p class="pp">enter 3 character ou plusieur</p>
                <input type="email" name="email" placeholder="email" required class="input">
                <p class="pp">please enter email</p>
                <input type="password" name="mot_de_passe" placeholder="password" required class="input">
                <p class="pp">enter 8 character ou plusieur</p>
                <select name="user_type">
                    <option value="1">autore</option>
                    <option value="null">utilesateur</option>
                </select>
                <input type="submit" name="submit" value="Signup" class="btn btn-secondary">
            </form>
        </div>
    </main>


    <script>

        let inputs = Array.from(document.querySelectorAll(".input"));
        let parg = document.querySelectorAll(".pp");
        let submit = inputs[inputs.length - 1];
        let valid = /^\w+@\w+\.(com|net|ma)$/;
        let submit_data = 0;
        inputs.forEach((item, index) => {
            item.addEventListener("input", (e) => {
                if (item.type === "tel") {
                    item.style.border = "3px solid green";
                    parg[index].style.display = "none";
                    submit_data = 1;
                    console.log("hjjh");
                    return 0;
                } else {
                    item.style.border = "2px solid red";
                    parg[index].style.display = "flex";
                    submit_data = 0;
                }
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
                if (item.name === "dpassword" && inputs[index - 1].value === item.value) {
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
                    item.type === "text" &&
                    typeof item.value === "string" &&
                    item.value.length > 2
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
        
    </script>



</body>

</html>