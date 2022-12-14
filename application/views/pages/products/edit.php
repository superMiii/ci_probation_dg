				<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Update Product</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Form Update Product</li>
                        </ol>
						<a href="<?= base_url('products') ?>" class="btn btn-primary mb-3"><-- Kembali</a>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Form Update Products
                            </div>
                            <div class="card-body">
								<form action="<?= base_url('products/form_edit/' . $product->id_product) ?>" method="post">
									<div class="form-floating mb-3">
										<input class="form-control" id="l_product_id" name="l_product_id" type="text" placeholder="Product ID" value="<?= $product->l_product_id ?>" readonly />
										<label for="l_product_id">Product ID</label>
										<?= form_error('l_product_id', '<span class="text-danger text-sm">', '</span>') ?>
									</div>
									<div class="form-floating mb-3">
										<input class="form-control" id="e_product_name" name="e_product_name" type="text" placeholder="Product Name" value="<?= $product->e_product_name ?>" />
										<label for="e_product_name">Product Name</label>
										<?= form_error('e_product_name', '<span class="text-danger text-sm">', '</span>') ?>
									</div>
									<div class="form-floating mb-3">
										<input class="form-control" id="unit_price" name="unit_price" type="number" placeholder="Unit Price" value="<?= $product->unit_price ?>" />
										<label for="unit_price">Unit Price</label>
										<?= form_error('unit_price', '<span class="text-danger text-sm">', '</span>') ?>
									</div>
									<div class="d-flex align-items-center justify-content-end mt-4 mb-0">
										<button class="btn btn-primary" type="submit">Submit</button>
									</div>
								</form>
                            </div>
                        </div>
                    </div>
                </main>
