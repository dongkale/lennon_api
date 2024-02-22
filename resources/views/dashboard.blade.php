@extends('layouts.app')

@section('title', 'Dashboard Page')

@section('content')

<div class="well well-lg">    
    <div class="row">
        <div class="col-sm-10">   
            <div style="text-align:left">Left</div>
            <div style="text-align:right">Right1</div>
            <div style="text-align:right">Right2</div>
        </div>
    </div>
</div>            

<hr class="mt-2 mb-3"/>


{{-- <div class="well well-lg">    
    <div class="row">
        <div class="col-sm-3">            
        </div>
        <div class="col-sm-3">            
        </div>
        <div class="col-sm-3">            
        </div>
        <div class="col-sm-3">            
        </div>        
    </div>
</div> --}}

<div class="row">
    <div class="col-sm-3">
        <div class="well well-lg">
            <h4>Users</h4>            
            <div id="apex_chart4" ></div> 
        </div>
    </div>
    
    <div class="col-sm-3">
        <div class="well well-lg">
            <h4>Pages</h4>
            <p>100 Million</p> 
            <div id="apex_chart3" ></div> 
            <button type="button" class="btn btn-secondary ml-2" onclick="loadedItem()">Loaded</button>
        </div>
    </div>
    
    <div class="col-sm-3">
        <div class="well well-lg">
            <h4>Sessions</h4>
            <p>10 Million</p> 
            <li>1...</li>
            <li>2...</li>
            <li>3...</li> 
        </div>
    </div>
    {{-- <div class="col-sm-3">
        <h2> Basic form </h2>
        <div class="well well-lg">
            <h4>Bounce</h4>
            <p>30%</p> 
        </div>
    </div> --}}
    <div class="col-sm-3">
        <h2> Basic form </h2>
        <form class="well well-lg" >
            <div class="form-group">
                <label> Name: </label>
                <input type="text" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label> Email: </label>
                <input type="email" class="form-control" placeholder="Enter Email Id">
            </div>
            <div class="form-group">
                <label> Contact Number: </label>
                <input type="text" class="form-control" placeholder="Enter contact number">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <div class="well well-lg">            
            <div id="apex_chart2" ></div>            
            
        </div>
    </div>
    <div class="col-sm-4">
        <div class="well well-lg" id="user-list">            
            <table class="table table-borderd">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>주소</th>
                        <th>번호</th>                        
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-sm-4">        
        <div class="well well-lg">            
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
    <div class="col-sm-2">
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
    <div class="col-sm-4">
        <div class="well well-lg">
            <p>Text</p>
            <div id="apex_chart" ></div> 
            <button type="button" class="btn btn-secondary ml-2" onclick="appendItem()">Append</button>
            <button type="button" class="btn btn-secondary ml-2" onclick="popItem()">Pop</button>
            <button type="button" class="btn btn-secondary ml-2" onclick="refreshItem()">Refesh</button>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="well well-lg">
            <p>Text</p>
            {{-- <div id="chartContainer" style="height: 370px; width: 100%;"></div>  --}}
            <div id="container" style="width:100%; height:400px;"></div>
            <button type="button" class="btn btn-secondary ml-2" onclick="redrawItem()">Redraw</button>
        </div>
    </div>
    
</div>    

<form id="listsExportForm" method="POST" action="/dashboard/listsExport">
    @csrf
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>


{{-- <script type="text/javascript" src="{{asset('/js/util.js')}}"></script> --}}
{{-- <script src="/js/util.js"></script> --}}
<script src="{{ mix('/js/util.js') }}"></script>

<script>

$(document).ready( function() {
    // $(".nav-pills li a").click(function(){
    //     // 모든 메뉴 아이템에서 'active-menu-item' 클래스 제거
    //     $(".nav-pills li").removeClass("active-menu-item");
    //         // 현재 클릭된 메뉴 아이템에만 'active-menu-item' 클래스 추가
    //     $(this).parent().addClass("active-menu-item");
    // });

    var vv1 = leftpad(12, 3);
    var vv2 = rand(1,100);

    console.log(vv1);
    console.log(vv2);

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
    
    settingMenu();

    selectMenu(menu);

    drawChart();

    drawApexChart(document.querySelector('#apex_chart'));
    drawApexChart2(document.querySelector('#apex_chart2'));
    drawApexChart3(document.querySelector('#apex_chart3'));
    drawApexChart4(document.querySelector('#apex_chart4'));

    // drawCanvasChart();
    drawHighChart();

    viewList();

    // $('.list-group li').each(function(index, item) {
    //     // $(this).removeClass('active');
    //     var menu = $(this).find('a').data('menu');;
    //     console.log(menu);
    // });
});


