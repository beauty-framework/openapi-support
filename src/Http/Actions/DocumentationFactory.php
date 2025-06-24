<?php
declare(strict_types=1);

namespace Beauty\OpenApi\Http\Actions;

use Beauty\OpenApi\Http\Actions\Enums\DocumentationProviderEnum;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

final class DocumentationFactory
{
    /**
     * @param string $mode
     * @return DocumentationActionInterface
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public static function create(string $mode): DocumentationActionInterface
    {
        return match (DocumentationProviderEnum::tryFrom($mode)) {
            DocumentationProviderEnum::Swagger => container()->get(SwaggerAction::class),
            DocumentationProviderEnum::Redoc => container()->get(RedocAction::class),
            DocumentationProviderEnum::Rapid => container()->get(RapidAction::class),
            DocumentationProviderEnum::Stoplight => container()->get(StoplightAction::class),
            default => container()->get(StoplightAction::class),
        };
    }
}