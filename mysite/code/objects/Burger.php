<?php

use SilverStripe\ORM\DataObject;

class Burger extends DataObject 
{
    private static $db = [
        'Name' => 'Varchar(255)',
    ];

    private static $has_one = [
        "Streamer" => "Streamer"
    ];

    private static $has_many = [
        "Ingredients" => "Ingredient"
    ];

    private static $defaults = [
        "Name" => 'aa',
    ];

    public function aa(){
        return "asdasddasd";
    }
    
}