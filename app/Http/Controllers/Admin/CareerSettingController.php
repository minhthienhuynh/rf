<?php

namespace App\Http\Controllers\Admin;

use App\Models\CareerSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use TCG\Voyager\Http\Controllers\Controller;

class CareerSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $careerSettings = CareerSetting::orderBy('order')->get()->groupBy('group');

        return view('voyager::career-settings.index', compact('careerSettings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request)
    {
        // Check permission
        $this->authorize('edit', app(CareerSetting::class));

        $settings = CareerSetting::all();

        foreach ($settings as $setting) {
            $content = $this->getContentBasedOnType($request, 'career-settings', (object) [
                'type'    => $setting->type,
                'field'   => str_replace('.', '_', $setting->key),
                'group'   => $setting->group,
            ], $setting->details);

            if (($setting->type == 'image' || $setting->type == 'file') && $content == null) {
                continue;
            }

            $setting->value = @$content ?? '';

            $setting->save();
        }

        $request->session()->flash('career_setting_tab', $request->get('career_setting_tab'));

        return back()->with([
            'message'    => __('voyager::settings.successfully_saved'),
            'alert-type' => 'success',
        ]);
    }

    public function delete_value($id)
    {
        $setting = CareerSetting::find($id);

        // Check permission
        $this->authorize('delete', $setting);

        if (isset($setting->id)) {
            // If the type is an image... Then delete it
            if ($setting->type == 'image') {
                if (Storage::disk(config('voyager.storage.disk'))->exists($setting->value)) {
                    Storage::disk(config('voyager.storage.disk'))->delete($setting->value);
                }
            }
            $setting->value = '';
            $setting->save();
        }

        request()->session()->flash('setting_tab', $setting->group);

        return back()->with([
            'message'    => __('voyager::settings.successfully_removed', ['name' => $setting->display_name]),
            'alert-type' => 'success',
        ]);
    }
}
