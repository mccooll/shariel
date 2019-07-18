<?php
namespace App\Model;

class User
{
    private $name;
    private $org;

    public function __construct(string $name, Org $org)
    {
    	$this->name = $name;
    	$this->org = $org;
    }
}