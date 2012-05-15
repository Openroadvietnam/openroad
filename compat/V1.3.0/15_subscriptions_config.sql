UPDATE subscriptions_user SET send_interval=86400 WHERE uid = '-2';
UPDATE subscriptions_user SET digest=1 WHERE uid = '-2';
UPDATE subscriptions SET send_interval=86400 WHERE send_interval=1;