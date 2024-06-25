<?php

namespace App\Http\Resources\V1;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'category_id' => $this->category_id,
            'categoryName' => $this->category->title,
            'title' => $this->title,
            'content' => $this->when(Route::currentRouteName() == 'posts.show', $this->content),
            'created' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'updated' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
