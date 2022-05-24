<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    use SoftDeletes;

    #Tạo relationship với bảng ProductImage (one to many)
    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }

    #Tạo relationship với bảng tags (many to many)
    public function tags(){
        return $this
            ->belongsToMany(Tag::class,'product_tags','product_id','tag_id')
            ->withTimestamps();
    }

    #Tạo relationship với bảng category (one to many)
    public function category(){
        return $this->belongsTo(Category::class,'category_id' );
    }

    #Search
    public function getProductSearch($request)
    {
        DB::connection()->enableQueryLog();
        $products = new Product();
        if (!empty($request->product_id)) {
            $products = $products->where('products.id', $request->product_id);
        }
        if (!empty($request->name)) {
            $products = $products->where('products.name', 'like', '%' . $request->name . '%');
        }
        if (!empty($request->category_id)) {
            $products = $products->where('products.category_id', $request->category_id);
        }
        $products = $products
            ->groupBy('products.id')
            ->select('products.*')
            ->latest('products.created_at')
            ->paginate(5);
        $queries=DB::getQueryLog();
        return $products;
    }

}
