<!DOCTYPE html>
<html lang="en">
  @include('user.partials.head')
  <body>
	@include('user.partials.header')
  	@yield('content')
	@include('user.partials.footer')
    <!--JS-->
    @include('user.partials.script')
  </body>
</html>