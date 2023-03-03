<?php


route('/', function () {
  require ('function.php');
  $Todo->home();
});

route('/add', function () {
  require ('function.php');
  $Todo->add();
});

route('/done', function () {
  require ('function.php');
  $Todo->done();
});

route('/delete', function () {
  require ('function.php');
  $Todo->delete();
});

route('/list', function () {
  require ('function.php');
  $Todo->list();
});

route('/completed', function () {
  require ('function.php');
  $Todo->completed();
});

route('/pending', function () {
  require ('function.php');
  $Todo->pending();
});

function route(string $path, callable $callback) {
  global $routes;
  $routes[$path] = $callback;
}

run();

function run() {
  global $routes;
  $uri = $_SERVER['REQUEST_URI'];
  $found = false;
  foreach ($routes as $path => $callback) {
    if ($path !== $uri) continue;

    $found = true;
    $callback();
  }

  if (!$found) {
    $notFoundCallback = $routes['/404'];
    $notFoundCallback();
  }
}

?>