<?php

namespace App\Http\Requests;

use App\Registro;
use Illuminate\Support\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateCompetidorRequest extends FormRequest
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
            'id_evento' => 'required',
            'id_ticket' => 'required',
            'id_usuario' => 'required',
            'nombre' => 'required',
            'correo' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            // 'id_evento.required' => 'Se requiere el evento.',
            // 'id_ticket.required' => 'Se requiere el ticket.',
            // 'id_usuario.required' => 'Se requiere el usuario.',
            // 'nombre.required' => 'Se requiere el nombre.',
            // 'correo.required' => 'Se requiere el correo.'
            'required' => 'El :attribute es requerido.',
            'email' => 'Correo electrónico incorrecto.'
        ];
    }

    public function response(array $errors)
    {
        if ($this->expectsJson()) {
            return new JsonResponse($errors, 422);
        }
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        $this->registro(json_encode($errors));
        throw new HttpResponseException(response()->json(['errors' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }

    private function registro($registro)
    {
        try {
            Registro::create([
                'registro' => $registro,
                'estatus' => '422',
                'fec_reg' => Carbon::now()
            ]);
        } catch(\Exception $e) {}
    }
}
