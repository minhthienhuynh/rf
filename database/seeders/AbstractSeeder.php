<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Models\DataType;

abstract class AbstractSeeder extends Seeder
{
    protected $model;
    protected $controller;
    protected $icon;
    protected $singularName;
    protected $pluralName;
    protected $name;
    protected $slug;

    public function __construct(Model $model, Controller $controller, string $icon = null, string $singularName = null, string $pluralName = null, string $name = null, string $slug = null)
    {
        $this->model = $model;
        $this->controller = $controller;
        $this->icon = $icon;
        $this->singularName = $singularName;
        $this->pluralName = $pluralName;
        $this->name = $name;
        $this->slug = $slug;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function getController(): Controller
    {
        return $this->controller;
    }

    public function getIcon(): string
    {
        return $this->icon ?? 'voyager-new';
    }

    public function getSingularName(): string
    {
        return $this->singularName ?? Str::singular(ucwords(str_replace('_', ' ', $this->getModel()->getTable())));
    }

    public function getPluralName(): string
    {
        return $this->pluralName ?? Str::plural(ucwords(str_replace('_', ' ', $this->getModel()->getTable())));
    }

    public function getName(): string
    {
        return $this->name ?? $this->getModel()->getTable();
    }

    public function getSlug(): string
    {
        return Str::slug($this->getModel()->getTable());
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->buildData();

        //CRUD
        $this->buildCRUD();

        //Menu Item
        $this->buildMenu();

        //Permissions
        $this->buildPermission();
    }

    abstract protected function buildData();

    abstract protected function buildCRUD();

    abstract protected function buildMenu();

    abstract protected function buildPermission();

    protected function _buildDataType($details = [], $policy_name = null, $description = null, $generate_permissions = true, $server_side = false)
    {
        return Voyager::model('DataType')->updateOrCreate([
            'slug'                  => $this->getSlug(),
        ], [
            'name'                  => $this->getName(),
            'display_name_singular' => $this->getSingularName(),
            'display_name_plural'   => $this->getPluralName(),
            'icon'                  => $this->getIcon(),
            'model_name'            => get_class($this->getModel()),
            'policy_name'           => $policy_name,
            'controller'            => get_class($this->getController()),
            'description'           => $description,
            'generate_permissions'  => $generate_permissions,
            'server_side'           => $server_side,
            'details'               => $details,
        ]);
    }

    protected function _buildDataRows(DataType $dataType, array $dataRows)
    {
        foreach ($dataRows as $dataRow) {
            $dataType->rows()->updateOrCreate($dataRow['attributes'], $dataRow['values']);
        }
    }

    protected function _buildMenu(string $title, int $order, array $data = [], array $trans = [])
    {
        $menu = Voyager::model('Menu')->where('name', 'admin')->firstOrFail();

        if ($data) {
            $menuItemParent = $menu->items()->updateOrCreate(Arr::only($data, 'title'), Arr::except($data, 'title'));
        }

        $item = $menu->items()->updateOrCreate([
            'title'      => $title ?? $this->getPluralName(),
            'route'      => "voyager.{$this->getSlug()}.index",
            'url'        => '',
        ], [
            'target'     => '_self',
            'icon_class' => $this->getIcon(),
            'parent_id'  => $menuItemParent->id ?? null,
            'order'      => $order,
        ]);

        if ($trans) {
            foreach ($trans as $key => $value) {
                $this->_transMenuItem($item, 'title', $key, $value);
            }
        }
    }

    protected function _transMenuItem($item, $column, $lang, $value)
    {
        Voyager::model('Translation')::updateOrCreate([
            'table_name'  => $item->getTable(),
            'column_name' => $column,
            'foreign_key' => $item->id,
            'locale'      => $lang,
        ], [
            'value'       => $value
        ]);
    }

    protected function _buildPermission(array $permissions = [])
    {
        Permission::generateFor($this->getName(), $permissions);

        $role = Voyager::model('Role')->where('name', 'admin')->firstOrFail();
        $permissions = Voyager::model('Permission')->where('table_name', $this->getName())->get();
        $role->permissions()->syncWithoutDetaching($permissions->pluck('id'));
    }

    protected function _deleteDataRows(array $fields, DataType $dataType)
    {
        $dataType->rows()->whereIn('field', $fields)->delete();
    }

    protected function _deleteMenuItem(string $title = null)
    {
        $menu = Voyager::model('Menu')->where('name', 'admin')->first();
        $menu->items()->where('title', $title ?? $this->getPluralName())->delete();

    }
}
