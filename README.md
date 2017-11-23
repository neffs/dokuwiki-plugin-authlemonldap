dokuwiki-authlemonldap
======================

Dokuwiki Plugin for LemonLDAP::NG, with support for groups

Create the following mapping for headers in LemonLDAP::NG:

 * Auth-User => $uid
 * Auth-Cn => $cn
 * Auth-Mail => $mail
 * Auth-Groups => encode_base64($groups,"")

