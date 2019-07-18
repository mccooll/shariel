<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use App\Model\Org;

class OrgController
{
    public function encode()
    {
        return new Response(
            'Encoded:'
        );
    }

    public function decode()
    {
        return new Response(
            'Decoded:'
        );
    }
}