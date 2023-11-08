<?php

namespace App\Http\Resources\PaymentGateway;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentGatewayResource extends JsonResource
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
            'app_keys' => $this->app_keys,
            'app_secret' => $this->app_secret,
            'username' => $this->username,
            'password' => $this->password,
            'merchant_id' => $this->merchant_id,
            'paymentGateway' => $this->paymentGateway,
            'amount' => $this->amount,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
