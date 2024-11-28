# Travel Website Test Cases

## Test Scenario 1: Verify Phone Number Validation

### Prerequisites:
- Access to visitor app

### Test Data:
| S # | Test Data |
|-----|-----------|
| 1 | Phone Number = 09283490895 |
| 2 | Phone Number = 01983490894 |
| 3 | Phone Number = 09283490 |
| 4 | Phone Number = 11111111111 |
| 5 | Phone Number = 0173428415R |
| 6 | Phone Number = 0173428415@ |
| 7 | Phone Number = 01734284153 |

### Test Steps:
| Step # | Step Details | Expected Results | Actual Results | Pass/Fail |
|--------|--------------|------------------|----------------|-----------|
| 1 | Given, Phone Number = 09283490895 | Phone number must be 11 digits and start with 013/014/015/016/017/018/019 | Not As Expected, Phone number must start with 013/014/015/016/017/018/019 | Fail |
| 2 | Given, Phone Number = 01983490894 | Phone number must be 11 digits and start with 013/014/015/016/017/018/019 | Not As Expected, More than 11 digits given | Fail |
| 3 | Given, Phone Number = 09283490 | Phone number must be 11 digits | Not As Expected, less than 11 digits given | Fail |
| 4 | Given, Phone Number = 11111111111 | All digits should not be same | Not As Expected, All digits are same | Fail |
| 5 | Given, Phone Number = 0173428415R | No characters allowed | Not As Expected, Entered Character | Fail |
| 6 | Given, Phone Number = 0173428415@ | No special characters allowed | Not As Expected, entered Special Character | Fail |
| 7 | Given, Phone Number = 01734284153 | Valid phone number format | As Expected | Pass |

## Test Scenario 2: Verify Email Validation

### Prerequisites:
- Access to visitor app

### Test Data:
| S # | Test Data |
|-----|-----------|
| 1 | Email Address = @domainsample.com |
| 2 | Email Address = muhitdomainsample.com |
| 3 | Email Address = muhit.rahman@.net |
| 4 | Email Address = muhit.rahman007@domainsample |
| 5 | Email Address = muhit.rahman007@domainsample.com |

### Test Steps:
| Step # | Step Details | Expected Results | Actual Results | Pass/Fail |
|--------|--------------|------------------|----------------|-----------|
| 1 | Given, Email Address = @domainsample.com | A valid email address has recipient name | Not As Expected, The recipient name is missing | Fail |
| 2 | Given, Email Address = muhitdomainsample.com | Must contain @ symbol | Not As Expected, The @ symbol is missing | Fail |
| 3 | Given, Email Address = muhit.rahman@.net | Must have valid domain name | Not As Expected, Invalid domain format | Fail |
| 4 | Given, Email Address = muhit.rahman007@domainsample | Must have top-level domain | Not As Expected, The top-level domain is missing | Fail |
| 5 | Given, Email Address = muhit.rahman007@domainsample.com | Valid email format | As Expected | Pass |

## Test Scenario 3: Verify Password Validation

### Prerequisites:
- Access to visitor app

### Test Data:
| S # | Test Data |
|-----|-----------|
| 1 | Password = pass123 |
| 2 | Password = PASSWORD123 |
| 3 | Password = Password |
| 4 | Password = 12345678 |
| 5 | Password = Pass@123 |

### Test Steps:
| Step # | Step Details | Expected Results | Actual Results | Pass/Fail |
|--------|--------------|------------------|----------------|-----------|
| 1 | Given, Password = pass123 | Must contain at least one uppercase letter | Not As Expected, Missing uppercase letter | Fail |
| 2 | Given, Password = PASSWORD123 | Must contain at least one lowercase letter | Not As Expected, Missing lowercase letter | Fail |
| 3 | Given, Password = Password | Must contain at least one number | Not As Expected, Missing number | Fail |
| 4 | Given, Password = 12345678 | Must contain at least one letter | Not As Expected, Missing letter | Fail |
| 5 | Given, Password = Pass@123 | Valid password format | As Expected | Pass |

