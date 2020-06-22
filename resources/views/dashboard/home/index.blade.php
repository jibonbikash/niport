@extends('layouts.admin')

@section('content')
    <div class="pageheader pd-t-25 pd-b-35">
        <div class="pd-t-5 pd-b-5">
            <h1 class="pd-0 mg-0 tx-20">Dashboard</h1>
        </div>
        <div class="breadcrumb pd-0 mg-0">
            <a class="breadcrumb-item" href="">Dashboard</a>
            <span class="breadcrumb-item active">Report </span>
        </div>
    </div>

    @role('Admin')




    @else

        {!! Form::open(array('route' => 'home', 'method' => 'get')) !!}
        @include('layouts.themes.metricaladmin.datepicker')
        {!! Form::close() !!}
        <!--/ Count Card End -->
        @include('dashboard.home._index',['totalFEMALE'=>$totalFEMALE,'totalTMALE'=>$totalTMALE, 'batch'=>$batch,
                    'course'=>$course,
                    'locations'=>$locations,
                    'courses'=>$courses,
                    'completed'=>$completed,
                    'ongoing'=>$ongoing,
                     'centerinfo'=>$centerID,
                   'countfrst4month'=>$countfrst4month,
                    'countsecond4month'=>$countsecond4month,
                    'countlast4month'=>$countlast4month,
                     'monthstart'=>$monthstart,
                    'first4month'=>$first4month,
                    'second4month'=>$second4month,
                    'last4month'=>$last4month,
                    'alltraining'=>$alltraining,
                     ])
    @endrole






@endsection
