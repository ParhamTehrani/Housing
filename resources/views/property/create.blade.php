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
<form action="/property" method="post">
    @csrf
<select name="address_id" id="">
    @foreach($address as $val)
    <option value="{{$val->id}}">{{$val->house_name_number}}</option>
    @endforeach
</select>
    <div>
    @foreach($user as $val)
        <div>
            <label>
                {{$val->lastName}}
            </label>
            <input  name="user_id[]" type="checkbox" value="{{$val->id}}" checked >
        </div>
    @endforeach
    </div>
    <input type="submit">
</form>
</body>
</html>
