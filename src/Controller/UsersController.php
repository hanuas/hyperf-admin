<?php declare(strict_types=1);

namespace Hanus\Admin\Controller;

use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Middleware;
use Hanus\Admin\Middleware\AuthMiddleware;
use Hanus\Admin\Model\AdminUser;

/**
 * @Controller(prefix="admin/users")
 * @Middleware(AuthMiddleware::class)
 */
class UsersController extends AdminController
{

    /**
     * @RequestMapping(path="", methods="get")
     */
    public function index()
    {
        $users = AdminUser::all();
        return $this->render('user.index', ['users' => $users]);
    }
}