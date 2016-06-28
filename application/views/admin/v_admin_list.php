<? $ci=& get_instance(); 
?>
<div class="container-fluid">
      <div class="row">
          <?
          $ci->load->view('admin/v_sidebar',array('admin_list' => "yes", ));
          ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Admin User list</h1>

          <div class="row placeholders">
            <a class="btn btn-success" href="<?=site_url('admin/admin_user_add')?>">Add Admin</a>
            </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>username</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Nickname</th>
                  <th>#</th>
                </tr>
              </thead>
              <tbody>
              <?
              foreach ($user_list as $key => $value) {
                ?>
                <tr>
                  <td><?=$value->username?></td>
                  <td><?=$value->firstname?></td>
                  <td><?=$value->lastname?></td>
                  <td><?=$value->nickname?></td>
                  <td><a class="btn btn-info" href="<?=site_url('admin/admin_user_edit/'.$value->username)?>">Edit</a>
                      <a class="btn btn-danger" href="javascript:deleteconfirm('<?=site_url('admin/delete_admin/'.$value->username)?>');">Delete</a>
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
                              <a href="<?echo site_url('admin/admin_list/'.($page-1));?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                              </a>
                            </li>
                            <?
                          }
                          for ($i=$page-3; $i <$page ; $i++) { 
                            if ($i>0) {
                              ?>
                              <li><a href="<?echo site_url('admin/admin_list/'.$i);?>"><?=$i?></a></li>
                              <?
                            }
                            
                          }
                          for ($i=$page; $i <=$page+3&&$i<=$page_num ; $i++) { 
                            ?>
                            <li><a href="<?echo site_url('admin/admin_list/'.$i);?>"><?=$i?></a></li>
                            <?
                          }
                          if ($page<$page_num) {
                            ?>
                            <li>
                              <a href="<?echo site_url('admin/admin_list/'.($page+1));?>" aria-label="Next">
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
