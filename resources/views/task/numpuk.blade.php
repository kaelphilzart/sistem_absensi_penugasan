<div class="modal fade" id="numpukTugas{{$data->id}}"  role ="dialog"tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Submit Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('numpuk-tugas')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_task" id="id_task" value="{{$data->id}}">
                    <input type="hidden" name="id_user" id="id_user" value=" {{ Auth::user()->id }}">
                    <div class="mb-3">
                        <label for="subject" class="col-form-label">Subject</label>
                        <input type="text" class="form-control"  value="{{$data->subject}}" name="subject" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="deadline" class="col-form-label">Deadline</label>
                        <input type="text" class="form-control" id="deadline" value="{{$data->deadline}}" name="deadline" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="task_file" class="col-form-label">Upload File</label>
                        <input type="file" class="form-control" id="tugas" name="tugas">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
