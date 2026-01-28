<?php

namespace App\Http\Resources;

use App\Models\delivery;
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
                'password' => $this->password,
                'profileImage' => ($this->profileImage) ? env('API_BASE_LINK') . '/uploads/profile_photo/' . $this->profileImage  : null,
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'phonenum' => $this->phonenum,
                'email' => $this->email,

                // user address 1
                'addressCountry' => $this->addressCountry ?? null,
                'addressCountryName' => delivery::find($this->addressCountry + 0)->name ?? null,
                'addresscity' => $this->addresscity ?? null,
                'addressstreet' => $this->addressstreet ?? null,
                'addressbuildingNumber' => $this->addressbuildingNumber ?? null,
                'addressfloorNumber' => $this->addressfloorNumber ?? null,
                'addressApartmentNumber' => $this->addressApartmentNumber ?? null,
                'disSign' => $this->disSign ?? null,

                // user address 2
                'addressCountry2' => $this->addressCountry2 ?? null,
                'addressCountry2Name' => delivery::find($this->addressCountry2 + 0)->name ?? null,
                'addresscity2' => $this->addresscity2 ?? null,
                'addressstreet2' => $this->addressstreet2 ?? null,
                'addressbuildingNumber2' => $this->addressbuildingNumber2 ?? null,
                'addressfloorNumber2' => $this->addressfloorNumber2 ?? null,
                'addressApartmentNumber2' => $this->addressApartmentNumber2 ?? null,
                'disSign2' => $this->disSign2 ?? null,

                'gender' => $this->gender ?? null,
                'birthDate' => $this->birthDate ?? null,
            ],
            "message" => "user info has been fetched successfully",
            "stus" => "success",
            "code" => 200,
        ];
    }
}
