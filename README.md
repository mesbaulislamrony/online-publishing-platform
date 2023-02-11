## About Online Publishing Platform

Laravel simple online publishing platform(something like medium) with a membership option. The platform will offer free membership and premium membership to the members. Free members will be able to create 2 posts daily whereas premium members will be able to create unlimited posts.

### Features
- Create Post (members will be able to create posts based on their membership quota.)
- Membership Plan (free members can update to the premium plan and premium members can downgrade to the free plan)
- Scheduling (premium members will be able to schedule their posts and the posts will be automatically published at their scheduled time)
- Mailing (admin will receive mail once a member publishes a post)
- Cache (Posts are loaded using Laravel cache)


### Tools & Technologies

<p align="left">
  <img src="https://img.shields.io/static/v1?label=PHP&message=^8.0.2&color=red">
  <img src="https://img.shields.io/static/v1?label=Laravel&message=^9.19&color=red">
  <img src="https://img.shields.io/static/v1?label=Stripe&message=^14.8&color=">
  <img src="https://img.shields.io/static/v1?label=Bootstrap&message=5.3.0-alpha1&color=">
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

### Environment Variables

To run this project, you will need to add the following environment variables to your .env file

For cache and queue
```bash
CACHE_DRIVER=database
QUEUE_CONNECTION=database
```

For mailer

```bash
MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
```

For database

```bash
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

For stripe

```bash
FREE_PLAN_STRIP_ID=your-free-plan-stripe-id
PREMIUM_PLAN_STRIP_ID=your-premium-plan-stripe-id
STRIPE_KEY=your-stripe-key
STRIPE_SECRET=your-stripe-secret
STRIPE_WEBHOOK_SECRET=your-stripe-webhook-secret
```

### Start the server

```bash
  php artisan serve
```

```bash
  php artisan queue:listen --queue=article-scheduling
```

### Card Reference

```bash
  4242 4242 4242 4242
```

```bash
  04 / 28
```

```bash
  123
```

```bash
  40248
```