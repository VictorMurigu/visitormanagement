<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Custom Authentification </title>
    </head>

    <body>

        <div class="py-5 content center">
            <div class="d-flex justify-content-center align-items-center">
                <div class="title">
                    <img src="/img/judiciary-img1.png" alt=""><br />
                </div>
            </div>

            <div class="d-flex justify-content-center align-items-center">
            <div class="mt-5" style="margin-top:20px; width: 500px;">
                <h4>Login Here</h4>
                <form action="{{url('login-user')}}" method="POST" autocomplete="on">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if (Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value="{{old('email')}}">
                        <span class="text-danger">@error('email')
                            {{$message}}
                            @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" value="{{old('password')}}">
                        <span class="text-danger">@error('password')
                            {{$message}}
                            @enderror</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <br>
                    <a href="{{url('registration')}}">Registration Here !</a>
                </form>
            </div>
            </div>
        </div>



    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</html>
