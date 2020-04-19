<?php declare(strict_types=1);

namespace Oyhdd\Admin;

use Oyhdd\Admin\Command\InstallCommand;
use Hyperf\Server\SwooleEvent;
use Hyperf\Framework\Bootstrap\TaskCallback;
use Hyperf\Framework\Bootstrap\FinishCallback;
use Hyperf\Session\Middleware\SessionMiddleware;
use Oyhdd\Admin\Middleware\VerifyCsrfTokenMiddleware;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            // 合并到 config/autoload/dependencies.php 文件
            'dependencies' => [
            ],
            // 合并到 config/autoload/commands.php 文件
            'commands' => [
                InstallCommand::class,
            ],
            // 合并到 config/autoload/middlewares.php 文件
            'middlewares' => [
                'http' => [
                    SessionMiddleware::class,
                    VerifyCsrfTokenMiddleware::class,
                ],
            ],
            // 合并到 config/autoload/listeners.php 文件
            'listeners' => [],
            // 合并到 config/autoload/server.php 文件
            'server' => [
                'settings' => [
                    // hyperf/task所需相关配置
                    'task_worker_num' => 8,
                    'task_enable_coroutine' => false,

                    // 静态资源
                    'document_root' => BASE_PATH . '/public',
                    'static_handler_locations' => [],
                    'enable_static_handler' => true,
                ],
                'callbacks' => [
                    // hyperf/task所需相关配置
                    SwooleEvent::ON_TASK => [TaskCallback::class, 'onTask'],
                    SwooleEvent::ON_FINISH => [FinishCallback::class, 'onFinish'],
                ],
            ],
            // 合并到 config/autoload/annotations.php 文件
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            // 发布资源文件
            'publish' => [
                [
                    'id' => 'admin',
                    'description' => 'hyperf admin',
                    'source' => __DIR__ . '/../publish/admin.php',
                    'destination' => BASE_PATH . '/config/autoload/admin.php',
                ]
            ],
        ];
    }
}
