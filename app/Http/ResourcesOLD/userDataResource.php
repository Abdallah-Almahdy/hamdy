<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class userDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' =>
            [
                'user_id' => $this->user_id,
      
                'profileImage' => ($this->profileImage) ? env('API_BASE_LINK') . '/uploads/profile_photo/' . $this->profileImage  : null,
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'phonenum' => $this->phonenum,
                'email' => $this->email,

                // user address 1
                'addressCountry' => $this->addressCountry,
                'addresscity' => $this->addresscity,
                'addressstreet' => $this->addressstreet,
                'addressbuildingNumber' => $this->addressbuildingNumber,
                'addressfloorNumber' => $this->addressfloorNumber,
                'addressApartmentNumber' => $this->addressApartmentNumber,
                'disSign' => $this->disSign,

                // user address 2
                'addressCountry2' => $this->addressCountry2,
                'addresscity2' => $this->addresscity2,
                'addressstreet2' => $this->addressstreet2,
                'addressbuildingNumber2' => $this->addressbuildingNumber2,
                'addressfloorNumber2' => $this->addressfloorNumber2,
                'addressApartmentNumber2' => $this->addressApartmentNumber2,
                'disSign2' => $this->disSign2,

                'gender' => $this->gender,
                'birthDate' => $this->birthDate,
            ],
            "message" => "user info has been fetched successfully",
            "stus" => "success",
            "code" => 200,
        ];
    }
}
