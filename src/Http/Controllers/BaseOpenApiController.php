<?php
declare(strict_types=1);

namespace Beauty\OpenApi\Http\Controllers;

use Beauty\Core\Router\Route;
use Beauty\Http\Enums\HttpMethodsEnum;
use Beauty\Http\Request\HttpRequest;
use Beauty\OpenApi\Http\Actions\DocumentationFactory;
use Beauty\OpenApi\Http\Actions\Enums\DocumentationProviderEnum;
use Beauty\OpenApi\Http\Actions\SpecsAction;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseInterface;

abstract class BaseOpenApiController
{
    /**
     * @param SpecsAction $action
     * @return ResponseInterface
     */
    #[Route(HttpMethodsEnum::GET, '/openapi.json')]
    public function openApiJson(SpecsAction $action): ResponseInterface
    {
        return $action();
    }

    /**
     * @param HttpRequest $request
     * @return ResponseInterface
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[Route(HttpMethodsEnum::GET, '/docs/api')]
    public function documentation(HttpRequest $request): ResponseInterface
    {
        $action = DocumentationFactory::create(env('OPENAPI_MODE', DocumentationProviderEnum::Stoplight->value));

        return $action($request);
    }
}