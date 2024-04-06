<?php

namespace App\Console\Commands\Kitsu;

use App\Services\Kitsu\KitsuAPIService;
use Illuminate\Console\Command;

class Manga extends Command
{
    protected $signature = 'kitsu:manga {--size=1} {--parse}';
    protected $description = 'Kitsu API manga
    {--size=1 : How many pages would you like to load?}
    {--parse : Whether the job should be parse}';

    public function handle(KitsuAPIService $api)
    {
        if ($this->option('parse')) {
            $api->manga()->collector($this->option('size'));
        }
        return self::SUCCESS;
    }
}
