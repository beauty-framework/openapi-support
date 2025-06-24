<?php
declare(strict_types=1);

namespace Beauty\OpenApi\Http\Actions\Enums;

enum DocumentationProviderEnum: string
{
    case Swagger = 'swagger';
    case Redoc = 'redoc';
    case Rapid = 'rapid';
    case Stoplight = 'stoplight';
}
