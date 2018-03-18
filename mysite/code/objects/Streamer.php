<?php

use SilverStripe\ORM\DataObject;

class Streamer extends DataObject 
{
    private static $db = [
        'Name' => 'Varchar(255)'
    ];

    private static $has_many = [
        "Burger"
    ];
    

    public static function addOrCreate($streamer) {
        $obj = Streamer::get()->filter([
            'Name' => $streamer
        ]);

        if(!$obj) {
            $obj = Streamer::create();
            $obj->Name = $streamer;
            $obj->write();
        }

        return $obj;

    }

}