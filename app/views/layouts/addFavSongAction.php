<?php
    session_start();
?>
<?php
    include_once('../../controllers/songs-display.controller.php');

    $songID = $_GET['songID'];
    $accountID = $_SESSION['accountID'];

    $controller = new SongsDisplayController();
    $controller->addFavSong($accountID, $songID);
?>