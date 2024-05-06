@extends('layouts.app')
@section('content')
    <div class="contBody">
        <div class="row">
            <div class="col-md-9">
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="card">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3>Total Donations</h3>
                            <div class="totalvalue">
                                <h2>
                                    <img src="{{ asset('assets/images/totalIcon.webp') }}" alt=""> $
                                    {{ $all_donation->sum('amount') }}
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
                                {{-- <div class="items">
                                    <div class="dropmenu">
                                        <a href="javascript:;" title="">
                                            <i class="fal fa-ellipsis-v"></i>
                                        </a>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="reportLastweek">than last week
                                <p><span
                                        @if ($in_minus == 'yes') style="color: red;" @endif>{{ round($percentageIncrease) }}%</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mmCharts">
                        <div id="weeklyChart"></div>
                        <div id="monthlyChart" style="display:none"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h3>Quick Transfer</h3>
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                        <div class="dropmenu">
                            <a href="javascript:;" title="">
                                <i class="fal fa-ellipsis-v"></i>
                            </a>
                        </div>
                    </div>
                    <div class="usersBox">
                        <div class="userDet">
                            <figure>
                                <img src="assets/images/user1.webp" alt="">
                            </figure>
                            <div class="cont">
                                <h5>{{ Auth::user()->f_name }}</h5>
                                <p>{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <div>
                            <figure>
                                <img src="assets/images/check.webp" alt="">
                            </figure>
                        </div>
                    </div>
                    <div class="insertamount">
                        <h4>Insert Amount</h4>
                        <div class="price-input">
                            <div class="field">
                                <input type="number" @if ($wallet == null || $wallet->wallet_ammount == 0) disabled @endif class="input-max"
                                    value="{{ $wallet->wallet_ammount ?? 0 }}">
                            </div>
                        </div>
                        <div class="slider">
                            <div class="progress"></div>
                        </div>
                        <div class="range-input">
                            <input type="range" @if ($wallet == null || $wallet->wallet_ammount == 0) disabled @endif class="range-max"
                                min="0" max="{{ $wallet->wallet_ammount ?? 0 }}"
                                value="{{ $wallet->wallet_ammount ?? 0 }}" step="1">
                        </div>
                        <div class="totalBalance">
                            <p>
                                <span>Your Balance</span>
                                <span>$ {{ $wallet->wallet_ammount ?? 0 }}</span>
                            </p>
                        </div>
                        <div class="Btns">
                            @if ($wallet == null || $wallet->wallet_ammount == 0)
                                <a class="themeBtn" href="javascript:;" title="">TRANSFER NOW</a>
                            @else
                                <button class="themeBtn">TRANSFER NOW</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mb-0">
                    <div class="row">
                        <div class="col-8">
                            <h3>Previous Transactions</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur</p>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <a href="">View all</a>
                        </div>
                    </div>
                    <div class="tableMain table-responsive custom-scrollbar">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    {{-- <th>ID Invoice</th> --}}
                                    <th>Date</th>
                                    <th>Recipient</th>
                                    <th>Email</th>
                                    <th>Service Type</th>
                                    <th>Status</th>
                                    {{-- <th>&nbsp;</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @if ($all_donation->count() > 0)
                                    @foreach ($all_donation->get() as $all_donationn)
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
                                            {{-- <td>#123412451549</td> --}}
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
        const priceInput = document.querySelector(".price-input .input-max"),
            rangeInput = document.querySelector(".range-input .range-max"),
            range = document.querySelector(".slider .progress");

        let priceGap = {{ $wallet->wallet_ammount ?? 0 }};

        priceInput.addEventListener("input", (e) => {
            let maxPrice = parseInt(priceInput.value),
                rangeMax = parseInt(rangeInput.max);

            if (maxPrice <= rangeMax) {
                rangeInput.value = maxPrice;
                range.style.right = 100 - (maxPrice / rangeMax) * 100 + "%";
            }
        });

        rangeInput.addEventListener("input", (e) => {
            let maxVal = parseInt(rangeInput.value),
                rangeMax = parseInt(rangeInput.max);

            if (maxVal <= rangeMax) {
                priceInput.value = maxVal;
                range.style.right = 100 - (maxVal / rangeMax) * 100 + "%";
            }
        });
        // Sample data for weekly reports
        var weeklyData = [
            @foreach ($weekly_donation as $weekly_donationnn)
                {{ round($weekly_donationnn->count) }},
            @endforeach
        ];
        // Example data for 7 days

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
                    categories: ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday',
                        'Saturday', 'Sunday', 'Monday'
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
