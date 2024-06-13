<?php

namespace App\Http\Resources\Team;

use App\Http\Resources\User\MinifiedUserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class MinifiedTeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            //TODO: add image url string
            'email' => $this->email,
            'created_at' => Carbon::make($this->created_at)->format("s:i:H d-m-Y"),
            'users' => MinifiedUserResource::collection($this->users),
        ];
    }
}
