<!doctype HTML>
<html>
    <head>
        @include('admin.includes.head')
        <title>Login Page</title>
    </head>
    <body>
        <div class="container">
            <nav>
            @include('admin.includes.loginNav')
            </nav>
            <h1 class="text-dark">Login</h1>
            <form action="{{route('postLogin')}}" method="post">
                @csrf()
                <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter email">
                </div>
                @if($errors->has('email'))
                <div class="alert alert-danger">{{$errors->first('email')}}</div>
                @endif
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your password">
                </div>
                @if($errors->has('password'))
                <div class="alert alert-danger">{{$errors->first('password')}}</div>
                @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-lg" name="login">Login</button>
                </div>
            </form>
        </div>
        @include('admin.includes.script')
    </body>
</html>