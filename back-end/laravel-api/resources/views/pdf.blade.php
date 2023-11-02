<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            width: 90%; 
            margin: auto; 
            border:1px solid black;
            border-collapse: collapse;
            border-spacing: 15px;
        }
        .page_break { page-break-after: always; }
    </style>
</head>
<body>
    <table>
        <tr>
            <th colspan="2">INFORMACIÓ DE LA COMANDA</th>
        </tr>
        <tr>
            <td colspan="1">Número de comanda: {{$dades[1]["idComanda"]}}</td>
            <td colspan="1">Nom: {{$dades[2]["usuari"]["name"]}} {{$dades[2]["usuari"]["surnames"]}}</td>
        </tr>
        <tr>
            <td>Data de la comanda: {{ date('d-m-Y ') }}</td>
            <td>Estat: Rebut</td>
        </tr>
    </table>
    <table>
        <tr>
            <th style="text-align: left; width:40%; border-bottom: 1px solid grey; border-right: 1px solid grey">Producte</th>
            <th style="text-align: left; width:25%; border-bottom: 1px solid grey; border-right: 1px solid grey">Quantitat</th>
            <th style="text-align: left; width:25%; border-bottom: 1px solid grey; border-right: 1px solid grey">Preu unitari</th>
            <th style="text-align: left; width:10%; border-bottom: 1px solid grey">Preu</th>
        </tr>
        @foreach ($dades[0]["items"] as $item)
            <tr>
                <td style="border-right: 1px solid grey; border-spacing: 15px;">{{$item['nom']}}</td>
                <td style="border-right: 1px solid grey; border-spacing: 15px;">{{$item['counter']}}</td>
                <td style="border-right: 1px solid grey; border-spacing: 15px;">{{$item['preu']}}€</td>
                <td style="border-spacing: 15px;">{{$item['preu'] * $item['counter']}}€</td>
            </tr>
        @endforeach
    </table>
    <table>
        <tr>
            <th style="text-align: right;">Preu total: {{$dades[3]["total"]}}€</th>
        </tr>
    </table>
    <div style="margin-left: auto;margin-right: auto; ">
        <h3>Et deixem el QR per poder recollir la teva comanda a una tenda!</h3>
        <img src="data:image/png;base64,{{ $dades['codiQR']}}">
    </div>
    
</body>
</html>