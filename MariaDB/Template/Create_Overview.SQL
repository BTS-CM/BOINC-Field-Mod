USE ProjectRain;
create table Overview (
   name varchar(254),
   ExampleProject1_RAC_MAG double DEFAULT 0,
   ExampleProject1_Historical_MAG double DEFAULT 0,
   ExampleProject2_RAC_MAG double DEFAULT 0,
   ExampleProject2_Historical_MAG double DEFAULT 0,
   TotalRAC_MAG double DEFAULT 0,
   TotalHistorical_MAG double DEFAULT 0,
   bitshares_account varchar(254),
   #steem_account varchar(254),
   #gridcoin_address varchar(34),
   #ethereum_address varchar(42),
   #nxt_account_id varchar(24),
   cpid varchar(254) not null,
   primary key (cpid)
) engine=InnoDB; 