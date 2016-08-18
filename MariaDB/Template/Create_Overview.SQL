USE ProjectRain;
create table Overview (
   name varchar(254),
   country varchar(254),
   ExampleProject1_Mag double DEFAULT 0,
   ExampleProject2_Mag double DEFAULT 0,
   TotalMag_All double DEFAULT 0,
   bitshares_account varchar(254),
   steem_account varchar(254),
   gridcoin_address varchar(34),
   ethereum_address varchar(42),
   nxt_account_id varchar(24),
   Synced_Till varchar(25),
   cpid varchar(254) not null,
   primary key (cpid)
) engine=InnoDB; 