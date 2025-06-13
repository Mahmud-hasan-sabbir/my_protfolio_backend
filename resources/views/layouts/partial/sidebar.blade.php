    <!--**********************************
                Sidebar start
    ***********************************-->
    <div class="deznav scrollbar">
        {{-- <div class=""> --}}
            <div class="main-profile">
                <div class="image-bx">
                    <img src="{{asset('public')}}/images/profile/{{ Auth::user()->profile_photo_path }}" alt="">
                    <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
                </div>
                <h5 class="name">{{ Auth::user()->name }}</h5>
                <p class="email"><a href="mailto:<nowiki>{{ Auth::user()->email }}">[{{ Auth::user()->email }}]</a></p>
            </div>
            <ul class="metismenu" id="menu">
                <li class="nav-label first">Main Menu</li>
                <li><a href="{{route('dashboard')}}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-144-layout"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>



                <li><a  class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">

                    <i class="fa fa-blind" aria-hidden="true"></i>
                    <span class="nav-text"> page section</span>
                </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('homepage') }}">Home Page</a></li>
                        <li><a href="{{ route('aboutsection') }}">About Section</a></li>
                        <li><a href="{{ route('blogsection') }}">Blog Section</a></li>
                        <li><a href="{{ route('educationsection') }}">Education Section</a></li>
                        <li><a href="{{ route('personalinfo') }}">Personal Info</a></li>
                        <li><a href="{{ route('protfolio') }}">Protfolio</a></li>
                        <li><a href="{{ route('service') }}">Service</a></li>
                        <li><a href="{{ route('skill') }}">Skill</a></li>
                        <li><a href="{{ route('testimonia') }}">Testimonia</a></li>
                        <li><a href="{{ route('exprience') }}">Working Exprience</a></li>
                        <li><a href="{{ route('project') }}">Working Project</a></li>


                    </ul>
                </li>
                 {{-- <li><a  class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">

                    <i class="fa fa-blind" aria-hidden="true"></i>
                    <span class="nav-text">All Report</span>
                </a>
                    <ul aria-expanded="false">
                        <li><a href="">Sales Report</a></li>
                        <li><a href="">Sales Against Profit</a></li>
                        <li><a href="">Expense Report</a></li>
                        <li><a href="">Due Payment Report</a></li>

                    </ul>
                </li> --}}




                {{-- <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-home"></i>
                        <span class="nav-text">Inventory</span>
                    </a>
                    <ul aria-expanded="false">

                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Product</a>
                            <ul aria-expanded="false">
                                <li><a href="">Product</a></li>
                                <li><a href="">Product Approve List</a></li>
                                <li><a href="">Product Export And Import</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Data Setting</a>
                            <ul aria-expanded="false">

                                <li><a href="">Category</a></li>
                                <li><a href="">Units setting</a></li>
                            </ul>
                        </li>

                    </ul>
                </li>
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        <span class="nav-text">Data Setting</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a class="has-arrow" href="javascript:void()">Supplier</a>
                            <ul aria-expanded="false">
                                <li><a href="">Supplier</a></li>
                            </ul>
                        </li>
                        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Customer</a>
                            <ul aria-expanded="false">
                                <li><a href="">Customer</a></li>
                            </ul>
                        </li>




                    </ul>
                </li> --}}




            </ul>
            <div class="copyright">
                <div class="image-bx apps_install">
                    <a href=""><img src="{{asset('public')}}/images/icon-android.png" style="width:60%;" alt=""></a>
                </div>
                <p><strong>My-Protfolio</strong> © 2025 All Rights Reserved</p>
                <p class="fs-12">Made with <span class="heart"></span> by Goal Craft It</p>
                {{-- <style>
                    @media only screen and (max-width: 767px) {
                        .apps_install {
                            display: none;
                        }
                    }
                </style> --}}


            </div>
        {{-- </div> --}}
    </div>
    <!--**********************************
                Sidebar end
    ***********************************-->
