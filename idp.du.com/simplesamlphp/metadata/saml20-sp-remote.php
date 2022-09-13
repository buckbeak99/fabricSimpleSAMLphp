<?php

/**
 * SAML 2.0 remote SP metadata for SimpleSAMLphp.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-sp-remote
 */
// Metadata fetch automatically by fabric
// include_once __DIR__ . '/../dynamicfed/fetch-metadata.php';

// $metadata = gettMetaDataFor(get_host_name());
/*
 * Example SimpleSAMLphp SAML 2.0 SP
 */
// $metadata['https://saml2sp.example.org'] = [
//     'AssertionConsumerService' => 'https://saml2sp.example.org/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
//     'SingleLogoutService' => 'https://saml2sp.example.org/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
// ];
// sp1.du.com metadata
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
];
// sp2.du.com meta data
$metadata['https://sp2.du.com/simplesaml/module.php/saml/sp/metadata.php/sp2.du.com'] = [
    'SingleLogoutService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'https://sp2.du.com/simplesaml/module.php/saml/sp/saml2-logout.php/sp2.du.com',
        ],
    ],
    'AssertionConsumerService' => [
        [
            'index' => 0,
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'https://sp2.du.com/simplesaml/module.php/saml/sp/saml2-acs.php/sp2.du.com',
        ],
        [
            'index' => 1,
            'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
            'Location' => 'https://sp2.du.com/simplesaml/module.php/saml/sp/saml1-acs.php/sp2.du.com',
        ],
        [
            'index' => 2,
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
            'Location' => 'https://sp2.du.com/simplesaml/module.php/saml/sp/saml2-acs.php/sp2.du.com',
        ],
        [
            'index' => 3,
            'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
            'Location' => 'https://sp2.du.com/simplesaml/module.php/saml/sp/saml1-acs.php/sp2.du.com/artifact',
        ],
    ],
    'contacts' => [
        [
            'emailAddress' => 'mesbah.csesust@gmail.com',
            'contactType' => 'technical',
            'givenName' => 'Mesbah',
        ],
    ],
    'certData' => 'MIIFCzCCA3OgAwIBAgIUF+Daf4w+gK+3pWuYoX+LmKntMF0wDQYJKoZIhvcNAQELBQAwgZQxCzAJBgNVBAYTAkJEMQ4wDAYDVQQIDAVEaGFrYTEOMAwGA1UEBwwFRGhha2ExGTAXBgNVBAoMEERoYWthIFVuaXZlcnNpdHkxDDAKBgNVBAsMA0NTRTETMBEGA1UEAwwKc3AyLmR1LmNvbTEnMCUGCSqGSIb3DQEJARYYbWVzYmFoLmNzZXN1c3RAZ21haWwuY29tMB4XDTIyMDYwNDE5MzAyM1oXDTMyMDYwMzE5MzAyM1owgZQxCzAJBgNVBAYTAkJEMQ4wDAYDVQQIDAVEaGFrYTEOMAwGA1UEBwwFRGhha2ExGTAXBgNVBAoMEERoYWthIFVuaXZlcnNpdHkxDDAKBgNVBAsMA0NTRTETMBEGA1UEAwwKc3AyLmR1LmNvbTEnMCUGCSqGSIb3DQEJARYYbWVzYmFoLmNzZXN1c3RAZ21haWwuY29tMIIBojANBgkqhkiG9w0BAQEFAAOCAY8AMIIBigKCAYEAzJc5ng3abezWjFTlZjK8gJFu+U7eytgAbYYKtkO30w6CjdMidcc7rXB8AWCAOjRizp/HMHHhKrk51tAItMW95chW3/4GQdTGU8eBAKfnEFh/0rJsQJqbPqaehwDTocF8CBpfHbrA9xFEH03q5rUSTYW+A5wTp9Ica/9uSf0Irob3khnKdsWiNrw+fpmRBQmleqckY2cZBfTbX+FrS8Z7Z8/3whx3Quu3TMnLyrbT7Uvkmo+5FgUx27dqHrxbkhL6Bh6V+Qw0u2yzWpX1S61Peo0OJCnqX62kTXGKyswmv2nmsnJMxCd3u7PLgzzBQoBV/q68pblTpiLc7UxL8cXJke9ItUYCIzKm05KP5CI1Hs+5wNpEXJqyVbUs8w4m6oTA19l8t85CBM1mprCCFHfHbqfleA1ze5AKG/P46ebJCw0gVz97GV5jUdK3xrnh6W8iBqyTFODiXOkEk2EMJAO5cbikAL6URogwKeQmdmITx4P7UyWVmmx+lstXDTSAkYnvAgMBAAGjUzBRMB0GA1UdDgQWBBTxR8cfVKrBqVrhqDjil/88ZcY86zAfBgNVHSMEGDAWgBTxR8cfVKrBqVrhqDjil/88ZcY86zAPBgNVHRMBAf8EBTADAQH/MA0GCSqGSIb3DQEBCwUAA4IBgQBPVndWwRFWrcFTPx9CFfvHrclx05vzYxrTGZcDBgKw1OqJKPFFZeT0SWspfn+BkIKbXtPS4gQSXL4FX5MmSpcAlZ0GpM2LAlm1ZVOe4VwlzfOM5wPBrdXx+QJY5vI6XdoV6YjrksQautbJ2Mg+ZcDMiKCwC5VxeERHa/t+jTm9YQYG6TVgLlWfxkzv429cZV3L3xlirindKXnp0Ez/0VY/TL8je2oodYaWBdlxML3RYJNFkA5OWxewPogy5LMulPe/wtGdILdGlNMaxX+/54OvmjtSlpDaqi8AhnsP/SwwtMtEjOmd4YMFs+tZ18gUHaMEyGTVuYlmX/w20Ru9R4ErCeNhSQS2ytzCzhjV913klUXm1ouoDLhq4OHCeSR+oiEZz+YZGUDOiPxTvyHXV1Q2tAvqkElyyx6pbzrRwXmmie0ivy3833EG/UR7ftHApD9dY2zDli4FFp2KNenfern48ZQG5ngDPbUv5+wzTHIy2EUaxJ50AvpZoopXTn1fD0A=',
];

