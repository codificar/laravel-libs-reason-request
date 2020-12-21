<?php

namespace Codificar\ReasonsRequest\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ListReasonFormRequest extends FormRequest 
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
	public function rules() {
		return [
			'reason' => 'string'
		];
	}

	/**
     * Returns a json if validation fails
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
	 * 
     * @return Json {'success','errors','error_code'}
     *
     */
    protected function failedValidation(Validator $validator)
    {
        $error_messages = $validator->errors()->all();

        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'error' => $error_messages[0],
                'message' => $error_messages[0],
                'error_code' => 400,
                'error_messages' => $error_messages
            ])
        );
    }
}
