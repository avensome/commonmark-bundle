<?php

namespace Avensome\CommonMarkBundle;

use Avensome\CommonMarkBundle\DependencyInjection\Compiler\CommonMarkExtensionPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class AvensomeCommonMarkBundle extends Bundle
{
    public function build(ContainerBuilder $containerBuilder)
    {
        parent::build($containerBuilder);
        $containerBuilder->addCompilerPass(new CommonMarkExtensionPass());
    }
}
