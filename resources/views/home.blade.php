@extends('base')
@section('nav')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/layout">Layout</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/image">Add Image</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
        </div>
      </nav>
@endsection

@section('Car')
<div class="card-header alert-primary">Car</div>
      <div class="row">   
         @foreach ($image1 as $img1)
      <div class="col-sm-6 mt-2">
        <div class="card" style="width: 30rem;">
            <img src="{{ asset($img1->file_path) }}" class="card-img-top" alt="..."  height="300">
            <div class="card-body">
                <h5 class="card-title">{{$img1->sub_category}}</h5>
                <p class="card-text">{{$img1->desc}}</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Created At: {{$img1->created_at}}</li>
                    <li class="list-group-item">Updated At: {{$img1->updated_at}}</li>
                    <li class="list-group-item"><a href="{{route('image.edit', [$img1['id']])}}" class="btn btn-success btn-block">Edit</a></li>
                </ul>
            </div>
        </div>
    </div>
      @endforeach
      </div>
@endsection


@section('Food')
    <div class="card-header alert-primary">Food</div>
    <div class="row">
         @foreach ($image2 as $img2)
            <div class="col-sm-6 mt-2">
              <div class="card" style="width: 30rem;">
                  <img src="{{ asset($img2->file_path) }}" class="card-img-top" alt="..."  height="300">
                  <div class="card-body">
                    <h5 class="card-title">{{$img2->sub_category}}</h5>
                    <p class="card-text">{{$img2->desc}}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Created At: {{$img2->created_at}}</li>
                        <li class="list-group-item">Updated At: {{$img2->updated_at}}</li>
                        <li class="list-group-item"><a href="{{route('image.edit', [$img2['id']])}}" class="btn btn-success btn-block">Edit</a></li>
                    </ul>
                  </div>
              </div>
            </div>
        @endforeach
    </div>
@endsection

@section('Animal')
    <div class="card-header alert-primary">Animal</div>
    <div class="row">
         @foreach ($image3 as $img3)
            <div class="col-sm-6 mt-2">
              <div class="card" style="width: 30rem;">
                  <img src="{{ asset($img3->file_path) }}" class="card-img-top" alt="..." height="300">
                  <div class="card-body">
                    <h5 class="card-title">{{$img3->sub_category}}</h5>
                    <p class="card-text">{{$img3->desc}}</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Created At: {{$img3->created_at}}</li>
                        <li class="list-group-item">Updated At: {{$img3->updated_at}}</li>
                        <li class="list-group-item"><a href="{{route('image.edit', [$img3['id']])}}" class="btn btn-success btn-block">Edit</a></li>
                    </ul>
                  </div>
              </div>
            </div>
        @endforeach
    </div>
@endsection