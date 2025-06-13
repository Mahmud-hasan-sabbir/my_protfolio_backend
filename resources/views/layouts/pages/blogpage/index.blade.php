<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Blog Section Information</h4>
                    <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-sm btn-success p-1 px-2"><i class="fa fa-plus"></i></i><span class="btn-icon-add"></span>Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Image</th>
                                    <th class="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogdata as $item )
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>
                                      <img src="{{ asset('/public/blogimage/'. $item->image) }}" alt="" style="width: 40px" height="40px">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success p-1 px-2 edit-data" id="editData" data-id="{{ $item->id }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-sm btn-info p-1 px-2 view-data" id="viewDate" data-id="{{ $item->id }}"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- create modal open -->

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                      Blog Section Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('store_blogsection') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="name" required name="name" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">Title:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Title" required name="title" class="form-control">
                                   </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Comments:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="comments" required name="comments" class="form-control">
                                   </div>
                                </div>
                            </div>

                        </div>


                        <div class="row mt-2">

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Date</label>
                                    <div class="col-md-7">
                                        <input type="date" required name="date" class="form-control" placeholder="date">

                                     </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row" style="margin-top: -48px;">
                                    <label for="" class="col-md-5 col-form-label">description</label>
                                    <div class="col-md-7">
                                        <textarea id="" name="description" cols="25" rows="2" class="form-control" ></textarea>

                                     </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row" id="viewImage" >
                                    <label class="col-md-5 col-form-label">Blog-image</label>
                                    <div class="col-md-7">
                                        <input type="file" required name="image" id="image" class="form-control"  onchange="previewImage(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div id="imagePreview" style="display: none;">
                                        <img id="preview" alt="Image Preview" class="img-fluid" style="max-width: 115px; max-height: 86px; margin-left:245px; margin-top:6px">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer" style="height:50px">
                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<!--edit modal open-->
       <div class="modal fade bd-example-edit" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                      Blog Update page Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
              <form class="form-valide" action="{{ route('update_blogsection') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <input type="hidden" name="id" id="hideId">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="name"  name="name" class="form-control" id="nameedit">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">Title:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Title"  name="title" class="form-control" id="titleedit">
                                   </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Comments:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="comments"  name="comments" class="form-control" id="commentsedit">
                                   </div>
                                </div>
                            </div>

                        </div>


                        <div class="row mt-2">

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Date</label>
                                    <div class="col-md-7">
                                        <input type="date"  name="date" class="form-control" placeholder="date" id="dateedit">

                                     </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row" style="margin-top: -48px;">
                                    <label for="" class="col-md-5 col-form-label">description</label>
                                    <div class="col-md-7">
                                        <textarea id="desedit" name="description" cols="25" rows="2" class="form-control" ></textarea>

                                     </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row" id="viewImage" >
                                    <label class="col-md-5 col-form-label">Blog-image</label>
                                    <div class="col-md-7">
                                        <input type="file"  name="image" id="image" class="form-control"  onchange="previewImageedit(this)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div id="imagePreviewedit" style="display: none;">
                                        <img id="previewedit" alt="Image Preview" class="img-fluid" style="max-width: 115px; max-height: 86px; margin-left:245px; margin-top:6px">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer" style="height:50px">
                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--view modal-->
      <div class="modal fade bd-example-view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                      View blog page Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="name"  name="name" class="form-control" id="nameview" readonly>
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">Title:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Title"  name="title" class="form-control" id="titleview" readonly>
                                   </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Comments:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="comments"  name="comments" class="form-control" id="commentsview" readonly>
                                   </div>
                                </div>
                            </div>

                        </div>


                        <div class="row mt-2">

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Date</label>
                                    <div class="col-md-7">
                                        <input type="date"  name="date" class="form-control" placeholder="date" id="dateview" readonly>

                                     </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row" style="margin-top: -48px;">
                                    <label for="" class="col-md-5 col-form-label">description</label>
                                    <div class="col-md-7">
                                        <textarea id="desview" name="description" cols="25" rows="2" class="form-control" readonly></textarea>

                                     </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            {{-- <div class="col-md-6">
                                <div class="row" id="viewImage" >
                                    <label class="col-md-5 col-form-label">Blog-image</label>
                                    <div class="col-md-7">
                                        <input type="file"  name="image" id="image" class="form-control"  onchange="previewImageedit(this)">
                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="row">
                                    <div id="imagePreviewview" style="display: none;">
                                        <img id="previewview" alt="Image Preview" class="img-fluid" style="max-width: 115px; max-height: 86px; margin-left:245px; margin-top:6px">
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer" style="height:50px">
                        <button type="button" class="btn btn-sm btn-danger light" data-dismiss="modal">Close</button>
                      
                    </div>
                </form>
            </div>
        </div>
    </div>


</x-app-layout>


<script>
   function previewImage(input) {
        const preview = document.getElementById('preview');
        const imagePreview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
     function previewImageedit(input) {
        const preview = document.getElementById('previewedit');
        const imagePreview = document.getElementById('imagePreviewedit');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                imagePreview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<script>
    $(document).on('click','#editData',function(){
        var itemId = $(this).data('id');


        $.ajax({
        url: '{{ route('edit_blogpage') }}',
        method: 'GET',
        dataType: "JSON",
        data: { 'id': itemId },
        success: function (response) {
            $('.bd-example-edit').modal('show');
            $('#hideId').val(response.id);
            $('#nameedit').val(response.name);
            $('#titleedit').val(response.title);
            $('#commentsedit').val(response.comments);
            $('#dateedit').val(response.date);
            $('#desedit').val(response.description);
            var imageUrl = response.image;
            var fullImageUrl = "{{ asset('public/blogimage') }}/" + imageUrl;
            console.log(fullImageUrl);

            $('#previewedit').attr('src', fullImageUrl);
            $('#imagePreviewedit').show();
                },
            });

    });
</script>

<script>
    $(document).on('click','#viewDate',function(){
        var itemId = $(this).data('id');
        $.ajax({
                url: '{{ route('edit_blogpage') }}',
                method: 'GET',
                dataType: "JSON",
                data: { 'id': itemId },
                success: function (response) {
                 $('.bd-example-view').modal('show');
                 $('#nameview').val(response.name);
                $('#titleview').val(response.title);
                $('#commentsview').val(response.comments);
                $('#dateview').val(response.date);
                $('#desview').val(response.description);

                var imageUrl = response.image;
                    var fullImageUrl = "{{ asset('public/blogimage') }}/" + imageUrl;
                    console.log(fullImageUrl);

                    $('#previewview').attr('src', fullImageUrl);
                    $('#imagePreviewview').show();
            },

        });
    });
</script>











