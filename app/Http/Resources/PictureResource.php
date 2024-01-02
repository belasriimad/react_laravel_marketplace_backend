<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PictureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'user' => $this->user->load('pictures'),
            'category' => $this->category,
            'image_path' => $this->image_path,
            'ext' => $this->ext,
            'status' => $this->status,
            'orders' => $this->orders()->latest()->get(),
            'reviews' => $this->reviews()->with('user')
                    ->where('approved', 1)->latest()->get()
        ];
    }
}
