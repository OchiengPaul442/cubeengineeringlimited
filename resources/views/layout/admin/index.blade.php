@php
    if(!session()->has('userID')){
        header('Location: /login');
        exit;
    }
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    {{-- favicon --}}
    <link rel="shortcut icon" href="{{ asset('images/Group1.png') }}" type="image/x-icon">
    <link href="{{ asset('css/admin.min.css') }}" rel="stylesheet" />
    {{-- filepond --}}
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    {{-- bootstrap css --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- datatables css --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    {{-- topnavbar --}}
    @include('layout.admin.header')

    <div id="layoutSidenav">
        {{-- sidenavbar --}}
        <div id="layoutSidenav_nav">
            @include('layout.admin.sideNav')
        </div>
        <div id="layoutSidenav_content">
            {{-- content --}}
            <main>
                @yield('content')
            </main>
            {{-- footer --}}
            @include('layout.admin.footer')
        </div>
    </div>
    {{-- error modal --}}
    @include('Admin.components.modals.errors')
    @include('Admin.components.modals.others')

    <script src="{{ asset('/js/admin.js') }}"></script>
    {{-- datatables js --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- filepond plugin --}}
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
        {{-- ckeditor --}}
    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    {{-- chart js --}}    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @yield('scripts')
    @yield('scripts2')
</body>

</html>
