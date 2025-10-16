<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <title>@yield('title', 'Sistema de controle Academico ')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
  <main>
    <div>
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="#">Active</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Aluno</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route ('aluno.create')}}">Cadastrar</a>
            <a class="dropdown-item" href="{{route ('aluno.index')}}">Listar</a>
            <li class="nav-item">
              <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit">Sair</button>
              </form>
            </li>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Professor</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route ('professor.create')}}">Cadastrar</a>
            <a class="dropdown-item" href="{{route ('professor.index')}}">Listar</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Curso</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route ('curso.create')}}">Cadastrar</a>
            <a class="dropdown-item" href="{{route ('curso.index')}}">Listar</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Turma</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route ('turma.create')}}">Cadastrar</a>
            <a class="dropdown-item" href="{{route ('turma.index')}}">Listar</a>
          </div>
        </li>
      </ul>
    </div>
    <div class="container">
      @yield('content')
  </main>
  <footer>
    <center>
      <p>&copy; 2025 - Todos os direitos reservados</p>
    </center>
  </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>