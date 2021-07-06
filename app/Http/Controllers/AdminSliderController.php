<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminSliderRequest;
use App\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminSliderController extends Controller
{
    use StorageImageTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    public function index()
    {
        $sliders = $this->slider->paginate(5);
        return view('admin.slider.index',compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.add');
    }
    public function store(AdminSliderRequest $request)
    {
        try {
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataImageSlider = $this->storageTraitUpload($request,'image_path','slider');
            if (!empty($dataImageSlider)) {
                $dataInsert['image_name'] = $dataImageSlider['file_name'];
                $dataInsert['image_path'] = $dataImageSlider['file_path'];
            }
            $this->slider->create($dataInsert);
            return redirect()->route('slider.index');
        } catch (\Exception $th) {
            Log::error("loi: " . $th->getMessage() . "dong " . $th->getLine());
        }

    }
    
    public function edit($id){
        $sliders = $this->slider->find($id);
        return view('admin.slider.edit', compact('sliders'));
    }
    
    public function update($id,Request $request){
        try {
            DB::beginTransaction();
            $dataSliderUpdate = [
                'name' => $request->name,
                'description' => $request->description,
                
    
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request,'image_path','slider');
            if (!empty($dataUploadFeatureImage)) {
                $dataSliderUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataSliderUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
            $this->slider->find($id)->update($dataSliderUpdate);
            $Slider =  $this->slider->find($id);
            // insert data to Slider image
            if ($request->hasFile('image_path')) {
                $this->slider->where('slider_id',$id)->delete();
                foreach ($request->image_path as $fileItem) {
                    // tao phuong thuc upload nhieu file
                    $dataSliderImageDetail = $this->storageTraitUploadMultiple($fileItem,'slider');
                    $Slider->images()->create([
                        'image_path' => $dataSliderImageDetail['file_path'],
                        'image_name' => $dataSliderImageDetail['file_name']
                        
                    ]);
                    
                }
    
            }
            DB::commit(); // Up du lien len db
            return redirect()->route('slider.index');
        } catch (\Exception $ex) {
            DB::rollBack(); // Backup lai du lieu khi co loi
            Log::error('Message'.$ex->getMessage().'Line: ' . $ex->getLine());
        }
    }
    public function delete($id){
        try {
            $this->slider->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], status:200);
            
        } catch (\Exception $th) {
            Log::error('Message'.$th->getMessage().'Line: ' . $th->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'failed',
            ], status:500);
        }
    }
}