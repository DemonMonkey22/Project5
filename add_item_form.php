<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My To Do List</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header>
        <h1>My To Do List</h1>
    </header>
    <main>
        <h2>Add Item</h2>
        <form action="add_item.php" method="post" id="add_item_form">

            <label>Title:</label>
            <input type="text" name="title" max="20" required><br>

            <label>Description:</label>
            <input type="text" name="description" max="50" required><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Item" class="button blue"><br>
        </form>
        <p><a href="index.php">View To Do List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My To Do List</p>
    </footer>
</body>
</html>