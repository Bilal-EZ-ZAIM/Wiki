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


    <div class="container  d-flex flex-wrap">
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
                    <?php if (!empty($data['tag'])): ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom du categori</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['categori'] as $index => $row): ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $index + 1; ?>
                                        </th>
                                        <td>
                                            <?php echo $row->nomCategorie; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary ModifierCategory"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                value="<?php echo $row->idCategorie; ?>">
                                                Modifier
                                            </button>

                                            <button type="button" class="btn btn-danger suppremerCategory"
                                                data-bs-toggle="modal" data-bs-target="#deleteModal"
                                                value="<?php echo $row->idCategorie; ?>">
                                                Supprimer
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title fs-5" id="exampleModalLabel">Nouveau nom du Category</h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" class="my-4">
                                        <div class="mb-3">
                                            <label for="nomTag" class="form-label">Nouveau Nom du Category</label>
                                            <input type="text" name="neaveCategory" class="form-control" required>
                                            <input type="text" name="idCategoey" class="form-control d-none"
                                                id="valueCategory" value="" required>
                                        </div>
                                        <button type="submit" name="ModiferCategory" class="btn btn-primary">Modifier
                                            Category</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form method="post" class="my-4">
                                        <div class="mb-3">
                                            <input type="text" name="idSupCategoey" class="form-control  d-none"
                                                id="idSupCategoey" value="" required>
                                        </div>
                                        <button type="submit" name="suppremerCategory" class="btn btn-primary ">suppremer
                                            Category</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="tages" class="content-section">
                <div class="content">
                    <h2>tages</h2>
                    <?php if (!empty($data['tag'])): ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nom du Tag</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['tag'] as $index => $row): ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $index + 1; ?>
                                        </th>
                                        <td>
                                            <?php echo $row->nomTag; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary ModifierCategory"
                                                data-bs-toggle="modal" data-bs-target="#exampleModalTage">
                                                Modifier
                                            </button>

                                            <button type="button" class="btn btn-danger suppremerTage" data-bs-toggle="modal"
                                                data-bs-target="#deleteModalTage" value="<?php echo $row->idBalise; ?>">
                                                Supprimer
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>

                    <div class="modal fade" id="exampleModalTage" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title fs-5" id="exampleModalLabel">Nouveau nom du Tag</h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" class="my-4">
                                        <div class="mb-3">
                                            <label for="nomTag" class="form-label">Nouveau Nom du tag</label>
                                            <input type="text" name="ModifernomTag" class="form-control" required>
                                            <input type="text" name="idBalise" class="form-control d-none" id="value"
                                                value="" required>
                                        </div>
                                        <button type="submit" name="modifierBalise" class="btn btn-primary">Modifier
                                            tag</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteModalTage" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <form method="post" class="my-4">
                                        <div class="mb-3">
                                            <input type="text" name="idSupTage" class="form-control d-none" id="idSupTage"
                                                value="" required>
                                        </div>
                                        <button type="submit" name="suppremerTage" class="btn btn-primary">suppremer
                                            tage</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script>
        let modifier = document.querySelectorAll(".Modifier");
        let modifierCategory = document.querySelectorAll(".ModifierCategory");

        let suppremerCategory = document.querySelectorAll(".suppremerCategory");
        let suppremerTage = document.querySelectorAll(".suppremerTage");
        console.log(suppremerCategory);
        function showSection(sectionId) {
            let sections = document.getElementsByClassName('content-section');
            for (var i = 0; i < sections.length; i++) {
                sections[i].classList.remove('active-section');
            }

            document.getElementById(sectionId).classList.add('active-section');
        }


        modifier.forEach((item, index) => {
            item.addEventListener('click', () => {
                document.getElementById("value").value = item.value;
            })
        })
        modifierCategory.forEach((item, index) => {
            item.addEventListener('click', () => {
                document.getElementById("valueCategory").value = item.value;
            })
        })
        suppremerCategory.forEach((item, index) => {
            item.addEventListener('click', () => {
                document.getElementById("idSupCategoey").value = item.value;
            })
        })
        suppremerTage.forEach((item, index) => {
            item.addEventListener('click', () => {
                document.getElementById("idSupTage").value = item.value;
            })
        })

    </script>

</body>

</html>