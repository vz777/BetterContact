# Better Contact

This module provides an enriched contact form, with the following fields :

- Last name
- First name
- Company
- Function
- Address
- Zip code
- City
- Country
- E-mail address
- Phone
- Message 

All fields are required.

A mailing tempate (bettercontact.mail_template) is provided, instead of generating
the email from the controller code.

## Integration

The module provides the better-contact.html template, which extends the base contact.html template, 
and replace the basic contact form with the module's one (e.g., the content of the "contact.form" block). Thus, if you're using
the default Thelia 2 template, you have nothing to do :)
