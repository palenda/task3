<?php

namespace app\core;

class Router
{
    public Request $request;
    public Response $response;
    public View $view;
    protected array $routes = [];

    /**
     * @param Request $request
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

      public function resolve()
      {
          $path = $this->request->getPath();
          $method = $this->request->getMethod();
          $callback = $this->routes[$method][$path] ?? false;
          if ($callback === false) {
              $this->response->setStatusCode(404);
              return $this->view->render('_404');
          }

          if (is_array($callback)) {
              Application::$app->controller = new $callback[0]();
              $callback[0] = new Application::$app->controller();
          }
          return call_user_func($callback, $this->request);
      }
}
