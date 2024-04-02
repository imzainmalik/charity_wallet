@extends('layouts.app')
@section('content')
    <div class="contBody">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Bank Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="tableMain table-responsive custom-scrollbar">

                            @if ($bank_details != null)
                                <br>
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th>Bank Name</th>
                                        <td>{{ $bank_details->bank_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Account Title</th>
                                        <td>{{ $bank_details->bank_account_title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Account Number</th>
                                        <td>{{ $bank_details->bank_account_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Swift Code</th>
                                        <td>{{ $bank_details->swift_code }}</td>
                                    </tr>
                                    <tr>
                                        <th>Routing Number</th>
                                        <td>{{ $bank_details->routing_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            @if ($bank_details->status == 0)
                                                <div class="badge badge-success">Active</div>
                                            @else
                                                <div class="badge badge-danger">Not Active</div>
                                            @endif
                                        </td>
                                    </tr>
                                </table>

                                @if ($bank_details->status == 1)
                                    <br>
                                    <br>
                                    <div class="alert alert-warning">Admin requested to update Bank details info. ({{ $bank_details->updated_at->diffForHumans() }})

                                        <br>
                                        <br>
                                        <button class="btn btn-info" type="button"data-toggle="modal"
                                            data-target="#editModal">Update Details</button>
                                    </div>
                                @endif

                                <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Bank Details</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('collector.update_bank', $bank_details->id) }}" method="post">
                                                    @csrf
                                                    <div class="col-12">
                                                        <label for="bank_name">Bank Name</label>
                                                        <input type="text" name="bank_name" id="bank_name"
                                                            class="form-control" value="{{ $bank_details->bank_name }}" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="bank_account_title">Bank Account title</label>
                                                        <input type="text" name="bank_account_title"
                                                            id="bank_account_title" value="{{ $bank_details->bank_account_title }}" class="form-control" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="bank_account_number">Bank Account Number</label>
                                                        <input type="text" name="bank_account_number"
                                                            id="bank_account_number" value="{{ $bank_details->bank_account_number }}" class="form-control" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="swift_code">Swift Code</label>
                                                        <input type="text" name="swift_code" id="swift_code"
                                                            class="form-control" value="{{ $bank_details->swift_code }}" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="routing_number">Routing Number</label>
                                                        <input type="text" name="routing_number" id="routing_number"
                                                            class="form-control" value="{{ $bank_details->routing_number }}" required>
                                                    </div>
                                                    <div class="col-12 py-4">
                                                        <button class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal"><i class="fa fa-plus"></i> Add Bank Details</button>
                                <br>
                                <br>
                                <div class="alert alert-danger">No bank details found.</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Bank Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('collector.create_bank') }}" method="post">
                        @csrf
                        <div class="col-12">
                            <label for="bank_name">Bank Name</label>
                            <input type="text" name="bank_name" id="bank_name" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="bank_account_title">Bank Account title</label>
                            <input type="text" name="bank_account_title" id="bank_account_title" class="form-control"
                                required>
                        </div>
                        <div class="col-12">
                            <label for="bank_account_number">Bank Account Number</label>
                            <input type="text" name="bank_account_number" id="bank_account_number"
                                class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="swift_code">Swift Code</label>
                            <input type="text" name="swift_code" id="swift_code" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label for="routing_number">Routing Number</label>
                            <input type="text" name="routing_number" id="routing_number" class="form-control"
                                required>
                        </div>
                        <div class="col-12 py-4">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
