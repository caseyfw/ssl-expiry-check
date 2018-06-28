<?php

$domain = $_GET['domain'] ?? 'www.apple.com';
$expiryText = trim(shell_exec("echo | openssl s_client -connect $domain:443 2>/dev/null | openssl x509 -noout -enddate | sed -n 's/.*=\(.*\)/\\1/p'"));

$expiryDate = DateTime::createFromFormat('M d H:i:s Y e', $expiryText);
$diff = (new DateTime())->diff($expiryDate);

header('Content-type: application/json');
echo json_encode([
  'domain' => $domain,
  'expires' => $expiryDate->format('Y-m-d g:i:s'),
  'expires-text' => $diff > 0 ? $diff->format('in %a days') : $diff->format('%a days ago'),
]);
