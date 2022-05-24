<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $guarded = [];

    #Tạo relationship với bảng Role(one to many )
    #function này để lấy ra parent_id ở bảng permissions
    public function permissionChildren(){
        return $this->hasMany(Permission::class,'parent_id');
    }
}
