<?php
declare(strict_types=1);

namespace Beauty\OpenApi\Console\Commands;

use Beauty\Cli\CLI;
use Beauty\Cli\Console\AbstractCommand;
use Beauty\OpenApi\Generators\OpenApiGenerator;

class OpenApiGenerate extends AbstractCommand
{
    /**
     * @param OpenApiGenerator $generator
     */
    public function __construct(
        protected OpenApiGenerator $generator,
    )
    {
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return 'openapi:generate';
    }

    /**
     * @return string|null
     */
    public function description(): string|null
    {
        return 'OpenAPI specs generator';
    }

    /**
     * @param array $args
     * @return int
     */
    public function handle(array $args): int
    {
        file_put_contents(base_path('public/openapi.json'), $this->generator->generate());

        return CLI::SUCCESS;
    }
}