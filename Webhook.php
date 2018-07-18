<?php
  // Your Paddle 'Public Key'
  $public_key = '-----BEGIN PUBLIC KEY-----
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAn6oj4NFd4g/JhKN6D81s
XvPiNohhXnaE1wevaAVijkXnzL/BAAlpGFWHHXcsy8bt1i1dJvhqNKQQfXzk2sYD
7NJh0Eqy11isw2Q2F/izNqxCgKlXPwHv+ADMHkJOo8K+shydBYAjrVwq8mvb1DjZ
UODUw1tEFzN8SDCwAv8BQ+a8EsifnwKaoW3rDUvX4+cpFhyh0ZWq+OEj+7JGvqYF
awP5IKM14WumpbQbVbe7tifWOUgrqOMvsMMiqg5Jfydyk9//736fKCLSxmBZ01Gl
gnoB/oC5FKKOj4XMUCiDT/I+RsGcFPi46/fu3GpF0VrdlHeVC+bI7GUFR7rYPOmW
HQ9Fig91j8Ndu8bVgrLe16qwaXKZA/6XQguguK9zMk6TG1jnCiuXbO4WuPhpei/a
AzLyXTWR5qVwWhf13IHZbkrzIywTT0dbSgzJsWUM8gjCrS2SNTdR/7DUSvtQAyEc
W4A0O//v1tFDmob/bJpjVR7RBFl7Q+iiH9uUR11xwZUhFWHs0nJ9b56x04jDJErB
sEnKN3iYnPvrht1qmR7wjOZ1uZCpCMaGIGp8j1xB8GPOlt6UqvLUyejkMb2k4ti5
XRtkjoyWLkMbv5pnFo9yR1ar8HglK1irOC7F6ItP8MW/pHcihYYoogq+1iAJpobX
kASwQTdsf7bd6Yr+bTy/5LcCAwEAAQ==
-----END PUBLIC KEY-----';
  
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
