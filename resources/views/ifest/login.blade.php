<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <script src="https://mrferdinands.github.io/assets/js/font-awesome.js"></script>
</head>
<style>
    * {
        font-family: "Poppins", sans-serif;
    }
</style>

<body class="overflow-x-hidden">
    <div class="row align-items-center vh-100">
        <div class="col d-flex justify-content-center">
            <img class="d-none d-lg-block" width="50%" src="/assets/img/vecotr.jpg" alt="" />
            <div class="card w-100 border-0">
                <div class="card-body d-flex align-items-center">
                    <div class="d-flex flex-column w-100 px-2 px-lg-5">
                        <h1 class="mb-4">Login page</h1>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Username</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                placeholder="John Doe" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleFormControlInput2"
                                placeholder="••••••••" />
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="flexRadioDefault"
                                id="flexRadioDefault1" />
                            <label class="form-check-label" for="flexRadioDefault1">
                                Remember Password
                            </label>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-outline-dark w-100" style="--bs-btn-padding-y: 0.6rem">
                                Sign in
                            </button>
                        </div>
                        <div class="mb-1">
                            <p>
                                Don't have an account?
                                <a href="" class="text-dark">Sign up</a>
                            </p>
                        </div>
                        <div class="text-center mb-2">or</div>
                        <div class="">
                            <button class="btn btn-outline-dark w-100" style="--bs-btn-padding-y: 0.7rem">
                                <i class="fa-brands fa-google"></i> Authorize with Google
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
