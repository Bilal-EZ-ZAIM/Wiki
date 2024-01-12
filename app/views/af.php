<?php

$searchTerm = isset($_GET['term']) ? $_GET['term'] : '';

$result = performSearch($searchTerm, $data);
show($result);
if ($result) {
    echo '<p>ID: ' . $result->idWiki . ', Name: ' . $result->titre. '</p>';
} else {
    echo '<p>not fonde </p>';
}

function performSearch($term, $data)
{
    foreach ($data as $row) {
        if ($row->titre == $term) {
            return $row;
        }
    }

    return null;
}
?>