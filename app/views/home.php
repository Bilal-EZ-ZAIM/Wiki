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
            background-image: url('https://media.istockphoto.com/id/488792838/photo/wiki-text-and-earth-globe.jpg?s=2048x2048&w=is&k=20&c=zvkFs3u8VZjUT_S9qQmr1ycx0hzGkMnarpq0zXFiXG8=');
            background-size: cover;
            background-position: center;
            color: #ffffff;
            text-align: center;
            padding: 100px 0;
            height: 100vh;
            margin-bottom: 40px;
        }
       
        /* .hero-section h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .hero-section p {
            font-size: 1.5em;
            margin-bottom: 30px;
        } */
    </style>
</head>

<body class="bg-light">
    <?php
    include('includ/header.php');
    ?>
    <section class="hero-section">
        <div class="container">
            <!-- <h1>Discover the World of Wikis</h1>
            <p >Explore, Create, and Share Knowledge with Our Wiki Platform</p> -->
            <!-- <a href="#" class="btn btn-primary btn-lg">Get Started</a> -->
        </div>
    </section>
    <div class="container">
      

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-5 shadow-sm">
                    <img src="imgs/a.jpg" class="img-fluid" />

                    <div class="card-body">
                        <div class="card-title">
                            <h2>This is the blog title</h2>
                        </div>
                        <div class="card-text">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Deleniti corporis quis ab. Exercitationem et quibusdam
                                impedit? Sint vitae labore nulla sit, dignissimos non tempore,
                                maxime facere, quod harum aliquid in...
                            </p>
                        </div>
                        <a href="#" class="btn btn-outline-primary rounded-0 float-end">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-5 shadow-sm">
                    <img src="imgs/b.jpg" class="img-fluid" />

                    <div class="card-body">
                        <div class="card-title">
                            <h2>This is the blog title</h2>
                        </div>
                        <div class="card-text">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Deleniti corporis quis ab. Exercitationem et quibusdam
                                impedit? Sint vitae labore nulla sit, dignissimos non tempore,
                                maxime facere, quod harum aliquid in...
                            </p>
                        </div>
                        <a href="#" class="btn btn-outline-primary rounded-0 float-end">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-5 shadow-sm">
                    <img src="imgs/c.jpg" class="img-fluid" />

                    <div class="card-body">
                        <div class="card-title">
                            <h2>This is the blog title</h2>
                        </div>
                        <div class="card-text">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Deleniti corporis quis ab. Exercitationem et quibusdam
                                impedit? Sint vitae labore nulla sit, dignissimos non tempore,
                                maxime facere, quod harum aliquid in...
                            </p>
                        </div>
                        <a href="#" class="btn btn-outline-primary rounded-0 float-end">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-5 shadow-sm">
                    <img src="imgs/d.jpg" class="img-fluid" />

                    <div class="card-body">
                        <div class="card-title">
                            <h2>This is the blog title</h2>
                        </div>
                        <div class="card-text">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Deleniti corporis quis ab. Exercitationem et quibusdam
                                impedit? Sint vitae labore nulla sit, dignissimos non tempore,
                                maxime facere, quod harum aliquid in...
                            </p>
                        </div>
                        <a href="#" class="btn btn-outline-primary rounded-0 float-end">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-5 shadow-sm">
                    <img src="imgs/e.jpg" class="img-fluid" />

                    <div class="card-body">
                        <div class="card-title">
                            <h2>This is the blog title</h2>
                        </div>
                        <div class="card-text">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Deleniti corporis quis ab. Exercitationem et quibusdam
                                impedit? Sint vitae labore nulla sit, dignissimos non tempore,
                                maxime facere, quod harum aliquid in...
                            </p>
                        </div>
                        <a href="#" class="btn btn-outline-primary rounded-0 float-end">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card mb-5 shadow-sm">
                    <img src="imgs/f.jpg" class="img-fluid" />

                    <div class="card-body">
                        <div class="card-title">
                            <h2>This is the blog title</h2>
                        </div>
                        <div class="card-text">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Deleniti corporis quis ab. Exercitationem et quibusdam
                                impedit? Sint vitae labore nulla sit, dignissimos non tempore,
                                maxime facere, quod harum aliquid in...
                            </p>
                        </div>
                        <a href="#" class="btn btn-outline-primary rounded-0 float-end">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>