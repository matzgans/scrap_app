<x-guest-layout>
    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-lg-auto me-lg-5 me-auto ms-auto">
        <div class="card card-plain">
            <div class="card-header">
                @if (session('error'))
                    <div class="alert alert-danger text-white">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success text-white">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger text-white" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h4 class="font-weight-bolder">Sign Up</h4>
                <p class="mb-0">Enter your email and password to register</p>
            </div>
            <div class="card-body">
                <form role="form" action="{{ route('auth.register.store') }}" method="POST">
                    @csrf
                    <div class="input-group input-group-static mb-4">
                        <label class="ms-0" for="exampleFormControlSelect1">Login Sebagai Apa</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="user">user</option>
                        </select>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Name</label>
                        <input class="form-control" name="name" type="text" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control" name="email" type="email" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control" name="password" type="password" required>
                    </div>
                    <div class="form-check form-check-info ps-0 text-start">
                        <input class="form-check-input" id="flexCheckDefault" type="checkbox" value="" checked>
                        <label class="form-check-label" for="flexCheckDefault">
                            I agree the <a class="text-dark font-weight-bolder" href="javascript:;">Terms and
                                Conditions</a>
                        </label>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-lg bg-gradient-dark btn-lg w-100 mb-0 mt-4" type="submit"
                            type="button">Sign
                            Up</button>
                    </div>
                </form>
            </div>
            <div class="card-footer px-lg-2 px-1 pt-0 text-center">
                <p class="mx-auto mb-2 text-sm">
                    Already have an account?
                    <a class="text-primary text-gradient font-weight-bold" href="{{ route('auth.login') }}">Sign
                        in</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
