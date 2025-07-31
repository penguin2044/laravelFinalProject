<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a post</title>
</head>
<body>
    @include('header')
    <form action="/createPost" method="POST"  enctype="multipart/form-data">
        @csrf
        <ul>
            <li><input type="text" name="title" id="title" placeholder="Title" value="{{old('title')}}"></li>
            @error('title')
                <li class="error">{{$message}}</li>
            @enderror
            <li><label for="image"> Main Image:</label> <input type="file" name="image" id="image"></li>
            @error('image')
                <li class="error">{{$message}}</li>
            @enderror
            <li><label for="category">Post category: </label>
                <select name="category" id="category">
                @foreach ($categories  as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
                 </select></li>
            @error('category')
                <li class="error">{{$message}}</li>
            @enderror
            <li><textarea name="body" id="body" cols="30" rows="5" placeholder="main text goes here">{{old('body')}}</textarea></li>
            @error('body')
                <li class="error">{{$message}}</li>
            @enderror
            <li><button type="submit">Create Post</button></li>
        </ul>
    </form>
</body>
</html>