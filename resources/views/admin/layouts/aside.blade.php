 <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">



      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        




         @php
                $menus = \App\Model\Menu::select('name','slug','icon')
                ->where(function($query){
                    $query->whereNull('parent');
                    $query->whereStatus(1);
                    $query->whereHas('rolePermissions',function($query){
                        $query->where('role_permissions.role_id','=',auth('admin')->user()->role_id);
                        $query->whereRaw("role_permissions.permission_key = concat('browse_',menus.slug)");
                    });
                })
                ->orWhere(function($query){
                    $query->whereStatus(1);
                    $query->orderBy('ordering','asc');
                    $query->whereHas('childs',function($query){
                        $query->select('slug','parent','name');
                        $query->whereStatus(1);

                        $query->whereHas('rolePermissions',function($query){
                            $query->where('role_permissions.role_id','=',auth('admin')->user()->role_id);
                            $query->whereRaw("role_permissions.permission_key = concat('browse_',laravel_reserved_0.slug)");
                        });
                    });
                })->with(['childs'=>function($query){
                    $query->select('slug','parent','name');
                    $query->whereStatus(1);

                    $query->whereHas('rolePermissions',function($query){
                        $query->where('role_permissions.role_id','=',auth('admin')->user()->role_id);
                        $query->whereRaw("role_permissions.permission_key = concat('browse_',menus.slug)");
                    });
                }])
                ->orderBy('ordering','asc')
                ->get();
            @endphp
            @foreach ($menus as $menu)
                @if(!$menu->childs->count() && Route::has("admin.".str_slug($menu->slug, '-').".index"))
                    <li class="{{ request()->segment(2) == str_slug($menu->slug, '-')?'active':''}} nav-item">
                        <a href="{{ route("admin.".str_slug($menu->slug, '-').".index")}}">
                            <i class="{{ $menu->icon??'fa fa-arrow-right' }}"></i> 
                            <span>{{ $menu->name }} @if($menu->name == 'Order') <span class="badge badge badge-primary badge-pill float-right mr-2">{{App\Model\Order::select('id','status')->whereNotIn('status',[17,1,3,4])->count()}} @endif</span> </span>
                        </a>
                    </li>
                @endif
                @if($menu->childs->count())


                <li class=" nav-item {{ ($menu->childs->whereIn('slug',str_replace('-', '_', request()->segment(2)))->count())?'active open':'' }}">
                    <a href="javascript:;">
                        <i class="{{ $menu->icon??'fa fa-list' }}"></i>
                        <span class="menu-title" data-i18n="">{{ $menu->name }}</span>
                    </a>
                  <ul class="menu-content">

                     @foreach($menu->childs as $child)
                         @if(Route::has("admin.".str_slug($child->slug, '-').".index"))
                            <li class="{{ ($child->slug == str_replace('-', '_', request()->segment(2)))?'active':'' }}">
                                <a class="menu-item" href="{{ route('admin.'.str_slug($child->slug, '-').'.index')}}">{{ $child->name }}</a>
                            </li>
                         @endif

                      @endforeach   
                    
                  </ul>
                </li>

                @endif
            @endforeach
            

        
        
      </ul>
    </div>
  </div>