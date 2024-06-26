<?php

namespace App\Console\Commands\Kitsu;

use App\Services\Kitsu\KitsuAPIService;
use Illuminate\Console\Command;

class Anime extends Command
{
    protected $signature = 'kitsu:anime {--size=0} {--parse}';
    protected $description = 'Kitsu API anime
    {--size=1 : How many pages would you like to load?}
    {--parse : Whether the job should be parse}';

    public function handle(KitsuAPIService $api)
    {
        if ($this->option('parse')) {
            $api->anime()->collector($this->option('size'));
        }
        return self::SUCCESS;
    }
}
