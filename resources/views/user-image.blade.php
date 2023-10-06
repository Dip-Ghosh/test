@extends('layout')
@section('content')
    <div class="container mt-5">
        <img width="200px" id="image">

        <form data-action="" method="POST" enctype="multipart/form-data" id="image-upload">
            @csrf
            <div class="row">

                <div class="col-md-6">
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>

            </div>
        </form>
    </div>
    @include('scripts.image-upload')
@endsection

