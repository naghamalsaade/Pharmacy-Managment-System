<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css2/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css2/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css2/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css2/style_eman.css')}}">
    <script src="{{asset('js2/jquery.min.js')}}"></script>
    <script src="{{asset('js2/popper.min.js')}}"></script>
    <script src="{{asset('js2/bootstrap.min.js')}}"></script>
    <link rel="icon" href="{{asset('img2/logo.png')}}" sizes="16x16 32x32" type="image/png">
   <script >
      
window.onload = function () {
	CanvasJS.addColorSet("greenShades",
                [//colorSet Array
					"#17a2b8",
                 "#933EC5",
                "#65b12d"
				
                               
                ]);
CanvasJS.addColorSet("greenShades0",
                [//colorSet Array
					"#65b12d"
                
				
                               
                ]);

CanvasJS.addColorSet("greenShades1",
                [//colorSet Array
					"#17a2b8",
                 "#ca1919"             
                ]);		
CanvasJS.addColorSet("greenShades2",
                [//colorSet Array
					"#17a2b8",
					"#933EC5"
				              
                ]);	
CanvasJS.addColorSet("greenShades3",
                [//colorSet Array
					"#17a2b8",
				     "#FFFFFF"      
                ]);
CanvasJS.addColorSet("greenShades4",
                [//colorSet Array
					
					"#933EC5",
					"#FFFFFF"
				            
                ]);
CanvasJS.addColorSet("greenShades5",
                [//colorSet Array
					
				   "#65b12d",
				   "#FFFFFF"
                           
                ]);
CanvasJS.addColorSet("greenShades6",
                [//colorSet Array
					
                 "#ca1919" ,
				 "#FFFFFF"            
                ]);
				
				
 var chart1 = new CanvasJS.Chart("Annual", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", 
	colorSet: "greenShades",
	axisY: {
		title: "SP : Syrian Pound",
	},

	data: [{
		type: "spline",
		yValueFormatString: "#,##0.0  #\" SP\"",
		dataPoints: [ 
		@foreach($months as $value)

         { y: {{$value->total}}, label: "{{$value->month}}" },
                      @endforeach        
			// { y: 100, label: "January" },
			// { y: 90,  label: "February" },
			// { y: 100,  label: "March" },
			// { y: 400,  label: "April" },
			// { y: 5000,  label: "May" },
			// { y: 600, label: "June" },
			// { y: 7000,  label: "July" },
			// { y: 800,  label: "August" },
   //          { y: 100,  label: "September" },
   //          { y: 100,  label: "October" },
   //          { y: 1100,  label: "November" },
   //          { y: 20,  label: "December" }
		]
	},
	{
		type: "spline",
		yValueFormatString: "#,##0.0  #\" Pice\"",
		
		dataPoints: [ 
		@foreach($months as $value)

         { y: {{$value->totalCount}}, label: "{{$value->month}}" },
                      @endforeach        
			// { y: 3000, label: "January" },
			// { y: 5000,  label: "February" },
			// { y: 200,  label: "March" },
			// { y: 700,  label: "April" },
			// { y: 400,  label: "May" },
			// { y: 3, label: "June" },
			// { y: 200,  label: "July" },
			// { y: 100,  label: "August" },
   //          { y: 4000,  label: "September" },
   //          { y: 1000,  label: "October" },
   //          { y: 1100,  label: "November" },
   //          { y: 200,  label: "December" }
 
		]
	},
	{
		type: "spline",
		yValueFormatString: "#,##0.0  #\" SP\"",
		
		dataPoints: [ 
		@foreach ($months as $value)

         { y: {{$value->totalPaid}}, label: "{{$value->month}}" },
                @endforeach        
			// { y: 100, label: "January" },
			// { y: 900,  label: "February" },
			// { y: 100,  label: "March" },
			// { y: 400,  label: "April" },
			// { y: 500,  label: "May" },
			// { y: 6000, label: "June" },
			// { y: 700,  label: "July" },
			// { y: 800,  label: "August" },
   //          { y: 100,  label: "September" },
   //          { y: 1000,  label: "October" },
   //          { y: 1100,  label: "November" },
   //          { y: 200,  label: "December" }
 
		]
	}]
});
chart1.render();




