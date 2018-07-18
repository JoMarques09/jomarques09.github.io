<?php
  // Your Paddle 'Public Key'
  $public_key = '-----BEGIN PUBLIC KEY-----
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAshTidY80lvdikl6yrdBW
I2Ik5x9XoDU9A+gEd9jirYgo5jcTxjWajD0IXRsIQm9Q138PQArLHdZxuDWCsfYS
+j48niV8uWPl0UECIMRDafVQ2Ztl/EveIV4J4dBDpVIE6G5VnsKt2Q2gQLmol+6V
/eEVS2D7xBuOzu3RPs97mh6W2XoHMOf3lIZLmZeIx8IoCfn8Aa9RZvaVYEfzpIZJ
DagYuyo7jFUpkEK0X2YQjyqkLKuBMd4MnJ2Cf0wdKoA5QJ8CS51ReO8REmBZzKv+
RZYklATXB8Vu+NG6dYCf9fBxIpGUEgtaiTcpjPUykVj3VBEjMhIqsaRiioOfOtQz
cIdoPSJf8pLc/KkY9YvFBDAEEkV93bbRqSy4w1A6vFA6SfjfwA8E0KDyV865KDHk
PZqEMsDPoBLNe+jrLPSraQBjv36nzBCu/43zy8Qsj/PPfd6X+ARQMFKK9oitHj1q
n37JEdcPuHJ8vNOYNQm7pWdqsESqUUKwk0VPc5dNqbyNPR5F6dvmVF5CuwvzreTw
SVP8uDqKLslicKDiCYsEZMIKTUntphSh6rENOwSrp/2JA3p8Fa8FR+yIK1nXC9xX
XM2yYc9ylww/3k5Igl9FBLdPRYdYCkN5z0ByhPb0skDyv25RmfVrMEAqdz1JBH/T
mEhUsSQcTmCtQtudzR3qjMUCAwEAAQ==
-----END PUBLIC KEY-----;
  
  // Get the p_signature parameter & base64 decode it.
  $signature = base64_decode($_POST['p_signature']);
  
  // Get the fields sent in the request, and remove the p_signature parameter
  $fields = $_POST;
  unset($fields['p_signature']);
  
  // ksort() and serialize the fields
  ksort($fields);
  foreach($fields as $k => $v) {
	  if(!in_array(gettype($v), array('object', 'array'))) {
		  $fields[$k] = "$v";
	  }
  }
  $data = serialize($fields);
  
  // Veirfy the signature
  $verification = openssl_verify($data, $signature, $public_key, OPENSSL_ALGO_SHA1);
  
  if($verification == 1) {
	  echo 'Yay! Signature is valid!';
  } else {
	  echo 'The signature is invalid!';
  }
?>
