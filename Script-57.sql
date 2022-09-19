SELECT * FROM tm_supplier;

SELECT * FROM tm_product;

SELECT * FROM tr_header;

SELECT * FROM tr_detail;

-- A
SELECT b.l_supplier_id, b.e_supplier_name, a.tanggal, a.keterangan
FROM tr_header a
INNER JOIN tm_supplier b ON b.id_supplier = a.id_supplier;

-- B
SELECT d.l_supplier_id, d.e_supplier_name, 
	   c.l_product_id, c.e_product_name, 
	   a.v_unit_price, a.qty 
FROM tr_detail a 
INNER JOIN tr_header b ON b.id_document = a.id_document
INNER JOIN tm_supplier d ON d.id_supplier = b.id_supplier
INNER JOIN tm_product c ON c.id_product = a.id_product;

-- 1
SELECT c.l_supplier_id, SUM(v_unit_price * qty), AVG(v_unit_price * qty) AS total FROM tr_detail a 
INNER JOIN tr_header b ON b.id_document  = a.id_document
INNER JOIN tm_supplier c ON c.id_supplier = b.id_supplier
GROUP BY c.l_supplier_id;

-- 2
SELECT b.e_product_name, 
	   MIN(v_unit_price) AS min_price, 
	   MAX(v_unit_price) AS max_price, 
	   MIN(qty) AS min_qty, 
	   MAX(qty) AS max_qty 
FROM tr_detail a
INNER JOIN tm_product b ON a.id_product = b.id_product
GROUP BY b.e_product_name;

-- 3
SELECT a.l_product_id 
FROM tm_product a
LEFT JOIN tr_detail b ON b.id_product = a.id_product WHERE b.id_product IS NULL;

-- 4
SELECT tanggal,
	CASE 
		WHEN tanggal >= DATE('2021-07-01')
			THEN 'Akhir Tahun'
		WHEN tanggal <= DATE('2021-07-01')
			THEN 'Awal Tahun'
	END keterangan
FROM tr_header;
	
-- 5
SELECT c.l_supplier_id, to_char(b.tanggal, 'FMMonth') AS bulan, SUM(v_unit_price * qty) AS total, AVG(v_unit_price * qty) AS rata_rata FROM tr_detail a 
INNER JOIN tr_header b ON b.id_document  = a.id_document
INNER JOIN tm_supplier c ON c.id_supplier = b.id_supplier
GROUP BY 1,2
ORDER BY c.l_supplier_id ASC



-- 6
SELECT current_date, a.tanggal,
	   age(current_date, a.tanggal), 
	   EXTRACT(YEAR FROM age(current_date, a.tanggal)) AS tahun,
	   EXTRACT(MONTH FROM age(current_date, a.tanggal)) AS bulan,
	   EXTRACT(DAY FROM age(current_date, a.tanggal)) AS hari
FROM tr_header a
JOIN tm_supplier b ON b.id_supplier=a.id_supplier;

-- 7
SELECT to_char(tanggal, 'dd Month yyyy') FROM tr_header;

UPDATE tm_product SET status = 1;

UPDATE tm_supplier SET status = 1;

