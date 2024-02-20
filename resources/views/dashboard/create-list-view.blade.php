
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
    <link rel="stylesheet" href="{{url('/assets/dashboard/css/style.css')}}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
@include('header');
<body class="setting-formBody">
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
<div class="container container-custom">
    <div class="form-holder">
        <h2>Create New Product</h2>
        <form method="post" action="{{route('save-new-listing')}}" enctype="multipart/form-data" class="formSetting" id="create-product-form">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" value="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <textarea class="form-control" aria-describedby="emailHelp" name="description" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="number" class="form-control" id="price" aria-describedby="emailHelp" name="price" value="">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Stock (Quantity)</label>
                <input type="number" class="form-control" id="stock" aria-describedby="emailHelp" name="stock" value="">
            </div>
            <button type="submit" class="btn btn-outline-success">Save</button>
        </form>
    </div>
</div>
</body>
</html>
<script src="{{asset('/assets/dashboard/js/jquery.validate.min.js')}}"></script>

<script >
    $(document).ready(function() {
        // Accessing a PHP variable in JavaScript
        var required = "This Field is Required";

        $("#create-product-form").validate({
            rules: {
                name: {
                    required: true,
                },
                description: {
                    required: true,
                },
                price: {
                    required: true,
                },
                stock: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: required,
                },
                description: {
                    required: required,
                },
                price: {
                    required: required,
                },
                stock: {
                    required: required,
                },
            },
            submitHandler: function (form) {
                form.submit();
            }
        });
    });

</script>
