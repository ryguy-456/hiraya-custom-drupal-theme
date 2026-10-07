# HIRAYA — Drupal 11 Portfolio

A custom Drupal 11 portfolio demonstrating modern Drupal development, custom theming, structured content, Symfony-based API development, and a decoupled React frontend.

HIRAYA began as a traditional Drupal portfolio and evolved into a headless architecture where Drupal manages structured content while a separate React application consumes Drupal content through a custom JSON API.

## Overview

HIRAYA demonstrates practical experience across the Drupal development stack, including:

- Drupal 11
- Custom Drupal theming
- Twig templates
- PHP
- Custom Drupal modules
- Symfony controllers and routing
- Drupal Entity API
- Structured content types
- JSON APIs
- Responsive HTML/CSS
- Accessibility-conscious development
- Composer
- Drush
- Git / GitHub
- DDEV
- Pantheon

## Architecture

The project supports both a traditional Drupal presentation layer and a decoupled React frontend.

### Traditional Drupal

```text
Drupal 11
   │
   ├── Structured Content
   ├── Custom Modules
   └── HIRAYA Theme
          │
          ▼
        Twig
          │
          ▼
       Browser
```

### Headless Architecture

```text
Drupal 11
   │
   │ Content
   ▼
Symfony Controller
   │
   │ JSON
   ▼
React + Vite
   │
   ▼
Vercel
```

This allows Drupal to function as the content management system while React independently handles the frontend presentation.

## Custom Drupal Theme

The HIRAYA theme is located at:

```text
web/themes/custom/hiraya
```

The theme includes:

- Custom Twig templates
- Responsive layouts
- Reusable page sections
- Custom navigation
- Hero sections
- Project presentation
- Experience and skills sections
- Contact section
- Custom footer
- Responsive styling
- Interactive frontend effects

The theme is designed around reusable Drupal regions and templates rather than relying entirely on hard-coded page markup.

## Custom API Module

HIRAYA includes a custom Drupal module:

```text
web/modules/custom/hiraya_api
```

The module provides API routes for the headless React application.

### Routes

```text
GET /api/hello
GET /api/projects
```

The projects endpoint retrieves published Drupal Project content using Drupal's Entity API and returns the results as JSON.

Example:

```json
[
  {
    "id": "4",
    "title": "Symfony API Integration",
    "description": "A Drupal and Symfony API integration demonstrating custom routing, Symfony controllers, Drupal's Entity API, JSON responses, and a React headless frontend."
  }
]
```

## Symfony Integration

Drupal uses Symfony components as part of its underlying framework.

For the HIRAYA API, a custom Symfony controller handles the `/api/projects` route.

The controller:

1. Receives the API request.
2. Uses Drupal's Entity API to load published Project nodes.
3. Extracts the relevant content.
4. Builds a JSON response.
5. Returns the response to the React frontend.

Conceptually:

```text
Browser / React
       │
       ▼
GET /api/projects
       │
       ▼
Drupal Routing
       │
       ▼
Symfony Controller
       │
       ▼
Drupal Entity API
       │
       ▼
Project Content
       │
       ▼
JsonResponse
```

## Structured Content

HIRAYA uses Drupal content types to separate content structure from presentation.

For example, the `Project` content type contains:

```text
Project
├── Title
└── Description
```

A project can therefore be created or updated through Drupal without modifying the React frontend.

This demonstrates the benefit of a content-driven architecture: **content editors can manage content independently from frontend code.**

## Technology Stack

| Technology | Usage |
|---|---|
| Drupal 11 | Content management system |
| PHP | Backend runtime |
| Symfony | Routing and controller architecture |
| Drupal Entity API | Content retrieval |
| Twig | Drupal theme templating |
| HTML5 | Page structure |
| CSS3 | Styling and responsive design |
| JavaScript | Frontend interactions |
| DDEV | Local development |
| Drush | Drupal CLI |
| Composer | Dependency management |
| Git / GitHub | Version control |
| Pantheon | Drupal hosting and deployment |
| React / Vite | Headless frontend |
| Vercel | React frontend hosting |

## Local Development

HIRAYA uses DDEV for local Drupal development.

Start the project:

```bash
ddev start
```

Check the environment:

```bash
ddev describe
```

Clear Drupal caches:

```bash
ddev drush cr
```

Run Drupal commands:

```bash
ddev drush status
```

The local Drupal environment is served through the DDEV project URL.

## Deployment

The Drupal application is deployed to Pantheon.

The React headless frontend is deployed separately through Vercel.

```text
                    Git / GitHub
                         │
              ┌──────────┴──────────┐
              │                     │
              ▼                     ▼
          Pantheon                Vercel
              │                     │
         Drupal 11              React + Vite
              │                     │
              └─────── API ────────┘
```

This separation allows the Drupal backend and React frontend to be developed and deployed independently.

## Accessibility

Accessibility is considered throughout the project with attention to:

- Semantic HTML
- Keyboard navigation
- Responsive layouts
- Color contrast
- Accessible interactive elements
- WCAG-conscious implementation

The project builds on experience working with accessibility requirements including **WCAG 2.1 AA and Section 508**.

## Project Goals

HIRAYA was built as a practical portfolio project to demonstrate the progression from traditional Drupal development into modern decoupled architecture.

The project demonstrates the ability to work across:

```text
Drupal
  ↓
PHP
  ↓
Symfony
  ↓
API Development
  ↓
React
  ↓
Modern Frontend Deployment
```

Rather than treating Drupal, backend development, and frontend development as separate technologies, HIRAYA demonstrates how they can work together as a complete web application architecture.

## Related Frontend

The separate React frontend is maintained in the HIRAYA Headless project.

It consumes the Drupal API and renders project content through reusable React components.

The frontend demonstrates:

- React
- Vite
- API consumption
- React state management
- Component-based architecture
- Vercel deployment

## About HIRAYA

HIRAYA is a personal portfolio project created by Ryan Buenconsejo to demonstrate practical Drupal development experience while expanding into modern API-driven and headless web architecture.

The project combines Drupal content management, custom theming, Symfony-based API development, and React frontend development into a single portfolio ecosystem.
