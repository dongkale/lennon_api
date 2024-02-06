<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Bootstrap Example')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        <div class="col-sm-9">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>