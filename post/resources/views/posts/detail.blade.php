@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Detail Post') }}</div>

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
                        </tr>

                        <tr>
                            <td style="padding-right: 150px;">{{$post->id}}</td>
                            <td style="padding-right: 150px;">{{$post->title}}</td>
                            <td style="padding-right: 150px;">{{$post->description}}</td>
                            <td style="padding-right: 150px;">
                                <img src="{{ asset($post->image) }}" height="100" width="100">
                            </td>
                            @if($post->status == 1)
                                <td style="padding-right: 150px;">Enable</td>
                            @else
                                <td style="padding-right: 150px;">Disable</td>
                            @endif
                        </tr>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection