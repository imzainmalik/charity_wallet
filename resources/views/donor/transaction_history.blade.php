@extends('layouts.app')
@section('content')
    <div class="contBody">
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
                            @if ($transaction->count() > 0)
                                @foreach ($transaction as $all_donationn)
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
                            @else
                                <tr>
                                    <td>No data found.</td>
                                </tr>
                            @endif
                            {{ $transaction->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
