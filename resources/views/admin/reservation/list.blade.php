@extends('admin.layouts.master')

@section('title', 'Booking List Page')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Hotel Reservation List</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_content">
                            <br />
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <table id="" class="table table-striped table-bordered dt-responsive nowrap"
                                cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="">CheckIn Date</th>
                                        <th class="">CheckOut Date</th>
                                        <th class="">Room</th>
                                        <th class="">Customer Name</th>
                                        <th class="">Status</th>
                                        <th class="col-2 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lists as $list)
                                        <tr>
                                            <td class="text-center">
                                                {{ $list->id }}
                                            </td>
                                            <td>
                                                {{ $list->check_in_date }}
                                            </td>
                                            <td>
                                                {{ $list->check_out_date }}
                                            </td>
                                            <td>
                                                {{ $list->getRoomById->name }}
                                            </td>
                                            <td>
                                                {{ $list->getCustomerById->name }}
                                            </td>
                                            <td>
                                                @if ($list->status == 0)
                                                    <span class="badge badge-primary">Pending</span>
                                                @else
                                                    <span class="badge badge-success">Confirm</span>
                                                @endif
                                            </td>
                                            <td style="text-align: center;">
                                                @if ($list->status == 0)
                                                    <a href="{{ route('bookingConfirm', $list->id) }}"
                                                        onclick="return confirm('Are you sure you went to confirm booking')"
                                                        class="btn btn-sm btn-info" title="Confirm Reservation">
                                                        Confirm
                                                    </a>
                                                @endif
                                                <a href="{{ route('bookingCancel', $list->id) }}"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you went to reject this booking')"
                                                    title="">
                                                    Reject
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="pagination">
                                {{ $lists->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
