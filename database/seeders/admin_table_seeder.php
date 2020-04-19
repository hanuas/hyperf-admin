<?php declare (strict_types=1);

use Hyperf\Database\Seeders\Seeder;
use Illuminate\Hashing\BcryptHasher;
use Oyhdd\Admin\Model\{AdminUser, AdminRole, AdminRoleMenu, AdminRolePermission, AdminPermission, AdminMenu, AdminRoleUser};

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hash = new BcryptHasher();

        // create a user.
        AdminUser::truncate();
        AdminUser::create([
            'username' => 'admin',
            'password' => $hash->make('123456'),
            'name'     => 'Administrator',
            'avatar'   => '/vendor/hyperf-admin/AdminLTE/dist/img/user2-160x160.jpg',
        ]);

        // create a role.
        AdminRole::truncate();
        AdminRole::create([
            'name' => 'Administrator',
            'slug' => 'administrator',
        ]);

        // add role to user.
        AdminRoleUser::truncate();
        AdminRoleUser::create([
            'role_id' => 1,
            'user_id' => 1,
        ]);

        //create a permission
        AdminPermission::truncate();
        AdminPermission::insert([
            [
                'name'        => 'All permission',
                'slug'        => '*',
                'http_method' => '',
                'http_path'   => '*',
            ],
            [
                'name'        => 'Dashboard',
                'slug'        => 'dashboard',
                'http_method' => 'GET',
                'http_path'   => '/admin',
            ],
            [
                'name'        => 'Login',
                'slug'        => 'auth.login',
                'http_method' => '',
                'http_path'   => "/admin/user/login\r\n/admin/user/logout",
            ],
            [
                'name'        => 'User setting',
                'slug'        => 'auth.setting',
                'http_method' => 'GET,PUT',
                'http_path'   => '/admin/user/setting',
            ],
            [
                'name'        => 'Auth management',
                'slug'        => 'auth.management',
                'http_method' => '',
                'http_path'   => "/admin/roles\r\n/admin/permissions\r\n/admin/menu\r\n/admin/logs",
            ],
        ]);

        //add role to permission.
        AdminRolePermission::truncate();
        AdminRolePermission::insert([
            'role_id'       => 1,
            'permission_id' => 1,
        ]);

        // add default menus.
        AdminMenu::truncate();
        AdminMenu::insert([
            [
                'parent_id' => 0,
                'order'     => 1,
                'title'     => '首页',
                'icon'      => 'fa-tachometer-alt',
                'uri'       => '/admin',
            ],
            [
                'parent_id' => 0,
                'order'     => 2,
                'title'     => '系统管理',
                'icon'      => 'fa-tasks',
                'uri'       => '',
            ],
            [
                'parent_id' => 2,
                'order'     => 3,
                'title'     => '用户管理',
                'icon'      => 'fa-users',
                'uri'       => '/admin/users',
            ],
            [
                'parent_id' => 2,
                'order'     => 4,
                'title'     => '角色管理',
                'icon'      => 'fa-user',
                'uri'       => '/admin/roles',
            ],
            [
                'parent_id' => 2,
                'order'     => 5,
                'title'     => '权限管理',
                'icon'      => 'fa-ban',
                'uri'       => '/admin/permissions',
            ],
            [
                'parent_id' => 2,
                'order'     => 6,
                'title'     => '菜单管理',
                'icon'      => 'fa-bars',
                'uri'       => '/admin/menu',
            ],
            [
                'parent_id' => 2,
                'order'     => 7,
                'title'     => '操作记录',
                'icon'      => 'fa-history',
                'uri'       => '/admin/logs',
            ],
        ]);

        // add role to menu.
        AdminRoleMenu::truncate();
        AdminRoleMenu::create([
            'role_id' => 1,
            'menu_id' => 2,
        ]);

    }
}
