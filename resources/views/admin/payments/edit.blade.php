@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.payment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payments.update", [$payment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="stripe_transaction">{{ trans('cruds.payment.fields.stripe_transaction') }}</label>
                <input class="form-control {{ $errors->has('stripe_transaction') ? 'is-invalid' : '' }}" type="text" name="stripe_transaction" id="stripe_transaction" value="{{ old('stripe_transaction', $payment->stripe_transaction) }}" required>
                @if($errors->has('stripe_transaction'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stripe_transaction') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.stripe_transaction_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount_paid">{{ trans('cruds.payment.fields.amount_paid') }}</label>
                <input class="form-control {{ $errors->has('amount_paid') ? 'is-invalid' : '' }}" type="number" name="amount_paid" id="amount_paid" value="{{ old('amount_paid', $payment->amount_paid) }}" step="0.01" required>
                @if($errors->has('amount_paid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount_paid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.amount_paid_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection