<?php
    /* File: edit.php */
    /* This allows the user to edit information about the games on their
    library. IT WORKS. */

    require_once "pdo.php";
    require "header.php";
//    session_start();

    // This checks if the box "name" is filled, and if a game id number is stored.
    // I WON'T check if the console or store boxes are filled out since those boxes
    // are optional.
    if ( isset($_POST['name']) && isset($_POST['id']) )
    {
        // Data validation should go here (see add.php).
        /* This SQL statement will update (edit) the selected game. */
        $sql = "UPDATE games 
            SET name = :name,
            console = :console,
            store = :store
            WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':name' => $_POST['name'],
            ':console' => $_POST['console'],
            ':store' => $_POST['store'],
            ':id' => $_POST['id']
        ));

        // This is a success flash message if the game is edited correctly.
        $_SESSION['success'] = 'Game updated';
        header( 'Location: index.php' );
        return;
    }

    // Guardian goes here (see add.php).
    /* This statement checks if the game id is the correct one, and that the user
    didn't put a non-existent game id value on the URL bar during the GET request.
    I needed to use the same variable name for the game id as the second id variable
    name in "delete.php" (:check_id). */
    $stmt = $pdo->prepare("SELECT * FROM games WHERE id = :check_id");
    $stmt->execute(array(":check_id" => $_GET['id']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ( $row === false )
    {
        $_SESSION['error'] = 'Bad value for game id';
        header( 'Location: index.php' );
        return;
    }

    /* This will sanitize the values filled out by the user on the boxes "name",
    "console", "store" from the form. This is to prevent SQL injection. */
    $n = htmlentities($row['name']);
    $c = htmlentities($row['console']);
    $s = htmlentities($row['store']);

    // This grab's the game's id.
    $id = $row['id'];
?>

<!-- Edit form. It modifies the selected game's information. -->
<p>Edit Game</p>
<form method="post">
    <p>Name:
    <input type="text" name="name" value="<?= $n ?>"></p>
    <p>Console:
    <input type="text" name="console" value="<?= $c ?>"></p>
    <p>Store:
    <input type="text" name="store" value="<?= $s ?>"></p>

    <!-- This input stores the game's id, but hides it from the user. -->
    <input type="hidden" name="id" value="<?= $id ?>">

    <!-- This submits the "edit" form, and confirms the edition. -->
    <p><input type="submit" value="Update"/>
    <a href="index.php">Cancel</a></p>
</form>
































