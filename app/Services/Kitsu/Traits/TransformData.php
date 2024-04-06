<?php

namespace App\Services\Kitsu\Traits;

use App\Models\Kitsu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

trait TransformData
{
    public static function toArray($data,)
    {
        return [
            'kitsu_id' => $data['id'],
            'kitsu_content' => $data['type'],
            'title' => $data['attributes']['canonicalTitle'],
            'description' => $data['attributes']['description'],
            'type' => $data['attributes']['subtype'],
            'status' => $data['attributes']['status'],
            'age_rating_code' => $data['attributes']['ageRating'],
            'start_date' => $data['attributes']['startDate'],
            'end_date' => $data['attributes']['endDate'],
        ];
    }
    public static function store($data)
    {
        $kitsu_data = array_splice($data, 2, count($data) - 2);
        Kitsu::updateOrCreate(
            $data,
            $kitsu_data,
        );
        var_dump($kitsu_data);
    }
}
