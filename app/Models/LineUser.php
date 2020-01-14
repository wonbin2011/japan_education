<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;


class LineUser extends Authenticatable
{
    use Notifiable;
    use HasApiTokens;

    protected $table = "line_users";
    protected $models = [Student::class, Teacher::class];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * 获取登录的角色 学生还是 老师
     * todo: 在注册端控制email 应用中唯一，这里还应该判断
    */
    public function findLoginRole($username) {
        foreach ($this->models as $model) {
            $user = (new $model)->where('email', '=', $username)
                        ->first();
            if ($user) return $user;
        }
        return;
    }
}
