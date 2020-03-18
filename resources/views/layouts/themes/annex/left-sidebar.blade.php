<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="/" class="logo"><i class="mdi mdi-assistant"></i> TMS</a>
            <!-- <a href="index.html" class="logo"><img src="assets/images/logo.png" height="24" alt="logo"></a> -->
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-airplay"></i>
                        <span> Dashboard </span>
                    </a>
                </li>


                <li class="menu-title">Report</li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-bullseye"></i> <span> Report </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('training') }}">Toal Training</a></li>
                        <li><a href="{{ route('gender') }}">Male or Female Trainee</a></li>
                        <li><a href="{{ route('division') }}">Division wise Trainee</a></li>
                        <li><a href="{{ route('district') }}">District wise Trainee</a></li>
                        <li><a href="{{ route('designation') }}">Designation wise Trainee</a></li>
                        <li><a href="{{ route('highesttraining') }}">Highest Training Receiver</a></li>
                        <li><a href="{{ route('maxtrainner') }}">Maximum conducted trainer</a></li>
                        <li><a href="{{ route('ongoingtraining') }}">Ongoing training</a></li>

                    </ul>
                </li>

            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
