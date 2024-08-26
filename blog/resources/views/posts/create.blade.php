@extends('layouts.app')

@section('title',"Add post")
@section('content')
   <div class="container">
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Tiltle</label>
            <input type="text" id="title" name="title" class="form-control">
            @if ($errors->has('title'))
                <div class="text-danger">
                    {{ $errors->first('title') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
            @if ($errors->has('content'))
                <div class="text-danger">
                    {{ $errors->first('content') }}
                </div>
            @endif
        </div>
        <button class="btn btn-success">Create</button>
        <a href="{{route('posts.index')}}" class="btn btn-secondary">Cancle</a>
    </form>

   </div>
   @endsection
