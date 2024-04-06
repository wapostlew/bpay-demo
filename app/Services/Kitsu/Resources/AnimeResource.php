<?php

namespace App\Services\Kitsu\Resources;

use App\Services\Kitsu\KitsuAPIService;
use App\Services\Kitsu\Traits\TransformData;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Log;

class AnimeResource
{
    use TransformData;

    public function __construct(
        private readonly KitsuAPIService $service,
        private readonly string $content_type = "anime",
    ) {
    }


    public function page(int $offset = 0, int $limit = 0): array
    {
        $response = $this->service->get(
            url: "/$this->content_type",
            query: $this->service::getQuery(content: $this->content_type, limit: $limit, offset: $offset),
        )->json();

        return [
            'data' => $response['data'],
            'meta' => [
                "count" => $response['meta']['count'],
                "offset" => $offset,
                "limit" => ($limit <= 0 || $limit > config('services.kitsu.pagination.limit')) ? config('services.kitsu.pagination.limit') : $limit,
            ],
        ];
    }

    public function collector(int $page_size = 0)
    {
        $info = $this->page();
        $info_page_count = ceil($info['meta']['count'] / $info['meta']['limit']);
        if ($info_page_count < $page_size || $page_size <= 0) $page_count = $info_page_count;
        else $page_count = $page_size;
        foreach (range(1, $page_count) as $chunk) {
            $page = $this->page(
                offset: ($chunk - 1) * $info['meta']['limit'],
                limit: $info['meta']['limit'],
            );
            foreach ($page['data'] as $item) {
                self::store(self::toArray($item));
            }
        }
    }
}
