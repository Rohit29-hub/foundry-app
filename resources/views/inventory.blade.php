@extends('layout')

@section('main')
    <main class="grow" id="content" role="content">
        <!-- Container -->
        <div class="container-fixed" id="content_container">
        </div>
        <!-- End of Container -->
        <!-- Container -->
        <div class="container-fixed">
            <div class="grid gap-5 lg:gap-7.5">
                <div class="card card-grid min-w-full">
                    <div class="card-body">
                        <div id="inventorychart"></div>
                    </div>
                </div>
                <div class="card card-grid min-w-full">
                    <div class="card-header flex-wrap py-5">
                        <h3 class="card-title">
                            Items
                        </h3>
                        <div class="flex gap-6">
                            <div class="relative">
                                <i class="ki-filled ki-magnifier leading-none text-md text-gray-500 absolute top-1/2 left-0 -translate-y-1/2 ml-3">
                                </i>
                                <input class="input input-sm pl-8" data-datatable-search="#teams_table" placeholder="Search Items" type="text"/>
                            </div>
                            <label class="switch switch-sm">
                                <input class="order-2" name="check" type="checkbox" value="1"/>
                                <span class="switch-label order-1">
           Only Active Items
          </span>
                            </label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div data-datatable="true" data-datatable-page-size="10" id="teams_table">
                            <div class="scrollable-x-auto">
                                <table class="table table-fixed table-border" data-datatable-table="true">
                                    <thead>
                                    <tr>
                                        <th class="w-[60px] text-center">
                                            <input class="checkbox checkbox-sm" data-datatable-check="true" type="checkbox"/>
                                        </th>
                                        <th class="w-[350px]">
              <span class="sort asc">
               <span class="sort-label">
                Title
               </span>
               <span class="sort-icon">
               </span>
              </span>
                                        </th>
                                        <th class="w-[200px]">
              <span class="sort">
               <span class="sort-label">
                Quantity
               </span>
               <span class="sort-icon">
               </span>
              </span>
                                        </th>
                                        <th class="w-[200px]">
              <span class="sort">
               <span class="sort-label">
                Last Modified
               </span>
               <span class="sort-icon">
               </span>
              </span>
                                        </th>
                                        <th class="w-[200px]">
              <span class="sort asc">
               <span class="sort-label">
                Managers
               </span>
               <span class="sort-icon">
               </span>
              </span>
                                        </th>
                                        <th class="w-[60px]">
                                        </th>
                                        <th class="w-[60px]">
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for($i=579; $i<688; $i = $i+rand(4,10))
                                    <tr>
                                        <td class="text-center">
                                            <input class="checkbox checkbox-sm" data-datatable-row-check="true" type="checkbox" value="1"/>
                                        </td>
                                        <td>
                                            <div class="flex flex-col gap-1.5">
                                                <a class="leading-none font-semibold text-sm text-gray-900 hover:text-primary" href="/productdetail/{{$i}}">
                                                    Item{{$i}}
                                                </a>
                                                <span class="text-2sm text-gray-600">
                Description of Item{{$i}}
               </span>
                                            </div>
                                        </td>
                                        <td>
                                            {{rand(15,150)}}
                                        </td>
                                        <td>
                                            21 Oct, 2024
                                        </td>
                                        <td>
                                            <div class="flex -space-x-2">
                                                <div class="flex">
                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]" src="assets/media/avatars/300-4.png"/>
                                                </div>
                                                <div class="flex">
                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]" src="assets/media/avatars/300-1.png"/>
                                                </div>
                                                <div class="flex">
                                                    <img class="hover:z-5 relative shrink-0 rounded-full ring-1 ring-light-light size-[30px]" src="assets/media/avatars/300-2.png"/>
                                                </div>
                                                <div class="flex">
                <span class="relative inline-flex items-center justify-center shrink-0 rounded-full ring-1 font-semibold leading-none text-3xs size-[30px] text-success-inverse ring-success-light bg-success">
                 +10
                </span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-icon btn-clear btn-light" href="#">
                                                <i class="ki-filled ki-notepad-edit">
                                                </i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-icon btn-clear btn-light" href="#">
                                                <i class="ki-filled ki-trash">
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endfor
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer justify-center md:justify-between flex-col md:flex-row gap-5 text-gray-600 text-2sm font-medium">
                                <div class="flex items-center gap-2 order-2 md:order-1">
                                    Show
                                    <select class="select select-sm w-16" data-datatable-size="true" name="perpage">
                                    </select>
                                    per page
                                </div>
                                <div class="flex items-center gap-4 order-1 md:order-2">
           <span data-datatable-info="true">
           </span>
                                    <div class="pagination" data-datatable-pagination="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Container -->
    </main>
@endsection

@section('bottomscripts')
    <script>
        var options = {
            series: [{
                name: 'Entry Gate',
                data: [44, 55, 41, 37, 22, 43, 21]
            }, {
                name: 'Casting Store',
                data: [53, 32, 33, 52, 13, 43, 32]
            }, {
                name: 'Rejected',
                data: [12, 17, 11, 9, 15, 11, 20]
            }, {
                name: 'Machine Shop',
                data: [9, 7, 5, 8, 6, 9, 4]
            }, {
                name: 'Finished Goods',
                data: [25, 12, 19, 32, 25, 24, 10]
            }],
            chart: {
                type: 'bar',
                height: 500,
                stacked: true,
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    dataLabels: {
                        total: {
                            enabled: true,
                            offsetX: 0,
                            style: {
                                fontSize: '13px',
                                fontWeight: 900
                            }
                        }
                    }
                },
            },
            stroke: {
                width: 1,
                colors: ['#fff']
            },
            title: {
                text: 'Inventory Categories'
            },
            xaxis: {
                categories: ['Item1', 'Item2', 'Item3', 'Item4', 'Item5', 'Item6', 'Item7'],
                labels: {
                    formatter: function (val) {
                        return val;
                    }
                }
            },
            yaxis: {
                title: {
                    text: undefined
                },
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val;
                    }
                }
            },
            fill: {
                opacity: 1
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left',
                offsetX: 40
            }
        };

        var chart = new ApexCharts(document.querySelector("#inventorychart"), options);
        chart.render();
    </script>
@endsection