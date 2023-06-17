@extends('admin.layouts.master')

@section('content')

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">

            <div class="row">
                <div class="col-6 col-xl-3">
                    <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                        <div
                            class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                            <div class="d-none d-sm-block">
                                <i class="fa fa-wallet fa-2x opacity-25"></i>
                            </div>
                            <div>
                                <div class="fs-3 fw-semibold">$780</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Float</div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- Row #1 -->
                <div class="col-6 col-xl-3">
                    <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                        <div
                            class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                            <div class="d-none d-sm-block">
                                <i class="fa fa-clipboard fa-2x opacity-25"></i>
                            </div>
                            <div>
                                <div class="fs-3 fw-semibold">1500</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">History</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-xl-3">
                    <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                        <div
                            class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                            <div class="d-none d-sm-block">
                                <i class="fa fa-envelope-open fa-2x opacity-25"></i>
                            </div>
                            <div>
                                <div class="fs-3 fw-semibold">15</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Messages</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-xl-3">
                    <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                        <div
                            class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                            <div class="d-none d-sm-block">
                                <i class="fa fa-users fa-2x opacity-25"></i>
                            </div>
                            <div>
                                <div class="fs-3 fw-semibold">4252</div>
                                <div class="fs-sm fw-semibold text-uppercase text-muted">Transactions</div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- END Row #1 -->
            </div>

            <h2 class="content-heading">Orders</h2>
            <!-- Dynamic Table with Export Buttons -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        Agent Transactions
                    </h3>
                </div>
                <div class="block-content block-content-full">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                        <tr>
                            <th class="text-center">Order</th>
                            <th>Sender</th>
                            <th class="d-none d-sm-table-cell">Recepient</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Amount</th>
                            <th class="text-center" style="width: 15%;">Status</th>
                            <th class="text-center" style="width: 15%;">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\Order::all() as $order)
                            <tr>
                                <td>{{ $order->number }}</td>
                                <td>{{ \App\Models\User::find($order->sender)->name }}</td>
                                <td>{{ \App\Models\User::find($order->recipient)->name }}</td>
                                <td>{{ $order->amount }}</td>
                                <td>{{ $order->status }}</td>
                                <td><a href="">Confirm</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table with Export Buttons -->

        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

@endsection
