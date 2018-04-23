<?php

namespace Avensome\CommonMarkBundle;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;

class ConverterFactory
{
    /** @var Environment */
    private $environment;
    /** @var array */
    private $config;

    public function __construct(Environment $environment)
    {
        $this->environment = $environment;
    }

    public function setConfig(array $config)
    {
        $this->config = $config;
    }

    public function createConverter(): CommonMarkConverter
    {
        return new CommonMarkConverter($this->config, $this->environment);
    }
}
