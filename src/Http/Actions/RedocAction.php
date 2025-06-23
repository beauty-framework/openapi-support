<?php
declare(strict_types=1);

namespace Beauty\OpenApi\Http\Actions;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;

class RedocAction
{
    /**
     * @return ResponseInterface
     */
    public function __invoke(): ResponseInterface
    {
        return new Response(200, [
            'Content-Type' => 'text/html',
        ],
            <<<HTML
            <!DOCTYPE html>
            <html>
              <head>
                <title>Redoc</title>
                <!-- needed for adaptive design -->
                <meta charset="utf-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700|Roboto:300,400,700" rel="stylesheet">
            
                <!--
                Redoc doesn't change outer page styles
                -->
                <style>
                  body {
                    margin: 0;
                    padding: 0;
                  }
                </style>
              </head>
              <body>
                <redoc spec-url='/openapi.json'></redoc>
                <script src="https://cdn.redoc.ly/redoc/latest/bundles/redoc.standalone.js"> </script>
              </body>
            </html>
            HTML

        );
    }
}