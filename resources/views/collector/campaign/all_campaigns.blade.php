@extends('layouts.app')
@section('content')
    <div class="contBody">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>All Campaigns</h3>
                    </div>
                    <div class="card-body">

                        <div class="tableMain table-responsive custom-scrollbar">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox"></th>
                                        <th>Logo</th>
                                        <th>Description</th>
                                        <th>HasGoal</th>
                                        <th>Start date</th>
                                        <th>End date</th>
                                        <th>Goal Amount</th>
                                        <th>Campaign Link</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($all_campaigns->count() > 0)
                                        @foreach ($all_campaigns as $all_campaign)
                                            <tr>
                                                <td><input type="checkbox"></td>
                                                <td><img src="{{ asset($all_campaign->logo) }}" style="width: 80px;"
                                                        alt=""></td>
                                                <td>{{ $all_campaign->description }}</td>
                                                <td>
                                                    @if ($all_campaign->has_goal == 0)
                                                        <div class="badge badge-warning">No goal set</div>
                                                    @else
                                                        <div class="badge badge-success">Goal set</div>
                                                    @endif
                                                </td>
                                                {{-- @if ($all_campaign->has_goal == 1) --}}
                                                <td>{{ $all_campaign->start_date ?? '---' }}</td>
                                                <td>{{ $all_campaign->end_date ?? '---' }}</td>
                                                <td>${{ $all_campaign->goal_ammount ?? 0 }}</td>
                                                {{-- @endif --}}
                                                <td>{{ asset('campaign/' . $all_campaign->id . '') }}</td>
                                                <td>
                                                    @if ($all_campaign->status == 0)
                                                        <div class="badge badge-warning">Waiting for Admin approval</div>
                                                    @elseif($all_campaign->status == 2)
                                                        <div class="badge badge-primary">Expired</div>
                                                    @elseif($all_campaign->status == 3)
                                                        <div class="badge badge-danger">Unpublish by user</div>
                                                    @else
                                                        <div class="badge badge-success">Approved and Available for Users
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($all_campaign->status != 0)
                                                        @if($all_campaign->status == 3)
                                                            <button type="button"
                                                                onclick="changeCampaignStatus({{ $all_campaign->id }}, 1)"
                                                                class="btn btn-success">Publish again</button>
                                                        @else
                                                            <button type="button"
                                                                onclick="changeCampaignStatus({{ $all_campaign->id }}, 3)"
                                                                class="btn btn-warning">Unpublish</button>
                                                        @endif
                                                    @endif
                                                    <a href="{{ route('collector.view_campaign', $all_campaign->id) }}" class="btn btn-primary">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{ $all_campaigns->links() }}
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
 
