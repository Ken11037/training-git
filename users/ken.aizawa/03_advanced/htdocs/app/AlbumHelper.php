<?php

namespace App;

class AlbumHelper
{
    public static function albumsToTsvString(array $albums): string
    {
        $result = "id\tname\tnote\ttrack_names\r\n";
        foreach ($albums as $album){
            $trackNames = [];
            $trackId = $album['id'];
            $trackName =$album['name'];
            $trackNote = $album['note'];
            foreach($album['tracks'] as $track){
                $trackNames[] = $track['name'];
            }
            $trackInName = implode(',', $trackNames);
            $result .= $trackId. "\t". $trackName."\t". $trackNote. "\t". $trackInName."\r\n";
        }
        return $result;
    }
}
