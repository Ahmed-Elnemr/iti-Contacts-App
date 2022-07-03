@extends('layouts.app')
@section('title')
Edit Contact Phone
@endsection

@section('content')

{!! Form::model( $contact ,['route' => ['contacts.update',$contact->id ] ]) !!}
@method ('put')
                <div class="form-group">
                    <label for="exampleInputNumber">Phone Number</label>
                    {!! Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => '  phone Number']) !!}
                </div>
                {!! Form::submit('Add Contact', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@endsection
