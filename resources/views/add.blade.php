@extends('layouts.app') 
@section('content')
<div class="container">
    @if (session('status'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>        {{ session('status') }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Transaction') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('add') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <select name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name">
                                    @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select> @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="amount" class="col-md-4 col-form-label text-md-right">{{ __('Enter Amount') }}</label>

                            <div class="col-md-6">
                                <input id="amount" type="number" min="0.01" step="0.01" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}"
                                    name="amount" placeholder="{{ old('Enter Amount') }}"> @if($errors->has('amount'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Select Type') }}</label>

                            <div class="col-md-6">
                                <select id="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" required>
                                        <option value="credit">Credit</option>
                                        <option value="debit">Debit</option>
                                </select> @if ($errors->has('type'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection