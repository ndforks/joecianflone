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
    protected $signature = 'cianflone:articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets the last 10 articles from the disk.';

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
        $files = Storage::disk('local')->files("resources/assets/markdown/articles");
        $markdownFiles = [];

        foreach ($files as $file) {
           if (ends_with($file, '.md')) {
              $markdownFiles[] = $file;
           }
        }

        event(new GotSomeArticles($markdownFiles));
    }
}