var chart2 = new CanvasJS.Chart("Annual_2015_to_2021", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", 
	colorSet: "greenShades1",
	axisY: {
		title: "SP:Syrian Pound",
	
		
	},

	data: [{
		type: "splineArea",
		yValueFormatString: "#,##0.0  #\" SP\"",
		dataPoints: [      
			{ y: 100, label: "2015" },
			{ y: 900,  label: "2016" },
			{ y: 700,  label: "2017" },
            { y: 200,  label: "2018" },
            { y: 1100,  label: "2019" },
			{ y: 100,  label: "2020" },
			{ y: 400,  label: "2021" },
			{ y: 0,  label: "2022" },
			{ y: 0, label: "2023" },
			{ y: 0,  label: "2024" },
			{ y: 0,  label: "2025" },
           
		]
	},
	{
		type: "splineArea",
		yValueFormatString: "#,##0.0  #\" Pice\"",
		
		dataPoints: [      
			{ y: 170, label: "2015" },
			{ y: 130,  label: "2016" },
			{ y: 125,  label: "2017" },
            { y: 127,  label: "2018" },
            { y: 140,  label: "2019" },
			{ y: 160,  label: "2020" },
			{ y: 100,  label: "2021" },
			{ y: 0,  label: "2022" },
			{ y: 0, label: "2023" },
			{ y: 0,  label: "2024" },
			{ y: 0,  label: "2025" },
 
		]
	}]

});
chart2.render();

var chart3 = new CanvasJS.Chart("Total_products_in_all_stores", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", 
	colorSet: "greenShades",
	axisY: {
		title: "Houre",
	
		
	},

	data: [{
		type: "doughnut",
		 innerRadius:99,
		
	yValueFormatString: "#,##0.0  #\" Pices\"",
	dataPoints: [    
	@foreach ($branches as $branch)
	{ y:{{$branch->invoices()->get()->count()}}, label: "{{$branch->name}}" },
                @endforeach  

	
		
		

	]
	}]
});
chart3.render();

var chart33 = new CanvasJS.Chart("Searching_for_a_specific_drug", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", 
	colorSet: "greenShades2",
	axisY: {
		title: "Houre",
	
		
	},

	data: [{
		type: "column",
		 innerRadius:99,
		
	yValueFormatString: "#,##0.0  #\" H\"",
	dataPoints: [      
		{ y: 1000, label: "Branch_1" },
			{ y: 400, label: "Branch_2" },
			{ y: 60, label: "Branch_3" },
			{ y: 400, label: "Branch_4" },
			{ y: 200, label: "Branch_5" },
			{ y: 600, label: "Branch_6 " },
			{ y: 600, label: "Branch_7" },
			{ y: 400, label: "Branch_8" },
			{ y: 400, label: "Branch_9" },
			{ y: 100, label: "Branch_10" }
		
		

	]
	}]
});
chart33.render();
var chart5 = new CanvasJS.Chart("month", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", 
	colorSet: "greenShades",

	


	data: [{
		type: "splineArea",
		yValueFormatString: "#,##0.0  #\"SP\"",
		dataPoints: [
			{ y: {{$invoices->sum('total_due')}}, label: "Sale" },
			{ y: {{$Returninvoices->sum('total_due')}}, label: "Return" },
			{ y: {{$debts->sum('paid')}}, label: "Debt" },
			{ y: {{$users->sum('salary')}}, label: "employee salaries" }
		]
	}]
});
chart5.render();
var chart4= new CanvasJS.Chart("pie1", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", 
	colorSet: "greenShades3",
	
	data: [{
		type: "doughnut",
		innerRadius:35,
		
		
		yValueFormatString: "#,##0.0  #\"Employee\"",
		dataPoints: [
			{ y:{{$users->sum('id')}}, label: "" },
			{ y: 100-{{$users->sum('id')}}, label: "" },
		]
	}]
});
chart4.render();



