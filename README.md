## About Online Publishing Platform

Laravel simple online publishing platform(something like medium) with a membership option. The platform will offer free membership and premium membership to the members. Free members will be able to create 2 posts daily whereas premium members will be able to create unlimited posts.

### Features
- Create Post (members will be able to create posts based on their membership quota.)
- Membership Plan (free members can update to the premium plan and premium members can downgrade to the free plan)
- Scheduling (premium members will be able to schedule their posts and the posts will be automatically published at their scheduled time.)
- Mailing (admin will receive mail once a member publishes a post.)


### Tools & Technologies

<p align="left">
  <img src="https://img.shields.io/static/v1?label=Laravel&message=^9.19&color=red">
  <img src="https://img.shields.io/static/v1?label=Bootstrap&message=4&color=">
  <img src="https://img.shields.io/static/v1?label=Vue&message=3&color=red">
</p>


### Run Locally

Clone the project

```bash
  git clone https://github.com/mesbaulislamrony/online-publishing-platform
```

Go to the project directory

```bash
  cd online-publishing-platform
```

Install dependencies

```bash
  composer update
```

```bash
  npm install
```

### Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`CACHE_DRIVER=database`

`QUEUE_CONNECTION=database`

`MAIL_MAILER=smtp`

`MAIL_HOST=sandbox.smtp.mailtrap.io`

`MAIL_PORT=2525`

`MAIL_USERNAME=your_username`

`MAIL_PASSWORD=your_password`

`DB_DATABASE=your_database_name`

`DB_USERNAME=your_database_username`

`DB_PASSWORD=your_database_password`


### Start the server

```bash
  npm run dev
```

```bash
  php artisan serve
```

```bash
  php artisan queue:listen --queue=article-scheduling
```

