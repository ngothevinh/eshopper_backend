<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded=[];

    #Tạo relationship với bảng Permission(many to many),bảng trung gian là bảng role_permission
    public function permissions(){
        return $this->belongsToMany(Permission::class,'role_permission','role_id','permission_id');
    }

}
