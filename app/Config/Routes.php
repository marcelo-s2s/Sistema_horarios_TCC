<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index', ['as' => 'index']);

$routes->get('/horario-aula/carregar-horarios/(:any)', 'HorarioAula::carregarHorarios/$1', ['as' => 'carregarHorarios']);
$routes->get('/horario-aula-publico', 'HorarioAula::horarioAulaPublico', ['as' => 'horarioAulaPublico']);


$routes->get('/teste', 'Home::teste', ['as' => 'teste']);

$routes->group('', ['filter' => 'group:admin,superadmin'], function ($routes) {
    
    // Usuário
    $routes->get('/usuario', 'Usuario::listarUsuario', ['as' => 'listarUsuario']);
    $routes->post('/usuario/salvar', 'Usuario::salvarUsuario', ['as' => 'salvarUsuario']);
    $routes->get('/usuario/editar/(:num)', 'Usuario::editarUsuario/$1', ['as' => 'editarUsuario']);
    $routes->get('/usuario/deletar/(:num)', 'Usuario::deletarUsuario/$1', ['as' => 'deletarUsuario']);
    
    // Professor
    $routes->get('/professor', 'Usuario::listarProfessor', ['as' => 'listarProfessor']);
    $routes->get('/professor/editar/(:num)', 'Usuario::editarProfessor/$1', ['as' => 'editarProfessor']);

    // Turma
    $routes->get('/turma', 'Turma::listarTurma', ['as' => 'listarTurma']);
    $routes->post('/turma/salvar', 'Turma::salvarTurma', ['as' => 'salvarTurma']);
    $routes->get('/turma/editar/(:any)', 'Turma::editarTurma/$1', ['as' => 'editarTurma']);
    $routes->get('/turma/deletar/(:any)', 'Turma::deletarTurma/$1', ['as' => 'deletarTurma']);
    
    // Sala
    $routes->get('/sala', 'Sala::listarSala', ['as' => 'listarSala']);
    $routes->post('/sala/salvar', 'Sala::salvarSala', ['as' => 'salvarSala']);
    $routes->get('/sala/editar/(:num)', 'Sala::editarSala/$1', ['as' => 'editarSala']);
    $routes->get('/sala/deletar/(:num)', 'Sala::deletarSala/$1', ['as' => 'deletarSala']);

    // Horário de aula
    $routes->get('/lista-horario-aula', 'HorarioAula::listaHorarioAula', ['as' => 'listaHorarioAula']);
    $routes->get('/horario-aula', 'HorarioAula::horarioAula', ['as' => 'horarioAula']);
    $routes->post('/horario-aula/salvar', 'HorarioAula::salvarHorarioAula', ['as' => 'salvarHorarioAula']);
    $routes->get('/horario-aula/editar/(:any)', 'HorarioAula::editarHorarioAula/$1', ['as' => 'editarHorarioAula']);
    $routes->delete('/horario-aula/deletar/(:alphanum)', 'HorarioAula::deletarHorarioAula/$1', ['as' => 'deletarHorarioAula']);
    $routes->get('/horario-aula/deletar/(:alphanum)', 'HorarioAula::deletarHorarioAula/$1', ['as' => 'deletarHorarioAula']);
    $routes->post('/horario-aula/verificar-conflitos', 'HorarioAula::verificarConflitos', ['as' => 'verificarConflitos']);
    $routes->post('/horario-aula/retornar-conflitos', 'HorarioAula::retornarConflitos', ['as' => 'retornarConflitos']);
    
    //Horários de Professores
    $routes->get('/horario-aula/professor', 'HorarioAula::horarioProfessor', ['as' => 'horarioProfessor']);
    $routes->get('/horario-aula/carregar-horarios-professor/(:alphanum)', 'HorarioAula::carregarHorariosProfessor/$1', ['as' => 'carregarHorariosProfessor']);
    
    //Horários de Salas
    $routes->get('/horario-aula/sala', 'HorarioAula::horarioSala', ['as' => 'horarioSala']);
    $routes->get('/horario-aula/carregar-horarios-sala/(:alphanum)', 'HorarioAula::carregarHorariosSala/$1', ['as' => 'carregarHorariosSala']);
    
    // Disciplina
    $routes->get('/disciplina', 'Disciplina::listarDisciplina', ['as' => 'listarDisciplina']);
    $routes->post('/disciplina/salvar', 'Disciplina::salvarDisciplina', ['as' => 'salvarDisciplina']);
    $routes->get('/disciplina/editar/(:num)', 'Disciplina::editarDisciplina/$1', ['as' => 'editarDisciplina']);
    $routes->get('/disciplina/deletar/(:num)', 'Disciplina::deletarDisciplina/$1', ['as' => 'deletarDisciplina']);
    
    // Periodo
    $routes->get('/periodo', 'PeriodoLetivo::listarPeriodo', ['as' => 'listarPeriodo']);
    $routes->post('/periodo/salvar', 'PeriodoLetivo::salvarPeriodo', ['as' => 'salvarPeriodo']);
    $routes->get('/periodo/editar/(:any)', 'PeriodoLetivo::editarPeriodo/$1', ['as' => 'editarPeriodo']);
    $routes->get('/periodo/deletar/(:any)', 'PeriodoLetivo::deletarPeriodo/$1', ['as' => 'deletarPeriodo']);
    $routes->get('/periodo/ativar/(:any)', 'PeriodoLetivo::ativarPeriodo/$1', ['as' => 'ativarPeriodo']);
});

service('auth')->routes($routes);
