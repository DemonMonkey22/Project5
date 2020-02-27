<?php
// Get the to do item data
$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');

// Validate inputs
if ($title == null || $description == null) {
    $error = "Invalid to do item data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the item to the database  
    $query = 'INSERT INTO todoitems 
                 (Title, Description)
              VALUES
                 (:title, :descr)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':descr', $description);
    $statement->execute();
    $statement->closeCursor();
    
    // Display the To Do List page
    include('index.php');
}
?>