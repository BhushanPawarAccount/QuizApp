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
                     </ul>
                    <!--/.widget-nav-->
                   
                </div>
                <!--/.sidebar-->
            </div>
            <!--/.span3-->