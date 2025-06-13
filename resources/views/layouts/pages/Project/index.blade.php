<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">WorkingProject Section Information</h4>
                    <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-sm btn-success p-1 px-2"><i class="fa fa-plus"></i></i><span class="btn-icon-add"></span>Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Category</th>
                                    <th>Project URL</th>
                                    <th class="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Project as $item )
                                <tr>
                                    <td>{{ $item->project_name }}</td>
                                    <td>{{ $item->Category }}</td>
                                    <td>{{ $item->project_url }}</td>

                                   
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                      WorkingProject Section Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('store_projectsection') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder=" project name" required name="name" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">Category:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="category" required name="category" class="form-control">
                                   </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Language:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Language" required name="lang" class="form-control">
                                   </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row" id="viewImage" >
                                    <label class="col-md-5 col-form-label">Project URL</label>
                                    <div class="col-md-7">
                                        <input type="text" placeholder="Project URL" required name="url" class="form-control">
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
                      Project Update page Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('update_projectsection') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <input type="hidden" name="id" id="hideId">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder=" project name" id="name" name="name" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">Category:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="category" id="category" name="category" class="form-control">
                                   </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Language:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Language" id="lang" name="lang" class="form-control">
                                   </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row" id="viewImage" >
                                    <label class="col-md-5 col-form-label">Project URL</label>
                                    <div class="col-md-7">
                                        <input type="text" placeholder="Project URL" id="url" name="url" class="form-control">
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
                      View Project page Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
              <form class="form-valide" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <input type="hidden" name="id" id="hideId">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder=" project name" readonly id="nameview" name="name" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">Category:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="category" readonly id="categoryview" name="category" class="form-control">
                                   </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Language:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Language" id="langview"  readonly name="lang" class="form-control">
                                   </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row" id="viewImage" >
                                    <label class="col-md-5 col-form-label">Project URL</label>
                                    <div class="col-md-7">
                                        <input type="text" placeholder="Project URL" id="urlview" readonly name="url" class="form-control">
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
        url: '{{ route('edit_projectpage') }}',
        method: 'GET',
        dataType: "JSON",
        data: { 'id': itemId },
        success: function (response) {
            $('.bd-example-edit').modal('show');
            $('#hideId').val(response.id);
            $('#name').val(response.project_name);
            $('#category').val(response.Category);
            $('#lang').val(response.language);
            $('#url').val(response.project_url);
                },
            });

    });
</script>

<script>
    $(document).on('click','#viewDate',function(){
        var itemId = $(this).data('id');
        $.ajax({
                url: '{{ route('edit_projectpage') }}',
                method: 'GET',
                dataType: "JSON",
                data: { 'id': itemId },
                success: function (response) {
                 $('.bd-example-view').modal('show');
                  $('#nameview').val(response.project_name);
                $('#categoryview').val(response.Category);
                $('#langview').val(response.language);
                $('#urlview').val(response.project_url);
              
            },

        });
    });
</script>











