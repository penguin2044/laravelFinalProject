<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
     @include('header')
      <div>
         <h2>Login</h2>
        <form action="/login" method="post">
            @csrf
            <ul>
                <li><input type="text" name="name" id="name" placeholder="Username" value="{{old('name')}}"></li>
                @error('name')
                     <li class="error"> {{$message}}</li>
                @enderror
               
                <li><input type="password" name="password", id="password", placeholder="Password" ></li>
                  @error('password')
                    <li class="error"> {{$message}}</li>
                @enderror
                @error('loginError')
                    <li class="error"> {{$message}}</li>
                @enderror
                <li><button type="submit">Login</button></li>
            </ul>
        </form>
      </div>
</body>
</html>