// service metadata
$metadata['https://service.du.com/simplesaml/module.php/saml/sp/metadata.php/default-sp'] = [
    'SingleLogoutService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'https://service.du.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
        ],
    ],
    'AssertionConsumerService' => [
        [
            'index' => 0,
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'https://service.du.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
        ],
        [
            'index' => 1,
            'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
            'Location' => 'https://service.du.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
        ],
        [
            'index' => 2,
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
            'Location' => 'https://service.du.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
        ],
        [
            'index' => 3,
            'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
            'Location' => 'https://service.du.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
        ],
    ],
    'contacts' => [
        [
            'emailAddress' => 'mesbah.csesus@gmail.com',
            'contactType' => 'technical',
            'givenName' => 'Administrator',
        ],
    ],
    'certData' => 'MIIFEzCCA3ugAwIBAgIUJWzsCV4O8pDUB031CeAQTzeklu8wDQYJKoZIhvcNAQELBQAwgZgxCzAJBgNVBAYTAkJEMQ4wDAYDVQQIDAVEaGFrYTEOMAwGA1UEBwwFRGhha2ExGTAXBgNVBAoMEERoYWthIFVuaXZlcnNpdHkxDDAKBgNVBAsMA0NTRTEXMBUGA1UEAwwOc2VydmljZS5kdS5jb20xJzAlBgkqhkiG9w0BCQEWGG1lc2JhaC5jc2VzdXN0QGdtYWlsLmNvbTAeFw0yMjA2MjAxMDE5MDlaFw0zMjA2MTkxMDE5MDlaMIGYMQswCQYDVQQGEwJCRDEOMAwGA1UECAwFRGhha2ExDjAMBgNVBAcMBURoYWthMRkwFwYDVQQKDBBEaGFrYSBVbml2ZXJzaXR5MQwwCgYDVQQLDANDU0UxFzAVBgNVBAMMDnNlcnZpY2UuZHUuY29tMScwJQYJKoZIhvcNAQkBFhhtZXNiYWguY3Nlc3VzdEBnbWFpbC5jb20wggGiMA0GCSqGSIb3DQEBAQUAA4IBjwAwggGKAoIBgQC9XXLRkgPlhIRJeAaSt8Y+dRGxLxRHtjCONrQucrZUzEKVoGrS6pSNxXdQr/RiraElxExrUvMfVq8T/XEvRRANEIqvBceaiihvLwxkWShsEAx3uyo8MTXja+aL5lPoTK2Nc8QgDpjVKltbjeFLxI22ht/lC/nDJQimADvvIZFIE55QuPI6SNvvQFvrM6Y9UZR1D5BxYluWYQJNqVfdIQnghhhjITLqIfveZdcWVJ/rniW3psVpF9EBlQo+QKJd8FTL6jb5YHaaiy/Rzma2QdIWL1kYUdp19KzJI8ukBxehLB3YZ+E4khBTZPmRzyySmsCfgBNrINO/Abs63lfltgVSw0aJBcXGTtbUSWeQyev/UV9zknXh8LLgPREMwSytkjQrUwYpbBIEQnF0UyCk0wDVUJ+tvBhi3GMiPdKrd7Swnjuf558L7+R37SUqUeZ9IGIXu7H4aginsmfK3LgEoj1QXTZTrtZEL/5bwj0S4U1vhwGGcf3AtJ1L1gZ3cT6IBP0CAwEAAaNTMFEwHQYDVR0OBBYEFLpMspRhrXNsl4ibP0IcJLdNgahgMB8GA1UdIwQYMBaAFLpMspRhrXNsl4ibP0IcJLdNgahgMA8GA1UdEwEB/wQFMAMBAf8wDQYJKoZIhvcNAQELBQADggGBAG6z6YxA751HG4N7/Dop+eYsSPnFfrgNbIwxP4ll5D8yEP7dUS50yFzsWb0oCg06r9AmwXuBrqXnQRjHYVc1kBF/3K+apr4x0JE6S9TBXDbmLxe2WHHQKXPnto+0LtWErC+o6MrLNCu6GifQ0BFbPtdqFMGtGR03aN/CaeteAPBoy9Dix13gviAsrIFogjXdpH4eoW44uGj8bSPM/JqKgHY0yt1yOr6aOFEOysVeBtEPGCBML/fKe7y6s4UT6k66UEMKpxkqG0a0V9Rf+2L5FfbzzroIDDcbh8mNWQlCIQuZ871EFU/DU4ZbBGiglsnP7Azs6YDyLRgav68VECWQqKAHSNSWC7lqUv1HAx7+yBE4xIkEyUh2WaFsGuJOxkLf4OzvVqHJJBBoTLBwafXWFf2tRUzBWojzBju2DXy9MbmqeAjAyGIbMZU0Remcy8R1RqepBE+Ii0jzMnSnuI6CC2zNDY/dKgoXvMwfwmcyi4VnHqi8YUlHZl5JA9Aw6PTV8Q==',
];

