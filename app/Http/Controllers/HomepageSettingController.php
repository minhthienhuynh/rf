<?php

namespace App\Http\Controllers;

use App\Models\HomepageSetting;
use Illuminate\Http\Request;

class HomepageSettingController extends \TCG\Voyager\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $homepageSettings = HomepageSetting::orderBy('order')->get()->groupBy('group');

        return view('voyager::homepage-settings.index', compact('homepageSettings'));
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
        $this->authorize('edit', app(HomepageSetting::class));

        $settings = HomepageSetting::all();

        foreach ($settings as $setting) {
            $content = $this->getContentBasedOnType($request, 'homepage-settings', (object) [
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

        $request->session()->flash('homepage_setting_tab', $request->get('homepage_setting_tab'));

        return back()->with([
            'message'    => __('voyager::settings.successfully_saved'),
            'alert-type' => 'success',
        ]);
    }
}
