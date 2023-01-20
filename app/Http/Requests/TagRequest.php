<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
        switch ($this->method()) {
            // CREATE
            case 'POST':
            {
                return [
                    'name' => 'required|unique:tag,name|max:20',
                    'keywords' => 'required|string|max:100',
                    'description' => 'required|string|max:255',
                ];
            }
            // UPDATE
            case 'PUT':
            {
                return [
                    'name' => 'required|max:20|unique:tag,name,' . $this->route()->id,
                    'keywords' => 'required|string|max:100',
                    'description' => 'required|string|max:255',
                ];
            }
            case 'PATCH':
            {
                return [
                    // UPDATE ROLES
                ];
            }
            case 'GET':
            case 'DELETE':
            default:
            {
                return [];
            }
        }
    }
}
