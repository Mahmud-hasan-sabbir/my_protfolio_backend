<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Home page Information</h4>
                    <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-sm btn-success p-1 px-2"><i class="fa fa-plus"></i></i><span class="btn-icon-add"></span>Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Customer</th>
                                    <th>Experience</th>
                                    <th>Complete-Project</th>
                                    <th>Teem-Member</th>
                                    <th>Image</th>
                                    <th class="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($homedata as $item )
                                <tr>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->cus_count }}</td>
                                    <td>{{ $item->years_of_experience }}</td>
                                    <td>{{ $item->complete_project }}</td>
                                    <td>{{ $item->team_member }}</td>

                                    <td>
                                      <img src="{{ asset('/public/homeimage/'. $item->image) }}" alt="" style="width: 40px" height="40px">
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-success p-1 px-2 edit-data" id="editData" data-id="{{ $item->id }}"><i class="fa fa-pencil"></i><span class="btn-icon-add"></span>Edit</button>
                                        <button type="button" class="btn btn-sm btn-info p-1 px-2 view-data" id="viewDate" data-id="{{ $item->id }}"><i class="fa fa-folder-open"></i></i><span class="btn-icon-add"></span>View</button>
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
                      Home page Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('store_homepage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Short-Title:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="short-title" required name="title" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">Long-Title:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="long-title" required name="short_title" class="form-control">
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Real-coustomer-count :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="number" required name="cus_count" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Years-of-Experience:</label>
                                    <div class="col-md-7">
                                        <input type="number" required  name="experience" value="" class="form-control" >
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Completed-projects :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" required name="com_project" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Team-member:</label>
                                    <div class="col-md-7">
                                        <input type="text" required name="team-member" class="form-control" >
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">

                            <div class="col-md-12">
                                <div class="row">
                                    <label for="" class="col-md-2 col-form-label">Long-text</label>
                                    <div class="col-md-10">
                                        <textarea id="" name="long_text" cols="25" rows="2" class="form-control" style="width:856px;margin-left:47px"></textarea>
                                        {{-- <input type="text" required name="com_address" class="form-control"> --}}
                                     </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row" id="viewImage" >
                                    <label class="col-md-5 col-form-label">Protfolio-image</label>
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
                      Home page Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('update_homepage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <input type="hidden" name="id" id="hideId">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Short-Title:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="short-title" required name="title" class="form-control" id="titleedit">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">Long-Title:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="long-title" required name="short_title" class="form-control" id="shorttitleedit">
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Real-coustomer-count :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="number" required name="cus_count" class="form-control" id="cuscountedit">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Years-of-Experience:</label>
                                    <div class="col-md-7">
                                        <input type="number" required  name="experience" value="" class="form-control" id="experienceedit">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Completed-projects :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" required name="com_project" class="form-control" id="comprojectedit">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Team-member:</label>
                                    <div class="col-md-7">
                                        <input type="text" required name="team-member" class="form-control" id="teammemberedit">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">

                            <div class="col-md-12">
                                <div class="row">
                                    <label for="" class="col-md-2 col-form-label">Long-text</label>
                                    <div class="col-md-10">
                                        <textarea id="descriptionedit" name="long_text" cols="25" rows="2" class="form-control" style="width:856px;margin-left:47px"></textarea>
                                        {{-- <input type="text" required name="com_address" class="form-control"> --}}
                                     </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row" id="viewImage" >
                                    <label class="col-md-5 col-form-label">Protfolio-image</label>
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
                      View Home page Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('update_homepage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <input type="hidden" name="id" id="hideId">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Short-Title:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" disabled placeholder="short-title" required name="title" class="form-control" id="titleview">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">Long-Title:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" disabled placeholder="long-title" required name="short_title" class="form-control" id="shorttitleview">
                                   </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Real-coustomer-count :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="number" disabled required name="cus_count" class="form-control" id="cuscountview">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Years-of-Experience:</label>
                                    <div class="col-md-7">
                                        <input type="number" disabled required  name="experience" value="" class="form-control" id="experienceview">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Completed-projects :
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" disabled required name="com_project" class="form-control" id="comprojectview">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Team-member:</label>
                                    <div class="col-md-7">
                                        <input type="text" disabled required name="team-member" class="form-control" id="teammemberview">
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">

                            <div class="col-md-12">
                                <div class="row">
                                    <label for="" class="col-md-2 col-form-label">Long-text</label>
                                    <div class="col-md-10">
                                        <textarea disabled id="descriptionview" name="long_text" cols="25" rows="2" class="form-control" style="width:856px;margin-left:47px"></textarea>
                                        {{-- <input type="text" required name="com_address" class="form-control"> --}}
                                     </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row" id="viewImage" >
                                    <label class="col-md-5 col-form-label">Protfolio-image</label>
                                    <div class="col-md-7">
                                        {{-- <input type="file" required name="image" id="image" class="form-control"  onchange="previewImageedit(this)"> --}}
                                    </div>
                                </div>
                            </div>
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
    url: '{{ route('edit_homepage') }}',
    method: 'GET',
    dataType: "JSON",
    data: { 'id': itemId },
    success: function (response) {
        $('.bd-example-edit').modal('show');

        $('#hideId').val(response.id);
        $('#titleedit').val(response.title);
        $('#shorttitleedit').val(response.long_title);
        $('#cuscountedit').val(response.cus_count);
        $('#experienceedit').val(response.years_of_experience);
        $('#comprojectedit').val(response.complete_project);
        $('#teammemberedit').val(response.team_member);
        $('#descriptionedit').val(response.description);

       var imageUrl = response.image;
        var fullImageUrl = "{{ asset('public/homeimage') }}/" + imageUrl;
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
                url: '{{ route('edit_homepage') }}',
                method: 'GET',
                dataType: "JSON",
                data: { 'id': itemId },
                success: function (response) {
                 $('.bd-example-view').modal('show');
                 $('#titleview').val(response.title);
                $('#shorttitleview').val(response.long_title);
                $('#cuscountview').val(response.cus_count);
                $('#experienceview').val(response.years_of_experience);
                $('#comprojectview').val(response.complete_project);
                $('#teammemberview').val(response.team_member);
                $('#descriptionview').val(response.description);

                var imageUrl = response.image;
                    var fullImageUrl = "{{ asset('public/homeimage') }}/" + imageUrl;
                    console.log(fullImageUrl);

                    $('#previewview').attr('src', fullImageUrl);
                    $('#imagePreviewview').show();
            },

        });
    });
</script>











