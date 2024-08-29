<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body{
            background-image:url("assets/images/radio/register1.jpeg");
        }
        .main{
            background-color:rgba(0,0,0,0.6);
            color:black;
            border-radius:3%;
            margin-top:0px;
            margin-left:400px;
            margin-right:400px;
            height:650px;

            padding-top:0px;
            padding-left:100px;
            padding-right:100px;
          
        }
.main h1{
    text-align:center;
    color:white;
    padding-top:10px;
    text-align:center;
}

form{
    color:white;
}
       
.btn{
    margin-top:15px;
}
    </style>




</head>
<body>
    
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 


@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success')}}
</div>
@endif


@if(session('error'))
<div class="alert alert-danger  " role="alert">
    {{ session('error')}}
</div>
@endif


<div class="main">
<h1>Register</h1>

<form action="{{route('register.store')}}"  method="POST">
    @csrf
<div class="mb-2">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="" name="name"  aria-describedby="emailHelp">
</div>

<div class="mb-2">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="" name="username"  aria-describedby="emailHelp">
</div>


  <div class="mb-2">
    <label for="exampleInputEmail1" class="form-label">Email </label>
    <input type="email" class="form-control" id="" name="email"  aria-describedby="emailHelp">
</div>


<div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">Contact</label>
    <input type="text" class="form-control"  name="phone" id="">
 </div>
 


<div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control"  name="password" id="">
 </div>
 
 
<div class="mb-2">
    <label for="exampleInputPassword1" class="form-label">Confirm_Password</label>
    <input type="password" class="form-control"  name="password_confirmation" id="">
 </div>

 
 
  <button type="submit" class="btn btn-primary rounded-pill">Register</button>
</form>
</div>


</body>
</html>