

@extends('backend.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<style>
    h1{
        text-align:center;
        margin-top:10px;
    }
    .table{
        background-color:cyan;
       
    }
    thead{
        background-color:black;
        color:white;
    }
    .message{
        text-align:center;
        margin-left:400px;
        margin-right:400px;
        color:white;
        font-size:20px;
    }

</style>


</head>
<body>
    <h1>CRUD Operations...!!</h1>
    

    <div class="message">
    @if(session()->has('message'))
        <div class="alert  bg-success">
        {{session()->get('message')}}
        </div>
    @endif
</div>





    <br> 
       <a href="{{route('users.create')}}" style="margin-left:30px; margin-right:1000px;" class="btn btn-primary">Create</a>
       <br> 

    <table border="1" class='table'>
<thead>
    <tr>
        <th>S.N</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
</thead>

<tbody>
   @foreach($users as $item)
   <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{ $item->name}}</td>
    <td>{{$item->email}}</td>
    <td>{{$item->phone}}</td>
    <td><a href="{{asset('uploads_user').'/'.$item->image}}"><img src="{{asset('uploads_user').'/'.$item->image}}" width="60" height="60" alt=""></a></td>
    <td><a href="{{route('users.edit',$item->id)}}" class="btn btn-secondary">Edit</a>|<a href="{{route('users.delete',$item->id)}}" class="btn btn-danger">Delete</a></td>
   </tr>
   @endforeach
</tbody>
    </table>
</body>
</html>
@endsection