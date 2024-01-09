<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        #sidebar {
            width: 200px;
            background: #f8f9fa;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        #content {
            flex: 1;
            padding: 20px;
        }

        .btn-group {
            margin-bottom: 20px;
        }

        .content-section {
            display: none;
        }

        .active-section {
            display: block;
        }

        .content {
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <?php include('includ/header.php'); ?>

    <div class="d-flex flex-wrap">
        <div id="sidebar" class="order-1 order-md-0">
            <div class="btn-group-vertical">
                <button class="btn btn-primary" onclick="showSection('categorySection')">Add Category</button>
                <button class="btn btn-primary" onclick="showSection('tagSection')">Add Tag</button>
                <button class="btn btn-primary" onclick="showSection('category')">les Category</button>
                <button class="btn btn-primary" onclick="showSection('tages')">les tages</button>
            </div>
        </div>

        <div id="content" class="order-0 order-md-1 flex-grow-1">
            <div id="categorySection" class="content-section active-section">
                <div class="content">
                    <h2>Ajouter des catégories</h2>
                    <form method="post" class="my-4">
                        <div class="mb-3">
                            <label for="nomCategorie" class="form-label">Nom de la catégorie</label>
                            <input type="text" id="nomCategorie" name="nomCategorie" class="form-control" required>
                        </div>
                        <button type="submit" name="ajoutCategorie" class="btn btn-primary">Ajouter catégorie</button>
                    </form>
                </div>
            </div>

            <div id="tagSection" class="content-section">
                <div class="content">
                    <h2>Ajouter des tags</h2>
                    <form method="post" class="my-4">
                        <div class="mb-3">
                            <label for="nomTag" class="form-label">Nom du tag</label>
                            <input type="text" id="nomTag" name="nomTag" class="form-control" required>
                        </div>
                        <button type="submit" name="ajoutBalise" class="btn btn-primary">Ajouter tag</button>
                    </form>
                </div>
            </div>
            <div id="category" class="content-section">
                <div class="content">
                    <h2>Category</h2>

                </div>
            </div>
            <div id="tages" class="content-section">
                <div class="content">
                    <h2>tages</h2>
                    
                </div>
            </div>
        </div>

    </div>

    <script>
        function showSection(sectionId) {
            var sections = document.getElementsByClassName('content-section');
            for (var i = 0; i < sections.length; i++) {
                sections[i].classList.remove('active-section');
            }

            document.getElementById(sectionId).classList.add('active-section');
        }
    </script>

</body>

</html>