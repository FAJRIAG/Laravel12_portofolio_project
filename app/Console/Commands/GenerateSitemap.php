<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Use APP_URL if set, or default to the production URL provided by user
        $url = config('app.url');

        // If we are in local environment and url is localhost, we might want to warn or just use it.
        // For production, this should be https://fajriag.my.id

        Sitemap::create()
            ->add(Url::create($url))
            ->writeToFile(public_path('sitemap.xml'));

        $this->info("Sitemap generated successfully at " . public_path('sitemap.xml'));
    }
}
