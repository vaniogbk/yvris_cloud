<?php
class Router {
    private array $routes = [];

    public function get(string $path, string $controller, string $method): void {
        $this->routes['GET'][$path] = [$controller, $method];
    }

    public function post(string $path, string $controller, string $method): void {
        $this->routes['POST'][$path] = [$controller, $method];
    }

    public function dispatch(string $uri, string $httpMethod): void {
        $path = parse_url($uri, PHP_URL_PATH);
        $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
        $path = '/' . ltrim(substr($path, strlen($base)), '/');
        $path = $path === '' ? '/' : $path;

        $routes = $this->routes[$httpMethod] ?? [];

        if (isset($routes[$path])) {
            [$controllerName, $action] = $routes[$path];
            $controller = new $controllerName();
            $controller->$action();
            return;
        }

        // Pattern matching for dynamic routes (/admin/users/5)
        foreach ($routes as $route => $handler) {
            $pattern = preg_replace('/\{[^}]+\}/', '([^/]+)', $route);
            if (preg_match('#^' . $pattern . '$#', $path, $matches)) {
                array_shift($matches);
                [$controllerName, $action] = $handler;
                $controller = new $controllerName();
                $controller->$action(...$matches);
                return;
            }
        }

        http_response_code(404);
        include __DIR__ . '/../app/Views/errors/404.php';
    }
}
