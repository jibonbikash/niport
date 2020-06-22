<div class="page-sidebar">
    <div class="logo">
        <a class="logo-img" href="/">
{{--            <img class="desktop-logo" src="assets/images/logo.png" alt="">--}}
{{--            <img class="small-logo" src="assets/images/small-logo.png" alt="">--}}
            TMS
        </a>
        <i class="ion-ios-close-empty" id="sidebar-toggle-button-close"></i>
    </div>
    <!--================================-->
    <!-- Sidebar Menu Start -->
    <!--================================-->
    <div class="page-sidebar-inner">
        <div class="page-sidebar-menu">
            <ul class="accordion-menu">
                <li class="open active">
                    <a href="{{ URL::to('/') }}"><i data-feather="home"></i>
                        <span>Dashboard</span></a>

                </li>
                @role('Super_Admin|admin')
                <li>
                    <a href="{{ route('center.index') }}"><i data-feather="mail"></i>
                        <span>list of training center</span></a>

                </li>

                <li>
                    <a href="{{ route('highesttrainingadmin') }}"><i data-feather="mail"></i>
                        <span>Highest Training Receiver</span></a>

                </li>

                <li><a href="{{ route('trainer.admin') }}"><i data-feather="mail"></i><span>Trainer List</span></a></li>
                <li><a href="{{ route('trainer.preprotest') }}"><i data-feather="mail"></i><span>Batch/Course Pre/post Test </span></a></li>

                @else
                    <li><a href="{{ route('training') }}"> <i data-feather="layout"></i><span>Total Training</span></a></li>
                    <li><a href="{{ route('gender') }}"><i data-feather="layout"></i> <span>Male or Female Trainee</span></a></li>
                    {{--<li><a href="{{ route('division') }}"><i data-feather="layout"></i><span> Division wise Trainee</span></a></li>--}}
                    <li><a href="{{ route('district') }}"><i data-feather="layout"></i> <span>District wise Trainee</span></a></li>
                    <li><a href="{{ route('designation') }}"><i data-feather="layout"></i> <span>Designation wise Trainee</span></a></li>
                    <li><a href="{{ route('highesttraining') }}"><i data-feather="layout"></i><span> Highest Training Receiver</span></a></li>
                    <li><a href="{{ route('participantlist') }}"><i data-feather="layout"></i><span> Trainee/Participant List </span></a></li>
                    <li><a href="{{ route('maxtrainner') }}"><i data-feather="layout"></i><span> Maximum conducted trainer</span></a></li>
                    <li><a href="{{ route('ongoingtraining') }}"><i data-feather="layout"></i> <span>Ongoing training</span></a></li>


                    @endrole



                <li class="menu-divider mg-y-20-force"></li>


            </ul>
        </div>
    </div>
    <!--/ Sidebar Menu End -->
    <!--================================-->
    <!-- Sidebar Footer Start -->
    <!--================================-->
    <div class="sidebar-footer">
        <a class="pull-left" href="page-profile.html" data-toggle="tooltip" data-placement="top" data-original-title="Profile">
            <i data-feather="user" class="ht-15"></i></a>
        <a class="pull-left " href="mailbox.html" data-toggle="tooltip" data-placement="top" data-original-title="Mailbox">
            <i data-feather="mail" class="ht-15"></i></a>
        <a class="pull-left" href="page-unlock.html" data-toggle="tooltip" data-placement="top" data-original-title="Lockscreen">
            <i data-feather="lock" class="ht-15"></i></a>
        <a class="pull-left" href="page-singin.html" data-toggle="tooltip" data-placement="top" data-original-title="Sing Out">
            <i data-feather="log-out" class="ht-15"></i></a>
    </div>
    <!--/ Sidebar Footer End -->
</div>
