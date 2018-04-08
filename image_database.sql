drop table image_database;

create table image_database
(
	ID int not null,
    pimage blob
);

insert into image_database(ID,pimage) values(1, load_file(`d:\\Geraniums.gif`));
insert into image_database(ID,pimage) values(2, load_file(`d:\\Geraniums.gif`));
insert into image_database(ID,pimage) values(3, load_file(`d:\\Geraniums.gif`));