## Test Scenario 4: Verify User Registration

### Prerequisites:
- Access to visitor app
- Valid email and phone number

### Test Data:
| S # | Test Data |
|-----|-----------|
| 1 | Name = "", Email = valid@email.com, Phone = 01734284153 |
| 2 | Name = "John Doe", Email = invalid.email, Phone = 01734284153 |
| 3 | Name = "John Doe", Email = valid@email.com, Phone = 123 |
| 4 | Name = "John Doe", Email = valid@email.com, Phone = 01734284153 |

### Test Steps:
| Step # | Step Details | Expected Results | Actual Results | Pass/Fail |
|--------|--------------|------------------|----------------|-----------|
| 1 | Submit registration with empty name | Name field is required | Not As Expected, Empty name field | Fail |
| 2 | Submit registration with invalid email | Valid email required | Not As Expected, Invalid email format | Fail |
| 3 | Submit registration with invalid phone | Valid phone number required | Not As Expected, Invalid phone format | Fail |
| 4 | Submit registration with valid data | Registration successful | As Expected | Pass |

## Test Scenario 5: Verify Login Functionality

### Prerequisites:
- Registered user account
- Valid credentials

### Test Data:
| S # | Test Data |
|-----|-----------|
| 1 | Email = "", Password = "Pass@123" |
| 2 | Email = "valid@email.com", Password = "" |
| 3 | Email = "wrong@email.com", Password = "Pass@123" |
| 4 | Email = "valid@email.com", Password = "WrongPass@123" |
| 5 | Email = "valid@email.com", Password = "Pass@123" |

### Test Steps:
| Step # | Step Details | Expected Results | Actual Results | Pass/Fail |
|--------|--------------|------------------|----------------|-----------|
| 1 | Login with empty email | Email field is required | Not As Expected, Empty email field | Fail |
| 2 | Login with empty password | Password field is required | Not As Expected, Empty password field | Fail |
| 3 | Login with wrong email | Invalid credentials message | Not As Expected, Email not found | Fail |
| 4 | Login with wrong password | Invalid credentials message | Not As Expected, Wrong password | Fail |
| 5 | Login with valid credentials | Login successful | As Expected | Pass |

## Test Scenario 6: Verify Booking Process

### Prerequisites:
- Logged in user
- Available tour packages

### Test Data:
| S # | Test Data |
|-----|-----------|
| 1 | Package = "", Date = "2024-03-01", Guests = 2 |
| 2 | Package = "Beach Tour", Date = "2023-01-01", Guests = 2 |
| 3 | Package = "Beach Tour", Date = "2024-03-01", Guests = 0 |
| 4 | Package = "Beach Tour", Date = "2024-03-01", Guests = 21 |
| 5 | Package = "Beach Tour", Date = "2024-03-01", Guests = 2 |

### Test Steps:
| Step # | Step Details | Expected Results | Actual Results | Pass/Fail |
|--------|--------------|------------------|----------------|-----------|
| 1 | Book with no package selected | Package selection required | Not As Expected, No package selected | Fail |
| 2 | Book with past date | Future date required | Not As Expected, Past date selected | Fail |
| 3 | Book with 0 guests | Minimum 1 guest required | Not As Expected, Invalid guest count | Fail |
| 4 | Book with too many guests | Maximum 20 guests allowed | Not As Expected, Too many guests | Fail |
| 5 | Book with valid data | Booking successful | As Expected | Pass |

## Test Scenario 7: Verify Payment Process

### Prerequisites:
- Confirmed booking
- Valid payment details

