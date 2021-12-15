<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.includes.head')
    <title>Menu List</title>
</head>
<body>
    <nav>
        @include('admin.includes.nav')
    </nav>
    <div class="container my-2">
        <h1>Menu</h1>
        <div class="row">
            @foreach ($list as $menu) 
            <div class="col-sm-4 mt-4"> 
                <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="{{URL::asset('/image/'.$menu->image)}}" alt="Card image cap" height="200px">
                <div class="card-body">
                    <h5 class="card-title text-center">{{$menu->name}}</h5>
                    <a href="{{ route('add.to.cart', $menu->id) }}" class="btn btn-primary mr-5">Add to cart</a> <span class="text text-danger ml-5"> RS: {{$menu->price}}</span>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
   @include('admin.includes.script') 
</body>
</html>