<? $ci=& get_instance(); 
?>
    <div class="container-fluid">
        <div class="row">
            <?
          $ci->load->view('admin/v_sidebar',array('admin_list' => "yes", ));
          ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Add Admin User</h1>
                    <h2 style="color:red"><?=$err_msg?></h2>
                    <form method="post" action="<? if(isset($admin_data)){echo site_url('admin/admin_user_edit/'.$admin_data->username);}else{echo site_url('admin/admin_user_add');}?>">
                    <div class="input-group col-sm-9 col-sm-offset-0 col-md-5 col-md-offset-0">
                        <span class="input-group-addon">Username</span>
                        <input type="text" class="form-control" name="username" <? if(isset($admin_data)){?> value="<?=$admin_data->username?>" disabled<?}?>>
                    </div>
                    <br>
                    <div class="input-group col-sm-9 col-sm-offset-0 col-md-5 col-md-offset-0">
                        <span class="input-group-addon">Password</span>
                        <input type="text" class="form-control" name="password" <? if(isset($admin_data)){?> value="<?=$admin_data->password?>"<?}?>>
                    </div>
                    <br>
                    <div class="input-group col-sm-9 col-sm-offset-0 col-md-5 col-md-offset-0">
                        <span class="input-group-addon">Confirm Password</span>
                        <input type="text" class="form-control" name="confirm_password" <? if(isset($admin_data)){?> value="<?=$admin_data->password?>"<?}?>>
                    </div>
                    <br>
                    <div class="input-group col-sm-9 col-sm-offset-0 col-md-5 col-md-offset-0">
                        <span class="input-group-addon">nickname</span>
                        <input type="text" class="form-control" name="nickname" <? if(isset($admin_data)){?> value="<?=$admin_data->nickname?>"<?}?>>
                    </div>
                    <br>
                    <div class="input-group col-sm-9 col-sm-offset-0 col-md-5 col-md-offset-0">
                        <span class="input-group-addon">firstname</span>
                        <input type="text" class="form-control" name="firstname" <? if(isset($admin_data)){?> value="<?=$admin_data->firstname?>"<?}?>>
                    </div>
                    <br>
                    <div class="input-group col-sm-9 col-sm-offset-0 col-md-5 col-md-offset-0">
                        <span class="input-group-addon">lastname</span>
                        <input type="text" class="form-control" name="lastname" <? if(isset($admin_data)){?> value="<?=$admin_data->lastname?>"<?}?>>
                    </div>
                    <br>
                    <div class="input-group col-sm-9 col-sm-offset-0 col-md-5 col-md-offset-0">
                        <span class="input-group-addon">email</span>
                        <input type="text" class="form-control" name="email" <? if(isset($admin_data)){?> value="<?=$admin_data->email?>"<?}?>>
                    </div>
                    <br>
                    <div class="input-group col-sm-9 col-sm-offset-0 col-md-5 col-md-offset-0">
                        <span class="input-group-addon">phone</span>
                        <input type="text" class="form-control" name="phone" <? if(isset($admin_data)){?> value="<?=$admin_data->phone?>"<?}?>>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
        </div>
    </div>