var chart6 = new CanvasJS.Chart("pie2", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", 
	colorSet: "greenShades4",
	
	data: [{
		type: "doughnut",
		innerRadius:35,
		
		
		yValueFormatString: "#,##0.0  #\"Piece\"",
		dataPoints: [
			{ y:{{$invoices->sum('total_num')}}, label: "" },
			{ y: 10000-{{$invoices->sum('total_num')}}, label: "" },
			
		]
	}]
});
chart6.render();

var chart7 = new CanvasJS.Chart("pie3", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", 
	colorSet: "greenShades5",

	data: [{
		type: "doughnut",
		innerRadius:35,
		
		
		yValueFormatString: "#,##0.0  #\"Piece\"",
		dataPoints: [
			{ y:{{$invoices->sum('total_due')}}, label: "" },
			{ y: 10000-{{$invoices->sum('total_due')}}, label: "" },
			
		]
	}]
});
chart7.render();

var chart8 = new CanvasJS.Chart("pie4", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", 
	colorSet: "greenShades6",
	
	data: [{
		type: "doughnut",
		innerRadius:35,
		
		
		yValueFormatString: "#,##0.0  #\"SP\"",
		dataPoints: [
			{ y: 60, label: "" },
			{ y: 20, label: "" },
			
		]
	}]
});
chart8.render();


