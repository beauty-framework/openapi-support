<?php
declare(strict_types=1);

namespace Beauty\OpenApi\Console;

use Beauty\Cli\Console\Contracts\CommandsRegistryInterface;
use Beauty\OpenApi\Console\Commands\OpenApiGenerate;

class RegisterCommands implements CommandsRegistryInterface
{

    /**
     * @return \class-string[]
     */
    public static function commands(): array
    {
        return [
            OpenApiGenerate::class,
        ];
    }
}