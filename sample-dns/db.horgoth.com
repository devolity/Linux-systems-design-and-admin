; Note that the comment character is the semi-colon

;
; BIND data file for horgoth.com
;

; FYI
;
;    3600 seconds = 1 hour
;   86400 seconds = 1 day
;  604800 seconds = 1 week
;31449600 seconds = 52 weeks

;
;  This TTL (time to live) is for all RR (resource records) that do not have
;    TTL otherwise specified.   The value is in seconds.  If the TTL
;    is too large, then it takes a long time to get changes into
;    caching servers.  If it is too small, then the nameserver gets overworked.
;
$TTL    3600    ; RR are good for 1 hour


;  There must be an SOA for every zone
;
;  SOA (Start of Authority) record.
;    Serial  - number must increase every time you change this file
;    Refresh - How often the secondary name servers should check
;              for updated information
;    Retry   - How often the secondary name servers should retry
;              a refresh if the refresh is unsuccessful
;    Expire  - How long the secondary name servers should keep this
;              information before it is bad.
;    Minimum/TTL -
;              How long negative hits should be stored.  This is for
;              other servers that ask us about a non-existent RR.
;              They should cache the negative response for this long.
;              
@	IN	SOA	ns1.horgoth.com. root.ns1.horgoth.com. (
		     2005093003		; Serial
                           3600         ; Refresh   every 1 hour
                            300         ; Retry     every 5 minutes
                        7862400         ; Expire    3 months to expire
                             60 )       ; Negative Cache TTL  1 minute

; 
; NS (Name Server) records
;
@	IN	NS	ns1.horgoth.com.
@	IN	NS	ns2.horgoth.com.

;
; A (Address) records
;
ns1	IN	A	144.38.212.2
ns2	IN	A	209.33.198.200

; this allows horgoth.com to stand alone as a computer name
@	IN	A	144.38.212.2

; other names in this domain
fred	IN	A	144.38.212.3
wilma	IN	A	144.38.212.4
pebbles	IN	A	144.38.212.5
barney	IN	A	144.38.212.6
betty	IN	A	144.38.212.7
bambam	IN	A	144.38.212.8
dino	IN	A	144.38.212.9

;
; CNAME (Alias) records
;
www	IN	CNAME	fred
ftp	IN	CNAME	dino
sql	IN	CNAME	betty
mail	IN	CNAME	wilma
