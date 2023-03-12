<!DOCTYPE html>
<html lang="en">
  @include('admin.partials.head')
  <body>
  	@include('admin.partials.top')
	<div class="wrapper">
		@include('admin.partials.header')
	  	@yield('content')
  	</div>
    <!--#wrapper-->
    <!--JS-->
    @include('admin.partials.script')
  </body>
</html>