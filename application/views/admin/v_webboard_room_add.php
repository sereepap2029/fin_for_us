<? $ci=& get_instance(); 
?>
    <div class="container-fluid">
        <div class="row">
            <?
          $ci->load->view('admin/v_sidebar',array('webboard_room' => "yes", ));
          ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Add Room</h1>
                    <h2 style="color:red"><?=$err_msg?></h2>
                    <form method="post" action="<? if(isset($room)){echo site_url('admin/webboard_room_edit/'.$room->username);}else{echo site_url('admin/webboard_room_add');}?>">
                    <div class="input-group col-sm-9 col-sm-offset-0 col-md-5 col-md-offset-0">
                        <span class="input-group-addon">Room Name</span>
                        <input type="text" class="form-control" name="room_name" <? if(isset($room)){?> value="<?=$room->room_name?>" disabled<?}?>>
                    </div>
                    <br>
                    <div class="input-group col-sm-9 col-sm-offset-0 col-md-5 col-md-offset-0">
                        <span class="input-group-addon">Description</span>
                        <input type="text" class="form-control" name="room_description" <? if(isset($room)){?> value="<?=$room->room_description?>"<?}?>>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
        </div>
    </div>
