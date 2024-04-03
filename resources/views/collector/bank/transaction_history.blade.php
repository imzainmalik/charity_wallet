@extends('layouts.app')
@section('content')
    <div class="contBody">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Transaction Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="tableMain table-responsive custom-scrollbar">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox"></th>
                                        <th>Donor info</th>
                                        <th>Campaign info</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($transactions->count() > 0)
                                        @foreach ($transactions as $transaction)
                                            @php
                                                $donor_details = App\Models\User::where('id',$transaction->donor_id)->first();
                                                $campaign_info = App\Models\Campaign::where('id',$transaction->campaign_id)->first();
                                            @endphp
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td>
                                                    {{-- <a href=""> --}}
                                                        {{ $donor_details->f_name }} {{ $donor_details->l_name }}
                                                            <br>
                                                        {{ $donor_details->email }}
                                                    {{-- </a> --}}
                                                </td>
                                                <td>
                                                   <a href="">
                                                        {{ url('campaign/'.$campaign_info->id) }}
                                                   </a>
                                                </td>
                                                <td>${{ $transaction->amount}}</td>
                                                <td><div class="badge badge-success">Paid</div></td> 
                                            </tr>
                                        @endforeach
                                        {{ $transactions->links() }}
                                    @else
                                        <tr>
                                            <td>No data found.</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
