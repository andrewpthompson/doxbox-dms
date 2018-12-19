# doxbox-dms
This is a fork of DoxBox DMS (formerly Owl Intranet Knowledgebase) with modifications for PHP 7 compatibility. (Core only, I haven't attempted to fix the other scripts etc.)

**Other tips**
 - IPv6 addresses can't be stored in the owl_active_sessions table; the column is configured as char(16), which isn't long enough. Increase it to 45 characters. This avoids 'This session is already in use on another computer' when the user has an IPv6 address.
 ```
 ALTER TABLE `active_sessions` CHANGE `ip` `ip` CHAR(45);
 ALTER TABLE `owl_log` CHANGE `ip` `ip` VARCHAR(45);
 ```
