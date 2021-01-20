<?php

    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GodMode EDITOR</title>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/config.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/map.css">

</head>

<body onload="onload();">
    <div class="main">
        <header>
            <nav>
                <ul>
                    <li><span class="nav-title">GodMode</span></li>
                    <li><a href="">Reload</a></li>
                    <li><a href="#credits">Credits</a></li>
                </ul>
            </nav>
        </header>
        <div class="content">
            <h1>GodMode EDITOR</h1>
            <h2>Properties</h2>
            <form action="" method="get">
                <select name="propertyId">
                    <?php
                        $content = scandir($_SERVER['DOCUMENT_ROOT']."/api/godmode/data/entities/");

                        foreach ($content as $folder) {
                            if (strpos($folder, ".") === FALSE) {
                                echo("<option value='$folder'>".$folder."</option>");
                            }
                        }
                        var_dump($content);
                        
                    ?>
                </select>
                <button type="submit" name="send">Laden</button>
            </form>
            <hr>
            <?php
                if (isset($_REQUEST["send"]) AND isset($_REQUEST["propertyId"])):

                    $rid = $_REQUEST["propertyId"];

                endif;
            ?>
        </div>
    </div>
</body>

</html>