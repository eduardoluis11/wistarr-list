<?php
    // File: logout.php
    /* This script makes the user logout. IT WORKS.  */
    // I don't need to remove this "session_start", since it won't give me any error messages.
    session_start();
    session_destroy();
    /* After logging out, the user will be sent to the home page. */
    header("Location: index.php");