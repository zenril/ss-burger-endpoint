<?php

use SilverStripe\ORM\DataObject;

class Ingredient extends DataObject 
{
    private static $db = [
        'Img' => 'Varchar(255)',
        'Key' => 'Varchar(255)'
    ];

    private static $has_one = [
        "Burger" => "Burger"
    ];

}