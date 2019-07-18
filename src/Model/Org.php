<?php
namespace App\Model;

class Org
{
    private $name;
    private $ceo;
    private $members;

    public function __construct(string $name, User $ceo, User[] $members)
    {
    	$this->name = $name;
    	$this->ceo = $ceo;
    	$this->members = $members;
    }
}