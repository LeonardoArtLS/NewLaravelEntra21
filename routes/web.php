<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/**
 * VERBOSES
 * GET, POST, PUT, DELETE
 */


Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function (){
    return view ('hello');
});
//rota com parametro
Route::get('/user/{id}', function($id){
    return 'User id '.$id;
});

//produtos
//parametros opcionais

//colocar o ? dentro do id faz ser opcional colocar ou não || coloca $id = null para não dar erro já que espera um valor
/* Route::get('/produtos/{id?}', function($id = null){
    $produtos = [
        "Picolé", "Sorvete", "Paleta Mexicana"
    ];
    if($id){
        echo($produtos[$id]);
    }else{
        print_r($produtos);
    }
}); */

//Views organizadas em pastas
Route::get('/empresa', function(){
    return view('site/empresa');
});
Route::get('/minhaempresa', function(){
    return view ('blog/empresa');
});

//crud usuários
Route::get('/usuarios', function(){
    return view('usuarios/lista');
});
Route::get('/usuarios/add', function(){
    return view('usuarios/adiciona');
});
Route::get('/usuarios/edit', function(){
    return view('usuarios/edita');
});

//usar rotas de qualquer metodo de verbose
//não é recomendado usar any
Route::any('/any', function(){
    return 'aceita qualquer tipo de verbose. Usando: '.$_SERVER['REQUEST_METHOD'];
});

//rota para definir mais de uma verbose
Route::match(['POST','PATCH'], '/contato', function(){
    return 'foi';
});

//Redirecionamento
Route::redirect('/users', '/usuarios');

//chamar uma view direto sem usar verboses
Route::view('politica-de-privacidade', 'site/politica');

//rotas nomeadas
Route::get('/news', function(){
    return view('site/news');
})->name('noticias');

//rota de redirecionamento
Route::get('/novidades', function(){
    return redirect()->route('noticias');
});

//grupos de rotas
//serve para definir um padrão repetitivo de rotas
/* Route::get('/admin/dashboard', function(){
    return view('admin/dashboard');
});

Route::get('/admin/produtos', function(){
    return view('admin/produtos');
});

Route::get('/admin/usuarios', function(){
    return view('admin/usuarios');
}); */

// o jeito acima repete muito código

//forma 1 de usar grupos de rotas
/* Route::prefix('admin')->group(function(){
    //definir as rotas
    Route::get('dashboard', function(){
        return view('admin/dashboard');
    });
    Route::get('produtos', function(){
        return view('admin/produtos');
    });
    Route::get('usuarios', function(){
        return view('admin/usuarios');
    });
}); */

//OUTRO MEIO PARA FICAR MAIS FACIL SE PRECISAR MUDAR DEPOIS

/* 
CONST ADM_PREFIXO = 'admin';
Route::prefix(ADM_PREFIXO)->group(function(){
    //definir as rotas
    Route::get('dashboard', function(){
        return view(ADM_PREFIXO.'/dashboard');
    });
    Route::get('produtos', function(){
        return view(ADM_PREFIXO.'/produtos');
    });
    Route::get('usuarios', function(){
        return view(ADM_PREFIXO.'/usuarios');
    });
}); */


//AGRUPAMENTO POR NOME
/* Route::name('admin.')->group(function(){

    Route::get('admin/dashboard',function(){
        return view('admin/dashboard');
    })->name('dashboard');
    
    Route::get('admin/produtos',function(){
        return view('admin/produtos');
    })->name('produtos');

    Route::get('admin/usuarios',function(){
        return view('admin/usuarios');
    })->name('usuarios');

}); */

//Agrupamento por group
Route::group([
    "prefix" => "admin",
    "as" => "admin."
], function(){
    
    Route::get('dashboard',function(){
        return view('admin/dashboard');
    })->name('dashboard');
    
    Route::get('produtos',function(){
        return view('admin/produtos');
    })->name('produtos');

    Route::get('usuarios',function(){
        return view('admin/usuarios');
    })->name('usuarios');
});

//ROTAS COM CONTROLLERS
//sintaxe -> Route::get('rota', [NomeClasse::class, 'metodo'])
//comando para criar uma controller:
//php artisan make:controller NomeController
Route::get('/produtos', [ProdutosController::class, 'index']);
Route::get('/produto/{id}', [ProdutosController::class, 'detail']);

//resources
//comando para criar um resource:
//php artisan make:controller NomeController --resource

Route::resource('/cadastro', CadastroController::class);




//ROTAS PARA ESTUDO DO BLADE
Route::get('/blade/expressoes', function(){
    $nome = "Leonardo";
    return view('blade/expressoes', ['nome' => $nome]);
});

Route::get('/blade/controle-decisao/{numero?}', function($numero = 0){
    return view('blade/controleDecisao', ['n' => $numero, "idade" => 18]);
});

Route::get('/blade/switch/{numero?}', function($n = 0){
    return view('/blade/switch', ["numero" => $n]);
});

//rotas para laços de repetição
Route::get('/blade/lacos/for', function(){
    $dias = ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado"];
    return view('blade/lacos/for', ["dias" => $dias]);
});

//rotas para foreach
Route::get('/blade/lacos/foreach', function(){
    $familia = [
        ["nome" => "Lucas", "idade" => 15, "parentesco" => "Irmão"],
        ["nome" => "Rubens", "idade" => 55, "parentesco" => "Pai"],
        ["nome" => "Sandra", "idade" => 52, "parentesco" => "Mãe"]
    ];

    return view('blade/lacos/foreach', ["familia" => $familia]);
});

//rota para while
Route::view('/blade/lacos/while', 'blade/lacos/while');

//rotas para o blog
Route::get('/blog', function(){
    return view('blog/home');
});