<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Promotion;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Facades\Log;

class AdminPromotionController extends Controller
{
    private $promotion;
    use StorageImageTrait;
    public function __construct(Promotion $promotion)
    {
        $this->promotion = $promotion;
    }
    public function index() // Hien thi san pham
    {
        $promotions = $this->promotion->latest()->paginate(10); // Phan trang paginate hien thi (su dung latest() de hien thi theo time insert)
        return view('admin.promotion.index', compact('promotions')); // compact: truyen data sang view
    }
    
    public function create()
    {
        $banners = DB::table('sliders')->get();
        return view('admin.promotion.add',compact('banners'));
    }

    
    public function store(Request $request)
    {
        $datapromotionCreate = [
            'title' => $request->title,
            'desc' => $request->desc,
            'content' => $request->content,
            'meta_desc' => $request->meta_desc,
            'meta_keyword' => $request->meta_keyword,
            'slug' => Str::slug($request->title),
            
        ];
        if ($request->slider_id !=0) {
            if( DB::table('promotions')->where('slider_id',$request->slider_id)->first() != null)
            {
                dd("Slider nay da duoc gan link khuyen mai");
            }
        }
        $datapromotionCreate['slider_id'] = $request->slider_id;
        $dataUploadFeatureImage = $this->storageTraitUpload($request,'feature_image_path','promotion');
        if (!empty($dataUploadFeatureImage)) {
            //$datapromotionCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $datapromotionCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $this->promotion->create($datapromotionCreate);
        DB::commit(); // Up du lien len db
        return redirect()->route('promotions.index');
      /*
        try {
            DB::beginTransaction();
            
        } catch (\Exception $ex) {
            DB::rollBack(); // Backup lai du lieu khi co loi
            Log::error('Message'.$ex->getMessage().'Line: ' . $ex->getLine());
        }*/
        
        }
    public function edit($id){
        $promotion = $this->promotion->find($id);
        $banners = DB::table('sliders')->get();
        return view('admin.promotion.edit', compact('promotion','banners'));
    }
    public function update(Request $request, $id){
        
        try {
            
            DB::beginTransaction();
            $datapromotionUpdate = [
                'title' => $request->title,
                'desc' => $request->desc,
                'content' => $request->content,
                'meta_desc' => $request->meta_desc,
                'meta_keyword' => $request->meta_keyword,
                'slug' => Str::slug($request->title),
    
            ];
            if($request->slider_id !=0 )
            {
                if($request->slider_id != DB::table('promotions')->where('id',$id)->first()->slider_id)
                {
                    if( DB::table('promotions')->where('slider_id',$request->slider_id)->first() != null)
                    {
                        dd("Slider nay da duoc gan link khuyen mai");
                    };
            }
                
            }
            $datapromotionUpdate['slider_id'] = $request->slider_id;
                
            $dataUploadFeatureImage = $this->storageTraitUpload($request,'feature_image_path','promotion');
            if (!empty($dataUploadFeatureImage)) {
                //$datapromotionUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $datapromotionUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $this->promotion->find($id)->update($datapromotionUpdate);
            DB::commit(); // Up du lien len db
            return redirect()->route('promotions.index');
        } catch (\Exception $ex) {
            DB::rollBack(); // Backup lai du lieu khi co loi
            Log::error('Message'.$ex->getMessage().'Line: ' . $ex->getLine());
        }
    }
    public function delete($id)
    {
        try {
            $this->promotion->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ]);
            
        } catch (\Exception $th) {
            Log::error('Message'.$th->getMessage().'Line: ' . $th->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'failed',
            ]);
        }
    }
}