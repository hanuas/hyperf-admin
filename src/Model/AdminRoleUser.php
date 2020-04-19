<?php declare (strict_types=1);

namespace Oyhdd\Admin\Model;

/**
 * @property int $role_id 
 * @property int $permission_id 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 */
class AdminRoleUser extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin_role_users';
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
    protected $casts = ['role_id' => 'integer', 'permission_id' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}