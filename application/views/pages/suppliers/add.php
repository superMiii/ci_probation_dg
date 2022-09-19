				<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Supplier</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Form Add Supplier</li>
                        </ol>
						<a href="<?= base_url('suppliers') ?>" class="btn btn-primary mb-3"><-- Kembali</a>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Form Add Suppliers
                            </div>
                            <div class="card-body">
								<form action="<?= base_url('suppliers/form') ?>" method="post">
									<div class="form-floating mb-3">
										<input class="form-control" id="l_supplier_id" name="l_supplier_id" type="text" placeholder="Supplier ID" />
										<label for="l_supplier_id">Supplier ID</label>
										<?= form_error('l_supplier_id', '<span class="text-danger text-sm">', '</span>') ?>
									</div>
									<div class="form-floating mb-3">
										<input class="form-control" id="e_supplier_name" name="e_supplier_name" type="text" placeholder="Supplier Name" />
										<label for="e_supplier_name">Supplier Name</label>
										<?= form_error('e_supplier_name', '<span class="text-danger text-sm">', '</span>') ?>
									</div>
									<div class="d-flex align-items-center justify-content-end mt-4 mb-0">
										<button class="btn btn-primary" type="submit">Submit</button>
									</div>
								</form>
                            </div>
                        </div>
                    </div>
                </main>
