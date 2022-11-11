@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div id="success_response">

            </div>
            <div class="card">
                <div class="card-header">
                    <h4>
                        Students Data
                        <a href="" data-bs-toggle="modal" data-bs-target="#addStudentmodal"
                            class="btn btn-primary float-end btn-sm">Add Students</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Course</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                      
                        </tbody>
                    </table>




                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->


        <div class="container" id="addStudentmodal">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Enter Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="body">
                <ul id="saveForm_errList"></ul>
                <div class="mb-3">
                    <label for="Name" class="form-label">Name</label>
                    <input type="text" class="form-control name" id="Name" name="name" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">email </label>
                    <input type="text" class="form-control email" name="email" id="email" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="Phone" class="form-label">Phone </label>
                    <input type="text" class="form-control phone" name="phone" id="Phone" aria-describedby="emailHelp">

                </div>
                <div class="mb-3">
                    <label for="Course" class="form-label">Course address</label>
                    <input type="text" class="form-control course" id="Course" name="course"
                        aria-describedby="emailHelp">

                </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_student">Add</button>
            </div>
      
</div>
@endsection

                               
@section('scripts')
<script>
    $(document).ready(function () {
        fetchstudent();
        function fetchstudent()
        {
            $.ajax({
                type: "get",
                url: '/fetch-students',
                dataType: "json",
                success: function (response) {
                    // console.log(response.students);
                    $('tbody').html("");
                    $.each(response.students, function (key, item) { 
                         $('tbody').append("<tr>\
                         <td>" + item.id + "</td>\
                         <td>" + item.name + "</td>\
                         <td>" + item.email + "</td>\
                         <td>" + item.phone + "</td>\
                         <td>" + item.course + "</td>\
                         <td><button type='button' value='"+item.id+"' class='btn btn-primary btn-small edit_student'>Edit</button></td>\
                        <td><button type='button' value='"+item.id+"' class='btn btn-primary btn-small delete_student'>Delete</button></td>\
                          </tr>"

                            );

                    });
                }
            });
        }

        $(document).on('click', '.add_student', function (e) {
            e.preventDefault();
            // console.log('Add');

            var data = {
                'name': $('.name').val(),
                'email': $('.email').val(),
                'phone': $('.phone').val(),
                'course': $('.course').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //   console.log(data);
            $.ajax({
                type: "post",
                url: "/students",
                data: data,
                dataType: "json",
                success: function (response) {
                 
                    // console.log(response);
                    if (response.status == 400) {
                        $('#saveForm_errList').html("");
                        $('#saveForm_errList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_values) {

                            $('#saveForm_errList').append('<li>' + err_values +
                                '</li>')
                        });
                    } else {
                        $('#saveForm_errList').html("");
                        $('#success_response').addClass('alert alert-danger');
                        $('#success_response').text(response.message);
                        $('#addStudentmodal').modal('hide');
                        $('#addStudentmodal').find('input').val("");
                        fetchstudent();
                    }
                   
                }
            });
        });
    });

</script>
@endsection
