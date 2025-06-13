<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">About Section Information</h4>
                    <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-sm btn-success p-1 px-2"><i class="fa fa-plus"></i></i><span class="btn-icon-add"></span>Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Desig</th>
                                    <th>Number</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th class="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($aboutdata as $item )
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->desig }}</td>
                                    <td>{{ $item->phn_number }}</td>
                                    <td>{{ $item->gmail }}</td>
                                    <td>
                                      <img src="{{ asset('/public/aboutimage/'. $item->image) }}" alt="" style="width: 40px" height="40px">
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
                      About Section Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('store_aboutsection') }}" method="POST" enctype="multipart/form-data">
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
                                    <label class="col-md-5 col-form-label">Designation:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Designation" required name="desig" class="form-control">
                                   </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Short-text:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="short-text" required name="short_title" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">Email:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="long-title" required name="email" class="form-control">
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">FB-Link :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="FB-Link" required name="fb_link" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Twiter-link:</label>
                                    <div class="col-md-7">
                                         <input type="text" placeholder="Twiter-link" required name="twiter_link" class="form-control">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">linkdin-link :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Linkdin-link" required name="linkdin_link" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Github-link:</label>
                                    <div class="col-md-7">
                                       <input type="text" placeholder="Github-link" required name="Github_link" class="form-control">
                                     </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Title :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Title" required name="title" class="form-control">
                                   </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Mobile-No :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="number" placeholder="number" required name="phn_number" class="form-control">
                                   </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2">

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Address</label>
                                    <div class="col-md-7">
                                        <textarea id="" name="address" cols="25" rows="2" class="form-control" ></textarea>
                                        {{-- <input type="text" required name="com_address" class="form-control"> --}}
                                     </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">description</label>
                                    <div class="col-md-7">
                                        <textarea id="" name="description" cols="25" rows="2" class="form-control" ></textarea>
                                        {{-- <input type="text" required name="com_address" class="form-control"> --}}
                                     </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row" id="viewImage" >
                                    <label class="col-md-5 col-form-label">Profile-image</label>
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
                      About page Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('update_aboutsection') }}" method="POST" enctype="multipart/form-data">
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
                                    <label class="col-md-5 col-form-label">Designation:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Designation"  name="desig" class="form-control" id="desigedit">
                                   </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Short-text:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="short-text"  name="short_title" class="form-control" id="shorttitleedit">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">Email:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="long-title"  name="email" class="form-control" id="emailedit">
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">FB-Link :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="FB-Link"  name="fb_link" class="form-control" id="fblinkedit">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Twiter-link:</label>
                                    <div class="col-md-7">
                                         <input type="text" placeholder="Twiter-link"  name="twiter_link" class="form-control" id="twiterlinkedit">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">linkdin-link :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Linkdin-link"  name="linkdin_link" class="form-control" id="linkdinlinkedit">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Github-link:</label>
                                    <div class="col-md-7">
                                       <input type="text" placeholder="Github-link"  name="Github_link" class="form-control" id="githublinkedit">
                                     </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Title :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Title"  name="title" class="form-control" id="titleedit">
                                   </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Mobile-No :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="number" placeholder="number"  name="phn_number" class="form-control" id="phnnumberedit">
                                   </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2">

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Address</label>
                                    <div class="col-md-7">
                                        <textarea id="addressedit" name="address" cols="25" rows="2" class="form-control" ></textarea>
                                        {{-- <input type="text" required name="com_address" class="form-control"> --}}
                                     </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">description</label>
                                    <div class="col-md-7">
                                        <textarea id="desedit" name="description" cols="25" rows="2" class="form-control" ></textarea>
                                        {{-- <input type="text" required name="com_address" class="form-control"> --}}
                                     </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row" id="viewImage" >
                                    <label class="col-md-5 col-form-label">Profile-image</label>
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
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
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
                      View about page Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('update_aboutsection') }}" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" placeholder="name"  name="name" class="form-control" id="nameview">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">Designation:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Designation"  name="desig" class="form-control" id="desigview">
                                   </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Short-text:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="short-text"  name="short_title" class="form-control" id="shorttitleview">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">Email:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="long-title"  name="email" class="form-control" id="emailview">
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">FB-Link :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="FB-Link"  name="fb_link" class="form-control" id="fblinkview">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Twiter-link:</label>
                                    <div class="col-md-7">
                                         <input type="text" placeholder="Twiter-link"  name="twiter_link" class="form-control" id="twiterlinkview">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">linkdin-link :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Linkdin-link"  name="linkdin_link" class="form-control" id="linkdinlinkview">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Github-link:</label>
                                    <div class="col-md-7">
                                       <input type="text" placeholder="Github-link"  name="Github_link" class="form-control" id="githublinkview">
                                     </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Title :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Title"  name="title" class="form-control" id="titleview">
                                   </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Mobile-No :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="number" placeholder="number"  name="phn_number" class="form-control" id="phnnumberview">
                                   </div>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-2">

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Address</label>
                                    <div class="col-md-7">
                                        <textarea id="addressview" name="address" cols="25" rows="2" class="form-control" ></textarea>
                                        {{-- <input type="text" required name="com_address" class="form-control"> --}}
                                     </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">description</label>
                                    <div class="col-md-7">
                                        <textarea id="desview" name="description" cols="25" rows="2" class="form-control" ></textarea>
                                        {{-- <input type="text" required name="com_address" class="form-control"> --}}
                                     </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            {{-- <div class="col-md-6">
                                <div class="row" id="viewImage" >
                                    <label class="col-md-5 col-form-label">Profile-image</label>
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
        url: '{{ route('edit_aboutpage') }}',
        method: 'GET',
        dataType: "JSON",
        data: { 'id': itemId },
        success: function (response) {
            $('.bd-example-edit').modal('show');
            $('#hideId').val(response.id);
            $('#nameedit').val(response.name);
            $('#desigedit').val(response.desig);
            $('#shorttitleedit').val(response.short_text);
            $('#emailedit').val(response.gmail);
            $('#fblinkedit').val(response.fb_link);
            $('#twiterlinkedit').val(response.twiter_link);
            $('#linkdinlinkedit').val(response.linkdin_link);
            $('#githublinkedit').val(response.github_link);
            $('#titleedit').val(response.title);
            $('#phnnumberedit').val(response.phn_number);
            $('#addressedit').val(response.address);
            $('#desedit').val(response.description);




            var imageUrl = response.image;
            var fullImageUrl = "{{ asset('public/aboutimage') }}/" + imageUrl;
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
                url: '{{ route('edit_aboutpage') }}',
                method: 'GET',
                dataType: "JSON",
                data: { 'id': itemId },
                success: function (response) {
                 $('.bd-example-view').modal('show');
                 $('#nameview').val(response.name);
                $('#desigview').val(response.desig);
                $('#shorttitleview').val(response.short_text);
                $('#emailview').val(response.gmail);
                $('#fblinkview').val(response.fb_link);
                $('#twiterlinkview').val(response.twiter_link);
                $('#linkdinlinkview').val(response.linkdin_link);
                $('#githublinkview').val(response.github_link);
                $('#titleview').val(response.title);
                $('#phnnumberview').val(response.phn_number);
                $('#addressview').val(response.address);
                $('#desview').val(response.description);

                var imageUrl = response.image;
                    var fullImageUrl = "{{ asset('public/aboutimage') }}/" + imageUrl;
                    console.log(fullImageUrl);

                    $('#previewview').attr('src', fullImageUrl);
                    $('#imagePreviewview').show();
            },

        });
    });
</script>











