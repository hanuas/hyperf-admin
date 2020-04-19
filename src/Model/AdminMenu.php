<?php declare (strict_types=1);

namespace Oyhdd\Admin\Model;

use Hyperf\Database\Model\Relations\BelongsToMany;
use Oyhdd\Admin\Model\AdminRole;
use Illuminate\Support\Arr;

/**
 * @property int $id 
 * @property int $parent_id 
 * @property int $order 
 * @property string $title 
 * @property string $icon 
 * @property string $uri 
 * @property string $permission 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 */
class AdminMenu extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin_menu';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'parent_id' => 'integer', 'order' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];

    protected $hidden = [
        'password'
    ];

    /**
     * A Menu belongs to many roles.
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(AdminRole::class, 'admin_role_menu', 'menu_id', 'role_id');
    }

    /**
     * Left sider-bar menu.
     *
     * @param  string   $uri
     * @return array
     */
    public static function getMenuTree(string $uri = ''): array
    {
        $tree = [];
        $items = AdminMenu::all()->toArray();
        if (empty($items)) {
            return $tree;
        }

        $items = array_column($items, null, 'id');
        foreach ($items as $id => $item) {
            $items[$id]['active'] = false;
            if ($uri == $item['uri']) {
                $items[$id]['active'] = true;
            }
            if (isset($items[$item['parent_id']])) {
                if ($items[$id]['active']) {
                    $items[$item['parent_id']]['active'] = true;
                }
                $items[$item['parent_id']]['children'][] = &$items[$id];
            } else {
                $tree[] = &$items[$id];
            }
        }

        return $tree;
    }
}