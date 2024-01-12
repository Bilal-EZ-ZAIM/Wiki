<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous">
    <style>
        .card {
            margin-bottom: 20px;
        }
        .data{
            height: 80vh;
        }
    </style>
</head>

<body>
<?php
    include('includ/header.php');
    ?>

    <div class="container data">
        <h1 class="my-4">Wiki Cart</h1>

        <?php
        foreach ($data as $row) {
            echo '<div class="card">';
            echo '<div class="card-header">';
            echo '<h5 class="card-title"> <strong>Titer </strong> : ' .$row->titre. '</h5>';
            echo '</div>';
            echo '<div class="card-body">';
            echo '<p class="card-text"> <strong>Contenu</strong> : ' . $row->contenu . '</p>';
            echo '</div>';
            echo '<ul class="list-group list-group-flush">';
            echo '<li class="list-group-item"><strong>Author:</strong> ' . $row->prenom . ' ' . $row->nom . '</li>';
            echo '<li class="list-group-item"><strong>Email:</strong> ' . $row->email . '</li>';
            echo '<li class="list-group-item"><strong>Category:</strong> ' .$row->categorie . '</li>';
            echo '<li class="list-group-item"><strong>Tags:</strong> ' . $row->balise . '</li>';
            echo '</ul>';
            echo '</div>';
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
        <?php
    include('includ/footer.php');
    ?>
</body>

</html>
