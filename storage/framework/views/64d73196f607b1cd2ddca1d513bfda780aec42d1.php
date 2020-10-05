 <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">



      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        




         <?php
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
            ?>
            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(!$menu->childs->count() && Route::has("admin.".str_slug($menu->slug, '-').".index")): ?>
                    <li class="<?php echo e(request()->segment(2) == str_slug($menu->slug, '-')?'active':''); ?> nav-item">
                        <a href="<?php echo e(route("admin.".str_slug($menu->slug, '-').".index")); ?>">
                            <i class="<?php echo e($menu->icon??'fa fa-arrow-right'); ?>"></i> 
                            <span><?php echo e($menu->name); ?> <?php if($menu->name == 'Order'): ?> <span class="badge badge badge-primary badge-pill float-right mr-2"><?php echo e(App\Model\Order::select('id','status')->whereNotIn('status',[17,1,3,4])->count()); ?> <?php endif; ?></span> </span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if($menu->childs->count()): ?>


                <li class=" nav-item <?php echo e(($menu->childs->whereIn('slug',str_replace('-', '_', request()->segment(2)))->count())?'active open':''); ?>">
                    <a href="javascript:;">
                        <i class="<?php echo e($menu->icon??'fa fa-list'); ?>"></i>
                        <span class="menu-title" data-i18n=""><?php echo e($menu->name); ?></span>
                    </a>
                  <ul class="menu-content">

                     <?php $__currentLoopData = $menu->childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php if(Route::has("admin.".str_slug($child->slug, '-').".index")): ?>
                            <li class="<?php echo e(($child->slug == str_replace('-', '_', request()->segment(2)))?'active':''); ?>">
                                <a class="menu-item" href="<?php echo e(route('admin.'.str_slug($child->slug, '-').'.index')); ?>"><?php echo e($child->name); ?></a>
                            </li>
                         <?php endif; ?>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    
                  </ul>
                </li>

                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            

        
        
      </ul>
    </div>
  </div><?php /**PATH /home/sanixu9b/public_html/app/resources/views/admin/layouts/aside.blade.php ENDPATH**/ ?>