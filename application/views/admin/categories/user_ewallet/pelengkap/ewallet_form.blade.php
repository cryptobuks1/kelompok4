<div class="col-md-12">
    <div class="card">
        <div class="card-body">
          <div id="bag">
            
          </div>
        <form id="topup-ewallet">
        <div class="row p-4">
          <div class="col-md-6">
            <div class="form-group">
                <label class=" form-control-label">Nomor Telepon</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                    <input class="form-control" name="nomor_hp">
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
                <label class=" form-control-label">Nominal</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="fas fa-money-bill-wave"></i></div>
                    <select class="custom-select" name="nominal">
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
                    <input class="form-control" name="pin" type="password">
                </div>
            </div>
          </div>
        </div>
        
        

        </div>
        <button class="btn btn-success" id="sendItem">Kirim</button>
    </div>
    </form>
</div>