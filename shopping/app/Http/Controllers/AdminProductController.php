<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class AdminProductController extends Controller
{
    use DeleteModelTrait;
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    public function __construct(Category $category,Product $product,ProductImage $productImage,Tag $tag,ProductTag $productTag){
        $this->category=$category;
        $this->product=$product;
        $this->productImage=$productImage;
        $this->tag=$tag;
        $this->productTag=$productTag;
    }

    public function index(){
        $products=$this->product->latest()->paginate(5);
        return view('admin.product.index',compact('products'));
    }
    public function search(Request $request){
        $products=$this->product->getProductSearch($request);
        return view('admin.product.index',compact('products'));
    }
    public function create(){
        $htmlOption=$this->getCategory($parentId='');
        return view('admin.product.add',compact('htmlOption'));
    }
    #Lấy ra danh sách các category
    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function store(ProductAddRequest $request){

        try{
            DB::beginTransaction();
            $dataProductCreate=[
                'name'=>$request->name,
                'price'=>$request->price,
                'content'=>$request->contents,
                'user_id'=>auth()->id(),
                'category_id'=>$request->category_id
            ];
            $dataUploadFeatureImage=$this->storageTraitUpload($request,'feature_image_path','product_image');
            if(!empty($dataUploadFeatureImage)){
                $dataProductCreate['feature_image_name']=$dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path']=$dataUploadFeatureImage['file_path'];
            }
            $product=$this->product->create($dataProductCreate);


            #Insert data to product_images
            if($request->hasFile('image_path')){
                foreach ($request->image_path as $fileItem){
                    $dataProductImageDetail=$this->storageTraitUploadMultiple($fileItem,'product_image');
                    $product->images()->create([
                        'product_id'=>$product->id,
                        'image_path'=>$dataProductImageDetail['file_path'],
                        'image_name'=>$dataProductImageDetail['file_name']
                    ]);
                }
            }

            #Insert tags for product
            if(!empty($request->tags)){
                foreach ($request->tags as $tagItem){
                    # Insert data to tags and product_tags
                    # phương thức firstOrCreate để nếu có tag này trong database rồi thì chỉ insert thêm dữ liệu mới vào chứ không tạo thêm tags mới
                    $tagInstance=$this->tag->firstOrCreate(['name'=>$tagItem]);
                    $tagIds[]=$tagInstance->id;
                }
            }
            $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('product.index');

        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('message' . $exception->getMessage(). '  line' .$exception->getLine());
        }
    }
    public function edit($id){
        $product=$this->product->find($id);
        $htmlOption=$this->getCategory($product->category_id);
        return view('admin.product.edit',compact('htmlOption','product'));
    }
    public function update($id,Request $request){
        try{
            DB::beginTransaction();
            $dataProductUpdate=[
                'name'=>$request->name,
                'price'=>$request->price,
                'content'=>$request->contents,
                'user_id'=>auth()->id(),
                'category_id'=>$request->category_id
            ];
            $dataUploadFeatureImage=$this->storageTraitUpload($request,'feature_image_path','product_image');
            if(!empty($dataUploadFeatureImage)){
                $dataProductUpdate['feature_image_name']=$dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path']=$dataUploadFeatureImage['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product=$this->product->find($id);

            #Insert data to product_images
            if($request->hasFile('image_path')){
                $this->productImage->where('product_id',$id)->delete();
                foreach ($request->image_path as $fileItem){
                    $dataProductImageDetail=$this->storageTraitUploadMultiple($fileItem,'product_image');
                    $product->images()->create([
                        'product_id'=>$product->id,
                        'image_path'=>$dataProductImageDetail['file_path'],
                        'image_name'=>$dataProductImageDetail['file_name']
                    ]);
                }
            }

            #Insert tags for product
            if(!empty($request->tags)){
                foreach ($request->tags as $tagItem){
                    # Insert data to tags and product_tags
                    # phương thức firstOrCreate để nếu có tag này trong database rồi thì chỉ insert thêm dữ liệu mới vào chứ không tạo thêm tags mới
                    $tagInstance=$this->tag->firstOrCreate(['name'=>$tagItem]);
                    $tagIds[]=$tagInstance->id;
                }
            }
            $product->tags()->sync($tagIds);
            DB::commit();
            return redirect()->route('product.index');

        }catch (\Exception $exception){
            DB::rollBack();
            Log::error('message' . $exception->getMessage(). '  line' .$exception->getLine());
        }
    }
    public function delete($id){
        return $this->deleteModelTrait($id,$this->product);
    }
}
