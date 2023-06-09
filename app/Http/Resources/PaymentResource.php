<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    
    public function toArray($request)
    {
    
        $expired = now()->greaterThan($this->expired_date);
        $status['text'] = "Pendiente";
        $status['color'] = "text-orange-500";

        if ($this->payed_at){
            $status['text'] = "Pagado";
            $status['color'] = "text-green-500";
        }
            
        else if ($expired) {
            if (!$this->payed_at){
                $status['text'] = 'Expirado';
                $status['color'] = "text-red-600";
            } 
        }


        return [
            'id' => $this->id,
            'payed_at' => $this->payed_at?->isoFormat('DD MMM, YYYY'),
            'expired_date' => $this->expired_date?->isoFormat('DD MMM, YYYY'),
            'created_at' => $this->created_at?->isoFormat('DD MMM, YYYY'),
            'amount' => number_format($this->amount),
            'description' => $this->description,
            'concept' => $this->concept,
            'status' => $status,
            'user' => $this->whenLoaded('user'),
            'sphere' => $this->whenLoaded('sphere'),
        ];
    }
}
