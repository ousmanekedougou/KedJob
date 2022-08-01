<!DOCTYPE html>
<html lang="fr">

<head>
@include('user/layouts/head')
  @section('head')
  @show
</head>
<body>

 @include('user/layouts/header')

 @section('main-content')
 
 @show

  @include('user/layouts/footer')

@section('js')
@show

</body>

</html>
