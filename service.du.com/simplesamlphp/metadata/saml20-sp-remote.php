<?php

/**
 * SAML 2.0 remote SP metadata for SimpleSAMLphp.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-sp-remote
 */

/*
 * Example SimpleSAMLphp SAML 2.0 SP
 */
// sp1 metadeta
/*
$metadata['https://sp1.du.com/simplesaml/module.php/saml/sp/metadata.php/sp1.du.com'] = [
    'SingleLogoutService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'https://sp1.du.com/simplesaml/module.php/saml/sp/saml2-logout.php/sp1.du.com',
        ],
    ],
    'AssertionConsumerService' => [
        [
            'index' => 0,
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'https://sp1.du.com/simplesaml/module.php/saml/sp/saml2-acs.php/sp1.du.com',
        ],
        [
            'index' => 1,
            'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
            'Location' => 'https://sp1.du.com/simplesaml/module.php/saml/sp/saml1-acs.php/sp1.du.com',
        ],
        [
            'index' => 2,
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
            'Location' => 'https://sp1.du.com/simplesaml/module.php/saml/sp/saml2-acs.php/sp1.du.com',
        ],
        [
            'index' => 3,
            'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
            'Location' => 'https://sp1.du.com/simplesaml/module.php/saml/sp/saml1-acs.php/sp1.du.com/artifact',
        ],
    ],
    'contacts' => [
        [
            'emailAddress' => 'mesbah.csesust@gmail.com',
            'contactType' => 'technical',
            'givenName' => 'Mesbah',
        ],
    ],
    'certData' => 'MIIFCzCCA3OgAwIBAgIUE5hXCloUaNCNjkGg7x0lnMVbRAUwDQYJKoZIhvcNAQELBQAwgZQxCzAJBgNVBAYTAkJEMQ4wDAYDVQQIDAVEaGFrYTEOMAwGA1UEBwwFRGhha2ExGTAXBgNVBAoMEERoYWthIFVuaXZlcnNpdHkxDDAKBgNVBAsMA0NTRTETMBEGA1UEAwwKc3AxLmR1LmNvbTEnMCUGCSqGSIb3DQEJARYYbWVzYmFoLmNzZXN1c3RAZ21haWwuY29tMB4XDTIyMDUzMDE3MzYyMloXDTMyMDUyOTE3MzYyMlowgZQxCzAJBgNVBAYTAkJEMQ4wDAYDVQQIDAVEaGFrYTEOMAwGA1UEBwwFRGhha2ExGTAXBgNVBAoMEERoYWthIFVuaXZlcnNpdHkxDDAKBgNVBAsMA0NTRTETMBEGA1UEAwwKc3AxLmR1LmNvbTEnMCUGCSqGSIb3DQEJARYYbWVzYmFoLmNzZXN1c3RAZ21haWwuY29tMIIBojANBgkqhkiG9w0BAQEFAAOCAY8AMIIBigKCAYEAvDe2hetthZPm6VuII1W7wtymmBnfhNR9Kg0VHMG8i+cYx6e49im4EcHfbmwQh3jf21dFnt06Qg2qfZaxvoGVgSzOXC6wOLMgLdr1QBzSrri3JZmW/u8KgOqT6lYFFHzGapKPlDqOwijvQBYzGKIzvpzhVvGC54PM6ri2HQCuc32WiiDXBBr9eXLmTMBagG8VfFX5Aw2+8pVks/VSHZ+F5QrSV9/ov7iINIXRc4DqDk08eOjKitgCwkODmz+16HtmtQgnosTdFOTupBXrf2AH5j8QmNAUleDmfncAmwhcugWPP64xm/IkIxeknmYRDdbpBaBoR4TYRO/UVCfNDBrUmoypdr/Wh5WLk/UIIS4calXnFjv/1l91yTsNx4KuYPuFcRWcBbPRJeUgcGqerFwItOWXXAY7on07rdbq3Zd76qhw2WCeo0xDCEC1rBCWtiNAFxGEJUF5FENf14tOGfznMedKB3gMY+GxJRcF5lt3TaeepnwsMb9rLg3wHAZAbqMXAgMBAAGjUzBRMB0GA1UdDgQWBBTeCF6r/I/Sym64VUmx4YjgKXiiYTAfBgNVHSMEGDAWgBTeCF6r/I/Sym64VUmx4YjgKXiiYTAPBgNVHRMBAf8EBTADAQH/MA0GCSqGSIb3DQEBCwUAA4IBgQBwqamjmVi+nxt34YgvBTYaaGJRLU0ZLJxDuaTSAeDOiGT9CSFXOM77+TOyZX2YwYc+0prZxuZlUV4E7HgLlDPnsDkTqh4tKAqVWHJn9NbHdKmafFrCGKCPN/w4YxWvDUcMHtfpdubnd2maTEyUcboG5lHPNXkYCWdgrKxGCflnpV55+7EjWNUf3xPfefAmFK64N7SnojK7eedKbYNnTEb1cQVWXXuFpqqjVm0Y1BVHj8WNkiJ1m/o/ILhPAXmzzWw9npUC9GH9rrfoRRNBPyR6HkMvODCl9nVypFvsFQORSwDopqpHdJTODunWDFqtR8qvdV30Bgni6wtwze6oHSJb7ciuee7UumuMOrp1+fgwzT9SO/0RJaBjuqfOiJ9nfQ0sUyt4pwXjfYIPYZnanMu8dCLCxcLD9gKnBcn7kb0+VDZISk8pB0B2/lN7Pp1PKnaZqK7PzbWeH6EXCqXsA5+DTaHVUT+rXEqiWuyGoN9WpICFU27DQ2jlZfpRFZI5WV0=',
]; */

$metadata['https://saml2sp.example.org'] = [
    'AssertionConsumerService' => 'https://saml2sp.example.org/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
    'SingleLogoutService' => 'https://saml2sp.example.org/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
];

/*
 * This example shows an example config that works with Google Workspace (G Suite / Google Apps) for education.
 * What is important is that you have an attribute in your IdP that maps to the local part of the email address at
 * Google Workspace. In example, if your Google account is foo.com, and you have a user that has an email john@foo.com, then you
 * must set the simplesaml.nameidattribute to be the name of an attribute that for this user has the value of 'john'.
 */
$metadata['google.com'] = [
    'AssertionConsumerService' => 'https://www.google.com/a/g.feide.no/acs',
    'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress',
    'simplesaml.nameidattribute' => 'uid',
    'simplesaml.attributes' => false,
];

$metadata['https://legacy.example.edu'] = [
    'AssertionConsumerService' => 'https://legacy.example.edu/saml/acs',
    /*
     * Currently, SimpleSAMLphp defaults to the SHA-256 hashing algorithm.
     * Uncomment the following option to use SHA-1 for signatures directed
     * at this specific service provider if it does not support SHA-256 yet.
     *
     * WARNING: SHA-1 is disallowed starting January the 1st, 2014.
     * Please refer to the following document for more information:
     * http://csrc.nist.gov/publications/nistpubs/800-131A/sp800-131A.pdf
     */
    //'signature.algorithm' => 'http://www.w3.org/2000/09/xmldsig#rsa-sha1',
];
