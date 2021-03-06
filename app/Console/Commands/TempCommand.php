<?php

namespace App\Console\Commands;

use App\Model\Commodity;
use App\Model\CommodityImage;
use Illuminate\Console\Command;

class TempCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'temp:debug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $model = new Commodity();
        foreach ($model->get() as $item) {
            $res = $item->category()->get();
            dd($res->toArray());
        }
    }
}
