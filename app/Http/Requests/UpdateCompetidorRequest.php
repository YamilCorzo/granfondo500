<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateCompetidorRequest extends FormRequest
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
        $edad = FormRequest::input('edad');
        return [
            'nombre' => 'required|min:3',
            'apellidos' => 'required|min:3',
            'estado' => 'required|min:3',
            'pais' => 'required|min:3',
            'correo' => 'required|email',
            'conf_correo' => 'required|email|same:correo',
            'celular' => 'required|integer|min:10',
            'fec_nacimiento' => 'required|date',
            'lugar_nac' => 'required|min:3',
            'edad' => 'required|min:15|gte:15',
            'id_genero' => 'required|gt:0|exists:App\SisTip,id_tip',
            'c_terminos_condiciones' => 'required',
            'id_talla_jersey' => 'required|gt:0|exists:App\SisTip,id_tip',
            'id_talla_calcetas' => 'required|gt:0|exists:App\SisTip,id_tip',
            'id_distancia' => 'required|gt:0|exists:App\SisTip,id_tip',
            'id_categoria' => 'required|gt:0|exists:App\SisTip,id_tip',
            'id_corral' => 'required|gt:0|exists:App\SisTip,id_tip',
            'contacto_emerg' => 'required|min:3',
            'tel_emerg' => 'required|integer|min:10',
            'num_personas' => 'required|integer',
            'c_reglamento' => 'required',
            'c_menor_de' => Rule::requiredIf(function () use ($edad) {
                return ($edad > 15 && $edad < 17);
            }),
            'c_conformidad' => 'required',
            'c_conocimiento' => 'required',
            'c_jersey' => 'required',
            'c_bici_triatlon' => 'required',
        ];
    }

    public function messages()
    {
        $edad = FormRequest::input('edad');
        return [
            'required' => 'El :attribute es requerido.',
            'email' => 'Correo electrónico incorrecto.',
            'same' => 'No coinciden los correos electrónicos.',
            'min' => 'Mínimo de caracteres incorrecto.',
            'integer' => 'Caracteres inválidos.',
            'date' => 'Fecha incorrecta',
            'exists' => 'No existen registros. Consulte a su administrador de sistema.',
            'id_genero.gt' => 'Debes seleccionar un :attribute',
            'gt' => 'Debes seleccionar una :attribute',
            'apellidos.required' => 'Los :attribute son requeridos.',
            'edad.gte' => 'Menores de 15 años no pueden participar.',
            'c_terminos_condiciones.required' => 'Aceptar los términos y condiciones.',
            'c_menor_de.required' => 'Debe aceptar los términos. Edad: '.$edad,
            'c_jersey' => 'Debe aceptar el uso del Jersey obligatorio',
            'c_bici_triatlon' => 'Debe aceptar la prohibición del uso de Bicicleta de Triatlón',
        ];
    }

    public function attributes()
    {
        return [
            'pais' => 'país',
            'conf_correo' => 'correo de confirmación',
            'fec_nacimiento' => 'fecha de nacimiento',
            'lugar_nac' => 'lugar de nacimiento',
            'id_genero' => 'genero',
            'c_terminos_condiciones' => 'términos y condiciones',
            'id_talla_jersey' => 'jersey',
            'id_talla_calcetas' => 'calcetas',
            'id_distancia' => 'distacia',
            'id_categoria' => 'categoría',
            'id_corral' => 'corral',
            'contacto_emerg' => 'contacto de emergencias',
            'tel_emerg' => 'teléfono de emergencias',
            'num_personas' => 'número de personas',
            'c_reglamento' => 'reglamento ',
            'c_conformidad' => 'campo',
            'c_conocimiento' => 'campo',
            'c_jersey' => 'campo',
            'c_bici_triatlon' => 'campo',
        ];
    }
}
