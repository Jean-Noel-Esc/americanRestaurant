<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <title>Burger code</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet"> -->

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>CLASSIC DINER<span class="glyphicon glyphicon-cutlery"></span></h1>
    <div class="container admin">
        <div class="row">
            <h1><strong>Liste des items  </strong><a href="" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span>Ajouter</a></h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Categorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require "database.php";
                    $db = Database::connect();
                    $statement = $db->query('SELECT items.id, items.name, items.price, categories.name AS category
                                            FROM items LEFT JOIN categories ON items.category = categories.id
                                            ORDER BY items.id DESC');
                    while($item = $statement->fetch())
                    {
                        echo '<tr>';
                        echo '<td>' . $item['name'] . '</td>';
                        echo '<td>' . $item['description'] . '</td>';
                        echo '<td>' . $item['price'] . '</td>';
                        echo '<td>' . $item['category'] . '</td>';

                        echo '<td width=300>';
                            echo '<a class="btn btn-default" href="view.php?id=' . $item['id'] . '"><span class="glyphicon glyphicon-eye-open"></span>Voir</a>';
                            echo ' ';
                            echo '<a class="btn btn-primary" href="update.php?id=' . $item['id'] . '"><span class="glyphicon glyphicon-pencil"></span>Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id='. $item['id'] .'"><span class="glyphicon glyphicon-remove"></span>Supprimer</a>';
                        echo '</td>';
                        echo '</tr>';
                    }

                    ?>
                    <tr>
                        <td>item</td>
                        <td>des</td>
                        <td></td>
                        <td></td>
                        <td width=300>
                            <a class="btn btn-default" href="view.php?id=1"><span class="glyphicon glyphicon-eye-open"></span>Voir</a>
                            <a class="btn btn-primary" href="update.php?id=1"><span class="glyphicon glyphicon-pencil"></span>Modifier</a>
                            <a class="btn btn-danger" href="delete.php?id=1"><span class="glyphicon glyphicon-remove"></span>Supprimer</a>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>



    </div>



</body>