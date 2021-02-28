<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCommodityImagesTable extends Migration
{
    private $table = '';

    public function __construct()
    {
        $this->table = (new \App\Model\CommodityImage())->getTable();
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->id();
            $table->integer('c_id')->default(0)->nullable(false)->comment('商品id');
            $table->tinyInteger('is_cover')->default(0)->nullable(false)->comment('是否為封面');
            $table->string('filename', 100)->default('')->nullable(false)->comment('檔案名稱');
            $table->string('path', 255)->default('')->nullable(false)->comment('商品路徑');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `". $this->table ."` comment '商品圖片'");
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
