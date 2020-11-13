<?php
    /* File: delete.php */
    /* This lets the user delete games on their library. IT WORKS. */
    require_once "pdo.php";
    require "header.php";
//    session_start();

    /* This checks if the "delete" button has been pressed, and if the user hasn't
    inserted a weird id in the webpage's GET URL. */
    if ( isset($_POST['delete']) && isset($_POST['id']) )
    {
        // This SQL statements deletes the selected game. I have to change the name of the variable that stores the
        // game's id in here to avoid confusing the website while choosing the game id from the database.
        $sql = "DELETE FROM games WHERE id = :check_id_2";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ':check_id_2' => $_POST['id']
        ));

        // This displays a success flash message.
        $_SESSION['success'] = 'Game deleted';

        // I will redirect the user to their home page.
        header('Location: index.php');
        return;
    }

    // Guardian: I'll make sure that the game's id is present.
    if ( ! isset($_GET['id']) )
    {
        // This displays a flash error message if a user puts an empty game id
        // on the GET URL bar.
        $_SESSION['error'] = "Missing game id";
        header('Location: index.php');
        return;
    }

    /* This SQL statement will check if the game id on the URL from the GET request
    exists on the database. I will put a different variable name to "id" while
    sanitizing it to avoid having issues with the id variable name from the
    DELETE SQL query. */
    $stmt = $pdo->prepare("SELECT name, id FROM games where id = :check_id");
    $stmt->execute(array(":check_id" => $_GET['id']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ( $row === false )
    {
        // If the id is non-existent, I will show a flash error message.
        $_SESSION['error'] = 'Bad value for game id';
        header( 'Location: index.php' );
        return;
    }
?>
<!-- This is the HTML form that asks you whether or not you really want to delete
a game. -->
<!-- This asks if you want to delete a game, and shows the name of the game. -->
<p>Confirm: Deleting <?= htmlentities($row['name']) ?></p>

<form method="post">
    <!-- This input stores the game's id, but keeps it hidden from the user. -->
    <input type="hidden" name="id" value="<?= $row['id'] ?>">

    <!-- This is the submit button to delete the game. -->
    <input type="submit" name="delete" value="Delete">
    <a href="index.php">Cancel</a>
</form>









































