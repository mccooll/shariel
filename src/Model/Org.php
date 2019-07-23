<?php
namespace App\Model;

class Org
{
    private $name;
    private $ceo;
    private $members;
    private $createdAt;

    /**
	 * @param User[] $members Org members
	 */
    public function __construct(string $name, ?User $ceo, array $members = [])
    {
    	$this->name = $name;
    	$this->ceo = $ceo;
    	$this->setMembers($members);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

	/**
	 * @param User[] $members Org members
	 */
    public function setMembers($members)
    {
        $this->members = [];
        foreach($members as $member) {
            $member->setOrg($this);
            $this->members[] = $member;
        }
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

    public function setCreatedAt(\DateTime $date) {
    	$this->createdAt = $date;
    }

    public function getCreatedAt(): \DateTime {
    	return $this->createdAt;
    }
}