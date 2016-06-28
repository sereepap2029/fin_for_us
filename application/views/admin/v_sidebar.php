<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li <?if (isset($dashboard)) {?>class="active"<?}?>><a href="<?echo site_url('admin/dashboard');?>">Overview <span class="sr-only">(current)</span></a></li>
            <li <?if (isset($admin_list)) {?>class="active"<?}?>><a href="<?echo site_url('admin/admin_list');?>">Admin User</a></li>
            <li <?if (isset($webboard_room)) {?>class="active"<?}?>><a href="<?echo site_url('admin/webboard_room_list');?>">Webboard Room</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>