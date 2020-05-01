<?php declare(strict_types=1);

namespace Hanus\Admin\Controller;

use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Middleware;
use Hanus\Admin\Middleware\AuthMiddleware;
use Hanus\Admin\Model\AdminRole;

/**
 * @Controller(prefix="admin/roles")
 * @Middleware(AuthMiddleware::class)
 */
class RoleController extends AdminController
{

    /**
     * @RequestMapping(path="", methods="get")
     */
    public function index()
    {
        $roles = AdminRole::all();
        return $this->render('role.index', ['roles' => $roles]);
    }
}