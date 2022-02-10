<?php

namespace App\Services;

use App\Models\Traits\Seoable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as InterventionImage;
use TCG\Voyager\Models\Translation;

class SeoService
{
    /**
     * @param  Request  $request
     * @param  Model    $model
     */
    public function save(Request $request, Model $model)
    {
        if ($this->hasSeoableTrait($model)) {
            if (!config('voyager.multilingual.enabled')) {
                $values = $request->only(['seo_title', 'meta_keywords', 'meta_description']);

                if ($request->hasFile('og_image')) {
                    $values['og_image'] = $this->saveOgImage($request->file('og_image'));
                }

                $model->seo()->updateOrCreate([], $values);
            } else {
                $defaultLocale = config('voyager.multilingual.default');

                $values = [
                    'seo_title'        => json_decode($request->get('seo_title_i18n'))->{$defaultLocale},
                    'meta_keywords'    => json_decode($request->get('meta_keywords_i18n'))->{$defaultLocale},
                    'meta_description' => json_decode($request->get('meta_description_i18n'))->{$defaultLocale},
                ];

                if ($request->hasFile('og_image')) {
                    $values['og_image'] = $this->saveOgImage($request->file('og_image'));
                }

                $seo = $model->seo()->updateOrCreate([], $values);

                foreach (config('voyager.multilingual.locales') as $locale) {
                    if ($locale !== $defaultLocale) {
                        foreach ($seo->getTranslatableAttributes() as $field) {
                            Translation::updateOrCreate([
                                'table_name'  => $seo->getTable(),
                                'column_name' => $field,
                                'foreign_key' => $seo->id,
                                'locale'      => $locale
                            ], [
                                'value' => json_decode($request->get("{$field}_i18n"))->{$locale}
                            ]);
                        }
                    }
                }
            }
        }
    }

    /**
     * @param  Model  $model
     * @return bool
     */
    public function hasSeoableTrait(Model $model): bool
    {
        return in_array(Seoable::class, trait_uses_recursive($model));
    }

    /**
     * @param  UploadedFile  $file
     * @return string
     */
    private function saveOgImage(UploadedFile $file): string
    {
        $path = 'seos' . DIRECTORY_SEPARATOR . date('FY') . DIRECTORY_SEPARATOR;

        $filename = $this->generateFileName($file, $path);

        $image = InterventionImage::make($file)->orientate();

        $fullPath = "{$path}{$filename}.{$file->getClientOriginalExtension()}";

        $image = $image->encode($file->getClientOriginalExtension());

        Storage::disk(config('voyager.storage.disk'))->put($fullPath, (string)$image, 'public');

        return $fullPath;
    }

    /**
     * @param  UploadedFile  $file
     * @param  string        $path
     * @return string
     */
    protected function generateFileName(UploadedFile $file, string $path)
    {
        if (isset($this->options->preserveFileUploadName) && $this->options->preserveFileUploadName) {
            $filename = basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension());
            $filename_counter = 1;

            // Make sure the filename does not exist, if it does make sure to add a number to the end 1, 2, 3, etc...
            while (Storage::disk(config('voyager.storage.disk'))->exists($path . $filename . '.' . $file->getClientOriginalExtension())) {
                $filename = basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension()) . (string)($filename_counter++);
            }
        } else {
            $filename = Str::random(20);

            // Make sure the filename does not exist, if it does, just regenerate
            while (Storage::disk(config('voyager.storage.disk'))->exists($path . $filename . '.' . $file->getClientOriginalExtension())) {
                $filename = Str::random(20);
            }
        }

        return $filename;
    }
}
