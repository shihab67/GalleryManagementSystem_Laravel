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
            <li class="nav-item dropdown dropdown-menu-right">
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

<div class="card">
    <div class="card-body">
        <div class="col">
            <div class="col-md-6">
                <input type="button" name="delete" value="Delete" id="{{$img->id}}" class="btn btn-danger delete_data"></input>
            </div>
        </div>
        <form method="POST">
            @csrf
            <div class="col">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Category</label>
                        <input type="text" class="form-control" value="{{$img->category}}" name="category" id="category">
                    </div>

                    <div class="form-group">
                        <label for="title">Description</label>
                        <textarea class="form-control" name="desc" aria-label="With textarea">{{$img->desc}}</textarea>
                    </div>
                </div>

                <div class="col-md-12">

                    <input type="hidden" name="cropX" id="cropX">
                    <input type="hidden" name="cropY" id="cropY">
                    <input type="hidden" name="cropWidth" id="cropWidth">
                    <input type="hidden" name="cropHeight" id="cropHeight">
                    <input type="hidden" name="rotate" id="irotate">
                    <div class="row">
                        <div class="col-md-6">
                            <img id="image" style="width:100%" src="/{{$img->file_path}}" alt="Picture">
                        </div>

                        <div class="col-md-5 m-3">

                            <button type="button" class="btn btn-info" id="btn-rotate"><span><i
                                        class="fas fa-sync-alt"></i></span> Rotate</button>
                            <div class="custom-control custom-checkbox mt-3">
                                <input type="checkbox" class="custom-control-input" name="cropCheck" id="cropCheck">
                                <label class="custom-control-label" for="cropCheck">Apply Crop</label>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-md-6 mt-3">
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                </div>

            </div>

        </form>
    </div>
</div>

{{-- delete modal --}}
<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Confirmation</h2>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h5 align="center" style="margin:0;">Are you sure you want to remove this data?</h6>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(() => {

    var image = $('#image');

    image.cropper({

        crop: function(event) {
            console.log(event.detail.x);
            // console.log(event.detail.y);
            // console.log(event.detail.width);
            // console.log(event.detail.height);
            // console.log(event.detail.rotate);
            // console.log(event.detail.scaleX);
            // console.log(event.detail.scaleY);

            $('#cropX').val(event.detail.x);
            $('#cropY').val(event.detail.y);
            $('#cropWidth').val(event.detail.width);
            $('#cropHeight').val(event.detail.height);
        }



    });

    // Get the Cropper.js instance after initialized
    var cropper = image.data('cropper');

    var rotateValue = 0;

    $("#btn-rotate").click(() => {
        rotateValue += 90;
        if (rotateValue == 360) {
            rotateValue = 0;
        }
        cropper.rotateTo(rotateValue);
        //console.log(rotateValue);
        //$('#image').css('transform', `rotate(${rotateValue}deg)`);
        $('#irotate').val(rotateValue);
        //console.log(`rotate(${rotateValue}deg)`);
    });

    var img_id;
    $(document).on('click', '.delete_data', function(){
    img_id = $(this).attr('id');
    $('#confirmModal').modal('show');
    });
    $('#ok_button').click(function(){
    $.ajax({
    url:"/delete/"+img_id,
    beforeSend:function(){
    $('#ok_button').text('Deleting...');
    },
    success:function(data)
    {
    setTimeout(function(){
        $('#confirmModal').modal('hide');
        //location.reload();
        window.location.href = "/home";
        alert('Data Deleted');
    }, 2000);
    }
    })
});
});
</script>
@endsection