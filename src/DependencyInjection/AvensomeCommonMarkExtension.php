<?php

namespace Avensome\CommonMarkBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class AvensomeCommonMarkExtension extends Extension
{
    /**
     * @param array $configs
     * @param ContainerBuilder $containerBuilder
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $containerBuilder)
    {
        $loader = new YamlFileLoader($containerBuilder, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $converterFactoryDefinition = $containerBuilder->findDefinition('Avensome\CommonMarkBundle\ConverterFactory');
        $converterFactoryDefinition->addMethodCall('setConfig', [$config['converter_config']]);
    }
}
