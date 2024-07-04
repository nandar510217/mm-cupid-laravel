<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'email' => $this->email,
            'gender' => $this->gender,
            'phone' => $this->phone,
            'email_confirm_code' => $this->email_confirm_code,
            'date_of_birth' => $this->date_of_birth,
            'education' => $this->education,
            'city_id' => $this->city,
            'work' => $this->work,

        ];
    }
}
