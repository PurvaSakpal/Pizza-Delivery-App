<!doctype HTML>
<html>
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>login page</title>
    @include('admin.includes.head')
    </head>
    <body>
        <div class="container">
            <nav>
                @include('admin.includes.loginNav')
            </nav>
            <div>
            <div class="jumbotron">
                <h1 class="display-4">Pizza Delivery</h1>
                <p class="lead">Welcome to pizza delivery service. This is the place from where you can choose the most delicious pizza you like from wide variety of options !</p>
                <hr class="my-4">
                <p>Free Delivery Availabe on order above Rs. 200.</p>
                <p class="lead">
                    <a class="btn btn-dark btn-lg col-12" href="{{route('login')}}" role="button">Sign In and Order</a>
                </p>
                </div>
            </div>
        </div>
       @include('admin.includes.script') 
    </body>
</html>