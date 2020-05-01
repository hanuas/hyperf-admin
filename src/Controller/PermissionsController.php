<?php declare(strict_types=1);

namespace Hanus\Admin\Controller;

use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Middleware;
use Hanus\Admin\Middleware\AuthMiddleware;
use Hanus\Admin\Model\AdminPermission;

/**
 * @Controller(prefix="admin/permissions")
 * @Middleware(AuthMiddleware::class)
 */
class PermissionsController extends AdminController
{

    /**
     * @RequestMapping(path="", methods="get")
     */
    public function index()
    {
        $permissions = AdminPermission::all();
        return $this->render('permiss.index', ['permissions' => $permissions]);
    }
}}