<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminSettingController extends Controller
{
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
    public function index()
    {
        $settings = $this->setting->latest()->paginate(5);
        return view('admin.setting.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.setting.add');
    }

    public function store(AddSettingRequest $request)
    {
        $this->setting->create([
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type
        ]);

        return redirect()->route('settings.index');
    }

    public function edit($id)
    {
        $typeSetting = $this->setting->find($id);
        return view('admin.setting.edit', compact('typeSetting'));
    }

    public function update(Request $request, $id)
    {
        try {
            $dataUpdateSettings = [
                'config_key' => $request->config_key,
                'config_value' => $request->config_value
            ];
            $this->setting->find($id)->update($dataUpdateSettings);
        } catch (\Throwable $th) {
            Log::error("loi: " . $th->getMessage() . "line: " .$th->getLine());
        }

        return redirect()->route('settings.index');
    }

    public function delete($id)
    {
        try {
            $this->setting->find($id)->delete();
        } catch (\Throwable $th) {
            Log::error("loi: " . $th->getMessage() . "line: " .$th->getLine());
        }
        return redirect()->route('settings.index');
    }
}
