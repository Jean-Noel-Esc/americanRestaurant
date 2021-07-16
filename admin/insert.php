<?php
    require 'database.php';
?>

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
            <h1><strong>Ajouter un item</strong></h1>
            <br>
            <form class='form' action="insert.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nom:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?php echo $name; ?>">
                    <span class="help-inline"><?php echo $nameError; ?></span>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description" value="<?php echo $description; ?>">
                    <span class="help-inline"><?php echo $descriptionError; ?></span>
                </div>
                <div class="form-group">
                    <label for="price">Prix: (en €)</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Prix" value="<?php echo $price; ?>">
                    <span class="help-inline"><?php echo $priceError; ?></span>
                </div>
                <div class="form-group">
                    <label for="category">Catégorie:</label>
                    <select class="form-control" id="category" name="category">
                        <?php
                            $db = Database::connect();
                            foreach($db->query('SELECT * FROM categories') as $row)
                            {
                                echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>'; 
                            }
                            $Database::disconnect();
                        ?>
                    </select>
                    <span class="help-inline"><?php echo $categoryError; ?></span>
                </div>
                <div class="form-group">
                    <label for="image">Sélectionner une image:</label>
                    <input type="file" id="image" name="image">
                    <span class="help-inline"><?php echo $imageError; ?></span>
                </div>
            </form>
            <br>
            <div class="form action">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>Ajouter</a>
                <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
            </div>
        </div>
    </div>



</body>