<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('sb_admin/login/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('sb_admin/login/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('sb_admin/login/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('sb_admin/login/css/style.css')}}">

    <title>Login </title>
</head>

<body>
    <!-- <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                
                <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid">

                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
                                        SELAMAT DATANG
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent text-center">
                                    <h3 class="font-weight-bolder text-info text-gradient">Login</h3>
                                    <p class="mb-0">Enter your Username and Password </p>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="{{ route('postLogin') }}" method="post" novalidate>
                                        {{ csrf_field() }}
                                        <label>Username</label>
                                        <div class="mb-3">
                                            <input type="text" name="name" class="form-control" placeholder="Username" aria-label="Email" aria-describedby="email-addon">
                                        </div>
                                        <label>Password</label>
                                        <div class="mb-3">
                                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                        </div>
                                        @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{session('error')}}
                                        </div>
                                        @endif
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                                        </div>
                                    </form>
                                </div><br>
                                <div class="row">
                                    <div class="col-8 mx-auto text-center mt-1">
                                        <p class="mb-0 text-secondary">
                                            Copyright © <script>
                                                document.write(new Date().getFullYear())
                                            </script> Soft by Creative Tim.
                                        </p>
                                    </div>
                                </div><br>
                            </div><br>
                        </div>
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url({{asset('admin_template/img/curved-images/curved6.jpg') }})"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main> -->

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <img src="{{asset('sb_admin/login/images/undraw_file_sync_ot38.svg')}}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4 p-0 d-flex justify-content-center">
                                <h3><strong>Login</strong></h3>
                            </div>
                            <form action="{{ route('postLogin') }}" method="post">
                                {{ csrf_field() }}
                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{session('error')}}
                                </div>
                                @endif
                                <div class="form-group first p-2">
                                    <label for="username">Username</label>
                                    <input type="text" name="name" class="form-control" id="username">

                                </div>
                                <div class="form-group last mb-4 p-2">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">

                                </div>

                                <button type="submit" class="btn text-white btn-block btn-primary">Masuk</button>
                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script src="{{asset('sb_admin/login/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('sb_admin/login/js/popper.min.js')}}"></script>
    <script src="{{asset('sb_admin/login/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('sb_admin/login/js/main.js')}}"></script>

</body>

</html>