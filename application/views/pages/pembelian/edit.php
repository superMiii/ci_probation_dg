				<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Edit Tr Header</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Form Edit Tr Header</li>
                        </ol>
						<a href="<?= base_url('pembelian') ?>" class="btn btn-primary mb-3"><-- Kembali</a>
						<form id="formEdit" action="<?= base_url("pembelian/edit/" . $tr_header->id_document); ?>" method="post">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Form Edit Tr Header
                            </div>
                            <div class="card-body">
									<div class="mb-3">
										<select required class="form-select my-3 js-example-basic-single" style="width: 100%" name="id_supplier" id="id_supplier" aria-label="Default select example">
											<option selected value="<?= $tr_header->id_supplier ?>"><?= $tr_header->e_supplier_name ?></option>
											<?php foreach($supplier as $s) { ?>
												<?php if($tr_header->id_supplier != $s->id_supplier) { ?>
													<option value="<?= $s->id_supplier ?>"><?= $s->e_supplier_name ?></option>
												<?php } ?>
											<?php } ?>
										</select>
									</div>
									<?= form_error('id_supplier', '<span class="text-danger text-sm">', '</span>') ?>
									<div class="form-floating mb-3">
										<input required class="form-control" id="tanggal" name="tanggal" type="date" value="<?= $tr_header->tanggal ?>" />
										<label for="tanggal">Tanggal</label>
										<?= form_error('tanggal', '<span class="text-danger text-sm">', '</span>') ?>
									</div>
									<div class="form-floating mb-3">
										<textarea required class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" style="height: 150px"><?= $tr_header->keterangan ?></textarea>
										<label for="keterangan">Keterangan</label>
										<?= form_error('keterangan', '<span class="text-danger text-sm">', '</span>') ?>
									</div>
									<div class="d-flex align-items-center justify-content-end mt-4 mb-0">
										<button class="btn btn-secondary mx-2 add-item-edit">Add Item</button>
										<button class="btn btn-secondary mx-2 reset-item">Reset</button>
										<!-- <button class="btn btn-primary" type="submit">Submit</button> -->
									</div>
                            </div>
                        </div>
							<div class="card mb-4">
								<div class="card-header">
									<i class="fas fa-table me-1"></i>
									Form Add Item
								</div>
								<div class="card-body">
									<?php $total = []; $no=1; foreach($tr_detail as $trd) { 
										$subTotal = $trd->v_unit_price * $trd->qty;
										array_push($total, $subTotal);
										?>
										<div class="row item-target<?= $no + 1; ?>">
											<div class="col-md-1">
												<?= $no++; ?>
											</div>
											<div class="col-md-3">
												<div class="mb-3">
													<input type="hidden" value="<?= $trd->id_item ?>" name="id_item[]" id="id_item<?= $no ?>">
													<label for="id_product">Product Name</label>
													<select class="form-select js-example-basic-single2" name="id_product[]" id="id_product<?= $no ?>" aria-label="Default select example" required>
														<option selected value="<?= $trd->id_product ?>"><?= $trd->e_product_name ?></option>
														<?php foreach($products as $p) { ?>
															<option value="<?= $p->id_product ?>"><?= $p->e_product_name ?></option>
														<?php } ?>
													</select>
													<?= form_error('id_product', '<span class="text-danger text-sm">', '</span>') ?>
												</div>
											</div>
											<div class="col-md-2">
												<div class="mb-3">
													<label for="v_unit_price">Unit Price</label>
													<input class="form-control" id="v_unit_price<?= $no ?>" name="v_unit_price[]" type="number" onkeyup="hitungSubTotal(<?= $no ?>)" placeholder="unit price" value="<?= $trd->v_unit_price ?>" required />
													<?= form_error('v_unit_price', '<span class="text-danger text-sm">', '</span>') ?>
												</div>
											</div>
											<div class="col-md-2">
												<div class="mb-3">
													<label for="qty">Qty</label>
													<input type="number" class="form-control" id="qty<?= $no ?>" onkeyup="hitungSubTotal(<?= $no ?>)" name="qty[]" placeholder="qty" value="<?= $trd->qty ?>" required />
													<?= form_error('qty', '<span class="text-danger text-sm">', '</span>') ?>
												</div>
											</div>
											<div class="col-md-3">
												<div class="mb-3">
													<label for="subTotalHarga">Sub Total Harga</label>
													<input type="number" class="form-control" id="subTotalHarga<?= $no ?>" placeholder="Sub Total Harga" value="<?= $subTotal ?>" readonly required />
													<input type="hidden" class="form-control" id="jml" value="<?= $no ?>"/>
													<?= form_error('totalHarga', '<span class="text-danger text-sm">', '</span>') ?>
												</div>
											</div>
											<div class="col-md-1">
												<div class="mt-4">
													<span class="btn btn-primary delete-item" onclick="deleteItem(<?= $no; ?>)"><i class="fas fa-trash"></i></span>
												</div>
											</div>
										</div>
									<?php } ?>
									<p class="text-end">Prev Total : <?= 'Rp.' . number_format(array_sum($total),2,',','.'); ?></p>
									<div id="form-add-item"></div>
								</div>
								<div class="card-footer">
									<div class="d-flex flex-column align-items-end justify-content-center mb-0">
										<label for="totalHarga" id="labelTotalHarga">Total Harga</label>
										<input type="number" class="form-control w-25 mb-2" id="totalHarga" placeholder="Total Harga" readonly>
										<input class="btn btn-primary submit" type="submit" value="Submit" />
									</div>
								</div>
								<input type="hidden" id="jumlah-form" value="<?= $no ?>">
							</div>
						</div>
					</form>
					<div class="initSelect2"></div>
                </main>
