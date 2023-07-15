<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Charlily</title>
    <link rel="apple-touch-icon" sizes="180x180" href="public/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="public/favicon-32x32.png">
    <link rel='shortcut icon' href='public/favicon.ico' type='image/x-icon'>


    <link rel="icon" type="image/png" sizes="16x16" href="public/favicon-16x16.png">
    <link rel="manifest" href="public/assets/images/site.webmanifest">
    @vite(['resources/js/app.js'],['resources/css/app.css'])
</head>
<body>
    <div id="login">
        <section>
            <div class="header text-center pt-4">
                <h1 class="text-primary fw-bold">LOGIN</h1>
            </div>  
            <form method="post" action="/handlelogin">
                @csrf  
            <div class="body row pt-4">
                <div class="col-3"></div>

                
                    <div class="card col-6">
                        <div class="card-header text-center">
                            <h5>Please enter your login details</h5>
                        </div>
                        <div class="card-body row text-center">
                            <div class="col-12 mb-3">
                                <label for="">Username</label>
                                <input name="username" type="text" placeholder="Enter username"/>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="">Password</label>
                                <input name="password" type="password" placeholder="Enter password"/>            
                            </div>
                            <div class="col-12 mb-3">
                                <a class="text-primary" href="/register">Dont have account? Click here to register</a>
                            </div>
                            <button class="btn btn-success">Login</button>
                        </div>
                    </div>
                

                <div class="col-3"></div>
            </div>
            </form>
        </section>
    </div>
</body>
</html>



