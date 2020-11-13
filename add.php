<?php
    /* File: add.php */
    // This adds games to the user's library.
    require_once "pdo.php";
    require "header.php";
//    session_start();

    /* This checks whether all of the forms (boxes) have been filled out. The boxes for adding a game will ask the
    user for the name of the game, the console, and the store. Only the name of the game is required.*/
    if ( isset($_POST['name']) && isset($_POST['console']) && isset($_POST['store']) )
    {
        // Data validation (like a regular expression checking if the information
        // entered on each box is valid).
        // This checks if the "name" box is empty or not. If it is, I will show an
        // error message. I'M NOT GETTING THE ERROR MESSAGE, EVEN IF I LEAVE THE
        // NAME BLANK. IT WORKS NOW.
        if ( strlen($_POST['name']) < 1 )
        {
            $_SESSION['error'] = 'Please, insert the name of the game.';
            // After showing the message, I will refresh the page (to make the user
            //remain within "add.php".)
            header("Location: add.php");
            return;
        }

        /* This is the SQL statement that will insert a new game in the "games"
        table of the database with the information entered by the user on the boxes.
        THE GAME IS NOT BEING INSERTED INTO THE DATABASE. IT WORKS NOW. I can put multiple SQL statements into
        "$sql". I will first select the current user's id, and then I will insert it into the game as its user id.
        I need this so that each user can only see their respective games. I will also insert the user's id, which
        will be stored in a variable, even though the user never typed it manually. */
//        $sql = "INSERT INTO games (user_id)
//            VALUES (:user_id)";
        $sql = "INSERT INTO games (user_id, name, console, store)
                VALUES (:user_id, :name, :console, :store);";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            // The current user's id is stored into the SESSION[user_id] array, which I got from login.php.
            // I will insert it here so that the game has the user id of the current user. This way, I will be able
            // to distinguish the games from this user, and make it private so that other user's cant see it.
            // IT WORKS.
            ':user_id' => $_SESSION['user_id'],
           ':name' => $_POST['name'],
           ':console' => $_POST['console'],
           ':store' => $_POST['store']
        ));

        /* After adding the game, I will show a "success" flash message. */
        $_SESSION['success'] = 'Game Added';

        // I will redirect the user to the home page after the game is successfully
        //added to their library.
        header( 'Location: index.php');
        return;
    }

    // Flash pattern.
    /* If I get an error, I will show a flash error message. */
    if ( isset($_SESSION['error']) )
    {
        echo '<p style="color:red">' . $_SESSION['error'] . "</p><br>";
        unset($_SESSION['error']);
    }
?>

<!-- Here's the HTML form to add a new game. -->
<p>Add a New Game</p>
<form method="post">
    <p>Name:
    <input type="text" name="name"></p>
    <p>Console:
    <input type="text" name="console"></p>
    <p>Store:
    <input type="text" name="store"></p>

    <!-- This submits the form. -->
    <p><input type="submit" value="Add New"/>

    <!-- This returns the user to their home page if the click on "cancel". -->
    <a href="index.php">Cancel</a></p>
</form>





























