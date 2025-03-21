<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        if($this->method() == "PUT"){
            return [
                'number_roomEdit'     => ['required', 'integer', 'max:255'],
                'user_nameEdit'       => ['required', 'string', 'max:255'],
               
                ];
            
        }
        return [
            'number_room'     => ['required', 'integer', 'max:255'],
            'user_name'       => ['required', 'string', 'max:255'],
            ];

        
        
        
    }
}
