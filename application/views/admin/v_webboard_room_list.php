<? $ci=& get_instance(); 
?>
<div class="container-fluid">
      <div class="row">
          <?
          $ci->load->view('admin/v_sidebar',array('webboard_room' => "yes", ));
          ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Webboard Room list</h1>

          <div class="row placeholders">
            <a class="btn btn-success" href="<?=site_url('admin/webboard_room_add')?>">Add Room</a>
            </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Room Name</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
              <?
              foreach ($room_list as $key => $value) {
                ?>
                <tr>
                  <td><?=$value->room_name?></td>
                  <td><a class="btn btn-info" href="<?=site_url('admin/webboard_room_edit/'.$value->id)?>">Edit</a>
                      <a class="btn btn-danger" href="javascript:deleteconfirm('<?=site_url('admin/delete_webboard_room/'.$value->id)?>');">Delete</a>
                  </td>
                </tr>
                <?
              }
              ?>
                  <tr>
                    <td colspan="5">
                      <nav>
                        <ul class="pagination">                          
                          <?
                          if ($page>1) {
                            ?>
                            <li>
                              <a href="<?echo site_url('admin/webboard_room_list/'.($page-1));?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <?
                          }
                          for ($i=$page-3; $i <$page ; $i++) { 
                            if ($i>0) {
                              ?>
                              <li><a href="<?echo site_url('admin/webboard_room_list/'.$i);?>"><?=$i?></a></li>
                              <?
                            }
                            
                          }
                          for ($i=$page; $i <=$page+3&&$i<=$page_num ; $i++) { 
                            ?>
                            <li><a href="<?echo site_url('admin/webboard_room_list/'.$i);?>"><?=$i?></a></li>
                            <?
                          }
                          if ($page<$page_num) {
                            ?>
                            <li>
                              <a href="<?echo site_url('admin/webboard_room_list/'.($page+1));?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                              </a>
                            </li>
                            <?
                          }
                          ?>
                          
                        </ul>
                      </nav>
                    </td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    function deleteconfirm(link){
        if (confirm("Confirm Delete")) {
            window.open(link,"_self")
        };
    }
</script>
