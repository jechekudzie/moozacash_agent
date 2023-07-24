@extends('admin.layouts.master')

@section('content')

    <!-- Page Content -->
    <div class="content">

        <div class="row">
            <div class="col-4">
                <!--  Add Exchange Rate Form -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Add Exchange Rate</h3>
                    </div>
                    <div class="block-content pb-4">
                        <form action="{{ route('exchange-rates.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="form-label" for="currency_code">Currency Code</label>
                                <input type="text" class="form-control" id="currency_code" name="currency_code"
                                       placeholder="Currency Code">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="exchange_rate">Exchange Rate</label>
                                <input type="text" class="form-control" id="exchange_rate" name="rate"
                                       placeholder="Exchange Rate">
                            </div>
                            <button type="submit" class="btn btn-alt-primary">Submit</button>
                        </form>
                    </div>
                </div>
                <!-- END Add Exchange Rate Form -->
            </div>
            <div class="col-8">
                <!-- Exchange Rates Table -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Exchange Rates - USD$1 = </h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                            <tr>
                                <th>Currency Code</th>
                                <th>Exchange Rate</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exchangeRates as $rate)
                                <tr>
                                    <td>{{ $rate->currency_code }}</td>
                                    <td>{{ $rate->rate }}</td>
                                    <td width="250">
                                        <a href="{{ route('exchange-rates.edit', $rate) }}"
                                           class="btn btn-sm btn-alt-warning"
                                           title="Edit">Edit</a>
                                        <form action="{{ route('exchange-rates.destroy', $rate) }}" method="POST"
                                              style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-alt-danger" title="Delete">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Exchange Rates Table -->
            </div>
        </div>
    </div>
    <!-- END Page Content -->

@endsection
