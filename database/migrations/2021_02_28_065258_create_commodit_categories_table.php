<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCommoditCategoriesTable extends Migration
{
    private $table = '';

    public function __construct()
    {
        $this->table = (new \App\Model\CommodityCategory())->getTable();
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->integer('c_id')->default(0)->nullable(false)->comment('商品id');
            $table->integer('cate_id')->default(0)->nullable(false)->comment('分類id');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `". $this->table ."` comment '商品分類關係'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
