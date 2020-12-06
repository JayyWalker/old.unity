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
            $fileInfo = new \SplFileInfo($filepath);
            $filename = substr($fileInfo->getFilename(), 0, -4);

            $definitions[$filename] = Yaml::parseFile($filepath);
        }

        return $definitions;
    }
}
