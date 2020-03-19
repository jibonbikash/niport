<div class="row">
    <div class="col-3">
        <a class="yearsetting" href="javascript:" ><i class="icon-settings" aria-hidden="true"></i> <strong>Year Setting </strong></a> <br/> <br/>

    </div>
</div>
<div class="row" id="yearsetting" style="display: none">
    <div class="card card-accent-primary  mg-15">
        <div class="card-header">Year Setting</div>
        <div class="card-body">
            <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="name">Start Date</label>
                    {!! Form::text('startdate', null, array('placeholder' => 'Start Date','class' => 'form-control startdate', 'autocomplete'=>'off', 'required')) !!}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="mobile">End Date</label>
                    {!! Form::text('enddate', null, array('placeholder' => 'End Date','class' => 'form-control enddate', 'autocomplete'=>'off', 'required')) !!}
                </div>
            </div>
                <div class="col-4">
                    <div class="form-group mt-4">
                        <button class="btn btn-purple btn-block mg-b-10" type="submit">Search</button>

                    </div>
                </div>

            </div>
        </div>
    </div>



</div>

@push('script')


    <script>
        $(function () {
         //   $( ".startdate" ).datepicker();
            $( ".startdate" ).datepicker({ dateFormat: 'yy-mm-dd' });
            $( ".enddate" ).datepicker({ dateFormat: 'yy-mm-dd' });
          //  $( ".enddate" ).datepicker();

            $(".yearsetting").click(function(){
                $("#yearsetting").toggle();
            });

        });
    </script>
@endpush
