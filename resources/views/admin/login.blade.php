
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <base href="http://localhost/minyproject/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('client/images/trang-chu/logo.png')}}">
</head>
<style type="text/css">
    input[type=text] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
    }
    #mess{
        text-align: center;
        font-style: italic;
        color: red;
    }
</style>
<body>
<div class="login">

    <div class="form_login">

        <form action="{{ url('admin/login') }}" method="post" class="container">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <h1>Login</h1>
            <label for="user"><b>Username:</b></label>
            <input type="text" name="username" placeholder="Enter Username" value="{{ old('username') }}">
                @if($errors->has('username'))
                    <p style="color: red; font-style: italic; font-size: 12px;">{{ $errors->first('username') }}</p>
                    @endif

            <label for="pass"><b>Password:</b></label>
            <input type="password" name="password" placeholder="Enter Password" id="pass" >
            @if($errors->has('password'))
                <p style="color: red; font-style: italic; font-size: 12px;">{{ $errors->first('password') }}</p>
                @endif
            <input type="checkbox" onclick="showpass();" name="">Show password
            <div id="mess">
                @if ($errors->has('errorlogin'))
                    <div>
                        <p>{{ $errors->first('errorlogin') }}</p>
                    </div>
                @endif
            </div>
            <input type="submit" name="ok" value="Login" class="btn1">

        </form>
    </div>
</div>
</body>
<script src="{{asset('admin/js/login.js')}}"></script>

</html>