<?php
require("vendor/autoload.php");
$app = new App\App;
$container = $app->getContainer();

$container["config"] = function () {
  return [
    "db_driver" => "mysql",
    "db_host" => "localhost",
    "db_name" => "test",
    "db_user" => "root",
    "db_password" => ""
  ];
};

$container["db"] = function ($c) {
  return new PDO(
    "{$c->config['db_driver']}:host={$c->config['db_host']};dbname={$c->config['db_name']}",
    $c->config['db_user'],
    $c->config['db_password']
  );
};

$app->get("/", function () {
  echo "homepage";
});
$app->run();
