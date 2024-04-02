@extends('layouts.app')
@section('content')
    <div class="contBody">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Create Campaign</h3>
                    </div>
                    <div class="card-body">
                        {{-- <div class="tableMain table-responsive custom-scrollbar"> --}}
                        {{-- <table class="table table-bordered table-striped"> --}}
                        <form action="{{ route('collector.campaign_create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <label for="logo">Logo</label>
                                    <input type="file" name="logo" class="form-control" required id="logo">
                                </div>
                            </div>
                            
                            <div class="row py-4">
                                <div class="col-12">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="form-control" required id="description"></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" name="has_goal" onclick="check_has_goal()" type="checkbox"
                                            value="has_goal" id="has_goal">
                                        <label class="form-check-label" for="has_goal">
                                            Has Goals?
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div id="goal_sec" style="display: none;" class="py-4">
                                <div class="col-12">
                                    <label for="start_date">Start date</label>
                                    <input type="date" name="start_date" class="form-control" required id="start_date">
                                </div>

                                <div class="col-12 py-4">
                                    <label for="end_date">End date</label>
                                    <input type="date" name="end_date" class="form-control" required id="end_date">
                                </div>

                                <div class="col-12">
                                    <label for="goal_ammount">Set Goal Amount</label>
                                    <input type="number" name="goal_ammount" class="form-control" required
                                        id="goal_ammount">
                                </div>
                            </div>

                            <div class="col-12 py-4">
                                <button class="btn btn-primary">Create</button>
                            </div>
                        </form>
                        {{-- </table> --}}
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_js')
    <script>
        function check_has_goal() {
            if ($('#has_goal').prop('checked')) {
                document.getElementById('goal_sec').style.display = 'block';
            } else {
                document.getElementById('goal_sec').style.display = 'none';
            }
        }
    </script>
@endpush
