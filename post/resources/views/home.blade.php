@extends('layouts.app')

@section('content')

<h1>welcome<h1>
<h1>  {{ Auth::user()->name }}<h1>
<p><a href="/logout">Logout</a></p>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table>

                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection