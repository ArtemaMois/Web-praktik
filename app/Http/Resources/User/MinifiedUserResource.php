<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class MinifiedUserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            //TODO: add image url string
            'description' => $this->description,
            'created_at' => Carbon::make($this->created_at)->format("s:i:H d-m-Y"),
        ];
    }

}
