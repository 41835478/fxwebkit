

CLOSE_TIME<>"1970-01-01 00:00:00" AND NEW.CMD<2
mt4_closed_actual
(`TICKET`,`server_id`,`LOGIN`,`SYMBOL`,`DIGITS`,`CMD`,`VOLUME`,`OPEN_TIME`,`OPEN_PRICE`,`SL`,`TP`,`CLOSE_TIME`,`EXPIRATION`,
`REASON`,`CONV_RATE1`,`CONV_RATE2`,`COMMISSION`,`COMMISSION_AGENT`,`SWAPS`,`CLOSE_PRICE`,`PROFIT`,`TAXES`,`COMMENT`,`INTERNAL_ID`,
`MARGIN_RATE`,`TIMESTAMP`,`MODIFY_TIME`)
delete FROM `mt4_closed_actual` where not (CLOSE_TIME<>"1970-01-01 00:00:00" AND CMD<2)


CLOSE_TIME<>"1970-01-01 00:00:00" AND NEW.CMD>5
mt4_closed_balance
delete FROM `mt4_closed_balance` where not (CLOSE_TIME<>"1970-01-01 00:00:00" AND  CMD>5)


CREATE VIEW mt4_closed_actual_balance AS SELECT * FROM mt4_closed_actual union SELECT * FROM mt4_closed_balance ;
Mt4ClosedActualBalance


CLOSE_TIME<>"1970-01-01 00:00:00" AND NEW.CMD>1 AND NEW.CMD<6
mt4_closed_pending
delete FROM `mt4_closed_pending` where not (CLOSE_TIME<>"1970-01-01 00:00:00" AND  CMD>1 AND  CMD<6)

CREATE VIEW mt4_closed AS SELECT * FROM mt4_closed_actual union SELECT * FROM mt4_closed_balance  union SELECT * FROM mt4_closed_pending ;


CLOSE_TIME="1970-01-01 00:00:00" AND NEW.CMD<2
mt4_open_actual
delete FROM `mt4_open_actual` where not (CLOSE_TIME="1970-01-01 00:00:00" AND CMD<2)

CLOSE_TIME="1970-01-01 00:00:00" AND NEW.CMD>1
mt4_open_pending
delete FROM `mt4_open_pending` where not (CLOSE_TIME="1970-01-01 00:00:00" AND CMD>1)

CREATE VIEW mt4_open AS SELECT * FROM mt4_open_actual union SELECT * FROM mt4_open_pending ;








$query = $query1->union($query2);
$querySql = $query->toSql();
$query = DB::table(DB::raw("($querySql order by foo desc) as a"))->mergeBindings($query);