// $(function(){    
//     $('.list-group li').click(function(e) {
//         // e.preventDefault()

//         $that = $(this);

//         $that.parent().find('li').removeClass('active');
//         $that.addClass('active');
//     });    
// })


function viewList() {
    $.ajax({
        url: '/api/list',
        type: 'GET',
        dataType: 'json',        
        success: function(data) {
            // console.log(data);
            var html = '';            

            $("#user-list").find("tbody").children().remove();

            for (let item of data) {                
                html += `<tr>`;
                html += `   <td>${item.mb_id}</td>`;
                html += `   <td>${item.address}</td>`;
                html += `   <td>${item.mb_tell}</td>`;
                html += `</tr>`;
            };

            $("#user-list").find("tbody").append(html);
        },
        error: function(r, s, e) {
            alert("처리 중 문제가 발생하였습니다");
            console.log(e);
        }
    });
}


function settingMenu() {
    $('.list-group li').click(function(e) {
        // e.preventDefault()

        $that = $(this);

        $that.parent().find('li').removeClass('active');
        $that.addClass('active');
    });    
}

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

let apex_chart; 

function drawApexChart(draw_id) {
    // var options = {
    //     chart: {
    //         type: 'line',
    //         width: 230,
    //         height: 320,
    //         zoom: {
    //             enabled: false
    //         },           
    //     },
    //     markers: {
    //             size: 1,
    //     },
    //     series: [{
    //         name: 'sales',
    //         data: [30,40,35,50,49,60,70,91,125]        
    //     }],
    //     xaxis: {
    //         categories: [1991,1992,1993,1994,1995,1996,1997, 1998,1999]
    //     }
    // }

    var options = {
        series: [44, 55, 41, 17, 15],
        labels: ['Apple', 'Mango', 'Orange', 'Watermelon', 'Strawberry'],      
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return Math.floor(val) + "%"
            }
        }, 
        plotOptions: {
            pie: {
                donut: {
                    size: '15%'
                }
            }
        },
        chart: {
            type: 'donut',
            width: 320,
            height: 400,
            fontFamily: 'Helvetica, Arial, sans-serif'
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };


     var options2 = {
        series: [44, 55, 13, 33, 78],
        labels: ['Apple', 'Mango', 'Orange', 'Watermelon', 'Strawberry'],      
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return Math.floor(val) + "%"
            }
        }, 
        chart: {
            width: 380,
            type: 'donut',
        },        
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    show: false
                }
            }
        }],
        legend: {
            position: 'right',
            offsetY: 0,
            height: 230,
        }
    };
    
    if (apex_chart)
        apex_chart.destroy();

    apex_chart = new ApexCharts(draw_id, options2);

    apex_chart.render();

    // chart = new ApexCharts(draw_id, options2);

    // chart.render();
   
    // var series = chart.w.globals.series.slice();
    // series.push(Math.floor(Math.random() * (100 - 1 + 1)) + 1)
    // //chart.updateSeries(series);

    // var labels = chart.w.globals.labels.slice();
    // labels.push('123');
    
    // chart.updateOptions({
    //     series: series,
    //     labels: labels
    // })        
}

