<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
</head>
<body>
     @include('header')
      <div>
         <h2>Sign up</h2>
        <form action="/signUp" method="post">
              @csrf
            <ul>
                <li><input type="text" name="name" id="name" placeholder="Username"></li>
                @error('name')
                     <li class="error"> {{$message}}</li>
                @enderror
                <li><input type="email" name="email", id="email", placeholder="Email"></li>
                  @error('email')
                     <li class="error"> {{$message}}</li>
                @enderror
                <li><input type="password" name="password", id="password", placeholder="Password"></li>
                  @error('password')
                     <li class="error"> {{$message}}</li>
                @enderror
                <li><input type="password" name="rePassword", id="rePassword", placeholder="re-enter Password"></li>
                  @error('rePassword')
                     <li class="error"> {{$message}}</li>
                @enderror
                <li><button type="submit">Sign up</button></li>
            </ul>
        </form>
      </div>

</body>
</html>