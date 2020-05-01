<?php declare(strict_types=1);

namespace Hanus\Admin\Controller;

use Hyperf\HttpServer\Annotation\Controller;
use Hyperf\HttpServer\Annotation\RequestMapping;
use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Annotation\Middleware;
use Hanus\Admin\Middleware\AuthMiddleware;
use Hanus\Admin\Model\AdminOperationLog;

/**
 * @Controller(prefix="admin/logs")
 * @Middleware(AuthMiddleware::class)
 */
class LogController extends AdminController
{

    /**
     * @RequestMapping(path="", methods="get")
     */
    public function index()
    {
        $logs = AdminOperationLog::all();
        return $this->render('logs.index', ['logs' => $logs]);
    }
}