
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
<h1>Payments Table</h1>
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
      <th scope="col">Orders_id</th>
      <th scope="col">Amount</th>
      <th scope="col">Payment_Type</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($payments as $jp)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$jp->order_id}}</td>
      <td>{{$jp->amount}}</td>
      <td>{{$jp->payment_type}}</td>
      <td><a href="{{route('payments.edit',$jp->id)}}" class="btn btn-primary">Edit</a>|<a href="{{route('payments.delete',$jp->id)}}" class="btn btn-danger">Delete</a></td>
        
    </tr>
    @empty
    <td>No Data</td>
    @endforelse
  </tbody>
</table>
</body>
</html>
@endsection