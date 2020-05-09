<div class="modal fade" id="addSaldo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row p-4">
          <div class="col-md-6">
            <div class="form-group">
                <label class=" form-control-label">Nomor Telepon</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                    <input class="form-control" id="editKodeProduk" name="kodeProduk">
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label class=" form-control-label">Nominal</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fas fa-money-bill-wave"></i></div>
                    <select class="custom-select" id="inputGroupSelect02">
                      <option selected></option>
                      <option value="5k">Rp. 5.000,-</option>
                      <option value="10k">Rp. 10.000,-</option>
                      <option value="20k">Rp. 20.000,-</option>
                      <option value="50k">Rp. 50.000,-</option>
                      <option value="100k">Rp. 100.000,-</option>
                    </select>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label class=" form-control-label">PIN Admin</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                    <input class="form-control" name="kodeProduk" type="password">
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>