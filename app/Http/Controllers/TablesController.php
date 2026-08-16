<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TablesController
{
    public function listTables()
    {
        // SHOW TABLES retorna stdClass com chave dependente do DB, então extraímos os valores
        $results = DB::select('SHOW TABLES');
        $tables = [];
        if (count($results) > 0) {
            $first = (array) $results[0];
            $key = array_key_first($first);
            foreach ($results as $r) {
                $row = (array) $r;
                $tables[] = $row[$key];
            }
        }

        return response()->json($tables);
    }

    public function rows(Request $request, $table)
    {
        $limit = (int) $request->query('limit', 100);
        if ($limit <= 0 || $limit > 1000) $limit = 100;

        try {
            $rows = DB::table($table)->limit($limit)->get();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Tabela inválida ou erro ao consultar'], 400);
        }

        return response()->json($rows);
    }
}
