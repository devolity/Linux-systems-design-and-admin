$TTL    60      ; RR are good for 1 minute, this is for testing

@       IN      SOA     dns.clarsen.it3100.horgoth.com. root.dns.clarsen.it3100.horgoth.com. (
                     2007101911         ; Serial
                           3600         ; Refresh   every 1 hour
                            300         ; Retry     every 5 minutes
                        2419200         ; Expire    4 weeks to expire
                             60 )       ; Negative Cache TTL  1 minute

@       IN      NS      dns

dns     IN      A       192.168.0.10
smtp	IN	A	192.168.0.9
http	IN	A	192.168.0.8
http-devel IN	A	192.168.0.7

red	IN	CNAME	smtp
www	IN	CNAME	http
