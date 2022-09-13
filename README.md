# fabricSimpleSAMLphp
**A custom authentication module with authentication source that will help to establish a connection between SimpleSAMLPHP and Hyperledger Fabric** 

SimpleSAMLphp is an open-source PHP authentication application that provides support for SAML 2.0 as a Service Provider (SP) or Identity Provider (IdP).

SAML (Security Assertion Markup Language) is a secure XML-based communication mechanism for exchanging authentication and authorization data between organizations and applications. It’s often used to implement Web SSO (Single Sign On). This eliminates the need to maintain multiple authentication credentials across multiple organizations. Simply put, you can use one identity, like a username and password, to access multiple applications.

## Prerequisites
To continue with SimpleSAMLphp configuration, you have to these things in your device.
- Linux Operating System: Ubuntu 18.04/ Ubuntu 20.04
- Apache Web Server: [Securing Apache Web Server](https://github.com/buckbeak99/Securing-Apache-Server)
- PHP 
- SimpleSAMLphp: [SimpleSAMLphp installation and configuration](https://github.com/buckbeak99/SimpleSAMLphp-Installation-Configuration)
- Hyperledger Fabric: [Hyperledger Fabric Read the docs](https://hyperledger-fabric.readthedocs.io/en/release-2.2/)  

![Linux](https://img.shields.io/badge/linux-%FCC624.svg?style=for-the-badge&logo=linux&logoColor=black&color=FCC624)
![Hyperledger Fabric](https://img.shields.io/badge/hyperledger_fabric-2F3134?style=for-the-badge&logo=hyperledger&logoColor=white)
![Apache](https://img.shields.io/badge/apache-%23D42029.svg?style=for-the-badge&logo=apache&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)

## Implementing custom authentication module

To start working with this module, we have to install the **Prerequisites**. Once we have done with it, our macheine is on!  

Now, follow [Securing Apache Web Server](https://github.com/buckbeak99/Securing-Apache-Server) to setup apache initials. After that, please move to 
[SimpleSAMLphp installation and configuration](https://github.com/buckbeak99/SimpleSAMLphp-Installation-Configuration) for completing the initial set up for SimpleSAMLphp.

**Make sure, you don't miss any steps during the setup**

For our task, we'll make two SP and one IDP.
Our primary concern will now only be IDP following the metadata exchange between sp and IDP.
An instruction manual for building a unique username/password authentication source for SimpleSAMLphp is provided here.
The task of authenticating the user falls on an authentication source, which normally does so by obtaining the user's login and password and checking it against a database.
Here, we will test our custom module using the MySQL database so that we can determine its functionality.   

### Create a custom module
 A module should contain all of the customized code for SimpleSAMLphp.
By doing this, you can upgrade your SimpleSAMLphp installation without wiping out your own code. 
We'll use the name `custommodule` for the module in this example. It will be found in the `modules/custommodule` section.
First we need to create the module directory:   
```bash
cd modules
mkdir custommodule
```
Since this is a custom module, it should always be enabled. 
Therefore we create a default-enable file in the module. We do that by copying the 'default-enable' file from the core module. 
```bash
cd custommodule
sudo cp ./simplesamlphp/modules/core/default-enable .
```
 Now that we have our own module, we can move on to creating an authentication source.
 
 
