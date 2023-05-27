<?php

namespace Modules\Post\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePost extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z۰-۹0-9ء-ي., ]+$/u',
            'summary' => 'required|max:300|min:5|regex:/^[ا-یa-zA-Z۰-۹0-9ء-ي.,><\/;\n\r& ]+$/u',
            'category_id' => 'required|min:1|max:10000000000|regex:/^[0-9]+$/u|exists:post_categories,id',
            'image' => 'image|mimes:png,jpg,jpeg,gif',
            'status' => 'required|numeric|in:0,1',
            'commentable' => 'required|numeric|in:0,1',
            'published_at' => 'required|numeric',
            'tags' => 'required|regex:/^[ا-یa-zA-Z۰-۹0-9ء-ي., ]+$/u',
            'body' => 'required|max:2000|min:5|regex:/^[ا-یa-zA-Z۰-۹0-9ء-ي.,><\/;\n\r& ]+$/u'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
