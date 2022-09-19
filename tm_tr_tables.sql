CREATE TABLE tm_supplier(
	id_supplier SERIAL NOT NULL PRIMARY KEY,
	l_supplier_id VARCHAR(20),
	e_supplier_name TEXT
);

	
CREATE TABLE tm_product(
	id_product SERIAL NOT NULL PRIMARY KEY,
	l_product_id VARCHAR(7),
	e_product_name TEXT
);

CREATE TABLE tr_header(
	id_document SERIAL NOT NULL PRIMARY KEY,
	id_supplier INT,
	tanggal DATE,
	keterangan TEXT
);

CREATE TABLE tr_detail(
	id_item SERIAL NOT NULL PRIMARY KEY,
	id_document INT,
	id_product INT,
	v_unit_price NUMERIC,
	qty int
);

INSERT INTO tm_supplier(l_supplier_id, e_supplier_name) 
VALUES
	('TRN', 'Tirai Pelangi Nusantara'),
	('DSG', 'Duta Setia Garmen'),
	('BLN', 'Bahtera Laju Nusantara');

INSERT INTO tm_product(l_product_id, e_product_name)
VALUES
	('BRG0001', 'TOPI APLIKASI BORDIR MOTIF ZOO'),
	('BRG0002', 'GENDONGAN KAOS 2IN1 PRINT DINO UKURAN L'),
	('BRG0003', 'KOJONG BAYI PRINT APL PRINT'),
	('BRG0004', 'KOJONG TENDA APLIKASI PENGUIN'),
	('BRG0005', 'GENDONGAN KAOS 2 IN 1 PRINT DINO UK M (64X80CM)'),
	('BRG0006', 'DIAPERS PRINT KANCING 6'),
	('BRG0007', 'GENDONGAN KAOS 2 IN 1 PRINT DINO UKURAN XL (68X80CM)');


INSERT INTO tr_header(id_supplier, tanggal, keterangan)
VALUES
	(1, '2021-11-01', 'urgent'),
	(1, '2021-01-15', 'urgent'),
	(1, '2021-12-31', 'Tidak ada keterangan');


INSERT INTO tr_detail(id_document, id_product, v_unit_price, qty)
VALUES
	(1, 1, 5000, 5),
	(2, 1, 6000, 12),
	(3, 1, 7000, 16),
	(1, 2, 15000, 17),
	(2, 2, 17000, 20),
	(3, 2, 25000, 21);


