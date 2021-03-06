<?php

namespace App\Repositories;

use App\Model\Category;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends Model
{
    protected $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Category();
    }

    public function get()
    {
        return $this->model->get();
    }

    public function getFormOption()
    {
        return $this->get()->pluck('title', 'id');
    }
}