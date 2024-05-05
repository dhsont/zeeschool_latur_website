<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone">
                </div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <form class="sidebar-search" action="#" method="POST">
                    <div class="form-container">
                        <div class="input-box">
                            <a href="javascript:;" class="remove"></a>
                            <input type="text" placeholder="Search..."/>
                            <input type="button" class="submit" value=" "/>
                        </div>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            @if($adminAccess)
            <li class="start ">
                <a href="/myadmin"><i class="fa fa-home"></i><span class="title">Dashboard</span></a>
            </li>


           {{--

           @include('admin.layouts.partials.sidemenu',['title'=>'Users', 'segment'=>'users',
                            $links = ['All Users'=> '/myadmin/users',
                                        'Create User'=> '/myadmin/register' ]]);--}}
   {{--
          @include('admin.layouts.partials.sidemenu',['title'=>'Menus', 'segment'=>'menu',
                           $links = ['All Menus'=> '/myadmin/menus',
                                       'Create Menu'=> '/myadmin/menus/create' ]])


wew--}}
            @include('admin.layouts.partials.sidemenu',['title'=>'News', 'segment'=>'news',
                        $links = ['Add News'=> '/myadmin/news/create',
                                    'News'=> '/myadmin/news' ]])

                @include('admin.layouts.partials.sidemenu',['title'=>'Pages', 'segment'=>'pages',
                            $links = ['Add Pages'=> '/myadmin/pages/create',
                                        'All Pages'=> '/myadmin/pages' ]])

                @include('admin.layouts.partials.sidemenu',['title'=>'Staff', 'segment'=>'staff',
                                            $links = ['All Staff'=> '/myadmin/staff',
                                                        'Create Staff'=> '/myadmin/staff/create' ]])


                @include('admin.layouts.partials.sidemenu',['title'=>'Faq\'s', 'segment'=>'faqs',
                                            $links = ['All Faq\'s'=> '/myadmin/faqs',
                                                        'Create Faq\'s'=> '/myadmin/faqs/create' ]])





            <li >
                <a href="/myadmin/contacts">Contact Us
                </a>
            </li>

                @include('admin.layouts.partials.sidemenu',['title'=>'Resumes', 'segment'=>'resumes',
                                                               $links = ['All Resumes'=> '/myadmin/resumes' ]])


                @include('admin.layouts.partials.sidemenu',['title'=>'Photo Gallery', 'segment'=>'palbums',
                                                                          $links = ['All Albums'=> '/myadmin/palbums',
                                                                                      'Create Album'=> '/myadmin/palbums/create',

                                                                                       'All Categories'=> '/myadmin/pcategories',
                                                                                      'Create category'=> '/myadmin/pcategories/create' ]])


                @include('admin.layouts.partials.sidemenu',['title'=>'Video Gallery', 'segment'=>'menu',
                                                            $links = ['All Videos'=> '/myadmin/valbums',
                                                                        'Add Video'=> '/myadmin/valbums/create',

                                                                         'All Categories'=> '/myadmin/vcategories',
                                                                        'Create category'=> '/myadmin/vcategories/create' ]])

                @include('admin.layouts.partials.sidemenu',['title'=>'Feedback', 'segment'=>'feedbacks',
                                                                 $links = ['All Feedback'=> '/myadmin/feedbacks' ]])

            @endif
            <li class=" @if(Request::segment(2)=='pages') active  @endif ">
                <a href="javascript:;">
                    <i class="fa fa-download"></i>
                        <span class="title">Downloads</span>
                        <span class="selected"></span>
                        <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li> <a href="/myadmin/books">Download files</a></li>

                    <li> <a href="/myadmin/books/create"> Add File to download</a></li>

                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>