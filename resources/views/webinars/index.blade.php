@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(count($webinars)>0)
            @foreach ($webinars as $webinar)
            <div class="card my-5">
                <div class="card-body">
                    <div class="d-flex mb-4">
                        {!! $webinar->youtube_embed_code !!}
                    </div>

                    <h2>
                        <!-- <strong>Topic:</strong>  -->
                        {{$webinar->topic}}
                    </h2>
                    <p>
                        <strong>Date:</strong> {{$webinar->date}},
                        <!-- {{ \Carbon\Carbon::parse($webinar->date)->diffForHumans() }} -->

                        <strong>Time:</strong>
                        {{$webinar->time}}
                        <br>
                        <strong>Presenter:</strong> {{$webinar->presenter}}
                        <br>
                        <strong>Mode:</strong> {{$webinar->mode}}
                        <br>
                        <strong>Source code:</strong> <a href="{{$webinar->source_code}}" target="_blank">
                            {{$webinar->source_code}}
                        </a>
                    </p>
                    <a href="/webinars/{{$webinar->id}}" class="btn btn-primary px-4">
                        View Details
                    </a>


                </div>
                <!-- <div class="card-footer">
                    <a href="/webinars/{{$webinar->id}}" class="btn btn-primary px-4">
                        View Details
                    </a>
                </div> -->
            </div>

            @endforeach


            @else
            <p>No webinars found</p>
            @endif
        </div>
    </div>
</div>
@endsection