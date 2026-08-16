<?php

use PHPUnit\Framework\TestCase;

class UsuarioServiceTest extends TestCase
{
    public function test_formatCpf_valid()
    {
        $svc = \App\Services\UsuarioService::class;
        $result = $svc::formatCpf('12345678910');
        $this->assertEquals('123.456.789-10', $result);

        $result2 = $svc::formatCpf('123.456.789-10');
        $this->assertEquals('123.456.789-10', $result2);
    }

    public function test_formatCpf_invalid()
    {
        $svc = \App\Services\UsuarioService::class;
        $this->assertNull($svc::formatCpf(''));
        $this->assertNull($svc::formatCpf('12345'));
        $this->assertNull($svc::formatCpf('abc.def.ghi-jk'));
    }

    public function test_model_classes_exist_and_extend_usuario()
    {
        $models = ['Aluno','Orientador','Supervisor','Contratante','Administrador'];
        foreach ($models as $m) {
            $class = "App\\Models\\$m";
            $this->assertTrue(class_exists($class), "Classe $class não existe");
            $this->assertTrue(is_subclass_of($class, \App\Models\Usuario::class), "$class não estende Usuario");
        }
    }
}
