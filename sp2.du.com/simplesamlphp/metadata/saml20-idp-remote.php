<?php

/**
 * SAML 2.0 remote IdP metadata for SimpleSAMLphp.
 *
 * Remember to remove the IdPs you don't use from this file.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-remote
 */
$metadata['https://idp.du.com/simplesaml/saml2/idp/metadata.php'] = [
    'metadata-set' => 'saml20-idp-remote',
    'entityid' => 'https://idp.du.com/simplesaml/saml2/idp/metadata.php',
    'SingleSignOnService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'https://idp.du.com/simplesaml/saml2/idp/SSOService.php',
        ],
    ],
    'SingleLogoutService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'https://idp.du.com/simplesaml/saml2/idp/SingleLogoutService.php',
        ],
    ],
    'certData' => 'MIIFCzCCA3OgAwIBAgIUF4tQq0jH26vJ6wRcFngCDYHOtiAwDQYJKoZIhvcNAQELBQAwgZQxCzAJBgNVBAYTAkJEMQ4wDAYDVQQIDAVEaGFrYTEOMAwGA1UEBwwFRGhha2ExGTAXBgNVBAoMEERoYWthIFVuaXZlcnNpdHkxDDAKBgNVBAsMA0NTRTETMBEGA1UEAwwKaWRwLmR1LmNvbTEnMCUGCSqGSIb3DQEJARYYbWVzYmFoLmNzZXN1c3RAZ21haWwuY29tMB4XDTIyMDUzMDE4MDcwNFoXDTMyMDUyOTE4MDcwNFowgZQxCzAJBgNVBAYTAkJEMQ4wDAYDVQQIDAVEaGFrYTEOMAwGA1UEBwwFRGhha2ExGTAXBgNVBAoMEERoYWthIFVuaXZlcnNpdHkxDDAKBgNVBAsMA0NTRTETMBEGA1UEAwwKaWRwLmR1LmNvbTEnMCUGCSqGSIb3DQEJARYYbWVzYmFoLmNzZXN1c3RAZ21haWwuY29tMIIBojANBgkqhkiG9w0BAQEFAAOCAY8AMIIBigKCAYEA0mTfLsprrps9G6zIfLlJZCxUGrhdh8MZu3eJrb2/y8A4r30v6fvxHyQiZpVcnOUAaNFhBOUwJgxFZiTxfGPlD4W4hOWm3MzPFdftJhbNlvG28HAscGkyliRoD2GB3YTPCX56VLTa4Dsp+YdY/u0EgP6V+Pf8+IHHxLxUyzdUrGkKAPB9KedmAC5oigJmByCeYlxTAkOt0jDy7FN6Hd0x2PvqXSp9Ael8gM+buFcWose/ABzt8RMhAV4OTLmXABUQlkA35Ieeg9kPV1eG5yCCrx6E4QL36suM/yn5oNEaTQLe4Ys/tmLFzzRYlee0gECDyj8ETGECloLtDXfR+gILPT3nT6t9NxaxfG5I/wdAv62UFaJP8cVF3etqp2roTHYNGezLmxSRTEWrGQu8Xqn6Jcw9VOWfLGmRKTQebsSM1OuaNvQ0P5WiTz0iQtW1DJC+sYO5w5lId+UCAyYNhfEpKfzqhKGIFkgTWyEYvNu+DkF8QELQt5AzsIJ2jYlo4By7AgMBAAGjUzBRMB0GA1UdDgQWBBRA1FonD+2SEmvD28+dEhDL0K4HrzAfBgNVHSMEGDAWgBRA1FonD+2SEmvD28+dEhDL0K4HrzAPBgNVHRMBAf8EBTADAQH/MA0GCSqGSIb3DQEBCwUAA4IBgQCK8vRiUvueqgLg21W16Wy/7oKpOCP+JY6t7ygka5mvxETtIU8ArXY/x5DZeY2gPxrIWhFY9v0zJf9ENtjEKRpzOBqF7g5qaqXsRuNkFadZyjcIH6dUuIVY7MKHjOp3TCQ2In174AOIgykpNlYvxpOGqMBxnGFWtG6/IblcfDcxmLA2Kep+r/g2HcN8iTvSKo9s3TM1OyL2uLy29g4C4WK8fFV4rsIrHREG3EhjsOip3Yie2PcKc+Pzq2g82qaJb/Dve0DMeC9GSVc3eIoGIJFYpre7GJyAuKa7bEZbSq8+n9gTbZFlnzMhNt1AgwY3/MfAryp4RWvSQTSqkJmO5erPUNRJBJfh054I8ygjhRCDoHZ4sBU7lBYw7ROYiOoIwdjF+ChWB2PfSzuAXDfRv9gwex2r65lDT2XqM0ho9FG5J5pdXaTg2VaUwUXrUkEYmVdvQOuq4ITnw/A6q952uRmYGTqfbzWyd2zWO7lIgZPXkop4TxKrgaVRCYLf8g9Ti+8=',
    'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:transient',
    'contacts' => [
        [
            'emailAddress' => 'mesbah.csesust@gmail.com',
            'contactType' => 'technical',
            'givenName' => 'Mesbah',
        ],
    ],
];