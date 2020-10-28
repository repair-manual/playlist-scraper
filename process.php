<?php

    $videos = json_decode(file_get_contents("data.json"));
    $data = "";
    $count = count($videos) - 1;
    foreach($videos as $i => $video) {
        $video = $video->videoLink;
        $video = explode("&list", $video)[0];

        $index = $video[1] ?? "Not available";

        $title = explode('<title>', file_get_contents($video))[1] ?? "";
        $title =  explode('</title>', $title)[0] ?? "Not available";
        $title = str_replace(" - YouTube", "", $title);
        $title = html_entity_decode($title, ENT_QUOTES);
        $title = str_replace('"', "'", $title);

        $data .= "$video,\"$title\", $index\n";

        echo "$i / $count\t".round($i / $count * 100, 1)."\n";
    }

    file_put_contents("data.txt", $data);

?>