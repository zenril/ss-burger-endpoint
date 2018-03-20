<?php

use SilverStripe\ORM\DataObject;

class Streamer extends DataObject 
{
    private static $db = [
        'Name' => 'Varchar(255)'
    ];

    private static $has_many = [
        "Burgers" => "Burger"
    ];

    public static function addOrCreate($streamer) {
        $streamer = strtolower($streamer);

        $obj = Streamer::get()->filter([
            'Name' => $streamer
        ])->first();

        if(!$obj) {
            $obj = Streamer::create(["Name" => $streamer]);
            $obj->write();
        }

        return $obj;

    }

}