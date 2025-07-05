
# 🎯 Plantilla Base Laravel 12 + Filament 3

Este repositorio es una **plantilla base** para aplicaciones desarrolladas con [Laravel 12](https://laravel.com) y [Filament 3](https://filamentphp.com/), pensada para acelerar el desarrollo de sistemas administrativos modernos.

Incluye configuración inicial de autenticación, gestión de usuarios, roles y permisos usando **Filament Shield**, junto con funcionalidades comunes como activación/inactivación de usuarios y cambio de contraseña.

---

## 🚀 Características incluidas

- Laravel 12 + Filament 3 completamente configurado.
- Panel administrativo con Filament.
- Roles y permisos mediante [Filament Shield](https://github.com/bezhanSalleh/filament-shield).
- Gestión de usuarios:
  - Crear, editar y eliminar usuarios.
  - Activar e inactivar cuentas.
  - Modificar contraseñas.
  - Asignar múltiples roles por usuario.
- Panel de administración de roles y permisos.
- Verificación de correo electrónico.

---

## 📦 Requisitos

- PHP >= 8.2
- Composer
- Node.js y NPM (solo si necesitas compilar assets personalizados)
- MySQL o PostgreSQL
- Laravel CLI (`laravel` o `php artisan`)

---

## 🛠️ Instalación

```bash
# Clona el proyecto
composer create-project SamGDev99/template-filament mi-proyecto
cd mi-proyecto

# Copia archivo de entorno
cp .env.example .env

# Instala dependencias y compila assets
npm install
npm run build

# Servidor local
composer run dev
```

---

## 🧑‍💻 Estructura del Panel

Una vez autenticado, accederás al **panel administrativo de Filament**, que incluye:

- **Usuarios**: crear, editar, activar/inactivar, cambiar contraseña, asignar roles.
- **Roles**: asignación granular de permisos por recurso.
- **Permisos**: generados automáticamente por Shield según tus recursos.
- Paneles y navegación ya configurados.

---

## 🛡️ Seguridad y control de acceso

- El acceso al panel está protegido por autenticación.
- Se sobrescribe login para bloquear usuarios inactivos.
- Filament Shield gestiona visibilidad de menús, acciones y páginas según permisos.

---

## 📄 Licencia

Este proyecto está disponible bajo la licencia [MIT](LICENSE).

---

## 💡 Créditos

Plantilla creada por [Samuel Gamarra], basada en Laravel + Filament + Shield.
