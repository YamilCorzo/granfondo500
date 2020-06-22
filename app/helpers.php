<?php
use App\SisTip;
use App\Categoria;
use App\Competidor;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;
function SetCorral($id_corral)
{
    $result = '';
    try {
        $sistip = SisTip::find($id_corral);
        $result = '<option value="'.$sistip->id_tip.'">'.$sistip->des.'</option>';
    } catch(\Exception $e) {
        $result = '<option value="0">'.$e->getMessage().'</option>';
    }
    return $result;
}

function GetValue($model,$name)
{
    if ($name == 'fec_nacimiento') {
        return (new Carbon($model->toArray()[$name]))->format('Y-m-d');
    } else {
        return $model->toArray()[$name];
    }

}

function GetLabel($attribute)
{
    switch ($attribute) {
        case 'nombre':
            $result = 'Nombre(s)';
            break;
        case 'apellidos':
            $result = 'Apellido(s)';
            break;
        case 'estado':
            $result = 'Estado';
            break;
        case 'pais':
            $result = 'País';
            break;
        case 'correo':
            $result = 'Correo electrónico';
            break;
        case 'conf_correo':
            $result = 'Confirmar correo electrónico';
            break;
        case 'celular':
            $result = 'Número de celular';
            break;
        case 'otr_tel':
            $result = 'Otro número telefónico';
            break;
        case 'fec_nacimiento':
            $result = 'Fecha de nacimiento';
            break;
        case 'lugar_nac':
            $result = 'Lugar de nacimiento';
            break;
        case 'edad':
            $result = 'Edad';
            break;
        case 'id_genero':
            $result = 'Genero';
            break;
        case 'id_talla_jersey':
            $result = 'Talla jersey unisex';
            break;
        case 'id_talla_calcetas':
            $result = 'Talla calcetas unisex';
            break;
        case 'id_distancia':
            $result = 'Selecciona la distancia';
            break;
        case 'id_categoria':
            $result = 'Elige tu categoría';
            break;
        case 'id_corral':
            $result = 'Corral';
            break;
        case 'equipo':
            $result = 'Nombre de tu equipo';
            break;
        case 'contacto_emerg':
            $result = 'Nombre del contacto de emergencia';
            break;
        case 'tel_emerg':
            $result = 'Teléfono del contacto de emergencia';
            break;
        case 'num_personas':
            $result = '¿Cuántas personas te acompañan? (no ciclistas)';
            break;
        default:
            $result = '';
    }
    return $result;
}

function GetDivRowIni($key,$attribute)
{
    $result = '';
    $i = $key+1;
    switch ($attribute) {
        case 'c_terminos_condiciones':
        case 'c_reglamento':
        case 'c_menor_de':
        case 'c_conformidad':
        case 'c_conocimiento':
            $result = '';
            break;
        default:
            if (!($i%2==0)) {
                $result = '<div class="row">';
            } else {
                $result = '';
            }
    }
    return $result;
}

function GetDivRowFin($key,$attribute)
{
    $result = '';
    $i = $key+1;
    switch ($attribute) {
        case 'c_terminos_condiciones':
        case 'c_reglamento':
        case 'c_menor_de':
        case 'c_conformidad':
        case 'c_conocimiento':
            $result = '';
            break;
        default:
            if ($i%2==0) {
                $result = '</div>';
            } else {
                if ($attribute == 'num_personas') {
                    $result = '</div>';
                } else {
                    $result = '';
                }
            }
    }
    return $result;
}

function GetCelTel($attribute)
{
    switch ($attribute) {
        case 'celular':
            $result = 'celular';
            break;
        case 'otr_tel':
        case 'tel_emerg':
            $result = 'telefono';
            break;
        default:
            $result = '';
    }
    return $result;
}

function GetTypee($attribute)
{
    switch ($attribute) {
        case 'fec_nacimiento':
            $result = 'date';
            break;
        case 'edad':
        case 'num_personas':
            $result = 'number';
            break;
        default:
            $result = 'text';
    }
    return $result;
}

function Getonchange($attribute,$vip)
{
    switch ($attribute) {
        case 'id_genero':
            $result = 'onchange="SelectGenero(this); return false;"';
            break;
        case 'id_distancia':
            $result = 'onchange="SelectDistancia(this); return false;"';
            break;
        case 'id_categoria':
            $result = 'onchange="SelectCategoria(this,'.$vip.'); return false;"';
            break;
        default:
            $result = '';
    }
    return $result;
}

function GetSisTip($attribute)
{
    switch ($attribute) {
        case 'id_genero':
            $result = SisTip::SisTipDetPadCero(1);
            break;
        case 'id_talla_jersey':
            $result = SisTip::SisTipDetPadCero(4);
            break;
        case 'id_talla_calcetas':
            $result = SisTip::SisTipDetPadCero(13);
            break;
        case 'id_distancia':
            $result = SisTip::SisTipDetPadCero(17);
            break;
        default:
            $result = null;
    }
    return $result;
}

function GetSisTipCero()
{
    $tipempty = SisTip::find(0);
    return '<option value="'.$tipempty->id_tip.'">'.$tipempty->des.'</option>';
}

function GetColumns($attribute)
{
    switch ($attribute) {
        case 'c_terminos_condiciones':
        case 'c_reglamento':
        case 'c_menor_de':
        case 'c_conformidad':
        case 'c_conocimiento':
            $result = 'form-group';
            break;
        default:
            $result = 'col-md-6 form-group';
    }
    return $result;
}

function GetCategorias($id_genero,$id_distancia)
{
    $result = '';
    if ($id_genero > 0 && $id_distancia > 0) {
        $result = Categoria::Categorias($id_genero,$id_distancia);
    } else {
        $result = Categoria::Where('id_categoria',0)->first();
    }
    return $result;
}


function EncryptCompetidor(Competidor $competidor)
{
    $result = null;
    try {
        $result = Crypt::encryptString($competidor->toJson());
    } catch(\Exception $e) {
        $result = null;
    }
    return $result;
}




