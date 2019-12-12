@extends('admin.layout.master')

@section('title')
Trang quản trị
@endsection
@section('action')

@endsection

@section('style')
<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }

</style>
@endsection

@section('content')

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ !empty($orders) ? $orders : 0 }}</h3>

                <p>Đơn hàng</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="{{ route('admin.orders.index') }}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ !empty($comments) ? $comments : 0 }}<sup style="font-size: 20px"></sup></h3>

                <p>Đánh giá sản phẩm</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ route('admin.comments.index') }}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ !empty($customers) ? $customers : 0 }}</h3>

                <p>Khách hàng</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ route('admin.users.index') }}?role=1" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ !empty($products) ? $products : 0 }}</h3>

                <p>Sản phẩm</p>
            </div>
            <div class="icon">
                <i class="ion ion-ios-albums"></i>
            </div>
            <a href="{{ route('admin.products.index') }}" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>

<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Doanh thu tháng này</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div style="width:100%;">
            <canvas style="width:100%; height: 250px;" id="canvas"></canvas>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.row -->
@endsection

@section('js')
<script src="https://www.chartjs.org/dist/2.9.1/Chart.min.js"></script>
<script src="https://www.chartjs.org/samples/latest/utils.js"></script>
<script>
    function number_format(number, decimalsLength = 0, decimalSeparator, thousandSeparator) {
        var n = number,
            decimalsLength = isNaN(decimalsLength = Math.abs(decimalsLength)) ? 2 : decimalsLength,
            decimalSeparator = decimalSeparator == undefined ? "," : decimalSeparator,
            thousandSeparator = thousandSeparator == undefined ? "." : thousandSeparator,
            sign = n < 0 ? "-" : "",
            i = parseInt(n = Math.abs(+n || 0).toFixed(decimalsLength)) + "",
            j = (j = i.length) > 3 ? j % 3 : 0;

        return sign +
            (j ? i.substr(0, j) + thousandSeparator : "") +
            i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousandSeparator) +
            (decimalsLength ? decimalSeparator + Math.abs(n - i).toFixed(decimalsLength).slice(2) : "");
    }

</script>
<script>
    var DAYS = [1];
    var data = [Math.floor((Math.random() * 100000000) + 1)];
    for (i = 2; i < 31; i++) {
        DAYS.push(i);
        data.push(Math.floor((Math.random() * 100000000) + 1));
    }
    var config = {
        type: 'bar',
        data: {
            labels: DAYS,
            datasets: [{
                label: 'Doanh thu',
                backgroundColor: window.chartColors.red,
                borderColor: window.chartColors.red,
                data: data,
                fill: false,
            }],
        },
        options: {
            responsive: true,
            title: {
                display: false,
                text: 'Danh thu'
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                xAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Ngày'
                    }
                }],
                yAxes: [{
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Số tiền',

                    },
                    ticks: {
                        beginAtZero: false,
                        callback: function (value, index, values) {
                            return number_format(value) + 'đ';
                        }
                    }
                }]
            },
            tooltips: {
                callbacks: {
                    label: function (tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ' ' + number_format(tooltipItem.yLabel) + ' đ';
                    }
                }
            }
        }
    };

    window.onload = function () {
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myLine = new Chart(ctx, config);
    };

</script>

@endsection
