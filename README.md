<br />
<div align="center">
  <a href="https://github.com/bayunashr/pioniir">
    <img src="https://i.ibb.co/1KWfv9m/pioniir.png" alt="Logo" width="100" height="100">
  </a>

  <h3 align="center">Pioniir</h3>

  <p align="center">
    Fan-Based Funding Platform, Written With CodeIgniter 4
    <br />
  </p>
</div>

<div align="center">

[![Contributors][contributors-shield]][contributors-url]
[![Stargazers][stars-shield]][stars-url]
[![MIT License][license-shield]][license-url]

</div>

## Getting Started

To get a local copy up and running follow these simple example steps.

1. Clone the repo
   ```sh
   git clone https://github.com/bayunashr/pioniir.git && cd pioniir
   ```
2. Install dependency
   ```sh
   composer install
   ```
3. Clone `env.example` and rename to `.env`
4. Adjust the `.env` as you need
   ```env
   CI_ENVIRONMENT = development
   app.baseURL = 127.0.0.1
   database.default.hostname = 127.0.0.1
   database.default.database = pioniir
   database.default.username = user
   database.default.password = password
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```
5. Run database migration and seed
   ```sh
   php spark run:migration-seed
   ```
6. Run the app, by default `php spark serve` run on port 8080
   ```sh
   php spark serve
   ```

[contributors-shield]: https://img.shields.io/github/contributors/bayunashr/pioniir.svg?style=for-the-badge
[contributors-url]: https://github.com/bayunashr/pioniir/graphs/contributors
[stars-shield]: https://img.shields.io/github/stars/bayunashr/pioniir.svg?style=for-the-badge
[stars-url]: https://github.com/bayunashr/pioniir/stargazers
[license-shield]: https://img.shields.io/github/license/bayunashr/pioniir.svg?style=for-the-badge
[license-url]: https://github.com/bayunashr/pioniir/blob/master/LICENSE.txt
