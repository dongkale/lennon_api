<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Bootstrap Example')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}

    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}

    <style>
        .row.content {height: 550px}
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
            min-height: 100vh; /* 최소 높이를 화면의 전체 높이로 설정 */
        }
        @media screen and (max-width: 767px) {
            .row.content {height: auto;} 
        }
        .active-menu-item {
            background-color: #4CAF50; /* 선택된 항목의 배경색 */
            color: white; /* 선택된 항목의 텍스트 색상 */
        }
    </style>
</head>
<body>

@include('partials.navbar')

<div class="container-fluid">
    <div class="row content">
        @include('partials.sidenav')
        <div class="col-sm-10">

            {{-- <div class="row">
                <div class="col-4">
                    <div> Div 1 </div>
                </div>
                <div class="col-4">
                    <div> Div End </div>
                </div>
            </div>
            
            <hr class="mt-2 mb-3"/> --}}

            @yield('content')
        </div>
    </div>
</div>

</body>
</html>