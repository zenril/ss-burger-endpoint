<?php

use SilverStripe\ORM\DataObject;

class Burger extends DataObject 
{
    private static $db = [
        'Name' => 'Varchar(255)',
    ];

    private static $has_one = [];

    private static $belongs_to = [
        'Streamer' => 'Streamer.Burger'
    ];

    private static $has_many = [
        "Ingredients" => "Ingredient"
    ];
    
}