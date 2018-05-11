<?php

namespace App\Http\Requests;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreateCompany extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
    public function authorize()
    {
        // разрешаем доступ всем
        return true;
    }
    
   
        
    //переопределяем сообщения
    public function messages()
        {
          return [
            'title.required' => 'Неабходна увесцi назву кампанii!',
            'required_amount.min' => 'Надта малая сума!',
            'required_amount.max' => 'Надта вялiкая сума!',
          ];
        }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //настраиваем правила валидации
            'title' => 'required|max:255',
            'required_amount' => 'required|numeric|min:0|max:50000',
            'time_start' => 'required|date',
            'time_end' => 'required|date|after:time_start',
            'description' => 'required',
            //'photo'=> 'required|image',
            
       
            
        ];
    }
}
