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
            margin-left: auto; 
            margin-right: auto;
            border:1px solid black;
            border-collapse: collapse;
            border-spacing: 15px;
        }
    </style>
</head>
<body>
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
                <td style="border-right: 1px solid grey; border-spacing: 15px;">{{$item['preu'] * $item['counter']}}€</td>
            </tr>
        @endforeach
        
    </table>
</body>
</html>