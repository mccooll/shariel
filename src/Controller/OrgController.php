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
        $users = [];
        $users[] = $user;
        $users[] = new User('Simon', $org);
        $users[] = new User('Teba', $org);
        $org->setMembers($users);
        return $org;
    }

    public function encode(SerializerInterface $serializer)
    {
        return new Response(
            'Encoded: '.htmlspecialchars(
                $serializer->serialize(
                    $this->setupOrg(),
                    'json',
                    [
                        'circular_reference_handler' => function ($object) {
                            return $object->getName();
                        }
                    ]
                )
            )
        );
    }

    public function decode(SerializerInterface $serializer)
    {
        $org = $serializer->serialize(
                    $this->setupOrg(),
                    'json',
                    [
                        'circular_reference_handler' => function ($object) {
                            return $object->getName();
                        }
                    ]
                );
        $org = $serializer->deserialize($org, Org::class, 'json');
        return new Response(
            'Decoded: <pre>'. print_r($org, true)
        );
    }
}