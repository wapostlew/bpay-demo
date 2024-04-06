<?php

namespace App\Services\Kitsu\Traits;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

trait RequestMethods
{
    public function get(string $url, array $query = null): Response
    {
        return $this->request->get($url, $query);
    }

    public static function getQuery(string $content, int $limit, int $offset)
    {
        return
            [
                "fields[$content]" => (is_array(config("services.kitsu.fields.$content"))) ? join(',', config("services.kitsu.fields.$content")) : config("services.kitsu.fields.$content"),
                'page[limit]' => ($limit <= 0 || $limit > config('services.kitsu.pagination.limit')) ? config('services.kitsu.pagination.limit') : $limit,
                'page[offset]' => $offset,
            ];
    }
}
