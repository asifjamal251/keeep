@extends('admin.layouts.master')
@push('links')
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/plyr/plyr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/fonts/simple-line-icons/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css/core/colors/palette-gradient.css')}}">
@endpush
@section('main')

<div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
       
          <h3 class="content-header-title mb-0">Dashboard</h3>
        </div>
        <div class="content-header-right col-md-6 col-12">
          <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <div class="btn-group" role="group">
            
            </div>
           
          </div>
        </div>
      </div>

<div class="row">
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="media align-items-stretch">
                  <div class="p-2 text-center bg-primary bg-darken-2">
                    <i class="icon-camera font-large-2 white"></i>
                  </div>
                  <div class="p-2 bg-gradient-x-primary white media-body">
                    <h5>Backlog Images</h5>
                    <h5 class="text-bold-400 mb-0"><i class="ft-plus"></i> {{\App\Model\Backlog::where('status',0)->count()}}</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="media align-items-stretch">
                  <div class="p-2 text-center bg-danger bg-darken-2">
                    <i class="icon-user font-large-2 white"></i>
                  </div>
                  <div class="p-2 bg-gradient-x-danger white media-body">
                    <h5>All Users</h5>
                    <h5 class="text-bold-400 mb-0"><i class="ft-arrow-up"></i>{{\App\User::where('status',1)->count()}}</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="media align-items-stretch">
                  <div class="p-2 text-center bg-warning bg-darken-2">
                    <i class="icon-picture font-large-2 white"></i>
                  </div>
                  <div class="p-2 bg-gradient-x-warning white media-body">
                    <h5>Processed Images</h5>
                    <h5 class="text-bold-400 mb-0"><i class="ft-plus"></i> {{\App\Model\Keep::count()}}</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-12">
            <div class="card">
              <div class="card-content">
                <div class="media align-items-stretch">
                  <div class="p-2 text-center bg-success bg-darken-2">
                    <i class="icon-briefcase font-large-2 white"></i>
                  </div>
                  <div class="p-2 bg-gradient-x-success white media-body">
                    <h5>Total Keep Images</h5>
                    <h5 class="text-bold-400 mb-0"><i class="ft-arrow-up"></i>{{\App\Model\Keep::where('status',1)->count()}}</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@push('scripts')
<script type="text/javascript" src="{{asset('admin-assets/plyr/plyr.js')}}"></script>

<script type="text/javascript">
  
  const player = new Plyr('#player', {
    title: 'Example Title',
    autoplay: false,
    captions: false,
    quality: { default: 576, options: [4320, 2880, 2160, 1440, 1080, 720, 576, 480, 360, 240] },
});


</script>
@endpush