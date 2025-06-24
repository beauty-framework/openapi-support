<?php
declare(strict_types=1);

namespace Beauty\OpenApi\Http\Actions;

use Beauty\Http\Request\HttpRequest;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class SwaggerAction implements DocumentationActionInterface
{
    /**
     * @param HttpRequest $request
     * @return ResponseInterface
     */
    public function __invoke(HttpRequest $request): ResponseInterface
    {
        return new Response(200, [
            'Content-Type' => 'text/html',
        ],
        <<<HTML
        <!DOCTYPE html>
        <html>
          <head>
            <title>Swagger UI</title>
            <link rel="stylesheet" href="https://unpkg.com/swagger-ui-dist/swagger-ui.css" />
          </head>
          <body>
            <div id="swagger-ui"></div>
            <script src="https://unpkg.com/swagger-ui-dist/swagger-ui-bundle.js"></script>
            <script>
              SwaggerUIBundle({
                url: '/openapi.json',
                dom_id: '#swagger-ui',
              });
            </script>
          </body>
        </html>
        HTML

        );
    }
}