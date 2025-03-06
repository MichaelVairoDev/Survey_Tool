# 📊 Survey Tool

## 📝 Descripción

Una aplicación web moderna y completa para la creación y gestión de encuestas, construida con Laravel y TailwindCSS. La plataforma permite crear encuestas personalizadas, recopilar respuestas y visualizar resultados en tiempo real con gráficos interactivos.

## 📸 Capturas de Pantalla

### 🏠 Página Principal

![Página Principal](/screenshots/home.png)
_Página de inicio con información sobre la plataforma y sus características_

### 📊 Dashboard

![Dashboard](/screenshots/dashboard.png)
_Panel de control con resumen de encuestas y estadísticas_

### ✏️ Crear Encuesta

![Crear Encuesta](/screenshots/crear-encuesta.png)
_Interfaz intuitiva para la creación de nuevas encuestas_

### 📋 Encuestas Disponibles

![Encuestas Disponibles](/screenshots/encuestas-disponibles.png)
_Listado de encuestas disponibles para responder_

### 🗳️ Votación

![Votación](/screenshots/votacion.png)
_Formulario de votación con diferentes tipos de preguntas_

### 📈 Resultados

![Resultados](/screenshots/resultados-encuesta.png)
_Visualización de resultados con gráficos interactivos_

## 🚀 Tecnologías Utilizadas

### Frontend

-   🎨 TailwindCSS para estilos modernos y responsivos
-   🌐 Blade como motor de plantillas
-   🔄 Alpine.js para interactividad
-   📊 Gráficos interactivos para visualización de resultados

### Backend

-   ⚡ Laravel 10
-   🗃️ SQLite como base de datos
-   🔐 Sistema de autenticación Breeze
-   🔄 Eloquent ORM para manejo de datos

## 🛠️ Requisitos Previos

-   PHP 8.1 o superior
-   Composer
-   Node.js y npm
-   SQLite

## ⚙️ Configuración del Proyecto

1. **Clonar el repositorio**

```bash
git clone <url-del-repositorio>
cd Survey_Tool
```

2. **Instalar dependencias de PHP**

```bash
composer install
```

3. **Instalar dependencias de Node.js**

```bash
npm install
```

4. **Configurar el entorno**

```bash
cp .env.example .env
php artisan key:generate
```

5. **Configurar la base de datos**

```bash
touch database/database.sqlite
php artisan migrate --seed
```

## 🚀 Iniciar el Proyecto

1. **Compilar assets**

```bash
npm run build
```

2. **Iniciar el servidor**

```bash
php artisan serve
```

El proyecto estará disponible en http://localhost:8000

## 📊 Características Principales

-   📝 Creación de encuestas personalizadas
-   📊 Diferentes tipos de preguntas (opción múltiple, texto, calificación)
-   📈 Visualización de resultados en tiempo real
-   🔒 Sistema de autenticación de usuarios
-   📱 Diseño totalmente responsive
-   🎨 Interfaz moderna y atractiva
-   📊 Gráficos estadísticos interactivos

## 🗂️ Estructura del Proyecto

```
Survey_Tool/
├── app/
│   ├── Http/Controllers/
│   ├── Models/
│   └── Policies/
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
└── routes/
    └── web.php
```

## 🔐 Seguridad

-   Autenticación de usuarios
-   Políticas de acceso para encuestas
-   Protección CSRF
-   Validación de datos
-   Sanitización de entradas

## 📝 API Endpoints

### Encuestas

-   GET `/api/surveys` - Obtener todas las encuestas
-   GET `/api/surveys/{id}` - Obtener una encuesta específica
-   POST `/api/surveys` - Crear una nueva encuesta
-   PUT `/api/surveys/{id}` - Actualizar una encuesta
-   DELETE `/api/surveys/{id}` - Eliminar una encuesta

### Preguntas

-   GET `/api/surveys/{survey}/questions` - Obtener preguntas de una encuesta
-   POST `/api/surveys/{survey}/questions` - Agregar pregunta a una encuesta
-   PUT `/api/questions/{question}` - Actualizar una pregunta
-   DELETE `/api/questions/{question}` - Eliminar una pregunta

### Respuestas

-   POST `/api/surveys/{survey}/responses` - Enviar respuestas a una encuesta
-   GET `/api/surveys/{survey}/results` - Obtener resultados de una encuesta

### Autenticación

-   POST `/api/register` - Registro de usuario
-   POST `/api/login` - Login de usuario
-   GET `/api/user` - Obtener perfil del usuario autenticado
-   POST `/api/logout` - Cerrar sesión

## 📄 Licencia

Este proyecto está bajo la Licencia MIT.

## 📞 Soporte

Para soporte o preguntas, por favor abre un issue en el repositorio.

---

⌨️ con ❤️ por [Michael Vairo]
