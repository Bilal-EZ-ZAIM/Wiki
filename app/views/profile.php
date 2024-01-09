<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include('includ/header.php'); ?>

    <div class="container mt-5">
        <?php if (!empty($data)): ?>
            <div class="card">
                <div class="card-body">
                    <?php foreach ($data as $row): ?>
                        <h3 class="card-title"><?php echo $row->prenom . ' ' . $row->nom; ?></h3>
                        <p class="card-text">Email: <?php echo $row->email; ?></p>
                    <?php endforeach; ?>
                    <form method="post">
                        <button type="submit" class="btn btn-danger" name="logout">Logout</button>
                    </form>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                Aucune donnée de profil n'a été trouvée.
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
