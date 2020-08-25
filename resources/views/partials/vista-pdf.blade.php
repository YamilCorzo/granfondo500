<style type="text/css">
*
#hoja{
    width: 100%;
    height: 900px;
}
p{
    font-size: 14px;
}
#titulo{
    width: 100%;
}
.atributos{
    display: block;
    width: 33%;
    float: left;
}

.clearfix{
    float: none;
    clear: both;
}

.labels{
    text-align: center;
}
.text{
    text-align: justify;
}

</style>

<div id="hoja">
    <div id="titulo">
        <p class="labels">2a. Edición "GRAN FONDO 500 VERACRUZ 2021"</p>
        <p class="labels">GF 500 A.C. PRESENTE: </p>
    </div>

    <div id="caja">
        <div class="atributos">
            <p class="labels">Nombre: <strong>{{ $competidor->nombre }}</strong><p>
        </div>
        <div class="atributos">
            <p class="labels">Categoria: <strong>{{$competidor->Categoria()}}</strong><p>
        </div>
        <div class="atributos">
            <p class="labels">Número de competidor: <strong>{{ $competidor->id_competidor }}</strong><p>
        </div>
    </div>

    <div class="clearfix">
        <div class="atributos">
            <p class="labels">Contacto en caso de accidente: <strong>{{ $competidor->contacto_emerg }}</strong><p>
        </div>
        <div class="atributos">
            <p class="labels">Celular del contacto: <strong>{{ $competidor->celular }}</strong><p>
        </div>
    </div>

    <div class="clearfix">
        <div class="atributos">
            <p class="labels">Compañia de seguro: <strong>{{ $competidor->compania_seguros }}</strong><p>
        </div>
        <div class="atributos">
            <p class="labels">Numero de poliza: <strong>{{ $competidor->no_poliza }}</strong><p>
        </div>
    </div>

    <div class="clearfix">
        <p class="text">
            POR LA PRESENTE SOLICITO SE AUTORICE MI PARTICIPACIÓN EN ESTE EVENTO CICLISTA QUE SE LLEVARÁ A CABO EL DÍA 6 DE JUNIO
            DEL 2021, EN EL ESTADO DE VERACRUZ; MANIFESTANDO QUE PRACTICO HABITUALMENTE EL CICLISMO COMO DEPORTE Y QUE MI
            ESTADO DE SALUD ES EXCELENTE Y MI CONDICION FISICA ME PERMITE REALIZAR DEPORTES DE ALTO RENDIMIENTO ASÍ COMO PODER
            CONCLUIR LA RUTA DEL EVENTO Y POR ELLO ACEPTO SER EL UNICO RESPONSABLE POR LOS ESFUERZOS QUE REALICE Y LAS
            COMPLICACIONES QUE EN SU CASO PUDIERAN PRODUCIRSE EN MI SALUD; RESPONSABILIZÁNDOME PLÉNAMENTE POR LA ADECUADA
            CONDUCCIÓN DE MI BICICLETA Y LOS DAÑOS Y LESIONES QUE SE PUEDAN GENERAR POR UN INADECUADO MANEJO DE LA BICICLETA.
            RECONOZCO CONOCER EL REGLAMENTO Y LAS NORMAS DEL EVENTO, COMPROMETIÉNDOME A ACATARLAS Y SEGUIR LAS
            INSTRUCCIONES DE LA ORGANIZACIÓN Y AUTORIDADES, SIENDO SABEEDOR QUE EN CASO DE INCUMPLIRLAS PODRÍA SER
            SANCIONADO E INCLUSIVE EXPULSADO INMEDIATAMENTE DE LA COMPETENCIA Y EVENTO SIN QUE TENGA DERECHO A REEMBOLSO O
            BONIFICACIÓN ALGUNA.
            </p>

            <p class="text">
            DECLARO SABER QUE EL CICLISMO ES UN DEPORTE DE ALTO RIESGO Y QUE EL DESARROLLO DEL EVENTO IMPLICA RODAR EN GRUPO
            CON OTROS CICLISTAS, ADEMÁS DE QUE SE REALIZA POR VIAS DE COMUNICACIÓN DESTINADAS A VEHÍCULOS AUTOMOTORES, POR LO
            QUE TENGO CONOCIMIENTO DE LAS NORMAS DE CONDUCCIÓN EN ESAS VÍAS, ASÍ COMO LOS RIESGOS QUE ESTO IMPLICA, POR LO
            QUE EN CASO DE QUE SUCEDA ALGÚN ACCIDENTE EN EL QUE PUEDA RESULTAR DAÑADO ALGUN BIEN DE MI PROPIEDAD, LESIONADO
            EN MI PERSONA O INCLUSO PERDER LA VIDA, DE NINGUNA FORMA SERA RESPONSABILIDAD CIVIL, PENAL, MORAL O DE NINGUNA OTRA
            ESPECIE DE “GRAN FONDO 500 VERACRUZ”, “EDDY´S BIKES” NI DE LAS PERSONAS FISICAS QUE LO REPRESENTAN, POR LO QUE DESDE
            ESTE MOMENTO LES EXTIENDO EL FINIQUITO MAS AMPLIO QUE EN DERECHO PROCEDA, PARA TODOS LOS EFECTOS LEGALES A QUE
            HAYA LUGAR.
            </p>

            <p class="text">
            PARA LA INTERPRETACIÓN Y CUMPLIMIENTO DE ESTE INSTRUMENTO ME SOMETO A LA JURISDICCION Y COMPETENCIA DE LOS
            TRIBUNALES DE BOCA DEL RIO, VER. RENUNCIANDO AL FUERO QUE POR CUALQUIER OTRA RAZÓN PUDIERA CORRESPONDERME.
        </p>
    </div>

    <div class="clearfix">
        <p class="labels">5 de junio del 2021</p>

        <p class="labels">_______________________________</p>
        <p class="labels">{{ $competidor->nombre }}<p>
    </div>

    <hr>

</div>
