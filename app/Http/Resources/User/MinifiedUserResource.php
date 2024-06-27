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
            'image' => asset($this->image),
            'description' => $this->description,
            'created_at' => Carbon::make($this->created_at)->format("s:i:H d-m-Y"),
        ];
    }

}
