<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
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

    #countent {
        height: 20vh;
    }
</style>

<body>
    <?php include('includ/header.php'); ?>

    <div class="container mt-5">
        <?php if (!empty($data)): ?>
            <div class="card">
                <div class="card-body">
                    <?php foreach ($data['profile'] as $row): ?>
                        <h3 class="card-title">
                            <?php echo $row->prenom . ' ' . $row->nom; ?>
                        </h3>
                        <p class="card-text">Email:
                            <?php echo $row->email; ?>
                        </p>
                    <?php endforeach; ?>
                    <form method="post">
                        <button type="submit" class="btn btn-danger" name="logout">Logout</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="container d-flex flex-wrap">
        <div id="sidebar" class="order-1 order-md-0">
            <div class="btn-group-vertical">
                <button class="btn btn-primary" onclick="showSection('ajoutWiki')">Ajout Wiki</button>
                <button class="btn btn-primary" onclick="showSection('tagSection')">les Wiki</button>
                <button class="btn btn-primary" onclick="showSection('category')">les Category</button>
                <button class="btn btn-primary" onclick="showSection('tages')">les tages</button>
            </div>
        </div>

        <div id="content" class="order-0 order-md-1 flex-grow-1">
            <div id="ajoutWiki" class="content-section active-section">
                <div class="content">
                    <h2>Ajouter Wiki</h2>
                    <form method="post" class="my-4">
                        <div class="mb-3">
                            <label for="titer" class="form-label">Nom de la titer</label>
                            <input type="text" id="titer" name="nomTiter" class="form-control" required>
                            <label for="countent" class="form-label">Nom de la catégorie</label>
                            <textarea type="text" id="countent" name="nomCountent" class="form-control"
                                required> </textarea>
                        </div>
                        <div class="d-flex">
                            <?php if (!empty($data)): ?>
                                <div class="mb-3 col-2">
                                    <label for="" class="form-label">Category</label>
                                    <div class="card-body">
                                        <select name="categorie" id="" class="p-2">
                                            <?php foreach ($data['categories'] as $row): ?>

                                                <option value="<?php echo $row->idCategorie; ?>">
                                                    <?php echo $row->nomCategorie; ?>
                                                </option>

                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($data)): ?>
                                <div class="mb-3 col-2">
                                    <label for="" class="form-label">Tages</label>
                                    <?php foreach ($data['tages'] as $row): ?>
                                        <div class="card-body">
                                            <select name="tage" id="" class="p-2">
                                                <option value=" <?php echo $row->idBalise; ?>">
                                                    <?php echo $row->nomTag; ?>
                                                </option>
                                            </select>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <button type="submit" name="ajoutWiki" class="btn btn-primary">Ajouter Wiki</button>

                    </form>
                </div>
            </div>

            <div id="tagSection" class="content-section">
                <div class="content">
                    <h2>les Wiki</h2>
                    <?php if (!empty($data['wiki'])): ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Titre du Wiki</th>
                                    <th scope="col">data de creation</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['wiki'] as $index => $row): ?>
                                    <tr>
                                        <th scope="row">
                                            <?php echo $index + 1; ?>
                                        </th>
                                        <td>
                                            <?php echo $row->titre; ?>
                                        </td>
                                        <td>
                                            <?php echo $row->dateCreation; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary ModifierWiki" data-bs-toggle="modal"
                                                data-bs-target="#modifierWiki<?php echo $row->idWiki; ?>" value="<?php echo $row->idWiki; ?>">
                                                Modifier
                                            </button>

                                            <button type="button" class="btn btn-danger suppremerWiki" data-bs-toggle="modal"
                                                data-bs-target="#deleteWiki" value="<?php echo $row->idWiki; ?>">
                                                Supprimer
                                            </button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modifierWiki<?php echo $row->idWiki; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title fs-5" id="exampleModalLabel">Modifier Wiki</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" class="my-4">
                                                        <div class="mb-3">
                                                            <label for="nomTag" class="form-label">Nouveau Titre du
                                                                Wiki</label>
                                                            <input type="text" name="modiferTitre" class="form-control"value="<?php echo $row->titre; ?>"
                                                                required>
                                                                <label for="nomTag" class="form-label">Nouveau Countune du
                                                                Wiki</label>
                                                            <textarea type="text" name="modiferCountent" class="form-control" value=""
                                                                required> <?php echo $row->contenu; ?> </textarea>
                                                            <input type="text" name="idWiki" class="form-control d-none"
                                                                 value="<?php echo $row->idWiki; ?>" required>
                                                        </div>
                                                        <button type="submit" name="ModiferWiki"
                                                            class="btn btn-primary">Modifier
                                                            Wiki</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>

                    <div class="modal fade" id="deleteWiki" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title fs-5" id="exampleModalLabel">Supprimer Wiki</h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" class="my-4">
                                        <div class="mb-3">
                                            <input type="text" name="idSupwiki" class="form-control d-none"
                                                id="idSupwiki" value="" required>
                                        </div>
                                        <button type="submit" name="supprimerWiki" class="btn btn-primary">Supprimer
                                            Wiki</button>
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

        let suppremerWiki = document.querySelectorAll(".suppremerWiki");
        function showSection(sectionId) {
            let sections = document.getElementsByClassName('content-section');
            for (var i = 0; i < sections.length; i++) {
                sections[i].classList.remove('active-section');
            }

            document.getElementById(sectionId).classList.add('active-section');
        }


        
        suppremerWiki.forEach((item, index) => {
            item.addEventListener('click', () => {
                document.getElementById("idSupwiki").value = item.value;
                console.log("kjjkjk");
            })
        })

    </script>
</body>

</html>