### Test Data:
| S # | Test Data |
|-----|-----------|
| 1 | Card = "", Expiry = "12/24", CVV = "123" |
| 2 | Card = "4242424242424242", Expiry = "12/22", CVV = "123" |
| 3 | Card = "4242424242424242", Expiry = "12/24", CVV = "" |
| 4 | Card = "4000000000000002", Expiry = "12/24", CVV = "123" |
| 5 | Card = "4242424242424242", Expiry = "12/24", CVV = "123" |

### Test Steps:
| Step # | Step Details | Expected Results | Actual Results | Pass/Fail |
|--------|--------------|------------------|----------------|-----------|
| 1 | Payment with empty card number | Card number required | Not As Expected, Empty card number | Fail |
| 2 | Payment with expired card | Valid expiry date required | Not As Expected, Expired card | Fail |
| 3 | Payment with empty CVV | CVV required | Not As Expected, Empty CVV | Fail |
| 4 | Payment with declined card | Card declined message | Not As Expected, Payment failed | Fail |
| 5 | Payment with valid card | Payment successful | As Expected | Pass |

## Test Scenario 8: Verify Review Submission

### Prerequisites:
- Completed tour
- Logged in user

### Test Data:
| S # | Test Data |
|-----|-----------|
| 1 | Rating = 0, Comment = "Great tour!" |
| 2 | Rating = 5, Comment = "" |
| 3 | Rating = 5, Comment = "A" |
| 4 | Rating = 5, Comment = "Great tour experience, highly recommended!" |

### Test Steps:
| Step # | Step Details | Expected Results | Actual Results | Pass/Fail |
|--------|--------------|------------------|----------------|-----------|
| 1 | Submit review without rating | Rating is required | Not As Expected, No rating selected | Fail |
| 2 | Submit review without comment | Comment is required | Not As Expected, Empty comment | Fail |
| 3 | Submit review with short comment | Comment too short | Not As Expected, Comment length < 10 chars | Fail |
| 4 | Submit review with valid data | Review submitted successfully | As Expected | Pass |

## Test Scenario 9: Verify Profile Update

### Prerequisites:
- Logged in user
- Access to profile settings

### Test Data:
| S # | Test Data |
|-----|-----------|
| 1 | Name = "", Phone = "01734284153" |
| 2 | Name = "John Doe", Phone = "123" |
| 3 | Name = "John Doe", Phone = "01734284153", Profile Picture = "large_file.jpg" |
| 4 | Name = "John Doe", Phone = "01734284153", Profile Picture = "valid.jpg" |

### Test Steps:
| Step # | Step Details | Expected Results | Actual Results | Pass/Fail |
|--------|--------------|------------------|----------------|-----------|
| 1 | Update profile with empty name | Name is required | Not As Expected, Empty name field | Fail |
| 2 | Update profile with invalid phone | Valid phone number required | Not As Expected, Invalid phone format | Fail |
| 3 | Update with large profile picture | File size must be < 2MB | Not As Expected, File too large | Fail |
| 4 | Update with valid data | Profile updated successfully | As Expected | Pass |

## Test Scenario 10: Verify Admin Tour Management

### Prerequisites:
- Admin login
- Access to tour management

### Test Data:
| S # | Test Data |
|-----|-----------|
| 1 | Name = "", Price = "1000", Description = "Tour details" |
| 2 | Name = "Beach Tour", Price = "0", Description = "Tour details" |
| 3 | Name = "Beach Tour", Price = "1000", Description = "" |
| 4 | Name = "Beach Tour", Price = "1000", Description = "Tour details" |

### Test Steps:
| Step # | Step Details | Expected Results | Actual Results | Pass/Fail |
|--------|--------------|------------------|----------------|-----------|
| 1 | Create tour without name | Tour name required | Not As Expected, Empty name field | Fail |
| 2 | Create tour with invalid price | Price must be > 0 | Not As Expected, Invalid price | Fail |
| 3 | Create tour without description | Description required | Not As Expected, Empty description | Fail |
| 4 | Create tour with valid data | Tour created successfully | As Expected | Pass | 