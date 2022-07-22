@extends('backend.layouts.master')
@section('title', 'Bike Model')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit"> </i>
                </div>
                <div>All Models</div>
                <div class="d-inline-block ml-2">
                    
                        <button class="btn btn-success" onclick="create()"><i
                                class="glyphicon glyphicon-plus"></i>
                            New Model
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
                                <th>Brand Name</th>
                                <th>Model Name</th>
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
                ajax: '/admin/getAllBikeModels',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'brandname', name: 'brandname'},                  
                    {data: 'bike_model', name: 'bike_model'},
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
            ajax_submit_create('bikeModels');
        }

        $(document).ready(function () {
            // View Form
            $("#manage_all").on("click", ".view", function () {
                var id = $(this).attr('id');
                ajax_submit_view('bikeModels', id)
            });

            // Edit Form
            $("#manage_all").on("click", ".edit", function () {
                var id = $(this).attr('id');
                ajax_submit_edit('bikeModels', id)
            });


            // Delete
            $("#manage_all").on("click", ".delete", function () {
                var id = $(this).attr('id');
                ajax_submit_delete('bikeModels', id)
            });

        });

    </script>
@stop