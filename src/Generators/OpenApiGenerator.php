<?php
declare(strict_types=1);

namespace Beauty\OpenApi\Generators;

use OpenApi\Generator;

class OpenApiGenerator
{
    /**
     * @param Generator $generator
     */
    public function __construct(
        protected Generator $generator,
    )
    {
    }

    /**
     * @return string
     */
    public function generate(): string
    {
        $generator = $this->generator->generate([
            base_path('app'),
            base_path('modules'),
        ]);

        return $generator->toJson(JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}