@extends('layouts.app')

@section('title', 'Dashboard Page')

@section('content')

<div class="well well-lg">
    <h4>Dashboard</h4>
    <p>Some text..</p>
</div>

<div class="row">
    <div class="col-sm-3">
        <div class="well well-lg">
            <h4>Users</h4>
            <p>1 Million</p>             

        </div>
    </div>
    
    <div class="col-sm-3">
        <div class="well well-lg">
            <h4>Pages</h4>
            <p>100 Million</p> 
        </div>
    </div>
    
    <div class="col-sm-3">
        <div class="well well-lg">
            <h4>Sessions</h4>
            <p>10 Million</p> 
        </div>
    </div>
    <div class="col-sm-3">
        <div class="well well-lg">
            <h4>Bounce</h4>
            <p>30%</p> 
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="well well-lg">
            <li>1...</li>
            <li>2...</li>
            <li>3...</li> 
        </div>
    </div>
    <div class="col-sm-4">
        <div class="well well-lg">
            <li>Text</li>
            <li>Text</li>
            <li>Text</li>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="well well-lg">
            {{-- <p>Text</p> 
            <p>Text</p> 
            <p>Text</p>  --}}
            <table class="table table-borderd">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>주소</th>
                        <th>번호</th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($lists as $w)
                    <tr>
                        <td>{{$w->mb_id}}</td>
                        <td>{{$w->address}}</td>
                        <td>{{$w->mb_tell}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-3">
        <div class="well well-lg">
            <p>Text</p> 
            <button type="button" id="listsExportBtn" class="btn btn-secondary ml-2" onclick="listsExportProc()">EXPORT</button>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="well well-lg">
            <p>Text</p>
            <canvas id="myChart"></canvas> 
        </div>
    </div>
    <div class="col-sm-3">
        <div class="well well-lg">
            <p>Text</p>
            <div id="chart"></div> 
        </div>
    </div>
    <div class="col-sm-3">
        <div class="well well-lg">
            <p>Text</p>
            <div id="chartContainer" style="height: 370px; width: 100%;"></div> 
        </div>
    </div>
    
</div>    

<form id="listsExportForm" method="post" action="/dashboard/listsExport">
    @csrf    
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>

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

        // window.location.href = '/dashboard/' + menu;

        $.ajax({
            url: '/dashboard/' + menu,
            type: 'GET',
            success: function(data) {
                $('#content-container').html(data);
            }
        });
    });

    var menu = "{{$menu}}";

    // console.log(menu);

    selectMenu(menu);

    drawChart();

    drawApexChart(document.querySelector('#chart'));

    drawCanvasChart();

    // $('.list-group li').each(function(index, item) {
    //     // $(this).removeClass('active');
    //     var menu = $(this).find('a').data('menu');;
    //     console.log(menu);
    // });
});

// 
// $(function(){    
//     $('.list-group li').click(function(e) {
//         // e.preventDefault()

//         $that = $(this);

//         $that.parent().find('li').removeClass('active');
//         $that.addClass('active');
//     });    
// })
// 

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

function drawChart() {
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


function drawApexChart(draw_id) {
    var options = {

    chart: {
        type: 'line'
    },
    series: [{
        name: 'sales',
        data: [30,40,35,50,49,60,70,91,125]
    }],
    xaxis: {
        categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
    }
    }

    var chart = new ApexCharts(draw_id, options);

    chart.render();
}

function drawCanvasChart() {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Simple Line Chart"
        },
        data: [{        
            type: "line",
            indexLabelFontSize: 16,
            dataPoints: [
                { y: 450 },
                { y: 414},
                { y: 520, indexLabel: "\u2191 highest",markerColor: "red", markerType: "triangle" },
                { y: 460 },
                { y: 450 },
                { y: 500 },
                { y: 480 },
                { y: 480 },
                { y: 410 , indexLabel: "\u2193 lowest",markerColor: "DarkSlateGrey", markerType: "cross" },
                { y: 500 },
                { y: 480 },
                { y: 510 }
            ]
        }]
    });

    chart.render();
}

function listsExportProc() {
    const form = $("#listsExportForm");
    
    form.submit();
}

</script>

@endsection


