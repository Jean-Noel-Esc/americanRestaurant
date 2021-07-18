<?php
    require 'database.php';
    
    if(!empty($_GET['id']))
    {
        $id = checkInput($_GET['id']);
    }

    if(!empty($_POST))
    {
        $id = checkInput($_POST['id']);
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM items WHERE id = ?");
        $statement->execute(array($id));
        Database::disconnect();
        header("Location: index.php");
    }

    function checkInput($data)
    {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }
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
            <h1><strong>Supprimer un item</strong></h1>
            <br>
            <form class='form' role="form" action="delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id;?>" />
                <p class="alert alert-warning">Etes vous sur de vouloir supprimer cet item ?</p>
                <div class="form-action">
                    <button type="submit" class="btn btn-warning">Oui</button>
                    <a class="btn btn-default" href="index.php">Non</a>
                </div>
            </form>
        </div>
    </div>



</body>