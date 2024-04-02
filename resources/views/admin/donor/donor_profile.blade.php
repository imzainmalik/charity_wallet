@extends('layouts.app')
@section('content')
    <div class="contBody">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card mb-0">
                        <h3>{{ $donor->f_name . ' ' . $donor->l_name }}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                        <div class="tableMain table-responsive custom-scrollbar">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>Tax ID.</th>
                                        <td>
                                            {{ $donor->tax_id ?? '---' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>
                                            <b>{{ $donor->email }}</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>D.O.B</th>
                                        <td>
                                            {{ $donor->dob ?? '---' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Profile Avatar</th>
                                        @if ($donor->profile_avatar != null)
                                            <td><img src="{{asset( $donor->profile_avatar )}}" style="width: 80px;" alt="">
                                            </td>
                                        @else
                                            <td>---</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Account Status</th>
                                        <td>
                                            @if ($donor->acc_status == 0)
                                                <div class="badge badge-warning"> Account on Hold</div>
                                            @elseif($donor->acc_status == 1)
                                                <div class="badge badge-success"> Active Account</div>
                                            @elseif($donor->acc_status == 2)
                                                <div class="badge badge-danger"> Suspended Account </div>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Phone number</th>
                                        <td>{{ $donor->phone_number ?? '---' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Donor donated of all time from wallet</th>
                                        <td>${{ $transation_from_wallet ?? '---' }}</td>
                                    </tr>

                                    <tr>
                                        <th>Account CreatedAt</th>
                                        <td>{{ $donor->created_at->diffForHumans() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            @if ($bank_info != null)
                                <br>
                                <table class="table table-bordered table-striped">
                                    <div class="col-12">
                                        <h3>Bank Details</h3>
                                    </div>
                                    <tr>
                                        <th>Bank Name</th>
                                        <td>{{ $bank_info->bank_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Account Title</th>
                                        <td>{{ $bank_info->bank_account_title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Account Number</th>
                                        <td>{{ $bank_info->bank_account_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Swift Code</th>
                                        <td>{{ $bank_info->swift_code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Routing Number</th>
                                        <td>{{ $bank_info->routing_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($bank_info->status == 0)
                                                <div class="badge badge-success">Active</div>
                                            @else
                                                <div class="badge badge-danger">Not Active</div>
                                            @endif
                                        </td>
                                    </tr>
                                </table>

                                <div class="alert alert-warning">Last updated at: {{ $bank_info->updated_at->diffForHumans() }}</div>
                            @else
                                <br>
                                <div class="alert alert-danger">No bank details found.</div>
                            @endif
                        </div>
                        <div class="footer py-4">
                            @if ($bank_info != null)
                                @if ($bank_info->status == 0)
                                    <button type="button" onclick="changeBankStatus({{ $bank_info->id }}, 1)" class="btn btn-danger">Ask for
                                        update
                                        Bank account info</button>
                                @else
                                    <button type="button" onclick="changeBankStatus({{ $bank_info->id }}, 0)"
                                        class="btn btn-success">Activate</button>
                                @endif
                            @endif
                            @if ($donor->acc_status == 0)
                                <button type="button" onclick="changeUserStatus({{ $donor->id }}, 1)"
                                    class="btn btn-success">Activate
                                    account</button>
                            @elseif($donor->acc_status == 1)
                                <button type="button" onclick="changeUserStatus({{ $donor->id }}, 2)"
                                    class="btn btn-danger">Suspend</button>
                            @elseif($donor->acc_status == 2)
                                <button type="button" onclick="changeUserStatus({{ $donor->id }}, 1)"
                                    class="btn btn-success">Activate
                                    account</button>
                            @endif
                            |
                            <a href="{{ route('admin.edit_profile', $donor->id) }}" class="btn btn-warning">Edit Profile info</a>
                            |
                            <a href="{{ route('admin.donors') }}" class="btn btn-primary">View All Donors</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
