<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateCommoditiesTable extends Migration
{
    private $table = '';

    public function __construct()
    {
        $this->table = (new \App\Model\Commodity())->getTable();
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
            $table->string('slug', 25)->nullable(false)->default('')->comment('商品連結');
            $table->string('title', 25)->nullable(false)->default('')->comment('商品名');
            $table->string('notice', 100)->nullable(false)->default('')->comment('注意事項');
            $table->string('description', 100)->nullable(false)->default('')->comment('商品描述');
            $table->integer('price')->nullable(false)->default(0)->comment('商品價格');
            $table->integer('after_price')->nullable(false)->default(0)->comment('商品折扣價');
            $table->string('format', 150)->comment('規格');
            $table->text('content')->comment('內容');

            $table->timestamps();
        });
        DB::statement("ALTER TABLE `". $this->table ."` comment '商品表'");

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
