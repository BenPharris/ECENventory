<?php
function culdapsearch($uuid) {
	$ds=ldap_connect("directory.colorado.edu");  // must be a valid LDAP server!
   	$sr=ldap_search($ds, "ou=People,dc=colorado,dc=edu", "cuEduPersonUUID=$uuid");
    $info = ldap_get_entries($ds, $sr);
    $fullname = $info[0]["cn"][0];
   	$email = $info[0]["mail"][0];
    ldap_close($ds);
    $namearray = explode(',', $fullname,2);
    $lastname = $namearray[0];
    $firstname = $namearray[1];
    $namearray = explode(',', $fullname,2);

return array ($firstname, $lastname, $email);
}
?>