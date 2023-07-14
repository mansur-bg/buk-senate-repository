@php
  $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Decisions')

@section('content')
  <h4>Cases Index</h4>
  <div class="card-datatable table-responsive pt-0">
    <table class="cases-table table table-bordered">
    <thead>
      <tr>
{{--          <th></th>--}}
          <th></th>
          <th></th>
          <th>S/N</th><th>Registration Number</th><th>Full Name</th><th>Narration</th><th>Decision</th><th>Academic Session</th><th>Semester</th><th>Senate Meeting Number</th><th>Note</th><th>Case</th><th>Duration</th><th>Action</th></tr>
    </thead>
    <tbody>
{{--    @foreach($decisions as $decision)--}}
{{--      <tr><td>{{$loop->iteration}}</td><td>{{$decision->registration_number}}</td><td>{{$decision->narration}}</td></tr>--}}
{{--    @endforeach--}}
    </tbody>
        <tfoot>
        <tr>
            {{--          <th></th>--}}
            <th colspan="3" style="text-align: right" class="fs-large"></th>
{{--            <th></th>--}}
{{--            <th>S/N</th>--}}
            <th>Registration Number</th><th>Full Name</th><th>Narration</th><th>Decision</th><th>Academic Session</th><th>Semester</th><th>Senate Meeting Number</th><th>Note</th><th>Case</th><th>Duration</th><th>Action</th></tr>
        </tfoot>
  </table>
  </div>




@endsection


@section('page-style')
  <!-- Datatable css -->
  <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')) }}">
    <style>
        tfoot {
            display: table-row-group;
        }
    </style>
@endsection

