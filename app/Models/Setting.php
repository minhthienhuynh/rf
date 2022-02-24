<?php

namespace App\Models;

use TCG\Voyager\Models\Setting as Model;

class Setting extends Model
{
    public const TYPE_TEXT = 'text';
    public const TYPE_TEXT_AREA = 'text_area';
    public const TYPE_RICH_TEXT_BOX = 'rich_text_box';
    public const TYPE_CODE_EDITOR = 'code_editor';
    public const TYPE_CHECKBOX = 'checkbox';
    public const TYPE_RADIO_BTN = 'radio_btn';
    public const TYPE_SELECT_DROPDOWN = 'select_dropdown';
    public const TYPE_FILE = 'file';
    public const TYPE_IMAGE = 'image';
    public const TYPE_ITEMS = 'items';
}