var chart9 = new CanvasJS.Chart("The_best_products_of_a_branch", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2", 
	colorSet: "greenShades2",

	
	axisX: {
		margin: 10,
		labelPlacement: "inside",
		tickPlacement: "inside"
	  },

	data: [{
		type: "bar",
			
		
	yValueFormatString: "#,##0.0  #\"Piece\"",
	dataPoints: [ 
		@foreach($bestProducts as $value)

         { y: {{$value->sum}}, label: "{{$value->product_name}}" },
                      @endforeach             
		// { y: 100, label: "products1" },
		// { y: 200, label: "products2" },
		// { y: 300, label: "products3" },
		// { y: 400, label: "products4" },
		// { y: 500, label: "products5" },
		// { y: 600, label: "products6" },
		// { y: 700, label: "products7" },
		// { y: 800, label: "products8" },
		// { y: 900, label: "products9" },
		// { y: 1000, label: "products10" },
 
		]
	}]
});
chart9.render();


	

}


 
   </script>

     <script src="{{asset('js2/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>

    <!--            search            -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list  " >
                                <div class="row" >
                                   <!--  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading" >
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i> </a> 
                                               
                                            </form>
                                        </div>
                                    </div> -->
                                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <span class="bread-blod">Admin</span>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       


        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5>Tody's income <span style="font-size: 9px;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(All Branch)</span></h5>
                                <h2>SP <span class="counter">3000</span> </h2>
                                <span class="text-success">30%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-danger-20" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:30%;"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30">
                            <div class="analytics-content">
                                <h5> this week's income<span style="font-size: 9px;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(All Branch)</span></h5>
                                <h2>SP <span class="counter">5000</span> </h2>
                                <span class="text-danger">50%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%;"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>this month's income<span style="font-size: 9px;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(All Branch)</span></h5>
                                <h2>SP <span class="counter">7000</span> </h2>
                                <span class="text-info">70%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:70%;">  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                            <div class="analytics-content">
                                <h5>this year's income<span style="font-size: 9px;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(All Branch)</span></h5>
                                <h2>SP <span class="counter">9000</span></h2>
                                <span class="text-inverse">90%</span>
                                <div class="progress m-b-0">
                                    <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:90%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Annual <span style="font-size: 9px;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(All Branch)</span></b></span>
                                           

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <ul class="list-inline cus-product-sl-rp"> 
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #17a2b8;"></i>Profit </h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #933EC5;"></i>Quantities</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #65b12d;"></i>Quantities  price</h5>
                                </li>
                            </ul>
                            <div id="Annual" style="height: 356px;"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Total Medicine <span style="font-size: 9px;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(All Branch)</span> </h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-level-up" style="color:#17a2b8" aria-hidden="true"></i> <span class="counter text-success" style="color:#17a2b8; font-size: 16px;font-weight: 900; ">1500</span></li>
                            </ul>
                        </div>
                        <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Total Medicine food <span style="font-size: 9px;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(All Branch)</span></h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right graph-two-ctn"><i class="fa fa-level-up" style="color:#933EC5" aria-hidden="true"></i> <span class="counter text-purple" style="color:#933EC5; font-size: 16px; font-weight: 900;">3000</span></li>
                            </ul>
                        </div>
                        <div class="white-box analytics-info-cs mg-b-10 res-mg-b-30 tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Total Medicine supplies <span style="font-size: 9px;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(All Branch)</span></h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right graph-three-ctn"><i class="fa fa-level-up" style="color:#65b12d" aria-hidden="true"></i> <span class="counter text-info" style="color:#65b12d; font-size: 16px;font-weight: 900;">5000</span></li>
                            </ul>
                        </div>
                        <div class="white-box analytics-info-cs table-dis-n-pro tb-sm-res-d-n dk-res-t-d-n">
                            <h3 class="box-title">Total Cosmetic products <span style="font-size: 9px;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(All Branch)</span></h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right graph-four-ctn"><i class="fa fa-level-down" style="color:#ec4445" aria-hidden="true"></i> <span class="text-danger"><span class="counter" style="color:#ec4445; font-size: 16px;font-weight: 900;">18</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      

        <div class="traffic-analysis-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject" style="font-size: 14px;"><b>User Registrations</b></span>
                                          <br>
                                          <br>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div id="pie1" style="height: 88px;"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject" style="font-size: 11.2px;"><b>Daily purchase quantity</b></span>
                                            <br>
                                           <br>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div id="pie2" style="height: 88px;"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject" style="font-size: 10px;"><b>Amount all
                                            </b></span>
                                          
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div id="pie3" style="height: 88px;"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject" style="font-size: 10px;"><b>Quantity of products almost sold out</b></span>
                                          
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div id="pie4" style="height: 88px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="library-book-area mg-t-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
                        <div class="white-box res-mg-t-30 table-mg-t-pro-n">
                            <h3  class="box-title">Daily Report <span style="font-size: 9px;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(All Branch)</span></h3>
                            <br>
                            
                            <ul class="country-state">
                                <li>
                                    <small> Sale</small>
                                    <h2><span class="counter">9000</span></h2>
                                    <div class="pull-right">90% <i class="fa fa-level-up text-danger ctn-ic-1"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger-20 ctn-vs-1" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:90%;"> </div>
                                    </div>
                                </li>
                                <li>
                                    <small>Profit</small>
                                    <h2><span class="counter">9000</span></h2>
                                    <div class="pull-right">90% <i class="fa fa-level-up text-success ctn-ic-2"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info ctn-vs-2" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:20%;"> </div>
                                    </div>
                                </li>
                                <li>
                                    <small>Return</small>
                                    <h2><span class="counter">500</span></h2> 
                                    <div class="pull-right">5% <i class="fa fa-level-down text-success ctn-ic-3"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success ctn-vs-3" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:5%;"> </div>
                                    </div>
                                </li>
                                <li>
                                    <small>Debt</small>
                                    <h2><span class="counter">1000</span></h2>
                                    <div class="pull-right">10% <i class="fa fa-level-down text-success ctn-ic-4"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success ctn-vs-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:10%;"></div>
                                    </div>
                                </li>
                                <li>
                                    <small>Less</small>
                                    <h2><span class="counter">2500</span></h2> 
                                    <div class="pull-right">25% <i class="fa fa-level-down text-success ctn-ic-5"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-inverse ctn-vs-5" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:25%;"> </div>
                                    </div>
                                </li>
                            </ul>
                        </div> 
                        
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="single-review-st-item res-mg-t-30 table-mg-t-pro-n">
                            <div class="single-review-st-hd">
                                <h2>Leader of Branch </h2>
                            </div>

                            @foreach($AdminUsers as $one)
                            <div class="single-review-st-text">
                                <img src="{{asset('img2/notification/1.jpg')}}" alt="">
                                <div class="review-ctn-hf">
                                    <h3>{{$one->name}}</h3>
                                </div>
                                <div class="review-item-rating">
                                    <span class="pull-right label-purple label-7 label">9 Houre</span>
                                </div>
                            </div>
                            @endforeach
                   
                    
                    
                       
                        
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject" style="font-size: 14px;"><b>
                                            	Total Invoices in Each Branch

                                            </b></span>
                                        <br>
                                        <br>
                                        <br>
                                        </div>
                                    </div>
                                    
                                </div>
                             </div>
                           
                            <div id="Total_products_in_all_stores" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Month Report</b></span>
                                          
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <ul class="list-inline cus-product-sl-rp">
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #17a2b8;"></i>Sale </h5>
                                </li>
                             
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #65b12d;"></i>Return</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #17a2b8;"></i>Debt</h5>
                                </li>
              
                          
                                 <li>
                                    <h5><i class="fa fa-circle" style="color: #17a2b8;"></i>employee salaries</h5>
                                </li>
                            </ul>
                            <div id="month" style="height: 356px;"></div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject" style="font-size: 13px"><b> The Best products<span style="font-size: 9px;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(All Branch)</span> </b></span>
                                        </div>
                                    </div>
                                    
                                </div>
                             </div>
                             <br>
                             <br>

                            <div id="The_best_products_of_a_branch" style="height: 280px;"></div>
                        </div>
                    </div>
                </div>






                
            </div>
        </div>
        <div class="courses-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Best Stores</h3>
                            <ul class="basic-list">
                                <li>Store_1 <span class="pull-right  label-1 label" style="background-color:#17a2b8">95.8%</span></li>
                                <li>Store_2 <span class="pull-right label-purple label-2 label">85.8%</span></li>
                                <li>Store_3 <span class="pull-right label-success label-3 label">55.8%</span></li>
                                <li>Store_4 <span class="pull-right label-info label-4 label">40.8%</span></li>
                                <li>Store_5 <span class="pull-right label-warning label-5 label">30.8%</span></li>
                                <li>Store_6 <span class="pull-right label-purple label-6 label">20.8%</span></li>
                                <li>Store_7 <span class="pull-right label-purple label-7 label">20.8%</span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Annual 2015 to 2025</b></span>
                                        </div>
                                    </div>
                                    
                                </div>
                             </div>
                             <br>
                             <ul class="list-inline cus-product-sl-rp">
                                     <li>
                                        <h5><i class="fa fa-circle" style="color: #17a2b8;"></i>Profit </h5>
                                      </li>
                                      <li>
                                        <h5><i class="fa fa-circle" style="color: #ec4445;"></i>less</h5>
                                     </li>
                                
                            </ul>
                            <br>
                            <div id="Annual_2015_to_2021" style="height: 280px;"></div>
                        </div>
                      
                        
                    </div>



                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject" style="font-size: 10px;"><b>Searching for a specific drug</b></span>
                                            <br>
                                            <br>
                                         <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i> </a> 
                                               
                                            </form>
                                        </div>
                                        <br>
                                        <br>
                                        </div>

                                    </div>
                                    
                                </div>
                             </div>
                           
                            <div id="Searching_for_a_specific_drug" style="height: 260px;"></div>
                        </div>

                </div>
            </div>
        </div>
        
      
    </div>
    <br>
   


   
    <script src="{{asset('js2/vendor/jquery-1.12.4.min.js')}}"></script>
   
    <script src="{{asset('js2/bootstrap.min.js')}}"></script>
    
    <script src="{{asset('js2/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('js2/counterup/waypoints.min.js')}}"></script>
    <script src="{{asset('js2/counterup/counterup-active.js')}}"></script>
 
    <script src="{{asset('js2/morrisjs/raphael-min.js')}}"></script>
    <script src="{{asset('js2/morrisjs/morris.js')}}"></script>
    <script src="{{asset('js2/morrisjs/morris-active.js')}}"></script>

    <script src="{{asset('js2/plugins.js')}}"></script>
 

    <script src="{{asset('js2/canvasjs.min.js')}}"></script>
<!--     <script src="{{asset('js2/main.js')}}"></script>
 --></body>

</html>