<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use App\Model\Org;
use App\Model\User;

class OrgController
{
    private function setupOrg() {
        $org = new Org('EP', null, []);
        $user = new User('Dave', $org);
        return $org;
    }

    public function encode(SerializerInterface $serializer)
    {
        return new Response(
            'Encoded: '.htmlspecialchars($serializer->serialize($this->setupOrg(),'json'))
        );
    }

    public function decode(SerializerInterface $serializer)
    {
        $org = $serializer->serialize($this->setupOrg(),'json');
        $org = $serializer->deserialize($org, Org::class, 'json');
        return new Response(
            'Decoded: <pre>'. print_r($org, true)
        );
    }
}