<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use App\Model\Org;
use App\Model\User;

class OrgController
{
    private function setupOrgs() {
        $orgs = [];
        $org = new Org('EP', null);
        $user = new User('Dave', $org);
        $users = [];
        $users[] = $user;
        $users[] = new User('Simon', $org);
        $users[] = new User('Teba', $org);
        $org->setMembers($users);
        $org->setCreatedAt(new \DateTime());
        $org->setCeo($user);
        $orgs[] = $org;
        $org = new Org('EP', null);
        $user = new User('Steve', $org);
        $users = [];
        $users[] = $user;
        $users[] = new User('Charlotte', $org);
        $users[] = new User('Tim', $org);
        $org->setMembers($users);
        $org->setCreatedAt(new \DateTime());
        $org->setCeo($user);
        $orgs[] = $org;

        return $orgs;
    }

    public function encode(SerializerInterface $serializer)
    {
        return new Response(
            'Encoded: <pre>'.htmlspecialchars(
                $this->prettify(
                    $serializer->serialize(
                        $this->setupOrgs(),
                        'xml',
                        [
                            'circular_reference_handler' => function ($object) {
                                return $object->getName();
                            }
                        ]
                    )
                ,'xml')
            )
        );
    }

    public function decode(SerializerInterface $serializer)
    {
        $org = $serializer->serialize(
                    $this->setupOrgs(),
                    'xml',
                    [
                        'circular_reference_handler' => function ($object) {
                            return $object->getName();
                        }
                    ]
                );
        $org = $serializer->deserialize($org, 'App\Model\Org[]', 'xml');
        return new Response(
            'Decoded: <pre>'. print_r($org, true)
        );
    }

    private function prettify($encoded_content, $type) {
        if ($type==="json") {
            return json_encode(json_decode($encoded_content), JSON_PRETTY_PRINT);
        }
        else if ($type==="xml") {
            $doc = new \DOMDocument();
            $doc->loadXML($encoded_content, LIBXML_COMPACT);
            $doc->formatOutput = true;
            return $doc->saveXML();
        }
        else {
            return $encoded_content;
        }
    }
}