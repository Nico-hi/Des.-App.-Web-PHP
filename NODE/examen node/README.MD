## Para iniciar el servidor hay que seguir los siguientes comandos

Base de datos

```
encontraras el script sql en la carpeta db
```

Dependencias para el servidor

```
si tienes package.json -> npm i
si no tienes package.json -> npm i express mysql2 express-session bcrypt dotenv
```

Lanzamiento del servidor

```
al teminar de instalar usamos  -> node server.js
```

## Registro de usuarios

cuentas con dos formas para registrar un usuario

1.- Si eres el primer usuario en registrarse tendras el rol de admin entrando a `admin.html` como endpoint, el cual no aceptara más logins si ya hay un admin

2.- Pidiendo a un admin existente que te registre en la aplicación

## endpoints

```
GET     /productos          → Lista todos los productos
GET     /producto/:nombre   → Busca producto por nombre
POST    /producto/nuevo     → Crear nuevo producto (solo admin)

POST    /clima              → Clima Madrid (con caché BD)

POST    /register           → Registro usuario
POST    /login              → Login
GET     /logout             → Logout
```

## estructura

```
├── controller/     ← Lógica de negocio
├── routes/        ← Rutas Express
├── repository/    ← Acceso a BD (DAO)
├── db/            ← Scripts SQL
├── public/        ← HTML, CSS, JS cliente
├── config/        ← Configuración (API keys)
└── server.js      ← Punto de entrada

```
