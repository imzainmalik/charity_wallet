@extends('layouts.app')
@section('content')
    


<div class="contBody">
    <div class="row">
        <div class="col-md-9">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="card"> 
                <div class="d-flex justify-content-between">
                    <div>
                        <h3>Total Donations</h3>
                        <div class="totalvalue">
                            <h2>
                                <img src="{{ asset('assets/images/totalIcon.webp') }}" alt=""> $ 563,982.74
                            </h2>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex align-items-center mmtabs gap-3">
                            <div class="items">
                                <a class="tabsClick" id="monthlyTab" href="javascript:;"
                                    title="">
                                    <i class="check"></i>
                                    Monthly
                                </a>
                            </div>
                            <div class="items">
                                <a class="tabsClick active" id="weeklyTab" href="javascript:;"
                                    title="">
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
                            <h5>Samsul</h5>
                            <p>@sam224</p>
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
                            <input type="number" class="input-max" value="875">
                        </div>
                    </div>
                    <div class="slider">
                        <div class="progress"></div>
                    </div>
                    <div class="range-input">
                        <input type="range" class="range-max" min="0" max="10000" value="875"
                            step="1">
                    </div>
                    <div class="totalBalance">
                        <p>
                            <span>Your Balance</span>
                            <span>$ 456,345.62</span>
                        </p>
                    </div>
                    <div class="Btns">
                        <a class="themeBtn" href="javascript:;" title="">TRANSFER NOW</a>
                    </div>
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
                                <th>ID Invoice</th>
                                <th>Date</th>
                                <th>Recipient</th>
                                <th>Email</th>
                                <th>Service Type</th>
                                <th>Status</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>#123412451</td>
                                <td>June 1, 2024, 08:22 AM</td>
                                <td>
                                    <img class="img-30 me-2" src="assets/images/user/1.webp"
                                        alt="profile">
                                    Jason Peras
                                </td>
                                <td>jasonprass@mail.com</td>
                                <td>Donation</td>
                                <td>
                                    <a class="btn greyBtn" href="javascript:;"
                                        title="">Canceled</a>
                                </td>
                                <td>
                                    <div class="dropmenu">
                                        <a href="javascript:;" title="">
                                            <i class="fal fa-ellipsis-v"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>#123412451</td>
                                <td>June 1, 2024, 08:22 AM</td>
                                <td>
                                    <img class="img-30 me-2" src="assets/images/user/2.webp"
                                        alt="profile">
                                    Jason Peras
                                </td>
                                <td>jasonprass@mail.com</td>
                                <td>Donation</td>
                                <td>
                                    <a class="btn redBtn" href="javascript:;"
                                        title="">Pending</a>
                                </td>
                                <td>
                                    <div class="dropmenu">
                                        <a href="javascript:;" title="">
                                            <i class="fal fa-ellipsis-v"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>#123412451</td>
                                <td>June 1, 2024, 08:22 AM</td>
                                <td>
                                    <img class="img-30 me-2" src="assets/images/user/2.webp"
                                        alt="profile">
                                    Jason Peras
                                </td>
                                <td>jasonprass@mail.com</td>
                                <td>Donation</td>
                                <td>
                                    <a class="btn redBtn" href="javascript:;"
                                        title="">Pending</a>
                                </td>
                                <td>
                                    <div class="dropmenu">
                                        <a href="javascript:;" title="">
                                            <i class="fal fa-ellipsis-v"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>#123412451</td>
                                <td>June 1, 2024, 08:22 AM</td>
                                <td>
                                    <img class="img-30 me-2" src="assets/images/user/3.webp"
                                        alt="profile">
                                    Jason Peras
                                </td>
                                <td>jasonprass@mail.com</td>
                                <td>Donation</td>
                                <td>
                                    <a class="btn greyBtn" href="javascript:;"
                                        title="">Canceled</a>
                                </td>
                                <td>
                                    <div class="dropmenu">
                                        <a href="javascript:;" title="">
                                            <i class="fal fa-ellipsis-v"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>#123412451</td>
                                <td>June 1, 2024, 08:22 AM</td>
                                <td>
                                    <img class="img-30 me-2" src="assets/images/user/4.webp"
                                        alt="profile">
                                    Jason Peras
                                </td>
                                <td>jasonprass@mail.com</td>
                                <td>Donation</td>
                                <td>
                                    <a class="btn redBtn" href="javascript:;"
                                        title="">Pending</a>
                                </td>
                                <td>
                                    <div class="dropmenu">
                                        <a href="javascript:;" title="">
                                            <i class="fal fa-ellipsis-v"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>#123412451</td>
                                <td>June 1, 2024, 08:22 AM</td>
                                <td>
                                    <img class="img-30 me-2" src="assets/images/user/5.webp"
                                        alt="profile">
                                    Jason Peras
                                </td>
                                <td>jasonprass@mail.com</td>
                                <td>Donation</td>
                                <td>
                                    <a class="btn greenBtn" href="javascript:;"
                                        title="">Pending</a>
                                </td>
                                <td>
                                    <div class="dropmenu">
                                        <a href="javascript:;" title="">
                                            <i class="fal fa-ellipsis-v"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>#123412451</td>
                                <td>June 1, 2024, 08:22 AM</td>
                                <td>
                                    <img class="img-30 me-2" src="assets/images/user/5.webp"
                                        alt="profile">
                                    Jason Peras
                                </td>
                                <td>jasonprass@mail.com</td>
                                <td>Donation</td>
                                <td>
                                    <a class="btn greenBtn" href="javascript:;"
                                        title="">Pending</a>
                                </td>
                                <td>
                                    <div class="dropmenu">
                                        <a href="javascript:;" title="">
                                            <i class="fal fa-ellipsis-v"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection