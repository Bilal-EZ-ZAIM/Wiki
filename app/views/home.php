<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    form {
        display: flex;
        flex-direction: column;
        width: 500px;
        margin: 0 auto;
        line-height: 1.9;
    }

    #id {
        display: none;
    }

    input {
        margin: 5px;
        padding: 10px;
    }
</style>

<body>

    <h1>Je suis Home page </h1>

    <form method="POST">
        <?php foreach ($input as $row): ?>
            <input type="text" id=<?php echo $row ?> placeholder=<?php echo $row ?> name=<?php echo $row ?>>
        <?php endforeach; ?>
        <input type="submit" name="update">
        </from>

        <div>

        <?php foreach ($data as $row): ?>
            <p><?php echo $row->nom ?></p>
            <p><?php echo $row->prenom ?></p>
            <a href="detai?id=<?php echo $row->id ?>">show</a>
        <?php endforeach; ?>

        </div>

        <?php
        show($data);
        ?>

</body>

</html>