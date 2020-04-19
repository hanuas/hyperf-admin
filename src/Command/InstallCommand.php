<?php declare(strict_types=1);

namespace Oyhdd\Admin\Command;

use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Command\Annotation\Command;
use Psr\Container\ContainerInterface;
use Hyperf\Utils\Filesystem\Filesystem;
use Oyhdd\Admin\Model\AdminTableSeeder;

/**
 * @Command
 */
class InstallCommand extends HyperfCommand
{
    protected $directory = 'app/Admin';

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var Filesystem
     */
    protected $fileSystem;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->fileSystem = $container->get(Filesystem::class);

        parent::__construct('admin:install');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('Hyperf Admin Install Command');
    }

    public function handle()
    {
        $this->line('');

        $this->initAdminDirectory();
        $this->publishResource();
    }

    /**
     * Initialize the Admin directory.
     *
     * @return void
     */
    protected function initAdminDirectory()
    {
        if (is_dir($this->directory)) {
            // return $this->line("<error>{$this->directory} directory already exists !</error> ");
        }

        $this->fileSystem->makeDirectory($this->directory, 0755, true, true);
        $this->fileSystem->makeDirectory($this->directory."/Controller", 0755, true, true);
        $this->fileSystem->makeDirectory($this->directory."/View", 0755, true, true);

        $this->createHomeController();

        $this->line('<info>Admin directory was created:</info> '. $this->directory);
    }

    /**
     * Publish resource
     */
    public function publishResource()
    {
        $this->call('vendor:publish', ['package' => 'oyhdd/hyperf-admin']);

        if (empty(config('session'))) {
            $this->call('vendor:publish', ['package' => 'hyperf/session']);
        }
        if (empty(config('view'))) {
            $this->call('vendor:publish', ['package' => 'hyperf/view']);
        }
        if (empty(config('translation'))) {
            $this->call('vendor:publish', ['package' => 'hyperf/translation']);
        }
        if (empty(config('jwt'))) {
            $this->call('vendor:publish', ['package' => 'phper666/jwt-auth']);
        }
        $this->fileSystem->copyDirectory(dirname(dirname(__DIR__)). '/resource/assets', BASE_PATH. '/public/vendor/hyperf-admin');
        $this->fileSystem->copyDirectory(dirname(dirname(__DIR__)). '/resource/languages', config('translation.path', BASE_PATH . '/storage/languages'));

        if (!is_dir($this->directory."/View")) {
            $this->fileSystem->makeDirectory($this->directory."/View");
        }
        $this->fileSystem->copyDirectory(dirname(dirname(__DIR__)). '/resource/view', $this->directory."/View");

        $this->call('migrate', ['--path' => './vendor/oyhdd/hyperf-admin/database/migrations/']);
        $this->call('db:seed', ['--path' => './vendor/oyhdd/hyperf-admin/database/seeders/']);
    }

    /**
     * Create HomeController.
     *
     * @return void
     */
    public function createHomeController()
    {
        $homeController = $this->directory.'/Controller/HomeController.php';
        $contents = $this->fileSystem->get(__DIR__."/stubs/HomeController.stub");

        $this->fileSystem->put(
            $homeController,
            str_replace('TempNamespace', config('admin.route.namespace'), $contents)
        );
    }

}
