<?php

namespace Avensome\CommonMarkBundle;

use Aptoma\Twig\Extension\MarkdownEngineInterface;
use League\CommonMark\CommonMarkConverter;

class CommonMarkEngine implements MarkdownEngineInterface
{
    const NAME = 'DependencyInjectionCommonMark';

    /** @var CommonMarkConverter */
    private $converter;

    public function __construct(CommonMarkConverter $converter)
    {
        $this->converter = $converter;
    }

    public function transform($content)
    {
        return $this->converter->convertToHtml($content);
    }

    public function getName()
    {
        return self::NAME;
    }
}
