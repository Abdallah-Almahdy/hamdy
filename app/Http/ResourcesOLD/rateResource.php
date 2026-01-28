<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class rateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'uid' => $this->uid,
            'user_fname' => $this->user_info->user_fname,
            'user_lname' => $this->user_info->user_lname,
            'user_rait' => [
                'raitnum' => $this->raitnum,
                'reviewMessage' => $this->reviewMessage,
            ],
        ];
    }
}
