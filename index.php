<?php
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>To-Do List</h1><hr/>
        <?php if (empty($title)) {
            echo "<p>There is no tasks in the to-do list.</p>";
        } else { 
            require('database.php');
            $query = 'SELECT * FROM todoitems';
            $statement = $db->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            $statement->closeCursor();
        } ?>
        
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <label for="title">Title</label><br>
            <input type="text" maxlength="20" id="title" name="title" required></input><br><br>
            <label for="description">Description</label><br>
            <input type="text" maxlength="50" id="description" name="description" required></input><br><br>
            <button action="POST" type="submit">Submit</button>
        </form>
    </main>
</body>
</html>