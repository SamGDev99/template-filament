<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallTemplate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install-template';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute installation of Filament an Shield';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔑 Generando la clave de la aplicación...');
        $this->call('key:generate');
        $this->info('📦 Ejecutando migraciones...');
        $this->call('migrate');
        $this->info('👤 Creando usuario Filament...');
        $this->call('make:filament-user');
        $this->info('🛡️ Asignando rol de superadmin...');
        $this->call('shield:super-admin');
        $this->info('🔐 Generando permisos y políticas con Shield...');
        $this->call('shield:generate',['--all'=>true]);
        $this->info('✅ Instalación completada exitosamente.');

    }
}
