<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Personal Information</h4>
                    <a href="" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-sm btn-success p-1 px-2"><i class="fa fa-plus"></i></i><span class="btn-icon-add"></span>Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>DOB</th>
                                    <th>Height</th>
                                    <th>Weight</th>
                                    <th>Number</th>
                                    <th>Blood group</th>

                                    <th class="">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($PersonalInfo as $item )
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->dob }}</td>
                                    <td>{{ $item->height }}</td>
                                    <td>{{ $item->weight }}</td>
                                    <td>{{ $item->cellno }}</td>
                                    <td>{{ $item->blodgroup }}</td>

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
                     Personal Information Create page Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('store_personalinfo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder=" name" required name="name" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">DOB:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="date" placeholder="dob" required name="dob" class="form-control">
                                   </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Father-name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="father name" required name="father_name" class="form-control">
                                   </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Mother-name</label>
                                    <div class="col-md-7">
                                        <input type="text" required name="mother_name" class="form-control" placeholder="Mother name">

                                     </div>
                                </div>
                            </div>

                        </div>


                        <div class="row mt-2">


                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Height</label>
                                    <div class="col-md-7">
                                        <input type="text" required name="height" class="form-control" placeholder="Height">

                                     </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Weight</label>
                                    <div class="col-md-7">
                                        <input type="text" required name="weight" class="form-control" placeholder="Weight">

                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">


                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Present Address</label>
                                    <div class="col-md-7">
                                        <input type="text" required name="presentaddress" class="form-control" placeholder="Present Address">

                                     </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Parmanent Address</label>
                                    <div class="col-md-7">
                                        <input type="text" required name="parmanentaddress" class="form-control" placeholder="Parmanent Address">

                                     </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">


                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Nationality</label>
                                    <div class="col-md-7">
                                        <input type="text" required name="nationality" class="form-control" placeholder="nationality">

                                     </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Religion</label>
                                    <div class="col-md-7">
                                        <input type="text" required name="religion" class="form-control" placeholder="religion">

                                     </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">


                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">blod group</label>
                                    <div class="col-md-7">
                                        <input type="text" required name="blodgroup" class="form-control" placeholder="blod group">

                                     </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Phone no</label>
                                    <div class="col-md-7">
                                        <input type="number" required name="cellno" class="form-control" placeholder="Phone no">

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
                     Personal info Update page Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="{{ route('update_personalinfo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">
                        <input type="hidden" id="hideId" name="id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder=" name" id="nameedit" name="name" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">DOB:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="date" placeholder="dob" id="dobedit" name="dob" class="form-control">
                                   </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Father-name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="father name" id="faedit" name="father_name" class="form-control">
                                   </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Mother-name</label>
                                    <div class="col-md-7">
                                        <input type="text" id="moedit" name="mother_name" class="form-control" placeholder="Mother name">

                                     </div>
                                </div>
                            </div>

                        </div>


                        <div class="row mt-2">


                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Height</label>
                                    <div class="col-md-7">
                                        <input type="text" id="heightedit" name="height" class="form-control" placeholder="Height">

                                     </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Weight</label>
                                    <div class="col-md-7">
                                        <input type="text" id="weightedit" name="weight" class="form-control" placeholder="Weight">

                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">


                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Present Address</label>
                                    <div class="col-md-7">
                                        <input type="text" id="presentedit" name="presentaddress" class="form-control" placeholder="Present Address">

                                     </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Parmanent Address</label>
                                    <div class="col-md-7">
                                        <input type="text" id="parmanentedit" name="parmanentaddress" class="form-control" placeholder="Parmanent Address">

                                     </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">


                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Nationality</label>
                                    <div class="col-md-7">
                                        <input type="text" id="nationalityedit" name="nationality" class="form-control" placeholder="nationality">

                                     </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Religion</label>
                                    <div class="col-md-7">
                                        <input type="text" id="religionedit" name="religion" class="form-control" placeholder="religion">

                                     </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">


                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">blood group</label>
                                    <div class="col-md-7">
                                        <input type="text" id="bloodedit" name="blodgroup" class="form-control" placeholder="blod group">

                                     </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Phone no</label>
                                    <div class="col-md-7">
                                        <input type="number" id="numberedit" name="cellno" class="form-control" placeholder="Phone no">

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
                      View personal info page Details
                    </h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form class="form-valide" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-2 px-4">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder=" name" id="nameview" readonly name="name" class="form-control">
                                   </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                               <div class="row">
                                    <label class="col-md-5 col-form-label">DOB:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="date" placeholder="dob" id="dobview" readonly name="dob" class="form-control">
                                   </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-md-5 col-form-label">Father-name:
                                        <span class="text-danger">*</span>
                                   </label>
                                   <div class="col-md-7">
                                        <input type="text" placeholder="father name" id="faview" readonly name="father_name" class="form-control">
                                   </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Mother-name</label>
                                    <div class="col-md-7">
                                        <input type="text" id="moview" readonly name="mother_name" class="form-control" placeholder="Mother name">

                                     </div>
                                </div>
                            </div>

                        </div>


                        <div class="row mt-2">


                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Height</label>
                                    <div class="col-md-7">
                                        <input type="text" id="heightview" readonly name="height" class="form-control" placeholder="Height">

                                     </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Weight</label>
                                    <div class="col-md-7">
                                        <input type="text" id="weightview" readonly name="weight" class="form-control" placeholder="Weight">

                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">


                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Present Address</label>
                                    <div class="col-md-7">
                                        <input type="text" id="presentview" readonly name="presentaddress" class="form-control" placeholder="Present Address">

                                     </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Parmanent Address</label>
                                    <div class="col-md-7">
                                        <input type="text" id="parmanentview" readonly name="parmanentaddress" class="form-control" placeholder="Parmanent Address">

                                     </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">


                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Nationality</label>
                                    <div class="col-md-7">
                                        <input type="text" id="nationalityview" readonly name="nationality" class="form-control" placeholder="nationality">

                                     </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Religion</label>
                                    <div class="col-md-7">
                                        <input type="text" id="religionview" readonly name="religion" class="form-control" placeholder="religion">

                                     </div>
                                </div>
                            </div>
                        </div>
                         <div class="row mt-2">


                            <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">blood group</label>
                                    <div class="col-md-7">
                                        <input type="text" id="bloodview" readonly name="blodgroup" class="form-control" placeholder="blod group">

                                     </div>
                                </div>
                            </div>
                             <div class="col-md-6">
                                <div class="row">
                                    <label for="" class="col-md-5 col-form-label">Phone no</label>
                                    <div class="col-md-7">
                                        <input type="number" id="numberview" readonly name="cellno" class="form-control" placeholder="Phone no">

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
            url: '{{ route('edit_personalpage') }}',
            method: 'GET',
            dataType: "JSON",
            data: { 'id': itemId },
            success: function (response) {

                $('.bd-example-edit').modal('show');
                $('#hideId').val(response.id);
                $('#nameedit').val(response.name);
                $('#dobedit').val(response.dob);
                $('#faedit').val(response.fa_name);
                $('#moedit').val(response.mo_name);
                $('#heightedit').val(response.height);
                $('#weightedit').val(response.weight);
                $('#presentedit').val(response.presentAddress);
                $('#parmanentedit').val(response.permanentAddress);
                $('#nationalityedit').val(response.nationality);
                $('#religionedit').val(response.religion);
                $('#bloodedit').val(response.blodgroup);
                $('#numberedit').val(response.cellno);

            },
        });

    });
</script>

<script>
    $(document).on('click','#viewDate',function(){
        var itemId = $(this).data('id');
        $.ajax({
                url: '{{ route('edit_personalpage') }}',
                method: 'GET',
                dataType: "JSON",
                data: { 'id': itemId },
                success: function (response) {
                 $('.bd-example-view').modal('show');
                  $('#nameview').val(response.name);
                $('#dobview').val(response.dob);
                $('#faview').val(response.fa_name);
                $('#moview').val(response.mo_name);
                $('#heightview').val(response.height);
                $('#weightview').val(response.weight);
                $('#presentview').val(response.presentAddress);
                $('#parmanentview').val(response.permanentAddress);
                $('#nationalityview').val(response.nationality);
                $('#religionview').val(response.religion);
                $('#bloodview').val(response.blodgroup);
                $('#numberview').val(response.cellno);
            },

        });
    });
</script>











