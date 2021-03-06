<?php

namespace App\Http\Requests\Area;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAreaRequest extends FormRequest
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
      'name' => "required|string|unique:areas,name,{$this->area->id}|min:2|max:255",
    ];
  }

  public function messages()
  {
    return [
      'name.unique' => 'Areas Name should be unique', //syntax: field_name.rule
    ];
  }
}
