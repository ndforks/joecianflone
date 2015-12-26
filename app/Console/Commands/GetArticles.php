<?php
namespace JoeCianflone\Console\Commands;

use Storage;
use Illuminate\Console\Command;
use JoeCianflone\Events\GotSomeArticles;

class GetArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stream:articles {count=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets the last X articles from the disk.';

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
     * @return mixed
     */
    public function handle()
    {
        $files = Storage::disk('dropbox')->files("articles");

        $markdownFiles = array_filter($files, function($file) {
           return ends_with($file, '.md');
        });

        event(new GotSomeArticles($markdownFiles));
    }
}
