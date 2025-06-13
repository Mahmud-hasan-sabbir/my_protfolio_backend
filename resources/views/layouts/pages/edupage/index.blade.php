<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Education Section Information</h4>
                    <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-sm btn-success p-1 px-2"><i class="fa fa-plus"></i></i><span class="btn-icon-add"></span>Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Edu-Name</th>
                                    <th>Institute</th>
                                    <th>Department</th>
                                    <th>Result</th>
                                    <th>Pass-Year</th>

                                    <th class="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($edudata as $item )
                                <tr>
                                    <td>{{ $item->edu_name }}</td>
                                    <td>{{ $item->inst_name }}</td>
                                    <td>{{ $item->deft }}</td>
                                    <td>{{ $item->result }}</td>
                                    <td>{{ $item->pass_year }}</td>

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
                      Education Section Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('store_edusection') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Education-name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Education name" required name="name" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">Institute-name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Institute name" required name="institute" class="form-control">
                                   </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Department:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Department" required name="department" class="form-control">
                                   </div>
                                </div>
                            </div>

                        </div>


                        <div class="row mt-2">

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Result</label>
                                    <div class="col-md-7">
                                        <input type="text" required name="result" class="form-control" placeholder="Result">

                                     </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row" style="margin-top: -48px;">
                                    <label for="" class="col-md-5 col-form-label">Board</label>
                                    <div class="col-md-7">
                                        <input type="text" required name="board" class="form-control" placeholder="Board">

                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Group</label>
                                    <div class="col-md-7">
                                        <input type="text" required name="group" class="form-control" placeholder="Group">

                                     </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row" style="margin-top: -48px;">
                                    <label for="" class="col-md-5 col-form-label">Pass-year</label>
                                    <div class="col-md-7">
                                        <input type="text" required name="passyear" class="form-control" placeholder="pass year">

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
                      Education Update page Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
               <form class="form-valide" action="{{ route('update_edusection') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <input type="hidden" name="id" id="hideId">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Education-name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Education name"  name="name" class="form-control" id="nameedit" >
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">Institute-name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Institute name" id="instituteedit" name="institute" class="form-control">
                                   </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Department:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="Department" id="dapartmentedit" name="department" class="form-control">
                                   </div>
                                </div>
                            </div>

                        </div>


                        <div class="row mt-2">

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Result</label>
                                    <div class="col-md-7">
                                        <input type="text" id="resultedit" name="result" class="form-control" placeholder="Result">

                                     </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row" style="margin-top: -48px;">
                                    <label for="" class="col-md-5 col-form-label">Board</label>
                                    <div class="col-md-7">
                                        <input type="text" id="boardedit" name="board" class="form-control" placeholder="Board">

                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Group</label>
                                    <div class="col-md-7">
                                        <input type="text" id="groupedit" name="group" class="form-control" placeholder="Group">

                                     </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row" style="margin-top: -48px;">
                                    <label for="" class="col-md-5 col-form-label">Pass-year</label>
                                    <div class="col-md-7">
                                        <input type="text" id="yearedit" name="passyear" class="form-control" placeholder="pass year">

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
                      View Education page Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Education-name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" readonly placeholder="Education name"  name="name" class="form-control" id="nameview" >
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">Institute-name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" readonly placeholder="Institute name" id="instituteview" name="institute" class="form-control">
                                   </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Department:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" readonly placeholder="Department" id="dapartmentview" name="department" class="form-control">
                                   </div>
                                </div>
                            </div>

                        </div>


                        <div class="row mt-2">

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Result</label>
                                    <div class="col-md-7">
                                        <input type="text" readonly id="resultview" name="result" class="form-control" placeholder="Result">

                                     </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row" style="margin-top: -48px;">
                                    <label for="" class="col-md-5 col-form-label">Board</label>
                                    <div class="col-md-7">
                                        <input type="text" readonly id="boardview" name="board" class="form-control" placeholder="Board">

                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">

                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Group</label>
                                    <div class="col-md-7">
                                        <input type="text" readonly id="groupview" name="group" class="form-control" placeholder="Group">

                                     </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row" style="margin-top: -48px;">
                                    <label for="" class="col-md-5 col-form-label">Pass-year</label>
                                    <div class="col-md-7">
                                        <input type="text" readonly id="yearview" name="passyear" class="form-control" placeholder="pass year">

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
            url: '{{ route('edit_edupage') }}',
            method: 'GET',
            dataType: "JSON",
            data: { 'id': itemId },
            success: function (response) {

                $('.bd-example-edit').modal('show');
                $('#hideId').val(response.id);
                $('#nameedit').val(response.edu_name);
                $('#instituteedit').val(response.inst_name);
                $('#dapartmentedit').val(response.deft);
                $('#resultedit').val(response.result);
                $('#boardedit').val(response.board);
                $('#groupedit').val(response.group);
                $('#yearedit').val(response.pass_year);
            },
        });

    });
</script>

<script>
    $(document).on('click','#viewDate',function(){
        var itemId = $(this).data('id');
        $.ajax({
                url: '{{ route('edit_edupage') }}',
                method: 'GET',
                dataType: "JSON",
                data: { 'id': itemId },
                success: function (response) {
                 $('.bd-example-view').modal('show');
                 $('#nameview').val(response.edu_name);
                $('#instituteview').val(response.inst_name);
                $('#dapartmentview').val(response.deft);
                $('#resultview').val(response.result);
                $('#boardview').val(response.board);
                $('#groupview').val(response.group);
                $('#yearview').val(response.pass_year);
            },

        });
    });
</script>











