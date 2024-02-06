@extends('layouts.app')

@section('title', 'Dashboard Page')

@section('content')

<div class="well">
    <h4>Dashboard</h4>
    <p>Some text..</p>
</div>

<div class="row">
    <div class="col-sm-3">
        <div class="well">
            <h4>Users</h4>
            <p>1 Million</p> 
        </div>
    </div>
    
    <div class="col-sm-3">
        <div class="well">
            <h4>Pages</h4>
            <p>100 Million</p> 
        </div>
    </div>
    
    <div class="col-sm-3">
        <div class="well">
            <h4>Sessions</h4>
            <p>10 Million</p> 
        </div>
    </div>
    <div class="col-sm-3">
        <div class="well">
            <h4>Bounce</h4>
            <p>30%</p> 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="well">
            <p>Text</p> 
            <p>Text</p> 
            <p>Text</p> 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-8">
        <div class="well">
            <p>Text</p> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="well">
            <p>Text</p>
            <canvas id="myChart"></canvas> 
        </div>
    </div>
    
    {{-- <canvas id="myChart"></canvas> --}}
</div>    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

$(document).ready( function() {
    // $(".nav-pills li a").click(function(){
    //     // 모든 메뉴 아이템에서 'active-menu-item' 클래스 제거
    //     $(".nav-pills li").removeClass("active-menu-item");
    //         // 현재 클릭된 메뉴 아이템에만 'active-menu-item' 클래스 추가
    //     $(this).parent().addClass("active-menu-item");
    // });

    $(".menu-item a").click(function(e){
        e.preventDefault();
        var menu = $(this).data('menu');

        // console.log(menu);

        window.location.href = '/dashboard/' + menu;

        // $.ajax({
        //     url: '/load/' + menu, // 컨트롤러 메소드의 경로
        //     type: 'GET',
        //     success: function(data) {
        //         $('#content-container').html(data);
        //     }
        // });
    });

    var menu = "{{$menu}}";

    // console.log(menu);

    selectMenu(menu);

    drawBestItemChart('products')

    // $('.list-group li').each(function(index, item) {
    //     // $(this).removeClass('active');
    //     var menu = $(this).find('a').data('menu');;
    //     console.log(menu);
    // });
});

$(function(){    
    $('.list-group li').click(function(e) {
        // e.preventDefault()

        $that = $(this);

        $that.parent().find('li').removeClass('active');
        $that.addClass('active');
    });    
})

function selectMenu(select) {
    $('.list-group li').each(function(index, item) {                
        var menuName = $(this).find('a').data('menu');

        if (select == menuName) {
            $(this).addClass('active');
        } else {
            $(this).removeClass('active');
        }
        console.log(menuName);
    });
}

// var ctx = document.getElementById('myChart').getContext('2d');
// var myChart = new Chart(ctx, {
//     type: 'bar', // 차트의 형태
//     data: {
//         labels: [January], // X축 레이블. 예: ['January', 'February', 'March', ...]
//         datasets: [{
//             label: '# of Users',
//             data: ['aaa'], // 실제 데이터. PHP 변수에서 가져온 데이터를 사용
//             backgroundColor: [
//                 // 각 데이터 점에 대한 배경색
//             ],
//             borderColor: [
//                 // 각 데이터 점에 대한 테두리 색
//             ],
//             borderWidth: 1
//         }]
//     },
//     options: {
//         scales: {
//             y: {
//                 beginAtZero: true
//             }
//         }
//     }
// });

function drawBestItemChart(products) {
        const labels =  [];
        const saledPrice =  [];

        // products.forEach((product) => {
        //     labels.push(product.product_name);
        //     saledPrice.push(product.total_price);
        // })

        labels.push('aa');
        labels.push('bb');
        labels.push('cc');

        saledPrice.push(100);
        saledPrice.push(500);
        saledPrice.push(200);

        const data = {
            labels: labels,
            datasets: [{
                label: '판매 금액',
                backgroundColor: [
                    '#f29947', '#efe258', '#f4aad4', '#5886c3', '#f0dd8e', '#f3659a', '#939299', '#e64448', '#15ba21', '#ba71f4'
                ],
                borderColor: '#49576f',
                data: saledPrice,
                hoverOffset: 4
            }]
        };
        const options = {
            plugins: {
                legend: {
                    labels: {
                        color: "#fff",
                        font: {
                            size: 14
                        }
                    },
                    position: "right",
                    align: "middle"
                }
            }
        }

        const config = {
            type: 'doughnut',
            data: data,
            options: options
        };

        const myChart = new Chart(
            document.getElementById('myChart'), // getContext('2d'),
            config
        );
    }


</script>

@endsection


