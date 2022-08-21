<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
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
            'category_id' => ['required', 'integer', Rule::exists('App\Models\Category', 'id')->whereNull('deleted_at')],
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:50',
            'keywords' => 'required|string|max:255',
            'tags' => ['required', 'array'],
            'tags.*' => ['required', 'integer', Rule::exists('App\Models\Tag', 'id')->whereNull('deleted_at')],
            'markdown' => 'required|string',
        ];
    }
}
