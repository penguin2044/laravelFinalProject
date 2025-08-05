<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>category</title>
</head>

<body>
    @include('header')

    @auth
        <div>
            <h2>Categories</h2>
            @foreach ($categories as $category)
                <div>
                    <h3>{{$category->name}}</h3>
                    <a href="/edit/{{$category->id()}}"></a>
                    <a href="/delete/{{$category->id()}}"></a>
                </div>
            @endforeach
        </div>
        <div>

            <h2>Create a category</h2>
            <form action="/createCategory" method="post">
                <ul>
                    <li><input type="text" name="name" id="name"></li>
                </ul>
            </form>

        </div>
    @endauth

</body>

</html>