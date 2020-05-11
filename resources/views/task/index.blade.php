@extends('layout.app')
@section('content')

@if( Auth::user()->isAdmin() )

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card mb-4 shadow">


        <div class="card-header py-3 bg-abasas-dark">
            <nav class="navbar navbar-dark ">
                <a class="navbar-brand"> New Task</a>

            </nav>
        </div>

   
        <div class="card-body">
            <form method="POST" action="{{ route('tasks.store') }}">
                @csrf
                <div class="form-row align-items-center">
                    <div class="form-group">
                        <label for="user_id"> Assigned</label>
                        <select class="form-control mb-2" name="user_id" id="AddTaskUserId" required>
                            <option value="1" selected="selected"> Select id</option>
                            @foreach ($users as $user)
                            <option value="{{$user->id}}"> {{$user->id}} | {{$user->name}} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="level_id">Level</label>
                        <select class="form-control mb-2" name="task_level_id" id="level_id" required>
                            <option value="1" selected="selected"> Select Level</option>
                            @foreach ($taskLevels as $taskLevel)
                            <option value="{{$taskLevel->id}}"> {{$taskLevel->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status_id">Status</label>
                        <select class="form-control mb-2" name="task_status_id" id="status_id" required>
                            <option value="1" selected="selected"> Select Status</option>
                            @foreach ($taskStatuses as $taskStatus)
                            <option value="{{$taskStatus->id}}"> {{$taskStatus->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-auto">
                        <span class="text-dark pl-2">Title</span>
                        <input type="text" name="title" class="form-control mb-2" id="inlineFormInput" required>
                    </div>
                    <div class="col-auto">
                        <span class="text-dark pl-2">Link</span>
                        <input type="text" name="link" class="form-control mb-2" id="inlineFormInput" required>
                    </div>
                    <div class="col-auto">
                        <span class="text-dark pl-2">Comment</span>
                        <input type="text" name="comment" class="form-control mb-2" id="inlineFormInput" required>
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn bg-abasas-dark mt-3">Submit</button>
                    </div>

                </div>

            </form>
        </div>

      
    </div>

    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3 bg-abasas-dark">
            <nav class="navbar navbar-dark ">
                <a class="navbar-brand"> Task List</a>

            </nav>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="taskTable" width="100%" cellspacing="0">



                    <thead class="bg-abasas-dark">


                        <tr>
                            <th>#</th>
                            <th>Assigned</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>title</th>
                            <th>Comment</th>

                            @if( Auth::user()->isAdmin() )
                            <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tfoot class="bg-abasas-dark">
                        <tr>
                            <th>#</th>
                            <th>Assigned</th>
                            <th>Level</th>
                            <th>Status</th>
                            <th>title</th>
                            <th>Comment</th>

                            @if( Auth::user()->isAdmin() )
                            <th>Action</th>
                            @endif
                        </tr>

                    </tfoot>
                    <tbody>

                        <?php $i = 1; ?>
                        @foreach ($tasks as $task)
                        <?php $id = $task->id; ?>
                        <tr class="data-row">
                            <td class="iteration">{{$i++}}</td>
                            <td class="  word-break name">{{$task->user->name}}</td>
                            <td class="  word-break taskLevel">{{$task->level->name}}</td>
                            <td class="  word-break taskStatus">{{$task->status->name}}</td>
                            <td class=" word-break link"> <a href="{{$task->link}}"> {{$task->title}} </a> </td>
                            <td class=" word-break comment ">{{$task->comment}}</td>




                            @if( Auth::user()->isAdmin() )
                            <td class="align-middle">
                                <button type="button" class="btn btn-success" id="task-edit-item" data-item-id={{$id}}> <i class="fa fa-edit" aria-hidden="false"> </i></button>


                                <form method="POST" action="{{ route('tasks.destroy',  $task->id )}} " id="delete-form-{{ $task->id }}" style="display:none; ">
                                    {{csrf_field() }}
                                    {{ method_field("delete") }}
                                </form>




                                <button onclick="if(confirm('are you sure to delete this')){
				document.getElementById('delete-form-{{ $task->id }}').submit();
			}
			else{
				event.preventDefault();
			}
			" class="btn btn-danger btn-sm btn-raised">
                                    <i class="fa fa-trash" aria-hidden="false">

                                    </i>
                                </button>



                            </td>
                            @endif

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>



<!-- Attachment Modal -->
<div class="modal fade" id="task-edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-abasas-dark ">
                <h5 class="modal-title " id="edit-modal-label ">Edit Task</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="attachment-body-content">
                <form id="task-edit-form" class="form-horizontal" method="POST" action="{{route('tasks.update',['task'=>1])}}">
                    @method("put")
                    @csrf



                    <!-- id -->
                    <div class="form-group">
                        <label class="col-form-label" for="task-modal-input-id">Id </label>
                        <input type="text" name="id" class="form-control" id="task-modal-input-id" required readonly>
                    </div>
                    <!-- /id -->
                    <!-- name -->
                    <div class="form-group">
                        <label class="col-form-label" for="task-modal-input-name">Assigned</label>
                        <input type="text" name="name" class="form-control" id="task-modal-input-name" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="level_id"> Level</label>
                        <select class="form-control mb-2" name="task_level_id" id="task-modal-input-level_id" required> </select>
                    </div>
                    <div class="form-group">
                        <label for="status_id"> Status</label>
                        <select class="form-control mb-2" name="task_status_id" id="task-modal-input-status_id" required> </select>
                    </div>
                    <!-- /name -->
                    <!-- description -->
                    <div class="form-group">
                        <label class="col-form-label" for="task-modal-input-link">Link</label>
                        <input type="text" name="link" class="form-control" id="task-modal-input-link" required>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="task-modal-input-comment">Comment</label>
                        <input type="text" name="comment" class="form-control" id="task-modal-input-comment" required>
                    </div>

                    <div class="form-group">

                        <input type="submit" value="Submit" class="form-control btn btn-success">
                    </div>
                    <!-- /description -->




                </form>
            </div>

        </div>
    </div>
</div>
</div>
<!-- /Attachment Modal -->

<script>
    $(document).ready(function() {



        $(document).on('click', "#task-edit-item", function() {



            $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

            var options = {
                'backdrop': 'static'
            };
            $('#task-edit-modal').modal(options)
        });

        // on modal show
        $('#task-edit-modal').on('show.bs.modal', function() {
            var el = $(".edit-item-trigger-clicked"); // See how its usefull right here?
            var row = el.closest(".data-row");

            // get the data
            var id = el.data('item-id');
            var name = row.children(".name").text();
            var comment = row.children(".comment").text();
            var link = row.children(".link").text();
            var taskLevelName = row.children(".taskLevel").text();
            var taskStatusName = row.children(".taskStatus").text();


            var action = $("#indexLink").val() + '/tasks/' + id;
            $("#task-edit-form").attr('action', action);

            // fill the data in the input fields
            $("#task-modal-input-id").val(id);
            $("#task-modal-input-name").val(name);
            $("#task-modal-input-link").val(link);
            $("#task-modal-input-comment").val(comment);


            var levelhtml = '';

            $.get($("#task_level_list_api").val().trim(), function(taskLevels, status) {


                taskLevels.forEach(function(taskLevel, item) {
                    //   alert(viewCategoryId+'   '+i.name);
                    if (taskLevelName == taskLevel.name) {
                        levelhtml += '   <option  selected="selected"  value="  ' + taskLevel.id + ' ">  ' + taskLevel.name + '    </option>';
                    } else {
                        levelhtml += '   <option value="  ' + taskLevel.id + ' "> ' + taskLevel.name + '</option>';
                    }

                });


                $("#task-modal-input-level_id").html(levelhtml);
            });

            var statushtml = '';

            $.get($("#task_status_list_api").val().trim(), function(taskStatuses, status) {


                taskStatuses.forEach(function(taskStatus, item) {
                    //   alert(viewCategoryId+'   '+i.name);
                    if (taskStatusName == taskStatus.name) {
                        statushtml += '   <option  selected="selected"  value="  ' + taskStatus.id + ' ">  ' + taskStatus.name + '    </option>';
                    } else {
                        statushtml += '   <option value="  ' + taskStatus.id + ' "> ' + taskStatus.name + '</option>';
                    }

                });


                $("#task-modal-input-status_id").html(statushtml);
            });
        });

        // on modal hide
        $('#task-edit-modal').on('hide.bs.modal', function() {
            $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
            $("#task-edit-form").trigger("reset");
        });

    });
</script>

@endsection