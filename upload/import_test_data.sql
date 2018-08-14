/*
Loads the test data from the files in the project's Laravel directory on the Vagrant box.
Use chmod 755 *.csv to allow read access to the export files.
*/
COPY manufacturers (id, name) FROM '/home/vagrant/Code/ca7/upload/ExportManufacturers.csv' WITH DELIMITER ';';
COPY brands (id, name, manufacturer_id) FROM '/home/vagrant/Code/ca7/upload/ExportBrands.csv' WITH DELIMITER ';';
COPY modells (id, name, brand_id) FROM '/home/vagrant/Code/ca7/upload/ExportModels.csv' WITH DELIMITER ';';
COPY vehicles (id, brand_id, model_id, name, limited_edition, vehicle_category) FROM '/home/vagrant/Code/ca7/upload/ExportVehicles.csv' WITH DELIMITER ';';