//code metadata
$metadata['https://code.du.com/simplesaml/module.php/saml/sp/metadata.php/default-sp'] = [
    'SingleLogoutService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'https://code.du.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
        ],
    ],
    'AssertionConsumerService' => [
        [
            'index' => 0,
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'https://code.du.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
        ],
        [
            'index' => 1,
            'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
            'Location' => 'https://code.du.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
        ],
        [
            'index' => 2,
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
            'Location' => 'https://code.du.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
        ],
        [
            'index' => 3,
            'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
            'Location' => 'https://code.du.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
        ],
    ],
    'contacts' => [
        [
            'emailAddress' => 'mesbah.csesust@gmail.com',
            'contactType' => 'technical',
            'givenName' => 'Administrator',
        ],
    ],
    'certData' => 'MIIFDTCCA3WgAwIBAgIUSnrL80I1XjDWD8J5G/rsaNYTcC4wDQYJKoZIhvcNAQELBQAwgZUxCzAJBgNVBAYTAkJEMQ4wDAYDVQQIDAVEaGFrYTEOMAwGA1UEBwwFRGhha2ExGTAXBgNVBAoMEERoYWthIFVuaXZlcnNpdHkxDDAKBgNVBAsMA0NTRTEUMBIGA1UEAwwLY29kZS5kdS5jb20xJzAlBgkqhkiG9w0BCQEWGG1lc2JhaC5jc2VzdXN0QGdtYWlsLmNvbTAeFw0yMjA4MTcxODM1MTNaFw0zMjA4MTYxODM1MTNaMIGVMQswCQYDVQQGEwJCRDEOMAwGA1UECAwFRGhha2ExDjAMBgNVBAcMBURoYWthMRkwFwYDVQQKDBBEaGFrYSBVbml2ZXJzaXR5MQwwCgYDVQQLDANDU0UxFDASBgNVBAMMC2NvZGUuZHUuY29tMScwJQYJKoZIhvcNAQkBFhhtZXNiYWguY3Nlc3VzdEBnbWFpbC5jb20wggGiMA0GCSqGSIb3DQEBAQUAA4IBjwAwggGKAoIBgQDkMJJzTShlAuqzoPiMLpPe9wHcc+Q0mNzcaFues4c+if/idM8ogrxP1MpfaIejofuLRHBKCEA6jl1WGTUhWgJU9tCRSIfPqlFXRF+ko4yLoyPQuKpEsNy2Yjy3NpB4slwoZbIoe9cVTCYJpIxy/BJXvhO7ezXU6pp2ttf1kUgy0N0IM7HSDqSjugkg8h8BaYuLBFY2qePUnG/IabcOnRSoIcWkIx+HNbnmgQ1H/LD/RWxbUruQOF9AfxKJ8q3j9RYSH0TgrJ6l1PCExWR44ez3afgZ5NvhsI2/TgbtSkaYRfzyhUYpxagInNL0KB3QG4smUTgmCWEjXpDM1M8kVe0l3eHIUnt5gdFZd+TyKogzYfC0Nb7r/VyEXpU4xtJaOhxNpVPecMK8RUYdvX33OX++/2MbGNAjwHE4nIRrOyL0ffJKFtaY2nJcRmoFopHQsFxddGylhqxSJGZ2qHNEZzhNO96X4S/J/aMwBu/w9/9O/ZCrujU3u5NkaJ6pfAS56JMCAwEAAaNTMFEwHQYDVR0OBBYEFAedYF3YojoYATSKhiD+XscbLK5gMB8GA1UdIwQYMBaAFAedYF3YojoYATSKhiD+XscbLK5gMA8GA1UdEwEB/wQFMAMBAf8wDQYJKoZIhvcNAQELBQADggGBADpmpMRDG3DUEaOoLBLySDGOAr5D28IBFavIruj4QzcyjavoPjsVhcICW0K32lUk8HTIxQUKHh3rd4xDM+LxKvRXGDTqGD6qZYGQAKRPvEoVtGxlLHN2gvPaymJc+y6zgKGgVVPn71WNlaWjq4leCZ8j2dXc94cPC05yDmJ8M5EpXlkmQGaFmQsKqv1PZPTPBqgruro4Fuzv8fVMg/QGd/3zhrcBeRrF70LGOHAegN58/o0DMZgHmwTiz5QULHX3D12DoOtzgpD6DmMOFS8hUC4bOwNrodv2ji+HN/e1Zfc8a5ixbaQZGCzlmTPyUlq9HxIcZvJ+gquKVmDG2BvJ4IkwityuRS/a2gI+/fOVD4TPq0mL3hWilj9ANmwQaMGvAbXSycKilZ8bbVkiHkbglDHGM1XV5smhYWkng3/fM6iSQfz1H9rbbZyZgYQ14c9Vma2C+AH8Cur8zs0aPanPi7Y7zl1kk15xknrNcvA3youKV93in6zHWaHwgkqssZAyhA==',
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
