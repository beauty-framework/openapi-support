<?php
declare(strict_types=1);

namespace Beauty\OpenApi\Http\Controllers;

use Beauty\Core\Router\Route;
use Beauty\Http\Enums\HttpMethodsEnum;
use Beauty\OpenApi\Http\Actions\RedocAction;
use Beauty\OpenApi\Http\Actions\SpecsAction;
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
     * @param RedocAction $action
     * @return ResponseInterface
     */
    #[Route(HttpMethodsEnum::GET, '/docs/api')]
    public function redoc(RedocAction $action): ResponseInterface
    {
        return $action();
    }
}