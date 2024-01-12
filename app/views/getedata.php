<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Example</title>
</head>

<body>

    <form id="search-form">
        <input type="text" id="search-term" placeholder="ابحث هنا...">
        <button type="submit">بحث</button>
    </form>

    <div id="search-results"></div>

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
            xhr.open('GET', 'af?term=' + encodeURIComponent(searchTerm), true);
            xhr.send();
        });

    </script>
</body>

</html>











<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div id="result"></div>

    <script>
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "af", true);
        xmlhttp.onreadystatechange = function () {
            console.log(this.readyState);
            if (this.readyState == 4 && this.status == 200) {
                
                document.getElementById('result').innerHTML = this.responseText;
                console.log(this.responseText);
            }
        };

        
        xmlhttp.send();

        function displayData(data) {
            var resultDiv = document.getElementById("result");
            resultDiv.innerHTML = JSON.stringify(data, null, 2);
        }
    </script>
</body>

</html> -->