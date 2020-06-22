<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="span3">
                <div class="sidebar">
                    <ul class="widget widget-menu unstyled">
                        <li class="active"><a href="{{url('/')}}"><i class="menu-icon icon-dashboard"></i>Dashboard
                        </a></li>
                         <li><a class="collapsed" data-toggle="collapse" href="#toggleQuiz"><i class="menu-icon icon-cog">
                            </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                            </i>Quiz </a>
                                <ul id="toggleQuiz" class="collapse unstyled">
                                    <li><a href="{{route('quiz.index')}}"><i class="icon-inbox"></i>Quizes </a></li>
                                    <li><a href="{{route('quiz.create')}}"><i class="icon-inbox"></i>Create Quiz </a></li>
                                </ul>
                            </li>
                        <li><a class="collapsed" data-toggle="collapse" href="#toggleQuestion"><i class="menu-icon icon-cog">
                        </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                        </i>Question </a>
                            <ul id="toggleQuestion" class="collapse unstyled">
                                <li><a href="{{route('question.index')}}"><i class="icon-inbox"></i>Questions </a></li>
                                <li><a href="{{route('question.create')}}"><i class="icon-inbox"></i>Create Question </a></li>
                         </ul>
                        </li>
                        <li><a class="collapsed" data-toggle="collapse" href="#toggleUsers"><i class="menu-icon icon-cog">
                        </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                        </i>Users </a>
                            <ul id="toggleUsers" class="collapse unstyled">
                                <li><a href="{{route('user.index')}}"><i class="icon-inbox"></i>All Users </a></li>
                                <li><a href="{{route('user.create')}}"><i class="icon-inbox"></i>Create User </a></li>
                         </ul>
                        </li>
                        <li><a class="collapsed" data-toggle="collapse" href="#toggleExam"><i class="menu-icon icon-cog">
                        </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                        </i>Exams </a>
                            <ul id="toggleExam" class="collapse unstyled">
                                <li><a href="{{route('view.exam')}}"><i class="icon-inbox"></i>View Exam </a></li>
                                <li><a href="{{route('exam.create')}}"><i class="icon-inbox"></i>Create Exam </a></li>
                            </ul>
                        </li>
                        <li class="active"><a href="{{url('/results')}}"><i class="menu-icon icon-eye-open"></i>View Result</a></li>
                       
                        
                     </ul>
                     <ul class="widget widget-menu unstyled">
                       
                        <li>
                             <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="menu-icon icon-signout"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>
                    </ul>
                    <!--/.widget-nav-->
                   
                </div>
                <!--/.sidebar-->
            </div>
            <!--/.span3-->