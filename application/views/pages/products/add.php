				<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Add Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Form Add Product</li>
                        </ol>
						<a href="<?= base_url('products') ?>" class="btn btn-primary mb-3"><-- Kembali</a>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Form Add Products
                            </div>
                            <div class="card-body">
								<form action="<?= base_url('products/form') ?>" method="post">
									<div class="form-floating mb-3">
										<input class="form-control" id="l_product_id" name="l_product_id" type="text" placeholder="Product ID" value="<?= 'BRG000' . $product_id ?>" readonly />
										<label for="l_product_id">Product ID</label>
										<?= form_error('l_product_id', '<span class="text-danger text-sm">', '</span>') ?>
									</div>
									<div class="form-floating mb-3">
										<input class="form-control" id="e_product_name" name="e_product_name" type="text" placeholder="Product Name" />
										<label for="e_product_name">Product Name</label>
										<?= form_error('e_product_name', '<span class="text-danger text-sm">', '</span>') ?>
									</div>
									<div class="d-flex align-items-center justify-content-end mt-4 mb-0">
										<button class="btn btn-primary" type="submit">Submit</button>
									</div>
								</form>
                            </div>
                        </div>
                    </div>
                </main>
