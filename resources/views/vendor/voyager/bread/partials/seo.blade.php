@php($seo = $dataTypeContent->seo ?? new \App\Models\Seo())

<!-- ### SEO CONTENT ### -->
<div class="panel panel-bordered panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="icon wb-search"></i> {{ __('voyager::post.seo_content') }}</h3>
        <div class="panel-actions">
            <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label for="meta_description">{{ __('voyager::post.meta_description') }}</label>
            @include('voyager::multilingual.input-hidden', [
                '_field_name'  => 'meta_description',
                '_field_trans' => get_field_translations($seo, 'meta_description')
            ])
            <textarea class="form-control" name="meta_description" id="meta_description">{{ @$seo->meta_description ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="meta_keywords">{{ __('voyager::post.meta_keywords') }}</label>
            @include('voyager::multilingual.input-hidden', [
                '_field_name'  => 'meta_keywords',
                '_field_trans' => get_field_translations($seo, 'meta_keywords')
            ])
            <textarea class="form-control" name="meta_keywords" id="meta_keywords">{{ @$seo->meta_keywords ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="seo_title">{{ __('voyager::post.seo_title') }}</label>
            @include('voyager::multilingual.input-hidden', [
                '_field_name'  => 'seo_title',
                '_field_trans' => get_field_translations($seo, 'seo_title')
            ])
            <input type="text" class="form-control" name="seo_title" id="seo_title" placeholder="SEO Title" value="{{ @$seo->seo_title ?? '' }}">
        </div>
        <div class="form-group">
            <label for="og_image">{{ __('voyager::post.og_image') }}</label>
            @if(isset($seo->og_image))
                <div data-field-name="og_image">
                    {{--<a href="#" class="voyager-x remove-single-image" style="position:absolute;"></a>--}}
                    <img src="{{ !filter_var($seo->og_image, FILTER_VALIDATE_URL) ? Voyager::image($seo->og_image) : $seo->og_image }}"
                         data-file-name="{{ $seo->og_image }}" data-id="{{ $seo->getKey() }}"
                         style="max-width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:10px;">
                </div>
            @endif
            <input type="file" name="og_image" id="og_image" accept="image/*">
        </div>
    </div>
</div>
