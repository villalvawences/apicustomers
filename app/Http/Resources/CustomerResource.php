<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'dni' => $this->dni,
            'id_reg' => $this->id_reg,
            'id_com' => $this->id_com,
            'email' => $this->email,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'date_reg' => $this->date_reg,
            'status' => $this->status,
            'deleted' => $this->deleted
        ];
    }
}
