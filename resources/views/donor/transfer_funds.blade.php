@extends('layouts.app')
@section('content')
    <div class="contBody">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="giveforms">
                        
                            <h3 class="mb-3">Choose Your Deposit</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="Bxdepositcat">
                                        <div class="ico">
                                            <img src="{{ asset('assets/images/deposit-ico1.webp') }}" alt="">
                                        </div>
                                        <h5>ACH</h5>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="Bxdepositcat" onclick="show_card()">
                                        <div class="ico">
                                            <img src="{{ asset('assets/images/deposit-ico2.webp') }}" alt="">
                                        </div>
                                        <h5>Credit Card</h5>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="Bxdepositcat">
                                        <div class="ico">
                                            <img src="{{ asset('assets/images/deposit-ico3.webp') }}" alt="">
                                        </div>
                                        <h5>Wire Transfer</h5>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="Bxdepositcat">
                                        <div class="ico">
                                            <img src="{{ asset('assets/images/deposit-ico4.webp') }}" alt="">
                                        </div>
                                        <h5>Zelle</h5>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="Bxdepositcat">
                                        <div class="ico">
                                            <img src="{{ asset('assets/images/deposit-ico5.webp') }}" alt="">
                                        </div>
                                        <h5>Check by Mail</h5>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="Bxdepositcat">
                                        <div class="ico">
                                            <img src="{{ asset('assets/images/deposit-ico6.webp') }}" alt="">
                                        </div>
                                        <h5>Paycheck Direct</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="bankDetailsForm" id="card_form"style="display: none;">
                                <h3 class="hd">You are about to make Secure Card payment</h3>
                                <form action="{{ route('donor.deposit_fund_by_card', ['deposit_type' => 'using_card']) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="fields">
                                                <h3>Name on card</h3>
                                                <input type="text" name="name_on_card" required placeholder="Name on card" class="inpt">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="fields">
                                                <h3>Card Number</h3>
                                                <input type="number" name="card_number" required placeholder="Card Number" class="inpt">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="fields">
                                                <h3>Card Exp Month</h3>
                                                <input class="inpt" type="card_exp_month" name="card_exp_month" required placeholder="Card Exp Month">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="fields">
                                                <h3>Card Exp Year</h3>
                                                <input class="inpt" type="card_exp_year" name="card_exp_year" required placeholder="Card Exp Year">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="fields">
                                                <h3>Card CVV</h3>
                                                <input class="inpt" type="card_cvv" name="card_cvv" required placeholder="Card CVV">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="fields">
                                                <h3>Amount</h3>
                                                <input class="inpt" type="number" name="amount" required placeholder="Amount">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="agreePolicy">
                                                <label>
                                                    <input type="checkbox">
                                                    I agree to Policies and Guidelines
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="text-right">
                                                <input class="themeBtn" type="submit" value="Continue">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="bankDetailsForm" id="bankDetailsForm" style="display: block;">
                                <h3 class="hd">How much would you like us to pull</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="fields">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div>
                                                    <h3>Choose Bank Account <span class="redCol">*</span>
                                                    </h3>
                                                </div>
                                                <div>
                                                    <a class="redCol" href="javascript:;" title="">Add Bank
                                                        Account</a>
                                                </div>
                                            </div>
                                            <select class="inpt" name="" id="">
                                                <option value="">Select Bank</option>
                                                <option value="">Select Bank</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="similarResults">
                                            <input type="checkbox">
                                            <p>Repeat payment?</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="fields">
                                            <h3>Date</h3>
                                            <input class="inpt" type="text" placeholder="Minimum amount is $250.00">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="fields">
                                            <h3>Note</h3>
                                            <textarea class="inpt" name="" id="" cols="10" rows="10" placeholder="Enter Note"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="agreePolicy">
                                            <label>
                                                <input type="checkbox">
                                                I agree to Policies and Guidelines
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="text-right">
                                            <input class="themeBtn" type="submit" value="Continue">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h3 class="mb-3">Information</h3>
                    <div class="listInfos">
                        <div class="items">
                            <img src="assets/images/infoico1.webp" alt="">
                            2-3 Business days
                        </div>
                        <div class="items">
                            <img src="assets/images/infoico2.webp" alt="">
                            Min. deposit: $250.00
                        </div>
                        <div class="items">
                            <img src="assets/images/infoico3.webp" alt="">
                            Recurring deposits available
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection

@push('custom_js')
    <script>
        function show_card(){
            document.getElementById('card_form').style.display = "block";
            document.getElementById('bankDetailsForm').style.display = "none";
            
        }
    </script>
@endpush
