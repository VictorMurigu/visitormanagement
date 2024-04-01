<nav class="bg-black navbar navbar-expand-lg text-bg-primary border-bottom-dark bg-body-tertiary">
    <div class="container-fluid">
        {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- INLINE DISPLAY PROPERTY --}}






        <div class="items-center d-flex justify-content-between w-100">

            {{-- Left --}}
            <div class="d-flex w-100">
                <div class="p-2 text-bg-primary">Navbar</div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link active text-bg-black " aria-current="page" href="{{url('dashboard')}}">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-bg-black" href="{{url('visitors')}}">Visitors</a>
                        </li>
                        @if(Auth::check() && Auth::user()->type=='Admin')
                        <li class="nav-item">
                            <a class="nav-link text-bg-black" href="{{url('office')}}">Offices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-bg-black" href="{{url('employees')}}">Employees</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>

            {{-- Right --}}
            <div class="collapse navbar-collapse" id="navbarNav">
                @if (Auth::check())
                    <div class="text-black float-end">{{ Auth::user()->type }}</div>
                @endif

                <ul class="navbar-nav">
                    @if(Auth::check())
                     <li class="nav-item ">
                        <a class="nav-link active text-bg-black " aria-current="page" href="{{url('login')}}">Logout</a>
                    </li>
                    @else
                    <li class="nav-item ">
                        <a class="nav-link active text-bg-black " aria-current="page" href="{{url('login')}}">Login</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active text-bg-black " aria-current="page" href="{{url('registration')}}">Register</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
