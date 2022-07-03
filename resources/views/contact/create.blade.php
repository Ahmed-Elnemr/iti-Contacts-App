@extends('layouts.app')
@section('title')
cretae Contact Phone
@endsection
@foreach ($errors->all() as $error)
    {{$error}} <br>
@endforeach

@section('content')
{!! Form::open(['route' => 'contacts.store', 'method' => 'POST']) !!}
                <div class="form-group">
                    <label for="exampleInputNumber">Phone Number</label>
                    {!! Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => '  phone Number']) !!}
                </div>
                {!! Form::submit('Add Contact', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
@endsection
