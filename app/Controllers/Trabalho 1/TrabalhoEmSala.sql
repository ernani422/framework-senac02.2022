DROP DATABASE IF EXISTS trabalhoEmSala;
CREATE DATABASE trabalhoEmSala;

USE trabalhoEmSala;

DROP TABLE IF EXISTS Ernani;
DROP TABLE IF EXISTS Paz;


create table if not exists Ernani (
    id_Ernani INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    RG VARCHAR(255) NOT NULL
    
);

create table if not exists Paz (
    id_paz INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_Ernani integer,
    CPF VARCHAR(255) NOT NULL,
    FOREIGN key(id_Ernani)REFERENCES Ernani(id_Ernani)
    
);

INSERT INTO Ernani (RG) VALUES 
('1230615542'),
('1326548952'),
('4526981257'),
('1527859426');

INSERT INTO Paz (CPF,id_Ernani) VALUES
('1230615642',2),
('1326548452',2),
('4526981657',4),
('1527899426',3);



select "before delete row of Paz table " as 'log';

select * from Paz;

set autocommit=0;

start transaction;
    delete from Paz where CPF = '1230615642';
 

select "after delete row of musics table" as 'log';

select * from Paz;

rollback;

select "ROLLBACK EXECUTED " AS 'LOG';

select * from Paz;

set autocommit=1;

delimiter $$
create trigger tgr_ernani_insert after insert on Ernani
  for each row

  begin
    update 
        Paz
    set
        CPF = '08800099999'
        where
         paz.id_paz = 1;
         end $$

         delimiter ;

insert into Ernani (RG)VALUES
('05987452312');

select * from Ernani;
select * from Paz;

