<?php

/*
- Список всех постов (главная страница): /posts
- Детальная страница поста /post/{id} (например /post/4 для отображения 4-го поста)
- Список постов пользователя: /user/{id}/posts
- Информация о пользователе: /user/{id}
*/

require_once 'vendor/autoload.php';
require_once 'config/twig.php';
require_once 'config/doctrine.php';

use App\API\PostAddController;
use App\API\PostDeleteController;
use App\Controller\IndexController;
use App\Controller\UserController;
use App\Controller\UserPostsController;
use App\GlobalConfig;
use Aura\Router\RouterContainer;
use App\Controller\PostArchiveController;
use App\Controller\PostSingleController;

$routerContainer = new RouterContainer();

$map = $routerContainer->getMap();

$map->route('blog.read', '/', function () {
    (new IndexController())->render();
});
$map->route('posts.read', '/posts', function ($request) {
    (new PostArchiveController())->render();
});

$map->route('post.read', '/post/{id}', function ($request, $response) {
    $id = (int) $request->getAttribute('id');
    (new PostSingleController($id))->render();
    return $response;
});

$map->route('user.read', '/user/{id}', function ($request, $response) {
    $id = (int) $request->getAttribute('id');
    (new UserController($id))->render();
    return $response;
});

$map->route('user_posts.read', '/user/{id}/posts', function ($request, $response) {
    $id = (int) $request->getAttribute('id');
    (new UserPostsController($id))->render();
    return $response;
});

// AJAX
$map->post('post.add', '/post-create', function () {
    (new PostAddController($_POST))->savePost();
});

$map->post('post.delete', '/post-delete', function () {
    (new PostDeleteController($_POST))->deletePost();
});

$matcher = $routerContainer->getMatcher();

$request = Zend\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

# Psr\Http\Message\ServerRequestInterface $request
$route = $matcher->match($request);

if ($route) {
    # dispatching a route
    # transfer attribute to request
    foreach ($route->attributes as $key => $val) {
        $request = $request->withAttribute($key, $val);
    }

    # get the handler and call handler to process request
    $callable = $route->handler;
    $response = $callable($request, new \Zend\Diactoros\Response);
} else {
    # handling match failure
    // get the first of the best-available non-matched routes
    $failedRoute = $matcher->getFailedRoute();

    // which matching rule failed?
    switch ($failedRoute->failedRule) {
        case 'Aura\Router\Rule\Allows':
            // 405 METHOD NOT ALLOWED
            // Send the $failedRoute->allows as 'Allow:'
            http_response_code(405);
            break;
        case 'Aura\Router\Rule\Accepts':
            // 406 NOT ACCEPTABLE
            http_response_code(406);
            break;
        default:
            // 404 NOT FOUND
            http_response_code(404);
            break;
    }
}
