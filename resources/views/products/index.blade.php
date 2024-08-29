
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
<h1>Produncts Table</h1>

<div class="message">
@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success')}}
</div>
@endif


    
</div>




<a href="{{route('products.create')}}" style="margin-left:30px; margin-right:1000px;" class="btn btn-primary ">Create</a>
<br>

<table class="table">
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      <th scope="col">Category</th>
      <th scope="col">Status</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($products as $product)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$product->name}}</td>
      <td>{{$product->price}}</td>
      <td>{{$product->description}}</td>
      <td>{{$product->quantity}}</td>
      <td>{{$product->category}}</td>
      <td>{{$product->status}}</td>
      <td><a href="{{asset('uploads').'/'.$product->image}}" target='_blank'><img src="{{asset('uploads').'/'.$product->image}}" width="60" height="60" alt="" ></a></td>
      <td><a href="{{route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a>|<a href="{{route('products.delete',$product->id)}}" class="btn btn-danger">Delete</a></td>
  
    </tr>

    @empty

    <td>No Data</td>

    @endforelse
  </tbody>
</table>
</body>
</html>

@endsection