@section('page-script')
  <!-- BS table js -->
  <script src="{{ asset(mix('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')) }}"></script>
  <script type="text/javascript" data-ajax_route="{{ route('decision.index') }}" src="{{ asset(mix('js/decision_index.js')) }}"></script>
{{--  <script type="text/javascript" data-ajax_route="{{ route('decision.index') }}" src="{{ asset(mix('js/decision_index.js')) }}"></script>--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            let table = $('.cases-table').DataTable({--}}
{{--                processing: false,--}}
{{--                serverSide: true,--}}
{{--                // "paging": true,--}}
{{--                // "orderClasses": false,--}}
{{--                // "deferRender": true,--}}
{{--                ajax: "{{ route('decision.index') }}",--}}
{{--                columns: [--}}
{{--                    // {data: 'id', name: 'id'},--}}
{{--                    {data: 'details', name:'details', orderable: false, searchable: false},--}}
{{--                    {data: 'check', name:'check', orderable: false, searchable: false},--}}
{{--                    // {data: '', orderable: false, searchable: false},--}}
{{--                    {data: 'DT_RowIndex', orderable: false, searchable: false},--}}
{{--                    {data: 'registration_number', name: 'registration_number'},--}}
{{--                    {data: 'full_name', name: 'full_name'},--}}
{{--                    {data: 'narration', name: 'narration'},--}}
{{--                    {data: 'decision', name: 'decision'},--}}
{{--                    {data: 'academic_session', name: 'academic_session'},--}}
{{--                    {data: 'semester', name: 'semester'},--}}
{{--                    {data: 'senate_meeting_number', name: 'senate_meeting_number'},--}}
{{--                    {data: 'note', name: 'note'},--}}
{{--                    {data: 'case', name: 'case'},--}}
{{--                    {data: 'duration', name: 'duration'},--}}
{{--                    {data: 'action', name: 'action', orderable: false, searchable: false},--}}
{{--                ],--}}
{{--                columnDefs: [--}}
{{--                    {--}}
{{--                        // For Responsive--}}
{{--                        className: 'control',--}}
{{--                        orderable: false,--}}
{{--                        responsivePriority: 2,--}}
{{--                        searchable: false,--}}
{{--                        targets: 0,--}}
{{--                        render: function (data, type, full, meta) {--}}
{{--                            return '';--}}
{{--                        }--}}
{{--                    },--}}
{{--                    {--}}
{{--                        // For Checkboxes--}}
{{--                        targets: 1,--}}
{{--                        orderable: false,--}}
{{--                        responsivePriority: 3,--}}
{{--                        searchable: false,--}}
{{--                        checkboxes: true,--}}
{{--                        render: function () {--}}
{{--                            return '<input type="checkbox" class="dt-checkboxes form-check-input">';--}}
{{--                        },--}}
{{--                        checkboxes: {--}}
{{--                            selectAllRender: '<input type="checkbox" class="form-check-input">'--}}
{{--                        }--}}
{{--                    },--}}

{{--                ],--}}
{{--                dom: '<"card-header"<"head-label text-center"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',--}}
{{--                // displayLength: 7,--}}
{{--                lengthMenu: [10, 25, 50, 75, 100],--}}
{{--                buttons: [--}}
{{--                    {--}}
{{--                        extend: 'collection',--}}
{{--                        className: 'btn btn-label-primary dropdown-toggle me-2',--}}
{{--                        text: '<i class="mdi mdi-export-variant me-1"></i>Export',--}}
{{--                        buttons: [--}}
{{--                            {--}}
{{--                                extend: 'print',--}}
{{--                                text: '<i class="mdi mdi-printer-outline me-1" ></i>Print',--}}
{{--                                className: 'dropdown-item',--}}
{{--                                // exportOptions: { columns: [3, 4, 5, 6, 7] }--}}
{{--                            },--}}
{{--                            {--}}
{{--                                extend: 'csv',--}}
{{--                                text: '<i class="mdi mdi-file-document-outline me-1" ></i>Csv',--}}
{{--                                className: 'dropdown-item',--}}
{{--                                // exportOptions: { columns: [3, 4, 5, 6, 7] }--}}
{{--                            },--}}
{{--                            {--}}
{{--                                extend: 'excel',--}}
{{--                                text: '<i class="mdi mdi-file-excel-outline me-1"></i>Excel',--}}
{{--                                className: 'dropdown-item',--}}
{{--                                // exportOptions: { columns: [3, 4, 5, 6, 7] }--}}
{{--                            },--}}
{{--                            {--}}
{{--                                extend: 'pdf',--}}
{{--                                text: '<i class="mdi mdi-file-pdf-box me-1"></i>Pdf',--}}
{{--                                className: 'dropdown-item',--}}
{{--                                // exportOptions: { columns: [3, 4, 5, 6, 7] }--}}
{{--                            },--}}
{{--                            {--}}
{{--                                extend: 'copy',--}}
{{--                                text: '<i class="mdi mdi-content-copy me-1" ></i>Copy',--}}
{{--                                className: 'dropdown-item',--}}
{{--                                // exportOptions: { columns: [3, 4, 5, 6, 7] }--}}
{{--                            }--}}
{{--                        ]--}}
{{--                    },--}}
{{--                    {--}}
{{--                        text: '<i class="mdi mdi-plus me-1"></i> <span class="d-none d-lg-inline-block">Add New Record</span>',--}}
{{--                        className: 'create-new btn btn-primary'--}}
{{--                    }--}}
{{--                ],--}}
{{--                initComplete: function () {--}}
{{--                    this.api()--}}
{{--                        .columns()--}}
{{--                        .every(function () {--}}

{{--                            let column = this;--}}
{{--                            // let excludeColumns = ['', 'S/N', 'Action'];--}}
{{--                            let excludeColumns = ['Search =>'];--}}
{{--                            let excludeColumnIndexes = [0, 1, 2, 13];--}}
{{--                            let columnIndex = column.index();--}}
{{--                            console.log(column.index());--}}
{{--                            let title = column.footer().textContent;--}}
{{--                            // console.log(title);--}}

{{--                            // if(!excludeColumns.includes(title)){--}}

{{--                            if(!excludeColumnIndexes.includes(columnIndex)){--}}
{{--                                // Create input element--}}
{{--                                let input = document.createElement('input');--}}
{{--                                input.placeholder = title;--}}
{{--                                // input.placeholder = "Search";--}}
{{--                                input.className =  "form-control form-control-sm";--}}
{{--                                column.footer().replaceChildren(input);--}}

{{--                                // Event listener for user input--}}
{{--                                input.addEventListener('keyup', () => {--}}
{{--                                    if (column.search() !== this.value) {--}}
{{--                                        column.search(input.value).draw();--}}
{{--                                    }--}}
{{--                                });--}}
{{--                            }else if(columnIndex === 2) {--}}
{{--                                // Create span element--}}
{{--                                let span = document.createElement('span');--}}
{{--                                span.className = "mdi mdi-database-search mdi-36px";--}}
{{--                                // span.innerHTML = "Search";--}}
{{--                                column.footer().replaceChildren(span);--}}
{{--                            }else if(columnIndex === 13){--}}

{{--                                column.footer().replaceChildren('')--}}
{{--                            }--}}
{{--                        });--}}

{{--                    $('tfoot').each(function () {--}}
{{--                        $(this).insertAfter($(this).siblings('thead'));--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--    </script>--}}

@endsection


