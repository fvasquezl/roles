<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'title'=> $this->title,
            'slug'=> $this->slug,
            'excerpt'=> Str::limit(strip_tags($this->excerpt),40),
            'published_at'=> $this->published_at->diffForHumans(),
            'user_id'=> $this->user_id,
            'category_id'=> $this->category_id,
            'created_at'=> $this->created_at->diffForHumans(),
            'updated_at'=> $this->updated_at->diffForHumans(),
            'departments' => $this->departments->pluck('id'),
            'roles' =>  $this->roles->pluck('id'),
            'asigned_as' => $this->postType(),
        ];
    }

    public function postType()
    {
        if($this->departments->isEmpty() && $this->roles->isEmpty())
        return 'Publico';
        if($this->departments->isNotEmpty() && $this->roles->isEmpty())
        return $this->departments->pluck('name')->implode(', ');
        if($this->departments->isEmpty() && $this->roles->isNotEmpty())
        return $this->roles->pluck('name')->implode(', ');
        if($this->departments->isNotEmpty() && $this->roles->isNotEmpty())
        return $this->departments->pluck('name')->implode(', ').'-'.$this->roles->pluck('name')->implode(', ');
    }
}
