<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap 5 - Blog Cards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .card img {
            height: 280px;
        }

        .hero-section {
            background-image: url('https://media.istockphoto.com/id/488792838/fr/photo/base-de-connaissances-wiki-texte-et-de-la-terre-monde.jpg?b=1&s=612x612&w=0&k=20&c=c8deNCaPmDWCNvvdpwSiNFF2kXtEAK-CXokMLgBsa6w=');
            background-size: cover;
            background-position: center;
            color: #ffffff;
            text-align: center;
            padding: 100px 0;
            height: 100vh;
            margin-bottom: 40px;
        }
    </style>
</head>

<body class="bg-light">
    <?php
    include('includ/header.php');
    ?>
    <section class="hero-section">
    </section>
    <div class="container">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-5 shadow-sm">
                <div class="card-body">
                    <div class="card-title">
                        <h2>Category</h2>
                    </div>
                    <ul class="list-group">
                        <?php foreach ($data['categories'] as $row): ?>
                            <li class="list-group-item">
                                <?php echo $row->nomCategorie; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($data['wiki'] as $row): ?>
                <?php if ($row->is_archived == 1): ?>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card mb-5 shadow-sm">
                            <img src="https://images.pexels.com/photos/4559592/pexels-photo-4559592.jpeg?auto=compress&cs=tinysrgb&w=600"
                                class="img-fluid" />
                            <div class="card-body">
                                <div class="card-title">
                                    <h2>
                                        <?php echo $row->titre; ?>
                                    </h2>
                                </div>
                                <div class="card-text">
                                    <p>
                                        <?php echo $row->contenu; ?>
                                    </p>
                                </div>
                                <div class="card-text">
                                    <p>Categorie : <strong>
                                            <?php echo $row->categorie; ?>
                                        </strong></p>
                                </div>
                                <div class="card-text">
                                    <p>Balise : <strong>
                                            <?php echo $row->balise; ?>
                                        </strong></p>
                                </div>
                                <a href="ditalise?id=<?php echo $row->idWiki; ?>"
                                    class="btn btn-outline-primary rounded-0 float-end">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <?php
    include('includ/footer.php');
    ?>

</body>

</html>