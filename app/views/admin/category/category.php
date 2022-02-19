<div class="breadcumb">
  <div class="col-sm-10 col-sm-offset-2">
    <div class="col-sm-12">
      <h3>Category</h3>
      <a href="#">Dashboard</a>
      >
      Category
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
            <th>ID</th>
            <th>Category</th>
          </tr>
        </thead>
        <tbody>
          <?php echo isset($_GET['msg']) == true ? '<div class="alert alert-danger">' . $_GET['msg'] . '</div>' : null; ?>
          <?php
          foreach ($category as $key => $value) :
          ?>
            <tr>
              <td><?= $value->id ?></td>
              <td><a href="<?= '/admin/posts/' . $value->id ?>"><?= $value->category_name ?></a></td>
              <td>
                <a href="<?= '/admin/category/update/' . $value->id ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                <button type="button" onclick="alert('Bạn có chắc chắn muốn xóa không?')" class="btn btn-danger btn-sm"><a href="<?= '/admin/category/delete/' . $value->id ?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a></button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>