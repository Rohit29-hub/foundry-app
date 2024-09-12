@extends('layout')

@section('bottomscripts')
    <script>
        class IRChart {
            static init() {
                const data = [1,2];
                const labels = ['Final Assembly', 'Surface Treatment'];
                const colors = ['var(--tw-primary)', 'var(--tw-brand)', 'var(--tw-success)', 'var(--tw-info)', 'var(--tw-warning)'];

                const options = {
                    series: data,
                    labels: labels,
                    colors: colors,
                    fill: {
                        colors: colors,
                    },
                    chart: {
                        type: 'donut',
                    },
                    stroke: {
                        show: true,
                        width: 2, // Set the width of the border
                        colors: 'var(--tw-light)' // Set the color of the border
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    plotOptions: {
                        pie: {
                            expandOnClick: false,
                        }
                    },
                    legend: {
                        offsetY: -5,
                        offsetX: -10,
                        fontSize: '14px', // Set the font size
                        fontWeight: '500', // Set the font weight
                        labels: {
                            colors: 'var(--tw-gray-700)', // Set the font color for the legend text
                            useSeriesColors: false // Optional: Set to true to use series colors for legend text
                        },
                        markers: {
                            width: 8,
                            height: 8
                        }
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

                const element = document.querySelector('#ir_chart');
                if (!element) return;

                const chart = new ApexCharts(element, options);
                chart.render();
            }
        }

        class SRBWIPLChart {
            static init() {
                const data = [4];
                const labels = ['Frame Assembly'];
                const colors = ['var(--tw-primary)', 'var(--tw-brand)', 'var(--tw-success)', 'var(--tw-info)', 'var(--tw-warning)'];

                const options = {
                    series: data,
                    labels: labels,
                    colors: colors,
                    fill: {
                        colors: colors,
                    },
                    chart: {
                        type: 'donut',
                    },
                    stroke: {
                        show: true,
                        width: 2, // Set the width of the border
                        colors: 'var(--tw-light)' // Set the color of the border
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    plotOptions: {
                        pie: {
                            expandOnClick: false,
                        }
                    },
                    legend: {
                        offsetY: -5,
                        offsetX: -10,
                        fontSize: '14px', // Set the font size
                        fontWeight: '500', // Set the font weight
                        labels: {
                            colors: 'var(--tw-gray-700)', // Set the font color for the legend text
                            useSeriesColors: false // Optional: Set to true to use series colors for legend text
                        },
                        markers: {
                            width: 8,
                            height: 8
                        }
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

                const element = document.querySelector('#srbwipl_chart');
                if (!element) return;

                const chart = new ApexCharts(element, options);
                chart.render();
            }
        }
        class CONCORChart {
            static init() {
                const data = [2, 2, 2, 1];
                const labels = ['Frame Assembly','Body Assembly','Surface Treatment','Final Assembly'];
                const colors = ['var(--tw-primary)', 'var(--tw-brand)', 'var(--tw-success)', 'var(--tw-info)', 'var(--tw-warning)'];

                const options = {
                    series: data,
                    labels: labels,
                    colors: colors,
                    fill: {
                        colors: colors,
                    },
                    chart: {
                        type: 'donut',
                    },
                    stroke: {
                        show: true,
                        width: 2, // Set the width of the border
                        colors: 'var(--tw-light)' // Set the color of the border
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    plotOptions: {
                        pie: {
                            expandOnClick: false,
                        }
                    },
                    legend: {
                        offsetY: -5,
                        offsetX: -10,
                        fontSize: '14px', // Set the font size
                        fontWeight: '500', // Set the font weight
                        labels: {
                            colors: 'var(--tw-gray-700)', // Set the font color for the legend text
                            useSeriesColors: false // Optional: Set to true to use series colors for legend text
                        },
                        markers: {
                            width: 8,
                            height: 8
                        }
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

                const element = document.querySelector('#concor_chart');
                if (!element) return;

                const chart = new ApexCharts(element, options);
                chart.render();
            }
        }

        KTDom.ready(() => {
            IRChart.init();
            SRBWIPLChart.init();
            CONCORChart.init();
        });
    </script>
    <script>
        setTimeout(()=>{location.href='/';}, 10000)

    </script>
@endsection

@section('main')
    <main class="grow" id="content" role="content">
        <!-- Container -->
        <div class="container-fixed" id="content_container">
        </div>
        <!-- End of Container -->
        <!-- Container -->
        <div class="container-fixed">
            <div class="grid gap-5 lg:gap-7.5">
                <!-- begin: grid -->
                <div class="grid lg:grid-cols-3 gap-y-5 items-stretch">
                    <div class="lg:col-span-1 px-2">
                        {{--                        <div class="card mb-2">--}}
                        {{--                            <div class="card-body p-0">--}}
                        {{--                                <div class="flex px-1 py-1">--}}
                        {{--                                    <div class="grid flex-1">--}}
                        {{--                                        <div class="flex justify-self-center items-center gap-1">--}}
                        {{--                                            <div class="grid grid-cols-1 place-content-center flex-1">--}}
                        {{--              <span class="text-gray-900 text-2xl lg:text-2.5xl font-semibold">--}}
                        {{--               1--}}
                        {{--              </span>--}}
                        {{--                                                <span class="text-gray-700 text-sm">--}}
                        {{--               Late Job--}}
                        {{--              </span>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <span class="[&amp;:not(:last-child)]:border-r border-r-gray-300 my-1">--}}
                        {{--           </span>--}}
                        {{--                                    <div class="grid flex-1">--}}
                        {{--                                        <div class="flex justify-self-center items-center gap-3">--}}
                        {{--                                            <div class="grid grid-cols-1 place-content-center flex-1">--}}
                        {{--              <span class="text-gray-900 text-2xl lg:text-2.5xl font-semibold">--}}
                        {{--               19--}}
                        {{--              </span>--}}
                        {{--                                                <span class="text-gray-700 text-sm">--}}
                        {{--               On time--}}
                        {{--              </span>--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                    <span class="[&amp;:not(:last-child)]:border-r border-r-gray-300 my-1">--}}
                        {{--           </span>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}


                        <div class="card h-full">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Orders Trend
                                </h3>
                            </div>
                            <div class="card-body flex flex-col gap-2 px-5 lg:px-7.5 pt-5">



                                <div class="px-3" id="my_balance_chart">
                                </div>



                                <span class="text-2sm font-normal text-danger">
           Late Jobs
          </span>
                                <span class="text-2xl font-semibold text-danger mb-3">
           JIN222
          </span>



                                <div class="btn-group" data-tabs="true">
                                    <button class="btn btn-sm btn-light flex justify-center w-1/4 focus:shadow-none hover:shadow-none btn-active:shadow-none btn-active:text-gray-900 btn-active:bg-gray-100 active" data-tab-toggle="#tab_2_1">
                                        DIODE
                                    </button>
                                    <button class="btn btn-sm btn-light flex justify-center w-1/4 focus:shadow-none hover:shadow-none btn-active:shadow-none btn-active:text-gray-900 btn-active:bg-gray-100" data-tab-toggle="#tab_2_2">
                                        TRANSISTOR
                                    </button>
                                    <button class="btn btn-sm btn-light flex justify-center w-1/4 focus:shadow-none hover:shadow-none btn-active:shadow-none btn-active:text-gray-900 btn-active:bg-gray-100" data-tab-toggle="#tab_2_3">
                                        MOSFET
                                    </button>
                                    <button class="btn btn-sm btn-light flex justify-center w-1/4 focus:shadow-none bhover:shadow-none btn-active:shadow-none btn-active:text-gray-900 btn-active:bg-gray-100">
                                        RECTIFIER
                                    </button>
                                </div>
                                <div class="" id="tab_2_1">
                                    <div id="ir_chart">
                                    </div>

                                    <br/>
                                    {{--                                    <div id="contributions_chart"></div> <br/>--}}
                                    <div class="card-table scrollable-x-auto p-0">
                                        <table class="table p-0">
                                            <thead>
                                            <tr>
                                                <th class="min-w-30">
                                                    Job
                                                </th>
                                                <th class="min-w-70">
                                                    Stage
                                                </th>
                                                <th class="min-w-30">
                                                    Progress
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(\App\Models\Client::find(1)->jobs()->with('station')->get() as $j)
                                                <tr>
                                                    <td class="text-sm font-medium text-gray-700">
                                                        {{$j->title}}
                                                    </td>
                                                    <td class="lg:text-right">
                                                        <div class="text-sm text-gray-700">
                                                            {{$j->station->title}}
                                                        </div>
                                                    </td>
                                                    <td class="text-sm font-medium text-gray-700 lg:text-right">
                                                        {{$j->progress}}%
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="hidden" id="tab_2_2">

                                    <div id="srbwipl_chart">
                                    </div>

                                    <br/>
                                    {{--                                    <div id="contributions_chart"></div> <br/>--}}
                                    <div class="card-table scrollable-x-auto p-0">
                                        <table class="table p-0">
                                            <thead>
                                            <tr>
                                                <th class="min-w-30">
                                                    Job
                                                </th>
                                                <th class="min-w-70">
                                                    Stage
                                                </th>
                                                <th class="min-w-30">
                                                    Progress
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(\App\Models\Client::find(2)->jobs()->with('station')->get() as $j)
                                                <tr>
                                                    <td class="text-sm font-medium text-gray-700">
                                                        {{$j->title}}
                                                    </td>
                                                    <td class="lg:text-right">
                                                        <div class="text-sm text-gray-700">
                                                            {{$j->station->title}}
                                                        </div>
                                                    </td>
                                                    <td class="text-sm font-medium text-gray-700 lg:text-right">
                                                        {{$j->progress}}%
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                                </div>
                                <div class="hidden" id="tab_2_3">

                                    <div id="concor_chart">
                                    </div>

                                    <br/>
                                    {{--                                    <div id="contributions_chart"></div> <br/>--}}
                                    <div class="card-table scrollable-x-auto p-0">
                                        <table class="table p-0">
                                            <thead>
                                            <tr>
                                                <th class="min-w-30">
                                                    Job
                                                </th>
                                                <th class="min-w-70">
                                                    Stage
                                                </th>
                                                <th class="min-w-30">
                                                    Progress
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach(\App\Models\Client::find(3)->jobs()->with('station')->get() as $j)
                                                <tr>
                                                    <td class="text-sm font-medium text-gray-700">
                                                        {{$j->title}}
                                                    </td>
                                                    <td class="lg:text-right">
                                                        <div class="text-sm text-gray-700">
                                                            {{$j->station->title}}
                                                        </div>
                                                    </td>
                                                    <td class="text-sm font-medium text-gray-700 lg:text-right">
                                                        {{$j->progress}}%
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="grid md:grid-cols-2 gap-5 lg:gap-7.5 h-full items-stretch">
                            <style>
                                .channel-stats-bg {
                                    background-image: url('assets/media/images/2600x1600/bg-3.png');
                                }
                                .dark .channel-stats-bg {
                                    background-image: url('assets/media/images/2600x1600/bg-3-dark.png');
                                }
                            </style>



                            @foreach($stations as $station)
                                <div class="card px-1 bg-[length:85%] [background-position:9rem_-2.5rem] bg-no-repeat channel-stats-bg">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{$station->title}}
                                    </h3>
                                </div>
                                <div class="card-body flex flex-col gap-4 p-5 lg:p-7.5 lg:pt-4">
                                    <div class="flex flex-col gap-0.5">
            <span class="text-sm font-normal text-gray-700">
             Total jobs
            </span>
                                        <div class="flex items-center gap-2.5">
             <span class="text-3xl font-semibold text-gray-900">
              {{$station->jobs()->count()}}
             </span>
                                        </div>
                                    </div>
                                    @php
                                        $non_unique_clients = $station->jobs->map(function($j){return $j->client;});
//                                        $unique_client_titles = $non_unique_clients->unique()->pluck('title');
                                    @endphp

                                    <div class="flex items-center gap-1 mb-1.5">
                                        @foreach($non_unique_clients->unique() as $u_client)
                                            @php $just_this = $non_unique_clients->where('title',$u_client->title); $pct = number_format(sizeof($just_this)*100/sizeof($non_unique_clients),0 ); @endphp
                                            <div class="h-2 w-full max-w-[{{$pct}}%] rounded-sm" style="background:#{{$u_client->color_code}}">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="flex items-center flex-wrap gap-4 mb-1">
                                        @foreach($non_unique_clients->unique() as $u_client)
                                        <div class="flex items-center gap-1.5">
                                            <span class="badge badge-dot size-2" style="color:#FFF; background-color: #{{$u_client->color_code}}"></span>
                                            <span class="text-sm font-normal text-gray-800">{{$u_client->title}}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="border-b border-gray-300">
                                    </div>
                                    <div class="grid gap-3" style="max-height:125px !important; overflow-y: scroll">

                                        @foreach($station->jobs as $job)
                                            <div class="flex items-center justify-between flex-wrap gap-2">
                                                <div class="flex items-center gap-1.5">
                                                    <span class="badge badge-dot size-2" style="color:#FFF; background-color: #{{$job->client->color_code}}"></span>
                                                   @if(Auth::check() && Auth::user()->role === "manager{$station->id}")
    <a class="text-sm font-normal text-gray-900" href="/manager/{{$station->id}}">
        {{ $job->title }}
    </a>
    @else
    <a class="text-sm font-normal text-gray-900" href="/jobdetail/{{ strtolower($job->title) }}">
        {{ $job->title }}
    </a>
@endif
                                                </div>
                                                <div class="flex items-center text-sm font-medium text-gray-800 gap-1.5">
                                                    @if($job->progress)
                                                        <span class="text-2sm text-gray-600">Progress:</span>
                                                        <div class="progress {{$job->progress == 100 ? 'progress-success' : 'progress-dark'}} min-w-[120px]">
                                                            <div class="progress-bar" style="width: {{$job->progress}}%">
                                                            </div>
                                                        </div>
                                                        {{$job->progress}}%
                                                    @else <span class="text-danger">Not started</span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- end: grid -->
            </div>
        </div>
        <!-- End of Container -->
    </main>
@endsection