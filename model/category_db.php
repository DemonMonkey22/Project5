<?php 
function get_categories() { global $db; $query = 'SELECT * FROM categories ORDER BY categoryID'; 
    $statement = $db->prepare($query);
     $statement->execute(); 
    $categories = $statement->fetchAll(); 
    $statement->closeCursor();
     return $categories;
    }

    function get_category_name($category_id) { 
        global $db; 
    $query = 'SELECT * FROM categories 
    WHERE categoryID = :category_id'; 
        $statement = $db->prepare($query); 
        $statement->bindValue(':category_id', $category_id); 
        $statement->execute(); 
        $category = $statement->fetch(); 
        $statement->closeCursor(); 
        $category_name = $category['categoryName']; 
        return $category_name; }

function add_category($category_id){
           
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
    }
}

        function delete_category($category_id){require_once('database.php');

            // Get ID
            $item_num = filter_input(INPUT_POST, 'item_num', FILTER_VALIDATE_INT);
            
            // Delete the product from the database
            if ($item_num != false) {
                $query = 'DELETE FROM todoitems 
                          WHERE ItemNum = :item_num';
                $statement = $db->prepare($query);
                $statement->bindValue(':item_num', $item_num);
                $success = $statement->execute();
                $statement->closeCursor();    
            }
            
            // Display the To Do List page
        }

?>