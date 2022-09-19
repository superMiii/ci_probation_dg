				<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Detail Pembelian</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Detail Pembelian</li>
                        </ol>
						<!-- <?php if($this->session->userdata('alert')) { ?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<?= $this->session->userdata('alert'); ?>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						<?php } ?> -->
						<!-- <div class="d-flex justify-content-end">
							<a href="<?= base_url('pembelian/form') ?>" class="btn btn-primary mb-4 w-25">Add</a>
						</div> -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Table Detail Pembelian
                            </div>
                            <div class="card-body">
							<a href="<?= base_url('pembelian') ?>" class="btn btn-primary mb-3"><--Kembali</a>
							<div class="mb-3 w-100">
								<ul class="list-group">
									<?php $date = date_create($supplier->tanggal); ?>
									<li class="list-group-item">Supplier Name : <?= $supplier->e_supplier_name ?></li>
									<li class="list-group-item">Supplier ID : <?= $supplier->l_supplier_id ?></li>
									<li class="list-group-item">Tanggal : <?= date_format($date,"d M Y") ?></li>
									<li class="list-group-item">Keterangan : <?= $supplier->keterangan ?></li>
								</ul>
							</div>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
											<th>Unit Price</th>
											<th>Qty</th>
											<th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dataTrHeader">
										<?php
											$totalHarga = 0;
											$no=1;
											foreach($tr_detail as $td) {
												$totalHarga+=$td->subtotal;
											?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $td->e_product_name ?></td>
												<td><?= 'Rp.' . number_format($td->v_unit_price,2,',','.') ?></td>
												<td><?= $td->qty ?> unit</td>
												<td><?= 'Rp.' . number_format($td->subtotal,2,',','.') ?></td>
											</tr>
										<?php } ?>
										<tr>
											<td colspan="4" class="text-end"><strong>Total Harga</strong></td>
											<td><strong><?= 'Rp.' . number_format($totalHarga,2,',','.') ?></strong></td>
										</tr>
										<tr>
											<td colspan="4" class="text-end"><strong>Terbilang</strong></td>
											<td><strong><em><?= terbilang($totalHarga) ?></strong></em></td>
										</tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php
		function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai)) . " rupiah";
		} else {
			$hasil = trim(penyebut($nilai)) . " rupiah";
		}     		
		return $hasil;
	}
?>
