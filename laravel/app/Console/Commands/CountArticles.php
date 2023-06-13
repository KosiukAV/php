<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CountArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tag:count {id}';

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
        try
        {
            $id = $this->argument('id');
            $count = DB::table('article_tag')->where('article_tag.tag_id', '=', $id)->count();
            if ($count == 0)
            {
                throw new Exception('');
            }
            $this->info('Count of articles with tag '.$id.' is '.$count);
        }
        catch (Exception $e) {
            $this->error('Tag is not found.');
        }

    }
}
