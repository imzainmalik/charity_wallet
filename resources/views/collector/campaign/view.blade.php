@extends('layouts.app')
@section('content')
    <div class="contBody">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Campaign Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="tableMain table-responsive custom-scrollbar">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>Logo.</th>
                                        <td>
                                            <img src="{{ asset($campaign->logo) }}" style="width: 80px;" alt="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Description</th>
                                        <td>
                                            <b>{{ $campaign->description }}</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>hasGoal?</th>
                                        <td>
                                            @if ($campaign->has_goal == 0)
                                                <div class="badge badge-warning">No goal set</div>
                                            @else
                                                <div class="badge badge-success">Goal set</div>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Start date</th>
                                        <td>{{ $campaign->start_date ?? '---' }}</td>
                                    </tr>
                                    <tr>
                                        <th>End Date</th>
                                        <td>{{ $campaign->end_date ?? '---' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Goal Amount</th>
                                        <td>${{ $campaign->goal_ammount ?? 0 }}</td>
                                    </tr>

                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($campaign->status == 0)
                                                <div class="badge badge-warning">Waiting for Admin approval</div>
                                            @elseif($campaign->status == 2)
                                                <div class="badge badge-primary">Expired</div>
                                            @elseif($campaign->status == 3)
                                                <div class="badge badge-danger">Unpublish by user</div>
                                            @else
                                                <div class="badge badge-success">Approved and Available for Users
                                                </div>
                                            @endif
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Campaign CreatedAt</th>
                                        <td>{{ $campaign->created_at->diffForHumans() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        @if ($campaign->status != 0)
                            @if ($campaign->status == 3)
                                <button type="button" onclick="changeCampaignStatus({{ $campaign->id }}, 1)"
                                    class="btn btn-success">Publish
                                    again</button>
                            @else
                                <button type="button" onclick="changeCampaignStatus({{ $campaign->id }}, 3)"
                                    class="btn btn-warning">Unpublish</button>
                            @endif
                        @endif
                        {{-- <a href="{{  }}" class="btn btn-primary">View Collector info</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
