<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

<form action='{{route("users.update",$user->id)}}' enctype="multipart/form-data" method='POST'>
@csrf
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="" value="{{$user->name}}"   aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="" value="{{$user->email}}"  aria-describedby="emailHelp">
  </div>


  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone</label>
    <input type="text" name="phone" class="form-control" id="" value="{{$user->phone}}"  aria-describedby="emailHelp">
  </div>



  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password"  name="password"    class="form-control" id=""  value="{{$user->password}}">
  </div>

  
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Image</label>
    <input type="file"  name="image" class="form-control" id="">
  </div>

  @if($user->id)

  <a href="{{asset('uploads_user').'/'.$user->image}}" target='_blank'><img src="{{asset('uploads_user').'/'.$user->image}}" width="50" height="50" alt=""></a>
 
  @endif

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
</body>
</html>