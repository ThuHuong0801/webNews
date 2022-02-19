<style>
  img.thumbnail {
    max-width: 200px;
  }

  td.detail {
    max-width: 300px;
    overflow-wrap: break-word;
  }
</style>
<div class="breadcumb">
  <div class="col-sm-10 col-sm-offset-2">
    <div class="col-sm-12">
      <h3>Post</h3>
      <a href="#">Dashboard</a>
      >
      Post
    </div>
  </div>
</div>
<div class="col-sm-2"></div>
<div class="col-sm-10">
  <div class="col-sm-12">
    <div class="box profile__form">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Thumbnail</th>
            <th>Title</th>
            <th>Detail</th>
            <th>Category</th>
            <th>By</th>
            <th>Posted Time</th>
          </tr>
        </thead>
        <tbody>
          <?php echo isset($_GET['msg']) == true ? '<div class="alert alert-danger">' . $_GET['msg'] . '</div>' : null; ?>
          <?php
          if (count($post) == 0) {
            echo '<div class="alert alert-warning">Không có bài viết nào.</div>';
          }
          foreach ($post as $key => $value) :
          ?>
            <tr>
              <td><img class="thumbnail" src="<?= '../images/uploaded/' . $value->thumbnail ?>" alt=""></td>
              <td><?= $value->title ?></td>
              <td class="detail"><?php
                                  $value->detail = strip_tags($value->detail);
                                  if (strlen($value->detail) > 150) {
                                    $value->detail = substr($value->detail, 0, 150);
                                  }
                                  echo $value->detail;
                                  ?></td>
              <td><?= $value->category() ?></td>
              <td><?= $value->owner() ?></td>
              <td><?= $value->post_time ?></td>
              <td>
                <a href="<?= '/admin/posts/update/' . $value->id ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                <button type="button" onclick="alert('Bạn có chắc chắn muốn xóa không?')" class="btn btn-danger btn-sm"><a href="<?= '/admin/posts/delete/' . $value->id ?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a></button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <div class="col-xs-6 col-xs-offset-4">
        <ul class="pagination pagination-lg">
          <?php for ($i = 0; $i < $allpages; $i++) {
          ?>
            <li <?php if ($currentpage == $i) {
                  echo 'class="active"';
                } ?>><a href="<?= '/admin/posts?page=' . $i ?>"><?= $i + 1 ?></a></li>
          <?php
          } ?>
        </ul>
      </div>
      <div style="clear: both"></div>
    </div>
  </div>
</div>