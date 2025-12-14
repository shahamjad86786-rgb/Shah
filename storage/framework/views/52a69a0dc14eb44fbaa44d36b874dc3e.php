
<div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="<?php echo e(route('dashboard')); ?>"><h2>Admin Panel</h2></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        
                        <li class="sidebar-item <?php echo e(Str::contains(Route::currentRouteName(), 'dashboard') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('dashboard')); ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo e(Str::contains(Route::currentRouteName(), 'client') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.client.index')); ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Client</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Account configuration</li>

                        <li class="sidebar-item <?php echo e(Str::contains(Route::currentRouteName(), 'logout') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('logout')); ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php echo e(Str::contains(Route::currentRouteName(), 'profile.index') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('profile.index')); ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Profile</span>
                            </a>
                        </li>
                        

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>

<?php /**PATH C:\wamp64\www\shah\resources\views/componet/sidebar.blade.php ENDPATH**/ ?>