<?php
/**
 * Created by PhpStorm.
 * @Author: ChenDasheng
 * @Created: 2020/4/8
 * Time: 0:30
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
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
            'article_id' => 'required|integer',
            'parent_id'        => 'required|integer',
            'email'        => 'email',
            'content'    => 'required',
        ];
    }
}
