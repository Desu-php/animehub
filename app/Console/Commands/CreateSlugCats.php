<?php

namespace App\Console\Commands;

use App\Models\Post\Cat;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateSlugCats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cats:slug';

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
        $cats = Cat::whereNull('slug')->get();
        foreach ($cats as $cat){
            $cat->slug = Str::slug($cat->title);
            $cat->save();
        }
    }
}
