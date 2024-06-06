<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, td, th {
          border: 1px solid;
          height: 40px;
        }
        
        table {
          width: 50%;
          border-collapse: collapse;
        }
    </style>  
</head>
<body>   
    <h2>Cities</h2>   
    <table>
        <tr style="background-color: rgb(132, 210, 210)">
            <th style="width:20%">ID</th>
            <th style="width:50%">Name</th>
            <th style="width:20%">ID</th>
            <th style="width:50%">Name</th>
        </tr>
        @foreach ($cities as $city)
            <tr style="background-color: rgb(249, 250, 252)">
                <td>{{$city->id}}</td>
                <td>{{$city->name}}</td>
                <td>{{$city->id}}</td>
                <td>{{$city->name}}</td>
            </tr> 
        @endforeach
        
    </table>
</body>
</html>