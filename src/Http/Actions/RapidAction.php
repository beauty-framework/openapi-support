<?php
declare(strict_types=1);

namespace Beauty\OpenApi\Http\Actions;

use Beauty\Http\Request\HttpRequest;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class RapidAction implements DocumentationActionInterface
{

    public function __invoke(HttpRequest $request): ResponseInterface
    {
        return new Response(200, [
            'Content-Type' => 'text/html',
        ],
        <<<HTML
        <!doctype html> <!-- Important: must specify -->
        <html>
          <head>
            <meta charset="utf-8"> <!-- Important: rapi-doc uses utf8 characters -->
            <script type="module" src="https://unpkg.com/rapidoc/dist/rapidoc-min.js"></script>
          </head>
          <body>
            <rapi-doc spec-url = "/openapi.json"> </rapi-doc>
          </body>
        </html>
        HTML

        );
    }
}