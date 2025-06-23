<?php
declare(strict_types=1);

namespace Beauty\OpenApi\Http\Actions;

use Beauty\Http\Response\JsonResponse;
use Beauty\OpenApi\Generators\OpenApiGenerator;
use Psr\Http\Message\ResponseInterface;

class SpecsAction
{
    /**
     * @param OpenApiGenerator $generator
     */
    public function __construct(
        private OpenApiGenerator $generator,
    )
    {

    }

    /**
     * @return ResponseInterface
     */
    public function __invoke(): ResponseInterface
    {
        return new JsonResponse(200,
            json_decode($this->generator->generate(), true),
        );
    }
}