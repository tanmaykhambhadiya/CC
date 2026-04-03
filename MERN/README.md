# Concert Circle — MERN Stack

Full-stack rebuild of Concert Circle using **MongoDB + Express + React + Node.js**.

## Structure

```
MERN/
├── client/          # React + Vite + Tailwind CSS
├── server/          # Express + MongoDB API
└── docker-compose.yml
```

## Quick Start (Development)

### 1. Server

```bash
cd server
cp .env.example .env   # configure your environment variables
npm install
npm run dev
```

Runs on `http://localhost:5000`

### 2. Client

```bash
cd client
npm install
npm run dev
```

Runs on `http://localhost:5173` (proxies API to :5000)

## Docker (Production)

```bash
cd MERN
docker compose up --build
```

- Client: `http://localhost` (port 80)
- Server API: `http://localhost:5000`
- MongoDB: `localhost:27017`

## Packages

| Package | Price | Group Size |
|---------|-------|-----------|
| Ride to the Rage | ₹7,499 | Solo only |
| Utopia Circle | ₹9,999 | 3+ group |
| Astro Deluxe Drop | ₹12,499 | Any |

## Tech Stack

- **Frontend**: React 19, Vite, Tailwind CSS v4, React Router
- **Backend**: Express.js, Mongoose, Multer, Nodemailer
- **Database**: MongoDB 7
- **Deployment**: Docker + Docker Compose
