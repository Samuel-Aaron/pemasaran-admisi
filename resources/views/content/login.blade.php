<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @Vite('resources/css/app.css')
    <title>Login</title>
</head>

<body>
    <div class="hero bg-base-200 min-h-screen">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">Telkom University!</h1>
                <p class="py-6">
                    Selamat datang di pemasaran admisi, silahkan login terlebih dahulu!
                </p>
            </div>
            <div class="card bg-base-100 w-full max-w-sm shrink-0 shadow-2xl  flex flex-col">
                <form class="card-body" action="/login" method="POST">
                    @csrf
                    <div class="form-control" method="POST" action="/login">
                        <label class="label">
                            <span class="label-text">Username</span>
                        </label>
                        <input id="username" type="username" name="username" placeholder="username"
                            class="input input-bordered" value="{{ old('username') }}" required />
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input id="password" type="password" name="password" placeholder="password"
                            class="input input-bordered" value="{{ old('password') }}" required />
                    </div>
                    <div class="form-control mt-6">
                        <button class="btn btn-primary">Login</button>
                    </div>
                    @if ($errors->has('login'))
                        <p class="invalid-feedback text-red-500">
                            <strong>{{ $errors->first('login') }}</strong>
                        </p>
                    @endif
                </form>

            </div>
        </div>
    </div>
</body>

</html>