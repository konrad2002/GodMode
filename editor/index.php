<?php

    $types = array("cc", "rc", "ms");

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
                    <li><a href="/tools/godmode">Simulator</a></li>
                    <li><a href="/tools/godmode/editor">Editor</a></li>
                </ul>
            </nav>
        </header>
        <div class="content">
            <h1>GodMode EDITOR</h1>
            <?php

                if (isset($_REQUEST["save"])) {
                    
                    $newPId = $_REQUEST["newPropertyId"];

                    mkdir($_SERVER['DOCUMENT_ROOT']."/api/godmode/data/entities/".$newPId);

                    foreach ($types as $type) {
                        file_put_contents($_SERVER['DOCUMENT_ROOT']."/api/godmode/data/entities/".$newPId."/".$type.".json", $_REQUEST["new".$type]);
                    }
                    echo("saved! ID is: <b>".$newPId."</b>");

                }

            ?>
            <h2>Properties</h2>
            <form action="" method="get">
                <select name="propertyId">
                    <?php
                        $content = scandir($_SERVER['DOCUMENT_ROOT']."/api/godmode/data/entities/");

                        foreach ($content as $folder) {
                            if (strpos($folder, ".") === FALSE) {
                                echo("<option value='$folder'");
                                if ($folder == $pid) echo(" selected");
                                echo(">".$folder."</option>");
                            }
                        }
                        var_dump($content);
                        
                    ?>
                </select>
                <button type="submit" name="send">Load</button>
            </form>
            <hr>
            <?php
                if (isset($_REQUEST["send"]) AND isset($_REQUEST["propertyId"])):

                    $pid = $_REQUEST["propertyId"];

                    $newId = 1000;

                    while (file_exists($_SERVER['DOCUMENT_ROOT']."/api/godmode/data/entities/".$newId."/cc.json")) {
                        $newId = random_int(1001, 9999);
                    }

                    echo('<form action="?send=1&propertyId='.$newId.'" method="post">');

                    echo('<input type="hidden" name="newPropertyId" value="'.$newId.'">');

                    foreach ($types as $type) {
                        echo("<textarea name='new".$type."' cols='50' rows='21'>");
                        echo(file_get_contents($_SERVER['DOCUMENT_ROOT']."/api/godmode/data/entities/".$pid."/".$type.".json"));
                        echo("</textarea>");
                    }

                    echo('<button type="submit" name="save" value="1">Save</button>');

                endif;
            ?>
            </form>
        </div>
    </div>
</body>

</html>