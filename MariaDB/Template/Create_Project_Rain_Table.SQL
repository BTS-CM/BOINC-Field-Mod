create table ProjectRain_user (
   id integer not null,
   create_time integer,
   name varchar(254),
   country varchar(254),
   bitshares_account varchar(254),
   #steem_account varchar(254),
   #gridcoin_address varchar(34),
   #ethereum_address varchar(42),
   #nxt_account_id varchar(24),
   cpid varchar(254) not null,
   primary key (cpid)
) engine=InnoDB; 