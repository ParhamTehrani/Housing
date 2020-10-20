<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Housing</title>

</head>
<body>
<form action="{{url("/property/".$property->id."update")}}" method="post">
    @csrf
    {{method_field('PATCH')}}
    <select name="address_id" id="">
        <option value="{{$selectedAddress->id}}" selected disabled>{{$selectedAddress->house_name_number}}</option>
        @foreach($address as $val)
            <option value="{{$val->id}}">{{$val->house_name_number}}</option>
        @endforeach
    </select>
    @foreach($user as $val)
        <label >
            {{$val->lastName}}
        </label>
        <input  name="user_id[]" type="checkbox" value="{{$val->id}}" checked >
    @endforeach
    {{--<select name="user_id[]" id="" multiple>

        @foreach($user as $val)
            <option value="{{$val->id}}">{{$val->lastName}}</option>
        @endforeach
    </select>--}}
    <input type="submit">
</form>
</body>
</html>
