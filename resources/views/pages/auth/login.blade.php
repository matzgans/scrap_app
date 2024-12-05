<x-guest-layout>
    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-lg-auto me-lg-5 me-auto ms-auto">
        <div class="card card-plain">
            <div class="card-header">
                @if (session('error'))
                    <div class="alert alert-danger text-white">
                        {{ session('error') }}
                    </div>
                @endif
                <h4 class="font-weight-bolder">Login</h4>
                <p class="mb-0">Enter your email and password to Login</p>
            </div>
            <div class="card-body">
                <form role="form" action="{{ route('auth.login.store') }}" method="POST">
                    @csrf
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Email</label>
                        <input class="form-control" name="email" type="email" required>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control" name="password" type="password" required>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-lg bg-gradient-dark btn-lg w-100 mb-0 mt-4" type="submit"
                            type="button">Sign
                            In</button>
                    </div>
                </form>
            </div>
            <div class="card-footer px-lg-2 px-1 pt-0 text-center">
                <p class="mx-auto mb-2 text-sm">
                    no have an account?
                    <a class="text-primary text-gradient font-weight-bold" href="{{ route('auth.register') }}">Sign
                        Up</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
