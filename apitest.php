<?php

// 1. retrieve access token

$cmd =<<<CMD
curl -sS http://localhost:8000/oauth/v2/token \
    -d "client_id"=5yw7k9iwhvk0wwoc00g08c0s0kwso0sgkw0cso4ws0wkkk80go \
-d "client_secret"=3pbg70ptq1q8wkcgwgows8s0c0wcow4c84084oo4s4c0cssss0 \
-d "grant_type"=password \
-d "username"=api@example.com \
-d "password"=api
CMD;

$result = shell_exec($cmd);

$token = json_decode($result);

$accessToken = $token->access_token;
$tokenType = $token->token_type;

echo "Access-Token: $accessToken\nTokenType: $tokenType\n\n";

// 2. api call with access token

$cmd = <<<CMD
curl -sS http://localhost:8000/api/users -H "Accept: application/json" -H "Authorization: $tokenType $accessToken"
CMD;

$result = shell_exec($cmd);

var_dump($result);