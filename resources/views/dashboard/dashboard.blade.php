<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8" />
  <title>Listing Dashboard</title>
  <link rel="stylesheet" href="{{url('/assets/dashboard/css/style.css')}}" />
    <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
       <link rel="stylesheet" type="text/css"
             href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>
<body>
  <div class="container">
      @include('header');
    <section class="main">
      <div class="main-top">

        <h1>Products listing</h1>
    @if(session()->has('msg'))
                  <label class="lableAlert">
                  <input type="checkbox" class="alertCheckbox" autocomplete="off" />
                  <div class="alert {{session()->pull('type')}}">
                    <span class="alertClose">X</span>
                    <span class="alertText">{{session()->pull('msg')}}
                    <br class="clear"/></span>
                  </div>
                </label>
          @endif
        <i class="fas fa-user-cog"></i>
</div>
      <section class="attendance">
        <div class="attendance-list">
          <h1>Product List</h1>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @php($num=1)
            @foreach($data['data']['products'] as $products)
              <tr>
                <td>{{$num}}</td>
                <td>{{$products['name']}}</td>
                <td>{{$products['description']}}</td>
                <td>{{$products['price']}}</td>
                <td>{{$products['stock']}}</td>
                <td>
                    <div class="actionBtn">
                    <a href="{{route('edit-listing',['id'=>$products['id']])}}" title="Edit Product"><i class="fas fa-edit"></i> </a>
                        <form action="{{route('delete-listing',['id'=>$products['id']])}}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit"><i class="fa-solid fa-trash"></i></button>
                        </form>
                        </div>
                </td>
              </tr>
                @php($num++)
            @endforeach
            </tbody>
          </table>
        </div>
      </section>
    </section>
  </div>

</body>
</html>
</span>
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
    }
</script>
@if (Session::has('error'))
    <script> toastr.error("{{ session('error') }}"); </script>
@elseif (Session::has('success') || Session::has('message'))
    <script>
        let message = "{{ (Session::has('success')) ? session('success') : session('message') }}";
        toastr.success(message);
    </script>
@endif
