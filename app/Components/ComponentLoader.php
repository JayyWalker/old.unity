<?php

declare(strict_types=1);

namespace App\Components;

use Symfony\Component\Yaml\Yaml;

class ComponentLoader
{
    public function getComponentsDefinitions ()
    {
        $definitions = [];

        $definitionFiles = glob(
            __DIR__ . '/../../component-definitions/*'
        );

        foreach ($definitionFiles as $filepath) {
            $definitions[] = Yaml::parseFile($filepath);
        }

        return $definitions;
    }
}
