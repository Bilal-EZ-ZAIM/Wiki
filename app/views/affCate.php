<?php

$searchTerm = isset($_GET['term']) ? $_GET['term'] : '';

if (!empty($searchTerm)) {
    $results = performSearch($searchTerm, $data);
    if (!empty($results)) {
           foreach ($results as $index => $row) {
            echo '<tr>
                    <th scope="row">' . ($index + 1) . '</th>
                    <td>' . $row->nomCategorie . '</td>
                    <td>
                        <button type="button" class="btn btn-primary ModifierCategory"
                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                            value="' . $row->idCategorie . '">
                            Modifier
                        </button>

                        <button type="button" class="btn btn-danger suppremerCategory"
                            data-bs-toggle="modal" data-bs-target="#deleteModal"
                            value="' . $row->idCategorie . '">
                            Supprimer
                        </button>
                    </td>
                </tr>';
        }

        echo '</tbody></table>';
    } else {
        echo '<p>No matching categories found</p>';
    }
}

function performSearch($term, $data)
{
    $matchingCategories = [];

    foreach ($data as $row) {
        if ($row->nomCategorie == $term) {
            $matchingCategories[] = $row;
        }
    }

    return $matchingCategories;
}
?>