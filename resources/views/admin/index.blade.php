@extends('layouts.app')
@section('content')



    <div class="contBody">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3>Total Donations</h3>
                            <div class="totalvalue">
                                <h2>
                                    <img src="{{ asset('assets/images/totalIcon.webp') }}" alt=""> $
                                    {{ $donations_sum }}
                                </h2>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center mmtabs gap-3">
                                <div class="items">
                                    <a class="tabsClick" id="monthlyTab" href="javascript:;" title="">
                                        <i class="check"></i>
                                        Monthly
                                    </a>
                                </div>
                                <div class="items">
                                    <a class="tabsClick active" id="weeklyTab" href="javascript:;" title="">
                                        <i class="check"></i>
                                        Weekly
                                    </a>
                                </div>
                                <div class="items">
                                    <div class="dropmenu">
                                        <a href="javascript:;" title="">
                                            <i class="fal fa-ellipsis-v"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="reportLastweek">
                                <p><span>+0.6%</span> than last week</p>
                            </div>
                        </div>
                    </div>
                    <div class="mmCharts">

                        <div id="weeklyChart"></div>
                        <div id="monthlyChart" style="display:none"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-0">
                    <h3>Previous Transactions</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur</p>
                    <div class="tableMain table-responsive custom-scrollbar">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    {{-- <th>ID Invoice</th> --}}
                                    <th>Date</th>
                                    <th>Recipient</th>
                                    <th>From</th>
                                    {{-- <th>Email</th> --}}
                                    <th>Service Type</th>
                                    <th>Status</th>
                                    {{-- <th>&nbsp;</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if ($all_donation->count() > 0)
                                    @php
                                        $all_donations = $all_donation->paginate(10);
                                    @endphp
                                    @foreach ($all_donations as $all_donationn)
                                        @php
                                            $campaign_user_info = App\Models\Campaign::where(
                                                'id',
                                                $all_donationn->campaign_id,
                                            )->first();
                                            $user = App\Models\User::where(
                                                'id',
                                                $campaign_user_info->collector_id,
                                            )->first();
                                        @endphp
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            {{-- <td>#123412451</td> --}}
                                            <td>{{ $all_donationn->created_at->format('F j, Y, h:i A') }}</td>
                                            <td>
                                                <img class="img-30 me-2" src="{{ asset($user->profile_avatar) }}"
                                                    style="border-radius: 50px;" alt="profile">
                                                {{ $user->f_name . '' . $user->l_name }}
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>Donation</td>
                                            <td>
                                                <div class="badge badge-success">Paid</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ $all_donations->links() }}
                                @else
                                    <tr>
                                        <td>No data found.</td>
                                    </tr>
                                @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script>
        // Sample data for weekly reports
        var weeklyData = [
            @foreach ($weekly_donation as $weekly_donationnn)
                {{ round($weekly_donationnn->count) }},
            @endforeach
        ]; // Example data for 7 days 
        // Sample data for monthly reports
        var monthlyData = [
            @foreach ($monthly_donation as $monthly_donationn)
                {{ $monthly_donationn->count }},
            @endforeach
        ];
        // Function to render the weekly chart
        function renderWeeklyChart() {
            var options = {
                series: [{
                    name: "Weekly Donatated",
                    data: weeklyData
                }],
                chart: {
                    height: 320,
                    type: 'line',
                    zoom: {
                        enabled: true
                    },
                    toolbar: {
                        show: true
                    }
                },
                dataLabels: {
                    enabled: true
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    categories: [
                        @foreach ($weekly_donation as $weekly_donationnn)
                            'Saturday',
                            'Sunday',
                            'Monday',
                            'Tuesday',
                            'Wednesday',
                            'Thursday',
                            'Friday',
                        @endforeach
                    ]
                }
            };

            var chart = new ApexCharts(document.querySelector("#weeklyChart"), options);
            chart.render();
        }

        // Function to render the monthly chart
        function renderMonthlyChart() {
            var categories = [];
            for (var i = 1; i <= 30; i++) {
                categories.push('Day ' + i);
            }

            var options = {
                series: [{
                    name: "Monthly Donatated",
                    data: monthlyData
                }],
                chart: {
                    height: 320,
                    type: 'line',
                    zoom: {
                        enabled: false
                    },
                    toolbar: {
                        show: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth'
                },
                xaxis: {
                    categories: categories
                }
            };

            var chart = new ApexCharts(document.querySelector("#monthlyChart"), options);
            chart.render();
        }

        // Event listener for weekly tab
        document.getElementById("weeklyTab").addEventListener("click", function() {
            renderWeeklyChart();
            document.querySelector("#weeklyTab").classList.add("active");
            document.querySelector("#monthlyTab").classList.remove("active");
            document.getElementById("weeklyChart").style.display = "block";
            document.getElementById("monthlyChart").style.display = "none";
        });

        // Event listener for monthly tab
        document.getElementById("monthlyTab").addEventListener("click", function() {
            renderMonthlyChart();
            document.querySelector("#monthlyTab").classList.add("active");
            document.querySelector("#weeklyTab").classList.remove("active");
            document.getElementById("weeklyChart").style.display = "none";
            document.getElementById("monthlyChart").style.display = "block";
        });
        // Initial rendering
        renderWeeklyChart();
        renderMonthlyChart();
    </script>
@endpush
