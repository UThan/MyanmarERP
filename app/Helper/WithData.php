<?php

namespace App\Helper;

trait WithData
{
    public  $categories = ["lrs" => "LRS", "crs" => "CRS"];

    public $gender = ["male" => "Male", "female" => "Female"];

    public $maincharactergender = ['man' => "Man",'woman' => "Woman", 'boy' => "Boy", 'girl' => "Girl", 'both m&w' => "Man & Woman", 'both b&g' => "Boy & Girl"];

    public $rentduration = 14;

    public  $record = [
        5 => '5 records',
        10 => '10 records',
        25 => '25 records',
        50 => '50 records',
    ];
}