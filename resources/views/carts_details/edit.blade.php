

@extends('backend.master')
@section('content')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 <style>
  h1{
    margin-left:50px;
    margin-top:20px;
  }
  form{
    background-color:cyan;
    margin-left:50px;
    margin-top:20px;
    margin-right:100px;
    align:center;
  }
 </style>


  </head>
<body>
<h1>Carts_details Table</h1>
<form action='{{route("carts_details.update",$carts_details->id)}}' enctype="multipart/form-data" method='POST'>
@csrf
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Cart_id</label>
    <input type="text" name="cart_id" class="form-control" id="" aria-describedby="emailHelp" value="{{$carts_details->cart_id}}">
  </div>
  
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Product_id</label>
    <input type="text" name="product_id" class="form-control" id="" aria-describedby="emailHelp" value="{{$carts_details->product_id}}">
  </div>

    
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Quantity</label>
    <input type="text" name="quantity" class="form-control" id="" aria-describedby="emailHelp" value="{{$carts_details->quantity}}">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
</body>
</html>
@endsection