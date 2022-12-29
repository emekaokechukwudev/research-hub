<a name="readme-top"></a>

# Research Hub

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#introduction">Introduction</a></li>
        <li><a href="#features">Features</a></li>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>


## About The Project

### Introduction

Research Hub is a comprehensive web application that provides features for conducting research, collaborating with other researchers, and accessing valuable resources. Whether you're a researcher or a research administrator, it can help you achieve your goals.

<p>Check out the deployment of the project <a href="https://research-hub.000webhostapp.com" target="_blank">here</a>.</p>


### Features

#### Researchers

- Manage research from hypothesis to publication
- Collaborate with other researchers
- View list of vetted grants
- Submit form for grant assistance
- View events and news
- Manage user profile

#### Administrators

- Manage grants, events and news
- View list of active users
- Manage user profile

### Built With

- PHP
- HTML
- CSS
- JavaScript
- Bootstrap
- Font Awesome
- jQuery

<p align="right">(<a href="#readme-top">back to top</a>)</p>


## Getting Started

### Prerequisites

XAMPP (highly recommended for local deployment). Download [here](https://www.apachefriends.org/download.html).

### Installation

1. Clone the repo inside XAMPP htdocs folder. Make sure the project folder name is `research-hub`

```sh
git clone https://github.com/emeka-okechukwu-dev/research-hub.git
```

2. Generate a free Google App password [here](https://support.google.com/mail/answer/185833?hl=en)

3. Enter your environment details in `env.php`

```php
if (!defined('DATABASE_NAME')) define('DATABASE_NAME', 'ENTER YOUR DATABASE NAME');
if (!defined('DATABASE_SERVER')) define('DATABASE_SERVER', 'ENTER YOUR DATABASE SERVER');
if (!defined('DATABASE_USERNAME')) define('DATABASE_USERNAME', 'ENTER YOUR DATABASE USERNAME');
if (!defined('DATABASE_PASSWORD')) define('DATABASE_PASSWORD', 'ENTER YOUR DATABASE PASSWORD');

if (!defined('GMAIL_USERNAME')) define('GMAIL_USERNAME', 'ENTER YOUR GMAIL USERNAME');
if (!defined('GMAIL_APP_PASSWORD')) define('GMAIL_APP_PASSWORD', 'ENTER YOUR GOOGLE APP PASSWORD');

if (!defined('LOCALHOST_ADDRESS')) define('LOCALHOST_ADDRESS', 'ENTER YOUR LOCALHOST ADDRESS');
if (!defined('SUPER_ADMIN_EMAIL')) define('SUPER_ADMIN_EMAIL', 'ENTER YOUR SUPER ADMIN EMAIL');
```

<p align="right">(<a href="#readme-top">back to top</a>)</p>


## Roadmap

- [ ] Allow users to upload their profile photo
- [ ] Alert when pending or inactive users try to log in
- [ ] Display who last modified a research
- [ ] 403 error page when users do not have permission to view protected page
- [ ] Add 'remember me' login functionality
- [ ] Pop-up modal for emailing other researchers without leaving browser
- [ ] Auto-save feature when entering research details

<p align="right">(<a href="#readme-top">back to top</a>)</p>


## Contributing

Every contribution is appreciated. If you have an idea for improving the project, please fork the repository and create a pull request or open an issue with the tag "enhancement" to share your suggestion.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#readme-top">back to top</a>)</p>


## Contact

Emeka Okechukwu - chuks.egkdev@gmail.com

<p align="right">(<a href="#readme-top">back to top</a>)</p>
