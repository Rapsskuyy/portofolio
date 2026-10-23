# Raffa Nur Musyaffa — Portfolio

This repository contains the personal portfolio and scholarship dossier of **Raffa Nur Musyaffa**, a Software Engineering student with an interest in backend systems, web application development, system architecture, and student leadership.

The website is designed to be more than a static resume. It combines personal storytelling, academic background, project evidence, organizational experience, and a small content-management system into one cohesive portfolio experience. The visual direction uses a dark navy interface with indigo and violet accents, expressive profile photography, restrained motion, and responsive layouts for desktop, tablet, and mobile screens.

Live site: [raffanm17.my.id](https://www.raffanm17.my.id)

## Project purpose

The main purpose of this project is to present Raffa's background and capabilities in a way that feels personal, interactive, and easy to explore. Visitors can move from a short introduction into detailed sections about education, technical skills, projects, event documentation, and organizational responsibilities.

The portfolio is also used as a practical demonstration of how a Laravel application can combine server-rendered content, database-driven sections, responsive frontend behavior, multilingual copy, media assets, and protected administrative workflows.

## Main features

- A focused homepage with a dynamic hero profile image, intro splash screen, role rotation, floating capability cards, animated tool icons, scroll guidance, and section transitions.
- Dedicated sections for About, Education, Skills, Gallery, Projects, Experience, and Contact.
- Responsive composition for large desktop displays, tablets, and narrow mobile screens.
- Desktop sidebar navigation with an expanded interaction model and a compact mobile bottom navigation.
- English and Indonesian interface support through a language toggle and synchronized translation content.
- Database-driven portfolio records for education, skills, projects, coding projects, testimonials, posts, guestbook entries, and supporting content.
- A protected admin panel for reviewing and managing portfolio content without editing the public templates manually.
- Project detail views that can present repositories, technology stacks, architecture notes, schemas, snippets, and supporting documentation.
- Public guestbook and testimonial interactions with validation, moderation, and request throttling.
- WebP-based profile, project, gallery, and technology images to keep the visual experience lighter while preserving the intended presentation quality.
- Accessibility-conscious interaction patterns, including semantic navigation, visible focus states, progress-bar metadata, responsive touch targets, and reduced-motion handling.

## Technology stack

### Application layer

- PHP 8.2+
- Laravel 12
- Blade templates
- Eloquent ORM
- Laravel controllers, middleware, validation, throttling, sessions, cache, and queues

### Frontend layer

- Custom CSS for the portfolio visual system and responsive layout
- Vanilla JavaScript for navigation, language switching, image rotation, modals, scroll behavior, and section motion
- Bootstrap utilities where they are useful inside the Blade views
- Font Awesome icons
- Vite for frontend asset tooling
- Tailwind CSS tooling for application assets and supporting interface work

### Data and media

- Configurable MySQL, PostgreSQL/Supabase, or SQLite database connections
- Eloquent models for portfolio, education, skill, project, post, testimonial, and guestbook data
- Local filesystem storage for development
- Supabase Storage and other S3-compatible storage options for public media assets

## Public experience

The public portfolio is organized as a scroll-based narrative. The homepage introduces the person and the primary calls to action, while the following sections add progressively deeper context. Education and skills establish the academic and technical foundation; gallery and project sections provide evidence of practical work; experience highlights organizational involvement; and the contact section closes the journey with direct ways to connect.

Motion is used as orientation rather than decoration. The splash screen creates a short opening moment, image rotation keeps the hero personal, and scroll transitions help visitors understand movement between sections without hiding the content itself. The layout also respects reduced-motion preferences.

## Content management

The admin area supports the operational side of the portfolio. It includes protected workflows for managing gallery projects, coding project records, project details, posts, guestbook entries, testimonials, and related content. This keeps public pages focused on presentation while allowing the portfolio data to evolve independently.

## Repository structure

```text
app/                    Controllers, models, middleware, and services
database/               Migrations, factories, and seeders
public/                 CSS, JavaScript, images, icons, and public files
resources/lang/         English and Indonesian translation files
resources/views/        Portfolio, admin, and layout Blade templates
routes/                 Web and console route definitions
scripts/                Project utility and build-related scripts
tests/                  Laravel feature/unit tests and browser-oriented suites
```

This project represents both a personal portfolio and an ongoing engineering exercise: the content communicates who Raffa is, while the application architecture demonstrates how he approaches interfaces, backend workflows, data organization, and maintainable web development.
