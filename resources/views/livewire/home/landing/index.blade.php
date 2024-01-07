@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/prism.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/chartist.css') }}">
@endsection

@section('breadcrumb-title')
    <h2>Happiness <span>Statistics</span></h2>
    <h6 class="mb-0">in ASIA Countries</h6>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Home</li>
@endsection

<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 xl-100">
                <div class="row ecommerce-chart-card">
                    <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                        <div class="card gradient-primary o-hidden">
                            <div class="card-body tag-card">
                                <div class="ecommerce-chart">
                                    <div class="media ecommerce-small-chart">
                                        <div class="small-bar">
                                            <div class="small-chart1 flot-chart-container"></div>
                                        </div>
                                        <div class="sale-chart">
                                            <div class="media-body m-l-40">
                                                <h6 class="f-w-700 m-l-10">{{ $negaraCount }}</h6>
                                                <h4 class="mb-0 f-w-700 m-l-10">Countries</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="tag-hover-effect"><span class="dots-group"><span
                                            class="dots dots1"></span><span class="dots dots2 dot-small"></span><span
                                            class="dots dots3 dot-small"></span><span
                                            class="dots dots4 dot-medium"></span><span
                                            class="dots dots5 dot-small"></span><span
                                            class="dots dots6 dot-small"></span><span
                                            class="dots dots7 dot-small-semi"></span><span
                                            class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">
                                        </span></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                        <div class="card gradient-secondary o-hidden">
                            <div class="card-body tag-card">
                                <div class="ecommerce-chart">
                                    <div class="media ecommerce-small-chart">
                                        <div class="small-bar">
                                            <div class="small-chart2 flot-chart-container"></div>
                                        </div>
                                        <div class="sale-chart">
                                            <div class="media-body m-l-40">
                                                <h6 class="f-w-700 m-l-10">{{ $ekonomiSum }}</h6>
                                                <h4 class="mb-0 f-w-700 m-l-10">GDP per capita</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="tag-hover-effect"><span class="dots-group"><span
                                            class="dots dots1"></span><span class="dots dots2 dot-small"></span><span
                                            class="dots dots3 dot-small"></span><span
                                            class="dots dots4 dot-medium"></span><span
                                            class="dots dots5 dot-small"></span><span
                                            class="dots dots6 dot-small"></span><span
                                            class="dots dots7 dot-small-semi"></span><span
                                            class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">
                                        </span></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                        <div class="card gradient-warning o-hidden">
                            <div class="card-body tag-card">
                                <div class="ecommerce-chart">
                                    <div class="media ecommerce-small-chart">
                                        <div class="small-bar">
                                            <div class="small-chart3 flot-chart-container"></div>
                                        </div>
                                        <div class="sale-chart">
                                            <div class="media-body m-l-40">
                                                <h6 class="f-w-700 m-l-10">{{ $kesehatanSum }}</h6>
                                                <h4 class="mb-0 f-w-700 m-l-10">Healthy life</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="tag-hover-effect"><span class="dots-group"><span
                                            class="dots dots1"></span><span class="dots dots2 dot-small"></span><span
                                            class="dots dots3 dot-small"></span><span
                                            class="dots dots4 dot-medium"></span><span
                                            class="dots dots5 dot-small"></span><span
                                            class="dots dots6 dot-small"></span><span
                                            class="dots dots7 dot-small-semi"></span><span
                                            class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">
                                        </span></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                        <div class="card gradient-info o-hidden">
                            <div class="card-body tag-card">
                                <div class="ecommerce-chart">
                                    <div class="media ecommerce-small-chart">
                                        <div class="small-bar">
                                            <div class="small-chart4 flot-chart-container"></div>
                                        </div>
                                        <div class="sale-chart">
                                            <div class="media-body m-l-40">
                                                <h6 class="f-w-700 m-l-10">{{ $kebebasanSum }}</h6>
                                                <h4 class="mb-0 f-w-700 m-l-10">Freedom</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="tag-hover-effect"><span class="dots-group"><span
                                            class="dots dots1"></span><span class="dots dots2 dot-small"></span><span
                                            class="dots dots3 dot-small"></span><span
                                            class="dots dots4 dot-medium"></span><span
                                            class="dots dots5 dot-small"></span><span
                                            class="dots dots6 dot-small"></span><span
                                            class="dots dots7 dot-small-semi"></span><span
                                            class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">
                                        </span></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 xl-100 box-col-12">
                <div class="card crypto-revenue">
                    <div class="card-header pb-0 d-flex">
                        <h5>Happiness Statistics
                            @foreach ($years as $v)
                                <a wire:click="changeYear({{ $v->tahun }})" href="javascript:void(0)">
                                    <span class="badge badge-pill pill-badge-secondary f-14 f-w-600"
                                        @if ($tahun == $v->tahun) style="background-color:#6610f2;color:#fff" @endif>{{ $v->tahun + 1 }}</span>
                                </a>
                            @endforeach
                        </h5>
                        <ul class="creative-dots">
                            <li class="bg-primary big-dot"></li>
                            <li class="bg-secondary semi-big-dot"></li>
                            <li class="bg-warning medium-dot"></li>
                            <li class="bg-info semi-medium-dot"></li>
                            <li class="bg-secondary semi-small-dot"></li>
                            <li class="bg-primary small-dot"></li>
                        </ul>
                        {{-- <div class="header-right pull-right text-right">
                            <h5 class="mb-2">80 / 100</h5>
                            <h6 class="f-w-700 mb-0">Total 81,67,536 $</h6>
                        </div> --}}
                    </div>
                    <div class="card-body pt-0">
                        <div id="area-spaline"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 xl-100 box-col-12">
                <div class="card">
                    <div class="card-header no-border">
                        <h5>Top Happiest Countries</h5>
                        <ul class="creative-dots">
                            <li class="bg-primary big-dot"></li>
                            <li class="bg-secondary semi-big-dot"></li>
                            <li class="bg-warning medium-dot"></li>
                            <li class="bg-info semi-medium-dot"></li>
                            <li class="bg-secondary semi-small-dot"></li>
                            <li class="bg-primary small-dot"></li>
                        </ul>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="icofont icofont-gear fa fa-spin font-primary"></i></li>
                                <li><i class="view-html fa fa-code font-primary"></i></li>
                                <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                                <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                                <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                                <li><i class="icofont icofont-error close-card font-primary"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="activity-table table-responsive recent-table">
                            <table class="table table-bordernone">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $v)
                                        <tr>
                                            <td>
                                                <div class="recent-images"><img class="img-fluid"
                                                        src="{{ asset('/assets/images/dashboard-ecommerce/1.png') }}"
                                                        alt=""></div>
                                            </td>
                                            <td>
                                                <h5 class="default-text mb-0 f-w-700 f-18">{{ $v['nama'] }}</h5>
                                            </td>
                                            <td><span
                                                    class="badge badge-pill recent-badge f-12">{{ $v['prediction_score'] }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">
                                <button class="btn btn-primary" type="button" data-original-title="btn btn-primary"
                                    wire:click="more">More<div wire:loading wire:target="more">...</div></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <!-- Plugins JS start-->
    <script src="{{ asset('/assets/js/chart/chartist/chartist.js') }}"></script>
    <script src="{{ asset('/assets/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('/assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('/assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('/assets/js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('/assets/js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('/assets/js/counter/counter-custom.js') }}"></script>
    <script src="{{ asset('/assets/js/custom-card/custom-card.js') }}"></script>
    <!-- Plugins JS Ends-->
    <script>
        //small-chart1
        new Chartist.Bar(
            ".small-chart1", {
                labels: ["Q1", "Q2", "Q3", "Q4", "Q5", "Q6", "Q7"],
                series: [
                    [400, 900, 800, 1000, 700, 1000],
                    [1000, 500, 600, 400, 700, 400],
                ],
            }, {
                plugins: [
                    Chartist.plugins.tooltip({
                        appendToBody: false,
                        className: "ct-tooltip",
                    }),
                ],
                stackBars: true,
                axisX: {
                    showGrid: false,
                    showLabel: false,
                    offset: 0,
                },
                axisY: {
                    low: 0,
                    showGrid: false,
                    showLabel: false,
                    offset: 0,
                    labelInterpolationFnc: function(value) {
                        return value / 1000 + "k";
                    },
                },
                height: 80,
                width: 120,
            }
        ).on("draw", function(data) {
            if (data.type === "bar") {
                data.element.attr({
                    style: "stroke-width: 5px ; stroke-linecap: round",
                });
            }
        });

        //small-chart2
        new Chartist.Bar(
            ".small-chart2", {
                labels: ["Q1", "Q2", "Q3", "Q4", "Q5", "Q6", "Q7"],
                series: [
                    [400, 900, 800, 1000, 700, 1000],
                    [1000, 500, 600, 400, 700, 400],
                ],
            }, {
                plugins: [
                    Chartist.plugins.tooltip({
                        appendToBody: false,
                        className: "ct-tooltip",
                    }),
                ],
                stackBars: true,
                axisX: {
                    showGrid: false,
                    showLabel: false,
                    offset: 0,
                },
                axisY: {
                    low: 0,
                    showGrid: false,
                    showLabel: false,
                    offset: 0,
                    labelInterpolationFnc: function(value) {
                        return value / 1000 + "k";
                    },
                },
                height: 80,
                width: 120,

                colors: ["#ffffff"],
                fill: {
                    opacity: 1,
                },
            }
        ).on("draw", function(data) {
            if (data.type === "bar") {
                data.element.attr({
                    style: "stroke-width: 5px ; stroke-linecap: round",
                });
            }
        });

        //small-chart3
        new Chartist.Bar(
            ".small-chart3", {
                labels: ["Q1", "Q2", "Q3", "Q4", "Q5", "Q6", "Q7"],
                series: [
                    [400, 900, 800, 1000, 700, 1000],
                    [1000, 500, 600, 400, 700, 400],
                ],
            }, {
                plugins: [
                    Chartist.plugins.tooltip({
                        appendToBody: false,
                        className: "ct-tooltip",
                    }),
                ],
                stackBars: true,
                axisX: {
                    showGrid: false,
                    showLabel: false,
                    offset: 0,
                },
                axisY: {
                    low: 0,
                    showGrid: false,
                    showLabel: false,
                    offset: 0,
                    labelInterpolationFnc: function(value) {
                        return value / 1000 + "k";
                    },
                },
                height: 80,
                width: 120,
            }
        ).on("draw", function(data) {
            if (data.type === "bar") {
                data.element.attr({
                    style: "stroke-width: 5px ; stroke-linecap: round",
                });
            }
        });

        //small-chart4
        new Chartist.Bar(
            ".small-chart4", {
                labels: ["Q1", "Q2", "Q3", "Q4", "Q5", "Q6", "Q7"],
                series: [
                    [400, 900, 800, 1000, 700, 1000],
                    [1000, 500, 600, 400, 700, 400],
                ],
            }, {
                plugins: [
                    Chartist.plugins.tooltip({
                        appendToBody: false,
                        className: "ct-tooltip",
                    }),
                ],
                stackBars: true,
                axisX: {
                    showGrid: false,
                    showLabel: false,
                    offset: 0,
                },
                axisY: {
                    low: 0,
                    showGrid: false,
                    showLabel: false,
                    offset: 0,
                    labelInterpolationFnc: function(value) {
                        return value / 1000 + "k";
                    },
                },
                height: 80,
                width: 120,

                colors: ["#ffffff"],
                fill: {
                    opacity: 1,
                },
            }
        ).on("draw", function(data) {
            if (data.type === "bar") {
                data.element.attr({
                    style: "stroke-width: 5px ; stroke-linecap: round",
                });
            }
        });

        // apex chart
        var options = {
            chart: {
                height: 350,
                type: "area",
                toolbar: {
                    show: false,
                },
            },
            dataLabels: {
                enabled: false,
            },
            grid: {
                borderColor: "#f0f7fa",
            },
            stroke: {
                curve: "smooth",
                width: 4,
            },
            series: [{
                name: "series1",
                data: @json($statistic['data']),
            }, ],

            xaxis: {
                low: 0,
                offsetX: 0,
                offsetY: 0,
                show: false,
                labels: {
                    low: 0,
                    offsetX: 0,
                    show: true,
                },
                axisBorder: {
                    low: 0,
                    offsetX: 0,
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                categories: @json($statistic['categori']),
            },
            yaxis: {
                labels: {
                    show: false,
                },
            },
            colors: ["#fe80b2"],
            fill: {
                type: "gradient",
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.6,
                    opacityTo: 1.0,
                    stops: [0, 85, 100],
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#area-spaline"), options);

        chart.render();
    </script>
@endsection
