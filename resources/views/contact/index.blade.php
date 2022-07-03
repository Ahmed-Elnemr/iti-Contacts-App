@extends('layouts.app')

@section('content')
@foreach ($contacts as $contact)
<div class="card" style="width: 100%; text-align: center; ">
    <div class="card-body">
     <h5 class="card-title">{{$contact->phone_number}}</h5>
    </div>
    <div class="card-body">
        <div >
            @can ('update', $contact)
            <a href="{{route('contacts.edit',$contact->id )}}" class="btn btn-primary card-link">Update</a>
            @endcan
        </div>
     <div>
        {!! Form::open (['route' => ['contacts.destroy', $contact->id ] ,'method' => 'DELETE']) !!}
        <button tyype=submit class="btn btn-danger ">DELETE</button>
        {!! Form::close() !!}
      </div>

    </div>
</div>
@endforeach
@endsection
