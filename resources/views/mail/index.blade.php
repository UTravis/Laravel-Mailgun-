@extends('mail.layout.app')

    @section('content')

      @if ( isset($status) && $status === 1)
        <div style="color: green">Email Was Sent</div>
      @endif


      {{ Form::open(['route'=>'send']) }}
          <div>
            {{ Form::label('subject', 'Enter Subject') }}
            {{ Form::text('subject', null) }}
          </div>
          <div>
            {{ Form::label('title', 'Enter Title') }}
            {{ Form::text('title', null) }}
          </div>
          <div>
            {{ Form::label('content', 'Enter Content') }}
            {{ Form::text('content', null) }}
          </div>
          {{ Form::submit('Send') }}
      {{ Form::close() }}

      @if ( count($errors) > 0 )
          <ul>
            @foreach ($errors->all() as $error)
                <li>
                  {{ $error }}
                </li>
            @endforeach
          </ul>
      @endif
    @endsection