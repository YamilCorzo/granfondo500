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
        $id_registros = $this->registro(json_encode($this->all()));
        $errors = (new ValidationException($validator))->errors();
        $this->registro(json_encode($errors),'422',$id_registros);
        throw new HttpResponseException(response()->json(['errors' => $errors
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }

    private function registro($registro,$estatus = '1',$id_registros = 0)
    {
        $result = 0;
        try {
            $result = Registro::create([
                'registro' => $registro,
                'estatus' => $estatus,
                'id_registros_rel' => $id_registros,
                'fec_reg' => Carbon::now()
            ])->id_registros;
        } catch(\Exception $e) {$result = 0;}
        return $result;
    }
}
