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

<?php

// 2021-01-21 00:02:04.087458|INFO    |VirtualServerBase|1  |client connected 'Sandro'(id:599) from [2a04:4540:6f17:7f00:3510:bbd:ab40:f728]:58631
// 2021-01-21 00:02:04.610720|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Sandro'(id:599)
// 2021-01-21 00:02:20.972497|INFO    |VirtualServerBase|1  |client disconnected 'Sandro'(id:599) reason 'reasonmsg=Ragequit confirmed'
// 2021-01-21 00:14:03.436652|INFO    |VirtualServerBase|1  |client disconnected 'JNSN'(id:2231) reason 'reasonmsg=Verlassen'
// 2021-01-21 00:16:25.703022|INFO    |VirtualServerBase|1  |client connected 'The_Cryptokid | Marcel'(id:569) using a myTeamSpeak ID from [2a00:6020:17f9:3000:dd53:1a28:54e0:7cb2]:57194
// 2021-01-21 00:16:42.237874|INFO    |VirtualServerBase|1  |client disconnected 'ReiGnZ'(id:1132) reason 'reasonmsg=Verlassen'
// 2021-01-21 00:17:02.229092|INFO    |VirtualServerBase|1  |client disconnected 'The_Cryptokid | Marcel'(id:569) reason 'reasonmsg=Verlassen'
// 2021-01-21 00:17:38.955918|INFO    |VirtualServerBase|1  |client disconnected 'LarsJaeger'(id:2514) reason 'reasonmsg=leaving'
// 2021-01-21 00:27:49.924305|INFO    |VirtualServerBase|1  |client disconnected 'HeuteGutGegessen'(id:1089) reason 'reasonmsg=Es wird eingelocht'
// 2021-01-21 00:28:59.596532|INFO    |VirtualServerBase|1  |client disconnected 'TD | Daniel'(id:625) reason 'reasonmsg=Verlassen'
// 2021-01-21 00:32:55.180175|INFO    |VirtualServerBase|1  |client disconnected 'Julian'(id:718) reason 'reasonmsg=living for nights like this'
// 2021-01-21 00:45:07.775159|INFO    |VirtualServerBase|1  |client disconnected 'Jonas | Buffi_TV'(id:806) reason 'reasonmsg=Verlassen'
// 2021-01-21 00:45:32.023783|INFO    |VirtualServerBase|1  |client connected 'The_Cryptokid | Marcel'(id:569) using a myTeamSpeak ID from [2a00:6020:17f9:3000:dd53:1a28:54e0:7cb2]:58479
// 2021-01-21 00:46:19.410745|INFO    |VirtualServerBase|1  |client disconnected 'The_Cryptokid | Marcel'(id:569) reason 'reasonmsg=Verlassen'
// 2021-01-21 00:52:30.971387|INFO    |VirtualServerBase|1  |client disconnected 'Bernd'(id:1496) reason 'reasonmsg=Bruder muss los'
// 2021-01-21 00:56:42.939828|INFO    |VirtualServerBase|1  |client disconnected 'Random'(id:2408) reason 'reasonmsg=leaving'
// 2021-01-21 01:24:11.513265|INFO    |VirtualServerBase|1  |client connected 'Konrad | Coernerbrot1'(id:2639) using a myTeamSpeak ID from [2003:f3:1715:2e00:6414:6a3e:2c4d:74b]:54845
// 2021-01-21 01:24:15.093955|INFO    |VirtualServerBase|1  |client disconnected 'Konrad | Coernerbrot1'(id:2639) reason 'reasonmsg=weil er auf die Pisse hier keinen Bock mehr hat.'
// 2021-01-21 01:57:50.255947|INFO    |VirtualServerBase|1  |client connected 'dici'(id:724) using a myTeamSpeak ID from 178.165.128.46:43260
// 2021-01-21 01:57:50.290221|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1846957269' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 01:57:50.339863|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1846957269' by client 'carmi'(id:601)
// 2021-01-21 01:57:51.703067|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1846957269' by client 'dici'(id:724)
// 2021-01-21 01:57:51.729800|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'dici'(id:724)
// 2021-01-21 02:01:48.948067|INFO    |VirtualServerBase|1  |client disconnected 'carmi'(id:601) reason 'reasonmsg=Verlassen'
// 2021-01-21 02:01:51.015269|INFO    |VirtualServerBase|1  |client disconnected 'Konrad | Coernerbrot'(id:2639) reason 'reasonmsg=weil er auf die Pisse hier keinen Bock mehr hat.'
// 2021-01-21 02:02:52.798885|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1846957269' by client 'dici'(id:724)
// 2021-01-21 02:02:52.799702|INFO    |VirtualServerBase|1  |client disconnected 'dici'(id:724) reason 'reasonmsg=Verlassen'
// 2021-01-21 02:22:14.705371|INFO    |VirtualServerBase|1  |client disconnected 'Chaoscaot'(id:1043) reason 'reasonmsg=Hat keine lust mehr auf den ranz'
// 2021-01-21 06:29:29.453332|INFO    |VirtualServerBase|1  |client connected 'K3ntex'(id:2140) from [2003:e1:2f2f:f300:c0f5:584f:c4fe:1628]:61186
// 2021-01-21 06:29:38.484753|INFO    |VirtualServerBase|1  |client disconnected 'K3ntex'(id:2140) reason 'reasonmsg=Verlassen'
// 2021-01-21 06:33:22.272081|INFO    |VirtualServerBase|1  |client connected 'carmi'(id:601) using a myTeamSpeak ID from [2003:f2:2f08:1300:78d7:5205:8f0c:d979]:56873
// 2021-01-21 06:38:59.150145|INFO    |VirtualServerBase|1  |client connected 'Tom | ZentornoLP'(id:565) using a myTeamSpeak ID from 62.216.203.0:59255
// 2021-01-21 06:58:05.078593|INFO    |VirtualServerBase|1  |client connected 'wadilari'(id:637) using a myTeamSpeak ID from 80.145.24.122:61561
// 2021-01-21 06:58:11.443197|INFO    |VirtualServerBase|1  |client disconnected 'wadilari'(id:637) reason 'reasonmsg=Bye guysssss'
// 2021-01-21 06:59:05.477663|INFO    |VirtualServerBase|1  |client connected 'Konrad | Coernerbrot'(id:2639) using a myTeamSpeak ID from [2003:f3:1715:2e00:dd4d:56e3:e2de:1ee1]:53701
// 2021-01-21 06:59:05.964462|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_3662704987' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:05.964553|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1530657145' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:05.964980|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2686920457' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:05.965056|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_358947573' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:05.965120|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2338706340' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:08.431714|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_3508616205' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:08.445719|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:08.452945|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_4012713837' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:08.453179|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_3508616205' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:08.549506|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:08.610998|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_4012713837' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:08.631773|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_3508616205' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:08.633487|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:08.653457|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_4012713837' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:08.729180|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_3508616205' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:08.811705|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:08.833174|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_4012713837' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:08.892197|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_3508616205' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:08.945699|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 06:59:09.046718|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_4012713837' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 07:24:45.801083|INFO    |VirtualServerBase|1  |client connected 'JAB_1305 | Joshua'(id:2474) using a myTeamSpeak ID from 92.192.41.18:57591
// 2021-01-21 07:28:02.219463|INFO    |VirtualServerBase|1  |client connected 'K3ntex'(id:2140) from [2003:e1:2f2f:f300:c0f5:584f:c4fe:1628]:64228
// 2021-01-21 07:28:23.639333|INFO    |VirtualServerBase|1  |client disconnected 'K3ntex'(id:2140) reason 'reasonmsg=Verlassen'
// 2021-01-21 07:38:07.964442|INFO    |VirtualServerBase|1  |client connected 'Julian'(id:718) from [2003:c1:2f1f:2500:dc07:5c14:97b0:376e]:54267
// 2021-01-21 07:39:09.608450|INFO    |VirtualServerBase|1  |client connected 'Alex | Tischkante'(id:577) using a myTeamSpeak ID from 217.84.112.181:50996
// 2021-01-21 07:39:10.324727|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2938754302' by client 'Alex | Tischkante'(id:577)
// 2021-01-21 07:39:10.493471|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_4012713837' by client 'Alex | Tischkante'(id:577)
// 2021-01-21 07:39:10.493965|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Alex | Tischkante'(id:577)
// 2021-01-21 07:39:11.998516|INFO    |VirtualServerBase|1  |client disconnected 'Alex | Tischkante'(id:577) reason 'reasonmsg=Verlassen'
// 2021-01-21 07:39:21.672501|INFO    |VirtualServerBase|1  |client connected 'Alex | Tischkante'(id:577) using a myTeamSpeak ID from 217.84.112.181:64148
// 2021-01-21 07:39:32.029694|INFO    |VirtualServerBase|1  |client disconnected 'Alex | Tischkante'(id:577) reason 'reasonmsg=Verlassen'
// 2021-01-21 07:47:45.425390|INFO    |VirtualServerBase|1  |client connected 'Nicowit'(id:2672) from 88.67.144.212:53952
// 2021-01-21 07:47:45.946872|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Nicowit'(id:2672)
// 2021-01-21 07:47:49.033430|INFO    |VirtualServerBase|1  |client disconnected 'Nicowit'(id:2672) reason 'reasonmsg=Verlassen'
// 2021-01-21 07:47:54.589211|INFO    |VirtualServerBase|1  |client connected 'Nicowit'(id:2672) from 88.67.144.212:53952
// 2021-01-21 07:48:04.300942|INFO    |VirtualServerBase|1  |client disconnected 'Nicowit'(id:2672) reason 'reasonmsg=Verlassen'
// 2021-01-21 07:54:00.097498|INFO    |VirtualServerBase|1  |client connected 'Günni'(id:1092) using a myTeamSpeak ID from 185.22.142.173:50145
// 2021-01-21 07:54:04.257911|INFO    |VirtualServerBase|1  |client connected 'Einfachüberrannt'(id:2173) from [2a00:6020:15e0:9600:1f:33e6:5b05:d883]:51333
// 2021-01-21 08:15:51.559270|INFO    |VirtualServerBase|1  |client connected 'K3ntex'(id:2140) from [2003:e1:2f2f:f300:c0f5:584f:c4fe:1628]:61434
// 2021-01-21 08:16:56.946993|INFO    |VirtualServerBase|1  |client disconnected 'K3ntex'(id:2140) reason 'reasonmsg=Verlassen'
// 2021-01-21 08:36:17.771204|INFO    |VirtualServerBase|1  |client connected 'Sarah'(id:736) from 93.131.156.38:56648
// 2021-01-21 08:36:38.010926|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1215672591' by client 'Konrad | Coernerbrot'(id:2639)
// 2021-01-21 08:39:54.552826|INFO    |VirtualServerBase|1  |client connected 'Konrad | Coernerbrot1'(id:2639) using a myTeamSpeak ID from [2003:f3:1715:2e00:704a:20d5:844e:81d8]:59569
// 2021-01-21 08:40:40.073793|INFO    |VirtualServerBase|1  |client disconnected 'Konrad | Coernerbrot'(id:2639) reason 'reasonmsg=Leaving'
// 2021-01-21 09:04:01.287589|INFO    |VirtualServerBase|1  |client disconnected 'Einfachüberrannt'(id:2173) reason 'reasonmsg=Verlassen'
// 2021-01-21 09:10:24.958031|INFO    |VirtualServerBase|1  |client connected 'Darthepi'(id:1085) from 94.31.96.176:59398
// 2021-01-21 09:11:44.622945|INFO    |PktHandler    |1  |Dropping client 18 because of ping timeout 19 0 0
// 2021-01-21 09:11:44.623057|INFO    |VirtualServerBase|1  |client disconnected 'Darthepi'(id:1085) reason 'reasonmsg=connection lost'
// 2021-01-21 09:11:47.600425|INFO    |VirtualServerBase|1  |client connected 'Darthepi'(id:1085) from 94.31.96.176:1025
// 2021-01-21 09:20:49.179194|INFO    |VirtualServerBase|1  |client connected 'Branko'(id:2760) from 94.31.103.80:52989
// 2021-01-21 09:20:50.115684|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Branko'(id:2760)
// 2021-01-21 09:23:16.861897|INFO    |VirtualServerBase|1  |client connected 'Phiepon'(id:2644) using a myTeamSpeak ID from [2001:16b8:2cd6:5800:d5f4:bb58:5705:b46f]:57300
// 2021-01-21 09:23:18.459883|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Phiepon'(id:2644)
// 2021-01-21 09:37:11.626013|INFO    |VirtualServerBase|1  |client connected 'Lörres'(id:1088) using a myTeamSpeak ID from [2a00:61e0:4195:8c01:11f2:1042:68c3:94ce]:62529
// 2021-01-21 09:37:12.318071|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Lörres'(id:1088)
// 2021-01-21 09:44:11.256747|INFO    |VirtualServerBase|1  |client connected 'Bernd'(id:1496) from [2001:16b8:60ab:d300:e4ce:2d80:fdf8:fe9d]:59117
// 2021-01-21 09:48:03.603856|INFO    |VirtualServerBase|1  |client connected 'HeuteGutGegessen'(id:1089) using a myTeamSpeak ID from 94.31.100.251:53851
// 2021-01-21 09:50:23.540935|INFO    |VirtualServerBase|1  |client connected 'Phoenix'(id:1098) from 78.49.127.4:59633
// 2021-01-21 10:03:03.649581|INFO    |VirtualServerBase|1  |client connected 'LarsJaeger'(id:2514) using a myTeamSpeak ID from 92.192.9.188:51443
// 2021-01-21 10:07:22.585472|INFO    |VirtualServerBase|1  |client connected 'Florian'(id:572) using a myTeamSpeak ID from [2003:ee:ef05:e900:d891:4824:df45:2f29]:49407
// 2021-01-21 10:10:52.447512|INFO    |VirtualServerBase|1  |client connected 'FreddyCraft'(id:2809) from [2003:de:4713:1939:1078:d53b:27f0:c327]:57851
// 2021-01-21 10:10:53.831951|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_78431240' by client 'FreddyCraft'(id:2809)
// 2021-01-21 10:10:53.989676|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2338706340' by client 'FreddyCraft'(id:2809)
// 2021-01-21 10:10:54.005928|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_358947573' by client 'FreddyCraft'(id:2809)
// 2021-01-21 10:10:54.013479|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_4012713837' by client 'FreddyCraft'(id:2809)
// 2021-01-21 10:10:54.013567|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'FreddyCraft'(id:2809)
// 2021-01-21 10:11:34.636179|INFO    |VirtualServerBase|1  |client disconnected 'FreddyCraft'(id:2809) reason 'reasonmsg=Verlassen'
// 2021-01-21 10:14:20.967734|INFO    |VirtualServerBase|1  |client disconnected 'Sarah'(id:736) reason 'reasonmsg=....TS3 Android....'
// 2021-01-21 10:14:30.301969|INFO    |VirtualServerBase|1  |client connected 'Sarah'(id:736) from 93.131.156.38:33227
// 2021-01-21 10:19:53.243683|INFO    |VirtualServerBase|1  |client connected 'Ban'(id:1087) using a myTeamSpeak ID from [2a00:6020:15df:d100:ed93:98d9:104b:f56f]:49831
// 2021-01-21 10:22:58.997198|INFO    |VirtualServerBase|1  |client disconnected 'Sarah'(id:736) reason 'reasonmsg=....TS3 Android....'
// 2021-01-21 10:32:02.486580|INFO    |VirtualServerBase|1  |client connected 'JNSN'(id:2231) using a myTeamSpeak ID from [2a00:6020:15df:d100:b12b:cde8:1325:afb9]:57745
// 2021-01-21 10:32:05.001235|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'JNSN'(id:2231)
// 2021-01-21 10:48:44.302730|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1215672591' by client 'Julian'(id:718)
// 2021-01-21 10:49:24.589822|INFO    |PktHandler    |1  |Dropping client 26 because of ping timeout 19 0 0
// 2021-01-21 10:49:24.589921|INFO    |VirtualServerBase|1  |client disconnected 'LarsJaeger'(id:2514) reason 'reasonmsg=connection lost'
// 2021-01-21 10:53:51.461793|INFO    |VirtualServerBase|1  |client connected 'LarsJaeger'(id:2514) using a myTeamSpeak ID from 92.192.9.188:49140
// 2021-01-21 10:54:06.420400|INFO    |VirtualServerBase|1  |client disconnected 'LarsJaeger'(id:2514) reason 'reasonmsg=leaving'
// 2021-01-21 10:54:12.943267|INFO    |VirtualServerBase|1  |client connected 'LarsJaeger'(id:2514) using a myTeamSpeak ID from 92.192.9.188:51824
// 2021-01-21 10:54:18.083797|INFO    |VirtualServerBase|1  |client disconnected 'LarsJaeger'(id:2514) reason 'reasonmsg=leaving'
// 2021-01-21 10:56:12.553548|INFO    |VirtualServerBase|1  |client connected 'XxMLGamingHDxX'(id:2787) using a myTeamSpeak ID from 31.17.251.145:6129
// 2021-01-21 11:12:11.956950|INFO    |VirtualServerBase|1  |client connected 'LarsJaeger'(id:2514) using a myTeamSpeak ID from 92.192.9.188:34081
// 2021-01-21 11:24:51.122455|INFO    |VirtualServerBase|1  |client connected 'Steffen'(id:2467) using a myTeamSpeak ID from [2a02:908:1d42:aca0:d0b5:96fd:c2cc:ed67]:49916
// 2021-01-21 11:26:29.426271|INFO    |VirtualServerBase|1  |client connected 'Random'(id:2408) from [2003:c0:f706:4300:b507:edfd:57d1:6b0c]:53531
// 2021-01-21 11:33:38.505102|INFO    |VirtualServerBase|1  |client connected 'Luca'(id:576) using a myTeamSpeak ID from [2a02:120b:c3f1:5ce0:e5fd:197:a42b:f8c7]:60788
// 2021-01-21 11:33:40.281851|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2338706340' by client 'Luca'(id:576)
// 2021-01-21 11:33:40.281933|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'Luca'(id:576)
// 2021-01-21 11:33:48.052349|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_4012713837' by client 'Luca'(id:576)
// 2021-01-21 11:33:48.052449|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Luca'(id:576)
// 2021-01-21 11:33:50.540306|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'Julian'(id:718)
// 2021-01-21 11:33:59.585323|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2338706340' by client 'Julian'(id:718)
// 2021-01-21 11:33:59.585817|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2686920457' by client 'Julian'(id:718)
// 2021-01-21 11:33:59.585867|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1530657145' by client 'Julian'(id:718)
// 2021-01-21 11:35:05.608476|INFO    |VirtualServerBase|1  |client connected 'Sarah'(id:736) from 93.131.156.38:39165
// 2021-01-21 11:36:22.275375|INFO    |VirtualServerBase|1  |client connected 'Luca1'(id:576) using a myTeamSpeak ID from [2a02:120b:c3f1:5ce0:1ff:f8fd:63e3:52cb]:58871
// 2021-01-21 11:38:29.160446|INFO    |VirtualServerBase|1  |client connected 'ReiGnZ'(id:1132) using a myTeamSpeak ID from [2a00:61e0:41ed:ef01:b90d:118:a61a:2af5]:50028
// 2021-01-21 11:38:32.722417|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'ReiGnZ'(id:1132)
// 2021-01-21 11:38:33.385922|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'ReiGnZ'(id:1132)
// 2021-01-21 11:43:35.754716|INFO    |VirtualServerBase|1  |client connected 'DreystuhL'(id:2604) from 95.90.226.22:54445
// 2021-01-21 11:43:37.413157|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'DreystuhL'(id:2604)
// 2021-01-21 11:47:44.367448|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_488932596' by client 'Julian'(id:718)
// 2021-01-21 11:48:17.559677|INFO    |VirtualServerBase|1  |client disconnected 'Phiepon'(id:2644) reason 'reasonmsg=Verlassen'
// 2021-01-21 11:52:06.775684|INFO    |VirtualServerBase|1  |client connected 'K3ntex'(id:2140) from [2003:e1:2f2f:f300:c0f5:584f:c4fe:1628]:62913
// 2021-01-21 11:59:46.252830|INFO    |VirtualServerBase|1  |client connected 'Jonas | Buffi_TV'(id:806) from [2a02:8109:b840:1d0c:7dff:fb41:d02c:8dc4]:64831
// 2021-01-21 12:00:46.661822|INFO    |VirtualServerBase|1  |client disconnected 'Sarah'(id:736) reason 'reasonmsg=....TS3 Android....'
// 2021-01-21 12:02:57.965772|INFO    |VirtualServerBase|1  |client connected 'T___D | Das ist eine lüge'(id:625) from [2a02:810d:5fbf:ee24:dd27:445a:b642:12ce]:60827
// 2021-01-21 12:12:36.358842|INFO    |VirtualServerBase|1  |client connected '[WT] Miny'(id:595) using a myTeamSpeak ID from [2a02:908:1477:e840:4148:7a3a:d276:8bf3]:59250
// 2021-01-21 12:14:55.692851|INFO    |VirtualServerBase|1  |client connected '_Malido'(id:1688) from 91.66.220.9:56609
// 2021-01-21 12:15:21.031608|INFO    |VirtualServerBase|1  |client connected 'Einfachüberrannt'(id:2173) from [2a00:6020:15e0:9600:249a:dd2:19a8:c855]:53289
// 2021-01-21 12:31:33.190800|INFO    |PktHandler    |1  |Dropping client 19 because of ping timeout 19 0 0
// 2021-01-21 12:31:33.190912|INFO    |VirtualServerBase|1  |client disconnected 'Darthepi'(id:1085) reason 'reasonmsg=connection lost'
// 2021-01-21 12:31:53.511114|INFO    |VirtualServerBase|1  |client connected 'Darthepi'(id:1085) from 94.31.96.176:59398
// 2021-01-21 12:33:49.019294|INFO    |PktHandler    |1  |Cleaning up connection because of 13 resends of COMMAND packet
// 2021-01-21 12:33:49.019366|INFO    |PktHandler    |1  |Dropping client 50 because of resend timeout
// 2021-01-21 12:33:49.019447|INFO    |VirtualServerBase|1  |client disconnected 'Darthepi'(id:1085) reason 'reasonmsg=connection lost'
// 2021-01-21 12:33:58.082306|INFO    |VirtualServerBase|1  |client connected 'Darthepi'(id:1085) from 94.31.96.176:1025
// 2021-01-21 12:36:34.523987|INFO    |VirtualServerBase|1  |client disconnected 'LarsJaeger'(id:2514) reason 'reasonmsg=leaving'
// 2021-01-21 12:37:15.687512|INFO    |VirtualServerBase|1  |client connected 'Krebs'(id:2665) from [2003:da:f15:e82d:e0bc:f715:145c:abd9]:52252
// 2021-01-21 12:37:18.497693|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'Krebs'(id:2665)
// 2021-01-21 12:37:18.542854|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Krebs'(id:2665)
// 2021-01-21 12:45:05.141160|INFO    |VirtualServerBase|1  |client connected 'Marc | FrshMotion'(id:629) using a myTeamSpeak ID from 217.243.160.141:52288
// 2021-01-21 12:45:08.492305|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_382257059' by client 'Luca'(id:576)
// 2021-01-21 12:45:09.503352|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_382257059' by client 'Julian'(id:718)
// 2021-01-21 12:45:09.864879|INFO    |VirtualServerBase|1  |client connected 'Chaoscaot'(id:1043) using a myTeamSpeak ID from [2003:df:3743:d63:cca6:ada1:d915:89e0]:58837
// 2021-01-21 12:51:55.667363|INFO    |VirtualServerBase|1  |client disconnected 'XxMLGamingHDxX'(id:2787) reason 'reasonmsg=Verlassen'
// 2021-01-21 12:56:49.543110|INFO    |VirtualServerBase|1  |client connected 'levon'(id:2550) from 2.207.94.238:52298
// 2021-01-21 13:07:08.446941|INFO    |VirtualServerBase|1  |client disconnected 'Phoenix'(id:1098) reason 'reasonmsg=Verlassen'
// 2021-01-21 13:11:50.114718|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_3508616205' by client 'Julian'(id:718)
// 2021-01-21 13:11:55.788721|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_162188270' by client 'Julian'(id:718)
// 2021-01-21 13:11:59.777763|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2557677694' by client 'Julian'(id:718)
// 2021-01-21 13:13:06.193265|INFO    |VirtualServerBase|1  |client connected 'Mulli/Adam'(id:2749) from 87.123.199.56:4895
// 2021-01-21 13:13:07.930904|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'Mulli/Adam'(id:2749)
// 2021-01-21 13:13:07.947703|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Mulli/Adam'(id:2749)
// 2021-01-21 13:13:12.174240|INFO    |VirtualServerBase|1  |channel 'Support: Mulli/Adam'(id:1198) created by 'MyPlayPlanet  | Teamspeak-Bot'(id:1100)
// 2021-01-21 13:14:37.143000|INFO    |VirtualServerBase|1  |channel 'Support: Mulli/Adam'(id:1198) deleted by 'server'(id:0)
// 2021-01-21 13:14:57.386494|INFO    |VirtualServerBase|1  |client disconnected 'Mulli/Adam'(id:2749) reason 'reasonmsg=Verlassen'
// 2021-01-21 13:16:28.448954|INFO    |VirtualServerBase|1  |client disconnected 'Jonas | Buffi_TV'(id:806) reason 'reasonmsg=Verlassen'
// 2021-01-21 13:17:19.906283|INFO    |VirtualServerBase|1  |client connected 'Jonas | Buffi_TV'(id:806) from [2a02:8109:b840:1d0c:7dff:fb41:d02c:8dc4]:59377
// 2021-01-21 13:18:19.539152|INFO    |VirtualServerBase|1  |client connected 'Phiepon'(id:2644) using a myTeamSpeak ID from [2001:16b8:2cd6:5800:d5f4:bb58:5705:b46f]:61324
// 2021-01-21 13:21:31.261756|INFO    |VirtualServerBase|1  |client connected 'Kuchenglas'(id:2720) using a myTeamSpeak ID from 93.242.12.101:50317
// 2021-01-21 13:21:31.384546|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_3662704987' by client 'Kuchenglas'(id:2720)
// 2021-01-21 13:21:31.731206|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_488932596' by client 'Kuchenglas'(id:2720)
// 2021-01-21 13:21:31.731281|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_78431240' by client 'Kuchenglas'(id:2720)
// 2021-01-21 13:21:32.051731|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2338706340' by client 'Kuchenglas'(id:2720)
// 2021-01-21 13:21:32.051796|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1530657145' by client 'Kuchenglas'(id:2720)
// 2021-01-21 13:21:32.052657|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_358947573' by client 'Kuchenglas'(id:2720)
// 2021-01-21 13:21:32.751089|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2686920457' by client 'Kuchenglas'(id:2720)
// 2021-01-21 13:21:32.767110|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'Kuchenglas'(id:2720)
// 2021-01-21 13:21:33.381346|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2241065752' by client 'Kuchenglas'(id:2720)
// 2021-01-21 13:21:33.533205|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_4025185180' by client 'Kuchenglas'(id:2720)
// 2021-01-21 13:21:33.563576|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_382257059' by client 'Kuchenglas'(id:2720)
// 2021-01-21 13:21:33.568212|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_4012713837' by client 'Kuchenglas'(id:2720)
// 2021-01-21 13:21:33.569407|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Kuchenglas'(id:2720)
// 2021-01-21 13:21:33.756988|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_3508616205' by client 'Kuchenglas'(id:2720)
// 2021-01-21 13:21:33.960110|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1215672591' by client 'Kuchenglas'(id:2720)
// 2021-01-21 13:21:43.305759|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_162188270' by client 'Kuchenglas'(id:2720)
// 2021-01-21 13:21:43.417049|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2557677694' by client 'Kuchenglas'(id:2720)
// 2021-01-21 13:22:25.402338|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2557677694' by client 'DreystuhL'(id:2604)
// 2021-01-21 13:27:46.863059|INFO    |VirtualServerBase|1  |client connected 'XxMLGamingHDxX'(id:2787) using a myTeamSpeak ID from 31.17.251.145:6142
// 2021-01-21 13:33:53.637635|INFO    |VirtualServerBase|1  |client connected 'Matthis'(id:2572) using a myTeamSpeak ID from 82.212.31.233:54968
// 2021-01-21 13:34:11.917283|INFO    |VirtualServerBase|1  |client disconnected 'Luca1'(id:576) reason 'invokerid=3 invokername=Tom | ZentornoLP invokeruid=AWoJpBtsl0vCh1Vuqoo99qdaALw= reasonmsg'
// 2021-01-21 13:34:20.616819|INFO    |VirtualServerBase|1  |client connected 'Luca1'(id:576) using a myTeamSpeak ID from [2a02:120b:c3f1:5ce0:1ff:f8fd:63e3:52cb]:58871
// 2021-01-21 13:38:53.582182|INFO    |VirtualServerBase|1  |client 'Günni'(id:1092) changed myTeamSpeak ID
// 2021-01-21 13:43:57.393635|INFO    |VirtualServerBase|1  |client disconnected 'carmi'(id:601) reason 'reasonmsg=Verlassen'
// 2021-01-21 13:45:13.134139|INFO    |VirtualServerBase|1  |client disconnected 'Kuchenglas'(id:2720) reason 'reasonmsg=verlassen'
// 2021-01-21 13:45:24.590731|INFO    |VirtualServerBase|1  |client connected 'Kuchenglas'(id:2720) using a myTeamSpeak ID from 93.242.12.101:62991
// 2021-01-21 13:48:25.747139|INFO    |VirtualServerBase|1  |client connected 'Tokama'(id:2241) from [2a02:8070:7f6:4100:3597:538b:fe5b:c2c]:60114
// 2021-01-21 13:48:35.182239|INFO    |VirtualServerBase|1  |client disconnected 'Phiepon'(id:2644) reason 'reasonmsg=Verlassen'
// 2021-01-21 14:09:00.784648|INFO    |VirtualServerBase|1  |client disconnected 'DreystuhL'(id:2604) reason 'reasonmsg=Verlassen'
// 2021-01-21 14:11:19.240213|INFO    |VirtualServerBase|1  |client connected 'Tom'(id:604) using a myTeamSpeak ID from 176.199.252.129:28599
// 2021-01-21 14:11:59.737032|INFO    |VirtualServerBase|1  |client connected 'Inkompetenz | Jonas'(id:2715) from [2003:cc:df24:2c17:14fa:b8db:3a2c:2672]:56632
// 2021-01-21 14:12:16.216911|INFO    |VirtualServerBase|1  |client disconnected 'Inkompetenz | Jonas'(id:2715) reason 'reasonmsg=Verlassen'
// 2021-01-21 14:13:31.412477|INFO    |VirtualServerBase|1  |client connected 'Inkompetenz | Jonas'(id:2715) from [2003:cc:df24:2c17:14fa:b8db:3a2c:2672]:60087
// 2021-01-21 14:17:37.549559|INFO    |VirtualServerBase|1  |client connected 'Faustiii/André'(id:2650) from 87.133.15.13:64394
// 2021-01-21 14:17:39.130210|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'Faustiii/André'(id:2650)
// 2021-01-21 14:18:53.395892|INFO    |VirtualServerBase|1  |client connected 'Tim | FREE2WIN'(id:2638) using a myTeamSpeak ID from 158.181.74.195:56225
// 2021-01-21 14:20:56.887609|INFO    |VirtualServerBase|1  |client disconnected 'Einfachüberrannt'(id:2173) reason 'reasonmsg=Verlassen'
// 2021-01-21 14:23:25.650611|INFO    |VirtualServerBase|1  |client disconnected 'Luca'(id:576) reason 'reasonmsg=leaving'
// 2021-01-21 14:26:57.500738|INFO    |VirtualServerBase|1  |client disconnected 'Tokama'(id:2241) reason 'reasonmsg=Verlassen'
// 2021-01-21 14:28:23.414935|INFO    |VirtualServerBase|1  |client connected 'Janshome'(id:2653) from 88.152.184.82:29430
// 2021-01-21 14:32:48.102285|INFO    |VirtualServerBase|1  |client disconnected 'XxMLGamingHDxX'(id:2787) reason 'reasonmsg=Verlassen'
// 2021-01-21 14:32:50.752911|INFO    |VirtualServerBase|1  |client disconnected '_Malido'(id:1688) reason 'reasonmsg=Verlassen'
// 2021-01-21 14:34:46.269405|INFO    |PktHandler    |1  |Dropping client 65 because of ping timeout 19 0 0
// 2021-01-21 14:34:46.269509|INFO    |VirtualServerBase|1  |client disconnected 'Tom'(id:604) reason 'reasonmsg=connection lost'
// 2021-01-21 15:06:22.209760|INFO    |VirtualServerBase|1  |client connected 'Freddycraft'(id:2804) from [2003:de:4713:1991:b1dc:d1d8:ce3e:9eaf]:62331
// 2021-01-21 15:07:54.821680|INFO    |VirtualServerBase|1  |client connected 'Butzlabben'(id:602) using a myTeamSpeak ID from [2001:7c7:20f6:9:5c4b:4e66:a9ad:b132]:50650
// 2021-01-21 15:07:56.596519|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_358947573' by client 'Butzlabben'(id:602)
// 2021-01-21 15:07:56.598941|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'Butzlabben'(id:602)
// 2021-01-21 15:07:56.613473|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_382257059' by client 'Butzlabben'(id:602)
// 2021-01-21 15:07:56.614882|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_3508616205' by client 'Butzlabben'(id:602)
// 2021-01-21 15:07:56.615542|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1215672591' by client 'Butzlabben'(id:602)
// 2021-01-21 15:07:56.646401|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2241065752' by client 'Butzlabben'(id:602)
// 2021-01-21 15:08:58.671939|INFO    |VirtualServerBase|1  |client disconnected 'Inkompetenz | Jonas'(id:2715) reason 'reasonmsg=Verlassen'
// 2021-01-21 15:12:21.370183|INFO    |PktHandler    |1  |Dropping client 62 because of ping timeout 19 0 0
// 2021-01-21 15:12:21.370285|INFO    |VirtualServerBase|1  |client disconnected 'Luca1'(id:576) reason 'reasonmsg=connection lost'
// 2021-01-21 15:14:06.028999|INFO    |VirtualServerBase|1  |client connected 'Luca'(id:576) using a myTeamSpeak ID from [2a02:120b:c3f1:5ce0:e18b:466e:ed30:6cac]:59038
// 2021-01-21 15:17:11.166853|INFO    |VirtualServerBase|1  |client disconnected 'Luca'(id:576) reason 'reasonmsg'
// 2021-01-21 15:17:14.767435|INFO    |VirtualServerBase|1  |client connected 'Luca'(id:576) using a myTeamSpeak ID from [2a02:120b:c3f1:5ce0:e18b:466e:ed30:6cac]:57777
// 2021-01-21 15:17:16.233097|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'Luca'(id:576)
// 2021-01-21 15:17:16.350578|INFO    |VirtualServerBase|1  |client disconnected 'Luca'(id:576) reason 'reasonmsg=Verlassen'
// 2021-01-21 15:17:16.539104|INFO    |PktHandler    |1  |Cleaning up connection because of 10 resends of COMMAND packet
// 2021-01-21 15:17:18.430025|INFO    |VirtualServerBase|1  |client connected 'Luca'(id:576) using a myTeamSpeak ID from [2a02:120b:c3f1:5ce0:e18b:466e:ed30:6cac]:61493
// 2021-01-21 15:26:59.553185|INFO    |VirtualServerBase|1  |client disconnected 'Luca'(id:576) reason 'reasonmsg'
// 2021-01-21 15:27:08.300605|INFO    |VirtualServerBase|1  |client connected 'Luca'(id:576) using a myTeamSpeak ID from [2a02:120b:c3f1:5ce0:e18b:466e:ed30:6cac]:51103
// 2021-01-21 15:28:18.146339|INFO    |VirtualServerBase|1  |client disconnected 'Lörres'(id:1088) reason 'reasonmsg=Bin bei Aline'
// 2021-01-21 15:28:36.035200|INFO    |VirtualServerBase|1  |client connected 'Lörres'(id:1088) using a myTeamSpeak ID from [2a00:61e0:4195:8c01:11f2:1042:68c3:94ce]:62077
// 2021-01-21 15:34:57.065268|INFO    |VirtualServerBase|1  |client connected 'wadilari'(id:637) using a myTeamSpeak ID from 80.145.24.122:57948
// 2021-01-21 15:35:44.208266|INFO    |VirtualServerBase|1  |client disconnected 'wadilari'(id:637) reason 'reasonmsg=Bye guysssss'
// 2021-01-21 15:40:06.848714|INFO    |VirtualServerBase|1  |client connected 'Firetube | Tom'(id:609) using a myTeamSpeak ID from 37.5.251.41:40824
// 2021-01-21 15:45:39.159938|INFO    |VirtualServerBase|1  |client connected '_PizzaPlayer_'(id:2810) using a myTeamSpeak ID from 31.17.251.145:6127
// 2021-01-21 15:46:02.091746|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client '_PizzaPlayer_'(id:2810)
// 2021-01-21 15:46:39.795288|INFO    |VirtualServerBase|1  |client disconnected '_PizzaPlayer_'(id:2810) reason 'reasonmsg=Verlassen'
// 2021-01-21 15:54:17.132402|INFO    |VirtualServerBase|1  |client disconnected 'Random'(id:2408) reason 'reasonmsg=leaving'
// 2021-01-21 16:07:23.669903|INFO    |VirtualServerBase|1  |client disconnected 'Florian'(id:572) reason 'reasonmsg=leaving'
// 2021-01-21 16:08:33.110481|INFO    |VirtualServerBase|1  |client connected 'ChackoLP'(id:2811) using a myTeamSpeak ID from [2003:de:4f1f:3800:bd6d:7bd1:ffd4:6374]:54281
// 2021-01-21 16:08:34.345579|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_3662704987' by client 'ChackoLP'(id:2811)
// 2021-01-21 16:08:34.451544|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_488932596' by client 'ChackoLP'(id:2811)
// 2021-01-21 16:08:34.451622|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2686920457' by client 'ChackoLP'(id:2811)
// 2021-01-21 16:08:34.452073|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1530657145' by client 'ChackoLP'(id:2811)
// 2021-01-21 16:08:34.452148|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1215672591' by client 'ChackoLP'(id:2811)
// 2021-01-21 16:08:34.620586|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2338706340' by client 'ChackoLP'(id:2811)
// 2021-01-21 16:08:34.644573|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_358947573' by client 'ChackoLP'(id:2811)
// 2021-01-21 16:08:34.653801|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'ChackoLP'(id:2811)
// 2021-01-21 16:08:34.695793|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_382257059' by client 'ChackoLP'(id:2811)
// 2021-01-21 16:08:34.706549|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_3508616205' by client 'ChackoLP'(id:2811)
// 2021-01-21 16:08:34.730802|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2241065752' by client 'ChackoLP'(id:2811)
// 2021-01-21 16:09:25.201359|INFO    |VirtualServerBase|1  |client connected 'Brian Griffin'(id:2812) from [2001:16b8:2e5c:f00:e166:1460:59d4:7011]:61424
// 2021-01-21 16:09:26.365782|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_3662704987' by client 'Brian Griffin'(id:2812)
// 2021-01-21 16:09:26.453498|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_488932596' by client 'Brian Griffin'(id:2812)
// 2021-01-21 16:09:26.453988|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2686920457' by client 'Brian Griffin'(id:2812)
// 2021-01-21 16:09:26.454063|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1530657145' by client 'Brian Griffin'(id:2812)
// 2021-01-21 16:09:26.454092|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1215672591' by client 'Brian Griffin'(id:2812)
// 2021-01-21 16:11:25.522175|INFO    |VirtualServerBase|1  |client connected 'Tom'(id:604) using a myTeamSpeak ID from 176.199.252.129:28628
// 2021-01-21 16:12:01.281848|INFO    |VirtualServerBase|1  |client connected 'Sarah'(id:736) from 93.131.156.38:34589
// 2021-01-21 16:13:25.182995|INFO    |VirtualServerBase|1  |client disconnected 'Butzlabben'(id:602) reason 'reasonmsg=Verlassen'
// 2021-01-21 16:17:19.810700|INFO    |VirtualServerBase|1  |client connected 'BXNJI'(id:1090) from [2003:c6:7744:8300:e447:f3cc:8d3f:e89]:58094
// 2021-01-21 16:17:55.321618|INFO    |VirtualServerBase|1  |client connected 'Ray'(id:2111) from [2003:f1:df1a:ec6b:34fe:609a:531f:c83b]:56544
// 2021-01-21 16:17:56.191375|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'Ray'(id:2111)
// 2021-01-21 16:18:02.626617|INFO    |VirtualServerBase|1  |client disconnected 'BXNJI'(id:1090) reason 'reasonmsg=Verlassen'
// 2021-01-21 16:18:58.695752|INFO    |VirtualServerBase|1  |client disconnected 'Ray'(id:2111) reason 'reasonmsg=Genozid an Telekom machen , gar kein Bock'
// 2021-01-21 16:19:24.865510|INFO    |VirtualServerBase|1  |client connected 'Max | xBushman99x'(id:2106) using a myTeamSpeak ID from 88.65.249.131:56399
// 2021-01-21 16:20:19.609488|INFO    |VirtualServerBase|1  |client disconnected 'Sarah'(id:736) reason 'reasonmsg=....TS3 Android....'
// 2021-01-21 16:20:19.624303|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_3662704987' by client 'Julian'(id:718)
// 2021-01-21 16:21:22.036680|INFO    |VirtualServerBase|1  |client connected 'Sarah'(id:736) from 93.131.156.38:56711
// 2021-01-21 16:25:29.483464|INFO    |VirtualServerBase|1  |client disconnected 'Bernd'(id:1496) reason 'reasonmsg=Bruder muss los'
// 2021-01-21 16:32:55.076769|INFO    |VirtualServerBase|1  |client connected 'Lucas | Lucas3101'(id:610) from 212.110.199.80:50457
// 2021-01-21 16:32:55.104364|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_4025185180' by client 'ChackoLP'(id:2811)
// 2021-01-21 16:37:20.523116|INFO    |VirtualServerBase|1  |client disconnected 'ChackoLP'(id:2811) reason 'reasonmsg=Verlassen'
// 2021-01-21 16:41:41.785714|INFO    |VirtualServerBase|1  |client connected 'TheDark_Beat | Yannic'(id:575) from [2003:e4:6f48:8f00:14b1:2993:8e7f:e152]:57248
// 2021-01-21 16:45:35.988166|INFO    |VirtualServerBase|1  |client disconnected 'Max | xBushman99x'(id:2106) reason 'reasonmsg=Verlassen'
// 2021-01-21 16:50:20.753944|INFO    |VirtualServerBase|1  |client connected 'Max | xBushman99x'(id:2106) using a myTeamSpeak ID from 88.65.249.131:56242
// 2021-01-21 16:54:58.336979|INFO    |PktHandler    |1  |Dropping client 29 because of ping timeout 19 0 0
// 2021-01-21 16:54:58.337077|INFO    |VirtualServerBase|1  |client disconnected 'Max | xBushman99x'(id:2106) reason 'reasonmsg=connection lost'
// 2021-01-21 16:57:22.501362|INFO    |VirtualServerBase|1  |client connected 'Florian'(id:572) using a myTeamSpeak ID from [2003:ee:ef05:e900:e448:15d8:c817:2975]:65100
// 2021-01-21 16:58:24.088271|INFO    |VirtualServerBase|1  |client disconnected 'Florian'(id:572) reason 'reasonmsg=leaving'
// 2021-01-21 16:58:28.824780|INFO    |VirtualServerBase|1  |client disconnected 'Krebs'(id:2665) reason 'reasonmsg=Verlassen'
// 2021-01-21 17:00:21.408868|INFO    |VirtualServer |1  |client (id:718) was added to servergroup 'Nicht Bewegen'(id:63) by client 'Tom | ZentornoLP'(id:565)
// 2021-01-21 17:00:21.421083|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1652767807' by client 'Branko'(id:2760)
// 2021-01-21 17:00:21.431768|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1652767807' by client 'Julian'(id:718)
// 2021-01-21 17:00:21.438227|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1652767807' by client 'levon'(id:2550)
// 2021-01-21 17:00:21.468331|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1652767807' by client 'JNSN'(id:2231)
// 2021-01-21 17:02:48.897743|INFO    |VirtualServer |1  |client (id:718) was removed from servergroup 'Nicht Bewegen'(id:63) by client 'Steffen'(id:2467)
// 2021-01-21 17:05:16.408125|INFO    |VirtualServerBase|1  |client disconnected 'Tom'(id:604) reason 'reasonmsg=Verlassen'
// 2021-01-21 17:07:10.765290|INFO    |VirtualServer |1  |client (id:718) was removed from servergroup 'JoinPower+'(id:76) by client 'Tom | ZentornoLP'(id:565)
// 2021-01-21 17:07:31.049985|INFO    |VirtualServer |1  |client (id:565) was added to servergroup 'Kein Anstupsen'(id:60) by client 'Tom | ZentornoLP'(id:565)
// 2021-01-21 17:07:39.459203|INFO    |VirtualServer |1  |client (id:565) was removed from servergroup 'Kein Anstupsen'(id:60) by client 'Tom | ZentornoLP'(id:565)
// 2021-01-21 17:11:17.396904|INFO    |VirtualServerBase|1  |client disconnected 'levon'(id:2550) reason 'reasonmsg=Verlassen'
// 2021-01-21 17:11:18.134166|INFO    |VirtualServerBase|1  |client connected 'levon'(id:2550) from 2.207.94.238:52298
// 2021-01-21 17:11:21.221949|INFO    |VirtualServerBase|1  |client disconnected 'levon'(id:2550) reason 'reasonmsg=Verlassen'
// 2021-01-21 17:11:34.076001|INFO    |VirtualServerBase|1  |client connected 'Alex | Tischkante'(id:577) using a myTeamSpeak ID from 217.84.112.181:53924
// 2021-01-21 17:11:44.329123|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2938754302' by client 'Julian'(id:718)
// 2021-01-21 17:16:24.777142|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_78431240' by client 'Julian'(id:718)
// 2021-01-21 17:17:50.504944|INFO    |VirtualServerBase|1  |client connected 'Bernd'(id:1496) from [2001:16b8:60ab:d300:e4ce:2d80:fdf8:fe9d]:58712
// 2021-01-21 17:23:58.219901|INFO    |VirtualServerBase|1  |client connected 'Siedaonyx - Jan'(id:1694) from [2a00:61e0:4195:8c01:fd52:f82d:abec:4068]:55264
// 2021-01-21 17:26:42.977320|INFO    |VirtualServerBase|1  |client disconnected 'Julian'(id:718) reason 'reasonmsg=living for nights like this'
// 2021-01-21 17:26:49.820248|INFO    |VirtualServerBase|1  |client connected 'Niclas'(id:630) from [2003:c4:c72c:df00:6c6a:7442:9088:20f6]:52535
// 2021-01-21 17:27:44.528818|INFO    |VirtualServerBase|1  |client disconnected 'Sarah'(id:736) reason 'reasonmsg=....TS3 Android....'
// 2021-01-21 17:28:05.578184|INFO    |VirtualServerBase|1  |client connected 'levon'(id:2550) from 2.207.94.238:52298
// 2021-01-21 17:30:01.549304|INFO    |VirtualServerBase|1  |client disconnected 'Firetube | Tom'(id:609) reason 'reasonmsg=Verlassen'
// 2021-01-21 17:30:05.285488|INFO    |VirtualServerBase|1  |client disconnected 'Darthepi'(id:1085) reason 'reasonmsg=fickt euch '
// 2021-01-21 17:32:11.277203|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'Matthis'(id:2572)
// 2021-01-21 17:42:43.654530|INFO    |VirtualServerBase|1  |client connected 'Tom'(id:604) using a myTeamSpeak ID from 176.199.252.129:28488
// 2021-01-21 17:42:51.396786|INFO    |VirtualServerBase|1  |client disconnected 'Tom'(id:604) reason 'reasonmsg=Verlassen'
// 2021-01-21 17:45:28.531653|INFO    |VirtualServerBase|1  |client connected 'Gröfgi'(id:598) using a myTeamSpeak ID from [2003:c4:a725:b94c:60a6:163b:c7d7:8329]:58085
// 2021-01-21 17:47:11.530467|INFO    |VirtualServerBase|1  |client connected 'Kptn_Matthes89'(id:2711) from [2003:6:5123:a469:bdea:c266:19ca:250a]:50172
// 2021-01-21 17:47:13.082730|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'Kptn_Matthes89'(id:2711)
// 2021-01-21 17:47:53.174653|INFO    |VirtualServerBase|1  |client disconnected 'Faustiii/André'(id:2650) reason 'reasonmsg=Verlassen'
// 2021-01-21 17:51:00.236215|INFO    |VirtualServerBase|1  |client connected 'Flo | Doktor_Mart'(id:774) from [2001:16b8:f1f:8100:11d3:86af:b4e5:7dac]:52673
// 2021-01-21 17:51:01.886169|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'Flo | Doktor_Mart'(id:774)
// 2021-01-21 17:51:12.533888|INFO    |VirtualServerBase|1  |client disconnected 'Flo | Doktor_Mart'(id:774) reason 'reasonmsg=Verlassen'
// 2021-01-21 17:58:44.015581|INFO    |VirtualServerBase|1  |client disconnected '[WT] Miny'(id:595) reason 'reasonmsg=Verlassen'
// 2021-01-21 17:58:47.044566|INFO    |VirtualServerBase|1  |client disconnected 'Kptn_Matthes89'(id:2711) reason 'reasonmsg=Verlassen'
// 2021-01-21 17:58:56.390366|INFO    |VirtualServerBase|1  |client connected '[WT] Miny'(id:595) using a myTeamSpeak ID from [2a02:908:1477:e840:4148:7a3a:d276:8bf3]:62989
// 2021-01-21 17:59:02.412780|INFO    |PktHandler    |1  |Cleaning up connection because of 14 resends of COMMAND packet
// 2021-01-21 17:59:02.412847|INFO    |PktHandler    |1  |Dropping client 40 because of resend timeout
// 2021-01-21 17:59:02.412876|INFO    |VirtualServerBase|1  |client disconnected 'levon'(id:2550) reason 'reasonmsg=connection lost'
// 2021-01-21 18:02:40.055307|INFO    |VirtualServerBase|1  |client connected 'Florian'(id:572) using a myTeamSpeak ID from [2003:ee:ef05:e900:e448:15d8:c817:2975]:63181
// 2021-01-21 18:04:46.567363|INFO    |VirtualServerBase|1  |client connected 'levon'(id:2550) from 90.186.251.76:52298
// 2021-01-21 18:05:10.162879|INFO    |VirtualServerBase|1  |client disconnected 'levon'(id:2550) reason 'reasonmsg=Verlassen'
// 2021-01-21 18:14:15.951686|INFO    |VirtualServerBase|1  |client connected 'Kptn_Matthes89'(id:2711) from [2003:6:5123:a469:bdea:c266:19ca:250a]:50169
// 2021-01-21 18:14:16.405877|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2557677694' by client 'Kptn_Matthes89'(id:2711)
// 2021-01-21 18:16:41.439633|INFO    |VirtualServerBase|1  |client connected 'matthias'(id:2718) from [2003:d7:672c:e000:60e6:b03a:4037:5e84]:52189
// 2021-01-21 18:16:43.047086|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'matthias'(id:2718)
// 2021-01-21 18:16:43.073825|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2557677694' by client 'matthias'(id:2718)
// 2021-01-21 18:16:50.886847|INFO    |VirtualServerBase|1  |client disconnected 'matthias'(id:2718) reason 'reasonmsg=Verlassen'
// 2021-01-21 18:17:43.779159|INFO    |VirtualServerBase|1  |client connected 'Sarah'(id:736) from 93.131.156.38:38501
// 2021-01-21 18:18:31.618752|INFO    |VirtualServerBase|1  |client disconnected 'Brian Griffin'(id:2812) reason 'reasonmsg=Verlassen'
// 2021-01-21 18:21:36.440200|INFO    |VirtualServerBase|1  |client connected 'WhiteCile'(id:584) from 158.181.68.209:33674
// 2021-01-21 18:22:25.075246|INFO    |VirtualServerBase|1  |client connected 'Felix_xx'(id:2713) using a myTeamSpeak ID from 79.234.228.251:57380
// 2021-01-21 18:24:02.177051|INFO    |VirtualServerBase|1  |client connected 'Lukas3482'(id:563) using a myTeamSpeak ID from [2a02:8389:41b8:1980:9d5c:2b8b:3318:9c9d]:63583
// 2021-01-21 18:25:29.796804|INFO    |VirtualServerBase|1  |client connected 'wadilari'(id:637) using a myTeamSpeak ID from 80.145.24.122:53709
// 2021-01-21 18:25:52.366826|INFO    |VirtualServerBase|1  |client disconnected 'wadilari'(id:637) reason 'reasonmsg=Bye guysssss'
// 2021-01-21 18:28:59.202027|INFO    |VirtualServerBase|1  |client connected 'carmi'(id:601) using a myTeamSpeak ID from [2003:f2:2f08:1300:f160:4036:be07:f2b2]:54154
// 2021-01-21 18:31:16.478754|INFO    |VirtualServerBase|1  |client disconnected 'HeuteGutGegessen'(id:1089) reason 'reasonmsg=Es wird eingelocht'
// 2021-01-21 18:37:20.459722|INFO    |VirtualServerBase|1  |client connected 'LarsJaeger'(id:2514) using a myTeamSpeak ID from 92.192.9.188:58949
// 2021-01-21 18:44:20.006411|INFO    |VirtualServerBase|1  |client connected 'Jakob | Officer_LeyLey'(id:2418) from 178.200.53.93:57282
// 2021-01-21 18:59:51.125242|INFO    |VirtualServerBase|1  |client connected 'Moritz | MoritzR200'(id:1998) using a myTeamSpeak ID from 2.204.77.212:50495
// 2021-01-21 19:04:37.851944|INFO    |VirtualServerBase|1  |client connected 'Darthepi'(id:1085) from 94.31.96.176:55631
// 2021-01-21 19:06:27.207064|INFO    |PktHandler    |1  |Dropping client 68 because of ping timeout 19 0 0
// 2021-01-21 19:06:27.207170|INFO    |VirtualServerBase|1  |client disconnected 'Darthepi'(id:1085) reason 'reasonmsg=connection lost'
// 2021-01-21 19:06:50.348260|INFO    |VirtualServerBase|1  |client connected 'Darthepi'(id:1085) from 94.31.96.176:1026
// 2021-01-21 19:07:46.294004|INFO    |PktHandler    |1  |Dropping client 52 because of ping timeout 19 0 0
// 2021-01-21 19:07:46.294084|INFO    |VirtualServerBase|1  |client disconnected 'Kptn_Matthes89'(id:2711) reason 'reasonmsg=connection lost'
// 2021-01-21 19:07:50.343186|INFO    |VirtualServerBase|1  |client connected 'Kptn_Matthes89'(id:2711) from [2003:6:5123:a469:bdea:c266:19ca:250a]:50169
// 2021-01-21 19:12:29.345639|INFO    |VirtualServerBase|1  |client disconnected 'Marc | FrshMotion'(id:629) reason 'reasonmsg=Verlassen'
// 2021-01-21 19:15:29.786290|INFO    |PktHandler    |1  |Dropping client 70 because of ping timeout 19 0 0
// 2021-01-21 19:15:29.786402|INFO    |VirtualServerBase|1  |client disconnected 'Janshome'(id:2653) reason 'reasonmsg=connection lost'
// 2021-01-21 19:16:05.484738|INFO    |VirtualServerBase|1  |client connected 'Janshome'(id:2653) from 88.152.184.82:29430
// 2021-01-21 19:24:38.593463|INFO    |VirtualServerBase|1  |client connected 'Flo | Doktor_Mart'(id:774) from [2001:16b8:f1f:8100:11d3:86af:b4e5:7dac]:57093
// 2021-01-21 19:24:48.690130|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Flo | Doktor_Mart'(id:774)
// 2021-01-21 19:24:54.364025|INFO    |VirtualServerBase|1  |client disconnected 'Flo | Doktor_Mart'(id:774) reason 'reasonmsg=Verlassen'
// 2021-01-21 19:26:27.762217|INFO    |VirtualServerBase|1  |client connected 'Marc | FrshMotion'(id:629) using a myTeamSpeak ID from 217.243.160.141:49377
// 2021-01-21 19:26:45.523086|INFO    |VirtualServerBase|1  |client disconnected 'Marc | FrshMotion'(id:629) reason 'reasonmsg=Verlassen'
// 2021-01-21 19:30:58.881353|INFO    |VirtualServerBase|1  |client disconnected 'Steffen'(id:2467) reason 'reasonmsg=Verlassen'
// 2021-01-21 19:32:43.348582|INFO    |VirtualServerBase|1  |client connected 'tђєl๏ภɠฬคץ~ 웃 | єlเคร'(id:588) from [2a02:8071:a6a7:c300:a5aa:56a4:1f29:42f5]:56006
// 2021-01-21 19:32:43.981383|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'tђєl๏ภɠฬคץ~ 웃 | єlเคร'(id:588)
// 2021-01-21 19:32:48.117171|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'tђєl๏ภɠฬคץ~ 웃 | єlเคร'(id:588)
// 2021-01-21 19:32:54.937153|INFO    |VirtualServerBase|1  |client disconnected 'tђєl๏ภɠฬคץ~ 웃 | єlเคร'(id:588) reason 'reasonmsg=Geht nun einen anderen Weg.'
// 2021-01-21 19:44:05.554181|INFO    |VirtualServerBase|1  |client connected 'nanno'(id:2441) using a myTeamSpeak ID from 83.77.204.238:59976
// 2021-01-21 19:44:06.255770|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'nanno'(id:2441)
// 2021-01-21 19:44:09.433019|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'nanno'(id:2441)
// 2021-01-21 19:48:32.299757|INFO    |VirtualServerBase|1  |client disconnected 'Jakob | Officer_LeyLey'(id:2418) reason 'reasonmsg=Verlassen'
// 2021-01-21 19:49:03.154888|INFO    |VirtualServerBase|1  |client disconnected 'TheDark_Beat | Yannic'(id:575) reason 'reasonmsg=Verlassen'
// 2021-01-21 19:49:40.947682|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Ban'(id:1087)
// 2021-01-21 19:49:45.344890|INFO    |VirtualServerBase|1  |client 'JAB_1305 | Joshua'(id:2474) changed myTeamSpeak ID
// 2021-01-21 20:02:54.146044|INFO    |VirtualServerBase|1  |client disconnected 'Freddycraft'(id:2804) reason 'reasonmsg=Verlassen'
// 2021-01-21 20:04:11.198898|INFO    |VirtualServerBase|1  |client disconnected 'Janshome'(id:2653) reason 'reasonmsg=Verlassen'
// 2021-01-21 20:06:13.799997|INFO    |VirtualServerBase|1  |client connected 'Matthias'(id:2478) from [2a00:6020:15ad:2a00:4ce3:82c2:91ff:bf5f]:57591
// 2021-01-21 20:06:15.376482|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2557677694' by client 'Matthias'(id:2478)
// 2021-01-21 20:06:15.919407|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'Matthias'(id:2478)
// 2021-01-21 20:06:16.676082|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'Matthias'(id:2478)
// 2021-01-21 20:06:17.925331|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2938754302' by client 'Kuchenglas'(id:2720)
// 2021-01-21 20:06:27.928789|INFO    |VirtualServerBase|1  |client disconnected 'Matthias'(id:2478) reason 'reasonmsg=Verlassen'
// 2021-01-21 20:13:40.315317|INFO    |VirtualServerBase|1  |client connected 'Jakob | Officer_LeyLey'(id:2418) from 77.12.61.149:57282
// 2021-01-21 20:16:56.259046|INFO    |VirtualServerBase|1  |client disconnected 'LarsJaeger'(id:2514) reason 'reasonmsg=leaving'
// 2021-01-21 20:17:22.380494|INFO    |VirtualServerBase|1  |client connected 'R1la4k'(id:2813) from 143.244.51.87:53386
// 2021-01-21 20:17:24.237091|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_4025185180' by client 'R1la4k'(id:2813)
// 2021-01-21 20:17:24.344314|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2241065752' by client 'R1la4k'(id:2813)
// 2021-01-21 20:17:24.353089|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_358947573' by client 'R1la4k'(id:2813)
// 2021-01-21 20:17:32.790611|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_4012713837' by client 'R1la4k'(id:2813)
// 2021-01-21 20:17:32.791154|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'R1la4k'(id:2813)
// 2021-01-21 20:18:00.160000|INFO    |VirtualServerBase|1  |client disconnected 'Jakob | Officer_LeyLey'(id:2418) reason 'reasonmsg=Verlassen'
// 2021-01-21 20:20:11.658349|INFO    |VirtualServerBase|1  |client connected 'leinad08'(id:2814) using a myTeamSpeak ID from 94.31.83.23:60680
// 2021-01-21 20:20:13.131851|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_3662704987' by client 'leinad08'(id:2814)
// 2021-01-21 20:20:13.771787|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_4025185180' by client 'leinad08'(id:2814)
// 2021-01-21 20:20:13.776170|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2686920457' by client 'leinad08'(id:2814)
// 2021-01-21 20:20:13.776222|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_1530657145' by client 'leinad08'(id:2814)
// 2021-01-21 20:20:13.787557|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2557677694' by client 'leinad08'(id:2814)
// 2021-01-21 20:20:13.791731|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_3508616205' by client 'leinad08'(id:2814)
// 2021-01-21 20:20:13.863788|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2241065752' by client 'leinad08'(id:2814)
// 2021-01-21 20:20:13.868065|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2338706340' by client 'leinad08'(id:2814)
// 2021-01-21 20:20:13.871650|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_358947573' by client 'leinad08'(id:2814)
// 2021-01-21 20:20:13.907876|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_907852415' by client 'leinad08'(id:2814)
// 2021-01-21 20:20:14.627657|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_4012713837' by client 'leinad08'(id:2814)
// 2021-01-21 20:20:14.627729|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_679593705' by client 'leinad08'(id:2814)
// 2021-01-21 20:20:15.955819|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_162188270' by client 'leinad08'(id:2814)
// 2021-01-21 20:20:19.815808|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_488932596' by client 'leinad08'(id:2814)
// 2021-01-21 20:20:19.815895|INFO    |VirtualServerBase|1  |file download from (id:0), '/icon_2938754302' by client 'leinad08'(id:2814)
// 2021-01-21 20:20:28.522521|INFO    |VirtualServerBase|1  |client connected 'Sebi'(id:2630) from [2003:d8:4f27:b900:f88e:6639:9aac:c4e9]:51361
// 2021-01-21 20:22:43.066676|INFO    |VirtualServerBase|1  |client disconnected 'ElBeanMachine'(id:2813) reason 'reasonmsg=living for nights like this'
// 2021-01-21 20:24:02.446106|INFO    |VirtualServerBase|1  |client connected 'Julian'(id:718) from [2003:c1:2f1f:2500:2d1f:1de3:d1af:9033]:5342

?>