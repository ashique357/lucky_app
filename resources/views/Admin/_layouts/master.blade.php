<html lang="en">
@include('Admin._includes.header')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
@include('Admin._includes.nav')
@include('Admin._includes.sidebar')

<!-- content -->
@yield('content')

<!-- content -->

@include('Admin._includes.footer')
@include('Admin._includes.footer_link')  
</div>
</html>