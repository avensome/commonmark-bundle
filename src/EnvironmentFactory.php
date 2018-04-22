<?php

namespace Avensome\CommonMarkBundle;

use League\CommonMark\Environment;
use League\CommonMark\Extension\ExtensionInterface;

class EnvironmentFactory
{
    /** @var ExtensionInterface[] */
    public $extensions = [];

    public function registerExtension(ExtensionInterface $extension)
    {
        $this->extensions[] = $extension;
    }

    public function create(): Environment
    {
        $environment = Environment::createCommonMarkEnvironment();
        foreach ($this->extensions as $extension) {
            $environment->addExtension($extension);
        }
        return $environment;
    }
}
