<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/show.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/all.css')}}">
</head>
<body>

    <table class="table">
        <thead>
            <tr>
                <th>#id</th>
                <th>firstName</th>
                <th>lastName</th>
                <th>email</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>update</th>
                <th>delete</th>
            </tr>
        </thead>

        <tbody>
            @isset($users)
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->firstName}}</td>
                        <td>{{$user->lastName}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td> <a href="{{route('taske.edit', $user->id)}}">update <i class="fa-sharp fa-solid fa-pen-to-square"></i></a> </td>
                        <td> <a href="{{route('taske.delete', $user->id)}}">delete <i class="fa-sharp fa-solid fa-delete-left"></i></a> </td>
                    </tr>
                @endforeach
            @endisset
        </tbody>

    </table>

    <a href={{route('taske.register')}}>Add</a>

</body>
</html>
