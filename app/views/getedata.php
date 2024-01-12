<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Example</title>
</head>

<body>

    <form id="search-form">
        <input type="text" id="search-term" placeholder="search category">
        <button type="submit">rechercher</button>
    </form>

    <div id="search-results">
        <?php

        echo '<h2>All Categories</h2>';
        foreach ($data as $category) {
            echo '<p>ID: ' . $category->idCategorie . ', Name: ' . $category->nomCategorie . '</p>';
        }

        ?>
    </div>

    <script>
        document.getElementById('search-form').addEventListener('submit', function (e) {
            e.preventDefault();
            var searchTerm = document.getElementById('search-term').value;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('search-results').innerHTML = xhr.responseText;
                }
            };
            xhr.open('GET', 'affCate?term=' + encodeURIComponent(searchTerm), true);
            xhr.send();
        });

    </script>
</body>

</html>