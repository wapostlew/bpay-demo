<?php

namespace App\Services\Kitsu;

use App\Services\Kitsu\Resources\AnimeResource;
use App\Services\Kitsu\Resources\MangaResource;
use App\Services\Kitsu\Traits\RequestMethods;
use Illuminate\Http\Client\PendingRequest;


class KitsuAPIService
{
    use RequestMethods;

    public function __construct(private PendingRequest $request,)
    {
    }

    public function manga(): MangaResource
    {
        return new MangaResource(
            service: $this,
            content_type: 'manga'
        );
    }

    public function anime(): AnimeResource
    {
        return new AnimeResource(
            service: $this,
            content_type: 'anime'
        );
    }

    public static function parse()
    {
    }
}
