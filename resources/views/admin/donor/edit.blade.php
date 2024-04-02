@extends('layouts.app')
@section('content')
    <div class="contBody">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card mb-0">
                        <h3>{{ $donor->f_name . ' ' . $donor->l_name }}</h3>
                        <div class="tableMain table-responsive custom-scrollbar">
                            <table class="table table-bordered table-striped">
                                <form action="{{ route('admin.update_donor_account_info', $donor->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <tbody>
                                        <tr>
                                            <th>First name</th>
                                            <td>
                                                <input type="text" name="f_name" value="{{ $donor->f_name }}"
                                                    class="form-control"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Last name</th>
                                            <td>
                                                <input type="text" name="l_name" value="{{ $donor->l_name }}"
                                                    class="form-control"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tax ID</th>
                                            <td>
                                                <input type="text" name="tax_id" value="{{ $donor->tax_id }}"
                                                    class="form-control">
                                                {{-- {{ $donor->tax_id ?? '---' }} --}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>
                                                <input type="email" name="email" value="{{ $donor->email }}" required
                                                    class="form-control">
                                                {{-- <b>{{ $donor->email }}</b> --}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>D.O.B</th>
                                            <td>
                                                <input type="date" name="dob" value="{{ $donor->dob }}"
                                                    class="form-control">
                                                {{-- {{ $donor->dob ?? '---' }} --}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Profile Avatar</th>
                                            @if ($donor->profile_avatar != null)
                                                <td><img src="{{ asset($donor->profile_avatar) }}" style="width: 80px;"
                                                        alt="">
                                                <br>
                                                <br>
                                                
                                                <input type="file" name="profile_avatar" class="form-control"></td>
                                            @else
                                                <td><input type="file" name="profile_avatar" class="form-control"></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th>Account Status</th>
                                            <td>
                                                <select name="acc_status" id="" class="form-control">
                                                    <option value="">Select Account status</option>
                                                    <option value="0"
                                                        @if ($donor->acc_status == 0) selected @endif>
                                                        Account on Hold</option>
                                                    <option value="1"
                                                        @if ($donor->acc_status == 1) selected @endif>
                                                        Active Account</option>
                                                    <option value="2"
                                                        @if ($donor->acc_status == 2) selected @endif>
                                                        Suspended Account</option>
                                                </select> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Phone number</th>
                                            <td>
                                                <input type="text" value="{{ $donor->phone_number }}" name="phone_number"
                                                    class="form-control"> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Account CreatedAt</th>
                                            <td>{{ $donor->created_at->diffForHumans() }}</td>
                                        </tr>

                                        <tr>
                                            <td><button class="btn btn-primary">Save</button></td>
                                        </tr>
                                    </tbody>

                                </form>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
