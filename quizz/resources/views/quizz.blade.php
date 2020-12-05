@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($user->is_admin)
                    <div class="card">
                        <a href="{{ url('/create_quizz') }}" class="text-sm text-gray-700 underline">add quizz</a>
                    </div>
                @else
                    <div>
                        <a>aaaaa</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
