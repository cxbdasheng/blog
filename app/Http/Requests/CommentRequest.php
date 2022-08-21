<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/4/8
 * Time: 0:30
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentRequest extends FormRequest
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
            'article_id' => ['required', 'integer', Rule::exists('App\Models\Article', 'id')->whereNull('deleted_at')],
            'parent_id' => ['required', 'integer', Rule::exists('App\Models\Comment', 'id')->whereNull('deleted_at')],
            'email' => 'email|string|max:150',
            'content' => 'required||string',
        ];
    }
}
