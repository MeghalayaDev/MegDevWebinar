@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="text-center">Edit Webinar</h2>

            <form action="/webinars/{{$webinar->id}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="topic">Topic *</label>
                    <input type="text" class="form-control" id="topic" name="topic" required value="{{$webinar->topic}}">
                </div>
                <div class="form-group">
                    <label for="date">Date *</label>
                    <input type="date" class="form-control" id="date" name="date" required value="{{$webinar->date}}">
                </div>
                <div class="form-group">
                    <label for="time">Time *</label>
                    <input type="time" class="form-control" id="time" name="time" required value="{{$webinar->time}}">
                </div>
                <div class="form-group">
                    <label for="presenter">Presenter *</label>
                    <input type="text" class="form-control" id="presenter" name="presenter" required value="{{$webinar->presenter}}">
                </div>
                <div class="form-group">
                    <label for="mode">Mode *</label>
                    <input type="text" class="form-control" id="mode" name="mode" required value="{{$webinar->mode}}">
                </div>
                <div class="form-group">
                    <label for="youtube_embed_code">Youtube Embed Code *</label>
                    <input type="text" class="form-control" id="youtube_embed_code" name="youtube_embed_code" required value="{{$webinar->youtube_embed_code}}">
                </div>
                <div class="form-group">
                    <label for="source_code">Source Code *</label>
                    <input type="text" class="form-control" id="source_code" name="source_code" required value="{{$webinar->source_code}}">
                </div>
                <button type="submit" class="btn btn-primary px-4">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection