
@extends('backend.master')
@section('content')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
    table{
        background-color:cyan;
        margin-left:0px;

    }

    thead{
        background-color:black;
        color:white;
    }
    h1{
        text-align:center;
        margin-top:10px;
    }
    img{
      border-radius:5%;
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
<h1>Carts_details Table</h1>
<div class="message">
@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success')}}
</div>
@endif


    
</div>

<table class="table">
  <thead>
 <tr>
      <th scope="col">S.N</th>
      <th scope="col">Cart_id</th>
      <th scope="col">Product_id</th>
      <th scope="col">Quantity</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($carts_details as $jp)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$jp->cart_id}}</td>
      <td>{{$jp->product_id}}</td>
      <td>{{$jp->quantity}}</td>
      <td><a href="{{route('carts_details.edit',$jp->id)}}" class="btn btn-primary">Edit</a>|<a href="{{route('carts_details.delete',$jp->id)}}" class="btn btn-danger">Delete</a></td>
        
    </tr>

    @empty

    <td>No Data</td>

    @endforelse
  </tbody>
</table>
</body>
</html>
@endsection