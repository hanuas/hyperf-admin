<?php declare(strict_types=1);

namespace Oyhdd\Admin\Controller;

use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Middleware;
use Oyhdd\Admin\Middleware\AuthMiddleware;

/**
 * @Controller(prefix="admin/menu")
 * @Middleware(AuthMiddleware::class)
 */
class MenuController extends AdminController
{

    /**
     * @RequestMapping(path="", methods="get")
     */
    public function index()
    {
        return $this->render('menu.index');
    }
}