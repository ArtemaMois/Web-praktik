<?php

namespace App\Http\Resources\Grade;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MinifiedGradeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'design' => $this->design,
            'usability' => $this->usability,
            'layout' => $this->layout,
            'implementation' => $this->implementation,
            'created_at' => $this->created_at,
            'evaluator' => $this->evaluator->login
        ];
    }
}
