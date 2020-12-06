<?php

namespace Tests\Components;

use App\Components\ComponentLoader;
use PHPUnit\Framework\TestCase;

class ComponentLoaderTest extends TestCase
{
    public function testShouldLoadAllComponentDefinitions ()
    {
        $sut = new ComponentLoader;

        $this->assertEquals(
            $sut->getComponentsDefinitions(),
            [
                'full-screen-header' => [
                    'title' => 'Full Screen Header',
                    'name' => 'full-screen-header',
                    'fields' => [
                        [
                            'name' => 'background-image',
                            'label' => 'Background Image',
                            'type' => 'image',
                        ],
                        [
                            'name' => 'title',
                            'label' => 'Title',
                            'type' => 'text',
                        ],
                        [
                            'name' => 'sub-title',
                            'label' => 'Sub Title',
                            'type' => 'text',
                        ],
                    ],
                ]
            ]
        );
    }
}
