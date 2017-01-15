CREATE TABLE IF NOT EXISTS event (
  eventID int(11) NOT NULL AUTO_INCREMENT,
  judul varchar(50) NOT NULL,
  tanggal date NOT NULL,
  jam varchar(10) NOT NULL,
  lokasi varchar(50) NOT NULL,
  keterangan text NOT NULL,
  PRIMARY KEY (eventID)
) ENGINE=InnoDB  ;