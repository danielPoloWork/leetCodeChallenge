SELECT request_at AS Day,
       ROUND(SUM(CASE WHEN Trips.status IN ('cancelled_by_driver', 'cancelled_by_client') THEN 1 ELSE 0 END) / COUNT(Trips.id), 2) AS CancellationRate
FROM Trips
     INNER JOIN Users u1 ON Trips.client_id = u1.users_id AND u1.banned = 'No'
     INNER JOIN Users u2 ON Trips.driver_id = u2.users_id AND u2.banned = 'No'
WHERE Trips.request_at BETWEEN '2013-10-01' AND '2013-10-03'
GROUP BY Trips.request_at;
