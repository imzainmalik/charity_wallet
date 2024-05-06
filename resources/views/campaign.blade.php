{{-- Logo: <img src="{{ asset($campign->logo) }}" alt="" style="width: 80px;"> <br>
Collector name: {{ $collector_info->f_name . '' . $collector_info->l_name }} <br>
Collector Email: {{ $collector_info->email }} <br>
Collector Profile: <img src="{{ asset($campign->logo) }}" style="width: 80px;" alt=""> <br> 
Campign description: {{ $campign->description }} <br>
Campign start date: {{ $campign->start_date }} <br>
Campign end date: {{ $campign->end_date }} <br>
Campign goal: ${{ $campign->goal_ammount }} <br> --}}
@include('includes.style')
<link rel="icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}" />
<section class="siginScreen">
    <div class="left">
        <figure>
            <img class="img-fluid" src="{{ asset('assets/images/loginimg.webp') }}" alt="">
        </figure>
    </div>
    <div class="right align-items-center">
        <div class="contBody">
            <div class="">
                <div class="text-center">
                    <figure>
                        <img src="{{ asset($campign->logo) }}" alt="" style="width: 80px;">
                    </figure>
                </div>
                <div class="campaign_details">
                    <div id="normal-countdown" data-date="2024/06/30"></div>
                    <figure>
                        <img src="{{ asset($campign->logo) }}" alt="" style="width: 80px;">
                    </figure>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ListCollector">
                                <div class="items">
                                    <strong>Collector Profile:</strong>
                                    <div class="profileImg">
                                        <img src="{{ asset($collector_info->profile_avatar) }}" alt=""
                                            style="width: 80px;">
                                    </div>
                                </div>
                                <div class="items">
                                    <strong>Collector Name:</strong>
                                    <span>{{ $collector_info->f_name . '' . $collector_info->l_name }}</span>
                                </div>
                                <div class="items">
                                    <strong>Collector Email:</strong>
                                    <span>{{ $collector_info->email }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ListCollector">
                                <div class="items">
                                    <strong>Campign description:</strong>
                                    <span>{{ $campign->description }}</span>
                                </div>
                                <div class="items">
                                    <strong>Campign start date:</strong>
                                    <span>{{ $campign->start_date }}</span>
                                </div>
                                <div class="items">
                                    <strong>Campign end date:</strong>
                                    <span>{{ $campign->end_date }}</span>
                                </div>
                                <div class="items">
                                    <strong>Campign goal:</strong>
                                    <span>${{ $campign->goal_ammount }}.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center pt-5">
                        <a class="themeBtn" data-toggle="modal" data-target="#DonateNow" href="javascript:;"
                            title="">Donate Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
{{-- 415
App\Models\Lesson
391
26
10 --}}
<div class="modal fade" id="DonateNow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Choose Your Deposit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="donateNowMod">
                <div class="giveforms">
                    <form action="">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="boxDepositCards">
                                    <input type="radio" name="cardPayment" value="ACH" data-toggle="modal"
                                        data-target="#DonateNowForm ">
                                    <div class="Bxdepositcat">
                                        <div class="ico">
                                            <img src="{{ asset('assets/images/deposit-ico1.webp') }}" alt=""
                                                class="mCS_img_loaded">
                                        </div>
                                        <h5>ACH</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="boxDepositCards">
                                    <input type="radio" name="cardPayment" value="Credit Card" data-toggle="modal"
                                        data-target="#DonateNowForm">
                                    <div class="Bxdepositcat">
                                        <div class="ico">
                                            <img src="{{ asset('assets/images/deposit-ico2.webp') }}" alt=""
                                                class="mCS_img_loaded">
                                        </div>
                                        <h5>Credit Card</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="boxDepositCards">
                                    <input type="radio" name="cardPayment" value="wire transfer" data-toggle="modal"
                                        data-target="#DonateNowForm ">
                                    <div class="Bxdepositcat">
                                        <div class="ico">
                                            <img src="{{ asset('assets/images/deposit-ico3.webp') }}" alt=""
                                                class="mCS_img_loaded">
                                        </div>
                                        <h5>Wire Transfer</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="boxDepositCards">
                                    <input type="radio" name="cardPayment" value="zelle" data-toggle="modal"
                                        data-target="#DonateNowForm ">
                                    <div class="Bxdepositcat">
                                        <div class="ico">
                                            <img src="{{ asset('assets/images/deposit-ico4.webp') }}" alt=""
                                                class="mCS_img_loaded">
                                        </div>
                                        <h5>Zelle</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="boxDepositCards">
                                    <input type="radio" name="cardPayment" value="check by mail"
                                        data-toggle="modal" data-target="#DonateNowForm ">
                                    <div class="Bxdepositcat">
                                        <div class="ico">
                                            <img src="{{ asset('assets/images/deposit-ico5.webp') }}" alt=""
                                                class="mCS_img_loaded">
                                        </div>
                                        <h5>Check by Mail</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="DonateNowForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Donate Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="donateNowMod">
                <div class="donatepaymentform">
                    <form action="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="field">
                                    <label>Donate Amount</label>
                                    <input type="text" class="inpt numberonly" placeholder="Amount" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="field">
                                    <label>Card Number</label>
                                    <input id="cc" type="text" class="inpt numberonly"
                                        placeholder="1234 1234 1234 1234" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="field">
                                    <label>Expiration Date</label>
                                    <select id="cardMonth" data-ref="cardDate" class="inpt" required>
                                        <option value="" disabled="disabled" selected="selected">Month</option>
                                        <option value="01"> 01 </option>
                                        <option value="02"> 02 </option>
                                        <option value="03"> 03 </option>
                                        <option value="04"> 04 </option>
                                        <option value="05"> 05 </option>
                                        <option value="06"> 06 </option>
                                        <option value="07"> 07 </option>
                                        <option value="08"> 08 </option>
                                        <option value="09"> 09 </option>
                                        <option value="10"> 10 </option>
                                        <option value="11"> 11 </option>
                                        <option value="12"> 12 </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="field">
                                    <label>&nbsp;</label>
                                    <select id="cardYear" data-ref="cardDate" class="inpt" required>
                                        <option value="" disabled="disabled" selected="selected">Year</option>
                                        <option value="2024"> 2024 </option>
                                        <option value="2025"> 2025 </option>
                                        <option value="2026"> 2026 </option>
                                        <option value="2027"> 2027 </option>
                                        <option value="2028"> 2028 </option>
                                        <option value="2029"> 2029 </option>
                                        <option value="2030"> 2030 </option>
                                        <option value="2031"> 2031 </option>
                                        <option value="2032"> 2032 </option>
                                        <option value="2033"> 2033 </option>
                                        <option value="2034"> 2034 </option>
                                        <option value="2035"> 2035 </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="field">
                                    <label>CVV</label>
                                    <input class="inpt numberonly" type="text" id="cardCvv" maxlength="4"
                                        autocomplete="off" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-center">
                                    <input class="themeBtn" type="submit" value="Pay Now">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.script')

@push('custom_js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"
        type="text/javascript"></script>
    <script>
        (function($) {
            "use strict";
            //ROUNDED TIMES COUNTDOWN

            if (isExists('#rounded-countdown')) {
                var remainingSec = $('.countdown').data('remaining-sec');
                $('.countdown').ClassyCountdown({
                    theme: "flat-colors-very-wide",
                    end: $.now() + remainingSec
                });
            }
            //NORMAL TIMES COUNTDOWN 
            if (isExists('#normal-countdown')) {
                var date = $('#normal-countdown').data('date');
                $('#normal-countdown').countdown(date, function(event) {
                    var $this = $(this).html(event.strftime('' +
                        '<div class="time-sec"><h3 class="main-time">%D</h3> <span>Days</span></div>' +
                        '<div class="time-sec"><h3 class="main-time">%H</h3> <span>Hours</span></div>' +
                        '<div class="time-sec"><h3 class="main-time">%M</h3> <span>Mins</span></div>' +
                        '<div class="time-sec"><h3 class="main-time">%S</h3> <span>Sec</span></div>'
                    ));
                });
            }
            // COUNTDOWN TIME 
            countdownTime();
            $(window).on('resize', function() {
                dropdownMenu(winWidth);
            });
        })(jQuery);

        function countdownTime() {
            if (isExists('#clock')) {
                $('#clock').countdown('2018/01/01', function(event) {
                    var $this = $(this).html(event.strftime('' +
                        '<div class="time-sec"><span class="title">%D</span> days </div>' +
                        '<div class="time-sec"><span class="title">%H</span> hours </div>' +
                        '<div class="time-sec"><span class="title">%M</span> minutes </div>' +
                        '<div class="time-sec"><span class="title">%S</span> seconds </div>'
                    ));
                });
            }
        }

        function isExists(elem) {
            if ($(elem).length > 0) {
                return true;
            }
            return false;
        }

        function cc_format(value) {
            var v = value.replace(/\s+/g, '').replace(/[^0-9]/gi, '')
            var matches = v.match(/\d{4,16}/g);
            var match = matches && matches[0] || ''
            var parts = []
            for (i = 0, len = match.length; i < len; i += 4) {
                parts.push(match.substring(i, i + 4))
            }
            if (parts.length) {
                return parts.join(' ')
            } else {
                return value
            }
        }
        onload = function() {
            document.getElementById('cc').oninput = function() {
                this.value = cc_format(this.value)
            }
        }

        $('.numberonly').keypress(function(e) {

            var charCode = (e.which) ? e.which : event.keyCode

            if (String.fromCharCode(charCode).match(/[^0-9]/g))

                return false;

        });
    </script>
@endpush
