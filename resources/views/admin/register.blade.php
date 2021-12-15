<!doctype HTML>
<html>
    <head>
        @include('admin.includes.head')
        <title>Register page</title>
    </head>
    <body>
        <div class="container">
        <nav>
            @include('admin.includes.loginNav')
        </nav>
        @if(Session::has('user_registered'))
            <div class="alert alert-success">{{Session::get('user_registered')}}</div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
        @endif
        <form action="{{route('postRegister')}}" method="post">
                @csrf()
                <h1 class="text-info text-center">Sign Up</h1>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
                    <div class="col-10">
                        <input type="text" class="form-control form-control-lg" id="name" name="name" placeholder="Enter name">
                    </div>
                </div>
                @if($errors->has('name'))
        <div class="alert alert-danger">{{$errors->first('name')}}</div>
            @endif
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label col-form-label-lg">Password</label>
                    <div class="col-10">
                        <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your password">
                    </div>
                </div>
                @if($errors->has('password'))
        <div class="alert alert-danger">{{$errors->first('password')}}</div>
            @endif
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
                    <div class="col-10">
                        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter email">
                    </div>
                </div>
                @if($errors->has('email'))
        <div class="alert alert-danger">{{$errors->first('email')}}</div>
            @endif
                <div class="form-group row">
                    <label for="mobileNo" class="col-sm-2 col-form-label col-form-label-lg">Mobile No</label>
                    <div class="col-10">
                        <input type="text" class="form-control form-control-lg" id="mobileNo" name="mobileNo" placeholder="Enter mobile number">
                    </div>
                </div>
                @if($errors->has('mobileno'))
        <div class="alert alert-danger">{{$errors->first('mobileNo')}}</div>
            @endif
                <div class="form-group row">
                    <label for="address" class="col-sm-2 col-form-label col-form-label-lg">Address</label>
                    <div class="col-10">
                        <textarea name="address" id="address" class="form-control form-control-lg" cols="30" rows="7" placeholder="Enter your address"></textarea>
                    </div>
                </div>
                @if($errors->has('address'))
                    <div class="alert alert-danger">{{$errors->first('address')}}</div>
                @endif
                <div class="form-group row">
                    <label for="" class="col-2"></label>
                <div class="col-sm-10 col-lg-10">
                    <button type="submit" class="btn btn-info btn-lg" name="reg">Register</button>
                </div>
                </div>
            </form>
        </div>
        @include('admin.includes.script')
    </body>
</html>