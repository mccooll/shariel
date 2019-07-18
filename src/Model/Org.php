<?php
namespace App\Model;

class Org
{
    private $name;
    private $ceo;
    private $members;

    public function __construct(string $name, ?User $ceo, array $members)
    {
    	$this->name = $name;
    	$this->ceo = $ceo;
    	$this->members = $members;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setMembers($members)
    {
        $this->members = $members;
    }

    public function getMembers()
    {
        return $this->members;
    }

    public function setCeo($user) {
    	$this->ceo = $user;
    }

    public function getCeo() {
    	return $this->ceo;
    }
}