# ssl-expiry-check
Provides an SSL certificate expiry check API.

See https://ssl.caseyfulton.com/apple.com for an example implementation.

```
{
  domain: "apple.com",
  expires: "2018-10-31 11:59:59",
  expires-text: "in 125 days"
}
```

In the case of an error, you'll see something like this:

```
{
  domain: "nip.io",
  error: "no ssl"
}
```
