<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Informe de inicio</title>
    <style>
        @page {
            size: letter;
            margin: 2cm 3cm 1cm 3cm;
        }

        @font-face {
            font-family: "Verdana";
            src: url("{{ public_path('storage/fonts/verdana.ttf') }}") format('truetype');
        }

        html {
            font-family: Verdana;
        }

        body {
            margin-top: 3cm;
            margin-bottom: 3cm;
            height: 100%;
            width: 100%;
            background-image: url('{{ public_path('reportes/informe_de_inicio/bg.png') }}');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            display: flex;
            flex-direction: column;
        }

        p {
            text-align: justify;
            z-index: 2;
        }

        mark {
            background-color: #FEF2CD;
        }

        .texto-centrado {
            text-align: center;
        }

        /* Estas líneas de código son el resultado de una búsqueda por internet de 40 días y 40 noches */
        .header, .footer {
            position: fixed;
            height: 3cm;
            width: 15.5cm;
        }

        .header {
            top: 0;
        }

        .footer {
            bottom: 0;
        }

        .watermark {
            position: fixed;
            /*
            ** Estos valores son para eliminar el margin declarado en @page
            ** pues se espera que este al borde inferior derecha
            */
            bottom: -1cm;
            right: -3cm;
            z-index: -2;
        }

        .etiqueta {
            font-weight: bold;
        }

        .dato {
            text-align: center;
            font-size: 12px;
        }

        table, th, td {
            border: 1px solid;
            border-collapse: collapse;
            width: 100%;
        }

        h1 {
            font-family: Verdana;
            font-weight: normal;
        }
    </style>
</head>

<body>
<!--Header-->
<div class="header">
    <img style="width: 100%" src="{{ public_path('reportes/informe_de_inicio/header.png') }}"
         alt="header-image">
</div>

<!--Footer-->
<div class="footer">
    <p style="position: absolute">
        Enríquez s/n, Zona Centro <br>
        C.P. 91000, Xalapa, Veracruz, México <br>
        Tel. 01 (228) 841 7400 Ext. 3531 <br>
        <b>www.segobver.gob.mx</b>
    </p>
    <img style="position: absolute; width: 100%" src="{{ public_path('reportes/informe_de_inicio/footer_1.png') }}"
         alt="banda-footer">

    <img style="width: 1.6in; position: absolute; right: .8in; top: .2in"
         src="{{ public_path('reportes/informe_de_inicio/footer_2.png') }}"
         alt="leyenda-veracruz">
</div>

<!--Watermark-->
<div class="watermark">
    <img style="width: 2in" src="{{ public_path('reportes/informe_de_inicio/footer_3.png') }}"
         alt="leyenda-200-años">
</div>

<!--Content-->
<p> Lugar: Xalapa, Ver..</p>
<p> Fecha y hora: @yield('fecha-actual'). </p>

<h1> Datos del reportante </h1>

<table>
    <tr>
        <td class="etiqueta"> Nombre completo: </td>
        <td colspan="3" class="dato"> @yield('nombre-completo-reportante') </td>
    </tr>

    <tr>
        <td class="etiqueta"> Edad y fecha de nacimiento: </td>
        <td class="dato"> @yield('edad-reportante') @yield('fecha-nacimiento-reportante')</td>
        <td class="etiqueta"> Sexo y género: </td>
        <td class="dato"> @yield('sexo-reportante') </td>
    </tr>

    <tr>
        <td class="etiqueta"> CURP: </td>
        <td class="dato"> @yield('curp-reportante') </td>
        <td class="etiqueta"> INE: </td>
        <td class="dato"> {{ "987987AASDAS" }} </td>
    </tr>

    <tr>
        <td class="etiqueta"> Estado civil: </td>
        <td colspan="3" class="dato"> {{ "Soltero" }} </td>
    </tr>

    <tr>
        <td class="etiqueta"> Religión: </td>
        <td class="dato"> @yield('religion-reportante') </td>
        <td class="etiqueta"> Lengua: </td>
        <td class="dato"> @yield('lengua-reportante') </td>
    </tr>

    <tr>
        <td class="etiqueta"> Escolaridad: </td>
        <td class="dato"> {{ "IUCT910921HVZZRN08" }} </td>
        <td class="etiqueta"> Ocupación: </td>
        <td class="dato"> {{ "987987AASDAS" }} </td>
    </tr>

    <tr>
        <td class="etiqueta"> Domicilio: </td>
        <td colspan="3" class="dato"> {{ "IUCT910921HVZZRN08" }} </td>
    </tr>

    <tr>
        <td class="etiqueta"> Telefonos: </td>
        <td colspan="3" class="dato"> @yield("telefonos-reportante") </td>
    </tr>

    <tr>
        <td class="etiqueta"> Correos electronicos: </td>
        <td colspan="3" class="dato"> @yield("correos-reportante") </td>
    </tr>
</table>

</body>
</html>
