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
    background-image:url("assets/images/radio/gradient.jpeg");
   
}




        .main{
            background-color:rgba(0,0,0,0.5);
            border-radius:5%;
            color:white;
            margin-top:50px;
            margin-left:480px;
            margin-right:480px;
            height:450px;

            padding-top:0px;
            padding-left:100px;
            padding-right:100px;

            box-shadow:0px 0px 10px 0px rgba(0,0,0,0.1);
         
        }

.main h2{
    text-align:center;
    padding-top:10px;
}
     
.main p{
    margin-top:20px;
    margin-left:10px;
    font-size:15px;

}

.btn{
    margin-top:10px;
    width: 100%;
    
}

.main p{
    margin-top:20px;
    font-size:12px;
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
<h2>Login Form</h2><br>
<form action="{{route('login.check')}}"  method="POST">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="email" class="form-control" id="" name="email"  aria-describedby="emailHelp">
</div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control"  name="password" id="">
 </div>
 
  <button type="submit" class="btn btn-primary rounded-pill">Login</button> &nbsp; &nbsp;
  <a href="{{route('register')}}"  style="color:yellow; "><p>Don't have account? Register here </p></a>
</form>

</div>

</body>
</html>

