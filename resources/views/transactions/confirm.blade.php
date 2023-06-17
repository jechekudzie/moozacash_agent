@extends('layouts.master')

@section('content')

    <!-- Content
  ============================================= -->
    <div id="content" class="py-4">
        <div class="container">

            <!-- Steps Progress bar -->
            <div class="row mt-4 mb-5">
                <div class="col-lg-11 mx-auto">
                    <div class="row widget-steps">
                        <div class="col-4 step complete">
                            <div class="step-name">Details</div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="send-money.html" class="step-dot"></a></div>
                        <div class="col-4 step active">
                            <div class="step-name">Confirm</div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="#" class="step-dot"></a></div>
                        <div class="col-4 step disabled">
                            <div class="step-name">Success</div>
                            <div class="progress">
                                <div class="progress-bar"></div>
                            </div>
                            <a href="#" class="step-dot"></a></div>
                    </div>
                </div>
            </div>
            <h2 class="fw-400 text-center mt-3">Send Money</h2>
            <p class="lead text-center mb-4">You are paying {{ $order->amount }} to <span
                    class="fw-500">{{ \App\Models\User::find($order->recipient)->name }}</span>
            </p>
            <div class="row">
                <div class="col-md-9 col-lg-7 col-xl-6 mx-auto">
                    <div class="bg-white shadow-sm rounded p-3 pt-sm-4 pb-sm-5 px-sm-5 mb-4">
                        <h3 class="text-5 fw-400 mb-3 mb-sm-4">Payment Description</h3>
                        <hr class="mx-n3 mx-sm-n5 mb-4">
                        <!-- Send Money Confirm
                        ============================================= -->
                        <form id="form-send-money" method="post">
                            <div class="mb-4 mb-sm-5">
                                <label for="description" class="form-label">Quote the order number below </label>
                                <h5>{{ $order->number }}</h5>
                                to the nearest agent for you to complete the transaction.
                            </div>
                            <hr class="mx-n3 mx-sm-n5 mb-3 mb-sm-4">
                            <h3 class="text-5 fw-400 mb-3 mb-sm-4">Confirm Details</h3>
                            <hr class="mx-n3 mx-sm-n5 mb-4">
                            <p class="mb-1">Send Amount <span class="text-3 float-end">{{ $order->amount*0.95 }}</span>
                            </p>
                            <p class="mb-1">Total fees <span class="text-3 float-end">{{ $order->amount*0.05 }}</span>
                            </p>
                            <hr>
                            <p class="text-4 fw-500">Total<span class="float-end">{{ $order->amount }}</span></p>
                        </form>
                        <!-- Send Money Confirm end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content end -->

@endsection
