select date_format(user_cash_nyawa.dibuat_saat, '%M') as Month,sum(jumlah_cash_dibayar) as total
from user_cash_nyawa inner join cash_nyawa ON cash_nyawa_id = user_cash_nyawa_id
group by date_format(user_cash_nyawa.dibuat_saat, '%M');

SELECT sum(jumlah_cash_dibayar) FROM user_cash_nyawa INNER JOIN cash_nyawa WHERE user_cash_nyawa_id = 2