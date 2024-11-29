@include('admin.header')
<body>
    @include('admin.rightSideBar')

    <div id="wrapper">
        @include('admin.topNav')
        @yield('content')
        @include('admin.footer')
    </div>

   