function drawApexChart2(draw_id) {
    var options = {
        series: [{
                name: "Session Duration",
                data: [45, 52, 38, 24, 33, 26, 21, 20, 6, 8, 15, 10]
            },
            {
                name: "Page Views",
                data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
            },
            {
                name: 'Total Visits',
                data: [87, 57, 74, 99, 75, 38, 62, 47, 82, 56, 45, 47]
            }
        ],
        chart: {
            height: 350,
            type: 'line',
            zoom: {
                enabled: false
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [5, 7, 5],
            curve: 'straight',
            dashArray: [0, 8, 5]
        },
        title: {
            text: 'Page Statistics',
            align: 'left'
        },
        legend: {
            tooltipHoverFormatter: function(val, opts) {
                return val + ' - <strong>' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + '</strong>'
            }
        },
        markers: {
            size: 0,
            hover: {
                sizeOffset: 6
            }
        },
        xaxis: {
            categories: ['01 Jan', '02 Jan', '03 Jan', '04 Jan', '05 Jan', '06 Jan', '07 Jan', '08 Jan', '09 Jan', '10 Jan', '11 Jan', '12 Jan'
            ],
        },
        tooltip: {
            y: [{
                title: {
                    formatter: function (val) {
                        return val + " (mins)"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val + " per session"
                    }
                }
            },
            {
                title: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
            ]
        },
        grid: {
            borderColor: '#f1f1f1',
        }
    };

    var chart = new ApexCharts(draw_id, options);
    chart.render();
}

let apex_chart3 = [];

function drawApexChart3(draw_id) {
    var options = {
        chart: {
            height: 350,
            type: 'bar',
        },
        // labels: ['1', '2', '3', '4', '5'],      
        dataLabels: {
            enabled: false
        },
        series: [],
        title: {
            text: 'Ajax Example',
        },
        noData: {
            text: 'Loading...'
        },
        xaxis: {
            categories: [
                "2019",
                "2020",
                "2021",
                "2022",
                "2023",
                "2024"
            ]
        }
    }

    apex_chart3 = new ApexCharts(draw_id, options);

    apex_chart3.render();
}

function loadedItem() {
    data1 = [45, 52, 38, 24, 33];
    data2 = [4, 2, 8, 24, 39];

    apex_chart3.updateSeries([{
        name: 'Sales',
        data: data1
    }]);
};


function drawApexChart4(draw_id) {
    var options = {
        series: [{
            name: "웹1 사용량",
            data: [450, 650, 400, 700, 600, 800, 700, 900, 850, 1000, 1200, 1400]
        },
        {
            name: "웹2 사용량",
            data: [350, 150, 100, 500, 100, 700, 500, 800, 450, 100, 120, 140]
        }],
        chart: {
            type: 'line',
            height: 350,
            zoom: {
                enabled: false
            },
            events: {
                click: function(event, chartContext, config) {
                    // The last parameter config contains additional information like `seriesIndex` and `dataPointIndex` for cartesian charts
                    // console.log(event);                    
                    console.log(chartContext);
                    console.log(config.config);
                    console.log(config.config.series[config.seriesIndex])
                    console.log(config.config.series[config.seriesIndex].name)
                    console.log(config.config.series[config.seriesIndex].data[config.dataPointIndex])                    
                    // let ID = config.config.xaxis.categories[config.dataPointIndex];
                    // console.log(config.config.xaxis);
                    // console.log(config.config.labels);
                },
                // dataPointSelection: function(event, chartContext, config) {        
                //    console.log(`===`);
                // }
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val, opts) {
                return val;
            },
            style: {
                fontSize: '8px',
                fontFamily: 'Helvetica, Arial, sans-serif',
                fontWeight: 'bold',
                colors: undefined
            },
            background: {
                enabled: true,
                foreColor: '#fff',
            }
        },
        stroke: {
            width: [3, 3],
            // curve: 'stepline',
            //dashArray: [3, 3]
        },
        grid: {
            borderColor: '#e7e7e7',
            row: {
                colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                opacity: 0.5
            },
            // position: 'front',
            // borderColor: '#111',
            // strokeDashArray: 1,
        },
        // legend: {
        //   tooltipHoverFormatter: function(val, opts) {
        //     return val + ' - <strong>' + opts.w.globals.series[opts.seriesIndex][opts.dataPointIndex] + '</strong>'
        //   }
        // },
        // grid: {
        //   borderColor: '#e7e7e7',
        //   row: {
        //     colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
        //     opacity: 0.5
        //   },
        // },
        markers: {
            size: 1,
        },
        title: {
            text: '월별 웹 사용량',
            align: 'left'
        },
        xaxis: {
            categories: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
            // lines: {
            //     show: true,
            // }
            // events: {
            //     click: function (e) { console.log(e); }
            // }
        },
        yaxis: {
            title: {
                text: '방문자 수'
            },
            // lines: {
            //     show: true,
            // }
        },
        // active: {
        //     allowMultipleDataPointsSelection: true,
        // },
        // events:{
        //     dataPointSelection: function(event, chartContext, config) {
        //         console.log(event);
        //     }
        // }
    };

    var chart = new ApexCharts(draw_id, options);
    chart.render();
}

function appendItem() {
    var series = apex_chart.w.globals.series.slice();
    series.push(Math.floor(Math.random() * (100 - 1 + 1)) + 1)
    
    var labels = apex_chart.w.globals.labels.slice();

    rString1 = randomStringEx(5, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
    // rString2 = randomString(5);

    labels.push(rString1);
    
    apex_chart.updateOptions({
        series: series,
        labels: labels
    })        
}

function popItem() {
    var series = apex_chart.w.globals.series.slice();
    series.pop();
    
    var labels = apex_chart.w.globals.labels.slice();    
    labels.pop();
    
    apex_chart.updateOptions({
        series: series,
        labels: labels
    });        
}

function refreshItem() {
    // if (apex_chart)
    //     apex_chart.destroy();

    // apex_chart.updateOptions({
    //     chart: {
    //         redrawOnWindowResize: true
    //     }

    // });    

    drawApexChart(document.querySelector('#apex_chart'));
}

function refreshItem2() {    
    // $("#apex_chart").load(" #apex_chart > *");

    // apex_chart.render();

    apex_chart.refresh();     
}

function randomStringEx(length, chars) {
    var result = '';
    
    for (var i = length; i > 0; --i) {
        result += chars[Math.floor(Math.random() * chars.length)];
    }

    return result;
}

function randomString(length) {
    return Math.round((Math.pow(36, length + 1) - Math.random() * Math.pow(36, length))).toString(36).slice(1);
}

// function appendData(chart) {
//     var arr = chart.w.globals.series.slice()
//     arr.push(Math.floor(Math.random() * (100 - 1 + 1)) + 1)

//     var labels = chart.w.globals.labels.slice();
//     labels.push('123');
    
//     return arr;
// }
      
// function removeData() {
//   var arr = chart.w.globals.series.slice()
//   arr.pop()
//   return arr;
// }

// function randomize() {
//   return chart.w.globals.series.map(function() {
//       return Math.floor(Math.random() * (100 - 1 + 1)) + 1
//   })
// }

// function reset() {
//   return options.series
// }

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

function drawHighChart() {
    // Highcharts.chart('container', {
    //     chart: {
    //         type: 'line'
    //     },
    //     title: {
    //         text: 'Monthly Average Temperature'
    //     },
    //     subtitle: {
    //         text: 'Source: WorldClimate.com'
    //     },
    //     xAxis: {
    //         categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    //     },
    //     yAxis: {
    //         title: {
    //             text: 'Temperature (°C)'
    //         }
    //     },
    //     plotOptions: {
    //         line: {
    //             dataLabels: {
    //                 enabled: true
    //             },
    //             enableMouseTracking: false
    //         }
    //     },
    //     series: [{
    //         name: 'Tokyo',
    //         data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
    //     }, {
    //         name: 'London',
    //         data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
    //     }]
    // });

    Highcharts.chart('container', {
        chart: {
            type: 'line',
            events: {
                redraw: function(event) {
                    // 클릭 이벤트가 발생했을 때 실행되는 함수
                    console.log('Clicked', event);
                    
                    // event 객체를 통해 클릭 위치 등의 정보에 접근할 수 있습니다.
                    // console.log('Clicked X:', event.xAxis[0].value);
                    // console.log('Clicked Y:', event.yAxis[0].value);
                }        
            }
        },
        title: {
            text: 'Website Traffic'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            plotBands: [{
                events: {                    
                    click: function(e) {
                        console.log('Clicked');
                        console.log(e);
                    }
                }
            }],     
        },
        yAxis: {
            title: {
                text: 'Number of Visitors'
            }
        },
        series: [{
            name: '2023',
            data: [1000, 1200, 1500, 1800, 2000, 2200, 2300, 2400, 2500, 2300, 2200, 2100]
        }, {
            name: '2024',
            data: [1200, 1400, 1600, 1900, 2100, 2300, 2500, 2600, 2700, 2500, 2400, 2300]
        }],
        plotOptions: {
            series: {
                cursor: 'pointer',
                events: {
                    click: function (event) {
                        console.log(event);
                        console.log(this);
                        console.log(`name: ${this.name}`);
                        console.log(event.point.options.y);             
                        
                        // console.log('Clicked X:', this.xAxis[0].value);
                        // console.log('Clicked Y:', this.yAxis[0].value);                               
                    }
                },
                point: {
                    events: {
                        click: function(event) {
                            // console.log('point event')
                            console.log(event);
                            console.log(this);
                            console.log(`category: ${this.category}, name: ${this.name}, x: ${this.x}, y: ${this.y}`);             
                        }
                    }
                }
            }
        },
    });
}

function redrawItem() {
    var chart = $('#container').highcharts();

    // chart.addSeries({
    //     name: "2025",
    //     data: [400, 500, 600, 700, 800, 600, 800, 700, 700, 600, 700, 800]
    // }, false);

    // chart.redraw();

    
    // Highcharts.each(chart.series, function(s, i) {
    //    s.setVisible(true, false);
    //    console.log(s);
    //    console.log(i);

    //    // s.yData[1] = 2200;
    //  });

    // chart.redraw();


    chart.destroy();

    drawHighChart();
}

function listsExportProc() {
    const form = $("#listsExportForm");
    
    form.submit();
}

</script>

@endsection


