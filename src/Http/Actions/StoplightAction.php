<?php
declare(strict_types=1);

namespace Beauty\OpenApi\Http\Actions;

use Beauty\Http\Request\HttpRequest;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class StoplightAction implements DocumentationActionInterface
{

    public function __invoke(HttpRequest $request): ResponseInterface
    {
        return new Response(200, [
            'Content-Type' => 'text/html',
        ], <<<HTML
        <!doctype html>
        <html lang="en">
          <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Elements in HTML</title>
          
            <script src="https://unpkg.com/@stoplight/elements/web-components.min.js"></script>
            <link rel="stylesheet" href="https://unpkg.com/@stoplight/elements/styles.min.css">
                <style>
                  html, body {
                    height: 100vh;
                    margin: 0;
                    padding: 0;
                    overflow: hidden;
                  }
                  #elements-container {
                    height: 100vh;
                    width: 100vw;
                    display: flex;
                    flex-direction: column;
                  }
                  elements-api {
                    flex: 1 1 auto;
                    min-height: 0;
                  }
                </style>
          </head>
          <body>
            <div id="elements-container">
            <elements-api
              apiDescriptionUrl="/openapi.json"
              router="hash"
              layout="sidebar"
            />
            </div>
            
          </body>
        </html>
        HTML
        );
    }
}