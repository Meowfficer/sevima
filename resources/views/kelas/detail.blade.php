@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="card w-100">
                <div class="card-header bg-{{ $kelas->mapelKelas->warna }} text-light d-flex align-items-center justify-content-between">
                  Featured <a class="float-end btn btn-primary" onclick="addStudent()">Add Student <i class="bx bx-plus"></i></a>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">{{ $kelas->mapelKelas->deskripsi }}</li>
                  @foreach ($kelas->user as $item)
                    <li class="list-group-item">{{ $item->name }}</li>
                    {{-- <li class="list-group-item">A second item</li> --}}
                    {{-- <li class="list-group-item">A third item</li> --}}
                  @endforeach
                </ul>
              </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    function addStudent() {
    $.confirm({
        title: 'Add New Student ',
        content: 'URL:/api/modal-create-student',
        columnClass: 'medium',
        type: 'blue',
        animation: 'zoom',
        animationSpeed: 800,
        buttons: {
            formSubmit: {
            text: 'Submit',
                btnClass: 'btn-blue',
                action: function() {
                    let nama_student,id_user;
                    nama_student = this.$content.find('#nama_student').val();
                    id_user = {{ Auth::user()->id }};
                    
                    if (!nama_student) {
                        this.close();
                        Swal.fire({
                            title: 'Failed!',
                            icon: 'error',
                            html: 'Insert failed : Student Name still empty!',
                            showClass: {
                                popup: 'animate_animated animate_zoomIn'
                            },
                            hideClass: {
                                popup: 'animate_animated animate_zoomOut'
                            },
                            confirmButtonText: 'Ok',
                            
                        })
                        return false;
                    }

                    $.ajax({
                        type: 'POST',
                        url: '/api/modal-store-student',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            "_token": "{{ csrf_token() }}",
                            nama_student,
                            id_user,
                        },
                        async: false,
                        success: function(data) {
                            console.log(data);
                            Swal.fire({
                                title: 'Success Insert!!',
                                icon: 'success',
                                // html: id_user,
                                confirmButtonText: 'Ok',
                                showClass: {
                                    popup: 'animate_animated animate_zoomIn'
                                },
                                hideClass: {
                                    popup: 'animate_animated animate_zoomOut'
                                }
                                }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    location.reload();
                                    console.log(data);
                                }
                            })
                            // location.reload();
                        },
                        error: function(data) {
                            Swal.fire({
                                title: 'Failed!',
                                icon: 'error',
                                html: data.responseJSON.message,
                                showClass: {
                                    popup: 'animate_animated animate_zoomIn'
                                },
                                hideClass: {
                                    popup: 'animate_animated animate_zoomOut'
                                },
                                confirmButtonText: 'Ok',
                                }).then((result) => {
                                /* Read more about isConfirmed below */
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            })
                            // $.alert(data.responseJSON.message);
                        }
                    });
                }
            },
            cancel: function() {
                //close
            },
        },
        onContentReady: function() {
            // bind to events
            var jc = this;
            this.$content.find('form').on('submit', function(e) {
                // if the user submits the form by pressing enter in the field.
                e.preventDefault();
                jc.$$formSubmit.trigger('click'); // reference the button and click it
            });
        }
    });
}
</script>
@endsection