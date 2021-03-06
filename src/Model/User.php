<?php
namespace App\Model;

class User
{
    private $name;
    private $org;

    public function __construct(string $name, $org)
    {
    	$this->name = $name;
    	$this->org = $org;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setOrg($org)
    {
        $this->org = $org;
    }

    public function getOrg()
    {
        return $this->org;
    }
}