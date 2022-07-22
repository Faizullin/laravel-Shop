<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id'=>['required','integer','exists:products,id'],
            'title'=>['required','string','unique:products,title,'.$this->id],
            'description'=>['required','string'],
            'content'=>['required','string'],
            'price'=>['required','integer'],
            'count'=>['required','integer'],
            'preview_image'=>['nullable'],
            'isPublished'=>['nullable','integer'],
            'category_id'=>['required','exists:categories,id'],
            'tag_ids'=>['nullable','array'],
            'tag_ids.*'=>['nullable','integer','exists:tags,id'],
            'color_ids'=>['nullable','array'],
            'color_ids.*'=>['nullable','integer','exists:colors,id'],
            'product_images'=>['nullable','array'],
        ];
    }
}
