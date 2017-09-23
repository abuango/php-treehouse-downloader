<?php
require 'vendor/autoload.php';

//Add Treehouse course iTunes Download RSS links in the array
$rss_links = [];

foreach($rss_links as $link){
    $rss = Feed::loadRss($link);
    
    if(mkdir($rss->title, 0777)){
        echo "Downloading Course: ".$rss->title;
        echo "\r\n";
        $i= 1;
        foreach($rss->item as $item){
            $video_props = $item->enclosure;
            getVideoLink((string)$video_props['url'], $item->title, $rss->title, $i++);
        }
        echo "Course Download Completed\r\n";
    }else{
        echo "Error creating folder";
    }
}

function getVideoLink($url, $file_name, $folder, $i){
    echo "Downloading: ".$file_name;
    $client = new \GuzzleHttp\Client();
    $fp = fopen($folder.'/'.$i.'-'.$file_name.".mp4", "x");
    $res = $client->request('GET', $url);
    fwrite($fp, $res->getBody());
    fclose($fp);
    echo "\r\n";
}