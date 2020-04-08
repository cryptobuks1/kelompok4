<form id="formProductAdd">
	<input type="hidden" name="{{ $name }}" value="{{ $key }}">
<div class="col-md-12">
	<div class="alert alert-danger alert-dismissable d-none" id="errorMsg"> 
		<ul id="eMessg">
			
		</ul>
	</div>
	<div class="card">
		<div class="card-header">
			<strong class="card-title">Tambah Produk</strong>
		</div>
		<div class="card-body">

			<fieldset class="the-fieldset">
				<legend class="the-legend">Properti Produk</legend>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label class=" form-control-label">Kode Produk</label>
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-shopping-bag"></i></div>
								<input class="form-control" name="kodeProduk" id="kodeProd" value="<?= $kode_barang ?>" readonly>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label class=" form-control-label">Nama Produk</label>
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-shopping-bag"></i></div>
								<input class="form-control" name="namaProduk">
							</div>
							<small class="form-text text-muted">contoh : Pulpen Standard X-10</small>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label class=" form-control-label">Kategori Produk</label>
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-th"></i></div>
								<select class="kategoriSearch form-control" name="kategoriSel">

								</select>
							</div>
						</div>		
					</div>
				</div>
			</fieldset>
		</div>
	</div>
</div>


<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<strong class="card-title">Detail Produk</strong>
		</div>
		<div class="card-body">

			<fieldset class="the-fieldset">
				<legend class="the-legend">Harga</legend>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label class=" form-control-label">Harga Satuan</label>
							<div class="input-group">
								<div class="input-group-addon"><span>RP. </span></div>
								<input class="form-control hargaIn" type="number" min="50" name="hargaSatuan">
							</div>
						</div>
					</div>
					<div class="col-sm-6">
								
					</div>
					<div class="col-sm-9 pb-3">
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
					</div>

					<div class="col-sm-6">
						<fieldset class="the-fieldset">
							<legend class="the-legend">Stok</legend>
							<div class="form-group">
								<label class=" form-control-label">Stok barang</label>
								<div class="input-group">
									<div class="input-group-addon"><span>Buah</span></div>
									<input class="form-control stokIn" type="number" min="1" name="stokBarang">
								</div>
						</fieldset>
					</div>

				</div>
			</fieldset>
		</div>
		<button class="btn btn-primary" type="submit" id="btnLoader">
		  <span id="loaderText">Simpan</span>  
		</button>
	</div>
</div>
</form>