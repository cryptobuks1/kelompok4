            <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="modalEdit" aria-hidden="true" >
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEdit">Medium Modal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="ml-2 mr-2 mt-2">
                                              <div class="alert alert-danger alert-dismissable d-none" id="errorMsg"> 
                                                <div class="pl-4 pr-2">
                                                  <ul id="eMessg">
                                                    
                                                  </ul>
                                                </div>
                                              </div>
                                                <form id="formProductAdd">
                                                  <input type="hidden" name="{{ $name }}" value="{{ $key }}">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                             <div class="form-group">
                                                                 <label class=" form-control-label">Kode Produk</label>
                                                                 <div class="input-group">
                                                                     <div class="input-group-addon"><i class="fa fa-shopping-bag"></i></div>
                                                                     <input class="form-control" id="editKodeProduk" name="kodeProduk" readonly>
                                                                 </div>
                                                             </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                             <div class="form-group">
                                                                 <label class=" form-control-label">Nama Produk</label>
                                                                 <div class="input-group">
                                                                     <div class="input-group-addon"><i class="fa fa-shopping-bag"></i></div>
                                                                     <input class="form-control" id="editNamaProduk" name="namaProduk">
                                                                 </div>
                                                             </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                             <div class="form-group">
                                                                 <label class=" form-control-label">Kategori Produk</label>
                                                                 <div class="input-group">
                                                                     <div class="input-group-addon"><i class="fa fa-shopping-bag"></i></div>
                                                                     <select class="kategoriSearch form-control" name="kategoriSel">

                                                                     </select>
                                                                 </div>
                                                             </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class=" form-control-label">Harga Satuan</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-shopping-bag"></i></div>
                                                                    <input class="form-control hargaIn" type="number" min="50" id="hargaSatuan" name="hargaSatuan">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class=" form-control-label">Stok</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon"><i class="fa fa-shopping-bag"></i></div>
                                                                    <input class="form-control stockIn" type="number" min="50" id="stok" name="stokBarang">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                                <fieldset class="the-fieldset">
                                                                    <legend class="the-legend">Harga Grosir</legend>
                                                                    <table class="table table-bordered">
                                                                        <thead>
                                                                            <th>Nomor</th>
                                                                            <th>Minimal pcs per Grosir >=n</th>
                                                                            <th>Harga per Grosir</th>
                                                                            <th></th>
                                                                          </thead>
                                                                          <tbody>
                                                                            <tr>
                                                                                <td>1.</td> 
                                                                                <td><input class="form-control formDel" type="number" min="1" name="grosirInput[]"></td>
                                                                                <td><input class="form-control formDel" type="number" min="1" name="grosirPrice[]"></td>
                                                                                <td><button class="btn btn-danger btnDel"><i class="fa fa-trash"></i> Hapus</button></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2.</td> 
                                                                                <td><input class="form-control formDel" type="number" min="1" name="grosirInput[]"></td>
                                                                                <td><input class="form-control formDel" type="number" min="1" name="grosirPrice[]"></td>
                                                                                <td><button class="btn btn-danger btnDel"><i class="fa fa-trash"></i> Hapus</button></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3.</td> 
                                                                                <td><input class="form-control formDel" type="number" min="1" name="grosirInput[]"></td>
                                                                                <td><input class="form-control formDel" type="number" min="1" name="grosirPrice[]"></td>
                                                                                <td><button class="btn btn-danger btnDel"><i class="fa fa-trash"></i> Hapus</button></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>4.</td> 
                                                                                <td><input class="form-control formDel" type="number" min="1" name="grosirInput[]"></td>
                                                                                <td><input class="form-control formDel" type="number" min="1" name="grosirPrice[]"></td>
                                                                                <td><button class="btn btn-danger btnDel"><i class="fa fa-trash"></i> Hapus</button></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>5.</td> 
                                                                                <td><input class="form-control formDel" type="number" min="1" name="grosirInput[]"></td>
                                                                                <td><input class="form-control formDel" type="number" min="1" name="grosirPrice[]"></td>
                                                                                <td><button class="btn btn-danger btnDel"><i class="fa fa-trash"></i> Hapus</button></td>
                                                                            </tr>
                                                                          </tbody>
                                                                    </table>
                                                                </fieldset>



                                                                <fieldset class="the-fieldset mt-3">
                                                                    <legend class="the-legend">Foto Produk</legend>
                                                                    <div class="card p-2">
                                                                        <div class="mt-1 ml-2 mb-3">
                                                                          <button class="btn btn-info" id="addGambarEdit">
                                                                            +Tambahkan Gambar
                                                                          </button>
                                                                        </div>
                                                                        <div class="input-imagesEdit w-100"></div>
                                                                    </div>
                                                                </fieldset>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-primary" type="submit" id="submitEdit">
                                          <span id="loaderText">Simpan</span>  
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>