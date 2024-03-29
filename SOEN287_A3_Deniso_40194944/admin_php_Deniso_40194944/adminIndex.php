<?php
include_once "../utils.php";
session_start();
$filename = "../index.txt";
$contents = getHome();

if(!isset($_SESSION["admin"])){
    header("Location:/Deniso_40194944/admin.php");
}
if(isset($_POST["professional_statement"]) && isset($_POST["brief_biography"])){
    $sep="\\|";
    file_put_contents($filename, $_POST["professional_statement"] . $sep . $_POST["brief_biography"]);
    $contents = getHome();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="styles.css">
        <script src="script.js"></script> 

        <title>Home</title>
    </head>

    <body>
        <div class="topnav">
            <a class="active" href="adminIndex.php">Home</a>
            <a href="adminResume.php">Resume</a>
            <a href="adminProjects.php">Projects</a>
            <a href="adminContact.php">Contact</a>
            <a href="adminSocial.php">Social</a>
            <a href="logout.php">Logout</a>
          </div>
        
        <h1>Admin - Home</h1>
        <h3 style="font-style: italic;">(content displayed on index.html)</h3>
        <div class="form-container">
            <form action="#" method="POST">
                <label for="professional_statement">Professional Statement</label>
                <textarea id="professional_statement" name="professional_statement" placeholder="Professional Statement..."><?php echo $contents[0] ?></textarea>

                <label for="brief_biography">Brief Biography</label>
                <textarea id="brief_biography" name="brief_biography" placeholder="Brief Biography..."><?php echo $contents[1] ?></textarea>

                <input class="form-btn" type="submit" value="Submit"/>
            </form>
        </div>
    </body>
</html>