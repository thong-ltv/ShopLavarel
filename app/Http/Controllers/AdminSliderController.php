<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
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
        $sliders = $this->slider->latest()->paginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.add');
    }

    public function store(SliderAddRequest $request)
    {
        try {
            $dataInsertSliders = [
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataImageSliders = $this->storageTraitUpload($request, 'image_path', 'slider');
            
            if(!empty( $dataImageSliders))
            {
                $dataInsertSliders['image_name'] = $dataImageSliders['file_name'];
                $dataInsertSliders['image_path'] = $dataImageSliders['file_path'];
            }

            $this->slider->create($dataInsertSliders);

            return redirect()->route('sliders.index');
        } catch (\Throwable $th) {
            Log::error("loi: " . $th->getMessage() . "line: " .$th->getLine());
        }
    }

    public function edit($id)
    {
        $editData = $this->slider->find($id);
        return view('admin.slider.edit', compact('editData'));
    }

    public function update(SliderAddRequest $request, $id)
    {
        try {
            $dataInsertSliders = [
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataImageSliders = $this->storageTraitUpload($request, 'image_path', 'slider');
            
            if(!empty( $dataImageSliders))
            {
                $dataInsertSliders['image_name'] = $dataImageSliders['file_name'];
                $dataInsertSliders['image_path'] = $dataImageSliders['file_path'];
            }

            $this->slider->find($id)->update($dataInsertSliders);

            return redirect()->route('sliders.index');
        } catch (\Throwable $th) {
            Log::error("loi: " . $th->getMessage() . "line: " .$th->getLine());
        }
    }

    public function delete($id)
    {
        try {
            $this->slider->find($id)->delete();
            
        } catch (\Throwable $th) {
            Log::error("Message: ".$th->getMessage()."---Line".$th->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], status: 500);
        }
        return redirect()->route('sliders.index');
    }
}
