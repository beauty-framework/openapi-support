<?php
declare(strict_types=1);

namespace Beauty\OpenApi\Http\Actions;

use Beauty\Http\Request\HttpRequest;
use Psr\Http\Message\ResponseInterface;

interface DocumentationActionInterface
{
    /**
     * @param HttpRequest $request
     * @return ResponseInterface
     */
    public function __invoke(HttpRequest $request): ResponseInterface;
}