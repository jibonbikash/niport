@extends('layouts.admin')

@section('content')

    <div class="row row-xs clearfix">
        <div class="col-md-12 col-lg-12">

            <div class="col-md-12 col-lg-12">
                <div class="card mg-b-20">
                    <div class="card-header">
                        <h4 class="card-header-title">
                          Ongoing Training
                        </h4>
                        <div class="card-header-btn">
                            <a  href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse1" aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                            <a href="#" data-toggle="refresh" class="btn card-refresh"><i class="ion-android-refresh"></i></a>
                            <a href="#" data-toggle="expand" class="btn card-expand"><i class="ion-android-expand"></i></a>
                        </div>
                    </div>
                    <div class="card-body collapse show" id="collapse1">
                        <table id="basicDataTable" class="table responsive cell-border">
                            <thead>
                            <tr>
                            <tr>
                                <th scope="col">Batch Name</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Raining Center Name</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Training Date</th>
                            </tr>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ongoingtrainings as $ongoingtraining)
                                <tr>
                                    <td>{{ $ongoingtraining->name }}</td>
                                    <td>{{ $ongoingtraining->course_name }}</td>
                                    <td>{{ $ongoingtraining->training_center_name }}</td>
                                    <td>{{ $ongoingtraining->duration }}</td>
                                    <td>
                                        <strong>Start:</strong> {{  date('F j, Y', strtotime($ongoingtraining->training_start_date)) }} -
                                        <strong>End:</strong>  {{  date('F j, Y', strtotime($ongoingtraining->training_end_date)) }}
                                        {{--                                {{ $ongoingtraining->training_end_date }}--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th scope="col">Batch Name</th>
                                <th scope="col">Course Name</th>
                                <th scope="col">Raining Center Name</th>
                                <th scope="col">Duration</th>
                                <th scope="col">Training Date</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

    </div>
@endsection

@push('script')
            <script src="{{ asset('themes/metricaladmin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ asset('themes/metricaladmin/assets/plugins/datatables/responsive/dataTables.responsive.js') }}"></script>
            <script src="{{ asset('themes/metricaladmin/assets/plugins/datatables/extensions/dataTables.jqueryui.min.js') }}"></script>
            <script>
                // Basic DataTable
                $('#basicDataTable').DataTable({
                    responsive: true,
                    "lengthMenu": [[20, 50, 100, -1], [20, 50, 100, "All"]],
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: ''
                    }
                });

                // No Style DataTable
                $('#noStyleedTable').DataTable({
                    responsive: true,
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: ''
                    }
                });

                // Cell Border DataTable
                $('#cellBorder').DataTable({
                    responsive: true,
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: ''
                    }
                });

                // Compact DataTable
                $('#compactTable').DataTable({
                    responsive: true,
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: ''
                    }
                });

                // Hoverable DataTable
                $('#hoverTable').DataTable({
                    responsive: true,
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: ''
                    }
                });

                // Hoverable DataTable
                $('#orderActiveTable').DataTable({
                    responsive: true,
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: ''
                    },
                    "order": [[ 1, "desc" ]]
                });

                // Scrollable Table DataTable
                $('#scrollableTable').DataTable({
                    responsive: true,
                    language: {
                        searchPlaceholder: 'Search...',
                        sSearch: ''
                    },
                    "order": [[ 1, "desc" ]],
                    "scrollY":        "250px",
                    "scrollCollapse": true,
                    "paging":         false
                });
            </script>
@endpush
