@extends('layouts.app')
@section('content')

    <div class="contBody">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <div class="card mb-0">
                        <h3>All Donors</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                        <div class="tableMain table-responsive custom-scrollbar">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox"></th>
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th>Profile Avatar</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($all_donors->count() > 0)
                                        @foreach ($all_donors as $all_donor)
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td>{{ $all_donor->f_name }}</td>
                                                <td>{{ $all_donor->l_name }}</td>
                                                <td><img src="{{ asset($all_donor->profile_avatar) }}" style="width: 80px;"
                                                        alt=""></td>
                                                <td>
                                                    {{ $all_donor->email }}
                                                </td>
                                                <td>{{ $all_donor->phone_number ?? '---' }}</td>
                                                <td>
                                                    <a href="{{ route('admin.donor_profile', $all_donor->id) }}"
                                                        class="btn btn-primary">View Profile</a>
                                                    |
                                                    <a href="{{ route('admin.edit_profile', $all_donor->id) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    |
                                                    @if ($all_donor->acc_status == 0)
                                                        <button type="button"
                                                            onclick="changeUserStatus({{ $all_donor->id }}, 1)"
                                                            class="btn btn-success">Activate account</button>
                                                    @elseif($all_donor->acc_status == 1)
                                                        <button type="button"
                                                            onclick="changeUserStatus({{ $all_donor->id }}, 2)"
                                                            class="btn btn-danger">Suspend</button>
                                                    @elseif($all_donor->acc_status == 2)
                                                        <button type="button"
                                                            onclick="changeUserStatus({{ $all_donor->id }}, 1)"
                                                            class="btn btn-success">Activate account</button>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                        {{ $all_donors->links() }}
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
