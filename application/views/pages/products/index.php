                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">List Products</li>
                        </ol>
						<?php if($this->session->userdata('alert')) { ?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<?= $this->session->userdata('alert'); ?>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						<?php } ?>
						<a href="<?= base_url('products/form') ?>" class="btn btn-primary mb-4">Add</a>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Table List Products
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product ID</th>
                                            <th>Product Name</th>
                                            <th>Status</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php $no=1; 
										foreach($products as $p) { ?>
										<tr>
											<th scope="row"><?= $no++ ?></th>
											<td><?= $p->l_product_id ?></td>
											<td><?= $p->e_product_name ?></td>
											<td><span class="<?= ($p->status) ? 'btn btn-success' : 'btn btn-danger' ?> p-2 rounded"><?= ($p->status) ? 'Aktif' : 'Tidak Aktif' ?></span></td>
											<td>
												<a href="<?= base_url('products/setStatus/' . $p->id_product) ?>" class="btn btn-primary">
													<?= ($p->status) ? 'Nonaktifkan' : 'Aktifkan' ?>
												</a> <a href="<?= base_url('products/form_edit/' . $p->id_product) ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
											</td>
										</tr>
									<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
