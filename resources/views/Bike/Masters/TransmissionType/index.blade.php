@extends('backend.layouts.master')
@section('title', 'Car Transmission Type')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>Car Transmission Type</div>
                <div class="d-inline-block ml-2">
                    
                        <button class="btn btn-success" onclick="create()"><i
                                class="glyphicon glyphicon-plus"></i>
                            New Transmission Type
                        </button>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="manage_all"
                               class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>                              
                               <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media screen and (min-width: 768px) {
            #myModal .modal-dialog {
                width: 50%;
                border-radius: 5px;
            }
        }
    </style>
    <script>
        $(function () {
            table = $('#manage_all').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/admin/getAllCarTransmissionTypes',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},                   
                    {data: 'name', name: 'name'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action'}
                ],
                "columnDefs": [
                    {"className": "", "targets": "_all"}
                ],
                "autoWidth": false,
            });
            $('.dataTables_filter input[type="search"]').attr('placeholder', 'Type here to search...').css({
                'width': '220px',
                'height': '30px'
            });
        });
    </script>
    <script type="text/javascript">
        function create() {
            ajax_submit_create('carTransmissionTypes');
        }

        $(document).ready(function () {
            // View Form
            $("#manage_all").on("click", ".view", function () {
                var id = $(this).attr('id');
                ajax_submit_view('carTransmissionTypes', id)
            });

            // Edit Form
            $("#manage_all").on("click", ".edit", function () {
                var id = $(this).attr('id');
                ajax_submit_edit('carTransmissionTypes', id)
            });


            // Delete
            $("#manage_all").on("click", ".delete", function () {
                var id = $(this).attr('id');
                ajax_submit_delete('carTransmissionTypes', id)
            });

        });

    </script>
@stop