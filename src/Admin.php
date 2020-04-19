<?php declare(strict_types=1);

namespace Oyhdd\Admin;

/**
 * Class Admin.
 */
class Admin
{

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public static function user()
    {
        $user = new \stdClass();
        $user->avatar = '/assets/adminLTE/plugins/adminLTE/img/user2-160x160.jpg';
        $user->name = 'Eric';
        return $user;
    }
}
