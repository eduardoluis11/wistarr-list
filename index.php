<?php
    /* File: index.php */
    require_once "pdo.php";

    // This calls all the header elements.
    require "header.php";


    /* Something's wrong with the table that has the game list starting from the 2nd row. This started happening once
    I divided everything into 3 php tags. Find out how to fix this bug. FIXED! I needed to leave 1 of the brackets
    within the 1st php tag to close the while loop, so that it didn't copy the "log out" button multiple times nor
    mess with the game list table. */
?>
        <h1>Wistarr List</h1>

    <?php
        // I need to use a single "=" sign to remove the "loggedIn is an unknown variable.", and make the whole
        // code work properly. IT WORKS, but "loggedIn" remains forever true, so index.php will always show the games.
        // I need to create a "sign out" button to turn "loggedIn" back to false to hide all games.
        /* I modified it. I will check if the "SESSION[email]" array is set. If it's not, then the user hasn't logged
        in, and they won't be able to see their games. The SESSION[email] array is set on login.php. IT WORKS.  */
        if ( isset($_SESSION['email']) )
        {
            // Flash error message (it will disappear once you refresh the page.) It
            /* will appear if there's an error with the session. */
            if( isset($_SESSION['error']) )
            {
                echo '<p style="color:red">' . $_SESSION['error'] . "</p><br>";
                unset($_SESSION['error']);
            }

            // Flash success message.
            if ( isset($_SESSION['success']) )
            {
                echo '<p style="color:green">' . $_SESSION['success'] . "</p><br>";
                unset($_SESSION['success']);
            }

            /* This will create the table that will display all of the games in
            the user's library. For the time being, any person that enters "index.php"
            will all see all of the games registered on the database. */
            echo('<table border="1">' . "<br>");

            // SQL statement that will show all of the games from the "games" table.
            /* I will show the name of the game, its console and its store. I WON'T show
            data such as "id" nor "user_id". I need to select the game's id as well in order to be able to edit or delete
            them with the "edit" or "delete" buttons (and to delete the error messages telling me that there is no
            "id" field). IT WORKS. Now, I need to add a condition so that each user can only see their respective
            games. To do this, I will put as a condition that the user id from the selected games should be the same as
            the current user's id. IT WORKS. I will sort it in alphabetical order per name of the game. IT WORKS. */
            $sql = "SELECT id, name, console, store FROM games
                    WHERE user_id = :user_id
                    ORDER BY name ASC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                /* I will prepare the SQL statement to insert the user id from SESSION[user_id] array. */
                ':user_id' => $_SESSION['user_id']
            ));

            /* I will make a "while" loop to insert all of the games inside the
            table to show them as rows on a table on the webpage.*/
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) )
            {
                echo "<tr><td style='padding: 20px'>";
                // I will sanitize each row from the database before showing it in the
                // visible table in the webpage.
                echo(htmlentities($row['name']));
                echo "</td><td style='padding: 20px'>";
                echo(htmlentities($row['console']));
                echo "</td><td style='padding: 20px'>";
                echo(htmlentities($row['store']));
                echo "</td><td style='padding: 20px'>";
                /* I will add an "edit" and "delete" button to the side of each game
                in each row of the list that shows the games. It will send the user
                to an "edit" page or "are you sure you want to delete this game?" page
                once they click one of these buttons. I need the game's id to do this
                (I will have to later specify the user's id as well once I implement
                the login system). */
                echo('<a href="edit.php?id=' . $row['id'] . '">Edit</a> / ');
                echo('<a href="delete.php?id=' . $row['id'] . '">Delete</a>');
            }

            /* The remaining bracket will be included in a separate php tag. This will be done so that the
            "add new" and "log out" html buttons are invisible until the user logs in. */
    ?>
    </table>
    <div style="padding-top: 15px;" id="bodyFooter2">
        <a href="add.php">Add New Game</a>
        <br>
    </div>


    <!-- Log out button. -->
    <?php
            /* This php tag will include the missing bracket to close all of the ifs from the 1st php tag.
            IT WORKED.*/

        }
        // This will show a message to prompt the user to log in, as well as a link to login.php.
        else
        {
    ?>
            <div id="bodyFooter1">
                <p>Welcome to Wistarr List.</p>
                <p>This is an app that lets you keep track of all the video games that you want to buy by adding them to a
                    wish list.</p>
                <p><a href="login.php">Log in</a> to begin adding games to your wish list.</p>
                <p>Don't have an account? <a href="register.php">Sign up here.</a></p>
            </div>


    <?php       /* This php tag will close the "else" from the last php tag. IT WORKS. */
        }

        //This calls all the elements from the footer. I need to put it here, or otherwise the footer will appear
        // 1st, and the header would appear on the bottom of the page.
        require "footer.php";
    ?>





















