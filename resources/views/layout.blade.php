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

@section('standard')
<div class="card-header alert-primary">Standard Images</div>
      <div class="row">
         @foreach ($image1 as $img1)
      <div class="col-sm-6 mt-2">
        <div class="card" style="width: 30rem;">
            <img src="{{ asset($img1->file_path) }}" class="card-img-top" alt="...">
        </div>
      </div>
      @endforeach
      </div>
@endsection


@section('mosaic')
    <div class="card-header alert-primary">Mosaic Images</div>
    <div class="row">
         @foreach ($image2 as $img2)
            <div class="col-sm-6 mt-2" id="gallery">
              <div class="card" style="width: 30rem;">
                  <img src="{{ asset($img2->file_path) }}" class="card-img-top" alt="...">
              </div>
            </div>
        @endforeach
    </div>
@endsection

@section('script')
<script>
    $('#gallery').Mosaic({
        maxRowHeight: 800,
        refitOnResize: true,
        refitOnResizeDelay: false,
        defaultAspectRatio: 0.5,
        maxRowHeightPolicy: 'crop',
        highResImagesWidthThreshold: 850,
        responsiveWidthThreshold: 500
    });
    </script>    
@endsection