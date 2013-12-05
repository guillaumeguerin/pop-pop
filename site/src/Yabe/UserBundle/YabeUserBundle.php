<?php

namespace Yabe\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class YabeUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
