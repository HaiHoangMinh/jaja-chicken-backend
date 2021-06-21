<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Category;
use App\Product;
use App\ProductImage;
use App\ProductTag;
use App\Tag;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminProductController extends Controller
{
    private $category;
    private $product;
    private $productImage;
    private $tags;
    private $productTag;
    use StorageImageTrait;
    public function __construct(Category $category, Product $product,ProductImage $productImage,Tag $tags,ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tags = $tags;
        $this->$productTag = $productTag;
    }
    public function index() // Hien thi san pham
    {
        $products = $this->product->paginate(5); // Phan trang paginate hien thi (su dung latest() de hien thi theo time insert)
        return view('admin.product.index', compact('products')); // compact: truyen data sang view
    }
    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function create()
    {
        $htmlOption = $this->getCategory($parentId='');
        return view('admin.product.add', compact('htmlOption'));
    }

    
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->content,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id
    
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request,'feature_image_path','product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $product = $this->product->create($dataProductCreate);
            // insert data to product image
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    // tao phuong thuc upload nhieu file
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem,'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                        
                    ]);
                    
                }
    
            }
            // Insert product tags
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tags->firstOrCreate(['name'=>$tagItem]);
                    $tagIds[] = $tagInstance->id; // Lay tag_id tu data insert  
                }
            }
            $product->tags()->attach($tagIds); // Laravel eloquent relationships ManyToMany
            DB::commit(); // Up du lien len db
            return redirect()->route('products.index');
        } catch (\Exception $ex) {
            DB::rollBack(); // Backup lai du lieu khi co loi
            Log::error('Message'.$ex->getMessage().'Line: ' . $ex->getLine());
        }
        
        }
    public function edit($id){
        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        return view('admin.product.edit', compact('htmlOption','product'));
    }
    public function update(Request $request, $id){
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->content,
                'user_id' => auth()->id(),
                'category_id' => $request->category_id
    
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request,'feature_image_path','product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product =  $this->product->find($id);
            // insert data to product image
            if ($request->hasFile('image_path')) {
                $this->productImage->where('product_id',$id)->delete();
                foreach ($request->image_path as $fileItem) {
                    // tao phuong thuc upload nhieu file
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem,'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']
                        
                    ]);
                    
                }
    
            }
            // Insert product tags
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tags->firstOrCreate(['name'=>$tagItem]);
                    $tagIds[] = $tagInstance->id; // Lay tag_id tu data insert  
                }
            }
            $product->tags()->sync($tagIds); // Laravel eloquent relationships ManyToMany
            DB::commit(); // Up du lien len db
            return redirect()->route('products.index');
        } catch (\Exception $ex) {
            DB::rollBack(); // Backup lai du lieu khi co loi
            Log::error('Message'.$ex->getMessage().'Line: ' . $ex->getLine());
        }
    }
}