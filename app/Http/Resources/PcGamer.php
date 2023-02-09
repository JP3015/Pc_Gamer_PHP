<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PcGamer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tipo' => $this->tipo,
            'modelo' => $this->modelo,
            'preco' => $this->preco,
            'foto' => $this->foto
        ];
    }
}
