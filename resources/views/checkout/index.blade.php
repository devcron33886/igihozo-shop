@extends('layouts.cutomer')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('welcome') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{ route('shop') }}">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="checkout-wrapper section">
        <div class="container col-lg-12">
            <div class="row justify-content-center">
                <div class="col-7">
                    @if(Session::has('message'))
                        <div class="alert alert-success flat">
                            <p>
                                <i class="fa fa-check-circle"></i>
                                {{ Session::get('message') }}
                            </p>
                        </div>
                    @endif

                    <div class="card shadow-sm">
                        <div class="card-header">
                            Delivery information
                        </div>
                        <div class="card-body">
                            <form action="" id="checkoutForm"
                                  class="" method="post">
                                @csrf
                                <div class="row py-2">
                                    <div class="col-md-6">
                                        <div class="form-group  {{ $errors->has('name')?'has-error':''}} ">
                                            <label for="name"
                                                   class="control-label">Name</label>
                                            <input type="text" placeholder="Full name" required
                                                   value="{{ old('name') }}" class="form-control"
                                                   name="name" id="name" maxlength="120">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                                {{ $errors->first('name') }}
                                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                            class="form-group  {{ $errors->has('email')?'has-error':''}} ">
                                            <label for="email" class="control-label">Email</label>
                                            <div>
                                                <input type="email" placeholder="Email address"
                                                       value="{{ old('email')}}" required class="form-control"
                                                       name="email"
                                                       id="email" maxlength="120">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                                    {{ $errors->first('email') }}
                                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row py-2">
                                    <div class="col-md-6">
                                        <div
                                            class="form-group  {{ $errors->has('shipping_address')?'has-error':''}} ">
                                            <label for="shipping_address"
                                                   class="control-label">Address
                                            </label>
                                            <input type="text" placeholder="Shipping address"
                                                   value="{{ old('shipping_address') }}"
                                                   required
                                                   class="form-control"
                                                   name="shipping_address"
                                                   id="shipping_address" maxlength="120">
                                            @if ($errors->has('shipping_address'))
                                                <span class="help-block">
                                                                {{ $errors->first('shipping_address') }}
                                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div
                                            class="form-group  {{ $errors->has('mobile')?'has-error':''}}">
                                            <label for="phoneNumber"
                                                   class="control-label">Phone
                                            </label>
                                            <input type="text"
                                                   placeholder="Phone number"
                                                   value="{{ old('mobile') }}"
                                                   maxlength="13" required
                                                   class="form-control"
                                                   name="mobile" id="mobile">
                                            @if ($errors->has('mobile'))
                                                <span class="help-block">
                                                                {{ $errors->first('mobile') }}
                                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="payment_id">{{ trans('cruds.order.fields.payment') }}</label>
                                        <select
                                            class="form-control select2 {{ $errors->has('payment') ? 'is-invalid' : '' }}"
                                            name="payment_id" id="payment_id">
                                            @foreach($payments as $id => $entry)
                                                <option
                                                    value="{{ $id }}" {{ old('payment_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('payment'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('payment') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.order.fields.payment_helper') }}</span>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="shipping_id">{{ trans('cruds.order.fields.shipping') }}</label>
                                        <select
                                            class="form-control select2 {{ $errors->has('shipping') ? 'is-invalid' : '' }}"
                                            name="shipping_id" id="shipping_id">
                                            @foreach($shippings as $id => $entry)
                                                <option
                                                    value="{{ $id }}" {{ old('shipping_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('shipping'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('shipping') }}
                                            </div>
                                        @endif
                                        <span
                                            class="help-block">{{ trans('cruds.order.fields.shipping_helper') }}</span>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="required"
                                               for="notes">{{ trans('cruds.order.fields.notes') }}</label>
                                        <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}"
                                                  name="notes" id="notes" required>{{ old('notes') }}</textarea>
                                        @if($errors->has('notes'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('notes') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.order.fields.notes_helper') }}</span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"
                                            id="btnSubmit">
                                        <i class="fa fa-check-circle"></i>
                                        Place Your Order
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            Items In Cart
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $total = 0; ?>
                                @foreach($cart as $cartItem)

                                    <tr>
                                        <td>
                                            <h5>{{ $cartItem->name }}</h5>
                                        </td>
                                        <td>
                                            <p>
                                                {{ number_format($cartItem->price) }}
                                                <small>Rwf</small>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                {{ $cartItem->quantity }}
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                {{ number_format($cartItem->price) }}
                                                <small>Rwf</small>
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>
                                        Sub Total :
                                    </th>
                                    <th colspan="3" class="text-success align-right">
                                        {{ number_format(Cart::getSubTotal()) }} Rwf
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        Shipping:
                                    </th>
                                    <th colspan="3" class="text-warning">
                                        {{-- + {{ number_format(\App\Models\Setting::first()->shipping_amount) }}
                                        Rwf --}}
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        Total:
                                    </th>
                                    <th colspan="3" class="text-success align-right">
                                    <span
                                        class="label label-success">{{ number_format(Cart::getSubTotal()) }} Rwf</span>
                                    </th>
                                </tr>
                                </tfoot>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer-component/>
@endsection
@section('scripts')
    <script
        src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

    <script>
        $(function () {
            var $checkoutForm = $('#checkoutForm');
            $checkoutForm.validate({
                rules: {
                    payment_type: "required",
                },
                messages: {
                    payment_type: {
                        required: "Please choose payment method",
                        // minlength: jQuery.format("Enter at least {0} characters"),
                        // remote: jQuery.format("{0} is already in use")
                    }
                }
            });

        });
    </script>
@stop
