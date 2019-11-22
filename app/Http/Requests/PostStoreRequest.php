<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['required', 'string'],
            'published_at' => ['required'],
        ];
    }

    public function createPost($post)
    {
        $post->title = $this->title;
        $post->excerpt = $this->excerpt;
        $post->published_at = Carbon::createFromFormat('d/m/Y',$this->published_at);
        $post->user_id = auth()->id();
        $post->category_id = $this->category;
        $post->save();
        
        $post->slug = $post->id .'-'. Str::slug($post->title);
        $post->save();

        return $post;
    }
}
