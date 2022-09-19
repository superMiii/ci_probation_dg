INSERT INTO tr_header(id_supplier, tanggal, keterangan) 
VALUES
	(1, '2021-10-20', 'Tidak ada keterangan'),
	(3, '2021-05-12', 'urgent'),
	(3, '2021-12-15', 'Tidak ada keterangan'),
	(2, '2021-03-17', 'urgent'),
	(1, '2021-02-25', 'Tidak ada keterangan'),
	(2, '2021-11-28', 'urgent'),
	(1, '2021-09-30', 'urgent'),
	(3, '2021-08-17', 'Tidak ada keterangan'),
	(2, '2021-04-16', 'urgent');
	

INSERT INTO tr_detail(id_document, id_product, v_unit_price, qty)
VALUES
	(4, 5, 60000, 21),
	(5, 4, 80000, 18),
	(6, 3, 100000, 55),
	(7, 4, 40000, 44),
	(8, 4, 30000, 20),
	(9, 5, 20000, 21),
	(10, 3, 85000, 25),
	(11, 2, 97000, 27),
	(12, 6, 88000, 40);
	

ALTER TABLE tm_product ADD COLUMN status INTEGER;

ALTER TABLE tm_supplier ADD COLUMN status INTEGER;