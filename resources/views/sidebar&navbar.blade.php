<!DOCTYPE html>
<html>
<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>

    <!-- Start Sidebar -->
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-logo" id="sidebar-logo">
                <a href="dashboard.html">
                    <div class="row">
                        <i class="fas fa-laptop-medical"></i>
                        <h3>{{__('messages.pharmacy')}}</h3>
                    </div>
                </a>
            </div>

            <div class="user-info">
                <div class="row">
                    <div class="user-img">
                        <img src="{{asset('img/user3.jpg')}}">
                    </div>
                    <div>
                   <p class="user-name">{{auth()->guard('web')->user()->name}}</p>
                        <p class="user-email">{{auth()->guard('web')->user()->email}}</p>
                    </div>
                </div>
            </div>

            <div class="accordion" id="accordionExample">

                <div class="card dashboard">
                    <div class="card-header">
                        <h2>
                            <button class="btn btn-link btn-block text-left" type="button">
                                <a href="/dashboard" class="icon-home"><i class="fa fa-fw fa-home"></i><span style="margin-left: 2px;">{{__('messages.dashboard')}}</span></a>
                            </button>
                        </h2>
                    </div>
                </div>

                <div class="card medicine">
                    <div class="card-header" id="headingThree">
                        <h2>
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <a class="option-name"><i class="fas fa-capsules"></i><span style="margin-left:4px;">{{__('messages.medicine')}}</span></a>
                            </button>
                        </h2>
                    </div>
            
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li><a href="/category/create">{{__('messages.add_category')}}</a></li>
                                <li><a href="/category/all">{{__('messages.category_list')}}</a></li>
                                <li><a href="/type/create">{{__('messages.add_type')}}</a></li>
                                <li><a href="/type/all">{{__('messages.type_list')}}</a></li>
                                <li><a href="/age-group/create">{{__('messages.add_age_group')}}</a></li>
                                <li><a href="/age-group/all">{{__('messages.age_group_list')}}</a></li>
                                <li><a href="/effective-material/create">{{__('messages.add_effective_material')}}</a></li>
                                <li><a href="/effective-material/all">{{__('messages.effective_material_list')}}</a></li>
                                <li><a href="/medicine/create">{{__('messages.add_medicine')}}</a></li>
                                <li><a href="/medicine/all">{{__('messages.medicine_list')}}</a></li>
                                
                                @if(auth()->guard('web')->user()->hasRole('Pharmacy Employee'))
                                <li><a href="/medicine/all-in-pharmacy">{{__('messages.medicine_list_in_pharmacy')}}</a></li>
                                @endif

                                @if(auth()->guard('web')->user()->hasRole('Inventory Employee'))
                                <li><a href="/medicine/all-in-inventory">{{__('messages.medicine_list_in_inventory')}}</a></li>
                                @endif
            
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card medical-food">
                    <div class="card-header" id="headingFour">
                        <h2>
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <a class="option-name"><i class="fas fa-seedling"></i><span style="margin-left: 6px">{{__('messages.medical_food')}}</span></a>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li><a href="/medical-food/create">{{__('messages.add_food')}}</a></li>
                                <li><a href="/medical-food/all">{{__('messages.food_list')}}</a></li>

                                @if(auth()->guard('web')->user()->hasRole('Pharmacy Employee'))
                                <li><a href="/medical-food/all-in-pharmacy">{{__('messages.food_list_in_pharmacy')}}</a></li>
                                @endif

                                @if(auth()->guard('web')->user()->hasRole('Inventory Employee'))
                                <li><a href="/medical-food/all-in-inventory">{{__('messages.food_list_in_inventory')}}</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card cosmetics">
                    <div class="card-header" id="headingFive">
                        <h2>
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <a class="option-name"><i class="fa fa-sun-o"></i><span style="margin-left: 5px">{{__('messages.cosmetic')}}</span></a>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li><a href="/cosmetic-product/create">{{__('messages.add_cosmetic')}}</a></li>
                                <li><a href="/cosmetic-product/all">{{__('messages.cosmetic_list')}}</a></li>

                                @if(auth()->guard('web')->user()->hasRole('Pharmacy Employee'))
                                <li><a href="/cosmetic-product/all-in-pharmacy">{{__('messages.cosmetic_list_in_pharmacy')}}</a></li>
                                @endif

                                @if(auth()->guard('web')->user()->hasRole('Inventory Employee'))
                                <li><a href="/cosmetic-product/all-in-inventory">{{__('messages.cosmetic_list_in_inventory')}}</a></li>
                                @endif
                                
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card medical-supplies">
                    <div class="card-header" id="headingSix">
                        <h2>
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                <a class="option-name"><i class="fa fa-thermometer-2" style="margin-left: 5px;"></i><span style="margin-left: 10px;">{{__('messages.supply')}}</span></a>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li><a href="/medical-supply/create">{{__('messages.add_supply')}}</a></li>
                                <li><a href="/medical-supply/all">{{__('messages.supply_list')}}</a></li>

                                @if(auth()->guard('web')->user()->hasRole('Pharmacy Employee'))
                                <li><a href="/medical-supply/all-in-pharmacy">{{__('messages.supply_list_in_pharmacy')}}</a></li>
                                @endif

                                @if(auth()->guard('web')->user()->hasRole('Inventory Employee'))
                                <li><a href="/medical-supply/all-in-inventory">{{__('messages.supply_list_in_inventory')}}</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="card branch">
                    <div class="card-header" id="headingThirteen">
                        <h2>
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                                <a class="option-name"><i class="fas fa-code-branch" aria-hidden="true" style="margin-left: 6px;"></i><span style="margin-left: 4px;">{{__('messages.branch')}}</span></a>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>

                                @if(auth()->guard('web')->user()->hasRole('Admin'))
                                <li><a href="/location/add">{{__('messages.add_location')}}</a></li>
                                <li><a href="/location/all">{{__('messages.location_list')}}</a></li>
                                <li><a href="/branch/add">{{__('messages.add_branch')}}</a></li>
                                @endif

                                <li><a href="/branch/all">{{__('messages.all_branch')}}</a></li>
                                <li><a href="/pharmacy/all">{{__('messages.pharmacy_list')}}</a></li>
                                <li><a href="/inventory/all">{{__('messages.inventory_list')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="card user">
                    <div class="card-header" id="headingFourteen">
                        <h2>
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                                <a class="option-name"><i class="fas fa-user-md" aria-hidden="true" style="margin-left: 3px;"></i><span style="margin-left: 5px;">{{__('messages.employee')}}</span></a>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>

                                @if(auth()->guard('web')->user()->hasRole('Admin'))
                                <li><a href="/user/create">{{__('messages.employee')}}</a></li>
                                <li><a href="/user/all">{{__('messages.employee_list')}}</a></li>
                                <li><a href="/user/pharmacies-users-list">{{__('messages.pharmacy_employee_list')}}</a></li>
                                <li><a href="/user/inventories-users-list">{{__('messages.inventory_employee_list')}}</a></li>
                                <li><a href="/user/activity-list">{{__('messages.show_all_user_avtivity')}}</a></li>
                                @endif

                                @if(auth()->guard('web')->user()->hasRole('Pharmacy Employee') || auth()->guard('web')->user()->hasRole('Inventory Employee'))
                                <li><a href="/user/all-employee-in-branch">{{__('messages.employee_list_in_branch')}}</a></li>
                                <li><a href="/user/activity-list-in-branch">{{__('messages.show_all_user_activities_in_brnach')}}</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>

                @if(auth()->guard('web')->user()->hasRole('Pharmacy Employee') || auth()->guard('web')->user()->hasRole('Admin'))
                <div class="card customer">
                    <div class="card-header" id="headingOne">
                        <h2>
                            <button class="btn btn-link btn-block text-left " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <a class="option-name"><i class="fas fa-users"></i><span style="margin-left: 1px;">{{__('messages.customer')}}</span></a>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li><a href="/customer/all">{{__('messages.customer_list')}}</a></li>
                                <li><a href="/customer/have-reckone">{{__('messages.all_customers_who_have_debts')}}</a></li>

                                @if(auth()->guard('web')->user()->hasRole('Pharmacy Employee'))
                                <li><a href="/customer/add">{{__('messages.add_customer')}}</a></li>
                                <li><a href="/customer/all-in-pharmacy">{{__('messages.customer_list_in_pharmacy')}}</a></li>
                                <li><a href="/customer/have-reckone-in-pharmacy">{{__('messages.customers_who_have_debts_in_pharamcy')}}</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                @if(auth()->guard('web')->user()->hasRole('Pharmacy Employee') || auth()->guard('web')->user()->hasRole('Admin'))
                <div class="card invoice">
                    <div class="card-header" id="headingTen">
                        <h2>
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                <a class="option-name"><i class="fas fa-hand-holding-usd mr-2"></i><span style="margin-left: 23px;">{{__('messages.pharmacy_invoice')}}</span></a>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>

                                @if(auth()->guard('web')->user()->hasRole('Pharmacy Employee'))
                                <li><a href="/invoice/add">Add Invoice</a></li>
                                <li><a href="/invoice/all-in-pharmacy/list">{{__('messages.invoice_list_in_pharmacy')}}</a></li>
                                @endif

                                @if(auth()->guard('web')->user()->hasRole('Admin'))
                                <li><a href="/invoice/all/list">{{__('messages.invoice_list')}}</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                @if(auth()->guard('web')->user()->hasRole('Pharmacy Employee') || auth()->guard('web')->user()->hasRole('Admin'))
                <div class="card reckoning">
                    <div class="card-header" id="headingTwelve">
                        <h2>
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                <a class="option-name"><i class="fa fa-money"></i><span>Reckonings</span></a>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>

                                @if(auth()->guard('web')->user()->hasRole('Admin'))
                                <li><a href="/invoice/reckons/all">All Debt Invoices</a></li>
                                <li><a href="/invoice/repayments/all">All Repayment</a></li>
                                @endif

                                @if(auth()->guard('web')->user()->hasRole('Pharmacy Employee'))
                                <li><a href="/invoice/reckons/all-in-pharmacy">Debt Invoices List In Pharmacy</a></li>
                                <li><a href="/invoice/repayments/all-in-pharamcy">Repayment List In Pharmacy</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                @if(auth()->guard('web')->user()->hasRole('Pharmacy Employee') || auth()->guard('web')->user()->hasRole('Admin'))
                <div class="card return">
                    <div class="card-header" id="headingEleven">
                        <h2>
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                <a class="option-name"><i class="fa fa-retweet"></i><span>Return</span></a>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>

                                @if(auth()->guard('web')->user()->hasRole('Admin'))
                                <li><a href="/return-invoice/all/list">All Return Invoices</a></li>
                                @endif

                                @if(auth()->guard('web')->user()->hasRole('Pharmacy Employee'))
                                <li><a href="/return-invoice/all-in-pharmacy/list">Return Invoices List In Pharmacy</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                @if(auth()->guard('web')->user()->hasRole('Inventory Employee') || auth()->guard('web')->user()->hasRole('Admin'))
                <div class="card warehouse">
                    <div class="card-header" id="headingTwo">
                        <h2>
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <a class="option-name"><i class="fas fa-user-tie" style="margin-left: 3px"></i><span style="margin-left: 5px;">Warehouse</span></a>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li><a href="/warehouse/all">All Warehouse</a></li>

                                @if(auth()->guard('web')->user()->hasRole('Inventory Employee'))
                                <li><a href="/warehouse/add">Add Warehouse</a></li>
                                <li><a href="/warehouse/all-in-inventory">Warehouse List In Inventory</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                @if(auth()->guard('web')->user()->hasRole('Inventory Employee') || auth()->guard('web')->user()->hasRole('Admin'))
                <div class="card inventory">
                    <div class="card-header" id="headingEight">
                        <h2>
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                <a class="option-name"><i class="fas fa-warehouse" style="margin-right: 22px;"></i><span style="margin-left: 3px;">Inventory Invoice</span></a>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>

                                @if(auth()->guard('web')->user()->hasRole('Admin'))
                                <li><a href="/order/all">All Order</a></li>
                                <li><a href="/buy-bill/all">All Buy Bill</a></li>
                                @endif

                                @if(auth()->guard('web')->user()->hasRole('Inventory Employee'))
                                <li><a href="/order/all-in-inventory">Order List In Inventory</a></li>
                                <li><a href="/buy-bill/all-in-inventory">Buy Bill List In Inventory</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                @if(auth()->guard('web')->user()->hasRole('Inventory Employee'))
                <div class="card purchase">
                    <div class="card-header" id="headingSeven">
                        <h2>
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                <a class="option-name"><i class="fas fa-shopping-cart" style="margin-right: 22px;"></i> <span style="margin-left: 6px">Purchase</span></a>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li><a href="/order/add">Add Order To Warehouse</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
                
                <div class="card products-report">
                    <div class="card-header" id="headingSixteen">
                        <h2>
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSixteen" aria-expanded="false" aria-controls="collapseSixteen">
                                <a class="option-name"><i class="fas fa-file-medical" aria-hidden="true" style="margin-left: 5px;"></i><span style="margin-left: 5px;">{{__('messages.Products_Report')}}
                                    {{__('messages.')}}</span></a>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSixteen" class="collapse" aria-labelledby="headingSixteen"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>

                                @if(auth()->guard('web')->user()->hasRole('Pharmacy Employee'))
                                <li><a href="/report/medicine-amount">Available Medicine{{__('messages.')}}</a></li>
                                <li><a href="/report/medical-food-amount">Available Medical Food{{__('messages.')}}</a></li>
                                <li><a href="/report/medical-supply-amount">Available Medical Supply{{__('messages.')}}</a></li>
                                <li><a href="/report/cosmetic-product-amount">Available Cosmetics{{__('messages.')}}</a></li>
                                <li><a href="/report/medicine-expired">Medicine Expiration{{__('messages.')}}</a></li>
                                <li><a href="/report/medical-food-expired">Medical Food Expiration{{__('messages.')}}</a></li>
                                <li><a href="/report/cosmetic-product-expired">Cosmetic Products Expiration{{__('messages.')}}</a></li>
                                <li><a href="/report/medicine-out-of-stock">Medicine Out Of Stock{{__('messages.')}}</a></li>
                                <li><a href="/report/medical-food-out-of-stock">Medical Food Out Of Stock{{__('messages.')}}</a></li>
                                <li><a href="/report/medical-supply-out-of-stock">Medical Supply Out Of Stock{{__('messages.')}}</a></li>
                                <li><a href="/report/cosmetic-product-out-of-stock">Cosmetic Products Out Of Stock{{__('messages.')}}</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card report">
                    <div class="card-header" id="headingFiveteen">
                        <h2>
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFiveteen" aria-expanded="false" aria-controls="collapseFiveteen">
                                <a class="option-name"><i class="fa fa-file-text-o" aria-hidden="true" style="margin-left: 5px;"></i><span style="margin-left: 5px;">Report</span></a>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseFiveteen" class="collapse" aria-labelledby="headingFiveteen" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>

                                @if(auth()->guard('web')->user()->hasRole('Pharmacy Employee'))
                                <li><a href="/invoice/all-in-pharmacy/report">Invoice Report</a></li>
                                <li><a href="/return-invoice/all-in-pharmacy/report">Return Invoice Report</a></li>
                                @endif

                                @if(auth()->guard('web')->user()->hasRole('Admin'))
                                <li><a href="/invoice/all/report">Invoice Report</a></li>
                                <li><a href="/return-invoice/all/report">Return Invoice Report</a></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>                
               
                <div class="card application-setting">
                    <div class="card-header" id="headingSeventeen">
                        <h2>
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseSeventeen" aria-expanded="false" aria-controls="collapseSeventeen">
                                <a class="option-name"><i class="fa fa-cog" aria-hidden="true" style="margin-left: 3px;"></i><span style="margin-left: 2px;">Application Setting</span></a>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseSeventeen" class="collapse" aria-labelledby="headingSeventeen" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul>
                                <li><a href="/mail/write-mail">Send Email</a></li>
                            </ul>
                            <ul>
                                <li><a href="/themes">Themes</a></li>
                            </ul>
                            <ul>
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li>
                                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- End Sidebar -->

    <!-- Start Navbar -->
    <div id="navbar">
        <nav class="navbar navbar-expand navbar-light ">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav mr-auto">
                    <a href="#" class="btn btn-lg " id="sidebarCollapse">
                        <span class="glyphicon glyphicon-align-left"></span>
                    </a>
                </div>
                <div class="row">
                    <div class="dropdown d-flex notification" style="margin-left: auto;" id="notification">
                        <a role="button" data-toggle="dropdown" data-target="#" href="">
                            <i class="fas fa-bell"></i>
                            <span class="badge">{{count(auth()->user()->unreadnotifications)}}</span>
                        </a>

                        <ul class="dropdown-menu notifications" role="menu" aria-labelledby="dLabel">
                            <div class="notification-heading">
                                <h4 class="menu-title">NOTIFICATIONS</h4>
                                <h4 class="menu-title pull-right">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4>
                            </div>
                            <li class="divider"></li>
                            <div class="notifications-wrapper">
                                
                                @if (auth()->guard('web')->user()->hasRole('Pharmacy Employee'))
                                <?php $chick =  new \App\Http\Controllers\Notification\NotificationController()?>
                                <?php $chick->amountOutOfStock() ?>
                                <?php $chick->expiredDate() ?>
                                @endif
                                
                                @forelse(auth()->user()->unreadnotifications as $notification)
                                    @if($notification->type == 'App\Notifications\ExpiredDateNotification')
                                        <a class="content" href="{{url('/notification/show-expired-notification/'.$notification->data['batch_id'].'/'.$notification->id)}}">
                                            <div class="notification-item">
                                                <div class="row">
                                                    <div class="clock">
                                                        <i class="fas fa-hourglass-end"></i>
                                                    </div>
                                                    <div>
                                                        <h4 class="item-title">{{$notification->data['title']}}</h4>
                                                        <p class="item-info">{{$notification->created_at}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <li class="divider"></li>
                                    @else
                                        <a class="content" href="{{url('/notification/show-amount-notification/'.$notification->data['batch_id'].'/'.$notification->id)}}">
                                            <div class="notification-item">
                                                <div class="row">
                                                    <div class="battery">
                                                        <i class="fas fa-battery-quarter"></i>
                                                    </div>
                                                    <div>
                                                        <h4 class="item-title">{{$notification->data['title']}}</h4>
                                                        <p class="item-info">{{$notification->created_at}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <li class="divider"></li>
                                    @endif
                                @empty
                                    <a class="dropdown-item">No Notification</a>
                                @endforelse
                            </div>
                            <li class="divider"></li>
                            <div class="notification-footer">
                                <h4 class="menu-title">View all<i class="glyphicon glyphicon-circle-arrow-right"></i></h4>
                            </div>
                        </ul>
                    </div>

                    <div class="user dropdown d-flex" id="user">
                        <a role="button" data-toggle="dropdown" data-target="#" href="">
                            <i class="fas fa-user"></i>
                        </a>
                        <ul class="dropdown-menu user-profile" role="menu" aria-labelledby="dLabel">
                            <div class="user-heading">
                                <div><img src="{{asset('img/user3.jpg')}}" class="user-img2"></div>
                                <div class="user-name2">{{auth()->guard('web')->user()->name}}</div>
                                <div class="user-email2">{{auth()->guard('web')->user()->email}}</div>
                            </div>
                            <div class="user-wrapper">
                                <a class="content a-user dropdown-item" href="/user/info" id="a-user">
                                    <div class="drop-item">
                                        <div class="row row-user" style="margin-bottom: -2px;">
                                            <div>
                                                <i class="	fa fa-user-o" id="fa-user" style="margin-top: 1px"></i>
                                            </div>
                                            <div class="p-user">
                                                <p>My Profile</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <li class="divider"></li>
                                <a class="content a-edit dropdown-item" href="/user/edit" id="a-user">
                                    <div class="drop-item">
                                        <div class="row row-user" style="margin-top: 5px">
                                            <div class="">
                                                <i class="fas fa-edit" id="fa-edit"></i>
                                            </div>
                                            <div class="p-user">
                                                <p>Edit Profile</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <li class="divider"></li>
                                <a class="content a-sign dropdown-item" href="/logout_user" id="a-user">
                                    <div class="drop-item">
                                        <div class="row row-user" style="margin-top: 5px">
                                            <div class="">
                                                <i class="fa fa-sign-out" id="fa-sign"></i>
                                            </div>
                                            <div class="p-user">
                                                <p>Sign Out</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- End Navbar -->
</body>
</html>
