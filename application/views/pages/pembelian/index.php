				<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pembelian</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">List Pembelian</li>
                        </ol>
						<?php if($this->session->userdata('alert')) { ?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<?= $this->session->userdata('alert'); ?>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						<?php } ?>
						<!-- <form action="" method="post">
							<div class="row">
								<div class="col-md-6">
									<div class="form mb-3">
										<select class="form-select supplier" aria-label="Default select example">
											<option selected disabled>Open this select menu</option>
											<?php foreach($supplier as $s) { ?>
												<option value="<?= $s->id_supplier ?>"><?= $s->l_supplier_id ?></option>
										    <?php } ?>
										</select>
									</div>
								</div>
							</div>
						</form> -->
						<div class="d-flex justify-content-end">
							<a href="<?= base_url('pembelian/form') ?>" class="btn btn-primary mb-4 w-25">Add</a>
						</div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Table List Pembelian
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Supplier Name</th>
                                            <th>Tanggal</th>
											<th>Keterangan</th>
											<th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataTrHeader">
										<?php $no=1; foreach($tr_header as $th) {
											$date = date_create($th->tanggal);
											?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $th->e_supplier_name ?></td>
												<td><?= date_format($date,"d M Y") ?></td>
												<td><?= $th->keterangan ?></td>
												<td>
													<a href="<?= base_url('pembelian/detail/' . $th->id_document) ?>" class="badge bg-primary">
														<i class="fas fa-circle-info"></i>
													</a>
													<a href="<?= base_url('pembelian/edit/' . $th->id_document) ?>" class="badge bg-warning">
														<i class="fas fa-pen"></i>
													</a>
												</td>
											</tr>
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

