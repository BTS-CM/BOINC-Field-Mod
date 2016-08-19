create table ProjectName_user (
   id integer not null,
   create_time integer,
   name varchar(254),
   total_credit double,
   expavg_credit double,
   expavg_time double,
   has_profile smallint,
   cpid varchar(254) not null,
   primary key (cpid)
) engine=InnoDB; 