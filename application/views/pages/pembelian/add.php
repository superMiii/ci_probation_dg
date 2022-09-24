				<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Tr Header</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Form Add Tr Header</li>
                        </ol>
						<a href="<?= base_url('pembelian') ?>" class="btn btn-primary mb-3"><-- Kembali</a>
						<form id="formAdd" action="<?= base_url("pembelian/form"); ?>" method="post">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Form Add Tr Header
                            </div>
                            <div class="card-body">
									<div class="mb-3">
										<select required class="form-select my-3 js-example-basic-single" style="width: 100%" name="id_supplier" id="id_supplier" aria-label="Default select example">
											<option disabled selected>Select supplier</option>
											<?php foreach($supplier as $s) { ?>
											<option value="<?= $s->id_supplier ?>"><?= $s->e_supplier_name ?></option>
											<?php } ?>
										</select>
									</div>
									<?= form_error('id_supplier', '<span class="text-danger text-sm">', '</span>') ?>
									<div class="form-floating mb-3">
										<input required class="form-control" id="tanggal" name="tanggal" type="date" />
										<label for="tanggal">Tanggal</label>
										<?= form_error('tanggal', '<span class="text-danger text-sm">', '</span>') ?>
									</div>
									<div class="form-floating mb-3">
										<textarea required class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" style="height: 150px"></textarea>
										<label for="keterangan">Keterangan</label>
										<?= form_error('keterangan', '<span class="text-danger text-sm">', '</span>') ?>
									</div>
									<div class="d-flex align-items-center justify-content-end mt-4 mb-0">
										<button class="btn btn-secondary mx-2 add-item">Add Item</button>
										<button class="btn btn-secondary mx-2 reset-item">Reset</button>
										<!-- <button class="btn btn-primary" type="submit">Submit</button> -->
									</div>
									<input type="hidden" id="jumlah-form" value="1">
                            </div>
                        </div>
							<div class="card mb-4">
								<div class="card-header">
									<i class="fas fa-table me-1"></i>
									Form Add Item
								</div>
								<div class="card-body">
									<table id="form-add-item" style="width: 100%;">

									</table>
								</div>
								<div class="card-footer">
									<div class="d-flex flex-column align-items-end justify-content-center mb-0">
										<label for="totalHarga" id="labelTotalHarga">Total Harga</label>
										<input type="number" class="form-control w-25 mb-2" id="totalHarga" placeholder="Total Harga" readonly>
										<input class="btn btn-primary submit" type="submit" value="Submit" />
									</div>
								</div>
							</div>
						</div>
					</form>
					<div class="initSelect2"></div>
                </main>
