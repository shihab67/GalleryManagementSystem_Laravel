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
              <a class="nav-link" href="/home">Home<span class="sr-only">(current)</span></a>
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

@section('content')
                &NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;
               <form action="{{route('insert')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-header alert-primary">Insert Image</div>
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="standard" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Standard
                        </label>
                        &NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="mosaic">
                        <label class="form-check-label" for="exampleRadios2">
                          Mosaic
                        </label>
                      </div>
                      <select class="form-control" id="exampleFormControlSelect1" required name="category"> 
                          <option selected>Choose Category</option>
                          <option value="Car">Car</option>
                          <option value="Food">Food</option>
                          <option value="Animal">Animal</option>
                      </select>
                      &NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;&NonBreakingSpace;
                      <select class="form-control" id="exampleFormControlSelect1" required name="sub_cat">
                          <option selected>Choose Sub Category</option>
                          <option value="Ford">Ford</option>
                          <option value="BMW">BMW</option>
                          <option value="Toyota">Toyota</option>
                          <option value="Tata">Tata</option>
                          <option value="Burger">Burger</option>
                          <option value="Pizza">Pizza</option>
                          <option value="Dog">Dog</option>
                          <option value="Cat">Cat</option>
                      </select>
                      <div id="togStatus" class="hint-block">
                        </div>
                        <br>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3" placeholder="Write Something About Your Image(s)" ></textarea>
                        </div>
                      <br>
                  <div class="file-loading">
                      <input id="input-file-1" name="file[]" multiple type="file" accept="image/*">
                  </div>
                  <div class="checkbox">
                      <label>
                      <input id="toggleOrient" name="tog" type="checkbox" checked>
                      Toggle Auto Orientation
                      </label>
                  </div>
               </form>
    </div>
@endsection

@section('script')
<script>
    $("#input-file-1").fileinput({
      theme:'fa',
        autoOrientImage: true,
    });
    $("#toggleOrient").on('change', function() {
        var val = $(this).prop('checked');
        $("#input-file-1").fileinput('refresh', {
            autoOrientImage: val,
        });
        $('#togStatus').html('Fileinput is reset and <samp>autoOrientImage</samp> is set to <em>' + (val ? 'true' : 'false') + '</em>. Retry by selecting images again.');
    });
    </script>
@endsection