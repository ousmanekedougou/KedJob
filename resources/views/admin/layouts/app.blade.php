<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @include('admin.layouts.head')
</head>
<body>

    <div class="wrapper">
    @include('admin.layouts.header')

    @include('admin.layouts.sidebar')

      @section('main-content')
      @show

    @include('admin.layouts.footer')

    </div>

</body>
</html>