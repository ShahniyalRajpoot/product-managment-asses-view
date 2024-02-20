{{--<link rel="stylesheet" type="text/css" href="{{url('/assets/login/vendor/bootstrap/css/bootstrap.min.css')}}">--}}
<link rel="stylesheet" href="{{url('/assets/dashboard/css/style.css')}}" />
<!-- Font Awesome Cdn Link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<link rel="icon" type="image/png" href="{{url('/assets/login/images/icons/favicon.ico')}}"/>
<link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<nav>
    <ul>
        <li><a href="#" class="logo">
{{--                <img src="@if(@$data && $data['userInfo']['image']['http']=='yes') {{$data['userInfo']['image']['path']}} @elseif(@$data && $data['userInfo']['image']['http']=='no') {{asset('storage/'.$data['userInfo']['image']['path'])}} @endif">--}}
{{--                <span class="nav-item">@if(@$data) {{$data['userInfo']['name']}} @else Admin @endif</span>--}}
            </a></li>
        <li><a href="{{route('dashboard-w')}}">
                <i class="fas fa-menorah"></i>
                <span class="nav-item">Dashboard</span>
            </a></li>
        <li><a href="{{route('create-product')}}">
                <i class="fas fa-list"></i>
                <span class="nav-item">Create Product</span>
            </a></li>
        <li><a href="{{route('logout')}}" class="logout">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-item">Log out</span>
            </a></li>
    </ul>
</nav>
