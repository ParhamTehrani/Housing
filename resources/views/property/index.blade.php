<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Housing</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>

<table style="width:100%">
    <tr>
        <th>Address</th>
        <th>Users</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    @foreach($properties as $val)
        <tr>
            <td>
                <?php
                echo $address=\App\Models\Address::where('id',$val->address_id)->first()->house_name_number;
                ?>
            </td>
            <td>
                @foreach($val->user as $value)
                    {{$value->lastName}}
                @endforeach
            </td>
            <td>
                <a href="/property/{{$val->id}}/edit/" >edit</a>
            </td>
            <td>
                <form action="{{url('property/'.$val->id.'destroy')}}" method="post">
                    {{ method_field('delete') }}
                    {{csrf_field()}}
                    <button type="submit" >delete</button>
                </form>
            </td>
        </tr>
    @endforeach

</table>
</body>
</html>
