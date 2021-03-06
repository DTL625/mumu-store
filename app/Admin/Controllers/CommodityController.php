<?php

namespace App\Admin\Controllers;

use App\Model\Commodity;
use App\Repositories\CategoryRepository;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Database\Eloquent\Collection;

class CommodityController extends BaseController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '商品管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Commodity());
        $grid->column('id', __('mumu.id'));
        $grid->column('title', __('mumu.title'))->display(function () {
            return "<a href='$this->slug'>$this->title</a>";
        });
        $grid->column('price', __('mumu.price'))->display(function () {
            if ($this->after_price) {
                return "<s>$this->price</s>  $this->after_price";
            } else {
                return $this->price;
            }
        });
        $grid->column('category', __('mumu.category'))->display(function ($item) {

            return join(' ', array_map(function ($item) {
                return "<span class='label label-success'>{$item['title']}</span>";
            }, $item));
        });
        $grid->column('created_at', __('admin.created_at'))->dataTimeString();
        $grid->column('updated_at', __('admin.updated_at'))->dataTimeString();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Commodity::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('slug', __('Slug'));
        $show->field('title', __('Title'));
        $show->field('notice', __('Notice'));
        $show->field('description', __('Description'));
        $show->field('price', __('Price'));
        $show->field('after_price', __('After price'));
        $show->field('format', __('Format'));
        $show->field('content', __('Content'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form     = new Form(new Commodity());
        $category = new CategoryRepository();

        $form->text('slug', __('mumu.slug'))->required();
        $form->text('title', __('mumu.title'))->required();
        $form->multipleSelect('category', __('mumu.category'))->options($category->getFormOption());
        $form->text('notice', __('mumu.notice'));
        $form->text('description', __('mumu.description'));
        $form->number('price', __('mumu.price'));
        $form->number('after_price', __('mumu.after_price'));
        $form->textarea('format', __('mumu.format'));
        $form->textarea('content', __('mumu.content'));
        $form->hasMany('images', '', function (Form\NestedForm $form){
            $form->text('filename', __('mumu.filename'));
            $states = [
                'on'  => ['value' => 1, 'text' => '是', 'color' => 'success'],
                'off' => ['value' => 0, 'text' => '否', 'color' => 'danger'],
            ];
//
            $form->switch('is_cover', __('mumu.is_cover'))->states($states);
//
//            $form->file('path', __('mumu.file'));
        });

        return $form;
    }
}
