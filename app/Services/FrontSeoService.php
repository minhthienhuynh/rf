<?php

namespace App\Services;

use TCG\Voyager\Facades\Voyager;

class FrontSeoService
{
    public function getMeta($model, $type = '')
    {
        $meta = [];

        // default
        $meta['title'] = 'Resilient forestry';
        $meta['keywords'] = 'Resilient forestry';
        $meta['description'] = 'Resilient forestry';
        $meta['favicon'] = asset('frontside/assets/img/images/favicon.ico');

        if (!empty($type)) {
            return $this->getCustom($meta, $type);
        }

        if (!empty($model->seo->seo_title)) {
            $meta['title'] = $model->seo->seo_title;
        }
        else {
            if (!empty($model->title)) {
                $meta['title'] = $model->title;
            }
            // for category
            elseif (!empty($model->name)) {
                $meta['title'] = $model->name;
            }
        }

        if (!empty($model->seo->meta_keywords)) {
            $meta['keywords'] = $model->seo->meta_keywords;
        }

        if (!empty($model->seo->meta_description)) {
            $meta['description'] = $model->seo->meta_description;
        }
        else {
            if (!empty($model->title)) {
                $meta['description'] = $model->title;
            }
            // for category
            elseif (!empty($model->name)) {
                $meta['description'] = $model->name;
            }
        }
        
        $meta['og_image'] = asset('frontside/assets/img/images/logo.png');
        if (!empty($model->seo->og_image)) {
            $meta['og_image'] = Voyager::image($model->seo->og_image);
        }

        return $meta;
    }

    public function getCustom($meta, $type = '')
    {
        if (empty($type)) {
            return;
        }

        switch ($type) {
            case 'home':
                    $meta['title'] = Voyager::setting('site.title') ? Voyager::setting('site.title') : 'Resilient forestry';
                    $meta['keywords'] = Voyager::setting('site.title') ? Voyager::setting('site.title') : 'Resilient forestry';
                    $meta['description'] = Voyager::setting('site.description') ? Voyager::setting('site.description') : 'Resilient forestry';
                    $meta['og_image'] = asset('frontside/assets/img/images/logo.png');
                break;
            case 'blog':
                    $meta['title'] = 'Blogs | Resilient forestry';
                    $meta['keywords'] = 'Blogs | Resilient forestry';
                    $meta['description'] = 'Blogs | Resilient forestry';
                    $meta['og_image'] = asset('frontside/assets/img/images/logo.png');
                break;
            case 'career':
                    $meta['title'] = 'Careers | Resilient forestry';
                    $meta['keywords'] = 'Careers | Resilient forestry';
                    $meta['description'] = 'Careers | Resilient forestry';
                    $meta['og_image'] = asset('frontside/assets/img/images/logo.png');
                break;

            default:
                break;
        }
        return $meta;
    }
}