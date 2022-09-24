				<footer	footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url() ?>js/scripts.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url() ?>assets/demo/chart-area-demo.js"></script>
        <script src="<?= base_url() ?>assets/demo/chart-bar-demo.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="<?= base_url() ?>js/datatables-simple-demo.js"></script>
		<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="<?= base_url() ?>assets/dist/js/select2.min.js"></script>

		<script>
			let jumlah = parseInt($('#jumlah-form').val());
			$(document).ready(function(){
				<?php if ($this->uri->segment(2) != 'edit') { ?>
				<?php } ?>
				$('.submit').hide();
				$('#totalHarga').hide();
				$('#labelTotalHarga').hide();
	

				$('.add-item').click((e) => {
					e.preventDefault();
					let html = '';
					html += `
					<tr class="item-target${jumlah}">
						<td>
							<spanx id="${jumlah}">${jumlah}</spanx>
						</td>
						<td>
							<label for="id_product">Product Name</label>
							<select class="form-select js-example-basic-single2" style="width:100%" name="id_product[]" id="id_product${jumlah}" aria-label="Default select example" required>
								<option disabled selected>Select product</option>
								<?php foreach($products as $p) { ?>
									<option value="<?= $p->id_product ?>"><?= $p->e_product_name ?></option>
								<?php } ?>
							</select>
							<?= form_error('id_product', '<span class="text-danger text-sm">', '</span>') ?>
						</td>
						<td>
							<label for="v_unit_price">Unit Price</label>
							<input class="form-control" id="v_unit_price${jumlah}" name="v_unit_price[]" type="number" onkeyup="hitungSubTotal(${jumlah})" placeholder="unit price" required />
							<?= form_error('v_unit_price', '<span class="text-danger text-sm">', '</span>') ?>
						</td>
						<td>
							<label for="qty">Qty</label>
							<input type="number" class="form-control" id="qty${jumlah}" onkeyup="hitungSubTotal(${jumlah})" name="qty[]" placeholder="qty" required />
							<?= form_error('qty', '<span class="text-danger text-sm">', '</span>') ?>
						</td>
						<td>
							<label for="subTotalHarga">Sub Total Harga</label>
							<input type="number" class="form-control" id="subTotalHarga${jumlah}" placeholder="Sub Total Harga" readonly required />
							<input type="hidden" class="form-control" id="jml" value="${jumlah}"/>
							<?= form_error('totalHarga', '<span class="text-danger text-sm">', '</span>') ?>
						</td>
						<td>
							<span class="btn btn-primary delete-item"><i class="fas fa-trash"></i></span>
						</td>
					</tr>
					`;
					
					$('#form-add-item').append(html);
					$('.js-example-basic-single2').select2();
					$('#jml').val(jumlah);
					jumlah += 1;
					$('.submit').show();
					$('#totalHarga').show();
					$('#labelTotalHarga').show();
				})
				$('.add-item-edit').click((e) => {
					e.preventDefault();
					jumlah += 1;
					let html = '';
					html += `
					<div class="row item-target${jumlah}">
						<div class="col-md-1 no-urut">
							<span id="${jumlah-1}">${jumlah-1}</span>
						</div>
						<div class="col-md-3">
							<div class="mb-3">
								<label for="id_product">Product Name</label>
								<select class="form-select js-example-basic-single2" name="id_product2[]" id="id_product${jumlah}" aria-label="Default select example" required>
									<option disabled selected>Select product</option>
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
								<input class="form-control" id="v_unit_price${jumlah}" name="v_unit_price2[]" type="number" onkeyup="hitungSubTotal(${jumlah})" placeholder="unit price" required />
								<?= form_error('v_unit_price', '<span class="text-danger text-sm">', '</span>') ?>
							</div>
						</div>
						<div class="col-md-2">
							<div class="mb-3">
								<label for="qty">Qty</label>
								<input type="number" class="form-control" id="qty${jumlah}" onkeyup="hitungSubTotal(${jumlah})" name="qty2[]" placeholder="qty" required />
								<?= form_error('qty', '<span class="text-danger text-sm">', '</span>') ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="mb-3">
								<label for="subTotalHarga">Sub Total Harga</label>
								<input type="number" class="form-control" id="subTotalHarga${jumlah}" placeholder="Sub Total Harga" readonly required />
								<input type="hidden" class="form-control" id="jml" name="jml" value="${jumlah}"/>
								<?= form_error('totalHarga', '<span class="text-danger text-sm">', '</span>') ?>
							</div>
						</div>
						<div class="col-md-1">
							<div class="mt-4">
								<span class="btn btn-primary delete-item"><i class="fas fa-trash"></i></span>
							</div>
						</div>
					</div>
					`;
					$('#form-add-item').append(html);
					$('.js-example-basic-single2').select2();
					$('#jml').val(jumlah);
					$('.submit').show();
					$('#totalHarga').show();
					$('#labelTotalHarga').show();
				})
				$('.reset-item').click((e) => {
					e.preventDefault();
					$("#form-add-item").html("");
      				jumlah = 1;
					$('.submit').hide();
					$('#totalHarga').hide();
					$('#labelTotalHarga').hide();
				})
				$("#form-add-item").on("click", ".delete-item", function(event) {
					$(this).closest("tr").remove();

					var obj = $('#form-add-item tr:visible').find('spanx');
					$.each(obj, function(key, value) {
						console.log(value.id);
						id = value.id;
						$('#' + id).html(key + 1);
					});
				});
				$('.js-example-basic-single2').select2();
				$('.js-example-basic-single').select2();
			})
			const deleteItem = (hitung) => {
				$(`.item-target${hitung}`).remove();
				// jumlah -= 1;
				// resetNomor(hitung);
				hitungTotal();
			}
			// const resetNomor = (hitung) => {
			// 	// hitung = hitung + 1
			// 	let simpan = [];
			// 	$('.no-urut').each((i) => {
			// 		// console.log(i+1);
			// 		simpan.push(i+1);
			// 		// $(`.norut`).addClass(i);
			// 	})
			// 	simpan.map((sim) => {
			// 		console.log($(`.${sim}`));
			// 		$(`.${sim}`).text(sim);
			// 	})
			// }
			const hitungTotal = () => {
				let jumlah = $('#jml').val();
				let total = 0;
				for(let i = 1; i<=jumlah; i++) {
					let sub = $(`#subTotalHarga${i}`).val();
					if(!isNaN(sub)) {
						total+=parseInt(sub);
						$('#totalHarga').val(total)
					}
				}
			}
			const hitungSubTotal = (jumlah) => {
				let harga = $(`#v_unit_price${jumlah}`).val();
				let qty = $(`#qty${jumlah}`).val();
				let subTotal = $(`#subTotalHarga${jumlah}`);
				let sub = harga * qty;
				subTotal.val(sub);
				hitungTotal();
			}
		</script>
    </body>
</html>
