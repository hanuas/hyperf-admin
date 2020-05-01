<?php declare(strict_types=1);

namespace Hanus\Admin\Controller;

use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Middleware;
use Hanus\Admin\Middleware\AuthMiddleware;
use Hanus\Admin\Model\AdminMenu;

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
        $menus = AdminMenu::all();
        return $this->render('menu.index', ['menus' => $menus]);
    }
}