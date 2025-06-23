# Beauty OpenAPI

Modern OpenAPI 3 integration for [beauty-framework](https://github.com/beauty-framework) powered by [swagger-php](https://github.com/zircote/swagger-php) and beautiful Redoc UI out of the box.

## Features

* ⚡️ PSR-7 compatible
* 🍰 Attribute-based OpenAPI documentation (PHP 8.1+)
* 🛠 Easy integration in your project
* 🚀 Out-of-the-box routes for OpenAPI spec and Redoc UI
* 💾 CLI command for static spec generation

## Installation

Require via composer:

```bash
composer require beauty-framework/openapi-suport
```

**Requirements:**

* PHP >=8.1
* beauty-framework/cli ^1.0 (for CLI integration)
* zircote/swagger-php ^5.1 (OpenAPI generator)

**Dev Requirements (for testing):**

* phpunit/phpunit ^12.3
* psr/container ^2.0

## Quick Start

1. **Create your API controller inheriting from `BaseOpenApiController`:**

```php
namespace App\Controllers;

use Beauty\OpenApi\Http\Controllers\BaseOpenApiController;
use OpenApi\Attributes as OAT;

#[OAT\OpenApi(openapi: OAT\OpenApi::VERSION_3_1_0, security: [['bearerAuth' => []]])]
#[OAT\Info(
    version: '1.0.0',
    title: 'Basic single file API',
    attachables: [new OAT\Attachable()]
)]
#[OAT\License(name: 'MIT', identifier: 'MIT')]
#[OAT\Server(url: 'https://localhost/', description: 'API server')]
#[OAT\SecurityScheme(securityScheme: 'bearerAuth', type: 'http', scheme: 'bearer', description: 'Basic Auth')]
#[OAT\Tag(name: 'products', description: 'All about products')]
#[OAT\Tag(name: 'catalog', description: 'Catalog API')]
class ApiController extends BaseOpenApiController
{
    // Everything works out of the box!
}
```

2. **Annotate your endpoints and models using [swagger-php attributes](https://github.com/zircote/swagger-php/blob/master/Examples/Attributes/README.md):**

```php
use OpenApi\Attributes as OAT;

#[OAT\Get(path: '/products', tags: ['products'], ...)]
#[Route(method: HttpMethodsEnum::GET, path: '/products')]
public function listProducts() { ... }
```

3. **Register console commands (optional, for static generation):**

Add to `config/commands.php`:

```php
return array_merge(
    // ...
    \Beauty\OpenApi\Console\RegisterCommands::commands(),
    // ...
);
```

4. **Access your docs at:**

* `/openapi.json` for raw spec
* `/docs/api` for interactive Redoc UI
* You can also provide your own action classes (see SpecsAction and RedocAction) if you want to use custom logic for rendering the spec or documentation page. Just typehint your custom action classes in your controller methods.
Example:
```php
  #[Route(method: HttpMethodsEnum::GET, path: '/products')]
  public function openApiJson(MyCustomSpecsAction $action): ResponseInterface
  {
    return $action();
  }
```
* This gives you full control over how the OpenAPI spec and documentation UI are served.

## Customization

* Override `redoc()` or `openApiJson()` methods in your controller to change the output.
* Redoc page can be replaced or extended as needed.

## How it works

* At runtime, `SpecsAction` uses `OpenApiGenerator` to scan your codebase and build the OpenAPI spec.
* `RedocAction` renders a simple Redoc UI page pointing to your `/openapi.json`.
* For production, you can pre-generate the spec and serve it as a static file for performance.

## Advanced: Static Generation

You can generate the spec as a file using the CLI command:

```bash
php ./beauty openapi:generate
```

This allows serving the OpenAPI spec statically in production.

## Under the Hood

* Built on [zircote/swagger-php](https://github.com/zircote/swagger-php) — the de-facto OpenAPI generator for PHP.
* Fully compatible with beauty/http responses.

## Limitations & Tips

* **Static vs. Dynamic:** If you have a static `/public/openapi.json`, RoadRunner will serve it as a file instead of going through the controller. Remove the file if you want dynamic generation.
* **Performance:** Generating the spec dynamically on every request can be slow on large projects. Consider using static generation for production.
* **Customization:** For advanced Redoc pages, simply override the `redoc()` method.

## Links

* [swagger-php documentation](https://github.com/zircote/swagger-php)
* [OpenAPI Specification](https://swagger.io/specification/)
* [Redoc Documentation](https://redocly.com/docs/redoc/)

## License

MIT

