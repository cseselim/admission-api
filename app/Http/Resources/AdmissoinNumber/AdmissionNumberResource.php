<?php

namespace App\Http\Resources\AdmissoinNumber;

use Illuminate\Http\Resources\Json\JsonResource;

class AdmissionNumberResource extends JsonResource
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
            'school_id' => $this->school_id,
            'class_id' => $this->class_id,
            'admission_number' => $this->admission_number,
            'school_name' => $this->school->name,
            'class_name' => $this->classes->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
