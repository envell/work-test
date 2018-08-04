@extends('layouts.app')

@section('content')
    <form class="welcome">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Welcome</div>
                        <div class="card-body">
                            <p class="text-center">Welcome {{ Auth::user()->name }}!</p>
                </div>
            </div>
        </div>
    </div>
     </form>
@endsection