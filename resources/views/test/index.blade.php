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
          width: 80%;
          border-collapse: collapse;
        }
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>  
</head>
<body>   
    <h2>Cities</h2>     
    <table>
        <tr style="background-color: rgb(132, 210, 210)">
            <th style="width:10%">ID</th>
            <th style="width:30%">Name</th>
            <th style="width:40%">Members</th>
            <th style="width:20%">Action</th>
        </tr>
        @foreach ($cities as $city)
            <tr style="background-color: rgb(249, 250, 252)">
                <td>{{$city->id}}</td>
                <td>{{$city->name}}</td>
                {{-- <td>{{dd($city->getMemberByCity)}}</td> --}}
                <td>
                    @if($city->getMemberByCity() != null)
                    {{ getMembersNameByCity($city->getMemberByCity)}}
                        {{-- @foreach($city->getMemberByCity as $member) 
                            {{ $member->username}},
                        @endforeach --}}
                    @endif
                </td>
                <td>
                    <a href="{{url('test/city/edit/' . $city->id)}}">Edit</a>
                    <a href="{{url('test/city/delete/' . $city->id)}}">Delete</a>
                </td>
            </tr> 
        @endforeach       
    </table>
    <br>

    <table>
        <h2>Members</h2>  
        <tr style="background-color: rgb(132, 210, 210)">
            <th style="width:10%">ID</th>
            <th style="width:30%">Name</th>
            <th style="width:40%">Members</th>
        </tr>
        @foreach ($members as $member)
            <tr style="background-color: rgb(249, 250, 252)">
                <td>{{$member->id}}</td>
                <td>{{$member->username}}</td>
                <td>
                    {{-- {{dd($member->getCityByMember->name)}} --}}
                    @if($member->getCityByMember() != null)
                        {{ $member->getCityByMember->name }}
                    @endif
                </td>
            </tr> 
        @endforeach       
    </table>
    <br>
    
    <div style="width:500px;margin:0 auto;">
        @if(isset($edit_city))
            <form action="{{ route('post.form.update')}}" method="POST">
                <input type="hidden" name="id" value="{{ $edit_city->id}}">
        @else
            <form action="{{ route('post.form.store')}}" method="POST">
        @endif
            @csrf
            <label for="city">City Name</label>
            <input type="text" id="city" name="city" placeholder="Enter City name" value="{{ old('city',isset($edit_city) ? $edit_city->name : '')}}">
            @if($errors->has('city'))
                <span style="color:red">{{$errors->first('city')}}</span>            
            @endif
            <input type="submit" value="Submit">
        </form>
    </div> 
</body>
</html>