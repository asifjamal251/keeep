 <!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>Admin | @yield('title','Dashboard')</title>
  <link href="{{asset(App\Model\SiteSetting::latest()->value('favicon'))}}" rel="icon">
  <link href="{{asset(App\Model\SiteSetting::latest()->value('favicon'))}}" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
  rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/vendors.css')}}">
  <!-- END VENDOR CSS-->
  <!-- BEGIN STACK CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/app.css')}}">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/style.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/vendors/css/tables/datatable/datatables.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/vendors/css/extensions/toastr.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/plugins/extensions/toastr.css')}}">
  @stack('links')
</head>
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu" data-col="2-columns">
  <!-- fixed-top-->

 @include('admin.layouts.header')
 @include('admin.layouts.aside')
  <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    @section('main')
                      @show
                </div>
            </div>
      </div>
    </div>
  </div>
@include('admin.layouts.footer')


   <script src="{{asset('admin-assets/app-assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-assets/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-assets/app-assets/js/core/app.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-assets/app-assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-assets/app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-assets/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-assets/app-assets/js/scripts/tables/datatables/datatable-advanced.js')}}" type="text/javascript"></script>
   <script src="{{asset('admin-assets/app-assets/vendors/js/extensions/toastr.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin-assets/app-assets/js/scripts/extensions/toastr.js')}}" type="text/javascript"></script>

  @if (Session::has('message'))
    <script type="text/javascript">
        Command: toastr["{{Session::get('class')}}"](" {{Session::get('message')}}")
    </script>
  @endif

  <script type="text/javascript">






    function deleteForm(url){
      if (confirm('Are you sure to delete this data')){
          var form =  document.createElement("form");
          var node = document.createElement("input");
          form.action = url;
          form.method = 'POST' ;
          node.name  = '_method';
          node.value = 'delete';
          form.appendChild(node.cloneNode());
          node.name  = '_token';
          node.value = '{{ csrf_token() }}';
          form.appendChild(node.cloneNode());
          form.style.display = "none";
          document.body.appendChild(form);
          form.submit();
          document.body.removeChild(form);
      }
    }


    function deleteAjax(url,callback=null){  
    if (confirm('Are you sure to delete this data')){                      
        $.ajax({
            url:url,
            method: 'post',
            data:{'_method':'DELETE','_token':'{{ csrf_token() }}'},
            dataType:'json',
            success:function(response){
                if(response.class){
                    Command: toastr[response.class](response.message);

                }
                if(typeof callback == 'function'){
                    callback(response);
                }
                if(document.getElementsByClassName('dataTableAjax').length){
                    $('#dataTableAjax').DataTable().draw();
                }

                else if(document.getElementsByID('dataTableAjax').length){
                    $('#dataTableAjax').DataTable().draw();
                }

                else if(document.getElementsByClassName('datatable').length){
                    $('.datatable').DataTable().draw();
                }

                
                else{
                     setTimeout(function(){
                        window.location.reload();
                    }, 300)
                }
            }
        });
    }
    return false;
}










function updateData(url,data={},callback=null){  
//console.log(data)
    if (confirm('Are you sure to perform this action')){                      
        $.ajax({
            url:url,
            method: 'post',
            data:Object.assign({'_method':'PUT','_token':'{{ csrf_token() }}'},data),
            dataType:'json',
            success:function(response){
                if(response.class){
                    $('.tooltip').remove();
                    Command: toastr[response.class](response.message);

                }
                if(typeof callback == 'function'){
                    callback(response);
                }
                if(document.getElementsByClassName('dataTableAjax').length){
                    $('.tooltip').remove();
                    $('.dataTableAjax').DataTable().draw('page');
                }

                else if(document.getElementsById('dataTableAjax').length){
                    $('.tooltip').remove();
                    $('#dataTableAjax').DataTable().draw('pahe');
                }

                else if(document.getElementsByClassName('datatable').length){
                    $('.tooltip').remove();
                    $('.datatable').DataTable().draw('page');
                }

                
                else{
                     setTimeout(function(){
                        window.location.reload();
                    }, 300)
                }
            }
        });
    }
    $('.tooltip').remove();
    return false;
}

  </script>




  @stack('scripts')
</body>
</html>
 