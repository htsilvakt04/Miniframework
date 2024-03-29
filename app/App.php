<?php

namespace App;

class App
{
  protected $container;
  public function __construct()
  {
    $this->container = new Container([
      "router" => function () {
        return new Router;
      }
    ]);
  }
  public function getContainer()
  {
    return $this->container;
  }
  public function get($uri,$handler)
  {
    // $this->container->router->addRoute($uri, $handler);
    var_dump($this->container);
  }
  public function run()
  {
    $router = $this->container->router;
    $router->setPath($_SERVER["PATH_INFO"] ?? "/");
    $response = $router->getResponse();

  }

}
